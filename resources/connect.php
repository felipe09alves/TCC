<?php

$connection = mysqli_connect('localhost', 'sollar', 'sollar-admin');
if (!$connection){
    die("Database Connection Failed" . mysqli_error($connection));
}
$select_db = mysqli_select_db($connection, 'sol lar');
if (!$select_db){
    die("Database Selection Failed" . mysqli_error($connection));
}

mysqli_query($connection ,"SET NAMES 'utf8'");
mysqli_query($connection ,'SET character_set_connection=utf8');
mysqli_query($connection ,'SET character_set_client=utf8');
mysqli_query($connection ,'SET character_set_results=utf8');
 

?>