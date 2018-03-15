<?php
session_start();

require '../connect.php';

$email = $_POST['email'];
$password = sha1($_POST['password']);
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$sms = $_POST['sms'];
$address = 'Not Specified';
$email_status = 'not verified';
$activation_code = md5(rand());
$token = md5($activation_code);

$_SESSION['email_activate'] = $email;

$sql = "INSERT INTO customers (email, password, first_name, last_name, sms, address, email_status, activation_code, token) VALUES ('$email', '$password', '$first_name', '$last_name', '$sms', '$address', '$email_status', '$activation_code', '$token')";

// $sql = "SELECT * FROM customers";

// Send query to database
$result = mysqli_query($conn, $sql);

require_once("send_code.php");

if(!$mail->Send()) {
	$message = '<label class="text-danger">Problem in sending activation code. Please try again later.</label>';
} else {
	$message = '<label class="text-success">Please check your email to verify your account.</label>';
}
// Check if create new user was successful
if ($result)
	header('location: ../activate_email.php?msg='.$message);
else
	die('Error: ' . $sql . '<br>' . mysqli_error($conn));

mysqli_close($conn);