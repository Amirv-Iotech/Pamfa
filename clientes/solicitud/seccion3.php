<fieldset>
	<div id="seccion3" class="row" style="background-color: #ecfbe7; border: solid 1px #AAAAAA; border-bottom-width:2px;">
		<div class="col-lg-12 col-sm-12 campos2"  style="padding-right: 0px; padding-left: 0px;">			
			<div class="col-lg-12 col-sm-12 campos" style="background-color: #dbf573e6; border: solid 1px #AAAAAA; margin-right: 0px; margin-left: 0px;">
				<b>Si certificó anteriormente con otro organismo de certificacion indique:</b>
			</div>
		<form method="post" action="#seccion3">
			<div class=" col-lg-7 col-sm-7" style="padding: 0px 0px; border:solid 1px #AAAAAA; border-bottom-style:none;">
				<div class="col-lg-12 col-sm-12">
					<label for="organismo" class="form-label col-lg-12">Nombre del organismo:</label>
					<input placeholder="" class="form-control" id="organismo" onchange="loadLog3()" name="organismo" type="text" 			title="Nombre " value="<?php echo $row_cert_anterior['organismo'];?>"  />
				</div>
			</div>
			<div class="col-lg-5 col-sm-5" style=" padding: 0px 0px; border:solid 1px #AAAAAA; border-bottom-style:none;">
			<div class="col-lg-12 col-sm-12 campos" style="background-color: #dbf573e6; border: solid 1px #AAAAAA; margin-right: 0px; margin-left: 0px;">
				<label for="fecha_inicio" class="form-label"><b>Certificado:</b></label>
			</div>
				<div class="form-group col-lg-6 col-md-6 campos2">
					<label for="fecha_inicio" class="form-label col-lg-4">Desde:</label>
					<div class="col-lg-8 campos">
						<input  class="form-control inputsf" id="fecha_inicio" onchange="loadLog3()" name="fecha_inicio" type="date" 			title="Fecha inicio " value="<?php echo $row_cert_anterior['fecha_inicio'];?>"  />
					</div>
				</div>
				<div class="form-group col-lg-6 col-md-6 campos2">
					<label for="fecha_fin" class="form-label col-lg-4">Hasta:</label>
					<div class="col-lg-8 campos">
						<input  class="form-control inputsf" id="fecha_fin" onchange="loadLog3()" name="fecha_fin" type="date" 			title="Fecha fin " value="<?php echo $row_cert_anterior['fecha_fin'];?>"  />
					</div>
				</div>
			</div>
				<input type="hidden" id ="idsolicitud3" name="idsolicitud3" value="<?php echo $row_solicitud['idsolicitud']; ?>" />
				<input type="hidden" id="idcert_anterior" name="idcert_anterior" value="<?php echo $row_cert_anterior['idcert_anterior']; ?>" />
				<input type="hidden" id="seccion3" name="seccion3" value="3"/>
		</form>
		</div>
	</div>
</fieldset>

	