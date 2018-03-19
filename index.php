<?php

session_start(); 

require 'connect.php';

function getTitle() {
	echo 'Homepage';
}

include 'partials/head.php';


if(!isset($_SESSION['user_id']) && !isset($_SESSION['login_user'])) {
	$sql = "TRUNCATE cart";
	mysqli_query($conn, $sql);
	// create session variable
	$_SESSION['cart'] = array();

	// create session variable for item counter
	$_SESSION['item_count'] = '';
	$_SESSION['user_id'] = md5(rand());
}

?>

</head>
<body>
	<!-- main header -->
	<?php include 'partials/main_header.php'; ?>
	<img src="assets/images/grainsmart.gif" style="width: 100%;" height="400">
	<div class="container">
		<div class="row">
		<h2 class="text-center">Featured Products</h2>
			<?php
			$sql = "select * from products ORDER BY RAND() limit 6";				
			$result = mysqli_query($conn, $sql);
			while($product = mysqli_fetch_assoc($result)){
				extract($product);
				echo '<div class="col-lg-2 col-md-4 col-sm-3 col-xs-12">
				<div class="card text-center" style="width: 20rem; display: inline-block; margin:20px;">
					<img class="img-responsive" src="'.$product_image.'">
					<div class="card-block">
					<h4 class="card-title" id="itemName'.$id.'"><strong>'.$name.'</strong></h4>
					<div class="card-text"><strong><h5>PHP '.$price_retail.' per (kg)</h5></strong></div>
					</div>
				</div>
				</div>';
			}
		?>
		</div>
	</div>
		<div id="map" style="width:100%;height:400px;"></div>
	<!-- main footer -->
	<?php include 'partials/main_footer.php'; ?>

	<?php include 'partials/foot.php'; ?>

	<script type="text/javascript">
		function myMap() {
		        var uluru = {lat: 14.575450, lng: 121.120688};
		        var map = new google.maps.Map(document.getElementById('map'), {
		          zoom: 19,
		          center: uluru
		        });
		        var marker = new google.maps.Marker({
		          position: uluru,
		          map: map
		        });
		      }
	</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCEgqif99SxNk-yh_wQIypceds_xzoEI4U&callback=myMap"></script>
</body>
</html>