<?php
date_default_timezone_set('mexico/general');
$fecha = date('Y-m-j');
$nuevafecha = strtotime ( '-1 day' , strtotime ( $fecha ) ) ;
$nuevafecha = date ( 'Y-m-j' , $nuevafecha );
echo $nuevafecha;
?>