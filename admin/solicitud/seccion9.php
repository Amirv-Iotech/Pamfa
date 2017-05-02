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
                  <input class="form-control inputsf" id="producto" name="producto" placeholder=""type="text"  />
              </div>
            </div>
            <div class="col-lg-2 col-xs-2 campos2" style=" padding: 0px 0px; border:solid 1px #AAAAAA; min-height: 124px;">
              <label>N° de productores:</label>
              <div class="campos2 div4">
              <input  class="form-control inputsf" id="num_productores" name="num_productores" placeholder="" type="number"  />
              </div>
            </div>
            <div class="col-lg-2 col-xs-2 campos2" style=" padding: 0px 0px; border:solid 1px #AAAAAA; min-height: 124px;">
             <label>N° de fincas/PMUs:</label>
             <div class="campos2 div4">
              <input class="form-control inputsf"  id="num_fincas" name="num_fincas" type="number"  placeholder=""/>
              </div>
            </div>
            <div class="col-lg-2 col-xs-2 campos2" style=" padding: 0px 0px; border:solid 1px #AAAAAA; min-height: 124px;">
              <label>Ubucación de cultivos:</label>
              <div class=" campos2 div4">
              <input  class="form-control inputsf" id="ubicacion_unidad" name="ubicacion_unidad" placeholder="" type="text"  />
              </div>
            </div>
            <div class="col-lg-2 col-xs-2 campos2" style=" padding: 0px 0px; border:solid 1px #AAAAAA; min-height: 124px;">
              <label>Coodernadas de las unidades:</label>
              <div class="campos2 div4">
              <input  class="form-control inputsf" id="coordenadas" name="coordenadas" placeholder="" type="text"  />
              </div>
            </div>
            <div class="col-lg-2 col-xs-2 campos2" style=" padding: 0px 0px; border:solid 1px #AAAAAA; min-height: 124px;">
              <label>Periodo de cosecha:</label>
              <div class="campos2 div4">
              <input  class="form-control inputsf" id="periodo_cosecha" name="periodo_cosecha" placeholder="" type="text"  />
              </div>
            </div>
        </div>
        <div class="col-lg-12 col-xs-12 campos2">
            <div class="col-lg-2 col-xs-2 campos2" style=" padding: 0px 0px; border:solid 1px #AAAAAA; min-height: 124px;">
               <label> Superficie (Has):</label>
               <div class="campos2 div4">
                <input  class="form-control inputsf" id="superficie" name="superficie" placeholder="" type="number" step="any" />
                </div>
            </div>
            <div class="col-lg-2 col-xs-2 campos2" style=" padding: 0px 0px; border:solid 1px #AAAAAA; min-height: 124px;">
                <label>Aire libre- cubierto:</label>
                <div class="campos2 div4">
                <select class="form-control" id="libre_cubierto"  name="libre_cubierto" >
                  <option value="-">Seleciona</option>
                  <option value="1">Aire libre</option>
                  <option value="2">Cubierto</option>
                </select>
                </div>
            </div>
            <div class="col-lg-2 col-xs-2 campos2" style=" padding: 0px 0px; border:solid 1px #AAAAAA; min-height: 124px;">
                <label>Cosecha/ Recolección :</label>
                <div class="campos2 div4">
                <select class="form-control"  id="cosecha_recoleccion"name="cosecha_recoleccion" >
                <option value="-">Seleciona</option>
                <option value="1">Si</option>
                <option value="2">No</option>
                </select>
                </div>
            </div>
            <div class="col-lg-2 col-xs-2 campos2" style=" padding: 0px 0px; border:solid 1px #AAAAAA; min-height: 124px;">
                <label>Empaque/ Manipulación :</label>
                <div class="campos2 div4">
                <select class="form-control"  id="empaque" name="empaque" >
                <option value="-">Seleciona</option>
                <option value="1">Si</option>
                <option value="2">No</option>
                </select>
                </div>
            </div>
            <div class="col-lg-2 col-xs-2 campos2" style=" padding: 0px 0px; border:solid 1px #AAAAAA; min-height: 124px;">
                <label>Numero de trabajadores:</label>
                <div class="campos2 div4">
                <input class="form-control"  id="num_trabajadores" name="num_trabajadores" type="number"  placeholder=""/>
                </div>
            </div>
            <div class="col-lg-2 col-xs-2 campos2" style=" padding: 0px 0px; border:solid 1px #AAAAAA; min-height: 124px; ">
                <input type="hidden" id="idsolicitud" name="idsolicitud" value="<? echo $row_solicitud['idsolicitud']; ?>" />
                <input type="hidden"  id="insertar_prod" name="insertar_prod" value="1" />
                <input type="hidden" id="seccion" name="seccion" value="1" />
               
                <input type="hidden" id="idoperador" name="idoperador" value="<? echo $row_operador['idoperador']; ?>" />
                <div class=" col-xs-12 campos2" style="position: absolute; bottom: 35%; text-align: center;">
                <input type="button" value="agregar" name="agregar" id="agregar"  />
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
                <div class=" col-lg-12 col-xs-12 campos2" style="text-align: center;background-color: #dbf573e6; border: solid 1px #AAAAAA; margin-right: 0px; margin-left: 0px; min-height: 67px;">
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
                      <div class="col-lg-12 col-xs-12 div9"  style=" padding: 0px 0px; border:solid 1px #AAAAAA; height: 75px;">
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
                      <div class="col-lg-12 col-xs-12 div9" style=" padding: 0px 0px; border:solid 1px #AAAAAA; height: 75px;">
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
                      <div class="col-lg-12 col-xs-12 div9" style=" padding: 0px 0px; border:solid 1px #AAAAAA; height: 75px;">
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
                      <div class="col-lg-12 col-xs-12 div9" style=" padding: 0px 0px; border:solid 1px #AAAAAA; height: 75px;">
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
                      <div class="col-lg-12 col-xs-12 div9" style=" padding: 0px 0px; border:solid 1px #AAAAAA; height: 75px;">
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
                      <div class="col-lg-12 col-xs-12 div9" style=" padding: 0px 0px; border:solid 1px #AAAAAA; height: 75px;">
                         <label><? echo $row_a['superficie']; ?></label>
                      </div><? }}?>
          </div>
        </div>

        <div class="col-lg-6 col-md-12 campos2"><!-- T2======== -->
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
       </div>
    </div><!-- tabla -->
  </div><!--row-->
</fieldset>