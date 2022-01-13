<?php

function conexion(){
    return mysqli_connect('localhost','root','','conexionarduino');
}


$conexion = conexion();
$sql = "SELECT * FROM recibido1 order by id desc, fecha asc";
$resultado = mysqli_query($conexion,$sql);
$datos = mysqli_fetch_all($resultado,MYSQLI_ASSOC);

if(!empty($datos)){
    echo json_encode($datos);
}else{
    echo json_encode([]);
}