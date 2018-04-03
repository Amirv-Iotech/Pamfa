<fieldset>
</br>
  <div class="row" id="seccion7" style="background-color: #ecfbe7; border: solid 1px #AAAAAA; border-bottom-width:2px;">
       
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
        <div class="col-lg-4 col-xs-12 campos2">
          <div class="col-lg-12 col-xs-12 campos2" style=" padding: 0px 0px; border:solid 1px #AAAAAA; text-align: center;">
         <b> Alcance la certificación</b>
          </div>
          <?
		  
		  $sel_alc="";
				
               
				$query_alc = sprintf("SELECT * FROM solicitud_mexcalsup where idsolicitud='".$row_solicitud['idsolicitud']."'");
                $alc = mysql_query($query_alc, $inforgan_pamfa) or die(mysql_error());
				 while($row_alc= mysql_fetch_assoc($alc))
                {
					$sel_alc=$sel_alc.$row_alc['idmex_alcance'];
					$sel_alc=$sel_alc.$row_alc['idmex_pliego'];
				}
		  
		  $mcont2=0;
		  
           while($row_mcs= mysql_fetch_assoc($mcs))
            {
               ?>  
               <div class="col-lg-6 col-xs-6 campos2" style=" padding: 0px 0px; border:solid 1px #AAAAAA;">
                <label><input id="<? echo"idmex_alcance".$mcont2?>" <?  if($sel_alc>1){ if (strstr ($sel_alc, $row_mcs['idmex_cal_sup'])!== false){?> checked="checked"<? }}?> type="checkbox" value="<? echo $row_mcs['idmex_cal_sup'];?>" name="<? echo"idmex_alcance".$mcont2?>"><? echo $row_mcs['descripcion'];?></label>
                </div>
          <? $mcont2++; }?>
        </div>

        <div class="col-lg-8 col-xs-12 campos2">
        <div class="col-lg-12 col-xs-12 campos2">
          <div class="col-lg-12 col-xs-12 campos2" style=" padding: 0px 0px; border:solid 1px #AAAAAA; text-align: center;">
               <b>Pliego de condiciones</b>
          </div>
            <?
			$mcont=0;
            while($row_mcs2= mysql_fetch_assoc($mcs2))
            {
              ?><div class="col-lg-3 col-xs-6 campos2" style=" padding: 0px 0px; border:solid 1px #AAAAAA;">
              <label><input id="<? echo"idmex_pliego".$mcont?>" <? if($sel_alc>1){ if (strstr ($sel_alc, $row_mcs2['idmex_cal_sup'])!== false){?> checked="checked"<? }}?>  type="checkbox" value="<? echo $row_mcs2['idmex_cal_sup'];?>" name="<? echo"idmex_pliego".$mcont?>"><? echo $row_mcs2['descripcion'];?></label></div>
              <?
           $mcont++; }?>
          </div>
          
        </div>
      </div>
    </div>
    
  </div>
</fieldset>
