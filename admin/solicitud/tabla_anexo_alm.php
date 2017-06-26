
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
 $query_anexo_e = sprintf("SELECT * FROM anexo_e WHERE idsolicitud = %s", GetSQLValueString($row_solicitud["idsolicitud"], "int"));
 
 
 
?>
<div class="table-responsive">
<table class="table table-hover">
<thead>
  <th >
                    <label><strong>Nombre de la entidad legal que realiza la Manipulación de Producto.:</strong></label>
                  

  </th>
  <th>
                  <label><strong>Nombre y dirección  del sitio de Manipulación de Producto:</strong></label>

  </th>
  <th>
                  <label><strong>Anote el registro fitosanitario del sitio de manipulación de producto  otorgado por SAGARPA (solo para productos regulados):</strong></label>

  </th>
  <th>
                  <label><strong>Nombre y apellidos de la persona de contacto del sitio de manipulación de producto:</strong></label>

  </th>
  <th>
                  <label><strong>Número de teléfono, fax y correo electrónico de la persona de contacto:</strong></label>

  </th>
  <th>
                  <label><strong>Número total de trabajadores fijos y temporales:</strong></label>

  </th>
  <th>
                    <label><strong>Registro Federal de Contribuyente (RFC, solo se usa para evitar un doble registro).</strong></label>

  </th>
  <th>
                  <label><strong>Productos manipulados en el sitio de manipulación de producto (Coloque uno por renglón):</strong></label>

  </th>
  <th>
                  <label><strong>Anote todos los paises donde se envian o enviaran su producto y porcentaje aproximado en cada caso.</strong></label>

  </th>
  <th>
                  <label><strong>GGN o GLN,  Número CoC, Número PrimusGFS, del sitio de manipulación de producto (si ya cuenta con uno).</strong></label>

  </th>
  <th>
                  <label><strong>Toneladas estimadas de producto manipulado:</strong></label>

  </th>
  
  <th>
                  <label><strong>Indique fecha de inicio de operaciones de manipulación y posteriores  (desde-hasta, en dd/mm/aa):</strong></label>

  </th>
  <th>
                  <label><strong>Dimensiones del sitio de manipulacion (metros cuadrados):</strong></label>

  </th>
  <th>
                  <label><strong> Indique para cada manipulación de producto una  “PO” si aplica propiedad paralela. De no hacerlo, anota N/A</strong></label>

  </th>
  
   <th>
                  <label><strong>Indique "Si", si el producto manipulado en el sitio de manipulación de producto va a ser certificado o "No" en caso contrario.</strong></label>

  </th>
  <th>
                  <label><strong>Escriba las marcas comerciales del producto que se manipula.</strong></label>

  </th>
  <th>
                  <label><strong>Escriba el nombre de su cliente (s) para el producto manipulado.</strong></label>

  </th>
  
  <th>
                  <label><strong>Si se realiza subcontratación, mencióne la actvidad, por ejemplo: control de plagas, empacado, transporte, etc. En caso contrario, marque "NA"</strong></label>

  </th>
  <th>
                  <label><strong>Latitud Norte / Sur; longitud Este/Oeste del centro de manipulación.</strong></label>

  </th>
  
  <th>
                  <label><strong>Eliminar</strong></label>

  </th>
