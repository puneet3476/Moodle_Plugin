<?php
session_start();
require 'connectwithoutdata.php';




$error = '';

$next_action = '';

sleep(2);

if(isset($_POST["teachaction"]))
{
    if($_POST["teachaction"] == 'teachid'){
$roll=mysqli_real_escape_string($link_users, $_POST['user_roll']);
$pass=mysqli_real_escape_string($link_users, $_POST['user_password']);

if (empty($roll) || empty($pass)) {
echo "Empty password or ID";
exit();
}


$roll=strtoupper($roll);


$q="SELECT * FROM `register_teacher` WHERE `teacher_ID`='$roll' ";
$result = $link_users->query($q);

if ($result->num_rows > 0) {

$row = $result->fetch_assoc();
$real_password=$row["teacher_password"];

if(password_verify($pass,$real_password)){
$_SESSION['loginuser']=$row["teacher_name"];
$_SESSION['loginid']=1;
$_SESSION['loginname']=$row["teacher_name"];
$_SESSION['loginroll']=$row["teacher_ID"];
$_SESSION['loginemailid']=$row["teacher_email"];
$_SESSION['user_avatar']=$row["teacher_avatar"];
$_SESSION['my_role']="TEACHER";
$_SESSION['teacherid']=$row["teacher_ID"];
echo "sucesss";
header($teacher_panel);
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
