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
        <?php require('../resources/exibeIrradiacao.php');?>
        <form method="post" action="../resources/salvaIrradiacao.php?cidade=<?php echo $_GET['cidade'];?>" class="main">
            <h1 class="titulo">Cadastrar de Índice de Irradiação</h1>

            <div class="row first-line">
                <div class="col-md-3"></div>
                <div class="col-md-2 uf">
                    <div class="form-group">
                        <select class="form-control" id="uf" disabled>
                            <?php estado($_GET['uf']);?>
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <?php cidade($_GET['cidade']);?>
                </div>                
            </div>

            <div class="row row-irradiacao">
                
                <?php irradiacao($_GET['cidade']);?>
                
            </div>

            <div class="row controle controle-center">
                
                <div class="col-md-2">
                    <a id="" href="Irradiacao.php" class="btn btn-outline-danger btn-sm">
                        <i class="fas fa-times"></i>&nbsp;Cancelar
                    </a> 
                </div>
                <div class="col-md-3">
                    <button id="cadastrar" href="" type="submit" role="button" class="btn btn-outline-primary">
                        <i class="fas fa-plus"></i>&nbsp;Cadastrar Irradiação
                    </button>
                </div>                

            </div>

        </form>

    </div>


</body>
<script src="../static/js/jquery.min.js"></script>
<script src="../static/js/bootstrap.min.js"></script>
<script src="../static/fontawesome/js/all.min.js"></script>

<script> /* VALIDA AO DIGITAR  */
    $('.campo').on('keyup', function() {
                
        if ( !$(this).val() ) {
            $(this).parent().prev().text(" * Campo obrigatório").show();
        }else {

            if ( $(this).val() <= 0 ) {
                $(this).parent().prev().text(" * Valor Inválido").show();
            } else {
                $(this).parent().prev().hide();
            }

        }
      
    });
</script>

<script> /* VALIDA NO SUBMIT */
    $( "form" ).submit(function( event ) {

        $(".campo").each(function() {
            
            if ( !$(this).val() ) {
               $(this).parent().prev().text(" * Campo obrigatório").show();
                event.preventDefault();
            } else if ( $(this).val() <= 0 ) {
                $(this).parent().prev().text(" * Valor Inválido").show();
                event.preventDefault();
            }
            
        });

    });
</script>

</html>