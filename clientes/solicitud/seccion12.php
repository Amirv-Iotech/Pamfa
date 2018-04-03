<fieldset><br/>
      <? if ($dac=="formulario.php"){  if($st12==1){?> <button type="button" class="btn btn-danger collapsed btn-lg btn-block" data-toggle="collapse" data-target="#demo12" aria-expanded="false"><span  style="font-size:20px">  <? echo $c112."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;OBSERVACIONES&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";?><i class="material-icons" style="font-size: 25px;">arrow_downward</i></span></button>
<div id="demo12" class="collapse" style="background:#FFF">
<?  echo $ob12;  ?>
</div>
<? } }?>
	<div   class="row" id="seccion12"   <? if ($dac=="formulario.php"){  if($st12==1){?> style="border:3px solid #F00"<? } else{?>style="background-color: #ecfbe7; <? }}else{?> style="background-color: #ecfbe7;"<? }?>border: solid 1px #AAAAAA;">
  
   
  
    <div class="col-lg-12 col-xs-12 campos2" >
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
 
  
	
  
 
  <input type="button"  name="anexo"id="anexo" <? if($st14==1){?>class="btn btn-warning"  <? } else{?>class="btn btn-info"<? }?> value="Anexo producción"/>
   <input type="button" name="anexo" id="anexo2" <? if($st15==1){?>class="btn btn-warning" <? } else{?>class="btn btn-info"<? }?> value="Anexo almacenamiento"/>