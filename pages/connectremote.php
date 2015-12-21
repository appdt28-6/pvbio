<?php
$server="biogym.com.mx";
$database="biogymco_control";
$dbpass="admin1234";
$dbuser="biogymco_admin";
$link=mysql_connect($server,$dbuser,$dbpass);
mysql_select_db($database,$link);
?>