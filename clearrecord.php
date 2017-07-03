<?php
include("mysql_connect.php");
session_start();

if (isset($_GET['All'])){
  $sql =  "DELETE FROM gamerecord WHERE profileName = '".$_SESSION['login_user']."'";
}
if (isset($_GET['Outrun'])){
  $sql =  "DELETE FROM gamerecord WHERE gameName = 'Outrun' AND profileName = '".$_SESSION['login_user']."'";
}
if (isset($_GET['Pong'])){
  $sql =  "DELETE FROM gamerecord WHERE gameName = 'Pong' AND profileName = '".$_SESSION['login_user']."'";
}
if (isset($_GET['Breakout'])){
  $sql =  "DELETE FROM gamerecord WHERE gameName = 'Breakout' AND profileName = '".$_SESSION['login_user']."'";
}

if (mysql_query($sql) !== false) {
  header("Location: record.php");
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}


?>
