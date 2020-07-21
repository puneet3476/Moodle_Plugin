<?php
$user = 'root';//............This you may have to change
$password = 'root';//............This you may have to change
$host = 'localhost:8889';//............This you may have to change
$appache_localhost_port='8888';
$urla="Location: http://localhost:";
$users_db='central';
$folder="/Webdevpro-master/";

$urlb="load.php";

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