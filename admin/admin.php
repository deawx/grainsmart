<?php

session_start();

if($_SESSION['role'] != 'admin') {
	header('location: index.php');
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
<!-- 			<div class="logo">
				<img alt="Grainsmart Cainta" src="../assets/images/grainsmart.jpg">
			</div> -->

			<div class="profile text-center">
				<img alt="Grainsmart Cainta" src="../assets/images/grainsmart.jpg" class="img-responsive">
				<img alt="Profile Pic" src="../assets/images/profile.png" class="img-responsive" height="150" width="150">
				<h4>Welcome, <?php echo $_SESSION['admin_name'];?>!</h4>
			</div>
			<nav>
				<ul id="myid">
					<li class="sidebar active" id="li_users">
						<a href="#">
							<span><i class="fa fa-user"></i></span>
							<span>Users</span>
						</a>
					</li>
					<li class="sidebar" id="li_settings">
						<a href="#">
							<span><i class="fa fa-gear"></i></span>
							<span>Settings</span>
						</a>
					</li>
					<li class="sidebar" id="li_products">
						<a href="#">
							<span><i class="fa fa-dropbox"></i></span>
							<span>Products</span>
						</a>
					</li>
					<li class="sidebar" id="li_orders">
						<a href="#">
							<span><i class="fa fa-briefcase"></i></span>
							<span>Orders</span>
						</a>
					</li>
					<li class="sidebar" id="li_logout">
						<a href="logout.php">
							<span><i class="fa fa-power-off"></i></span>
							<span>Log Out</span>
						</a>
					</li>
				</ul>
			</nav>
		</div>
		<div class="main-content">
			<div id="div_users">
				<div class="title">
					<span><i class="fa fa-user"></i></span> Users
				</div>
				<div class="main">
				</div>
			</div>
			<div id="div_settings">
				<div class="title">
					<span><i class="fa fa-gear"></i></span> Settings
				</div>
				<div class="main">
				</div>
			</div>
		</div>


		<script type="text/javascript">
			$(document).ready(function(){
				// $('#div_settings').hide();

				// $('#li_settings').click(function() {
				// 	$('#div_settings').show('show');
				// 	$('#div_users').hide();	
				// });

				// $('#li_users').on('click', function() {
				// 	$('#div_settings').hide();
				// 	$('#div_users').show('slow');	
				// });

				$(document).on('click', '#myid li', function () {
					// $try = this.id;
					// alert($try);
					// $('').addClass('active');
					// $($try).toggle('active');

					var elements = document.querySelectorAll('.sidebar');
					// console.log(elements);

					elements.forEach(function (value, key) {
						value.classList.remove('active');
					});

					this.classList.toggle('active');
				});
			})
		</script>
	</body>
</html>