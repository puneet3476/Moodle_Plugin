<?php
$user = 'root'; //............This you may have to change
$password = ''; //............This you may have to change
$host = 'localhost'; //............This you may have to change
$appache_localhost_port = ''; //............This you may have to change
$urlhost = "http://localhost";
$urla = "Location: " . $urlhost;
$folder = "/Moodle_Plugin/base/";
$homedir = "/opt/lampp/htdocs/Moodle_Plugin/";
$class_link = $homedir . "otp-php-registration/class/";
$urlb = "load.php";
$font_link = $class_link . "avatar/PTSans.ttf";
$url_load = $urla . $appache_localhost_port . $folder . $urlb;
$admin_panel = $urla . $appache_localhost_port . $folder . "beijing_admin.php";
$users_db = 'central';
$inst = 'institution';
$link = new mysqli(
    $host,
    $user,
    $password
);
$link_central = new mysqli(
    $host,
    $user,
    $password, $users_db
);
$link_inst = new mysqli(
    $host,
    $user,
    $password, $inst
);
