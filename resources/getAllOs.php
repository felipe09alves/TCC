<?php
   
    require_once('connect.php');

    
        $case = "CASE  WHEN (OS.DATA_CONCLUSAO) IS NOT NULL THEN 'Concluida' ELSE 'Aberta' END";
        
        $sql = "SELECT OS.ID AS id_os, CLIENTE.NOME AS cliente, OS.DATA_ABERTURA AS data_abertura, SUM(ATIVIDADE.DURACAO) AS duracao, SUM(ATIVIDADE.DURACAO_REAL) AS duracao_real, OS.PRAZO AS prazo, $case FROM ATIVIDADE 
        JOIN OS ON ATIVIDADE.ID_OS = OS.ID
        JOIN CONTRATO ON OS.ID_CONTRATO = CONTRATO.ID 
        JOIN ORCAMENTO ON CONTRATO.ID_ORCAMENTO = ORCAMENTO.ID 
        JOIN CLIENTE ON ORCAMENTO.ID_CLIENTE = CLIENTE.ID 
        WHERE ATIVIDADE.DURACAO_REAL IS NOT NULL
        GROUP BY id_os ORDER BY data_abertura";
        // echo $sql;
        $res = mysqli_query($connection, $sql) or die(mysqli_error($connection));
        
        $i=0;
        while ($r = mysqli_fetch_assoc($res)) {
            $array['id_os'] = $r['id_os'];
            $array['i'] = $i;
            $array['cliente'] = $r['cliente'];
            $array['data_abertura'] = $r['data_abertura'];
            $array['prazo'] = $r['prazo'];
            $array['duracao'] = $r['duracao'];
            $array['duracao_real'] = $r['duracao_real'];
            $array['status'] = $r[$case];

            if (($r['duracao_real']) == null) {
                $array['condicao'] = "Não Iniciada";
            }else if ( $r['duracao'] > $r['duracao_real'] ) {
                $array['condicao'] = "Adiantado";
            } else if ( $r['duracao'] < $r['duracao_real'] ) {
                $array['condicao'] = "Atrasado";
            } else {
                $array['condicao'] = "No Prazo";
            }

            $i++;    
            
            echo '<tr>';
            echo '<td style="text-align: center">02</td>';
            echo '<td></td>';
            echo '<td></td>';
            echo '<td></td>';
            echo '<td></td>';
            echo '<td></td>';
            echo '<td></td>';
            echo '<td></td>';
            echo '<td></td>';


        }
       

    





