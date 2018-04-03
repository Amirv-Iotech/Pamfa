<fieldset><br/>

      <? if ($dac=="formulario.php"){ if($st11==1){?> <button type="button" class="btn btn-danger collapsed btn-lg btn-block" data-toggle="collapse" data-target="#demo11" aria-expanded="false"><span  style="font-size:20px">  <? echo $c111."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;OBSERVACIONES&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";?><i class="material-icons" style="font-size: 25px;">arrow_downward</i></span></button>
<div id="demo11" class="collapse" style="background:#FFF">
<?  echo $ob11;  ?>
</div>
<? } }?>
	<div   class="row" id="seccion11"   <? if ($dac=="formulario.php"){  if($st10==1){?> style="border:3px solid #F00"<? } else{?>style="background-color: #ecfbe7; <? }}else{?> style="background-color: #ecfbe7;"<? }?>border: solid 1px #AAAAAA;">
  
   

    <div class="col-lg-12 col-xs-12 campos2"   >
      <form method="post" action="#seccion11">
      <div class="col-lg-12" style="text-align: center;background-color: #dbf573e6; border: solid 1px #AAAAAA; margin-right: 0px; margin-left: 0px;">
        <h4><b>Información sobre comercialización de producto, indicar paises de destino</b></h4>
      </div>
      <div class="col-xs-12 col-lg-12 campos2">
          <input  class="form-control inputsf" id="inf_comercializacion" placeholder="" name="inf_comercializacion" type="text"       title="inf_comercializacion " value="<? echo $row_solicitud['inf_comercializacion'];?>" />
      </div>
      </form>
    </div>
  </div>
</fieldset>