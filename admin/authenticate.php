<?php

session_start();

require '../connect.php';

$username = $_POST['admin'];
$password = sha1($_POST['password']);

$sql = "SELECT * FROM employee WHERE username='$username'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
	$employee = mysqli_fetch_assoc($result);
	if ($username == $employee['username'] && $password == $employee['password']) {
		$_SESSION['role'] = $employee['roles'];
		$_SESSION['admin_name'] = $employee['first_name'] . ' ' . $employee['last_name']; 
		header('location: admin.php'); 
	} else {
		header('location:index.php');
	}
}

mysqli_close($conn);	
