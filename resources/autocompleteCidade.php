<?php

    require('connect.php');

    $uf = $_GET['uf'];
    $busca = $_GET['term'];    
    
    $sql = $connection->query("SELECT * FROM cidade WHERE id_estado = '$uf' AND LOWER(nome) LIKE LOWER(_utf8'$busca%') collate utf8_general_ci;");

    $cidade = array();
    if($sql->num_rows > 0){
        while($row = $sql->fetch_assoc()){
            $data['id'] = $row['id'];
            $data['cidade'] = $row['nome'];
            array_push($cidade, $data);
        }
    }

    echo json_encode($cidade);
    
?>