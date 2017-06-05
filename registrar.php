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
<div class="container col-sm-8 col-sm-offset-2">
    <div class="panel panel-default">
        <div class="panel-heading">Guild Manager - Cadastre se</div>
        <div class="panel-body">
            <div id="signup">
                <form class="form-horizontal" method="post" action="cadastro.php">
                    <div class="form-group">
                        <label for="nome" class="col-sm-2 control-label">Nome</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome"
                                   required="required">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="sobrenome" class="col-sm-2 control-label">Sobrenome</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="sobrenome" name="sobrenome"
                                   placeholder="Sobrenome"
                                   required="required">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nick" class="col-sm-2 control-label">Nick</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nick" name="nick" placeholder="Nick"
                                   required="required">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="tipo" class="col-sm-2 control-label">Tipo de usuário</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="tipo" name="tipo"
                                   placeholder="Tipo de usuário"
                                   required="required">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email" class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email"
                                   required="required">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="senha" class="col-sm-2 control-label">Insira uma senha</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="senha" name="senha"
                                   placeholder="Insira uma senha" value="">
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
                    <hr>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" id="salvar" name="salvar" class="btn btn-default">Alterar</button>
                            <a class="btn" href="index.php" style="float: right">Já tem uma conta? Faça login aqui</a>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src="js/index.js"></script>

</body>
</html>
