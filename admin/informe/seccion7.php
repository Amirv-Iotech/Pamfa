
  
    <fieldset>
    <legend></legend>
     <a name="seccion7">
     <form method="post" action="#seccion7"><br />
     <table width="100%"><tbody><tr><th  bgcolor="#00CC33">
    <h3>Hallazgos IFA:</h3>
    
    
   </th></tr></tbody></table>
   <table width="100%"><tbody><tr>
   <th  colspan="1" >N° de incumplimiento</th>
   <th  colspan="2" >Requisito</th>
   <th  colspan="3" >Hallazgo</th>
   
   </tr>
   <tr>
   <th colspan="1" >
 <input placeholder="escribe aquí"  class="form-control"  name="num_incumplimiento_ifa"  			title="Incumplimiento " type="text" value=""  />
   </th>
   
   <th colspan="1" >
 <input placeholder="escribe aquí"  class="form-control"  name="requisito_ifa"  			title="Requisito " type="text" value=""  />
   </th>
   
   <th colspan="2" >
 <input placeholder="escribe aquí"  class="form-control"  name="hallazgo_ifa"  			title="hallazgo " type="text" value=""  />
   </th>
    
  
   <th colspan="3">
<input type="hidden" name="idinforme" value="<? echo $_POST['idinforme']; ?>" />
    
<input type="hidden" name="insertar" value="1" />
  <input type="hidden" name="seccion" value="7" />
<input type="submit" value="Agregar"  /></th>

  
</tr></tbody></table>
  
      </form>   
       <form method="post" action="#seccion7">  
       <? $query_informe = sprintf("SELECT * FROM informe_hallazgos where idinforme='".$_POST['idinforme']."' and num_incumplimiento_ifa is not null order by idinforme_hallazgo");
$informe = mysql_query($query_informe, $inforgan_pamfa) or die(mysql_error());
?>
<br />

      <table width="100%" ><tbody>
      <tr>
       <th   >N° de incumplimiento</th>
   <th   >Requisito</th>
   <th   >Hallazgo</th>
      </tr>
      
      <?
      while($row_informe= mysql_fetch_assoc($informe))
{
	?>
   <tr>
   <th colspan="1" >
<? echo $row_informe['num_incumplimiento_ifa'];?>
   </th>
    <th colspan="1" >
<? echo $row_informe['requisito_ifa'];?>
   </th>
    <th colspan="3" >
 <? echo $row_informe['hallazgo_ifa'];?>
   </th>
    <th width="1" ><form id="form3" name="form3" method="post" action="">
    <input type="hidden" name="eliminar" value="1" />
   
     <input type="hidden" name="idinforme_hallazgo" value="<? echo $row_informe['idinforme_hallazgo']; ?>" /> 
     <input type="hidden" name="idinforme" value="<? echo $row_informe['idinforme']; ?>" />
    

  <input type="hidden" name="seccion" value="7" />
    <input type="image" name="imageField3" id="imageField3" src="../../images/delete.png" title="REMOVER" width="30" height="30" />
    </form></th>
   </tr>
   <? }?>
   
   </tbody></table>
   
   
      
    
      </form>
    <form method="post" action="#seccion7"><br />
     <table width="100%"><tbody><tr><th  bgcolor="#00CC33">
    <h3>Dictamen:</h3>
    
    
   </th></tr></tbody></table>
   <table width="100%"><tbody><tr>
   <th  colspan="1" >Observación</th>
   <th  colspan="1" >dictamen</th>
   
   
   </tr>
   <tr>
   <th colspan="1" >
 <input placeholder="escribe aquí"  class="form-control"  name="observacion_ifa"  			title="observacion " type="text" value="<? echo $row_inf['observacion_ifa']; ?>"  />
   </th>
   
   <th colspan="1" >
 <select name="dictamen_ifa" class="form-control" >
<option value="">Selecciona una opción...</option>
<option <? if($row_inf['dictamen_ifa']=="rechazo"){?> selected="selected" <? }?> value="rechazo">Rechazo</option>
<option <? if($row_inf['dictamen_ifa']=="aprobado"){?> selected="selected" <? }?>  value="aprobado">Aprobado</option>
</select>

   </th>
   
  
    
  
   <th colspan="3">
<input type="hidden" name="idinforme" value="<? echo $_POST['idinforme']; ?>" />
    
<input type="hidden" name="insertar2" value="1" />
 
