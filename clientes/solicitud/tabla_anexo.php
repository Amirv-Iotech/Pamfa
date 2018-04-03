
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
 $query_anexo_p = sprintf("SELECT * FROM anexo_p WHERE idsolicitud = %s", GetSQLValueString($row_solicitud["idsolicitud"], "int"));
 
 
 
?>
<div class="table-responsive">
<table class="table" >
<thead>
  <th >
                    <label><strong>Nombre de la entidad legal que realiza la producción (persona fisica o moral):</strong></label>
                  

  </th>
  <th>
                  <label><strong>GGN o GLN, Número PrimusGFS  de la entidad legal responsable del sitio de producciòn:</strong></label>

  </th>
  <th>
                  <label><strong>Nombre del  huerto o invernadero:</strong></label>

  </th>
  <th>
                  <label><strong>Si lo tiene anote el registro fitosanitario del huerto o invernadero otorgado por SAGARPA (solo para productos regulados):</strong></label>

  </th>
  <th>
                  <label><strong>Dirección (calle, número,  C.P.,  Ciudad Municipio, Estado,  País) del sitio de producción</strong></label>

  </th>
  <th>
                  <label><strong>Nombre completo de la persona de contacto:</strong></label>

  </th>
  <th>
                    <label><strong>Número de teléfono, fax y correo electrónico de la persona de contacto:</strong></label>

  </th>
  <th>
                  <label><strong>Número total de trabajadores fijos y temporales:</strong></label>

  </th>
  <th>
                  <label><strong>Fruta u hortaliza cultivada  (Coloque uno por renglón):</strong></label>

  </th>
  <th>
                  <label><strong>Paises donde se envia o enviaran su producto y  porcentaje aproximado en cada caso.</strong></label>

  </th>
  <th>
                  <label><strong>El cultivo es al aire libre o si es cubierto (por ejemplo, en invernaderos):</strong></label>

  </th>
  
  <th>
                  <label><strong> Superficie total de producción del cultivo  (en hectáreas):</strong></label>

  </th>
  <th>
                  <label><strong>Producción total estimada por temporada  o porduccion  anual estimada  (en toneladas), según sea el caso:</strong></label>

  </th>
  <th>
                  <label><strong>Indique fecha de primera cosecha de la temporada  y de las cosechas posteriores (desde-hasta en dd/mm/aa):</strong></label>

  </th>
  
   <th>
                  <label><strong> Indique para cada producto cultivado una “PP” si realiza producción paralela o una “PO” si aplica propiedad paralela (solo encaso de haber contestado “Si” en la solicitud de certificación):</strong></label>

  </th>
  <th>
                  <label><strong>Indique "Si" si el producto cultivado de este huerto o invernadero va a ser certificado o "No" en caso contrario:</strong></label>

  </th>
  <th>
                  <label><strong>Aclare con un "Si" o un "No" si las operaciones de manipulación del producto se realizan bajo la responsabilidad de la misma entidad legal. Al decir "Si", llene la sección de sitios de manipulación de producto:</strong></label>

  </th>
  
  <th>
                  <label><strong>Si se realiza subcontratación, mencióne la actvidad, por ejemplo: cosecha, aplicación de plaguicidas, etc. En caso contrario, marque "NA":</strong></label>

  </th>
  <th>
                  <label><strong>Latitud Norte / Sur; longitud Este/Oeste del huerto o invernadero:</strong></label>

  </th>
  
  <th>
                  <label><strong>Guardar</strong></label>

  </th>
