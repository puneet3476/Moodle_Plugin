<?php

require 'connectwithoutdata.php';
$segs=array();$times=array();
$y=$_POST['x']+1;
$video=$_POST['video'];
$course=$_POST['course'];
echo $y;
$link = new mysqli(
    $host,
    $user,
    $password,$video
  );
for($x=$y;$x<=$y+4;$x++){
    if($_POST['seg' . $x]!=""){
    $segs[$x]=$_POST['seg'.$x];
    $times[$x]=$_POST['time'.$x];
    }
}

for($x=$y;$x<=$y+4;$x++){
    $e=$_POST['seg'.$x];$ss=$_POST['time'.$x]*60+$_POST['seconds'];
    $total_segments="INSERT INTO segments (segments_name,segment_time)
    VALUES ('$e','$ss')" ;
    $link->query($total_segments);
}
header ($urla.$appache_localhost_port.$course.$folder.'segments.php?course='.$course.'&video='.$video);

?>
