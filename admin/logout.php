<?php 
session_start();
$_SESSION['user_name']=null;
$_SESSION['role']=null;
header('location:../index.php');
?>