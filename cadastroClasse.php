<?php

require_once('banco.php');

if (isset($_POST['salvar'])) {
    $nomeClasse = $_POST['nome'];


    $query_select = "SELECT * FROM classe WHERE nome = '$nomeClasse'";
    $select = mysql_query($query_select, $connect);
    $array = mysql_fetch_array($select);

    if ($nomeClasse == "" || $nomeClasse == null) {
        $erro = 'O nome da classe deve ser preenchido';
    } else {
        $query = "INSERT INTO classe (nome) VALUES ('$nomeClasse')";
        $insert = mysql_query($query, $connect);
        if ($insert) {
            $sucesso = 'Classe cadastrada com sucesso!';
        } else {
            $erro = 'Não foi possível cadastrar essa classe, classe já existente na base de dados';
        }

    }
}
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
        <div class="panel-heading">Cadastro de classe</div>
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
                <hr>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">

                        <button type="submit" class="btn btn-default" name="salvar">Salvar</button>
                        <a href="/guild/classe.php" class="btn btn-default">Voltar</a>

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
