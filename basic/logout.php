<?php

//logout.php
require 'connectwithoutdata.php';
session_start();

	if(($_SESSION['my_role'])=='TEACHER'){
		session_destroy();
		header($urla.$appache_localhost_port.$folder);
		die();
		
	}
session_destroy();
header($urla.$appache_localhost_port.$folder);
?>
