<fieldset><br/>
  <div class="row" id="seccion13">
    <div class="col-lg-12 col-xs-12">
      
        <div class="col-lg-12 col-xs-12">
            <h4><b>Estimado cliente favor de marcar las opciones para uso de sus datos</b></h4>            
        </div>
        <div class="col-lg-12 col-xs-12">
            <div class="col-lg-10 col-xs-10">
                <label for="num_total" >El cliente permite el ecceso de su nombre de la empresa y direccion al grupo de acceso de datos "Pública"</label>
            </div>
            <div class="col-lg-2 col-xs-2">
                <input id="respuesta4"  <? if ($row_solicitud['respuesta4']=="Si"){?> checked="checked"<? }?> type="radio" value="Si" name="respuesta4">
            </div>
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
            
                 <button  type="button"  id="terminada" name="terminada"   class="btn btn-success" value="1">Solicitud terminada</button>
                 <? }?>
        </div>
       
    </div>
  </div>
    
    <button type="button" name="obs" id="obs" class="btn btn-info">Agregar observaciones</button>
</fieldset>