<?php
include("mysql_connect.php");
  session_start();
  $deleteprofile = "DELETE FROM profile WHERE Name = '".$_SESSION['login_user']."'";
  $deletegameconfig = "DELETE FROM gameconfig WHERE profileName = '".$_SESSION['login_user']."'";
  $deletegamerecord = "DELETE FROM gamerecord WHERE profileName = '".$_SESSION['login_user']."'";


  if (mysql_query($deleteprofile) !== false && mysql_query($deletegameconfig) !== false && mysql_query($deletegamerecord) !== false) {
    if(session_destroy()) {
       header("Location: index.php");
    }
  } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
  }
?>
