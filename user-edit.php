<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="icones/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/inicio.css">

    <?php
    require_once "includes/banco.php";
    require_once "includes/fun.php";
    require_once "includes/login.php";
    ?>
    <title>Editar dados</title>
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

        <?php
        if (!is_logado()) {
            echo "<div class='alert alert-danger' role='alert'> Efetue <a href='user-login.php' class='alert-link'>login </a>para poder editar os dados </div>";
            
        } else {
            if (!isset($_POST['usuario'])) {
                include "user-edit-form.php";
            } else {
                $usuario = $_POST['usuario'] ?? null;
                $nome = $_POST['nome'] ?? null;
                $tipo = $_POST['tipo'] ?? null;
                $senha1 = $_POST['senha1'] ?? null;
                $senha2 = $_POST['senha2'] ?? null;

                $q = "update usuarios set usuario = '$usuario', nome ='$nome'";

                if (empty($senha1) || is_null($senha1)) {
                    echo "<div class='alert alert-warning' role='alert'>Senha antiga foi mantida</div>";

                } else {
                    if ($senha1 === $senha2) {
                        $senha = gerarHash($senha1);
                        $q .= " , senha='$senha'";
                    } else {
                        echo "<div class='alert alert-danger' role='alert'>Senhas não conferem</div>";
                    }
                }

                $q .= " where usuario = '" . $_SESSION['user'] . "'";

                if ($banco->query($q)) {
                    echo "<div class='alert alert-success' role='alert'>Usuário alterado com sucesso!</div>";
                     
                    logout();
                    echo "<div class='alert alert-warning' role='alert'>Por segurança, efetue o <a href='user-login.php' style='color: red'> login </a>novamente</div>";
                } else {
                    echo "<div class='alert alert-danger' role='alert'>Não foi possivel alterar os dados</div>"; 
                    
                }
            }
        }
        ?>
        <?php echo voltar() ?>
        <footer class="masterfoot mt-auto" style="text-align: center;">
            <p>
                &copySeedTech 2020
            </p>
        </footer>
    </div>
</body>

</html>