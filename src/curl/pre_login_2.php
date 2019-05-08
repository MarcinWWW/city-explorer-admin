<?php
session_start();
$login = htmlentities($_POST['inp_log1']);
$pass = htmlentities($_POST['inp_log2']);
include('login.php');
?>