<?php
session_start();
error_reporting(E_ERROR | E_WARNING | E_PARSE);
// require 'connectwithoutdata.php';
//Define name spaces
// connection of database
if (isset($_GET['course_name'])) {
    $course_name = $_GET['course_name'];
    if (($_SESSION['my_role']) != 'TEACHER') {
        die("You are forbidden to visit this page");
    }
    $con = new mysqli(
        $host,
        $user,
        $password,
        $course_name
    );
    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }

    $msg = '';


if(isset($_POST['insertdata']))
{
    
    $Name = $_POST['Name'];
    $Roll_no = $_POST['Roll_no'];
    $Email = $_POST['Email'];

    $query = "INSERT INTO tabl_info (`Name`,`Roll_no`,`Email`) VALUES ('$Name','$Roll_no','$Email')";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        echo '<script> alert("Data Saved"); </script>';
        header('Location: index.php');
    }
    else
    {
        echo '<script> alert("Data Not Saved"); </script>';
    }
}
if(isset($_POST['deletedata']))
{
    $id = $_POST['delete_id'];

    $query = "DELETE FROM tbl_info WHERE id='$id'";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        echo '<script> alert("Data Deleted"); </script>';
        header("Location:index.php");
    }
    else
    {
        echo '<script> alert("Data Not Deleted"); </script>';
    }
}

if(isset($_POST['updatedata']))
    {   
        $id = $_POST['update_id'];
        
        $Name = $_POST['Name'];
        $Roll_no = $_POST['Roll_no'];
        $Email = $_POST['Email'];

        $query = "UPDATE tbl_info SET `Name`='$Name', `Roll_no` ='$Roll_no', Email=' $Email' WHERE id='$id'  ";
        $query_run = mysqli_query($connection, $query);

        if($query_run)
        {
            echo '<script> alert("Data Updated"); </script>';
            header("Location:index.php");
        }
        else
        {
            echo '<script> alert("Data Not Updated"); </script>';
        }
    }


}
?>