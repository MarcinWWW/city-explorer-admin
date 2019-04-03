<?php
	session_start();

	$url2 = "https://edu-cityexplorer.herokuapp.com/user/admins";
	
	$ch = curl_init();
	curl_setopt($ch,CURLOPT_URL,$url2);
	curl_setopt($ch,CURLOPT_COOKIESESSION,false);
	curl_setopt($ch,CURLOPT_COOKIEFILE,$_SESSION['COOKIE']);
	curl_setopt($ch,CURLOPT_HEADER,false);
	curl_setopt($ch,CURLOPT_POST,false);
	curl_setopt($ch,CURLOPT_HTTPGET,true);
	curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
	curl_setopt($ch,CURLOPT_FOLLOWLOCATION,false);
	curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,false);
	curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);
	$admin = curl_exec($ch);
	$adminJson = json_decode($admin, true);
	
	$_SESSION['admin'] = "@no@";
	foreach($adminJson as $key => $value){
		if($_SESSION['username'] == $adminJson[$key][1])
			$_SESSION['admin'] = "@yes@";
	}

	/*
	curl_setopt($ch,CURLOPT_HEADER,true);
	curl_setopt($ch,CURLINFO_HEADER_OUT,true);
	$beaconHeader = curl_exec($ch);
	$beaconCode = curl_getinfo($ch,CURLINFO_HTTP_CODE);
	
	if(curl_errno($ch)){
		print curl_error($ch);
	}
	*/
	
	curl_close($ch);

	/*
	echo "print r adminJson:";
	echo "<br><pre>";
	print_r($adminJson);
	echo "</pre><br><br>";
	echo "top20Json:";
	echo "<br><pre>";
	echo "login = " . $login;
	echo "</pre><br><br>";	
	echo "top20:";
	echo "<br><pre>";
	echo "session login = " . $_SESSION['username'];
	echo "</pre><br><br>";
	echo "print r top20:";
	echo "<br><pre>";
	print_r($top20);
	echo "</pre><br><br>";
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
	//Your access credentials to Estimote Cloud API:
    //App ID:mar12345-grm
    //App Token:
    //7700d978d8a6234d66acd7b6ec414e46
*/

	//include('index.php');
?>