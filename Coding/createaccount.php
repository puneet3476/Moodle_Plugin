<?php
session_start();
require 'connect.php';
$name=mysqli_real_escape_string($link, $_POST['user']);
$realname=mysqli_real_escape_string($link, $_POST['realname']);
$role=mysqli_real_escape_string($link, $_POST['role']);
$pass=mysqli_real_escape_string($link, $_POST['pass']);

if (empty($name) || empty($pass) || empty($realname) || empty($role)) {
header($url);
exit();
}
$_SESSION['signuser']=$name;


$qy="INSERT INTO users(username,realname,role,password)
VALUES ('$name','$realname','$role','$pass')" ;

echo ($_SESSION['signuser']);

if ($link_central->query($qy) === TRUE) {
    $last_id = $conn->insert_id;
}

header($url_load);
?>
