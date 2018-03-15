<?php

session_start();

require '../connect.php';  // Create a database connection

$email = $_POST['email'];
$password = sha1($_POST['password']);

$sql = "SELECT * FROM customers WHERE email='$email'";
$result = mysqli_query($conn, $sql);

$isLogInSuccessful = false;

if (mysqli_num_rows($result) > 0) {
    $customer = mysqli_fetch_assoc($result);

    if ($email == $customer['email'] && $password == $customer['password']) {
        if($customer['email_status']=='not verified') {
           $_SESSION['emailcode'] = $email; 
           header('location: ../activate_email.php?msg=<label class="text-danger">Your email address has not been verified yet. Click resend the code.</label>');
        } else {
            $isLogInSuccessful = true;
            $_SESSION['login_user'] = $customer['first_name'];
            $_SESSION['email'] = $customer['email'];
            $_SESSION['user_id'] = $customer['id'];
            if(isset($_SESSION['checkout'])) {
                header('location: ../checkout.php');
            } else {
                header('location: ../home.php'); 
            }
        }
            
        // $_SESSION['last_name'] = $customer['last_name'];
        // $_SESSION['email'] = $customer['email'];
        // $_SESSION['sms'] = $customer['sms'];
        // $_SESSION['address'] = $customer['address'];
    } else {
        header('location: ../login.php?msg=<label class="text-danger">Incorrect password!</label>');
    }
} else {
    header('location: ../register.php?msg=<label class="text-danger">Invalid email address! Register here!</label>');
}

mysqli_close($conn);
