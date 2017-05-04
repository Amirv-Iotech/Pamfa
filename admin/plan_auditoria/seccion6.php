<fieldset>
  <div clas="row" id="seccion6">
    <div class="col-lg-12 col-xs-12" style="background-color: #ecfbe7; padding: 0px;">
    
    <form method="post" action="#seccion6"><br />

        <div class="col-lg-12 col-xs-12" style="background-color: #dbf573e6; padding: 0px;">
                <h3>Equipo Auditor</h3>
        </div>
        <div class="col-lg-12 col-xs-12">
        Auditor
             <select name="auditor" class="plan_input" onchange="guardarTabla(this)" >
              <option selected="true" disabled="disabled">Selecciona un Auditor...</option>
              <?php 
              $query_vista1 = "SELECT * FROM usuario where tipo=2 ORDER BY nombre ASC";
              $vista1 = mysql_query($query_vista1, $inforgan_pamfa) or die(mysql_error());

              while($row_vista1 = mysql_fetch_assoc($vista1)){
              ?>
              <option  value="<?php echo $row_vista1['idusuario'];?>"><?php echo $row_vista1['nombre']." ".$row_vista1['apellidos'];?></option>
              <?php }?>
              </select>
        </div>
        <div class="col-lg-12 col-xs-12">
            Inspector
            <select name="inspector" class="plan_input" onchange="guardarTabla(this)">
              <option selected="true" disabled="disabled" value="">Selecciona una opción...</option>
              <?php 
              $query_vista1 = "SELECT * FROM usuario where tipo=3 ORDER BY nombre ASC";
              $vista1 = mysql_query($query_vista1,  $inforgan_pamfa) or die(mysql_error());
              while($row_vista1 = mysql_fetch_assoc($vista1)){
              ?>
              <option  value="<?php echo $row_vista1['idusuario'];?>"><?php echo $row_vista1['nombre']." ".$row_vista1['apellidos'];?></option>
              <?php }?>
            </select>
              <input type="hidden" name="idplan_auditoria" value="<? echo $row_plan_auditoria['idplan_auditoria']; ?>" />
               <input type="hidden" name="idsolicitud" id="idsolicitud" value="<? echo $row_solicitud['idsolicitud']; ?>" />
              <input type="hidden" name="seccion" value="6" />
               </form>   
        </div>
        <div class="col-xs-12 col-lg-12" id="tabla_ajax">
          <?
            include('tabla.php');
          ?>
        </div>

        
    </div>
  </div>
</fieldset>