
  
    <fieldset>
    <legend>Sección 3</legend>
    <table width="100%"><tbody><tr><th  bgcolor="#00CC33">
    Si certificó anteriormente con otro organismo de certificacion indique:
    </th></tr></tbody></table>
    <a name="seccion3">
     <form method="post" action="#seccion3">
    <div class="form-group col-lg-6 col-md-4">
    	<label for="organismo" class="form-label col-lg-4">Nombre del organismo:</label>
    	<div class="col-lg-8">
        
        <input placeholder="escribe aquí" class="form-control" onchange="this.form.submit()" name="organismo" type="text" 			title="Nombre " value="<?php echo $row_cert_anterior['organismo'];?>"  />
      
     
      
     </div></div>
     
     <div class="form-group col-lg-3 col-md-3">
    	<label for="fecha_inicio" class="form-label col-lg-4">Certificado desde:</label>
    	<div class="col-lg-8">
    <input  class="form-control" onchange="this.form.submit()" name="fecha inicio" type="date" 			title="Fecha inicio " value="<?php echo $row_cert_anterior['fecha_inicio'];?>"  />
     </div></div>
      <div class="form-group col-lg-3 col-md-3">
    	<label for="fecha_fin" class="form-label col-lg-4">Hasta:</label>
    	<div class="col-lg-8">
    <input  class="form-control" onchange="this.form.submit()" name="fecha_fin" type="date" 			title="Fecha fin " value="<?php echo $row_cert_anterior['fecha_fin'];?>"  />
     </div></div>
     
   
    
 
 
<input type="hidden" name="idsolicitud" value="<?php echo $row_solicitud['idsolicitud']; ?>" />
 <input type="hidden" name="idcert_anterior" value="<?php echo $row_cert_anterior['idcert_anterior']; ?>" />

  <input type="hidden" name="seccion" value="3" />
      </form>
    
    </fieldset>
   
	