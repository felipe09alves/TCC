<?php 
    require_once('../resources/session.php');
    require('../resources/connect.php');

    $contrato = $_GET['id_contrato'];
    if (isset($_POST) & !empty($_POST)) {
        $eletricistas = ($_POST['eletricistas']);
        $atividade = ($_POST['atividade']);
        $duracao = ($_POST['duracao']);
        $abertura = ($_POST['abertura']);
        $previsao = ($_POST['previsao']);
    }
    
    $abertura = date("Y-m-d", strtotime($abertura));
    $previsao = date("Y-m-d", strtotime($previsao));
    
    $duracaoTotal = 0;

    for ($i = 0; $i <= count($duracao)-1; $i++) {
        $duracaoTotal += $duracao[$i];
    }

    $sql_OS = "INSERT INTO OS (ID_CONTRATO, DATA_ABERTURA, PRAZO, ELETRICISTAS) VALUES ($contrato, '$abertura', $duracaoTotal, '$eletricistas');";
    $res_OS = mysqli_query($connection, $sql_OS) or die(mysqli_error($connection));
    $os = mysqli_insert_id ($connection);

    for ($i = 0; $i <= count($atividade)-1; $i++) {        
        
        $duracaoAtual = $duracao[$i];
        $atividadeAtual = $atividade[$i];

        $sql_Atividades = "INSERT INTO ATIVIDADE (ID_OS, DESCRICAO, DURACAO, SITUACAO) VALUES ('$os', '$atividadeAtual', '$duracaoAtual', '0');";
        $res_Atividades = mysqli_query($connection, $sql_Atividades) or die(mysqli_error($connection));

    }


    if ($res_OS && $res_Atividades) {
        $sql = "SELECT id FROM cliente WHERE CPF='".$cpf."'";
        $res = mysqli_query($connection, $sql) or die(mysqli_error($connection));
        $r = mysqli_fetch_assoc($res);
        
        $_SESSION['confirma'] = "Operação realizada com Sucesso!";
        header( "Location: ../template/BuscarOS.php" );
        exit();
    } else {
        $_SESSION['confirma'] = "Erro! Não foi possível realizar a operação.";
    }
    


    