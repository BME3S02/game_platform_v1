<?php
session_start();
include("mysql_connect.php");

if(isset($_GET['roadWidth']) || isset($_GET['totalCars']) || isset($_GET['maxSpeed']) || isset($_GET['maxTime']) || isset($_GET['backgroundImg'])|| isset($_GET['sprites'])){

  $roadWidth = $_GET['roadWidth'];
  $totalCars = $_GET['totalCars'];
  $maxSpeed = $_GET['maxSpeed'];
  $maxTime = $_GET['maxTime'];
  $backgroundImg = $_GET['backgroundImg'];
  $sprites = $_GET['sprites'];

  $saveRoadWidth = "INSERT INTO gameconfig (profileName, gameName, parameter, value) VALUES ('".$_SESSION['login_user']."', 'outrun', 'roadWidth', '$roadWidth')";
  $saveTotalCars = "INSERT INTO gameconfig (profileName, gameName, parameter, value) VALUES ('".$_SESSION['login_user']."', 'outrun', 'totalCars', '$totalCars')";
  $saveMaxSpeed = "INSERT INTO gameconfig (profileName, gameName, parameter, value) VALUES ('".$_SESSION['login_user']."', 'outrun', 'maxSpeed', '$maxSpeed')";
  //$saveBackgroundImg = "INSERT INTO gameconfig (profileName, gameName, parameter, value) VALUES ('".$_SESSION['login_user']."', 'outrun', 'backgroundImg', '$backgroundImg')";
  //$saveSprites = "INSERT INTO gameconfig (profileName, gameName, parameter, value) VALUES ('".$_SESSION['login_user']."', 'outrun', 'sprites', '$backgroundImg')";

  if(mysqli_query($saveRoadWidth) != false){
    mysqli_query($saveRoadWidth);
  }
  else{
    $updateRoadWidth = "UPDATE gameconfig SET value='$roadWidth' WHERE parameter='roadWidth' AND gameName = 'outrun' AND profileName ='".$_SESSION['login_user']."'";
    mysqli_query($database, $updateRoadWidth);
  }

  if(mysqli_query($saveTotalCars) != false){
    mysqli_query($database, $saveTotalCars);
  }
  else{
    $updateTotalCars = "UPDATE gameconfig SET value='$totalCars' WHERE parameter='totalCars' AND gameName = 'outrun' AND profileName ='".$_SESSION['login_user']."'";
    mysqli_query($database, $updateTotalCars);
  }

  if(mysqli_query($saveMaxSpeed) != false){
    mysqli_query($database, $saveMaxSpeed);
  }
  else{
    $updateMaxSpeed = "UPDATE gameconfig SET value='$maxSpeed' WHERE parameter='maxSpeed' AND gameName = 'outrun' AND profileName ='".$_SESSION['login_user']."'";
    mysqli_query($database, $updateMaxSpeed);
  }

//  if(mysqli_query($database, $saveBackgroundImg) != false){
//    mysqli_query($database, $saveBackgroundImg);
//  }
//  else{
//    $updateBackgroundImg = "UPDATE gameconfig SET value='$backgroundImg' WHERE parameter='backgroundImg' AND gameName = 'outrun' AND profileName ='".$_SESSION['login_user']."'";
//    mysqli_query($database, $updateBackgroundImg);
//  }

//  if(mysqli_query($database, $saveSprites) != false){
//    mysqli_query($database, $saveSprites);
//  }
//  else{
//    $updateSprites = "UPDATE gameconfig SET value='$sprites' WHERE parameter='sprites' AND gameName = 'outrun' AND profileName ='".$_SESSION['login_user']."'";
//    mysqli_query($database, $updateSprites);
//  }


}
else {
  $loadRoadWidth = "SELECT value FROM gameconfig WHERE parameter='roadWidth' AND gameName = 'outrun' AND profileName ='".$_SESSION['login_user']."' ";
  $loadTotalCars = "SELECT value FROM gameconfig WHERE parameter='totalCars' AND gameName = 'outrun' AND profileName ='".$_SESSION['login_user']."' ";
  $loadMaxSpeed = "SELECT value FROM gameconfig WHERE parameter='maxSpeed' AND gameName = 'outrun' AND profileName ='".$_SESSION['login_user']."' ";
//  $loadBackgroundImg = "SELECT value FROM gameconfig WHERE parameter='backgroundImg' AND gameName = 'outrun' AND profileName ='".$_SESSION['login_user']."' ";
//  $loadSprites = "SELECT value FROM gameconfig WHERE parameter='sprites' AND gameName = 'outrun' AND profileName ='".$_SESSION['login_user']."' ";

  $resultLoadRoadWidth = mysqli_query($database, $loadRoadWidth);
  //echo $resultLoadRoadWidth;
  $countResultLoadRoadWidth = mysqli_num_rows($resultLoadRoadWidth);

  $resultLoadTotalCars = mysqli_query($database, $loadTotalCars);
  //echo $resultLoadTotalCars;
  $countResultLoadTotalCars = mysqli_num_rows($resultLoadTotalCars);

  $resultLoadMaxSpeed = mysqli_query($database, $loadMaxSpeed);
  //echo $resultLoadMaxSpeed;
  $countResultLoadMaxSpeed = mysqli_num_rows($resultLoadMaxSpeed);

//  $resultLoadBackgroundImg = mysqli_query($database, $loadBackgroundImg);
//  $countResultLoadBackgroundImg = mysqli_num_rows($resultLoadBackgroundImg);

//  $resultLoadSprites = mysqli_query($database, $loadSprites);
//  $countResultLoadSprites = mysqli_num_rows($resultLoadSprites);

  if($countResultLoadRoadWidth != 1){
    $roadWidth = 2000;
  }
  else{
    $resultRoadWidth = mysqli_query($database, $loadRoadWidth);
    $rowRoadWidth = mysqli_fetch_array($resultRoadWidth,MYSQLI_ASSOC);
    $roadWidth = $rowRoadWidth['value'];
  }

  if($countResultLoadTotalCars != 1){
    $totalCars = 100;
  }
  else{
    $resultTotalCars = mysqli_query($database, $loadTotalCars);
    $rowTotalCars = mysqli_fetch_array($resultTotalCars,MYSQLI_ASSOC);
    $totalCars = $rowTotalCars['value'];
  }

  if($countResultLoadMaxSpeed != 1){
    $maxSpeed = 6000;
  }
  else{
    $resultMaxSpeed = mysqli_query($database, $loadMaxSpeed);
    $rowMaxSpeed = mysqli_fetch_array($resultMaxSpeed,MYSQLI_ASSOC);
    $maxSpeed = $rowMaxSpeed['value'];
  }
  $maxTime = 60;

//  if($countResultLoadBackgroundImg != 1){
//    $backgroundImg = "background1";
//  }
//  else{
//    $resultBackgroundImg = mysqli_query($database, $loadBackgroundImg);
//    $rowBackgroundImg = mysqli_fetch_array($resultBackgroundImg,MYSQLI_ASSOC);
//    $backgroundImg = $rowBackgroundImg['value'];
//  }

//  if($countResultLoadSprites != 1){
//    $sprites = "sprites1";
//  }
//  else{
//    $resultSprites = mysqli_query($database, $loadSprites);
//    $rowSprites = mysqli_fetch_array($resultSprites,MYSQLI_ASSOC);
//    $sprites = $rowSprites['value'];
//  }

}
?>
