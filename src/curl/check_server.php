<?php
	session_start();
	include("check_server_kody.php");
	$url = "https://edu-cityexplorer.herokuapp.com/";
	
	$_SESSION['check_server'] = "OK";
	
	$ch = curl_init();

	curl_setopt($ch,CURLOPT_URL,$url);
	curl_setopt($ch,CURLOPT_POST,false);
	curl_setopt($ch,CURLOPT_HTTPGET,true);
	curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
	curl_setopt($ch,CURLOPT_FOLLOWLOCATION,false);
	curl_setopt($ch,CURLOPT_HEADER,false);
	curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,false);
	curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);

	//curl_setopt($ch,CURLOPT_CAINFO,"https://cityexplorer.000webhostapp.com/cert/cacert.pem");
	//curl_setopt($ch,CURLOPT_CAINFO,"C:\\xampp\php\cacert.pem");

	$start = curl_exec($ch);
	$startJson = json_decode($beacon, true);
	
	curl_setopt($ch,CURLOPT_HEADER,true);
	curl_setopt($ch,CURLINFO_HEADER_OUT,true);
	$startHeader = curl_exec($ch);
	$startCode = curl_getinfo($ch,CURLINFO_HTTP_CODE);
	
	if(curl_errno($ch)){
		$_SESSION['check_server'] = curl_error($ch);
	}
	
	curl_close($ch);
/*
	echo "startCode:";
	echo "<br>";
	echo $startCode;
	echo "<br><br>";
*/
	foreach($kody as $key => $value){
		if($key == $startCode){
			$_SESSION['check_server'] = $kody[$key];
			$_SESSION['check_server_kod'] = $key;
			break;
		}
	}
?>