<!-- <link rel="stylesheet" type="text/css" href="./assets/css/bootstrap.css"> -->
<?php
require 'connect.php';
// require '../../basic/header.php';  
?>
<!-- <link rel="stylesheet" href="../../basic/assets/css/index.css"> -->
<link rel="stylesheet" type="text/css" href="../../basic/assets/css/bootstrap.css">
<style>
			body { 
	width: 100%;
	height:100%;
	font-family: 'Open Sans', sans-serif;
	background: #092756;
	background: -moz-radial-gradient(0% 100%, ellipse cover, rgba(104,128,138,.4) 10%,rgba(138,114,76,0) 40%),-moz-linear-gradient(top,  rgba(57,173,219,.25) 0%, rgba(42,60,87,.4) 100%), -moz-linear-gradient(-45deg,  #670d10 0%, #092756 100%);
	background: -webkit-radial-gradient(0% 100%, ellipse cover, rgba(104,128,138,.4) 10%,rgba(138,114,76,0) 40%), -webkit-linear-gradient(top,  rgba(57,173,219,.25) 0%,rgba(42,60,87,.4) 100%), -webkit-linear-gradient(-45deg,  #670d10 0%,#092756 100%);
	background: -o-radial-gradient(0% 100%, ellipse cover, rgba(104,128,138,.4) 10%,rgba(138,114,76,0) 40%), -o-linear-gradient(top,  rgba(57,173,219,.25) 0%,rgba(42,60,87,.4) 100%), -o-linear-gradient(-45deg,  #670d10 0%,#092756 100%);
	background: -ms-radial-gradient(0% 100%, ellipse cover, rgba(104,128,138,.4) 10%,rgba(138,114,76,0) 40%), -ms-linear-gradient(top,  rgba(57,173,219,.25) 0%,rgba(42,60,87,.4) 100%), -ms-linear-gradient(-45deg,  #670d10 0%,#092756 100%);
	background: -webkit-radial-gradient(0% 100%, ellipse cover, rgba(104,128,138,.4) 10%,rgba(138,114,76,0) 40%), linear-gradient(to bottom,  rgba(57,173,219,.25) 0%,rgba(42,60,87,.4) 100%), linear-gradient(135deg,  #670d10 0%,#092756 100%);
	filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#3E1D6D', endColorstr='#092756',GradientType=1 );
}
		</style>
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
<div  style="color: black;" align="center"><h1>Segments in <?php echo $db  ?></h1></div>
<?php
    $x=0;
    require 'connect.php';
    $q="SELECT * FROM `segments`";
    $segments = mysqli_query($link,$q);
    if (mysqli_num_rows($segments) > 0) {
    while($row = mysqli_fetch_assoc($segments)) {
        $x++;
 ?>
        <div  class="topics" align="center"><?php echo $row['segments_name']?> : <?php echo $row['segment_time']?><button><a href="delete_segments.php?name=<?php echo $row['segments_name']; ?>">Delete</a></button>
        <button><a href="update_segments.php?name=<?php echo $row['segments_name']; ?>&time="<?php echo $row['segment_time']; ?>>Update</a></button>
        </div>
    <?php }
  }?>

<h1 align="center">Add New Segment</h1><br>
<form action="add_segments.php" enctype="multipart/form-data" method ="POST" class="mx-auto">
    <div class="mx-auto container col-md-8">
<?php
    $copy=0;
    for($x=$copy;$x<=$copy+4;$x++){ ?>
        <input type="text" name="seg<?php echo $x?>" placeholder="topic" id="seg<?php echo $x ?>" style="width:280px" />
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




