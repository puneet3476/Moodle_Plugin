<?php

$user = 'root';//............This you may have to change
$password = 'moodle@pluginv1';//............This you may have to change
$host = 'localhost';//............This you may have to change
$appache_localhost_port='';
$urla="Location: http:/135.181.82.72";

$folder="/Moodle_Plugin/base/";
$class_link="http://135.181.82.72/Moodle_Plugin/otp-php-registration/class";
$urlb="load.php";
$font_link="http://135.181.82.72/otp-php-registration/class/avatar/PTSans.ttf";
$url_load=$urla.$appache_localhost_port.$folder.$urlb;
$homedir="/opt/lampp/htdocs"."//";
$admin_panel=$urla.$appache_localhost_port.$folder."beijing_admin.php";
$link = new mysqli(
   $host,
   $user,
   $password
);

?>
