<?php

require_once('banco.php');

$query = "DELETE FROM evento WHERE nome='" . $_GET['nome'] . "'";
$insert = mysql_query($query, $connect);

$url = '/guild/evento.php';
header("location:$url");

?>

