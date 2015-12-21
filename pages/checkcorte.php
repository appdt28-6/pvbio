<?php
session_start();
$login=$_POST['login'];
$id=$_POST['emp'];
//verificar campos
if(($_POST['login']=="")){
	header("location:accesocaja.php?**faltan-datos**");
}
else{
if($login=="admonbiogym"){
	$_SESSION['inicia']=$login;
//header ("panel.php");}
//header("location:panel.php");}//loger no encontrado
header("location:cortecaja.php?id=$id");
	}	

else{
header("location:accesocaja.php?**no-tienes-acceso**");}
		
}
?>

