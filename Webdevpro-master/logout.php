<?php
session_start();
require 'connect.php';

$question1=mysqli_real_escape_string($link, $_POST['gender']);
$question2=mysqli_real_escape_string($link, $_POST['gender1']);
$question3=mysqli_real_escape_string($link, $_POST['gender2']);
$question4=mysqli_real_escape_string($link, $_POST['gender3']);

if (empty($question1) ||empty($question2) ||empty($question3) ||empty($question4)  ) {

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
$name=$_SESSION['loginuser'];
$user_id=$_SESSION['loginid'];
$clickdata="INSERT INTO clickdata(username,logout,user_id)
VALUES ('$name','1','$user_id')";
if ($link->query($clickdata) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $clickdata . "<br>" . $link->error;
}

session_unset();
session_destroy();
header($url_load);
?>
