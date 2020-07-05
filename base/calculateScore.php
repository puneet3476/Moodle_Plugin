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
$sql = "UPDATE users SET score = '".$score."' WHERE username = '".$username."'";
echo $sql;

if ($link_central->query($sql) === TRUE) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . $link->error;
}
 
?>