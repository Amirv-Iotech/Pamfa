
  
    <fieldset>
    <legend>Sección 4</legend>
     <table width="100%"><tbody><tr><th  bgcolor="#00CC33">
    <h3>Datos de facuración:</h3>
    </th></tr></tbody></table>
   
    <a name="seccion3">
     <form method="post" action="#seccion9">
    <div class="form-group col-lg-6 col-md-4">
    	<label for="rfc" class="form-label col-lg-4">Registro federal de contribuyentes:</label>
    	<div class="col-lg-8">
        
        <input  placeholder="escribe aquí" class="form-control" onchange="this.form.submit()" name="rfc" type="text" 			title="RFC " value="<? echo $row_operador['rfc'];?>" class="form-control" />
      
     
      
     </div></div>
     
     <div class="form-group col-lg-6 col-md-6">
    	<label for="fecha_inicio" class="form-label col-lg-4">Dirección en el R.F.C.  de la entidad legal:</label>
    	<div class="col-lg-8">
    <input placeholder="escribe aquí" class="form-control" onchange="this.form.submit()" name="dir_rfc" type="text" 			title="Dirección " value="<? echo $row_operador['dir_rfc'];?>" class="form-control" />
     </div></div>
      <div class="form-group col-lg-4 col-md-4">
    	<label for="nombre_factura" class="form-label col-lg-4">Nombre de contacto para facturación:</label>
    	<div class="col-lg-8">
    <input placeholder="escribe aquí"  class="form-control" onchange="this.form.submit()" name="nombre_factura" type="text" 			title="Nombre " value="<? echo $row_operador['nombre_factura'];?>" class="form-control" />
     </div></div>
      <div class="form-group col-lg-4 col-md-4">
    	<label for="email_factura" class="form-label col-lg-4">Correo electrónico para envio de factura:</label>
    	<div class="col-lg-8">
    <input placeholder="escribe aquí"  class="form-control" onchange="this.form.submit()" name="email_factura" type="text" 			title="Email " value="<? echo $row_operador['email_factura'];?>" class="form-control" />
     </div></div>
      <div class="form-group col-lg-4 col-md-4">
    	<label for="tel_factura" class="form-label col-lg-4">Número de teléfono del contacto para facturación:</label>
    	<div class="col-lg-8">
    <input placeholder="escribe aquí"  class="form-control" onchange="this.form.submit()" name="tel_factura" type="text" 			title="Teléfono " value="<? echo $row_operador['tel_factura'];?>" class="form-control" />
     </div></div>

      <div class="form-group col-lg-4 col-md-4">
    	<label for="forma_pago" class="form-label col-lg-4">Favor de indicar la forma de pago:</label>
    	<div class="col-lg-8">
    <input placeholder="escribe aquí" class="form-control" onchange="this.form.submit()" name="forma_pago" type="text" 			title="forma de pago " value="<? echo $row_operador['forma_pago'];?>" class="form-control" />
     </div></div>
      <div class="form-group col-lg-4 col-md-4">
    	<label for="banco" class="form-label col-lg-4">Banco desde donde se realizó el pago:</label>
    	<div class="col-lg-8">
    <input placeholder="escribe aquí" class="form-control" onchange="this.form.submit()" name="banco" type="text" 			title="Banco " value="<? echo $row_operador['banco'];?>" class="form-control" />
     </div></div>
      <div class="form-group col-lg-4 col-md-4">
    	<label for="digitos_tarjeta" class="form-label col-lg-4">Indique los ultimos 4 digitos del número de cuenta de la cual se realizará el pago:</label>
    	<div class="col-lg-8">
    <input  class="form-control" onchange="this.form.submit()" name="digitos_tarjeta" type="text" 			title="4 digitos  de tarjeta " value="<? echo $row_operador['digitos_tarjeta'];?>" class="form-control" />
     </div></div>    
    
   
     <input type="hidden" name="seccion9" value="1" />
 
  <input type="hidden" name="idsolicitud" value="<?php echo $_POST['idsolicitud'];?>" />
      </form>
    
    </fieldset>
   
	