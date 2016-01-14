
<?php
include ('../connect.php');
date_default_timezone_set('mexico/general');
$mes=date("m");
$fch1=date("Y-m-d")." 00:00:00";
$fch2=date("Y-m-d")." 23:59:59";
require('../fpdf.php');

$pdf =new FPDF('P', 'mm', array(80, 297));
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


$query = "SELECT tipo, concepto,cantidad,fecha FROM pagosextras  where fecha BETWEEN '$fch1' AND '$fch2'";

$result = mysql_query($query);



$result = mysql_query($query);
while($row = mysql_fetch_array($result))
{
$pdf->Cell(40,5,$row['concepto']);	
$pdf->Cell(30,5,$row['cantidad'],0,1);
	
}


 $query1 = "SELECT tipo, SUM(cantidad) FROM pagosextras  where fecha BETWEEN '$fch1' AND '$fch2'  GROUP BY tipo ORDER BY  `pagosextras`.`tipo` ASC"; 
	 	 

$result1 = mysql_query($query1) or die(mysql_error());

while($row = mysql_fetch_array($result1))
{
$pdf->Cell(40,5,$row['tipo']);
$pdf->Cell(40,5,$row['SUM(cantidad)'],0,1);

}


                                  
$pdf->Output('Pagos Extra','I');
?>
								   
								   
								   

