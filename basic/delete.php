<?php


function delete_video($htdocs_path,$course_name,$video_name,$database_name)
{   $src=$htdocs_path.'/'.$course_name.'/'."$video_name";
    require 'connectwithoutdata.php';
    echo($src);
    delete_file($src);
    rmdir($src);
    $link_course = new mysqli(
    $host,
    $user,
    $password,$course_name);
    $result = mysqli_query($link_course,"DELETE FROM `total_videos` WHERE `database_name`='$database_name' ");
    if ($link_course->query($result) === TRUE) {
  echo "Record deleted successfully";

} else {
  echo "Error deleting record: " . $link_course->error;
}

   $sql = 'DROP DATABASE '.$database_name;
   $retval = mysqli_query($link,$sql);
   
   if(!$retval) {
      die('Could not delete database: ' . mysqli_error());
   }
   
   echo "Database deleted successfully\n";
}
function delete_file($folder)
{
	{  $src=$folder;
    echo($src);
     $dir = opendir($src);

    // Loop through the files in source directory
    foreach (scandir($src) as $file) {

        if (( $file != '.' ) && ( $file != '..' )) {
            if ( is_dir($src . '/' . $file) )
            {

                // Recursively calling custom copy function
                // for sub directory
                delete_file($src . '/' . $file);
                rmdir($src.'/'.$file);

            }
            else {
                unlink($src . '/' . $file);
            }
        }
    }

    closedir($dir);
}
}

//delete_video("C:\MAMP\htdocs","mycourse","avatari");


?>