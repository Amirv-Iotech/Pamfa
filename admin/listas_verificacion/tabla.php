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
<? $query_equipo = sprintf("SELECT * FROM plan_auditoria_equipo where idplan_auditoria=%s ", GetSQLValueString( $sol, "int"));
            $equipo = mysql_query($query_equipo, $inforgan_pamfa) or die(mysql_error());
            ?>
            <div class="table-responsive">
              <table class="table table-hover">                
                <thead>
                    <th><label>Nombre</label></th>
                    <th><label>Puesto</label></th>
                    <th><label>Rol</label></th>
                   
                </thead>
                <tbody>
                 <?
                        while($row_equipo= mysql_fetch_assoc($equipo))
                  {
					  ?> <form method="post"  ><?
                    $query_vista1 = "select idusuario, nombre,apellidos from usuario where idusuario='".$row_equipo['idauditor']."' ";
                  $vista1 = mysql_query($query_vista1,  $inforgan_pamfa) or die(mysql_error());
                  $row_vista1 = mysql_fetch_assoc($vista1);
                  ?>
                     <tr>
                     <td>
                      <input type="hidden" id="<? echo "idauditor".$row_equipo['idplan_auditoria_equipo'].""?>" name="<? echo "idauditor".$row_equipo['idplan_auditoria_equipo'].""?>"  value="<? echo $row_equipo['idauditor'];?>"/>
					   <input type="hidden" id="idplan_auditoria" name="idplan_auditoria"  value="<? echo $sol;?>"/>
                         <input type="hidden" id="seccion" name="seccion"  value="6"/>
						 <?
					  echo $row_vista1['nombre']."  ".$row_vista1['apellidos'];?>
                     </td>
                      <td>
                   <? if($row_equipo['puesto']==2){?>Auditor <? } else if ($row_equipo['puesto']==3) {?>Inspector <? }?>
                     </td>
                      <td>
                      <select name="<? echo "rol".$row_equipo['idplan_auditoria_equipo'].""?>" id="<? echo "rol".$row_equipo['idplan_auditoria_equipo'].""?>" class="plan_input" onchange="<? echo "guardarTabla(".$row_equipo['idplan_auditoria_equipo'].")"?>" >
              <option selected="true" disabled="disabled">Selecciona un Auditor...</option>
              <?php 
              $query_vista1 = "SELECT * FROM rol_auditor ";
              $vista1 = mysql_query($query_vista1, $inforgan_pamfa) or die(mysql_error());

              while($row_vista1 = mysql_fetch_assoc($vista1)){
              ?>
              <option <? if($row_equipo['rol']==$row_vista1['idrol']){?> selected="selected"<? }?> value="<?php echo $row_vista1['idrol'];?>"><?php echo $row_vista1['rol'];?></option>
              <?php }?>
              </select>
                  
                     </td>
                    
                     </tr>
                </form>     <? }?>
                </tbody>
            </table>
            </div> 