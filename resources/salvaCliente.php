<meta charset="UTF-8">
<?php

    require_once('connect.php');

    if (isset($_POST) & !empty($_POST)) {
        $nome = ($_POST['nome']);
        echo ($_POST['nome']);
        $cpf = ($_POST['cpf']);
        $email = ($_POST['email']);
        $telefone = ($_POST['telefone']);
        $uf =  ($_POST['uf']);
        $cidade =  ($_POST['cidade']);
        $endereco =  ($_POST['endereco']);
        $imovel =  ($_POST['imovel']);
    }

    $sql = "UPDATE cliente SET CPF = '$cpf', NOME = '$nome', EMAIL = '$email', TELEFONE = '$telefone', UF = '$uf', CIDADE = '$cidade', ENDERECO = '$endereco', IMOVEL =  '$imovel' WHERE CPF=".$cpf;
    $res = mysqli_query($connection, $sql) or die(mysqli_error($connection));

    if ($res) {
        $sql = "SELECT id FROM cliente WHERE CPF='".$cpf."'";
        $res = mysqli_query($connection, $sql) or die(mysqli_error($connection));
        $r = mysqli_fetch_assoc($res);
        header( "Location: ../template/DetalhaCliente.php?id=".$r['id'] ); /* Redirect browser */
        exit();
    } else {
        $fmsg = "Data not inserted, please try again later.";
    } 
    
    if (isset($fmsg)) { ?>
        <div class="alert alert-danger" role="alert"> <?php echo $fmsg; ?> </div>
    <?php  } 



?>