<?php
	session_start();

	$url = "https://edu-cityexplorer.herokuapp.com/beacon";
	
	session_write_close();
	$key = $_POST['beacon_delete'];
	$url2 = $url . "/" . $key;
	
	$ch = curl_init();
	curl_setopt($ch,CURLOPT_COOKIEFILE,$_SESSION['COOKIE']);
	curl_setopt($ch,CURLOPT_COOKIESESSION,false);
	curl_setopt($ch,CURLOPT_URL,$url2);
	curl_setopt($ch,CURLOPT_CUSTOMREQUEST,'DELETE');
	curl_setopt($ch,CURLOPT_POSTFIELDS,'');
	/*
	curl_setopt($ch,CURLOPT_HTTPHEADER, array(
		'Content-Type: application/json',
		'Content-Length: ' . strlen($typeDataJson))
		);
	*/

	curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,180);
	curl_setopt($ch,CURLOPT_TIMEOUT,180);
	curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
	curl_setopt($ch,CURLOPT_FOLLOWLOCATION,false);
	curl_setopt($ch,CURLOPT_HEADER,false);
	curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,false);
	curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);
	
	$del = curl_exec($ch);
	
	/*
	curl_setopt($ch,CURLOPT_POST,false);
	curl_setopt($ch,CURLOPT_HTTPGET,true);
	curl_setopt($ch,CURLOPT_HEADER,true);
	curl_setopt($ch,CURLINFO_HEADER_OUT,true);
	curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,180);
	$locationHeader = curl_exec($ch);
	$locationHeaderOut = curl_getinfo($ch,CURLINFO_HEADER_OUT);
	$locationHeaderCode = curl_getinfo($ch,CURLINFO_HTTP_CODE);
	*/
	//beacon get
	/*
	curl_setopt($ch,CURLOPT_URL,$url2);
	curl_setopt($ch,CURLOPT_HEADER,false);
	$data = curl_exec($ch);
	$dataJson = json_decode($data, true);
	/*
	if(curl_errno($ch)){
		print curl_error($ch);
	}
	*/
	curl_close($ch);
	/*
	echo "<br><br>";
	echo "<br><br>KEY: <br>" . $key;
	echo "<br><br>";
	echo "<br><br>URL: <br>" . $url2;
	echo "<br><br>";
	echo "<br><br>LOG: <br>" . $del;
	echo "<br><br>LOG HEADER: <br>" . $locationHeader; 
	echo "<br><br>LOG HEADER OUT: <br>" . $locationHeaderOut; 
	echo "<br><br>LOG HEADER CODE: <br>" . $locationHeaderCode; 
	*/
	//unset($_SESSION['beacon']);
	//$_SESSION['beacon'] = $dataJson;
	//$_SESSION['refresh'] = "@yes@";
	//header('location: index.php');
	$_SESSION['wybierz_obraz']='';
	include("index.php");
	echo "<script>show('places')</script>";
?>