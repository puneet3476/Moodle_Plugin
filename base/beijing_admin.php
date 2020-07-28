<link rel="stylesheet" type="text/css" href="./assets/css/bootstrap.css">
<script src="https://kit.fontawesome.com/361990fe0a.js" crossorigin="anonymous"></script>
<?php
require 'connectwithoutdata.php';
?>
<div class="container">
<h1 class="text-center font-bold mb-5" >Welcome to Admin Panel</h1>

<div class=" jumbotron mb-5 w-100 row-cols-2">
<i class="fas fa-cloud-upload-alt float-right col-3" style="font-size:150px;" ></i>
<span class="w-100 d-inline-block col-8">
						<h3 class="welcome text-center mx-auto">Upload A new Video Lecture</h3>
						<form class="form1 mx-auto " action="createfolder.php" method="POST" >
							
							<input class="username d-block mb-2 mx-auto " type="text" align="center"  name="folder_name" placeholder="Lecture Name">	
							<button class="submit btn btn-success btn-sm  d-block mx-auto " align="center" type="submit" name="create video">Create Video</button>
							 
						</form>
</span>					

</div>




<br>
<div class="jumbotron ">
<i class="fas fa-server float-right" style="font-size:150px;"></i>	
<form action="download_data.php" method="POST" >
<h3 class="text-center mb-4 d-block">Dowload Database</h1>
<select id="database" name="database" >
<option selected value="none">Select Video</option>
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
<select id="table" name="table" class="" >
<option selected value="none">Select Table</option>
<option  value="clickdata">clickdata</option>
<option  value="prevideosurvey">prevideosurvey</option>
<option  value="chat">chat</option>
<option  value="reply">reply</option>
<option  value="note">note</option>
<option  value="postvideosurvey">postvideosurvey</option>
</select>
<button class="submit btn btn-danger btn-sm " align="center" type="submit" name="download data">Download Data</button>

</form>

</div>
</div>