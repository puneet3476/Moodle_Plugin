<?php
session_start();
require 'connectwithoutdata.php';

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
$clickdata="INSERT INTO clickdata(username,user_id,Event,Post_ID,from_video_timestamp,to_video_timestamp) VALUES ('$username','$user_id','click_on_post','$postid','$from_time_mark','$time_mark')" ;
if ($link->query($clickdata) === TRUE) {
    //echo "New record created successfully";
} else {
    echo "Error: " . $clickdata . "<br>" . $link->error;
}
}
if (isset($_GET['delete_post'])) {
  $link_video = new mysqli(
                            $host,
                            $user,
                            $password, $_GET['database_name']);
$c= $_GET['delete_id'];
$sqly = "DELETE FROM chat WHERE id='$c'";
//$deletey = mysqli_query($lins,"DELETE FROM `mytopic` WHERE `id` = '$c'" );

if ($link_video->query($sqly) === TRUE) {
    echo "Record deleted successfully";
}
else{
  echo ($link_video->error);
} 
}
if (isset($_GET['clickpost'])) {
$link_video = new mysqli(
                            $host,
                            $user,
                            $password, $_GET['database_name']);
  if(!isset($_SESSION['loginuser'])){
    $username='Notloggedin';
    $user_id=-1;
  }
  else{
    $username=$_SESSION['loginuser'];
    $user_id=$_SESSION['loginid'];

  }
  $postidy=$_GET['postidy'];
  $chatuser=$_GET['chatuser'];
  if ($chatuser==$username) {
    echo "author";
    $username=$username."(author)";
  }
  $clickpost=1;
  $time_mark=$_GET['newposttimey'];
  $from_time_mark=$_GET['oldposttimey'];
$clickdata="INSERT INTO clickdata(username,user_id,Event,Post_ID,from_video_timestamp,to_video_timestamp) VALUES ('$username','$user_id','click_on_post','$postidy','$from_time_mark','$time_mark')" ;
if ($link_video->query($clickdata) === TRUE) {
    //echo "New record created successfully";
} else {
    echo "Error: " . $clickdata . "<br>" . $link_video->error;
}
}

if (isset($_GET['reply_post'])) {
//$_POST['id'];
  $link_video = new mysqli(
                            $host,
                            $user,
                            $password, $_GET['database_name']);
  $reply_id=$_GET['reply_id'];
  $reply_content=$_GET['reply_content'];
  $user_reply=$_GET['user_reply'];
 //if ($reply_content!="") {
    # code...

$qy="INSERT INTO `reply` (user,reply,post_id)
VALUES ('$user_reply','$reply_content','$reply_id')" ;
mysqli_query($link_video,$qy);
 echo "data entered successfully";
$result_reply="SELECT * FROM `chat` WHERE `id`='$reply_id' " ;
$result = $link_video->query($result_reply);

if ($result->num_rows > 0) {
  // output data of each row
  while($rowreply = $result->fetch_assoc()) {
$replies=$rowreply['Replies']+1;
$up="UPDATE `chat` SET `Replies`='$replies' WHERE `id`='$reply_id' ";
if ($link_video->query($up) === TRUE) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . $link_video->error;
}

}}
}
//}
//if (isset($_GET['seta'])) {
//$vid_alltime=$_GET['vid_alltime'];
//}
if (isset($_GET['display_reply'])) {
$link_video = new mysqli(
                            $host,
                            $user,
                            $password, $_GET['database_name']);
$reply_id=$_GET['reply_id'];
#$oldposttimereply=$_GET['oldposttimereply'];
$resultchat = mysqli_query($link_video,"SELECT * FROM `chat` WHERE `id`='$reply_id' " );
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
$clickdata="INSERT INTO clickdata(username,user_id,Event,Post_ID,to_video_timestamp)
VALUES ('$username','$user_id','click_on_reply','$reply_id','$time_mark')" ;
if ($link_video->query($clickdata) === TRUE) {
    //echo "New record created successfully";
} else {
    echo "Error: " . $clickdata . "<br>" . $link_video->error;
}
}

?>


<script type="text/javascript">

</script>
<?php
$resulty = mysqli_query($link_video,"SELECT * FROM `reply`  WHERE `post_id` = '$reply_id'" );
while ($rowy=mysqli_fetch_array($resulty)) {
?>


    <div class="comment_display reply_display" style="text-align: left"><span class="comment_u"><?php echo $rowy['user']; ?></span>
    <p class="comment_content"><?php echo $rowy['reply']; ?></p></div>





  <?php
}

}