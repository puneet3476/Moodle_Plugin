<?php
session_start();
require 'connect.php';

$error = '';

$next_action = '';

sleep(2);

if (isset($_POST["action"])) {
    if ($_POST["action"] == 'email') {
        $email = mysqli_real_escape_string($link_central, $_POST['user_email']);
        $pass = mysqli_real_escape_string($link_central, $_POST['user_password']);

        if (empty($email) || empty($pass)) {
            echo "Empty password or email";
            exit();
        }
        if ($email == "admin" && $pass == "adminbeijing") {
            header($admin_panel);
        }

        $q = "SELECT * FROM `register_user` WHERE `user_email`='$email' ";
        $result = $link_central->query($q);

        if ($result->num_rows > 0) {

            $row = $result->fetch_assoc();
            $real_password = $row["user_password"];
            if (password_verify($pass, $real_password)) {
                $_SESSION['loginuser'] = $row["user_name"];
                $_SESSION['loginid'] = $row["Student_ID"];
                $_SESSION['loginname'] = $row["user_name"];
                $_SESSION['loginrole'] = $row["user_role"];
                $user_id = $row["Student_ID"];
                $name = $_SESSION['loginname'];

                $clickdata = "INSERT INTO clickdata(username,Event,user_id)
VALUES ('$name','Login','$user_id')";
                if ($link_central->query($clickdata) === true) {
                    echo "New record created successfully";
                } else {
                    echo "Error: " . $clickdata . "<br>" . $link_central->error;
                }

                echo "sucesss";
                header($url_load);
            } else {
                $_SESSION['loginuser'] = "empty1";
                echo "wrong";
                header($url_load);
                ?>
    <script type="text/javascript">alert("Wrong Credentials. Go back and try again");</script>
    <?php

            }

        }

    }
}
?>
