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
                                <a href="AbrirOS.php" class="list-group-item">Arbrir OS</a>
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

        <form method="post" action="Contrato.php" class="main">
            <h1 class="titulo">Visualizar Orçamento</h1>           
            
            <div id="cliente-main" class="row" style="display: flex; justify-content: center;">
            
                <div class="col-lg-4">
                    <!-- <h4>&nbsp;</h4> -->
                    <div class="card card-body card-cliente">                        
                        <h4>nome</h4>
                        <span>12315654987</span>
                        <span>email@email.com</span>
                        <span>6181818181</span>
                        <span>Minas Gerais</span>
                        <span>Água Doce do Norte</span>
                        <span>qwe</span>
                        <span>rural</span>
                    </div>
                    <div style="text-align: left; padding-top: 15px">

                    </div>
                </div>
                <div class="col-lg-5">
                    <h4>Informações do Sistema</h4>
                    <div class="card card-body card-cliente">
                        <span>Quantidade de móduloas: 32</span>
                        <span>Espaço necessário: 51m²</span>
                        <span>Peso por m²: 10;5 kg/m²</span>
                        <span>Capacidade do Sistema: 8,3 kWp</span>
                        <span>Módulo: Canadian CS6U-315B 260 Wp &nbsp;&nbsp;&nbsp; Qtd: 12</span>
                        <span>Inversor: Fronius 4210069 kW</span>
                    </div>
                    <div style="text-align: left; padding-top: 15px">

                    <h4>Economia</h4>
                    <div class="card card-body card-cliente">
                        <span>Produção Anual do Sistema: 14.178 kWh</span>
                        <span>Economia Anual: R$ 11.000,00</span>
                        <span>Fator de Independência: 80%</span>
                        <h5>Payback: 10 anos</h5>
                    </div>
                    </div>
                </div>
                
                <div class="col-lg-3">
                    <h4>&nbsp;</h4>
                    <label for="">TOTAL:</label>
                    <input type="text" class="form-control campo" name="" placeholder="R$ 00,00" value="">
                    
                    <div class="print-save">                       
                        <button href="" type="submit" role="button" class="btn btn-outline-dark btn-sm">
                            <i class="fas fa-print"></i>
                        </button>
                        <button href="" type="submit" role="button" class="btn btn-outline-dark btn-sm">
                            <i class="fas fa-save"></i>&nbsp;Salvar
                        </button>
                    </div>

                    <div class="gerer-contrato"> 
                        <div class="form-check">
                            <label class="form-check-label">
                                <input id="aprovada" type="checkbox" class="form-check-input" value="">Proposta Aprovada?
                            </label>
                        </div>
                        <div>
                            <button href="" id="gerar-contrato" type="submit" role="button" class="btn btn-outline-primary" disabled>Gerar Contrato</button>
                        </div>                      
                    </div>
                        
                </div>
                
                <div class="row controle">
                    
                    <div class="col-md-3">
                        <button id="" onclick="goBack()" class="btn btn-outline-secondary btn-sm">
                            <i class="fas fa-chevron-left"></i>&nbsp;Voltar
                        </button>
                    </div>
                    <div class="col-md-1"></div>
                    <div class="col-md-3">
                        <button id="" onclick="location.href='Cliente.php'" role="button" class="btn btn-outline-danger btn-sm">
                            <i class="fas fa-times"></i>&nbsp;Cancelar
                        </button>  
                    </div>
                    <!-- <div class="col-md-1"></div>
                    <div class="col-md-3" style="text-align: right">
                        <button id="cadastrar" href="" type="submit" role="button" class="btn btn-outline-primary">
                            <i class="fas fa-plus"></i>&nbsp;Cadastrar Cliente
                        </button>
                    </div> -->

                </div>
                
            </div>
        </form>

    </div>

    </div>


</body>

<script src="../static/js/jquery.min.js"></script>
<script src="../static/js/bootstrap.min.js"></script>
<script src="../static/fontawesome/js/all.min.js"></script>

<script> /* VALIDA 'ON THE FLY' */
    $('.campo').focusout(function() {
                
        if ( !$(this).val() ) {            
            $(this).prev().text(" * Campo obrigatório").show();
        }else {

            if (( $(this).is('[name="tarifa"]') || $(this).is('[name="consumo"]') || $(this).is('[name="frete"]') ) && 
            !$.isNumeric($(this).val()) ) {
                $(this).prev().text(" * Valor Inválido").show();
            } else {
                $(this).prev().hide();
            }

        }
      
    });
</script>

<script>
    function goBack() {
        history.back();
    }
</script>

<script>
    $("#aprovada").click(function () {
        if ($(this).prop("checked")) {
            $("#gerar-contrato").prop('disabled', false);
        } else {
            $("#gerar-contrato").prop('disabled', true);
        }
    });
</script>

</html>