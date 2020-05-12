<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="icones/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/estilo.css">
    <link rel="stylesheet" href="css/inicio.css">
    <title>TCC</title>
</head>

<body>

    <?php
    require_once "includes/banco.php";
    require_once "includes/fun.php";
    require_once "includes/login.php";
    $chave = $_GET['c'] ?? "";
    ?>


    <!--INICIO TOPO DA PAGINA -->

    <div class="cover-container d-flex w-100 h-100 p-1 mx-auto flex-column">
        <header class="masthead">
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

        <nav class="navbar ">
        <a class='nav-link-inicio' href="inicio.php"> Mostrar Todos</a>
            <form class="form-inline" method="get" id="busca" action="inicio.php">
                <input class="form-control mr-sm-2 " type="search" name="c" placeholder="Digite título ou curso" aria-label="Pesquisar">
                <input class="btn btn-outline-primary my-2 my-sm-0" type="submit" value="Pesquisar">
            </form>
        </nav>
        <!--FIM TOPO DA PAGINA -->

        <table class="listagem ">
            <?php

            /* JOIN ENTRE AS TABELAS */

            $q = "select projeto.nome, projeto.capa, projeto.cod_tcc, projeto.arquivo, curso.nome from projeto inner join curso on cod_curso = cod_curso_fk ";

            if (!empty($chave)) {
                $q .= " Where projeto.nome like '%$chave%' or curso.nome like '%$chave%' ";
            }

            /*ACESSANDO O BANCO */

            $busca = $banco->query($q);
            if (!$busca) {
                echo "<tr><td>Infelizmente a busca deu errado";
            } else {
                if ($busca->num_rows == 0) {
                    echo "<tr><td>Nenhum registro encontrado";
                } else {

                    /* MONTANDO A TELA INICIAL COM LINKS E IMAGENS VINDOS DO BANCO*/

                    while ($reg = $busca->fetch_object()) {
                        $t = thumb($reg->capa);
                        echo "<tr><td><img src='$t' class='mini'/><td><a class='nav-link-inicio' href='detalhe.php?cod=$reg->cod_tcc'>$reg->arquivo</a>";
                        echo "<br><span class='span'>[$reg->nome]</span>";
                        if (is_admin()) {
                            echo "<td>";
                            echo " <a href='detalhe.php?cod=$reg->cod_tcc'><img src ='icones/iconew.png'></a>";
                            echo " <a href='edit-tcc.php?cod=$reg->cod_tcc'><img src ='icones/icoedit.png'></a>";
                            echo " <a href='excluir-tcc.php?cod=$reg->cod_tcc'><img src ='icones/icodelete.png'></a> ";
                        } else if (is_editor()) {
                            echo "<td>";
                            echo " <a href='detalhe.php?cod=$reg->cod_tcc'><img src ='icones/iconew.png'></a>";
                            echo " <a href='edit-tcc.php?cod=$reg->cod_tcc'><img src ='icones/icoedit.png'></a> ";
                        }
                    }
                }
            }
            ?>
        </table>
        <footer class="masterfoot mt-auto">
            <div class="inner">
                <p>
                    &copySeedTech 2020
                </p>
            </div>
        </footer>
    </div>


    <?php $banco->close(); ?>

</body>

</html>