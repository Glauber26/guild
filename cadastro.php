<?php

require_once('banco.php');

$nome = $_POST['nome'];
$sobrenome = $_POST['sobrenome'];
$nick = $_POST['nick'];
$tipo = $_POST['tipo'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$repitasenha = $_POST['repitasenha'];

$query_select = "SELECT nick FROM usuario WHERE nick = '$nick'";
$select = mysql_query($query_select, $connect);
$array = mysql_fetch_array($select);
$logaarray = $array['nick'];


if ($repitasenha != $senha) {

    echo "<script language='javascript' type='text/javascript'>alert('ATENÇÃO - As senhas não correspondem!');window.location.href='registrar.php';</script>";


}


if ($nick == "" || $nick == null) {
    echo "<script language='javascript' type='text/javascript'>alert('O campo login deve ser preenchido');window.location.href='registrar.php';</script>";

} else {
    if ($logaarray == $nick) {

        echo "<script language='javascript' type='text/javascript'>alert('Esse login já existe');window.location.href='registrar.php';</script>";

    } else {
        $query = "INSERT INTO usuario (nome,sobrenome,nick,tipo,email,senha) VALUES ('$nome','$sobrenome','$nick','$tipo','$email', '$senha')";
        $insert = mysql_query($query, $connect);

        if ($insert) {
            echo "<script language='javascript' type='text/javascript'>alert('Usuário cadastrado com sucesso!');window.location.href='index.php'</script>";
        } else {
            echo "<script language='javascript' type='text/javascript'>alert('Não foi possível cadastrar esse usuário');window.location.href='registrar.php'</script>";
        }
    }
}

