<meta charset="UTF-8">
<?php


    
    require('connect.php');
    $sql_inversor = "SELECT * FROM inversor";
    $res_inversor = mysqli_query($connection, $sql_inversor) or die(mysqli_error($connection_inversor));

    while ($r_inversor = mysqli_fetch_assoc($res_inversor)) {        
        echo ("<option value='".$r_inversor['id']."'>".$r_inversor['marca']." - ".$r_inversor['modelo']."</option>");
    }

?>