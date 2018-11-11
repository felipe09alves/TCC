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
    <link rel="stylesheet" href="../static/js/jquery-ui.min.css">
    <link rel="stylesheet" href="../static/js/jquery-ui.structure.min.css">
    <link rel="stylesheet" href="../static/js/jquery-ui.theme.min.css">
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

        <div class="main">
            <h1 class="titulo">Relatório de Vendas</h1>

            <div class="row first-line" style="margin-bottom: 40px">

                <div class="col-lg-8 row filtro">

                    <div class="col-md-12">
                    
                        <div class="row mb-5">

                            <div class="col-md-1"></div>
                            <div class="col-md-2" style="text-align: left">
                                <span>Periodo: </span>
                            </div>

                            <div class="col-md-4" style="text-align: left">
                                <div class="form-check">
                                    <input id="inicial" name="inicial" type="date" class="form-control" value="2018-11-08">
                                </div>
                            </div>

                            <div class="col-md-1 text-center">a</div>
                            <div class="col-md-4" style="text-align: left">
                                <div class="form-check">
                                    <input id="final" name="final" type="date" class="form-control" value="2018-11-11">
                                </div>
                            </div>
                            
                        </div>

                        <div class="row mb-5">

                            <div class="col-md-1"></div>
                            <div class="col-md-2" style="text-align: left">
                                <span>Região: </span>
                            </div>

                            <div class="col-md-3" style="text-align: left">
                                <div class="form-check">
                                    <select name="uf" class="form-control" id="uf">
                                        <option value="todos" selected>Todos</option>
                                        <?php require('../resources/exibeRegiao.php'); 
                                        estado();?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6" style="text-align: left">
                                <div class="form-check">
                                    <input id="campo-busca" name="cidade" type="text" class="form-control ui-autocomplete-input" style="align-self: flex-end" placeholder="Cidade" autocomplete="off" disabled>
                                </div>
                            </div>
                            
                        </div>

                        <div class="row mb-5">

                            <div class="col-md-1"></div>
                            <div class="col-md-2" style="text-align: left">
                                <span>Tipo de Imóvel: </span>
                            </div>

                            <div class="col-md-3" style="text-align: left">
                                <div class="form-check">
                                    <select name="imovel" type="text" class="form-control campo" name="imovel">
                                        <option value="todos" selected>Todos</option>
                                        <option value="comercial">Comercial</option>
                                        <option value="residencial">Residencial</option>
                                        <option value="rural">Rural</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6" style="text-align: center">
                                <button id="botao-busca" href="" type="submit" role="button" class="btn btn-outline-primary">
                                    <i class="fas fa-search"></i>&nbsp;Pesquisar
                                </button>
                            </div>
                            
                        </div>

                    </div>
                    
                </div>

                <div class="col-lg-4 text-center col-center">
                    <div>
                        <p>Vendas Realizadas:</p>
                        <h1 id="total-vendas">0</h1>
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-md-6 text-center">
                    <p><span id="regiaoMaior"></span></p>
                    <canvas id="grafico-maior"></canvas>
                </div>
                <div class="col-md-6 text-center">
                    <p><span id="regiaoMenor"></span></p>
                    <canvas id="grafico-menor"></canvas>
                </div>
            </div>

        </div>

    </div>

</body>

<script src="../static/js/jquery.min.js"></script>
<script src="../static/js/bootstrap.min.js"></script>
<script src="../static/fontawesome/js/all.min.js"></script>
<script src="../static/js/Chart.bundle.min.js"></script>
<script src="../static/js/jquery-ui.min.js"></script>
<script src="../static/js/jquery-ui.min.js"></script>
<script src="../static/js/jquery-ui.min.js"></script>


<script>
    $("#botao-busca").click(function() {
        ajax();
    });
</script>

<script>
    $("#uf").change(function() {

        uf= $(this).val();        
        if ( uf != "todos" ) {
            $("#campo-busca").prop("disabled", false);
            $("#campo-busca").autocomplete({
                source: function(request, response){
                    $.get("../resources/autocompleteCidade.php?uf=" + uf, {
                        term:request.term
                        }, function(data){
                        response($.map(data, function(item) {
                            return {
                                label: item.cidade,
                                value: item.cidade,
                                text: item.id
                                // value: item.id
                            }
                        }))
                    }, "json");
            }
                
            });
        } else {
            $("#campo-busca").prop("disabled", true);
            $("#campo-busca").val("");
        }

    });
</script>

<script>
    function ajax() {    

        var formData = {
            'inicial'   : $('[name=inicial]').val(),
            'final'     : $('[name=final]').val(),
            'uf'        : $('[name=uf]').val(),
            'cidade'    : $('[name=cidade]').val(),
            'imovel'    : $('[name=imovel]').val()
        };        
        $.ajax({
            type        : 'POST',
            url         : '../resources/getNumVendas.php',
            data        : formData,
            dataType    : 'json', 
            encode      : true
            // dataType    : 'text',
        })           
        .done(function(data) {
            
            // console.log(data.menor);
            jsonVendas = data;

            $("#total-vendas").text(jsonVendas.total);

            if (jsonVendas.maior !== null) {

                $("#grafico-maior").show();
                montaAtual(jsonVendas.maior);
                $("#regiaoMaior").prev().show();
                textoMaior = "Maior Crescimento: "+jsonVendas.maiorRegiao.cidade+" "+jsonVendas.maiorRegiao.estado;
                $("#regiaoMaior").text(textoMaior);

            } else {

                $("#regiaoMaior").text('Dados nsuficientes para período selecionado.');
                $("#grafico-maior").hide();

            }

            if (jsonVendas.menor !== null) {

                $("#grafico-menor").show();
                montaAnterior(jsonVendas.menor);
                $("#regiaoMenor").prev().show();
                textoMenor = "Maior Queda - "+jsonVendas.menorRegiao.cidade+" "+jsonVendas.menorRegiao.estado;
                $("#regiaoMenor").text(textoMenor);

            } else {

                $("#regiaoMenor").text('Dados insuficientes para período selecionado.');
                $("#grafico-menor").hide();

            }
            
        });



    }
</script>

<script>
    function montaAtual(maior) {
        
        var ctx = document.getElementById("grafico-maior").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: graficoDatas(maior),
                datasets: [{
                    label: 'Vendas',
                    data: graficoVendas(maior),
                    backgroundColor: [
                        'rgba(54, 162, 235, 0.2)'
                    ],
                    borderColor: [
                        'rgba(54, 162, 235, 1)'
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
</script>

<script>
    function montaAnterior(menor) {
        var ctx = document.getElementById("grafico-menor").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: graficoDatas(menor),
                datasets: [{
                    label: 'Vendas',
                    data: graficoVendas(menor),
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)'
                        
                    ],
                    borderColor: [
                        'rgba(255,99,132,1)'
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
</script>

<script>
    function graficoVendas(vendas) {

        var string = [];
        for (i = 0; i < vendas.length; i++) {
            string[i] = vendas[i]['vendas'];
        }        
        return string;

    }

    function graficoDatas(data) {

        var string = [];
        for (i = 0; i < data.length; i++) {
            string[i] = formatDate(data[i]['data']);
        }        
        return string;

    }

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

</html>