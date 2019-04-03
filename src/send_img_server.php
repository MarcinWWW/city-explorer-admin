<?php 
	session_start();
	
	echo "<br>";
	echo $lok;
	echo "<br>";
	echo $filename;
	echo "<br>";
	echo $filedata;
	echo "<br>";
	echo $filesize;
	echo "<br>";
	echo $filetype;
	
	/*
	$filename = $_FILES['obrazek']['name'];
	$filedata = $_FILES['obrazek']['tmp_name'];
	$filesize = $_FILES['obrazek']['size'];
	$filetype = $_FILES['obrazek']['type'];
	*/
	include("index.php");
	//header("location: index.php");
?>