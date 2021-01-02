<?php

session_start();

$_SESSION['currentUserName'] = $_GET["var"];
echo $_SESSION['currentUserName'];

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
        $sql = "INSERT INTO `Queue` (`Username`, `TimeAdded`) VALUES ('".$_SESSION['currentUserName']."', '".$currentTimeinSeconds."');";
        $result = $mysqli->query($sql);
        include('closedb.php');
    }
    else {
        // The user is already in the queue
        echo '<br> You are already in the queue.';
    }

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

if (($firstInQueue == $_SESSION['currentUserName']) && ($isPersonPlaying == false) ){
    // Notify the user
    echo "<br> You are <b>first</b> in queue. Redirecting you now.";
    sleep(2); // wait 2 secs

    // Remove the user from the queue
    include('db.php'); 
    $sql = "DELETE FROM Queue WHERE Username='".$_SESSION['currentUserName']."';";
    $result = $mysqli->query($sql);
    include('closedb.php');

    // Add the user to the 'nowplaying' db
    include('db.php');
    $currentTimeinSeconds = time();  
    $sql = "INSERT INTO `NowPlaying` (`Username`, `TimeAdded`) VALUES ('".$_SESSION['currentUserName']."', '".$currentTimeinSeconds."');";
    $result = $mysqli->query($sql);
    include('closedb.php');

    echo('redirecting');
    // Redirect user
    header("Location: playing.php");
    die();
}
else{
    echo "<br> it wont be too long";
}


?>