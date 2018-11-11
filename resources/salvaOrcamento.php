<?php
    require_once('session.php');
    require('connect.php');
    
    if (isset($_COOKIE) & !empty($_COOKIE)) {
        $consumo = 0;
        $consumo = $_COOKIE["consumo"];
        $tarifa = $_COOKIE["tarifa"];
        $fase = $_COOKIE["fase"];
        $id_modulo = $_COOKIE["id_modulo"];
        $id_inversor = $_COOKIE["id_inversor"];
        $frete = $_COOKIE["frete"];
        $id_cliente = $_COOKIE["cliente"];
    }


    $sql = "INSERT INTO orcamento (ID_CLIENTE, ID_MODULO, ID_INVERSOR, CONSUMO, TARIFA, fase, FRETE) VALUES ($id_cliente, $id_modulo, $id_inversor, $consumo, $tarifa, '$fase', $frete);";
    $res = mysqli_query($connection, $sql) or die(mysqli_error($connection));

    $id = mysqli_insert_id ($connection);

    setcookie("id_orcamento", $id, (time() + 86400), "/");
    
    // if ($res) {        
    //     $_SESSION['confirmaOrcamento'] = "Operação realizada com Sucesso!";
    //     header( "Location: ../template/VisualizarOrcamento.php?id=".$id );        
    //     exit();
    // } else {
    //     $_SESSION['confirmaOrcamento'] = "Erro! Não foi possível realizar a operação.";
    // }

    if ($res) {
        $_SESSION['confirmaOrcamento'] = "Operação realizada com Sucesso!";
        if ($_GET['ajax']){
            echo "Operação realizada com Sucesso!";
        } else {
            header( "Location: ../template/Contrato.php?id=".$id );
        }
        exit();
    } else {
        $_SESSION['confirmaOrcamento'] = "Erro! Não foi possível realizar a operação.";
         if ($_GET['ajax']){            
            echo "Erro! Não foi possível realizar a operação.";
        }
    }
    


    

?>