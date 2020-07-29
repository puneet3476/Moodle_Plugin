<?php
session_start();
require 'connect.php';
if (!isset($time_array)) {
    # code...
$time_=['00:00:00'];
}

$vid_alltime=$_GET['vid_alltime'];
array_push($time_array, $vid_alltime);

print_r($time_array);
//if ($vid_alltime!=$_SESSION['vid_alltime']) {
//$_SESSION['vid_alltime']=$vid_alltime;
//echo($_SESSION['vid_alltime']);
//}
