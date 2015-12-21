<?php session_start();?>

<?php
if(!isset($_SESSION['inicia'])){
header("location: index.html?**sin-asistencias**");
} else { 
$e=$_SESSION['inicia'];
$id=$_GET['id'];
} /* Y cerramos el else */ 
echo "</div>";
date_default_timezone_set('mexico/general');
        $fch1=date("Y-m-d")." 00:00:00";
        $fch2=date("Y-m-d")." 23:59:59";
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
                        <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
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
                             <a href="#"><i class="fa  fa-credit-card  fa-fw"></i> Registrar Entrada<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="entradas.php?id=<?php echo $id; ?>">Registrar entrada</a>
                                </li>
                                 
                                <li>
                                    <a href="verentrada.php?id=<?php echo $id; ?>">Ver entrada</a>
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
                    <h1 class="page-header">Area de asistencia <?php echo date("d-m-y"); ?></h1><a href="javascript:print()">Imprimir</a>
                </div>
                <!-- /.col-lg-12 -->
            </div>
           
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            MENSUALIDAD ESTUDIANTE
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                           
                                        </tr>
                                    </thead>
                                    <tbody>
                                     <?php
                                        include ('connect.php');
                                        
                                   $query = "SELECT socios.nombre as nombre , asistencias.area as area, asistencias.llegada as llegada,asistencias.salida as salida FROM asistencias inner join socios on socios.id_socio=asistencias.id_socio where area='MENSUALIDAD ESTUDIANTE' and fecha BETWEEN '$fch1' AND '$fch2' ";
                                  $result = mysql_query($query);
								  $cuenta = mysql_num_rows($result);
echo $cuenta." Socios";
                                        mysql_free_result($result);
                                    mysql_close($link);

                                        ?>
                                        
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-6 -->
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            MENSUALIDAD TODO INCLUIDO
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                           
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        include ('connect.php');
                                        
                                   $query2 = "SELECT socios.nombre as nombre , asistencias.area as area, asistencias.llegada as llegada,asistencias.salida as salida FROM asistencias inner join socios on socios.id_socio=asistencias.id_socio where area='MENSUALIDAD TODO INCLUIDO' and fecha BETWEEN '$fch1' AND '$fch2' ";
                                 $result2 = mysql_query($query2);
								 $cuenta = mysql_num_rows($result2);
echo $cuenta." Socios";
                                        mysql_free_result($result2);
                                    mysql_close($link);

                                        ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-6 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            MENSUALIDAD GYM
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                          
                                       
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        include ('connect.php');
                                        
                                   $query3 = "SELECT socios.nombre as nombre , asistencias.area as area,asistencias.llegada as llegada,asistencias.salida as salida FROM asistencias inner join socios on socios.id_socio=asistencias.id_socio where area='MENSUALIDAD GYM' and fecha BETWEEN '$fch1' AND '$fch2' ";
                                 $result3 = mysql_query($query3);
								  $cuenta = mysql_num_rows($result3);
echo $cuenta." Socios";
                                        mysql_free_result($result3);
                                    mysql_close($link);

                                        ?>
                                        
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-6 -->
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           CLASE GYM</div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive table-bordered">
                                <table class="table">
                                    <thead>
                                        <tr>
                                           
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        include ('connect.php');
                                        
                                   $query4 = "SELECT area,llegada FROM asistencias_clase where area='CLASE GYM' and fecha BETWEEN '$fch1' AND '$fch2' ";
                                  $result4 = mysql_query($query4);
								   $cuenta = mysql_num_rows($result4);
echo $cuenta." Socios";
                                        mysql_free_result($result4);
                                    mysql_close($link);

                                        ?>
                                 
                                        
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-6 -->
            </div>
                <!-- /.row -->
                <!-- /.row -->
            <div class="row">
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            MENSUALIDAD ZUMBA
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            
                                       
                                        </tr>
                                    </thead>
                                    <tbody>
                                       <?php
                                        include ('connect.php');
                                        
                                   $query5 = "SELECT socios.nombre as nombre , asistencias.area as area,asistencias.llegada as llegada,asistencias.salida as salida FROM asistencias inner join socios on socios.id_socio=asistencias.id_socio where area='MENSUALIDAD ZUMBA' and fecha BETWEEN '$fch1' AND '$fch2' ";
                                  $result5 = mysql_query($query5);
								   $cuenta = mysql_num_rows($result5);
