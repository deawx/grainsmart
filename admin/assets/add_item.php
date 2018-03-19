<?php
require '../../connect.php';

$name = $_POST['name'];
$stock_price = $_POST['stock_price'];
$price_retail = $_POST['price_retail'];
$stocks_onhand = $_POST['stocks_onhand'];
$description = $_POST['description'];
$category = $_POST['category'];

$sql = "INSERT INTO products (name, category_id, stock_price, price_retail, stocks_onhand, description) VALUES ('$name', '$category', '$stock_price', '$price_retail', '$stocks_onhand', '$description')";
mysqli_query($conn, $sql);

mysqli_close($conn);
header('location: ../admin.php');