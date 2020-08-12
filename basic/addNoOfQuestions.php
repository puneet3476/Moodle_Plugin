<?php require 'connectwithoutdata.php';
require 'header.php';
?>
<?php

  if(($_SESSION['my_role'])!='TEACHER'){
    die("You are forbidden to visit this page");
  }
$course=$_POST['course'];
$video=$_POST['vids'];

?>
<style type="text/css">
    .vertical-center {
  min-height: 100%;  /* Fallback for browsers do NOT support vh unit */
  min-height: 100vh; /* These two lines are counted as one :-)       */

  display: flex;
  align-items: center;
}
</style>
<link rel="stylesheet" href="assets/css/index.css">
<link rel="stylesheet" type="text/css" href="./assets/css/bootstrap.css">
<body class="gradient vertical-center container">
<div class="jumbotron mx-auto">
<form action="addQuestion.php" method="POST">
<input type="text" name="qno" id="qno" placeholder="Add No of questions">
<input type="text" name="video_name" id="video_name" value="<?echo($video);?>" style="display: none">
<input type="text" name="course_name" id="course_name" value="<?echo($course);?>" style="display: none">
<input type="submit" value="Submit">
</form>
</div>
</body>