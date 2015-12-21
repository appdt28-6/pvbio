<?php session_start();?>

<?php
if(!isset($_SESSION['inicia'])){
header("location: index.html?**sin-acceso**");
} else { 
$e=$_SESSION['inicia'];
$id=$_GET['id'];
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

    <title>Activar Turno</title>

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
                 <center>
<img src="../images/logo.png" width="333" height="64">
</center>
                <div class="login-panel panel panel-default">

                    <div class="panel-heading">
                        <h3 class="panel-title">Activar Turno</h3>
                    </div>
                    <div class="panel-body">
                     <form action="#" method="POST" >
                            <fieldset>
                   
                      <div class="form-group"><label>Inicio de caja</label>
                      <input class="form-control" type="text" name="inicaja" value="0" >
                      </div>
                      <input type="submit" class="tn btn-lg btn-success btn-block" value="Entrar">
                      
                                <!-- Change this to a button or input when using this as a form -->
                        <a href="panel.php?id=<?php echo $id; ?>" class="tn btn-lg btn-warning btn-block">Salir</a>
                               
                         </fieldset>
                        </form>
                         <?php 
                        include('connect.php');
						 $fch1=date("Y-m-d")." 00:00:00";
						 $fch2=date("Y-m-d")." 23:59:59";
						$ini=$_POST['inicaja'];
						
						if ($_POST['inicaja']==0){
							echo "<div class=\"alert alert-danger\">";
                        echo "Llene el campo con la catidad que inica la caja<a class=\"alert-link\" href=\"#\"></a>";
                        echo "</div>";
							}else{
						
					$sql = mysql_query("UPDATE turno SET inicaja='$ini',status=1 where fecha BETWEEN '$fch1' AND '$fch2' and id_usuario='$id' ");
					if(!$sql){
										 
						echo "<div class=\"alert alert-danger\">";
                        echo "Tenemos un problema con tu solicitud<a class=\"alert-link\" href=\"#\"></a>";
                        echo "</div>";
					}else{
						
						echo "<div class=\"alert alert-success\">";
                        echo "Configuracion guardada con exito<a class=\"alert-link\" href=\"#\"></a>";
                        echo "</div>";
					}
					
					}
							
							?> 
                        
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

    <!-- DataTables JavaScript -->
    <script src="../bower_components/DataTables/media/js/jquery.dataTables.min.js"></script>
    <script src="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

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
