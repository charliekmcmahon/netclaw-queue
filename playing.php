<?php
session_start();
header( "refresh:30;url=sessionExpired.php" );

// Verify the user has access to the page
include('db.php');
    $sql = "SELECT `Username` FROM `NowPlaying` ORDER BY `NowPlaying`.`TimeAdded` ASC LIMIT 1";
    $result = $mysqli->query($sql);
    $row = $result->fetch_row();
    $value = $row[0] ?? false;
    $authUser = $value;
include('closedb.php');

if ($authUser == $_SESSION['currentUserName']) {
    echo('u have access');
    include('player.php');
}
else {
    header( "refresh:0.01;url=index.php" );
}
?>