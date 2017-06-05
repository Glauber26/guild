<?php

require_once('banco.php');

if (isset($_POST['salvar'])) {

    $nome = trim($_POST['nome']);
    $sobrenome = trim($_POST['sobrenome']);
    $nick = trim($_POST['nick']);
    $tipo = trim($_POST['tipo']);
    $email = trim($_POST['email']);
    $senha = trim($_POST['senha']);
    $repitasenha = trim($_POST['repitasenha']);

    if ($senha == $repitasenha) {

        $query = "UPDATE usuario SET nome = '$nome',
                        sobrenome = '$sobrenome',
                        nick = '$nick',
                        tipo = '$tipo',
                        ";
        if ($senha) {
            $query .= "senha = '$senha',";
        }

        $query .= "email = '$email' WHERE nick = '" . $_SESSION['user']['nick'] . "'";

        $insert = mysql_query($query, $connect);

        if ($insert) {
            $sucesso = "Usuário inserido com sucesso!";
        } else {
            $erro = "Não foi possível atualizar";
        }

    } else {
        $erro = "As senhas não correspondem";
    }
}

$query_select = "SELECT * FROM usuario WHERE nick = '" . $_SESSION['user']['nick'] . "'";
$select = mysql_query($query_select, $connect);
$array = mysql_fetch_array($select);

$_SESSION['user'] = $array;

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
        <div class="panel-heading">Edite seu perfil</div>
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
                        <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome"
                               required="required" value="<?= $array['nome'] ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="sobrenome" class="col-sm-2 control-label">Sobrenome</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="sobrenome" name="sobrenome" placeholder="Sobrenome"
                               required="required" value="<?= $array['sobrenome'] ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="nick" class="col-sm-2 control-label">Nick</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nick" name="nick" placeholder="Nick"
                               required="required" value="<?= $array['nick'] ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="tipo" class="col-sm-2 control-label">Tipo de usuário</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="tipo" name="tipo" placeholder="Tipo de usuário"
                               required="required" value="<?= $array['tipo'] ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="email" class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email"
                               required="required" value="<?= $array['email'] ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="senha" class="col-sm-2 control-label">Insira uma senha</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="senha" name="senha"
                               placeholder="Insira uma senha" value="">
                        <p class="help-block">Deixe em branco para manter a senha.</p>
                    </div>
                </div>
                <div class="form-group">
                    <label for="repitasenha" class="col-sm-2 control-label">Repita sua senha</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="repitasenha" name="repitasenha"
                               placeholder="Repita sua senha"
                               value="">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" id="salvar" name="salvar" class="btn btn-default">Alterar</button>
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