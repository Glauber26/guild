<?php

require_once('banco.php');

if (isset($_POST['salvar'])) {
    $dinheiro = $_POST['dinheiro'];



    $select = mysql_query($query_select, $connect);
    $array = mysql_fetch_array($select);

    if ($nomeClasse == "" || $nomeClasse == null) {
        $erro = 'O campo dinheiro deve ser preenchido';
    } else {
        $query = "INSERT INTO classe (nome) VALUES ('$nomeClasse')";
        $insert = mysql_query($query, $connect);
        if ($insert) {
            $sucesso = 'Dinheiro Inserido com sucesso!';
        } else {
            $erro = 'Não foi possível inserir dinheiro no banco';
        }

    }
}
?>

<html>
<head>
    <title>Dinheiro da Guilda</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link href='https://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
</head>
<body>

<?php require_once "navbar.php" ?>

<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading">Cadastro de Dinheiro</div>
        <div class="panel-body">


            <?php if (isset($erro)) { ?>
                <div class="alert alert-danger" role="alert"><?= $erro ?></div>
            <?php } ?>

            <?php if (isset($sucesso)) { ?>
                <div class="alert alert-success" role="alert"><?= $sucesso ?></div>
            <?php } ?>

            <form class="form-horizontal" method="post">
                <div class="form-group">
                    <label for="dinheiro" class="col-sm-2 control-label">Dinheiro</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="dinheiro" name="dinheiro" placeholder="Dinheiro">
                    </div>
                </div>
                <hr>

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
