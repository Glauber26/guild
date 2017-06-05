<?php

require_once('banco.php');

$query = "DELETE FROM classe WHERE nome='" . $_GET['nome'] . "'";
$insert = mysql_query($query, $connect);

$url = '/guild/classe.php';

header("location:$url");
/*
if ($insert) {
    $sucesso = 'Classe removida com sucesso!';
} else {
    $erro = 'Não foi possível remover essa classe, pois a mesma está em uso por um personagem';
}
*/





?>

