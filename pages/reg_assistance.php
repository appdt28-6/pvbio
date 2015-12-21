<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Asistensia por socio</title>

    <!-- Bootstrap Core CSS -->
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/asistencia.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<!--<body onload="redireccionar()">-->
<body>
   
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                 <center>
<img src="../images/logo.png" width="333" height="64">
</center>
                <div class="login-panel panel panel-default">

                    <div class="panel-heading">
                        <h3 class="panel-title">Datos de acceso</h3>
                    </div>
                    <div class="panel-body">
                     <form action="#" method="POST" >
                            <fieldset>
                      <?php 
                        include('connect.php');
						date_default_timezone_set('mexico/general');
						$clave=$_POST['clave'];
						$fch1=date("Y-m-d")." 00:00:00";
        				$fch2=date("Y-m-d")." 23:59:59";
						
											 
						 if(is_numeric($clave)){
																						  
						$resultado = mysql_query("SELECT id_socio FROM asistencias WHERE  fecha BETWEEN  '$fch1' and '$fch2' and id_socio ='$clave' ");
						$numero_filas = mysql_num_rows($resultado);
						
						if($numero_filas==0){
							$query = "SELECT acceso.status as status,acceso.vence as vence,acceso.ultimopago as ultimopago,socios.membresia as membre,socios.urlimages as foto,socios.nombre as nombre FROM acceso inner join socios on acceso.id_socio=socios.id_socio where acceso.id_socio='$clave' ";
						$result = mysql_query($query);
                                  while($row = mysql_fetch_array($result))
                                  {
									  if ($row['status']==1){
										$area=$row['membre'];
										$llegada=date('H:i:s');
										mysql_query("INSERT INTO asistencias SET id_socio='$clave',area='$area',llegada='$llegada';",$link) or die("error al agregar");
										echo "<div class=\"alert alert-success\">";
										echo "Asistencia Registrada<a class=\"alert-link\" href=\"#\"></a>";
										echo "</div>";
										  }//siinsertaasistencia
										  else{
											  	
									echo "<div class=\"alert alert-danger\">";
									echo "Tenemos un problema con tu solicitud<a class=\"alert-link\" href=\"#\"></a>";
									echo "</div>";
												}//sinoinserta
									
									 echo "<div class=\"form-group\"><label>Foto Socio</label><img src=".$row['foto']." width=\"100\" height=\"90\" ></div> ";  
									 echo" <div class=\"form-group\"><label>Nombre Socio</label><input class=\"form-control\" type=\"text\" value=".$row['nombre']." readonly></div>";       
									 echo" <div class=\"form-group\"><label>Membresia</label><input class=\"form-control\" type=\"text\" value=".$row['membre']." readonly></div>";  
									 echo" <div class=\"form-group\"><label>Proximo vencimiento</label><input class=\"form-control\" type=\"text\" value=".$row['vence']." readonly></div>"; 
									 $a=date("d",strtotime($row['vence']));
									 $b=date("d",strtotime(date("y-m-d")));
									 $c=$a-$b;
									 if($c<=5){
										echo "<script type=\"text/javascript\">";
										echo "alert(\"Tu proximo pago es el dia ".$row['vence']."\");";
										echo "</script>";

										 }
									// echo" <div class=\"form-group\"><label>Tu ultimo pago registrado</label><input class=\"form-control\" type=\"text\" value=".$row['ultimopago']." readonly></div>"; 
									 //echo" <div class=\"form-group\"><label>Fecha</label><input class=\"form-control\" type=\"text\" value=". date('Y-m-d')." readonly></div>"; 
						}//while socios
							}//sinasistencia
							else
							{
								echo $salida=date('H:i:s');
								$sql = mysql_query("UPDATE asistencias SET salida='$salida'  WHERE  fecha BETWEEN  '$fch1' and
'$fch2' and id_socio ='$clave'");					
									if(!$sql){
									echo "<div class=\"alert alert-danger\">";
									echo "Error <a class=\"alert-link\" href=\"#\"></a>";
									echo "</div>";
									}else{
									echo "<div class=\"alert alert-warning\">";
									echo "Salida Registrada <a class=\"alert-link\" href=\"#\"></a>";
									echo "</div>";
									}
								}//consistencia
									
						}//siesnumeric
						else{
							

							$user = explode("-",$clave);
						
							//echo $user[0]; // Imprime "usuario"
							$us=$user[1]; // Imprime "email.dom"
							//////////clases
							$llega=date('H:i:s');
							if($us==10){
								$area="CLASE ZUMBA";
								mysql_query("INSERT INTO asistencias_clase SET id_socio='$us',area='$area',llegada='$llega';",$link) or die("error al agregar");
									
									echo "<div class=\"alert alert-warning\">";
									echo "Asistencia Registrada<a class=\"alert-link\" href=\"#\"></a>";
									echo "</div>";
								}
								elseif($us==15){
								$area="CLASE HIP-HOP";
								mysql_query("INSERT INTO asistencias_clase SET id_socio='$$us',area='$area',llegada='$llega';",$link) or die("error al agregar");
									
									echo "<div class=\"alert alert-warning\">";
									echo "Asistencia Registrada<a class=\"alert-link\" href=\"#\"></a>";
									echo "</div>";
								}
								elseif($us==20){
								$area="CLASE GYM";
								mysql_query("INSERT INTO asistencias_clase SET id_socio='$$us',area='$area',llegada='$llega';",$link) or die("error al agregar");
									
									echo "<div class=\"alert alert-warning\">";
									echo "Asistencia Registrada<a class=\"alert-link\" href=\"#\"></a>";
									echo "</div>";
								}
								elseif($us==25){
								$area="CLASE PREBALLET";
								mysql_query("INSERT INTO asistencias_clase SET id_socio='$$us',area='$area',llegada='$llega';",$link) or die("error al agregar");
									
									echo "<div class=\"alert alert-warning\">";
									echo "Asistencia Registrada<a class=\"alert-link\" href=\"#\"></a>";
									echo "</div>";
								}
								elseif($us==30){
								$area="CLASE BOX";
								mysql_query("INSERT INTO asistencias_clase SET id_socio='$$us',area='$area',llegada='$llega';",$link) or die("error al agregar");
									
									echo "<div class=\"alert alert-warning\">";
									echo "Asistencia Registrada<a class=\"alert-link\" href=\"#\"></a>";
									echo "</div>";
								}
								elseif($us==35){
								$area="CLASE SALSA";
								mysql_query("INSERT INTO asistencias_clase SET id_socio='$$us',area='$area',llegada='$llega';",$link) or die("error al agregar");
									
									echo "<div class=\"alert alert-warning\">";
									echo "Asistencia Registrada<a class=\"alert-link\" href=\"#\"></a>";
									echo "</div>";
								}
								elseif($us==40){
								$area="CLASE TEABO";
								mysql_query("INSERT INTO asistencias_clase SET id_socio='$$us',area='$area',llegada='$llega';",$link) or die("error al agregar");
									
									echo "<div class=\"alert alert-warning\">";
									echo "Asistencia Registrada<a class=\"alert-link\" href=\"#\"></a>";
									echo "</div>";
								}
								elseif($us==45){
								$area="DEFENSA PERSONAL";
								mysql_query("INSERT INTO asistencias_clase SET id_socio='$$us',area='$area',llegada='$llega';",$link) or die("error al agregar");
									
									echo "<div class=\"alert alert-warning\">";
									echo "Asistencia Registrada<a class=\"alert-link\" href=\"#\"></a>";
									echo "</div>";
								}else{
								  //////obtengo id usuario
								$horap=date('H:i:s');
								$resultado2 = mysql_query("SELECT id_usuario FROM asistencia_personal WHERE fecha BETWEEN  '$fch1' and '$fch2' and id_usuario ='$us' ");
								$numero_filas2 = mysql_num_rows($resultado2);
							if($numero_filas2==0){
									mysql_query("INSERT INTO asistencia_personal SET id_usuario='$us',llegada='$horap';",$link) or die("error al agregar");
									 mysql_query("INSERT INTO turno SET id_usuario='$us',inicaja=0,status=0;",$link) or die("error al agregar");
									echo "<div class=\"alert alert-warning\">";
									echo "Asistencia Registrada<a class=\"alert-link\" href=\"#\"></a>";
									echo "</div>";
								}
								else{
									$sql2 = mysql_query("UPDATE asistencia_personal SET salida='$horap'  WHERE  fecha BETWEEN  '$fch1' and
									'$fch2' and id_usuario ='$us'");					
									if(!$sql2){
										echo "<div class=\"alert alert-danger\">";
										echo "Error <a class=\"alert-link\" href=\"#\"></a>";
										echo "</div>";
									}else{
										echo "<div class=\"alert alert-warning\">";
										echo "Salida Registrada <a class=\"alert-link\" href=\"#\"></a>";
										echo "</div>";
									}//update salida personal
									
								}//si ya registro o no a turno
								  
							}//siestexto
							
						}//si son clases
						?>
                               <a href="newassistance.php" class="tn btn-lg btn-warning btn-block">Salir</a>
                               
                                
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>
    <script language="Javascript">

function redireccionar() {
setTimeout("location.href='newassistance.php'", 3000);}

</script>

</body>

</html>
