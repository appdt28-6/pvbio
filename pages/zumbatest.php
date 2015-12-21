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

                                        <?php
                                        include ('connect.php');
										date_default_timezone_set('mexico/general');
     									$dia=date('w');
										$hora=$_GET['hora'];
											                                     
								  $query = "SELECT * FROM `lugareszumba` WHERE dia='$dia' and hora='$hora' and status=0 ";
                                  $result = mysql_query($query);
                                  while($row = mysql_fetch_array($result))
                                  {
									 
                                 
                                            echo "<img src=\"..\images/Login.png\" width=\"50\" height=\"50\" >";
											echo $row[3];
                                             echo "<a href=reg_class.php?idlug=".$row[1].">Elegir</a>";
											 echo "<br>";
										
                                  }
                                        mysql_free_result($result);
                                    mysql_close($link);

                                        ?>
                                        
                            
                            </div>
                            <!-- /.table-responsive -->
                           
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
           
        

    </div>
    <!-- /#wrapper -->

</body>

</html>
