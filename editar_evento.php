<?php

require_once('banco.php');

if (isset($_POST['salvar'])) {
    $nomeEvento = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $data = $_POST['data'];
    $usuarioAlterador['usuario_nick'];
  //  $id = $_POST['id'];


    if ($nomeEvento == "" || $nomeEvento == null) {
        $erro = 'O campo nome do evento deve ser preenchido';
    }
    else
    {
        $query = "UPDATE evento SET nome='$nomeEvento', descricao='$descricao', data='$data' WHERE usuario_nick = '" . $_SESSION['user']['nick'] . "'  AND id='$id'";
        $insert = mysql_query($query, $connect);
        if ($insert) {
            $sucesso = 'Evento atualizado com sucesso!';
        } else {
            $erro = 'Não foi possível atualizar esse evento';
        }

    }
}

$query_select = "SELECT * FROM evento WHERE nome= '" . $_GET['nome'] . "'";
$select = mysql_query($query_select, $connect);
$array = mysql_fetch_array($select);

?>

<html>
<head>
    <title>Guild Manager - Eventos</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link href='https://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
</head>
<body>

<?php require_once "navbar.php" ?>

<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading">Editar Evento</div>
        <div class="panel-body">


            <?php if (isset($erro)) { ?>
                <div class="alert alert-danger" role="alert"><?= $erro ?></div>
            <?php } ?>

            <?php if (isset($sucesso)) { ?>
                <div class="alert alert-success" role="alert"><?= $sucesso ?></div>
            <?php } ?>

            <form class="form-horizontal" method="post">

                <input type="hidden" id="nome" name="nome" value="<?= $array['nome'] ?>">

                <div class="form-group">
                    <label for="nome" class="col-sm-2 control-label">Nome</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome"
                               value="<?= $array['nome'] ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="descricao" class="col-sm-2 control-label">Descrição</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="descricao" name="descricao" placeholder="Descricao"
                               value="<?= $array['descricao'] ?>">
                    </div>
                </div>


                <div class="form-group">
                    <label for="data" class="col-sm-2 control-label">Data</label>
                    <div class="col-sm-10">
                        <input type="datetime-local" class="form-control" id="data" name="data" placeholder="Data"
                               value="<?= $array['data'] ?>">
                    </div>
                </div>


                <hr>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <a href="/guild/evento.php" class="btn btn-default">Voltar</a>
                        <button type="submit" class="btn btn-default" name="salvar">Salvar Edição</button>
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
