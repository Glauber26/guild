<?php

require_once('banco.php');

$nome = $_POST['nome'];
$nick = $_POST['nick'];
$email = $_POST['email'];
$senha = $_POST['senha'];

$query_select = "SELECT nick FROM usuario WHERE nick = '$nick'";
$select = mysql_query($query_select,$connect);
$array = mysql_fetch_array($select);
$logaarray = $array['nick'];

if($nick == "" || $nick == null){
    echo"<script language='javascript' type='text/javascript'>alert('O campo login deve ser preenchido');window.location.href='index.php';</script>";

    }else{
      if($logarray == $nick){

        echo"<script language='javascript' type='text/javascript'>alert('Esse login já existe');window.location.href='index.php';</script>";
        die();

      }else{
        $query = "INSERT INTO usuario (nome,nick,email,senha) VALUES ('$nome','$nick','$email', '$senha')";
        $insert = mysql_query($query,$connect);
        if($insert){
          echo"<script language='javascript' type='text/javascript'>alert('Usuário cadastrado com sucesso!');window.location.href='index.php'</script>";
        }else{
          echo"<script language='javascript' type='text/javascript'>alert('Não foi possível cadastrar esse usuário');window.location.href='index.php'</script>";
        }
      }
    }
