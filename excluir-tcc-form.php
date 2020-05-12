<?php
     $c = $_GET['cod'] ?? 0;
     $q = "select * from projeto where cod_tcc='$c'";
     $busca = $banco->query($q);
     $reg = $busca->fetch_object();
     
?>

<form action="excluir-tcc.php" method="post">

<div class="form-group">
    <label for="nome">Deseja excluir esse arquivo?</label> 
    <input type="text" class="form-control" name="nome" id="nome" size="50" readonly value="<?php echo $reg->arquivo?>">
</div>
    <input type="hidden" name ="id" value="<?php echo $reg->cod_tcc?>">

    <input type="submit" class="btn btn-outline-primary mb-4" value="Deletar" name="deletar"><br>
</form>