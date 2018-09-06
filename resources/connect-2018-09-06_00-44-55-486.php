<?php

echo ("<h2>connect.php</h2><br>");

$connection = mysqli_connect('localhost', 'sollar', 'sollar-admin');
if (!$connection){
    die("Database Connection Failed" . mysqli_error($connection));
}
$select_db = mysqli_select_db($connection, 'sol lar');
if (!$select_db){
    die("Database Selection Failed" . mysqli_error($connection));
}

echo ("test <br>");

$sql = "SELECT * FROM cliente";

$res = mysqli_query($connection, $sql) or die(mysqli_error($connection));

if($res){
    $smsg = "Successfully inserted data, Insert New data.";
}else{
    $fmsg = "Data not inserted, please try again later.";
}
    
echo ($smsg."<br>");
echo ($fmsg);

while($r = mysqli_fetch_assoc($res)){
    echo $r['id'].("<br>");
    echo $r['nome'].("<br>");
    echo $r['email'].("<br>");
    echo $r['telefone'].("<br>");
    echo $r['uf'].("<br>");
    echo $r['cidade'].("<br><br>");
    echo $r['endereco'].("<br>");
    echo $r['IMOVEL'].("<br>");

}
