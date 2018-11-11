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

        <!-- <form method="post" action="../resources/addCliente.php" class="main"> -->
        <div class="main">
            <h1 class="titulo">Cadastro de Funcionário</h1>            
            <div class="row">
                <div class="col-md-1"></div>
                <div class="form-group col-md-6">
                    <label for="nome">Nome:</label><span class="text-danger"></span>
                    <input type="text" class="form-control campo" name="nome" placeholder="Nome" value="">
                </div>
                <div class="form-group col-md-3">
                    <label for="cpf">CPF:</label><span class="text-danger"></span>
                    <input id="cpf" type="number" class="form-control campo" name="cpf" placeholder="000.000.000-00" maxlength="11">
                </div>
            </div>

            <div class="row">
                <div class="col-md-1"></div>
                <div class="form-group col-md-6">
                    <label for="email">e-mail:</label><span class="text-danger"></span>
                    <input type="text" class="form-control campo" name="email" placeholder="e-mail">
                </div>
                <div class="form-group col-md-3">
                    <label for="fone">Telefone:</label><span class="text-danger"></span>
                    <input type="number" class="form-control campo" name="telefone" placeholder="(xx) xxxx-xxxx">
                </div>
            </div>

            <div class="row">
                <div class="col-md-1"></div>
                <div class="form-group col-md-2">
                    <label for="uf">Estado:</label><span class="text-danger"></span>
                    <select type="text" class="form-control campo" name="uf" placeholder="UF">
                        <option disabled selected>UF</option>
                        <?php require('../resources/exibeRegiao.php'); 
                        estado();?>
                    </select>
                </div>
                <div class="form-group col-md-7">
                    <label for="cidade">Cidade:</label><span class="text-danger"></span>
                    <input type="text" class="form-control campo" name="cidade" placeholder="Cidade">
                </div>
            </div>

            <div class="row">
                <div class="col-md-1"></div>
                <div class="form-group col-md-9">
                    <label for="endereco">Endereço:</label><span class="text-danger"></span>
                    <input type="text" class="form-control campo" name="endereco" placeholder="Endereço">
                </div>
            </div>

            <div class="row">
                <div class="col-md-1"></div>
                <div class="form-group col-md-4">
                    <label for="imovel">Cargo:</label><span class="text-danger"></span>
                    <select type="text" class="form-control campo" name="imovel">
                        <option disabled selected>Tipo</option>
                        <option value="comercial">Funcionário Administrativo</option>
                        <option value="residencial">Engenheiro</option>
                        <option value="rural">Eletricista</option>
                    </select>
                </div>
                <div class="col-md-1"></div>
                <div class="form-group col-md-4">
                    <label for="imovel">Perfil:</label><span class="text-danger"></span>
                    <select type="text" class="form-control campo" name="imovel">
                        <option disabled selected>Tipo</option>
                        <option value="usuario">Usuário</option>
                        <option value="administrador">Administrador</option>
                    </select>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-5"></div>
                <div class="col-md-2">
                    <a id="" href="Irradiacao.php" class="btn btn-outline-danger btn-sm">
                        <i class="fas fa-times"></i>&nbsp;Cancelar
                    </a> 
                </div>
                <div class="col-md-3" style="text-align: right">
                    <button id="cadastrar" href="" type="submit" role="button" class="btn btn-outline-primary">
                        <i class="fas fa-plus"></i>&nbsp;Cadastrar Funcionário
                    </button>
                </div>
            </div>
        <!-- </form> -->
        </div>

    </div>

</body>

<script src="../static/js/jquery.min.js"></script>
<script src="../static/js/bootstrap.min.js"></script>
<script src="../static/fontawesome/js/all.min.js"></script>

<script> /* VALIDA AO DIGITAR  */
    $('.campo').on('keyup change', function() {

        if ( !$(this).val() ) {
            $(this).prev().text(" * Campo obrigatório").show();
        }else {

            if (( $(this).is('[name="cpf"]') || $(this).is('[name="telefone"]') ))  {

                if ( $(this).val() < 0 ) {
                    $(this).prev().text(" * Valor Inválido").show();
                }else if ( $(this).is('[name="cpf"]') ) {

                    //Valida CPF
                    cpf = $(this).val();
                    check = TestaCPF(cpf);
                    if (check===false) {
                        $(this).prev().text(" * Valor Inválido").show();
                    }else {
                        $(this).prev().hide();
                    }
                }

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
                if (( $(this).is('[name="cpf"]') || $(this).is('[name="telefone"]') ))  {

                    if ( $(this).val() < 0 ) {
                        $(this).prev().text(" * Campo obrigatório").show();
                        event.preventDefault();
                    }else if ( $(this).is('[name="cpf"]') ) {

                        //Valida CPF
                        cpf = $(this).val();
                        check = TestaCPF(cpf);
                        if (check===false) {
                            $(this).prev().text(" * Campo obrigatório").show();
                            event.preventDefault();
                        }

                    }

                }
            
            }
            
        });

    });
</script>

<script>
    function TestaCPF(strCPF) {
        var Soma;
        var Resto;
        Soma = 0;
    if (strCPF == "00000000000") return false;

    if ((strCPF.substring(11, 12))) return false;

    for (i=1; i<=9; i++) Soma = Soma + parseInt(strCPF.substring(i-1, i)) * (11 - i);
    Resto = (Soma * 10) % 11;
    
        if ((Resto == 10) || (Resto == 11))  Resto = 0;
        if (Resto != parseInt(strCPF.substring(9, 10)) ) return false;
    
    Soma = 0;
        for (i = 1; i <= 10; i++) Soma = Soma + parseInt(strCPF.substring(i-1, i)) * (12 - i);
        Resto = (Soma * 10) % 11;
    
        if ((Resto == 10) || (Resto == 11))  Resto = 0;
        if (Resto != parseInt(strCPF.substring(10, 11) ) ) return false;
        return true;
    }
</script>

</html>