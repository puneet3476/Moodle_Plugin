<?php

$user = 'root';
$password = 'bottletopple202'; //moodle@pluginv1'; //............This you may have to change
$host = 'localhost';
$appache_localhost_port = '';
$urlhost = "http://localhost"; //http://135.181.82.72'; //............This you may have to change
$urla = "Location: " . $urlhost;
$folder = "/Moodle_Plugin/base/";
$homedir = "/opt/lampp/htdocs/Moodle_Plugin/";
$class_link = $homedir . "otp-php-registration/class/";
$urlb = "load.php";
$font_link = $class_link . "avatar/PTSans.ttf";
$url_load = $urla . $appache_localhost_port . $folder . $urlb;
$admin_panel = $urla . $appache_localhost_port . $folder . "beijing_admin.php";
$link = new mysqli(
    $host,
    $user,
    $password
);
