<?php
	//////////////// CONEXION A LA BD ////////////////////
	$host="localhost";
	$usuario="root";
	$contraseña="";
	$base="conexionarduino";
	$conexion=new mysqli($host,$usuario,$contraseña,$base);
	
	if(!empty($datos)){
		echo json_encode($datos);
	}else{
		echo json_encode([]);
	}
?>