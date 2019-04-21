<?php
	session_start();

	$url = "https://edu-cityexplorer.herokuapp.com/user/register";
	$cookie = "cookie.txt";
	$login = $_POST['inp_login'];
	$pass = $_POST['inp_pass'];
	$email = $_POST['inp_email'];
	if(isset($_SESSION['register'])){
		unset($_SESSION['register']);
	}
	
	//session_write_close();
	$authorityData = array("id" => null, "username" => $login, "authority" => $auth);
	//$authorityDataJson = json_encode($authorityData);
	$userData = array("id" => null, "username" => $login, "password" => $pass, "name" => $login, "email" => $email, "enabled" => false, "score" => 0, "authority" => $authorityData);
	$userDataJson = json_encode($userData);
	$userDataJsonDecoded = json_decode($userDataJson,true);
	
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
	$userJson = json_decode($user,true);
	$userCode = curl_getinfo($ch,CURLINFO_HTTP_CODE);
	
	if(curl_errno($ch)){
		print curl_error($ch);
	}
	
	curl_close($ch);

	/*
	echo "<br><br>";
	echo "<br><br>LOG: <br>" . $userData;
	echo "<br><br>LOG: <br><pre>";
	print_r($userDataJsonDecoded);
	echo "</pre>";
	echo "<br><br>LOG HEADER: <br>" . $user; 
	echo "<br><br>LOG HEADER OUT: <br><pre>";
	print_r($userJson); 
	echo "</pre><br><br>LOG HEADER CODE: <br>" . $userCode; 
	
	echo "<br><br>userJson['status']: <br>" . $userJson['status']; 
	echo "<br><br>strpos(userJson['status'], \"already exists\"): <br>" . strpos($userJson['status'], "already exists"); 
	*/
	
	//$_SESSION['beacon'] = $dataJson;
	//header('location: index.php');
	
	if($userCode == '200'){
		$_SESSION['register'] = '200';
		header("location: https://cityexplorer.000webhostapp.com");
	}
	else{
		if(strpos($userJson['status'], "already exists") > -1) { $_SESSION['register'] = 'login'; }
		elseif(strpos($userJson['status'], "email is used") > -1) { $_SESSION['register'] = 'email'; }
		else { $_SESSION['register'] = '400'; }
		header("location: https://cityexplorer.000webhostapp.com");
	}
?>