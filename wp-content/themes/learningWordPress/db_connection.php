<?php
	// connect to DB
	// first define database connection parameters
	$servername = "localhost";
	$username = "rott";
	$password = "root"; // change to your password for the server
	$dbname = "rottenapples_db";

	// create connection
	$conn = new mysqli($servername, $username, $password, $dbname);

	//check connection
	if ($conn->connect_error) {
		// die("Connection faile: " . $conn->connect_error);
	}
?>