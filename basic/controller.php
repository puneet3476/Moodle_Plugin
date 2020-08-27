<?php
require_once './req_database.php';

session_start();
if (isset($_POST['functionname']))
{
  $functionname = $_POST['functionname'];

   if ($functionname == 'leaders')
  {
      $leaders=array(array(),array(),array());
      $leaders = $user->leaders();
      echo json_encode($leaders);
    }
}


?>
