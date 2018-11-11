<?php 
    require_once('../resources/session.php');
    require('../resources/connect.php');

    if (isset($_POST) & !empty($_POST)) {
        $consumo = ($_POST['consumo']);
        $tarifa = ($_POST['tarifa']);
        $fase = ($_POST['fase']);
        $id_modulo = ($_POST['modulo']);
        $id_inversor =  ($_POST['inversor']);
        $frete =  ($_POST['frete']);
        $cliente = $_GET['id'];
    }

    setcookie("consumo", $consumo, (time() + 86400), "/");
    setcookie("tarifa", $tarifa, (time() + 86400), "/");
    setcookie("fase", $fase, (time() + 86400), "/");
    setcookie("id_modulo", $id_modulo, (time() + 86400), "/");
    setcookie("id_inversor", $id_inversor, (time() + 86400), "/");
    setcookie("frete", $frete, (time() + 86400), "/");
    setcookie("cliente", $cliente, (time() + 86400), "/");

    $modulo = buscaModulo($id_modulo, $connection);
    $inversor = buscaInversor($id_inversor, $connection);

    //CONSTANTES
    $conversaoMonetaria = 4440;
    $maoObra = 500;
    $margemLiquida = 0.3;
    $imposto = 0.07;
    
    //ORÇAMENTO
    $irradiacaoMedia = irradiacaoMedia($cliente, $connection);
    $fatorConversao = fatorConversao($irradiacaoMedia);
    $geracaoMensal = $modulo['tamanho'] * $fatorConversao;
    $capacidadeInicial = floor( $consumo / $geracaoMensal * $modulo['potencia'] / 100 )* 100;
    $qtdModulos = floor( $capacidadeInicial / $modulo['potencia'] );
    $espaco = $qtdModulos * $modulo['tamanho'];
    $peso = $espaco * $modulo['peso'];
    $capacidadeFinal = $qtdModulos * $modulo['potencia'] / 1000;
    $custoInicial = $capacidadeFinal * $conversaoMonetaria;
    $custoInstalacao = $capacidadeFinal * $maoObra;
    $margemOperacional = ( $custoInicial + $custoInstalacao ) * $margemLiquida;
    $custoFinal = ( $custoInicial + $custoInstalacao + $margemOperacional + $frete ) / ( 1 - $imposto );
    $custoFinalFormatado = number_format($custoFinal, 2, ',', '.');

    //PAYBACK
    $producaoAnual = floor($qtdModulos * $geracaoMensal * 12);
    $economiaAnual = $producaoAnual * $tarifa;
    $economiaAnualFormatado = number_format($custoFinal, 2, ',', '.');
    $payback = floor($custoFinal / $economiaAnual *10 ) / 10;
    $independencia = floor( $producaoAnual / 12 / $consumo * 100 );



    function irradiacaoMedia($cliente, $connection) {

        $sql_irradiacao = "SELECT irradiacao.indice FROM irradiacao JOIN cliente ON irradiacao.id_cidade = cliente.id_cidade WHERE cliente.id = '$cliente' AND irradiacao.id_cidade = cliente.id_cidade;";
        $res_irradiacao = mysqli_query($connection, $sql_irradiacao) or die(mysqli_error($connection_irradiacao));

        $total=0;

        while ($r_irradiacao = mysqli_fetch_assoc($res_irradiacao)) {                 
            $irradiacao = floatval ( $r_irradiacao['indice'] );
            $total += $irradiacao;
        }
        $media = $total/12;

        return $media;

    }

    function fatorConversao($irradiacaoMedia) {

        $perda = 0.13778;
        $fator = $irradiacaoMedia * $perda * 0.03;
        return $fator;

    }

    function buscaModulo($id_modulo, $connection) {

        $sql_modulo = "SELECT * FROM modulo WHERE id='$id_modulo'";
        $res_modulo = mysqli_query($connection, $sql_modulo) or die(mysqli_error($connection_modulo));

        
        while ($r_modulo = mysqli_fetch_assoc($res_modulo)) {        
            $modulo = array(
                'marca' => $r_modulo['marca'], 
                'modelo' => $r_modulo['modelo'], 
                'potencia' => $r_modulo['potencia'],
                'tamanho' => $r_modulo['tamanho'],
                'peso' => $r_modulo['peso']
            );            
        }

        return $modulo;

    }

    function buscaInversor($id_inversor, $connection) {

        $sql_inversor = "SELECT * FROM inversor WHERE id='$id_inversor'";
        $res_inversor = mysqli_query($connection, $sql_inversor) or die(mysqli_error($connection_inversor));

        
        while ($r_inversor = mysqli_fetch_assoc($res_inversor)) {        
            $inversor = array(
                'marca' => $r_inversor['marca'], 
                'modelo' => $r_inversor['modelo'], 
                'potencia' => $r_inversor['potencia']
            );            
        }

        return $inversor;

    }

       

