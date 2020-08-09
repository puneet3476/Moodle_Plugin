<?php

//logout.php
require 'connectwithoutdata.php';
session_start();

	if(($_SESSION['my_role'])=='TEACHER'){
		session_destroy();
		header($url_teacher_login_check);
		die();
		
	}
session_destroy();
header($url_login_check);
?>
