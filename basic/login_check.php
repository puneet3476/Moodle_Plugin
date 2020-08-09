<?php
session_start();
require 'connectwithoutdata.php';




$error = '';

$next_action = '';

sleep(2);

if(isset($_POST["action"]))
{
    if($_POST["action"] == 'roll'){
$roll=mysqli_real_escape_string($link_users, $_POST['user_roll']);
$pass=mysqli_real_escape_string($link_users, $_POST['user_password']);

if (empty($roll) || empty($pass)) {
echo "Empty password or roll";
exit();
}

if ($roll=="admin" && $pass=="adminbeijing") {
header($admin_panel);
}
$roll=strtoupper($roll);


$q="SELECT * FROM `register_user` WHERE `user_Roll_no`='$roll' ";
$result = $link_users->query($q);

if ($result->num_rows > 0) {

$row = $result->fetch_assoc();
$real_password=$row["user_password"];

if(password_verify($pass,$real_password)){
$_SESSION['loginuser']=$row["user_name"];
$_SESSION['loginid']=$row["Student_ID"];
$_SESSION['loginname']=$row["user_name"];
$_SESSION['loginroll']=$row["user_Roll_no"];
$_SESSION['loginemailid']=$row["user_email"];
$_SESSION['user_avatar']=$row["user_avatar"];
$_SESSION['my_role']=$row['user_role'];
echo "sucesss";
header($student_panel);
}
else {
    $_SESSION['loginuser']="empty1";
    echo "wrong";
    ?>
    <script type="text/javascript">alert("Wrong Credentials. Go back and try again");</script>
    <?php




}



}
else{
	echo "No match";
}


}
}
?>
