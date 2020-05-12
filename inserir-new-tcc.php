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
    <title>Inserir tcc</title>
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
        if (isset($_POST['enviar-formulario'])) {
            $formatoPermitido = array("PDF", "pdf");
            $extensao = pathinfo($_FILES['tcc']['name'], PATHINFO_EXTENSION);

            if (in_array($extensao, $formatoPermitido)) {
                $pasta = "PDF/";
                $temporario = $_FILES['tcc']['tmp_name'];
                $nome = $_POST['nome'] . ".$extensao";
                $curso = $_POST['curso'];
                $descricao = $_POST['descricao'];
                $capa;
                $codCurso;
               
                switch ($curso) {
                    case 'Administração':
                        $capa = 'adm.jpg';
                        $codCurso = 4;
                        break;
                    case 'Desenvolvimento':
                        $capa = 'ti.jpg';
                        $codCurso = 1;
                        break;
                    case 'Nutrição':
                        $capa = 'nutri.jpg';
                        $codCurso = 3;
                        break;
                    case 'Edificação':
                        $capa = 'edif.jpg';
                        $codCurso = 2;
                        break;
                    case 'Desenho':
                        $capa = 'mapa.jpg';
                        $codCurso = 5;
                        break;
                    case 'null':
                        echo msg_erro("Escolha um Curso");
                    break;
                }

                if($curso =='null' || empty($descricao)){
                    echo msg_erro("Preencha todos os campos");
                    
                }
                else if (move_uploaded_file($temporario, $pasta . $nome)) {
                    $newText= wordwrap($descricao,54,"\n",true);
                    $query = "insert into projeto (capa, arquivo, nome, descricao, cod_curso_fk, cod_escola_fk) values ('$capa','$nome', '$nome', '$newText', '$codCurso', '1')";
                    if($banco->query($query)){
                        echo msg_sucesso("Upload feito com sucesso");
                    }else{
                        echo $banco;
                    }

                } else {
                    echo msg_erro("Não foi possivel fazer o Upload");
                }
            } else {
                echo msg_erro("Formato invalido");
            }
        }else{
            require "inserir-new-tcc-form.php";
        }
        ?>
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


