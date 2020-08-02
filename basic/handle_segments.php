<?php
require 'connectwithoutdata.php';
$course=$_POST['course'];
$video=$_POST['vids'];

header($urla.$appache_localhost_port.'/'.$course.'/'.$video.'/segments.php');
?>  