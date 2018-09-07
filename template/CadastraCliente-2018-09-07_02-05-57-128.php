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
                                <a href="Abrir.html" class="list-group-item">Arbrir OS</a>
                                <a href="Monitorar.html" class="list-group-item">Monitorar OS</a>
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

        <form method="post" action="../resources/addCliente.php" class="main">
            <h1 class="titulo">Cadastro de Cliente</h1>            
            <div class="row">
                <div class="col-md-1"></div>
                <div class="form-group col-md-6">
                    <label for="nome">Nome:</label><span class="text-danger"></span>
                    <input type="text" class="form-control" name="nome" placeholder="Nome" value="">
                </div>
                <div class="form-group col-md-3">
                    <label for="cpf">CPF:</label><span class="text-danger"></span>
                    <input type="text" class="form-control" name="cpf" placeholder="000.000.000-00">
                </div>
            </div>

            <div class="row">
                <div class="col-md-1"></div>
                <div class="form-group col-md-6">
                    <label for="email">e-mail:</label><span class="text-danger"></span>
                    <input type="text" class="form-control" name="email" placeholder="e-mail">
                </div>
                <div class="form-group col-md-3">
                    <label for="fone">Telefone:</label><span class="text-danger"></span>
                    <input type="text" class="form-control" name="telefone" placeholder="(xx) xxxx-xxxx">
                </div>
            </div>

            <div class="row">
                <div class="col-md-1"></div>
                <div class="form-group col-md-2">
                    <label for="uf">Estado:</label><span class="text-danger"></span>
                    <select type="text" class="form-control" name="uf" placeholder="UF">
                        <option disabled selected>UF</option>
                        <option value="DF">DF</option>
                        <option value="MG">MG</option>
                    </select>
                </div>
                <div class="form-group col-md-7">
                    <label for="cidade">Cidade:</label><span class="text-danger"></span>
                    <input type="text" class="form-control" name="cidade" placeholder="Cidade">
                </div>
            </div>

            <div class="row">
                <div class="col-md-1"></div>
                <div class="form-group col-md-9">
                    <label for="endereco">Endereço:</label><span class="text-danger"></span>
                    <input type="text" class="form-control" name="endereco" placeholder="Endereço">
                </div>
            </div>

            <div class="row">
                <div class="col-md-1"></div>
                <div class="form-group col-md-9">
                    <label for="imovel">Imóvel:</label><span class="text-danger"></span>
                    <select type="text" class="form-control" name="imovel">
                        <option disabled selected>Tipo</option>
                        <option value="comercial">Comercial</option>
                        <option value="residencial">Residencial</option>
                        <option value="rural">Rural</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-7"></div>
                <div class="col-md-3" style="text-align: right">
                    <button href="" type="submit" role="button" class="btn btn-outline-primary">
                        <i class="fas fa-plus"></i>&nbsp;Cadastrar Cliente
                    </button>
                </div>
            </div>
        </form>

    </div>

    </div>


</body>

<script src="../static/js/jquery.min.js"></script>
<script src="../static/js/bootstrap.min.js"></script>
<script src="../static/fontawesome/js/all.min.js"></script>

<script>
    $('input').focusout(function() {
                
        if ( !$(this).val() ) {
            console.log("vazio");
            $(this).prev().text(" * Campo obrigatório").show();
        }else {

            // if (( $(this).is('[name="cpf"]') && !$.isNumeric($(this).val()) )|| 
            // ( $(this).is('[name="telefone"]') && !$.isNumeric($(this).val()) ) ) {

            if (( $(this).is('[name="cpf"]') || $(this).is('[name="telefone"]' )) && 
            !$.isNumeric($(this).val()) ) {
                $(this).prev().text(" * Valor Inválido").show();
            } else if ($(this).is('select')) {
                
            } else {
                $(this).prev().hide();
            }

        }




        // $("form").submit(function( event ) {
        // });



        
        

    });

    // $( "form" ).submit(function( event ) {

    //     if ( $("input:first").val() === "correct" ) {
    //         $("span").text("Validated...").show();
    //         return;
    //     }
        
    //     $( "span" ).text( "Not valid!" ).show().fadeOut( 1000 );
    //     event.preventDefault();

    // });
</script>

<style>
/* .form-control:focus {
    color: #495057;
    background-color: #fff;
    border-color: red;
    outline: 0;
    box-shadow: 0 0 0 0.2rem red;
} */
</style>

</html>