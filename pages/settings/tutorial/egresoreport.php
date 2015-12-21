<?php
include ('../connect.php');
date_default_timezone_set('mexico/general');
$mes=date("m");
require('../fpdf.php');

$pdf =& new FPDF('P', 'mm', array(80, 297));
$pdf->AddPage();  
$pdf->SetFont('Arial','B',8);
$pdf->Cell(4,1,'              BIOGYM GEOVILLAS');
$pdf->Ln();
$pdf->Cell(4,10,'   BLVD NUEVO HIDALGO 100 LOCAL3');
$pdf->Cell(4,20,'     FRACC GEOVILLAS C.P. 42083');
$pdf->Ln();
$pdf->Cell(4,10,'         Resumen de Egresos del mes de: '.date("M"));
$pdf->Ln();
$pdf->cell(40,10, date("Y-m-d"));
$pdf->cell(40,10,date("H:i:s"));
$pdf->Ln();
$pdf->Cell(40,10,'Listado');
$pdf->Ln();
$pdf->Cell(4,10,'----------------------------------------------------------------------');
$pdf->Ln();
$pdf->Cell(40,10,'  id            Concepto           Importe       Fecha    ');
$pdf->Ln();


$query = "select pagos.id_pago as id_pago,gastos_fijos.concepto as concepto,pagos.cantidad as cantidad,SUBSTRING_INDEX(SUBSTRING_INDEX(pagos.fecha, ' ', 1), ' ', -1) AS 'fecha' from pagos inner join gastos_fijos on pagos.concepto=gastos_fijos.id_gasto where pagos.mes='$mes' order by gastos_fijos.concepto ";
$result = mysql_query($query);
while($row = mysql_fetch_array($result))
{
$pdf->Cell(4,1,$row['id_pago']."  |  ".$row['concepto']."    | ".$row['cantidad']."    | ".$row['fecha'])."\n";
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
