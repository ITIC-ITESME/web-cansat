<?php

include './connect.php';
$json=array();

$connect = mysqli_connect($hostname, $username, $password, $database);
$query = "SELECT * from recibidos order by id desc limit 1 "; //tomar los ultimos registros de la base de datos
$results = mysqli_query($connect, $query);
    
if($data=mysqli_fetch_array($results)){ //tomar datos y lo convertimos en Json
    $result["temperatura"]=$data['temperatura'];
    $result["humedad"]=$data['humedad'];
    $result["gas"]=$data['gas'];
    $result["fecha2"]=$data['fecha3'];
    $result["hora"]=$data['hora'];

    $json=$result;
}else{
    $result["temperatura"]='0';
    $result["humedad"]='0';
    $result["gas"]='0';
    $result["fecha2"]='0';
    $result["hora"]='0';
    $json=$result;
}

mysqli_close($connect);
echo json_encode($json);