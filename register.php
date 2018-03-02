<?php 

function getTitle() {
	echo 'Register';
}

include 'partials/head.php';?>



</head>
<body>
	<!-- main header -->
	<?php include 'partials/main_header.php'; ?>

<!-- 	<div class="container"> -->
		<div class="row">
			<div class="col-lg-6 col-md-6 col-sm-8 col-centered">
				<div class="panel panel-default">	
					<div class="panel-heading"><h4>Sign up</h4></div>
						<div class="panel-body">

							<form method="post" id="registrationForm" action="assets/registration.php">
								<div class="row">
									<div class="form-group col-lg-6 col-md-6">
										<label for="first_name">First Name</label>
										<div class="input-group">
											<div class="input-group-addon addon-dif-color">
												<span class="glyphicon glyphicon-user"></span>
											</div>
											<input type="text" class="form-control" name="first_name" id="first_name" required>
										</div>
									</div>

									<div class="form-group col-lg-6 col-md-6">
										<label for="last_name">Last Name</label>
										<div class="input-group">
											<div class="input-group-addon addon-dif-color">
												<span class="glyphicon glyphicon-user"></span>
											</div>
										<input type="text" class="form-control" name="last_name" id="last_name" required>
										</div>
									</div>

								</div> <!-- //.row -->

								<div class="form-group">
									<label for="email">Email Address</label>
									<div class="input-group">
											<div class="input-group-addon addon-dif-color">
												<span class="glyphicon glyphicon-envelope"></span>
											</div>
									<input type="email" class="form-control" name="email" id="email" autocomplete="new-password" required>
									</div>
									<small id="chkUsr" class="form-text text-muted"></small>
								</div>

								<div class="row">
									<div class="form-group col-lg-6 col-md-6">
										<label for="password">Password (at least 6 characters)</label>
										<div class="input-group">
												<div class="input-group-addon addon-dif-color">
													<span class="glyphicon glyphicon-lock"></span>
												</div>
										<input type="password" class="form-control" id="password" name="password" autocomplete="new-password" required>
										</div>
									</div>

									<div class="form-group col-lg-6 col-md-6">
										<label for="confirmPassword">Confirm Password</label>
										<div class="input-group">
												<div class="input-group-addon addon-dif-color">
													<span class="glyphicon glyphicon-lock"></span>
												</div>
										<input type="password" class="form-control" id="confirmPassword" name="password" autocomplete="new-password" disabled required>
										</div>
									</div>
								</div>

								<div class="form-group">
									<label for="sms">Mobile Number</label>
									<div class="input-group">
												<div class="input-group-addon addon-dif-color">
													+63
												</div>
									<input type="text" class="form-control" name="sms" id="sms" placeholder="9XXXXXXXXX" required></input>
									</div>
								</div>

								<!-- <div class="form-group">
									<label for="address">Address</label>
									<textarea class="form-control" rows="3" name="address" id="address" required></textarea>
								</div>	 -->	

								<button type="submit" name="login" class="btn btn-green btn-block" id="registerBtn" disabled>Register</button>

							</form>
						</div>
					<div class="panel-heading">
						<p>Already have an account? <a href="login.php">Sign in here</a></p>	
					</div>
				</div>					
			</div>
		</div> <!-- //.row -->
