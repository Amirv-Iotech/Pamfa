<fieldset><br/>


  <? if ($dac=="formulario.php"){  if($st13==1){?> <button type="button" class="btn btn-danger collapsed btn-lg btn-block" data-toggle="collapse" data-target="#demo13" aria-expanded="false"><span  style="font-size:20px">  <? echo $c113."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;OBSERVACIONES&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";?><i class="material-icons" style="font-size: 25px;">arrow_downward</i></span></button>
<div id="demo13" class="collapse" style="background:#FFF">
<?  echo $ob13;  ?>
</div>
<? } }?>
	<div   class="row" id="seccion13"   <? if ($dac=="formulario.php"){  if($st12==1){?> style="border:3px solid #F00"<? } else{?>style="background-color: #ecfbe7; <? }}else{?> style="background-color: #ecfbe7;"<? }?>border: solid 1px #AAAAAA;">
  


  
    <div class="col-lg-12 col-xs-12"  >
      <form method="post" action="#" id="form13">
        <div class="col-lg-12 col-xs-12">
            <h4><b>Estimado cliente favor de marcar las opciones para uso de sus datos</b></h4>            
        </div>
        <div class="col-lg-12 col-xs-12">
            <div class="col-lg-10 col-xs-10">
                <label for="num_total" >El cliente permite el ecceso de su nombre de la empresa y direccion al grupo de acceso de datos "Pública"</label>
            </div>
            <div class="col-lg-2 col-xs-2">
                 <input id="respuesta4"  <? if ($row_solicitud['respuesta4']=="Si"){?> checked="checked"<? }?> type="radio" value="Si" name="respuesta4"> </div>
        </div>
        <div class="col-lg-12 col-xs-12">
            <div class="col-lg-10 col-xs-10">
              <label for="num_unid_prod2" >El cliente no esta de acuerdo para conceder acceso de su nombre de la empresa y dirección al grupo de acceso de datos "Pública"</label>
            </div>
            <div class="col-lg-2 col-xs-2">
                <input id="respuesta4"  <? if ($row_solicitud['respuesta4']=="No"){?> checked="checked"<? }?> type="radio" value="No" name="respuesta4">
            </div>
            <? if($row_solicitud['terminada']==1){?>
          
            <? } else {?>
            
                 <button  type="button"  id="terminada" name="terminada"  value=""  class="btn btn-success">Solicitud terminada</button>
                 <? }?>
        </div>
        </form>
    </div>
  </div>
</fieldset>