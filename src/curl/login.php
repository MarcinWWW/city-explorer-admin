<?php
	session_start();

	$url = "https://edu-cityexplorer.herokuapp.com/authenticateTheUser";
	//$useragent = $_SERVER['HTTP_USER_AGENT'];
	//$strCookie = "PHPSESSID=" . $_COOKIE['PHPSESSID'] . "; path=/";
	//$cookieFile = tempnam("/tmp", "CURLCOOKIE");
	$cookieFile = "cookie.txt";
	
	$ch = curl_init();

	curl_setopt($ch,CURLOPT_URL,$url);
	curl_setopt($ch,CURLOPT_FRESH_CONNECT,true);
	curl_setopt($ch,CURLOPT_POST,true);
	curl_setopt($ch,CURLOPT_POSTFIELDS,'username='.$login.'&password='.$pass);
	curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
	curl_setopt($ch,CURLOPT_FOLLOWLOCATION,false);
	curl_setopt($ch,CURLOPT_HEADER,true);
	curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,false);
	curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);
	//curl_setopt($ch,CURLOPT_CAINFO,"https://cityexplorer.000webhostapp.com/cert/cacert.pem");
	//curl_setopt($ch,CURLOPT_CAINFO,"C:\\xampp\php\cacert.pem");
	curl_setopt($ch,CURLOPT_COOKIESESSION,true);
	curl_setopt($ch,CURLOPT_COOKIEJAR,$cookieFile); 
	//curl_setopt($ch,CURLOPT_COOKIEFILE,$cookieFile); 
	//curl_setopt($ch,CURLOPT_REFERER,$url); 
	$logowanie = curl_exec($ch);
	//$logowanieJson = json_decode($result, true);

	//curl_setopt($ch,CURLOPT_POST,false);
	//curl_setopt($ch,CURLOPT_HTTPGET,true);
	//curl_setopt($ch,CURLOPT_HEADER,true);
	//curl_setopt($ch,CURLINFO_HEADER_OUT,true);
	//$logowanieHeader = curl_exec($ch);
	//$logowanieHeaderOut = curl_getinfo($ch,CURLINFO_HEADER_OUT);
	
	$logowanieCode = curl_getinfo($ch,CURLINFO_HTTP_CODE);
	
	/*	
	if(curl_errno($ch)){
		print curl_error($ch);
	}
	*/
	curl_close($ch);
/*
	echo "adminJson:";
	echo "<br><pre>";
	print_r($adminJson);
	echo "</pre><br><br><pre>";
	echo "admin:";
	echo "</pre><br>";
	print_r($admin);
	echo "<br><br>";	
	echo "logowanieHeaderOut:";
	echo "<br>";
	echo $logowanieHeaderOut;
	echo "<br><br>";
	echo "logowanieCode:";
	echo "<br>";
	echo $logowanieCode;
	echo "<br><br>";
	echo "beacon:";
	echo "<br>";
	echo $beacon;
	echo "<br><br>";
	echo "beaconHeader:";
	echo "<br>";
	echo $beaconHeader;
	echo "<br><br>";
	echo "beaconCode:";
	echo "<br>";
	echo $beaconCode;
	echo "<br><br>";
*/	
	
if($logowanieCode == '200'){
	$_SESSION['username'] = $login;
	$_SESSION['loginsuccess'] = "@yes@";
	$_SESSION['response'] = $logowanieCode;
	$_SESSION['COOKIE'] = $cookieFile;
	//include('index.php');
	header("location: index.php");
}
else{
	$_SESSION['username'] = "@nouser@";
	$_SESSION['loginsuccess'] = "@no@";
	$_SESSION['response'] = $logowanieCode;
	header("location: index.php");
}
?>