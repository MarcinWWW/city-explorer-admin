<?php
session_start();
$con = mysql_connect('localhost', 'id7644712_mar', 'city1') or die(mysql_error()); 

mysql_query("SET NAMES 'utf8'");
mysql_query("SET CHARACTER SET utf8");
mysql_query("SET COLLATION_CONNECTION = 'utf8_general_ci'");

mysql_select_db('id7644712_city', $con) or die('cannot select DB');

$result = mysql_query("SELECT * FROM login WHERE nazwa='$usr' AND haslo='$pss'");
if(mysql_num_rows($result)){
	$res = mysql_fetch_array($result);
	
	$_SESSION['username'] = $res['nazwa'];
	$_SESSION['loginsuccess'] = "@yes@";
	header('location: index.php');
}
else{
	$_SESSION['username'] = "@nouser@";
	$_SESSION['loginsuccess'] = "@no@";
	header('location: index.php');
}
mysql_close($con);