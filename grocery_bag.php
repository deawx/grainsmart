<?php

session_start();

require 'connect.php';  

function getTitle() {
	echo 'Grocery Bag';
}

include 'partials/head.php';

?>

</head>
<body>
	<!-- main header -->
	<?php include 'partials/main_header.php'; ?>

	<table class="table table-striped">
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
	// $sql = "select * from cart";
	$sql = "SELECT products.id, products.product_image, products.name, products.price_retail, cart.quantity FROM cart INNER JOIN products ON cart.product_id=products.id";				
	$result = mysqli_query($conn, $sql);
	$totalAmount = 0;
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
	echo '<div class="pull-right">The total amount is PHP <span id="totalAmount">'.number_format($totalAmount).'</br></span>';
	echo '<button type="button" class="btn btn-success">Proceed to checkout?</button></div>';


	?>
	</tbody>
	</table>
	<!-- main footer -->
	<?php 
	
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
 					$('#totalAmount').load(window.location.href +' #totalAmount');
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