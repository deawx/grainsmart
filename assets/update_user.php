<?php
session_start();
require "../connect.php";

$email = $_POST['email'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$sms = $_POST['sms'];
$address = $_POST['address'];

$sql = "UPDATE customers SET first_name = '$first_name', last_name = '$last_name', sms = '$sms', address = '$address' WHERE email = '$email'";
mysqli_query($conn, $sql);

mysqli_close($conn);

if(isset($_SESSION['fromckout'])) {
unset($_SESSION['fromckout']);
header('location: ../checkout.php');
} else {
header('location: ../profile.php');	
}