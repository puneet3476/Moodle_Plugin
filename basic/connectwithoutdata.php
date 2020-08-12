<?php
$user = 'root'; //............This you may have to change
$password = 'moodle@pluginv1'; //............This you may have to change
$host = 'localhost'; //............This you may have to change
$appache_localhost_port = ''; //............This you may have to change
$urlhost = "";
$urla = "Location: " . $urlhost;
$folder = "/Moodle_Plugin/basic/";
$homedir = "/opt/lampp/htdocs/Moodle_Plugin/";
$class_link = $homedir . "otp-php-registration/class/";
$urlb = "load.php";
$font_link = $class_link . "avatar/PTSans.ttf";
$users_db = 'central';
$inst = 'institution';
$users_database = 'users';
$url_login_check = $urla . $appache_localhost_port . $folder . "login_page.php";
$url_teacher_login_check = $urla . $appache_localhost_port . $folder . "teacher_login_page.php";
$student_panel = $urla . $appache_localhost_port . $folder . "student_panel.php";
$teacher_panel = $urla . $appache_localhost_port . $folder . "teacher_panel.php";
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
$link_users = new mysqli(
    $host,
    $user,
    $password, $users_database
);
