<?php 

session_start();

function getTitle() {
	echo 'Order Confirmation';
}

if (isset($_GET['msg'])) {
	$message = $_GET['msg'];

} else {
	$message = '';
}

function referenceNumberGenerator() {
    $ref_number = '';
    
    $source = array('1', '2', '3', '4', '5', '6', '7', '8', '9', 'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z');
    
    for ($i = 0; $i < 6; $i++) {
        $index = rand(0, 33); // Generate random number
        
        // Append random character
        $ref_number = $ref_number . $source[$index];
    }
    $today = date("md");
    return $today . $ref_number;

    // return $ref_number;
}

$reference = referenceNumberGenerator();

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
				        echo '<div>'.$message.'</div>';
				     ?>
				</div>
				<div class="panel panel-default">	
					<div class="panel-heading"><h4>Order Confirmation</h4></div>
						<div class="panel-body">
							<p id="refNumber"><?php echo $reference;?></p>
						</div> <!-- //.panel-body -->
					<div class="panel-heading">
						<p>Forgot your password? <a href="forgot-password.php">Click here</a></p>
						<p>Create new account? <a href="register.php">Register here!</a></p>
					</div>		
				</div> <!-- //.panel -->
			</div> <!-- //.col -->
		</div> <!-- //.row -->
	</div> <!-- //.container -->

	<!-- main footer -->
	<?php include 'partials/main_footer.php'; ?>

	<?php include 'partials/foot.php'; ?>

	<script type="text/javascript">
		// function referenceNumber() {
		//     var ref_number = '';
		    
		//     var source = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z');
		    
		//     for (var i = 0; i < 6; i++) {
		//         var index = rand(0, 3); // Generate random number
		        
		//         // Append random character
		//         ref_number = ref_number + source[index];
		//     }
		//     alert('hello');
		//     return ref_number;
		// }

		// document.getElementById('refNumber').innerHTML = referenceNumber();
	</script>
</body>
</html>