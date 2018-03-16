<?php
require '../../connect.php';

$id = $_POST['user_id'];
$name = $_POST['name'];
$stock_price = $_POST['stock_price'];
$price_retail = $_POST['price_retail'];
$stocks_onhand = $_POST['stocks_onhand'];
$description = $_POST['description'];

$sql = "UPDATE products SET name = '$name', stock_price='$stock_price', price_retail='$price_retail', stocks_onhand='$stocks_onhand', description='$description' WHERE id='$id'";
mysqli_query($conn, $sql);

mysqli_close();
header('location: ../admin.php');