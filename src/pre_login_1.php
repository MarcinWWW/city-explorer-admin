<?php
session_start();
$usr = htmlspecialchars($_POST['inp_login']);
$pss = htmlspecialchars($_POST['inp_pass']);
include('login.php');
?>