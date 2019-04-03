<?php
session_start();
$login = htmlentities($_POST['inp_login']);
$pass = htmlentities($_POST['inp_pass']);
include('login.php');
?>