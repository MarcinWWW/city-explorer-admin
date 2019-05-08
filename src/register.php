<?php
include('conn.php');
include('randomstring.php');
	$login = htmlspecialchars($_POST['inp_login']);
	$pass = htmlspecialchars($_POST['inp_pass']);
	$email = htmlspecialchars($_POST['inp_email']);
	$rand_str = string_generator();
	if(isset($_SESSION['register'])){
		unset($_SESSION['register']);
	}
	//ToDo
	// wysyłanie email z potw.
	$sql_login = "SELECT id FROM `user` WHERE username = \"$login\"";
	$res_login = mysql_query($sql_login);
	$res_l = mysql_fetch_assoc($res_login);
	if(strlen($res_l) > 0){ 
		$_SESSION['register'] = 'login'; 
	} 
	else{
		$sql_email = "SELECT id FROM `user` WHERE email = \"$email\"";
		$res_email = mysql_query($sql_email);
		$res_e = mysql_fetch_assoc($res_email);
		if(strlen($res_e) > 0){ 
			$_SESSION['register'] = 'email'; 
		} else{
			$sql_reg = "INSERT INTO `user` (username, password, email, confirmation, confirmed, auth) VALUES (\"$login\", \"$pass\", \"$email\", \"$rand_str\", 0, \"$auth\")";
			$res_reg = mysql_query($sql_reg);
			$reg_que = "SELECT id FROM `user` WHERE username = \"$login\"";
			$reg_chk = mysql_query($reg_que);
			$reg_c = mysql_fetch_array($reg_chk);
			if(strlen($reg_c['id'])>0) { 
				$_SESSION['register'] = '200'; 
				/*
				if($_SESSION['username']!=null && $_SESSION['username']!='@nouser@'){
					$usr = $login;
					$pss = $pass;
					include('login.php');
				}
				*/
			}
			else{
				$_SESSION['register'] = '400'; 
			}
		}
	}
	//header("location: https://cityexplorer.000webhostapp.com");
	mysql_close($conn);
	header('location: index.php');
?>
