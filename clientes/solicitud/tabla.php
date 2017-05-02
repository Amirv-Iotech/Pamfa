<?php require_once('../../Connections/inforgan_pamfa.php');
 include("cerebro.php");

	//consulta todos los empleados
?>
  <div class="col-lg-12 col-xs-12 campos2" style="background-color: #ecfbe7; border: solid 1px #AAAAAA; border-bottom-width:2px;"><!-- tabla-->
            <div class=" col-lg-2 col-xs-2 campos2">
              <div class=" col-lg-12 col-xs-12 campos2" style="text-align: center;background-color: #dbf573e6; border: solid 1px #AAAAAA; margin-right: 0px; margin-left: 0px; min-height: 67px;">
                <label>Periodo de cosecha</label>
              </div>
              <?php 
                    $query_cultivos = sprintf("SELECT * FROM cultivos WHERE idsolicitud = %s", GetSQLValueString($row_solicitud["idsolicitud"], "int"));
                    $cultivos = mysql_query($query_cultivos,  $inforgan_pamfa) or die(mysql_error());
                    while ($row_cultivos = mysql_fetch_assoc($cultivos)) {
                    $query_a = sprintf("SELECT * FROM cultivos WHERE idcultivos = '".$row_cultivos['idcultivos']."'");
                    $a= mysql_query($query_a, $inforgan_pamfa) or die(mysql_error());
                    while ($row_a = mysql_fetch_assoc($a)){
                      ?>
                      <div class="col-lg-12 col-xs-12 div9" style=" padding: 0px 0px; border:solid 1px #AAAAAA; height: 75px;">
                        <label><? echo $row_a['periodo_cosecha']; ?></label>
                      </div><? }}?>

          </div>
          <div class=" col-lg-2 col-xs-2 campos2">
          <div class="col-xs-12 campos2" style="text-align: center;background-color: #dbf573e6; border: solid 1px #AAAAAA; margin-right: 0px; margin-left: 0px; min-height: 67px;">
              <label>Aire libre- Cubierto</label>
              </div>
              <?php 
                    $query_cultivos = sprintf("SELECT * FROM cultivos WHERE idsolicitud = %s", GetSQLValueString($row_solicitud["idsolicitud"], "int"));
                    $cultivos = mysql_query($query_cultivos,  $inforgan_pamfa) or die(mysql_error());
                    while ($row_cultivos = mysql_fetch_assoc($cultivos)) {
                    $query_a = sprintf("SELECT * FROM cultivos WHERE idcultivos = '".$row_cultivos['idcultivos']."'");
                    $a= mysql_query($query_a, $inforgan_pamfa) or die(mysql_error());
                    while ($row_a = mysql_fetch_assoc($a)){
                      ?>
                      <div class="col-lg-12 col-xs-12 div9" style=" padding: 0px 0px; border:solid 1px #AAAAAA; height: 75px;">  
                        <label><?php if ($row_a['libre_cubierto']==1){echo "Libre";} else{echo "Cubierto";}?></label>                    
                      </div><? }}?>
          </div>
          <div class=" col-lg-2 col-xs-2 campos2">
          <div class="col-xs-12 campos2" style="text-align: center;background-color: #dbf573e6; border: solid 1px #AAAAAA; margin-right: 0px; margin-left: 0px; min-height: 67px;">
              <label>Cosecha/ Recolección</label>
              </div>
              <?php 
                    $query_cultivos = sprintf("SELECT * FROM cultivos WHERE idsolicitud = %s", GetSQLValueString($row_solicitud["idsolicitud"], "int"));
                    $cultivos = mysql_query($query_cultivos,  $inforgan_pamfa) or die(mysql_error());
                    while ($row_cultivos = mysql_fetch_assoc($cultivos)) {
                    $query_a = sprintf("SELECT * FROM cultivos WHERE idcultivos = '".$row_cultivos['idcultivos']."'");
                    $a= mysql_query($query_a, $inforgan_pamfa) or die(mysql_error());
                    while ($row_a = mysql_fetch_assoc($a)){
                      ?>
                      <div class="col-lg-12 col-xs-12 div9" style=" padding: 0px 0px; border:solid 1px #AAAAAA; height: 75px;">  
                        <label><?php if ($row_a['cosecha_recoleccion']==1){echo "Si";} else{echo "No";}?></label>                    
                      </div><? }}?>
          </div>
          <div class=" col-lg-2 col-xs-2 campos2">
          <div class="col-xs-12 campos2" style="text-align: center;background-color: #dbf573e6; border: solid 1px #AAAAAA; margin-right: 0px; margin-left: 0px; min-height: 67px;">
              <label>Empaque/ Manipulación</label>
              </div>
              <?php 
                    $query_cultivos = sprintf("SELECT * FROM cultivos WHERE idsolicitud = %s", GetSQLValueString($row_solicitud["idsolicitud"], "int"));
                    $cultivos = mysql_query($query_cultivos,  $inforgan_pamfa) or die(mysql_error());
                    while ($row_cultivos = mysql_fetch_assoc($cultivos)) {
                    $query_a = sprintf("SELECT * FROM cultivos WHERE idcultivos = '".$row_cultivos['idcultivos']."'");
                    $a= mysql_query($query_a, $inforgan_pamfa) or die(mysql_error());
                    while ($row_a = mysql_fetch_assoc($a)){
                      ?>
                      <div class="col-lg-12 col-xs-12 div9" style=" padding: 0px 0px; border:solid 1px #AAAAAA; height: 75px;">  
                        <label><?php if ($row_a['empaque']==1){echo "Si";} else{echo "No";}?></label>                    
                      </div><? }}?>
          </div>
          <div class=" col-lg-2 col-xs-2 campos2">
          <div class="col-xs-12 campos2" style="text-align: center;background-color: #dbf573e6; border: solid 1px #AAAAAA; margin-right: 0px; margin-left: 0px; min-height: 67px;">
              <label>Número de trabajadores</label>
              </div>
                <?php 
                    $query_cultivos = sprintf("SELECT * FROM cultivos WHERE idsolicitud = %s", GetSQLValueString($row_solicitud["idsolicitud"], "int"));
                    $cultivos = mysql_query($query_cultivos,  $inforgan_pamfa) or die(mysql_error());
                    while ($row_cultivos = mysql_fetch_assoc($cultivos)) {
                    $query_a = sprintf("SELECT * FROM cultivos WHERE idcultivos = '".$row_cultivos['idcultivos']."'");
                    $a= mysql_query($query_a, $inforgan_pamfa) or die(mysql_error());
                    while ($row_a = mysql_fetch_assoc($a)){
                      ?>
                      <div class="col-lg-12 col-xs-12 div9" style=" padding: 0px 0px; border:solid 1px #AAAAAA; height: 75px;">  
                      <label><? echo $row_a['num_trabajadores']; ?></label>
                      </div><? }}?>
          </div>
          <div class=" col-lg-2 col-xs-2 campos2">
          <div class="col-xs-12 col-lg-12 campos2" style="text-align: center;background-color: #dbf573e6; border: solid 1px #AAAAAA; margin-right: 0px; margin-left: 0px; min-height: 67px;">
              <label>Eliminar</label>
              </div>
              <?php 
                    $query_cultivos = sprintf("SELECT * FROM cultivos WHERE idsolicitud = %s", GetSQLValueString($row_solicitud["idsolicitud"], "int"));
                    $cultivos = mysql_query($query_cultivos,  $inforgan_pamfa) or die(mysql_error());
                    while ($row_cultivos = mysql_fetch_assoc($cultivos)) {
                    $query_a = sprintf("SELECT * FROM cultivos WHERE idcultivos = '".$row_cultivos['idcultivos']."'");
                    $a= mysql_query($query_a, $inforgan_pamfa) or die(mysql_error());
                    while ($row_a = mysql_fetch_assoc($a)){
                      ?>
                      <div class="col-lg-12 col-xs-12 div9">  
                        <form id="form3" name="form3" method="post" action="">
                          <input type="hidden" name="eliminar" value="1" />
                          <input type="hidden" name="idsolicitud" value="<? echo $row_solicitud['idsolicitud']; ?>" />
                          <input type="hidden" name="idcultivos" value="<? echo $row_cultivos['idcultivos']; ?>" />
                          <input type="hidden" name="seccion" value="9" />       
                          <input type="image" name="imageField3" id="imageField3" src="../../images/delete.png" title="REMOVER" width="30px" height="30px" style="padding-top: 0px;" />
                        </form>
                      </div><? }}?>
              
          </div>
       </div>