<fieldset>
</br>
  <div class="row" id="seccion5"  style="background-color: #ecfbe7; border: solid 1px #AAAAAA; border-bottom-width:2px; text-align:left;">
    <div class="col-lg-12 col-sm-12" style="border: solid 1px #AAAAAA; text-align: center; background-color: #dbf573e6;">
      <h4>Favor de seleccionar el esquema de certificación que usted esta solicitando:</h4>
    </div>      
    <div class="col-lg-12 col-sm-12" style="border: solid 1px #AAAAAA; text-align: center; background-color: #dbf573e6;">
        <strong>GLOBALG.A.P. IFA V5.0:</strong>
    </div>    
    <div class="col-lg-12 col-sm-12 campos2">
      <div class="col-lg-6 col-sm-6 campos2" style="min-height: 158px;">
        <div class="col-lg-12 col-sm-12" style="border: solid 1px #AAAAAA; text-align: center">
          <b>Opcion 1- Productor:</b>
        </div>
        <? $query_esquema = sprintf("SELECT * FROM esquemas where tipo=1 order by tipo,opcion asc");
                $esquema = mysql_query($query_esquema, $inforgan_pamfa) or die(mysql_error());
                while($row_esquema= mysql_fetch_assoc($esquema))
                {?>
                  <div class="form-group col-lg-4 col-sm-4 campos2" style="border: solid 1px #AAAAAA; min-height: 136px;">
                  <?
                    if($row_esquema['opcion']==1)
                  {?>
                  <input   type="checkbox" <? if ($row_solicitud_esq['esq_tipo1_op1']==$row_esquema['idesquema']){?> checked="checked"<? }?>  value="<? echo $row_esquema['idesquema'];?>" id="esq_tipo1_op1" name="esq_tipo1_op1"/><? echo $row_esquema['esquema'];?>
                  <? }?></div><?
                }
        ?>        
      </div>
      <div class="col-lg-6 col-sm-6 campos2" style="min-height: 158px;">
        <div class="col-lg-12 col-sm-12 campos2" style="border: solid 1px #AAAAAA; text-align: center;">
          <b> Opcion 2- Grupo de Productores:</b>
        </div>
        <div class="col-lg-12 col-sm-12 campos2">
          <div class="form-group col-lg-4 col-sm-4 campos2" style="border: solid 1px #AAAAAA; min-height: 136px">
            <label for="preg1_op2" class="form-label col-lg-12">Número de productores a certificar:</label>
            <div class="col-lg-12 div4">
              <input placeholder="" class="form-control inputsf"   id="preg1_op2" name="preg1_op2" type="number"      title="Número " value="<? echo $row_solicitud_esq['preg1_op2'];?>" />
            </div>
          </div>
          <div class=" form-group col-lg-4 col-sm-4 campos2" style="border: solid 1px #AAAAAA; min-height: 136px">
            <label  for="preg2_op2" class="form-label col-lg-12">Número de unidades de producción a certifcar:</label>
            <div class="col-lg-12 div4">
              <input placeholder=""  class="form-control inputsf"  id="preg2_op2" name="preg2_op2" type="number"      title="Número " value="<? echo $row_solicitud_esq['preg2_op2'];?>"  />
            </div>
          </div>
          <div class="form-group col-lg-4 col-sm-4 campos2" style="border: solid 1px #AAAAAA; min-height: 136px">
            <label for="preg3_op2" class="form-label col-lg-12">Número de unidades de maniupalación de productos a certificar:</label>
            <div class="col-lg-12 div4">
              <input placeholder="" class="form-control inputsf"  id="preg3_op2" name="preg3_op2" type="number"       title="Número " value="<? echo $row_solicitud_esq['preg3_op2'];?>"  />
            </div>
          </div>
        </div>
      </div>   
    </div> 
    <div class="col-lg-12 col-sm-12 campos2">
      <div class="col-lg-6 col-sm-6 campos2" style="min-height:">
        <div class="col-lg-6 col-sm-6 campos2" style="border: solid 1px #AAAAAA; min-height:154px;">
          <div>
            <label for="preg1_tipo2" >Número total de unidades de produccion: Ranchos, huertos o invernaderos</label>
          </div>
          <div class="div4">
            <input placeholder="" class="form-control inputsf"  id="preg1_tipo2" name="preg1_tipo2" type="number"       title="Número " value="<? echo $row_solicitud_esq['preg1_tipo2'];?>" />
          </div>
        </div>
        <div class="col-lg-6 col-sm-6 campos2" style="border: solid 1px #AAAAAA; min-height:154px;">
          <div>
            <label for="preg2_tipo2" >Número de unidades de producción a certifcar:</label>
          </div>
          <div class="div4">
            <input placeholder=" "  class="form-control inputsf"  id="preg2_tipo2" name="preg2_tipo2" type="number"       title="Número " value="<? echo $row_solicitud_esq['preg2_tipo2'];?>"  />
          </div>
        </div>
      </div>
      <div class="col-lg-6 col-sm-6 col-xs-12 campos2" style="min-height: ;"><!--unid2-->
        <div class=" col-lg-12 col-xs-12 campos2" style="border: solid 1px #AAAAAA; text-align: center;">
          <label for="num_unid_prod2" >GLOBALG.A.P. CADENA DE CUSTODIA (CoC):</label>
        </div>
        <div class="form-group col-lg-12 col-xs-12 campos2">
            <? $query_esquema = sprintf("SELECT * FROM esquemas where tipo =2 order by tipo,opcion asc");
              $esquema = mysql_query($query_esquema, $inforgan_pamfa) or die(mysql_error());
            ?>
          <div class="col-lg-12 col-xs-12 campos2">
            <?  while($row_esquema= mysql_fetch_assoc($esquema))
                {
                 if($row_esquema['opcion']==1)
                  {
            ?>
                    <div class="col-lg-6 col-xs-6 campos2" style="border: solid 1px #AAAAAA;">
                      <label><input   type="checkbox"  <?php if ($row_solicitud_esq['esq_tipo2_op1']==$row_esquema['idesquema']){?> checked="checked"<? }?> value="<? echo $row_esquema['idesquema'];?>" id="esq_tipo2_op1" name="esq_tipo2_op1"/><? echo $row_esquema['esquema'];?></label>
                    </div>
                <?}
                }?>
          </div>
          <div class="form-group col-lg-6 col-xs-6 campos2">
            <div class="col-lg-12 col-xs-12 campos2" style="border: solid 1px #AAAAAA; min-height: 51px;">
              <label><input   <? if ($row_solicitud_esq['preg3_tipo2']=="Si"){?> checked="checked"<? }?>  type="checkbox" value="Si" id="preg3_tipo2" name="preg3_tipo2">¿La empresa realiza el etiquetado?</label>
            </div>
            <div class="col-lg-12 col-xs-12 campos2" style="border: solid 1px #AAAAAA; min-height: 51px;">
             <label><input   <? if ($row_solicitud_esq['preg5_tipo2']=="Si"){?> checked="checked"<? }?> type="checkbox" value="Si" id="preg5_tipo2" name="preg5_tipo2">¿Cuenta con un sistema de trazabilidad?</label>
            </div>
          </div>
          <div class="form-group col-lg-6 col-xs-6 campos2" style="border: solid 1px #AAAAAA; min-height: 102px;">
                    <label>Cantidad estimada de producto certificado (Voluntario) en toneladas anual.</label>
                    <div class="div4">
                        <input placeholder=""  class="form-control inputsf"  id="preg4_tipo2" name="preg4_tipo2" type="number"       title="Cantidad " value="<? echo $row_solicitud_esq['preg4_tipo2'];?>" />    
                    </div>
                  </div>
            </div>
          </div><!-- /div unid 2-->
          
          <div class="col-lg-12 col-xs-12 campos2">
            <div class="col-lg-10 col-xs-10 campos2" style="border: solid 1px #AAAAAA; min-height: 26px;">
              <b>Declaración de producción paralela (PP) y propiedad paralela (PO)</b>
            </div>
            <div class="col-lg-1 col-xs-1 campos2" style="border: solid 1px #AAAAAA; height: 26px;">
              <b>Si</b>
            </div>
            <div class="col-lg-1 col-xs-1 campos2" style="border: solid 1px #AAAAAA; height:26px;">
              <b>No</b>
            </div>
          </div>
          <div class="col-lg-12 col-xs-12 campos2">
            <div class="col-lg-10 col-xs-10 campos2" style="border: solid 1px #AAAAAA;min-height: 26px;">
                <label for="preg6" >¿El producto se vende antes de la cosecha?</label>
            </div> 
            <div class="col-lg-1 col-xs-1 campos2" style="border: solid 1px #AAAAAA; height: 26px;">
              <input   <? if ($row_solicitud_esq['preg6']=="Si"){?> checked="checked"<? }?> type="radio" value="Si" id="preg6" name="preg6">
            </div> 
            <div class="col-lg-1 col-xs-1 campos2" style="border: solid 1px #AAAAAA; height: 26px;">
             <input   <? if ($row_solicitud_esq['preg6']=="No"){?> checked="checked"<? }?> type="radio" value="No" id="preg6" name="preg6">
            </div>
          </div>
          <div class="col-lg-12 col-xs-12 campos2">
            <div class="col-lg-10 col-xs-10 campos2" style="border: solid 1px #AAAAAA; min-height: 26px;">
               <label for="preg7" >¿La entidad legal realiza la producción  de ´producto certificado y no certificado, es decir produccion paralela?</label>
            </div> 
            <div class="col-lg-1 col-xs-1 campos2" style="border: solid 1px #AAAAAA; height: 26px;">
              <input   <? if ($row_solicitud_esq['preg7']=="Si"){?> checked="checked"<? }?> type="radio" value="Si" id="preg7" name="preg7">
            </div> 
            <div class="col-lg-1 col-xs-1 campos2" style="border: solid 1px #AAAAAA; height:26px;">
               <input   <? if ($row_solicitud_esq['preg7']=="No"){?> checked="checked"<? }?> type="radio" value="No" id="preg7" name="preg7">
            </div>
          </div>
          <div class="col-lg-12 col-xs-12 campos2">
            <div class="col-lg-10 col-xs-10 campos2" style="border: solid 1px #AAAAAA; min-height:26px;">
              <label for="preg8" >¿La entidad legal que produce el producto, compra el mismo producto a otros proveedores, es decir, propiedad paralela?</label>
            </div> 
            <div class="col-lg-1 col-xs-1 campos2" style="border: solid 1px #AAAAAA; height: 26px;">
               <input   <? if ($row_solicitud_esq['preg8']=="Si"){?> checked="checked"<? }?> type="radio" value="Si" id="preg8" name="preg8" >
            </div> 
            <div class="col-lg-1 col-xs-1 campos2" style="border: solid 1px #AAAAAA; height: 26px;">
               <input   <? if ($row_solicitud_esq['preg8']=="No"){?> checked="checked"<? }?> type="radio" value="No" id="preg8" name="preg8" >
            </div>
          </div>

            
            <input type="hidden" id="idsolicitud_esquema" name="idsolicitud_esquema" value="<? echo $row_solicitud_esq['idsolicitud_esquema']; ?>" />
            
  </div><!-- /row-============  /ROW ====-->
</fieldset>
