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
                                <a href="AbrirOS.php?id_contrato=1" class="list-group-item">Abrir OS</a>
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

        <form method="post" action="../resources/salvarOS.php?id_contrato=23" class="main">
        <!-- <div class="main"> -->
            <h1 class="titulo">Abrir Ordem de Serviço</h1>           
            
            <div id="cliente-main" class="row" style="display: flex; justify-content: center; padding: 5px;">
            
                <div class="row" style="width: 100%; justify-content: space-evenly;">
                    <div class="col-md-4 card card-body card-cliente" style="max-width: 32%;">
                        <?php require_once('../resources/exibeClientes.php');
                        clienteContrato($_GET['id_contrato']); ?>
                    </div>                    
                    <div class="col-md-4 card card-body card-cliente" style="max-width: 32%;"> 
                        <div> 
                            <span>Eletricistas:</span>
                            <span class="text-danger"></span>
                            <textarea id="eletricistas" class="form-control" rows="2" name="eletricistas"></textarea>
                        </div>
                        <!-- <button id="nova-atividade" href="" type="submit" role="button" class="btn btn-outline-primary">
                            <i class="fas fa-plus"></i>&nbsp;Nova Atividade
                        </button> -->
                    </div>
                    <div class="col-md-4 card card-body card-cliente" style="max-width: 32%;">  
                        <div>
                            <span>Data de Abertura:</span> 
                            <input id="abertura" name="abertura" type="date" class="form-control" value="" readonly>
                        </div>
                        <div>
                            <span>Previsão de Entrega:</span>
                            <input id="previsao" name="previsao" type="date" class="form-control" value="" readonly>
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
                        <tbody id="corpo-tabela">
                            <!-- <tr>
                                <td>Preparar o local da instalação</td>
                                <td>20 horas</td>
                                <td>
                                    <button type="button" class="btn excluir">
                                        <i class="fas fa-times"></i>
                                    </button>                                    
                                </td>
                            </tr>
                            <tr>
                                <td>Instalar suporte dos módulos</td>
                                <td>4 horas</td>
                                <td>
                                    <button type="button" class="btn excluir">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </td>
                            </tr> -->
                            <tr id="tr-nova-atividade">
                                <td>
                                    <textarea id="atividade" class="form-control campo" rows="1" text="value"></textarea>
                                    <span class="text-danger"></span>
                                </td>
                                <td>
                                    <input id="duracao" type="number" class="form-control" name="data">
                                    <span class="text-danger"></span>
                                </td>
                                <td></td>
                            </tr>
                        </tbody>                        
                    </table>
                    <div class="row btn-nova-atividade">
                        <button id="nova-atividade" href="" type="button" role="button" class="btn btn-outline-primary btn-sm">
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
                        <button id="cadastrar" href="" type="submit" role="button" class="btn btn-outline-primary" >
                            <i class="fas fa-plus"></i>&nbsp;Abrir Ordem de Serviço
                        </button>
                    </div>

                </div>
                
                
            </div>
        <!-- </div> -->
        </form>

    </div>

    </div>


</body>

<script src="../static/js/jquery.min.js"></script>
<script src="../static/js/bootstrap.min.js"></script>
<script src="../static/fontawesome/js/all.min.js"></script>

<script>

    data = formatDate();
    $("#abertura").attr('value', data);
    duracaoTotal = 0;
    chekAtividade = 0;
    qtdAtividades = 0;
    arrAtividade = new Array();


    function formatDate() { 

        data = new Date();
        var day = data.getDate();
        if (day < 10) {
            day = '0'+day;
        }
        var month = data.getMonth() + 1;
        var year = data.getFullYear();

        // return day + '/' + month + '/' + year;
        return year + '-' + month + '-' + day;
    }

    function novaPrevisao(duracaoTotal) {

        data = formatDate();
        
        data = new Date();
        data.setDate(data.getDate() + (duracaoTotal/12) );

        var day = data.getDate();
        if (day < 10) {
            day = '0'+day;
        }
        var month = data.getMonth() + 1;
        var year = data.getFullYear();

        novaP = year + '-' + month + '-' + day;

        $("#previsao").attr('value', novaP);

    }



    $("#aprovada").click(function () {
        if ($(this).prop("checked")) {
            $("#gerar-contrato").prop('disabled', false);
        } else {
            $("#gerar-contrato").prop('disabled', true);
        }
    });
</script>

