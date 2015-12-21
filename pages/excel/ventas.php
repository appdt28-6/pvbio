 <?php
date_default_timezone_set('mexico/general');
//Exportar datos de php a Excel
header("Content-Type: application/vnd.ms-excel");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("content-disposition: attachment;filename=ventas".date("d-m-y").".xls");
?>
<HTML LANG="es">
<TITLE>::. Exportacion de Datos .::</TITLE>
</head>
<body>

Consolidado de datos.
<TABLE BORDER=1 align="center" CELLPADDING=1 CELLSPACING=1>
 <thead>
 <tr>
 <th>Total Efectivo M</th>
 <th>Total Tarjeta M</th>
 <th>Total Efectivo T</th>
  <th>Total Efectivo T</th>
 <th>Total Salida M</th>
  <th>Total Salida T</th>
 </tr>
 </thead>
 <tbody>
<tr>
<td><?php include ('connect.php');
		date_default_timezone_set('mexico/general');
		$fch1=date("Y-m-d")." 00:00:00";
		$fch2=date("Y-m-d")." 23:59:59";
		
		$query = "SELECT SUM(subtotal) as total FROM tickets where id_usuario='5' and tpago='0' and fecha BETWEEN '$fch1' AND '$fch2' ";
	  $result = mysql_query($query);
	  while($row = mysql_fetch_array($result))
	  {
	 $tem=$row['total'];
	  }
	  mysql_free_result($result);
	  mysql_close($link); ?></td>
<td><?php include ('connect.php');
  $query2 = "SELECT SUM(subtotal) as total FROM tickets where id_usuario='5' and tpago='1' and fecha BETWEEN '$fch1' AND '$fch2' ";
	  $result2 = mysql_query($query2);
	  while($row = mysql_fetch_array($result2))
	  {
	 $ttm=$row['total'];
	  }
	mysql_free_result($result2);
	mysql_close($link); ?></td>
<td><?php include ('connect.php');
 $query3 = "SELECT SUM(subtotal) as total FROM tickets where id_usuario='4' and tpago='0' and fecha BETWEEN '$fch1' AND '$fch2' ";
	  $result3 = mysql_query($query3);
	  while($row = mysql_fetch_array($result3))
	  {
	 $tet=$row['total'];
	  }
	mysql_free_result($result3);
	mysql_close($link); ?></td>
<td><?php include ('connect.php');
 $query4 = "SELECT SUM(subtotal) as total FROM tickets where id_usuario='4' and tpago='1' and fecha BETWEEN '$fch1' AND '$fch2' ";
	  $result4 = mysql_query($query4);
	  while($row = mysql_fetch_array($result4))
	  {
	 $ttt=$row['total'];
	  }
	mysql_free_result($result4);
	mysql_close($link); ?></td>
<td><?php include ('connect.php');
$query5 = "SELECT SUM(subtotal) as total FROM pagos where id_usuario='5' and fecha BETWEEN '$fch1' AND '$fch2' ";
	  $result5 = mysql_query($query5);
	  while($row = mysql_fetch_array($result5))
	  {
	 $tsm=$row['total'];
	  }
	mysql_free_result($result5);
	mysql_close($link); ?></td>
<td><?php include ('connect.php');
$query6 = "SELECT SUM(subtotal) as total FROM pagos where id_usuario='4' and fecha BETWEEN '$fch1' AND '$fch2' ";
	  $result6 = mysql_query($query6);
	  while($row = mysql_fetch_array($result6))
	  {
	 $tst=$row['total'];
	  }
	mysql_free_result($result6);
	mysql_close($link); ?></td>
</tr>
</tbody>
</table>



<?php
$NombreBD = "pvbiogym";
$Servidor = "localhost";
$Usuario = "root";
$Password ="toor";
$IdConexion = mysql_connect($Servidor, $Usuario, $Password);
mysql_select_db($NombreBD, $IdConexion);
$fch1=date("Y-m-d")." 00:00:00";
$fch2=date("Y-m-d")." 23:59:59";
$sql = "select ventasticket.idProducto as id,productos.descripcion as nombre, SUM(ventasticket.cantidad) as cantidad,SUM(ventasticket.importe) as importe from tickets inner join ventasticket on tickets.idTicket=ventasticket.idTicket inner join productos on ventasticket.idProducto=productos.idProducto where tickets.id_usuario=5 and tickets.tpago='0' and tickets.fecha BETWEEN '$fch1' AND '$fch2' group by ventasticket.idProducto
";
$result=mysql_query($sql,$IdConexion);
?>
Ventas en efectivo. Turno de la mañana
<TABLE BORDER=1 align="center" CELLPADDING=1 CELLSPACING=1>
 <thead>
 <tr>
 <th>ID</th>
 <th>Nombre</th>
 <th>Cantidad</th>
 <th>Importe</th>
 </tr>
 </thead>
 <tbody>
 <?php
