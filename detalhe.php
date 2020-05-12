<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="icones/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/inicio.css">
    <link rel ="stylesheet" type="text/css" href="css/estilo.css">
    <title>TCC</title>
</head>
<body>
    <?php
        require_once "includes/banco.php";
        require_once "includes/fun.php";
        require_once "includes/login.php";
    ?>
    <div class="cover-container d-flex w-100 h-100 p-1 mx-auto flex-column">
        <header class="masthead" style="margin-bottom: 4rem;">
            <div class="inner">
                <div class="navbar navbar-light bg-light">
                    <h3 class="masthead-brand"><a href="index.php"><img src="icones/logo.png" alt="logo tcc store" width="120"></a></h3>
                    <nav class="nav nav-masthead justify-content-center nav">
                        <?php
                        if (empty($_SESSION['user'])) {
                            echo "<a class='nav-link' href= 'user-login.php'> Entrar</a> ";
                            echo "<a class='nav-link' href='user-cadastrar.php'>Cadastrar</a>";
                        } else {
                            echo "<a class='nav-link' href='user-edit.php'> Olá, " . $_SESSION['nome'] . "</a>";
                            echo " <a class='nav-link'  href='inserir-new-tcc.php'>Novo TCC  </a> ";
                            if (is_admin()) {
                                echo "<a class='nav-link'  href='user-new.php'>Novo usuário</a>";
                                echo "<a class='nav-link'  href='listar-user.php'> Excluir usuário</a>";
                            }
                            echo "<a class='nav-link'  href='user-logout.php'> Sair </a>";
                        }

                        ?>
                    </nav>
                </div>
            </div>
        </header>
        <?php

            /* PEGANDO O ID */

            $c = $_GET['cod'] ?? 0;
            $busca = $banco->query("select * from projeto where cod_tcc='$c'");
        ?>
        <h5 class="h5 mb-3"> Detalhes</h5>

        <table class="detalhes">
            <?php
               if(!$busca){
                   echo "<tr><td>A busca falhou";
               }else{

                    /* MONTANDO O DETALHE DO TCC*/

                   if($busca->num_rows == 1){
                       $reg = $busca->fetch_object();
                       $t = thumb($reg->capa);
                       $down = tcc($reg->arquivo);
                       echo"<tr><td rowspan='3'><img src='$t'>";
                       echo"<td><h2>$reg->nome</h2>";
                       echo"<tr><td class='desc'>$reg->descricao";
                       echo"<tr><td><a href='$down'style='float: right;' class='btn btn-primary' >Download</a> ";
                       
                       if(is_admin()){
                        echo "<a href='edit-tcc.php?cod=$reg->cod_tcc'> <img src ='icones/icoedit.png'></a>";
                        echo "<a href='excluir-tcc.php?cod=$reg->cod_tcc'><img src ='icones/icodelete.png'></a>";
                    }else if(is_editor()){
                        echo "<a href='edit-tcc.php?cod=$reg->cod_tcc'><img src ='icones/icoedit.png'></a>";
                    }
                   }else{
                       echo"<tr><td> Nenhum registro encontrado";
                   }
               }
            ?>
        </table>
        <br>
        <?php echo voltar() ?>
        <footer class="masterfoot mt-auto">
            <div class="inner">
                <p>
                    &copySeedTech 2020
                </p>
            </div>
        </footer>
    </div>
    <?php $banco->close();?>
    
</body>
</html>
