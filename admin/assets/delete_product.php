<?php
require '../../connect.php';

$id = $_POST['user_id'];

$sql = "DELETE FROM products WHERE id = '$id'";
mysqli_query($conn, $sql);
mysqli_close();
header('location: ../admin.php');