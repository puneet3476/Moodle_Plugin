<?php
require 'connectwithoutdata.php';
//email_verify.php
 

$error_user_otp = '';
$user_activation_code = '';
$message = '';

if(isset($_GET["code"]))
{
	$user_activation_code = $_GET["code"];

	if(isset($_POST["submit"]))
	{
		if(empty($_POST["user_otp"]))
		{
			$error_user_otp = 'Enter OTP Number';
		}
		else
		{$user_otp=$_POST['user_otp'];
			$query = "SELECT * FROM `register_teacher` WHERE `teacher_activation_code` = '$user_activation_code'AND `teacher_otp` = '$user_otp';
			";
           $resulty = mysqli_query($link_users,$query );
if ($rowy=mysqli_fetch_array($resulty)>0)
			{
				$query = "
				UPDATE register_teacher
				SET teacher_email_status = 'verified'
				WHERE teacher_activation_code = '".$user_activation_code."'
				";

				$statement = $link_users->prepare($query);

				if($statement->execute())
				{
					header('location:teacher_login_page.php?register=success');
				}
			}
			else
			{
				$message = '<label class="text-danger">Invalid OTP Number</label>';
			}
		}
	}
}
else
{
	$message = '<label class="text-danger">Invalid Url</label>';
}

?>
<!DOCTYPE html>
<html>
	<head>
		<title>PHP Registration with Email Verification using OTP</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<script src="http://code.jquery.com/jquery.js"></script>
    	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="stylesheet" href="assets/css/index.css">
	</head>
	<body class="gradient">
		<br />
		<div class="container">
			<h3 align="center">PHP Registration with Email Verification using OTP</h3>
			<br />
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Enter OTP Number</h3>
				</div>
				<div class="panel-body">
					<?php echo $message; ?>
					<form method="POST">
						<div class="form-group">
							<label>Enter OTP Number</label>
							<input type="text" name="user_otp" class="form-control" />
							<?php echo $error_user_otp; ?>
						</div>
						<div class="form-group">
							<input type="submit" name="submit" class="btn btn-success" value="Submit" />
						</div>
					</form>
				</div>
			</div>
		</div>
		<br />
		<br />
	</body>
</html>
