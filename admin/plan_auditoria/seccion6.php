<fieldset>
  <div clas="row" id="seccion6">
    <div class="col-lg-12 col-xs-12" style="background-color: #ecfbe7;">
    <form method="post" action=""><br />

        <div class="col-lg-12 col-xs-12">
                <h3>Equipo Auditor</h3>
        </div>
        <div class="col-lg-12 col-xs-12">
        Auditor
             <select name="auditor" class="form-control" onchange="this.form.submit()">
              <option value="">Selecciona un Auditor...</option>
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
            <select name="inspector" class="form-control" onchange="this.form.submit()">
              <option value="">Selecciona una opción...</option>
              <?php 
              $query_vista1 = "SELECT * FROM usuario where tipo=3 ORDER BY nombre ASC";
              $vista1 = mysql_query($query_vista1,  $inforgan_pamfa) or die(mysql_error());
              while($row_vista1 = mysql_fetch_assoc($vista1)){
              ?>
              <option  value="<?php echo $row_vista1['idusuario'];?>"><?php echo $row_vista1['nombre']." ".$row_vista1['apellidos'];?></option>
              <?php }?>
            </select>
              <input type="hidden" name="idplan_auditoria" value="<? echo $row_plan_auditoria['idplan_auditoria']; ?>" />
              <input type="hidden" name="seccion" value="6" />
        </div>
        <div class="col-xs-12 col-lg-12">
          <? $query_equipo = sprintf("SELECT * FROM plan_auditoria_equipo where idplan_auditoria='".$_POST['idplan_auditoria']."'");
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
                    $query_vista1 = "select nombre,apellidos from usuario where idusuario in (SELECT idauditor FROM plan_auditoria_equipo where idplan_auditoria='".$row_equipo['idplan_auditoria']."') ";
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
        </div>
      </form>      
    </div>
  </div>
</fieldset>
<!--
    <fieldset>
    <legend>Sección 6</legend>
     <a name="seccion6">
     <form method="post" action="#seccion6"><br />
     <table width="100%"><tbody><tr><th  bgcolor="#00CC33">
    <h3>Equipo Auditor</h3>
    
   </th></tr></tbody></table>
   <table width="100%"><tbody><tr>
   <th>Auditor</th>
   <th>
 <select name="auditor" class="form-control" onchange="this.form.submit()">
<option value="">Selecciona una opción...</option>
<?php /*
$query_vista1 = "SELECT * FROM usuario where tipo=2 ORDER BY nombre ASC";
$vista1 = mysql_query($query_vista1, $inforgan_pamfa) or die(mysql_error());

while($row_vista1 = mysql_fetch_assoc($vista1)){
?>
<option  value="<?php echo $row_vista1['idusuario'];?>"><?php echo $row_vista1['nombre']." ".$row_vista1['apellidos'];?></option>
<?php }?>
</select>
      
</th>
</tr>
<tr>
<th>Inspector</th>
   <th>
 <select name="inspector" class="form-control" onchange="this.form.submit()">
<option value="">Selecciona una opción...</option>
<?php 
$query_vista1 = "SELECT * FROM usuario where tipo=3 ORDER BY nombre ASC";
$vista1 = mysql_query($query_vista1,  $inforgan_pamfa) or die(mysql_error());
while($row_vista1 = mysql_fetch_assoc($vista1)){
?>
<option  value="<?php echo $row_vista1['idusuario'];?>"><?php echo $row_vista1['nombre']." ".$row_vista1['apellidos'];?></option>
<?php }?>
</select>
       <input type="hidden" name="idplan_auditoria" value="<? echo $row_plan_auditoria['idplan_auditoria']; ?>" />
  <input type="hidden" name="seccion" value="6" />
      </form>
    
</th></tr></tbody></table>
      
       <? $query_equipo = sprintf("SELECT * FROM plan_auditoria_equipo where idplan_auditoria='".$_POST['idplan_auditoria']."'");
$equipo = mysql_query($query_equipo, $inforgan_pamfa) or die(mysql_error());
?>
<br />

      <table width="100%" ><tbody>
      <tr>
      <th colspan="2">Nombre
      </th>
      <th colspan="2" >Puesto
      </th>
      <th colspan="2">Teléfono
      </th>
      <th colspan="2">Email
      </th>
      </tr>
      
      <?
      while($row_equipo= mysql_fetch_assoc($equipo))
{
	$query_vista1 = "select nombre,apellidos from usuario where idusuario=(SELECT idauditor FROM plan_auditoria_equipo where idplan_auditoria='".$row_equipo['idplan_auditoria']."') ";
$vista1 = mysql_query($query_vista1,  $inforgan_pamfa) or die(mysql_error());
$row_vista1 = mysql_fetch_assoc($vista1);
	?>
   <tr>
   <th colspan="2" >
 <? echo $row_vista1['nombre']."  ".$row_vista1['apellidos'];?>
   </th>
    <th colspan="2" >
 <? if($row_equipo['puesto']==2){?>Auditor <? } else if ($row_equipo['puesto']==3) {?>Inspector <? }?>
   </th>
    <th colspan="2" >
 <? echo $row_equipo['tel'];?>
   </th>
    <th colspan="2" >
 <? echo $row_equipo['email'];?>
   </th>
   </tr>
   <? } */?>
   
   </tbody></table>
   
   
      
   
    </fieldset>-->
   
	