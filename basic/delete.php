<?php
function delete_course($htdocs_path,$the_course_name)
{require 'connectwithoutdata.php';
 $link_course = new mysqli(
    $host,
    $user,
    $password,$the_course_name);
    $query = mysqli_query($link_course,"SELECT * FROM `total_videos`" );
            while ($row=mysqli_fetch_array($query)) {
              echo($row['folder_name']);
              echo($row['database_name']);
              delete_video($htdocs_path,$the_course_name,$row['folder_name'],$row['database_name']);
            }
    $sql = 'DROP DATABASE '.$the_course_name;
   $retval = mysqli_query($link,$sql);
   
   if(!$retval) {
      echo('Could not delete database: ' . mysqli_error());
      
   }
   
   echo "Database deleted successfully\n";
   $del= mysqli_query($link_inst,"DELETE FROM courses WHERE `course_name` = '$the_course_name' " );
 
      if ($link_inst->query($del) === TRUE) {
  echo "Record deleted successfully";

} else {
  echo "Error deleting record: " . $link_inst->error;
  
}
    rmdir($htdocs_path.'/'.$the_course_name);

 header($urla.$appache_localhost_port.$folder."course_page.php");
}

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
      echo('Could not delete database: ' . mysqli_error());
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
