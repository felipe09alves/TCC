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
    
    
    
    // $id=10;


    $inicial = "2018-11-08";
    $final = "2018-11-10";
    
    // $difInicial = new DateTime($inicial);
    // $difFinal = new DateTime($final);

    // $interval = $difInicial->diff($difFinal);
    // $sinal = $interval->format('%R');
    // $dif = $interval->format('%a');
    // $tudo = $interval->format('%R%a');

    // echo $sinal."  ".$dif."  <br>";
    // echo $tudo."  <br>";

    // $nova = date("Y-m-d", strtotime($final."$tudo days"));

    // $diff = $interval->format('%a');

    // $novaInicial = date("Y-m-d", strtotime($inicial."-$diff days"));
    // $novaFinal = date("Y-m-d", strtotime($final."-$diff days"));

    // echo $novaInicial."  ".$novaFinal."  <br>";
   

    $sql = "SELECT OS.DATA_ABERTURA AS aber , COUNT(OS.ID) AS VENDAS FROM OS 
        JOIN CONTRATO ON OS.ID_CONTRATO = CONTRATO.ID 
        JOIN orcamento ON CONTRATO.ID_ORCAMENTO = ORCAMENTO.ID 
        JOIN CLIENTE ON ORCAMENTO.ID_CLIENTE = CLIENTE.ID 
        JOIN CIDADE ON CLIENTE.ID_CIDADE = CIDADE.ID
        WHERE data_abertura BETWEEN '$inicial' AND '$final'
        GROUP BY OS.DATA_ABERTURA ORDER BY OS.DATA_ABERTURA";
        // echo $sql."
        // ";
        $res = mysqli_query($connection, $sql) or die(mysqli_error($connection));

        $array['data']=0;
        $array['vendas']=0;

        while ($r = mysqli_fetch_assoc($res)) {
            // $array['data'] = $r['abertura'];
            echo $r['ABERTURA'];
        }
