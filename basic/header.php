<?php

require 'connectwithoutdata.php';
session_start();
?>

<link rel="stylesheet" href="assets/landing_css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/landing_css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/landing_css/magnific-popup.css">
    <link rel="stylesheet" href="assets/landing_css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/landing_css/themify-icons.css">
    <link rel="stylesheet" href="assets/landing_css/nice-select.css">
    <link rel="stylesheet" href="assets/landing_css/flaticon.css">
    <link rel="stylesheet" href="assets/landing_css/gijgo.css">
    <link rel="stylesheet" href="assets/landing_css/animate.css">
    <link rel="stylesheet" href="assets/landing_css/slicknav.css">
    <link rel="stylesheet" href="assets/landing_css/style.css">
<style>
    .vertical-center {
  min-height: 100%;  /* Fallback for browsers do NOT support vh unit */
  min-height: 100vh; /* These two lines are counted as one :-)       */

  display: flex;
  align-items: center;
}
.header-area  {
    background: rgba(166, 78, 238,0.9);

	background: -moz-linear-gradient(left, #a64eee 0%, #3c35ce 100%,0.9);
	background: -webkit-linear-gradient(left, #a64eee 0%, #3c35ce 100%,0.9);
	background: linear-gradient(to right, #a64eee 0%, #3c35ce 100%,0.9);
	filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#a64eee', endColorstr='#3c35ce',GradientType=1 );
}</style>

<header>
        <div class="header-area ">
            <div id="sticky-header" class="main-header-area">
                <div class="container-fluid p-0">
                    <div class="row align-items-center no-gutters">
                        <div class="col-xl-2 col-lg-2">
                            <div class="logo-img">
                                <a href="index.php" class="text-decoration-none">
                                   <h2 style='font-family: "Poppins", sans-serif; color:white;'> PILOT</h2>
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-7 col-lg-7">
                            <div class="main-menu  d-none d-lg-block">
                                <nav>
                                    <ul id="" style="margin-bottom:0;">
                                    <?php if (isset($_SESSION['loginname'])) {?>
                                        <li><a class="" href="<?php echo (strtolower($_SESSION['my_role']) . "_panel.php"); ?>">home</a></li>
                                        <li><a class="" href="profile.php">Profile</a></li>
                                    <?php } else {?>
                                            <li><a class="active" href="index.php">home</a></li>
                                        <?php }?>
                                        <?php
                                        if (isset($_SESSION['my_roll'])) {
                                            if (($_SESSION['my_role']) == "TEACHER") {
                                                ?>
                                    <li class="nav-item px-lg-2"> <a class="nav-link" href="course_page.php"><span class="d-inline-block d-lg-none icon-width"><i class="fas fa-spa"></i></span>Courses</a> </li>
                                    <?php }}?><li><a href="#">About</a></li>
                                        <!-- <li><a href="#">blog <i class="ti-angle-down"></i></a>
                                            <ul class="submenu">
                                                <li><a href="#">blog</a></li>
                                                <li><a href="#">single-blog</a></li>
                                            </ul>
                                        </li> -->
                                        <li><a href="#">Contact</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 d-none d-lg-block">
                            <div class="log_chat_area d-flex align-items-center">
                                <a href="#test-form" class="login popup-with-form">

                                    <?php if (isset($_SESSION['loginname'])) {?>
                                    <span><a href="logout.php" style="color:white;position:relative;font-family: 'Poppins', sans-serif;font-size:15px;"><i class="flaticon-user"></i> Log Out</a></span>
                                    <?php } else {?>
                                        <span>Sign Up/ Login</span>
                                    <?php }?>
                                </a>
                                <!-- <div class="live_chat_btn">
                                    <a class="boxed_btn_orange" href="#">
                                        <i class="fa fa-phone"></i>
                                        <span>+10 378 467 3672</span>
                                    </a>
                                </div> -->
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
