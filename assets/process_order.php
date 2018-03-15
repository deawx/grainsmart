<?php

session_start();
require '../connect.php';

function referenceNumberGenerator() {
    $ref_number = '';
    
    $source = array('1', '2', '3', '4', '5', '6', '7', '8', '9', 'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z');
    
    for ($i = 0; $i < 6; $i++) {
        $index = rand(0, 33); // Generate random number
        
        // Append random character
        $ref_number = $ref_number . $source[$index];
    }
    $today = date("md");
    return $today . $ref_number;
}

$reference = referenceNumberGenerator();

if(isset($_SESSION['login_user'])) {
	$customerID = $_SESSION['user_id'];
	$updateSession = "UPDATE cart SET session_id = '$customerID'";
	mysqli_query($conn, $updateSession);
	$sql = "SELECT customers.email, customers.first_name, customers.last_name, customers.sms, customers.address FROM cart INNER JOIN customers ON cart.session_id = customers.id";
	$result = mysqli_query($conn, $sql);
	$customer = mysqli_fetch_assoc($result);
	$name = $customer['first_name'] .' '. $customer['last_name'];
	$email = $customer['email'];
	$sms = $customer['sms'];
	$address = $customer['address'];
} else {
	$customerID = 1;
	$updateSession = "UPDATE cart SET session_id = '$customerID'";
	mysqli_query($conn, $updateSession);
	$name = $_POST['full_name'];
	$email = $_POST['email'];
	$sms = $_POST['sms'];
	$address = $_POST['address'];
}

$sql = "INSERT INTO orders (customer_id, reference_code, name, email, sms, address, delivery_date) VALUES ('$customerID', '$reference', '$name', '$email', '$sms', '$address', DATE_ADD(NOW(), INTERVAL 2 DAY))";
$test = mysqli_query($conn, $sql);

$sql = "SELECT id FROM orders WHERE customer_id = '$customerID' ORDER BY id DESC LIMIT 1"; //Get the last transaction
$result = mysqli_query($conn, $sql);
$res = mysqli_fetch_array($result);

$orderID = $res['id'];

$sql = "SELECT * FROM cart WHERE session_id = '$customerID'";
$result = mysqli_query($conn, $sql);
while ($cart = mysqli_fetch_array($result)) {
	
	$productID = $cart['product_id'];
	$quantity = $cart['quantity'];
	$sql2 = "INSERT INTO order_details (order_id, reference_code, product_id, quantity) VALUES ('$orderID', '$reference', '$productID', '$quantity')";
	$empty = mysqli_query($conn, $sql2);
	if($empty==1) {
		mysqli_query($conn, "DELETE FROM cart WHERE session_id = '$customerID'");
		$_SESSION['item_count'] = '';
	}

}

require_once("send_reference_code.php");

if(!$mail->Send()) {
	$message = '<label class="text-danger">Problem in sending reference code to your email.</label>';
} else {
	$message = 'The copy of your reference code has successfully been sent to <label class="text-success">'.$email.'</label>';
}

mysqli_close($conn);
header('location: ../order_confirmation.php?msg='.$reference.'&notif='.$message);