<meta charset="UTF-8">
<?php

function estado() {
    
    require_once('connect.php');
    $sql_estado = "SELECT * FROM estado";
    $res_estado = mysqli_query($connection, $sql_estado) or die(mysqli_error($connection_estado));

    while ($r_estado = mysqli_fetch_assoc($res_estado)) { 
        
        echo ("<option value='".$r_estado['id']."'>".$r_estado['sigla']."</option>");
    }        

}

function cidade() { ?>
        
    <h4> <?php echo $r['nome'] ?> </h4>
    <span> <?php echo $r['cpf'] ?> </span>
    <span> <?php echo $r['email'] ?> </span>
    <span> <?php echo $r['telefone'] ?> </span>
    <span> <?php echo $r['estado'] ?> </span>
    <span> <?php echo $r['cidade'] ?> </span>
    <span> <?php echo $r['endereco'] ?> </span>
    <span> <?php echo $r['imovel'] ?> </span>

<?php } ?>