
<p>&nbsp;</p>
<div class="col-lg-12">


<div align="center" class="col-lg-12 ">

  <table   class="table" cellpadding="0" cellspacing="0" border="1">
 

  <form action="" method="post"   >
 <? 
 
 if(isset($_POST['update']))
 {
	$query_u= "SELECT  * FROM operador where idoperador=".$_POST['idoperador']."";
$u = mysql_query($query_u, $inforgan_pamfa) or die(mysql_error());
$row_u = mysql_fetch_assoc($u);  
	 
 }


?>
 
   <tr>
  <td colspan="10" align="center" bgcolor="#eee"><strong>
  INGRESE LA SIGUIENTE INFORMACIÓN
  </strong></td>
  </tr>
    <tr valign="baseline">
      <td align="right"  bgcolor="#eee">Nombre de la entidad legal: </strong></td>
      <td><input class="form-control" required type="text" name="nombre_legal" value="<? if(isset($_POST['update']))
 { echo $row_u['nombre_legal'];}?>"  size="32" /></td>

<td align="right"  bgcolor="#eee">Nombre del representante legal: </strong></td>
      <td><input class="form-control" required type="text" name="nombre_representante" value="<? if(isset($_POST['update']))
 { echo $row_u['nombre_representante'];}?>"  size="32" /></td>   
      <td align="right"  bgcolor="#eee">Direccion: </strong></td>
      <td><input class="form-control" type="text" name="direccion" value="<?  if(isset($_POST['update']))
 {echo $row_u['direccion'];}?>"  size="32" /></td>
   
      <td align="right"  bgcolor="#eee">Colonia: </strong></td>
      <td><input class="form-control"  type="text" name="colonia" value="<? if(isset($_POST['update']))
 { echo $row_u['colonia'];}?>"  size="32" /></td>
   
      <td align="right"  bgcolor="#eee">Municipio: </strong></td>
      <td><input class="form-control"  type="text" name="municipio" value="<?  if(isset($_POST['update']))
 {echo $row_u['municipio'];}?>"  size="32" /></td>
   </tr>
     <tr valign="baseline">
      <td align="right"  bgcolor="#eee">Estado: </strong></td>
      <td><input class="form-control"  type="text" name="estado" value="<? if(isset($_POST['update']))
 { echo $row_u['estado'];}?>"  size="32" /></td>
   
      <td align="right"  bgcolor="#eee">Pais: </strong></td>
      <td><input class="form-control" type="text" name="pais" value="<?  if(isset($_POST['update']))
 {echo $row_u['pais'];}?>"  size="32" /></td>
    
      <td align="right"  bgcolor="#eee">Coordenadas: </strong></td>
      <td><input class="form-control"  type="text" name="coordenadas" value="<? if(isset($_POST['update']))
 { echo $row_u['coordenadas'];}?>"  size="32" /></td>
    
      <td align="right"  bgcolor="#eee">Email: </strong></td>
      <td><input class="form-control"  type="text" name="email" value="<?  if(isset($_POST['update']))
 {echo $row_u['email'];}?>"  size="32" /></td>
   
      <td align="right"  bgcolor="#eee">Teléfono: </strong></td>
      <td><input class="form-control"  type="text" name="telefono" value="<? if(isset($_POST['update']))
 { echo $row_u['telefono'];}?>"  size="32" /></td>
   
    </tr>
     <tr valign="baseline">
      <td align="right"  bgcolor="#eee">Fax: </strong></td>
      <td><input class="form-control"  type="text" name="fax" value="<?  if(isset($_POST['update']))
 {echo $row_u['fax'];}?>"  size="32" /></td>
   
      <td align="right"  bgcolor="#eee">R.F.C.: </strong></td>
      <td><input class="form-control"  type="text" name="rfc" value="<? if(isset($_POST['update']))
 { echo $row_u['rfc'];}?>"  size="32" /></td>
   
      <td align="right"  bgcolor="#eee">Direcion en el R.F.C.: </strong></td>
      <td><input class="form-control"  type="text" name="dir_rfc" value="<?  if(isset($_POST['update']))
 {echo $row_u['dir_rfc'];}?>"  size="32" /></td>
  
      <td align="right"  bgcolor="#eee">Nombre de contacto factura: </strong></td>
      <td><input class="form-control"  type="text" name="nombre_factura" value="<? if(isset($_POST['update']))
 { echo $row_u['nombre_factura'];}?>"  size="32" /></td>
   
      <td align="right"  bgcolor="#eee">Email de factura: </strong></td>
      <td><input class="form-control"  type="text" name="email_factura" value="<?  if(isset($_POST['update']))
 {echo $row_u['email_factura'];}?>"  size="32" /></td>
   </tr>
    <tr valign="baseline">
      <td align="right"  bgcolor="#eee">Teléfono de contacto factura: </strong></td>
      <td><input class="form-control"  type="text" name="tel_factura" value="<? if(isset($_POST['update']))
 { echo $row_u['tel_factura'];}?>"  size="32" /></td>
    
    
      <td align="right"  bgcolor="#eee">Forma de pago: </strong></td>
      <td><input class="form-control"  type="text" name="forma_pago" value="<?  if(isset($_POST['update']))
 {echo $row_u['forma_pago'];}?>"  size="32" /></td>
    
      <td align="right"  bgcolor="#eee">Banco: </strong></td>
      <td><input class="form-control"  type="text" name="banco" value="<? if(isset($_POST['update']))
 { echo $row_u['banco'];}?>"  size="32" /></td>
   
      <td align="right"  bgcolor="#eee">4 ultimos digitos de tarjeta: </strong></td>
      <td><input class="form-control"  type="text" name="digitos_tarjeta" value="<?  if(isset($_POST['update']))
 {echo $row_u['digitos_tarjeta'];}?>"  size="32" /></td>
   
    
    
  <td>&nbsp;</td>
  <td><? if(isset($_POST['update'])){?>
  
  <input class="form-control" type="submit" value="Actualizar datos" />
    <input type="hidden" name="update1" value="1" />
   <input type="hidden" name="idoperador" value="<?php echo $row_u['idoperador'];?>" />


  <? }else{?>
  <input  class="form-control" type="submit" value="Guardar datos" />
  <input type="hidden" name="guardar1" value="1" /><? }?></td>
