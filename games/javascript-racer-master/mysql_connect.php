<?php

	//Set up mySQL
	//location of the server
	$db_server = "localhost";
	//database name
	$db_name = "bme3s02";
	//account
	$db_user = "root";
	//password
	$db_passwd = "";

	$database = mysqli_connect($db_server, $db_user, $db_passwd);

	//Database connection
	if(!@$database)
			die("Failed to connect to MySQL");

	//use UTF8 encoding
	mysqli_query($database, "SET NAMES utf8");

	//choose database
	if(!@mysqli_select_db($database, $db_name))
		die(mysqli_error($database));
?>
