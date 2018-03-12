<?php

session_start();

require 'connect.php';  

function getTitle() {
	echo 'Grocery Bag';
}

include 'partials/head.php';

$sql = "SELECT products.id, products.product_image, products.name, products.price_retail, cart.quantity FROM cart INNER JOIN products ON cart.product_id=products.id";				
$result = mysqli_query($conn, $sql);
$totalAmount = 0;

?>

</head>
<body>
	<!-- main header -->
	<?php include 'partials/main_header.php'; ?>
	<div id="cartIsEmpty" class="container">
	<?php 
	if(mysqli_num_rows($result) == 0) {
		echo '<h1>Your cart is empty!</h1>';
		echo '<h2><a href="products.php">Buy aweseome goods here!</a></h2>';
	} else {
	
	?>
		<table class="table table-striped table-responsive">
			<thead class="btn-green">
				<th>Product Image</th>
				<th>Product Name</th>
				<th>Retail Price</th>
				<th>Quantity</th>
				<th>Subtotal</th>
				<th>Action</th>
			</thead>
			<tbody>
		<?php
		
		while ($product = mysqli_fetch_assoc($result)) {
			extract($product);
			$subtotal = $price_retail * $quantity;
			$totalAmount += $subtotal;
			echo '
			<tr>
				<td><img src="'.$product_image.'" width="100" height="100"></td>
				<td>'.$name.'</td>
				<td>PHP <span id="itemPrice'.$id.'">'.$price_retail.'</span></td>
				<td><input type="number" value="'.$quantity.'" oninput="updateSubtotal('.$id.',this.value)" min="1"></td>
				<td>PHP <span id="price'.$id.'">'.number_format($subtotal).'</span></td>
				<td><button type="button" class="btn btn-sm btn-danger delete" onclick="removeItem('.$id.')"><span class="glyphicon glyphicon-remove"></span></button></td>
			</tr>
			';
		}


		?>
		</tbody>
		</table>

		<div class="text-right">
			<h3>The total amount is PHP <span id="totalAmount"><?php echo number_format($totalAmount); ?></span></h3>
			<button type="button" class="btn btn-gold"  onclick="window.location.href = 'checkout.php';"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> Proceed to checkout?</button>
		</div>

	<!-- main footer -->
	<?php } echo '</div>'; 
	include 'partials/main_footer.php'; ?>

	<?php include 'partials/foot.php';
	mysqli_close($conn); ?>

	<script type="text/javascript">
		$('table').on('click','.delete',function(){
		$(this).parents('tr').remove();
		});

		function removeItem(itemId) {
	 		var id = itemId;
	 		$.get('assets/remove_cart.php',
	 			{
	 				item_id: id
	 			},
	 			function(data, status) {

 					$('.badge').html(data);
 					if(data==' (kg)'){
 						$('#cartIsEmpty').html('');
 						$('#cartIsEmpty').load(window.location.href +' #cartIsEmpty');
 					} else {
	 					$('#totalAmount').load(window.location.href +' #totalAmount');
 						
 					}			
	 			});

	 	}

	 	function updateSubtotal(changeSubtotal, valueQuantity) {
	 		var id = changeSubtotal;
	 		var itemQuantity = valueQuantity;
	 		var amount = $('#itemPrice' + id).html();

	 		// amount = amount.replace(",", "");
	 		$('#price'+ id).html((valueQuantity*amount).toLocaleString());
	 		
	 		$.get('assets/update_cart.php',
	 		{

	 			item_id: id,
	 			item_quantity: itemQuantity
	 		},
	 		function(data, status) {
	 			//console.log(data);

	 			$('.badge').html(data);
		 		$('#totalAmount').load(window.location.href +' #totalAmount');
	 		}
	 		);

	 		// compute();
	 	}
	</script>
</body>
</html>