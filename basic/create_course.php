<?php
require 'connectwithoutdata.php';
session_start();
$course_name=$_POST['course_name'];
$course_desc=$_POST['course_desc'];

if (empty($course_name)) {
	echo "Error: Either Course name or course Database name is empty";
	die();
}
if (isset($_SESSION['loginroll'])) {
	if(($_SESSION['my_role'])!='TEACHER'){
		die("You are forbidden to visit this page");
	}
// Create database
$sql = "CREATE DATABASE ".$course_name;
if ($link->query($sql) === TRUE) {
	?><br><?php
  echo "Database created successfully";
} else {
	?><br><?php
  echo "Error creating database: " . $link->error;
  die();
}
$sql = file_get_contents('course.sql');
$dir_name=$homedir.$course_name;
$mysqli = new mysqli($host, $user,$password,$course_name);//............This you may have to change
$instsql=file_get_contents('institution.sql');
$teacher_id=$_SESSION['loginroll'];
echo $course_name;
echo "/n";
echo $teacher_id;
echo $inst;
$link_inst = new mysqli(
   $host,
   $user,
   $password,$inst
);
$course="INSERT INTO courses (course_name,description,teacher_ID)
    VALUES ('$course_name','$course_desc','$teacher_id')" ;
echo $link_inst->query($course);

/* execute multi query */
$mysqli->multi_query($sql);

//new folder for the course
@mkdir($dir_name);
header('location:add_students.php?course_name='.$course_name);

}
