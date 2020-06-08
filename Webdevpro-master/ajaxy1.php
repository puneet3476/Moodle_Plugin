<?php
session_start();
require 'connect.php';

if (isset($_GET['clickposy'])) {
	if(!isset($_SESSION['loginuser'])){
    $username='Notloggedin';
    $user_id=-1;
  }
  else{
    $username=$_SESSION['loginuser'];
    $user_id=$_SESSION['loginid'];

  }
  $postid=$_GET['postid'];
  $clickpost=1;
  $time_mark=$_GET['newposttime'];
  $from_time_mark=$_GET['oldposttime'];
$clickdata="INSERT INTO clickdata(username,user_id,click_on_post,video_timestamp,from_video_timestamp,to_video_time_stamp) VALUES ('$username','$user_id','$postid','$time_mark','$from_time_mark','$time_mark')" ;
if ($link->query($clickdata) === TRUE) {
    //echo "New record created successfully";
} else {
    echo "Error: " . $clickdata . "<br>" . $link->error;
}
}
if (isset($_GET['clickpost'])) {
	if(!isset($_SESSION['loginuser'])){
    $username='Notloggedin';
    $user_id=-1;
  }
  else{
    $username=$_SESSION['loginuser'];
    $user_id=$_SESSION['loginid'];

  }
  $postidy=$_GET['postidy'];
  $clickpost=1;
  $time_mark=$_GET['newposttimey'];
  $from_time_mark=$_GET['oldposttimey'];
$clickdata="INSERT INTO clickdata(username,user_id,click_on_post,video_timestamp,from_video_timestamp,to_video_time_stamp) VALUES ('$username','$user_id','$postidy','$time_mark','$from_time_mark','$time_mark')" ;
if ($link->query($clickdata) === TRUE) {
    //echo "New record created successfully";
} else {
    echo "Error: " . $clickdata . "<br>" . $link->error;
}
}

if (isset($_GET['reply_post'])) {
//$_POST['id'];
  $reply_id=$_GET['reply_id'];
  $reply_content=$_GET['reply_content'];
  $user_reply=$_GET['user_reply'];
 //if ($reply_content!="") {
   	# code...
   
$qy="INSERT INTO `reply` (user,reply,post_id)
VALUES ('$user_reply','$reply_content','$reply_id')" ;
mysqli_query($link,$qy);
 echo "data entered successfully";}
//}
//if (isset($_GET['seta'])) {
//$vid_alltime=$_GET['vid_alltime'];
//}
if (isset($_GET['display_reply'])) {
$reply_id=$_GET['reply_id'];
$resultchat = mysqli_query($link,"SELECT * FROM `chat` WHERE `id`='$reply_id' " );
while ($rowchat=mysqli_fetch_array($resultchat)) {
$time_mark=$rowchat['time_mark'];
  if(!isset($_SESSION['loginuser'])){
    $username='Notloggedin';
    $user_id=-1;
  }
  else{
    $username=$_SESSION['loginuser'];
    $user_id=$_SESSION['loginid'];

  }
$clickdata="INSERT INTO clickdata(username,user_id,click_on_reply,video_timestamp)
VALUES ('$username','$user_id','$reply_id','$time_mark')" ;
if ($link->query($clickdata) === TRUE) {
    //echo "New record created successfully";
} else {
    echo "Error: " . $clickdata . "<br>" . $link->error;
}
}

?>


<script type="text/javascript">
	
</script>
<?php
$resulty = mysqli_query($link,"SELECT * FROM `reply`  WHERE `post_id` = '$reply_id'" );
while ($rowy=mysqli_fetch_array($resulty)) {
?>


		<div class="comment_display reply_display" style="text-align: left"><span class="comment_u"><?php echo $rowy['user']; ?></span>
		<p class="comment_content"><?php echo $rowy['reply']; ?></p></div>





	<?php
}

}
