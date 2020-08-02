
<link rel="stylesheet" type="text/css" href="./assets/css/bootstrap.css">
<script src="https://kit.fontawesome.com/361990fe0a.js" crossorigin="anonymous"></script>
<?php
require 'connectwithoutdata.php';
require 'header.php';
?>
<div class="container bg-light">
<div class="jumbotron bg-white">
<h2 class="mx-auto d-block " style="text-align:center   ">Your Courses</h2>
<h6 class="mx-auto d-block " style="text-align:center">Add Videos to your Courses by clicking on them</h6>
<div class="row mx-auto mt-5">
<?php
            $result = mysqli_query($link_inst,"SELECT * FROM `Courses` " );
            while ($row=mysqli_fetch_array($result)) {
            ?>
            <div class=" jumbotron p-3 col-md-5  mx-auto" style="background-color:#ede682;cursor:pointer;"><a href="add_videos.php?course_name=<?php echo $row['course_name']?>" class="text-decoration-none text-dark">
                <h5 style="text-align:center" class=" font-weight-normal"><?php echo($row['course_name'])?><br></h5>
                <div style="text-align:center"><?php echo($row['description']) ?></div>
            </a></div>
            <?php } ?>
</div>            
</div>
</div>            