<fieldset>
</br>
  <div class="row" id="seccion10">
    <div class=" col-lg-12 col-xs-12">
      
      <div class=" col-lg-12 col-xs-12 campos2" style="background-color: #ecfbe7; border: solid 1px #AAAAAA; border-bottom-width:2px;" >
        <div class=" col-lg-12 col-xs-12 campos2" style="text-align: center;background-color: #dbf573e6; border: solid 1px #AAAAAA; margin-right: 0px; margin-left: 0px;">
          <h4><b>Información del centro de empaque / manipulacion / procesadora </b></h4>
        </div>

        <div class="col-lg-6 col-sm-6 campos2" style=" padding: 0px 0px; border:solid 1px #AAAAAA;">
        <label>empresa</label>
          <div class=" form-group col-xs-12 campos2">
            <input  class="form-control inputsf" id="empresa" placeholder="" name="empresa" type="text"      title="Número " value="<? echo $row_procesadora['empresa'];?>" />
          </div>
        </div>

        <div class="col-lg-6 col-sm-6 campos2" style=" padding: 0px 0px; border:solid 1px #AAAAAA;">
          <label> rfc</label>
          <div class=" form-group col-xs-12 campos2">
                    <input  class="form-control inputsf" id="rfc" placeholder="" name="rfc" type="text"      title="Número " value="<? echo $row_procesadora['rfc'];?>" />
                    </div>

        </div>
        <div class="col-lg-6 col-sm-6 campos2" style=" padding: 0px 0px; border:solid 1px #AAAAAA;">
        <label>direccion (Calle, Nº)</label>
        <div class="form-group col-xs-12 campos2">
                    <input  class="form-control inputsf" id="direccion" placeholder="" name="direccion" type="text"      title="Número " value="<? echo $row_procesadora['direccion'];?>" />
                    </div>

        </div>
        <div class="col-lg-6 col-sm-6 campos2" style=" padding: 0px 0px; border:solid 1px #AAAAAA;">
          <label>colonia, Municipio, Estado y Pais</label>
          <div class="form-group col-xs-12 campos2">
                    <input  class="form-control inputsf" id="direccion2" placeholder="" name="direccion2" type="text"       title="Número " value="<? echo $row_procesadora['direccion2'];?>" />
                    </div>

        </div>
        <div class="col-lg-6 col-sm-6 campos2" style=" padding: 0px 0px; border:solid 1px #AAAAAA;">
          <label>Codigo Postal</label>
              <div class="form-group col-xs-12 campos2">
                      <input  class="form-control inputsf" id="cp" placeholder="" name="cp" type="text"       title="Número " value="<? echo $row_procesadora['cp'];?>" />
                      </div>
        </div>
        <div class="col-lg-6 col-sm-6 campos2" style=" padding: 0px 0px; border:solid 1px #AAAAAA;">
          <label>Telefono / Fax</label>
            <div class="form-group col-xs-12 campos2">
                    <input  class="form-control inputsf" id="tel" placeholder="" name="tel" type="text"      title="Número " value="<? echo $row_procesadora['tel'];?>" />
                    </div>

        </div>
          <input type="hidden" id="idprocesadora" name="idprocesadora" value="<? echo $row_procesadora['idprocesadora']; ?>" />
        </div>
      
    </div>
  </div>
</fieldset>