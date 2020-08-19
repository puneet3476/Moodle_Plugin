<!-- <link rel="stylesheet" type="text/css" href="./assets/css/bootstrap.css"> -->
<!-- <link rel="stylesheet" href="assets/css/index.css"> -->
<?php
require 'connectwithoutdata.php';
require 'header.php';
$folder_name = $_POST['folder_name'];
$database_name = implode('', explode(' ', $folder_name));
$course_name = $_POST['course_name'];
session_start();
if (empty($folder_name) or empty($database_name)) {
    echo "Error: Either Foldername  is empty";
    die();
}

$dir_name = $homedir . $course_name . "/" . $folder_name;

// Store the path of source file
$source = $homedir . "base";
$hyperlink = $urla . $appache_localhost_port . "/Moodle_Plugin/" . $course_name . "/" . $folder_name . "/" . $urlb;

// Create database
$sql = "CREATE DATABASE " . $database_name;
if ($link->query($sql) === true) {
    ?><br><?php
// echo "Database created successfully";
} else {
    ?><br><?php
echo "Error creating database: " . $link->error;
}
$sql = file_get_contents('video.sql');

$mysqli = new mysqli($host, $user, $password, $database_name); //............This you may have to change

/* execute multi query */
$mysqli->multi_query($sql);

// Store the path of destination file
$destination = $dir_name;
custom_copy($source, $destination);
?><br><?php
// echo ("Base file copied to ".$destination);

chdir("../");
chdir($course_name);
chdir($folder_name);
$createfile = fopen('connect.php', "w") or die("Can't create Connect.php file");

$connect = "<?php
\$user = 'root';//............This you may have to change
\$password = '" . $password . "';//............This you may have to change
\$db = '" . $database_name . "';//............This you may have to change\
\$users_db = '" . $course_name . "';//............This you may have to change
\$host = 'localhost';//............This you may have to change
\$appache_localhost_port='';//............This you may have to change
\$url_h=\"" . $urlhost . "\";//............This you may have to change
\$urla=\"Location: \" . \$url_h;//............This you may have to change
\$folder=\"" . $folder_name . "/\";
\$course=\"/Moodle_Plugin/" . $course_name . "/\";
\$class_link='" . $class_link . "';
\$urlb=\"load.php\";
\$users_database='users';
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
\$link_users = new mysqli(
    \$host,
    \$user,
    \$password, \$users_database
);
?>";
$write = fwrite($createfile, $connect);
fclose($createfile);

?>
<style>
			body {
	width: 100%;
	height:100%;
	font-family: 'Open Sans', sans-serif;
	background: #092756;
	background: -moz-radial-gradient(0% 100%, ellipse cover, rgba(104,128,138,.4) 10%,rgba(138,114,76,0) 40%),-moz-linear-gradient(top,  rgba(57,173,219,.25) 0%, rgba(42,60,87,.4) 100%), -moz-linear-gradient(-45deg,  #670d10 0%, #092756 100%);
	background: -webkit-radial-gradient(0% 100%, ellipse cover, rgba(104,128,138,.4) 10%,rgba(138,114,76,0) 40%), -webkit-linear-gradient(top,  rgba(57,173,219,.25) 0%,rgba(42,60,87,.4) 100%), -webkit-linear-gradient(-45deg,  #670d10 0%,#092756 100%);
	background: -o-radial-gradient(0% 100%, ellipse cover, rgba(104,128,138,.4) 10%,rgba(138,114,76,0) 40%), -o-linear-gradient(top,  rgba(57,173,219,.25) 0%,rgba(42,60,87,.4) 100%), -o-linear-gradient(-45deg,  #670d10 0%,#092756 100%);
	background: -ms-radial-gradient(0% 100%, ellipse cover, rgba(104,128,138,.4) 10%,rgba(138,114,76,0) 40%), -ms-linear-gradient(top,  rgba(57,173,219,.25) 0%,rgba(42,60,87,.4) 100%), -ms-linear-gradient(-45deg,  #670d10 0%,#092756 100%);
	background: -webkit-radial-gradient(0% 100%, ellipse cover, rgba(104,128,138,.4) 10%,rgba(138,114,76,0) 40%), linear-gradient(to bottom,  rgba(57,173,219,.25) 0%,rgba(42,60,87,.4) 100%), linear-gradient(135deg,  #670d10 0%,#092756 100%);
	filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#3E1D6D', endColorstr='#092756',GradientType=1 );
}
		</style>
<body class="gradient">
<div class="container jumbotron">
<form action="uploadvideo.php" enctype="multipart/form-data" method ="POST" class="jumbotron mx-auto">
  <h2 class=" text-center text-success">Select Video</h2>


<!-- <form action="" method="get">
    <input type="number" name="noofseg" placeholder="Enter number of segments">
    <button class="submit" align="center" type="submit" name="createsegnum">Create segments</button>
</form> -->

<input type="file" name="video"  class=" d-block mx-auto mt-4"/><br>

<h6 align="center">(Video size should be less than 200MB.)<br>
  </h6>
<h6 align="center" >No. Segments to your Lecture(Optional):<br></h6>
<div class="col-md-3"></div>
<div class="mx-auto container col-md-8">
<?php

for ($x = 1; $x <= 5; $x++) {?>
        <input type="text" name="seg<?php echo $x ?>" placeholder="topic" id="seg<?php echo $x ?>"  /> :
        <span><input type="number"  style="width:80px" name="time<?php echo $x ?>" id="time<?php echo $x ?>"/>minutes
        <input type="number" style="width:80px" name="seconds<?php echo $x ?>"  id="time<?php echo $x ?>"/>seconds<br>
        </span>
    <?php }?>
</div>
<input type="text" value="<?php echo ($dir_name) ?>" name="dir_name"  style="display: none;">
<input type="text" value="<?php echo ($course_name) ?>" name="course_name"  style="display: none;">

<input type="text" value="<?php echo ($hyperlink) ?>" name="hyperlink" style="display: none;">
<br>

<input type="text" value="<?php echo ($folder_name) ?>" name="folder_name" style="display: none;">
<br>

<input type="text" value="<?php echo ($database_name) ?>" name="database_name"  style="display: none;">
<br>
<button class="submit btn btn-success btn-lg d-block mx-auto" align="center" type="submit" name="create video" id="createvid" onclick="submitForms()">Upload Video</button>
</form>

</script>
</div>
    </div>



<?php

//custom_copy($source,$destination);

function custom_copy($src, $dst)
{

    // open the source directory
    $dir = opendir($src);

    // Make the destination directory if not exist
    @mkdir($dst);

    // Loop through the files in source directory
    foreach (scandir($src) as $file) {

        if (($file != '.') && ($file != '..')) {
            if (is_dir($src . '/' . $file)) {

                // Recursively calling custom copy function
                // for sub directory
                custom_copy($src . '/' . $file, $dst . '/' . $file);

            } else {
                copy($src . '/' . $file, $dst . '/' . $file);
            }
        }
    }

    closedir($dir);
}

?>
