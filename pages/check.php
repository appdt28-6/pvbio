<?php
session_start();
include("connect.php");
$login=$_POST['user'];
$password=md5($_POST['pass']);
//verificar campos
if(($_POST['user']=="")||($_POST['pass']=="")){
	header("location:index.html?**faltan-datos**");
}
else{
$query="SELECT * FROM usuarios WHERE username='$login' and password ='$password'";
$link=mysql_connect($server,$dbuser,$dbpass);
$result=mysql_db_query($database,$query,$link);
	/////////////////////////////////////////////////////////////////////////////////////
	if(!mysql_num_rows($result))
	{
	header("location:index.html?**usuario-no-encontrado**");//loger no encontrado
	}
	///////////////
	else{ 
		$_SESSION['inicia']=$login;
		//cambia usarios activos en inactivos
		date_default_timezone_set('mexico/general');
		$fecha = date('Y-m-j');
		$nuevafecha = strtotime ( '-1 day' , strtotime ( $fecha ) ) ;
		$nuevafecha = date ( 'Y-m-j' , $nuevafecha );
		$sql = mysql_query("UPDATE acceso SET status=0 WHERE vence='$nuevafecha'");
	/////////////////////////////////////////////////////////////////////////////////////
			if(!$sql){
				header("location:panel.php?**sin actualizar**");
			}
			else
			{
			$query2 = "SELECT idUsuario FROM usuarios where username ='$login'  ";
			$result2 = mysql_query($query2);
			while($row = mysql_fetch_array($result2))
					{
						$iduser=$row['idUsuario'];
						if($iduser==2){
							$_SESSION['inicia']=$login;
						header("location:settings/index.php");
						}else{
							header("location:panel.php?id=".$iduser."&&**actualizado**");
							}
					}//while
				}
	///////////////////////////////////////////////////////////////////////////////////////			
	 		mysql_close($sql);
	 }
}
?>

