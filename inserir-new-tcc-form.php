<h5 class="h5" >Novo TCC</h5>

<form action="inserir-new-tcc.php" method="post" enctype="multipart/form-data">

<div class="form-group">
    <label for="nome"> Título </label>
    <input type="text" class="form-control" name="nome" id="nome" size="24" placeholder="Digite o título" required>
</div>

<div class="form-group">
    <label for="curso"> Curso </label>
    <select  class="form-control" name="curso" id="curso" required>
        <option value="null"></option>
        <option value="Administração">Administração</option>
        <option value="Desenvolvimento">Desenvolvimento de Sistemas</option>
        <option value="Nutrição">Nutrição</option>
        <option value="Edificação">Edificação</option>
        <option value="Desenho">Desenho de construção</option>
    </select>
</div>

<div class="form-group">
    <label for="descricao"> Descrição</label> 
    <textarea class="form-control" name='descricao' id="descricao" rows="4" cols="50" placeholder='Descreva seu TCC...' required ></textarea>
</div>

<div class="form-group">
    <input class="form-control-file" id="file" type="file" name="tcc" id="tcc">
</div>

    <input type="submit" class="btn btn-outline-primary mb-2" value="Enviar Arquivo" name="enviar-formulario">

</form>

