<?php

session_start(); 

function getTitle() {
	echo 'Homepage';
}

include 'partials/head.php';

// create session variable
$_SESSION['cart'] = array();

// create session variable for item counter
$_SESSION['item_count'] = 0;

?>

</head>
<body>
	<!-- main header -->
	<?php include 'partials/main_header.php'; ?>

	<?php
	if(isset($_SESSION['login_user'])) {
		echo '<h1>HELLO WORLD!</h1>' . $_SESSION['login_user'];
	} else {
		// header('location: login.php');
	}



	?>

	<!-- main footer -->
	<?php include 'partials/main_footer.php'; ?>

	<?php include 'partials/foot.php'; ?>
</body>
</html>