<?php

session_start();

require '../connect.php';  // Create a database connection

$email = $_POST['email'];
$password = sha1($_POST['password']);

$sql = "SELECT email, password, first_name FROM customers WHERE email='$email'";

$result = mysqli_query($conn, $sql);

$isLogInSuccessful = false;

if (mysqli_num_rows($result) > 0) {
    $customer = mysqli_fetch_assoc($result);

    if ($email == $customer['email'] && $password == $customer['password']) {
        $isLogInSuccessful = true;
        $_SESSION['login_user'] = $customer['first_name'];
        $_SESSION['email'] = $customer['email'];
    }
}

if ($isLogInSuccessful) {
    // if successful login
    header('location: ../home.php');
} else {
    // if failed login
    header('location: ../register.php');
}

mysqli_close($conn);
