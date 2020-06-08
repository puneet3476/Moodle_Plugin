<?php
session_start();

require 'connect.php';


if (isset($_GET['playpause'])) {
  if($_GET['loginbool']==0){
    $username='Notloggedin';
    $user_id=-1;
  }
  else{
    $username=$_SESSION['loginuser'];
    $user_id=$_SESSION['loginid'];

  }
$play=$_GET['play'];
$pause=$_GET['pause'];
$vid_curenttime=$_GET['vid_curenttime'];
$clickdata="INSERT INTO clickdata(username,play,user_id,pause,video_timestamp)
VALUES ('$username','$play','$user_id','$pause','$vid_curenttime')" ;
if ($link->query($clickdata) === TRUE) {
    //echo "New record created successfully";
} else {
    echo "Error: " . $clickdata . "<br>" . $link->error;
}

}

if (isset($_GET['bar_click'])) {
  if($_GET['loginbool']==0){
    $username='Notloggedin';
    $user_id=-1;
  }
  else{
    $username=$_SESSION['loginuser'];
    $user_id=$_SESSION['loginid'];

  }
$count=$_GET['count'];
$vid_curenttime=$_GET['vid_curenttime'];
$vid_prevtime=$_GET['vid_prevtime'];
$clickdata="INSERT INTO clickdata(username,user_id,click_on_bar,video_timestamp,from_video_timestamp,to_video_time_stamp)
VALUES ('$username','$user_id','$count','$vid_curenttime','$vid_prevtime','$vid_curenttime')" ;
if ($link->query($clickdata) === TRUE) {
    //echo "New record created successfully";
} else {
    echo "Error: " . $clickdata . "<br>" . $link->error;
}

}

//if (isset($_GET['seta'])) {
//$vid_alltime=$_GET['vid_alltime'];
//}



if (isset($_GET['video_timeline_click'])) {
  $vid_alltime=$_GET['vid_alltime'];
  echo $vid_alltime;
  if($_GET['loginbool']==0){
    $username='Notloggedin';
    $user_id=-1;
  }
  else{
    $username=$_SESSION['loginuser'];
    $user_id=$_SESSION['loginid'];

  }

$vid_curenttime=$_GET['vid_curenttime'];
echo $vid_curenttime;
$clickdata="INSERT INTO clickdata(username,user_id,click_on_video_stamp,video_timestamp,to_video_time_stamp)
VALUES ('$username','$user_id','1','$vid_curenttime','$vid_curenttime')" ;
if ($link->query($clickdata) === TRUE) {
    //echo "New record created successfully";
} else {
    echo "Error: " . $clickdata . "<br>" . $link->error;
}
}


if (isset($_GET['doney']) && ($_GET['topicy']!="")) {
  $user_id=$_SESSION['loginid'];
  $userya=$_GET['usery'];
  $topicy=$_GET['topicy'];
  $currenttimey=$_GET['timeminy'];
  

$qya="INSERT INTO clickdata (user_id,username,Add_Chat,video_timestamp)
VALUES ('$user_id','$userya','$topicy','$currenttimey')" ;
mysqli_query($link,$qya);
 echo "data entered successfully";
}
?>