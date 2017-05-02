
<?php require_once('../../Connections/inforgan_pamfa.php');
 include("cerebro.php");
  
  if($_GET["idsolicitud"])
  {
$query_solicitud = sprintf("SELECT * FROM solicitud WHERE idsolicitud=%s ", GetSQLValueString( $_GET["idsolicitud"], "int"));
$solicitud = mysql_query($query_solicitud, $inforgan_pamfa) or die(mysql_error());
$row_solicitud= mysql_fetch_assoc($solicitud);
  }
  else{
$query_solicitud = sprintf("SELECT * FROM solicitud WHERE idsolicitud=%s ", GetSQLValueString( $_POST["idsolicitud"], "int"));
$solicitud = mysql_query($query_solicitud, $inforgan_pamfa) or die(mysql_error());
$row_solicitud= mysql_fetch_assoc($solicitud);
  }
	//consulta todos los cultivos
 $query_cultivos = sprintf("SELECT * FROM cultivos WHERE idsolicitud = %s", GetSQLValueString($row_solicitud["idsolicitud"], "int"));
 
?>
<div class="table-responsive">
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
                         <form method="post" action="#seccion9">
                          <input type="hidden" id="eliminar"name="eliminar" value="1" />
                          <input type="hidden" id="idsolicitud" name="idsolicitud" value="<? echo $row_solicitud['idsolicitud']; ?>" />
                          <input type="hidden" id="idcultivos" name="idcultivos" value="<? echo $row_cultivos['idcultivos']; ?>" />
                                
                          <input type="image" name="borrar" id="borrar" src="../../images/delete.png" title="REMOVER" width="30px" height="30px" style="padding-top: 0px;" />
                          </form>
                              </td>
                            </tr>                                               
<? }} ?>
</tbody>
</table>
</div>