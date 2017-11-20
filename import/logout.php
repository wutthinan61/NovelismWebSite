<?php
session_start(); 
$_SESSION['id']=null;  ob_start();  header("location:../index.php"); 
?>