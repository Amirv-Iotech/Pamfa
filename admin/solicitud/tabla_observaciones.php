
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
	$query_s = sprintf("SELECT Max(idsolicitud) as id FROM solicitud  WHERE idoperador='".$_GET['idoperador']."' and terminada=1");
	$s  = mysql_query($query_s , $inforgan_pamfa) or die(mysql_error());
$row_s = mysql_fetch_assoc($s);  
$sol=$row_s ['id'];


  }
$query_solicitud = sprintf("SELECT * FROM solicitud WHERE idsolicitud=%s ", GetSQLValueString( $sol, "int"));
$solicitud = mysql_query($query_solicitud, $inforgan_pamfa) or die(mysql_error());
$row_solicitud= mysql_fetch_assoc($solicitud);




 	//consulta todos los cultivos
 $query_solicitud_obs = sprintf("SELECT * FROM solicitud_obs WHERE idsolicitud = %s", GetSQLValueString($row_solicitud["idsolicitud"], "int"));
 
 
 
?>
<div class="table-responsive">
<table class="table table-hover">
<thead>
 
  <th>
                  <label><strong>NP:</strong></label>

  </th>
  <th>
                  <label><strong>Observación:</strong></label>

  </th>
  <th>
                  <label><strong>Seccion:</strong></label>

  </th>
  <th>
                  <label><strong>Fecha:</strong></label>

  </th>
  <th>
                  <label><strong>Estado:</strong></label>

  </th>
 
  
 
  <th>
                  <label><strong>Actualizar</strong></label>

  </th>
   <th>
                  <label><strong>Eliminar</strong></label>

  </th>
