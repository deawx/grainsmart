<?php

session_start();
require '../connect.php'; 

if($_SESSION['role'] != 'admin') {
	header('location: index.php');
}

if (isset($_GET['msg'])) {
	$message = $_GET['msg'];

} else {
	$message = '';
}

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Grainsmart - Admin Dashboard</title>
		<link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:700, 600,500,400,300' rel='stylesheet' type='text/css'>
		<!-- Import FavIcon -->
		<link rel="shortcut icon" href="../assets/images/favicon.ico" type="image/x-icon">
		<link rel="icon" href="../assets/images/favicon.ico" type="image/x-icon">
		<!-- import bootstrap -->
		<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap-3.3.7-dist/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
		<link rel="stylesheet" type="text/css" href="../assets/css/style.css">
		<link rel="stylesheet" href="main.css">

		<script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>
		<script src="https://code.highcharts.com/highcharts.js"></script>
		<script src="https://code.highcharts.com/modules/data.js"></script>
		<script src="main.js"></script>

	</head>
	<body>
		<div class="header">
			<div class="logo">
				<img alt="Grainsmart Cainta" src="../assets/images/grainsmart.jpg">
			</div>
			<a href="#" class="nav-trigger"><span></span></a>
		</div>
		<div class="side-nav">
			<div class="logo">
				<img alt="Grainsmart Cainta" src="../assets/images/grainsmart.jpg">
			</div>

			<div class="profile text-center">
				<img alt="Grainsmart Cainta" src="../assets/images/grainsmart.jpg" class="img-responsive">
				<img alt="Profile Pic" src="../assets/images/profile.png" class="img-responsive" height="150" width="150">
				<h4>Welcome, <?php echo $_SESSION['admin_name'];?>!</h4>
			</div>
			<nav>
				<ul id="myid">
					<li class="sidebar active" id="_users">
						<a href="#">
							<span><i class="fa fa-user"></i></span>
							<span>Users</span>
						</a>
					</li>
					<li class="sidebar" id="_settings">
						<a href="#">
							<span><i class="fa fa-gear"></i></span>
							<span>Settings</span>
						</a>
					</li>
					<li class="sidebar" id="_products">
						<a href="#">
							<span><i class="fa fa-dropbox"></i></span>
							<span>Products</span>
						</a>
					</li>
					<li class="sidebar" id="_orders">
						<a href="#">
							<span><i class="fa fa-briefcase"></i></span>
							<span>Orders</span>
						</a>
					</li>
					<li>
						<a href="logout.php">
							<span><i class="fa fa-power-off"></i></span>
							<span>Log Out</span>
						</a>
					</li>
				</ul>
			</nav>
		</div>
		<div class="main-content">
			<div id="div_users" class="divy">
				<div class="title">
					<span><i class="fa fa-user"></i></span> Users
				</div>
				<div class="main">
					<div class="col-md-3">
					            <div id="imaginary_container"> 
					                <div class="input-group stylish-input-group">
					                    <input type="text" class="form-control"  placeholder="Search name" >
					                    <span class="input-group-addon">
					                        <button type="submit">
					                            <span class="glyphicon glyphicon-search"></span>
					                        </button>  
					                    </span>
					                </div>
					            </div>
					        </div>
				</div>
			</div>
			<div id="div_settings" class="divy" style="display: none;">
				<div class="title">
					<span><i class="fa fa-gear"></i></span> Settings
				</div>
				<div class="main">
				</div>
			</div>
			<div id="div_products" class="divy" style="display: none;">
				<div class="title">
					<span><i class="fa fa-dropbox"></i> Products</span>
				</div>
				<div class="main">
					<div class="col-md-3">
					            <div id="imaginary_container"> 
					                <div class="input-group stylish-input-group">
					                    <input type="text" class="form-control"  placeholder="Search for products" >
					                    <span class="input-group-addon">
					                        <button type="submit">
					                            <span class="glyphicon glyphicon-search"></span>
					                        </button>  
					                    </span>
					                </div>
					            </div>
					            <button type="button" class="btn btn-green pull-right addProduct" data-toggle="modal" data-target="#addProductModal" style="margin: 10px 0;">Add New Product</button>
					        </div>
					<div class="col-md-9">
					<div class="panel panel-default">
<!-- 					  <div class="panel-heading">
					    <h3 class="panel-title">Order Summary</h3>
					  </div> -->
					  <div class="panel-body">
					  	<div class=" text-center">
					<table class="table table-striped table-responsive">
						<thead id="stocksTable">
						<th>Product Name <span><i class="fa fa-sort"></i></span></th>
						<th>Stock Price <span><i class="fa fa-sort"></i></span></th>
						<th>Retail Price <span><i class="fa fa-sort"></i></span></th>
						<th>Stocks on Hand (Per Kilo) <span><i class="fa fa-sort"></i></span></th>
						<th>Action</th>
						</thead>
						<tbody>
					<?php
					$sql = "SELECT * FROM products";				
					$result = mysqli_query($conn, $sql);

					while ($product = mysqli_fetch_assoc($result)) {
						extract($product);
						echo '
						<tr>
							<td><a href="item.php?id='.$id.'">' . $name . '</a></td>
							<td>PHP '. $stock_price .'</td>
							<td>PHP '. $price_retail .'</td>
							<td>'. $stocks_onhand .' (kg) </td>
							<td> <button type="button" class="btn btn-default btn-sm btn-info editProduct" data-toggle="modal" data-target="#editProductModal" data-index="'.$id.'"><span class="glyphicon glyphicon-cog"></span></button>
								<button type="button" class="btn btn-default btn-sm btn-danger deleteItem" data-index="'.$id.'" data-toggle="modal" data-target="#deleteItemModal"><span class="glyphicon glyphicon-remove"></span></button></td>
						</tr>
						';
					}

					?>
					</tbody>
					</table>
				</div>
			</div> 
		</div>
	</div>
				</div>
			</div>

			<div id="div_orders" class="divy" style="display: none;">
				<div class="title">
					<span><i class="fa fa-briefcase"></i></span> Orders
				</div>
				<div class="main">
					<div class="col-md-3">
					            <div id="imaginary_container"> 
					                <div class="input-group stylish-input-group">
					                    <input type="text" class="form-control"  placeholder="Search reference code" >
					                    <span class="input-group-addon">
					                        <button type="submit">
					                            <span class="glyphicon glyphicon-search"></span>
					                        </button>  
					                    </span>
					                </div>
					            </div>
					        </div>
					<div class="col-md-9">
					<div class="panel panel-default">
