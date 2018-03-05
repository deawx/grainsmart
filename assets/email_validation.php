<?php

require '../connect.php';

$email = $_POST['email'];
$sql = "select * from customers where email = '$email'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
echo'<span style="color:red">Email address has already existed!</span>';
}

mysqli_close($conn);