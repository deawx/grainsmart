<?php

session_start(); 
require 'connect.php';

if(!isset($_SESSION['login_user'])) {
	header('location: index.php');
} 


function getTitle() {
	echo 'Profile';
}

include 'partials/head.php';?>

</head>
<body>
	<!-- main header -->
	<?php include 'partials/main_header.php';
	?>

	<div class="container">
		<div class="row">
			<div class="col-lg-4 col-md-4">
				<div class="panel panel-default">
					<div class="panel-heading"><h4>Personal Information</h4></div>
					<div class="panel-body">
		<?php
		if(isset($_SESSION['login_user'])) {
			$email = $_SESSION['email'];
			$sql = "SELECT * FROM customers WHERE email = '$email'";				
			$result = mysqli_query($conn, $sql);
			
			while ($customer = mysqli_fetch_assoc($result)) {
				extract($customer);
				$date = strtotime($date_created);
				echo '<p><strong>Full Name: </strong>'. $first_name .' '. $last_name .'</p>';
				echo '<p><strong>Email Address: </strong>'. $email .'</p>';
				echo '<p><strong>Mobile Number: </strong> +63'. $sms .'</p>';
				echo '<p><strong>Delivery Address: </strong>'. $address .'</p>';
				echo '<p><strong>Account Creation Date: </strong>'. date("F d, Y", $date) .'</p>';
			}

		}
		?>
					</div>
					<div class="panel-heading clearfix">
						<div class="pull-right" style="text-align: right;">
							<p><a href="#editUserModal" data-toggle="modal" data-target="#editUserModal" data-index="<?php echo $id; ?>" id="editUser">Edit details</a></p>
							<p><a href="forgot-password.php">Change password</a></p>
						</div>
					</div>	
				</div>
			</div>
			<div class="col-lg-8 col-md-8">
				<div class="panel panel-default">
					<div class="panel-heading"><h4>Order History</h4></div>
					<div class="panel-body table-responsive">
						<table class="table table-striped">
							<thead>
							<th>Reference Code</th>
							<th>Date Created</th>
							<th>Expected Date of Delivery</th>
							<th>Delivery Status</th>
							<th>Action</th>
							</thead>
							<tbody>
								<?php
									$customerID = $_SESSION['user_id'];
									$sql = "SELECT o.id, o.reference_code, o.order_date, o.delivery_date, s.order_status FROM orders o INNER JOIN status s ON o.status_id = s.id WHERE customer_id = '$customerID'";				
									$result = mysqli_query($conn, $sql);
									
									while ($customer = mysqli_fetch_assoc($result)) {
										extract($customer);
										$order = strtotime($order_date);
										$delivery = strtotime($delivery_date);
										echo '
										<tr>
											<td><a href="orders.php?id='.$id.'">' . $reference_code . '</a></td>
											<td>'. date("F d, Y", $order) .'</td>
											<td>'. date("F d, Y", $delivery) .'</td>
											<td>'. $order_status .' </td>
											<td><a href="#">Cancel</a></td>
										</tr>
										';
									}
								?>
							</tbody>
							</table>	
					</div>
					<div class="panel-heading clearfix">
						<div class="pull-right" style="text-align: right;">
							<p><a href="track_order.php">Track Order</a></p>
						</div>
					</div>	
				</div>
			</div>
		</div>	<!-- //.row -->	
	</div>

	<!-- Edit Modal -->
	<div id="editUserModal" class="modal fade" role="dialog">
	  <div class="modal-dialog">
	  		
	    <!-- Modal content-->
	  	<form method="POST" action="assets/update_user.php">
	  	<input hidden name="user_id" value="<?php echo $id; ?>" style="display: none;">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	        <h4 class="modal-title">Edit Personal Details</h4>
	      </div>
	      <div id="editUserModalBody" class="modal-body">
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
	        <button type="submit" class="btn btn-green">Save</button>
	      </div>
	    </div>
	  	</form>

	  </div>
	</div>

	<!-- main footer -->
	<?php include 'partials/main_footer.php'; ?>

	<?php include 'partials/foot.php'; 
	mysqli_close($conn);
	?>

	<script type="text/javascript">
		$(document).ready(function(){
			$('#editUser').on('click',function(){
				var userID = $(this).data('index');
				
				$.get('assets/edit_user.php',
					{
						id: userID
					},
					function(data, status) {
						$('#editUserModalBody').html(data);
					});
			});

		});
	</script>

</body>
</html>