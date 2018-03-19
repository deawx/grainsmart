<?php
session_start();
require '../connect.php';

if (isset($_GET['ck'])) {
	$message = $_GET['ck'];

} else {
	$message = '';
}

if($message==1) {
	$_SESSION['fromckout'] = 'checkout';
}

$id = $_GET['id'];

$sql = "select * from customers where id = '$id'";
$result = mysqli_query($conn, $sql);
$customer = mysqli_fetch_assoc($result);
extract($customer);

echo '
				<div class="row">
  				<div class="form-group col-lg-6 col-md-6">
	  				<label for="first_name">First Name</label>
	  				<div class="input-group">
	  					<div class="input-group-addon addon-dif-color">
							<span class="glyphicon glyphicon-user"></span>
						</div>
	  					<input type="text" class="form-control" name="first_name" id="first_name" value="'.$first_name.'" required>
	  				</div>
  				</div>

  				<div class="form-group col-lg-6 col-md-6">
	  				<label for="last_name">Last Name</label>
	  				<div class="input-group">
	  					<div class="input-group-addon addon-dif-color">
							<span class="glyphicon glyphicon-user"></span>
						</div>
	  					<input type="text" class="form-control" name="last_name" id="last_name" value="'.$last_name.'" required>
	  				</div>
  				</div>
  				</div>

  				<div class="form-group">
	  				<label for="email">Email Address</label>
			  		<div class="input-group">
			  			<div class="input-group-addon addon-dif-color">
							<span class="glyphicon glyphicon-envelope"></span>
						</div>
			  			<input type="email" class="form-control" name="email" id="email" value="'.$email.'" readonly="true">
			  		</div>
		  		</div>

		  		<div class="form-group">
		  			<label for="sms">Mobile Number</label>
			  		<div class="input-group">
			  			<div class="input-group-addon addon-dif-color">
							+63
						</div>
			  			<input type="number" max="9999999999" min="9000000000" class="form-control" name="sms" id="sms" value="'.$sms.'" required>
			  		</div>
		  		</div>

		  		<div class="form-group">
		  			<label for="address">Complete Address</label>
			  		<div class="input-group">
			  			<div class="input-group-addon addon-dif-color">
							<span class="glyphicon glyphicon-home"></span>
						</div>
			  			<textarea type="text" class="form-control" name="address" id="address" rows="3" style="resize: none;" required>'.$address.'</textarea>
			  		</div>
		  		</div>

';

mysqli_close($conn);