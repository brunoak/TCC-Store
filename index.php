<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="icones/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/inicio.css">
    <title>TCC Store</title>
</head>

<body class="text-center">

    <?php
    require_once "includes/banco.php";
    require_once "includes/fun.php";
    require_once "includes/login.php";
    ?>
    <div class=" cover-container d-flex w-100 h-100 p-1 mx-auto flex-column">
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

        <main role="main" class="inner cover">
            <h1 class="cover-heading h1">Baixe ou compartilhe TCCs.</h1>
            <p class="lead p">
               TCC Store é um sistema de hospedagem e compartilhamento de TCCs, nele você pode baixar, editar ou adicionar Trabalhos de Conclusão de Curso. Inicialmente pensado para os alunos dos cursos noturno da ETEC de Heliopólis, mas pode ser usado por qualquer pessoa que necessite de referências para fazer seu TCC.
            </p><br>
            <p class="lead">
                <a href="inicio.php" class="btn btn-lg btn-primary">Confira a lista</a>
            </p>
        </main>
        <footer class="masterfoot mt-auto">
            <p>
                &copySeedTech 2020
            </p>
        </footer>
    </div>
    <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
</body>

</html>