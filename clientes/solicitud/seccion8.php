<fieldset>
</br>

 <? if ($dac=="formulario.php"){ if($st8==1){?> <button type="button" class="btn btn-danger collapsed btn-lg btn-block" data-toggle="collapse" data-target="#demo8" aria-expanded="false"><span  style="font-size:20px">  <? echo $c18."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;OBSERVACIONES&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";?><i class="material-icons" style="font-size: 25px;">arrow_downward</i></span></button>
<div id="demo8" class="collapse" style="background:#FFF">
<?  echo $ob8;  ?>
</div>
<? } }?>
	<div   class="row" id="seccion8"   <? if ($dac=="formulario.php"){if($st8==1){?> style="border:3px solid #F00"<? } else{?>style="background-color: #ecfbe7; <?  }}else{?> style="background-color: #ecfbe7;"<? }?>border: solid 1px #AAAAAA;">
  
      <div class="col-lg-12 col-xs-12 campos2">
          <div class="col-lg-12 col-xs-12 campos2" style="text-align: center;background-color: #dbf573e6; border: solid 1px #AAAAAA; margin-right: 0px; margin-left: 0px;">
            <h4><b> Sistema de reducción de riesgos de comtaminación</b></h4>
          </div>            
          <? $query_srrc = sprintf("SELECT * FROM srrc order by idsrrc asc");
            $srrc = mysql_query($query_srrc, $inforgan_pamfa) or die(mysql_error());
			$sel_r="";
			$query_riesgos = sprintf("SELECT * FROM solicitud_srrc where idsolicitud='".$row_solicitud['idsolicitud']."'");
                $riesgos = mysql_query($query_riesgos, $inforgan_pamfa) or die(mysql_error());
				 while($row_riesgos= mysql_fetch_assoc($riesgos))
                {
					$sel_r=$sel_r.$row_riesgos['idsrrc'];
				}
			
            $aux=0;
			$r=0;
          ?>
          <div class="col-lg-12 col-xs-12 campos2">
          <?
            while($row_srrc= mysql_fetch_assoc($srrc))
            {
              if($aux<='2'){
          ?>  <div class="col-lg-4 col-xs-4 campos2" style=" padding: 0px 0px; border:solid 1px #AAAAAA;">
              <label><input id="<? echo"idsrrc".$r?>" <? if($sel_r>1){ if (strstr ($sel_r, $row_srrc['idsrrc'])!== false){?> checked="checked"<? }}?>  type="checkbox" value="<? echo $row_srrc['idsrrc'];?>" name="<? echo"idsrrc".$r?>"><? echo $row_srrc['seccion'];?></label></div>
            <? }
            else { ?>
              <div class="col-lg-6 col-xs-6 campos2" style=" padding: 0px 0px; border:solid 1px #AAAAAA;">
              <label><input id="<? echo"idsrrc".$r?>" <? if($sel_r>1){ if (strstr ($sel_r, $row_srrc['idsrrc'])!== false){?> checked="checked"<? }}?>  type="checkbox" value="<? echo $row_srrc['idsrrc'];?>" name="<? echo"idsrrc".$r?>"><? echo $row_srrc['seccion'];?></label></div>
            <? }
            $aux++;
           
		   $r++; }?>
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
    
  
</fieldset>