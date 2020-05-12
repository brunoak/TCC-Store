<?php
     $c = $_GET['cod'] ?? 0;
     $q = "select * from projeto where cod_tcc='$c'";
     $busca = $banco->query($q);
     $reg = $busca->fetch_object();
     
?>

<form action="edit-tcc.php" method="post">
<div class="form-group">
    <label for="nome">Nome</label> 
    <input type="text" class="form-control" name="nome" id="nome" size="30" readonly value="<?php echo $reg->arquivo?>" >
</div>

    <input type="hidden" name ="id" value="<?php echo $reg->cod_tcc?>">

<div class="form-group">
    <label for="descri">Descrição</label> 
    <textarea name='descricao' class="form-control" id="descri" rows="4" cols="50" required><?php echo $reg->descricao?></textarea>
</div>

    <input type="submit" class="btn btn-outline-primary mb-4" value="Salvar" name="enviar">
</form>