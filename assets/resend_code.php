<?php
session_start();
require '../connect.php';

$email = $_SESSION['emailcode'];
var_dump($email);
$sql = "SELECT * FROM customers WHERE email = '$email'";
$result = mysqli_query($conn, $sql);
$customer = mysqli_fetch_assoc($result);
extract($customer);

require("send_code.php");

if(!$mail->Send()) {
	$message = '<label class="text-danger">Problem in sending activation code. Please try again later.</label>';
} else {
	$message = '<label class="text-success">Your activation code is now in your mailbox! Kindly also check the spam folder.</label>';
}

if ($result)
	header('location: ../activate_email.php?msg='.$message);
else
	die('Error: ' . $sql . '<br>' . mysqli_error($conn));

mysqli_close($conn);
