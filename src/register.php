<?php
	session_start();

	$url = "https://edu-cityexplorer.herokuapp.com/user/register";
	$cookie = "cookie.txt";
	$login = $_POST['inp_login'];
	$pass = $_POST['inp_pass'];
	$email = $_POST['inp_email'];
	
	//session_write_close();
	$authorityData = array("id" => null, "username" => $login, "authority" => $auth);
	//$authorityDataJson = json_encode($authorityData);
	$userData = array("id" => null, "username" => $login, "password" => $pass, "name" => $login, "email" => $email, "enabled" => false, "score" => 0, "authority" => $authorityData);
	$userDataJson = json_encode($userData);
	
	$ch = curl_init();
	
	curl_setopt($ch,CURLOPT_FRESH_CONNECT,true);
	curl_setopt($ch,CURLOPT_COOKIESESSION,true);
	curl_setopt($ch,CURLOPT_COOKIEFILE,$cookie);
	curl_setopt($ch,CURLOPT_URL,$url);
	curl_setopt($ch,CURLOPT_POST,true);
	curl_setopt($ch,CURLOPT_POSTFIELDS,$userDataJson);
	curl_setopt($ch,CURLOPT_HTTPHEADER, array(
		'Content-Type: application/json',
		'Content-Length: ' . strlen($userDataJson))
		);
	curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,180);
	curl_setopt($ch,CURLOPT_TIMEOUT,180);
	curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
	curl_setopt($ch,CURLOPT_FOLLOWLOCATION,false);
	curl_setopt($ch,CURLOPT_HEADER,false);
	curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,false);
	curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);
	//curl_setopt($ch,CURLOPT_CAINFO,"https://cityexplorer.000webhostapp.com/cert/cacert.pem");
	//curl_setopt($ch,CURLOPT_CAINFO,"C:\\xampp\php\cacert.pem");
	
	$user = curl_exec($ch);
	//$result = json_decode($result, true);
	/*
	curl_setopt($ch,CURLOPT_POST,false);
	curl_setopt($ch,CURLOPT_HTTPGET,true);
	curl_setopt($ch,CURLOPT_HEADER,true);
	curl_setopt($ch,CURLINFO_HEADER_OUT,true);
	curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,180);
	$locationHeader = curl_exec($ch);
	$locationHeaderOut = curl_getinfo($ch,CURLINFO_HEADER_OUT);
	*/

	$userCode = curl_getinfo($ch,CURLINFO_HTTP_CODE);
	
	if(curl_errno($ch)){
		print curl_error($ch);
	}
	
	curl_close($ch);

	
	echo "<br><br>";
	echo "<br><br>LOG: <br>" . $userData;
	echo "<br><br>LOG: <br><pre>";
	print_r($userDataJson);
	echo "</pre>";
	echo "<br><br>LOG HEADER: <br>" . $user; 
	echo "<br><br>LOG HEADER OUT: <br>" . $locationHeaderOut; 
	echo "<br><br>LOG HEADER CODE: <br>" . $userCode; 
	
	//$_SESSION['beacon'] = $dataJson;
	//header('location: index.php');
	
	if($userCode == '200'){
		include("index.php");
		//include("login.php");
	}
	else{
		echo "<script>hide_log(3000,4000,'1s');</script>";
		include("index.php");
	}
?>