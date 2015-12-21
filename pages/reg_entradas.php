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

    <title>Asistensia por socio</title>

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
                        <h3 class="panel-title">Datos de acceso</h3>
                    </div>
                    <div class="panel-body">
                     <form action="#" method="POST" >
                            <fieldset>

<?php 
include('connect.php');
//variables
$id=$_GET['id'];
$cantidad=$_POST['cantidad'];
$concepto=$_POST['concepto'];
//inserta
//if de llenar campos

mysql_query("INSERT INTO entradas SET concepto='$concepto',
cantidad='$cantidad',id_usuario='$id';",$link) or die("error al agregar");
	echo "<div class=\"alert alert-success\">";
                        echo "Entrada Registrado con exito<a class=\"alert-link\" href=\"#\"></a>";
                        echo "</div>";


?>
   <!--<div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me">Recordar
                                    </label>
                                </div>-->
                                <!-- Change this to a button or input when using this as a form -->
                                <a href="entradas.php?id=<?php echo $id; ?>" class="tn btn-lg btn-warning btn-block">Salir</a>
                               
                                
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
