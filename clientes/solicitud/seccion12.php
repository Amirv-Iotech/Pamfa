
  
    <fieldset>
    <legend>Sección 12</legend>
     <a name="seccion12">
     <form method="post" action="#seccion12">
     <table width="100%"><tbody><tr><th  bgcolor="#00CC33">
    <h3>Por favor indicar el idioma en que se realizará la auditoria y el idioma en que se realizará el informe</h3>
    
   </th></tr></tbody></table>
 
      
      
<br />

      <table width="100%" cellpadding="5" cellpadding="1"><tbody>
      
     
          <tr>
          <th >
         Auditoria:
          </th>
          <th >
            <input  class="form-control" onchange="this.form.submit()" placeholder="escribe aquí" name="idioma_aud" type="text" 			title="Número " value="<? echo $row_solicitud['idioma_aud'];?>" />
         </th>
          </tr>
          <tr>
          <th >
         Informe:
          </th>
          <th >
            <input  class="form-control" onchange="this.form.submit()" placeholder="escribe aquí" name="idioma_inf" type="text" 			title="Número " value="<? echo $row_solicitud['idioma_inf'];?>" />
         </th>
          </tr>
          </tbody></table>
         
    
   
      
     <input type="hidden" name="idsolicitud" value="<? echo $row_solicitud['idsolicitud']; ?>" />
    

  <input type="hidden" name="seccion" value="12" />
      </form>
    
    </fieldset>
   
	