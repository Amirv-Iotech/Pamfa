<fieldset>
</br>
  <div class="row" id="seccion8" style="background-color: #ecfbe7; border: solid 1px #AAAAAA; border-bottom-width:2px;">
    
      <div class="col-lg-12 col-xs-12 campos2">
          <div class="col-lg-12 col-xs-12 campos2" style="text-align: center;background-color: #dbf573e6; border: solid 1px #AAAAAA; margin-right: 0px; margin-left: 0px;">
            <h4><b> Sistema de reducción de riesgos de comtaminación</b></h4>
          </div>            
          <? $query_srrc = sprintf("SELECT * FROM srrc order by idsrrc asc");
            $srrc = mysql_query($query_srrc, $inforgan_pamfa) or die(mysql_error());
            $aux=0;
          ?>
          <div class="col-lg-12 col-xs-12 campos2">
          <?
            while($row_srrc= mysql_fetch_assoc($srrc))
            {
              if($aux<='2'){
          ?>  <div class="col-lg-4 col-xs-4 campos2" style=" padding: 0px 0px; border:solid 1px #AAAAAA;">
              <label><input id="idsrrc" <? if ($row_solicitud['idsrrc']==$row_srrc['idsrrc']){?> checked="checked"<? }?>  type="radio" value="<? echo $row_srrc['idsrrc'];?>" name="idsrrc"><? echo $row_srrc['seccion'];?></label></div>
            <?}
            else {?>
              <div class="col-lg-6 col-xs-6 campos2" style=" padding: 0px 0px; border:solid 1px #AAAAAA;">
              <label><input id="idsrrc" <? if ($row_solicitud['idsrrc']==$row_srrc['idsrrc']){?> checked="checked"<? }?>  type="radio" value="<? echo $row_srrc['idsrrc'];?>" name="idsrrc"><? echo $row_srrc['seccion'];?></label></div>
            <?}
            $aux++;
            }?>
          </div>
          <div class="col-lg-12 col-xs-12 campos2">
              <div class="col-lg-6 col-xs-6 campos2" style=" padding: 0px 0px; border:solid 1px #AAAAAA; min-height: 87px;">
                 <span> Número de unidades de produccion-ranchos/huertos o invernaderos:</span>
                 <div class="form-group campos2 div4">
                 <input  class="form-control" id="srrc_preg1" placeholder=" " name="srrc_preg1" type="number"      title="Número " value="<? echo $row_solicitud['srrc_preg1'];?>" />
                </div>
              </div>
                  <div class="col-lg-6 col-xs-6 campos2" style=" padding: 0px 0px; border:solid 1px #AAAAAA; min-height: 87px;">
                     <span>Número de productores del área integral:</span>
                     <div class="form-group campos2 div4">
                        <input  class="form-control " id="srrc_preg2" placeholder=" " name="srrc_preg2" type="number"      title="Número " value="<? echo $row_solicitud['srrc_preg2'];?>" />
                      </div>
                  </div>
              </div>
          </div>
      </div>
    
  </div>
</fieldset>