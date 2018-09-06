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
                            <a href="Cliente.html">
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
            <h1 class="titulo">Cadastro de Cliente</h1>

            <div class="row">
                <div class="col-md-1"></div>
                <div class="form-group col-md-6">
                    <label for="nome">Nome:</label>
                    <input type="text" class="form-control" id="nome" placeholder="Nome">
                </div>
                <div class="form-group col-md-3">
                    <label for="cpf">CPF:</label>
                    <input type="text" class="form-control" id="cpf" placeholder="000.000.000-00">
                </div>
            </div>

            <div class="row">
                <div class="col-md-1"></div>
                <div class="form-group col-md-6">
                    <label for="email">e-mail:</label>
                    <input type="text" class="form-control" id="email" placeholder="e-mail">
                </div>
                <div class="form-group col-md-3">
                    <label for="fone">Telefone:</label>
                    <input type="text" class="form-control" id="fone" placeholder="(xx) xxxx-xxxx">
                </div>
            </div>

            <div class="row">
                <div class="col-md-1"></div>
                <div class="form-group col-md-2">
                    <label for="uf">Estado:</label>
                    <select type="text" class="form-control" id="uf" placeholder="UF">
                        <option disabled selected>UF</option>
                        <option value="">DF</option>
                        <option value="">MG</option>
                    </select>
                </div>
                <div class="form-group col-md-7">
                    <label for="cidade">Cidade:</label>
                    <input type="text" class="form-control" id="cidade" placeholder="Cidade">
                </div>
            </div>

            <div class="row">
                <div class="col-md-1"></div>
                <div class="form-group col-md-9">
                    <label for="endereco">Endereço:</label>
                    <input type="text" class="form-control" id="endereco" placeholder="Endereço">
                </div>
            </div>

            <div class="row">
                <div class="col-md-1"></div>
                <div class="form-group col-md-9">
                    <label for="imovel">Imóvel:</label>
                    <select type="text" class="form-control" id="imovel">
                        <option disabled selected>Tipo</option>
                        <option value="">Comercial</option>
                        <option value="">Residencial</option>
                        <option value="">Rural</option>
                    </select>
                </div>
            </div>
        </div>

    </div>

    </div>


</body>

<script src="../static/js/jquery.min.js"></script>
<script src="../static/js/bootstrap.min.js"></script>
<script src="../static/fontawesome/js/all.min.js"></script>

</html>