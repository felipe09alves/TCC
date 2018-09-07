<meta charset="UTF-8">
<?php

require_once('connect.php'); 

// if(isset($_POST) & !empty($_POST)){
// 	$nome = mysqli_real_escape_string($connection, $_POST['nome']);
// 	$cpf = ($_POST['cpf']);
// 	$email = mysqli_real_escape_string($connection, $_POST['email']);
// 	$telefone = ($_POST['telefone']);
// 	$uf =  ($_POST['uf']);
// 	$cidade =  mysqli_real_escape_string($connection, $_POST['cidade']);
// 	$endereco =  ($_POST['endereco']);
// 	$imovel =  ($_POST['imovel']);
// }

if(isset($_POST) & !empty($_POST)){
	$nome = ($_POST['nome']);
	$cpf = ($_POST['cpf']);
	$email = ($_POST['email']);
	$telefone = ($_POST['telefone']);
	$uf =  ($_POST['uf']);
	$cidade =  ($_POST['cidade']);
	$endereco =  ($_POST['endereco']);
	$imovel =  ($_POST['imovel']);
}

$sql = "INSERT INTO CLIENTE (CPF, NOME, EMAIL, TELEFONE, UF, CIDADE, ENDERECO, IMOVEL) VALUES ('$cpf', '$nome', '$email', '$telefone', '$uf', '$cidade', '$endereco', '$imovel');";
$res = mysqli_query($connection, $sql) or die(mysqli_error($connection));


if($res){
    header("Location: ../template/DetalhaCliente.php"); /* Redirect browser */
    exit();
}else{
    $fmsg = "Data not inserted, please try again later.";
}

if(isset($fmsg)){ ?>
    <div class="alert alert-danger" role="alert"> <?php echo $fmsg; ?> </div>
<?php } ?>

?>

