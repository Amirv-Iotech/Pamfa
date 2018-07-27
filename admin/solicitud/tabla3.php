
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
 $query_cultivos = sprintf("SELECT * FROM equipo_solicitud WHERE idsolicitud = %s", GetSQLValueString($row_solicitud["idsolicitud"], "int"));
 
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
                                  <label> <? echo $row_cultivos['num_productores']; ?> </label>
                              </td>
                              <td>
                                                        <label><? echo $row_cultivos['num_fincas']; ?></label>

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
 