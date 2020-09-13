<?php
session_start();
require 'connectwithoutdata.php';

//require 'header.php';
    if (($_SESSION['my_role']) != 'TEACHER') {
        die("You are forbidden to visit this page");
    }
    $teacher_ID=$_SESSION['loginroll'];
    $course=$_GET['course_name'];
    $link_course = new mysqli(
    $host,
    $user,
    $password, $course
);
                $query = "SELECT * FROM total_videos";
                $query_run = mysqli_query($link_course, $query);
				$video_users=mysqli_query($link_course,"SELECT * FROM tbl_info");
				$complete_users = mysqli_query ($link_course,"SELECT COUNT(DISTINCT(id)) FROM tbl_info WHERE Complete=1");
                                if($query_run)
                {$notes=array();
                    foreach($query_run as $row)
                    {
                        $link_video = new mysqli(
                            $host,
                            $user,
                            $password, $row['database_name']
                        );
                $video_notes=mysqli_query($link_video,"SELECT COUNT(DISTINCT(loginuser)) FROM note");
                $this_notes=mysqli_fetch_array($video_notes);
                array_push($notes,$this_notes['COUNT(DISTINCT(loginuser))']);
                

            }
        }
        $firstvideo = mysqli_query($link_course,"SELECT * FROM total_videos LIMIT 1");
        $first_video_name=mysqli_fetch_array($firstvideo);
        $link_firstvideo = new mysqli(
                            $host,
                            $user,
                            $password, $first_video_name['database_name']
                        );
        $first_video_users=mysqli_query($link_firstvideo,"SELECT COUNT(DISTINCT(user_id)) FROM clickdata");
        $this_users=mysqli_fetch_array($first_video_users);
        $first_video_users=$this_users['COUNT(DISTINCT(user_id))'];




        $GLOBALS['totalnotes']=0;
        function myfunction($value,$key){
$GLOBALS['totalnotes']=$GLOBALS['totalnotes']+$value;
}
array_walk_recursive($notes,"myfunction");

$total_notes=$GLOBALS['totalnotes'];
$percent_notes=round(($total_notes/(mysqli_num_rows($video_users)*mysqli_num_rows($query_run)))*100);
$percent_first_video_users=round(($first_video_users/mysqli_num_rows($video_users))*100);  

?>
<!-- Mirrored from educhamp.themetrades.com/demo/admin/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 22 Feb 2019 13:08:15 GMT -->
<br>
<br><br><br><br>

	<!-- META ============================================= -->

	<!-- DESCRIPTION -->

	<meta property="og:image" content="" />
	<meta name="format-detection" content="telephone=no">
	
	<!-- FAVICONS ICON ============================================= -->
	
	
	<!-- PAGE TITLE HERE ============================================= -->
	<title>Course Overview </title>
	
	<!-- MOBILE SPECIFIC ============================================= -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<!--[if lt IE 9]>
	<script src="assets/js/html5shiv.min.js"></script>
	<script src="assets/js/respond.min.js"></script>
	<![endif]-->
	
	<!-- All PLUGINS CSS ============================================= -->
	<link rel="stylesheet" type="text/css" href="assets/css/assets.css">
	<link rel="stylesheet" type="text/css" href="assets/vendors/calendar/fullcalendar.css">
	
	<!-- TYPOGRAPHY ============================================= -->
	<link rel="stylesheet" type="text/css" href="assets/css/typography.css">
	
	<!-- SHORTCODES ============================================= -->
	<link rel="stylesheet" type="text/css" href="assets/css/shortcodes/shortcodes.css">
	
	<!-- STYLESHEETS ============================================= -->
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<link rel="stylesheet" type="text/css" href="assets/css/dashboard.css">
	<link class="skin" rel="stylesheet" type="text/css" href="assets/css/color/color-1.css">
	

