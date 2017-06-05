<?php

require_once('banco.php');

if (isset($_POST['salvar'])) {
    $nomePersonagem = $_POST['nome'];
    $dinheiro = $_POST['dinheiro'];
    $raca = $_POST['raca'];


    if ($nomePersonagem == "" || $nomePersonagem == null) {
        $erro = 'O campo personagem deve ser preenchido';
    } else {
        $query = "UPDATE personagem SET dinheiro='$dinheiro', raca='$raca' WHERE usuario_nick='" . $_SESSION['user']['nick'] . "' AND nome='$nomePersonagem'";
        $insert = mysql_query($query, $connect);
        if ($insert) {
            $sucesso = 'Personagem atualizado com sucesso!';
        } else {
            $erro = 'Não foi possível atualizar esse personagem';
        }

    }
}

$query_select = "SELECT * FROM personagem WHERE nome= '" . $_GET['nome'] . "' AND usuario_nick = '" . $_SESSION['user']['nick'] . "'";
$select = mysql_query($query_select, $connect);
$array = mysql_fetch_array($select);

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
        <div class="panel-heading">Editar personagem</div>
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
                    <label for="dinheiro" class="col-sm-2 control-label">Dinheiro</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="dinheiro" name="dinheiro" placeholder="Dinheiro"
                               value="<?= $array['dinheiro'] ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="raca" class="col-sm-2 control-label">Raça</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="raca" name="raca" placeholder="Raça"
                               value="<?= $array['raca'] ?>">
                    </div>
                </div>
                <hr>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <a href="/guild/personagens.php" class="btn btn-default">Voltar</a>
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
