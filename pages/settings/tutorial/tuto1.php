<?php
include ('../connect.php');
date_default_timezone_set('mexico/general');
$fch1=date("Y-m-d")." 00:00:00";
$fch2=date("Y-m-d")." 23:59:59";
require('../fpdf.php');

$pdf =& new FPDF('P', 'mm', array(80, 297));
$pdf->AddPage();  
$pdf->SetFont('Arial','B',8);
$pdf->Cell(4,1,'BIOGYM');
$pdf->Cell(4,10,'BLVD NUEVO HIDALGO 100 LOCAL3');
$pdf->Cell(4,20,'FRACC GEOVILLAS C.P. 42083'); 
$pdf->Ln();
$pdf->cell(40,10,date("Y-m-d"));
$pdf->cell(40,10,date("H:i:s"));
$pdf->Ln();
$pdf->Cell(40,10,'Comprobante de corte de caja');
$pdf->Ln();
$pdf->Cell(4,10,'----------------------------------------------------------------------');
$pdf->Ln();
$pdf->Cell(40,10,'Resp.  Ventas.  Salidas.      Fecha.');
$pdf->Ln();


$query = "SELECT * FROM corte where fecha BETWEEN '$fch1' AND '$fch2' ";
$result = mysql_query($query);
while($row = mysql_fetch_array($result))
{
$pdf->Cell(4,1,$row['codigo']."        | ".$row['venta']."     | ".$row['salida']."  |".$row['fecha'])."\n";
$pdf->Ln();	
$pdf->Ln();	
$pdf->Ln();	
$pdf->Ln();	
}

$pdf->Cell(40,10,'           VENTAS POR DEPARTAMENTO');
$pdf->Ln();
$pdf->Cell(40,10,'  ID.  Producro  Cantidad.  Importe.');
$pdf->Ln();
$query6 = "select ventasticket.idProducto as id,productos.descripcion as nombre, SUM(ventasticket.cantidad) as cantidad,SUM(ventasticket.importe) as importe from tickets inner join ventasticket on tickets.idTicket=ventasticket.idTicket inner join productos on ventasticket.idProducto=productos.idProducto where tickets.fecha BETWEEN '$fch1' AND '$fch2' group by ventasticket.idProducto";
$result6 = mysql_query($query6);
while($row = mysql_fetch_array($result6))
{
$pdf->Cell(4,1,$row['id']."       ".$row['nombre']."| ".$row['cantidad']." | ".$row['importe'])."\n";
$pdf->Ln();	
$pdf->Ln();	
$pdf->Ln();	
$pdf->Ln();	
} 
$pdf->Cell(40,10,'           TOTAL DE SALIDAS');
$pdf->Ln();
$pdf->Cell(40,10,'id_pago        concepto           cantidad');
$pdf->Ln();
$query7 = "SELECT * FROM pagos where fecha BETWEEN '$fch1' AND '$fch2' ";
$result7 = mysql_query($query7);
while($row = mysql_fetch_array($result7))
{
$pdf->Cell(4,1,$row['id_pago']."     |".$row['concepto']."         | ".$row['cantidad']). "    \n";
$pdf->Ln();	
$pdf->Ln();	
$pdf->Ln();	
$pdf->Ln();	
}

                        
$pdf->Cell(4,10,'----------------------------------------------------------------------');
$pdf->Ln();
$pdf->Cell(40,10,'Total Efectivo.  Tarjeta.   Total Pagado     Diferencia');
$pdf->Ln();

$query2 = "SELECT SUM(subtotal) as total FROM tickets where tpago='0' and fecha BETWEEN '$fch1' AND '$fch2'";
                                  $result2 = mysql_query($query2);
                                  while($row = mysql_fetch_array($result2))
                                  {
                                 $sold=$row['total']; 
                                    }
$query3 = "SELECT SUM(subtotal) as total FROM tickets where tpago='1' and fecha BETWEEN '$fch1' AND '$fch2'";
                                  $result3 = mysql_query($query3);
                                  while($row = mysql_fetch_array($result3))
                                  {
                                 $tarjeta=$row['total']; 
                                    }
$query4 = "SELECT SUM(cantidad) as total FROM pagos where fecha BETWEEN '$fch1' AND '$fch2'";
                                  $result4 = mysql_query($query4);
                                  while($row = mysql_fetch_array($result4))
                                  {
                                 $pay= $row['total']; 
                                    }
                                     mysql_free_result($result4);
                                    mysql_close($link);
									$resta=$sold-$pay;

$pdf->Cell(4,1,$sold."   ||    ".$tarjeta. "          ||    ".$pay."            |   ".$resta);    
$pdf->Cell(40,10,'----------------------------');

$pdf->Ln();
$pdf->Cell(40,10,'Firma de enterado');
$pdf->Ln();
$pdf->Cell(40,10,'----------------------------');


                                   
$pdf->Output();
?>
