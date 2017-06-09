<?php

require_once('banco.php');


$query = "DELETE FROM itemguild WHERE id='" . $_GET['id'] . "'";
$insert = mysql_query($query, $connect);

$url = '/guild/item.php';
header("location:$url");

?>

