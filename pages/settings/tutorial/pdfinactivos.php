<?php
include ('../connect.php');
date_default_timezone_set('mexico/general');
$fch1=date("Y-m-d")." 00:00:00";
$fch2=date("Y-m-d")." 23:59:59";
require('../fpdf.php');

$pdf =new FPDF('P', 'mm', 'letter');
$pdf->AddPage();  
$pdf->SetFont('Arial','B',12);
$pdf->Image("../images/logo.png","87","10","40","10");
$pdf->Cell(0,5,'',0,1,'C');
$pdf->Cell(0,5,'',0,1,'C');
$pdf->Cell(0,5,'',0,1,'C');
$pdf->Cell(0,5,'LISTADO DE SOCIOS',0,1,"C");
$pdf->SetFont('Arial','B',10);
$pdf->Cell(70,5,'Nombre',1,0,'C');
$pdf->Cell(60,5,'Telefono',1,0,'C');
$pdf->Cell(67,5,'Membresia',1,1,'C');
$query = "SELECT socios.id_socio as id, CONCAT(socios.nombre, ,socios.ap) as nombre,socios.membresia as membre,socios.telefono as tel FROM acceso inner join socios on socios.id_socio=acceso.id_socio where acceso.status=0";
$pdf->SetFont('Arial','',8);
$result = mysql_query($query);
while($row = mysql_fetch_array($result))
{
$pdf->Cell(70,5,$row['nombre'],1);
$pdf->Cell(60,5,$row['telefono'],1);
$pdf->Cell(67,5,$row['membresia'],1,1);


}
                                   
$pdf->Output('Listado de Socios','I');
?>
