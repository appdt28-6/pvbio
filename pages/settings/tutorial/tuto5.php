<?php
include ('../connect.php');
date_default_timezone_set('mexico/general');
$fch1=date("Y-m-d")." 00:00:00";
$fch2=date("Y-m-d")." 23:59:59";
require('../fpdf.php');

$pdf =& new FPDF('P', 'mm', array(80, 297));
$pdf->AddPage();  
$pdf->SetFont('Arial','B',8);
$pdf->Cell(4,1,'              BIOGYM GEOVILLAS');
$pdf->Ln();
$pdf->Cell(4,10,'   BLVD NUEVO HIDALGO 100 LOCAL3');
$pdf->Cell(4,20,'     FRACC GEOVILLAS C.P. 42083');
$pdf->Ln();
$pdf->Cell(4,10,'         Asistencia de Personal      ');
$pdf->Ln();
$pdf->cell(40,10, date("Y-m-d"));
$pdf->cell(40,10,date("H:i:s"));
$pdf->Ln();
$pdf->Cell(40,10,'Comprobante de asistencia');
$pdf->Ln();
$pdf->Cell(4,10,'----------------------------------------------------------------------');
$pdf->Ln();
$pdf->Cell(40,10,'  id            Llegada           Salida');
$pdf->Ln();


$query = "SELECT usuarios.username as nombre, asistencia_personal.fecha as fecha,asistencia_personal.llegada as llegada,asistencia_personal.salida as salida FROM asistencia_personal inner join usuarios on asistencia_personal.id_usuario=usuarios.idUsuario where asistencia_personal.fecha BETWEEN '$fch1' AND '$fch2' ";
$result = mysql_query($query);
while($row = mysql_fetch_array($result))
{
$pdf->Cell(4,1,$row['nombre']."  |  ".$row['llegada']."    | ".$row['salida'] )."\n";
$pdf->Ln();	
$pdf->Ln();	
$pdf->Ln();	
$pdf->Ln();	
}
                        
$pdf->Cell(4,10,'----------------------------------------------------------------------');
$pdf->Ln();

$pdf->Ln();
$pdf->Cell(40,10,'                   Firma de enterado');
$pdf->Ln();
$pdf->Cell(40,10,'         ------------------------------------');
                                   
$pdf->Output();
?>
