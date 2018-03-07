<?php

session_start();
require "../connect.php";

$session = $_SESSION['user_id'];
$id = $_POST['item_id'];
$quantity = $_POST['item_quantity'];


// update the items for session cart variable
// $_SESSION['cart'][$id] = $quantity;

// update the total quantities of item to be purchased
// $_SESSION['item_count'] = array_sum($_SESSION['cart']);


$check = "SELECT * FROM cart WHERE product_id = $id";
$result = mysqli_query($conn, $check);

if (mysqli_num_rows($result) > 0) {
	$currentQty = mysqli_fetch_assoc($result);
	$quantity += $currentQty['quantity'];
	$sql = "UPDATE cart SET quantity = $quantity WHERE product_id = $id";
	mysqli_query($conn, $sql);
} else {
	$sql = "INSERT INTO cart (session_id, product_id, quantity) VALUES ('$session', '$id', '$quantity')";
	mysqli_query($conn, $sql);
}

$sql = "SELECT SUM(quantity) AS totalQuantity FROM cart WHERE session_id = '$session'";
$result = mysqli_query($conn, $sql);
$totalKgs = mysqli_fetch_assoc($result);
$msg = $totalKgs['totalQuantity']. 'kgs'; 
echo $msg;
$_SESSION['item_count'] = $msg;
// echo $_SESSION['item_count'] . 'kgs';

mysqli_close($conn);





