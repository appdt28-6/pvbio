<?php
$fch1=date("Y-m-d")." 00:00:00";
$fch2=date("Y-m-d")." 23:59:59";
date_default_timezone_set('mexico/general');
//Exportar datos de php a Excel
header("Content-Type: application/vnd.ms-excel");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("content-disposition: attachment;filename=ListadoSocios".date("d-m-y").".xls");
?>
<HTML LANG="es">
<TITLE>::. Exportacion de Datos .::</TITLE>
</head>
<body>
<?php
$NombreBD = "pvbiogym";
$Servidor = "localhost";
$Usuario = "root";
$Password ="toor";
$IdConexion = mysql_connect($Servidor, $Usuario, $Password);
mysql_select_db($NombreBD, $IdConexion);
$sql = "SELECT socios.id_socio as id, socios.nombre as nombre,socios.ap as apellido,socios.membresia as membre,socios.telefono as tel, acceso.ultimopago as ultimo,acceso.vence as vence FROM acceso inner join socios on socios.id_socio=acceso.id_socio where acceso.status=0";


?>
<center>
<img src="logo.png" width="333" height="64">
</center>
<br>
<Center><h3>Listado de Socios</h3></Center>
<TABLE BORDER=2 style="width:100%" align="center" CELLPADDING=1 CELLSPACING=1>

<TR>
<TD>ID Socio</TD>
<TD>Nombre</TD>
<td>Telefono</td>
<TD>Membresia</TD>
</TR>


 <tbody>
  <?php
	include ('connect.php');
                                        
	$query = "SELECT socios.id_socio as id, socios.nombre as nombre,socios.ap as apellido,socios.membresia as membre,socios.telefono as tel, acceso.ultimopago as ultimo,acceso.vence as vence FROM acceso inner join socios on socios.id_socio=acceso.id_socio where acceso.status=0";
 	$result = mysql_query($query);
    while($row = mysql_fetch_array($result))
                                  {
    echo "<tr class=\"odd gradeX\">";
								   echo "<td>".$row['id']."</td>";
                                            echo "<td>".$row['nombre']."</td>";
											 echo "<td>".$row['apellido']."</td>";
											  echo "<td>".$row['membre']."</td>";
											   echo "<td>".$row['tel']."</td>";
                                            echo "<td>".$row['ultimo']."</td>";
                                            echo "<td class=\"center\">".$row['vence']."</td>";
                                        echo "</tr>";
                                  }
    mysql_free_result($result);
    mysql_close($link);
   ?>                        
   </tbody>
  </table>
  </body>
  </HTML>