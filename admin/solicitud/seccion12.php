<fieldset><br/>
  <div clas="row" id="seccion12">
    <div class="col-lg-12 col-xs-12 campos2" style="background-color: #ecfbe7; border: solid 1px #AAAAAA; border-bottom-width:2px;">
      <form method="post" action="#seccion12">
      <div class="col-lg-12" style="text-align: center;background-color: #dbf573e6; border: solid 1px #AAAAAA; margin-right: 0px; margin-left: 0px;">
          <h4><b>Por favor indicar el idioma en que se realizará la auditoria y el idioma en que se realizará el informe</b></h4>
      </div>
      <div class="col-xs-12 col-lg-12 campos2">
        <div class="col-lg-6 col-xs-6 form-group campos2" style=" padding: 0px 0px; border:solid 1px #AAAAAA;">
          <label>Auditoria:</label>
          <input  class="form-control inputsf" id="idioma_aud" placeholder="" name="idioma_aud" type="text"       title="Número " value="<? echo $row_solicitud['idioma_aud'];?>" />
        </div>
        <div class="col-lg-6 col-xs-6 form-group campos2" style=" padding: 0px 0px; border:solid 1px #AAAAAA;">
          <label>Informe:</label>
            <input  class="form-control inputsf" id="idioma_inf"  placeholder="" name="idioma_inf" type="text"       title="Número " value="<? echo $row_solicitud['idioma_inf'];?>" />
        </div>
      </div>
      </form>
    </div>
  </div>
</fieldset>