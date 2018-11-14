<?php
require_once('session.php');
require_once('connect.php');

$sql = "DELETE FROM cliente WHERE id=".$_GET['id'];
$res = mysqli_query($connection, $sql) or die(mysqli_error($connection));


if ($res) {

    $_SESSION['confirma_cliente'] = "Operação realizada com Sucesso!";
    header( "Location: ../template/Cliente.php" );
    exit();
} else {
    $_SESSION['confirma_cliente'] = "Erro! Não foi possível realizar a operação.";
}


?>

