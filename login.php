<?php

require_once('banco.php');

$nick = $_POST['nick'];
$senha = $_POST['senha'];

$query_select = "SELECT COUNT(*) AS achei, usuario.* FROM usuario WHERE nick = '$nick' AND senha='$senha'";
$select = mysql_query($query_select, $connect);
$array = mysql_fetch_array($select);

// Achei o usuário
if($array['achei'] == 1) {
  
  $_SESSION['user'] = $array;
// Não achei
} else {

}

$url = '/guild/index.php';
header("location:$url");