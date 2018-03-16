<?php
require '../../connect.php';

$id = $_GET['id'];
$sql = "SELECT * FROM products WHERE id = '$id'";
$result = mysqli_query($conn, $sql);
$product = mysqli_fetch_assoc($result);
extract($product);


echo 'Do you want to delete '.$name.'?<input hidden name="user_id" value="'.$id.'" style="display: none;">';

mysqli_close($conn);