<?php

require_once('banco.php');

$nome = $_POST['nome'];
$tipo = $_POST['tipo'];
$valor = $_POST['valor'];
$id = $_POST['id'];
$posse = $_POST['posse'];

$query_select = "SELECT * FROM item";
$select = mysql_query($query_select,$connect);
$array = mysql_fetch_array($select);


if($posse == "" || $posse == null){
  echo"<script language='javascript' type='text/javascript'>alert('O campo item deve ser preenchido');window.location.href='index.php';</script>";

}else{
  if($logarray == $posse){

    echo"<script language='javascript' type='text/javascript'>alert('Esse item já existe');window.location.href='index.php';</script>";
    die();

  }else{

    $query = "INSERT INTO item (nome,tipo,valor,id) VALUES ('$nome','$tipo','$valor','$id','$posse')";
    $insert = mysql_query($query,$connect);
    if($insert){
      echo"<script language='javascript' type='text/javascript'>alert('Item cadastrado com sucesso!');window.location.href='index.php'</script>";
    }else{
      echo"<script language='javascript' type='text/javascript'>alert('Não foi possível cadastrar esse item');window.location.href='index.php'</script>";
    }
  }
}
