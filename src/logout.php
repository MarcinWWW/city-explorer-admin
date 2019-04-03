<?php
session_start();
if (isset($_SESSION['username']))
{
    unset($_SESSION['username']);
	unset($_SESSION['admin']);
	unset($_SESSION['wybierz_obraz']);
}
$url = "https://edu-cityexplorer.herokuapp.com/logout";
$ch = curl_init();
curl_setopt($ch,CURLOPT_URL,$url);
curl_setopt($ch,CURLOPT_HTTPGET,true);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch,CURLOPT_FOLLOWLOCATION,false);
curl_setopt($ch,CURLOPT_HEADER,true);
curl_setopt($ch,CURLINFO_HEADER_OUT,true);
curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,false);
curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);
$logout = curl_exec($ch);
$_SESSION['logoutInfo'] = curl_getinfo($ch,CURLINFO_HEADER_OUT);
//$_SESSION['headerLogout'] = curl_exec($ch);
//$_SESSION['headerLogoutCode'] = curl_getinfo($ch,CURLINFO_HTTP_CODE);
$_SESSION['loginsuccess'] = "@no2@";
curl_close($ch);
//session_destroy();
header("location:index.php");
?>