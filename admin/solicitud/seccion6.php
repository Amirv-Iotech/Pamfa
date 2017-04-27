<fieldset>
</br>
  <div id="seccion6"class="row" style="background-color: #ecfbe7; border: solid 1px #AAAAAA; border-bottom-width:2px;">
    <div class="col-lg-12 col-xs-12 campos2">
      <div class="col-lg-12" style="text-align: center;background-color: #dbf573e6; border: solid 1px #AAAAAA; margin-right: 0px; margin-left: 0px;">
       <h4> <b>PrimusGFS</b></h4>
      </div>
      <div class="col-lg-12 col-xs-12 campos2">
           <form method="post" action="#seccion6">
        <? 
                $query_primus = sprintf("SELECT * FROM primusgfs order by idprimus asc");
                $primus = mysql_query($query_primus, $inforgan_pamfa) or die(mysql_error());
                $control=1;
            ?>
            <?
                while($row_primus= mysql_fetch_assoc($primus))
                {
            ?>  

                <? if ($control=='1'){?>
                  <div class="col-lg-2 col-sm-2 campos2">
                    <div class="col-lg-12 col-sm-12 campos2" style=" padding: 0px 0px; border:solid 1px #AAAAAA;">
                        <label><input id="primus" <? if ($row_solicitud['idprimus']==$row_primus['idprimus']){?> checked="checked"<? }?> type="radio" value="<? echo $row_primus['idprimus'];?>" name="primus"><? echo $row_primus['primus'];?></label>
                    </div>
                    <? }
                    else if($control=='2'){?>
                    <div class="col-lg-12 col-sm-12 campos2" style=" padding: 0px 0px; border:solid 1px #AAAAAA;">
                                        <label><input id="primus" <? if ($row_solicitud['idprimus']==$row_primus['idprimus']){?> checked="checked"<? }?> type="radio" value="<? echo $row_primus['idprimus'];?>" name="primus"><? echo $row_primus['primus'];?></label>
                    </div>
                </div><? }
                else if($control=='3'){?>

                <div class="col-lg-2 col-sm-2 campos2" style=" padding: 0px 0px; border:solid 1px #AAAAAA; min-height: 55px;">
                                    <label><input id="primus" <? if ($row_solicitud['idprimus']==$row_primus['idprimus']){?> checked="checked"<? }?> type="radio" value="<? echo $row_primus['idprimus'];?>" name="primus"><? echo $row_primus['primus'];?></label>
                </div><? }
                else if($control=='4'){?>
                <div class="col-lg-3 col-sm-3 campos2" style=" padding: 0px 0px; border:solid 1px #AAAAAA; min-height: 55px;">
                                    <label><input id="primus" <? if ($row_solicitud['idprimus']==$row_primus['idprimus']){?> checked="checked"<? }?> type="radio" value="<? echo $row_primus['idprimus'];?>" name="primus"><? echo $row_primus['primus'];?></label>
                </div><?} else if($control=='5'){?>
                <div class="col-lg-3 col-sm-3 campos2" style=" padding: 0px 0px; border:solid 1px #AAAAAA; min-height: 55px;">
                                    <label><input id="primus" <? if ($row_solicitud['idprimus']==$row_primus['idprimus']){?> checked="checked"<? }?> type="radio" value="<? echo $row_primus['idprimus'];?>" name="primus"><? echo $row_primus['primus'];?></label>
                </div><? }
                else if ($control=='6') {?>
                <div class="col-lg-2 col-sm-2 campos2">
                    <div class="col-lg-12 col-sm-12" style=" padding: 0px 0px; border:solid 1px #AAAAAA;">
                                        <label><input id="primus" <? if ($row_solicitud['idprimus']==$row_primus['idprimus']){?> checked="checked"<? }?> type="radio" value="<? echo $row_primus['idprimus'];?>" name="primus"><? echo $row_primus['primus'];?></label>
                    </div><? }
                      else if($control=='7'){?>
                    <div class="col-lg-12 col-sm-12 campos2" style=" padding: 0px 0px; border:solid 1px #AAAAAA;">
                                       <label><input id="primus" <? if ($row_solicitud['idprimus']==$row_primus['idprimus']){?> checked="checked"<? }?> type="radio" value="<? echo $row_primus['idprimus'];?>" name="primus"><? echo $row_primus['primus'];?></label>
                    </div>
                </div>
                <? }?>

            <?
               $control++; }
            ?>
            </form>
        </div>
    </div>

  </div>
</fieldset>