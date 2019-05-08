<?php
	if(strpos($_SERVER[REQUEST_URI], "/?register=") > -1){
		$tokenPos = strpos($_SERVER[REQUEST_URI], "/?register=") + 11;
		$uri = $_SERVER[REQUEST_URI];
		$token = substr($_SERVER[REQUEST_URI], $tokenPos, strlen($uri));
	}
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		// form validation
		$login = $pass = $pass2 = $email = "";
		if(!empty($_POST["inp_login"])){
			$login = $_POST["inp_login"];
		}
		if(!empty($_POST["inp_email"])){
			$pass = $_POST["inp_email"];
		}
	}
	if($_SESSION['username'] != null && $_SESSION['username'] != "@nouser@"){
		$login = $_SESSION['username'];
	}
?>