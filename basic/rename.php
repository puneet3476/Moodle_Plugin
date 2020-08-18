<?php

require 'header.php';

$video_name=$_POST['video_name'];
$database_name=$_POST['database_name'];
$course_name=$_POST['course_name'];

    ?>
    <link rel="stylesheet" type="text/css" href="./assets/css/bootstrap.css">
    <script src="https://kit.fontawesome.com/361990fe0a.js" crossorigin="anonymous"></script>

<body class="gradient">
       <h3>Enter your new video name</h3>
      <form method="POST" action="rename_video.php" role="form">
          <input type="text" name="video_name" value="<?php echo($video_name) ?>">
          <input type="text" name="database_name" value="<?php echo($database_name) ?>">
          <input type="text" name="course_name" value="<?php echo($course_name) ?>">
          <input type="text" align="center"  name="new_folder_name" placeholder="New Lecture Name"/>
          <input type="submit" name="rename_this_video" class= "button" value="Rename Video"/>

      </form>  
      </body>    

