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


//Create instance of PHPMailer
  $mail = new PHPMailer();
//Set mailer to use smtp
  $mail->isSMTP();
//Define smtp host
           $mail->SMTPDebug = true;
           $mail->Mailer = "smtp";
           $mail->Host = "smtp.gmail.com";

//Enable smtp authentication
  $mail->SMTPAuth = true;
//Set smtp encryption type (ssl/tls)
  $mail->SMTPSecure = "tls";
  $mail->SMTPAutoTLS=false;
//Port to connect smtp
  $mail->Port = "587";
//Set gmail username
  $mail->Username = 'moodlepluginonline@gmail.com';
  $mail->Password = 'qwerty!@1';
  $user_email='puneet3476@gmail.com';
  $mail->AddAddress($user_email);
      $mail->WordWrap = 50;
      $mail->IsHTML(true);
      $mail->Subject = 'You have been added to  course';

      $message_body = '
      <p>Dear Online to,<br>
      You have been added to  course. <b>
      </b>Please Check Our Site.</p>
      <p>Sincerely,<br>
      Moodle Plugin</p>
      ';
      $mail->Body = $message_body;

      if($mail->Send())
      {
        echo ("Email Sent to Puneet" );
        echo "\n";

        
      }
      else{

      }
      ?>