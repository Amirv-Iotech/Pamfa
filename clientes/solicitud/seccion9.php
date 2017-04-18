<fieldset>
</br>
  <div class="row" id="seccion9">
  <div class="col-lg-12 col-xs-12">
    <div class="col-lg-12 col-xs-12 campos2" style="background-color: #ecfbe7; border: solid 1px #AAAAAA; border-bottom-width:2px;">
      <div class="col-lg-12 col-xs-12 campos2" style="text-align: center;background-color: #dbf573e6; border: solid 1px #AAAAAA; margin-right: 0px; margin-left: 0px;">
          <h3><b>Información de los cultivos</b></h3>
      </div>
      <form method="post" action="#seccion9">
      <div class="col-lg-12 col-xs-12 campos2">
        <div class="col-lg-12 col-xs-12 campos2">
            <div class="col-lg-2 col-xs-2 campos2" style=" padding: 0px 0px; border:solid 1px #AAAAAA; min-height: 124px;">
               <label>Producto y variedad:</label>
              <div class="campos2 div4">
                  <input class="form-control inputsf" name="producto" placeholder="escribe aquí"type="text"  />
              </div>
            </div>
            <div class="col-lg-2 col-xs-2 campos2" style=" padding: 0px 0px; border:solid 1px #AAAAAA; min-height: 124px;">
              <label>N° de productores:</label>
              <div class="campos2 div4">
              <input  class="form-control inputsf" name="num_productores" placeholder="escribe aquí" type="number"  />
              </div>
            </div>
            <div class="col-lg-2 col-xs-2 campos2" style=" padding: 0px 0px; border:solid 1px #AAAAAA; min-height: 124px;">
             <label>N° de fincas/PMUs:</label>
             <div class="campos2 div4">
              <input class="form-control inputsf" name="num_fincas" type="number"  placeholder="escribe aquí"/>
              </div>
            </div>
            <div class="col-lg-2 col-xs-2 campos2" style=" padding: 0px 0px; border:solid 1px #AAAAAA; min-height: 124px;">
              <label>Ubucación de cultivos:</label>
              <div class=" campos2 div4">
              <input  class="form-control inputsf" name="ubicacion_unidad" placeholder="escribe aquí" type="text"  />
              </div>
            </div>
            <div class="col-lg-2 col-xs-2 campos2" style=" padding: 0px 0px; border:solid 1px #AAAAAA; min-height: 124px;">
              <label>Coodernadas de las unidades:</label>
              <div class="campos2 div4">
              <input  class="form-control inputsf" name="coordenadas" placeholder="escribe aquí" type="text"  />
              </div>
            </div>
            <div class="col-lg-2 col-xs-2 campos2" style=" padding: 0px 0px; border:solid 1px #AAAAAA; min-height: 124px;">
              <label>Periodo de cosecha:</label>
              <div class="campos2 div4">
              <input  class="form-control inputsf" name="periodo_cosecha" placeholder="escribe aquí" type="text"  />
              </div>
            </div>
        </div>
        <div class="col-lg-12 col-xs-12 campos2">
            <div class="col-lg-2 col-xs-2 campos2" style=" padding: 0px 0px; border:solid 1px #AAAAAA; min-height: 124px;">
               <label> Superficie (Has):</label>
               <div class="campos2 div4">
                <input  class="form-control inputsf" name="superficie" placeholder="escribe aquí" type="number" step="any" />
                </div>
            </div>
            <div class="col-lg-2 col-xs-2 campos2" style=" padding: 0px 0px; border:solid 1px #AAAAAA; min-height: 124px;">
                <label>Aire libre- cubierto:</label>
                <div class="campos2 div4">
                <select class="form-control" name="libre_cubierto" >
                  <option value="-">Seleciona</option>
                  <option value="1">Aire libre</option>
                  <option value="2">Cubierto</option>
                </select>
                </div>
            </div>
            <div class="col-lg-2 col-xs-2 campos2" style=" padding: 0px 0px; border:solid 1px #AAAAAA; min-height: 124px;">
                <label>Cosecha/ Recolección :</label>
                <div class="campos2 div4">
                <select class="form-control" name="cosecha_recoleccion" >
                <option value="-">Seleciona</option>
                <option value="1">Si</option>
                <option value="2">No</option>
                </select>
                </div>
            </div>
            <div class="col-lg-2 col-xs-2 campos2" style=" padding: 0px 0px; border:solid 1px #AAAAAA; min-height: 124px;">
                <label>Empaque/ Manipulación :</label>
                <div class="campos2 div4">
                <select class="form-control" name="empaque" >
                <option value="-">Seleciona</option>
                <option value="1">Si</option>
                <option value="2">No</option>
                </select>
                </div>
            </div>
            <div class="col-lg-2 col-xs-2 campos2" style=" padding: 0px 0px; border:solid 1px #AAAAAA; min-height: 124px;">
                <label>Numero de trabajadores:</label>
                <div class="campos2 div4">
                <input class="form-control" name="num_trabajadores" type="number"  placeholder="escribe aquí"/>
                </div>
            </div>
            <div class="col-lg-2 col-xs-2 campos2" style=" padding: 0px 0px; border:solid 1px #AAAAAA; min-height: 124px; ">
                <input type="hidden" name="idsolicitud" value="<? echo $row_solicitud['idsolicitud']; ?>" />
                <input type="hidden" name="insertar" value="1" />
                <input type="hidden" name="seccion" value="9" />
                <div class=" col-xs-12 campos2" style="position: absolute; bottom: 35%; text-align: center;">
                <input type="submit" value="Agregar"  />
                </div>
            </div>
        </div>
      </div>
    </form>
    </div>


