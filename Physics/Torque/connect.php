<?php
$user = 'root';//............This you may have to change
$password = 'moodle@pluginv1';//............This you may have to change
$db = 'Torque';//............This you may have to change\
$users_db = 'Physics';//............This you may have to change
$host = 'localhost';//............This you may have to change
$appache_localhost_port='';//............This you may have to change
$url_h="http://135.181.82.72";//............This you may have to change
$urla="Location: " . $url_h;//............This you may have to change
$folder="Torque/";
$course="/Moodle_Plugin/Physics/";
$class_link='/opt/lampp/htdocs/Moodle_Plugin/otp-php-registration/class/';
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
$link_users=new mysqli(
   $host,
   $user,
   $password,$users_database
);
?>