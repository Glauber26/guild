<?php

require_once('banco.php');

if (isset($_POST['salvar'])) {
    $nomeEvento = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $data = $_POST['data'];

    $query_select = "SELECT * FROM evento";
    $select = mysql_query($query_select, $connect);
    $array = mysql_fetch_array($select);

    if ($nomeEvento == "" || $nomeEvento == null) {
        $erro = 'O campo "Nome do Evento" deve ser preenchido';
    } else {
        $query = "INSERT INTO evento (nome, descricao, data, usuario_nick) VALUES ('$nomeEvento','$descricao','$data', '" . $_SESSION['user']['nick'] . "')";

        $insert = mysql_query($query, $connect);

        if ($insert) {
            $sucesso = 'Evento cadastrado com sucesso!';
        } else {
            $erro = 'Não foi possível cadastrar esse evento';
        }

    }
}
?>

<html>
<head>
    <title>Exemplo</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link href='https://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
</head>
<body>

<?php require_once "navbar.php" ?>

<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading">Cadastro de evento</div>
        <div class="panel-body">


            <?php if (isset($erro)) { ?>
                <div class="alert alert-danger" role="alert"><?= $erro ?></div>
            <?php } ?>

            <?php if (isset($sucesso)) { ?>
                <div class="alert alert-success" role="alert"><?= $sucesso ?></div>
            <?php } ?>

            <form class="form-horizontal" method="post">
                <div class="form-group">
                    <label for="nome" class="col-sm-2 control-label">Nome</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome">
                    </div>
                </div>
                <div class="form-group">
                    <label for="dinheiro" class="col-sm-2 control-label">Descrição</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="descricao" name="descricao" placeholder="Descricao">
                    </div>
                </div>
                <div class="form-group">
                    <label for="raca" class="col-sm-2 control-label">Data</label>
                    <div class="col-sm-10">
                        <input type="datetime-local" class="form-control" id="data" name="data" placeholder="Data">
                    </div>
                </div>
                <hr>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <a href="/guild/evento.php" class="btn btn-default">Cancelar</a>
                        <button type="submit" class="btn btn-default" name="salvar">Salvar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src="js/bootstrap.js"></script>
<script src="js/index.js"></script>
</body>
</html>
