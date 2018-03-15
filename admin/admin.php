<?php

session_start();



?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Responsive vertical menu navigation</title>
		<link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:700, 600,500,400,300' rel='stylesheet' type='text/css'>
		<!-- Import FavIcon -->
		<link rel="shortcut icon" href="../assets/image/favicon.ico" type="image/x-icon">
		<link rel="icon" href="../assets/images/favicon.ico" type="image/x-icon">
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
			<div class="logo">
				<img alt="Grainsmart Cainta" src="../assets/images/grainsmart.jpg">
			</div>
			<nav>
				<ul>
					<li class="active">
						<a href="#users">
							<span><i class="fa fa-user"></i></span>
							<span>Users</span>
						</a>
					</li>
					<li>
						<a href="#">
							<span><i class="fa fa-dropbox"></i></span>
							<span>Products</span>
						</a>
					</li>
					<li>
						<a href="#">
							<span><i class="fa fa-briefcase"></i></span>
							<span>Orders</span>
						</a>
					</li>
				</ul>
			</nav>
		</div>
		<div class="main-content">
			<div id="users">
				<div class="title">
					Users
				</div>
				<div class="main">
				</div>
			</div>
		</div>
	</body>
</html>