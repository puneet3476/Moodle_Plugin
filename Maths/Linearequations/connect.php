<?php
$user = 'root'; //............This you may have to change
$password = ''; //............This you may have to change
$db = 'Linearequations'; //............This you may have to change\
$users_db = 'Maths'; //............This you may have to change
$host = 'localhost'; //............This you may have to change
$appache_localhost_port = ''; //............This you may have to change
$urla = "Location: http://localhost"; //............This you may have to change
$url_h = "http://localhost"; //............This you may have to change
$folder = "Linearequations/";
$course = "/Moodle_Plugin/Maths/";
$urlb = "load.php";

$url_load = $urla . $appache_localhost_port . $course . $folder . $urlb;
$admin_panel = $urla . $appache_localhost_port . $folder . "beijing_admin.php";
$link = new mysqli(
    $host,
    $user,
    $password, $db
);
$link_central = new mysqli(
    $host,
    $user,
    $password, $users_db
);
