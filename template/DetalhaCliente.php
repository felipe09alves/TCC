<?php require_once('../resources/session.php'); ?>
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
            <h1 class="titulo">Detalhamento de Cliente</h1>

            <div id="cliente-main" class="row">
                <!-- <div class="col-lg-1"></div> -->
                <div class="col-lg-6">
                    <div class="card card-body card-cliente">
                        <?php require_once('../resources/exibeClientes.php');
                        detalha(); ?>
                    </div>
                    <div style="text-align: left; padding-top: 15px">
                        
                        <?php checkIrradiacao($_GET['id']);?>
                        
                        <button onclick="window.location.href='NovoOrcamento.php?id=<?php echo $_GET['id']; ?>'" id="novo-orcamento" role="button" class="btn btn-outline-primary">
                            <i class="fas fa-plus"></i>&nbsp;Novo Orçamento
                        </button>
                        <button type="button" class="btn visualizar-btn" onclick="window.location.href='AlteraCliente.php?id=<?php #echo $_GET['id']; ?>'">
                            <span class="fas fa-pen"></span>
                        </button>                        
                        <button type="button" id="deletar" class="btn">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>
                </div>
                <div class="col-lg-6">

                    <h4>Orçamentos</h4>
                    <div class="table tabela-cliente">
                        <table class="table-hover" style="text-align: center">
                            <thead>
                                <tr>
                                    <th>Data</th>
                                    <th>Código</th>
                                    <th>Valor</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>23/03/18</td>
                                    <td>0001</td>
                                    <td>R$ 67.350,00</td>
                                    <td>
                                        <button type="button" class="btn visualizar-btn" onclick="window.location.href=''">
                                            <span class="fas fa-eye"></span>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>07/08/18</td>
                                    <td>0002</td>
                                    <td>R$ 32.000,00</td>
                                    <td>
                                        <button type="button" class="btn visualizar-btn" onclick="window.location.href=''">
                                            <span class="fas fa-eye"></span>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>07/08/18</td>
                                    <td>0002</td>
                                    <td>R$ 32.000,00</td>
                                    <td>
                                        <button type="button" class="btn visualizar-btn" onclick="window.location.href=''">
                                            <span class="fas fa-eye"></span>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>07/08/18</td>
                                    <td>0002</td>
                                    <td>R$ 32.000,00</td>
                                    <td>
                                        <button type="button" class="btn visualizar-btn" onclick="window.location.href=''">
                                            <span class="fas fa-eye"></span>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                    </div>

                    <h4>Ordens de Serviço</h4>
                    <div class="table tabela-cliente">
                        <table class="table-hover" style="text-align: center">
                            <thead>
                                <tr>
                                    <th>Data</th>
                                    <th>Código</th>
                                    <th>Valor</th>
                                    <th>Contrato</th>
                                    <th>Orçamento</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>23/03/18</td>
                                    <td>0001</td>
                                    <td>R$ 67.350,00</td>
                                    <td>
                                        <button type="button" class="btn visualizar-btn" onclick="window.location.href=''">
                                            <span class="fas fa-briefcase"></span>
                                        </button>
                                    </td>
                                    <td>
                                        <button type="button" class="btn visualizar-btn" onclick="window.location.href=''">
                                            <span class="fas fa-file-alt"></span>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>07/08/18</td>
                                    <td>0002</td>
                                    <td>R$ 32.000,00</td>
                                    <td>
                                        <button type="button" class="btn visualizar-btn" onclick="window.location.href=''">
                                            <span class="fas fa-briefcase"></span>
                                        </button>
                                    </td>
                                    <td>
                                        <button type="button" class="btn visualizar-btn" onclick="window.location.href=''">
                                            <span class="fas fa-file-alt"></span>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>07/08/18</td>
                                    <td>0002</td>
                                    <td>R$ 32.000,00</td>
                                    <td>
                                        <button type="button" class="btn visualizar-btn" onclick="window.location.href=''">
                                            <span class="fas fa-briefcase"></span>
                                        </button>
                                    </td>
                                    <td>
                                        <button type="button" class="btn visualizar-btn" onclick="window.location.href=''">
                                            <span class="fas fa-file-alt"></span>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>07/08/18</td>
                                    <td>0002</td>
                                    <td>R$ 32.000,00</td>
                                    <td>
                                        <button type="button" class="btn visualizar-btn" onclick="window.location.href=''">
                                            <span class="fas fa-briefcase"></span>
                                        </button>
                                    </td>
                                    <td>
                                        <button type="button" class="btn visualizar-btn" onclick="window.location.href=''">
                                            <span class="fas fa-file-alt"></span>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                    </div>

                </div>
            </div>
        </div>

    </div>

    </div>


</body>
<script src="../static/js/jquery.min.js"></script>
<script src="../static/js/bootstrap.min.js"></script>
<script src="../static/fontawesome/js/all.min.js"></script>

<script>

    var msg = "<?php
        if ( isset($_SESSION['confirma_cliente']) ) {
             echo $_SESSION['confirma_cliente'];
        }   
    ?>";

    if (msg) {
        alert(msg);
    }

    <?php unset($_SESSION['confirma_cliente']); ?>

</script>

<script>
    $(document).ready(function() {
        naoEncontrado = document.getElementById("nao-cadastrado");
        if(naoEncontrado) {
            $("#novo-orcamento").prop('disabled', true);
        }
    });
</script>

<script>
    $("#deletar").click(function() {
        confirma = confirm("Press a button!");
        if (confirma ===true) {
            window.location.href='../resources/deletaCliente.php?id=<?php echo $_GET['id']; ?>';
        }
    });
</script>

</html>