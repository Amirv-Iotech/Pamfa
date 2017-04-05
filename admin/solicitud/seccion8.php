
  
    <fieldset>
    <legend>Sección 8</legend>
     <a name="seccion8">
     <form method="post" action="#seccion8">
     <table width="100%"><tbody><tr><th  bgcolor="#00CC33">
    <h3>Sistema de reducción de riesgos de contaminación</h3>
    
   </th></tr></tbody></table>
 
      
       <? $query_srrc = sprintf("SELECT * FROM srrc order by idsrrc asc");
$srrc = mysql_query($query_srrc, $inforgan_pamfa) or die(mysql_error());
?>
<br />

      <table width="100%" cellpadding="5" cellpadding="1"><tbody>
      
      <tr>
      <?
      while($row_srrc= mysql_fetch_assoc($srrc))
{
	?>
   
      <th >	
 

 <label><input onchange="this.form.submit()" <? if ($row_solicitud['idsrrc']==$row_srrc['idsrrc']){?> checked="checked"<? }?>  type="checkbox" value="<? echo $row_srrc['idsrrc'];?>" name="idsrrc"><? echo $row_srrc['seccion'];?></label>
</th>

    <?
		  }?>
          
          </tr>
          <tr>
          <th colspan="2">
          Número de unidades de producción-ranchos/huertos o invernaderos:
          </th>
          <th colspan="1">
          </th>
           <th colspan="2">
          Número de productores del área integral:
          </th>
          </tr>
          <tr>
          <th colspan="2">
         
           <input  class="form-control" onchange="this.form.submit()" placeholder="escribe aquí" name="srrc_preg1" type="text" 			title="Número " value="<? echo $row_solicitud['srrc_preg1'];?>" />
           
          </th>
          <th colspan="1">
          </th>
          <th colspan="2">
           <input  class="form-control" onchange="this.form.submit()" placeholder="escribe aquí" name="srrc_preg2" type="text" 			title="Número " value="<? echo $row_solicitud['srrc_preg2'];?>" />
          </th>
          
          </tr></tbody></table>
         
    
   
      
      <input type="hidden" name="idsolicitud" value="<? echo $row_solicitud['idsolicitud']; ?>" />
 

  <input type="hidden" name="seccion" value="8" />
      </form>
    
    </fieldset>
   
	