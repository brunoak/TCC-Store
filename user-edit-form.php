<?php
    $q = "select usuario, nome, senha, tipo from usuarios where usuario ='" . $_SESSION['user'] . "'";
    $busca = $banco->query($q);
    $reg = $busca->fetch_object();
?>

<h5 class="h5" >Editar Dados</h5>

<form action="user-edit.php" method="post">

    <div class="form-group">
        <label for="usuario">Login</label> 
        <input type="text" class="form-control" name="usuario" id="usuario" maxlength="10" size="10" value="<?php echo $reg->usuario?>" readonly>
    </div>

    <div class="form-group">
        <label for="nome">Nome</label>
        <input type="text" class="form-control" name="nome" id="nome" maxlength="30" size="30" value="<?php echo $reg->nome ?>">
    </div>

    <div class="form-group">
        <label for="tipo">Permissão</label> 
        <input type="text" class="form-control" name="tipo" id="tipo" id="tipo" value="<?php echo $reg->tipo?>" readonly>
    </div>

    <div class="form-group">
        <label for="senha1">Senha</label> 
        <input type="password" class="form-control" name="senha1" id="senha1" maxlength="10" size="10">
    </div>

    <div class="form-group">
        <label for="senha2">Confirmar Senha</label>
        <input type="password" class="form-control" name="senha2" id="senha2" maxlength="10" size="10">
    </div>    
        <input  class="btn btn-outline-primary mb-3" type="submit" value="Salvar">
</form>