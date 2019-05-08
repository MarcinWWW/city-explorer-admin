<?php
session_start();
include('conn.php');

$result = mysql_query("SELECT * FROM user WHERE username='$usr' AND password='$pss'");
if(mysql_num_rows($result)){
	$res = mysql_fetch_array($result);
	if($res['confirmed'] == 1){
		if($res['auth'] == 'a')
			$_SESSION['admin'] = "@yes@";
		if($res['auth'] == 'u')
			$_SESSION['admin'] = "@no@";
		$_SESSION['confirmed'] = "@yes@";
		$_SESSION['username'] = $res['username'];
		$_SESSION['loginsuccess'] = "@yes@";
	}
	else{
		$_SESSION['username'] = $res['username'];
		$_SESSION['confirmed'] = "@no@";
		$_SESSION['loginsuccess'] = "@no@";
	}
}
else{
	$_SESSION['confirmed'] = "";
	$_SESSION['username'] = "@nouser@";
	$_SESSION['loginsuccess'] = "@no@";
}
mysql_close($conn);
header('location: index.php');