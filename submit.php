<?php

session_start();

$_SESSION['currentUserName'] = $_GET["var"];
$_SESSION['currentName'] = $_GET["name"];

$url1=$_SERVER['REQUEST_URI'];
header("Refresh: 5; URL=$url1");

// Check whether name exists in queue
include('db.php');
    $sql = "SELECT * FROM `Queue` WHERE `Username` = '".$_SESSION['currentUserName']."'";
    $result = $mysqli->query($sql);
    $row = $result->fetch_row();
    $value = $row[0] ?? false;
    include('closedb.php');
    if ($value == false) {
        // When the user is not already in the queue
        // Insert the user
        include('db.php');
        $currentTimeinSeconds = time();  
        $sql = "INSERT INTO `Queue` (`Username`, `TimeAdded`, `Name`) VALUES ('".$_SESSION['currentUserName']."', '".$currentTimeinSeconds."', '".$_SESSION['currentName']."');";
        $result = $mysqli->query($sql);
        include('closedb.php');
    }
    else {
        // The user is already in the queue
        echo '<br> You are already in the queue.';
    }

include('db.php');
    $sql = "SELECT `Name` FROM `NowPlaying` ORDER BY `NowPlaying`.`TimeAdded` ASC LIMIT 1";
    $result = $mysqli->query($sql);
    $row = $result->fetch_row();
    $value = $row[0] ?? false;
    $firstInQueue = $value;
include('closedb.php');

echo "<br> Now Playing: ". $value . ".";

echo "<br><br>Queue: <br>";

include('db.php');
$sql = "SELECT `Name` FROM `Queue`";
$result = $mysqli->query($sql);
//$row = $result->fetch_row();
//$value = $row[0] ?? false;
echo "<br>";
echo "<table border='1'>";
while ($row = mysqli_fetch_assoc($result)) { // Important line !!! Check summary get row on array ..
    echo "<tr>";
    foreach ($row as $field => $value) { // I you want you can right this line like this: foreach($row as $value) {
        echo "<td>" . $value . "</td>"; // I just did not use "htmlspecialchars()" function. 
    }
    echo "</tr>";
}
echo "</table>";

include('closedb.php');


// Check who is currently first in queue
include('db.php');
    $sql = "SELECT `Username` FROM `Queue` ORDER BY `Queue`.`TimeAdded` ASC LIMIT 1";
    $result = $mysqli->query($sql);
    $row = $result->fetch_row();
    $value = $row[0] ?? false;
    $firstInQueue = $value;
include('closedb.php');

// Check if anyone is playing
include('db.php');
    $sql = "SELECT `Username` FROM `NowPlaying` ORDER BY `NowPlaying`.`TimeAdded` ASC LIMIT 1";
    $result = $mysqli->query($sql);
    $row = $result->fetch_row();
    $value = $row[0] ?? false;
    $isPersonPlaying = $value;
include('closedb.php');



// Make sure no-one has exited

//Get time added
include('db.php');
    $sql = "SELECT `TimeAdded` FROM `NowPlaying` ORDER BY `NowPlaying`.`TimeAdded` ASC LIMIT 1";
    $result = $mysqli->query($sql);
    $row = $result->fetch_row();
    $value = $row[0] ?? false;
    $authUserTime = $value;
include('closedb.php');
$currentTime = time();

if (($currentTime - $authUserTime) > 40){
    // Remove user from now playing
    include('db.php'); 
    $sql = "TRUNCATE TABLE NowPlaying";
    $result = $mysqli->query($sql);
    include('closedb.php');
}

if (($firstInQueue == $_SESSION['currentUserName']) && ($isPersonPlaying == false) ){
    // Notify the user
    echo "<br> You are <b>first</b> in queue. Redirecting you now.";

    // Remove the user from the queue
    include('db.php'); 
    $sql = "DELETE FROM Queue WHERE Username='".$_SESSION['currentUserName']."';";
    $result = $mysqli->query($sql);
    include('closedb.php');

    // Add the user to the 'nowplaying' db
    include('db.php');
    $currentTimeinSeconds = time();  
    $sql = "INSERT INTO `NowPlaying` (`Username`, `TimeAdded`, `Name`) VALUES ('".$_SESSION['currentUserName']."', '".$currentTimeinSeconds."', '".$_SESSION['currentName']."');";
    $result = $mysqli->query($sql);
    include('closedb.php');

    echo('<br> Please wait while we redirect you......');
    // Redirect user
    
    header( "refresh:5;url=playing.php");
}
else{
    echo "<br> You are in the Queue! Feel free to watch the livestream while you wait: <br>";
    include('stream.php');
}


?>