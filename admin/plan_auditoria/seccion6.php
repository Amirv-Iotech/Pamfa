<fieldset>
  <div clas="row" id="seccion6">
    <div class="col-lg-12 col-xs-12" style="background-color: #ecfbe7; padding: 0px;">
    
    <form method="post" action="#seccion6"><br />

        <div class="col-lg-12 col-xs-12" style="background-color: #dbf573e6; padding: 0px;">
                 <label data-toggle="tooltip" data-placement="top" title="Le informamos a los integrantes del equipo auditor designado por este Organismo de Certificación, le solicitamos nos haga saber en no más de 5 días naturales posteriores a la fecha en que se reciba esta notificación, la aceptación o rechazo del grupo auditor propuesto, en caso contrario consideraremos como aceptada la propuesta."><h3> Equipo Auditor <i class="material-icons">help_outline</i> </h3></label> 
        </div>
        <div class="col-lg-12 col-xs-12">
        Auditor
             <select name="auditor" class="plan_input" onchange="guardarTabla(this)" >
              <option selected="true" disabled="disabled">Selecciona un Auditor...</option>
              <?php 
              $query_vista1 = "SELECT * FROM usuario where tipo=2 ORDER BY nombre ASC";
              $vista1 = mysql_query($query_vista1, $inforgan_pamfa) or die(mysql_error());

              while($row_vista1 = mysql_fetch_assoc($vista1)){
             if($row_vista1['idusuario']>3){  ?>
             
              <option  value="<?php echo $row_vista1['idusuario'];?>"><?php echo $row_vista1['nombre']." ".$row_vista1['apellidos'];?></option>
              <?php }}?>
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
              if($row_vista1['idusuario']>3){ ?>
              <option  value="<?php echo $row_vista1['idusuario'];?>"><?php echo $row_vista1['nombre']." ".$row_vista1['apellidos'];?></option>
              <?php }}?>
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
    <div id="mas" style="display:none;background-color: #ecfbe7; padding: 0px;">
  <? echo"<br><br>Le solicitamos ponerse en contacto con el equipo auditor con la suficiente anticipación y brindarle las facilidades para llegar a sus instalaciones. En caso de no poder contactar a alguno de ellos, favor de informar para ver lo conducente y así poder efectuar la auditoria sin contratiempos.
<br><br>
Reunión Inicial: Esta etapa del proceso de auditoria tiene como objetivo presentar al equipo auditor, se debe confirmar el objetivo y alcance de la auditoria, se debe dar una breve explicación acerca de la metodología utilizada para llevar a cabo la auditoria, y aclarar cualquier duda que surja por parte del cliente. 
<br><br>
Verificación: Esta etapa del proceso de la auditoria consiste en verificar la implementación de los requisitos del esquema de certificación, las actividades indicadas en los documentos del sistema de la calidad cuando aplique. <br><br>

Reunión Final/Cierre: Esta etapa del proceso consiste en presentar los resultados de la auditoria al cliente, así como de exponer y aclarar las no conformidades u observaciones que se lleguen a detectar por parte de los miembros del equipo auditor, mismas que estarán plasmadas en el informe de auditoria correspondiente. 
";?>
  </div>
  </div>
  
  
</fieldset>