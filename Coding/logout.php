<?php

//logout.php
require 'connect.php';
session_start();

session_destroy();

header($url_load);

?>