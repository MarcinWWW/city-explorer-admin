<?php 
	session_start();
	$beacon_id = $_POST['beacon_id'];
	$beacon_id_minor = $_POST['beacon_id_minor'];
	$beacon_nazwa = $_POST['beacon_nazwa'];
	$beacon_grupa = $_POST['beacon_grupa'];
	$beacon_location = $_POST['beacon_location'];
	$beacon_address = $_POST['beacon_address'];
	
	//$lok = "img\\up\\";
	//$lok = "./img/up/";
	$lok = "img/up/";
	$filename = $_FILES['obrazek']['name'];
	$filedata = $_FILES['obrazek']['tmp_name'];
	$filesize = $_FILES['obrazek']['size'];
	$filetype = $_FILES['obrazek']['type'];
		
	$lok .= $filename;
	if(is_uploaded_file($filedata)){
		move_uploaded_file($filedata, $lok);
	}
	$_SESSION['wybierz_obraz'] = $filename;
	include("index.php");
	//header("location: index.php");
?>