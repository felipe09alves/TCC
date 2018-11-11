<?php
    require_once('session.php');
    require('connect.php');

    
    // if ($_GET['ajax']){

        $id_orcamento = $_GET['id_orcamento'];
        
        $sql = "INSERT INTO contrato (id_orcamento) VALUES ($id_orcamento);";
        $res = mysqli_query($connection, $sql) or die(mysqli_error($connection));
        
        $id = mysqli_insert_id ($connection);
        setcookie("id_contrato", $id, (time() + 86400), "/");

    // }

    if ($res) {
        $_SESSION['confirmaOrcamento'] = "Operação realizada com Sucesso!";
        if ($_GET['ajax']){
            echo "Operação realizada com Sucesso!";
        } else {
            header( "Location: ../template/AbrirOS.php?id_contrato=".$id );
        }
        exit();
    } else {
        $_SESSION['confirmaOrcamento'] = "Erro! Não foi possível realizar a operação.";
         if ($_GET['ajax']){            
            echo "Erro! Não foi possível realizar a operação.";
        }
    }


    

?>