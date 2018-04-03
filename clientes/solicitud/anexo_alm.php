<fieldset>
</br>

  <div class="row" id="anexo_alm"   <? if($st15==1){?> style="border:3px solid #F00"<? } else{?>style="background-color: #ecfbe7; <? }?>border: solid 1px #AAAAAA; display:block">
 
   <? if($st15==1){?> <button   type="button" class="btn btn-danger collapsed btn-lg btn-block" data-toggle="collapse" data-target="#demo15" aria-expanded="false" id="pr"><span  style="font-size:20px">  <? echo $c115."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;OBSERVACIONES&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";?><i class="material-icons" style="font-size: 25px;">arrow_downward</i></span></button>
<div id="demo15" class="collapse" style=" background:#FFF">
<?  echo $ob15;  ?>
</div>
<? } ?>
 
   <div class="col-lg-12 col-xs-12 campos2" >
    <div class="col-lg-12 col-xs-12 campos2" style="background-color: #ecfbe7; border: solid 1px #AAAAAA; border-bottom-width:2px;">
      <div class="col-lg-12 col-xs-12 campos2" style="text-align: center;background-color: #dbf573e6; border: solid 1px #AAAAAA; margin-right: 0px; margin-left: 0px;">
          <h3><b>Anexo CER.RG.01</b></h3>
      </div>
   
<!-- TABLA ======= TABLA=====-->
<div class="col-lg-12 col-xs-12" style="background-color: #ecfbe7; border: solid 1px #AAAAAA; border-bottom-width:2px;" id="tabla_ajax3" >

          <?php

           include('tabla_anexo_alm.php');?>
          </div>

    </div><!-- tabla -->
          
  </div><!--row-->
</fieldset>