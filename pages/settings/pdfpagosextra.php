<?php
include ('../connect.php');
date_default_timezone_set('mexico/general');
$fch1=date("Y-m-d")." 00:00:00";
$fch2=date("Y-m-d")." 23:59:59";
require('../fpdf.php');

$pdf =new FPDF('P', 'mm', array(80, 297));
$pdf->AddPage();  
$pdf->SetFont('Arial','B',12);
$pdf->Image("../images/logo.png","25","10","30","10");
$pdf->Cell(0,5,'',0,1,'C');
$pdf->Cell(4,1,'                 BIOGYM GEOVILLAS');
$pdf->Ln();
$pdf->Cell(4,10,'   BLVD NUEVO HIDALGO 100 LOCAL 3');
$pdf->Cell(4,20,'     FRACC GEOVILLAS C.P. 42083');

$pdf->cell(40,10, date("Y-m-d"));
$pdf->cell(40,10,date("H:i:s"));
$pdf->Cell(0,5,'Registro de Pagos Extra (Egresos)',0,1,"C");

$pdf->Cell(0,5,'',0,1,'C');
$pdf->Cell(0,5,'',0,1,'C');
$pdf->SetFont('Arial','B',10);


$query = "SELECT tipo, SUM(cantidad) FROM pagosextras  where fecha BETWEEN '$fch1' AND '$fch2'  GROUP BY tipo";
$pdf->SetFont('Arial','',8);
$result = mysql_query($query);



while($row = mysql_fetch_array($result))
{

$pdf->Cell(60,5,$row['concepto'],1);
$pdf->Cell(20,5,$row['cantidad'],1,0);



}
                                   

                                   
$pdf->Output('Listado de Socios','I');
?>
								   
								   
								   

