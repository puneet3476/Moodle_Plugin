<?php
$user = 'root';//............This you may have to change
$password = '';//............This you may have to change
$host = 'localhost';//............This you may have to change
$appache_localhost_port='';//............This you may have to change
$urla="Location: http://localhost";
$users_db='central';
$folder="/Webdevpro-master/";
$class_link="/opt/lampp/htdocs/otp-php-registration/class";
$urlb="load.php";
$font_link="/opt/lampp/htdocs/otp-php-registration/class/avatar/PTSans.ttf";
$url_load=$urla.$appache_localhost_port.$folder.$urlb;

$admin_panel=$urla.$appache_localhost_port.$folder."beijing_admin.php";
$link = new mysqli(
   $host,
   $user,
   $password
);
$link_central = new mysqli(
   $host,
   $user,
   $password,$users_db
);
?>
