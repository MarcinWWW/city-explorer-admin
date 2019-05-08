<?php
	session_start();

	$url2 = "https://edu-cityexplorer.herokuapp.com/beacon";
	$url3 = "https://edu-cityexplorer.herokuapp.com/type";	
	$url4 = "https://edu-cityexplorer.herokuapp.com/location";
	$url5 = "https://edu-cityexplorer.herokuapp.com/group";
	
	$_SESSION['beacon_id'] = $_POST['beacon_id'];
	$_SESSION['beacon_id_minor'] = $_POST['beacon_id_minor'];
	$_SESSION['beacon_nazwa'] = $_POST['beacon_nazwa'];
	$_SESSION['beacon_grupa'] = $_POST['beacon_grupa'];
	$_SESSION['beacon_location'] = $_POST['beacon_location'];
	$_SESSION['beacon_address'] = $_POST['beacon_address'];

	$dubel = false;
	foreach($_SESSION['beacon'] as $key => $value)
	{
		if($_SESSION['beacon'][$key]['major'] == $_POST['beacon_id'] && $_SESSION['beacon'][$key]['minor'] == $_POST['beacon_id_minor']){
			$_SESSION['beacon_id_minor'] = "beacon o podanym id minor już istnieje";			
			$dubel = true;
		}
	}
	
	//session_write_close();
	
	if($dubel == false){
		
		$groupID = null;
		$groupName = $_POST['beacon_grupa'];
		
		foreach($_SESSION['group'] as $key => $value){
			if(strtolower($_SESSION['group'][$key]['name']) == strtolower($_POST['beacon_grupa'])){
				$groupID = $_SESSION['group'][$key]['id'];
				$groupName = $_SESSION['group'][$key]['name'];
			}
		}
		
		$typeData = array("id" => null, "name" => $_POST['beacon_nazwa']);
		$locationData = array("id" => null, "name" => $_POST['beacon_location'], "coordinaes" => "nieważne", "address" => $_POST['beacon_address']);
		$groupData = array("id" => $groupID, "name" => $groupName);
		$beaconData = array("id" => null, "uuid" => "B9407F30-F5F8-466E-AFF9-25556B57FE6D", "major" => $_POST['beacon_id'], "minor" => $_POST['beacon_id_minor'], "type" => $typeData, "location" => $locationData, "groups" => $groupData, "fileName" => $_SESSION['wybierz_obraz']);
		$beaconDataJson = json_encode($beaconData);

		$beaconDataJsonParsed = json_decode($beaconDataJson, true);
		$ch = curl_init();

		curl_setopt($ch,CURLOPT_COOKIEFILE,$_SESSION['COOKIE']);
		curl_setopt($ch,CURLOPT_COOKIESESSION,false);
		curl_setopt($ch,CURLOPT_URL,$url2);
		curl_setopt($ch,CURLOPT_POST,true);
		curl_setopt($ch,CURLOPT_POSTFIELDS,$beaconDataJson);
		curl_setopt($ch,CURLOPT_HTTPHEADER, array(
			'Content-Type: application/json',
			'Content-Length: ' . strlen($beaconDataJson))
			);
		curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,180);
		curl_setopt($ch,CURLOPT_TIMEOUT,180);
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
		curl_setopt($ch,CURLOPT_FOLLOWLOCATION,false);
		curl_setopt($ch,CURLOPT_HEADER,false);
		curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,false);
		curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);
		
		$beacon = curl_exec($ch);
		/*
		curl_setopt($ch,CURLOPT_POST,false);
		curl_setopt($ch,CURLOPT_HTTPGET,true);
		
		curl_setopt($ch,CURLOPT_HEADER,true);
		curl_setopt($ch,CURLINFO_HEADER_OUT,true);
		//curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,180);
		//$beaconHeader = curl_exec($ch);
		*/
		$beaconHeaderOut = curl_getinfo($ch,CURLINFO_HEADER_OUT);
		$beaconHeaderCode = curl_getinfo($ch,CURLINFO_HTTP_CODE);
		
		// get beacon
		/*
		curl_setopt($ch,CURLOPT_URL,$url2);
		curl_setopt($ch,CURLOPT_HEADER,false);
		$data = curl_exec($ch);
		$dataJson = json_decode($data, true);
		*/
		/*
		if(curl_errno($ch)){
			print curl_error($ch);
		}
		*/
		curl_close($ch);
	
	$_SESSION['beacon_id'] = "";
	$_SESSION['beacon_id_minor'] = "";
	$_SESSION['beacon_nazwa'] = "";
	$_SESSION['beacon_grupa'] = "";
	$_SESSION['beacon_location'] = "";
	$_SESSION['beacon_address'] = "";
	unset($_POST['beacon_id']);
	unset($_POST['beacon_id_minor']);
	unset($_POST['beacon_nazwa']);
	unset($groupName);
	unset($_POST['beacon_grupa']);
	unset($_POST['beacon_address']);
	unset($_SESSION['wybierz_obraz']);
	}
	/*
	echo "<br><br>";
	echo $beaconData;
	echo "<br><br>";
	echo "<pre>";
	print_r($beaconDataJsonParsed);
	echo "</pre>";
	echo "<br><br>";
	echo "<br><br>BEACON: <br>" . $beacon;
	echo "<br><br>BEACON HEADER: <br>" . $beaconHeader; 
	echo "<br><br>BEACON HEADER OUT: <br>" . $beaconHeaderOut; 
	echo "<br><br>BEACON HEADER CODE: <br>" . $beaconHeaderCode; 
	echo "<br><br>"; 
	*/
	//$_SESSION['beacon'] = $dataJson;

	//$_SESSION['refresh'] = "@yes@";
	include("index.php");
	//header("location: https://cityexplorer.000webhostapp.com");
?>