echo $cuenta." Socios";
                                        mysql_free_result($result5);
                                    mysql_close($link);

                                        ?>
                                        
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-6 -->
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           CLASE ZUMBA
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive table-bordered">
                                <table class="table">
                                    <thead>
                                        <tr>
                                                                             
                                        </tr>
                                    </thead>
                                  <tbody>
                                  <tr>  
                                  <td>
                                  <?php
								  //clase 8:15
								  $c1=date("Y-m-d")." 06:00:00";
								  $c2=date("Y-m-d")." 08:30:00";
                                        include ('connect.php');
                                        
                                   $query6 = "SELECT area,llegada FROM asistencias_clase where area='CLASE ZUMBA' and fecha BETWEEN '$c1' AND '$c2' ";
                                  $result6 = mysql_query($query6);
								   $cuenta = mysql_num_rows($result6);
echo "8:15 <br> ".$cuenta." Socios";
                                        mysql_free_result($result6);
                                    mysql_close($link);

                                        ?>
                                        <td>
                                         <td>
                                  <?php
								  //clase 8:15
								  $c1=date("Y-m-d")." 08:31:00";
								  $c2=date("Y-m-d")." 09:30:00";
                                        include ('connect.php');
                                        
                                   $query62 = "SELECT area,llegada FROM asistencias_clase where area='CLASE ZUMBA' and fecha BETWEEN '$c1' AND '$c2' ";
                                  $result62 = mysql_query($query62);
								   $cuenta = mysql_num_rows($result62);
echo "9:15 <br> ".$cuenta." Socios";
                                        mysql_free_result($result62);
                                    mysql_close($link);

                                        ?>
                                        <td>
                                  <?php
								  //clase 8:15
								  $c1=date("Y-m-d")." 09:31:00";
								  $c2=date("Y-m-d")." 18:30:00";
                                        include ('connect.php');
                                        
                                   $query63 = "SELECT area,llegada FROM asistencias_clase where area='CLASE ZUMBA' and fecha BETWEEN '$c1' AND '$c2' ";
                                  $result63 = mysql_query($query63);
								   $cuenta = mysql_num_rows($result63);
echo "18:15 <br> ".$cuenta." Socios";
                                        mysql_free_result($result63);
                                    mysql_close($link);

                                        ?>
                                        <td>
                                          <td>
                                  <?php
								  //clase 8:15
								  $c1=date("Y-m-d")." 18:31:00";
								  $c2=date("Y-m-d")." 19:30:00";
                                        include ('connect.php');
                                        
                                   $query64 = "SELECT area,llegada FROM asistencias_clase where area='CLASE ZUMBA' and fecha BETWEEN '$c1' AND '$c2' ";
                                  $result64 = mysql_query($query64);
								   $cuenta = mysql_num_rows($result64);
echo "19:15 <br> ".$cuenta." Socios";
                                        mysql_free_result($result64);
                                    mysql_close($link);

                                        ?>
                                        <td>
                                          <td>
                                  <?php
								  //clase 8:15
								  $c1=date("Y-m-d")." 19:31:00";
								  $c2=date("Y-m-d")." 20:30:00";
                                        include ('connect.php');
                                        
                                   $query65 = "SELECT area,llegada FROM asistencias_clase where area='CLASE ZUMBA' and fecha BETWEEN '$c1' AND '$c2' ";
                                  $result65 = mysql_query($query65);
								   $cuenta = mysql_num_rows($result65);
echo "20:15 <br> ".$cuenta." Socios";
                                        mysql_free_result($result65);
                                    mysql_close($link);

                                        ?>
                                        <td>
                                        </tr>
                                                                            </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-6 -->
            </div>
            <!-- /.row -->
             <!-- /.row -->
            <div class="row">
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            MENSUALIDAD HIP-HOP
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                           
                                       
                                        </tr>
                                    </thead>
                                    <tbody>
                                       <?php
                                        include ('connect.php');
                                        
                                   $query7 = "SELECT socios.nombre as nombre , asistencias.area as area,asistencias.llegada as llegada,asistencias.salida as salida FROM asistencias inner join socios on socios.id_socio=asistencias.id_socio where area='MENSUALIDAD HIP-HOP' and fecha BETWEEN '$fch1' AND '$fch2' ";
                                  $result7 = mysql_query($query7);
								   $cuenta = mysql_num_rows($result7);
echo $cuenta." Socios";
                                        mysql_free_result($result7);
                                    mysql_close($link);

                                        ?>
                                        
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-6 -->
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           CLASE HIP-HOP
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive table-bordered">
                                <table class="table">
                                    <thead>
                                        <tr>
                                           
                                        </tr>
                                    </thead>
                                     <?php
                                        include ('connect.php');
                                        
                                   $query8 = "SELECT area,llegada FROM asistencias_clase where area='CLASE HIP-HOP' and fecha BETWEEN '$fch1' AND '$fch2' ";
                                  $result8 = mysql_query($query8);
								   $cuenta = mysql_num_rows($result8);
