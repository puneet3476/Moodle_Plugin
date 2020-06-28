<?php
session_start();
require 'connect.php';


 //$username=$_SESSION['logoutuser'];
 //$user_id=$_SESSION['logoutid'];

 $username="Logout";
 $user_id="-1";

$clickdata="INSERT INTO clickdata(username,Event,user_id)
VALUES ('$username','Logout','$user_id')";
if ($link->query($clickdata) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $clickdata . "<br>" . $link->error;
}



$question1=mysqli_real_escape_string($link, $_POST['gender']);
$question2=mysqli_real_escape_string($link, $_POST['gender1']);
$question3=mysqli_real_escape_string($link, $_POST['gender2']);
$question4=mysqli_real_escape_string($link, $_POST['gender3']);

if (empty($question1) ||empty($question2) ||empty($question3) ||empty($question4)  ) {
session_unset();
session_destroy();
header($url_load);

}



$logoutuser=$_SESSION['loginuser'];
echo $question1;
echo $question2;
echo $question3;
echo $question4;
$qy="INSERT INTO postvideosurvey(username,question1,question2,question3,question4)
VALUES ('$logoutuser','$question1','$question2','$question3','$question4')" ;
if ($link->query($qy) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $qy . "<br>" . $link->error;
}
$username=$_SESSION['loginuser'];
$user_id=$_SESSION['loginid'];



session_unset();
session_destroy();
header($url_load);
exit();
?>
