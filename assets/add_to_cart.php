<?php

session_start();
require "../connect.php";

$id = $_POST['item_id'];
$quantity = $_POST['item_quantity'];

// echo $id . ' ' . $quantity;

// update the items for session cart variable
$_SESSION['cart'][$id] = $quantity;

// update the total quantities of item to be purchased
// $_SESSION['item_count'] += $quantity;
$_SESSION['item_count'] = array_sum($_SESSION['cart']);

echo $_SESSION['item_count'];