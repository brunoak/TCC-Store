<?php

    /* FUNÇÃO QUE MOSTRA AS IMAGENS DO TCC*/

    function thumb($arq){
        $caminho = "img/$arq";
        if(is_null($arq) || !file_exists($caminho)){
            return "img/mapa.jpg";
        }else{
            return $caminho;
        }
    }

    /*FUNÇÃO QUE MOSTRA OS TCCS SALVOS NA PASTA PDF */

    function tcc($tccs){
        $camin = "PDF/$tccs";
        if(!file_exists($camin)){
            echo "Arquivo não existe"; 
        }else{
            return $camin;
        }
    }

    function voltar(){
        return "<a href='inicio.php'><img src ='icones/voltar.png'></a>";
    }

    /* MENSAGENS */

    function msg_sucesso($m){
        $resp = "<div class = 'sucesso'><img src ='icones/check.png'>$m</div>";
        return $resp;
    }

    function msg_aviso($m){
        $resp = "<div class ='aviso'><img src ='icones/info.png'>$m</div>";
        return $resp;
    }

    function msg_erro($m){
        $resp = "<div class = 'erro'><img src ='icones/error.png'>$m</div>";
        return $resp;
    }

    /* FUNÇAO PARA FAZER LOGOUT DO USUARIO*/

    function logout(){
        unset($_SESSION['user']);
        unset($_SESSION['nome']);
        unset($_SESSION['tipo']);
    }
?>