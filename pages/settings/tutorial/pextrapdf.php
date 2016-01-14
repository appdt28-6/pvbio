<?php
include ('../connect.php');
date_default_timezone_set('mexico/general');
$mes=date("m");
require('../fpdf.php');

$pdf =new FPDF('P', 'mm', array(80, 177));
$pdf->AddPage();  
$pdf->SetFont('Arial','B',8);
$pdf->Image("../images/logo.png","25","10","30","10");
$pdf->Ln();
$pdf->Cell("","20","","0",1);

$pdf->Cell(4,1,'                 BIOGYM GEOVILLAS');
$pdf->Ln();
$pdf->Cell(4,10,'   BLVD NUEVO HIDALGO 100 LOCAL 3');
$pdf->Cell(4,20,'     FRACC GEOVILLAS C.P. 42083');
$pdf->Ln();
$pdf->Cell(4,10,'                RECIBO DE PAGO           ');
$pdf->Ln();
$pdf->cell(40,10, date("Y-m-d"));
$pdf->cell(40,10,date("H:i:s"));
$pdf->Ln();
$pdf->Cell(1,10,'-------------------------------------------------------------------');
$pdf->Ln();
$pdf->Cell(40,10,'Concepto',0,0);
$pdf->Cell(30,10,'Importe',0,1);
$pdf->Ln();
$query1 = "select MAX(id_pago) as max from pagosextras";
$result1 = mysql_query($query1);
while($row = mysql_fetch_array($result1))
{
$max=$row['max'];
}
$query = "select concepto,cantidad,fecha from pagosextras where id_pago='$max' ";
$result = mysql_query($query);
while($row = mysql_fetch_array($result))
{
$pdf->Cell(40,10,$row['concepto']);	
$pdf->Cell(30,10,$row['cantidad'],0,1);
	
}
                        
$pdf->Cell(1,10,'-------------------------------------------------------------------');
$pdf->Ln();

$pdf->Ln();
$pdf->Cell(40,10,'                   Nombre y firma de enterado');
$pdf->Ln();
$pdf->Cell(4,10,'         ___________________________________');
                                   
$pdf->Output();
?>