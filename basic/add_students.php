<?php 
require 'connectwithoutdata.php';
  require 'includes/PHPMailer.php';
  require 'includes/SMTP.php';
  require 'includes/Exception.php';
session_start();
  // require 'connectwithoutdata.php';
//Define name spaces
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\SMTP;
  use PHPMailer\PHPMailer\Exception;
// connection of database
if (isset($_GET['course_name'])) {
  $course_name=$_GET['course_name'];
  if(($_SESSION['my_role'])!='TEACHER'){
    die("You are forbidden to visit this page");
  }
 $con =  new mysqli(
   $host,
   $user,
   $password,
   $course_name
);
if ($con->connect_error) {
  die("Connection failed: " . $con->connect_error);
}

$msg = '';


if(isset($_POST['import'])){

    $filename = $_FILES["file"]["tmp_name"];
    if (pathinfo(basename($_FILES["file"]['name']),PATHINFO_EXTENSION)!='csv') {
      die("Please Upload a CSV file");
    }
    $i= $_POST["column_1"];
    $j= $_POST["column_2"];
    $k= $_POST["column_3"];
    

    if($_FILES["file"]["size"] > 0)
    {
        
        $file = fopen($filename, "r");

        while (($col = fgetcsv($file, 10000, ",")) !== FALSE) 
        {
            
            
            $insert = "INSERT INTO `tbl_info` (`Name`,`Roll_no`,`Email`) values('".$col[$i]."','".$col[$j]."','".$col[$k]."')";
            if ($con->query($insert) === TRUE) {
  
} else {
  echo "Error: " . $insert . "<br>" . $con->error;
}


        }
        $msg = '<p style="color: green;"> CSV Data inserted successfully</p>';

    }


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
}
header('location:add_videos.php?course_name='.$course_name);
}
}




?>


<!doctype html>
<html>
    <head>
      <title>Codingmantra</title>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="container">
          <div class="row" align="center" style="margin-top: 70px;">
              <div class="col-sm-3"></div>
              <div class="col-sm-6">
                    <h2>Import the excel file that contains student data. </h2><br>

                    <!-- Success message print here -->
                    <?php echo $msg; ?>


                    


                    <form method="post" action="" enctype='multipart/form-data'>
                        <h2>Select the Column No. that contains Name</h2><br>
                        <input type="number" name="column_1"  min="0" /><br>
                        <br>
                        <h2>Select the Column No. that contains Roll No.</h2><br>
                        <input type="number" name="column_2"  min="0"  /><br>
                        <br>
                        <h2>Select the Column No. that contains Email</h2><br>
                        <input type="number" name="column_3"  min="0" /><br>
                        <br>
                        <input type='file' name='file' class="form-control" /><br>
                        <input type='submit' class="btn btn-primary" value='Upload Data' name='import'>
                    </form>
                    <br>
                   
              </div> 
              <div class="col-sm-3"></div>
          </div>        
        </div>
    </body>
</html>
