<?php

session_start(); 

function getTitle() {
	echo 'Tracking Order';
}

include 'partials/head.php';

$message = '';

if(!empty($_POST['ref-btn'])) {
	require "connect.php";

	$code = $_POST['reference-code'];
	$sql = "SELECT * FROM orders WHERE reference_code = '$code'";
	$result = mysqli_query($conn, $sql);

	if(mysqli_num_rows($result) > 0) {
		$res = mysqli_fetch_assoc($result);
		$status = $res['status_id'];
		$sql = "SELECT status.order_status FROM status INNER JOIN orders ON status.id = '$status'";
		$res2 = mysqli_query($conn, $sql);
		$stat = mysqli_fetch_assoc($res2);

		$message = '<p>Your order status is:</p><label class="text-success">'.$stat['order_status'].'</label>';

	} else {
		$message = '<label class="text-danger">No reference code found in our database.</label>';
	}

}

?>

</head>
<body>
	<?php include 'partials/main_header.php'; ?>

	<div class="container">
		<div class="row">
			<div class="col-lg-6 col-md-6 col-centered">
				<div class="panel panel-default">	
					<div class="panel-heading"><h4>Tracking Order</h4></div>
						<div class="panel-body">
							<form name="frmForgot" id="frmForgot" method="POST" onSubmit="return validate_forgot();">
									<div class="form-group">
									  	<p>Please input your reference code</p>
									  	<div><input type="text" name="reference-code" id="reference-code" class="form-control"></div>
									  </div>
									  <input type="submit"  name="ref-btn" id="ref-btn" class="btn btn-green pull-right" value="Submit">
							</form>
							<div id="results" style="clear: both;"><?php echo $message;?></div>	
						</div> <!-- //.panel-body -->
					<div class="panel-heading">
						<p><a href="products.php">Buy more products?</a></p>
						<p><a href="contact_us.php">Any suggestions?</a></p>
					</div>		
				</div> <!-- //.panel -->
			</div> <!-- //.col -->
		</div> <!-- //.row -->
	</div> <!-- //.container -->
	
	<?php include 'partials/main_footer.php'; ?>

	<?php include 'partials/foot.php'; ?>
</body>
</html>