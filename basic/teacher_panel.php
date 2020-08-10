<?php
session_start();
require 'connectwithoutdata.php';
?>
<link rel="stylesheet" type="text/css" href="./assets/css/bootstrap.css">

<?php



	if(($_SESSION['my_role'])!='TEACHER'){
		die("You are forbidden to visit this page");}
	
    $teacher_ID=$_SESSION['loginroll'];
	echo ("Your Name".$_SESSION['loginname']);
	echo("Your Teacher ID.".$_SESSION['loginroll']);
	$user_roll=$_SESSION['loginroll'];
	echo("Your Email ID.".$_SESSION['loginemailid']);


?>




<!-- <nav class="navbar navbar-expand-lg navbar-light shadow-sm bg-light fixed-top" style="    background-image: linear-gradient(268deg, #405f8f, #1c3050);
    padding: 16px 0;">
<div class="container"> <a class="navbar-brand d-flex align-items-center" href="#">
	<?php
      $image_url="otp-php-registration/class/".$_SESSION['user_avatar'];
     ?>
    <img src="../../<?php echo($image_url);?>"  class="avatar" style="align-content: left;vertical-align: middle;width:80px;height: 80px;border-radius: 50%;">


<div class="ml-3 font-weight-bold" style="color: white; font-size: 40px;"><?php echo($_SESSION['loginname'])?></div>
<div class="col-xs-12 col-sm-4 dc-u-mb-16" style='color: #4d5356;
font-family: "Lato", sans-serif;
font-size: 100%;
-webkit-font-smoothing: antialiased;
font-weight: 400;
line-height: 1.5;
box-sizing: inherit;
margin-bottom: 16px !important;
min-height: 1px;
padding-left: 15px;
padding-right: 15px;
position: relative;
float: left;
width: 33.33333333%;'>
        <div class="dc-card dc-u-fx-center dc-u-fx-fdc dc-u-pv-24 profile-header__stat" style='color: #4d5356;
font-family: "Lato", sans-serif;
font-size: 100%;
-webkit-font-smoothing: antialiased;
font-weight: 400;
line-height: 1.5;
box-sizing: inherit;
align-items: center !important;
display: flex !important;
justify-content: center !important;
flex-direction: column !important;
padding-bottom: 24px !important;
padding-top: 24px !important;
background-color: #fff;
border-radius: 4px;
box-shadow: 0 1px 3px 0 rgba(0,0,0,0.15);
padding: 12px;
position: relative;
height: 100%;
margin-bottom: 0;'>
          <strong class="dc-h2 dc-u-m-none" style='font-family: "Lato", sans-serif;
-webkit-font-smoothing: antialiased;
box-sizing: inherit;
margin: 0 !important;
color: #3d4251;
font-weight: 700;
line-height: 1.25;
font-size: 2rem;'><?php
$result = mysqli_query($link_inst,"SELECT * FROM `courses` WHERE `teacher_ID`='$teacher_ID'" );
if($result)
echo($result->num_rows);
?></strong>
          <span>Courses Added</span>
        </div>
      </div>
</a> <button class="navbar-toggler navbar-toggler-right border-0" type="button" data-toggle="collapse" data-target="#navbar4">
<span class="navbar-toggler-icon"></span>
</button>


<div class="collapse navbar-collapse" id="navbar4">
<ul class="navbar-nav mr-auto pl-lg-4">
<li class="nav-item px-lg-2 active"> <a class="nav-link" href="#"> <span class="d-inline-block d-lg-none icon-width"><i class="fas fa-home"></i></span>Home</a> </li>
<li class="nav-item px-lg-2"> <a class="nav-link" href=""><span class="d-inline-block d-lg-none icon-width"><i class="fas fa-spa"></i></span>Courses</a> </li>
<li class="nav-item px-lg-2"> <a class="nav-link" href="logout.php"><span class="d-inline-block d-lg-none icon-width"><i class="far fa-user"></i></i></span>Logout</a> </li>

<li class="nav-item px-lg-2 dropdown d-menu">
<a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="d-inline-block d-lg-none icon-width"><i class="far fa-caret-square-down"></i></span>Dropdown
<svg  id="arrow" xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
<polyline points="6 9 12 15 18 9"></polyline>
</svg>
</a>
<div class="dropdown-menu shadow-sm sm-menu" aria-labelledby="dropdown01">
<a class="dropdown-item" href="#">Action</a>
<a class="dropdown-item" href="#">Another action</a>
<a class="dropdown-item" href="#">Something else here</a>
</div>
</li>

<li class="nav-item px-lg-2"> <a class="nav-link" href="#"><span class="d-inline-block d-lg-none icon-width"><i class="far fa-envelope"></i></span>Contact</a> </li>
</ul>

</div>
</div>

</nav> -->

<link rel="stylesheet" type="text/css" href="./assets/css/bootstrap.css">
<link rel="stylesheet" href="assets/css/index.css">
<script src="https://kit.fontawesome.com/361990fe0a.js" crossorigin="anonymous"></script>
<?php
require 'connectwithoutdata.php';
require 'header.php';    
?>
<div class="bg-light gradient"> 
<div class=" h-100 container">
    <div class="jumbotron bg-white">
    <a href="admin_page.php" class="text-decoration-none text-dark">
        <div class="jumbotron mt-3 p-4 w-100" style="background-color:#f7ca5e ;cursor:pointer ;">
            <h3>Create A Course</h3>
            <p>Add a course for your institution <i class="fas fa-arrow-right"></i></p>
        </div></a>
        <div class="row mx-auto">
        <div class=" jumbotron p-3 col-md-5  mx-auto" style="background-color:#ade498"><a href=""  class="text-decoration-none text-dark">
        <img  class="mx-auto d-block mb-3 " width="120px" src="./images/capacity.svg">
        <h3 class="mx-auto d-block " style="text-align:center   ">Analytics<h3>
        <p class=" form-control-sm " style="text-align:center   ">Get detailed insights into your course usage.</p>
        </a></div>
        <div class="jumbotron p-3 col-md-5 mx-auto " style="background-color:#ade498"><a href="course_page.php" class="text-decoration-none text-dark">
        <img  class="mx-auto d-block mb-3 " width="120px" src="./images/survey.svg">
            <h3 class="mx-auto d-block " style="text-align:center   ">List of courses</h3>
            <p style="text-align:center   ">List of all the Courses. You can Add videos,segments to your videos here.
        </a><div>
    </div>
</div>
</div>
