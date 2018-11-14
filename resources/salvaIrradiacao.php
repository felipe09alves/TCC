<meta charset="UTF-8">
<?php

    require_once('session.php');
    require('connect.php');

    $cidade = $_GET['cidade'];

    $sql = "SELECT * FROM irradiacao WHERE id_cidade = $cidade";
    $res = mysqli_query($connection, $sql) or die(mysqli_error($connection));

    if (mysqli_num_rows($res)!=0){
        $check = 0;
    }else {
        $check = 1;
    }    

    if (isset($_POST) & !empty($_POST)) {
        $indice[0]['jan'] = $_POST['jan'];
        $indice[1]['fev'] = $_POST['fev'];
        $indice[2]['mar'] = $_POST['mar'];
        $indice[3]['abr'] = $_POST['abr'];
        $indice[4]['mai'] = $_POST['mai'];
        $indice[5]['jun'] = $_POST['jun'];
        $indice[6]['jul'] = $_POST['jul'];
        $indice[7]['ago'] = $_POST['ago'];
        $indice[8]['set'] = $_POST['set'];
        $indice[9]['out'] = $_POST['out'];
        $indice[10]['nov'] = $_POST['nov'];
        $indice[11]['dez'] = $_POST['dez'];     
    }
   

    foreach( $indice as $i => $novo ){
        foreach( $novo as $mes => $indice ){   
            if ($check==1) {
                $sql = "INSERT INTO irradiacao (ID_CIDADE, MES, INDICE) VALUES ($cidade, '$mes', $indice);";
                $res = mysqli_query($connection, $sql) or die(mysqli_error($connection));
            } else {
                $sql = "UPDATE irradiacao SET INDICE = $indice WHERE ID_CIDADE = $cidade AND MES = '$mes';";
                $res = mysqli_query($connection, $sql) or die(mysqli_error($connection));
            }
        }
    }

    if ($res) {                
        $_SESSION['confirma_irradiacao'] = "Operação realizada com Sucesso!";
        header( "Location: ../template/Irradiacao.php");
        exit();
    } else {
        $_SESSION['confirma_irradiacao'] = "Erro! Não foi possível realizar a operação.";
    }


?>