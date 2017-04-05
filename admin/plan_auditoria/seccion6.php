
  
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
<?php 
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
	?>
   <tr>
   <th colspan="2" >
 <? echo $row_equipo['nombre'];?>
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
   <? }?>
   
   </tbody></table>
   
   
      
    <input type="hidden" name="idplan_auditoria" value="<? echo $_POST['idplan_auditoria']; ?>" />
       
 

  <input type="hidden" name="seccion" value="6" />
      </form>
    
    </fieldset>
   
	