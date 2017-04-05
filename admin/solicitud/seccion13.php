
  
    <fieldset>
    <legend>Sección 13</legend>
     <a name="seccion13">
      <form method="post" action="#seccion13">
     <table width="100%"><tbody><tr><th  bgcolor="#00CC33">
    <h3>Favor de seleccionar el esquema de certificación que usted esta solicitando:</h3>
    
   </th></tr></tbody></table>
   <br /><br />
     
 
     <table><tbody><tr>
     <th> 
     
    	<label for="num_total" >Estimado cliente favor de marcar las opciones para uso de sus datos</label>
    	</th>
        </tr>
        <tr>
     <th> 
     
    	<label for="num_total" >El cliente permite el ecceso de su nombre de la empresa y direccion al grupo de acceso de datos "Pública"</label>
    	</th>
        <th>
        </th><th>
       <input onchange="this.form.submit()"  <? if ($row_solicitud['respuesta4']=="Si"){?> checked="checked"<? }?> type="checkbox" value="Si" name="respuesta4">
       
        </th>
        <tr>
      <th>
  <label for="num_unid_prod2" >El cliente no esta de acuerdo para conceder acceso de su nombre de la empresa y dirección al grupo de acceso de datos "Pública"</label>
   </th>
    <th>&nbsp;
        </th>
   <th>
    <input onchange="this.form.submit()"  <? if ($row_solicitud['respuesta5']=="Si"){?> checked="checked"<? }?> type="checkbox" value="Si" name="respuesta5">
   </th>
   </tr>
   <tr>
   <th>
     <button type="submit" name="terminada"  value="1"class="btn btn-success">Solicitud terminada</button>
        </th>
         
       </tr>
   </tbody></table>
     <input type="hidden" name="idsolicitud" value="<? echo $row_solicitud['idsolicitud']; ?>" />
    

  <input type="hidden" name="seccion" value="13" />
      </form>
    
    </fieldset>
   
	