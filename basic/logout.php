<?php

//logout.php
require 'connectwithoutdata.php';
session_start();

session_destroy();
header($url_login_check);
?>
