<?php
$username='rocky';
$password='rolly';
if(!isset($_SERVER['PHP_AUTH_USER'])||!isset($_SERVER['PHP_AUTH_PW'])||$_SERVER['PHP_AUTH_USER']!=$username||$_SERVER['PHP_AUTH_PW']!=$password){
	header("HTTP/1.1 401 unauthorised");
	header("WWW-Authenticate: Basic realm='Meshes'");
	exit('<h2>Teacher evaluvation</h2> Sorry you must enter a correct password for entering this site');
}
?>