<?php
	session_start();
	if(isset($_SESSION['usn'])){
	$_SESSION = array();
	session_destroy();
	}
	header('location:index.php');
?>