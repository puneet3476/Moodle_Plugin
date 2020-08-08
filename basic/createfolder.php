<link rel="stylesheet" type="text/css" href="./assets/css/bootstrap.css">
<?php
require 'connectwithoutdata.php';
$folder_name=$_POST['folder_name'];
$database_name=$_POST['folder_name'];
$course_name=$_POST['course_name'];
if (empty($folder_name) or empty($database_name) ) {
  echo "Error: Either Foldername  is empty";
  die();
}
$dir_name="C:\MAMP\htdocs"."\\".$course_name."\\".$folder_name;

// Store the path of source file 
$source = "C:\MAMP\htdocs\base"; 
$hyperlink=$urla.$appache_localhost_port."/".$course_name."/".$folder_name."/".$urlb;

// Create database
$sql = "CREATE DATABASE ".$database_name;
if ($link->query($sql) === TRUE) {
  ?><br><?php
  // echo "Database created successfully";
} else {
  ?><br><?php
  echo "Error creating database: " . $link->error;
}
$sql = file_get_contents('video.sql');

$mysqli = new mysqli($host, $user, $password,$database_name);//............This you may have to change

/* execute multi query */
$mysqli->multi_query($sql);











// Store the path of destination file
$destination = $dir_name;
custom_copy($source,$destination);
?><br><?php
// echo ("Base file copied to ".$destination);


chdir("../");
chdir($course_name);
chdir($folder_name);
$createfile=fopen('connect.php', "w") or die("Can't create Connect.php file");

$connect="<?php
\$user = 'root';//............This you may have to change
\$password = 'root';//............This you may have to change
\$db = '".$database_name."';//............This you may have to change\
\$users_db = '".$course_name."';//............This you may have to change
\$host = 'localhost:8889';//............This you may have to change
\$appache_localhost_port='8888';//............This you may have to change
\$urla=\"Location: http://localhost:\";//............This you may have to change
\$url_h=\"http://localhost:\";//............This you may have to change
\$folder=\"".$folder_name."/\";
\$course=\"/".$course_name."/\";
\$urlb=\"load.php\";

\$url_load=\$urla.\$appache_localhost_port.\$course.\$folder.\$urlb;
\$admin_panel=\$urla.\$appache_localhost_port.\$folder.\"beijing_admin.php\";
\$link = new mysqli(
   \$host,
   \$user,
   \$password,\$db
);
\$link_central = new mysqli(
   \$host,
   \$user,
   \$password,\$users_db
);
?>";
$write=fwrite($createfile,$connect);
fclose($createfile);


?>
<div class="container jumbotron">
<form action="uploadvideo.php" enctype="multipart/form-data" method ="POST">
  <h2 class=" text-center text-success">UPLOAD VIDEO</h2>


<!-- <form action="" method="get">
    <input type="number" name="noofseg" placeholder="Enter number of segments">
    <button class="submit" align="center" type="submit" name="createsegnum">Create segments</button>
</form> -->

<input type="file" name="video"  class=" d-block mx-auto mt-4"/><br><br>

<h3>Instructions!</h3>
<h4>Video size should be less than 200MB.<br>
Video should be of mp4 format.</h4>
No. Segments to your Lecture(Optional):<br>

<?php

    for($x=1;$x<=5;$x++){?>
        <input type="text" name="seg<?php echo $x?>" placeholder="topic" id="seg<?php echo $x ?>" />
        <input type="number" name="time<?php echo $x?>" placeholder="starting time in seconds" id="time<?php echo $x ?>"/><br>
    <?php } ?>

<input type="text" value="<?php echo($dir_name)?>" name="dir_name"  style="display: none;">
<input type="text" value="<?php echo($course_name)?>" name="course_name"  style="display: none;">

<input type="text" value="<?php echo($hyperlink)?>" name="hyperlink" style="display: none;">
<br>

<input type="text" value="<?php echo($folder_name)?>" name="folder_name" style="display: none;">
<br>

<input type="text" value="<?php echo($database_name)?>" name="database_name"  style="display: none;">
<br>
<button class="submit btn btn-success btn-lg d-block mx-auto" align="center" type="submit" name="create video" id="createvid" onclick="submitForms()">Upload Video</button>
</form>

</script>
</div>




<?php





//custom_copy($source,$destination);

function custom_copy($src, $dst) {

    // open the source directory
    $dir = opendir($src);

    // Make the destination directory if not exist
    @mkdir($dst);

    // Loop through the files in source directory
    foreach (scandir($src) as $file) {

        if (( $file != '.' ) && ( $file != '..' )) {
            if ( is_dir($src . '/' . $file) )
            {

                // Recursively calling custom copy function
                // for sub directory
                custom_copy($src . '/' . $file, $dst . '/' . $file);

            }
            else {
                copy($src . '/' . $file, $dst . '/' . $file);
            }
        }
    }

    closedir($dir);
}


?>