?>
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

        <!-- <form method="post" action="Contrato.php" class="main"> -->
        <form method="post" onsubmit="return redirect(ajax);" class="main">
            <h1 class="titulo">Visualizar Orçamento</h1>           
            
            <div id="cliente-main" class="row" style="display: flex; justify-content: center;">
            
                <div class="col-lg-4">
                    <div class="card card-body card-cliente">                        
                        <h4>nome</h4>
                        <span>12315654987</span>
                        <span>email@email.com</span>
                        <span>6181818181</span>
                        <span>Minas Gerais</span>
                        <span>Água Doce do Norte</span>
                        <span>qwe</span>
                        <span>rural</span>
                    </div>
                    <div style="text-align: left; padding-top: 15px">

                    </div>
                </div>
                <div class="col-lg-5">
                    
                    <h4>Informações do Sistema</h4>
                    <div class="card card-body card-cliente">
                        <span>Quantidade de módulos: <?php echo $qtdModulos ?></span>
                        <span>Espaço necessário: <?php echo $espaco ?> m²</span>
                        <span>Peso total: <?php echo $peso ?> kg</span>
                        <span>Capacidade do Sistema: <?php echo $capacidadeFinal ?> kWp</span>
                        <span>Módulo: <?php echo $modulo['marca']." ".$modulo['modelo']." ".$modulo['potencia'] ?> Wp</span>
                        <span>Qtd: <?php echo $qtdModulos ?></span>
                        <span>Inversor: <?php echo $inversor['marca']." ".$inversor['modelo']." ".$inversor['potencia'] ?> kW</span>
                    </div>
                    <div style="text-align: left; padding-top: 15px">
                        <h4>Economia</h4>
                        <div class="card card-body card-cliente">
                            <span>Produção Anual do Sistema: <?php echo $producaoAnual ?> kWh</span>
                            <span>Economia Anual: R$ <?php echo $economiaAnualFormatado ?></span>
                            <span>Fator de Independência: <?php echo $independencia ?>%</span>
                            <h5>Payback: <?php echo $payback ?> anos</h5>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-3">
                    <h4>&nbsp;</h4>
                    <label for=""><b>TOTAL:</b></label>
                    <input type="text" class="form-control campo form-control-lg" id="total" placeholder="R$ 00,00" value="<?php echo "R$ ".$custoFinalFormatado ?>" readonly>
                    
                    <div class="print-save">                       
                        <button href="" type="button" role="button" class="btn btn-outline-dark btn-sm">
                            <i class="fas fa-print"></i>
                        </button>
                        <button id="salvar" type="button" role="button" class="btn btn-outline-dark btn-sm">
                            <i class="fas fa-save"></i>&nbsp;Salvar
                        </button>
                    </div>

                    <div class="gerer-contrato"> 
                        <div class="form-check">
                            <label class="form-check-label">
                                <input id="aprovada" type="checkbox" class="form-check-input" value="">Proposta Aprovada?
                            </label>
                        </div>
                        <div>
                            <button href="" id="gerar-contrato" type="submit" role="button" class="btn btn-outline-primary" disabled>Gerar Contrato</button>
                        </div>                      
                    </div>
                        
                </div>
                
                <div class="row controle">
                    
                    <div class="col-md-3">
                        <button id="" onclick="goBack()" class="btn btn-outline-secondary btn-sm">
                            <i class="fas fa-chevron-left"></i>&nbsp;Voltar
                        </button>
                    </div>
                    <div class="col-md-1"></div>
                    <div class="col-md-3">
                        <button id="" onclick="location.href='Cliente.php'" role="button" class="btn btn-outline-danger btn-sm">
                            <i class="fas fa-times"></i>&nbsp;Cancelar
                        </button>  
                    </div>
                </div>
                
            </div>
        </form>

    </div>

</body>

<script src="../static/js/jquery.min.js"></script>
<script src="../static/js/bootstrap.min.js"></script>
<script src="../static/fontawesome/js/all.min.js"></script>


<script>
    function redirect(ajax) {
        if (ajax==true) {
            orcamento = getCookie('id_orcamento');
            location.href="Contrato.php?id_orcamento="+orcamento;
            return false;
        } else {
            location.href="../resources/salvaOrcamento.php";
            return false;
        }
    }
</script>

<script>

    function getCookie(name) {
        var value = "; " + document.cookie;
        var parts = value.split("; " + name + "=");
        if (parts.length == 2) return parts.pop().split(";").shift();
    }


    function confirma(msg) {
        if (msg) {            
            alert(msg);
        }
    }

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

<script>

    $("#salvar").click(function() {
        ajax();
    });

    
    function ajax() {

        $(document.body).css({'cursor' : 'wait'});
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp=new XMLHttpRequest();
        } else {  // code for IE6, IE5
            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }

        xmlhttp.onreadystatechange=function() {
            if (this.readyState==4 && this.status==200) {
                msg = this.responseText;
                confirma(msg);
                $("#salvar").prop('disabled', true);
                ajax = true;
                return ajax;
            }
        }

        xmlhttp.open("GET","../resources/salvaOrcamento.php?ajax=true",true);
        xmlhttp.send();

        $(document.body).css({'cursor' : 'default'});
    }
    
</script>

</html>