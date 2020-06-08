<?php
$user = 'root';//............This you may have to change
$password = 'root';//............This you may have to change
$db = 'mydb';//............This you may have to change
$host = 'localhost:8889';//............This you may have to change
$appache_localhost_port='8888';
$urla="Location: http://localhost:";
$urlb="/Webdevpro-master/load.php";
$url_load=$urla.$appache_localhost_port.$urlb;
$link = new mysqli(
   $host,
   $user,
   $password,$db
);
?>