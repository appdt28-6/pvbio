<?php
session_start();
include('connect.php');
$login=$_POST['login'];
$password=$_POST['password'];
//verificar campos
if(($_POST['login']=="")||($_POST['password']=="")){
	header("location: index.html?**faltan-datos**");
}
else{
$query="SELECT * FROM administrador WHERE nombre='$login' and pass='$password' ";
$link=mysql_connect($server,$dbuser,$dbpass);
$result=mysql_db_query($database,$query,$link);
////////////////////////////////////////////////////////////////////////////////////
if(!mysql_num_rows($result))
{
header("location: index.html?**usuario-no-encontrado**");//loger no encontrado
}
else{ 
$_SESSION['inicia']=$login;
header ("location:panelc.php");}
}
?>

