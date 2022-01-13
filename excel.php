<?php

require 'conexionexcel.php';

$query = mysqli_query($con, "SELECT * FROM recibidos order by id desc, fecha2 asc ");
$docu= "ResumenDeDatos.xls";
header('Content-type: application/vnd.ms-excel');
header('Content-Disposition: attachment; filename='.$docu);
header('Pragma: no-cache');
header('Expires: 0');
echo '<table border=1';
echo '<tr>';
echo '<th colspan=6> Resumen de datos</th>';
echo '</tr>';
echo '<tr><th>Fecha</th><th>Hora</th><th>Temperatura</th><th>Humedad</th><th>Gas</th><th>EjeX</th><th>EjeY</th><th>EjeZ</th></tr>';

while ($row=mysqli_fetch_array($query)) {
    echo '<tr>';
    echo '<td>'.$row['fecha2'].'</td>';
    echo '<td>'.$row['hora'].'</td>';
    echo '<td>'.$row['temperatura'].'</td>';
    echo '<td>'.$row['humedad'].'</td>';
    echo '<td>'.$row['gas'].'</td>';
    echo '<td>'.$row['ejex'].'</td>';
    echo '<td>'.$row['ejey'].'</td>';
    echo '<td>'.$row['ejez'].'</td>';
    echo '</tr>';
}
echo '</table>';

