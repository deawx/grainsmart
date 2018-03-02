<?php

require '../connect.php';

$email = $_POST['email'];
$password = sha1($_POST['password']);
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$sms = $_POST['sms'];
$address = 'Cainta';
$email_status = 'not verified';
$activation_code = md5(rand());
$date_created = date('Y-d-m');

$sql = "INSERT INTO customers (id, email, password, first_name, last_name, sms, address, email_status, activation_code, token, date_created) VALUES (null, '$email', '$password', '$first_name', '$last_name', '$sms', '$address', '$email_status', '$activation_code', null, '$date_created')";

// $sql = "SELECT * FROM customers";

// Send query to database
$result = mysqli_query($conn, $sql);

// Check if create new user was successful
if ($result)
	header('location: ../login.php');
else
	die('Error: ' . $sql . '<br>' . mysqli_error($conn));

mysqli_close($conn);