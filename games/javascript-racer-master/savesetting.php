<?php
session_start();
include("mysql_connect.php");

if(isset($_GET['roadWidth']) || isset($_GET['totalCars']) || isset($_GET['maxSpeed'])){

  $roadWidth = $_GET['roadWidth'];
  $totalCars = $_GET['totalCars'];
  $maxSpeed = $_GET['maxSpeed'];

  $saveRoadWidth = "INSERT INTO gameconfig (profileName, gameName, parameter, value) VALUES ('".$_SESSION['login_user']."', 'outrun', 'roadWidth', '$roadWidth')";
  $saveTotalCars = "INSERT INTO gameconfig (profileName, gameName, parameter, value) VALUES ('".$_SESSION['login_user']."', 'outrun', 'totalCars', '$totalCars')";
  $saveMaxSpeed = "INSERT INTO gameconfig (profileName, gameName, parameter, value) VALUES ('".$_SESSION['login_user']."', 'outrun', 'maxSpeed', '$maxSpeed')";

  if(mysql_query($saveRoadWidth) != false){
    mysql_query($saveRoadWidth, $database);
  }
  else{
    $updateRoadWidth = "UPDATE gameconfig SET value='$roadWidth' WHERE parameter='roadWidth' AND gameName = 'outrun' AND profileName ='".$_SESSION['login_user']."'";
    mysql_query($updateRoadWidth, $database);
  }

  if(mysql_query($saveTotalCars) != false){
    mysql_query($saveTotalCars, $database);
  }
  else{
    $updateTotalCars = "UPDATE gameconfig SET value='$totalCars' WHERE parameter='totalCars' AND gameName = 'outrun' AND profileName ='".$_SESSION['login_user']."'";
    mysql_query($updateTotalCars, $database);
  }

  if(mysql_query($saveMaxSpeed) != false){
    mysql_query($saveMaxSpeed, $database);
  }
  else{
    $updateMaxSpeed = "UPDATE gameconfig SET value='$maxSpeed' WHERE parameter='maxSpeed' AND gameName = 'outrun' AND profileName ='".$_SESSION['login_user']."'";
    mysql_query($updateMaxSpeed, $database);
  }

}
else {
  $loadRoadWidth = "SELECT value FROM gameconfig WHERE parameter='roadWidth' AND gameName = 'outrun' AND profileName ='".$_SESSION['login_user']."' ";
  $loadTotalCars = "SELECT value FROM gameconfig WHERE parameter='totalCars' AND gameName = 'outrun' AND profileName ='".$_SESSION['login_user']."' ";
  $loadMaxSpeed = "SELECT value FROM gameconfig WHERE parameter='maxSpeed' AND gameName = 'outrun' AND profileName ='".$_SESSION['login_user']."' ";

  $resultLoadRoadWidth = mysql_query($loadRoadWidth, $database);
  $countResultLoadRoadWidth = mysql_num_rows($resultLoadRoadWidth);

  $resultLoadTotalCars = mysql_query($loadTotalCars, $database);
  $countResultLoadTotalCars = mysql_num_rows($resultLoadTotalCars);

  $resultLoadMaxSpeed = mysql_query($loadMaxSpeed, $database);
  $countResultLoadMaxSpeed = mysql_num_rows($resultLoadMaxSpeed);

  if($countResultLoadRoadWidth != 1){
    $roadWidth = 2000;
  }
  else{
    $resultRoadWidth = mysql_query($loadRoadWidth, $database);
    $rowRoadWidth = mysql_fetch_array($resultRoadWidth,MYSQLI_ASSOC);
    $roadWidth = $rowRoadWidth['value'];
  }

  if($countResultLoadTotalCars != 1){
    $totalCars = 100;
  }
  else{
    $resultTotalCars = mysql_query($loadTotalCars, $database);
    $rowTotalCars = mysql_fetch_array($resultTotalCars,MYSQLI_ASSOC);
    $totalCars = $rowTotalCars['value'];
  }

  if($countResultLoadMaxSpeed != 1){
    $maxSpeed = 6000;
  }
  else{
    $resultMaxSpeed = mysql_query($loadMaxSpeed, $database);
    $rowMaxSpeed = mysql_fetch_array($resultMaxSpeed,MYSQLI_ASSOC);
    $maxSpeed = $rowMaxSpeed['value'];
  }

}
?>
