<?php
session_start();
require 'connectwithoutdata.php';
?>


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


<nav class="navbar navbar-expand-lg navbar-light shadow-sm bg-light fixed-top">
<div class=" w-75 mx-auto"> <a class="navbar-brand d-flex align-items-center  position-absolute" href="#">
<svg width="40px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
<g>
<g>
<path d="M511.981,118.509c-0.135-2.956-1.892-5.726-4.565-7.04l-159.24-79.62c-3.776-1.887-8.363-0.64-10.664,2.898 L229.916,200.282l-55.413-85.891c-0.796-1.235-1.945-2.264-3.259-2.922l-159.24-79.62C6.582,29.138,0,33.218,0,39.268v79.621 c0,4.581,3.712,8.294,8.294,8.294c4.581,0,8.294-3.712,8.294-.294V52.687l142.652,71.326v335.32L16.587,388.008V154.277   c0-4.581-3.712-8.294-8.294-8.294c-4.581,0-8.294,3.712-8.294,8.294v238.857c0,3.142,1.775,6.013,4.585,7.418l159.24,79.62  c5.427,2.714,12.003-1.375,12.003-7.418V318.087l324.17,162.085c5.427,2.714,12.003-1.375,12.003-7.418V118.888 C512,118.76,511.987,118.636,511.981,118.509z M175.827,299.541v-152.5l145.239,225.12L175.827,299.541z M495.413,459.335
l-139.34-69.671l108.576-186.993c2.299-3.961,0.952-9.037-3.009-11.337c-3.96-2.298-9.036-0.953-11.337,3.009L344.094,377.258
L239.77,215.555L347.383,49.998l144.717,72.359l-26.387,45.446c-2.299,3.961-0.952,9.037,3.009,11.337  c3.958,2.297,9.035,0.953,11.337-3.009l15.354-26.443V459.335z" fill="#000" />
</g>
</g>
</svg>
<span class="ml-3 font-weight-bold">PILOT</span>
</a> <button class="navbar-toggler navbar-toggler-right border-0" type="button" data-toggle="collapse" data-target="#navbar4">
<span class="navbar-toggler-icon"></span>
</button>


<div class="collapse navbar-collapse float-right " id="navbar4">
<ul class="navbar-nav  mt-3 mt-lg-0">
<li class="nav-item px-lg-2 active"> <a class="nav-link" href="<?php echo(strtolower($_SESSION['my_role'])."_panel.php"); ?>"> <span class="d-inline-block d-lg-none icon-width"><i class="fas fa-home"></i></span>Home</a> </li>
<?php if(($_SESSION['my_role'])=="TEACHER") {?>
<li class="nav-item px-lg-2"> <a class="nav-link" href="course_page.php"><span class="d-inline-block d-lg-none icon-width"><i class="fas fa-spa"></i></span>Courses</a> </li>
<?php } ?>
<li class="nav-item px-lg-2"> <a class="nav-link" href="#"><span class="d-inline-block d-lg-none icon-width"><i class="far fa-user"></i></i></span>About</a> </li>

<li class="nav-item px-lg-2 dropdown d-menu">
<!-- <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="d-inline-block d-lg-none icon-width"><i class="far fa-caret-square-down"></i></span>Dropdown
<svg  id="arrow" xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">

</svg>
</a> -->
<div class="dropdown-menu shadow-sm sm-menu" aria-labelledby="dropdown01">
<a class="dropdown-item" href="#">Action</a>
<a class="dropdown-item" href="#">Another action</a>
<a class="dropdown-item" href="#">Something else here</a>
</div>
</li>

<li class="nav-item px-lg-2"> <a class="nav-link" href="logout.php"><span class="d-inline-block d-lg-none icon-width"><i class="far fa-envelope"></i></span>Logout</a> </li>
</ul>
<ul class="navbar-nav ml-auto mt-3 mt-lg-0">
<!-- <li class="nav-item"> <a class="nav-link" href="#">
  <i class="fab fa-twitter"></i><span class="d-lg-none ml-3">Twitter</span>
</a> </li>
<li class="nav-item"> <a class="nav-link" href="#">
<i class="fab fa-facebook"></i><span class="d-lg-none ml-3">Facebook</span>
</a> </li>
<li class="nav-item"> <a class="nav-link" href="#">
<i class="fab fa-instagram"></i><span class="d-lg-none ml-3">Instagram</span>
</a> </li>
  <li class="nav-item"> <a class="nav-link" href="#">
<i class="fab fa-linkedin"></i><span class="d-lg-none ml-3">Linkedin</span>
</a> </li> -->
</ul>
</div>
</div>
</nav>

<!--The html below this line is for display purpose only-->

