<?php
require 'connect.php';

?>
<center><h2>Enter Questions' details</h2></center>
<form action="<?php echo $course . $folder; ?>questionStore.php" method="post">
<input type="hidden" name="qno" value="<?php echo $_POST['qno'] ?>">
<?php

for ($x = 1; $x <= $_POST['qno']; $x++) {
    ?>
<div style="margin: 0 auto; width: 70%;margin-bottom: 1rem">
<input style="width: 100%;" type="text" name="tsq<?php echo $x ?>" id="tsq<?php echo $x ?>" placeholder="Enter timestamp of question <?php echo $x ?>">
</div>
<div style="margin: 0 auto; width: 70%;margin-bottom: 1rem">
        <input style="width: 100%;" type="text" name="q<?php echo $x ?>" id="q<?php echo $x ?>" placeholder="Enter question <?php echo $x ?>">
</div>


    <div style="margin: 0 auto; width: 70%;margin-bottom: 1rem">
        <input type="radio" name="ans<?php echo $x ?>" value="1">
        <input style="width: 100%;" type="text" name="op1_<?php echo $x ?>" id="op1_<?php echo $x ?>" placeholder="Enter option1 of question <?php echo $x ?>">
    </div>


    <div style="margin: 0 auto; width: 70%;margin-bottom: 1rem">
        <input type="radio" name="ans<?php echo $x ?>" value="2">
        <input style="width: 100%;" type="text" name="op2_<?php echo $x ?>" id="op2_<?php echo $x ?>" placeholder="Enter option2 of question <?php echo $x ?>">
    </div>


    <div style="margin: 0 auto; width: 70%;margin-bottom: 1rem">
        <input type="radio" name="ans<?php echo $x ?>" value="3">
        <input style="width: 100%;" type="text" name="op3_<?php echo $x ?>" id="op3_<?php echo $x ?>" placeholder="Enter option3 of question <?php echo $x ?>">
    </div>


    <div style="margin: 0 auto; width: 70%;margin-bottom: 1rem">
        <input type="radio" name="ans<?php echo $x ?>" value="4">
        <input style="width: 100%;" type="text" name="op4_<?php echo $x ?>" id="op4_<?php echo $x ?>" placeholder="Enter option4 of question <?php echo $x ?>">
    </div>

<br><br><hr><br>






<?php
}
?>
<div style="margin: 0 auto; width: 70%;margin-bottom: 1rem"><button type="submit">Submit</button></div>
</form>