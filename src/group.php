<?php
	session_start();

	$url2 = "https://edu-cityexplorer.herokuapp.com/group";
	
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

	$group = curl_exec($ch);
	$groupJson = json_decode($group, true);
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

	echo "<datalist id='grupy'>";
	foreach($groupJson as $key => $value){
		//echo "key = > value " . $key . " => " . $value;
		$_SESSION[group][$key]['name'] = $groupJson[$key]['name'];
		$_SESSION[group][$key]['id'] = $groupJson[$key]['id'];
		echo "<option value='" . $groupJson[$key]['name'] . "'>";
	}
	echo "</datalist>";
	//header('location: index.php');
	//include('index.php');

?>