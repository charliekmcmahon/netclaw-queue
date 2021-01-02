<?php

    // Remove user from now playing
    include('db.php'); 
    $sql = "TRUNCATE TABLE NowPlaying";
    $result = $mysqli->query($sql);
    include('closedb.php');
    header( "refresh:1;url=index.php" );

?>