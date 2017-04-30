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
        $query_vista1 = "select nombre,apellidos from usuario where idusuario in(SELECT idauditor FROM plan_auditoria_equipo where idplan_auditoria='".$_POST['idplan_auditoria']."') ";
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
				$row_agenda= mysql_fetch_assoc($solicitud );
$total_agenda = mysql_num_rows($agenda);



              while($row_agenda= mysql_fetch_assoc($agenda))
                {
					if($total_solicitud==1)
{
	 $query_vista1 = "select nombre,apellidos from usuario where idusuario=(SELECT idauditor FROM plan_auditoria_equipo where idplan_auditoria='".$row_agenda['idplan_auditoria']."') ";
                $vista1 = mysql_query($query_vista1,  $inforgan_pamfa) or die(mysql_error());
                $row_vista1= mysql_fetch_assoc($vista1);
	
}
					else{
						 $query_vista1 = "select nombre,apellidos from usuario where idusuario in(SELECT idauditor FROM plan_auditoria_equipo where idplan_auditoria='".$row_agenda['idplan_auditoria']."') ";
                $vista1 = mysql_query($query_vista1,  $inforgan_pamfa) or die(mysql_error());
                $row_vista1= mysql_fetch_assoc($vista1);
					}
               
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
