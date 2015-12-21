<table>
<thead>
<tr>
<th>Nombre</th>
<th>Membresia</th>
</thead>
<tbody>
<?php
$buscar = $_POST['b'];
       
      if(!empty($buscar)) {
            buscar($buscar);
      }
       
      function buscar($b) {
		  include('connect.php');
		   //$con = mysql_connect('localhost','root', 'toor');
            //mysql_select_db('qcompras', $con);
			
			//$link=mysql_connect("mysql17.000webhost.com","a9274570_qcompra","qcompras2013!");
//mysql_select_db("a9274570_qcompra",$link);
       
            $sql = mysql_query("SELECT * FROM clientes WHERE barcode LIKE '%".$b."%'",$link);
             
            $contar = mysql_num_rows($sql);
             
            if($contar == 0){
                  echo "No se han encontrado resultados para '<b>".$b."</b>'.";
            }else{
                  while($row=mysql_fetch_array($sql)){
		 echo "<tr>";
		  echo "<td width=\"100px\">",utf8_encode($row["nombre"]),"</td>";
		  echo "<td>",$row["membresia"],"</td>";
	
  }
 
 
      echo "</tr>";
			}
		  
      }
	  
       
 ?>
 </tbody>
</table>