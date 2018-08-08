
<?php require_once('../../Connections/inforgan_pamfa.php');
 include("cerebro.php");
  $sol="";
  if($_GET["idsolicitud"])
  {$sol=$_GET["idsolicitud"];
 
  }
  else if($_POST["idsolicitud"])
  {$sol=$_POST["idsolicitud"];
 
	  }
  else if($row_solicitud['idsolicitud'])
  {
	  $sol=$row_solicitud['idsolicitud'];
	
  }
  else{
	$query_s = sprintf("SELECT Max(idsolicitud) as id FROM solicitud  WHERE idoperador='".$_GET['idoperador']."' and terminada is null");
	$s  = mysql_query($query_s , $inforgan_pamfa) or die(mysql_error());
$row_s = mysql_fetch_assoc($s);  
$sol=$row_s ['id'];


  }
$query_solicitud = sprintf("SELECT * FROM solicitud WHERE idsolicitud=%s ", GetSQLValueString( $sol, "int"));
$solicitud = mysql_query($query_solicitud, $inforgan_pamfa) or die(mysql_error());
$row_solicitud= mysql_fetch_assoc($solicitud);




 	//consulta todos los cultivos
 $query_cultivos = sprintf("SELECT * FROM medicion_mexcalsup WHERE idsolicitud = %s", GetSQLValueString($row_solicitud["idsolicitud"], "int"));
 
?>
<div class="table-responsive" >
<table class="table table-hover">
<thead>
  <th>
                    <label><strong>Equipo:</strong></label>
                  

  </th>
  <th>
                  <label><strong> Anexo1:</strong></label>
              <label data-toggle="tooltip" data-placement="top" title="Anexe copia de los certificados de calibración externa de los equipos (laboratorio acreditado), vigente (12 meses)."><i class="material-icons">help_outline</i> </label></strong></label>

  </th>
  <th>
                 <label><strong> Anexo2:</strong></label>
             <label data-toggle="tooltip" data-placement="top" title="Anexe copia de los registros de las verificaciones internas que realizan a los equipos de medición donde se utilizó un patrón de referencia con calibración externa."><i class="material-icons">help_outline</i> </label>

  </th>
  

  <th>
                  <label><strong>Eliminar</strong></label>

  </th>
</thead>
<tbody>
<?
                    $cultivos = mysql_query($query_cultivos,  $inforgan_pamfa) or die(mysql_error());
					$cont=0;
                    while ($row_cultivos = mysql_fetch_assoc($cultivos)) {
                    ?>
                            <tr>
                              <td> 
                                  <label><? echo $row_cultivos['producto']; ?> </label>
                              </td>

                              <td>
                                  <label> <form target="_blank" id="form4" name="form4" method="post" action="docs/<?php echo $row_cultivos['anexo1'];?>">
                                     <? if($row_cultivos['anexo1']!=NULL){?>
<input type="submit" name="button3" id="button3" value="Consultar" title="Ver " /><? } else {echo "Ninguno";}?>

</form></label>
                              </td>
                              <td>
                                                        <label><form target="_blank" id="form4" name="form4" method="post"  action="docs/<?php echo $row_cultivos['anexo2'];?>">
                                                        
                                                        <? if($row_cultivos['anexo2']!=NULL){?>
<input type="submit" name="button3" id="button3" value="Consultar" title="Ver " /><? } else {echo "Ninguno";}?>
</form></label>

                              </td>

                            
                              <td>
                         
                         <form action="" method="post">
                          <input type="hidden" id="idsolicitud" name="idsolicitud" value="<? echo $row_solicitud['idsolicitud']; ?>" />
                          <input type="hidden" id="idcultivos" name="idcultivos" value="<? echo $row_cultivos['idcultivos']; ?>" />
                           <input type="hidden" id="<?php echo 'empaque'.$cont; ?>" name="empaque" value="<? echo $row_a['empaque']; ?>" />
                                
                          <button type="button"   name="borrar2" id="<?php echo 'borrar'.$cont; ?>" value="<?php echo $row_cultivos['idmedicion']; ?>" onclick="<?php echo 'elmcs'.$cont.'()'?>" >Eliminar</button>
                         </form>
                         
                              </td>
                            </tr>                                               

<script>
	<?php echo 'function elmcs'.$cont.'(){
	 var idanexo_mcs = $("#borrar'.$cont.'").val();
	
	
	 var ruta = $("#rutax").val();
	  
	 $.ajax({
		 url:"cerebro.php",
		 method:"POST",
		 data:{idanexo_mcs:idanexo_mcs},
		 success: function(data) {
			
			
			  $("#tabla_ajax").load(ruta); 
			 
			 }
			 });
			 }';
	?>
	   //Recargamos la Tabla(Para que se muestren los Nuevos Resultados)

</script>
<?
$cont++;} ?>
</tbody>
</table>
</div>
 