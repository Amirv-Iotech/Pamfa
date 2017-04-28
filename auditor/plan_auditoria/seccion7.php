<fieldset>
<div class="row" id="seccion7" style="background-color: #ecfbe7;">
  <div class="col-lg-12 col-xs-12">
    <form method="post" action="#seccion6"><br />
      <div class="col-lg-12 col-xs-12" style="background-color: #dbf573e6; padding: 0px;">
          <h3>Agenda de trabajo general:</h3>
      </div>
      <div class="col-lg-2 col-xs-4">
      <label>fecha</label>
       <input placeholder="escribe aquí"  class="plan_input"  name="fecha"        title="Fecha " type="date" value=""  />

      </div>
      <div class="col-lg-2 col-xs-4">
      <label>Horario</label>
       <input placeholder="escribe aquí"  class="plan_input"  name="horario"        title="Horario " type="text" value=""  />

      </div>
      <div class="col-lg-2 col-xs-4">
        <label data-toggle="tooltip" title="se deberá indicar detalladamente las actividades o documentos a revisar por áreas, rubros o secciones">Area / Actividad</label>

       <input placeholder="escribe aquí"  class="plan_input"  name="actividad"        title="Actividad " type="text" value=""  />

      </div>
      <div class="col-lg-2 col-xs-4">
      <label>Responsable por Parte del cliente</label>
       <input placeholder="escribe aquí"  class="plan_input"  name="responsable"        title="Responsable " type="text" value=""  />

      </div>
      <div class="col-lg-2 col-xs-4">
      <label>Auditor</label>
        <select name="auditor" class="plan_input" >
        <option value="">Selecciona una opción...</option>
        <?php 
        $query_vista1 = "select nombre,apellidos from usuario where idusuario=(SELECT idauditor FROM plan_auditoria_equipo where idplan_auditoria='".$_POST['idplan_auditoria']."') ";
        $vista1 = mysql_query($query_vista1,  $inforgan_pamfa) or die(mysql_error());
        while($row_vista1 = mysql_fetch_assoc($vista1)){
        ?>
        <option  value="<?php echo $row_vista1['idauditor'];?>"><?php echo $row_vista1['nombre']." ".$row_vista1['apellidos'];?></option>
        <?php }?>
        </select>
      </div>
      <div class="col-lg-2 col-xs-4">
        <input type="hidden" name="idplan_auditoria" value="<? echo $_POST['idplan_auditoria']; ?>" />           <input type="hidden" name="idsolicitud" id="idsolicitud" value="<? echo $row_solicitud['idsolicitud']; ?>" />
        <input type="hidden" name="insertar" value="1" />
        <input type="hidden" name="seccion" value="7" />
        <input type="submit" value="Agregar"  />
      </div>
    </form>
      <div class="col-xs-12 col-lg-12">
      <div class="table-responsive">
      <table class="table table-hover">
          <thead>
            <th>Fecha
            </th>
            <th>Horario
            </th>
            <th>Actividad
            </th>
            <th>Responsable
            </th>
            <th>Auditor
            </th>
          </thead>

          <tbody>
            <? $query_agenda = sprintf("SELECT * FROM agenda where idplan_auditoria='".$_POST['idplan_auditoria']."'");
                $agenda = mysql_query($query_agenda, $inforgan_pamfa) or die(mysql_error());
              while($row_agenda= mysql_fetch_assoc($agenda))
                {
                $query_vista1 = "select nombre,apellidos from usuario where idusuario=(SELECT idauditor FROM plan_auditoria_equipo where idplan_auditoria='".$row_agenda['idplan_auditoria']."') ";
                $vista1 = mysql_query($query_vista1,  $inforgan_pamfa) or die(mysql_error());
                $row_vista1= mysql_fetch_assoc($vista1);
            ?>
            <tr>
              <td><? echo $row_agenda['fecha'];?></td>
              <td><? echo $row_agenda['horario'];?></td>
              <td><? echo $row_agenda['actividad'];?></td>
              <td><? echo $row_agenda['responsable'];?>"</td>
              <td><? echo $row_vista1['nombre']." ". $row_vista1['apellidos'];?>"</td>
              <td><form id="form3" name="form3" method="post" action="#seccion7">
                  <input type="hidden" name="eliminar" value="1" />
                  <input type="hidden" name="idplan_auditoria" value="<? echo $_POST['idplan_auditoria']; ?>" />
                  <input type="hidden" name="idagenda" value="<? echo $row_agenda['idagenda']; ?>" />
                  <input type="hidden" name="seccion" value="7" />
                  <input type="image" name="imageField3" id="imageField3" src="../../images/delete.png" title="REMOVER" width="30" height="30" />
                  <input type="hidden" name="idsolicitud" id="idsolicitud" value="<? echo $row_solicitud['idsolicitud']; ?>" />
                  </form>
              </td>
            </tr>
            <? }?>
   
          </tbody>
      </table>
      </div>
      </div>
  </div>
