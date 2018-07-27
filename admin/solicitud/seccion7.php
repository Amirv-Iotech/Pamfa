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
  <div class="row">
  <div class="col-lg-12 col-xs-12 campos2">
        
         <div class="col-lg-12 col-xs-12 campos2">
          <b>Enliste los equipos de medición utilizados para el pliego de condición solicitado. </b>
      </div>
     
      <div class="col-lg-12 col-xs-12 campos2">
        <div class="col-lg-12 col-xs-12 campos2">
       <form id="upload_form" enctype="multipart/form-data" method="post"  >
         <input type="hidden" name="idsolicitud" value="<? echo $_POST['idsolicitud'];?>" />
         
  
  
            <div class="col-lg-3 col-xs-3 campos2" style=" padding: 0px 0px; border:solid 1px #AAAAAA; min-height: 80px;">
               <label>Equipo de medición:</label>
              <div class="campos2 div4">
                  <input class="form-control inputsf" id="equipo" name="equipo" placeholder=""type="text"  />
              </div>
            </div>
            <div class="col-lg-3 col-xs-3 campos2" style=" padding: 0px 0px; border:solid 1px #AAAAAA; min-height: 80px;">
               <label>Anexo1:</label>
              <label data-toggle="tooltip" data-placement="top" title="Anexe copia de los certificados de calibración externa de los equipos (laboratorio acreditado), vigente (12 meses)."><i class="material-icons">help_outline</i> </label>
              <div class="campos2 div4">
              <input type="file" name="file1" id="file1"  class="" style="width:100%"  /> </div>
            </div>
            <div class="col-lg-3 col-xs-3 campos2" style=" padding: 0px 0px; border:solid 1px #AAAAAA; min-height: 80px;">
            <label>Anexo2:</label>
             <label data-toggle="tooltip" data-placement="top" title="Anexe copia de los registros de las verificaciones internas que realizan a los equipos de medición donde se utilizó un patrón de referencia con calibración externa."><i class="material-icons">help_outline</i> </label>
             <div class="campos2 div4">
              <input  class="" style="width:100%" id="anexo1" name="anexo1" placeholder="" type="file"  /> </div>
            </div>
           
           
            
           
            
            <div class="col-lg-3 col-xs-3 campos2" style=" padding: 0px 0px; border:solid 1px #AAAAAA; min-height: 80px; ">
                <input type="hidden" id="idsolicitud" name="idsolicitud" value="<? echo $row_solicitud['idsolicitud']; ?>" />
                <input type="hidden"  id="insertar_prod" name="insertar_prod" value="1" />
                <input type="hidden" id="seccion" name="seccion" value="1" />
                 
               
                <input type="hidden" id="idoperador" name="idoperador" value="<? echo $row_operador['idoperador']; ?>" />
                <div class=" col-xs-12 campos2" style="position: absolute; bottom: 35%; text-align: center;">
                <input type="button" value="agregar" name="agregar" id="agregar"  />
                </div>
            </div>
<div class="col-lg-12 col-xs-12" style="background-color: #ecfbe7; border: solid 1px #AAAAAA; border-bottom-width:2px;" id="tabla_ajax" >

          <?php

           include('tabla3.php');?>
          </div>

    </div><!-- tabla -->
   </div>
  </div>
  
  
 
  <div class="col-lg-12 col-xs-12 campos2">
            
            <div class="col-lg-6 col-xs-6 campos2" style="border: solid 1px #AAAAAA; min-height: 26px;">
              <b>Si requiere la evaluación requisitos adicionales solicitado por su cliente, anexe solicitud o documentos de las especificaciones de su cliente.</b>
           <br /><br />
            <div class="col-lg-12 col-xs-12 campos2" >
              <b>Si <input <? if ($row_mcs_p2['evaluacion']=='Si'){?> checked="checked"<? }?>  value="Si"  id="evaluacion"  name="evaluacion" type="radio" value="Si" ></b>
            <b>No 
             <input <? if ($row_mcs_p2['evaluacion']=='No'){?> checked="checked"<? }?>  id="evaluacion"  name="evaluacion"  type="radio" value="No" ></b>
         </div>
       
           <div class="col-lg-12 col-xs-12 campos2" >

          <div class="col-lg-6 col-md-6 col-xs-6 ">
			   Nombre del documento: 
		</div>
		<div class="col-lg-6 col-md-6 col-xs-6 ">
			 <input placeholder="" class="form-control inputsf"   id="documento"  name="documento" type="text" 			title="Nombre " value="<?php echo $row_mcs_p2['documento'];?>" style="margin-top:-3em;"  />
		</div>
        
          </div>
          </div>
          <div class="col-lg-6 col-xs-6 campos2" style="border: solid 1px #AAAAAA; min-height: 26px;">
            <div class="col-lg-12 col-xs-12 campos2" >
                <label for="preg6" >Si usted tiene un acuerdo de muestreo con sus clientes, favor de indicarlo.</label>
            </div> 
            <div class="col-lg-12 col-xs-12 campos2" >
              <b>Si <input  <? if ($row_mcs_p2['muestreo']=='Si'){?> checked="checked"<? }?>  id="muestreo"  name="muestreo" type="radio" value="Si" ></b>
            <b>No 
             <input <? if ($row_mcs_p2['muestreo']=='No'){?> checked="checked"<? }?>  id="muestreo"  name="muestreo"  type="radio" value="No" i></b>
         </div>
         
          <div class="col-lg-12 col-xs-12 campos2" >

          <div class="col-lg-8 col-xs-8 " >
            <label> Anexe copia de la especificación del muestreo.</label>  </div>
             
            <div class="col-lg-4 col-xs-4 ">
             <input  class="" style="width:100%" id="anexo1" name="anexo1" placeholder="" type="file"  />
              
             
            </div>
             
              </div>
              <br />
         <label style="margin-bottom:10px;" >Si su respuesta es NO, PAMFA le indicara el muestreo a efectuarse en la cotización de servicio.</label> 
                  </div>
        
      <div class="col-lg-12 col-xs-12 campos2">
      <div class="col-lg-12 col-xs-12 campos2" style="border: solid 1px #AAAAAA; min-height: 26px;">
              <b>Describa la trazabilidad del lote.</b>
              <textarea  class="form-control" id="trazabilidad" name="trazabilidad"><? echo $row_mcs_p2['trazabilidad'];?></textarea>
              </div>
      </div>     
  
</fieldset>
