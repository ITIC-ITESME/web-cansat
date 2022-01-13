<?php
	require_once "php/conexion.php";
	$conexion=conexion();
	$sql="SELECT ejex,ejey,ejez
			from recibido1 order by id desc limit 1";
	$result=mysqli_query($conexion,$sql);
	$valoresY=array();
	$valoresX=array();
    $valoresz=array();

	while ($ver=mysqli_fetch_row($result)) {
		$valoresY[]=$ver[1];
		$valoresX[]=$ver[0];
        $valoresz[]=$ver[2];
	}

	$datosX=json_encode($valoresX);
	$datosY=json_encode($valoresY);
    $datosZ=json_encode($valoresz);
 ?>

<div id="graficaBarras"></div>

<script type="text/javascript">
	function crearCadenaBarras2(json){
		var parsed = JSON.parse(json);
		var arr = [];
		for(var x in parsed){
			arr.push(parsed[x]);
		}
		return arr;
	}
</script>

<script type="text/javascript">

	datosX=crearCadenaBarras2('<?php echo $datosX ?>');
	datosY=crearCadenaBarras2('<?php echo $datosY ?>');
    datosZ=crearCadenaBarras2('<?php echo $datosZ ?>');

	var data = [
		{
			x: datosX,
			y: datosY,
            z: datosZ,
			type: 'bar'
		}
	];

	Plotly.newPlot('graficaBarras', data);
</script>