
  
    <fieldset>
    <legend></legend>
     <a name="seccion7">
     <form method="post" action="#seccion7"><br />
     <table width="100%"><tbody><tr><th  bgcolor="#00CC33">
    <h3>Hallazgos:</h3>
    
    
   </th></tr></tbody></table>
   <table width="100%"><tbody><tr>
   <th  colspan="1" >N° de incumplimiento</th>
   <th  colspan="2" >Requisito</th>
   <th  colspan="3" >Hallazgo</th>
   
   </tr>
   <tr>
   <th colspan="1" >
 <input placeholder="escribe aquí"  class="form-control"  name="num_incumplimiento"  			title="Incumplimiento " type="text" value=""  />
   </th>
   
   <th colspan="1" >
 <input placeholder="escribe aquí"  class="form-control"  name="requisito"  			title="Requisito " type="text" value=""  />
   </th>
   
   <th colspan="2" >
 <input placeholder="escribe aquí"  class="form-control"  name="hallazgo"  			title="hallazgo " type="text" value=""  />
   </th>
    
  
   <th colspan="3">
<input type="hidden" name="idinforme" value="<? echo $_POST['idinforme']; ?>" />
    
<input type="hidden" name="insertar" value="1" />
  <input type="hidden" name="seccion" value="7" />
<input type="submit" value="Agregar"  /></th>

  
</tr></tbody></table>
  
      </form>   
       <form method="post" action="#seccion7">  
       <? $query_informe = sprintf("SELECT * FROM informe_hallazgos where idinforme='".$_POST['idinforme']."'");
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
<? echo $row_informe['num_incumplimiento'];?>
   </th>
    <th colspan="1" >
<? echo $row_informe['requisito'];?>
   </th>
    <th colspan="3" >
 <? echo $row_informe['hallazgo'];?>
   </th>
    <th width="1" ><form id="form3" name="form3" method="post" action="">
    <input type="hidden" name="eliminar" value="1" />
    <input type="hidden" name="idplan_auditoria" value="<? echo $_POST['idplan_auditoria']; ?>" />
     <input type="hidden" name="idinforme" value="<? echo $row_informe['idinforme']; ?>" />
    

  <input type="hidden" name="seccion" value="7" />
    <input type="image" name="imageField3" id="imageField3" src="../../images/delete.png" title="REMOVER" width="30" height="30" />
    </form></th>
   </tr>
   <? }?>
   
   </tbody></table>
   
   
      
    
      </form>
    
    </fieldset>
   
	