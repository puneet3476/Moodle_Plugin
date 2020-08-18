<?php

require 'connectwithoutdata.php';
session_start();
if (($_SESSION['my_role']) != 'TEACHER') {
    die("You are forbidden to visit this page");
}
if (isset($_REQUEST['video_name'])) {
    echo $video = $_REQUEST['video_name'];
    echo $course = $_REQUEST['course_name'];

    $link_video = new mysqli(
        $host,
        $user,
        $password, $video
    );
    if ($link_video->connect_error) {
        die("Connection failed: " . $link_video->connect_error);
    }
    echo "Connected successfully";

    $timestamp = $_REQUEST["timestamp"];
    $question = $_REQUEST["question"];
    $opt_1 = $_REQUEST["option1"];
    $opt_2 = $_REQUEST["option2"];
    $opt_3 = $_REQUEST["option3"];
    if (isset($_REQUEST["option4"])) {
        $opt_4 = $_REQUEST["option4"];
    } else {
        $opt_4 = "null";
    }
    $ans = $_REQUEST["answer"];
    $opts = implode('**', [$opt_1, $opt_2, $opt_3, $opt_4]);
    echo $opts;
    echo "<br>";
    echo $ans;
    echo "<br>";
    $qy = "INSERT INTO `question` (question,timestamp,options,answer)
        VALUES ('$question','$timestamp','$opts','$ans')";

    if ($link_video->query($qy) === true) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $qy . "<br>" . $link_video->error;
    }
    echo "data entered successfully";

}
//header($urla . $appache_localhost_port . '/Moodle_Plugin/' . $course . '/' . $video . '/' . $urlb);
