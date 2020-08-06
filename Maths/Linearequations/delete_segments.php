<?php
require "connect.php";
$name = $_GET['name'];
$link->query("DELETE FROM segments WHERE segments_name='" . $name . "'");
header($urla . $appache_localhost_port . $course . $folder . 'segments.php');
