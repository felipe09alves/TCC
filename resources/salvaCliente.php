<?php
    require_once('session.php');
    require('connect.php');

    if (isset($_POST) & !empty($_POST)) {
        $nome = ($_POST['nome']);
        $cpf = ($_POST['cpf']);
        $email = ($_POST['email']);
        $telefone = ($_POST['telefone']);
        $uf =  ($_POST['uf']);
        $cidade =  ($_POST['cidade']);
        $endereco =  ($_POST['endereco']);
        $imovel =  ($_POST['imovel']);
    }

    $cidade = converteCidade($cidade, $uf);

    $sql = "UPDATE cliente SET CPF = '$cpf', NOME = '$nome', EMAIL = '$email', TELEFONE = '$telefone', ID_ESTADO = '$uf', ID_CIDADE = '$cidade', ENDERECO = '$endereco', IMOVEL =  '$imovel' WHERE CPF=".$cpf;
    $res = mysqli_query($connection, $sql) or die(mysqli_error($connection));

    if ($res) {
        $sql = "SELECT id FROM cliente WHERE CPF='".$cpf."'";
        $res = mysqli_query($connection, $sql) or die(mysqli_error($connection));
        $r = mysqli_fetch_assoc($res);
        
        $_SESSION['confirma'] = "Operação realizada com Sucesso!";
        header( "Location: ../template/DetalhaCliente.php?id=".$r['id'] );
        
        exit();
    } else {
        $_SESSION['confirma'] = "Erro! Não foi possível realizar a operação.";
    }


    function converteCidade($cidade, $uf) {
        require('connect.php');
        $sql = "SELECT id, nome FROM cidade WHERE lower(nome) LIKE lower(_utf8'$cidade') collate utf8_general_ci;";
        $res = mysqli_query($connection, $sql) or die(mysqli_error($connection));
        $r = mysqli_fetch_assoc($res);

        if ($r) {
            return $r['id'];
        } else {
            $sql = "INSERT INTO cidade (id_estado, nome) VALUES ('$uf', '$cidade')";
            $res = mysqli_query($connection, $sql) or die(mysqli_error($connection));

            $sql = "SELECT id FROM cidade WHERE nome='".$cidade."';";
            $res = mysqli_query($connection, $sql) or die(mysqli_error($connection));
            $novo = mysqli_fetch_assoc($res);
            return $novo['id'];
        }
    }

?>