echo $cuenta." Socios";
                                        mysql_free_result($result8);
                                    mysql_close($link);

                                        ?>
                                                                            </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-6 -->
            </div>
            <!-- /.row -->
                <!-- /.row -->
            <div class="row">
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            MENSUALIDAD FAMILIAR
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                           
                                       
                                        </tr>
                                    </thead>
                                    <tbody>
                                       <?php
                                        include ('connect.php');
                                        
                                   $query9 = "SELECT socios.nombre as nombre , asistencias.area as area,asistencias.llegada as llegada,asistencias.salida as salida FROM asistencias inner join socios on socios.id_socio=asistencias.id_socio where area=' MENSUALIDAD FAMILIAR' and fecha BETWEEN '$fch1' AND '$fch2' ";
                                  $result9 = mysql_query($query9);
								   $cuenta = mysql_num_rows($result9);
echo $cuenta." Socios";
                                        mysql_free_result($result9);
                                    mysql_close($link);

                                        ?>
                                        
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-6 -->
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            MENSUALIDAD FAMILIAR GYM
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive table-bordered">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            
                                        </tr>
                                    </thead>
                                    <?php
                                        include ('connect.php');
                                        
                                   $query10 = "SELECT socios.nombre as nombre , asistencias.area as area ,asistencias.llegada as llegada,asistencias.salida as salida FROM asistencias inner join socios on socios.id_socio=asistencias.id_socio where area=' MENSUALIDAD FAMILIAR GYM' and fecha BETWEEN '$fch1' AND '$fch2' ";
                                  $result10 = mysql_query($query10);
								   $cuenta = mysql_num_rows($result10);
echo $cuenta." Socios";
                                        mysql_free_result($result10);
                                    mysql_close($link);

                                        ?>
                                                                            </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-6 -->
            </div>
            <!-- /.row -->
			     <!-- /.row -->
            <div class="row">
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            MENSUALIDAD COMPLETA
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                           
                                        
                                        </tr>
                                    </thead>
                                    <tbody>
                                       <?php
                                        include ('connect.php');
                                        
                                   $query11 = "SELECT socios.nombre as nombre , asistencias.area as area, asistencias.llegada as llegada,asistencias.salida as salida FROM asistencias inner join socios on socios.id_socio=asistencias.id_socio where area='MENSUALIDAD COMPLETA' and fecha BETWEEN '$fch1' AND '$fch2' ";
                                  $result11 = mysql_query($query11);
								   $cuenta = mysql_num_rows($result11);
echo $cuenta." Socios";
                                        mysql_free_result($result11);
                                    mysql_close($link);

                                        ?>
                                        
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-6 -->
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            MENSUALIDAD HAWAIANO
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive table-bordered">
                                <table class="table">
                                    <thead>
                                        <tr>
                                           
                                        </tr>
                                    </thead>
                                    <?php
                                        include ('connect.php');
                                        
                                   $query12 = "SELECT socios.nombre as nombre , asistencias.area as area ,asistencias.llegada as llegada,asistencias.salida as salida FROM asistencias inner join socios on socios.id_socio=asistencias.id_socio where area='MENSUALIDAD HAWAIANO' and fecha BETWEEN '$fch1' AND '$fch2' ";
                                  $result12 = mysql_query($query12);
								   $cuenta = mysql_num_rows($result12);
echo $cuenta." Socios";                                        mysql_free_result($result12);
                                    mysql_close($link);

                                        ?>
                                                                            </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-6 -->
            </div>
            <!-- /.row -->
            		     <!-- /.row -->
            <div class="row">
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            MENSUALIDAD PRE-BALLET
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                           
                                        </tr>
                                    </thead>
                                    <tbody>
                                       <?php
                                        include ('connect.php');
                                        
                                   $query13 = "SELECT socios.nombre as nombre , asistencias.area as area,asistencias.llegada as llegada,asistencias.salida as salida FROM asistencias inner join socios on socios.id_socio=asistencias.id_socio where area=' MENSUALIDAD PRE-BALLET' and fecha BETWEEN '$fch1' AND '$fch2' ";
                                  $result13 = mysql_query($query13);
								   $cuenta = mysql_num_rows($result13);
echo $cuenta." Socios";
                                        mysql_free_result($result13);
                                    mysql_close($link);

                                        ?>
                                        
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-6 -->
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            CLASE PREBALLET
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive table-bordered">
                                <table class="table">
                                    <thead>
                                        <tr>
                                           
                                        </tr>
                                    </thead>
                                     <?php
                                        include ('connect.php');
                                        
                                   $query14 = "SELECT area,llegada FROM asistencias_clase where area='CLASE PREBALLET' and fecha BETWEEN '$fch1' AND '$fch2' ";
                                  $result14 = mysql_query($query14);
								   $cuenta = mysql_num_rows($result14);
