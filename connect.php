<?php


// Define required connection parameters
$hostname = 'localhost';
$username = 'root';
$password = '';
$db_name = 'grainsmart';

// Create a connection to database
$conn = mysqli_connect($hostname, $username, $password, $db_name);

if (!$conn)
	die('Connection failed: ' . mysqli_error($conn));


