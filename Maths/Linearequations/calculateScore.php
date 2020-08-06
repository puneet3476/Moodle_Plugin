<?php
require 'connect.php';
$qno = $_REQUEST['qno'];
$username = $_REQUEST['user'];
$x = 1;
$score = 0;
$answer_script = mysqli_query($link, "SELECT answer FROM `question`");
while ($answer = mysqli_fetch_array($answer_script)) {
    if ($answer['answer'] == $_REQUEST["ans" . $x]) {

        $score++;
    }
}
$sql = "UPDATE register_user SET score = '" . $score . "' WHERE user_name = '" . $username . "'";

echo $sql;

if ($link_central->query($sql) === true) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $link_central->error;
}
