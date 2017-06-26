<fieldset>
</br><?
$sel2=0;
$query_solp2 = sprintf("SELECT * FROM solicitud_primus where idsolicitud='".$row_solicitud['idsolicitud']."'");
                $solp2 = mysql_query($query_solp2, $inforgan_pamfa) or die(mysql_error());
				 while($row_solp2= mysql_fetch_assoc($solp2))
                {
					if($row_solp2['idprimus']>3){
					$sel2=$sel2+1;
					
				}
				
				}
				
$query_solp2 = sprintf("SELECT * FROM solicitud_mexcalsup where idsolicitud='".$row_solicitud['idsolicitud']."'");
                $solp2 = mysql_query($query_solp2, $inforgan_pamfa) or die(mysql_error());
				 while($row_solp2= mysql_fetch_assoc($solp2))
                {
					if($row_solp2['idmex_alcance']==2){
					$sel2=$sel2+1;
					
				}
				}
$query_solp2 = sprintf("SELECT * FROM solicitud_srrc where idsolicitud='".$row_solicitud['idsolicitud']."'");
                $solp2 = mysql_query($query_solp2, $inforgan_pamfa) or die(mysql_error());
				 while($row_solp2= mysql_fetch_assoc($solp2))
                {
					if($row_solp2['idsrrc']==3){
					$sel2=$sel2+1;
					echo "entra";
				}
				
				}?>
  <div class="row" id="seccion10"  <? if ($sel2<1){?> style="display:none" <? }else {?> style="display:block"<? } ?> >
    <div class=" col-lg-12 col-xs-12">
      <form method="post" action="#seccion10">
      <div class=" col-lg-12 col-xs-12 campos2"  <? if($s10==1){?> style="background-color:#CF3" <? } else{?>style="background-color: #ecfbe7; <? }?> border: solid 1px #AAAAAA; border-bottom-width:2px;">
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
      </form>
    </div>
  </div>
</fieldset>