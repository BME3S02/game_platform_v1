<?php
include("mysql_connect.php");

  $profilename = $_POST['profilename'];
  $checkprofilename= mysql_query("SELECT * FROM profile WHERE Name='$profilename';");
  $sql = "INSERT INTO profile (ID, Name) VALUES ( '', '$profilename')";



  if ($profilename == '') {
    echo json_encode(array(
      "result" => "Please give a profile name",
      "reason" => "Please give a profile name"
    ));
      exit;
  }
  else if (mysql_fetch_array($checkprofilename) !== false) {
    echo json_encode(array(
      "result" => "Registered Profile Name",
      "reason" => "This username has been Registered"
    ));
      exit;
  }
  else if (mysql_query($sql) !== false) {
    echo json_encode(array(
      "result" => "OK",
      "reason" => "Register Success"
    ));
      exit;
    }
    else{
      echo json_encode(array(
        "result" => "error",
        "reason" => "Please give your information"
      ));
      exit;
    }
?>
