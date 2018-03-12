<?php 

session_start();
require 'connect.php';

// if(!isset($_SESSION['email_activate'])) {
// 	header('location: register.php');
// }

function getTitle() {
	echo 'Email Verification';
}

if (isset($_GET['msg'])) {
	$message = $_GET['msg'];

} else {
	$message = '';
}

if(isset($_POST['code-verify']) && !empty($_POST['code-verify'])) {
	unset($_SESSION['email_activate']);
	$code = $_POST['code-verify'];
	$query = "
		SELECT * FROM customers 
		WHERE activation_code = '$code'
	";
	$result = mysqli_query($conn, $query);

	if (mysqli_num_rows($result) > 0) {
		$user = mysqli_fetch_assoc($result);
		if($code==$user['activation_code']) {
			if($user['email_status'] == 'not verified') {
				$update_query = "
				UPDATE customers 
				SET email_status = 'verified' 
				WHERE id = '".$user['id']."'
				";
				$result = mysqli_query($conn, $update_query);
				$message = '<label class="text-success">You have successfully verified your email address! Welcome to Grainsmart Cainta!</label>';
				header('location: login.php?msg='.$message);
			} else {
				$message = '<label class="text-info">Your email address has already been verified!</label>';
				header('location: login.php?msg='.$message);
			}
		} else
			{
				$message = '<label class="text-danger">Invalid activation code!</label>';
				header('location: login.php?msg='.$message);
			}

	}

	 else {
		$message = "Error";
		header('location: login.php?msg='.$message);
	}
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
				        echo '<p>'.$message.'</p>';
				     ?>
				</div>
				<div class="panel panel-default">	
					<div class="panel-heading"><h4>Email Verification</h4></div>
						<div class="panel-body">
							<form method="POST" name="email-verify" id="email-verify">
								<div class="form-group">
								  	<p>Paste the activation code here</p>
								  	<div><input type="text" name="code-verify" id="code-verify" class="form-control"></div>
								</div>
								<input type="submit"  name="submit-code" id="submit-code" class="btn btn-green btn-block" value="Submit"> 	
							</form>
						</div> <!-- //.panel-body -->
					<div class="panel-heading">
						<p>Resend the code? <a href="assets/resend_code.php">Click here</a></p>
						<p>Create new account? <a href="register.php">Register here!</a></p>
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