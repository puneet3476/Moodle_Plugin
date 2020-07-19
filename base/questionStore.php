<?php

require 'connect.php';
if (isset($_POST['qno'])){
    for($x = 1; $x <= $_POST['qno']; $x++){
        $timestamp = $_POST["tsq".$x];
        $question = $_POST["q".$x];
        $opt_1 = $_POST["op1_".$x];
        $opt_2 = $_POST["op2_".$x];
        $opt_3 = $_POST["op3_".$x];
        if (isset($_POST["op4_".$x])){
            $opt_4 = $_POST["op4_".$x];
        } else {
            $opt_4 = "null";
        }
        $ans = $_POST["ans".$x];
        $opts = implode('**',[$opt_1,$opt_2,$opt_3,$opt_4]);
        echo $opts;
        echo "<br>";
        echo $ans;
        echo "<br>";
        $qy="INSERT INTO `question` (question,timestamp,options,answer)
        VALUES ('$question','$timestamp','$opts','$ans')" ;
        mysqli_query($link,$qy);
        echo "data entered successfully";
}
    }
    header($url_load);

?>