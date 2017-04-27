<fieldset>
</br>
  <div class="row" id="seccion7" style="background-color: #ecfbe7; border: solid 1px #AAAAAA; border-bottom-width:2px;">
       <form method="post" action="#seccion7">
    <div class="col-lg-12 col-xs-12 campos2">
      <div class="col-lg-12 col-xs-12 campos2" style="text-align: center;background-color: #dbf573e6; border: solid 1px #AAAAAA; margin-right: 0px; margin-left: 0px;">
        <h4><b>México calidad suprema</b></h4>
      </div>
             <? $query_mcs = sprintf("SELECT * FROM mex_cal_sup where alcance=1 order by idmex_cal_sup asc");
              $query_mcs2 = sprintf("SELECT * FROM mex_cal_sup where pliego=1 order by idmex_cal_sup asc");
              $mcs = mysql_query($query_mcs, $inforgan_pamfa) or die(mysql_error());
              $mcs2 = mysql_query($query_mcs2, $inforgan_pamfa) or die(mysql_error());
              ?>
      <div class="col-lg-12 col-xs-12 campos2">
        <div class="col-lg-4 col-xs-4 campos2">
          <div class="col-lg-12 col-xs-12 campos2" style=" padding: 0px 0px; border:solid 1px #AAAAAA; text-align: center;">
            <b> Alcance la certificación</b>
          </div>
          <?
           while($row_mcs= mysql_fetch_assoc($mcs))
            {
               ?>  
               <div class="col-lg-6 col-xs-6 campos2" style=" padding: 0px 0px; border:solid 1px #AAAAAA;">
                <label><input id="idmex_alcance" <? if ($row_solicitud['idmex_alcance']==$row_mcs['idmex_cal_sup']){?> checked="checked"<? }?> type="radio" value="<? echo $row_mcs['idmex_cal_sup'];?>" name="idmex_alcance"><? echo $row_mcs['descripcion'];?></label>
                </div>
          <?}?>
        </div>

        <div class="col-lg-8 col-xs-8 campos2">
          <div class="col-lg-12 col-xs-12 campos2">
          <div class="col-lg-12 col-xs-12 campos2" style=" padding: 0px 0px; border:solid 1px #AAAAAA; text-align: center;">
              <b>Pliego de condiciones</b>
          </div>
            <?
            while($row_mcs2= mysql_fetch_assoc($mcs2))
            {
              ?><div class="col-lg-3 col-xs-3 campos2" style=" padding: 0px 0px; border:solid 1px #AAAAAA;">
              <label><input id="idmex_pliego" <? if ($row_solicitud['idmex_pliego']==$row_mcs2['idmex_cal_sup']){?> checked="checked"<? }?>  type="radio" value="<? echo $row_mcs2['idmex_cal_sup'];?>" name="idmex_pliego"><? echo $row_mcs2['descripcion'];?></label></div>
              <?
            }?>
          </div>
          
        </div>
      </div>
    </div>
    </form>
  </div>
</fieldset>