</thead>
<tbody>
<?
                    $anexo_e = mysql_query($query_anexo_e,  $inforgan_pamfa) or die(mysql_error());
					$cont=0;
                    while ($row_anexo_e = mysql_fetch_assoc($anexo_e)) {
                   
                            ?>
                            <form action="" method="post" id="<? echo "f".$cont ?>">
                            <tr>
                              <td> 
              <input class="form-control inputsf" id="<? echo "p1".$cont ?>" name="p1" placeholder=""type="text" value="<? if($row_anexo_e['p1']==NULL){ echo $row_operador['nombre_legal'];} else {echo $row_anexo_e['p1'];} ?>"  />
            
                              </td>

                           <td> 
                                  <input class="form-control inputsf" id="<? echo "p2".$cont ?>" name="p2" placeholder=""type="text" value="<? echo $row_anexo_e['p2']; ?>"  />
                              </td>

<td> 
                                   <input class="form-control inputsf" id="<? echo "p3".$cont ?>" name="p3" placeholder=""type="text" value="<? echo $row_anexo_e['p3']; ?>"  />
                              </td>
<td> 
                                   <input class="form-control inputsf" id="<? echo "p4".$cont ?>" name="p4" placeholder=""type="text" value="<? echo $row_anexo_e['p4']; ?>"  />                              </td>
<td> 
                                  <input class="form-control inputsf" id="<? echo "p5".$cont ?>" name="p5" placeholder=""type="text" value="<? echo $row_anexo_e['p5']; ?>"  />
                              </td>
<td> 
                                  <input class="form-control inputsf" id="<? echo "p6".$cont ?>" name="p6" placeholder=""type="text" value="<? echo $row_anexo_e['p6']; ?>"  />
                              </td>
<td> 
                                  <input class="form-control inputsf" id="<? echo "p7".$cont ?>" name="p7" placeholder=""type="text" value="<? echo $row_anexo_e['p7']; ?>"  />
                              </td>
<td> 
                                  <input class="form-control inputsf" id="<? echo "p8".$cont ?>" name="p8" placeholder=""type="text" value="<? echo $row_anexo_e['p8']; ?>"  />
                              </td>
<td> 
                                   <input class="form-control inputsf" id="<? echo "p9".$cont ?>" name="p9" placeholder=""type="text" value="<? echo $row_anexo_e['p9']; ?>"  />
                              </td>
<td> 
                                  <input class="form-control inputsf" id="<? echo "p10".$cont ?>" name="p10" placeholder=""type="text" value="<? echo $row_anexo_e['p10']; ?>"  />
                              </td>
<td> 
                                   <input class="form-control inputsf" id="<? echo "p11".$cont ?>" name="p11" placeholder=""type="text" value="<? echo $row_anexo_e['p11']; ?>"  />
                              </td>
<td> 
                                  <input class="form-control inputsf" id="<? echo "p12".$cont ?>" name="p12" placeholder=""type="text" value="<? echo $row_anexo_e['p12']; ?>"  />
                              </td>
<td> 
                                   <input class="form-control inputsf" id="<? echo "p13".$cont ?>" name="p13" placeholder=""type="text" value="<? echo $row_anexo_e['p13']; ?>"  />
                              </td>
<td> 
                                   <input class="form-control inputsf" id="<? echo "p14".$cont ?>" name="p14" placeholder=""type="text" value="<? echo $row_anexo_e['p14']; ?>"  />
                              </td>
<td> 
                                   <input class="form-control inputsf" id="<? echo "p15".$cont ?>" name="p15" placeholder=""type="text" value="<? echo $row_anexo_e['p15']; ?>"  />
                              </td>
<td> 
                                  <input class="form-control inputsf" id="<? echo "p16".$cont ?>" name="p16" placeholder=""type="text" value="<? echo $row_anexo_e['p16']; ?>"  />
                              </td>
<td> 
                                  <input class="form-control inputsf" id="<? echo "p17".$cont ?>" name="p17" placeholder=""type="text" value="<? echo $row_anexo_e['p17']; ?>"  />
                              </td>
<td> 
                                  <input class="form-control inputsf" id="<? echo "p18".$cont ?>" name="p18" placeholder=""type="text" value="<? echo $row_anexo_e['p18']; ?>"  />
                              </td>
<td> 
                                  <input class="form-control inputsf" id="<? echo "p19".$cont ?>" name="p19" placeholder=""type="text" value="<? echo $row_anexo_e['p19']; ?>"  />
                              </td>
<? /*
                              <td>
                         
                         <form action="" method="post">
                          <input type="hidden" id="idsolicitud" name="idsolicitud" value="<? echo $row_solicitud['idsolicitud']; ?>" />
                          <input type="hidden" id="idanexo_e" name="idanexo_e" value="<? echo $row_anexo_e['idanexo_e']; ?>" />
                                
                          <button type="button"   name="borrar2" id="<?php echo 'borrar'.$cont; ?>" value="<?php echo $row_anexo_e['idanexo_e']; ?>" onclick="<?php echo 'el3'.$cont.'()'?>" >Eliminar</button>
                         </form>
                         
                              </td>
							  */ ?>
                               <td>
                         
                         
                          <input type="hidden" id="idsolicitud" name="idsolicitud" value="<? echo $row_solicitud['idsolicitud']; ?>" />
                          <input type="hidden" id="idanexo_e" name="idanexo_e" value="<? echo $row_anexo_e['idanexo_e']; ?>" />
                                
                                
                              
                                
                          <button type="button"   name="act2" id="<?php echo 'act'.$cont; ?>" value="<?php echo $row_anexo_e['idanexo_e']; ?>" onclick="<?php echo 'el3'.$cont.'()'?>" >Agregar</button>
                        
                         
                              </td>
                            </tr>                                               
<? 
 
?>
<script type="text/javascript"> 
	<?php echo 'function el3'.$cont.'(){
	 var idanexo_e = $("#act'.$cont.'").val();
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
	
	 var ruta3 = $("#ruta3").val();
	 $.ajax({
		 url:"cerebro.php",
		 method:"POST",
		 data:{idanexo_e:idanexo_e,p1:p1,p2:p2,p3:p3,p4:p4,p5:p5,p6:p6,p7:p7,p8:p8,p9:p9,p10:p10,p11:p11,p12:p12,p13:p13,p14:p14,p15:p15,p16:p16,p17:p17,p18:p18,p19:p19},
		 success: function() {
			 $("#tabla_ajax3").load(ruta3);
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
    var idanexo_e = $("#act'.$cont.'").val();
alert(idanexo_e);
alert("#act'.$cont.'"); 
    });    
});';?>
			</script>
 </form>
<?
$cont++;} ?>
</tbody>
</table>
</div>
 