while($row = mysql_fetch_array($result)) {
printf("<tr>
<td>&nbsp;%s</td>
<td>&nbsp;%s&nbsp;</td>
<td>&nbsp;%s&nbsp;</td>
<td>&nbsp;%s&nbsp;</td>
</tr>", $row['id'],$row['nombre'],$row['cantidad'],$row['importe']);
}
mysql_free_result($result);
mysql_close($IdConexion); //Cierras la Conexión
?>
</tbody>
</table>

<?php
$NombreBD = "pvbiogym";
$Servidor = "localhost";
$Usuario = "root";
$Password ="toor";
$IdConexion = mysql_connect($Servidor, $Usuario, $Password);
mysql_select_db($NombreBD, $IdConexion);
$fch1=date("Y-m-d")." 00:00:00";
$fch2=date("Y-m-d")." 23:59:59";
$sql = "select ventasticket.idProducto as id,productos.descripcion as nombre, SUM(ventasticket.cantidad) as cantidad,SUM(ventasticket.importe) as importe from tickets inner join ventasticket on tickets.idTicket=ventasticket.idTicket inner join productos on ventasticket.idProducto=productos.idProducto where tickets.id_usuario=5 and tickets.tpago='1' and tickets.fecha BETWEEN '$fch1' AND '$fch2' group by ventasticket.idProducto
";
$result=mysql_query($sql,$IdConexion);
?>
Ventas con tarjetas. Turno de la mañana
<TABLE BORDER=1 align="center" CELLPADDING=1 CELLSPACING=1>
 <thead>
 <tr>
 <th>ID</th>
 <th>Nombre</th>
 <th>Cantidad</th>
 <th>Importe</th>
 </tr>
 </thead>
 <tbody>
 <?php
while($row = mysql_fetch_array($result)) {
printf("<tr>
<td>&nbsp;%s</td>
<td>&nbsp;%s&nbsp;</td>
<td>&nbsp;%s&nbsp;</td>
<td>&nbsp;%s&nbsp;</td>
</tr>", $row['id'],$row['nombre'],$row['cantidad'],$row['importe']);
}
mysql_free_result($result);
mysql_close($IdConexion); //Cierras la Conexión
?>
</tbody>
</table>

<?php
$NombreBD = "pvbiogym";
$Servidor = "localhost";
$Usuario = "root";
$Password ="toor";
$IdConexion = mysql_connect($Servidor, $Usuario, $Password);
mysql_select_db($NombreBD, $IdConexion);
$fch1=date("Y-m-d")." 00:00:00";
$fch2=date("Y-m-d")." 23:59:59";
$sql = "select ventasticket.idProducto as id,productos.descripcion as nombre, SUM(ventasticket.cantidad) as cantidad,SUM(ventasticket.importe) as importe from tickets inner join ventasticket on tickets.idTicket=ventasticket.idTicket inner join productos on ventasticket.idProducto=productos.idProducto where tickets.id_usuario=4 and tickets.tpago='0' and tickets.fecha BETWEEN '$fch1' AND '$fch2' group by ventasticket.idProducto
";
$result=mysql_query($sql,$IdConexion);
?>
Ventas en efectivo. Turno de la tarde
<TABLE BORDER=1 align="center" CELLPADDING=1 CELLSPACING=1>
 <thead>
 <tr>
 <th>ID</th>
 <th>Nombre</th>
 <th>Cantidad</th>
 <th>Importe</th>
 </tr>
 </thead>
 <tbody>
 <?php
while($row = mysql_fetch_array($result)) {
printf("<tr>
<td>&nbsp;%s</td>
<td>&nbsp;%s&nbsp;</td>
<td>&nbsp;%s&nbsp;</td>
<td>&nbsp;%s&nbsp;</td>
</tr>", $row['id'],$row['nombre'],$row['cantidad'],$row['importe']);
}
mysql_free_result($result);
mysql_close($IdConexion); //Cierras la Conexión
?>
</tbody>
</table>

<?php
$NombreBD = "pvbiogym";
$Servidor = "localhost";
$Usuario = "root";
$Password ="toor";
$IdConexion = mysql_connect($Servidor, $Usuario, $Password);
mysql_select_db($NombreBD, $IdConexion);
$fch1=date("Y-m-d")." 00:00:00";
$fch2=date("Y-m-d")." 23:59:59";
$sql = "select ventasticket.idProducto as id,productos.descripcion as nombre, SUM(ventasticket.cantidad) as cantidad,SUM(ventasticket.importe) as importe from tickets inner join ventasticket on tickets.idTicket=ventasticket.idTicket inner join productos on ventasticket.idProducto=productos.idProducto where tickets.id_usuario=4 and tickets.tpago='1' and tickets.fecha BETWEEN '$fch1' AND '$fch2' group by ventasticket.idProducto
";
$result=mysql_query($sql,$IdConexion);
?>
Ventas con tarjetas. Turno de la tarde
<TABLE BORDER=1 align="center" CELLPADDING=1 CELLSPACING=1>
 <thead>
 <tr>
 <th>ID</th>
 <th>Nombre</th>
 <th>Cantidad</th>
 <th>Importe</th>
 </tr>
 </thead>
 <tbody>
 <?php
while($row = mysql_fetch_array($result)) {
printf("<tr>
<td>&nbsp;%s</td>
<td>&nbsp;%s&nbsp;</td>
<td>&nbsp;%s&nbsp;</td>
<td>&nbsp;%s&nbsp;</td>
</tr>", $row['id'],$row['nombre'],$row['cantidad'],$row['importe']);
}
mysql_free_result($result);
mysql_close($IdConexion); //Cierras la Conexión
?>
</tbody>
</table>

<?php
$NombreBD = "pvbiogym";
$Servidor = "localhost";
$Usuario = "root";
$Password ="toor";
$IdConexion = mysql_connect($Servidor, $Usuario, $Password);
mysql_select_db($NombreBD, $IdConexion);
$fch1=date("Y-m-d")." 00:00:00";
$fch2=date("Y-m-d")." 23:59:59";
$sql = "SELECT * FROM pagos where fecha BETWEEN '$fch1' AND '$fch2' and id_usuario=5";
$result=mysql_query($sql,$IdConexion);
?>
Salidas en efectivo. Tunro Mañana.
<TABLE BORDER=1 align="center" CELLPADDING=1 CELLSPACING=1>
 <thead>
 <tr>
 <th>ID</th>
 <th>Nombre</th>
 <th>Cantidad</th>
 <th>Importe</th>
 </tr>
 </thead>
 <tbody>
 <?php
while($row = mysql_fetch_array($result)) {
printf("<tr>
<td>&nbsp;%s</td>
<td>&nbsp;%s&nbsp;</td>
<td>&nbsp;%s&nbsp;</td>
</tr>", $row['concepto'],$row['cantidad'],$row['fecha']);
}
mysql_free_result($result);
mysql_close($IdConexion); //Cierras la Conexión
?>
</tbody>
</table>

<?php
$NombreBD = "pvbiogym";
$Servidor = "localhost";
$Usuario = "root";
$Password ="toor";
$IdConexion = mysql_connect($Servidor, $Usuario, $Password);
mysql_select_db($NombreBD, $IdConexion);
$fch1=date("Y-m-d")." 00:00:00";
$fch2=date("Y-m-d")." 23:59:59";
$sql = "SELECT * FROM pagos where fecha BETWEEN '$fch1' AND '$fch2' and id_usuario=4";
$result=mysql_query($sql,$IdConexion);
?>
Salidas en efectivo. Tunro Tarde.
<TABLE BORDER=1 align="center" CELLPADDING=1 CELLSPACING=1>
 <thead>
 <tr>
 <th>ID</th>
 <th>Nombre</th>
 <th>Cantidad</th>
 <th>Importe</th>
 </tr>
 </thead>
 <tbody>
 <?php
while($row = mysql_fetch_array($result)) {
printf("<tr>
<td>&nbsp;%s</td>
<td>&nbsp;%s&nbsp;</td>
<td>&nbsp;%s&nbsp;</td>
</tr>", $row['concepto'],$row['cantidad'],$row['fecha']);
}
mysql_free_result($result);
mysql_close($IdConexion); //Cierras la Conexión
?>
</tbody>
</table>


</body>
</html>