<?php

    require_once('banco.php');

    $query_select = "SELECT * FROM personagem WHERE usuario_nick = '" . $_SESSION['user']['nick'] . "'";
    $select = mysql_query($query_select, $connect); 
    $contD = 0;
    $contI = 0;
    $total = 0;
?>
<html>
<head>
    <title>Financeiro</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link href='https://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
</head>
<body>

<?php require_once "navbar.php" ?>

<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading">Dinheiro dos Personagens</div>
        <div class="panel-body">
           <!-- <a href="/guild/cadastro_personagem.php" class="btn btn-default">Novo personagem</a>-->
            <!--<hr>-->
            <?php if (isset($erro)) { ?>
                <div class="alert alert-danger" role="alert"><?= $erro ?></div>
            <?php } ?>

            <?php if (isset($sucesso)) { ?>
                <div class="alert alert-success" role="alert"><?= $sucesso ?></div>
            <?php } ?>

            <table class="table table-bordered table-striped table-hover">
                <thead>
                <tr>
                    <th>Personagem</th>
                    <th>Dinheiro</th>
                    <th>Itens</th>
                    <th>Valor dos Itens</th>
                    <th>Total dos Itens</th>
                </tr>
                </thead>
                <tbody>

                <?php
                    while ($array = mysql_fetch_array($select)) { ?>
                    <tr>
                        <td><?= $array['nome']?></td>
                        <td><?= $array['dinheiro']; $contD+=$array['dinheiro'] ?></td>

                    <?php
                        $query_select1 = "SELECT * FROM item WHERE posse = '" . $array['nome'] . "'";
                        $select1 = mysql_query($query_select1, $connect);
                        $num_rows = mysql_num_rows($select1); 
                        $i = $num_rows;
                        $j = $num_rows;
                        $string = '';
                        $itens = array();
                        $preco = '';
                        $valor = array();
                        $person = 0;

                        while ($array1 = mysql_fetch_array($select1)) { 
                                 $contI+=$array1['valor'];

                                 if($num_rows>1){
                                 $itens[$i] = $array1['nome'];
                                 $i--;
                                 $string = implode(", ", $itens);                                
                                 
                                 $valor[$j] = $array1['valor'];
                                 $j--;
                                 $preco = implode(", ", $valor); 

                                 $person+=$array1['valor'];
                                 $person1 = $person + $array['dinheiro'] ?>

                               <?php if(!$i) echo '<td>'. $string. '</td>
                                <td>' . $preco. '</td>
                                <td>' . $person. '</td>' ?>

                             <?php }else{ ?>
                                <td><?= $array1['nome'] ?></td>
                                <td><?= $array1['valor'] ?></td>
                                <td><?= $array1['valor'] ?></td>                                
                             <?php } ?>

                    <?php } ?> 
                    </tr>
                <?php } ?>
                </tbody>
            </table>

           <br/><p><center style="color:red">Total em Dinheiro = <?= $contD ?><br/>
                                         Total em Itens = <?= $contI ?><br/>
                                         TOTAL = <?=$contI+$contD?></center></p>

        </div>
    </div>
</div>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src="js/bootstrap.js"></script>
<script src="js/index.js"></script>
<!--<?php echo($cont); ?>-->
</body>
</html>