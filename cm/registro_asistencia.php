<!DOCTYPE html>

<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Regsitro de asistencia</title>
	
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
				//id
				include('connect.php');
        $id=$_POST['clave'];
        $area=$_POST['area'];
				 $sql=mysql_query("insert into asistencia set id_cliente='$id',area='$area' ");
				 if(! $sql )
                    {
                      die('<div class="error-box round">No se pudo registrar tu asistencia</div>' . mysql_error());
                    }
                  echo "<div class=\"confirmation-box round\">Asistencia regsitrada</div>"."<br>";
				  echo "<a href=\"asistencia.php\">::Regresar::</a>";
                   mysql_close();
					
				
				?>
                
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
                    url: "buscacomprador.php",
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