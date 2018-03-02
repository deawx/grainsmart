<?php

require 'connect.php'; 

function getTitle() {
	echo 'Products';
}

include 'partials/head.php';?>

</head>
<body>
	<!-- main header -->
	<?php include 'partials/main_header.php'; ?>

	<table class="table table-striped">
		<th>Product Name</th>
		<th>Stock Price</th>
		<th>Retail Price</th>
		<th>Stocks on Hand (Per Kilo)</th>
		<th>Action</th>
	
	<?php
	$sql = "select * from products";				
	$result = mysqli_query($conn, $sql);

	//var_dump($result);

	while ($product = mysqli_fetch_assoc($result)) {
		extract($product);
		echo '
		<tr>
			<td><a href="item.php?id='.$name.'">' . $name . '</a></td>
			<td>PHP '. $stock_price .'</td>
			<td>PHP '. $price_retail .'</td>
			<td>'. $stocks_onhand .' kgs </td>
			<td> <button type="button" class="btn btn-default btn-sm btn-info editProduct" data-toggle="modal" data-target="#editProductModal" data-index="'.$id.'"><span class="glyphicon glyphicon-cog"></span></button>
				<button type="button" class="btn btn-default btn-sm btn-danger"><span class="glyphicon glyphicon-remove"></span></button></td>
		</tr>
		';
	}

	?>
	</table>

	<!-- Modal -->
	<div class="modal fade" id="editProductModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	  <div class="modal-dialog modal-dialog-centered" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title">Do you want to edit Malagkit?</h5>
	      </div>
	      <div class="modal-body" id="editProductModalBody">
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
	        <button type="button" class="btn btn-primary">Save changes</button>
	      </div>
	    </div>
	  </div>
	</div>

	<!-- main footer -->
	<?php include 'partials/main_footer.php'; ?>

	<?php include 'partials/foot.php';

	mysqli_close($conn);
	 
	?>

	<script type="text/javascript">
		$(document).ready(function(){
			$('.editProduct').on('click', function(){
				var productID = $(this).data('index');
				
				$.get('assets/edit_product.php',
					{
						id: productID
					},
					function(data, status) {
						$('#editProductModalBody').html(data);
						// alert(data);
					});
			});
		});
	</script>
</body>
</html>