<?php

session_start();
require "../connect.php";

$id = $_GET['item_id'];
$quantity = $_GET['item_quantity'];
$session = $_SESSION['user_id'];

$sql = "UPDATE cart SET quantity = $quantity WHERE product_id = '$id'";
mysqli_query($conn, $sql);

$sql = "SELECT SUM(quantity) AS totalQuantity FROM cart WHERE session_id = '$session'";
$result = mysqli_query($conn, $sql);
$totalKgs = mysqli_fetch_assoc($result);
$msg = $totalKgs['totalQuantity']. 'kgs'; 
echo $msg;
$_SESSION['item_count'] = $msg;

mysqli_close($conn);