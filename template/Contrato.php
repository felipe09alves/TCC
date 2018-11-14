<?php 
    require_once('../resources/session.php');
    require('../resources/connect.php');

    unset($_COOKIE['id_contrato']);
    unset($_SESSION['confirmaOrcamento']);

    if (isset($_GET['id_orcamento']) & !empty($_GET['id_orcamento'])) {

        $id_orcamento = $_GET['id_orcamento'];
        $sql_orcamento = "SELECT * FROM orcamento where id = ".$id_orcamento;
        $res_orcamento = mysqli_query($connection, $sql_orcamento) or die(mysqli_error($connection_orcamento));

        while ($r = mysqli_fetch_assoc($res_orcamento)) {
            $consumo = ($r['consumo']);
            $tarifa = ($r['tarifa']);
            $fase = ($r['fase']);
            $id_modulo = ($r['id_modulo']);
            $id_inversor =  ($r['id_inversor']);
            $frete =  ($r['frete']);
            $id_cliente =  ($r['id_cliente']);
        }

    }else if (isset($_COOKIE) & !empty($_COOKIE)) {
        $id_orcamento = $_COOKIE["id_orcamento"];
        $consumo = $_COOKIE["consumo"];
        $tarifa = $_COOKIE["tarifa"];
        $fase = $_COOKIE["fase"];
        $id_modulo = $_COOKIE["id_modulo"];
        $id_inversor = $_COOKIE["id_inversor"];
        $frete = $_COOKIE["frete"];
        $id_cliente = $_COOKIE["cliente"];
    } else {
        echo "<h1>Erro! Tente novamente.</h1>";
    }


    // Cliente
    $sql_cliente = "SELECT * FROM cliente where id = ".$id_cliente;
    $res_cliente = mysqli_query($connection, $sql_cliente) or die(mysqli_error($connection_cliente));

    while ($r = mysqli_fetch_assoc($res_cliente)) {
        $nome_cliente = ($r['nome']);
        $cpf = formataCPF($r['cpf']);
        $telefone = ($r['telefone']);
        $endereco = ($r['endereco']);        
        $id_cidade = ($r['id_cidade']);
    }
    
    

    // Cidade
    $sql_cidade = "SELECT * FROM cidade where id = ".$id_cidade;
    $res_cidade = mysqli_query($connection, $sql_cidade) or die(mysqli_error($connection_cidade));

    while ($r = mysqli_fetch_assoc($res_cidade)) {
        $nome_cidade = ($r['nome']);
        $id_estado = ($r['id_estado']);
    }

    echo $id_cidade."<br>";

    //Estado
    $sql_estado = "SELECT * FROM estado where id = ".$id_estado;
    $res_estado = mysqli_query($connection, $sql_estado) or die(mysqli_error($connection_estado));

    while ($r = mysqli_fetch_assoc($res_estado)) {
        $nome_estado = ($r['nome']);
    }

    setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
    date_default_timezone_set('America/Sao_Paulo');
    $data = strftime('%d de %B de %Y', strtotime('today'));

    $modulo = buscaModulo($id_modulo, $connection);
    $inversor = buscaInversor($id_inversor, $connection);

    //CONSTANTES
    $conversaoMonetaria = 4440;
    $maoObra = 500;
    $margemLiquida = 0.3;
    $imposto = 0.07;
    
    //ORÇAMENTO
    $irradiacaoMedia = irradiacaoMedia($id_cliente, $connection);
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

    function formataCPF($cpf) {
        $novo = substr_replace($cpf, '.', 3, 0);
        $novo = substr_replace($novo, '.', 7, 0);
        $novo = substr_replace($novo, '-', 11, 0);
        return $novo;
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

        <!-- <form method="post" action="../resources/salvaContrato.php?id_orcamento=<?php echo $id_orcamento ?>" class="main"> -->
        <form method="post" onsubmit="return redirect(ajax);" class="main">
            <h1 class="titulo">Contrato</h1>           
            
            <div id="cliente-main" class="row" style="display: flex; justify-content: center;">
            
                <div class="row" style="margin: 15px;">
                    <!-- <h4>&nbsp;</h4> -->
                    <div class="card card-body card-cliente">                        
                        <h4>CONTRATO PARTICULAR DE SERVIÇOS INSTALAÇÃO DE SISTEMA SOLAR</h4>
                        <br>
                        <span>Por meio deste instrumento “CONTRATO PARTICULAR DE SERVIÇOS”, de um lado: A empresa SOL LAR ENERGIA LTDA,  com sede nesta cidade de João Pinheiro-Mg, junto à Rua Capitão Sancho 596 s/ 104, inscrita no CNPJ 24.311.237/0001-51 doravante denominado de simplesmente Contratante, e do outro lado: <?php echo strtoupper($nome_cliente) ?>, residente nesta cidade de <?php echo ucfirst($nome_cidade) ?>, <?php echo ucfirst($nome_estado) ?> inscrito no CPF <?php echo $cpf ?>, denominado contratado, tem entre si acertado o seguinte:</span>
                        <br>
                        <li>Cláusula 1ª - Caberá ao Contratado desenvolver atividades de instalação de serviços do sistema solar fotovoltaico.</li>

                        <li>Cláusula 2ª – 	Os serviços serão prestados junto à <?php echo $endereco ?>, residência do Contratante <?php echo strtoupper($nome_cliente) ?>.</li>

                        <li>Cláusula 3ª – A vigência do presente contrato será por tempo indeterminado, tendo seu início em <?php echo $data ?>, e com uma previsão estimada de termino em 30 dias;</li>
                        <span style="margin-left: 2em;"><?php echo $qtdModulos ?> MÓDULOS FOTOVOLTAICOS <?php echo $modulo['marca']." ".$modulo['modelo']." ".$modulo['potencia'] ?> Wp</span>
                        <span style="margin-left: 2em;">01 INVERSOR <?php echo $inversor['marca']." ".$inversor['modelo']." ".$inversor['potencia'] ?>kW</span>
                        <li>Cláusula 5ª – Dá entrega do serviço: O serviço será entregue até 30 dias, podendo sofrer prorrogação por até 07 (sete) dias à medida que for encontrando dificuldades.</li>
                        <br><br>
                        <span style="text-align: center;">Brasília, 19 de fevereiro de 2018</span>
                        <br><br>
                        <div class="row">
                            <div class="col-6">
                                <div class="assinatura" style="text-align: center;"></div>
                                <div style="text-align: center;">Contratante</div>
                            </div>
                            <div class="col-6">
                                <div class="assinatura" style="text-align: center;"></div>
                                <div style="text-align: center;">Contratado</div>
                            </div>
                        </div>
                    </div>
                    <div style="text-align: left; padding-top: 15px">

                    </div>
               </div>
               
                <div class="print-save" style="text-align: left; width: 100%">
                    <button href="" type="button" role="button" class="btn btn-outline-dark btn-sm">
                        <i class="fas fa-print"></i>
                    </button>
                    <button id="salvar" type="button" role="button" class="btn btn-outline-dark btn-sm" 

                    <?php  if (isset($_GET['disabled']) & !empty($_GET['disabled']) & !empty($_GET['disabled']) === true) {
                        echo 'disabled' ;
                    }?> >
                        <i class="fas fa-save"></i>&nbsp;Salvar
                    </button>
                </div>

                <div class="row controle">
                    
                    <div class="col-md-3">
                        <button id="" type="button" onclick="goBack()" class="btn btn-outline-secondary btn-sm">
                            <i class="fas fa-chevron-left"></i>&nbsp;Voltar
                        </button>
                    </div>
                    <div class="col-md-3">
                        <button id="" type="button" onclick="location.href='Cliente.php'" role="button" class="btn btn-outline-danger btn-sm">
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


<script>
    function redirect(ajax) {
        if (ajax==true) {
            contrato = getCookie('id_contrato');
            location.href="AbrirOS.php?id_contrato="+contrato;
            return false;
        } else {
            location.href="../resources/salvaContrato.php?id_orcamento=<?php echo $id_orcamento ?>";
            return false;
        }
    }
</script>

<script>
    function goBack() {
        history.back();
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

        xmlhttp.open("GET","../resources/salvaContrato.php?id_orcamento=<?php echo $id_orcamento ?>&ajax=true",true);
        xmlhttp.send();

        $(document.body).css({'cursor' : 'default'});
    }
    
</script>

</html>