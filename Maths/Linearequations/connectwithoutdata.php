<?php

$user = 'root'; //............This you may have to change
$password = ''; //............This you may have to change
$host = 'localhost'; //............This you may have to change
$appache_localhost_port = '';
$urla = "Location: http://localhost";

$class_link = "/opt/lampp/htdocs/Moodle_Plugin/otp-php-registration/class";
$urlb = "load.php";
$font_link = "/opt/lampp/htdocs/Moodle_Plugin/otp-php-registration/class/avatar/PTSans.ttf";
$url_load = $urla . $appache_localhost_port . $folder . $urlb;
$homedir = "/opt/lampp/htdocs/Moodle_Plugin/";
$admin_panel = $urla . $appache_localhost_port . $folder . "beijing_admin.php";
$link = new mysqli(
    $host,
    $user,
    $password
);
