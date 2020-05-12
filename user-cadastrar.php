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
    <title>Cadastro</title>
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
                            echo " <a class='nav-link'  href='inserir-new-tcc.php'>Inserir TCC  </a> ";
                            if (is_admin()) {
                                echo "<a class='nav-link'  href='user-new.php'>Novo usuário</a>";
                                echo "<a class='nav-link'  href='listar-user.php'> Excluir Usuario</a>";
                            }
                            echo "<a class='nav-link'  href='user-logout.php'> Sair </a>";
                        }

                        ?>
                    </nav>
                </div>
            </div>
        </header>
        <?php
                if(!isset($_POST['usuario'])){
                    require "user-cadastrar-form.php";
                }else{
                    $usuario = $_POST['usuario'] ?? null;
                    $nome = $_POST['nome'] ?? null;
                    $senha1 = $_POST['senha1'] ?? null;
                    $senha2 = $_POST['senha2'] ?? null;
                    $tipo = $_POST['tipo'] ?? null;

                    if($senha1 === $senha2){

                        if(empty($usuario) || empty($nome) || empty($senha1) || empty($senha2) || empty($tipo)){
                        echo msg_erro('Todos os dados são obrigatórios');
                        
                        }else{
                            $senha = gerarHash($senha1);
                            $q = "insert into usuarios (usuario, nome, senha, tipo) values ('$usuario','$nome' , '$senha','$tipo')";
                            if($banco->query($q)){
                                echo msg_sucesso('Usuário cadastrado com sucesso');
                            }else{
                                echo msg_erro('Usuário ou Senha invalidos');
                            }
                        }
                    }else{
                        echo msg_erro('Senhas não conferem');
                    }
                }
            
            echo voltar();
        ?>
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