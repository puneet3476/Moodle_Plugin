<?php

require 'connectwithoutdata.php';
session_start();
  if(($_SESSION['my_role'])!='TEACHER'){
    die("You are forbidden to visit this page");
  }
if (isset($_POST['qno'])){
    $video=$_POST['video_name'];
    $course=$_POST['course_name'];

   $link_video=new mysqli(
   $host,
   $user,
   $password,$video
);
if ($link_video->connect_error) {
  die("Connection failed: " . $link_video->connect_error);
}
echo "Connected successfully";
    for($x = 1; $x <= $_POST['qno']; $x++){
        $timestamp = $_POST["tsq".$x];
        $question = $_POST["q".$x];
        $opt_1 = $_POST["op1_".$x];
        $opt_2 = $_POST["op2_".$x];
        $opt_3 = $_POST["op3_".$x];
        if (isset($_POST["op4_".$x])){
            $opt_4 = $_POST["op4_".$x];
        } else {
            $opt_4 = "null";
        }
        $ans = $_POST["ans".$x];
        $opts = implode('**',[$opt_1,$opt_2,$opt_3,$opt_4]);
        echo $opts;
        echo "<br>";
        echo $ans;
        echo "<br>";
        $qy="INSERT INTO `question` (question,timestamp,options,answer)
        VALUES ('$question','$timestamp','$opts','$ans')" ;
        
        if ($link_video->query($qy) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $qy . "<br>" . $link_video->error;
}
        echo "data entered successfully";
}
    }
    header($urla.$appache_localhost_port.'/'.$course.'/'.$video.'/'.$urlb);

?>