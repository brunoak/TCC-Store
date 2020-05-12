<?php

    /* SALVANDO A SESSÃO DO USUARIO */

    session_start();

    if (!isset($_SESSION['user'])){
        $_SESSION['user'] = "";
        $_SESSION['nome'] = "";
        $_SESSION['tipo'] = "";
    }

    /* CRIPTOGRAFANDO A SENHA DO USUARIO*/

    function cripto($senha){
        $c ='';
        for($pos = 0; $pos < strlen($senha); $pos++){
            $letra = ord($senha[$pos]) + 1;
            $c .= chr($letra);
        }
        return $c;
    }

    function gerarHash($senha){
        $txt = cripto($senha);
        $hash = password_hash($txt, PASSWORD_DEFAULT);
        return $hash;
    }

    function testarHash($senha, $hash){
        $ok = password_verify(cripto($senha), $hash);
        return $ok;
    }

    /* FUNÇÃO DE CONFIRMAÇÃO DE LOGIN */

    function is_logado(){
        if(empty($_SESSION['user'])){
            return false;
        }else{
            return true;
        }
    }

    /*  FUNÇÕES PARA SABER SE É ADMINISTRADOR OU EDITOR */

    function is_admin(){
        $t = $_SESSION['tipo'] ?? null;
        if(is_null($t)){
            return false;
        }else{
            if($t == 'admin'){
                return true;
            }else{
                return false;
            }
        }
    }

    function is_editor(){
        $t = $_SESSION['tipo'] ?? null;
        if(is_null($t)){
            return false;
        }else{
            if($t == 'editor'){
                return true;
            }else{
                return false;
            }
        }
    }
?>