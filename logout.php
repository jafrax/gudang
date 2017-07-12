<?php
	session_start();
	/*require_once "classutama.php";
	$tguh=new angkasa;*/
	include 'script_awal.php';

	// $login_log->create_log('Lo','','Logout');
	session_destroy();
	header("location: index.php");
	exit();
?>