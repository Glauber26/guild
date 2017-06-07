<?php

require_once('banco.php');

$query_select = "SELECT * FROM evento WHERE usuario_nick='" . $_SESSION['user']['nick'] . "'";
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
        <div class="panel-heading">Cadastro de Eventos</div>
        <div class="panel-body">
            <a href="/guild/cadastrar_evento.php" class="btn btn-default">Novo Evento</a>
            <a href="/guild/evento.php" class="btn btn-default">Todos os Eventos</a>
            <hr>
            <?php if (isset($erro)) { ?>
                <div class="alert alert-danger" role="alert"><?= $erro ?></div>
            <?php } ?>

            <?php if (isset($sucesso)) { ?>
                <div class="alert alert-success" role="alert"><?= $sucesso ?></div>
            <?php } ?>

            <table class="table table-bordered table-striped table-hover">
                <thead>
                <tr>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Data</th>
                    <th>Ações</th>

                </tr>
                </thead>
                <tbody>

                <?php while ($array = mysql_fetch_array($select)) { ?>
                    <tr>
                        <td><?= $array['nome'] ?></td>
                        <td><?= $array['descricao'] ?></td>
                        <td><?= $array['data'] ?></td>

                        <td>
                            <div class="btn-group">
                                <button type="button" class="btn btn-default btn-xs dropdown-toggle"
                                        data-toggle="dropdown"
                                        - aria-haspopup="true" aria-expanded="false">
                                    Ações <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a href="/guild/editar_evento.php?id=<?= $array['id'] ?>">Editar</a></li>
                                    <li><a href="/guild/remover_evento.php?id=<?= $array['id'] ?>">Remover</a></li>
                                </ul>
                            </div>
                        </td>

                    </tr>

                <?php } ?>
                </tbody>
            </table>

        </div>
    </div>
</div>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src="js/bootstrap.js"></script>
<script src="js/index.js"></script>
</body>
</html>