<?php
session_start();
require '../../connect.php';

$id = $_GET['id'];

$sql = "SELECT * FROM products WHERE id = '$id'";
$result = mysqli_query($conn, $sql);
$product = mysqli_fetch_assoc($result);
extract($product);

echo '
<div class="form-group">
	<input hidden name="user_id" value="'.$id.'">
	<label>Product Name</label>
	<input name="name" class="form-control" type="text" value="'.$name.'">
	</div>

	<div class="form-group">
	<label>Stock Price</label>
	<input name="stock_price" class="form-control" type="text" value="'.$stock_price.'">
	</div>

	<div class="form-group">	
	<label>Price Retail</label>
	<input name="price_retail" class="form-control" type="text" value="'.$price_retail.'">
	</div>

	<div class="form-group">
	<label>Stocks on Hand (Per Kilo)</label>
	<input name="stocks_onhand" class="form-control" type="text" value="'.$stocks_onhand.'">
	</div>

	<div class="form-group">
	<label>Description</label>
	<textarea type="text" class="form-control" name="description" rows="4" style="resize: none;" required>'.$description.'</textarea>
	</div>
';

mysqli_close($conn);