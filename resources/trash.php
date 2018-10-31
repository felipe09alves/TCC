<meta charset="UTF-8">
<?php
header('Content-Type: text/html; charset=utf-8');
require_once('connect.php');

// $sql = "SELECT cliente.*, estado.nome as estado, cidade.nome as cidade from cliente join estado on cliente.id_estado = estado.id join cidade on cliente.id_cidade = cidade.id WHERE cliente.id=1";
// $sql = "SELECT nome FROM `cidade` WHERE lower(nome) like lower(_utf8'joao') collate utf8_general_ci;";
// $res = mysqli_query($connection, $sql) or die(mysqli_error($connection));

//     // $sql = "SELECT ID FROM CLIENTE WHERE CPF='12345678915'";
    
//     // $r = mysqli_fetch_assoc($res);
//     // echo $sql;
//     // echo "id: ".$r['ID'];
//     $r = mysqli_fetch_assoc($res);
// if ($r) {
//     echo("entrou");
//     while($r = mysqli_fetch_assoc($res)) {
//         // echo $r['id'].(" ");
//         // echo $r['sigla'].(" ");
//         // echo $r['estado'].(" ");
//         echo $r['nome'].("<br><br>");
//     }
// } else {
//     echo("nop");
// }



// while($r = mysqli_fetch_assoc($res)) {
//     echo $r['id'].("<br>");
//     echo $r['nome'].("<br>");
//     echo $r['email'].("<br>");
//     echo $r['telefone'].("<br>");
//     echo $r['uf'].("<br>");
//     echo $r['cidade'].("<br>");
//     echo $r['endereco'].("<br>");
//     echo $r['imovel'].("<br><br>");
// }

// if($res){
//     $smsg = "Successfully inserted data, Insert New data.";
// }else{
//     $smsg = "Data not inserted, please try again later.";
// }
// echo ($smsg."<br>");

// $r = mysqli_fetch_assoc($res);

//  echo($r);


// if(isset($_POST) & !empty($_POST)){
// 	$fname = mysql_real_escape_string($_POST['fname']);
// 	$lname = mysql_real_escape_string($_POST['lname']);
// 	$email = mysql_real_escape_string($_POST['email']);
// 	$gender = $_POST['gender'];
// 	$age = $_POST['age'];
// }

// ALTER TABLE table_name AUTO_INCREMENT = 1; RESET AUTOINCREMENT

// if(isset($_POST) & !empty($_POST)){
// 	$nome = mysqli_real_escape_string($connection, $_POST['nome']);
// 	$cpf = ($_POST['cpf']);
// 	$email = mysqli_real_escape_string($connection, $_POST['email']);
// 	$telefone = ($_POST['telefone']);
// 	$uf =  ($_POST['uf']);
// 	$cidade =  mysqli_real_escape_string($connection, $_POST['cidade']);
// 	$endereco =  ($_POST['endereco']);
// 	$imovel =  ($_POST['imovel']);
// }



        
        // $cidade="taguatinga";
        // $uf=7;

        // $sql = "SELECT id, nome FROM cidade WHERE lower(nome) like lower(_utf8'$cidade') collate utf8_general_ci;";
        // $res = mysqli_query($connection, $sql) or die(mysqli_error($connection));
        // $r = mysqli_fetch_assoc($res);

        // if ($r) {
        //     echo $r['id'];
        //     echo $r['nome'];
        // } else {
        //     $sql = "INSERT INTO cidade (id_estado, nome) VALUES ('$uf', '$cidade')";
        //     $res = mysqli_query($connection, $sql) or die(mysqli_error($connection));

        //     $sql = "SELECT id FROM cidade WHERE nome='".$cidade."';";
        //     $res = mysqli_query($connection, $sql) or die(mysqli_error($connection));
        //     $novo = mysqli_fetch_assoc($res);
        //     echo $novo['id'];
        //     echo $novo['nome'];
        // }


        // require_once('connect.php');
        // // $busca = "nome";
        // $busca = "04295619116";
        // $sql = "SELECT * FROM cliente where lower(nome) like lower(_utf8'%$busca%') collate utf8_general_ci;";
        // $res = mysqli_query($connection, $sql) or die(mysqli_error($connection));

        // // while ($r = mysqli_fetch_assoc($res)) {
        // //     echo ($r['nome'])."<br>";
        // // }

        // if (mysqli_num_rows($res)) {
        //     // echo ("tem o ".$nome);
        //     // while ($r = mysqli_fetch_assoc($res)) {
        //     //     echo ("Nome: ".$r['nome'])."<br>";
        //     // }
        //     lista($res);
        // } else {
        //     echo ("cpf");
        //     $sql = "SELECT * FROM cliente where cpf=$busca";
        //     $res = mysqli_query($connection, $sql) or die(mysqli_error($connection));
        //     lista($res);
        // }
    
    
    
    $id=9;

    $sql_orcamento = "SELECT * FROM orcamento where id = ".$id;
    $res_orcamento = mysqli_query($connection, $sql_orcamento) or die(mysqli_error($connection_orcamento));

    while ($r = mysqli_fetch_assoc($res_orcamento)) {
        $consumo = ($r['consumo']);
        $tarifa = ($r['tarifa']);
        $fase = ($r['fase']);
        $id_modulo = ($r['id_modulo']);
        $id_inversor =  ($r['id_inversor']);
        $frete =  ($r['frete']);
        $cliente =  ($r['id_cliente']);
        $data =  ($r['data']);
    }

    $modulo = buscaModulo($id_modulo, $connection);
    $inversor = buscaInversor($id_inversor, $connection);

    echo $modulo['peso']."<br>";
    echo $inversor['modelo']."<br>";
    echo $inversor['potencia']."<br><br>";

    //CONSTANTES
    $conversaoMonetaria = 4440;
    $maoObra = 0.5;
    $margemLiquida = 0.3;
    $imposto = 0.07;
    
    //ORÇAMENTO
    $irradiacaoMedia = irradiacaoMedia($cliente, $connection);
    $fatorConversao = fatorConversao($irradiacaoMedia);
    $consumoInicial = $fatorConversao * $consumo;
    $geracaoMensal = $modulo['potencia'] * $fatorConversao;
    $qtdModulos = ceil( $consumoInicial / $modulo['potencia'] );
    $espaco = $qtdModulos * $modulo['tamanho'];
    $peso = $espaco * $modulo['peso'];
    $capacidadeFinal = $qtdModulos * $modulo['potencia'] / 1000;
    $custoInicial = $capacidadeFinal * $conversaoMonetaria;
    $custoInstalacao = $capacidadeFinal * $maoObra;
    $margemOperacional = ( $custoInicial + $custoInstalacao ) * $margemLiquida;
    $custoFinal = ( $custoInicial + $custoInstalacao + $margemOperacional + $frete ) / ( 1 - $imposto );


    //PAYBACK





    // echo $capacidadeFinal;




    

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

        $perda = 0.05;
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
