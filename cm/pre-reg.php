<!DOCTYPE html>

<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Pre-Registro</title>
	
	<!-- Stylesheets -->
	<link href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet'>
	<link rel="stylesheet" href="css/style.css">
	
	<!-- Optimize for mobile devices -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	
	<!-- jQuery & JS files -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
	<script src="js/script.js"></script>  
</head>
<body>
		
			
				
				<div class="content-module-main">
                <img src="images/logo.png">
                
                <form action="reg_pre.php" method="POST" id="">
                
			<fieldset>
                
  <div class="information-box round">Datos Personales</div>
  <table width="400px" border="0">
  <tr>
    <td width="48%">Tipo de Membresia:
<select name="membre"><option>Todo incluido</option><option>Area de pesas</option><option>Zumba</option><option>Visita</option></select></td>
    <td width="19%">
   Sexo:
                   <select name="gen">
                    <option>M</option>
                    <option>F</option>
                   </select></td>
    <td width="33%">Edad:
                    <input type="text" name="edad" id="" class=""autofocus size="4" /></td>
  </tr>
</table>
 					Nombre:
			  <input type="text" name="nombre" id="" class="" autofocus size="100"/>
                   <p></p>
              <table width="600" border="0">
  <tr>
    <td width="52%">Fecha de Nacimiento:<br>
                    Dia:
                   <select name="dia"> <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                    <option>6</option>
                    <option>7</option>
                    <option>8</option>
                    <option>9</option>
                    <option>10</option>
                    <option>11</option>
                    <option>12</option>
                    <option>13</option>
                    <option>14</option>
                    <option>15</option>
                    <option>16</option>
                    <option>17</option>
                    <option>18</option>
                    <option>19</option>
                    <option>20</option>
                    <option>21</option>
                    <option>22</option>
                    <option>23</option>
                    <option>24</option>
                    <option>25</option>
                    <option>26</option>
                    <option>27</option>
                    <option>28</option>
                    <option>29</option>
                    <option>30</option>
                    <option>31</option>
              </select>
                    
                    Mes:
                    <select name="mes"> <option>ENE</option>
                    <option>FEB</option>
                    <option>MAR</option>
                    <option>ABR</option>
                    <option>MAY</option>
                    <option>JUN</option>
                    <option>JUL</option>
                    <option>AGO</option>
                    <option>SEP</option>
                    <option>OCT</option>
                    <option>NOV</option>
                    <option>DIC</option>
                    </select>
                    Año:
                    <input type="text" name="anio" id="" class=""size="4"/></td>
    <td width="16%">               
      Teléfono:
					<input type="text" name="tel" id="" class="" autofocus size="10"/></td>
    <td width="32%"> Email:
					<input type="text" name="email" id="" class="" /></td>
  </tr>
</table>
     <p></p>
                      Como te encontramos en Facebook (Opcional):
              <input type="text" name="face" id="" class="" size="50"/><p></p>
              FRACCIONAMIENTO | | COLONIA:
                    <input type="text" name="direc" id="" class=""  size="100"/><br>
                     <br>
                    Calle:
                    <input type="text" name="calle" id="" class=""  size=35/>
                      No.Interior:
                    <input type="text" name="inte" id="" class="" autofocus size=10/>
                     No.Exterior:
                    <input type="text" name="exter" id="" class="" autofocus size=10/>
                   
<p></p>
<div class="information-box round">Datos Extras</div>

                Medio por el cual se entero:
                
              <select name="medio"> 
<option>Eventos Especiales </option>
<option>Visita</option>
<option>Pagina Web</option>
<option>Recom. de empleados</option>
<option>Recom. de instructor </option>
<option>Recom. de socios  </option>
<option>Vendedor</option>
                   </select>
               <br>
                    Si fue un Vendedor. Favor de Poner su nombre:
              <input type="text" name="vendor" id="" class="" size=30/>
                    <p> </<p>
 
                <input type="submit" value="Registrar" class="button round blue image-right ic-right-arrow">

			</fieldset>

			<br/><div class="information-box round">Introduce los datos que se te solicitan</div>

		</form>
                
					</div> <!-- end content-module-main -->
		
			

    
	
</body>
</html>