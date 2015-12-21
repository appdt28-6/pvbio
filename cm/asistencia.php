<!DOCTYPE html>

<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Asistencia</title>
	
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
<center>  
<img src="images/logo.png">
<div class="information-box round">Clave de socio</div>
              
<form action="registro_asistencia.php" method="POST" id="">
<fieldset>

<input type="text" value="<?php echo date("Y-m-d H:i:s");?>">
<p></p>
  
    Clave :
      <input type="text" name="clave" id="busqueda"/><br>
      <hr>
      <p></p>
     <div id="resultado"></div>
  <p></p>
 
  <div class="information-box round">Asistencia</div>
   Area:
     <select name="area"> <option>Cardio</option> <option>Zona de pesas</option><option>Zumba</option></select><br>
  <p></p>
   <input type="submit" value="Registrar asistencia">
   </fieldset>
		</form>
        </center>
                
					</div> <!-- end content-module-main -->
		
			

    
<script language="javascript" type="text/javascript">
$(document).ready(function(){
                                
        var consulta;
                                                                          
         //hacemos focus al campo de búsqueda
        $("#busqueda").focus();
                                                                                                    
        //comprobamos si se pulsa una tecla
        $("#busqueda").keyup(function(e){
                                     
              //obtenemos el texto introducido en el campo de búsqueda
              consulta = $("#busqueda").val();
                                                                           
              //hace la búsqueda
                                                                                  
              $.ajax({
                    type: "POST",
                    url: "buscarid.php",
                    data: "b="+consulta,
                    dataType: "html",
                    beforeSend: function(){
                          //imagen de carga
                          $("#resultado").html("<p align='center'><img src='ajax-loader.gif' /></p>");
                    },
                    error: function(){
                          alert("error petición ajax");
                    },
                    success: function(data){                                                    
                          $("#resultado").empty();
                          $("#resultado").append(data);
                                                             
                    }
              });
                                                                                  
                                                                           
        });
                                                                   
});
</script>	
</body>
</html>