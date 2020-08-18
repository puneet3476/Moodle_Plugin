<?php
require 'connectwithoutdata.php';
require 'includes/PHPMailer.php';
require 'includes/SMTP.php';
require 'includes/Exception.php';

session_start();
error_reporting(E_ERROR | E_WARNING | E_PARSE);
// require 'connectwithoutdata.php';
//Define name spaces
// connection of database
if (isset($_GET['course_name'])) {
    $course_name = $_GET['course_name'];
    if (($_SESSION['my_role']) != 'TEACHER') {
        die("You are forbidden to visit this page");
    }
    $con = new mysqli(
        $host,
        $user,
        $password,
        $course_name
    );
    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }

    $msg = '';

    if (isset($_POST['import'])) { //

        $filename = $_FILES["file"]["tmp_name"];
        if (pathinfo(basename($_FILES["file"]['name']), PATHINFO_EXTENSION) != 'csv') { //
            die("Please Upload a CSV file");
        }
        $i = $_POST["column_1"];
        $j = $_POST["column_2"];
        $k = $_POST["column_3"];

        if ($_FILES["file"]["size"] > 0) //
        {

            $file = fopen($filename, "r");

            while (($col = fgetcsv($file, 10000, ",")) !== false) //
            {

                $insert = "INSERT INTO `tbl_info` (`Name`,`Roll_no`,`Email`) values('" . $col[$i] . "','" . $col[$j] . "','" . $col[$k] . "')";
                if ($con->query($insert) === true) { //

                } else { //
                    echo "Error: " . $insert . "<br>" . $con->error;
                }

            }
            $msg = '<p style="color: green;"> CSV Data inserted successfully</p>';

        }

/*
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
$allstds=mysqli_query($con,"SELECT * FROM `tbl_info`");
while ($allmails=mysqli_fetch_array($allstds)) {
echo($allmails['Email']);
$user_email=$allmails['Email'];
$mail->AddAddress($user_email);
$mail->WordWrap = 50;
$mail->IsHTML(true);
$mail->Subject = 'You have been added to '.$course_name.' course';

$message_body = '
<p>Dear '.$allmails['Name'].',<br>
You have been added to '.$course_name.' course. <b>
</b>Please Check Our Site.</p>
<p>Sincerely,<br>
Moodle Plugin</p>
';
$mail->Body = $message_body;

if($mail->Send())
{
echo ("Email Sent to".$allmails['Email']);
echo "\n";

}
}*/
        header('location:add_videos.php?course_name=' . $course_name);
    }
}

require 'header.php';
?>


<!doctype html>
<html>
    <head>
      <title>PILOT</title>
      <style>
			body { 
                color:white;
	width: 100%;
	height:100%;
	font-family: 'Open Sans', sans-serif;
	background: #092756;
	background: -moz-radial-gradient(0% 100%, ellipse cover, rgba(104,128,138,.4) 10%,rgba(138,114,76,0) 40%),-moz-linear-gradient(top,  rgba(57,173,219,.25) 0%, rgba(42,60,87,.4) 100%), -moz-linear-gradient(-45deg,  #670d10 0%, #092756 100%);
	background: -webkit-radial-gradient(0% 100%, ellipse cover, rgba(104,128,138,.4) 10%,rgba(138,114,76,0) 40%), -webkit-linear-gradient(top,  rgba(57,173,219,.25) 0%,rgba(42,60,87,.4) 100%), -webkit-linear-gradient(-45deg,  #670d10 0%,#092756 100%);
	background: -o-radial-gradient(0% 100%, ellipse cover, rgba(104,128,138,.4) 10%,rgba(138,114,76,0) 40%), -o-linear-gradient(top,  rgba(57,173,219,.25) 0%,rgba(42,60,87,.4) 100%), -o-linear-gradient(-45deg,  #670d10 0%,#092756 100%);
	background: -ms-radial-gradient(0% 100%, ellipse cover, rgba(104,128,138,.4) 10%,rgba(138,114,76,0) 40%), -ms-linear-gradient(top,  rgba(57,173,219,.25) 0%,rgba(42,60,87,.4) 100%), -ms-linear-gradient(-45deg,  #670d10 0%,#092756 100%);
	background: -webkit-radial-gradient(0% 100%, ellipse cover, rgba(104,128,138,.4) 10%,rgba(138,114,76,0) 40%), linear-gradient(to bottom,  rgba(57,173,219,.25) 0%,rgba(42,60,87,.4) 100%), linear-gradient(135deg,  #670d10 0%,#092756 100%);
	filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#3E1D6D', endColorstr='#092756',GradientType=1 );
}
		</style>
      <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"> -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
      <!-- <link rel="stylesheet" href="assets/css/index.css"> -->
    </head>
    <body class="vertical-center text-light">
        <div class="container">
          <div class="row" align="center" style="margin-top: 70px;">
              <div class="col-sm-3"></div>
              <div class="col-sm-6">
                    <h2 class="text-light">Import the excel file that contains student data. </h2>

                    <!-- Success message print here -->
                    <?php echo $msg; ?>





                    <form method="post" action="" enctype='multipart/form-data' class="row d-inline-flex">
                    <span class="col-sm">
                    <h4>Select the Column No. that contains Name</h4>
                        <input type="number" name="column_1"  min="0" />
                    </span><br>
                    <span class="col">
                        <h4>Select the Column No. that contains Roll No.</h4>
                        <input type="number" name="column_2"  min="0"  /><br>
                    </span>
                    <span class="col">
                        <h4>Select the Column No. that contains Email</h4>
                        <input type="number" name="column_3"  min="0" /><br>
                        <br>
                     </span>
                        <input type='file' name='file' class="form-control" /><br>
                        <input type='submit' class="btn btn-dark mx-auto mt-3" value='Upload Data' name='import'>
                    </form>
                    <br>
                    <a  href="add_videos.php?course_name=<?php echo $course_name?>"><button class="btn btn-link">Skip</button></a>

              </div>
              <div class="col-sm-3"></div>
          </div>
        </div>
    </body>
</html>
