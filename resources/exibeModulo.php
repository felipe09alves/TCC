<meta charset="UTF-8">
<?php


    
    require('connect.php');
    $sql_modulo = "SELECT * FROM modulo";
    $res_modulo = mysqli_query($connection, $sql_modulo) or die(mysqli_error($connection_modulo));

    while ($r_modulo = mysqli_fetch_assoc($res_modulo)) {        
        echo ("<option value='".$r_modulo['id']."'>".$r_modulo['marca']." - ".$r_modulo['modelo']."</option>");
    }

?>