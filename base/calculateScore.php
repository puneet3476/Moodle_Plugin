<?php
require 'connect.php';
$qno = $_REQUEST['qno'];
$username = $_REQUEST['user'];
$x = 1;
$score = 0;
$answer_script = mysqli_query($link, "SELECT answer FROM `question`");
while($answer = mysqli_fetch_array($answer_script)){
    if ($answer['answer'] == $_REQUEST["ans".$x]){

        $score++;
    }
}
$sql = "INSERT INTO `score` (username, score) VALUES ('$username','$score')";
echo $sql;

if ($link->query($sql) === TRUE) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . $link->error;
}
 
?>