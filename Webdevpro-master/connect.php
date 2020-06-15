<?php
$user = 'root';//............This you may have to change
$password = 'bottletopple202';//............This you may have to change
$db = 'mydb';//............This you may have to change
$host = 'localhost';//............This you may have to change
$appache_localhost_port='8888';
$urla="Location: http://localhost";
$urlb="/Moodle_Plugin/Webdevpro-master/load.php";
$url_load=$urla.$urlb;
$link = new mysqli(
   $host,
   $user,
   $password,$db
);
?>