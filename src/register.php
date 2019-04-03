<?php
if(isset($_POST['reg_submit'])){
	$con = mysql_connect('localhost','root','')or die(mysql_error());
    
    mysql_query("SET NAMES 'utf8'");
	mysql_query("SET CHARACTER SET utf8");
	mysql_query("SET COLLATION_CONNECTION = 'utf8_general_ci'");

    mysql_select_db('logowanie',$con) or die ("cannot select DB");
    
	$chk = $_POST['reg_checkbox_accept'];
    $uname = $_POST['reg_login'];
    $pword = $_POST['reg_pass'];
    $pword2 = $_POST['reg_pass2'];
	$email = $_POST['reg_email'];


    if($pword != $pword2) {
        $_SESSION['msg'] = "Hasła się nie zgadzają. Spróbuj ponownie";
		$_SESSION['chk'] = $chk;
		header('location: index.php');
    }
}