<?php
session_start();
echo $login=$_POST['login'];
//verificar campos
if(($_POST['login']=="")){
	header("location:accesoconfig.php?**faltan-datos**");
}
else{
if($login=="admin"){
	$_SESSION['inicia']=$login;
//header ("panel.php");}
//header("location:panel.php");}//loger no encontrado
header("location:settings.php");
	}	

else{
header("location:accesoconfig.php?**no-tienes-acceso**");}
		
}
?>

