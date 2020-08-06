<?php
require 'connect.php';
?>
<div>Segments in <?php echo $users_db ?></div>
<?php
$x = 0;
require 'connect.php';
$q = "SELECT * FROM `segments`";
$segments = mysqli_query($link, $q);
if (mysqli_num_rows($segments) > 0) {
    while ($row = mysqli_fetch_assoc($segments)) {
        $x++;
        ?>
        <div  class="topics"><?php echo $row['segments_name'] ?> : <?php echo $row['segment_time'] ?><button><a href="delete_segments.php?name=<?php echo $row['segments_name']; ?>">Delete</a></button></div>
    <?php }
}?>

Add New Segment
<form action="add_segments.php" enctype="multipart/form-data" method ="POST">
<?php
$copy = $x;
for ($x = $copy + 1; $x <= $copy + 5; $x++) {?>
        <input type="text" name="seg<?php echo $x ?>" placeholder="topic" id="seg<?php echo $x ?>" />
        <input type="number" name="time<?php echo $x ?>" placeholder="starting time in seconds" id="time<?php echo $x ?>"/><br>
<?php }?>
<button class="submit btn btn-success btn-lg d-block mx-auto" align="center" type="submit" name="create video" id="createvid" onclick="submitForms()">Upload Video</button>
<input type="text" name="x" value="<?php echo $copy ?>" style="display:none;">
</form>




