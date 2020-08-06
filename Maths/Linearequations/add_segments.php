<?php

require 'connect.php';
$segs = array();
$times = array();
$y = $_POST['x'] + 1;
echo $y;
for ($x = $y; $x <= $y + 4; $x++) {
    $segs[$x] = $_POST['seg' . $x];
    $times[$x] = $_POST['time' . $x];
}

for ($x = $y; $x <= $y + 4; $x++) {
    $e = $_POST['seg' . $x];
    $ss = $_POST['time' . $x];
    $total_segments = "INSERT INTO segments (segments_name,segment_time)
    VALUES ('$e','$ss')";
    $link->query($total_segments);
}
header($urla . $appache_localhost_port . $course . $folder . 'segments.php');