</thead>
<tbody>
<?
                    $anexo_p = mysql_query($query_anexo_p,  $inforgan_pamfa) or die(mysql_error());
					$cont=0;
                    while ($row_anexo_p = mysql_fetch_assoc($anexo_p)) {
                   
                            ?>
                            
                            <tr>
                              <td> 
              <input class="form-control inputsf" <? if($row_anexo_p['p1']!=NULL){?> disabled="disabled"<? }?> id="<? echo "p1".$cont ?>" name="p1" placeholder=""type="text" value="<? if($row_anexo_p['p1']==NULL){ echo $row_operador['nombre_legal'];} else {echo $row_anexo_p['p1'];} ?>"  />
            
                              </td>

                           <td> 
                                  <input class="form-control inputsf" <? if($row_anexo_p['p2']!=NULL){?> disabled="disabled"<? }?>id="<? echo "p2".$cont ?>" name="p2" placeholder=""type="text" value="<? echo $row_anexo_p['p2']; ?>"  />
                              </td>

<td> 
                                   <input class="form-control inputsf" <? if($row_anexo_p['p3']!=NULL){?> disabled="disabled"<? }?> id="<? echo "p3".$cont ?>" name="p3" placeholder=""type="text" value="<? echo $row_anexo_p['p3']; ?>"  />
                              </td>
<td> 
                                   <input class="form-control inputsf" <? if($row_anexo_p['p4']!=NULL){?> disabled="disabled"<? }?> id="<? echo "p4".$cont ?>" name="p4" placeholder=""type="text" value="<? echo $row_anexo_p['p4']; ?>"  />                              </td>
<td> 
                                  <input class="form-control inputsf" <? if($row_anexo_p['p5']!=NULL){?> disabled="disabled"<? }?> id="<? echo "p5".$cont ?>" name="p5" placeholder=""type="text" value="<? echo $row_anexo_p['p5']; ?>"  />
                              </td>
<td> 
                                  <input class="form-control inputsf" <? if($row_anexo_p['p6']!=NULL){?> disabled="disabled"<? }?> id="<? echo "p6".$cont ?>" name="p6" placeholder=""type="text" value="<? echo $row_anexo_p['p6']; ?>"  />
                              </td>
<td> 
                                  <input class="form-control inputsf" <? if($row_anexo_p['p7']!=NULL){?> disabled="disabled"<? }?> id="<? echo "p7".$cont ?>" name="p7" placeholder=""type="text" value="<? echo $row_anexo_p['p7']; ?>"  />
                              </td>
<td> 
                                  <input class="form-control inputsf" <? if($row_anexo_p['p8']!=NULL){?> disabled="disabled"<? }?> id="<? echo "p8".$cont ?>" name="p8" placeholder=""type="number" value="<? echo $row_anexo_p['p8']; ?>"  />
                              </td>
<td> 
                                   <input class="form-control inputsf" <? if($row_anexo_p['p9']!=NULL){?> disabled="disabled"<? }?> id="<? echo "p9".$cont ?>" name="p9" placeholder=""type="text" value="<? echo $row_anexo_p['p9']; ?>"  />
                              </td>
<td> 
                                  <input class="form-control inputsf" <? if($row_anexo_p['p10']!=NULL){?> disabled="disabled"<? }?>  id="<? echo "p10".$cont ?>" name="p10" placeholder=""type="text" value="<? echo $row_anexo_p['p10']; ?>"  />
                              </td>
<td> 
                                   <input class="form-control inputsf" <? if($row_anexo_p['p11']!=NULL){?> disabled="disabled"<? }?> id="<? echo "p11".$cont ?>" name="p11" placeholder=""type="text" value="<? if($row_anexo_p['p11']==1){echo "Libre";}else { echo "Cubierto"; }?>"  />
                              </td>
<td> 
                                  <input class="form-control inputsf" <? if($row_anexo_p['p12']!=NULL){?> disabled="disabled"<? }?> id="<? echo "p12".$cont ?>" name="p12" placeholder=""type="text" value="<? echo $row_anexo_p['p12']; ?>"  />
                              </td>
<td> 
                                   <input class="form-control inputsf" <? if($row_anexo_p['p13']!=NULL){?> disabled="disabled"<? }?> id="<? echo "p13".$cont ?>" name="p13" placeholder=""type="number"  step="any" value="<? echo $row_anexo_p['p13']; ?>"  />
                              </td>
<td> 
                                   <input class="form-control inputsf" <? if($row_anexo_p['p14']!=NULL){?> disabled="disabled"<? }?> id="<? echo "p14".$cont ?>" name="p14" placeholder=""type="text" value="<? echo $row_anexo_p['p14']; ?>"  />
                              </td>
<td> 
                                   <input class="form-control inputsf" <? if($row_anexo_p['p15']!=NULL){?> disabled="disabled"<? }?> id="<? echo "p15".$cont ?>" name="p15" placeholder=""type="text" value="<? echo $row_anexo_p['p15']; ?>"  />
                              </td>
<td> 
                                  <input class="form-control inputsf" <? if($row_anexo_p['p16']!=NULL){?> disabled="disabled"<? }?> id="<? echo "p16".$cont ?>" name="p16" placeholder=""type="text" value="<? echo $row_anexo_p['p16']; ?>"  />
                              </td>
<td> 
                                  <input class="form-control inputsf" <? if($row_anexo_p['p17']!=NULL){?> disabled="disabled"<? }?> id="<? echo "p17".$cont ?>" name="p17" placeholder=""type="text" value="<? echo $row_anexo_p['p17']; ?>"  />
                              </td>
<td> 
                                  <input class="form-control inputsf" <? if($row_anexo_p['p18']!=NULL){?> disabled="disabled"<? }?> id="<? echo "p18".$cont ?>" name="p18" placeholder=""type="text" value="<? echo $row_anexo_p['p18']; ?>"  />
                              </td>
<td> 
                                  <input class="form-control inputsf" <? if($row_anexo_p['p19']!=NULL){?> disabled="disabled"<? }?> id="<? echo "p19".$cont ?>" name="p19" placeholder=""type="text" value="<? echo $row_anexo_p['p19']; ?>"  />
                              </td>
<? /*
                              <td>
                         
                         <form action="" method="post">
                          <input type="hidden" id="idsolicitud" name="idsolicitud" value="<? echo $row_solicitud['idsolicitud']; ?>" />
                          <input type="hidden" id="idanexo_p" name="idanexo_p" value="<? echo $row_anexo_p['idanexo_p']; ?>" />
                                
                          <button type="button"   name="borrar2" id="<?php echo 'borrar'.$cont; ?>" value="<?php echo $row_anexo_p['idanexo_p']; ?>" onclick="<?php echo 'el3'.$cont.'()'?>" >Eliminar</button>
                         </form>
                         
                              </td>
							  */ ?>
                               <td>
                         
                         
                          <input type="hidden" id="idsolicitud" name="idsolicitud" value="<? echo $row_solicitud['idsolicitud']; ?>" />
                          <input type="hidden" id="<?php echo 'idanexo_p'.$cont; ?>" name="idanexo_p" value="<? echo $row_anexo_p['idanexo_p']; ?>" />
                                
                                
                              
                                
                          <button type="button"   name="act2" id="<?php echo 'act'.$cont; ?>" value="<?php echo $row_anexo_p['idanexo_p']; ?>" onclick="<?php echo 'el3'.$cont.'()'?>" >Guardar</button>
                        
                         
                              </td>
                              
                            </tr>    
                                                                       
<? 
 
?>
<script type="text/javascript"> 
	<?php echo 'function el3'.$cont.'(){
	 var idanexo_p = $("#act'.$cont.'").val();
	 var p1 = $("#p1'.$cont.'").val();
				var p2 = $("#p2'.$cont.'").val();
			    var p3 = $("#p3'.$cont.'").val();
    		  var p4 = $("#p4'.$cont.'").val();
			    var p5 = $("#p5'.$cont.'").val();
			  var p6 = $("#p6'.$cont.'").val();
			    var p7 = $("#p7'.$cont.'").val();
			  var p8 = $("#p8'.$cont.'").val();
			    var p9 = $("#p9'.$cont.'").val();
			  var p10 = $("#p10'.$cont.'").val();
		    var p11 = $("#p11'.$cont.'").val();
			  var p12 = $("#p12'.$cont.'").val();
		    var p13 = $("#p13'.$cont.'").val();
			  var p14 = $("#p14'.$cont.'").val();
			    var p15 = $("#p15'.$cont.'").val();
			  var p16 = $("#p16'.$cont.'").val();
		    var p17 = $("#p17'.$cont.'").val();
			  var p18 = $("#p18'.$cont.'").val();
			    var p19 = $("#p19'.$cont.'").val();
	
	 var ruta2 = $("#ruta2").val();
	 $.ajax({
		 url:"cerebro.php",
		 method:"POST",
		 data:{idanexo_p:idanexo_p,p1:p1,p2:p2,p3:p3,p4:p4,p5:p5,p6:p6,p7:p7,p8:p8,p9:p9,p10:p10,p11:p11,p12:p12,p13:p13,p14:p14,p15:p15,p16:p16,p17:p17,p18:p18,p19:p19},
		 success: function() {
			 $("#tabla_ajax2").load(ruta2);
			 }
			 });
	}
	
	';
	?>
	   //Recargamos la Tabla(Para que se muestren los Nuevos Resultados)

