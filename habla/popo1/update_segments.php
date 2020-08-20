<?php
  require ("connect.php");
  $name=$_GET['name'];
  $x=$_GET['time'];
  ?>
  <form action="update_handle_segments.php" enctype="multipart/form-data" method ="POST">
        <input type="text" name="name" placeholder="topic" value="<?php echo $name ?>" id="seg" />
        <input type="number" name="time" placeholder="starting time in seconds" value="<?php echo $x ?>" id="time"/>
        <button type="submit">Submit</button>
  </form>


