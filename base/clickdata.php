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
if ($play==1) {
  $clickdata="INSERT INTO clickdata(username,Event,user_id,from_video_timestamp)
VALUES ('$username','Play','$user_id','$vid_curenttime')" ;
if ($link->query($clickdata) === TRUE) {
    //echo "New record created successfully";
} else {
    echo "Error: " . $clickdata . "<br>" . $link->error;
}
}
if ($pause==1) {
  $clickdata="INSERT INTO clickdata(username,Event,user_id,from_video_timestamp)
VALUES ('$username','Pause','$user_id','$vid_curenttime')" ;
if ($link->query($clickdata) === TRUE) {
    //echo "New record created successfully";
} else {
    echo "Error: " . $clickdata . "<br>" . $link->error;
}
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
$clickdata="INSERT INTO clickdata(username,user_id,Event,from_video_timestamp,to_video_timestamp,Bar_ID)
VALUES ('$username','$user_id','click_on_bar','$vid_prevtime','$vid_curenttime','$count')" ;
if ($link->query($clickdata) === TRUE) {
    //echo "New record created successfully";
} else {
    echo "Error: " . $clickdata . "<br>" . $link->error;
}

}
if (isset($_GET['volumechange'])) {
  if($_GET['loginbool']==0){
    $username='Notloggedin';
    $user_id=-1;
  }
  else{
    $username=$_SESSION['loginuser'];
    $user_id=$_SESSION['loginid'];

  }
$mute=$_GET['mute'];
$volume=$_GET['volume'];
$vid_curenttime=$_GET['vid_curenttime'];
$event="Volume Changed";




echo($event);

$clickdata="INSERT INTO clickdata(username,user_id,Event,to_video_timestamp)
VALUES ('$username','$user_id','$event','$vid_curenttime')" ;
if ($link->query($clickdata) === TRUE) {
    //echo "New record created successfully";
} else {
    echo "Error: " . $clickdata . "<br>" . $link->error;
}

}


if (isset($_GET['clicknote'])) {
  if(!isset($_SESSION['loginuser'])){
    $username='Notloggedin';
    $user_id=-1;
  }
  else{
    $username=$_SESSION['loginuser'];
    $user_id=$_SESSION['loginid'];

  }
$old_note_time=$_GET['old_note_time'];
$new_note_time=$_GET['new_note_time'];
$note_id=$_GET['note_id'];
$clickdata="INSERT INTO clickdata(username,user_id,Event,from_video_timestamp,to_video_timestamp,Post_ID)
VALUES ('$username','$user_id','click_on_note','$old_note_time','$new_note_time','$note_id')" ;
if ($link->query($clickdata) === TRUE) {
    //echo "New record created successfully";
} else {
    echo "Error: " . $clickdata . "<br>" . $link->error;
}

}


//if (isset($_GET['seta'])) {
//$vid_alltime=$_GET['vid_alltime'];
//}



if (isset($_GET['click_on_video_stamp'])) {
  $to_video_timestamp=$_GET['to_video_timestamp'];
  $from_video_timestamp=$_GET['from_video_timestamp'];  
  if($_GET['loginbool']==0){
    $username='Notloggedin';
    $user_id=-1;
  }
  else{
    $username=$_SESSION['loginuser'];
    $user_id=$_SESSION['loginid'];

  }

$clickdata="INSERT INTO clickdata(username,user_id,Event,from_video_timestamp,to_video_timestamp)
VALUES ('$username','$user_id','click_on_video_stamp','$from_video_timestamp','$to_video_timestamp')" ;
if ($link->query($clickdata) === TRUE) {
    //echo "New record created successfully";
} else {
    echo "Error: " . $clickdata . "<br>" . $link->error;
}
}
if (isset($_GET['event'])) {
  $to_video_timestamp=$_GET['videotime'];
 
  if($_GET['loginbool']==0){
    $username='Notloggedin';
    $user_id=-1;
  }
  else{
    $username=$_SESSION['loginuser'];
    $user_id=$_SESSION['loginid'];

  }
$event=$_GET['event'];
$clickdata="INSERT INTO clickdata(username,user_id,Event,to_video_timestamp)
VALUES ('$username','$user_id','$event','$to_video_timestamp')" ;
if ($link->query($clickdata) === TRUE) {
    //echo "New record created successfully";
} else {
    echo "Error: " . $clickdata . "<br>" . $link->error;
}
}


