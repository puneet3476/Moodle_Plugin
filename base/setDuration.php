<?php
require 'connect.php';
if (isset($_REQUEST['duration'])) {
    echo $query = "UPDATE total_videos SET videolength=" . $_REQUEST['duration'] . " WHERE database_name='" . $db . "'";
    if (!mysqli_query($link_central, $query)) {
        echo ("Error description: " . mysqli_error($link));
    }
}
if (isset($_GET['complete'])) {
    $usery=$_GET['usery'];
    $video_name = S_GET['video_name'];
   echo $query = "UPDATE tbl_info SET $video_name=".$_GET['complete']."  WHERE `name` = '$usery'";
   if (!mysqli_query($link_central, $query)) {
    echo ("Error description: " . mysqli_error($link));
}
}
?>