</tr>

<input type="hidden" name="op" value="1" />

  
</form>


</table>

</div>
<div align="center" class="col-lg-12">
<table class="table">

   <tr>
  <td colspan="19" align="center" bgcolor="#eee"><strong>
  Operadores regristrados
  </strong></td>
  </tr>
      <td bgcolor="#eee">Nombre de la entidad legal: </strong></td>
      <td bgcolor="#eee">Nombre del representante legal: </strong></td>
       <td   bgcolor="#eee">Dirección: </strong></td>
       <td bgcolor="#eee">Colonia: </strong></td>
       <td   bgcolor="#eee">Estado: </strong></td>
       <td bgcolor="#eee">Pais: </strong></td>
       <td   bgcolor="#eee">Coordenadas: </strong></td>
       <td bgcolor="#eee">Email: </strong></td>
       <td   bgcolor="#eee">Teléfono: </strong></td>
       <td bgcolor="#eee">Fax: </strong></td>
       <td   bgcolor="#eee">R.F.C: </strong></td>
       <td bgcolor="#eee">Dirección R.F.C: </strong></td>
       <td   bgcolor="#eee">Nombre contacto: </strong></td>
       <td bgcolor="#eee">Email factura: </strong></td>
       <td   bgcolor="#eee">Teléfono factura: </strong></td>
        <td   bgcolor="#eee">Forma de pago: </strong></td>
       <td bgcolor="#eee">Banco: </strong></td>
       <td   bgcolor="#eee">4 digitos tarjeta: </strong></td>
       
        <td   bgcolor="#eee">Editar: </strong></td>
         <td   bgcolor="#eee">Eliminar: </strong></td>
     
    </tr>
  <?
 $query_u= "SELECT  * FROM operador order by nombre_legal asc ";
$u = mysql_query($query_u,$inforgan_pamfa) or die(mysql_error());
while($row_u = mysql_fetch_assoc($u)){ 
?>
       
<tr><td><? echo $row_u['nombre_legal'];?></td>
<td><? echo $row_u['nombre_representante'];?></td>
<td><? echo $row_u['direccion'];?></td>
<td><? echo $row_u['colonia'];?></td>
<td><? echo $row_u['estado'];?></td>
<td><? echo $row_u['pais'];?></td>
<td><? echo $row_u['coordenadas'];?></td>
<td><? echo $row_u['email'];?></td>
<td><? echo $row_u['telefono'];?></td>
<td><? echo $row_u['fax'];?></td>
<td><? echo $row_u['rfc'];?></td>
<td><? echo $row_u['dir_rfc'];?></td>
<td><? echo $row_u['nombre_factura'];?></td>
<td><? echo $row_u['email_factura'];?></td>
<td><? echo $row_u['tel_factura'];?></td>
<td><? echo $row_u['forma_pago'];?></td>
<td><? echo $row_u['banco'];?></td>
<td><? echo $row_u['digitos_tarjeta'];?></td>

<td> <form   method="post" action="">
          <input type="hidden" name="idoperador" value="<?php echo $row_u['idoperador'];?>" />
          <input type="hidden" name="update" value="1" />
          <input type="hidden" name="op" value="1" />
          <input type="image" name="imageField2" id="imageField2" src="images/editar.png" width="20" height="20" title="Editar" />
        
</form></td>
<td>
 <form   method="post" action="">
          <input type="hidden" name="idoperador" value="<?php echo $row_u['idoperador'];?>" />
          <input type="hidden" name="eliminar1" value="1" />
           <input type="hidden" name="op" value="1" />
          <input type="image" name="imageField2" id="imageField2" src="images/delete.png" width="20" height="20" title="Eliminar" />
        
</form>
</td>



</tr>
<? }?>
  </table>

</div>




</div>