<?php
    require_once('session.php');
    require('connect.php');

    if (isset($_POST) & !empty($_POST)) {
        $id_cliente = $_GET['id'];
        $consumo = ($_POST['consumo']);
        $tarifa = ($_POST['tarifa']);
        $fase = ($_POST['fase']);
        $id_modulo = ($_POST['modulo']);
        $id_inversor =  ($_POST['inversor']);
        $frete =  ($_POST['frete']);
    }
    
    $sql = "INSERT INTO orcamento (ID_CLIENTE, ID_MODULO, ID_INVERSOR, CONSUMO, TARIFA, fase, FRETE) VALUES ($id_cliente, $id_modulo, $id_inversor, $consumo, $tarifa, '$fase', $frete);";
    $res = mysqli_query($connection, $sql) or die(mysqli_error($connection));

    $id = mysqli_insert_id ($connection);

    if ($res) {        
        $_SESSION['confirma'] = "Operação realizada com Sucesso!";
        header( "Location: ../template/VisualizarOrcamento.php?id=".$id );        
        exit();
    } else {
        $_SESSION['confirma'] = "Erro! Não foi possível realizar a operação.";
    }


    

?>