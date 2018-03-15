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
	// var_dump($_SESSION['user_id']);

?>

</head>
<body>
	<!-- main header -->
	<?php include 'partials/main_header.php'; ?>
		<h1>Index Page</h1>
	<!-- main footer -->
	<?php include 'partials/main_footer.php'; ?>

	<?php include 'partials/foot.php'; ?>
</body>
</html>