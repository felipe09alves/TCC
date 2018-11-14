<?php 
    require_once('../resources/session.php');
    require('../resources/connect.php');

    function lista($connection) {

        $case = "CASE WHEN (OS.DATA_CONCLUSAO) IS NOT NULL THEN 'Concluida' ELSE 'Aberta' END";
        $sql = "SELECT OS.ID AS id_os, CONTRATO.ID AS id_contrato, CLIENTE.NOME AS nome, CLIENTE.CPF AS cpf, DATA_ABERTURA AS data_abertura,
                CASE WHEN (OS.DATA_CONCLUSAO) IS NOT NULL THEN 'Concluida' ELSE 'Aberta' END
                FROM OS 
                JOIN CONTRATO ON OS.ID_CONTRATO = CONTRATO.ID 
                JOIN ORCAMENTO ON CONTRATO.ID_ORCAMENTO = ORCAMENTO.ID 
                JOIN CLIENTE ON ORCAMENTO.ID_CLIENTE = CLIENTE.ID
                ORDER BY DATA_ABERTURA DESC;";
        $res = mysqli_query($connection, $sql) or die(mysqli_error($connection));
    
        while ($r = mysqli_fetch_assoc($res)) {
            echo '<tr>';
            echo     '<td class="text-center">'.$r['id_os'].'</td>';
            echo     '<td>'.date("d/M/Y", strtotime($r['data_abertura'])).'</td>';
            echo     '<td>'.$r[$case].'</td>';
            echo     '<td>'.$r['nome'].'</td>';
            echo     '<td>'.$r['cpf'].'</td>';
            echo     '<td><button onclick="redirect('.$r['id_contrato'].', '.$r['id_os'].')" role="button" class="btn visualizar-btn"><i class="fas fa-eye"></i></button></td>';
            echo '</tr>';
        }

    }


    function formataCPF($cpf) {
        $novo = substr_replace($cpf, '.', 3, 0);
        $novo = substr_replace($novo, '.', 7, 0);
        $novo = substr_replace($novo, '-', 11, 0);
        return $novo;
    }



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../static/css/bootstrap.min.css">
    <link href="../static/fontawesome/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../static/css/style.css">
</head>

<body>
    <div id="wrapper">
        <div class="sidenav">
            <div class="panel-group" id="accordion">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a href="../index.php">
                                <i class="fas fa-home"></i> &nbsp;Home</a>
                        </h4>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title ">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
                                <i class="fas fa-chevron-right"></i> &nbsp;Cadastros</a>
                        </h4>
                    </div>
                    <div id="collapse1" class="panel-collapse collapse in">
                        <div class="panel-body">
                            <div class="list-group">
                                <a href="Funcionario.html" class="list-group-item">Funcionário</a>
                                <a href="Modulo.html" class="list-group-item">Módulo</a>
                                <a href="Inversor.html" class="list-group-item">Inversor</a>
                                <a href="Irradiacao.php" class="list-group-item">Irradiação</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a href="Cliente.php">
                                <i class="fas fa-chevron-right"></i> &nbsp;Orçamento</a>
                        </h4>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">
                                <i class="fas fa-chevron-right"></i> &nbsp;Ordens de Serviço</a>
                        </h4>
                    </div>
                    <div id="collapse2" class="panel-collapse collapse">
                        <div class="panel-body">
                            <div class="list-group">
                                <a href="NovaOS.php" class="list-group-item">Abrir OS</a>
                                <!-- <a href="MonitorarOS.php" class="list-group-item">Monitorar OS</a> -->
                                <a href="BuscarOS.php" class="list-group-item">Pesquisar</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">
                                <i class="fas fa-chevron-right"></i> &nbsp;Relatórios</a>
                        </h4>
                    </div>
                    <div id="collapse3" class="panel-collapse collapse">
                        <div class="panel-body">
                            <div class="list-group">
                                <a href="RelatorioAcompanhamento.php" class="list-group-item">Acompanhamento</a>
                                <a href="RelatorioVendas.php" class="list-group-item">Vendas</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="main">
            <h1 class="titulo">Consulta de Ordem de Serviço</h1>

            <div class="row first-line">
                <div class="col-md-2" style="text-align: center"></div>
                <div class="col-md-7" style="display: flex">
                    <input type="text" class="form-control" style="align-self: flex-end" placeholder="Cliente">
                </div>
                <div class="col-md-3">
                    <button type="button" role="button" class="btn btn-outline-secondary">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>
            <div class="table tabela-exibe" align="center">
                <table class="table-hover table-responsive">
                    <thead>
                        <tr>
                            <th>Número</th>
                            <th>Abertura</th>
                            <th>Status</th>
                            <th>Cliente</th>
                            <th>CPF</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php lista($connection); ?>                        
                    </tbody>
                </table>

            </div>

        </div>

    </div>

    </div>


</body>
<script src="../static/js/jquery.min.js"></script>
<script src="../static/js/bootstrap.min.js"></script>
<script src="../static/fontawesome/js/all.min.js"></script>

<script>
function redirect(id_contrato, id_os) {
    location.href='./MonitorarOS.php?id_contrato='+ id_contrato +'&id_os='+ id_os;
}
</script>

</html>