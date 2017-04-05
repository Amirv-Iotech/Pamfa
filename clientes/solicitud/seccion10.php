
  
    <fieldset>
    <legend>Sección 10</legend>
     <a name="seccion10">
     <form method="post" action="#seccion10">
     <table width="100%"><tbody><tr><th  bgcolor="#00CC33">
    <h3>Información del centro de empaque/manipulación/procesadora</h3>
    
   </th></tr></tbody></table>
 
      
      
<br />

      <table width="100%" cellpadding="5" cellpadding="1"><tbody>
      
     
          <tr>
          <th >
          Empresa:
          </th>
          <th >
            <input  class="form-control" onchange="this.form.submit()" placeholder="escribe aquí" name="empresa" type="text" 			title="Número " value="<? echo $row_procesadora['empresa'];?>" />
          </th>
         
           <th >
          R.F.C
          </th>
           <th >
            <input  class="form-control" onchange="this.form.submit()" placeholder="escribe aquí" name="rfc" type="text" 			title="Número " value="<? echo $row_procesadora['rfc'];?>" />
          </th>
          </tr>
          <tr>
           <th >
          Dirección (Calle,N°9)
          </th>
           <th >
            <input  class="form-control" onchange="this.form.submit()" placeholder="escribe aquí" name="direccion" type="text" 			title="Número " value="<? echo $row_procesadora['direccion'];?>" />
          </th>
           <th >
          Colonia,Municipio, Estafo, Pais
          </th>
           <th colspan="2">
            <input  class="form-control" onchange="this.form.submit()" placeholder="escribe aquí" name="direccion2" type="text" 			title="Número " value="<? echo $row_procesadora['direccion2'];?>" />
          </th>
          </tr>
          <tr>
           <th >
          Código postal
          </th>
           <th >
            <input  class="form-control" onchange="this.form.submit()" placeholder="escribe aquí" name="cp" type="text" 			title="Número " value="<? echo $row_procesadora['cp'];?>" />
          </th>
           <th >
          Teléfono/fax
          </th>
           <th >
            <input  class="form-control" onchange="this.form.submit()" placeholder="escribe aquí" name="tel" type="text" 			title="Número " value="<? echo $row_procesadora['tel'];?>" />
          </th>
          </tr>
          </tbody></table>
         
    
   
     <input type="hidden" name="idsolicitud" value="<? echo $row_solicitud['idsolicitud']; ?>" />
      <input type="hidden" name="idprocesadora" value="<? echo $row_procesadora['idprocesadora']; ?>" />


  <input type="hidden" name="seccion" value="10" />
      </form>
    
    </fieldset>
   
	