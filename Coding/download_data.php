<?php
require 'connectwithoutdata.php';
$table=$_POST['table'];
$database=$_POST['database'];
if (($table=="none") or ($database=="none") ) {
	echo "Error: Either Foldername or Database name is empty";
	die();
}
$link = new mysqli(
   $host,
   $user,
   $password,
   $database
);
if ($link -> connect_errno) {
 // echo "Failed to connect to MySQL: " . $link -> connect_error;
  exit();
}
else{
	//echo "Connected Sucessfully";
}
//echo $table;
//echo $database;

$sql = "SELECT * FROM ".$table;

$result=mysqli_query($link,$sql);
$users = array();
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $users[] = $row;
    }
}
$index=array_keys($users[0]);

header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename='.$table.'-'.$database.'.csv');
$output = fopen('php://output', 'w');
fputcsv($output, $index);

if (count($users) > 0) {
    foreach ($users as $row) {
        fputcsv($output, $row);
    }
}

// Numeric array

?>


