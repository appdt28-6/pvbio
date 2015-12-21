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
$pdf->Cell(4,10,'        Recibo de Pago            ');
$pdf->Ln();
$pdf->cell(40,10, date("Y-m-d"));
$pdf->cell(40,10,date("H:i:s"));
$pdf->Ln();
$pdf->Cell(4,10,'----------------------------------------------------------------------');
$pdf->Ln();
$pdf->Cell(40,10,'Concepto           Importe   ');
$pdf->Ln();
$query1 = "select MAX(id_pago) as max from pagos";
$result1 = mysql_query($query1);
while($row = mysql_fetch_array($result1))
{
$max=$row['max'];
}

$query = "select concepto,cantidad,fecha from pagos where id_pago='$max' ";
$result = mysql_query($query);
while($row = mysql_fetch_array($result))
{
$pdf->Cell(4,1,$row['concepto']."    | ".$row['cantidad'])."\n";
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
