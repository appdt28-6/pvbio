<?php session_start();?>

<?php
if(!isset($_SESSION['inicia'])){
header("location: index.html?**sin-acceso**");
} else { 
$e=$_SESSION['inicia'];
} /* Y cerramos el else */ 
echo "</div>";
date_default_timezone_set('mexico/general');
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Editar Producto</title>

    <!-- Bootstrap Core CSS -->
    <link href="../../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="../../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="../../bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

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
                 <center>
<img src="../../images/logo.png" width="333" height="64">
</center>
                <div class="login-panel panel panel-default">

                    <div class="panel-heading">
                        <h3 class="panel-title">Datos de acceso</h3>
                    </div>
                    <div class="panel-body">
                     <form action="#" method="POST" >
                            <fieldset>
                       <?php 
                        include('../connect.php');
						$barcode=$_POST['barcode'];
						$producto=$_POST['producto'];
						$precio=$_POST['precio'];
						
				$sql = mysql_query("insert into productos SET codigoBarras='$barcode',idSublinea=1,descripcion='$producto',precio='$precio' ");
					
					if(!$sql){
										 
						echo "<div class=\"alert alert-danger\">";
                        echo "Tenemos un problema con tu solicitud<a class=\"alert-link\" href=\"#\"></a>";
                        echo "</div>";
					}else{
						
						echo "<div class=\"alert alert-success\">";
                        echo "Concepto Registrado";
                        echo "</div>";
					}
							?> 
                                <!--<div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me">Recordar
                                    </label>
                                </div>-->
                                <!-- Change this to a button or input when using this as a form -->
                                <a href="configconcept.php" class="tn btn-lg btn-warning btn-block">Salir</a>
                               
                                
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

  <!-- jQuery -->
    <script src="../../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="../../bower_components/DataTables/media/js/jquery.dataTables.min.js"></script>
    <script src="../../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../../dist/js/sb-admin-2.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });
    </script>

</body>

</html>