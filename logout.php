<?php
  include('connnection.php');
session_destroy();
header('location:index.html');
?><?php
	session_start();
	session_destroy();

	header('location:login2.php');
?>