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
    $smsg = "Data not inserted, please try again later.";
}
    
echo ($smsg."<br>");

while($r = mysqli_fetch_assoc($res)){
    ?>
    <?php echo $r['id']; ?>
    <?php echo $r['nome']; ?>
    <?php echo $r['email']; ?>
    <?php echo $r['telefone']; ?>
    <?php echo $r['uf']; ?>
    <?php echo $r['cidade']; ?>
    <?php echo $r['endereco']; ?>
    <?php echo $r['imovel']; ?>
 
<?php } ?>


<h1>post php</h1>

<?php

