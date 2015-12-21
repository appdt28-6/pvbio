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
	<title>Completar Perfil</title>
	
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
	
			<li><a href="panelc.php" class="active-tab dashboard-tab">Clientes</a></li>
				<!--<li><a href="compradores.php" class="active-tab dashboard-tab">Compradores</a></li>
                <li><a href="catalogo.php">Catálogo</a></li>
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
					<li><a href="newcomprador.php">Nuevo Socio</a></li>
					<li><a href="panelc.php">Regresar</a></li>
					
				</ul>
							
				
			</div> <!-- end side-menu -->
			
			<div class="side-content fr">
			
            <div class="content-module">
				
					<div class="content-module-heading cf">
					
						<h3 class="fl">Completar perfil</h3>
						<span class="fr expand-collapse-text">Click to collapse</span>
						<span class="fr expand-collapse-text initial-expand">Click to expand</span>
					
					</div> 
				<div class="content-module-main">
                <?php
				$ver=$_GET['id'];
include("connect.php");
$query = "SELECT * FROM clientes where id_cliente=$ver";
  $result = mysql_query($query);
  while($row = mysql_fetch_array($result)){ ?>
                
 <form action="reg_perfil.php?id=<?php echo $row['id_cliente'] ?>" method="POST" id="">
                
			<fieldset>
                
  <div class="information-box round">Datos Personales</div>
  <table width="400px" border="0">
  <tr>
    <td width="48%">Tipo de Membresia:
<select name="membre"><option><?php echo $row['membresia']?></option></select></td>
    <td width="19%">
   Sexo:
                   <select name="gen">
                    <option><?php echo $row['genero']?></option>
          
                   </select></td>
    <td width="33%">Edad:
                    <input type="text" name="edad" id="" class=""autofocus size="4" value="<?php echo $row['edad']?>"/></td>
            
  </tr>
</table>
 					Nombre:
			  <input type="text" name="nombre" id="" class="" autofocus size="100" value="<?php echo $row['nombre']?>" />
                   <p></p>
              <table width="600" border="0">
  <tr>
    <td width="52%">Fecha de Nacimiento:<br>
                    
                    <input type="text" name="fechan" id="" class=""size="10" value="<?php echo $row['fechan']?>"/></td>
    <td width="16%">               
      Teléfono:
					<input type="text" name="tel" id="" class="" autofocus size="10" value="<?php echo $row['telefono']?>"/></td>
    <td width="32%"> Email:
					<input type="text" name="email" id="" class=""  value="<?php echo $row['email']?>"/> </td>
  </tr>
</table>
     <p></p>
                      Como te encontramos en Facebook (Opcional):
              <input type="text" name="face" id="" class="" size="50" value="<?php echo $row['facebook']?>"/><p></p>
             
              FRACCIONAMIENTO | | COLONIA:
             
                    <input type="text" name="direc" id="" class=""  size="100" value="<?php echo $row['direccion']?>"/><br>
                     <br>
                   
                   
<p></p                   
                    ><div class="information-box round">Datos Medicos</div>
                
                 ¿Alguna lesión que incapacite su movilidad o actividad fisica?
                    <input type="text" name="lesion" id="" class=""  size="100"/>
                    <br>    
                ¿Padece de una enfermedad ? si/no || cual? <br>
                    <input type="text" name="enfermedad" id="" class=""  size="100"/><br>
                    <br> 
                    ¿Algun medicamento obligatorio?<br>
                    <input type="text" name="medicamento" id="" class=""  size="70"/><br>
                    <br>  
                     </br>
                     <div class="information-box round">Datos de RFC (opcionales)</div>
                  <br>
                  
      <table width="400px" border="0">
  <tr>
    <td width="28%"> Razón Social
                    <input type="text" name="razon" id="" class=""  size="30"/> </td>
                     <br>
    <td width="28%"> RFC
                    <input type="text" name="rfc" id="" class=""  size="30"/><br>     </td>
                    <br>
    <td width="28%">
                    C.P
                    <input type="text" name="codigo" id="" class=""  size="20"/><br>  </td>
                    </tr>
                    </table>
                    <br>
                    
                     <table width="400px" border="0">
  <tr>
    
   <td width="20%"> Colonia
                    <input type="text" name="colonia" id="" class=""  size="50"/><br> </td> 
                    
   <td width="20%"> Calle 
                    <input type="text" name="calle" id="" class=""  size="50"/><br> </td>
                    <br>
   <td width="20%">  No. Interior
                    <input type="text" name="interior" id="" class=""  size="20"/><br> </td>
                    <br>
   <td width="20%">  No. Exterior
                    <input type="text" name="exterior" id="" class=""  size="20"/><br> </td>
                    </td>
                    </tr>
                    </table> 
                    <br>
                     <table width="400px" border="0">
  <tr>
    
   <td width="20%"> Estado
                    <input type="text" name="estado" id="" class=""  size="20"/><br> </td>
                    <br>
  <td width="20%">  Giro
                    <input type="text" name="giro" id="" class=""  size="30"/><br>  </td>
                    </td>
                    </tr>
                    </table> 
  
  <div class="information-box round">Formas de pago</div>
 
                <select name="formaspago"> <option>Tarjeta </option> 
                <option> Efectivo</option>
                                </select>
                Cantidad a pagar:
                 <input type="text" name="cantidad" id="" class=""  size="20"/><br>
                 Concepto de pago:
                 <input type="text" name="concepto" id="" class=""  size="20"/><br>
                
                <br>
                
               
                
                <input type="submit" value="Registrar" class="button round blue image-right ic-right-arrow"> <br>

			</fieldset>

			<br/><div class="information-box round">Introduce los datos que se te solicitan</div>

		</form>
                
  <?php }
mysql_close();
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