<?php
	error_reporting(0);

	session_start();
	session_destroy();

	header("location:../index.php");

?>