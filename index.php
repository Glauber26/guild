<?php
session_start();
if (isset($_SESSION['user'])) {
    // Está logado
    $url = '/guild/home.php';
    header("location:$url");
} else {
    // Não está logado
}
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Guld Manager - Login/Cadastre-se</title>
    <link rel="stylesheet" href="css/bootstrap.css">
</head>

<body>
<br>
<br>
<div class="form">
    <div class="container col-sm-8 col-sm-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">Guild Manager - Fazer Login</div>
            <div class="panel-body">
                <div id="login">

                    <form class="form-horizontal" action="login.php" method="post">

                        <div class="form-group">
                            <label for="nick" class="col-sm-2 control-label">Nick</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="nick" name="nick" placeholder="Nick"
                                       required="required">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="senha" class="col-sm-2 control-label">Senha</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" id="senha" name="senha"
                                       placeholder="Insira uma senha" value="">
                            </div>
                        </div>
                        <hr>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" id="salvar" name="salvar" class="btn btn-default">Entrar</button>
                                <a class="btn" href="registrar.php" style="float: right">Ainda não tem uma conta? Cadastre-se aqui</a>
                            </div>
                        </div>

                    </form>

                </div>
            </div>
        </div>

    </div>
</div>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src="js/index.js"></script>

</body>
</html>