<input type="submit" value="Agregar"  /></th>

  
</tr></tbody></table>
  
      </form>   
    
     <form method="post" action="#seccion7"><br />
     <table width="100%"><tbody><tr><th  bgcolor="#00CC33">
    <h3>Hallazgos CoC:</h3>
    
    
   </th></tr></tbody></table>
   <table width="100%"><tbody><tr>
   <th  colspan="1" >N° de incumplimiento</th>
   <th  colspan="2" >Requisito</th>
   <th  colspan="3" >Hallazgo</th>
   
   </tr>
   <tr>
   <th colspan="1" >
 <input placeholder="escribe aquí"  class="form-control"  name="num_incumplimiento_coc"  			title="Incumplimiento " type="text" value=""  />
   </th>
   
   <th colspan="1" >
 <input placeholder="escribe aquí"  class="form-control"  name="requisito_coc"  			title="Requisito " type="text" value=""  />
   </th>
   
   <th colspan="2" >
 <input placeholder="escribe aquí"  class="form-control"  name="hallazgo_coc"  			title="hallazgo " type="text" value=""  />
   </th>
    
  
   <th colspan="3">
<input type="hidden" name="idinforme" value="<? echo $_POST['idinforme']; ?>" />
    
<input type="hidden" name="insertar" value="1" />
  <input type="hidden" name="seccion" value="7" />
<input type="submit" value="Agregar"  /></th>

  
</tr></tbody></table>
  
      </form>   
       <form method="post" action="#seccion7">  
       <? $query_informe = sprintf("SELECT * FROM informe_hallazgos where idinforme='".$_POST['idinforme']."' and num_incumplimiento_coc is not null order by idinforme_hallazgo ");
$informe = mysql_query($query_informe, $inforgan_pamfa) or die(mysql_error());
?>
<br />

      <table width="100%" ><tbody>
      <tr>
       <th   >N° de incumplimiento</th>
   <th   >Requisito</th>
   <th   >Hallazgo</th>
      </tr>
      
      <?
      while($row_informe= mysql_fetch_assoc($informe))
{
	?>
   <tr>
   <th colspan="1" >
<? echo $row_informe['num_incumplimiento_coc'];?>
   </th>
    <th colspan="1" >
<? echo $row_informe['requisito_coc'];?>
   </th>
    <th colspan="3" >
 <? echo $row_informe['hallazgo_coc'];?>
   </th>
    <th width="1" ><form id="form3" name="form3" method="post" action="">
    <input type="hidden" name="eliminar" value="1" />
   
     <input type="hidden" name="idinforme_hallazgo" value="<? echo $row_informe['idinforme_hallazgo']; ?>" /> 
     <input type="hidden" name="idinforme" value="<? echo $row_informe['idinforme']; ?>" />
    

  <input type="hidden" name="seccion" value="7" />
    <input type="image" name="imageField3" id="imageField3" src="../../images/delete.png" title="REMOVER" width="30" height="30" />
    </form></th>
   </tr>
   <? }?>
   
   </tbody></table>
   
   
      
    
      </form>
    <form method="post" action="#seccion7"><br />
     <table width="100%"><tbody><tr><th  bgcolor="#00CC33">
    <h3>Dictamen:</h3>
    
    
   </th></tr></tbody></table>
   <table width="100%"><tbody><tr>
   <th  colspan="1" >Observación</th>
   <th  colspan="1" >dictamen</th>
   
   
   </tr>
   <tr>
   <th colspan="1" >
 <input placeholder="escribe aquí"  class="form-control"  name="observacion_coc"  			title="observacion " type="text" value="<? echo $row_inf['observacion_coc']; ?>"  />
   </th>
   
   <th colspan="1" >
 <select name="dictamen_coc" class="form-control" >
<option value="">Selecciona una opción...</option>
<option <? if($row_inf['dictamen_coc']=="rechazo"){?> selected="selected" <? }?> value="rechazo">Rechazo</option>
<option <? if($row_inf['dictamen_coc']=="aprobado"){?> selected="selected" <? }?>  value="aprobado">Aprobado</option>
</select>

   </th>
   
  
    
  
   <th colspan="3">
<input type="hidden" name="idinforme" value="<? echo $_POST['idinforme']; ?>" />
    
<input type="hidden" name="insertar3" value="1" />
 
