<?php
require 'connectwithoutdata.php';
$course=$_POST['course'];
$video=$_POST['vids'];

header($urla.$appache_localhost_port.'/Moodle_Plugin/'.$course.'/'.$video.'/segments.php');
?>  