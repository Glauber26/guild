<?php

require_once('banco.php');

if (isset($_POST['salvar'])) {
    $nome = $_POST['nome'];
    $tipo = $_POST['tipo'];
    $valor = $_POST['valor'];
    $posse = $_POST['posse'];
    $id = $_GET['id'];

    if ($nome == "" || $nome == null) {
        $erro = 'O campo nome do item deve ser preenchido';
    } else {
        $query = "UPDATE item SET nome='$nome', tipo='$tipo', valor='$valor', posse='$posse'  WHERE usuario_nick = '" . $_SESSION['user']['nick'] . "'  AND id='$id'";
var_dump($query);
        $insert = mysql_query($query, $connect);
        if ($insert) {
            $sucesso = 'Evento atualizado com sucesso!';
        } else {
            $erro = 'Não foi possível atualizar esse evento';
        }

    }
}

$query_select = "SELECT * FROM item";
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
        <div class="panel-heading">Editar Item</div>
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
                        <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome" value="<?= $array['nome'] ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="tipo" class="col-sm-2 control-label">Tipo</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="tipo" name="tipo" placeholder="Tipo" value="<?= $array['tipo'] ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="valor" class="col-sm-2 control-label">Valor</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="valor" name="valor" placeholder="Valor" value="<?= $array['valor'] ?>">
                    </div>
                </div>


                <div class="form-group">
                    <label for="posse" class="col-sm-2 control-label">Posse</label>
                    <div class="col-sm-10">
                        <select name="posse" class="form-control">
                            <?php while ($array = mysql_fetch_array($select)) { ?>
                                <option value="<?= $array['posse'] ?>"><?= $array['posse'] ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <hr>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <a href="/guild/item.php" class="btn btn-default">Voltar</a>
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
