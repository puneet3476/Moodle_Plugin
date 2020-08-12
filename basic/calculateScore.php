<?php
require 'connectwithoutdata.php';
session_start();
$qno = $_REQUEST['qno'];
$username = $_REQUEST['user'];
$course_name=$_REQUEST['course_name'];
$video_name=$_REQUEST['video_name'];
$user_roll_no=$_REQUEST['user_Roll_no'];
$x = 1;
$score = 0;
$link_video=new mysqli(
   $host,
   $user,
   $password,$video_name
);
$answer_script = mysqli_query($link_video, "SELECT answer FROM `question`");
while($answer = mysqli_fetch_array($answer_script)){
    if ($answer['answer'] == $_REQUEST["ans".$x]){

        $score++;
    }
}
$sql = "INSERT INTO `score` (user_name, score,user_roll_no,course_name,video_name) VALUES ('$username','$score','$user_roll_no','$course_name','$video_name')";
echo $sql;

if ($link_users->query($sql) === TRUE) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . $link_users->error;
}
 
?>