echo $cuenta." Socios";
                                        mysql_free_result($result14);
                                    mysql_close($link);

                                        ?>
                                                                            </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-6 -->
            </div>
            <!-- /.row -->
            
             <!-- /.row -->
            <div class="row">
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           CLASE BOX
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                           
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        include ('connect.php');
                                        
                                   $query15 = "SELECT area,llegada FROM asistencias_clase where area='CLASE BOX' and fecha BETWEEN '$fch1' AND '$fch2' ";
                                  $result15= mysql_query($query15);
								   $cuenta = mysql_num_rows($result15);
echo $cuenta." Socios";
                                        mysql_free_result($result15);
                                    mysql_close($link);

                                        ?>
                                        
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-6 -->
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            CLASE SALSA
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive table-bordered">
                                <table class="table">
                                    <thead>
                                        <tr>
                                           
                                        </tr>
                                    </thead>
                                    <?php
                                        include ('connect.php');
                                        
                                   $query16 = "SELECT area,llegada FROM asistencias_clase where area='CLASE SALSA' and fecha BETWEEN '$fch1' AND '$fch2' ";
                                  $result16 = mysql_query($query16);
								   $cuenta = mysql_num_rows($result16);
echo $cuenta." Socios";
                                        mysql_free_result($result16);
                                    mysql_close($link);

                                        ?>

                                                                            </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-6 -->
            </div>
            <!-- /.row -->
            
                     <!-- /.row -->
            <div class="row">
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           CLASE TEABO
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                       
                                    </thead>
                                    <tbody>
                                        <?php
                                        include ('connect.php');
                                        
                                   $query17 = "SELECT area,llegada FROM asistencias_clase where area='CLASE TEABO' and fecha BETWEEN '$fch1' AND '$fch2' ";
                                  $result17 = mysql_query($query17);
								   $cuenta = mysql_num_rows($result17);
echo $cuenta." Socios";
                                        mysql_free_result($result17);
                                    mysql_close($link);

                                        ?>
                                        
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-6 -->
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            DEFENSA PERSONAL
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive table-bordered">
                                <table class="table">
                                    <thead>
                                        <tr>
                                           
                                        </tr>
                                    </thead>
                                     <?php
                                        include ('connect.php');
                                        
                                   $query18 = "SELECT area,llegada FROM asistencias_clase where area='DEFENSA PERSONAL' and fecha BETWEEN '$fch1' AND '$fch2' ";
                                  $result18 = mysql_query($query18);
								   $cuenta = mysql_num_rows($result18);
echo $cuenta." Socios";
                                        mysql_free_result($result18);
                                    mysql_close($link);

                                        ?>

                                                                            </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-6 -->
            </div>
            <!-- /.row -->
                                 <!-- /.row -->
            <div class="row">
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           Anualidad 2X1
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                           
                                        </tr>
                                    </thead>
                                    <tbody>
                                       <?php
                                        include ('connect.php');
                                        
                                   $query20 = "SELECT socios.nombre as nombre , asistencias.area as area,asistencias.llegada as llegada,asistencias.salida as salida FROM asistencias inner join socios on socios.id_socio=asistencias.id_socio where area='Anualidad 2X1' and fecha BETWEEN '$fch1' AND '$fch2' ";
                                  $result20 = mysql_query($query20);
								   $cuenta = mysql_num_rows($result20);
echo $cuenta." Socios";
                                        mysql_free_result($result20);
                                    mysql_close($link);

                                        ?>
                                        
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-6 -->
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           OTRA
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive table-bordered">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            
                                        </tr>
                                    </thead>
                                    <?php
                                        include ('connect.php');
                                        

                                   $query21 = "SELECT socios.nombre as nombre , asistencias.area as area ,asistencias.llegada as llegada,asistencias.salida as salida FROM asistencias inner join socios on socios.id_socio=asistencias.id_socio where area='OTRA' and fecha BETWEEN '$fch1' AND '$fch2' ";
                                  $result21 = mysql_query($query21);
								   $cuenta = mysql_num_rows($result21);
										echo $cuenta." Socios";
                                 
                                        mysql_free_result($result21);
                                    mysql_close($link);

                                        ?>
                                                                            </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-6 -->
            </div>
            <!-- /.row -->
            
			 <div class="well">
                                <h4>Lista completa</h4>
                               
                                <a class="btn btn-default btn-lg btn-block" target="_self" href="asistenciamod.php?id=<?php echo $id; ?>">Ver Lista Completa</a>
                            </div>
            
            <div class="well">
                                <h4>Crear reporte por modalidad</h4>
                               
                                <a class="btn btn-default btn-lg btn-block" target="_self" href="detallessocios.php?id=<?php echo $id; ?>">Crear Reporte</a>
                            </div>
           
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