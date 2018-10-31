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
                                <a href="AbrirOS.php" class="list-group-item">Abrir OS</a>
                                <a href="MonitorarOS.php" class="list-group-item">Monitorar OS</a>
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

        <form method="post" action="../resources/salvaOrcamento.php?id=<?php echo $_GET['id']; ?>" class="main">
            <h1 class="titulo">Novo Orçamento</h1>           
            
            <div id="cliente-main" class="row" style="display: flex; justify-content: center;">
            
                <div class="col-lg-4">
                    <div class="card card-body card-cliente">
                        <?php require_once('../resources/exibeClientes.php');
                        detalha(); ?>
                    </div>                    
                </div>
                <div class="col-lg-7">

                    <div class="row">
                        <div class="col-md-1"></div>
                        <div class="form-group col-md-5">
                            <label for="consumo">Consumo anual:</label><span class="text-danger"></span>
                            <input type="number" class="form-control campo" name="consumo" placeholder="R$ 00,00" value="">
                        </div>
                        <div class="form-group col-md-5">
                            <label for="tarifa">Tarifa:</label><span class="text-danger"></span>
                            <input type="number" class="form-control campo" name="tarifa" placeholder="R$ 00,00">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-1"></div>
                        <div class="form-group col-md-5">
                            <label for="fase">Tipo de Fase:</label><span class="text-danger"></span>
                            <select type="text" class="form-control campo" name="fase" placeholder="Fase">
                                <option disabled selected>Fase</option>
                                <option value="monofase">Monofase</option>
                                <option value="bifase">Bifase</option>
                                <option value="trifase">Trifase</option>
                            </select>
                        </div>
                        <div class="form-group col-md-5">
                            <label for="modulo">Módulo:</label><span class="text-danger"></span>
                            <select type="text" class="form-control campo" name="modulo" placeholder="Módulo">
                                <option disabled selected>Módulo</option>
                                <?php require('../resources/exibeModulo.php'); ?>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-1"></div>
                        <div class="form-group col-md-5">
                            <label for="inversor">Inversor:</label><span class="text-danger"></span>
                            <select type="text" class="form-control campo" name="inversor" placeholder="Inversor">
                                <option disabled selected>Inversor</option>
                                <?php require('../resources/exibeInversor.php'); ?>
                            </select>
                        </div>
                        <div class="form-group col-md-5">
                            <label for="frete">Frete:</label><span class="text-danger"></span>
                            <input type="number" class="form-control campo" name="frete" placeholder="R$ 00,00">
                        </div>
                    </div>

                    
                </div>
                <div class="row controle">
                    
                    <div class="col-md-3">
                        <button id="" onclick="location.href='DetalhaCliente.php?id=<?php echo $_GET['id']; ?>'" role="button" class="btn btn-outline-secondary btn-sm">
                            <i class="fas fa-chevron-left"></i>&nbsp;Voltar
                        </button>
                    </div>
                    <div class="col-md-3">
                        <button id="" onclick="location.href='Cliente.php'" role="button" class="btn btn-outline-danger btn-sm">
                            <i class="fas fa-times"></i>&nbsp;Cancelar
                        </button>  
                    </div>
                    <div class="col-md-1"></div>
                    <div class="col-md-3" style="text-align: right">
                        <button id="cadastrar" href="" type="submit" role="button" class="btn btn-outline-primary">
                            <i class="fas fa-plus"></i>&nbsp;Gerar Orçamento
                        </button>
                    </div>

                </div>
            </div>
        </form>

    </div>

</body>

<script src="../static/js/jquery.min.js"></script>
<script src="../static/js/bootstrap.min.js"></script>
<script src="../static/fontawesome/js/all.min.js"></script>

<script> /* VALIDA AO DIGITAR  */
    $('.campo').on('keyup', function() {
                
        if ( !$(this).val() ) {            
            $(this).prev().text(" * Campo obrigatório").show();
        }else {

            if ( $(this).val() < 0 ) {
                $(this).prev().text(" * Valor Inválido").show();
            } else {
                $(this).prev().hide();
            }

        }
      
    });
</script>

<script> /* VALIDA NO SUBMIT */
    $( "form" ).submit(function( event ) {

        $(".campo").each(function() {
            
            if ( !$(this).val() ) {
                $(this).prev().text(" * Campo obrigatório").show();
                event.preventDefault();
            } else {
                if ( $(this).val() < 0 ) {
                    $(this).prev().text(" * Valor Inválido").show();
                    event.preventDefault();
                } 
            }
            
        });

    });
</script>

</html>