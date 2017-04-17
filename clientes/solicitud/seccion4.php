<fieldset>
	</br>
	
	<div class="row" id="seccion4"  style="background-color: #ecfbe7; border: solid 1px #AAAAAA; border-bottom-width:2px;">
		<form method="post" action="#seccion4">
		<div class=" form-group col-lg-12 co-sm-12 campos" style="background-color: #dbf573e6; border: solid 1px #AAAAAA; margin-right: 0px; margin-left: 0px;">
			<b> Datos de Facturación</b>
		</div>
		
		<div class=" form-group col-lg-12 col-sm-12 campos2" style="min-height:90px;">
			<div class="col-lg-6 col-sm-6 campos" style=" padding: 0px 0px; border:solid 1px #AAAAAA; min-height:90px;">
				<label for="rfc" class="form-label">Registro federal de contribuyentes (De preferencia anexar copia):</label>
				 <div class="div4">
					<input  placeholder="" class="form-control inputsf" style="padding-bottom:2px;" onchange="this.form.submit()" name="rfc" type="text"title="RFC " value="<? echo $row_operador['rfc'];?>" class="form-control" />
				</div>
			</div>
			<div class="col-lg-6 col-sm-6 campos2" style=" padding: 0px 0px; border:solid 1px #AAAAAA; min-height:90px;">
				<label for="fecha_inicio" class="form-label col-lg-12">Dirección en el R.F.C.  de la entidad legal (calle, número, CP, Ciudad, Municipio, Estado, Pais):</label>
				<div class="div4">
					<input placeholder=" " class="form-control inputsf" onchange="this.form.submit()" name="dir_rfc" type="text" 			title="Dirección " value="<? echo $row_operador['dir_rfc'];?>" class="form-control" />
				</div>
			</div>
		</div>
		
		
		<div class="form-group col-lg-12 col-sm-12 campos2" style="min-height:90px;">
			<div class="col-lg-4 col-sm-4" style=" padding: 0px 0px; border:solid 1px #AAAAAA; min-height:90px;">
				<label for="nombre_factura" class="form-label col-lg-12">Nombre de contacto para facturación:</label>
				<div class="div4">
					<input placeholder=" "  class="form-control inputsf" onchange="this.form.submit()" name="nombre_factura" type="text" 			title="Nombre " value="<? echo $row_operador['nombre_factura'];?>" class="form-control" />
				</div>
			</div>
			
			<div class=" col-lg-4 col-sm-4" style=" padding: 0px 0px; border:solid 1px #AAAAAA; min-height:90px;">
				<label for="email_factura" class="form-label col-lg-12">Correo electrónico para envio de factura:</label>
				<div class="div4">
					<input placeholder=""  class="form-control inputsf" onchange="this.form.submit()" name="email_factura" type="text" 			title="Email " value="<? echo $row_operador['email_factura'];?>" class="form-control" />			
				</div>
			</div>
			
			<div class="col-lg-4 col-sm-4" style=" padding: 0px 0px; border:solid 1px #AAAAAA; min-height:90px;">
				<label for="tel_factura" class="form-label col-lg-12">Número de teléfono del contacto para facturación:</label>
				<div class="div4">
					<input placeholder=""  class="form-control inputsf" onchange="this.form.submit()" name="tel_factura" type="text" 			title="Teléfono " value="<? echo $row_operador['tel_factura'];?>" class="form-control" />
				</div>
			</div>
		</div>		
		
		<div class="form-group col-lg-12 col-sm-12 campos2" style="min-height:90px;">
			<div class="col-lg-4 col-sm-4" style=" padding: 0px 0px; border:solid 1px #AAAAAA; min-height:90px;">
				<label for="forma_pago" class="form-label col-lg-12">Favor de indicar la forma de pago:</label>
				<div class="div4">
					<input placeholder=" " class="form-control inputsf" onchange="this.form.submit()" name="forma_pago" type="text" 			title="forma de pago " value="<? echo $row_operador['forma_pago'];?>" class="form-control" />
				</div>
			</div>
			
			<div class="col-lg-4 col-sm-4" style=" padding: 0px 0px; border:solid 1px #AAAAAA; min-height:90px;">
				<label for="banco" class="form-label col-lg-12">Banco desde donde se realizó el pago:</label>
			    <div class="div4">
					<input placeholder=" " class="form-control inputsf" onchange="this.form.submit()" name="banco" type="text" 			title="Banco " value="<? echo $row_operador['banco'];?>" class="form-control" />
				</div>
			</div>
			
			<div class="col-lg-4 col-sm-4" style=" padding: 0px 0px; border:solid 1px #AAAAAA; min-height:90px;">
			    <label for="digitos_tarjeta" class="form-label col-lg-12">Indique los ultimos 4 digitos del número de cuenta de la cual se realizará el pago:</label>
				<div class="div4">
					<input  class="form-control inputsf" onchange="this.form.submit()" name="digitos_tarjeta" type="text" 			title="4 digitos  de tarjeta " value="<? echo $row_operador['digitos_tarjeta'];?>" class="form-control" />
				</div>
			</div>
		</div>
		</form>
	</div>
</fieldset>
<!--
<fieldset>
    <legend>Sección 4</legend>
     <table width="100%"><tbody><tr><th  bgcolor="#00CC33">
    <h3>Datos de facuración:</h3>
    </th></tr></tbody></table>
   
    <a name="seccion3">
     <form method="post" action="#seccion4">
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
    
</fieldset>-->