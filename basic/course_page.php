
<!-- <link rel="stylesheet" type="text/css" href="./assets/css/bootstrap.css"> -->
<style>
			
body {
    position: absolute;
    top: 0; bottom: 0; left: 0; right: 0;
    height: auto;
 
}
body:before {
    content: "";
    position: fixed;
    background: url(images/38085.jpg) ;
    background-size: cover;
    z-index: -1; /* Keep the background behind the content */
    height: 20%; width: 20%; /* Using Glen Maddern's trick /via @mente */

    /* don't forget to use the prefixes you need */
    transform: scale(5);
    transform-origin: top left;
    filter: blur(1px);
}
		</style>
<script src="https://kit.fontawesome.com/361990fe0a.js" crossorigin="anonymous"></script>
<?php

require 'header.php';
if (isset($_SESSION['loginroll'])) {
	if(($_SESSION['my_role'])!='TEACHER'){
		die("You are forbidden to visit this page");
	}
require 'connectwithoutdata.php';

	$teacher_ID=$_SESSION['loginroll'];
	if (array_key_exists('delete_course',$_POST)) {
    require 'delete.php';
    delete_course($htdocs_path,$_POST['course_name']);
       
    }
?>
<!-- <link rel="stylesheet" href="assets/css/index.css"> -->
<div class="gradient">
<div class="container bg-transparent">
<div class="jumbotron bg-transparent">
<h1 class="mx-auto d-block mt-3" style="text-align:center;color:white;">Your Courses</h1>
<h6 class="mx-auto d-block " style="text-align:center;color:white;">Add Videos to your Courses by clicking on them</h6>
<div class="row mx-auto mt-5">
<?php
            $result = mysqli_query($link_inst,"SELECT * FROM `courses` WHERE `teacher_ID`='$teacher_ID'" );
            if($result)
            while ($row=mysqli_fetch_array($result)) {
            ?>
            <div class=" jumbotron p-3 col-md-5  mx-auto" style="background-color:#ede682;cursor:pointer;"><a href="add_videos.php?course_name=<?php echo $row['course_name']?>" class="text-decoration-none text-dark">
                <h5 style="text-align:center" class=" font-weight-normal"><?php echo($row['course_name'])?><br></h5>
                <div style="text-align:center"><?php echo($row['description']) ?></div>
            </a>
            <form method="POST">
             <input type="text" name="course_name" value="<?php echo($row['course_name']) ?>" style="display: none;">
               
            <button type="submit" name="delete_course"
                class="btn btn-danger ml-5 mr-2" value="" ><i class="far fa-trash-alt"></i></button>   
            </form>
        </div>
            <?php } } ?>
</div>
</div>
</div>
            </div>
