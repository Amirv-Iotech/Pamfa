
  
    <fieldset>
    <legend>Sección 11</legend>
     <a name="seccion11">
     <form method="post" action="#seccion11">
     <table width="100%"><tbody><tr><th  bgcolor="#00CC33">
    <h3>Información sobre comercialización de producto, indicar paises de destino</h3>
    
   </th></tr></tbody></table>
 
      
      
<br />

      <table width="100%" cellpadding="5" cellpadding="1"><tbody>
      
     
          <tr>
          <th >
         Información:
          </th>
          <th >
            <input  class="form-control" onchange="this.form.submit()" placeholder="escribe aquí" name="inf_comercializacion" type="text" 			title="Número " value="<? echo $row_solicitud['inf_comercializacion'];?>" />
         
          </tr>
          </tbody></table>
         
    
   
      
      <input type="hidden" name="idsolicitud" value="<? echo $row_solicitud['idsolicitud']; ?>" />
    

  <input type="hidden" name="seccion" value="11" />
      </form>
    
    </fieldset>
   
	