<?php

require 'connectwithoutdata.php';
require 'header.php';
include("functions.php");
?>
?>
<style>
    .hovers:hover{
    background-color:#999999;
}
    </style>
<link rel="stylesheet" type="text/css" href="./assets/css/bootstrap.css">
<body class="gradient">
    <div class="container">
    <div class="row">
    <h2 style="margin-top:140px;">Click On The Course To Request for Approval from Professor</h2>
<?php

if(isset($_POST['apply']))
{
$name="Bikash";
$user_roll = "18CS30012";
$email = "bikashsahoo163@gmail.com";
$course = $_POST['course'];
//$name=$_POST['loginname'];
//$user_roll=$_POST['loginroll'];  
//$email=$_POST['loginemailid'];
$message = "$name with Roll No. $user_roll and Email $email would like to enroll in $course course.";  
$query = "INSERT INTO `requests` (`id`, `Name`, `Roll_no`, `Email`,`message`, `date`) VALUES (NULL, '$name', '$user_roll', '$email', '$message', CURRENT_TIMESTAMP)";
            if(performQuery($query)){
                echo "<script>alert('Your account request is now pending for approval. Please wait for confirmation. Thank you.')</script>";
            }else{
                echo "<script>alert('Unknown error occured.')</script>";
            }

}

    
    

    // echo ("Your Name".$_SESSION['loginname']);
    // echo("Your Roll No.".$_SESSION['loginroll']);
    $user_roll = $_SESSION['loginroll'];
    // echo("Your Email ID.".$_SESSION['loginemailid']);
    $query = "SELECT * FROM `courses`;";
    $result = mysqli_query($link_inst, $query);


    while ($row = mysqli_fetch_array($result)) {
        $course_database = (($row['course_name']));

            ?>
<link rel="stylesheet" href="assets/css/index.css">

        <div class="col-4">
            <div class=" jumbotron mx-auto overflow-auto" style="background-color:;height:50%; margin-top: 50px;">
            <form method="post">
            <input type="text" id="course" name="course" value="<?php echo ($course_database) ?>" style="display:none;">
        <button name="apply" class="text-center"> <?php echo ($course_database) ?> Course</button>
            </form>
        </div>
            </div>

<!--

BootStrap NavBar Example Three - Social Media Icons
 //
1. Replaced the ugly toggle with angle
2. Used hover only for large screen and above
3. You can add resize function if you want in javascript
4. SlideIn / SlideUp can be replaced with FadeIn /FadeUp
5. Delay on leaving mouse is applied to ensure the hover actions are not jittery.
//
-->


<!--The html below this line is for display purpose only-->

<?php

        

    }

    ?>
</div>
    </div>
</body>
<!--
<nav class="navbar navbar-expand-lg navbar-light shadow-sm bg-light fixed-top" style="    background-image: linear-gradient(268deg, #405f8f, #1c3050);
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
font-size: 2rem;'><?php echo ($matched_course) ?></strong>
          <span>Courses</span>
        </div>
      </div>
</a> <button class="navbar-toggler navbar-toggler-right border-0" type="button" data-toggle="collapse" data-target="#navbar4">
<span class="navbar-toggler-icon"></span>
</button>


<div class="collapse navbar-collapse" id="navbar4">
<ul class="navbar-nav mr-auto pl-lg-4">
<li class="nav-item px-lg-2 active"> <a class="nav-link" href="#"> <span class="d-inline-block d-lg-none icon-width"><i class="fas fa-home"></i></span>Home</a> </li>
<li class="nav-item px-lg-2"> <a class="nav-link" href="#"><span class="d-inline-block d-lg-none icon-width"><i class="fas fa-spa"></i></span>Courses</a> </li>
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

<?

?>
