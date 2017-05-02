
<?php require_once('../../Connections/inforgan_pamfa.php');
 include("cerebro.php");
  
$query_solicitud = sprintf("SELECT * FROM solicitud WHERE idsolicitud=%s ", GetSQLValueString( $_POST["idsolicitud"], "int"));
$solicitud = mysql_query($query_solicitud, $inforgan_pamfa) or die(mysql_error());
$row_solicitud= mysql_fetch_assoc($solicitud);

	//consulta todos los cultivos
 $query_cultivos = sprintf("SELECT * FROM cultivos WHERE idsolicitud = %s", GetSQLValueString($row_solicitud["idsolicitud"], "int"));
?>
<div class="table-responsive">
<table class="table table-hover">
<thead>
  <th>
                    <label>Producto y variedad:</label>
                    <? echo $_POST["idsolicitud"]; ?>

  </th>
  <th>
                  <label>Nº de Productores:</label>

  </th>
  <th>
                  <label>Nº de Fincas:</label>

  </th>
  <th>
                  <label>Ubicación de cultivos:</label>

  </th>
  <th>
                  <label>Coordenadas de las unidades</label>

  </th>
  <th>
                  <label>Superficie (Ha.)</label>

  </th>
  <th>
                    <label>Periodo de cosecha</label>

  </th>
  <th>
                  <label>Aire libre- Cubierto</label>

  </th>
  <th>
                  <label>Cosecha/ Recolección</label>

  </th>
  <th>
                  <label>Empaque/ Manipulación</label>

  </th>
  <th>
                  <label>Número de trabajadores</label>

  </th>
  <th>
                  <label>Eliminar</label>

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
                          <form id="form3" name="form3" method="post" action="">
                          <input type="hidden" name="eliminar" value="1" />
                          <input type="hidden" name="idsolicitud" value="<? echo $row_solicitud['idsolicitud']; ?>" />
                          <input type="hidden" name="idcultivos" value="<? echo $row_cultivos['idcultivos']; ?>" />
                          <input type="hidden" name="seccion" value="9" />       
                          <input type="image" name="imageField3" id="imageField3" src="../../images/delete.png" title="REMOVER" width="30px" height="30px" style="padding-top: 0px;" />
                          </form>
                              </td>
                            </tr>                                               
<? }} ?>
</tbody>
</table>
</div>