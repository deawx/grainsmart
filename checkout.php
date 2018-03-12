<?php

session_start();
require "connect.php"; 

function getTitle() {
	echo 'Checkout';
}

$url = parse_url($_SERVER['HTTP_REFERER']);
if(basename($url['path'])!='grocery_bag.php'){
	header('location: grocery_bag.php');	
}

include 'partials/head.php';

$login = 'style="display:visible;"';
$guest = 'style="display:visible;"';

if(isset($_SESSION['email'])) {
	$guest = 'style="display:none;"';
	$email = $_SESSION['email'];
	$sql = "SELECT * FROM customers WHERE email='$email'";
	$result = mysqli_query($conn, $sql);
} else {
	$login = 'style="display:none;"';
}

?>

</head>
<body>
	<!-- main header -->
	<?php include 'partials/main_header.php'; ?>

	<div class="container">
		<div class="row">
			<?php
				$sql = "SELECT products.id, products.product_image, products.name, products.price_retail, cart.quantity FROM cart INNER JOIN products ON cart.product_id=products.id";				
				$result2 = mysqli_query($conn, $sql);
				$totalAmount = 0;
			?>
			<div class="col-md-5">
				<div class="panel panel-default">
				  <div class="panel-heading">
				    <h3 class="panel-title">Order Summary</h3>
				  </div>
				  <div class="panel-body">
				  	<div class="table-responsive"> 
					    <table class="table table-striped table-condensed table-responsive">
					    	<thead>
					    		<th>Product</th>
					    		<th>Quantity</th>
					    		<th>Subtotal</th>
					    	</thead>
					    	<tbody>
					    		<?php
					    		
					    		while ($product = mysqli_fetch_assoc($result2)) {
					    			extract($product);
					    			$subtotal = $price_retail * $quantity;
					    			$totalAmount += $subtotal;
					    			echo '
					    			<tr>
					    				<td><strong>'.$name.'</strong></br>PHP <span id="itemPrice'.$id.'">'.$price_retail.'</span></td>
					    				<td>'.$quantity.' (kg)</td>
					    				<td>PHP <span id="price'.$id.'">'.number_format($subtotal).'</span></td>
					    			</tr>
					    			';
					    		}
					    		?>
					    	</tbody>
					    </table>
					</div>
					<?php echo '<div class="text-right"><h3> Total: PHP '.number_format($totalAmount).'</h3>';
					echo '<small>Total weight: '.$_SESSION['item_count'].'</small></div>';?>	
				  </div>
				</div>
			</div>

				<div class="col-md-7" <?php echo $login; ?>>
						<div class="panel panel-default">
						  <div class="panel-heading">
						    <h3 class="panel-title">Shipping Details</h3>
						  </div>
						  <div class="panel-body">
						    <p><a href="profile.php">Edit shipping details?</a></p>
						    <?php
						    $customer = mysqli_fetch_assoc($result);
						    extract($customer);
						    echo 'Name: '.ucfirst($first_name).' '.ucfirst($last_name).'</br>';
						    echo 'Email: '.$email.'</br>';
						    echo 'Mobile #: 0'.$sms.'</br>';
						    echo 'Delivery Address: '.$address;
						    ?>
						  </div>
						</div>
				<!-- <button type="button" class="btn btn-md btn-gold pull-right"><span class="glyphicon glyphicon-lock"></span><a href="order_confirmation.php"> Place your order</a></button> -->
				<a href="order_confirmation.php" class="btn btn-md btn-gold pull-right" role="button"><span class="glyphicon glyphicon-lock"></span> Place your order</a>
				</div>
				<div class="col-md-7" <?php echo $guest; ?>>
						<div class="panel panel-default">
						  <div class="panel-heading">
						    <h3 class="panel-title">Shipping Details</h3>
						  </div>
						  <div class="panel-body">
						  	<p>Registered customer?<a href="login.php"> Login here</a></p>
						  </div>
						</div>
				</div>
		</div>
	</div>

	<!-- main footer -->
	<?php include 'partials/main_footer.php'; 
	mysqli_close($conn);?>

	<?php include 'partials/foot.php'; ?>
</body>
</html>