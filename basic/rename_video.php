<?php
require 'connectwithoutdata.php';
$video_name=$_POST['video_name'];
$database_name=$_POST['database_name'];
$course_name=$_POST['course_name'];
$new_folder_name=$_POST['new_folder_name'];
$new_database_name=implode('', explode(' ',$new_folder_name));
    $link_course = new mysqli(
    $host,
    $user,
    $password,$course_name);
if ($link_course->connect_error) {
  die("Connection failed: " . $link_course->connect_error);
}
    $result = "UPDATE `total_videos` SET `folder_name`='$new_folder_name' WHERE `database_name`='$database_name' ";
    if ($link_course->query($result) === TRUE) {
  echo "Record updated successfully";

} else {
  echo "Error updating record: " . $link_course->error;
  die();
}
$old_src=$htdocs_path.'/'.$course_name.'/'."$video_name";
$new_src=$htdocs_path.'/'.$course_name.'/'."$new_folder_name";
if(rename($old_src,$new_src)){
  echo "File renamed";
}
else{
  echo "error in renaming the file";
  die();
}

    header($urla.$appache_localhost_port.$folder."add_videos.php?course_name=".$course_name); 
?>
