<?php
	session_start();

	$key = $_POST['beacon_delete'];
	$sql_del = "DELETE * FROM ";
	$_SESSION['wybierz_obraz']='';
	include("index.php");
	echo "<script>show('places')</script>";
?>