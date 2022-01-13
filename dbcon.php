<?php 
$hostname ="localhost";
$database ="conexionarduino";
$username ="root";
$password ="";

$conexion = new  mysqli("localhost","root","","conexionarduino");

if ($conexion){

}else{
    echo "Conexion Fallida";
}

?>