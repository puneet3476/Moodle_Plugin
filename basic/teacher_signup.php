	<link rel="stylesheet" href="assets/css/index.css">

<?php
    // echo (getcwd());
	require 'includes/PHPMailer.php';
	require 'includes/SMTP.php';
	require 'includes/Exception.php';
	require 'connectwithoutdata.php';
//Define name spaces
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\SMTP;
	use PHPMailer\PHPMailer\Exception;
//index.php

//error_reporting(E_ALL);

session_start();



$link_users=new mysqli(
   $host,
   $user,
   $password,$users_database
);
include('function.php');


$message = '';
$error_user_name = '';
$error_user_email = '';
$error_user_password = '';
$user_name = '';
$user_email = '';
$user_password = '';
$user_password_again = '';
$error_user_password_again='';
$student_ID='';
$error_student_ID='';
$user_dep='';
$error_user_dep='';
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

		if(empty($_POST["user_dep"]))
	{
		$error_user_dep = "<label class='text-danger'>Enter Department</label>";
	}
	else
	{
		$user_dep = trim($_POST["user_dep"]);
		$user_dep = htmlentities($user_dep);
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
	 $q="SELECT * FROM `register_teacher` WHERE `teacher_email`='$user_email' ";
     $result = $link_users->query($q);

     if ($result->num_rows > 0) {
       $error_user_email = '<label class="text-danger">This Email Address is already Registered. Please Login</label>';

	    }

	}
    	if(empty($_POST["student_ID"]))
	{
		$error_student_ID = "<label class='text-danger'>Enter Teacher ID No.</label>";
	}
	else
	{
		$student_ID = trim($_POST["student_ID"]);
		$student_ID = htmlentities($student_ID);
		$student_ID=strtoupper($student_ID);
	    $q="SELECT * FROM `register_teacher` WHERE `teacher_ID`='$student_ID' ";
     $result = $link_users->query($q);

     if ($result->num_rows > 0) {
       $error_student_ID = '<label class="text-danger">This teacher ID is already Registered. Please Login</label>';

	    }

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
	if(empty($_POST["user_password_again"]))
	{
		$error_user_password_again = '<label class="text-danger">Password didn`t matched</label>';
	}
	else
	{
		$user_password_again = trim($_POST["user_password_again"]);
		if(password_verify($user_password_again,$user_password)){}
			else{
			$error_user_password_again = '<label class="text-danger">Password didn`t matched</label>';
			$error_user_password = '<label class="text-danger">Password didn`t matched</label>';
		}
	}


	if($error_user_name == '' && $error_user_email == '' && $error_user_password == '' && $error_user_password_again=='' && $error_student_ID==''&& $error_user_dep=='')
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

           $name_initials=explode(" ", $user_name);
          $name_initials=implode("", array($name_initials[0][0],$name_initials[1][0]));

	       $user_avatar = make_avatar(strtoupper($name_initials));

		$query = "INSERT INTO register_teacher
		(teacher_name,teacher_email, teacher_ID,teacher_password, teacher_activation_code, teacher_email_status, teacher_otp,teacher_avatar,teacher_department) values('$user_name','$user_email','$student_ID','$user_password','$user_activation_code','$user_email_status','$user_otp','$user_avatar','$user_dep');";

if ($link_users->query($query) === TRUE) {

// echo (getcwd());
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

	chdir($class_link);
/*
//Create instance of PHPMailer
	$mail = new PHPMailer();
//Set mailer to use smtp
	$mail->isSMTP();
//Define smtp host
           $mail->SMTPDebug = SMTP::DEBUG_CONNECTION;
           $mail->Mailer = "smtp";
           $mail->Host = "smtp.gmail.com";

//Enable smtp authentication
	$mail->SMTPAuth = true;
//Set smtp encryption type (ssl/tls)
	$mail->SMTPSecure = "tls";
//Port to connect smtp
	$mail->Port = "25";
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

				header('location:teacher_email_verify.php?code='.$user_activation_code);
			}
			else
			{
				$message = $mail->ErrorInfo;
			}*/

	}
	  else{
  echo "Error: " . $query . "<br>" . $link_users->error;
}

	}
}

?>
<!DOCTYPE html>
<html>
	<head>
		<title>Panel</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<script src="http://code.jquery.com/jquery.js"></script>
    	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="stylesheet" href="assets/css/index.css">

	</head>
	<body class=" gradient">
		<br />
		<div class="container ">
		<h1 align="center" class="">Teacher Registration Panel</h1>
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
							<label>Enter your Department</label>
							<input type="text" name="user_dep" class="form-control" />
                       <?php echo $error_user_dep; ?>
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
							<label>Enter Your Password Again</label>
							<input type="password" name="user_password_again" class="form-control" />
							<?php echo $error_user_password_again; ?>
						</div>
						<div class="form-group">
							<label>Enter Your Teacher ID</label>
							<input type="text" name="student_ID" class="form-control" />
							<?php echo $error_student_ID; ?>
						</div>
						<div class="form-group">
							<input type="submit" name="register" class="btn btn-success" value="Click to Register" />&nbsp;&nbsp;&nbsp;
							<button class="btn btn-outline-primary"><a href="teacher_login_page.php">Login</a></button>
						</div>
					</form>
				</div>
			</div>
		</div>
		<br />
		<br />
	</body>
</html>
