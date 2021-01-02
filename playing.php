<?php
session_start();
header( "refresh:33;url=sessionExpired.php" );

// Verify the user has access to the page
include('db.php');
    $sql = "SELECT `Username` FROM `NowPlaying` ORDER BY `NowPlaying`.`TimeAdded` ASC LIMIT 1";
    $result = $mysqli->query($sql);
    $row = $result->fetch_row();
    $value = $row[0] ?? false;
    $authUser = $value;
include('closedb.php');

if (!($_SESSION['currentUserName'])) {
    $_SESSION['currentUserName'] = "Guest";
}
if ($authUser == $_SESSION['currentUserName']) {
    // Load the player
    include('player.php');
}
else {
    header( "refresh:1;url=index.php" );
}
?>