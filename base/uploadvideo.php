<?php
$appache_localhost_port='8888';//............This you may have to change
$urla="Location: http://localhost:";//............This you may have to change
$user = 'root';//............This you may have to change

$password = '';//............This you may have to change

$users_db = 'central';//............This you may have to change
$host = 'localhost:8889';//............This you may have to change
$urlb="load.php";

if(isset($_FILES['video'])){
$dir_name=$_POST['dir_name'];
$folder_name=$_POST['folder_name'];
$database_name=$_POST['database_name'];
$hyperlink=$_POST['hyperlink'];
$uploadfile = basename($_FILES['video']['name']);
$videopath=$dir_name."\\videos\\".$uploadfile;

echo $videopath;
$video_extension=pathinfo($videopath,PATHINFO_EXTENSION);
$uploadsize=$_FILES['video']['size'];
$temp=$_FILES['video']['tmp_name'];
echo $temp;

$link_central = new mysqli(
   $host,
   $user,
   $password,$users_db
);

if ($video_extension!='mp4') {?>
	<h3>Video format should be mp4</h3>
	<?php
	die();
	
}
if ($uploadsize>1.8e+8) {?>
	<h3>Video size should not be more than 200MB</h3>
	<?php
	die();
}
if (move_uploaded_file($_FILES['video']['tmp_name'], $videopath)) {
rename($videopath,$dir_name."\\videos\\"."video1.".$video_extension);
?>
<script type="text/javascript">
	alert("Video Uploaded Successfully");
</script>
<h3>Video Uploaded Successfully</h3>
<h4><?php echo $uploadsize;?></h4>
<?php
$total_videos="INSERT INTO total_videos (database_name,folder_name,page_url)
VALUES ('$database_name','$folder_name','$hyperlink')" ;
if ($link_central->query($total_videos) === TRUE) {
    echo "New record created successfully";
}
else{
	echo "Error: " . $total_videos . "<br>" . $link_central->error;
}
header ($hyperlink);

}
else{
	?>
<h3>Video Cannot be uploaded</h3>
<h3>Here is some more debugging info:</h3>
<?php
print_r($_FILES);
} }
else{?>
	<h3>Video Cannot be uploaded because of connection error.<br>
	Video size should not be more than 200MB.
    But you can increase the  maximum allowable upload size in php.ini file by changing the upload_max_size and post_max_file</h3>
	<?php
}
?>