</div>
</fieldset>
<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});
</script>
<!--
<fieldset>
    <legend>Sección 6</legend>
     <a name="seccion6">
     <form method="post" action="#seccion6"><br />
     <table width="100%"><tbody><tr><th  bgcolor="#00CC33">
    <h3>Agenda de trabajo general:</h3>
    
    
   </th></tr></tbody></table>
   <table width="100%"><tbody><tr>
   <th  colspan="1" >Fecha</th>
   <th  colspan="1" >Horaro</th>
   <th  colspan="3" >Área /actividad (se deberá indicar detalladamente las actividades o documentos a revisar por áreas, rubros o secciones)</th>
   <th  colspan="3" >Responsable por parte del cliente</th>
   <th  colspan="3" >Auditor</th>
   </tr>
   <tr>
   <th colspan="1" >
 <input placeholder="escribe aquí"  class="form-control"  name="fecha"  			title="Fecha " type="date" value=""  />
   </th>
   
   <th colspan="1" >
 <input placeholder="escribe aquí"  class="form-control"  name="horario"  			title="Horario " type="text" value=""  />
   </th>
   
   <th colspan="3" >
 <input placeholder="escribe aquí"  class="form-control"  name="actividad"  			title="Actividad " type="text" value=""  />
   </th>
    
   <th colspan="3" >
 <input placeholder="escribe aquí"  class="form-control"  name="responsable"  			title="Responsable " type="text" value=""  />
   </th>
    
   <th colspan="3" >
<select name="auditor" class="form-control" >
<option value="">Selecciona una opción...</option>
<?php  /*
$query_vista1 = "select nombre,apellidos from usuario where idusuario=(SELECT idauditor FROM plan_auditoria_equipo where idplan_auditoria='".$_POST['idplan_auditoria']."') ";
$vista1 = mysql_query($query_vista1,  $inforgan_pamfa) or die(mysql_error());
while($row_vista1 = mysql_fetch_assoc($vista1)){
?>
<option  value="<?php echo $row_vista1['idauditor'];?>"><?php echo $row_vista1['nombre']." ".$row_vista1['apellidos'];?></option>
<?php }?>
</select>
   </th>
   <th>
<input type="hidden" name="idplan_auditoria" value="<? echo $_POST['idplan_auditoria']; ?>" />
    
<input type="hidden" name="insertar" value="1" />
  <input type="hidden" name="seccion" value="7" />
<input type="submit" value="Agregar"  /></th>

  
</tr></tbody></table>
  
      </form>   
       <form method="post" action="#seccion6">  
       <? $query_agenda = sprintf("SELECT * FROM agenda where idplan_auditoria='".$_POST['idplan_auditoria']."'");
$agenda = mysql_query($query_agenda, $inforgan_pamfa) or die(mysql_error());
?>
<br />

      <table width="100%" ><tbody>
      <tr>
      <th colspan="1">Fecha
      </th>
      <th colspan="1" >Horario
      </th>
      <th colspan="3">Actividad
      </th>
      <th colspan="2">Responsable
      </th>
      <th colspan="2">Auditor
      </th>
      </tr>
      
      <?
      while($row_agenda= mysql_fetch_assoc($agenda))
{
	$query_vista1 = "select nombre,apellidos from usuario where idusuario=(SELECT idauditor FROM plan_auditoria_equipo where idplan_auditoria='".$row_agenda['idplan_auditoria']."') ";
$vista1 = mysql_query($query_vista1,  $inforgan_pamfa) or die(mysql_error());
$row_vista1= mysql_fetch_assoc($vista1);
	?>
   <tr>
   <th colspan="1" >
<? echo $row_agenda['fecha'];?>
   </th>
    <th colspan="1" >
<? echo $row_agenda['horario'];?>
   </th>
    <th colspan="3" >
 <? echo $row_agenda['actividad'];?>
   </th>
    <th colspan="2" >
 <? echo $row_agenda['responsable'];?>" 
   </th>
    <th colspan="2" >
 <? echo $row_vista1['nombre']." ". $row_vista1['apellidos'];?>" 
   </th>
    <th width="1" ><form id="form3" name="form3" method="post" action="">
    <input type="hidden" name="eliminar" value="1" />
    <input type="hidden" name="idplan_auditoria" value="<? echo $_POST['idplan_auditoria']; ?>" />
     <input type="hidden" name="idagenda" value="<? echo $row_agenda['idagenda']; ?>" />
    

  <input type="hidden" name="seccion" value="7" />
    <input type="image" name="imageField3" id="imageField3" src="../../images/delete.png" title="REMOVER" width="30" height="30" />
    </form></th>
   </tr>
   <? }/*?>
   
   </tbody></table>
   
   
      
    
      </form>
    
    </fieldset>
   
	-->