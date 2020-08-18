  
<?php
require 'connect.php';
       $name=$_POST['name'];
       $times=$_POST['time'];
       echo $times;
       echo $name;
  $link->query("UPDATE segments SET segment_time='".$times."' WHERE segments_name='".$name."'");
  header ($urla.$appache_localhost_port.$course.$folder.'segments.php');

?>