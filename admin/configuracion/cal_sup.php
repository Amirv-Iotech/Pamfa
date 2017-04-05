
<p>&nbsp;</p>
<div class="col-lg-12">


<div align="center" class="col-lg-4 ">

  <table   class="table" cellpadding="0" cellspacing="0" border="1">
 

  <form action="" method="post"   >
 <? 
 
 if(isset($_POST['update']))
 {
	$query_u= "SELECT  * FROM mex_cal_sup where idmex_cal_sup='".$_POST['idmex']."'";
$u = mysql_query($query_u, $inforgan_pamfa) or die(mysql_error());
$row_u = mysql_fetch_assoc($u);  
	 
 }


?>
 
   <tr>
  <td colspan="2" align="center" bgcolor="#eee"><strong>
  INGRESE LA SIGUIENTE INFORMACIÓN
  </strong></td>
  </tr>
    <tr valign="baseline">
      <td align="right"  bgcolor="#eee">Descripción: </strong></td>
      <td><input class="form-control"  type="text" name="descripcion" value="<? if(isset($_POST['update']))
 { echo $row_u['descripcion'];}?>"  size="32" /></td>
    </tr>
     <tr valign="baseline">
      <td align="right"  bgcolor="#eee">Tipo: </strong></td>
      <td><select class="form-control"  type="text" name="tipo"  />
      <option value="1" <? if(isset($_POST['update'])){if($row_u['alcance']==1){?> selected="selected"<? }}?> )>Alcance</option>
      <option value="2" <? if(isset($_POST['update'])){if($row_u['pliego']==1){?> selected="selected"<? }}?>>Pliego</option>
      </td>
    </tr>
     
    
  <td>&nbsp;</td>
  <td><? if(isset($_POST['update'])){?>
  
  <input class="form-control" type="submit" value="Actualizar datos" />
    <input type="hidden" name="update2" value="2" />
   <input type="hidden" name="idmex" value="<?php echo $row_u['idmex_cal_sup'];?>" />


  <? }else{?>
  <input class="form-control" type="submit" value="Guardar datos" />
  <input type="hidden" name="guardar2" value="2" /><? }?></td>
</tr>

<input type="hidden" name="op" value="2" />

  
</form>


</table>

</div>
<div align="center" class="col-lg-8">
<table class="table">

   <tr>
  <td colspan="5" align="center" bgcolor="#eee"><strong>
  Regristros
  </strong></td>
  </tr>
      <td bgcolor="#eee">Descripción: </strong></td>

    
       <td   bgcolor="#eee">Alcance: </strong></td>
       <td   bgcolor="#eee">Pliego: </strong></td>
        <td   bgcolor="#eee">Editar: </strong></td>
         <td   bgcolor="#eee">Eliminar: </strong></td>
     
    </tr>
  <?
 $query_u= "SELECT  * FROM mex_cal_sup order by idmex_cal_sup asc ";
$u = mysql_query($query_u, $inforgan_pamfa) or die(mysql_error());
while($row_u = mysql_fetch_assoc($u)){ 
?>
<tr><td><? echo $row_u['descripcion'];?></td>
<td><? echo $row_u['alcance'];?></td>
<td><? echo $row_u['pliego'];?></td>

<td> <form   method="post" action="">
          <input type="hidden" name="idmex" value="<?php echo $row_u['idmex_cal_sup'];?>" />
          <input type="hidden" name="update" value="2" />
          <input type="hidden" name="op" value="2" />
          <input type="image" name="imageField2" id="imageField2" src="images/editar.png" width="20" height="20" title="Editar" />
        
</form></td>
<td>
 <form   method="post" action="">
          <input type="hidden" name="idmex" value="<?php echo $row_u['idmex_cal_sup'];?>" />
          <input type="hidden" name="eliminar2" value="2" />
           <input type="hidden" name="op" value="2" />
          <input type="image" name="imageField2" id="imageField2" src="images/delete.png" width="20" height="20" title="Eliminar" />
        
</form>
</td>



</tr>
<? }?>
  </table>

</div>




</div>