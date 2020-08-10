<?php require 'connectwithoutdata.php';
session_start();
  if(($_SESSION['my_role'])!='TEACHER'){
    die("You are forbidden to visit this page");
  }
$course=$_POST['course'];
$video=$_POST['vids'];

?>
<form action="<?php echo $folder;?>addQuestion.php" method="post">
<input type="text" name="qno" id="qno" placeholder="Add No of questions">
<input type="text" name="video_name" id="video_name" value="<?echo($video);?>" style="display: none">
<input type="text" name="course_name" id="course_name" value="<?echo($course);?>" style="display: none">
<input type="submit" value="Submit">
</form>