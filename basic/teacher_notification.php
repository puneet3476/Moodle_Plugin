<?php
//session_start();
require 'connectwithoutdata.php';
require 'header.php';
session_start(); //we need session for the log in thingy XD 
include("functions.php");

?>
<!-- <link rel="stylesheet" type="text/css" href="./assets/css/bootstrap.css"> -->

<?php

// if(($_SESSION['my_role'])!='TEACHER'){
//     die("You are forbidden to visit this page");}

// $teacher_ID=$_SESSION['loginroll'];
// echo ("Your Name".$_SESSION['loginname']);
// echo("Your Teacher ID.".$_SESSION['loginroll']);
// $user_roll=$_SESSION['loginroll'];
// echo("Your Email ID.".$_SESSION['loginemailid']);

?>




<!-- <nav class="navbar navbar-expand-lg navbar-light shadow-sm bg-light fixed-top" style="    background-image: linear-gradient(268deg, #405f8f, #1c3050);
    padding: 16px 0;">
<div class="container"> <a class="navbar-brand d-flex align-items-center" href="#">
	<?php
$image_url = "otp-php-registration/class/" . $_SESSION['user_avatar'];
?>
    <img src="../../<?php echo ($image_url); ?>"  class="avatar" style="align-content: left;vertical-align: middle;width:80px;height: 80px;border-radius: 50%;">


<div class="ml-3 font-weight-bold" style="color: white; font-size: 40px;"><?php echo ($_SESSION['loginname']) ?></div>
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
$result = mysqli_query($link_inst, "SELECT * FROM `courses` WHERE `teacher_ID`='$teacher_ID'");
if ($result) {
    echo ($result->num_rows);
}

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

<!-- <link rel="stylesheet" type="text/css" href="./assets/css/bootstrap.css"> -->
<!-- <link rel="stylesheet" href="assets/css/index.css"> -->
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
<style type="text/css">
    .vertical-center {
  min-height: 100%;  /* Fallback for browsers do NOT support vh unit */
  min-height: 100vh; /* These two lines are counted as one :-)       */

  display: flex;
  align-items: center;
}
</style>
<?php
//require 'connectwithoutdata.php';
?>
<main role="main">

<section class="jumbotron text-center">
  <div class="container">
      <?php
      
          $query = "select * from `requests`;";
          if(count(fetchAll($query))>0){
              foreach(fetchAll($query) as $row){
                  ?>
          
              <h1 class="jumbotron-heading"><?php echo $row['email'] ?></h1>
                <p class="lead text-muted"><?php echo $row['message'] ?></p>
                <p>
                  <a href="accept.php?id=<?php echo $row['id'] ?>" class="btn btn-primary my-2">Accept</a>
                  <a href="reject.php?id=<?php echo $row['id'] ?>" class="btn btn-secondary my-2">Reject</a>
                </p>
              <small><i><?php echo $row['date'] ?></i></small>
      <?php
              }
          }else{
              echo "No Pending Requests.";
          }
      ?>
    
  </div>
    
</section>

</main>
