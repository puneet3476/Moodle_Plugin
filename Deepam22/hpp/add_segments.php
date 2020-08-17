<?php

require 'connect.php';
$segs=array();$times=array();

for($x=$y;$x<=$y+4;$x++){
    if($_POST['seg' . $x]!=""){
        $segs[$x] =$_POST['seg' . $x];
        $times[$x] = ($_POST['time' . $x]*60)+$_POST['seconds' . $x];
            echo $times[$x];
        }
} 

for($x=$y;$x<=$y+4;$x++){
    $e=$segs[$x];$ss=$times[$x];
    $total_segments="INSERT INTO segments (segments_name,segment_time)
    VALUES ('$e','$ss')" ;
    $link->query($total_segments);
}
header ($urla.$appache_localhost_port.$course.$folder.'segments.php');

?>
