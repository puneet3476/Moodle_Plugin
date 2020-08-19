<?php
require 'connect.php';
if (isset($_REQUEST['duration'])) {
    echo $query = "UPDATE total_videos SET videolength=" . $_REQUEST['duration'] . " WHERE database_name='" . $db . "'";
    if (!mysqli_query($link_central, $query)) {
        echo ("Error description: " . mysqli_error($link));
    }
}
