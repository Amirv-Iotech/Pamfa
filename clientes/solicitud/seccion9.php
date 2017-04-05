
  
    <fieldset>
    <legend>Sección 9</legend>
     <a name="seccion9">
       <form method="post" action="#seccion9">
     <table width="100%"><tbody><tr><th  bgcolor="#00CC33">
    <h3>Información de cultivos</h3>
    
   </th></tr></tbody></table>
 
    <table  align="left"  border="0" 
 
   cellpadding="5" cellspacing="0">
    <tr>
    <td colspan="3" >
    Producto y variedad:
      <input class="form-control" name="producto" placeholder="escribe aquí"type="text"  />
     
      </td>
      <td colspan="2" >
    N° de <br />productores:
      <input  class="form-control" name="num_productores" placeholder="escribe aquí" type="number"  />
      </td>
       <td colspan="2" >
    N° de fincas/PMUs:
      <input class="form-control" name="num_fincas" type="number"  placeholder="escribe aquí"/>
      </td>
       <td colspan="3" >
    Ubucación de cultivos:
      <input  class="form-control" name="ubicacion_unidad" placeholder="escribe aquí" type="text"  />
     
      </td>
       <td colspan="2" >
   Coodernadas de las unidades:
      <input  class="form-control" name="coordenadas" placeholder="escribe aquí" type="text"  />
     
      </td>
      <td colspan="2" >
   Periodo de cosecha:
      <input  class="form-control" name="periodo_cosecha" placeholder="escribe aquí" type="text"  />
     
      </td>
       <td colspan="2" >
   Superficie (Has):
      <input  class="form-control" name="superficie" placeholder="escribe aquí" type="number" step="any" />
     
      </td>
      
      </tr>
      <tr>
       
    <td colspan="2" >
      Aire libre-cubierto:
  <select class="form-control" name="libre_cubierto" >
  <option value="-">Seleciona</option>
  <option value="1">Aire libre</option>
  <option value="2">Cubierto</option>
</select>

           
      </td>
      <td colspan="2" >
      Cosecha/Recolección :
  <select class="form-control" name="cosecha_recoleccion" >
  <option value="-">Seleciona</option>
  <option value="1">Si</option>
  <option value="2">No</option>
</select>
           
      </td>
      <td colspan="2" >
      Empaque/Manipulación :
 <select class="form-control" name="empaque" >
  <option value="-">Seleciona</option>
  <option value="1">Si</option>
  <option value="2">No</option>
</select>
           
      </td>
      
    <td colspan="2" >
    Numero de trabajadores:
       <input class="form-control" name="num_trabajadores" type="number"  placeholder="escribe aquí"/>
    
      </td>
      
      
     
      
   
<td width="1" align="center">
<input type="hidden" name="idsolicitud" value="<? echo $row_solicitud['idsolicitud']; ?>" />
    
<input type="hidden" name="insertar" value="1" />
  <input type="hidden" name="seccion" value="9" />
<input type="submit" value="Agregar"  /></td>
</tr>
</table>
</form><?
$query_cultivos = sprintf("SELECT * FROM cultivos WHERE idsolicitud = %s", GetSQLValueString($row_solicitud["idsolicitud"], "int"));
$cultivos = mysql_query($query_cultivos,  $inforgan_pamfa) or die(mysql_error());
?>
<div class="col-lg-12" class="table">
<table border="1" cellpadding="5" cellspacing="0">

      <tr>
      <th>N°</th>
        <th >Producto y variedad:</th>
        <th>N° de productores:</th>
        <th>N° de fincas/PMUs:</th>
        <th>Ubiccación de cultivos</th>
        <th>Coordenadas de las unidades</th>
        <th>Superficie(Has)</th>
        <th>Periodo de cosecha</th>
        <th>Aire libre- cubierto</th>
        <th>Cosecha/Recolecció</th>
         <th>Empaque/Manipulación</th>
        <th>Numero de trabajadores</th>
       
        
       
      </tr>
  
<?php  $cont=0; $cont2=0; while ($row_cultivos = mysql_fetch_assoc($cultivos)) { ?>

<?php $cont2++; ?> <?php

$query_a = sprintf("SELECT * FROM cultivos WHERE idcultivos = '".$row_cultivos['idcultivos']."'");
$a= mysql_query($query_a, $inforgan_pamfa) or die(mysql_error());

while ($row_a = mysql_fetch_assoc($a)){
	?>
    <tr>
    <td>
	<? echo $cont2; ?>
          
     </td>
    <td width="10" >
	<input class="form-control" type="text" name="producto" value="<? echo $row_a['producto']; ?>" />
     </td>
     <td>
	<input class="form-control" type="text" name="num_productores" value="<? echo $row_a['num_productores']; ?>" />
     </td>
     <td>
	<input class="form-control" type="text" name="num_fincas" value="<? echo $row_a['num_fincas']; ?>" />
     </td>
      <td>
	<input class="form-control" type="text" name="ubicacion_unidad" value="<? echo $row_a['ubicacion_unidad']; ?>" />
     </td>
      <td>
	<input class="form-control" type="text" name="coordenadas" value="<? echo $row_a['coordenadas']; ?>" />
     </td>
     <td>
	<input class="form-control" type="number" step="any" name="superficie" value="<? echo $row_a['superficie']; ?>" />
    <? $cont=$cont+$row_a['superficie'];?>
     </td>
     <td>
	<input class="form-control" type="text" name="periodo_cosecha" value="<? echo $row_a['periodo_cosecha']; ?>" />
     </td>
     
     
    <td  >
      
 <select class="form-control" name="libre_cubierto" >
  <option  value="-">Seleciona</option>
  <option <? if($row_a['libre_cubierto']==1){?> selected="selected" <? }?> value="1">Si</option>
  <option <? if($row_a['libre_cubierto']==2){?> selected="selected" <? }?>value="2">No</option>
</select>
</td>
 <td  >
      
 <select class="form-control" name="cosecha_recoleccion" >
  <option  value="-">Seleciona</option>
  <option <? if($row_a['cosecha_recoleccion']==1){?> selected="selected" <? }?> value="1">Si</option>
  <option <? if($row_a['cosecha_recoleccion']==2){?> selected="selected" <? }?>value="2">No</option>
</select>
</td>
<td  >
      
 <select class="form-control" name="empaque" >
  <option  value="-">Seleciona</option>
  <option <? if($row_a['empaque']==1){?> selected="selected" <? }?> value="1">Si</option>
  <option <? if($row_a['empaque']==2){?> selected="selected" <? }?>value="2">No</option>
</select>
</td>
     <td>
	<input class="form-control" type="text" name="num_trabajadores" value="<? echo $row_a['num_trabajadores']; ?>" />
     </td>
     
    <td width="1" align="center"><form id="form3" name="form3" method="post" action="">
    <input type="hidden" name="eliminar" value="1" />
    <input type="hidden" name="idsolicitud" value="<? echo $row_solicitud['idsolicitud']; ?>" />
     <input type="hidden" name="idcultivos" value="<? echo $row_cultivos['idcultivos']; ?>" />
    

  <input type="hidden" name="seccion" value="9" />
    <input type="image" name="imageField3" id="imageField3" src="../../images/delete.png" title="REMOVER" width="30" height="30" />
    </form></td>
    <? }?> <?
}
	 ?>
  </tr>
  
 
  <tr>
  <td colspan="4">
   
 Total (Has.)
  </td>
  <td >
   <? echo $cont;?>
  </td>
  
  </tr>
</table>
      
    </div>
      </form>
    
    </fieldset>
   
	