if (isset($_GET['login_button'])) 
{
 $username=$_SESSION['loginuser'];
 $user_id=$_SESSION['loginid'];
 $login_time=$_GET['login_time'];
$clickdata="INSERT INTO clickdata(username,Event,user_id,to_video_timestamp)
VALUES ('$username','Login','$user_id','$login_time')";
if ($link->query($clickdata) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $clickdata . "<br>" . $link->error;
}
}

if (isset($_GET['drag_button'])) 
{
  if($_GET['loginbool']==0){
    $username='Notloggedin';
    $user_id=-1;
  }
  else{
    $username=$_SESSION['loginuser'];
    $user_id=$_SESSION['loginid'];

  }
  $x=$_GET['x'];
  $y=$_GET['y'];
 $drag_time=$_GET['drag_time'];
$clickdata="INSERT INTO clickdata(username,Event,user_id,to_video_timestamp,x,y)
VALUES ('$username','Drag_Area','$user_id','$drag_time','$x','$y')";
if ($link->query($clickdata) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $clickdata . "<br>" . $link->error;
}
}



if (isset($_GET['doney']) && ($_GET['topicy']!="")) {
  $user_id=$_SESSION['loginid'];
  $userya=$_GET['usery'];
  $topicy=$_GET['topicy'];
  $currenttimey=$_GET['timeminy'];
$lastrow=mysqli_query($link,"SELECT * FROM `chat` ORDER BY `id` DESC LIMIT 1");
$lastid=mysqli_fetch_array($lastrow);


$Post_ID=$lastid['id'];
$qya="INSERT INTO clickdata (user_id,username,Event,Post_ID,from_video_timestamp)
VALUES ('$user_id','$userya','submit_chat','$Post_ID','$currenttimey')" ;
mysqli_query($link,$qya);
 echo "data entered successfully";
}
if (isset($_GET['done']) && ($_GET['topic']!="")) {
  $user_id=$_SESSION['loginid'];
  $user=$_GET['usery'];
  $topic=$_GET['topic'];
  $currenttime=$_GET['timemin'];
$lastrow=mysqli_query($link,"SELECT * FROM `note` ORDER BY `id` DESC LIMIT 1");
$lastid=mysqli_fetch_array($lastrow);


$Post_ID=$lastid['id'];
$qya="INSERT INTO clickdata (user_id,username,Event,Post_ID,from_video_timestamp)
VALUES ('$user_id','$user','submit_note','$Post_ID','$currenttime')" ;
mysqli_query($link,$qya);
 echo "data entered successfully";
}

if (isset($_GET['Timestamp'])) 
{
  if($_GET['loginbool']==0){
    $username='Notloggedin';
    $user_id=-1;
  }
  else{
    $username=$_SESSION['loginuser'];
    $user_id=$_SESSION['loginid'];

  }
$timestamp_time=$_GET['timestamp_time'];
$clickdata="INSERT INTO clickdata(username,Event,user_id,to_video_timestamp,display_style)
VALUES ('$username','change_display_style','$user_id','$timestamp_time','Timestamp')";
if ($link->query($clickdata) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $clickdata . "<br>" . $link->error;
}
}

if (isset($_GET['Newest'])) 
{
  if($_GET['loginbool']==0){
    $username='Notloggedin';
    $user_id=-1;
  }
  else{
    $username=$_SESSION['loginuser'];
    $user_id=$_SESSION['loginid'];

  }
$newest_time=$_GET['newest_time'];
$clickdata="INSERT INTO clickdata(username,Event,user_id,to_video_timestamp,display_style)
VALUES ('$username','change_display_style','$user_id','$newest_time','newest')";
if ($link->query($clickdata) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $clickdata . "<br>" . $link->error;
}
}
?>