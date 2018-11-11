<?php
   
    require_once('connect.php');

    if (isset($_POST) & !empty($_POST)) {
        $inicial = ($_POST['inicial']);
        $final = ($_POST['final']);
        $uf = ($_POST['uf']);
        $cidade = ($_POST['cidade']);
        $imovel = ($_POST['imovel']);       
    }

    $inicial = date("Y-m-d", strtotime($inicial));
    $final = date("Y-m-d", strtotime($final));

    $dateInicial = new DateTime($inicial);
    $dateFinal = new DateTime($final);

    $interval = $dateInicial->diff($dateFinal);
    $diff = $interval->format('%a');

    $novaInicial = date("Y-m-d", strtotime($inicial."-$diff days"));
    $novaFinal = date("Y-m-d", strtotime($final."-$diff days"));
            
    $rRegiao['atual'] = getDataRegiao ( $connection, $inicial, $final );
    $rRegiao['anterior'] = getDataRegiao ( $connection, $novaInicial, $novaFinal );
    $regiao = getRegiao($rRegiao);

    if (count($regiao['maior']) > 1) {

        $res['maior'] = getCurva( $connection, $novaInicial, $final, $regiao['maior']['cidade']);
        $res['maiorRegiao']['estado'] = $regiao['maior']['estado'];
        $res['maiorRegiao']['cidade'] = getCidade( $connection, $regiao['maior']['cidade'] );

    }else {

        $res['maior'] = null;
        $res['maiorRegiao'] = null;
    }

    if (count($regiao['menor']) > 1) {

        $res['menor'] = getCurva( $connection, $novaInicial, $final, $regiao['menor']['cidade']);
        $res['menorRegiao']['estado'] = $regiao['menor']['estado'];
        $res['menorRegiao']['cidade'] = getCidade( $connection, $regiao['menor']['cidade'] );

    }else {

        $res['menor'] = null;
        $res['menorRegiao'] = null;

    }

    // echo json_encode($res);

    $r['atual'] = getData ( $connection, $inicial, $final, $uf, $cidade, $imovel );
    // $r['anterior'] = getData ( $connection, $novaInicial, $novaFinal, $uf, $cidade, $imovel );

    $res['total'] = 0;
    // $r['totalAnterior'] = 0;

    for ($i = 0; $i < ( count($r['atual']) ); $i++) {
        $res['total'] += $r['atual'][$i]['vendas'];
    }

    // for ($i = 0; $i < ( count($r['anterior']) ); $i++) {
    //     $r['totalAnterior'] += $r['anterior'][$i]['vendas'];
    // }

    $json = json_encode($res);
    echo $json;



    function getData( $connection, $inicial, $final, $uf, $cidade, $imovel ) {

        $array=[];

        $where="";
        // Estado
        if ($uf && $uf != "todos") {
            $where .= " AND CLIENTE.ID_ESTADO='$uf'";

            // Cidade
            if ($cidade && $cidade !== "") {
                $where .= " AND LOWER(CIDADE.NOME) LIKE LOWER(_utf8'$cidade') collate utf8_general_ci";
            }

        }

        // Imovel
        if ($imovel && $imovel !== "todos") {
            $where .= " AND LOWER(CLIENTE.IMOVEL) LIKE(LOWER('$imovel'))";
        }
        
        $sql = "SELECT OS.DATA_ABERTURA AS abertura , COUNT(OS.ID) AS vendas FROM OS 
        JOIN CONTRATO ON OS.ID_CONTRATO = CONTRATO.ID 
        JOIN orcamento ON CONTRATO.ID_ORCAMENTO = ORCAMENTO.ID 
        JOIN CLIENTE ON ORCAMENTO.ID_CLIENTE = CLIENTE.ID 
        JOIN CIDADE ON CLIENTE.ID_CIDADE = CIDADE.ID
        WHERE data_abertura BETWEEN '$inicial' AND '$final'$where
        GROUP BY OS.DATA_ABERTURA ORDER BY OS.DATA_ABERTURA";
        // echo $sql."
        // ";
        $res = mysqli_query($connection, $sql) or die(mysqli_error($connection));

        // $array['data']=0;
        // $array['vendas']=0;
        $i=0;

        while ($r = mysqli_fetch_assoc($res)) {
            $array[$i]['data'] = $r['abertura'];
            $array[$i]['vendas'] = $r['vendas'];
            $i++;            
        }

        return $array;        

    }

    function getDataRegiao( $connection, $inicial, $final) {

        $array=[];
        
        $sql = "SELECT CIDADE.ID AS cidade, COUNT(OS.ID) AS vendas, ESTADO.SIGLA AS estado FROM OS 
        JOIN CONTRATO ON OS.ID_CONTRATO = CONTRATO.ID 
        JOIN ORCAMENTO ON CONTRATO.ID_ORCAMENTO = ORCAMENTO.ID 
        JOIN CLIENTE ON ORCAMENTO.ID_CLIENTE = CLIENTE.ID 
        JOIN CIDADE ON CLIENTE.ID_CIDADE = CIDADE.ID
        JOIN ESTADO ON CIDADE.ID_ESTADO = ESTADO.ID
        WHERE DATA_ABERTURA BETWEEN '$inicial' AND '$final' 
        GROUP BY CIDADE ORDER BY VENDAS DESC";
        // echo $sql."
        // ";
        $res = mysqli_query($connection, $sql) or die(mysqli_error($connection));

        // $array['data']=0;
        // $array['vendas']=0;
        $i=0;

        while ($r = mysqli_fetch_assoc($res)) {
            $array[$i]['cidade'] = $r['cidade'];
            $array[$i]['vendas'] = $r['vendas'];
            $array[$i]['estado'] = $r['estado'];
            $i++;            
        }

        return $array;        

    }

    function getRegiao ($r) {

        $array=[];
        $array['maior']['valor'] = 0;
        $array['menor']['valor'] = 0;
        
        for ($i = 0; $i < ( count($r['atual']) ); $i++) {
            $cidadeAtual = $r['atual'][$i]['cidade'];
            $vendasAtual = $r['atual'][$i]['vendas'];

            for ($j = 0; $j < ( count($r['anterior']) ); $j++) {
                if ( $cidadeAtual == $r['anterior'][$j]['cidade'] ) {

                    $diferenca = $vendasAtual - $r['anterior'][$j]['vendas'];

                    if ( $diferenca >= 0 && $diferenca > $array['maior']['valor']  ) {

                        $array['maior']['valor'] = $diferenca;
                        $array['maior']['cidade'] = $cidadeAtual;
                        $array['maior']['estado'] = $r['atual'][$i]['estado'];

                    }else if ( $diferenca <= 0 && $diferenca < $array['menor']['valor'] ) {

                        $array['menor']['valor'] = $diferenca;
                        $array['menor']['cidade'] = $cidadeAtual;
                        $array['menor']['estado'] = $r['atual'][$i]['estado'];

                    }

                }
            }
            
        }

        return $array;        

    }

    function getCidade ($connection, $id_cidade) {
        
        $sql = "SELECT nome FROM CIDADE WHERE ID='$id_cidade'";
        $res = mysqli_query($connection, $sql) or die(mysqli_error($connection));
        

        while ($r = mysqli_fetch_assoc($res)) {
            $cidade = $r['nome'];
        }

        return $cidade;

    }

    function getCurva( $connection, $inicial, $final, $cidade) {

        $array=[];
        
        $sql = "SELECT OS.DATA_ABERTURA AS abertura , COUNT(OS.ID) AS vendas, CIDADE.NOME AS cidade FROM OS 
        JOIN CONTRATO ON OS.ID_CONTRATO = CONTRATO.ID 
        JOIN orcamento ON CONTRATO.ID_ORCAMENTO = ORCAMENTO.ID 
        JOIN CLIENTE ON ORCAMENTO.ID_CLIENTE = CLIENTE.ID 
        JOIN CIDADE ON CLIENTE.ID_CIDADE = CIDADE.ID
        WHERE data_abertura BETWEEN '$inicial' AND '$final' AND CIDADE.ID = '$cidade'
        GROUP BY OS.DATA_ABERTURA ORDER BY OS.DATA_ABERTURA";
        
        $res = mysqli_query($connection, $sql) or die(mysqli_error($connection));
        
        $i=0;

        while ($r = mysqli_fetch_assoc($res)) {
            // $array['cidade'] = $r['cidade'];
            // $array['estado'] = $r['estado'];
            $array[$i]['data'] = $r['abertura'];
            $array[$i]['vendas'] = $r['vendas'];
            $i++;
        }

        return $array;

    }







