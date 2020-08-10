<?php

session_start();

if(isset($_SESSION["user_id"]))
{
	header("location:home.php");
}

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Login with OTP Authentication</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<script src="http://code.jquery.com/jquery.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="stylesheet" href="assets/css/index.css">
	</head>
	<body class="gradient">
		<br />
		<div class="container">
			<br />

			<?php
			if(isset($_GET["register"]))
			{
				if($_GET["register"] == 'success')
				{
					echo '
					<h1 class="text-success">roll Successfully verified, Registration Process Completed...</h1>
					';
					echo '<h3 align="center">You can login now</h3>';
				}
			}
			?>

			<div class="row">
				<div class="col-md-3">&nbsp;</div>
				<div class="col-md-6">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title">Login</h3>
						</div>
						<div class="panel-body">
							<form method="POST" id="login_form" action="login_check.php">
								<div class="form-group" id="otp_area">
									<label>Enter Roll No.</label>
									<input type="text" name="user_roll" id="user_roll" class="form-control" />
									<span id="user_roll_error" class="text-danger"></span>
								</div>

								<div class="form-group" id="password_area">
									<label>Enter password</label>
									<input type="password" name="user_password" id="user_password" class="form-control" />
									<span id="user_password_error" class="text-danger"></span>
								</div>

								<div class="form-group" align="right">
									<input type="hidden" name="action" id="action" value="roll" />
									<input type="submit" name="next" id="next" class="btn btn-primary" value="Next" />
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>

		</div>
		<br />
		<br />
	</body>
</html>
