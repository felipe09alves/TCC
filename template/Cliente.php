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
            <h1 class="titulo">Consulta de Cliente</h1>

            <div class="row first-line">
                <div class="col-md-3" style="text-align: center">
                    <a href="CadastraCliente.php" role="button" class="btn btn-outline-primary">
                        <i class="fas fa-plus"></i>&nbsp;Novo Cliente
                    </a>
                </div>
                <div class="col-md-6" style="display: flex">
                    <input id="campo-busca" type="text" class="form-control" style="align-self: flex-end" placeholder="Nome ou CPF">
                </div>
                <div class="col-md-3">

                    <button id="botao-busca" type="button" role="button" class="btn btn-outline-secondary" >
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>
            <div id="tabela" class="table tabela-exibe" align="center">
                <!-- <table class="table-hover table-responsive">
                    
                    <tbody id="tabela">
                        
                    </tbody>
                </table> -->

            </div>

        </div>

    </div>

    </div>


</body>
<script src="../static/js/jquery.min.js"></script>
<script src="../static/js/bootstrap.min.js"></script>
<script src="../static/fontawesome/js/all.min.js"></script>


<script>

    $("#botao-busca").click(function() {
        ajax();
    });
    $("#campo-busca").keyup(function(e) {
        if(e.keyCode == 13) {
            ajax();
        }
    });

    // $("#botao-busca").click(function() {
    // $("#botao-busca").on('click keyup', function() { 
    function ajax() {
        $("#tabela").empty();
        busca = $("#campo-busca").val();

        if (busca.length==0) {
            $("#tabela").append("<h4>Todos os campos devem ser preenchidos.</h4>");
            return;
        }

        $("#tabela").append("<h5>Aguarde...</h5><div class='loader'></div> ");
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp=new XMLHttpRequest();
        } else {  // code for IE6, IE5
            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }

        xmlhttp.onreadystatechange=function() {
            if (this.readyState==4 && this.status==200) {
            $("#tabela").empty();
            $("#tabela").append(this.responseText);
            }
        }

        xmlhttp.open("GET","../resources/buscaCliente.php?campo-busca="+busca,true);
        xmlhttp.send();
    // });
    }
    
</script>

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

</html>