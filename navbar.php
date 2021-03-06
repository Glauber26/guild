<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/guild/home.php">Guild Manager</a>
        </div>

        <ul class="nav navbar-nav">
            <li><a href="/guild/personagens.php">Personagens</a></li>
            <li><a href="/guild/classe.php">Classes</a></li>
            <li><a href="/guild/evento.php">Eventos</a></li> 
            <li><a href="/guild/item.php">Itens</a></li>
            <li><a href="/guild/bancoguild.php">Banco da Guilda</a></li>
            <li><a href="/guild/relatorio1.php">Relatório Financeiro</a></li>
            <li><a href="/guild/relatorio 2.php">Relatório de sessão</a></li>
        </ul>



        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                       aria-expanded="false"><?php echo $_SESSION['user']['nome'] ?><span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="/guild/consulta_usuario.php">Editar perfil</a></li>
                        <li><a href="/guild/logout.php">Sair</a></li>
                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>