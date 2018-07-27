<fieldset>
	</br>
	
	<div class="row" id="seccion4"  style="background-color: #ecfbe7; border: solid 1px #AAAAAA; border-bottom-width:2px;">
		
		<div class=" form-group col-lg-12 co-sm-12 campos" style="background-color: #dbf573e6; border: solid 1px #AAAAAA; margin-right: 0px; margin-left: 0px;">
			<b> Datos de Facturación</b>
		</div>
		
		<div class=" form-group col-lg-12 col-sm-12 campos2" style="min-height:90px;">
			<div class="col-lg-6 col-sm-6 campos" style=" padding: 0px 0px; border:solid 1px #AAAAAA; min-height:90px;">
				<label for="rfc" class="form-label">Registro federal de contribuyentes (De preferencia anexar copia):</label>
				 <div class="div4">
					<input  disabled="disabled" class="form-control inputsf" id="rfc" style="padding-bottom:2px;" name="rfc" type="text"title="RFC " value="<? echo $row_operador['rfc'];?>" class="form-control" />
				</div>
			</div>
			<div class="col-lg-6 col-sm-6 campos2" style=" padding: 0px 0px; border:solid 1px #AAAAAA; min-height:90px;">
				<label for="fecha_inicio" class="form-label col-lg-12">Dirección en el R.F.C.  de la entidad legal (calle, número, CP, Ciudad, Municipio, Estado, Pais):</label>
				<div class="div4">
					<input disabled="disabled" class="form-control inputsf" id="dir_rfc" name="dir_rfc" type="text" 			title="Dirección " value="<? echo $row_operador['dir_rfc'];?>" class="form-control" />
				</div>
			</div>
		</div>
		
		
		<div class="form-group col-lg-12 col-sm-12 campos2" style="min-height:90px;">
			<div class="col-lg-4 col-sm-4" style=" padding: 0px 0px; border:solid 1px #AAAAAA; min-height:90px;">
				<label for="nombre_factura" class="form-label col-lg-12">Nombre de contacto para facturación:</label>
				<div class="div4">
					<input disabled="disabled" class="form-control inputsf" id="nombre_factura"  name="nombre_factura" type="text" 			title="Nombre " value="<? echo $row_operador['nombre_factura'];?>" class="form-control" />
				</div>
			</div>
			
			<div class=" col-lg-4 col-sm-4" style=" padding: 0px 0px; border:solid 1px #AAAAAA; min-height:90px;">
				<label for="email_factura" class="form-label col-lg-12">Correo electrónico para envio de factura:</label>
				<div class="div4">
					<input disabled="disabled" class="form-control inputsf" id="email_factura"  name="email_factura" type="text" 			title="Email " value="<? echo $row_operador['email_factura'];?>" class="form-control" />			
				</div>
			</div>
			
			<div class="col-lg-4 col-sm-4" style=" padding: 0px 0px; border:solid 1px #AAAAAA; min-height:90px;">
				<label for="tel_factura" class="form-label col-lg-12">Número de teléfono del contacto para facturación:</label>
				<div class="div4">
					<input disabled="disabled" class="form-control inputsf" id="tel_factura"  name="tel_factura" type="text" 			title="Teléfono " value="<? echo $row_operador['tel_factura'];?>" class="form-control" />
				</div>
			</div>
		</div>		
		
		<div class="form-group col-lg-12 col-sm-12 campos2" style="min-height:90px;">
			<div class="col-lg-4 col-sm-4" style=" padding: 0px 0px; border:solid 1px #AAAAAA; min-height:90px;">
				<label for="forma_pago" class="form-label col-lg-12">Favor de indicar la forma de pago:</label>
				<div class="div4">
					<input disabled="disabled" class="form-control inputsf" id="forma_pago"  name="forma_pago" type="text" 			title="forma de pago " value="<? echo $row_operador['forma_pago'];?>" class="form-control" />
				</div>
			</div>
			
			<div class="col-lg-4 col-sm-4" style=" padding: 0px 0px; border:solid 1px #AAAAAA; min-height:90px;">
				<label for="banco" class="form-label col-lg-12">Banco desde donde se realizó el pago:</label>
			    <div class="div4">
					<input disabled="disabled" class="form-control inputsf" id="banco"  name="banco" type="text" 			title="Banco " value="<? echo $row_operador['banco'];?>" class="form-control" />
				</div>
			</div>
			
			<div class="col-lg-4 col-sm-4" style=" padding: 0px 0px; border:solid 1px #AAAAAA; min-height:90px;">
			    <label for="digitos_tarjeta" class="form-label col-lg-12">Indique los ultimos 4 digitos del número de cuenta de la cual se realizará el pago:</label>
				<div class="div4">
					<input  class="form-control inputsf" id="digitos_tarjeta" name="digitos_tarjeta" type="text" 			title="4 digitos  de tarjeta " value="<? echo $row_operador['digitos_tarjeta'];?>" class="form-control" />
				</div>
			</div>
		</div>
		</div>
</fieldset>
<br /><br />
<fieldset> 
    <div id="seccionx" class="row" style="border: solid 1px #AAAAAA; background-color: #ecfbe7">
       
    		<div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12 campos" style="border-right: solid 1px #AAAAAA; margin-right: 0px; margin-left: 0px;">
            <label for="nombre_legal" class="form-label col-lg-12 col-md-12 col-sm-12 col-xs-12">Favor de indicar el uso del CFDI:</label>
  			  <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12 campos">
          	<input disabled="disabled" class="inputsf form-control" name="nombre_legal" type="text" 	title="Nombre completo " value="<? echo $row_operador['nombre_legal'];?>"  />
      	   </div>
  			

      	 
        </div>
      </div> <!-- /ROW-->
    </fieldset>	