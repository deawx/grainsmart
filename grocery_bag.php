<?php

session_start(); 

function getTitle() {
	echo 'Grocery Bag';
}

include 'partials/head.php';

?>

</head>
<body>
	<!-- main header -->
	<?php include 'partials/main_header.php'; ?>

	<?php
	
	var_dump($_SESSION['cart']);


	?>

	<!-- main footer -->
	<?php include 'partials/main_footer.php'; ?>

	<?php include 'partials/foot.php'; ?>
</body>
</html>