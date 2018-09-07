<?php

require_once('connect.php'); 

$sql = "SELECT * FROM cliente";
$res = mysqli_query($connection, $sql) or die(mysqli_error($connection));

while($r = mysqli_fetch_assoc($res)) {
    echo $r['id'].("<br>");
    echo $r['nome'].("<br>");
    echo $r['email'].("<br>");
    echo $r['telefone'].("<br>");
    echo $r['uf'].("<br>");
    echo $r['cidade'].("<br>");
    echo $r['endereco'].("<br>");
    echo $r['imovel'].("<br><br>");
}

// if($res){
//     $smsg = "Successfully inserted data, Insert New data.";
// }else{
//     $smsg = "Data not inserted, please try again later.";
// }    
// echo ($smsg."<br>");

$r = mysqli_fetch_assoc($res);

// echo ($id);

echo ('nome');

// if(isset($_POST) & !empty($_POST)){
// 	$fname = mysql_real_escape_string($_POST['fname']);
// 	$lname = mysql_real_escape_string($_POST['lname']);
// 	$email = mysql_real_escape_string($_POST['email']);
// 	$gender = $_POST['gender'];
// 	$age = $_POST['age'];
// }

// ALTER TABLE table_name AUTO_INCREMENT = 1; RESET AUTOINCREMENT



?>
