<?php
$fch1=date("Y-m-d")." 00:00:00";
$fch2=date("Y-m-d")." 23:59:59";
date_default_timezone_set('mexico/general');
//Exportar datos de php a Excel
header("Content-Type: application/vnd.ms-excel");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("content-disposition: attachment;filename=ListadoSocios.xls");
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
$sql = "SELECT socios.id_socio,concat(socios.nombre,' ',socios.ap,' ', socios.am) as nombre,socios.telefono,socios.membresia FROM pvbiogym.socios";


?>
<center>
<img src="../images/logo.png" width="333" height="64">
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
	include ('../connect.php');
                                        
	$query = "SELECT socios.id_socio,concat(socios.nombre,' ',socios.ap,' ', socios.am) as nombre,socios.telefono,socios.membresia FROM pvbiogym.socios";
 	$result = mysql_query($query);
    while($row = mysql_fetch_array($result))
                                  {
    echo "<tr class=\"odd gradeX\">";
	echo "<td>".$row['id_socio']."</td>";
 	echo "<td>".$row['nombre']."</td>";
	echo "<td>".$row['telefono']."</td>";
	echo "<td>".$row['membresia']."</td>";
											
    echo "</tr>";
                                  }
    mysql_free_result($result);
    mysql_close($link);
   ?>                        
   </tbody>
  </table>
  </body>
  </HTML>