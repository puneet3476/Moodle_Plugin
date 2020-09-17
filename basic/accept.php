<?php
    include('functions.php');
    $id = $_GET['id'];
    $query = "select * from `requests` where `id` = '$id'; ";
    if(count(fetchAll($query)) > 0){
        foreach(fetchAll($query) as $row){
            $name = $row['Name'];
            $user_roll = $row['Roll_no'];
            $email = $row['Email'];
           
            $query = "INSERT INTO `tbl_info` (`id`, `Name`, `Roll_no`, `Email`, ) VALUES (NULL, '$name', '$user_roll', '$email');";
        }
        $query .= "DELETE FROM `requests` WHERE `requests`.`id` = '$id';";
        if(performQuery($query)){
            echo "Your request for this course has been approved.";
        }else{
            echo "Unknown error occured. Please try again.";
        }
    }else{
        echo "Error occured.";
    }
    
?>
<br/><br/>
<a href="teacer_notification.php">Back</a>