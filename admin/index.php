<?php 

session_start();

function getTitle() {
	echo 'Admin Login';
}

include 'partials/head.php';?>

</head>
<body>

	<div class="container">
		<div class="row">
			<div class="col-lg-4 col-md-4 col-centered vertical-center">
				<div class="panel panel-default">	
					<div class="panel-heading btn-green"><h4 style="color: #fff;">Admin</h4></div>
						<div class="panel-body">
							<form method="post" id="login_form" action="authenticate.php">
								<div class="form-group">
									<label for="admin">Username</label>
									<div class="input-group">
											<div class="input-group-addon addon-dif-color">
												<span class="glyphicon glyphicon-user"></span>
											</div>
									<input type="text" class="form-control" name="admin" id="admin" autocomplete="new-password" required>
									</div>
									<small id="chkUsr" class="form-text text-muted"></small>
								</div>

								<div class="form-group">
									<label for="password">Password</label>
										<div class="input-group">
												<div class="input-group-addon addon-dif-color">
													<span class="glyphicon glyphicon-lock"></span>
												</div>
										<input type="password" class="form-control" id="password" name="password" autocomplete="new-password" required>
										</div>
								</div>
								
								<button type="submit" name="login" class="btn btn-green pull-right">Sign in</button>	
							
							</form>
							<p><a href="../index.php">Back to homepage</a></p>
						</div> <!-- //.panel-body -->

				</div> <!-- //.panel -->

			</div> <!-- //.col -->

		</div> <!-- //.row -->
	</div>

	<?php include 'partials/foot.php'; ?>
</body>
</html>	