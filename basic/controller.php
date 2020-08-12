<?php
require_once './connect.php';


include 'user.php';
$user = new user($pdo);

 

session_start();
if (isset($_POST['functionname']))
{
  $functionname = $_POST['functionname'];

   if ($functionname == 'leaders')
  {
      $leaders=array(array(),array());
      $leaders = $user->leaders();
      echo json_encode($leaders);
    }
}


?>
