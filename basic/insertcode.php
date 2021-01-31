<?php
session_start();
error_reporting(E_ERROR | E_WARNING | E_PARSE);
 require 'connectwithoutdata.php';
//Define name spaces
// connection of database


    $msg = '';


if(isset($_POST['insertdata']))
{   $course_name = $_POST['course_name'];
    $connection = new mysqli(
        $host,
        $user,
        $password,
        $course_name
    );

    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }
    $Name = $_POST['Name'];
    $Roll_no = $_POST['Roll_no'];
    $Email = $_POST['Email'];

    $query = "INSERT INTO tbl_info (`Name`,`Roll_no`,`Email`) VALUES ('$Name','$Roll_no','$Email')";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        echo '<script> alert("Data Saved"); </script>';
        header("Location: added_students.php?course_name=".$course_name);
    }
    else
    { echo "Error: " . $query . "<br>" . $connection->error;
        echo '<script> alert("Data Not Saved"); </script>';
        header("Location: added_students.php?course_name=".$course_name);
    }
}
if(isset($_POST['deletedata']))
{    $course_name = $_POST['course_name'];
    if (($_SESSION['my_role']) != 'TEACHER') {
        die("You are forbidden to visit this page");
    }
    $connection = new mysqli(
        $host,
        $user,
        $password,
        $course_name
    );
    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }

    $id = $_POST['delete_id'];

    $query = "DELETE FROM tbl_info WHERE id='$id'";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        echo '<script> alert("Data Deleted"); </script>';
        header("Location: added_students.php?course_name=".$course_name);
    }
    else
    {
        echo '<script> alert("Data Not Deleted"); </script>';
        header("Location: added_students.php?course_name=".$course_name);
    }
}

if(isset($_POST['updatedata']))
    {   $course_name = $_POST['course_name'];
    if (($_SESSION['my_role']) != 'TEACHER') {
        die("You are forbidden to visit this page");
    }
    $connection = new mysqli(
        $host,
        $user,
        $password,
        $course_name
    );
    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    } 
        $id = $_POST['update_id'];
        
        $Name = $_POST['Name'];
        $Roll_no = $_POST['Roll_no'];
        $Email = $_POST['Email'];

        $query = "UPDATE tbl_info SET `Name`='$Name', `Roll_no` ='$Roll_no', Email=' $Email' WHERE id='$id'  ";
        $query_run = mysqli_query($connection, $query);

        if($query_run)
        {
            echo '<script> alert("Data Updated"); </script>';
        header("Location: added_students.php?course_name=".$course_name);
        }
        else
        {
            echo '<script> alert("Data Not Updated"); </script>';
            header("Location: added_students.php?course_name=".$course_name);
        }
    }



?>