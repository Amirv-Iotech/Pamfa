<?
 if(isset($_POST['update']))
 {
	$query_u= "SELECT  * FROM esquemas where idesquema=".$_POST['idesquema']."";
$u = mysql_query($query_u, $inforgan_pamfa) or die(mysql_error());
$row_u = mysql_fetch_assoc($u);  
	 
 }
?>
<div class="col-lg-12">


<div align="center" class="col-lg-4 ">

  <table   class="table" cellpadding="0" cellspacing="0" border="1">
 

  <form action="" method="post" name="form2" id="form2"  >
 <? 
 
 


?>
 
   <tr>
  <td colspan="2" align="center" bgcolor="#eee"><strong>
  INGRESE LA SIGUIENTE INFORMACIÓN
  </strong></td>
  </tr>
    <tr valign="baseline">
      <td align="right"  bgcolor="#eee">Esquema: </strong></td>
      <td><input class="form-control"  type="text" name="esquema"   size="32"  value="<? if(isset($_POST['update']))
 { echo $row_u['esquema'];}?>" /></td>
    </tr>
      <tr valign="baseline">
      <td align="right"  bgcolor="#eee">Tipo: </strong></td>
      <td><select class="form-control"  type="text" name="tipo"  />
      <option value="1" <? if(isset($_POST['update'])){if($row_u['tipo']==1){?> selected="selected"<? }}?> )>GLOBALG.A.P, IFA V5.0</option>
      <option value="2" <? if(isset($_POST['update'])){if($row_u['tipo']==2){?> selected="selected"<? }}?>>GLOBALG A.P CADENA DE CUSTODIA (CoC)</option>
      </td>
    </tr>
    <tr valign="baseline">
      <td align="right"  bgcolor="#eee">Opción: </strong></td>
      <td><select class="form-control"  type="text" name="opcion"  />
      <option value="1" <? if(isset($_POST['update'])){if($row_u['opcion']==1){?> selected="selected"<? }}?> )>1</option>
      <option value="2" <? if(isset($_POST['update'])){if($row_u['opcion']==2){?> selected="selected"<? }}?>>2</option>
      </td>
    </tr>
     
    <tr>
  <td>&nbsp;</td>
  <td><? if(isset($_POST['update'])){?>
  
  <input class="form-control" type="submit" value="Actualizar datos" />
    <input type="hidden" name="update3" value="3" />
   <input type="hidden" name="idesquema" value="<?php echo $row_u['idesquema'];?>" />


  <? }else{?>
  <input class="form-control" type="submit" value="Guardar datos" />
  <input type="hidden" name="guardar3" value="1" /><? }?></td>
</tr>

<input type="hidden" name="op" value="3" />

  
</form>


</table>

</div>
<div align="center" class="col-lg-8">
<table class="table">

   <tr>
  <td colspan="5" align="center" bgcolor="#eee"><strong>
  Esquemas registrados
  </strong></td>
  </tr>
      <td bgcolor="#eee">Esquema</strong></td>

      <td   bgcolor="#eee">GLOBALG.A.P, IFA V5.0: </strong></td>
      <td   bgcolor="#eee">GLOBALG A.P CADENA DE CUSTODIA (CoC): </strong></td>
       <td   bgcolor="#eee">Editar: </strong></td>
         <td   bgcolor="#eee">Eliminar: </strong></td>
     
    </tr>
  <?
 $query_p= "SELECT  * FROM esquemas order by idesquema asc ";
$p = mysql_query($query_p, $inforgan_pamfa) or die(mysql_error());
while($row_p = mysql_fetch_assoc($p)){ 
?>
<tr><td><? echo $row_p['esquema'];?></td>
<td><? if( $row_p['tipo']==1){ echo "1";}?></td>
<td><?  if($row_p['tipo']==2){ echo "1";}?></td>
<td> <form   method="post" action="">
          <input type="hidden" name="idesquema" value="<?php echo $row_p['idesquema'];?>" />
          <input type="hidden" name="update" value="3" />
          <input type="hidden" name="op" value="3" />
          <input type="image" name="imageField2" id="imageField2" src="images/editar.png" width="20" height="20" title="Editar" />
        
</form></td>
<td>
 <form   method="post" action="">
          <input type="hidden" name="idesquema" value="<?php echo $row_p['idesquema'];?>" />
          <input type="hidden" name="eliminar3" value="1" />
           <input type="hidden" name="op" value="3" />
          <input type="image" name="imageField2" id="imageField2" src="images/delete.png" width="20" height="20" title="Eliminar" />
        
</form>
</td>
</tr>
<? }?>
  </table>
</div>




</div>