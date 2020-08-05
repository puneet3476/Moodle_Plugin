<?php
$user = 'root';//............This you may have to change
$password = 'moodle@pluginv1';//............This you may have to change
$host = 'localhost';//............This you may have to change
$appache_localhost_port='';//............This you may have to change
$urla="Location: http://135.181.82.72";
$users_db='central';
$inst='institution';
$folder="/Moodle_Plugin/base/";
$class_link="/opt/lampp/htdocs/Moodle_Plugin/otp-php-registration/class";
$urlb="load.php";
$font_link="/opt/lampp/htdocs/Moodle_Plugin/otp-php-registration/class/avatar/PTSans.ttf";
$url_load=$urla.$appache_localhost_port.$folder.$urlb;
$homedir="/opt/lampp/htdocs/Moodle_Plugin/";
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
$link_inst = new mysqli(
   $host,
   $user,
   $password,$inst
);
?>



