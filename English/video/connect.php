<?php
$user = 'root';//............This you may have to change
$password = 'bottletopple202';//............This you may have to change
$db = 'video';//............This you may have to change\
$users_db = 'English';//............This you may have to change
$host = 'localhost';//............This you may have to change
$appache_localhost_port='';//............This you may have to change
$url_h="localhost";//............This you may have to change
$urla="Location: " . $url_h;//............This you may have to change
$folder="video/";
$course="/Moodle_Plugin/English/";
$class_link='/var/www/html/Moodle_Plugin/otp-php-registration/class/';
$urlb="load.php";
$users_database='users';
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
$link_users = new mysqli(
    $host,
    $user,
    $password, $users_database
);
?>