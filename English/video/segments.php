<link rel="stylesheet" type="text/css" href="./assets/css/bootstrap.css">
<?php
require 'connect.php';
// require '../../basic/header.php';
?>
<link rel="stylesheet" href="../../basic/assets/css/index.css">
<link rel="stylesheet" type="text/css" href="../../basic/assets/css/bootstrap.css">
<style type="text/css">
    .vertical-center {
  min-height: 100%;  /* Fallback for browsers do NOT support vh unit */
  min-height: 100vh; /* These two lines are counted as one :-)       */

  display: flex;
  align-items: center;
}
</style>
<body class="gradient vertical-center   ">

 <div class="container jumbotron ">
<div  style="color: black;" align="center"><h1>Segments in <?php echo $users_db ?></h1></div>
<?php
    $x=0;
    require 'connect.php';
    $q="SELECT * FROM `segments`";
    $segments = mysqli_query($link,$q);
    if (mysqli_num_rows($segments) > 0) {
    while($row = mysqli_fetch_assoc($segments)) {
        $x++;
 ?>
        <div  class="topics" align="center"><?php echo $row['segments_name']?> : <?php echo $row['segment_time']?><button><a href="delete_segments.php?name=<?php echo $row['segments_name']; ?>">Delete</a></button></div>
    <?php }
  }?>

<h1 align="center">Add New Segment</h1><br>
<form action="add_segments.php" enctype="multipart/form-data" method ="POST" class="mx-auto">
    <div class="mx-auto container col-md-8">
<?php
    $copy=$x;
    for($x=$copy+1;$x<=$copy+5;$x++){ ?>
        <input type="text" name="seg<?php echo $x?>" placeholder="topic" id="seg<?php echo $x ?>" />
        <span><input type="number"  style="width:80px" name="time<?php echo $x ?>" id="time<?php echo $x ?>"/>minutes
        <input type="number" style="width:80px" name="seconds<?php echo $x ?>"  id="time<?php echo $x ?>"/>seconds<br>
        </span>
<?php } ?>
</div>
<br>
<button class="submit btn btn-success btn-lg d-block mx-auto" align="center" type="submit" name="create video" id="createvid" onclick="submitForms()">Upload Segments</button>
<input type="text" name="x" value="<?php echo $copy ?>" style="display:none;">
</form>
</div>
</body>