<input type="submit" value="Agregar"  /></th>

  
</tr></tbody></table>
  
      </form>   
    
    <form method="post" action="#seccion7"><br />
     <table width="100%"><tbody><tr><th  bgcolor="#00CC33">
    <h3>Hallazgos México Calidad Suprema:</h3>
    
    
   </th></tr></tbody></table>
   <table width="100%"><tbody><tr>
   <th  colspan="1" >N° de incumplimiento</th>
   <th  colspan="2" >Requisito</th>
   <th  colspan="3" >Hallazgo</th>
   
   </tr>
   <tr>
   <th colspan="1" >
 <input placeholder="escribe aquí"  class="form-control"  name="num_incumplimiento_mexcalsup"  			title="Incumplimiento " type="text" value=""  />
   </th>
   
   <th colspan="1" >
 <input placeholder="escribe aquí"  class="form-control"  name="requisito_mexcalsup"  			title="Requisito " type="text" value=""  />
   </th>
   
   <th colspan="2" >
 <input placeholder="escribe aquí"  class="form-control"  name="hallazgo_mexcalsup"  			title="hallazgo " type="text" value=""  />
   </th>
    
  
   <th colspan="3">
<input type="hidden" name="idinforme" value="<? echo $_POST['idinforme']; ?>" />
    
<input type="hidden" name="insertar" value="1" />
  <input type="hidden" name="seccion" value="7" />
<input type="submit" value="Agregar"  /></th>

  
</tr></tbody></table>
  
      </form>   
       <form method="post" action="#seccion7">  
       <? $query_informe = sprintf("SELECT * FROM informe_hallazgos where idinforme='".$_POST['idinforme']."' and num_incumplimiento_mexcalsup is not null order by idinforme_hallazgo ");
$informe = mysql_query($query_informe, $inforgan_pamfa) or die(mysql_error());
?>
<br />

      <table width="100%" ><tbody>
      <tr>
       <th   >N° de incumplimiento</th>
   <th   >Requisito</th>
   <th   >Hallazgo</th>
      </tr>
      
      <?
      while($row_informe= mysql_fetch_assoc($informe))
{
	?>
   <tr>
   <th colspan="1" >
<? echo $row_informe['num_incumplimiento_mexcalsup'];?>
   </th>
    <th colspan="1" >
<? echo $row_informe['requisito_mexcalsup'];?>
   </th>
    <th colspan="3" >
 <? echo $row_informe['hallazgo_mexcalsup'];?>
   </th>
    <th width="1" ><form id="form3" name="form3" method="post" action="">
    <input type="hidden" name="eliminar" value="1" />
   
     <input type="hidden" name="idinforme_hallazgo" value="<? echo $row_informe['idinforme_hallazgo']; ?>" /> 
     <input type="hidden" name="idinforme" value="<? echo $row_informe['idinforme']; ?>" />
    

  <input type="hidden" name="seccion" value="7" />
    <input type="image" name="imageField3" id="imageField3" src="../../images/delete.png" title="REMOVER" width="30" height="30" />
    </form></th>
   </tr>
   <? }?>
   
   </tbody></table>
   
   
      
    
      </form>
    <form method="post" action="#seccion7"><br />
     <table width="100%"><tbody><tr><th  bgcolor="#00CC33">
    <h3>Dictamen:</h3>
    
    
   </th></tr></tbody></table>
   <table width="100%"><tbody><tr>
   <th  colspan="1" >Observación</th>
   <th  colspan="1" >dictamen</th>
   
   
   </tr>
   <tr>
   <th colspan="1" >
 <input placeholder="escribe aquí"  class="form-control"  name="observacion_mexcalsup"  			title="observacion " type="text" value="<? echo $row_inf['observacion_mexcalsup']; ?>"  />
   </th>
   
   <th colspan="1" >
 <select name="dictamen_mexcalsup" class="form-control" >
<option value="">Selecciona una opción...</option>
<option <? if($row_inf['dictamen_mexcalsup']=="rechazo"){?> selected="selected" <? }?> value="rechazo">Rechazo</option>
<option <? if($row_inf['dictamen_mexcalsup']=="aprobado"){?> selected="selected" <? }?>  value="aprobado">Aprobado</option>
</select>

   </th>
   
  
    
  
   <th colspan="3">
<input type="hidden" name="idinforme" value="<? echo $_POST['idinforme']; ?>" />
    
<input type="hidden" name="insertar4" value="1" />
 
<input type="submit" value="Agregar"  /></th>

  
</tr></tbody></table>
  
      </form>   
    
        
    </fieldset>
   
	