<!-- 	</div> --> <!-- //.container -->

	<!-- main footer -->
	<?php include 'partials/main_footer.php'; ?>

	<?php include 'partials/foot.php'; ?>

	<script type="text/javascript">
		$(document).ready(function(){

			$('#first_name').keyup(function(){
				var regexp = new RegExp(/^[a-zA-Z .]+$/);
				if(regexp.test($('#first_name').val())) {
					$('#first_name').closest('.form-group').removeClass('has-error');
					$('#first_name').closest('.form-group').addClass('has-success');
				} else {
					$('#first_name').closest('.form-group').addClass('has-error');
				}
			})

			$('#last_name').keyup(function(){
				var regexp = new RegExp(/^[a-zA-Z .]+$/);
				if(regexp.test($('#last_name').val())) {
					$('#last_name').closest('.form-group').removeClass('has-error');
					$('#last_name').closest('.form-group').addClass('has-success');
				} else {
					$('#last_name').closest('.form-group').addClass('has-error');
				}
			})

			$('#sms').keyup(function(){
				var regexp = new RegExp(/^[9][0-9]{9}$/);
				if(regexp.test($('#sms').val())) {
					$('#sms').closest('.form-group').removeClass('has-error');
					$('#sms').closest('.form-group').addClass('has-success');
					$('[for="sms"]').html('<span style="color:green;">Valid</span> Mobile Number');
					$('#registerBtn').prop('disabled', false);
				} else {
					$('#sms').closest('.form-group').addClass('has-error');
					$('[for="sms"]').html('<span style="color:red;">Invalid</span> Mobile Number');
				}
			})

			$('#email').keyup(function(){
				var regexp = new RegExp(/^[a-zA-Z0-9._]+@[a-zA-Z0-9._]+\.[a-zA-Z]{2,4}$/);
				if(regexp.test($('#email').val())) {
					$('#email').closest('.form-group').removeClass('has-error');
					$('#email').closest('.form-group').addClass('has-success');
				} else {
					$('#email').closest('.form-group').addClass('has-error');
					// $('#registerBtn').prop('disabled', true);
				}
			})

			$('#password').keyup(function(){
				var regexp = new RegExp(/^[a-zA-Z0-9._@#$%^&+=*]{6,50}$/);
				if(regexp.test($('#password').val())) {
					$('#password').closest('.form-group').removeClass('has-error');
					$('#password').closest('.form-group').addClass('has-success');

				} else {
					$('#password').closest('.form-group').addClass('has-error');
					$('#registerBtn').prop('disabled', true);
				}
			})

			$('#confirmPassword').on('input', function(){
				var regexp = new RegExp(/^[a-zA-Z0-9._@#$%^&+=*]{6,50}$/);
				if(regexp.test($('#confirmPassword').val())) {
					if($('#confirmPassword').val() == $('#password').val()) {
					$('#confirmPassword').closest('.form-group').removeClass('has-error');
					$('#confirmPassword').closest('.form-group').addClass('has-success');
					$('#registerBtn').prop('disabled', false);
					} else {
						$('#confirmPassword').closest('.form-group').addClass('has-error');
						$('#registerBtn').prop('disabled', true);
					}
				} else {
					$('#confirmPassword').closest('.form-group').addClass('has-error');
					$('#registerBtn').prop('disabled', true);
				}
			})

			$('#registerBtn').click(function(event){
				// event.preventDefault();
				var formData = $('#registrationForm').serialize();
				console.log(formData);
			})

			$('#password').on('input', function(){
				if($('#password').val().length < 6){
					$('#confirmPassword').prop('disabled', true);
				} else {
					$('#confirmPassword').prop('disabled', false);
				}
			});

			$('#confirmPassword').on('input', matchPassword);
			
			function matchPassword() {
				var passwordText = $('#password').val();
				var confirmPasswordText = $('#confirmPassword').val();

					// if ($('#password').val() == $(this).val()) {
					// 	$('[for="confirmPassword"]').html('Password <span style="color:green;">match!</span>');	
					// } else {
					// 	$('[for="confirmPassword"]').html('Password <span style="color:red;">not match!</span>');	
					// }

				if (passwordText != '' || confirmPasswordText != '') {
					if (passwordText == confirmPasswordText) {
						// console.log('matched');
						$('[for="confirmPassword"]').html('Password <span style="color:green;">match!</span>');	
					} else {
						// console.log('mismatched');
						$('[for="confirmPassword"]').html('Password <span style="color:red;">not match!</span>');	
					}
				} else {
					$('[for="confirmPassword"]').html('Password');	
				}		
			}


		})
	</script>
</body>
</html>