<?php

require_once('banco.php');


$query = "DELETE FROM evento WHERE id='" . $_GET['id'] . "'";
$insert = mysql_query($query, $connect);

$url = '/guild/consultar_meuseventos.php';
header("location:$url");

?>

