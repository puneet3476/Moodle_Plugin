<?php

require 'connect.php';
if (isset($_POST['qno'])){
    for($x = 1; $x <= $_POST['qno']; $x++){
        $timestamp = $_POST["tsq".$x];
        $question = $_POST["q".$x];
        $opt_1 = $_POST["op1_".$x];
        $opt_2 = $_POST["op2_".$x];
        $opt_3 = $_POST["op3_".$x];
        $opt_4 = $_POST["op4_".$x];
        $ans = $_POST["ans".$x];
        

        $qy="INSERT INTO `question` (question,timestamp,option1,option2,option3,option4,answer)
        VALUES ('$question','$timestamp','$opt_1','$opt_2','$opt_3','$opt_4','$ans')" ;
        mysqli_query($link,$qy);
        echo "data entered successfully";
}
    }
    header($url_load);

?>