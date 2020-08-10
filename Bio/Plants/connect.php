<?php
$user = 'root';//............This you may have to change
$password = '';//............This you may have to change
$db = 'Plants';//............This you may have to change\
$users_db = 'Bio';//............This you may have to change
$host = 'localhost';//............This you may have to change
$appache_localhost_port='';//............This you may have to change
$url_h="http://localhost";//............This you may have to change
$urla="Location: " . $url_h;//............This you may have to change
$folder="Plants/";
$course="/Moodle_Plugin/Bio/";
$class_link='/opt/lampp/htdocs/Moodle_Plugin/otp-php-registration/class/';
$urlb="load.php";

$url_load=$urla.$appache_localhost_port.$course.$folder.$urlb;
$admin_panel=$urla.$appache_localhost_port.$folder."beijing_admin.php";
$link = new mysqli(
   $host,
   $user,
   $password,$db
);
$link_central = new mysqli(
   $host,
   $user,
   $password,$users_db
);
?>