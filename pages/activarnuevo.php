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

    <title>Activacion de Socios</title>

    <!-- Bootstrap Core CSS -->
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

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
                        <h3 class="panel-title">Activar Socio</h3>
                    </div>
                    <div class="panel-body">
                    <form action="reg_nuevosocio.php" method="POST" >
                            <fieldset>                    
                        
                                <div class="form-group">
                                <label>Clave de Socio:</label>
                                    <input class="form-control" name="clave" type="text" value="<?php echo $id; ?>" readonly>
                                </div>
                                <div class="form-group">
                                <label>Nombre:</label>
                                 <?php
                                        include ('connect.php');
										 $fecha = date('Y-m-j');
									$nuevafecha = strtotime ( '+1 month' , strtotime ( $fecha ) ) ;
								$nuevafecha = date ( 'Y-m-j' , $nuevafecha );
                                        
                                   $query = "SELECT nombre FROM socios where id_socio=$id ";
                                  $result = mysql_query($query);
                                  while($row = mysql_fetch_array($result))
                                  { echo "<input class=\"form-control\" name=\"nombre\" type=\"text\" value=\"".$row['nombre']."\" readonly>";
								  }
								  mysql_free_result($result);
                                    mysql_close($link);
								  ?>
                               
                                </div>
                                <div class="form-group">
                                <label>Fecha de ingreso:</label>
                                <input class="form-control" name="fini" type="text" value="<?php echo date('Y-m-d'); ?>" readonly>
                                </div>
                                 <div class="form-group">
                                <label>Fecha de proximo pago:</label>
                                <input class="form-control" name="ffin" type="text" value="<?php echo $nuevafecha; ?>" readonly>
                                </div>
                                 <div class="form-group">
                                <label>ID Ticket de pago:</label>
                                <input class="form-control" name="ticket" type="text">
                                </div>
                                <!--<div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me">Recordar
                                    </label>
                                </div>-->
                                <!-- Change this to a button or input when using this as a form -->
                                <input type="submit" class="tn btn-lg btn-success btn-block" value="Registrar">
                                
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

</body>

</html>
