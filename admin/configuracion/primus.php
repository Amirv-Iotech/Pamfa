<?
 if(isset($_POST['update']))
 {
	$query_u= "SELECT  * FROM primusgfs where idprimus=".$_POST['idprimus']."";
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
      <td align="right"  bgcolor="#eee">Descripción: </strong></td>
      <td><input class="form-control"  type="text" name="primus"   size="32"  value="<? if(isset($_POST['update']))
 { echo $row_u['primus'];}?>" /></td>
    </tr>
      
     
    <tr>
  <td>&nbsp;</td>
  <td><? if(isset($_POST['update'])){?>
  
  <input class="form-control" type="submit" value="Actualizar datos" />
    <input type="hidden" name="update4" value="4" />
   <input type="hidden" name="idprimus" value="<?php echo $row_u['idprimus'];?>" />


  <? }else{?>
  <input class="form-control" type="submit" value="Guardar datos" />
  <input type="hidden" name="guardar4" value="1" /><? }?></td>
</tr>

<input type="hidden" name="op" value="4" />

  
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
      <td bgcolor="#eee">Descripción</strong></td>

           <td   bgcolor="#eee">Editar: </strong></td>
         <td   bgcolor="#eee">Eliminar: </strong></td>
     
    </tr>
  <?
 $query_p= "SELECT  * FROM primusgfs order by idprimus asc ";
$p = mysql_query($query_p, $inforgan_pamfa) or die(mysql_error());
while($row_p = mysql_fetch_assoc($p)){ 
?>
<tr><td><? echo $row_p['primus'];?></td>
<td> <form   method="post" action="">
          <input type="hidden" name="idprimus" value="<?php echo $row_p['idprimus'];?>" />
          <input type="hidden" name="update" value="4" />
          <input type="hidden" name="op" value="4" />
          <input type="image" name="imageField2" id="imageField2" src="images/editar.png" width="20" height="20" title="Editar" />
        
</form></td>
<td>
 <form   method="post" action="">
          <input type="hidden" name="idprimus" value="<?php echo $row_p['idprimus'];?>" />
          <input type="hidden" name="eliminar4" value="1" />
           <input type="hidden" name="op" value="4" />
          <input type="image" name="imageField2" id="imageField2" src="images/delete.png" width="20" height="20" title="Eliminar" />
        
</form>
</td>
</tr>
<? }?>
  </table>
</div>




</div>