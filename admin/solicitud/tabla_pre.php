
<?php require_once('../../Connections/inforgan_pamfa.php');
 
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

if(isset($_POST['insertar_pre']))
{
$query_pre = sprintf("SELECT * FROM presupuesto where idsolicitud=%s ",GetSQLValueString($_POST['idsolicitud'], "text"));
$pre  = mysql_query($query_pre , $inforgan_pamfa) or die(mysql_error());

$total_pre = mysql_num_rows($pre);


if($total_pre<1){
$f=date('d/m/y',time());
$tot1=$_POST['ev_cuo']+$_POST['ev_in']+$_POST['ev_ev']+$_POST['ev_seg'];
$tot2=$_POST['au_cuo']+$_POST['au_in']+$_POST['au_ev']+$_POST['au_seg'];
$tot3=$_POST['auex_cuo']+$_POST['auex_in']+$_POST['auex_ev']+$_POST['auex_seg'];
$tot4=$_POST['auam_cuo']+$_POST['auam_in']+$_POST['auam_ev']+$_POST['auam_seg'];
$insertSQL6 = sprintf("insert into presupuesto (idsolicitud, ev_ev,ev_in,ev_seg,ev_cuo,ev_tot,au_ev,au_in,au_seg,au_cuo,au_tot,auex_ev,auex_in,auex_seg,auex_cuo,auex_tot,auam_ev,auam_in,auam_seg,auam_cuo,auam_tot,fecha,idusuario) VALUES (%s, %s,%s, %s,%s,%s,%s, %s,%s, %s,%s,%s,%s, %s,%s, %s,%s,%s,%s, %s,%s, %s,%s)",
             GetSQLValueString($_POST['idsolicitud'], "int"),
			 GetSQLValueString($_POST['ev_ev'], "text"),
             GetSQLValueString($_POST['ev_in'], "text"),
			 GetSQLValueString($_POST['ev_seg'], "text"),
             GetSQLValueString($_POST['ev_cuo'], "text"),
			  GetSQLValueString($tot1, "text"),
			 GetSQLValueString($_POST['au_ev'], "text"),
             GetSQLValueString($_POST['au_in'], "text"),
			 GetSQLValueString($_POST['au_seg'], "text"),
             GetSQLValueString($_POST['au_cuo'], "text"),
			GetSQLValueString($tot2, "text"),
			 GetSQLValueString($_POST['auex_ev'], "text"),
             GetSQLValueString($_POST['auex_in'], "text"),
			 GetSQLValueString($_POST['auex_seg'], "text"),
             GetSQLValueString($_POST['auex_cuo'], "text"),
			GetSQLValueString($tot3, "text"),
			 GetSQLValueString($_POST['auam_ev'], "text"),
             GetSQLValueString($_POST['auam_in'], "text"),
			 GetSQLValueString($_POST['auam_seg'], "text"),
             GetSQLValueString($_POST['auam_cuo'], "text"),
			GetSQLValueString($tot4, "text"),
			GetSQLValueString($f, "text"),
			GetSQLValueString($_POST["idusuario"],"int"));
			
				  
$Result1 = mysql_query($insertSQL6, $inforgan_pamfa) or die(mysql_error());

}
else
{
	
		$insertSQL = sprintf("delete from presupuesto where idsolicitud=%s  ",
 GetSQLValueString($_POST['idsolicitud'], "text"));

  $Result1 = mysql_query($insertSQL, $inforgan_pamfa) or die(mysql_error());
  $f=date('d/m/y',time());
$tot1=$_POST['ev_cuo']+$_POST['ev_in']+$_POST['ev_ev']+$_POST['ev_seg'];
$tot2=$_POST['au_cuo']+$_POST['au_in']+$_POST['au_ev']+$_POST['au_seg'];
$tot3=$_POST['auex_cuo']+$_POST['auex_in']+$_POST['auex_ev']+$_POST['auex_seg'];
$tot4=$_POST['auam_cuo']+$_POST['auam_in']+$_POST['auam_ev']+$_POST['auam_seg'];
$insertSQL6 = sprintf("insert into presupuesto (idsolicitud, ev_ev,ev_in,ev_seg,ev_cuo,ev_tot,au_ev,au_in,au_seg,au_cuo,au_tot,auex_ev,auex_in,auex_seg,auex_cuo,auex_tot,auam_ev,auam_in,auam_seg,auam_cuo,auam_tot,fecha,idusuario) VALUES (%s, %s,%s, %s,%s,%s,%s, %s,%s, %s,%s,%s,%s, %s,%s, %s,%s,%s,%s, %s,%s, %s,%s)",
             GetSQLValueString($_POST['idsolicitud'], "int"),
			 GetSQLValueString($_POST['ev_ev'], "text"),
             GetSQLValueString($_POST['ev_in'], "text"),
			 GetSQLValueString($_POST['ev_seg'], "text"),
             GetSQLValueString($_POST['ev_cuo'], "text"),
			  GetSQLValueString($tot1, "text"),
			 GetSQLValueString($_POST['au_ev'], "text"),
             GetSQLValueString($_POST['au_in'], "text"),
			 GetSQLValueString($_POST['au_seg'], "text"),
             GetSQLValueString($_POST['au_cuo'], "text"),
			GetSQLValueString($tot2, "text"),
			 GetSQLValueString($_POST['auex_ev'], "text"),
             GetSQLValueString($_POST['auex_in'], "text"),
			 GetSQLValueString($_POST['auex_seg'], "text"),
             GetSQLValueString($_POST['auex_cuo'], "text"),
			GetSQLValueString($tot3, "text"),
			 GetSQLValueString($_POST['auam_ev'], "text"),
             GetSQLValueString($_POST['auam_in'], "text"),
			 GetSQLValueString($_POST['auam_seg'], "text"),
             GetSQLValueString($_POST['auam_cuo'], "text"),
			GetSQLValueString($tot4, "text"),
			GetSQLValueString($f, "text"),
			GetSQLValueString($_POST["idusuario"],"int"));
			
					  
$Result1 = mysql_query($insertSQL6, $inforgan_pamfa) or die(mysql_error());

	/*$f=date('d/m/y',time());
$tot1=$_POST['ev_cuo']+$_POST['ev_in']+$_POST['ev_ev']+$_POST['ev_seg'];
$tot2=$_POST['au_cuo']+$_POST['au_in']+$_POST['au_ev']+$_POST['au_seg'];
$tot3=$_POST['auex_cuo']+$_POST['auex_in']+$_POST['auex_ev']+$_POST['auex_seg'];
$tot4=$_POST['auam_cuo']+$_POST['auam_in']+$_POST['auam_ev']+$_POST['auam_seg'];
	$insertSQL = sprintf("UPDATE presupuesto SET ev_ev=%s,ev_in=%s,ev_seg=%s,ev_cuo=%s,ev_tot=%s,au_ev=%s,au_in=%s,au_seg=%s,au_cuo=%s,au_tot=%s,auex_ev=%s,auex_in=%s,auex_seg=%s,auex_cuo=%s,auex_tot=%s,auam_ev=%s,auam_in=%s,auam_seg=%s,auam_cuo=%s,auam_tot=%s,fecha=%s WHERE idsolicitud=%s",
            			
			 GetSQLValueString($_POST['ev_ev'], "text"),
             GetSQLValueString($_POST['ev_in'], "text"),
			 GetSQLValueString($_POST['ev_seg'], "text"),
             GetSQLValueString($_POST['ev_cuo'], "text"),
			  GetSQLValueString($tot1, "text"),
			 GetSQLValueString($_POST['au_ev'], "text"),
             GetSQLValueString($_POST['au_in'], "text"),
			 GetSQLValueString($_POST['au_seg'], "text"),
             GetSQLValueString($_POST['au_cuo'], "text"),
			GetSQLValueString($tot2, "text"),
			 GetSQLValueString($_POST['auex_ev'], "text"),
             GetSQLValueString($_POST['auex_in'], "text"),
			 GetSQLValueString($_POST['auex_seg'], "text"),
             GetSQLValueString($_POST['auex_cuo'], "text"),
			GetSQLValueString($tot3, "text"),
			 GetSQLValueString($_POST['auam_ev'], "text"),
             GetSQLValueString($_POST['auam_in'], "text"),
			 GetSQLValueString($_POST['auam_seg'], "text"),
             GetSQLValueString($_POST['auam_cuo'], "text"),
			GetSQLValueString($tot4, "text"),
			GetSQLValueString($f, "text"),
			
			GetSQLValueString($_POST['idsolicitud'], "int"));
		echo	$insertSQL6;
			
  $Result1 = mysql_query($insertSQL, $inforgan_pamfa) or die(mysql_error());*/
	}
}


 if(isset($_GET['idsolicitud'])){$_POST['idsolicitud']=$_GET['idsolicitud'];}
