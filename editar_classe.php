<?php

require_once('banco.php');

if (isset($_POST['salvar'])) {
    $nomeClasse = $_POST['nome'];


    if ($nomeClasse == "" || $nomeClasse == null) {
        $erro = 'O campo nome da classe deve ser preenchido';
    } else {
        $query = "UPDATE classe SET nome='$nomeClasse' WHERE nome = '".$_GET['nome']."'";
        $insert = mysql_query($query, $connect);

        $url = "/guild/editar_classe.php?nome=$nomeClasse";
        header("location:$url");

        if ($insert) {
            $sucesso = 'Classe atualizada com sucesso!';
        } else {
            $erro = 'Não foi possível atualizar essa classe';
        }

    }
}

$query_select = "SELECT * FROM classe WHERE nome = '".$_GET['nome']."'";
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
        <div class="panel-heading">Editar Classe</div>
        <div class="panel-body">


            <?php if (isset($erro)) { ?>
                <div class="alert alert-danger" role="alert"><?= $erro ?></div>
            <?php } ?>

            <?php if (isset($sucesso)) { ?>
                <div class="alert alert-success" role="alert"><?= $sucesso ?></div>
            <?php } ?>

            <form class="form-horizontal" method="post">

                <div class="form-group">
                    <label for="dinheiro" class="col-sm-2 control-label">Nome</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome"
                               value="<?= $array['nome'] ?>">
                    </div>
                </div>
                <hr>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <a href="/guild/classe.php" class="btn btn-default">Voltar</a>
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
