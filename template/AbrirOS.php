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

        <form method="post" action="MonitorarOS.php" class="main">
            <h1 class="titulo">Abrir Ordem de Serviço</h1>           
            
            <div id="cliente-main" class="row" style="display: flex; justify-content: center; padding: 5px;">
            
                <div class="row" style="width: 100%; justify-content: space-evenly;">
                    <div class="col-md-4 card card-body card-cliente" style="max-width: 32%;">
                        <h5>Cliente: José das Couves</h5>
                        <span>Estado: DF</span>
                        <span>Cidade: Brasília</span>
                        <span>Endereço: SQS 205 Bl A Apt 204</span>
                        <span>Tipo de Imóvel: Residêncial</span>
                    </div>                    
                    <div class="col-md-4 card card-body card-cliente" style="max-width: 32%;"> 
                        <div> 
                            <span>Eletricistas:</span>
                            <textarea class="form-control" rows="2">Antonio Silveira, Marcos Abreu
                            </textarea>
                        </div>
                        <!-- <button id="nova-atividade" href="" type="submit" role="button" class="btn btn-outline-primary">
                            <i class="fas fa-plus"></i>&nbsp;Nova Atividade
                        </button> -->
                    </div>
                    <div class="col-md-4 card card-body card-cliente" style="max-width: 32%;">  
                        <div>
                            <span>Data de Abertura:</span> 
                            <input type="" class="form-control" value="22/09/2018" disabled>
                        </div>
                        <div>
                            <span>Previsão de Entrega:</span>
                            <input type="date" class="form-control">
                        </div>
                    </div>
                </div>
              
                <div class="table tabela-exibe tabela-abrir-os pr-1.5" align="center">
                    <table class="table-hover table-responsive width-75vw">
                        <thead>
                            <tr>
                                <th style="width: 90%;">Atividade</th>
                                <th>Duração</th>
                                <th>Excluir</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Preparar o local da instalação</td>
                                <td>20 horas</td>
                                <td>
                                    <button type="button" class="btn">
                                        <i class="fas fa-times"></i>
                                    </button>                                    
                                </td>
                            </tr>
                            <tr>
                                <td>Instalar suporte dos módulos</td>
                                <td>4 horas</td>
                                <td>
                                    <button type="button" class="btn">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td><textarea class="form-control" rows="1"></textarea></td>
                                <td><input type="number" class="form-control"></td>
                                <td>
                                    <!-- <button type="button" class="btn">
                                        <i class="fas fa-times"></i>
                                    </button> -->
                                </td>
                            </tr>
                        </tbody>                        
                    </table>
                    <div class="row btn-nova-atividade">
                        <button id="nova-atividade" href="" type="submit" role="button" class="btn btn-outline-primary btn-sm">
                            <i class="fas fa-plus"></i>&nbsp;Nova Atividade
                        </button>  
                    </div>
                </div>               
            
                <div style="width: 100%"></div>

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