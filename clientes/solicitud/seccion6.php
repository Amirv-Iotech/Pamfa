
  
    <fieldset>
    <legend>Sección 6</legend>
     <a name="seccion6">
     <form method="post" action="#seccion6">
     <table width="100%"><tbody><tr><th  bgcolor="#00CC33">
    <h3>PrimusGFS</h3>
    
   </th></tr></tbody></table>
 
      
       <? $query_primus = sprintf("SELECT * FROM primusgfs order by idprimus asc");
$primus = mysql_query($query_primus, $inforgan_pamfa) or die(mysql_error());
?>
<br />
      <table width="100%" cellpadding="5" cellpadding="1">
      <tr>
      <?
      while($row_primus= mysql_fetch_assoc($primus))
{
	?>
   
      <td colspan="2">	
  <label><input onchange="this.form.submit()" <? if ($row_solicitud['idprimus']==$row_primus['idprimus']){?> checked="checked"<? }?> type="checkbox" value="<? echo $row_primus['idprimus'];?>" name="primus"><? echo $row_primus['primus'];?></label>

</td>

    <?
		  }?>

    </tr>
    </table>
    
   
      
    <input type="hidden" name="idsolicitud" value="<? echo $row_solicitud['idsolicitud']; ?>" />
 

  <input type="hidden" name="seccion" value="6" />
      </form>
    
    </fieldset>
   
	