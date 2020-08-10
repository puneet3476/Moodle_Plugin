<?php 
require 'connectwithoutdata.php';
session_start();
  if(($_SESSION['my_role'])!='TEACHER'){
    die("You are forbidden to visit this page");
  }
?>
<center><h2>Enter Questions' details</h2></center>
<form action="<?php echo $folder;?>questionStore.php" method="post">
<input type="hidden" name="qno" value="<?php echo $_POST['qno']?>">
<?php
$video=$_POST['video_name'];
$course=$_POST['course_name'];

for ($x = 1; $x <= $_POST['qno']; $x++) {
?>
<div style="margin: 0 auto; width: 70%;margin-bottom: 1rem">
<input style="width: 100%;" type="text" name="tsq<?php echo $x?>" id="tsq<?php echo $x?>" placeholder="Enter timestamp of question <?php echo $x?>">
</div>
<div style="margin: 0 auto; width: 70%;margin-bottom: 1rem">
        <input style="width: 100%;" type="text" name="q<?php echo $x?>" id="q<?php echo $x?>" placeholder="Enter question <?php echo $x?>">
</div>


    <div style="margin: 0 auto; width: 70%;margin-bottom: 1rem">
        <input type="radio" name="ans<?php echo $x?>" value="1">
        <input style="width: 100%;" type="text" name="op1_<?php echo $x?>" id="op1_<?php echo $x?>" placeholder="Enter option1 of question <?php echo $x?>">
    </div>


    <div style="margin: 0 auto; width: 70%;margin-bottom: 1rem">
        <input type="radio" name="ans<?php echo $x?>" value="2">
        <input style="width: 100%;" type="text" name="op2_<?php echo $x?>" id="op2_<?php echo $x?>" placeholder="Enter option2 of question <?php echo $x?>">
    </div> 


    <div style="margin: 0 auto; width: 70%;margin-bottom: 1rem">
        <input type="radio" name="ans<?php echo $x?>" value="3">
        <input style="width: 100%;" type="text" name="op3_<?php echo $x?>" id="op3_<?php echo $x?>" placeholder="Enter option3 of question <?php echo $x?>">
    </div>      


    <div style="margin: 0 auto; width: 70%;margin-bottom: 1rem">
        <input type="radio" name="ans<?php echo $x?>" value="4">
        <input style="width: 100%;" type="text" name="op4_<?php echo $x?>" id="op4_<?php echo $x?>" placeholder="Enter option4 of question <?php echo $x?>">
    </div>

<br><br><hr><br>






<?php
}
?>
<input type="text" name="video_name" id="video_name" value="<?echo($video);?>" style="display: none">
<input type="text" name="course_name" id="course_name" value="<?echo($course);?>" style="display: none">
<div style="margin: 0 auto; width: 70%;margin-bottom: 1rem"><button type="submit">Submit</button></div>
</form>