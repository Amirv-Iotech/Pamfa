<?php require_once('../../Connections/inforgan_pamfa.php');
 include("cerebro.php");
 $sol="";
  if($_GET["idplan_auditoria"])
  {$sol=$_GET["idplan_auditoria"];
  
  }
  if($_POST["idplan_auditoria"])
  {$sol=$_POST["idplan_auditoria"];
 
    }
  if($row_solicitud['idplan_auditoria'])
  {
    $sol=$row_solicitud['idplan_auditoria'];
   
  }
 ?>
 <form method="post" action="#seccion6"><br />
      <div class="col-lg-12 col-xs-12" style="background-color: #dbf573e6; padding: 0px;">
          <h3>Agenda de trabajo general:</h3>
      </div>
      <div class="col-lg-2 col-xs-4">
      <label>fecha</label>
       <input placeholder="escribe aquí"  class="plan_input" id="fecha" name="fecha"        title="Fecha " type="date" value=""  />
      </div>
      <div class="col-lg-2 col-xs-4">
      <label>Horario</label>
       <input placeholder="escribe aquí"  class="plan_input" id="horario" name="horario"        title="Horario " type="text" value=""  />

      </div>
      <div class="col-lg-2 col-xs-4">
        <label data-toggle="tooltip" title="se deberá indicar detalladamente las actividades o documentos a revisar por áreas, rubros o secciones">Area / Actividad</label>

       <input placeholder="escribe aquí"  class="plan_input"  id="actividad" name="actividad"        title="Actividad " type="text" value=""  />

      </div>
      <div class="col-lg-2 col-xs-4">
      <label>Responsable por Parte del cliente</label>
       <input placeholder="escribe aquí"  class="plan_input"  id="responsable" name="responsable"        title="Responsable " type="text" value=""  />

      </div>
      <div class="col-lg-2 col-xs-4">
      <label>Auditor</label>
        <select name="auditor2" id="auditor2" class="plan_input" >
        <option value="">Selecciona una opción...</option>
        <?php 
        $query_vista1 = "select idusuario, nombre,apellidos from usuario where idusuario in(SELECT idauditor FROM plan_auditoria_equipo where idplan_auditoria='".$sol."') ";
        $vista1 = mysql_query($query_vista1,  $inforgan_pamfa) or die(mysql_error());
        while($row_vista1 = mysql_fetch_assoc($vista1)){
        ?>
        <option  value="<?php echo $row_vista1['idusuario'];?>"><?php echo $row_vista1['nombre']." ".$row_vista1['apellidos'];?></option>
        <?php }?>
        </select>
      </div>
      <div class="col-lg-2 col-xs-4">
        <input type="hidden" name="idplan_auditoria" value="<? echo $sol; ?>" />           <input type="hidden" name="idsolicitud" id="idsolicitud" value="<? echo $row_solicitud['idsolicitud']; ?>" />
        <input type="hidden" id="insertar" name="insertar" value="1" />
        <input type="hidden" name="seccion" value="7" />
        <input type="button" value="agregar" name="agregar" id="agregar"  />


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
            <? 
            $query_agenda = sprintf("SELECT * FROM agenda where idplan_auditoria='".$sol."'");
                $agenda = mysql_query($query_agenda, $inforgan_pamfa) or die(mysql_error());
                $total_agenda = mysql_num_rows($agenda);

              while($row_agenda= mysql_fetch_assoc($agenda))
                {
					         if($total_agenda==1)
                {
	            $query_vista2 = "select nombre,apellidos from usuario where idusuario = (SELECT idauditor FROM plan_auditoria_equipo where idauditor='".$row_agenda['auditor']."') ";
                $vista2 = mysql_query($query_vista2,  $inforgan_pamfa) or die(mysql_error());
                $row_vista2= mysql_fetch_assoc($vista2);
                ?> <div class="col-lg-12">
                      <label><? echo "Valores".$sol."";?></label>
                    </div>
	<?
}
					else{
            ?> <div class="col-lg-12">
                      <label><? echo "Valores".$sol."";?></label>
                    </div>
  <?
						$query_vista2 = "select nombre,apellidos from usuario where idusuario in (SELECT idauditor FROM plan_auditoria_equipo where idauditor='".$row_agenda['auditor']."')";
                $vista2 = mysql_query($query_vista2,  $inforgan_pamfa) or die(mysql_error());
                $row_vista2= mysql_fetch_assoc($vista2);
					}
               
            ?>
            <tr>
              <td><? echo $row_agenda['fecha'];?></td>
              <td><? echo $row_agenda['horario'];?></td>
              <td><? echo $row_agenda['actividad'];?></td>
              <td><? echo $row_agenda['responsable'];?></td>
              <td><? echo $row_vista2['nombre']." ". $row_vista2['apellidos'];?></td>
              <td><form id="form3" name="form3" method="post" action="#seccion7">
                  <input type="hidden" name="eliminar" value="1" />
                  <input type="hidden" name="idplan_auditoria" value="<? echo $row; ?>" />
                  <input type="hidden" name="idagenda" value="<? echo $row_agenda['idagenda']; ?>" />
                  <input type="hidden" name="seccion" value="7" />
                  <input type="hidden" name="auditor" id="auditor" value="<?php echo $row_vista1['idauditor']; ?>" />
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