?>
<div class="table-responsive">
<table class="table table-hover">
 
                                    
	                                    <thead >
                                       
	                                    	<th align="center">Tipo de servicio </td>
			  <th align="center"> Evaluación</th>
			    <th align="center">Informe </th>
				  <th align="center">Seguimiento y cierre de NC</th>
				   <th align="center">Cuota anual del certificado </th>
				  <th align="center">Total a pagar</th>
                 
											
	                                    </thead>
	                                    <tbody>
                                        
          <? $query_pres = sprintf("SELECT * FROM presupuesto where idsolicitud=%s ",GetSQLValueString($_POST['idsolicitud'], "text"));
$pres = mysql_query($query_pres , $inforgan_pamfa) or die(mysql_error());
$row_pres = mysql_fetch_assoc($pres );?>
         
		   
            <td align="justify">Evaluación inicial </td>
            <form name="formulario1" id="formulario1" method="post" action=""   >
			  <td align="center"> <input id="ev_ev" name="ev_ev" type="number" value="<?  echo $row_pres['ev_ev'];?>" onchange="this.form.submit()"  />
</td>
  <td align="center"> <input id="ev_in" name="ev_in" placeholder=""type="number" value="<?  echo $row_pres['ev_in'];?>" onchange="this.form.submit()"  />
