
<!-- <link rel="stylesheet" type="text/css" href="./assets/css/bootstrap.css"> -->
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
<script src="https://kit.fontawesome.com/361990fe0a.js" crossorigin="anonymous"></script>
<?php

//session_start();
require 'header.php';
if (isset($_SESSION['loginroll'])) {
    if (($_SESSION['my_role']) != 'TEACHER') {
        die("You are forbidden to visit this page");
    }
    require 'connectwithoutdata.php';
    $teacher_ID = $_SESSION['loginroll'];
    ?>
<!-- <link rel="stylesheet" href="assets/css/index.css"> -->
<div class="gradient">
<div class="container bg-transparent">
<div class="jumbotron bg-transparent">
<h1 class="mx-auto d-block mt-3" style="text-align:center;color:white;">Your Courses</h1>
<h6 class="mx-auto d-block " style="text-align:center;color:white;">Add Videos to your Courses by clicking on them</h6>
<div class="row mx-auto mt-5">
<?php
$result = mysqli_query($link_inst, "SELECT * FROM `courses` WHERE `teacher_ID`='$teacher_ID'");
    if ($result) {
        while ($row = mysqli_fetch_array($result)) {
            ?>
            <div class=" jumbotron p-3 col-md-5  mx-auto" style="background-color:#ede682;cursor:pointer;"><a href="add_videos.php?course_name=<?php echo $row['course_name'] ?>" class="text-decoration-none text-dark">
                <h5 style="text-align:center" class=" font-weight-normal"><?php echo ($row['course_name']) ?><br></h5>
                <div style="text-align:center"><?php echo ($row['description']) ?></div>
            </a></div>
            <?php }
    }
}?>
</div>
</div>
</div>
            </div>
