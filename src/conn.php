<?php
//olduser = "id7644712_mar";
//oldpass = "city1";
//olddb = 	"id7644712_city";
//new db 	id7644712_newcity
//new usr 	id7644712_newmar
//new pss	city2

	$user = "id7644712_newmar";
	$pass = "city2";
	$db = "id7644712_newcity";
	$server = "localhost";
	
	$conn = mysql_connect($server, $user, $pass) or die(mysql_error());
	mysql_set_charset("utf8", $conn);
	mysql_query("SET NAMES 'utf8'");
	mysql_query("SET CHARACTER SET utf8");
	mysql_query("SET COLLATION_CONNECTION = 'utf8mb4_unicode_ci'");

	mysql_select_db('id7644712_newcity', $conn) or die('cannot select DB');
?>