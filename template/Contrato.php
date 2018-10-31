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
                            <a hre f="../index.html">
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

        <form method="post" action="AbrirOS.php" class="main">
            <h1 class="titulo">Contrato</h1>           
            
            <div id="cliente-main" class="row" style="display: flex; justify-content: center;">
            
                <div class="row" style="margin: 15px;">
                    <!-- <h4>&nbsp;</h4> -->
                    <div class="card card-body card-cliente">                        
                        <h4>CONTRATO PARTICULAR DE SERVIÇOS INSTALAÇÃO DE SISTEMA SOLAR</h4>
                        <br>
                        <span>Por meio deste instrumento “CONTRATO PARTICULAR DE SERVIÇOS”, de um lado:  A empresa SOL LAR ENERGIA LTDA,  com sede nesta cidade de João Pinheiro-Mg, junto à Rua Capitão Sancho 596  s/ 104, inscrita no CNPJ 24.311.237/0001-51   doravante denominado de simplesmente Contratante, e do outro lado: JOSÉ DAS COUVES  ,  residente nesta cidade de  Brasilia, Distrito Federa inscrito no CPF 00000000-00, denominado contratado, tem entre si acertado o seguinte:</span>
                        <br>
                        <li>Cláusula 1ª - Caberá ao Contratado desenvolver atividades de instalação de serviços do sistema solar fotovoltaico.</li>

                        <li>Cláusula 2ª – 	Os serviços serão prestados junto à Rua São Pedro do Altar, residência do Sr. JOSÉ DAS COUVES.</li>

                        <li>Cláusula 3ª – A vigência do presente contrato será por tempo indeterminado, tendo seu início em 20 de fevereiro de 2018, e com uma previsão estimada de termino em 23/02/2018;</li>

                        <li>Cláusula 3ª – A vigência do presente contrato será por tempo indeterminado, tendo seu início em 20 de fevereiro de 2018, e com uma previsão estimada de termino em 23/02/2018;</li>
                        <span style="margin-left: 2em;">16 MÓDULOS FOTOVOLTAICOS Canadian CS6U-315B  260 Wp</span>
                        <span style="margin-left: 2em;">01 INVERSOR Fronius 4210069 4,0kW</span>
                        <li>Cláusula 5ª – Dá entrega do serviço: O serviço será entregue até o dia 23/02/2018, podendo sofrer prorrogação por até 02 (dois) dias à medida que for encontrando dificuldades.</li>
                        <br><br>
                        <span style="text-align: center;">Brasília, 19 de fevereiro de 2018</span>
                        <br><br>
                        <div class="row">
                            <div class="col-6">
                                <div class="assinatura" style="text-align: center;"></div>
                                <div style="text-align: center;">Contratante</div>
                            </div>
                            <div class="col-6">
                                <div class="assinatura" style="text-align: center;"></div>
                                <div style="text-align: center;">Contratado</div>
                            </div>
                        </div>
                    </div>
                    <div style="text-align: left; padding-top: 15px">

                    </div>
               </div>
                               
                <div class="print-save" style="text-align: left; width: 100%">
                    <button href="" type="submit" role="button" class="btn btn-outline-dark btn-sm">
                        <i class="fas fa-print"></i>
                    </button>
                    <button href="" type="submit" role="button" class="btn btn-outline-dark btn-sm">
                        <i class="fas fa-save"></i>&nbsp;Salvar
                    </button>
                </div>

                <div class="row controle">
                    
                    <div class="col-md-3">
                        <button id="" onclick="goBack()" class="btn btn-outline-secondary btn-sm">
                            <i class="fas fa-chevron-left"></i>&nbsp;Voltar
                        </button>
                    </div>
                    <div class="col-md-3">
                        <button id="" onclick="location.href='Cliente.php'" role="button" class="btn btn-outline-danger btn-sm">
                            <i class="fas fa-times"></i>&nbsp;Cancelar
                        </button>  
                    </div>
                    <div class="col-md-1"></div>
                    <div class="col-md-4" style="text-align: right">
                        <button id="cadastrar" href="" type="submit" role="button" class="btn btn-outline-primary">
                            <i class="fas fa-plus"></i>&nbsp;Abrir Ordem de Serviço
                        </button>
                    </div>

                </div>
                
                
            </div>
        </form>

    </div>

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