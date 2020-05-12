<h5 class="h5" >Novo usuário</h5>
<form action="user-new.php" method="post">
    <div class="form-group">
        <label for="usuario">Login</label>
        <input type="text" class="form-control" name="usuario" id="usuario" size="10" maxlength="10">
    </div>

    <div class="form-group">
        <label for="nome">Nome</label> 
        <input type="text" class="form-control" name="nome" id="nome" size="30" maxlength="30">
    </div>

    <div class="form-group">
    <label for="tipo">Permissão</label>
        <select class="form-control" name="tipo" id="tipo">
            <option value="admin">Administrador</option>
            <option value="editor" selected> Editor Autorizado</option>
        </select>
    </div>

    <div class="form-group">
    <label for="senha1">Senha</label>
        <input type="password" class="form-control" name="senha1" id="senha1" size="10" maxlength="10">
    </div>

    <div class="form-group">
    <label for="senha2">Confirmar Senha</label>
        <input type="password" class="form-control" name="senha2" id="senha2" size="10" maxlength="10">
    </div>
        <input type="submit" class="btn btn-outline-primary mb-3" value="Salvar">
    
</form>