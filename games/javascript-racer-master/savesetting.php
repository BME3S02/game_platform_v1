<?php
session_start();
include("mysql_connect.php");

if(isset($_GET['roadWidth']) || isset($_GET['totalCars']) || isset($_GET['maxSpeed']) || isset($_GET['backgroundImg'])|| isset($_GET['sprites'])){

  $roadWidth = $_GET['roadWidth'];
  $totalCars = $_GET['totalCars'];
  $maxSpeed = $_GET['maxSpeed'];
  $backgroundImg = $_GET['backgroundImg'];
  $sprites = $_GET['sprites'];

  $saveRoadWidth = "INSERT INTO gameconfig (profileName, gameName, parameter, value) VALUES ('".$_SESSION['login_user']."', 'outrun', 'roadWidth', '$roadWidth')";
  $saveTotalCars = "INSERT INTO gameconfig (profileName, gameName, parameter, value) VALUES ('".$_SESSION['login_user']."', 'outrun', 'totalCars', '$totalCars')";
  $saveMaxSpeed = "INSERT INTO gameconfig (profileName, gameName, parameter, value) VALUES ('".$_SESSION['login_user']."', 'outrun', 'maxSpeed', '$maxSpeed')";
  //$saveBackgroundImg = "INSERT INTO gameconfig (profileName, gameName, parameter, value) VALUES ('".$_SESSION['login_user']."', 'outrun', 'backgroundImg', '$backgroundImg')";
  //$saveSprites = "INSERT INTO gameconfig (profileName, gameName, parameter, value) VALUES ('".$_SESSION['login_user']."', 'outrun', 'sprites', '$backgroundImg')";

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

//  if(mysql_query($saveBackgroundImg) != false){
//    mysql_query($saveBackgroundImg, $database);
//  }
//  else{
//    $updateBackgroundImg = "UPDATE gameconfig SET value='$backgroundImg' WHERE parameter='backgroundImg' AND gameName = 'outrun' AND profileName ='".$_SESSION['login_user']."'";
//    mysql_query($updateBackgroundImg, $database);
//  }

//  if(mysql_query($saveSprites) != false){
//    mysql_query($saveSprites, $database);
//  }
//  else{
//    $updateSprites = "UPDATE gameconfig SET value='$sprites' WHERE parameter='sprites' AND gameName = 'outrun' AND profileName ='".$_SESSION['login_user']."'";
//    mysql_query($updateSprites, $database);
//  }


}
else {
  $loadRoadWidth = "SELECT value FROM gameconfig WHERE parameter='roadWidth' AND gameName = 'outrun' AND profileName ='".$_SESSION['login_user']."' ";
  $loadTotalCars = "SELECT value FROM gameconfig WHERE parameter='totalCars' AND gameName = 'outrun' AND profileName ='".$_SESSION['login_user']."' ";
  $loadMaxSpeed = "SELECT value FROM gameconfig WHERE parameter='maxSpeed' AND gameName = 'outrun' AND profileName ='".$_SESSION['login_user']."' ";
//  $loadBackgroundImg = "SELECT value FROM gameconfig WHERE parameter='backgroundImg' AND gameName = 'outrun' AND profileName ='".$_SESSION['login_user']."' ";
//  $loadSprites = "SELECT value FROM gameconfig WHERE parameter='sprites' AND gameName = 'outrun' AND profileName ='".$_SESSION['login_user']."' ";

  $resultLoadRoadWidth = mysql_query($loadRoadWidth, $database);
  $countResultLoadRoadWidth = mysql_num_rows($resultLoadRoadWidth);

  $resultLoadTotalCars = mysql_query($loadTotalCars, $database);
  $countResultLoadTotalCars = mysql_num_rows($resultLoadTotalCars);

  $resultLoadMaxSpeed = mysql_query($loadMaxSpeed, $database);
  $countResultLoadMaxSpeed = mysql_num_rows($resultLoadMaxSpeed);

//  $resultLoadBackgroundImg = mysql_query($loadBackgroundImg, $database);
//  $countResultLoadBackgroundImg = mysql_num_rows($resultLoadBackgroundImg);

//  $resultLoadSprites = mysql_query($loadSprites, $database);
//  $countResultLoadSprites = mysql_num_rows($resultLoadSprites);

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

//  if($countResultLoadBackgroundImg != 1){
//    $backgroundImg = "background1";
//  }
//  else{
//    $resultBackgroundImg = mysql_query($loadBackgroundImg, $database);
//    $rowBackgroundImg = mysql_fetch_array($resultBackgroundImg,MYSQLI_ASSOC);
//    $backgroundImg = $rowBackgroundImg['value'];
//  }

//  if($countResultLoadSprites != 1){
//    $sprites = "sprites1";
//  }
//  else{
//    $resultSprites = mysql_query($loadSprites, $database);
//    $rowSprites = mysql_fetch_array($resultSprites,MYSQLI_ASSOC);
//    $sprites = $rowSprites['value'];
//  }

}
?>
