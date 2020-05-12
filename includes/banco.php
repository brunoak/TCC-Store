<?php

    /* FAZENDO A CONEXÃO COM O BANCO */

    $banco = new mysqli("localhost", "root", "", "tcc");
    if($banco->connect_errno){
        echo"<p> encontrei um erro $banco->errno --> $banco->connect_error <p>";
        die();
    }
?>