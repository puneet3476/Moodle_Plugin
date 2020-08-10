<?php
$user = 'root';//............This you may have to change
$password = 'bottletopple202';//............This you may have to change
$host = 'localhost';//............This you may have to change
$appache_localhost_port='';//............This you may have to change
$urla="Location: http://localhost";

$folder="/base/";
$class_link="var/www/html/otp-php-registration/class";
$urlb="load.php";
$font_link="var/www/html/otp-php-registration/class/avatar/PTSans.ttf";

$user = 'root';//............This you may have to change
$password = 'root';//............This you may have to change
$host = 'localhost';//............This you may have to change
$appache_localhost_port='';
$urla="Location: http://localhost";


$class_link="C:\MAMP\htdocs\otp-php-registration\class";
$urlb="load.php";
$font_link="C:\MAMP\htdocs\otp-php-registration\class\avatar\PTSans.ttf";
$url_load=$urla.$appache_localhost_port.$folder.$urlb;
$homedir="C:\MAMP\htdocs"."\\";
$admin_panel=$urla.$appache_localhost_port.$folder."beijing_admin.php";
$link = new mysqli(
   $host,
   $user,
   $password
);

?>
