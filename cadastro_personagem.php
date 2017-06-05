<?php

require_once('banco.php');

if (isset($_POST['salvar'])) {
    $nomePersonagem = $_POST['nome'];
    $dinheiro = $_POST['dinheiro'];
    $raca = $_POST['raca'];
    $classe = $_POST['classe'];

    $query_select = "SELECT * FROM personagem WHERE nome = '$nomePersonagem'";
    $select = mysql_query($query_select, $connect);
    $array = mysql_fetch_array($select);

    if ($nomePersonagem == "" || $nomePersonagem == null) {
        $erro = 'O campo personagem deve ser preenchido';
    } else {
        $query = "INSERT INTO personagem (nome, dinheiro, raca, usuario_nick,classe_nome) VALUES ('$nomePersonagem','$dinheiro','$raca', '" . $_SESSION['user']['nick'] . "', '$classe')";

        $insert = mysql_query($query, $connect);
        if ($insert) {
            $sucesso = 'Personagem cadastrado com sucesso!';
        } else {
            $erro = 'Não foi possível cadastrar esse personagem';
        }

    }
}

$query_select = "SELECT * FROM classe";
$select = mysql_query($query_select, $connect);

?>

<html>
<head>
    <title>Exemplo</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link href='https://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
</head>
<body>

<?php require_once "navbar.php" ?>

<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading">Cadastro de personagem</div>
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
                    <label for="dinheiro" class="col-sm-2 control-label">Dinheiro</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="dinheiro" name="dinheiro" placeholder="Dinheiro">
                    </div>
                </div>
                <div class="form-group">
                    <label for="raca" class="col-sm-2 control-label">Raça</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="raca" name="raca" placeholder="Raça">
                    </div>
                </div>

                <div class="form-group">
                    <label for="classe" class="col-sm-2 control-label">Classe</label>
                    <div class="col-sm-10">
                        <select name="classe" class="form-control">
                            <?php while ($array = mysql_fetch_array($select)) { ?>
                                <option value="<?= $array['nome'] ?>"><?= $array['nome'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>

                <hr>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <a href="/guild/personagens.php" class="btn btn-default">Cancelar</a>
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
