<?php
session_start();
if(isset($_SESSION['user'])){
	// Está logado
	session_destroy();
} 

$url = '/guild/index.php';
header("location:$url");
?>