</thead>
<tbody>
<?
                    $solicitud_obs = mysql_query($query_solicitud_obs,  $inforgan_pamfa) or die(mysql_error());
					$cont=0;
                    while ($row_solicitud_obs = mysql_fetch_assoc($solicitud_obs)) {
                   
                            ?>
                         
                            <tr>
                            <td>
                             <label><? echo $cont+1; ?></label>
                             </td>
                              <td> 
              <input class="form-control inputsf" id="<? echo "observacion".$cont;?>" name="observacion" type="text" value="<? echo $row_solicitud_obs['observacion'] ?>"  disabled="disabled" />
            
                              </td>

                           <td> 
                                 
                                 
                                  
                                   <select class="form-control"  id="<? echo "seccion_sol".$cont;?>" name="seccion_sol" disabled="disabled"  >
                <option value="-">Seleciona</option>
                 <option value="1" <? if($row_solicitud_obs['seccion_sol']==0){ ?> selected="selected" <? }?>>Persona</option>
               
                <option value="1" <? if($row_solicitud_obs['seccion_sol']==1){ ?> selected="selected" <? }?>>Seccion 1-Inf. Cliente</option>
                <option value="2"  <? if($row_solicitud_obs['seccion_sol']==2){ ?> selected="selected" <? }?>>Seccion 2- Nums. Anteriores</option>
                <option value="3"  <? if($row_solicitud_obs['seccion_sol']==3){ ?> selected="selected" <? }?>>Seccion 3- Cert. Anterior</option>
                <option value="4"  <? if($row_solicitud_obs['seccion_sol']==4){ ?> selected="selected" <? }?>>Seccion 4- Datos de facturación</option>
                <option value="5"  <? if($row_solicitud_obs['seccion_sol']==5){ ?> selected="selected" <? }?>>Seccion 5- Globalg I.F.A Y CoC. </option>
               
                <option value="7"  <? if($row_solicitud_obs['seccion_sol']==7){ ?> selected="selected" <? }?>>Seccion 6- MCS</option>
                <option value="8"  <? if($row_solicitud_obs['seccion_sol']==8){ ?> selected="selected" <? }?>>Seccion 7. SRRC</option>
                <option value="9"  <? if($row_solicitud_obs['seccion_sol']==9){ ?> selected="selected" <? }?>>Seccion 8- Inf. Cultivos</option>
                <option value="10"  <? if($row_solicitud_obs['seccion_sol']==10){ ?> selected="selected" <? }?>>Seccion 9- Inf. Empaque</option>
                <option value="11"  <? if($row_solicitud_obs['seccion_sol']==11){ ?> selected="selected" <? }?>>Seccion 10- Inf. Comercialización</option>
                <option value="12"  <? if($row_solicitud_obs['seccion_sol']==12){ ?> selected="selected" <? }?>>Seccion 11- Idiomas de formatos</option>
                <option value="13"  <? if($row_solicitud_obs['seccion_sol']==13){ ?> selected="selected" <? }?>>Seccion 12- Acceso a datos</option>
                 <option value="14"  <? if($row_solicitud_obs['seccion_sol']==14){ ?> selected="selected" <? }?>>Anexo producción</option>
                  <option value="15"  <? if($row_solicitud_obs['seccion_sol']==15){ ?> selected="selected" <? }?>>Anexo Almacén</option>
              
                </select>
                              </td>

<td> 
                                   <input class="form-control inputsf" id="<? echo "fecha_obs".$cont; ?>" type="date" 	name="fecha_obs" value="<?php echo $row_solicitud_obs['fecha_obs'];?>"  disabled="disabled" />
                              </td>
<td> 
                                 <select class="form-control"  id="<? echo "estado".$cont;?>" name="seccion"  >
                <option value="-">Seleciona</option>
                <option value="1" <? if($row_solicitud_obs['estado']==1){ ?> selected="selected" <? }?>>Pendiente</option>
                <option value="2"  <? if($row_solicitud_obs['estado']==2){ ?> selected="selected" <? }?>>Atendida</option>
               
                                              </td>

                               <td>
                         
                      
                          <input type="hidden" id="idsolicitud" name="idsolicitud" value="<? echo $row_solicitud['idsolicitud']; ?>" />
                          <input type="hidden" id="<?php echo "idsolicitud_obs_a".$cont;?>" name="<?php echo 'idsolicitud_obs_a'?>"  value="<? echo $row_solicitud_obs['idsolicitud_obs']; ?>" />
                          <input type="hidden" id="<?php echo 'actualiza_solicitud_obs'?>" name="<?php echo 'actualiza_solicitud_obs'?>"  value="1" />
                                
                          <button type="button"   name="act20" id="<?php echo 'act20'.$cont; ?>" value="<?php echo $row_solicitud_obs['idsolicitud_obs']; ?>" onclick="<?php echo 'el3'.$cont.'()'?>" >Actualizar</button>
                        
                              </td>

                              <td>
                         
                      
                                <input type="hidden" id="<?php echo "idsolicitud_obs".$cont;?>" name="<?php echo 'idsolicitud_obs'?>"  value="<? echo $row_solicitud_obs['idsolicitud_obs']; ?>" />
                          <button type="button"   name="borrar2" id="<?php echo 'borrar'.$cont; ?>" value="<?php echo $row_solicitud_obs['idsolicitud_obs']; ?>" onclick="<?php echo 'el7'.$cont.'()'?>" >Eliminar</button>
                         
                         
                              </td>
                              
							  
                             
                            </tr>                                               
<? 
 
?>
<script type="text/javascript"> 
	<?php echo 'function el7'.$cont.'(){
	 var idsolicitud_obs = $("#idsolicitud_obs'.$cont.'").val();

	
	 var ruta4 = $("#ruta4").val();
	 $.ajax({
		 url:"cerebro.php",
		 method:"POST",
		 data:{idsolicitud_obs:idsolicitud_obs},
		 success: function() {
			 $("#tabla_ajax4").load(ruta4);
			 }
			 });
	}
	
	';
	?>
	   //Recargamos la Tabla(Para que se muestren los Nuevos Resultados)

</script>
<script type="text/javascript"> 
	<?php echo 'function el3'.$cont.'(){
		
	   var idsolicitud_obs_a = $("#idsolicitud_obs_a'.$cont.'").val();
	   var actualiza_solicitud_obs = $("#actualiza_solicitud_obs").val();
	   var observacion= $("#observacion'.$cont.'").val();
	   var seccion_sol= $("#seccion_sol'.$cont.'").val();
	   var fecha_obs= $("#fecha_obs'.$cont.'").val();
	   var estado= $("#estado'.$cont.'").val();
	    var idsolicitud = $("#idsolicitud").val();
	
	
	 var ruta4 = $("#ruta4").val();
	 $.ajax({
		 url:"cerebro.php",
		 method:"POST",
		 data:{idsolicitud_obs_a:idsolicitud_obs_a,actualiza_solicitud_obs:actualiza_solicitud_obs,observacion:observacion,seccion_sol:seccion_sol,fecha_obs:fecha_obs,estado:estado,idsolicitud:idsolicitud},
		 success: function(data) {
			 alert(data);
			 $("#tabla_ajax4").load(ruta4);
		    }
			 });
	}
	
	';
	?>
	   //Recargamos la Tabla(Para que se muestren los Nuevos Resultados)

</script>
<?
$cont++;} ?>
</tbody>
</table>
</div>
 