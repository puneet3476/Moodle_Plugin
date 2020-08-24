<!-- <link rel="stylesheet" type="text/css" href="./assets/css/bootstrap.css"> -->
<?php
require 'connect.php';
// require '../../basic/header.php';  
?>
<!-- <link rel="stylesheet" href="../../basic/assets/css/index.css"> -->
<link rel="stylesheet" type="text/css" href="../../basic/assets/css/bootstrap.css">
<style>
			
            body {
                position: absolute;
                top: 0; bottom: 0; left: 0; right: 0;
                height: 100%;
                overflow:hidden;
            }
            body:before {
                content: "";
                position: absolute;
                background: url(../../basic/images/38085.jpg);
                background-size: cover;
                z-index: -1; /* Keep the background behind the content */
                height: 20%; width: 20%; /* Using Glen Maddern's trick /via @mente */
            
                /* don't forget to use the prefixes you need */
                transform: scale(5);
                transform-origin: top left;
                filter: blur(1px);
            }
                    </style>


<body class="gradient vertical-center   ">

 <div class="container jumbotron " style="padding:4rem 2rem;margin-top:6%;">
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




