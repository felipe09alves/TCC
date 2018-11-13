<?php 
    require_once('../resources/session.php');
    require('../resources/connect.php');

    $id_os = $_GET['id_os'];
    if (isset($_POST) & !empty($_POST)) {
        $previsao = ($_POST['previsao']);
        $check = ($_POST['check']);
        if (isset($_POST['justificativa'])) {
            $justificativa = ($_POST['justificativa']);
        }
        $duracao_real = ($_POST['duracao_real']);        
        $size =  count($_POST['check']);
    }
    
    $key = key($check);
    $data = str_replace('/', '-', $previsao);
    $conclusao = date("Y-m-d", strtotime($data));
    $status=false;

    for ($i = $key; $i < $size + $key; $i++) {
        
        if ( isset($_POST['justificativa']) && !array_key_exists( $i, $justificativa ) ) {            
            $sql = "UPDATE ATIVIDADE SET DURACAO_REAL = ".$duracao_real[$i].", SITUACAO = '1' WHERE ID='$i' AND SITUACAO IS NOT TRUE;" ;
        } else {
            $sql = "UPDATE ATIVIDADE SET DURACAO_REAL = ".$duracao_real[$i].", JUSTIFICATIVA = '".$justificativa[$i]."', SITUACAO = '1' WHERE ID='$i'AND SITUACAO IS NOT TRUE;" ;
        }

        $res = mysqli_query($connection, $sql) or die(mysqli_error($connection));

        if ( $check[$i] != "checked" ) {
            $status=true;
        }
        
    }

    $checksql = "SELECT * FROM ATIVIDADE WHERE ID_OS = '$id_os' AND SITUACAO = 0";
    $checkres = mysqli_query($connection, $checksql) or die(mysqli_error($connection));

    
    if (!mysqli_num_rows($checkres)) {
        echo 
        updateOS( $connection, $id_os, $conclusao );
    }

    // if ( $status == true ) {
        
    // }


    if ($res) {
        $_SESSION['confirma_os'] = "Operação realizada com Sucesso!";
        header( "Location: ../template/BuscarOS.php" );
        exit();
    } else {
        $_SESSION['confirma_os'] = "Erro! Não foi possível realizar a operação.";         
        echo "Erro! Não foi possível realizar a operação.";       
    }




    function updateOS( $connection, $id_os, $conclusao ) {
        $sql = "UPDATE OS SET DATA_CONCLUSAO = '$conclusao' WHERE ID='$id_os';";
        $res = mysqli_query($connection, $sql) or die(mysqli_error($connection));        
    }


    


    