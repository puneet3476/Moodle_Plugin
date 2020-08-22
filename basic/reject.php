<?php
    include('functions.php');
    $id = $_GET['id'];
    
    $query = "DELETE FROM `requests` WHERE `requests`.`id` = '$id';";
        if(performQuery($query)){
            echo "Your request for this course has been rejected.";
        }else{
            echo "Unknown error occured. Please try again.";
        }

?>
<br/><br/>
<a href="teacher_notification.php">Back</a>