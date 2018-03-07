<?php

session_start(); 

require 'connect.php';

function getTitle() {
	echo 'Shopping';
}

include 'partials/head.php';?>

</head>
<body>

	<!-- main header -->
	<?php include 'partials/main_header.php'; ?>

	<?php
	// if (isset($_SESSION['login_user']) && !isset($_SESSION['order'])) {
	// 	$customer_id = $_SESSION['customer_id'];
	// 	$name = $_SESSION['login_user'] . ' ' . $_SESSION['last_name'];
	// 	$sms = $_SESSION['sms'];
	// 	$address = $_SESSION['address'];

	// $sql = "INSERT INTO `orders`(`id`, `customer_id`, `order_date`, `delivery_date`, `notes`, `name`, `contact_details`, `address`, `promotion_id`, `status_id`) VALUES (null, $customer_id, now(), null, null, $name, $sms, $address, 1, 1)";				
	// $result = mysqli_query($conn, $sql);

	// $order = "SELECT * FROM orders";

	// $_SESSION['order'];
	
	// }

	if (isset($_GET['category']) && $_GET['category']!='All') {
	$cat = $_GET['category'];

	if($cat=='Rice') {
		$query = "WHERE category_id = 1";
	} else if ($cat=='Meat') {
		$query = "WHERE category_id = 2";
	} else if ($cat=='Price: Low to High') {
		$query = "ORDER BY price_retail";
	} else if ($cat=='Price: High to Low') {
		$query = "ORDER BY price_retail DESC";
	}

	} else {
		$query = "";
	}

	$sort = array("0"=>"Price: Low to High", "1"=>"Price: High to Low", "2"=>"Rice", "3"=>"Meat");
	?>

	<form method="GET" id="myForm">	
		<select class="form-control" name="category" onchange="myForm()">
			<option>All</option>
			<?php
				foreach ($sort as $key => $value) {

					if ($value==$_GET['category']) {
						echo '<option selected>'.$value.'</option>';	
					} else {
						echo '<option>'.$value.'</option>';
					}
				}		
			?>
		</select>
	</form>

	
	
	<?php
	$sql = "select * from products $query";				
	$result = mysqli_query($conn, $sql);
	while($product = mysqli_fetch_assoc($result)){
		extract($product);
		echo '<div class="card" style="width: 20rem; display: inline-block;">
			<img class="img-responsive" src="'.$product_image.'">
			<div class="card-block">
			<h4 class="card-title"><strong>'.$name.'</strong></h4>
			<div class="card-text">PHP '.$price_retail.'</div>
			<div><input id="itemQuantity'.$id.'" type="text" name="quantity" value="1" size="2" /><input type="submit" value="Add to cart" class="btnAddAction" onclick="addToCart('.$id.')"/></div>
			</div>
		</div>';
	}
	?>

	<!-- main footer -->
	
	<?php include 'partials/main_footer.php'; ?>

	<?php include 'partials/foot.php';
		  mysqli_close($conn);
	 ?>

	 <script type="text/javascript">
	 	function myForm(){
	 		document.getElementById('myForm').submit();
	 	}

	 	function addToCart(itemId) {
	 		// console.log(itemId);
	 		var id = itemId;

	 		// retrieve value of item quantity
	 		var quantity = $('#itemQuantity' + id).val();
	 		console.log(quantity);

	 		// create a post request to update session cart variable
	 		$.post('assets/add_to_cart.php',
	 			{
	 				item_id: id,
	 				item_quantity: quantity 
	 			},
	 			function(data, status) {
	 				
 					$('.badge').html(data);
	 				console.log(data);
	 				// if(data == 'not') {
	 				// 	window.location='login.php';
	 				// } else {
	 				// }			
	 				

	 			});

	 	}
	 </script>
</body>
</html>