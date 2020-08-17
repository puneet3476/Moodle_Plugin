<?php
require 'connectwithoutdata.php';
$segs = array();
$times = array();
if (isset($_FILES['video'])) {
    $dir_name = $_POST['dir_name'];
    $folder_name = $_POST['folder_name'];
    $database_name = $_POST['folder_name'];
    $hyperlink = $_POST['hyperlink'];
    $course_name = $_POST['course_name'];
    for ($x = 1; $x <= 5; $x++) {
        if($_POST['seg' . $x]!=""){
        $segs[$x] = $x." ".$_POST['seg' . $x];
        $times[$x] = ($_POST['time' . $x]*60)+$_POST['seconds' . $x];
            echo $times[$x];
        }
    }
    $uploadfile = basename($_FILES['video']['name']);
    $videopath = $dir_name . "/videos/" . $uploadfile;

//echo $videopath;
    $video_extension = pathinfo($videopath, PATHINFO_EXTENSION);
    $uploadsize = $_FILES['video']['size'];
    $temp = $_FILES['video']['tmp_name'];
//echo $temp;

    $link_courses = new mysqli(
        $host,
        $user,
        $password, $course_name
    );
    $link_video = new mysqli(
        $host,
        $user,
        $password, $database_name
    );

    if ($video_extension != 'mp4') {?>
    <h3>Video format should be mp4</h3>
    <?php
die();

    }
    if ($uploadsize > 1.8e+8) {?>
    <h3>Video size should not be more than 200MB</h3>
    <?php
die();
    }

    if (move_uploaded_file($_FILES['video']['tmp_name'], $videopath)) {
        rename($videopath, $dir_name . "/videos/" . "video1." . $video_extension);
        ?>
<script type="text/javascript">
    alert("Video Uploaded Successfully");
</script>
<h3>Video Uploaded Successfully</h3>
<h4><?php echo $uploadsize; ?></h4>
<?php

        $total_videos = "INSERT INTO total_videos (database_name,folder_name,page_url)
VALUES ('$database_name','$folder_name','$hyperlink')";
        for ($x = 1; $x <= sizeof($segs); $x++) {
            $e = $segs[$x];
            $ss = $times[$x];
            $total_segments = "INSERT INTO segments (segments_name,segment_time)
    VALUES ('$e','$ss')";
            $link_video->query($total_segments);
        }

        if ($link_courses->query($total_videos) === true) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $total_videos . "<br>" . $link_courses->error;
        }
        header($hyperlink);

    } else {
        ?>
<h3>Video Cannot be uploaded</h3>
<h3>Here is some more debugging info:</h3>
<?php
print_r($_FILES);
    }} else {?>

    <h3>Video Cannot be uploaded because of connection error.<br>
    Video size should not be more than 200MB.
    But you can increase the  maximum allowable upload size in php.ini file by changing the upload_max_size and post_max_file</h3>
    <?php
}
?>
