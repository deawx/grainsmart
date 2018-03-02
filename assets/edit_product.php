<?php

require '../connect.php';

$id = $_GET['id'];

$sql = "select * from products where id = '$id'";
$result = mysqli_query($conn, $sql);
$product = mysqli_fetch_assoc($result);
extract($product);

echo '
<div class="form-group">
	<label>Name</label>
	<input name="name" class="form-control" type="text" value="'.$name.'">

	<label>Stock Price</label>
	<input name="stock_price" class="form-control" type="text" value="'.$stock_price.'">

	<label>Price Retail</label>
	<input name="price_retail" class="form-control" type="text" value="'.$price_retail.'">

	<label>Stocks on Hand (Per Kilo)</label>
	<input name="stocks_onhand" class="form-control" type="text" value="'.$stocks_onhand.'">
';

mysqli_close($conn);