</script>
<script type="text/javascript"> 

 <? echo '

$(document).ready(function(){  
   $("#act'.$cont.'").click(function() { '; echo '
    var idanexo_p = $("#act'.$cont.'").val();

    });    
});';?>
			</script>

<?
$cont++;} ?><tr> <td>
                         
                         
                          <input type="hidden" id="idsolicitud" name="idsolicitud" value="<? echo $row_solicitud['idsolicitud']; ?>" />
                           <input type="hidden" id="insertar" name="insertar" value="1" />
                          
                                
                                
                              
                                
                          <button type="button"   name="act2" id="<?php echo 'act'.$cont; ?>" value="<?php echo $row_anexo_p['idanexo_p']; ?>" onclick="el4()" >Agregar</button>
                        
                         
                              </td></tr>
</tbody>
</table>
<script type="text/javascript"> 
	<?php echo 'function el4(){
	
			    var idsolicitud = $("#idsolicitud").val();
				 var insertar = $("#insertar").val();
				 var idoperador = $("#idoperador").val();
				
	
	 var ruta2 = $("#ruta2").val();
	 $.ajax({
		 url:"cerebro.php",
		 method:"POST",
		 data:{insertar:insertar,idsolicitud:idsolicitud, idoperador:idoperador},
		 success: function() {
			 $("#tabla_ajax2").load(ruta2);
			 }
			 });
	}
	
	';
	?>
	   //Recargamos la Tabla(Para que se muestren los Nuevos Resultados)

</script>
</div>
 