<?php session_start();?>

<?php
if(!isset($_SESSION['inicia'])){
header("location: index.html?**sin-acceso**");
} else { 
$e=$_SESSION['inicia'];
} /* Y cerramos el else */ 

?>
<?php 
	
	require 'database.php';

	if ( !empty($_POST)) {
		// keep track validation errors
		$conceptoError = null;
		$importeError = null;
		$tipoError = null;
		$descripcionError = null;
		// keep track post values
		$concepto = $_POST['concepto'];
		$importe = $_POST['importe'];
		$tipo= $_POST['tipo'];
		$descripcion=$_POST['descripcion'];
		
		
		// validate input
		$valid = true;
		if (empty($concepto)) {
			$conceptoError = 'Please enter Concepto';
			$valid = false;
		}
		
		if (empty($importe)) {
			$importeError = 'Please enter Importe';
			$valid = false;
		}
		
		// insert data
		if ($valid) {
			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "INSERT INTO pagosextras (concepto,cantidad,tipo,descripcion) values(?,?,?,?)";
			$q = $pdo->prepare($sql);
			$q->execute(array($concepto,$importe,$tipo,$descripcion));
			
			Database::disconnect();
			header("Location: pagosextra.php");
		}
	}
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

    <!-- Timeline CSS -->
    <link href="../../dist/css/timeline.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../../bower_components/morrisjs/morris.css" rel="stylesheet">

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
                <a class="navbar-brand" href="index.html">Biogym-Panel de administrador</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <!-- /.dropdown -->
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
                             <a href="/pvbio/pages/settings/tutorial/otrostickets.php?id=2&&f1=2015-10-10" target="_blank"><i class="fa fa-arrow-circle-left"></i>Recuperar Ticket</a>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-list-alt fa-fw"></i>Generar Pagos<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                        <li>
                             <a href="pagos.php">Generar Pagos</a>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                        <a href="pagosextra.php">Pago Extra/Salida Extra </a>
                        </ul>
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
                    <h1 class="page-header">Pagos</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="panel panel-default">
                       
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                           
                           <form class="form-horizontal" action="regpagoextra.php" method="post">
                           
                           
                           
					  <div class="control-group <?php echo !empty($conceptoError)?'error':'';?>">
					    <label class="control-label">Concepto</label>
					    <div class="controls">
					      	<input name="concepto" type="text"  placeholder="Concepto" value="<?php echo !empty($concepto)?$concepto:'';?>">
					      	<?php if (!empty($conceptoError)): ?>
					      		<span class="help-inline"><?php echo $conceptoError;?></span>
					      	<?php endif; ?>
					    </div>
					  </div>
                      
					  <div class="control-group <?php echo !empty($importeError)?'error':'';?>">
					    <label class="control-label">Importe</label>
					    <div class="controls">
					      	<input name="importe" type="text" placeholder="Importe" value="<?php echo !empty($importe)?$importe:'';?>">
					      	<?php if (!empty($importeError)): ?>
					      		<span class="help-inline"><?php echo $importeError;?></span>
					      	<?php endif;?>
					    </div>
					  </div>
                      
                      <div class="control-group <?php echo !empty($tipoError)?'error':'';?>">
					    <label class="control-label">Tipo de Transacción</label>
					    <div class="controls">
                           <select name="tipo"> 
								<option value="Ingreso">Ingreso</option> 
								<option value="Egreso">Egreso</option>
                                 <?php echo !empty($tipo)?$tipo:'';?>
                                </select>
                             

					      	<?php if (!empty($tipoError)): ?>
					      		<span class="help-inline"><?php echo $tipoError;?></span>
					      	<?php endif;?>
					    </div>
					  </div>
                      
                      
                      
					  <div class="control-group <?php echo !empty($descripcionError)?'error':'';?>">
					    <label class="control-label">Descripci&oacute;n</label>
					    <div class="controls">
					      	<input name="descripcion" type="text" placeholder="Descripci&oacute;n" value="<?php echo !empty($importe)?$importe:'';?>">
					      	<?php if (!empty($descripcionError)): ?>
					      		<span class="help-inline"><?php echo $descripcionError;?></span>
					      	<?php endif;?>
					    </div>
					  </div>
                      
                      
					 
					  <div class="form-actions">
						  <button type="submit" class="btn btn-success">Generar</button>
						  <a class="btn btn-info" href="pagosextra.php">Regresar</a>
						</div>
					</form>
                           
                        </div>
                        <!-- /.panel-body -->
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

    <!-- Morris Charts JavaScript -->
    <script src="../../bower_components/raphael/raphael-min.js"></script>
    <script src="../../bower_components/morrisjs/morris.min.js"></script>
    <script src=../"../js/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../../dist/js/sb-admin-2.js"></script>

</body>

</html>