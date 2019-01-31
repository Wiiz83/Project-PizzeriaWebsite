<?php

	//Connection Informations
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "pizza";


	// Create connection
	$DBConnection = mysqli_connect($servername, $username, $password, $dbname);

	// Check connection
	if (!$DBConnection) {
		die("Database connection failed: " . mysqli_error());
		exit();
	}
