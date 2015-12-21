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

    <title>Biogym-Panel</title>

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
<div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Biogym-Panel de control</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="login.html"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                          <li>
                            <a href="panel.php?id=<?php echo $id; ?>"><i class="fa fa-dashboard fa-fw"></i>Inicio</a>
                        </li>
                        
                        <li>
                            <a href="#"><i class="fa  fa-credit-card  fa-fw"></i> Pagos<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="pagos.php?id=<?php echo $id; ?>">Registrar pago</a>
                                </li>
                                <li>
                                    <a href="verpagos.php?id=<?php echo $id; ?>">Ver Pagos</a>
                                </li>
                                
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                         <li>
                            <a href="#"><i class="fa fa-users fa-fw"></i>Socios<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                            <li>
                                    <a href="nuevossocios.php?id=<?php echo $id; ?>">Nuevos Socios</a>
                                </li>
                                <li>
                                    <a href="sactivo.php?id=<?php echo $id; ?>">Activos</a>
                                </li>
                                <li>
                                    <a href="sinactivo.php?id=<?php echo $id; ?>">Inactivo</a>
                                </li>
                                 <li>
                                    <a href="asistencias.php?id=<?php echo $id; ?>">Asistencias</a>
                                </li>
                                
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Corte de caja a <?php echo date("d-m-Y H:i:s");?></h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Datos de Operador
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form" action="#" method="post">
                                    
                                        <div class="form-group">
                                        
                                          <?php //variables
										  include('connect.php');

 $codigo=$_POST['codigo'];
 $tarjeta=$_POST['tarjeta'];
 $efectivo=$_POST['efectivo'];
 $salida=$_POST['salida'];
 $total=$efectivo+$tarjeta;
//inserta
//if de llenar campos

mysql_query("INSERT INTO corte SET codigo='$codigo',venta='$total',salida='$salida';",$link) or die("error al agregar");
echo "<div class=\"alert alert-success\">Corte de caja registrado con exito<a class=\"alert-link\" href=\"#\"></a></div>";
?>
                                        </div>
                                        <div class="form-group">
                                        <label>Fondo de caja</label>
                                        <?php
                                        include ('connect.php');
										date_default_timezone_set('mexico/general');
										$fch1=date("Y-m-d")." 00:00:00";
										$fch2=date("Y-m-d")." 23:59:59";
										$query = "SELECT inicaja FROM turno where fecha BETWEEN '$fch1' AND '$fch2' and id_usuario='$id' ";
										$result = mysql_query($query);
										while($row = mysql_fetch_array($result))
                                  		{
									  ?>
            							<input class="form-control" type="text" name="inicaja" value="<?php echo $row['inicaja'];?>" readonly>
                                
                                		 <?php }
                                        mysql_free_result($result);
                                    	mysql_close($link);

                                        ?>
                                        </div>
                                       
                                        <div class="form-group">
                                        <label>Total de Ventas</label>
                                        <?php
                                        include ('connect.php');
                                         date_default_timezone_set('mexico/general');
                                    $fch1=date("Y-m-d")." 00:00:00";
                                    $fch2=date("Y-m-d")." 23:59:59";
                                    $query = "SELECT SUM(subtotal) as total FROM tickets where fecha BETWEEN '$fch1' AND '$fch2' and 		id_usuario='$id'";
                                  $result = mysql_query($query);
                                  while($row = mysql_fetch_array($result))
                                  {
									  ?>
            <input class="form-control" type="text" name="venta" value="<?php echo $row['total'];?>" readonly>
                                
                                 <?php }
                                        mysql_free_result($result);
                                    mysql_close($link);

                                        ?>
                                            
                                           
                                        </div>
                                        <div class="form-group">
                                            <label>Total de Salida</label>
                                             <?php
                                        include ('connect.php');
                                         date_default_timezone_set('mexico/general');
                                    $fch1=date("Y-m-d")." 00:00:00";
                                    $fch2=date("Y-m-d")." 23:59:59";
                                    $query2 = "SELECT SUM(cantidad) as total FROM pagos where fecha BETWEEN '$fch1' AND '$fch2' and id_usuario='$id'";
                                  $result2 = mysql_query($query2);
                                  while($row2 = mysql_fetch_array($result2))
                                  {
	  ?>
            <input class="form-control" type="text" name="salida" value="<?php echo $row2['total'];?>" readonly>
                                
                                 <?php 
                                
                                  }
                                        mysql_free_result($result2);
                                    mysql_close($link);

                                        ?>
                                          
                                        </div>
                                       <a href="cortecaja.php?id=<?php echo $id; ?>" class="btn btn-warning">Salir</a>
                                    </form>
                                </div>
                                
                            </div>
                            <!-- /.row (nested) -->
                             <div class="well">
                                
                                <a class="btn btn-default btn-lg btn-block" target="_blank" href="settings/tutorial/tuto3.php?id=<?php echo $id; ?>">Imprimir Reporte</a><br>
                                 <a class="btn btn-default btn-lg btn-block" href="excel/exportexcel.php?id=<?php echo $id; ?>">Exportar a Excel</a>
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>
</body>
</html>