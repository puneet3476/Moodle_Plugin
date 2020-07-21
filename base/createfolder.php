<?php
require 'connectwithoutdata.php';
$folder_name=$_POST['folder_name'];
$database_name=$_POST['database_name'];
if (empty($folder_name) or empty($database_name) ) {
	echo "Error: Either Foldername or Database name is empty";
	die();
}

$dir_name="/opt/lampp/htdocs/Moodle_Plugin/".$folder_name;//use this for windows "C:\MAMP\htdocs"."\\".$folder_name;

// Store the path of source file
$source = "/opt/lampp/htdocs/Moodle_Plugin/base";// for windows "C:\MAMP\htdocs\base"
$hyperlink=$urla.$appache_localhost_port."/Moodle_Plugin/".$folder_name."//".$urlb;
 


// Create database
$sql = "CREATE DATABASE ".$database_name;
if ($link->query($sql) === TRUE) {
	?><br><?php
  echo "Database created successfully";
} else {
	?><br><?php
  echo "Error creating database: " . $link->error;
}
$sql = file_get_contents('mydb.sql');

$mysqli = new mysqli('localhost', "root", "",$database_name);//............This you may have to change


/* execute multi query */
$mysqli->multi_query($sql);











// Store the path of destination file 
$destination = $dir_name;
custom_copy($source,$destination);
?><br><?php
echo ("Base file copied to ".$destination);


chdir("../");
chdir($folder_name);

$createfile=fopen('connect.php', "w") or die("Can't create Connect.php file");

$connect="<?php
\$user = 'root';//............This you may have to change

\$password = 'root';//............This you may have to change
\$db = '".$database_name."';//............This you may have to change\
\$users_db = 'central';//............This you may have to change
\$host = 'localhost:8889';//............This you may have to change
\$appache_localhost_port='8888';//............This you may have to change
\$urla=\"Location: http://localhost:\";//............This you may have to change
\$url_h=\"http://localhost:\";//............This you may have to change
\$folder=\"/".$folder_name."/\";


\$urlb=\"load.php\";

\$url_load=\$urla.\$appache_localhost_port.\$folder.\$urlb;
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
<form action="uploadvideo.php" enctype="multipart/form-data" method ="POST">
  <h2>UPLOAD VIDEO</h2>
<h3>Instructions!!</h3>
<h4>Video size should be less than 200MB.<br>
Video should be of mp4 format.</h4>
<input type="file" name="video" />

<input type="text" value="<?php echo($dir_name)?>" name="dir_name" style="display: none">

<input type="text" value="<?php echo($hyperlink)?>" name="hyperlink" style="display: none">
<br>

<input type="text" value="<?php echo($folder_name)?>" name="folder_name" style="display: none">
<br>

<input type="text" value="<?php echo($database_name)?>" name="database_name" style="display: none">
<br>
<button class="submit" align="center" type="submit" name="create video">Upload Video</button>
</form>




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