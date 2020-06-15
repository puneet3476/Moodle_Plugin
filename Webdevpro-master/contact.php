<?php
require 'connect.php';

if ($link->connect_error) {
    die("Connection failed: " . $link->connect_error);}

$phone=mysqli_real_escape_string($link, $_POST['phone']);
$comment=mysqli_real_escape_string($link, $_POST['comment']);
$website=mysqli_real_escape_string($link, $_POST['website']);
$name=mysqli_real_escape_string($link, $_POST['name']);
$email=mysqli_real_escape_string($link, $_POST['email']);
$qa="INSERT INTO `contactus` (name,website,comment,email,phone)
VALUES ('$name','$website','$comment','$email','$phone')";
if ($link->query($qa) === TRUE) {
    echo "Entered successfully";
} else {
    echo "Error: " . $qa . "<br>" . $link->error;
}
header( "Location: http://localhost/Moodle_Plugin/Webdevpro-master/generic.html" );//............This you may have to change
die();
?>