<body class="ttr-opened-sidebar ttr-pinned-sidebar">

	<!--Main container start -->
	<main class="ttr-wrapper">
		<div class="container-fluid">
			<div class="db-breadcrumb">
				<h4 class="breadcrumb-title">Course Overview</h4>
				<ul class="db-breadcrumb-list">
					<li><a href="#"><i class="fa fa-home"></i>Course</a></li>
					<li>Dashboard</li>
				</ul>
			</div>	
			<!-- Card -->
			<div class="row">
				<div class="col-md-6 col-lg-3 col-xl-3 col-sm-6 col-12">
					<div class="widget-card widget-bg1">					 
						<div class="wc-item">
							<h4 class="wc-title">
								Total Students enrolled in the course
							</h4>
							<span class="wc-des">
								.
							</span>
							<span class="wc-stats">
								<span class="counter"><?php echo(mysqli_num_rows($video_users));?></span> 
							</span>		
							
						</div>				      
					</div>
				</div>
				<div class="col-md-6 col-lg-3 col-xl-3 col-sm-6 col-12">
					<div class="widget-card widget-bg2">					 
						<div class="wc-item">
							<h4 class="wc-title">
								Students who have completed the course
							</h4>
							<span class="wc-des">
								.
							</span>
							<span class="wc-stats">
								<span class="counter"><?php echo(mysqli_num_rows($complete_users));?></span> 
							</span>		
							
						</div>				      
					</div>
				</div>
			</div>
			<div class="row">
			<div class="col-md-6 col-lg-3 col-xl-3 col-sm-6 col-12">
					<div class="widget-card widget-bg3">					 
						<div class="wc-item">
							<h4 class="wc-title">
								Students who have written notes
							</h4>
							<span class="wc-des">
								.
							</span>
							<span class="wc-stats">
								<span class="counter"><?php echo($percent_notes);?></span>% 
							</span>		
							
						</div>				      
					</div>
				</div>
							<div class="col-md-6 col-lg-3 col-xl-3 col-sm-6 col-12">
					<div class="widget-card widget-bg4">					 
						<div class="wc-item">
							<h4 class="wc-title">
								Students who have started the course
							</h4>
							<span class="wc-des">
								.
							</span>
							<span class="wc-stats">
								<span class="counter"><?php echo($percent_first_video_users);?></span>% 
							</span>		
							
						</div>				      
					</div>
				</div>
											<div class="col-md-6 col-lg-3 col-xl-3 col-sm-6 col-12">
					<div class="widget-card widget-bg5">					 
						<div class="wc-item">
							<h4 class="wc-title">
								Total Videos in the course
							</h4>
							<span class="wc-des">
								.
							</span>
							<span class="wc-stats">
								<span class="counter"><?php echo(mysqli_num_rows($query_run));?></span>
							</span>		
							
						</div>				      
					</div>
				</div>
			</div>
			</div>
			<!-- Card END -->
			<div class="row">
				<!-- Your Profile Views Chart -->
				<div class="col-lg-8 m-b30">
					<div class="widget-box">
						<div class="wc-title">
							<h4>Course Views</h4>
						</div>
						<div class="widget-inner">
							<canvas id="chart" width="100" height="45"></canvas>
						</div>
					</div>
				</div>
				

<!-- External JavaScripts -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/vendors/bootstrap/js/popper.min.js"></script>
<script src="assets/vendors/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/vendors/bootstrap-select/bootstrap-select.min.js"></script>
<script src="assets/vendors/bootstrap-touchspin/jquery.bootstrap-touchspin.js"></script>
<script src="assets/vendors/magnific-popup/magnific-popup.js"></script>
<script src="assets/vendors/counter/waypoints-min.js"></script>
<script src="assets/vendors/counter/counterup.min.js"></script>
<script src="assets/vendors/imagesloaded/imagesloaded.js"></script>
<script src="assets/vendors/masonry/masonry.js"></script>
<script src="assets/vendors/masonry/filter.js"></script>
<script src="assets/vendors/owl-carousel/owl.carousel.js"></script>
<script src='assets/vendors/scroll/scrollbar.min.js'></script>
<script src="assets/js/functions.js"></script>
<script src="assets/vendors/chart/chart.min.js"></script>
<script src="assets/js/admin.js"></script>
<script src='assets/vendors/calendar/moment.min.js'></script>
<script src='assets/vendors/calendar/fullcalendar.js'></script>

</body>

<!-- Mirrored from educhamp.themetrades.com/demo/admin/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 22 Feb 2019 13:09:05 GMT -->
