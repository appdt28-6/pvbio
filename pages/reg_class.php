<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Registrar Clase</title>

    <!-- Bootstrap Core CSS -->
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="../bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
   
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                 
                <div class="login-panel panel panel-default">

                    <div class="panel-heading">
                        <h3 class="panel-title">Asignacion de lugar</h3>
                    </div>
                    <div class="panel-body">
                     <form action="#" method="POST" >
                            <fieldset>
                       <?php 
                        include('connect.php');
						$id=$_GET['idlug'];
						$sql = mysql_query("UPDATE lugareszumba SET status=1 where id_lugar=$id");
						if(!$sql){			 
						echo "<div class=\"alert alert-danger\">";
                        echo "Tenemos un problema con tu solicitud<a class=\"alert-link\" href=\"#\"></a>";
                        echo "</div>";
						}else{
						$query = "SELECT lugar FROM lugareszumba where id_lugar='$id'";
                                $result = mysql_query($query);
                                while($row = mysql_fetch_array($result))
                                {
									  
									echo "<div class=\"alert alert-success\">";
                        			echo "Lugar seleccionado ".$row['lugar']."<a class=\"alert-link\" href=\"#\"></a>";
                        			echo "</div>";
									$l=$row['lugar'];
									///Inserta asistencia
										date_default_timezone_set('mexico/general');
								$llega=date('H:i:s');
								$area="CLASE ZUMBA";
								mysql_query("INSERT INTO asistencias_clase SET id_socio=0,area='$area',llegada='$llega';",$link) or die("error al agregar");
									
								  }
						
					}
						
					
							?>    
                            </fieldset>
                        </form>
                    </div>
                     <div class="well">
                                
                                <a class="btn btn-default btn-lg btn-block" href="confirmar.php?lugar=<?php echo $l;?>">Confirmar</a>
                            </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
