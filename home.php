<?php

session_start(); 

function getTitle() {
	echo 'Homepage';
}

include 'partials/head.php';

?>

</head>
<body>
	<!-- main header -->
	<?php include 'partials/main_header.php'; ?>

	<?php
	if(isset($_SESSION['login_user'])) {
		$name = $_SESSION['login_user'] . ' ' . $_SESSION['last_name'];
		echo '<h1>HELLO WORLD!</h1>' . $name;
	} else {
		// header('location: index.php');
	}



	?>

	<!-- main footer -->
	<?php include 'partials/main_footer.php'; ?>

	<?php include 'partials/foot.php'; ?>
</body>
</html>