<?php

require_once('banco.php');

$query = "DELETE FROM classe WHERE nome='" . $_GET['nome'] . "'";
$insert = mysql_query($query, $connect);


if ($insert) {
    $mensagem = 'Classe removida com sucesso!';
} else {
    $mensagem = 'Não foi possível remover essa classe, pois a mesma está em uso por um personagem';
}

$url = '/guild/classe.php';

echo "<script language='javascript' type='text/javascript'>alert('$mensagem');window.location.href='$url';</script>";

