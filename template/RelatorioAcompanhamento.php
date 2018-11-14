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

<body onload="ajax();">
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
            <h1 class="titulo">Relatório de Acompanhamento</h1>

            <div class="row first-line">

                <div class="col-md-8 row" style="margin-left: 0">

                    <div class="col-md-8">
                        <p>Listar ordens de serviço:</p>
                        <div class="row">

                            <div class="col-md-6" style="text-align: left">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="status"  value="todas" checked="checked" >Todas
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="status"  value="concluidas">Concluidas
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="status"  value="abertas">Abertas
                                    </label>
                                </div>
                            </div>

                            <div class="col-md-6" style="text-align: left">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="condicao"  value="todas" checked="checked" >Todas
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="condicao"  value="adiantadas">Adiantadas
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="condicao"  value="atrasadas">Atrasadas
                                    </label>
                                </div>
                            </div>
                            
                        </div>
                    </div>

                    <div class="col-md-4">
                        <p>Perído:</p>
                        <div class="row">

                            <div class="form-check">
                                <input type="date" name="inicial" class="form-control" value=""> 
                            </div>

                            <div class="form-check">
                                <input type="date" name="final" class="form-control" value=""> 
                            </div>

                        </div>
                    </div>
                    <!-- <div class="col-md-12" style="margin-top: 15px">
                        <div class="text-center">
                            <button id="botao-busca" href="" type="submit" role="button" class="btn btn-outline-primary">
                                <i class="fas fa-search"></i>&nbsp;Pesquisar
                            </button>
                        </div>
                    </div> -->

                    <div id="tabela" class="table tabela-exibe" align="center">
                        <table class="table-hover table-responsive">
                            <thead>
                                <tr>
                                    <th style="text-align: center">Número</th>
                                    <th>Cliente</th>
                                    <th>Abertura</th>
                                    <th>Status</th>
                                    <th>Condição</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody id="tabela-vendas">
                            
                                <!-- <tr>
                                    <td style="text-align: center">01</td>
                                    <td>José das Couves</td>
                                    <td>17/10/2018</td>
                                    <td>Aberto</td>
                                    <td>Atrasado</td>
                                    <td>
                                        <button type="button" class="btn">
                                            <i class="fas fa-eye"></i>
                                        </button>                                    
                                    </td>
                                </tr>
                                <tr>
                                    <td style="text-align: center">02</td>
                                    <td>Nikola Jakie</td>
                                    <td>23/10/2018</td>
                                    <td>Aberto</td>
                                    <td>Atrasado</td>
                                    <td>
                                        <button type="button" class="btn">
                                            <i class="fas fa-eye"></i>
                                        </button>                                    
                                    </td>
                                </tr> -->
                            </tbody>
                        </table>
                    </div>

                </div>

                <div class="col-md-4">
                    <canvas id="grafico-andamento" width=""></canvas>
                </div>

            </div>

        </div>

    </div>

    </div>


</body>
<script src="../static/js/jquery.min.js"></script>
<script src="../static/js/bootstrap.min.js"></script>
<script src="../static/fontawesome/js/all.min.js"></script>
<script src="../static/js/Chart.bundle.min.js"></script>


<script>
    $("#botao-busca").click(function() {
        ajax();
    });
    $("input").change(function() {
        ajax();
    });
</script>

<script>
    function ajax() {    

        var formData = {
            'inicial'   : $('[name=inicial]').val(),
            'final'     : $('[name=final]').val(),
            'status'    : $('[name=status]:checked').val(),
            'condicao'  : $('[name=condicao]:checked').val()
        };        
        $.ajax({
            type        : 'POST',
            url         : '../resources/getAcompanhamento.php',
            data        : formData,
            dataType    : 'json', 
            encode      : true
            // dataType    : 'text',
        })           
        .done(function(data) {

            jsonLista = data;
            montaTabela(jsonLista);
            
        });

    }
</script>

<script>
    function montaTabela(jsonLista) {

        tabela = $("#tabela-vendas");
        tabela.empty();
        
        jsonLista.forEach(function(item) {
            tr = "<tr>";
                tr += '<td style="text-align: center">' + item.id_os + '</td>';
                tr += '<td>' + item.cliente + '</td>';
                tr += '<td>' + formatDate(item.data_abertura); + '</td>';
                tr += '<td>' + item.status + '</td>';
                tr += '<td>' + item.condicao + '</td>';
                if ( item.status == "Aberta" ) {
                    tr += '<td><button value="' + item.i + '" type="button" class="btn visualizar"><i class="far fa-chart-bar"></i></button></td>';
                } else {
                    tr += '<td></td>'
                }
            tr += '</tr>'; 
            tabela.append(tr);
        });

    }
</script>

<script>
    function formatDate(data) { 

        data = new Date(data);
        var day = data.getDate();
        if (day < 10) {
            day = '0'+day;
        }
        var month = data.getMonth() + 1;
        var year = data.getFullYear();

        return day + '/' + month + '/' + year;
        // return year + '-' + month + '-' + day;
    }
</script>

<script>
    $("body").delegate(".visualizar", 'click', function() {
        item = $(this).val();
        montaGrafico(jsonLista[item]);
    });
</script>

<script>
    function montaGrafico(item) {
        
        var ctx = document.getElementById("grafico-andamento").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ["Andamento", "Prazo", "Previsão"],
                datasets: [{
                    label: 'horas',
                    data: graficoDatas(item),
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255,99,132,1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                legend: {
                    display: true,
                    position: 'top',
                    onClick: null
                },
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero:true
                        }
                    }]
                }
            }
        });
        
    }

    function graficoDatas(item) {
        
        var string = [];
        
        string[0] = item.duracao_real;
        string[1] = item.prazo
        string[2] = (parseInt(item.prazo) - item.duracao) + parseInt(item.duracao_real);
        
        return string;

    }
</script>

</html>