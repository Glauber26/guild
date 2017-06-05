<?php

require_once('banco.php');

$query = "DELETE FROM personagem WHERE usuario_nick='" . $_SESSION['user']['nick'] . "' AND nome='" . $_GET['nome'] . "'";
$insert = mysql_query($query, $connect);

$url = '/guild/personagens.php';
header("location:$url");

?>

