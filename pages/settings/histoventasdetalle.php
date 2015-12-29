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

    <title>Biogym-Panel</title>

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
                            <a href="index.php"><i class="fa fa-dashboard fa-fw"></i>Inicio</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-list-alt fa-fw"></i> Productos<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="confiproducts.php">Inventario</a>
                                </li>
                               
                                <li>
                                    <a href="configconcept.php">Conceptos</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-barcode fa-fw"></i> Info Caja<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="infocaja.php">Caja al dia</a>
                                </li>
                            </ul>
                            </li>
                            <li>
                            <a href="#"><i class="fa fa-eject fa-fw"></i>Cancelaciones<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="pagos.php">Pagos/Salidas</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                            <li>
                            <a href="#"><i class="fa fa-user fa-fw"></i>Personal Biogym<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                            <li>
                                    <a href="personal.php">Personal</a>
                                </li>
                                <li>
                                    <a href="info_asis_personal.php">Asistencia</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                       <li>
                            <a href="#"><i class="fa fa-users fa-fw"></i>Socios Biogym<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                            <li>
                                    <a href="socios.php">Socios</a>
                                </li>
                                <li>
                                    <a href="asistencias.php">Asistencia</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                       <!-- <li>
                             <a href="#"><i class="fa fa-list-alt fa-fw"></i>Programación<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="programacionfijos.php">Fijos</a>
                                </li>
                                 <li>
                                    <a href="programacionvariables.php">Variables</a>
                                </li>
                            </ul>
                        </li>-->
                        <!--<li>
                             <a href="egresos.php"><i class="fa fa-list-alt fa-fw"></i>Egresos<span class="fa arrow"></span></a>
                           
                        </li>-->
                        <li>
                             <a href="/tutorial/otrostickets.php?id=2&&f1=2015-10-10" target="_blank"><i class="fa fa-arrow-circle-left"></i>Recuperar Ticket</a>
                            <!-- /.nav-second-level -->
                        </li>
                        
                        <li>
                             <a href="pagos.php" target="_blank"><i class="fa fa-list-alt fa-fw"></i>Generar Pagos</a>
                            <!-- /.nav-second-level -->
                        </li>
                          <li>
                             <a href="clases.php"><i class="fa fa-warning fa-fw"></i>Activar Clases</a>
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
                <h1 class="page-header">Historial de ventas de: <?php echo $_POST['fecha']." a ".$_POST['fecha2']; ?></h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             <form action="#" method="post">
                         <input type="date" name="fecha">
                         <input type="date" name="fecha2">
                          <input type="submit" value="Buscar">
                         </form>
                        </div> 
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Ticket</th>
                                            <th>Importe</th>
                                            <th>Detalle</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        include ('../connect.php');
                                        date_default_timezone_set('mexico/general');
                                    $fch1=$_POST['fecha']." 00:00:00";
                                    $fch2=$_POST['fecha2']." 23:59:59";
                                         $query = "SELECT idTicket, subtotal  FROM tickets where fecha BETWEEN '$fch1' AND '$fch2' ";
                                  $result = mysql_query($query);
                                  while($row = mysql_fetch_array($result))
                                  {
                                   echo "<tr class=\"odd gradeX\">";
                                            echo "<td>".$row['idTicket']."</td>";
                                            echo "<td class=\"center\">".$row['subtotal']."</td>";
                                              echo "<td class=\"center\"><a href=\"detallesventa.php?ticket=".$row['idTicket']." \">Detalles</a></td>";
                                        echo "</tr>";
                                  }
                                        mysql_free_result($result);
                                    mysql_close($link);

                                        ?>
                                        
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                           <!-- <div class="well">
                                
                                <a class="btn btn-default btn-lg btn-block" href="histoventas.php" target="_self">Historial de ventas</a>
                            </div>-->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
           
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

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
