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

function cidade() {

    // require('connect.php');
    // $id = $_GET['id'];
    // $sql = "SELECT cliente.*, estado.nome AS estado, cidade.nome AS cidade FROM cliente JOIN estado ON cliente.id_estado = estado.id JOIN cidade ON cliente.id_cidade = cidade.id WHERE cliente.id=".$id;
    // $res = mysqli_query($connection, $sql) or die(mysqli_error($connection));

    // $r = mysqli_fetch_assoc($res); ?>
        
    //     <h4> <?php echo $r['nome'] ?> </h4>
    //     <span> <?php echo $r['cpf'] ?> </span>
    //     <span> <?php echo $r['email'] ?> </span>
    //     <span> <?php echo $r['telefone'] ?> </span>
    //     <span> <?php echo $r['estado'] ?> </span>
    //     <span> <?php echo $r['cidade'] ?> </span>
    //     <span> <?php echo $r['endereco'] ?> </span>
    //     <span> <?php echo $r['imovel'] ?> </span>

<?php } ?>