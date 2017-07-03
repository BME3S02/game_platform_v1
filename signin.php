<?php
  include("mysql_connect.php");
  	session_start();
  	include("mysql_connect.php");
    $profile = $_POST['profile'];
    $sql = "SELECT Name FROM profile WHERE Name = '$profile' ";
    $result = mysql_query($sql, $database);
    $row = mysql_fetch_array($result,MYSQLI_ASSOC);
    $count = mysql_num_rows($result);

    if($profile == ''){
      echo json_encode(array(
        "result" => "Please create a profile first",
        "reason" => "Please create a profile first"
      ));
        exit;
    }
    else if($count == 1) {
      echo json_encode(array(
        "result" => "OK",
        "reason" => "Register Success"
      ));
        $_SESSION['login_user'] = $row['Name'];
        exit;
      }
    else{

      
    }
?>