<script>
    $("#nova-atividade").click(function() {

        if ( !$(".campo").val() || $(".campo").val().trim() == "" ) { /* VALIDA AO ADICIONAR  */

            $(".campo").next().text(" * Campo obrigatório").show();            

        } else if ( $('[name="data"]').val() <= 0 || !$('[name="data"]').val() ) {

            $('[name="data"]').next().text(" * Valor Inválido").show();

        } else {

            atividade = $("#atividade").val();
            duracao = $("#duracao").val();
            arrAtividade[qtdAtividades] = { 'atividade':atividade, 'duracao':duracao };
            corpo = $("#corpo-tabela");
            // tr = '<tr><td>' + atividade + '</td><td class="duracao">' + duracao + '</td><td><button type="button" class="btn excluir"><i class="fas fa-times"></i></button></td></tr>';
            tr = '<tr><td><textarea class="form-control " rows="1" value="" readonly name="atividade[]">' + atividade + '</textarea></td>'+
            '<td class="duracao"><input type="number" class="form-control" value="' + duracao + '" readonly name="duracao[]""></td>'+
            '<td><button type="button" class="btn excluir"><i class="fas fa-times"></i></button></td></tr>';
            corpo.before(tr);
            
            chekAtividade = 1;
            qtdAtividades++;
            duracaoTotal += parseInt(duracao);
            novaPrevisao(duracaoTotal);

        }

    });

</script>


<script>
    $('body').on('click', '.excluir', function() {
        $("tr").has($(this)).remove();
    });
</script>

<script> /* VALIDA NO SUBMIT */
    $( "form" ).submit(function( event ) {
    // function valida() {

        $(".campo").next().text(" * Campo obrigatório").hide();
        $('[name="data"]').next().text(" * Campo obrigatório").hide();
        $("#eletricistas").prev().text(" * Campo obrigatório").hide();

        if ( !$("#eletricistas").val() || $("#eletricistas").val().trim() == "" ) {
            $("#eletricistas").prev().text(" * Campo obrigatório").show();
            event.preventDefault();

        } else if ( chekAtividade !== 1 ) {

            $(".campo").next().text(" * Campo obrigatório").show();
            $('[name="data"]').next().text(" * Campo obrigatório").show();
            event.preventDefault();

        } else {
            return true;
        }
        return false;
        // JSON.stringify(arrAtividade);
    });
    // }
</script>

<script> /* VALIDA AO DIGITAR  */
    $('.campo').on('keyup', function() {
                
        if ( !$(this).val() || $(".campo").val().trim() == "" ) {
            $(this).next().text(" * Campo obrigatório").show();
        }else {

            if ( $(this).is('[name="data"]' ) &&  ($(this).val()) <= 0 ) {
                $(this).next().text(" * Valor Inválido").show();
            } else {
                $(this).next().hide();
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
    // function goAjax() {
    function agoAjax() {

        // if (window.XMLHttpRequest) {
        //     // code for IE7+, Firefox, Chrome, Opera, Safari
        //     xmlhttp=new XMLHttpRequest();
        // } else {  // code for IE6, IE5
        //     xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        // }

        // xmlhttp.onreadystatechange=function() {
        //     if (this.readyState==4 && this.status==200) {
        //     $("#tabela").empty();
        //     $("#tabela").append(this.responseText);
        //     }
        // }

        // xmlhttp.open("GET","../resources/buscaCliente.php?campo-busca="+busca,true);
        // xmlhttp.send();

        validacao = valida();

        if(validacao == true) {
            
            // var data = {
            //     test: $( "#test" ).val()
            // };
            var options = {
                url: "../resources/salvarOS.php?eletricistas=" + $("#eletricistas").val(),
                dataType: "text",
                type: "POST",
                data: { test: JSON.stringify(arrAtividade) }, // Our valid JSON string
                // success: function(data) { window.location.href=data.url;},
                success: function( data, status, xhr ) {
                    //...
                    // console.log("foi");
                    $("#eletricistas").append(this.responseText);
                    console.log("foi");
                },
                error: function( xhr, status, error ) {
                    //...
                    console.log("não foi");
                }
            };
            $.ajax( options );
            // return false;
        }
    }
</script>

<script>
    // function goAjax() {
    function goAjax() {

        

        validacao = valida();

        if(validacao == true) {
            
            if (window.XMLHttpRequest) {
                // code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp=new XMLHttpRequest();
            } else {  // code for IE6, IE5
                xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
            }

            // xmlhttp.onreadystatechange=function() {
            //     if (this.readyState==4 && this.status==200) {
            //     $("#tabela").empty();
            //     $("#tabela").append(this.responseText);
            //     }
            // }
            str_json = JSON.stringify(arrAtividade)

            xmlhttp.open("POST","../resources/salvarOS.php?eletricistas=" + $("#eletricistas").val(),true);
            xmlhttp.setRequestHeader("Content-type", "application/json");
            xmlhttp.send(str_json);
        }
    }
</script>

</html>



