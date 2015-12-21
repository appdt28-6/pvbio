<!DOCTYPE html>

<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Pre-Registro</title>
	
	<!-- Stylesheets -->
	<link href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet'>
	<link rel="stylesheet" href="css/style.css">
	
	<!-- Optimize for mobile devices -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	
	<!-- jQuery & JS files -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
	<script src="js/script.js"></script>  
</head>
<body>
		
			
				
				<div class="content-module-main">
                <img src="images/logo.png">
                
                 <?php 
include('connect.php');
//variables
$membre=$_POST['membre'];
$gen=$_POST['gen'];
$edad=$_POST['edad'];
$nom=utf8_decode($_POST['nombre']);
$ap=utf8_decode($_POST['ap']);
$am=utf8_decode($_POST['am']);
$fchan=$_POST['dia']."-".$_POST['mes']."-".$_POST['anio'];
$tel=$_POST['tel'];
$email=$_POST['email'];
$face=$_POST['face'];
$direc=$_POST['calle']." ".$_POST['inte']." ".$_POST['exter']." ".$_POST['direc'];
$medio=$_POST['medio'];
$vendor=$_POST['vendor'];
$sts=0;

//inserta
//if de llenar campos
if(($_POST['nombre']=="")||($_POST['tel']=="")||($_POST['email']=="")||($_POST['direc']==""))
	{
  echo "<div class=\"error-box round\">Error, introduce todos los datos, Gracias.</div>"; 
	}
else{
mysql_query("INSERT INTO socios SET nombre='$nom',
ap='$ap',
am='$am',
fechan='$fchan',
telefono='$tel',
email='$email',
direccion='$direc',
usuario='sin',
contrasena='sin',
membresia='$membre',
status='$sts',
barcode='0000',
facebook='$face',
genero='$gen',
medio='$medio',
edad='$edad',
vendedor='$vendor';",$link) or die("error al agregar");
	echo "<div class=\"confirmation-box round\">Socio Registrado con exito.</div>";

}
?>
<!--<center><a href="javascript:window.close();">Cerrar Ventana</a></center>-->
<center><a href="nuevosocio.php">Cerrar Ventana</a></center>

                
				</div> <!-- end content-module-main -->
</body>
</html>