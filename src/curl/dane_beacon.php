<?php 
	session_start();
	$_SESSION['beacon_id'] = $_POST['beacon_id'];
	$_SESSION['beacon_id_minor'] = $_POST['beacon_id_minor'];
	$_SESSION['beacon_nazwa'] = $_POST['beacon_nazwa'];
	$_SESSION['beacon_grupa'] = $_POST['beacon_grupa'];
	$_SESSION['beacon_location'] = $_POST['beacon_location'];
	$_SESSION['beacon_address'] = $_POST['beacon_address'];
	include("index.php");
?>