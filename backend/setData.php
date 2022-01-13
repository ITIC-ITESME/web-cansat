<?php 
    
    include './connect.php';

    $temperatura = $_GET['temp'];
    $humedad = $_GET['hum'];
    $gas = $_GET['gas'];
    $ejex = $_GET['ejx'];
    $ejey = $_GET['ejy'];

    echo "La temperatura es:".$temperatura."<br>La humedad es:".$humedad."<br>El gas es:".$gas."<br>El eje X es:".$ejex."<br>El eje Y es:".$ejey;

    
    $consulta = "INSERT INTO recibido1 (temperatura, humedad, gas, ejex, ejey) VALUES (".$temperatura.", ".$humedad.", ".$gas.", ".$ejex.", ".$ejey.")";

    $resultado = mysqli_query($conexion, $consulta);

?>