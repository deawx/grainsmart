<?php 

session_start();

function getTitle() {
	echo 'Order Confirmation';
}

if (isset($_GET['msg'])) {
	$message = $_GET['msg'];
	$notif = $_GET['notif'];
} else {
	$message = '';
	$notif = '';
}

include 'partials/head.php';?>

</head>
<body>
	<!-- main header -->
	<?php include 'partials/main_header.php'; ?>

	<div class="container">
		<div class="row">
			<div class="col-lg-6 col-md-6 col-centered">
				<div id="validation-message">
				    <?php
				        echo '<div></div>';
				     ?>
				</div>
				<div class="panel panel-default">	
					<div class="panel-heading"><h4>Order Confirmation</h4></div>
						<div class="panel-body text-center">
							<img src="assets/images/check.gif" class="img-responsive" width="150" style="margin: auto;"><br>
							<p id="refNumber">Congratulations! Your order is now waiting for confirmation.<br> Please take note of your reference code: <strong><?php echo $message?></strong></p>
							<p><?php echo $notif?></p>
						</div> <!-- //.panel-body -->
					<div class="panel-heading text-right">
						<p><a href="products.php">Buy more products</a></p>
						<p><a href="track_order.php">Track your order</a></p>
					</div>		
				</div> <!-- //.panel -->
			</div> <!-- //.col -->
		</div> <!-- //.row -->
	</div> <!-- //.container -->

	<!-- main footer -->
	<?php include 'partials/main_footer.php'; ?>

	<?php include 'partials/foot.php'; ?>
</body>
</html>