
<?php require_once('../../Connections/inforgan_pamfa.php');
 include("cerebro.php");
  $sol="";
  if($_GET["idsolicitud"])
  {$sol=$_GET["idsolicitud"];
  echo "get";
 
  }
  else if($_POST["idsolicitud"])
  {$sol=$_POST["idsolicitud"];
 echo "post".$_POST["idsolicitud"];
	  }
  else if($row_solicitud['idsolicitud'])
  {
	  $sol=$row_solicitud['idsolicitud'];
	echo "row";
  }
  else{
	$query_s = sprintf("SELECT Max(idsolicitud) as id FROM solicitud  WHERE idoperador='".$_GET['idoperador']."' and terminada is null");
	$s  = mysql_query($query_s , $inforgan_pamfa) or die(mysql_error());
$row_s = mysql_fetch_assoc($s);  
$sol=$row_s ['id'];

echo "qery";
  }
$query_solicitud = sprintf("SELECT * FROM solicitud WHERE idsolicitud=%s ", GetSQLValueString( $sol, "int"));
$solicitud = mysql_query($query_solicitud, $inforgan_pamfa) or die(mysql_error());
$row_solicitud= mysql_fetch_assoc($solicitud);




 	//consulta todos los cultivos
 $query_cultivos = sprintf("SELECT * FROM cultivos WHERE idsolicitud = %s", GetSQLValueString($row_solicitud["idsolicitud"], "int"));
 
?>
<div class="table-responsive"  <? if($s9==1){?> style="background-color:#CF3" <? } else{?>style="background-color: #ecfbe7; <? }?> ">
<table class="table table-hover">
<thead>
  <th>
                    <label><strong>Producto y variedad:</strong></label>
                  

  </th>
  <th>
                  <label><strong>Nº de Productores:</strong></label>

  </th>
  <th>
                  <label><strong>Nº de Fincas:</strong></label>

  </th>
  <th>
                  <label><strong>Ubicación de cultivos:</strong></label>

  </th>
  <th>
                  <label><strong>Coordenadas de las unidades</strong></label>

  </th>
  <th>
                  <label><strong>Superficie (Ha.)</strong></label>

  </th>
  <th>
                    <label><strong>Periodo de cosecha</strong></label>

  </th>
  <th>
                  <label><strong>Aire libre- Cubierto</strong></label>

  </th>
  <th>
                  <label><strong>Cosecha/ Recolección</strong></label>

  </th>
  <th>
                  <label><strong>Empaque/ Manipulación</strong></label>

  </th>
  <th>
                  <label><strong>Número de trabajadores</strong></label>

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
                    $query_a = sprintf("SELECT * FROM cultivos WHERE idcultivos = '".$row_cultivos['idcultivos']."'");
                    $a= mysql_query($query_a, $inforgan_pamfa) or die(mysql_error());
                            while ($row_a = mysql_fetch_assoc($a)){ ?>
                            <tr>
                              <td> 
                                  <label><? echo $row_a['producto']; ?> </label>
                              </td>

                              <td>
                                  <label> <? echo $row_a['num_productores']; ?> </label>
                              </td>
                              <td>
                                                        <label><? echo $row_a['num_fincas']; ?></label>

                              </td>

                              <td>
                                                        <label><? echo $row_a['ubicacion_unidad']; ?></label>

                              </td>

                              <td>
                                                        <label><? echo $row_a['coordenadas']; ?></label>

                              </td>

                              <td>
                                                         <label><? echo $row_a['superficie']; ?></label>

                              </td>

                              <td>
                                <label><? echo $row_a['periodo_cosecha']; ?></label>                        
                              </td>
                              <td>
                                                        <label><?php if ($row_a['libre_cubierto']==1){echo "Libre";} else{echo "Cubierto";}?></label>                    

                              </td>
                              <td>
                                                        <label><?php if ($row_a['cosecha_recoleccion']==1){echo "Si";} else{echo "No";}?></label>                    

                              </td>
                              <td>
                                <label><?php if ($row_a['empaque']==1){echo "Si";} else{echo "No";}?></label>                    
                              </td>
                              <td>
                                <label><? echo $row_a['num_trabajadores']; ?></label>

                              </td>
                              <td>
                         
                         <form action="" method="post">
                          <input type="hidden" id="idsolicitud" name="idsolicitud" value="<? echo $row_solicitud['idsolicitud']; ?>" />
                          <input type="hidden" id="idcultivos" name="idcultivos" value="<? echo $row_cultivos['idcultivos']; ?>" />
                           <input type="hidden" id="<?php echo 'empaque'.$cont; ?>" name="empaque" value="<? echo $row_a['empaque']; ?>" />
                                
                          <button type="button"   name="borrar2" id="<?php echo 'borrar'.$cont; ?>" value="<?php echo $row_cultivos['idcultivos']; ?>" onclick="<?php echo 'el2'.$cont.'()'?>" >Eliminar</button>
                         </form>
                         
                              </td>
                            </tr>                                               
<? }
 
?>
<script>
	<?php echo 'function el2'.$cont.'(){
	 var idcultivos = $("#borrar'.$cont.'").val();
	 var eliminar = $("#eliminar").val();
	 var empaque = $("#empaque'.$cont.'").val();
	
	 var ruta = $("#ruta").val();
	  var ruta2 = $("#ruta2").val();
	   var ruta3 = $("#ruta3").val();
	 $.ajax({
		 url:"cerebro.php",
		 method:"POST",
		 data:{idcultivos:idcultivos,empaque:empaque},
		 success: function() {
			 $("#tabla_ajax").load(ruta);
			 
			  
			    $("#tabla_ajax2").load(ruta2);
				 $("#tabla_ajax3").load(ruta3);
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
 