<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="icones/logo.png" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <title>Login de Usuário</title>
    <style>
        .body{
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .area{
            width: 100%;
            max-width: 350px;
            text-align: center;
            padding: 10px;
        }
        .logo{
            width: 100%;
            height: auto;
        }
        .voltar{
            float: left;
        }
    </style>
</head>

<body>

    <?php
    require_once "includes/banco.php";
    require_once "includes/fun.php";
    require_once "includes/login.php";
    ?>

    <div class="body">
        <div class="area">
            <img src="icones/logo.png" alt="Logo Tcc">
            <?php
            $u = $_POST['usuario'] ?? null;
            $s = $_POST['senha'] ?? null;

            if (is_null($u) || is_null($s)) {
                require "user-login-form.php";
            } else {
                $q = "select usuario, nome, senha, tipo FROM usuarios WHERE usuario = '$u' LIMIT 1";
                $busca = $banco->query($q);
                if (!$busca) {
                    echo "<div class='alert alert-danger' role='alert'>Falha ao acessar o banco! </div>";
                } else {
                    if ($busca->num_rows > 0) {
                        $reg = $busca->fetch_object();
                        if (testarHash($s,  $reg->senha)) {
                            echo "<div class='alert alert-success' role='alert'> Logado com Sucesso! </div>";
                            $_SESSION['user'] = $reg->usuario;
                            $_SESSION['nome'] = $reg->nome;
                            $_SESSION['tipo'] = $reg->tipo;
                        } else {
                            echo "<div class='alert alert-danger' role='alert'>Senha invalida </div>";
                        }
                    } else {
                        echo "<div class='alert alert-danger' role='alert'>Usuario não encontrado </div>";
                        
                    }
                }
            }
            ?>
            <br>
            <a class="voltar" href='inicio.php'><img src ='icones/voltar.png'></a>
        </div>
        
    </div>
</body>

</html>