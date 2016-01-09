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
$pdf->Cell(0,5,'Registro de Pagos Extra (Egresos)',0,1,"C");
$pdf->Cell(0,5,'',0,1,'C');
$pdf->Cell(0,5,'',0,1,'C');
$pdf->SetFont('Arial','B',10);
$pdf->Cell(15,5,'Id Pago',1,0,'C');
$pdf->Cell(60,5,'Concepto',1,0,'C');
$pdf->Cell(20,5,'Cantidad',1,0,'C');
$pdf->Cell(35,5,'fecha',1,0,'C');
$pdf->Cell(70,5,'descripcion',1,1,'C');
$query = "SELECT id_pago, concepto, cantidad, fecha, descripcion FROM pvbiogym.pagosextras where tipo='Egreso'";
$pdf->SetFont('Arial','',8);
$result = mysql_query($query);



while($row = mysql_fetch_array($result))
{
$pdf->Cell(15,5,$row['id_pago'],1);
$pdf->Cell(60,5,$row['concepto'],1);
$pdf->Cell(20,5,$row['cantidad'],1,0);
$pdf->Cell(35,5,$row['fecha'],1,0);
$pdf->Cell(70,5,$row['descripcion'],1,1);


}
                                   
								   
$pdf->AddPage();  
$pdf->SetFont('Arial','B',12);
$pdf->Image("../images/logo.png","87","10","40","10");
$pdf->Cell(0,5,'',0,1,'C');
$pdf->Cell(0,5,'',0,1,'C');
$pdf->Cell(0,5,'',0,1,'C');
$pdf->Cell(0,5,'Registro de Pagos Extra (Ingresos)',0,1,"C");
$pdf->Cell(0,5,'',0,1,'C');
$pdf->Cell(0,5,'',0,1,'C');
$pdf->SetFont('Arial','B',10);
$pdf->Cell(15,5,'Id Pago',1,0,'C');
$pdf->Cell(60,5,'Concepto',1,0,'C');
$pdf->Cell(20,5,'Cantidad',1,0,'C');
$pdf->Cell(35,5,'Fecha',1,0,'C');
$pdf->Cell(70,5,'Descripcion',1,1,'C');
$query = "SELECT id_pago, concepto, cantidad, fecha, descripcion FROM pvbiogym.pagosextras where tipo='Ingreso'";
$pdf->SetFont('Arial','',8);
$result = mysql_query($query);



while($row = mysql_fetch_array($result))
{
$pdf->Cell(15,5,$row['id_pago'],1);
$pdf->Cell(60,5,$row['concepto'],1);
$pdf->Cell(20,5,$row['cantidad'],1,0);
$pdf->Cell(35,5,$row['fecha'],1,0);
$pdf->Cell(70,5,$row['descripcion'],1,1);


}
                                   
$pdf->Output('Listado de Socios','I');
?>
								   
								   
								   
$pdf->Output('Registro de Pagos Extra','I');
?>
