<?php

require_once('banco.php');

$query = "DELETE FROM classe WHERE nome='" . $_GET['nome'] . "'";
$insert = mysql_query($query, $connect);

$url = '/guild/classe.php';
header("location:$url");

?>

