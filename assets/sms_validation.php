<?php

require '../connect.php';

$sms = $_POST['sms'];
$sql = "select * from customers where sms = '$sms'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
echo'<span style="color:red">Mobile number has already been used! Please use other mobile number!</span>';
}

mysqli_close($conn);