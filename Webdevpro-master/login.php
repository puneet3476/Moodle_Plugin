<?php
session_start();

require 'connect.php';

$name=mysqli_real_escape_string($link, $_POST['user']);
$pass=mysqli_real_escape_string($link, $_POST['pass']);

if (empty($name) || empty($pass)) {
header($url_load);
exit();
}




$q="SELECT * FROM users WHERE username='$name' && password='$pass' ";
$result = $link->query($q);

if ($result->num_rows > 0) {
$_SESSION['loginuser']=$name;
$row = $result->fetch_assoc();
$_SESSION['loginid']=$row["student_id"];
$_SESSION['loginname']=$row["realname"];
$_SESSION['loginrole']=$row["role"];
$user_id=$row["student_id"];




$question1=mysqli_real_escape_string($link, $_POST['gender']);
$question2=mysqli_real_escape_string($link, $_POST['gender1']);
$question3=mysqli_real_escape_string($link, $_POST['gender2']);
$question4=mysqli_real_escape_string($link, $_POST['gender3']);
if (empty($question1) ||empty($question2) ||empty($question3) ||empty($question4)  ) {
header($url_load);	
}
echo $question1;
echo $question2;
echo $question3;
echo $question4;
$qy="INSERT INTO prevideosurvey(username,question1,question2,question3,question4)
VALUES ('$name','$question1','$question2','$question3','$question4')" ;
if ($link->query($qy) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $qy . "<br>" . $link->error;
}

$clickdata="INSERT INTO clickdata(username,Event,user_id)
VALUES ('$name','Login','$user_id',)" ;
if ($link->query($clickdata) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $clickdata . "<br>" . $link->error;
}



header($url_load);

}
else {
$_SESSION['loginuser']="empty1";
header($url_load);   
}




?>
