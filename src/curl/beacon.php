<?php
	session_start();

	$url2 = "https://edu-cityexplorer.herokuapp.com/beacon";
	$url3 = "https://edu-cityexplorer.herokuapp.com/ranking/top5";
	$url4 = "https://edu-cityexplorer.herokuapp.com/ranking/top20";
	
	$ch = curl_init();

	curl_setopt($ch,CURLOPT_URL,$url2);
	curl_setopt($ch,CURLOPT_POST,false);
	curl_setopt($ch,CURLOPT_HTTPGET,true);
	curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
	curl_setopt($ch,CURLOPT_FOLLOWLOCATION,false);
	curl_setopt($ch,CURLOPT_HEADER,false);
	curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,false);
	curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);

	//curl_setopt($ch,CURLOPT_CAINFO,"https://cityexplorer.000webhostapp.com/cert/cacert.pem");
	//curl_setopt($ch,CURLOPT_CAINFO,"C:\\xampp\php\cacert.pem");

	$beacon = curl_exec($ch);
	$beaconJson = json_decode($beacon, true);
	/*
	curl_setopt($ch,CURLOPT_HEADER,true);
	curl_setopt($ch,CURLINFO_HEADER_OUT,true);
	$beaconHeader = curl_exec($ch);
	$beaconCode = curl_getinfo($ch,CURLINFO_HTTP_CODE);
	
	if(curl_errno($ch)){
		print curl_error($ch);
	}
	*/
	
	//ranking
	curl_setopt($ch,CURLOPT_URL,$url3);
	$top5 = curl_exec($ch);
	$top5Json = json_decode($top5, true);
	
	curl_setopt($ch,CURLOPT_URL,$url4);
	$top20 = curl_exec($ch);
	$top20Json = json_decode($top20, true);
	
	
	curl_close($ch);

	/*
	echo "print r top20Json:";
	echo "<br><pre>";
	print_r($top20Json);
	echo "</pre><br><br>";
	echo "top20Json:";
	echo "<br><pre>";
	echo $top20Json;
	echo "</pre><br><br>";	
	echo "top20:";
	echo "<br><pre>";
	echo $top20;
	echo "</pre><br><br>";
	echo "print r top20:";
	echo "<br><div style=\"height:100px;width:100px;\"><pre>";
	print_r($top20);
	echo "</pre></div><br><br>";
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
	
	$_SESSION['top5'] = $top5Json;
	$_SESSION['top20'] = $top20Json;
	$_SESSION['beacon'] = $beaconJson;
	//header('location: index.php');
	//include('index.php');
?>