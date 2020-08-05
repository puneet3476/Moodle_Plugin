<?php
$user = 'root';//............This you may have to change
$password = 'moodle@pluginv1';//............This you may have to change
$db = 'plants';//............This you may have to change\
$users_db = 'Bio';//............This you may have to change
$host = 'localhost';//............This you may have to change
$appache_localhost_port='';//............This you may have to change
$urla="Location: http://135.181.82.72/";//............This you may have to change
$url_h="http://135.181.82.72/";//............This you may have to change
$folder="plants/";
$course="/Moodle_Plugin/Bio/";
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