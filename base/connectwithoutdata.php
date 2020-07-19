<?php
$user = 'root';//............This you may have to change
$password = '';//............This you may have to change
$host = 'localhost';//............This you may have to change
$appache_localhost_port='';//............This you may have to change
$urla="Location: http://localhost";

$folder="/Moodle_Plugin/base/";

$urlb="load.php";
 
$url_load=$urla.$appache_localhost_port.$folder.$urlb;

$admin_panel=$urla.$appache_localhost_port.$folder."beijing_admin.php";
$link = new mysqli(
   $host,
   $user,
   $password
);
?>
