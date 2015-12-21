<?php session_start();?>

<?php
if(!isset($_SESSION['inicia'])){
header("location: index.html?**sin-acceso**");
} else { 
$e=$_SESSION['inicia'];
} /* Y cerramos el else */ 
?>

<!DOCTYPE html>

<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Registrar Perfil</title>
	
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

	<!-- TOP BAR -->
	<div id="top-bar">
		
		<div class="page-full-width cf">

			<ul id="nav" class="fl">
	
				<!--<li class="v-sep"><a href="#" class="round button dark ic-left-arrow image-left">Go to website</a></li>-->
				<?php
                echo "<li class=\"v-sep\"><a href=\"#\" class=\"round button dark menu-user image-left\">Usuario <strong>$e</strong></a>";
				?>
					<ul>
						<li><a href="#">Mi cuenta</a></li>
						<li><a href="#">Configuraciones</a></li>
						<li><a href="#">Cambiar contraseña</a></li>
						<li><a href="close.php">Cerrar Sesion</a></li>
					</ul> 
				</li>
			
				<!--<li><a href="#" class="round button dark menu-email-special image-left">3 new messages</a></li>-->
				<li><a href="close.php" class="round button dark menu-logoff image-left">Salir</a></li>
				
			</ul> <!-- end nav -->

					
			<!--<form action="#" method="POST" id="search-form" class="fr">
				<fieldset>
					<input type="text" id="search-keyword" class="round button dark ic-search image-right" placeholder="Search..." />
					<input type="hidden" value="SUBMIT" />
				</fieldset>
			</form>-->

		</div> <!-- end full-width -->	
	
	</div> <!-- end top-bar -->
	
	
	
	<!-- HEADER -->
	<div id="header-with-tabs">
		
		<div class="page-full-width cf">
	
			<ul id="tabs" class="fl">
	
			<li><a href="panelc.php" class="active-tab dashboard-tab">Socios</a></li>
				<li><a href="pagos.php">Pagos</a></li>
                <!--<li><a href="catalogo.php">Catálogo</a></li>
                <li><a href="multiniv.php">Multinivel</a></li>
                <li><a href="level.php">Niveles</a></li>
                <li><a href="video.php">Video Promocional</a></li>
                <li><a href="estadisticas.php">Estadisticas</a></li>-->
			</ul> <!-- end tabs -->
			
			<!-- Change this image to your own company's logo -->
			<!-- The logo will automatically be resized to 30px height. -->
			<a href="#" id="company-branding-small" class="fr"><img src="images/logo.png" alt="biogym" /></a>
			
		</div> <!-- end full-width -->	

	</div> <!-- end header -->
	
	
	
	<!-- MAIN CONTENT -->
	<div id="content">
		
		<div class="page-full-width cf">

			<div class="side-menu fl">
				
				<h3>Menu</h3>
				<ul>
					<li><a href="newcomprador.php">Nuevo socio</a></li>
					<li><a href="panelc.php">Regresar</a></li>
					
				</ul>
							
				
			</div> <!-- end side-menu -->
			
			<div class="side-content fr">
			
            <div class="content-module">
				
					<div class="content-module-heading cf">
					
						<h3 class="fl">Completando perfil</h3>
						<span class="fr expand-collapse-text">Click to collapse</span>
						<span class="fr expand-collapse-text initial-expand">Click to expand</span>
					
					</div> 
				<div class="content-module-main">
                
                 <?php 
				 $id=$_GET['id'];
include('connect.php');

//variables
 $membre=$_POST['membre'];
$gen=$_POST['gen'];
$edad=$_POST['edad'];
$nom=utf8_decode($_POST['nombre']);
$fchan=$_POST['fechan'];
$tel=$_POST['tel'];
$email=$_POST['email'];
$face=$_POST['face'];
$direc=$_POST['calle']." ".$_POST['exter']." ".$_POST['exter']." ".$_POST['direc'];
$sts=1;
$p1=$_POST['lesion'];
$p2=$_POST['enfermedad'];
$p3=$_POST['medicamento'];
$razon=$_POST['razon'];
$rfc=$_POST['rfc'];
$cp=$_POST['cp'];
$dirfc=$_POST['calle']." ".$_POST['interior']." ".$_POST['exterior']." ".$_POST['colonia'];echo "<br>";
$edo=$_POST['estado'];
$giro=$_POST['giro'];
$formapago=$_POST['formaspago'];
$cantidad=$_POST['cantidad'];
$concepto=$_POST['concepto'];
//inserta
//if de llenar campos
if(($_POST['nombre']=="")||($_POST['tel']=="")||($_POST['email']=="")||($_POST['direc']==""))
	{
  echo "<div class=\"error-box round\">Error, introduce todos los datos, Gracias.</div>"; 
	}
else{
$sql=mysql_query("UPDATE clientes SET nombre='$nom',
fechan='$fchan',
telefono='$tel',
email='$email',
direccion='$direc',
membresia='$membre',
status='$sts',
barcode='$tel',
facebook='$face',
pregunta1='$p1',
pregunta2='$p2',
pregunta3='$p3',
rfc='$rfc',
cp='$cp',
direccionrfc='$dirfc',
edo='$edo',
giro='$giro' WHERE id_cliente='$id' ");
if(! $sql )
{
   die('<div class="error-box round">No se pudo actualizar Registro</div>' . mysql_error());
}
else{
	
	 echo "<div class=\"confirmation-box round\">Regsitro con éxito.</div>";
	 $sql2=mysql_query("INSERT INTO pagos SET 
	 id_cliente='$id',
	 concepto='$concepto',
	 formapago='$formapago',
	 cantidad='$cantidad';",$link);
	 if(!$sql2){
		 die('<div class="error-box round">No se pudo actualizar Registro</div>' . mysql_error());
		 }
	 echo "<div class=\"confirmation-box round\">Tu pago ha sido registrado.</div>";
	 //mysql_close();
	}

 }
?>

					</div> <!-- end content-module-main -->
		
			</div> <!-- end side-content -->
		
		</div> <!-- end full-width -->
			
	</div> <!-- end content -->
	
	
	
	<!-- FOOTER -->
	<div id="footer">

		
		<p>&copy; Copyright 2014 <a href="#">Biogym</a>. Derechos Reservados.</p>
		<p><strong>Panel de control</strong>by<a href="http://appdt.info">AppDT28.6</a></p>
	
	</div> <!-- end footer -->
    
	
</body>
</html>