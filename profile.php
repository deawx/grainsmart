<?php

require 'connect.php'; 

session_start(); 

function getTitle() {
	echo 'Profile';
}

include 'partials/head.php';?>

</head>
<body>
	<!-- main header -->
	<?php include 'partials/main_header.php'; ?>

	<?php
	if(isset($_SESSION['current_user'])) {
		// echo '<h1>HELLO WORLD!</h1>' . $_SESSION['current_user'];
		$email = $_SESSION['email'];
		$sql = "select * from customers where email = '$email'";				
		$result = mysqli_query($conn, $sql);
		
		while ($customer = mysqli_fetch_assoc($result)) {
			extract($customer);
			echo $first_name .' '. $last_name .' '. $password;
		}


	} else {
		echo 'Please login';
	}

	?>

	<!-- main footer -->
	<?php include 'partials/main_footer.php'; ?>

	<?php include 'partials/foot.php'; 
	mysqli_close($conn);
	?>

</body>
</html>