<?php
require('fpdf/fpdf.php');


class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Movernos a la derecha
    $this->Cell(70);
    // Título
    $this->Cell(50,10,'Resumen de datos',1,0,'C');
    // Salto de línea
    $this->Ln(20);

$this->Cell(28,10,'Fecha',1,0,'C',0);
$this->Cell(28,10,'Hora',1,0,'C',0);
$this->Cell(34,10,'Temperatura',1,0,'C',0);
$this->Cell(27,10,'Humedad',1,0,'C',0);
$this->Cell(19,10,'Gas',1,0,'C',0);
$this->Cell(19,10,'Eje x',1,0,'C',0);
$this->Cell(19,10,'Eje y',1,0,'C',0);
$this->Cell(19,10,'Eje z',1,1,'C',0);
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,'Pagina '.$this->PageNo().'/{nb}',0,0,'C');
}
}

require ("php/cn.php");
$consulta = "SELECT * FROM recibidos order by id desc, fecha2 asc";
$resultado = mysqli_query($conexion,$consulta);	

$pdf = new PDF();
$pdf -> AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',13);

while ($row = $resultado->fetch_assoc()) {
	
$pdf->Cell(28,10,$row['fecha2'],1,0,'C',0);
$pdf->Cell(28,10,$row['hora'],1,0,'C',0);
$pdf->Cell(34,10,$row['temperatura'],1,0,'C',0);
$pdf->Cell(27,10,$row['humedad'],1,0,'C',0);
$pdf->Cell(19,10,$row['gas'],1,0,'C',0);
$pdf->Cell(19,10,$row['ejex'],1,0,'C',0);
$pdf->Cell(19,10,$row['ejey'],1,0,'C',0);
$pdf->Cell(19,10,$row['ejez'],1,1,'C',0);

}

$pdf->Output();
?>