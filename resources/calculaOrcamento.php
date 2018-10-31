<meta charset="UTF-8">
<?php

    require('connect.php');
    $sql_orcamento = "SELECT * FROM orcamento where id = ".$id;
    $res_orcamento = mysqli_query($connection, $sql_orcamento) or die(mysqli_error($connection_orcamento));

    while ($r = mysqli_fetch_assoc($res_orcamento)) {
        $consumo = ($r['consumo']);
        $tarifa = ($r['tarifa']);
        $fase = ($r['fase']);
        $id_modulo = ($r['id_modulo']);
        $id_inversor =  ($r['id_inversor']);
        $frete =  ($r['frete']);
        $cliente =  ($r['id_cliente']);
        $data =  ($r['data']);
    }

    $modulo = buscaModulo($id_modulo, $connection);
    $inversor = buscaInversor($id_inversor, $connection);

    echo $modulo['peso']."<br>";
    echo $inversor['modelo']."<br>";
    echo $inversor['potencia']."<br><br>";

    //CONSTANTES
    $conversaoMonetaria = 4440;
    $maoObra = 0.5;
    $margemLiquida = 0.3;
    $imposto = 0.07;
    
    //ORÇAMENTO
    $irradiacaoMedia = irradiacaoMedia($cliente, $connection);
    $fatorConversao = fatorConversao($irradiacaoMedia);
    $consumoInicial = $fatorConversao * $consumo;
    $geracaoMensal = $modulo['potencia'] * $fatorConversao;
    $qtdModulos = ceil( $consumoInicial / $modulo['potencia'] );
    $espaco = $qtdModulos * $modulo['tamanho'];
    $peso = $espaco * $modulo['peso'];
    $capacidadeFinal = $qtdModulos * $modulo['potencia'] / 1000;
    $custoInicial = $capacidadeFinal * $conversaoMonetaria;
    $custoInstalacao = $capacidadeFinal * $maoObra;
    $margemOperacional = ( $custoInicial + $custoInstalacao ) * $margemLiquida;
    $custoFinal = ( $custoInicial + $custoInstalacao + $margemOperacional + $frete ) / ( 1 - $imposto );


    //PAYBACK





    // echo $capacidadeFinal;




    

    function irradiacaoMedia($cliente, $connection) {

        $sql_irradiacao = "SELECT irradiacao.indice FROM irradiacao JOIN cliente ON irradiacao.id_cidade = cliente.id_cidade WHERE cliente.id = '$cliente' AND irradiacao.id_cidade = cliente.id_cidade;";
        $res_irradiacao = mysqli_query($connection, $sql_irradiacao) or die(mysqli_error($connection_irradiacao));

        $total=0;

        while ($r_irradiacao = mysqli_fetch_assoc($res_irradiacao)) {                 
            $irradiacao = floatval ( $r_irradiacao['indice'] );
            $total += $irradiacao;
        }
        $media = $total/12;

        return $media;

    }

    function fatorConversao($irradiacaoMedia) {

        $perda = 0.05;
        $fator = $irradiacaoMedia * $perda * 0.03;
        return $fator;

    }

    function buscaModulo($id_modulo, $connection) {

        $sql_modulo = "SELECT * FROM modulo WHERE id='$id_modulo'";
        $res_modulo = mysqli_query($connection, $sql_modulo) or die(mysqli_error($connection_modulo));

        
        while ($r_modulo = mysqli_fetch_assoc($res_modulo)) {        
            $modulo = array(
                'marca' => $r_modulo['marca'], 
                'modelo' => $r_modulo['modelo'], 
                'potencia' => $r_modulo['potencia'],
                'tamanho' => $r_modulo['tamanho'],
                'peso' => $r_modulo['peso']
            );            
        }

        return $modulo;

    }

    function buscaInversor($id_inversor, $connection) {

        $sql_inversor = "SELECT * FROM inversor WHERE id='$id_inversor'";
        $res_inversor = mysqli_query($connection, $sql_inversor) or die(mysqli_error($connection_inversor));

        
        while ($r_inversor = mysqli_fetch_assoc($res_inversor)) {        
            $inversor = array(
                'marca' => $r_inversor['marca'], 
                'modelo' => $r_inversor['modelo'], 
                'potencia' => $r_inversor['potencia']
            );            
        }

        return $inversor;

    }
?>