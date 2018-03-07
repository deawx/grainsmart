<?php

session_start();
require "../connect.php";

$id = $_GET['item_id'];
$session = $_SESSION['user_id'];

$sql = "DELETE FROM cart WHERE product_id='$id'";
mysqli_query($conn, $sql);
$sql = "SELECT SUM(quantity) AS totalQuantity FROM cart WHERE session_id = '$session'";
$result = mysqli_query($conn, $sql);
$totalKgs = mysqli_fetch_assoc($result);
$msg = $totalKgs['totalQuantity']. 'kgs'; 
echo $msg;
$_SESSION['item_count'] = $msg;

mysqli_close($conn);