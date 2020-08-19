
<!-- <link rel="stylesheet" type="text/css" href="./assets/css/bootstrap.css"> -->
<script src="https://kit.fontawesome.com/361990fe0a.js" crossorigin="anonymous"></script>
<style>
.hovers:hover{
    background-color:#999999;
}
</style>
<?php
//session_start();
require 'header.php';

if (($_SESSION['my_role']) != 'TEACHER') {
    die("You are forbidden to visit this page");
}
if (isset($_GET['course_name'])) {
    $course_name = $_GET['course_name'];
    require 'connectwithoutdata.php';
    if (array_key_exists('delete_video', $_POST)) {
        require 'delete.php';
        delete_video($htdocs_path, $course_name, $_POST['video_name'], $_POST['database_name']);
        header($urla . $appache_localhost_port . $folder . "add_videos.php?course_name=" . $course_name);
    }

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
<!-- <link rel="stylesheet" href="assets/css/index.css"> -->
<body class="gradient">
<div class="vertical-center ">
<div class="container p-4 mt-5">
<h1 class="text-center font-bold mb-5 mt-3 text-light" ><?php echo $course_name ?> Admin panel</h1>

<div class=" jumbotron p-3 w-100 row-cols-2 d-table " style="background-color:#5ebdf7 ;">
 <img src="data:image/svg+xml;base64,PHN2ZyBpZD0iTGF5ZXJfMSIgZW5hYmxlLWJhY2tncm91bmQ9Im5ldyAwIDAgNTEyIDUxMiIgaGVpZ2h0PSI1MTIiIHZpZXdCb3g9IjAgMCA1MTIgNTEyIiB3aWR0aD0iNTEyIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPjxwYXRoIGQ9Im0zNDEuMTU5IDM0Mi43NjdjMC00Ny4wNTkgMzguMDk1LTg1LjM0NCA4NC45MTktODUuMzQ0IDIxLjg0OCAwIDQxLjc4OSA4LjMzOSA1Ni44NTQgMjIuMDA5di0xOTAuMzY5YzAtMy4zOTUtMi43NjYtNi4xNzUtNi4xNDUtNi4xNzVoLTQ3MC42NDNjLTMuMzggMC02LjE0NCAyLjc4LTYuMTQ0IDYuMTc1djMwOS45NTRjMCAzLjM5NiAyLjc2NSA2LjE3NSA2LjE0NCA2LjE3NWgzNjIuMTEzYy0xNi42NTQtMTUuNTkxLTI3LjA5OC0zNy44LTI3LjA5OC02Mi40MjV6IiBmaWxsPSIjM2Q1OTU5Ii8+PHBhdGggZD0ibTMyLjQ1MSAzOTkuMDE4di0zMDkuOTU1YzAtMy4zOTUgMi43NjQtNi4xNzUgNi4xNDUtNi4xNzVoLTMyLjQ1MmMtMy4zOCAwLTYuMTQ0IDIuNzgtNi4xNDQgNi4xNzV2MzA5Ljk1NGMwIDMuMzk2IDIuNzY1IDYuMTc1IDYuMTQ0IDYuMTc1aDMyLjQ1MWMtMy4zOCAwLTYuMTQ0LTIuNzc4LTYuMTQ0LTYuMTc0eiIgZmlsbD0iIzM3NDk0OSIvPjxwYXRoIGQ9Im0zNDEuMTU5IDM0Mi43NjdjMC0yOS44MTMgMTUuMy01Ni4wODggMzguNDEyLTcxLjM1NHYtMTg4LjUyNGgtMjc2LjIxMXYzMjIuMzA0aDI2NC44OTdjLTE2LjY1NC0xNS41OTItMjcuMDk4LTM3LjgwMS0yNy4wOTgtNjIuNDI2eiIgZmlsbD0iIzhjOWJhNyIvPjxwYXRoIGQ9Im0xMDMuMzYgODIuODg5aDMxLjk4NXYzMjIuMzA0aC0zMS45ODV6IiBmaWxsPSIjNzk4Yjk3Ii8+PHBhdGggZD0ibTE4Ni45MjUgMTc5LjQ1OWMwLTIuODM1IDEuOTg3LTMuOTYxIDQuNDE3LTIuNTAzbDExNS44NzEgNjkuNTU3YzIuNDI5IDEuNDU5IDIuNDI5IDMuODQ1IDAgNS4zMDRsLTExNS44NzEgNjkuNTUzYy0yLjQzIDEuNDU4LTQuNDE3LjMzMi00LjQxNy0yLjUwM3oiIGZpbGw9IiNmZDY0NmYiLz48cGF0aCBkPSJtMjE4LjkxMyAxOTMuNTA4LTI3LjU3MS0xNi41NTJjLTIuNDMtMS40NTgtNC40MTctLjMzMi00LjQxNyAyLjUwM3YxMzkuNDA3YzAgMi44MzUgMS45ODcgMy45NjEgNC40MTcgMi41MDNsMjcuNTcxLTE2LjU1MXoiIGZpbGw9IiNmYzQ3NTUiLz48ZyBmaWxsPSIjZmZmIj48cGF0aCBkPSJtNjkuNTM3IDE1Mi42NTZjMCAxLjcwMi0xLjM5MSAzLjA5My0zLjA5MSAzLjA5M2gtMjcuODE0Yy0xLjcgMC0zLjA5MS0xLjM5MS0zLjA5MS0zLjA5M3YtMjcuODMyYzAtMS43MDIgMS4zOTEtMy4wOTMgMy4wOTEtMy4wOTNoMjcuODE0YzEuNyAwIDMuMDkxIDEuMzkxIDMuMDkxIDMuMDkzeiIvPjxwYXRoIGQ9Im02OS41MzcgMjIyLjc1NWMwIDEuNzAxLTEuMzkxIDMuMDkzLTMuMDkxIDMuMDkzaC0yNy44MTRjLTEuNyAwLTMuMDkxLTEuMzkyLTMuMDkxLTMuMDkzdi0yNy44MzNjMC0xLjcwMSAxLjM5MS0zLjA5MyAzLjA5MS0zLjA5M2gyNy44MTRjMS43IDAgMy4wOTEgMS4zOTIgMy4wOTEgMy4wOTN6Ii8+PHBhdGggZD0ibTY5LjUzNyAyOTIuODUzYzAgMS43MDEtMS4zOTEgMy4wOTItMy4wOTEgMy4wOTJoLTI3LjgxNGMtMS43IDAtMy4wOTEtMS4zOTEtMy4wOTEtMy4wOTJ2LTI3LjgzM2MwLTEuNzAxIDEuMzkxLTMuMDkyIDMuMDkxLTMuMDkyaDI3LjgxNGMxLjcgMCAzLjA5MSAxLjM5MSAzLjA5MSAzLjA5MnoiLz48cGF0aCBkPSJtNjkuNTM3IDM2Mi45NTFjMCAxLjcwMS0xLjM5MSAzLjA5My0zLjA5MSAzLjA5M2gtMjcuODE0Yy0xLjcgMC0zLjA5MS0xLjM5Mi0zLjA5MS0zLjA5M3YtMjcuODMzYzAtMS43MDEgMS4zOTEtMy4wOTMgMy4wOTEtMy4wOTNoMjcuODE0YzEuNyAwIDMuMDkxIDEuMzkyIDMuMDkxIDMuMDkzeiIvPjxwYXRoIGQ9Im00NDguNjQ0IDE1Mi42NTZjMCAxLjcwMi0xLjM5IDMuMDkzLTMuMDkxIDMuMDkzaC0yNy44MTRjLTEuNyAwLTMuMDktMS4zOTEtMy4wOS0zLjA5M3YtMjcuODMyYzAtMS43MDIgMS4zOS0zLjA5MyAzLjA5LTMuMDkzaDI3LjgxNGMxLjcwMSAwIDMuMDkxIDEuMzkxIDMuMDkxIDMuMDkzeiIvPjxwYXRoIGQ9Im00NDguNjQ0IDIyMi43NTVjMCAxLjcwMS0xLjM5IDMuMDkzLTMuMDkxIDMuMDkzaC0yNy44MTRjLTEuNyAwLTMuMDktMS4zOTItMy4wOS0zLjA5M3YtMjcuODMzYzAtMS43MDEgMS4zOS0zLjA5MyAzLjA5LTMuMDkzaDI3LjgxNGMxLjcwMSAwIDMuMDkxIDEuMzkyIDMuMDkxIDMuMDkzeiIvPjwvZz48ZWxsaXBzZSBjeD0iNDI2LjA4IiBjeT0iMzQyLjc2NyIgZmlsbD0iIzAwYzE4NCIgcng9Ijg1LjkyIiByeT0iODYuMzQ1Ii8+PHBhdGggZD0ibTM3Mi40MSAzNDIuNzY3YzAtNDIuMTQ0IDMwLjA1NS03Ny4yMTYgNjkuNzk1LTg0LjgwNC01LjIyNy0uOTk2LTEwLjYxMS0xLjU0LTE2LjEyNy0xLjU0LTQ3LjQ1IDAtODUuOTE5IDM4LjY1OS04NS45MTkgODYuMzQ0IDAgNDcuNjg4IDM4LjQ2OSA4Ni4zNDUgODUuOTE5IDg2LjM0NSA1LjUxNiAwIDEwLjktLjU0MyAxNi4xMjctMS41NDEtMzkuNzQtNy41ODgtNjkuNzk1LTQyLjY1OS02OS43OTUtODQuODA0eiIgZmlsbD0iIzA3YjE3YiIvPjxwYXRoIGQ9Im00MTYuMjkyIDM5Ni4zNzFjLTIuMjc2IDAtNC4xMjEtMS44NDYtNC4xMjEtNC4xMjN2LTU1LjQ3NmgtMTkuMzgzYy0xLjYyNSAwLTMuMDk4LS45NTctMy43NjItMi40NC0uNjYzLTEuNDgyLS4zOTUtMy4yMTguNjg4LTQuNDMybDMzLjI5LTM3LjI5NGMuNzgyLS44NzYgMS44OTktMS4zNzcgMy4wNzMtMS4zNzdzMi4yOTIuNTAxIDMuMDc0IDEuMzc3bDMzLjI5IDM3LjI5NGMxLjA4MyAxLjIxNCAxLjM1MiAyLjk0OS42ODggNC40MzJzLTIuMTM3IDIuNDQtMy43NjIgMi40NGgtMTkuMzgzdjU1LjQ3NmMwIDIuMjc3LTEuODQ2IDQuMTIzLTQuMTIxIDQuMTIzeiIgZmlsbD0iI2ZmZiIvPjwvc3ZnPg=="  class="float-right col-3" style="font-size:150px;" />

<span class="w-100  col-8" >
                        <h3 class="welcome text-center mx-auto">Upload A new Video Lecture</h3>
                        <form class="form1 mx-auto " action="createfolder.php" method="POST" >

                            <input class="username d-block mb-2 mx-auto " type="text" align="center"  name="folder_name" placeholder="Lecture Name">
                            <input type="text" value="<?php echo ($course_name) ?>" name="course_name" style="display: none">
                            <button class="submit btn btn-success btn-sm  d-block mx-auto " align="center" type="submit" name="create video">Create Video</button>

                        </form>
</span>

</div>

<div class="row mx-auto mb-4 h-75 container">
        <div class=" jumbotron p-3 col-md-5  mx-auto " style="background-color:;height:100%;overflow:scroll;">
        <h4 class="text-center">Your Videos for this Course</h4>
            <div class="overflow-auto " style="height:90%;">
            <?php
$link_course = new mysqli(
        $host,
        $user,
        $password, $course_name
    );
    $result = mysqli_query($link_course, "SELECT * FROM `total_videos` ");
    while ($row = mysqli_fetch_array($result)) {
        ?>
            <div class="p-2 hovers rounded" style="cursor:pointer;"><a href="<?php echo ('../' . $course_name . '/' . $row['folder_name'] . '/' . 'load.php') ?>" class="text-decoration-none text-dark">
                <div style="text-align:left" class="d-flex  "><span class=" mr-5"><?php echo ($row['folder_name']) ?></span>
                <span class="position-absolute d-flex" style="right:10px;">
                <form method="POST">
                <input type="text" name="video_name" value="<?php echo ($row['folder_name']) ?>"style="display: none;">
                <input type="text" name="database_name" value="<?php echo ($row['database_name']) ?>"style="display: none;">
            <button type="submit" name="delete_video"
                class="btn btn-danger ml-5 mr-2" value="" ><i class="far fa-trash-alt"></i></button>
            </form>

            <form method="POST" action="rename.php">
                <input type="text" name="video_name" value="<?php echo ($row['folder_name']) ?>"style="display: none;">
                <input type="text" name="database_name" value="<?php echo ($row['database_name']) ?>"style="display: none;">
                <input type="text" name="course_name" value="<?php echo ($course_name) ?>"style="display: none;">
            <button type="submit" name="rename_video"
                class="button btn btn-primary mr-2" value="Rename video" ><i class="fas fa-pen"></i></button>
            </form>
             <i class="fa fa-arrow-circle-right float-right" aria-hidden="true"></i></div>
            </a></div>
            </span>
            <?php }?>
            </div>
        </div>
        <div class="  col-md-5  mx-auto" >
            <div class=" jumbotron  p-3" style="background-color:;cursor:pointer;"><h5>Add/Delete Segments to videos</h5>
            <form action="handle_segments.php" class="pt-1" method="POST">
            <input value="<?php echo $course_name ?>" style="display:none;" name="course" type="text">
            <label for="videos">Choose a Video:</label>
            <select id="videos" name="vids">
                <?php
$result = mysqli_query($link_course, "SELECT * FROM `total_videos` ");
    while ($row = mysqli_fetch_array($result)) {
        ?>
                <option value="<?php echo ($row['database_name']) ?>"><?php echo ($row['folder_name']) ?> </option>
                <?php }?>
            </select>
            <button type="submit" class="btn btn-sm btn-success d-block mx-auto mt-2">Submit</button>
            </form>

            </div>

            <div class=" jumbotron  p-3" style="background-color:;cursor:pointer;"><h5>Add Questions</h5>
            <form action="addQuestions.php" class="pt-1" method="POST">
            <input value="<?php echo $course_name ?>" style="display:none;" name="course" type="text">
            <label for="videos">Choose a Video:</label>
            <select id="videos" name="vids">
                <?php
$result = mysqli_query($link_course, "SELECT * FROM `total_videos` ");
    while ($row = mysqli_fetch_array($result)) {
        ?>
                <option value="<?php echo ($row['database_name']) ?>"><?php echo ($row['folder_name']) ?> </option>
                <?php }?>
            </select>
            <button type="submit" class="btn btn-sm btn-success d-block mx-auto mt-2">Submit</button>
            </form>

            </div>

            <a href="<?php echo 'add_students.php?course_name=' . $course_name ?>" class="text-decoration-none text-dark"><div class="jumbotron hovers p-3" style="background-color:;cursor:pointer;">

            Re-Upload List of enrolled students</div></a>
        </div>
</div>


<div class="jumbotron  w-100" style="background-color:#ade498;">
<img src="data:image/svg+xml;base64,PHN2ZyBpZD0iQ2FwYV8xIiBlbmFibGUtYmFja2dyb3VuZD0ibmV3IDAgMCA1MTIgNTEyIiBoZWlnaHQ9IjUxMiIgdmlld0JveD0iMCAwIDUxMiA1MTIiIHdpZHRoPSI1MTIiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGcgaWQ9Il94MzJfOV9zZXJ2ZXIiPjxwYXRoIGQ9Im00OC45NzUgMTE3Ljk1Nmg0MTQuMDV2MzExLjI1OWgtNDE0LjA1eiIgZmlsbD0iIzQ2NWE2MSIvPjxwYXRoIGQ9Im00ODIuODM0IDUxMmgtNDUzLjY2OGMtNi45MTUgMC0xMi41MjItNS42MDYtMTIuNTIyLTEyLjUyMnYtMTI0LjI1M2MwLTYuOTE1IDUuNjA2LTEyLjUyMiAxMi41MjItMTIuNTIyaDQ1My42NjhjNi45MTUgMCAxMi41MjIgNS42MDYgMTIuNTIyIDEyLjUyMnYxMjQuMjUzYy0uMDAxIDYuOTE2LTUuNjA3IDEyLjUyMi0xMi41MjIgMTIuNTIyeiIgZmlsbD0iIzdhOGM5OCIvPjxwYXRoIGQ9Im0yODIuMzkxIDQ1OS41MDZoLTIxMS4yNjJjLTEyLjIzNSAwLTIyLjE1NC05LjkxOS0yMi4xNTQtMjIuMTU0IDAtMTIuMjM1IDkuOTE5LTIyLjE1NCAyMi4xNTQtMjIuMTU0aDIxMS4yNjJjMTIuMjM1IDAgMjIuMTU0IDkuOTE5IDIyLjE1NCAyMi4xNTQtLjAwMSAxMi4yMzUtOS45MTkgMjIuMTU0LTIyLjE1NCAyMi4xNTR6IiBmaWxsPSIjOWZhY2JhIi8+PHBhdGggZD0ibTM3Ni44ODYgNDc0LjkxN2MtOS41NDQgMC0xNy4yOC03LjczNy0xNy4yOC0xNy4yOHYtNDAuNTY5YzAtOS41NDQgNy43MzctMTcuMjggMTcuMjgtMTcuMjggOS41NDQgMCAxNy4yOCA3LjczNyAxNy4yOCAxNy4yOHY0MC41NjljLjAwMSA5LjU0My03LjczNiAxNy4yOC0xNy4yOCAxNy4yOHoiIGZpbGw9IiNmZmQxNWIiLz48cGF0aCBkPSJtNDgyLjgzNCAzMzEuMzU2aC00NTMuNjY4Yy02LjkxNSAwLTEyLjUyMi01LjYwNi0xMi41MjItMTIuNTIydi0xMjQuMjUyYzAtNi45MTUgNS42MDYtMTIuNTIyIDEyLjUyMi0xMi41MjJoNDUzLjY2OGM2LjkxNSAwIDEyLjUyMiA1LjYwNiAxMi41MjIgMTIuNTIydjEyNC4yNTNjLS4wMDEgNi45MTUtNS42MDcgMTIuNTIxLTEyLjUyMiAxMi41MjF6IiBmaWxsPSIjN2E4Yzk4Ii8+PHBhdGggZD0ibTI4Mi4zOTEgMjc4Ljg2MmgtMjExLjI2MmMtMTIuMjM1IDAtMjIuMTU0LTkuOTE5LTIyLjE1NC0yMi4xNTQgMC0xMi4yMzUgOS45MTktMjIuMTU0IDIyLjE1NC0yMi4xNTRoMjExLjI2MmMxMi4yMzUgMCAyMi4xNTQgOS45MTkgMjIuMTU0IDIyLjE1NC0uMDAxIDEyLjIzNS05LjkxOSAyMi4xNTQtMjIuMTU0IDIyLjE1NHoiIGZpbGw9IiM5ZmFjYmEiLz48cGF0aCBkPSJtMzc2Ljg4NiAyOTQuMjczYy05LjU0NCAwLTE3LjI4LTcuNzM3LTE3LjI4LTE3LjI4di00MC41NjljMC05LjU0NCA3LjczNy0xNy4yOCAxNy4yOC0xNy4yOCA5LjU0NCAwIDE3LjI4IDcuNzM3IDE3LjI4IDE3LjI4djQwLjU2OWMuMDAxIDkuNTQzLTcuNzM2IDE3LjI4LTE3LjI4IDE3LjI4eiIgZmlsbD0iIzYwYjdmZiIvPjxwYXRoIGQ9Im00ODIuODM0IDE0OS4yOTZoLTQ1My42NjhjLTYuOTE1IDAtMTIuNTIyLTUuNjA2LTEyLjUyMi0xMi41MjJ2LTEyNC4yNTJjLjAwMS02LjkxNiA1LjYwNy0xMi41MjIgMTIuNTIyLTEyLjUyMmg0NTMuNjY4YzYuOTE1IDAgMTIuNTIyIDUuNjA2IDEyLjUyMiAxMi41MjJ2MTI0LjI1M2MtLjAwMSA2LjkxNS01LjYwNyAxMi41MjEtMTIuNTIyIDEyLjUyMXoiIGZpbGw9IiM3YThjOTgiLz48cGF0aCBkPSJtMjgyLjM5MSA5Ni44MDJoLTIxMS4yNjJjLTEyLjIzNSAwLTIyLjE1NC05LjkxOS0yMi4xNTQtMjIuMTU0IDAtMTIuMjM1IDkuOTE5LTIyLjE1NCAyMi4xNTQtMjIuMTU0aDIxMS4yNjJjMTIuMjM1IDAgMjIuMTU0IDkuOTE5IDIyLjE1NCAyMi4xNTQtLjAwMSAxMi4yMzUtOS45MTkgMjIuMTU0LTIyLjE1NCAyMi4xNTR6IiBmaWxsPSIjOWZhY2JhIi8+PHBhdGggZD0ibTM3Ni44ODYgMTEyLjIxM2MtOS41NDQgMC0xNy4yOC03LjczNy0xNy4yOC0xNy4yOHYtNDAuNTY5YzAtOS41NDQgNy43MzctMTcuMjggMTcuMjgtMTcuMjggOS41NDQgMCAxNy4yOCA3LjczNyAxNy4yOCAxNy4yOHY0MC41NjljLjAwMSA5LjU0My03LjczNiAxNy4yOC0xNy4yOCAxNy4yOHoiIGZpbGw9IiM2MGI3ZmYiLz48ZyBmaWxsPSIjNTk2Yzc2Ij48cGF0aCBkPSJtNDgyLjgzNCAzNjIuNzA0aC0zOS42ODVjNi45MTYgMCAxMi41MjIgNS42MDYgMTIuNTIyIDEyLjUyMnYxMjQuMjUzYzAgNi45MTUtNS42MDYgMTIuNTIyLTEyLjUyMiAxMi41MjJoMzkuNjg1YzYuOTE2IDAgMTIuNTIyLTUuNjA2IDEyLjUyMi0xMi41MjJ2LTEyNC4yNTRjLS4wMDEtNi45MTUtNS42MDctMTIuNTIxLTEyLjUyMi0xMi41MjF6Ii8+PHBhdGggZD0ibTQ4Mi44MzQgMTgyLjA2aC0zOS42ODVjNi45MTYgMCAxMi41MjIgNS42MDYgMTIuNTIyIDEyLjUyMnYxMjQuMjUzYzAgNi45MTUtNS42MDYgMTIuNTIyLTEyLjUyMiAxMi41MjJoMzkuNjg1YzYuOTE2IDAgMTIuNTIyLTUuNjA2IDEyLjUyMi0xMi41MjJ2LTEyNC4yNTNjLS4wMDEtNi45MTYtNS42MDctMTIuNTIyLTEyLjUyMi0xMi41MjJ6Ii8+PHBhdGggZD0ibTQ4Mi44MzQgMGgtMzkuNjg1YzYuOTE2IDAgMTIuNTIyIDUuNjA2IDEyLjUyMiAxMi41MjJ2MTI0LjI1M2MwIDYuOTE2LTUuNjA2IDEyLjUyMi0xMi41MjIgMTIuNTIyaDM5LjY4NWM2LjkxNiAwIDEyLjUyMi01LjYwNiAxMi41MjItMTIuNTIydi0xMjQuMjUzYy0uMDAxLTYuOTE2LTUuNjA3LTEyLjUyMi0xMi41MjItMTIuNTIyeiIvPjwvZz48cGF0aCBkPSJtNDQ1Ljc0NSAzNy4wODNjLS4zNTkgMC0uNzA5LjAzMi0xLjA2Mi4wNTQtOS4wNDYuNTUyLTE2LjIxOCA4LjA0Mi0xNi4yMTggMTcuMjI3djQwLjU2OWMwIDkuMTg1IDcuMTcyIDE2LjY3NSAxNi4yMTggMTcuMjI3LjM1My4wMjIuNzA0LjA1NCAxLjA2Mi4wNTQgOS41NDQgMCAxNy4yOC03LjczNyAxNy4yOC0xNy4yOHYtNDAuNTdjMC05LjU0NC03LjczNy0xNy4yODEtMTcuMjgtMTcuMjgxeiIgZmlsbD0iI2ZmZDE1YiIvPjxwYXRoIGQ9Im00NTUuNjcgNDAuMjMydjY4LjgzMmM0LjQ0My0zLjEyNyA3LjM1NC04LjI4NSA3LjM1NC0xNC4xMzJ2LTQwLjU2OGMuMDAxLTUuODQ3LTIuOTEtMTEuMDA1LTcuMzU0LTE0LjEzMnoiIGZpbGw9IiNmZmMzNDQiLz48cGF0aCBkPSJtNDQ1Ljc0NSAyMTkuMTQzYy0uMzU5IDAtLjcwOS4wMzItMS4wNjIuMDU0LTkuMDQ2LjU1Mi0xNi4yMTggOC4wNDItMTYuMjE4IDE3LjIyN3Y0MC41NjljMCA5LjE4NSA3LjE3MiAxNi42NzUgMTYuMjE4IDE3LjIyNy4zNTMuMDIxLjcwNC4wNTQgMS4wNjIuMDU0IDkuNTQ0IDAgMTcuMjgtNy43MzcgMTcuMjgtMTcuMjh2LTQwLjU2OWMwLTkuNTQ1LTcuNzM3LTE3LjI4Mi0xNy4yOC0xNy4yODJ6IiBmaWxsPSIjZmU2NDZmIi8+PHBhdGggZD0ibTQ1NS42NyAyMjIuMjkydjY4LjgzMmM0LjQ0My0zLjEyNyA3LjM1NC04LjI4NSA3LjM1NC0xNC4xMzJ2LTQwLjU2OWMuMDAxLTUuODQ2LTIuOTEtMTEuMDA0LTcuMzU0LTE0LjEzMXoiIGZpbGw9IiNmZDQ3NTUiLz48cGF0aCBkPSJtNDQ1Ljc0NSAzOTkuNzg3Yy0uMzU5IDAtLjcwOS4wMzItMS4wNjIuMDU0LTkuMDQ2LjU1Mi0xNi4yMTggOC4wNDItMTYuMjE4IDE3LjIyN3Y0MC41NjljMCA5LjE4NSA3LjE3MiAxNi42NzUgMTYuMjE4IDE3LjIyNy4zNTMuMDIxLjcwNC4wNTQgMS4wNjIuMDU0IDkuNTQ0IDAgMTcuMjgtNy43MzcgMTcuMjgtMTcuMjh2LTQwLjU2OWMwLTkuNTQ1LTcuNzM3LTE3LjI4Mi0xNy4yOC0xNy4yODJ6IiBmaWxsPSIjNjBiN2ZmIi8+PHBhdGggZD0ibTQ1NS42NyA0MDIuOTM2djY4LjgzMmM0LjQ0My0zLjEyNyA3LjM1NC04LjI4NSA3LjM1NC0xNC4xMzJ2LTQwLjU2OWMuMDAxLTUuODQ2LTIuOTEtMTEuMDA0LTcuMzU0LTE0LjEzMXoiIGZpbGw9IiMyNmE2ZmUiLz48L2c+PC9zdmc+" class=" float-right col-2" style="font-size:150px;">
<form action="download_data.php" method="POST">
<h1>Dowload Database</h1>
<select id="database" name="database" >
<option selected value="none">SELECT Database</option>
<?php
$link_central = new mysqli(
        $host,
        $user,
        $password,
        $course_name
    );
    $result = mysqli_query($link_central, "SELECT * FROM `total_videos` ");
    while ($row = mysqli_fetch_array($result)) {
        ?>
<option value="<?php echo $row['database_name']; ?>"><?php echo $row['folder_name']; ?></option>

<?php
}
} else {echo "You are restricted to view this page!";
    die();
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
<button class="submit btn btn-danger btn-sm " align="center" type="submit" name="download data">Download Data</button>
</form>
</div>
</div>
</div>
</div>
