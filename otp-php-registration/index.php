<?php
	require 'includes/PHPMailer.php';
	require 'includes/SMTP.php';
	require 'includes/Exception.php';
//Define name spaces
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\SMTP;
	use PHPMailer\PHPMailer\Exception;
//index.php

//error_reporting(E_ALL);

session_start();

if(isset($_SESSION["user_id"]))
{
	header("location:http://localhost:8888/otp-php-registration/home.php");
}

include('function.php');

$connect = new mysqli('localhost:8889', "root", "root",'central');
if ($connect->connect_error) {
  die("Connection failed: " . $connect->connect_error);
}
$message = '';
$error_user_name = '';
$error_user_email = '';
$error_user_password = '';
$user_name = '';
$user_email = '';
$user_password = '';
$student_ID='';
$error_student_ID='';
$user_role='';
$error_user_role='';
if(isset($_POST["register"]))
{
	if(empty($_POST["user_name"]))
	{
		$error_user_name = "<label class='text-danger'>Enter Name</label>";
	}
	else
	{
		$user_name = trim($_POST["user_name"]);
		$user_name = htmlentities($user_name);
	}

	if(empty($_POST["user_email"]))
	{
		$error_user_email = '<label class="text-danger">Enter Email Address</label>';
	}
	else
	{
		$user_email = trim($_POST["user_email"]);
		if(!filter_var($user_email, FILTER_VALIDATE_EMAIL))
		{
			$error_user_email = '<label class="text-danger">Enter Valid Email Address</label>';
		}
	}
    	if(empty($_POST["student_ID"]))
	{
		$error_student_ID = "<label class='text-danger'>Enter Student Roll No.</label>";
	}
	else
	{
		$student_ID = trim($_POST["student_ID"]);
		$student_ID = htmlentities($student_ID);
	}

	    	if(empty($_POST["user_role"]))
	{
		$error_user_role = "<label class='text-danger'>Enter Your Role</label>";
	}
	else
	{
		$user_role = trim($_POST["user_role"]);
		$user_role = htmlentities($user_role);
	}

	if(empty($_POST["user_password"]))
	{
		$error_user_password = '<label class="text-danger">Enter Password</label>';
	}
	else
	{
		$user_password = trim($_POST["user_password"]);
		$user_password = password_hash($user_password, PASSWORD_DEFAULT);
	}



	if($error_user_name == '' && $error_user_email == '' && $error_user_password == '')
	{
		$user_activation_code = md5(rand());

		$user_otp = rand(100000, 999999);
        $user_email_status='not-verified'; 
		$data = array(
			':user_name'		=>	$user_name,
			':user_email'		=>	$user_email,
			':user_password'	=>	$user_password,
			':student_ID'       =>  $student_ID,
			':user_activation_code' => $user_activation_code,
			':user_email_status'=>	'not verified',
			':user_otp'			=>	$user_otp
		);


	       $user_avatar = make_avatar(strtoupper($user_name));
           echo($user_avatar);
		$query = "INSERT INTO register_user 
		(user_name,user_email, user_Roll_no,user_password, user_activation_code, user_email_status, user_otp,user_avatar,user_role) values('$user_name','$user_email','$student_ID','$user_password','$user_activation_code','$user_email_status','$user_otp','$user_avatar','$user_role');";

if ($connect->query($query) === TRUE) {

echo (getcwd());
/*

			require 'class.phpmailer.php';
			$mail = new PHPMailer;
			$mail->IsSMTP();
			#$mail->SMTPDebug=4;

           $mail->SMTPDebug = 2;
           $mail->Mailer = "smtp";
           $mail->Host = "ssl://smtp.gmail.com";
           $mail->Port = 587;
           $mail->SMTPAuth = true; // turn on SMTP authentication
			$mail->SMTPAuth = true;
			$mail->Username = 'onlinelearningeducationmoodle';
			$mail->Password = 'qwerty!@1';
			#$mail->SMTPSecure = 'tls';
			$mail->From = 'onlinelearningeducationmoodle@gmail.com';
			$mail->FromName = 'Webslesson';*/

			//Include required PHPMailer files

	chdir('C:\MAMP\htdocs\otp-php-registration\class'); 

//Create instance of PHPMailer
	$mail = new PHPMailer();
//Set mailer to use smtp
	$mail->isSMTP();
//Define smtp host
           $mail->SMTPDebug = 4;
           $mail->Mailer = "smtp";
           $mail->Host = "smtp.gmail.com";

//Enable smtp authentication
	$mail->SMTPAuth = true;
//Set smtp encryption type (ssl/tls)
	$mail->SMTPSecure = "tls";
//Port to connect smtp
	$mail->Port = "587";
//Set gmail username
	$mail->Username = 'moodlepluginonline@gmail.com';
	$mail->Password = 'qwerty!@1';

			$mail->AddAddress($user_email);
			$mail->WordWrap = 50;
			$mail->IsHTML(true);
			$mail->Subject = 'Verification code for Verify Your Email Address';

			$message_body = '
			<p>For verify your email address, enter this verification code when prompted: <b>'.$user_otp.'</b>.</p>
			<p>Sincerely,<br>
			Moodle Plugin</p>
			';
			$mail->Body = $message_body;

			if($mail->Send())
			{
				echo '<script> alert("Please Check Your Email for Verification Code")</script>';

				header('location:email_verify.php?code='.$user_activation_code);
			}
			else
			{
				$message = $mail->ErrorInfo;
			}
		
	}
	  else{
  echo "Error: " . $query . "<br>" . $connect->error;
}

	}
} 

?>
<!DOCTYPE html>
<html>
	<head>
		<title>PHP Registration with Email Verification using OTP</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<script src="http://code.jquery.com/jquery.js"></script>
    	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	</head>
	<body>
		<br />
		<div class="container">
			<h3 align="center">PHP Registration with Email Verification using OTP</h3>
			<br />
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Registration</h3>
				</div>
				<div class="panel-body">
					<?php echo $message; ?>
					<form method="post">
						<div class="form-group">
							<label>Enter Your Name</label>
							<input type="text" name="user_name" class="form-control" />
							<?php echo $error_user_name; ?>
						</div>
						<div class="form-group">
							<label>Choose your Role:</label>
		      			<select class="form-control" type="text" align="center" name="user_role" placeholder="Choose Role">
                                 <option value="Student">Student</option>
                                 <option value="Teacher">Teacher</option>
                                 <option value="Assistant">Assistant</option>
                        </select>
                       <?php echo $error_user_role; ?>
                    </div>
						<div class="form-group">
							<label>Enter Your Email</label>
							<input type="text" name="user_email" class="form-control" />
							<?php echo $error_user_email; ?>
						</div>
						<div class="form-group">
							<label>Enter Your Password</label>
							<input type="password" name="user_password" class="form-control" />
							<?php echo $error_user_password; ?>
						</div>
						<div class="form-group">
							<label>Enter Your Roll No.</label>
							<input type="text" name="student_ID" class="form-control" />
							<?php echo $error_student_ID; ?>
						</div>
						<div class="form-group">
							<input type="submit" name="register" class="btn btn-success" value="Click to Register" />&nbsp;&nbsp;&nbsp;
							<a href="login.php">Login</a>
						</div>
					</form>
				</div>
			</div>
		</div>
		<br />
		<br />
	</body>
</html>