<!-- TABLA ======= TABLA=====-->


    <div class="col-lg-12 col-xs-12 campos2" style="background-color: #ecfbe7; border: solid 1px #AAAAAA; border-bottom-width:2px;"><!-- tabla-->
       <div class="col-lg-6 col-md-12 campos2" >
          <div class=" col-lg-2 col-xs-2 campos2">
                <div class="col-xs-12 campos2" style="text-align: center;background-color: #dbf573e6; border: solid 1px #AAAAAA; margin-right: 0px; margin-left: 0px; min-height: 67px;">
                <label>Producto y variedad:</label>
                </div>
                  <?php 
                    $query_cultivos = sprintf("SELECT * FROM cultivos WHERE idsolicitud = %s", GetSQLValueString($row_solicitud["idsolicitud"], "int"));
                    $cultivos = mysql_query($query_cultivos,  $inforgan_pamfa) or die(mysql_error());
      
                    while ($row_cultivos = mysql_fetch_assoc($cultivos)) {
                    $query_a = sprintf("SELECT * FROM cultivos WHERE idcultivos = '".$row_cultivos['idcultivos']."'");
                    $a= mysql_query($query_a, $inforgan_pamfa) or die(mysql_error());
                    while ($row_a = mysql_fetch_assoc($a)){
                      ?>
                      <div class="col-lg-12">
                      <label><? echo $row_a['producto'];?></label>
                      </div><? }}?>
          </div>
          <div class=" col-lg-2 col-xs-2 campos2">
          <div class="col-xs-12 campos2" style="text-align: center;background-color: #dbf573e6; border: solid 1px #AAAAAA; margin-right: 0px; margin-left: 0px; min-height: 67px;">
              <label>Nº de Productores:</label>
              </div>
                    <?php 
                      $query_cultivos = sprintf("SELECT * FROM cultivos WHERE idsolicitud = %s", GetSQLValueString($row_solicitud["idsolicitud"], "int"));
                      $cultivos = mysql_query($query_cultivos,  $inforgan_pamfa) or die(mysql_error());
                    while ($row_cultivos = mysql_fetch_assoc($cultivos)) {
                    $query_a = sprintf("SELECT * FROM cultivos WHERE idcultivos = '".$row_cultivos['idcultivos']."'");
                    $a= mysql_query($query_a, $inforgan_pamfa) or die(mysql_error());
                    while ($row_a = mysql_fetch_assoc($a)){
                      ?>
                      <div class="col-lg-12">
                      <label><? echo $row_a['num_productores']; ?></label>
                      </div><? }}?>
          </div>
          <div class=" col-lg-2 col-xs-2 campos2">
          <div class="col-xs-12 campos2" style="text-align: center;background-color: #dbf573e6; border: solid 1px #AAAAAA; margin-right: 0px; margin-left: 0px; min-height: 67px;">
              <label>Nº de Fincas:</label>
              </div>
                    <?php 
                    $query_cultivos = sprintf("SELECT * FROM cultivos WHERE idsolicitud = %s", GetSQLValueString($row_solicitud["idsolicitud"], "int"));
                    $cultivos = mysql_query($query_cultivos,  $inforgan_pamfa) or die(mysql_error());
                    while ($row_cultivos = mysql_fetch_assoc($cultivos)) {
                    $query_a = sprintf("SELECT * FROM cultivos WHERE idcultivos = '".$row_cultivos['idcultivos']."'");
                    $a= mysql_query($query_a, $inforgan_pamfa) or die(mysql_error());
                    while ($row_a = mysql_fetch_assoc($a)){
                      ?>
                      <div class="col-lg-12">
                        <label><? echo $row_a['num_fincas']; ?></label>
                      </div><? }}?>
          </div>
          <div class=" col-lg-2 col-xs-2 campos2">
          <div class="col-xs-12 campos2" style="text-align: center;background-color: #dbf573e6; border: solid 1px #AAAAAA; margin-right: 0px; margin-left: 0px; min-height: 67px;">
              <label>Ubicación de cultivos:</label>
              </div>
                <?php 
                    $query_cultivos = sprintf("SELECT * FROM cultivos WHERE idsolicitud = %s", GetSQLValueString($row_solicitud["idsolicitud"], "int"));
                    $cultivos = mysql_query($query_cultivos,  $inforgan_pamfa) or die(mysql_error());
                    while ($row_cultivos = mysql_fetch_assoc($cultivos)) {
                    $query_a = sprintf("SELECT * FROM cultivos WHERE idcultivos = '".$row_cultivos['idcultivos']."'");
                    $a= mysql_query($query_a, $inforgan_pamfa) or die(mysql_error());
                    while ($row_a = mysql_fetch_assoc($a)){
                      ?>
                      <div class="col-lg-12">
                        <label><? echo $row_a['ubicacion_unidad']; ?></label>
                      </div><? }}?>
          </div>
          <div class=" col-lg-2 col-xs-2 campos2">
          <div class="col-xs-12 campos2" style="text-align: center;background-color: #dbf573e6; border: solid 1px #AAAAAA; margin-right: 0px; margin-left: 0px; min-height: 67px;">
              <label>Coordenadas de las unidades</label>
              </div>
              <?php 
                    $query_cultivos = sprintf("SELECT * FROM cultivos WHERE idsolicitud = %s", GetSQLValueString($row_solicitud["idsolicitud"], "int"));
                    $cultivos = mysql_query($query_cultivos,  $inforgan_pamfa) or die(mysql_error());
                    while ($row_cultivos = mysql_fetch_assoc($cultivos)) {
                    $query_a = sprintf("SELECT * FROM cultivos WHERE idcultivos = '".$row_cultivos['idcultivos']."'");
                    $a= mysql_query($query_a, $inforgan_pamfa) or die(mysql_error());
                    while ($row_a = mysql_fetch_assoc($a)){
                      ?>
                      <div class="col-lg-12">
                        <label><? echo $row_a['coordenadas']; ?></label>
                      </div><? }}?>
          </div>
          <div class=" col-lg-2 col-xs-2 campos2">
          <div class="col-xs-12 campos2" style="text-align: center;background-color: #dbf573e6; border: solid 1px #AAAAAA; margin-right: 0px; margin-left: 0px; min-height: 67px;">
              <label>Superficie (Ha.)</label>
              </div>
                    <?php 
                    $query_cultivos = sprintf("SELECT * FROM cultivos WHERE idsolicitud = %s", GetSQLValueString($row_solicitud["idsolicitud"], "int"));
                    $cultivos = mysql_query($query_cultivos,  $inforgan_pamfa) or die(mysql_error());
                    while ($row_cultivos = mysql_fetch_assoc($cultivos)) {
                    $query_a = sprintf("SELECT * FROM cultivos WHERE idcultivos = '".$row_cultivos['idcultivos']."'");
                    $a= mysql_query($query_a, $inforgan_pamfa) or die(mysql_error());
                    while ($row_a = mysql_fetch_assoc($a)){
                      ?>
                      <div class="col-lg-12">
                         <label><? echo $row_a['superficie']; ?></label>
                      </div><? }}?>
          </div>
        </div>

        <div class="col-lg-6 col-md-12 campos2"><!-- T======== -->
            <div class=" col-lg-2 col-xs-2 campos2">
            <div class="col-xs-12 campos2" style="text-align: center;background-color: #dbf573e6; border: solid 1px #AAAAAA; margin-right: 0px; margin-left: 0px; min-height: 67px;">
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
                      <div class="col-lg-12 campos2">
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
                      <div class="col-lg-12">  
                        <p><?php if ($row_a['libre_cubierto']==1){echo "Libre";} else{echo "Cubierto";}?></p>                    
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
                      <div class="col-lg-12">  
                        <p><?php if ($row_a['cosecha_recoleccion']==1){echo "Si";} else{echo "No";}?></p>                    
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
                      <div class="col-lg-12">  
                        <p><?php if ($row_a['empaque']==1){echo "Si";} else{echo "No";}?></p>                    
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
                      <div class="col-lg-12">  
                      <label><? echo $row_a['num_trabajadores']; ?></label>
                      </div><? }}?>
          </div>
          <div class=" col-lg-2 col-xs-2 campos2">
          <div class="col-xs-12 campos2" style="text-align: center;background-color: #dbf573e6; border: solid 1px #AAAAAA; margin-right: 0px; margin-left: 0px; min-height: 67px;">
              <label>extra</label>
              </div>
              <?php 
                    $query_cultivos = sprintf("SELECT * FROM cultivos WHERE idsolicitud = %s", GetSQLValueString($row_solicitud["idsolicitud"], "int"));
                    $cultivos = mysql_query($query_cultivos,  $inforgan_pamfa) or die(mysql_error());
                    while ($row_cultivos = mysql_fetch_assoc($cultivos)) {
                    $query_a = sprintf("SELECT * FROM cultivos WHERE idcultivos = '".$row_cultivos['idcultivos']."'");
                    $a= mysql_query($query_a, $inforgan_pamfa) or die(mysql_error());
                    while ($row_a = mysql_fetch_assoc($a)){
                      ?>
                      <div class="col-lg-12">  
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
       </div>
    </div><!-- tabla -->
  </div><!--row-->
</fieldset>
<!--
    <fieldset>
    <legend>Sección 9</legend>
     <a name="seccion9">
       <form method="post" action="#seccion9">
     <table width="100%"><tbody><tr><th  bgcolor="#00CC33">
    <h3>Información de cultivos</h3>
    
   </th></tr></tbody></table>
 
    <table  align="left"  border="0" 
 
   cellpadding="5" cellspacing="0">
    <tr>
    <td colspan="3" >
    Producto y variedad:
      <input class="form-control" name="producto" placeholder="escribe aquí"type="text"  />
     
      </td>
      <td colspan="2" >
    N° de <br />productores:
      <input  class="form-control" name="num_productores" placeholder="escribe aquí" type="number"  />
      </td>
       <td colspan="2" >
    N° de fincas/PMUs:
      <input class="form-control" name="num_fincas" type="number"  placeholder="escribe aquí"/>
      </td>
       <td colspan="3" >
    Ubucación de cultivos:
      <input  class="form-control" name="ubicacion_unidad" placeholder="escribe aquí" type="text"  />
     
      </td>
       <td colspan="2" >
   Coodernadas de las unidades:
      <input  class="form-control" name="coordenadas" placeholder="escribe aquí" type="text"  />
     
      </td>
      <td colspan="2" >
   Periodo de cosecha:
      <input  class="form-control" name="periodo_cosecha" placeholder="escribe aquí" type="text"  />
     
      </td>
       <td colspan="2" >
   Superficie (Has):
      <input  class="form-control" name="superficie" placeholder="escribe aquí" type="number" step="any" />
     
      </td>
      
      </tr>
      <tr>
       
    <td colspan="2" >
      Aire libre-cubierto:
  <select class="form-control" name="libre_cubierto" >
  <option value="-">Seleciona</option>
  <option value="1">Aire libre</option>
  <option value="2">Cubierto</option>
</select>

           
      </td>
      <td colspan="2" >
      Cosecha/Recolección :
  <select class="form-control" name="cosecha_recoleccion" >
  <option value="-">Seleciona</option>
  <option value="1">Si</option>
  <option value="2">No</option>
</select>
           
      </td>
      <td colspan="2" >
      Empaque/Manipulación :
 <select class="form-control" name="empaque" >
  <option value="-">Seleciona</option>
  <option value="1">Si</option>
  <option value="2">No</option>
</select>
           
      </td>
      
    <td colspan="2" >
    Numero de trabajadores:
       <input class="form-control" name="num_trabajadores" type="number"  placeholder="escribe aquí"/>
    
      </td>
      
      
     
      
   
<td width="1" align="center">
<input type="hidden" name="idsolicitud" value="<? echo $row_solicitud['idsolicitud']; ?>" />
    
<input type="hidden" name="insertar" value="1" />
  <input type="hidden" name="seccion" value="9" />
<input type="submit" value="Agregar"  /></td>
</tr>
</table>
</form><?
$query_cultivos = sprintf("SELECT * FROM cultivos WHERE idsolicitud = %s", GetSQLValueString($row_solicitud["idsolicitud"], "int"));
$cultivos = mysql_query($query_cultivos,  $inforgan_pamfa) or die(mysql_error());
?>
<div class="col-lg-12" class="table">
<table border="1" cellpadding="5" cellspacing="0">

      <tr>
      <th>N°</th>
        <th >Producto y variedad:</th>
        <th>N° de productores:</th>
        <th>N° de fincas/PMUs:</th>
        <th>Ubiccación de cultivos</th>
        <th>Coordenadas de las unidades</th>
        <th>Superficie(Has)</th>
        <th>Periodo de cosecha</th>
        <th>Aire libre- cubierto</th>
        <th>Cosecha/Recolecció</th>
         <th>Empaque/Manipulación</th>
        <th>Numero de trabajadores</th>
       
        
       
      </tr>
  
<?php  $cont=0; $cont2=0; while ($row_cultivos = mysql_fetch_assoc($cultivos)) { ?>

<?php $cont2++; ?> <?php

$query_a = sprintf("SELECT * FROM cultivos WHERE idcultivos = '".$row_cultivos['idcultivos']."'");
$a= mysql_query($query_a, $inforgan_pamfa) or die(mysql_error());

while ($row_a = mysql_fetch_assoc($a)){
	?>
    <tr>
    <td>
	<? echo $cont2; ?>
          
     </td>
    <td width="10" >
	<input class="form-control" type="text" name="producto" value="<? echo $row_a['producto']; ?>" />
     </td>
     <td>
	<input class="form-control" type="text" name="num_productores" value="<? echo $row_a['num_productores']; ?>" />
     </td>
     <td>
	<input class="form-control" type="text" name="num_fincas" value="<? echo $row_a['num_fincas']; ?>" />
     </td>
      <td>
	<input class="form-control" type="text" name="ubicacion_unidad" value="<? echo $row_a['ubicacion_unidad']; ?>" />
     </td>
      <td>
	<input class="form-control" type="text" name="coordenadas" value="<? echo $row_a['coordenadas']; ?>" />
     </td>
     <td>
	<input class="form-control" type="number" step="any" name="superficie" value="<? echo $row_a['superficie']; ?>" />
    <? $cont=$cont+$row_a['superficie'];?>
     </td>
     <td>
	<input class="form-control" type="text" name="periodo_cosecha" value="<? echo $row_a['periodo_cosecha']; ?>" />
     </td>
     
     
    <td  >
      
 <select class="form-control" name="libre_cubierto" >
  <option  value="-">Seleciona</option>
  <option <? if($row_a['libre_cubierto']==1){?> selected="selected" <? }?> value="1">Si</option>
  <option <? if($row_a['libre_cubierto']==2){?> selected="selected" <? }?>value="2">No</option>
</select>
</td>
 <td  >
      
 <select class="form-control" name="cosecha_recoleccion" >
  <option  value="-">Seleciona</option>
  <option <? if($row_a['cosecha_recoleccion']==1){?> selected="selected" <? }?> value="1">Si</option>
  <option <? if($row_a['cosecha_recoleccion']==2){?> selected="selected" <? }?>value="2">No</option>
</select>
</td>
<td  >
      
 <select class="form-control" name="empaque" >
  <option  value="-">Seleciona</option>
  <option <? if($row_a['empaque']==1){?> selected="selected" <? }?> value="1">Si</option>
  <option <? if($row_a['empaque']==2){?> selected="selected" <? }?>value="2">No</option>
</select>
</td>
     <td>
	<input class="form-control" type="text" name="num_trabajadores" value="<? echo $row_a['num_trabajadores']; ?>" />
     </td>
     
    <td width="1" align="center">
    <form id="form3" name="form3" method="post" action="">
    <input type="hidden" name="eliminar" value="1" />
    <input type="hidden" name="idsolicitud" value="<? echo $row_solicitud['idsolicitud']; ?>" />
     <input type="hidden" name="idcultivos" value="<? echo $row_cultivos['idcultivos']; ?>" />
    

  <input type="hidden" name="seccion" value="9" />
    <input type="image" name="imageField3" id="imageField3" src="../../images/delete.png" title="REMOVER" width="30" height="30" />
    </form></td>
    <? }?> <?
}
	 ?>
  </tr>
  
 
  <tr>
  <td colspan="4">
   
 Total (Has.)
  </td>
  <td >
   <? echo $cont;?>
  </td>
  
  </tr>
</table>
      
    </div>
      </form>
    
    </fieldset>-->
   
	