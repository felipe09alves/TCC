<?php
   
    require_once('connect.php');

    if (isset($_POST) & !empty($_POST)) {
        if ($_POST['inicial']) {
            $inicial = ($_POST['inicial']);
            $inicial = date("Y-m-d", strtotime($inicial));
        } else {
            $inicial = "1900-01-01";
        }
        if ($_POST['final']) {
            $final = ($_POST['final']);
            $final = date("Y-m-d", strtotime($final));
        } else {
            $final = "3000-01-01";
        }
        $status = ($_POST['status']);
        $condicao = ($_POST['condicao']);  
    }

    
    // echo    $inicial."<br>";
    // echo    $final."<br>";
    // echo    $status."<br>" ;
    // echo    $condicao."<br>";

    $lista = listaOS($connection, $inicial, $final, $status, $condicao);
    
    echo json_encode($lista);



    function listaOS($connection, $inicial, $final, $status, $condicao) {

        $array=[];

        $where="";
        // Status
        if ($status == "concluidas") {
            $where .= " AND OS.DATA_CONCLUSAO IS NOT NULL";
        } else if ($status == "abertas") {
            $where .= " AND OS.DATA_CONCLUSAO IS NULL";
        }

        $having="";
        // Condicao
        if ($condicao == "adiantadas") {
            $having .= "HAVING SUM(ATIVIDADE.DURACAO) > SUM(ATIVIDADE.DURACAO_REAL)";
        } else if ($condicao == "atrasadas") {
            $having .= "HAVING SUM(ATIVIDADE.DURACAO) < SUM(ATIVIDADE.DURACAO_REAL)";
        }

        $case = "CASE  WHEN (OS.DATA_CONCLUSAO) IS NOT NULL THEN 'Concluida' ELSE 'Aberta' END";
        
        $sql = "SELECT OS.ID AS id_os, CLIENTE.NOME AS cliente, OS.DATA_ABERTURA AS data_abertura, SUM(ATIVIDADE.DURACAO) AS duracao, SUM(ATIVIDADE.DURACAO_REAL) AS duracao_real, OS.PRAZO AS prazo, $case FROM ATIVIDADE 
        JOIN OS ON ATIVIDADE.ID_OS = OS.ID
        JOIN CONTRATO ON OS.ID_CONTRATO = CONTRATO.ID 
        JOIN ORCAMENTO ON CONTRATO.ID_ORCAMENTO = ORCAMENTO.ID 
        JOIN CLIENTE ON ORCAMENTO.ID_CLIENTE = CLIENTE.ID 
        WHERE data_abertura BETWEEN '$inicial' AND '$final' AND ATIVIDADE.DURACAO_REAL IS NOT NULL$where
        GROUP BY id_os $having ORDER BY data_abertura";
        // echo $sql;
        $res = mysqli_query($connection, $sql) or die(mysqli_error($connection));
        
        $i=0;
        while ($r = mysqli_fetch_assoc($res)) {
            $array[$i]['id_os'] = $r['id_os'];
            $array[$i]['i'] = $i;
            $array[$i]['cliente'] = $r['cliente'];
            $array[$i]['data_abertura'] = $r['data_abertura'];
            $array[$i]['prazo'] = $r['prazo'];
            $array[$i]['duracao'] = $r['duracao'];
            $array[$i]['duracao_real'] = $r['duracao_real'];
            $array[$i]['status'] = $r[$case];

            if (($r['duracao_real']) == null) {
                $array[$i]['condicao'] = "Não Iniciada";
            }else if ( $r['duracao'] > $r['duracao_real'] ) {
                $array[$i]['condicao'] = "Adiantado";
            } else if ( $r['duracao'] < $r['duracao_real'] ) {
                $array[$i]['condicao'] = "Atrasado";
            } else {
                $array[$i]['condicao'] = "No Prazo";
            }

            $i++;            
        }

        return $array;        

    }





