<?php

require_once('banco.php');

$query_select = "SELECT * FROM logins l JOIN usuario u ON u.nick = l.usuario_nick";
$select = mysql_query($query_select, $connect);
?>
<html>
<head>
    <title>Relatório de sessão</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link href='https://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
</head>
<body>

<?php require_once "navbar.php" ?>

<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading">Relatório de sessão</div>
        <div class="panel-body">
            <!-- <a href="/guild/cadastro_personagem.php" class="btn btn-default">Novo personagem</a>-->
            <!--<hr>-->
            <a href="#" class="btn btn-default imprimir">Imprimir</a><br><br>
            <?php if (isset($erro)) { ?>
                <div class="alert alert-danger" role="alert"><?= $erro ?></div>
            <?php } ?>

            <?php if (isset($sucesso)) { ?>
                <div class="alert alert-success" role="alert"><?= $sucesso ?></div>
            <?php } ?>

            <table class="table table-bordered table-striped table-hover">
                <thead>
                <tr>
                    <th>Usuário</th>
                    <th>Horário de login</th>
                </tr>
                </thead>

                <?php while ($array = mysql_fetch_array($select)) { ?>
                    <tr>
                        <td><?= $array['nome'] ?></td>
                        <td><?= $array['data'] ?></td>
                    </tr>
                <?php } ?>
            </table>


        </div>
    </div>
</div>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src="js/bootstrap.js"></script>
<script src="js/index.js"></script>
<script !src="">
    $('.imprimir').click(function () {
        window.print();
    });
</script>
</body>
</html>