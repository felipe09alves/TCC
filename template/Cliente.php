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
                            <a href="../index.html">
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
                                <a href="Irradiacao.html" class="list-group-item">Irradiação</a>
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
                                <a href="Abrir.html" class="list-group-item">Arbrir OS</a>
                                <a href="Monitorar.html" class="list-group-item">Monitorar OS</a>
                                <a href="BuscarOS.html" class="list-group-item">Pesquisar</a>
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
                                <a href="RelatorioAcompanhamento.html" class="list-group-item">Acompanhamento</a>
                                <a href="RelatorioVendas.html" class="list-group-item">Vendas</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="main">
            <h1 class="titulo">Consulta de Cliente</h1>

            <div class="row first-line">
                <div class="col-md-3" style="text-align: center">
                    <a href="CadastraCliente.php" role="button" class="btn btn-outline-primary">
                        <i class="fas fa-plus"></i>&nbsp;Novo Cliente
                    </a>
                </div>
                <div class="col-md-6" style="display: flex">
                    <input type="text" class="form-control" style="align-self: flex-end">
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
                            <th>Novo Orçamento</th>
                            <th>CPF</th>
                            <th>Nome</th>
                            <th>Telefone</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td style="text-align: center">
                                <button type="button" class="btn" onclick="window.location.href='NovoOrcamento.html' ">
                                    <i class="fas fa-plus-circle"></i>
                                </button>
                            </td>
                            <td>000.000.000-01</td>
                            <td>John</td>
                            <td>(99)9999-9999</td>
                            <td>
                                <button type="button" class="btn visualizar-btn" onclick="window.location.href='DetalhaCliente.php'">
                                    <span class="fas fa-eye"></span>
                                </button>
                                <button type="button" class="btn">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: center">
                                <button type="button" class="btn" onclick="window.location.href='NovoOrcamento.html' ">
                                    <i class="fas fa-plus-circle"></i>
                                </button>
                            </td>
                            <td>000.000.000-00</td>
                            <td>Mary</td>
                            <td>(99)9999-9999</td>
                            <td>
                                <button type="button" class="btn visualizar-btn" onclick="window.location.href='DetalhaCliente.php'">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button type="button" class="btn">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
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

</html>