<!-- 					  <div class="panel-heading">
					    <h3 class="panel-title">Order Summary</h3>
					  </div> -->
					  <div class="panel-body">
					  	<div class=" text-center">
					<table class="table table-striped table-responsive">
						<thead id="ordersTable">
						<th>Reference Code <span><i class="fa fa-sort"></i></span></th>
						<th>Order Date <span><i class="fa fa-sort"></i></span></th>
						<th>Delivery Date <span><i class="fa fa-sort"></i></span></th>
						<th>Status <span><i class="fa fa-sort"></i></span></th>
						</thead>
						<tbody>
							<?php
							$sql = "SELECT o.id, o.reference_code, o.order_date, o.delivery_date, s.order_status FROM orders o INNER JOIN status s ON o.status_id = s.id";				
							$result = mysqli_query($conn, $sql);

							while ($order_list = mysqli_fetch_assoc($result)) {
								extract($order_list);
								$order = strtotime($order_date);
								$delivery = strtotime($delivery_date);
								echo '
								<tr>
									<td><a href="orders.php?id='.$id.'">' . $reference_code . '</a></td>
									<td>'. date("F d, Y", $order) .'</td>
									<td>'. date("F d, Y", $delivery) .'</td>
									<td>'. $order_status .' </td>
								</tr>
								';
							}
							?>
						</tbody>
					</table>
				</div> <!-- //.text center -->
			</div> <!-- //.panel body -->
				</div> <!-- //.panel -->
			</div> <!-- //.col -->
		</div> <!-- //.main -->
	</div> <!-- //#div_orders -->

		<!-- Edit Product Modal -->
		<div class="modal fade" id="editProductModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		  <div class="modal-dialog modal-dialog-centered" role="document">
		  	<form method="POST" action="assets/update_item.php">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title">Edit product details</h5>
		      </div>
		      <div class="modal-body" id="editProductModalBody">
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
		        <button type="submit" class="btn btn-green">Save changes</button>
		      </div>
		    </div>
			</form>
		  </div>
		</div>

		<!-- Add Product Modal -->
		<div class="modal fade" id="addProductModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		  <div class="modal-dialog modal-dialog-centered" role="document">
		  	<form method="POST" action="assets/add_item.php">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title">Add product details</h5>
		      </div>
		      <div class="modal-body" id="addProductModalBody">
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
		        <button type="submit" class="btn btn-green">Save changes</button>
		      </div>
		    </div>
			</form>
		  </div>
		</div>

		<!-- Delete Modal -->
		<div id="deleteItemModal" class="modal fade" role="dialog">
		  <div class="modal-dialog">
		  		
		    <!-- Modal content-->
		  	<form method="POST" action="assets/delete_product.php">
		  	
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal">&times;</button>
		        <h4 class="modal-title">Delete Item</h4>
		      </div>
		      <div id="deleteUserModalBody" class="modal-body">
		      </div>
		      <div class="modal-footer">
		        <button type="submit" class="btn btn-danger">Yes</button>
		        <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
		      </div>
		    </div>
		  	</form>

		  </div>
		</div>

		<!-- import jquery -->
		<script type="text/javascript" src="../assets/lib/jquery-3.2.1.min.js"></script>

		<!-- import bootstrap.js -->
		<script type="text/javascript" src="../assets/css/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>

		<!-- import custom js -->
		<script type="text/javascript" src="../assets/js/script.js"></script>


		<script type="text/javascript">
			$(document).ready(function(){
				
				$(document).on('click', '#myid li', function () {
					$("#div"+this.id).show().siblings(".divy").hide();
					var elements = document.querySelectorAll('.sidebar');
					elements.forEach(function (value, key) {
						value.classList.remove('active');
					});
					this.classList.toggle('active');	
				});

				$('.editProduct').on('click', function(){
					var productID = $(this).data('index');
					
					$.get('assets/edit_product.php',
						{
							id: productID
						},
						function(data, status) {
							$('#editProductModalBody').html(data);
						});
				});

				$('.deleteItem').on('click', function () {
					var productID = $(this).data('index');
					$.get('assets/delete_item.php',
						{
							id: productID
						},
						function(data, status) {
							$('#deleteUserModalBody').html(data);
						});
				});

				$('.addProduct').on('click', function(){					
					$.get('assets/add_product.php',
						{
						},
						function(data, status) {
							$('#addProductModalBody').html(data);
						});
				});

			})
		</script>
	</body>
</html>