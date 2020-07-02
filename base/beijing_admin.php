<?php
require 'connectwithoutdata.php';
?>
<h1>Welcome to Admin Panel</h1>
<h3>Warning! If you are a student please go back to the course page.</h3>

<h1>Upload A new Video</h1>
	    			<form class="form1" action="createfolder.php" method="POST" >
		      			<input class="username" type="text" align="center"  name="folder_name" placeholder="FOLDER NAME">
		      			<input class="username" type="text" align="center"  name="database_name" placeholder="Database Name">

		      			<button class="submit" align="center" type="submit" name="create video">Create Video</button>
					</form>

<h3>Warning! Give a unique folder and database name, otherwise your previous video or data may get deleted.</h3>
<br>
<br>
<form action="download_data.php" method="POST">
<h1>Dowload Database</h1>
<select id="database" name="database" >
<option selected value="none">SELECT Database</option>
<?php
$link_central = new mysqli(
   $host,
   $user,
   $password,
   'central'
);
$result = mysqli_query($link_central,"SELECT * FROM `total_videos` " );
while ($row=mysqli_fetch_array($result)) {
?>
<option value="<?php echo $row['database_name']; ?>"><?php echo $row['folder_name']; ?></option>

<?php
}

?>
</select>
<select id="table" name="table" >
<option selected value="none">SELECT Table</option>
<option  value="clickdata">clickdata</option>
<option  value="prevideosurvey">prevideosurvey</option>
<option  value="chat">chat</option>
<option  value="reply">reply</option>
<option  value="note">note</option>
<option  value="postvideosurvey">postvideosurvey</option>
</select>
<button class="submit" align="center" type="submit" name="download data">Download Data</button>
</form>