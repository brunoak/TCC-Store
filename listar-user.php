<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="icones/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/inicio.css">
    <link rel="stylesheet" type="text/css" href="css/estilo.css">
    <?php
    require_once "includes/banco.php";
    require_once "includes/fun.php";
    require_once "includes/login.php";
    ?>
    <style>
        table.listagem .direita {
            text-align: right;
        }

        div#corpo {
            width: 700px;
            margin: auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0px 0px 30px #777;
        }

        table.listagem td {
            width: 60px
        }
    </style>
    <title>Excluir Usuario</title>
</head>

<body>
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

        <h5 class="h5">Excluir usuários</h5>
        <table class="listagem">
            <?php
            $sql = "select * from usuarios";
            $busca = $banco->query($sql);

            if (!$busca) {
                echo "<tr><td>Infelizmente a busca deu errado";
            } else {
                if ($busca->num_rows == 0) {
                    echo "<tr><td>Nenhum registro encontrado";
                } else {

                    while ($reg = $busca->fetch_object()) {
                        echo "<tr><td>Nome: $reg->nome";
                        echo "<br>Usuário: $reg->usuario";
                        echo "<td class ='direita'>";
                        echo " <a href='excluir-user.php?cod=$reg->cod_usuario' class='img'><img src ='icones/icodelete.png'></a> ";
                    }
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
</body>

</html>