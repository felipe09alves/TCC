<?php
require_once('session.php');
require_once('connect.php');

$sql = "DELETE FROM cliente WHERE id=".$_GET['id'];
$res = mysqli_query($connection, $sql) or die(mysqli_error($connection));


if ($res) {

    $_SESSION['confirma'] = "Operação realizada com Sucesso!";
    header( "Location: ../template/Cliente.php" );
    exit();
} else {
    $_SESSION['confirma'] = "Erro! Não foi possível realizar a operação.";
}


?>

