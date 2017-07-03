<?php
session_start();
include("mysql_connect.php");

    $playTime = $_POST['playTime'];
    $fastestLapTime = $_POST['fastestLapTime'];
    $latestLapTime = $_POST['latestLapTime'];
    $date = date("Y-m-d H:i:s", strtotime('+7 hours'));
    $savePlayTimeRecord = "INSERT INTO gamerecord (profileName, gameName, record, value, date) VALUES ('".$_SESSION['login_user']."', 'Outrun', 'Played Time', '$playTime minutes',  '$date')";
    $saveFastestLapTimeRecord = "INSERT INTO gamerecord (profileName, gameName, record, value, date) VALUES ('".$_SESSION['login_user']."', 'Outrun', 'Fastest Lap Time', '$fastestLapTime',  '$date')";
    $saveLatestLapTimeRecord = "INSERT INTO gamerecord (profileName, gameName, record, value, date) VALUES ('".$_SESSION['login_user']."', 'Outrun', 'Latest Lap Time', '$latestLapTime',  '$date')";
    mysql_query($savePlayTimeRecord, $database);
    mysql_query($saveFastestLapTimeRecord, $database);
    mysql_query($saveLatestLapTimeRecord, $database);

 ?>
