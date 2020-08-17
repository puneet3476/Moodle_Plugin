
<link rel="stylesheet" type="text/css" href="./assets/css/bootstrap.css">

<?php
session_start();
if (isset($_SESSION['loginroll'])) {
	if(($_SESSION['my_role'])!='TEACHER'){
		die("You are forbidden to visit this page");
	}
require 'connectwithoutdata.php';
require 'header.php';
?>
<!-- <link rel="stylesheet" href="assets/css/index.css"> -->
<div class="gradient">
<div class="container bg-transparent vertical-center">
<!-- <h1 class="text-center font-bold mb-2" >Create Course</h1> -->
<div class="jumbotron bg-transparent mx-auto">
<!-- <h6>From now on, you can add courses!!.And each course will only allow a set of students to register and will contain multiple videos.</h6> -->
<img src="data:image/svg+xml;base64,PHN2ZyBpZD0iTGF5ZXJfMSIgZW5hYmxlLWJhY2tncm91bmQ9Im5ldyAwIDAgNTEyIDUxMiIgaGVpZ2h0PSI1MTIiIHZpZXdCb3g9IjAgMCA1MTIgNTEyIiB3aWR0aD0iNTEyIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPjxnPjxwYXRoIGQ9Im00NTYuNzgzIDQyNS4zODYtNDAxLjU1OC4wMTJjLTExLjQzNiAwLTIwLjcwNi05LjI3LTIwLjcwNy0yMC43MDZsLS4wMDgtMjcwLjczYzAtMTEuNDM2IDkuMjctMjAuNzA2IDIwLjcwNS0yMC43MDdsNDAxLjU1OC0uMDEyYzExLjQzNiAwIDIwLjcwNiA5LjI3IDIwLjcwNyAyMC43MDZsLjAwOCAyNzAuNzNjLjAwMSAxMS40MzYtOS4yNjkgMjAuNzA3LTIwLjcwNSAyMC43MDd6IiBmaWxsPSIjNDM4MGEwIi8+PHBhdGggZD0ibTQ3Ny40ODkgNDA0LjU3OGMwIDExLjQ4Ny05LjIyIDIwLjgxLTIwLjYwNCAyMC44MWgtMzAuOTA1YzExLjM4MyAwIDIwLjYwNC05LjMyMyAyMC42MDQtMjAuODFsLS4wMS0yNzAuNTI0YzAtMTEuNDc3LTkuMTg5LTIwLjc3OS0yMC41NTItMjAuODFoMzAuODU0YzExLjM4MyAwIDIwLjYwNCA5LjMxMyAyMC42MDQgMjAuODF6IiBmaWxsPSIjM2I3MTkxIi8+PHBhdGggZD0ibTQ0Ni41ODMgMzg3LjUyOWMwIDIuMjEtMS43OTEgNC4wMDItNCA0LjAwMmgtMjYuOTA1bC0zNDYuMjUxLjAxYy0yLjIwOSAwLTQtMS43OTItNC00LjAwMmwtLjAxLTIzOS4zNjFjMC0yLjIxIDEuNzkxLTQuMDAyIDQtNC4wMDJsMzQ2LjI1MS0uMDFoMjYuOTA2YzIuMjA5IDAgNCAxLjc5MiA0IDQuMDAyeiIgZmlsbD0iI2JiZjdmZiIvPjxwYXRoIGQ9Im00NDIuNTgzIDM5MS41MzFoLTI2LjkwNWwtLjAxLTI0Ny4zNjZoMjYuOTA2YzIuMjA5IDAgNCAxLjc5MiA0IDQuMDAybC4wMSAyMzkuMzYxYy0uMDAxIDIuMjExLTEuNzkxIDQuMDAzLTQuMDAxIDQuMDAzeiIgZmlsbD0iIzhiZjBmZiIvPjxwYXRoIGQ9Im00OTcuNTc0IDQ3NGgtNDgzLjE0OGMtNy45NjcgMC0xNC40MjYtNi40NTktMTQuNDI2LTE0LjQyNnYtMjIuNjg0YzAtNy45NjcgNi40NTktMTQuNDI2IDE0LjQyNi0xNC40MjZoNDgzLjE0N2M3Ljk2NyAwIDE0LjQyNiA2LjQ1OSAxNC40MjYgMTQuNDI2djIyLjY4NGMuMDAxIDcuOTY3LTYuNDU4IDE0LjQyNi0xNC40MjUgMTQuNDI2eiIgZmlsbD0iI2E5ZGJmNSIvPjxwYXRoIGQ9Im00OTcuNTc3IDQyMi40NjNoLTMwLjkwNWM3Ljk2NSAwIDE0LjQyMyA2LjQ2MSAxNC40MjMgMTQuNDN2MjIuNjc2YzAgNy45Ny02LjQ1NyAxNC40My0xNC40MjMgMTQuNDNoMzAuOTA1YzcuOTY1IDAgMTQuNDIzLTYuNDYxIDE0LjQyMy0xNC40M3YtMjIuNjc2YzAtNy45NjktNi40NTctMTQuNDMtMTQuNDIzLTE0LjQzeiIgZmlsbD0iIzg4YzNlMCIvPjxwYXRoIGQ9Im0yNTYgMjgxLjI1M2gtMTQ1LjY2NGMtMy4xODggMC01Ljc3My0yLjU4NS01Ljc3My01Ljc3M3YtMTc5LjQxMWMwLTMuMTg4IDIuNTg1LTUuNzczIDUuNzczLTUuNzczaDE0NS42NjR6IiBmaWxsPSIjZjc1NjMyIi8+PHBhdGggZD0ibTQwMS42NjQgMjgxLjI1M2gtMTQ1LjY2NHYtMTkwLjk1N2gxNDUuNjY0YzMuMTg4IDAgNS43NzMgMi41ODUgNS43NzMgNS43NzN2MTc5LjQxMWMwIDMuMTg4LTIuNTg1IDUuNzczLTUuNzczIDUuNzczeiIgZmlsbD0iI2UzMzYyOSIvPjxwYXRoIGQ9Im0yNTYgMjgxLjI1My0xMjEuMjY4LTQxLjk1OGMtMi4zMjUtLjgwNS0zLjg4NS0yLjk5NS0zLjg4NS01LjQ1NnYtMTkwLjA2MWMwLTMuOTY4IDMuOTEtNi43NTQgNy42NTktNS40NTdsMTE3LjQ5NCA0MC42NTR6IiBmaWxsPSIjZjNmM2YzIi8+PHBhdGggZD0ibTI1NiAyODEuMjUzIDEyMS4yNjgtNDEuOTU4YzIuMzI1LS44MDUgMy44ODUtMi45OTUgMy44ODUtNS40NTZ2LTE5MC4wNjFjMC0zLjk2OC0zLjkxLTYuNzU0LTcuNjU5LTUuNDU3bC0xMTcuNDk0IDQwLjY1NHoiIGZpbGw9IiNlNGU0ZTQiLz48cGF0aCBkPSJtMjg4LjcyNSA0NDcuMjAxaC02NS40NWMtNi4zOTEgMC0xMS41NzMtNS4xODEtMTEuNTczLTExLjU3M3YtMTMuMTY1aDg4LjU5NnYxMy4xNjVjMCA2LjM5Mi01LjE4MiAxMS41NzMtMTEuNTczIDExLjU3M3oiIGZpbGw9IiM4OGMzZTAiLz48ZyBmaWxsPSIjNDM4MGEwIj48cGF0aCBkPSJtMzU3LjQ4NCAzMTEuMjU3aC0yMDIuOTY4Yy00LjE0MiAwLTcuNSAzLjM1OS03LjUgNy41MDRzMy4zNTggNy41MDQgNy41IDcuNTA0aDIwMi45NjljNC4xNDMgMCA3LjUtMy4zNTkgNy41LTcuNTA0cy0zLjM1OC03LjUwNC03LjUwMS03LjUwNHoiLz48cGF0aCBkPSJtMjg2LjE0NiAzNDQuMDQ5aC0xMzEuNjNjLTQuMTQyIDAtNy41IDMuMzU5LTcuNSA3LjUwNHMzLjM1OCA3LjUwNCA3LjUgNy41MDRoMTMxLjYzYzQuMTQzIDAgNy41LTMuMzU5IDcuNS03LjUwNHMtMy4zNTgtNy41MDQtNy41LTcuNTA0eiIvPjwvZz48L2c+PC9zdmc+"  class="mx-auto d-block" width="150px"/>
<h2 class="welcome text-center">Create a new Course</h2>
	    			<form class="form1" action="create_course.php" method="POST" >
		      			<input class="username d-block mb-2 mx-auto" type="text" align="center"  name="course_name" placeholder="Course Name">
                        <input class="username d-block mb-2 mx-auto w-50 " type="text" name="course_desc"  style="padding: 10px;" placeholder="Course Description">
                        </textarea>

		      			<button class="submit btn btn-success btn-sm  d-block mx-auto  " align="center" type="submit" name="create video">Create Course</button>
					</form>

<br>
<h6 align="center">Warning! Give a short and unique course name, otherwise your previous courses or data may get deleted.</h6>
<br>

</div>
</div>
</div>
<?php
}
else{
	die("forbidden to view");
}
?>


