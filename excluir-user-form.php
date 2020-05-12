<?php
     $c = $_GET['cod'] ?? 0;
     $q = "select * from usuarios where cod_usuario='$c'";
     $busca = $banco->query($q);
     $reg = $busca->fetch_object();
     
?>

<form action="excluir-user.php" method="post">

<div class="form-group">
    <label for="nome">Deseja excluir esse usúario?</label>
    <input type="text" class="form-control" name="nome" id="nome" size="30" readonly value="<?php echo $reg->nome?>">
</div>                        
    <input type="hidden" name ="id" value="<?php echo $reg->cod_usuario?>">

    <input type="submit" class="btn btn-outline-primary mb-4" value="Deletar" name="deletar"><br>
</form>


