<?php
session_start();
if (isset($_SESSION['username']))
{
    unset($_SESSION['username']);
}
$_SESSION['loginsuccess'] = null;
session_destroy();
header("location:index.php");
?>