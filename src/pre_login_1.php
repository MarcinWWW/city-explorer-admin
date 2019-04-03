<?php
session_start();
$usr = $_POST['inp_login'];
$pss = $_POST['inp_pass'];
include('login.php');
?>