</td>
  <td align="center"> <input  id="ev_seg" name="ev_seg" placeholder=""type="number" value="<?  echo $row_pres['ev_seg'];?>" onchange="this.form.submit()" />
</td>
  <td align="center"> <input   id="ev_cuo" name="ev_cuo" placeholder=""type="number" value="<?  echo $row_pres['ev_cuo'];?>" onchange="this.form.submit()"  />
</td>
  <td align="center"> <input   disabled="disabled" id="ev_tot" name="ev_tot" placeholder=""type="number" value="<?  echo $row_pres['ev_tot'];?>"  />
</td>
			  
         
		  <tr>
            <td align="justify">Auditoria no anunciada </td>
			  <td align="center"> <input   id="au_ev" name="au_ev" placeholder=""type="number" value="<?  echo $row_pres['au_ev'];?>" onchange="this.form.submit()" />
</td>
  <td align="center"> <input   id="au_in" name="au_in" placeholder=""type="number" value="<?  echo $row_pres['au_in'];?>"   onchange="this.form.submit()"  />
</td>
  <td align="center"> <input   id="au_seg" name="au_seg" placeholder=""type="number" value="<?  echo $row_pres['au_seg'];?>" onchange="this.form.submit()"  />
</td>
  <td align="center"> <input   id="au_cuo" name="au_cuo" placeholder=""type="number" value="<?  echo $row_pres['au_cuo'];?>" onchange="this.form.submit()"  />
</td>
  <td align="center"> <input   disabled="disabled"  id="au_tot" name="au_tot" placeholder=""type="number" value="<?  echo $row_pres['au_tot'];?>"  />
</td>
          </tr>
		  <tr>
            <td align="justify">Auditoria extraordinaria para cierre de no conformidades </td>
			  <td align="center"> <input   id="auex_ev" name="auex_ev" placeholder=""type="number" value="<?  echo $row_pres['auex_ev'];?>" onchange="this.form.submit()" />
</td>
  <td align="center"> <input   id="auex_in" name="auex_in" placeholder=""type="number" value="<?  echo $row_pres['auex_in'];?>" onchange="this.form.submit()" />
</td>
  <td align="center"> <input   id="auex_seg" name="auex_seg" placeholder=""type="number" value="<?  echo $row_pres['auex_seg'];?>" onchange="this.form.submit()" />
</td>
  <td align="center"> <input   id="auex_cuo" name="auex_cuo" placeholder=""type="number" value="<?  echo $row_pres['auex_cuo'];?>" onchange="this.form.submit()"  />
</td>
  <td align="center"> <input   disabled="disabled" id="auex_tot" name="auex_tot" placeholder=""type="number" value="<?  echo $row_pres['auex_tot'];?>"   />
</td>
          </tr>
		  <tr>
            <td align="justify">Auditoria por ampliación de alcance de certificación.</td>
			 		  <td align="center"> <input   id="auam_ev" name="auam_ev" placeholder=""type="number" value="<?  echo $row_pres['auam_ev'];?>" onchange="this.form.submit()"  />
</td>
  <td align="center"> <input   id="auam_in" name="auam_in" placeholder=""type="number" value="<?  echo $row_pres['auam_in'];?>" onchange="this.form.submit()" />
</td>
  <td align="center"> <input   id="auam_seg" name="auam_seg" placeholder=""type="number" value="<?  echo $row_pres['auam_seg'];?>" onchange="this.form.submit()"  />
</td>
  <td align="center"> <input   id="auam_cuo" name="auam_cuo" placeholder=""type="number" value="<?  echo $row_pres['auam_cuo'];?>" onchange="this.form.submit()" />
</td>
  <td align="center"> <input    disabled="disabled" id="auam_tot" name="auam_tot" placeholder=""type="number" value="<?  echo $row_pres['auam_tot'];?>" onchange="this.form.submit()" />
</td> 
<td>
<? //<input type="submit" name="guarda"  /> ?>
<input type="hidden" name="insertar_pre" value="1"  /> 
<input type="hidden" name="idsolicitud" value="<? echo $_POST['idsolicitud'];?>"  />
<input type="hidden" name="ruta" id="ruta" value="tabla_pre.php?idsolicitud=<? echo $_POST['idsolicitud'];?>"  />
<input type="hidden"  name="idusuario" value="<? echo $_SESSION["idusuario"];?>"  />
 
</td>
     </form>     </tr>
	
	                                    </tbody>
	                                </table>
</div>
<? for($x=0;$x<18;$x++){?>
<script type="text/javascript">
<?php echo 'function el2'.$x.'(){
 var url = "guarda_pre.php"; // El script a dónde se realizará la petición.
  
   var ruta = $("#ruta").val();
    alert(ruta);
    $.ajax({
           type: "POST",
           url: url,
           data: $("#formulario1").serialize(), // Adjuntar los campos del formulario enviado.
           success: function(data)
           {
               $("#tabla_ajax8").load(ruta); // Mostrar la respuestas del script PHP.
           }
         });

   
			 }'; ?>

</script> 
<? }?>