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
                                <a href="AbrirOS.php" class="list-group-item">Abrir OS</a>
                                <a href="MonitorarOS.php" class="list-group-item">Monitorar OS</a>
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

        <?php require('../resources/exibeOS.php'); ?>
        <form method="post" action="../resources/salvaOSMonitorar.php?id_os=<?php echo $id_os ?>" class="main">
        <!-- <form method="post" onsubmit="return redirect();" class="main"> -->
            <h1 class="titulo">Monitorar Ordem de Serviço</h1>
            
            <div id="cliente-main" class="row" style="display: flex; justify-content: center; padding: 5px;">
            
                <div class="row" style="width: 100%; justify-content: space-evenly;">
                    <div class="col-md-4 card card-body card-cliente" style="max-width: 32%;">
                        <?php require_once('../resources/exibeClientes.php');
                        clienteContrato($_GET['id_contrato']); ?>
                    </div>
                    
                    <div class="col-md-4 card card-body card-cliente" style="max-width: 32%;">
                        <div>
                            <span>Eletricistas:</span>
                            <p><?php echo $eletricistas;?></p>
                        </div>
                    </div>
                    <div class="col-md-4 card card-body card-cliente" style="max-width: 32%;">
                        <div>
                            <span>Data de Abertura:</span>
                            <input id="abertura" type="" class="form-control" value="<?php echo $abertura;?>" disabled>
                        </div>
                        <div>
                            <span>Previsão de Entrega:</span>
                            <input id="previsao" name="previsao" type="" class="form-control" value="<?php echo $previsao;?>" readonly>
                        </div>
                    </div>
                </div>
              
                <div class="table tabela-exibe tabela-abrir-os" align="center">
                    <table class="table-hover table-responsive width-75vw">
                        <thead>
                            <tr>
                                <th>Finalizado?</th>
                                <th style="width: 60%;">Atividade</th>
                                <th style="width: 20%;">Prazo Inicial</th>
                                <th style="width: 20%;">Duração</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php atividades($connection, $id_os);?>
                        
                            <!-- <tr>
                                <td class="checkbox-finalizada">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" value="" checked>
                                    </div>
                                </td>
                                <td>Preparar o local da instalação
                                    <div class="justificativa">
                                        <span>Justificativa:</span>
                                        <textarea class="form-control" rows="2">
                                        </textarea>
                                    </div>
                                </td>
                                <td>20 horas</td>
                                <td><input type="number" class="form-control" value=""></td>
                            </tr>
                            <tr>
                                <td class="checkbox-finalizada">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" value="">
                                    </div>
                                 </td>
                                <td>Instalar suporte dos módulos</td>
                                <td>4 horas</td>
                                <td><input type="number" class="form-control" value=""></td>
                            </tr> -->
                        </tbody>
                    </table>
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
                            <i class="fas fa-save"></i>&nbsp;Salvar
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

<!-- <script>
    function redirect() {
        location.href="../resources/salvaOSMonitorar.php?id_os=<?php echo $id_os ?>";
        return false;
    }
</script> -->

<script> /* VALIDA AO DIGITAR  */
    $('.campo').on('keyup change focusout', function() {
                
        if ( !$(this).val() || $(this).val().trim() == '' ) {
            $(this).next().text(" * Campo obrigatório").show();
        }else {
            $(this).next().hide();
        }
      
    });
</script>

<script>
    $( "form" ).submit(function( event ) {
        $(".campo").each(function() {

            if ( ( $(this).prop("disabled") == false ) && (! $(this).val() || $(this).val().trim() == '' ) ) {

                $(this).next().text(" * Campo obrigatório").show();
                event.preventDefault();
            }

        });
    });
</script>

<script>
    function goBack() {
        history.back();
    }
</script>

<script>
    $(".situacao").change(function() {
            
        linha = 0;
        linha = $("tr").has(this);

        if(this.checked) {
            $(linha).find(".duracao_real").prop("disabled", false);
        } else {
            $(linha).find(".duracao_real").val("").prop("disabled", true);
            $(linha).find(".justificativa").text("").prop("hidden", true).prop("disabled", true);

            duracaoTotal = 0;
            $(".duracao_real").each(function() {
                if ($(this).val()) {
                    duracaoTotal += parseInt($(this).val());
                } else {
                    linha = $("tr").has(this);
                    duracaoTotal += parseInt($(linha).find(".duracao").text());
                }
            });
            getdate(duracaoTotal);

        }

    });

    $(".duracao_real").focusout(function() {
        
        linha = 0;       
        linha = $("tr").has(this);
        id = linha.attr('id');
        duracao_inicial = parseInt($(linha).find(".duracao").text());
        
        if ( $(this).val() > duracao_inicial ) {
            $(linha).find(".justificativa").prop("hidden", false).prop("disabled", false);
        } else {
            $(linha).find(".justificativa").prop("hidden", true).prop("disabled", true);
        }

        duracaoTotal = 0;
        $(".duracao_real").each(function() {
            if ($(this).val()) {
                duracaoTotal += parseInt($(this).val());
            } else {
                linha = $("tr").has(this);
                duracaoTotal += parseInt($(linha).find(".duracao").text());
            }
        });
        getdate(duracaoTotal);

    });
</script>

<script> 
    function getdate(duracaoTotal) {
        var tt = document.getElementById('abertura').value;
        var date = new Date(tt);
        date = formatDate(date);
        var newdate = new Date(date);

        newdate.setDate(newdate.getDate() + (duracaoTotal/12));
        
        var dd = newdate.getDate();
        if (dd < 10) {
            dd = '0'+dd;
        }
        var mm = newdate.getMonth() + 1;
        if (mm < 10) {
            dmmay = '0'+mm;
        }
        var y = newdate.getFullYear();

        var someFormattedDate = dd + '/' + mm + '/' + y;
        document.getElementById('previsao').value = someFormattedDate;
    }

    function formatDate(data) { 

        var day = data.getDate();
        if (day < 10) {
            day = '0'+day;
        }
        var month = data.getMonth() + 1;
        var year = data.getFullYear();

        // return day + '/' + month + '/' + year;
        return day + '-' + month + '-' + year;
    }
</script>

</html>