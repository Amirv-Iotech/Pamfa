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
                    <th><label>Teléfono</label></th>
                    <th><label>Email</label></th>
                </thead>
                <tbody>
                 <?
                        while($row_equipo= mysql_fetch_assoc($equipo))
                  {
                    $query_vista1 = "select nombre,apellidos from usuario where idusuario='".$row_equipo['idauditor']."' ";
                  $vista1 = mysql_query($query_vista1,  $inforgan_pamfa) or die(mysql_error());
                  $row_vista1 = mysql_fetch_assoc($vista1);
                  ?>
                     <tr>
                     <td>
                      <? echo $row_vista1['nombre']."  ".$row_vista1['apellidos'];?>
                     </td>
                      <td>
                   <? if($row_equipo['puesto']==2){?>Auditor <? } else if ($row_equipo['puesto']==3) {?>Inspector <? }?>
                     </td>
                      <td>
                   <? echo $row_equipo['tel'];?>
                     </td>
                      <td>
                   <? echo $row_equipo['email'];?>
                     </td>
                     </tr>
                     <? }?>
                </tbody>
            </table>
            </div> 