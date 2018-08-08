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
        
          <script>
<? echo '
  var valorname;
function _(el){
	return document.getElementById(el);
}
function uploadFile3(al,num,num2){
	var equipo=document.getElementById("equipom").value;
	
	var file = _("file3").files[0];
	
	var file2 = _("file4").files[0];
	var formdata = new FormData();
	formdata.append("file3", file);
	
	formdata.append("file4", file2);
	
	formdata.append("idsolicitud", al);
	formdata.append("n",num);
	formdata.append("n2",num2);
	formdata.append("e",equipo);
	var ajax = new XMLHttpRequest();
	ajax.upload.addEventListener("progress", progressHandler2, false);
	ajax.addEventListener("load", completeHandler2, false);
	ajax.addEventListener("error", errorHandler2, false);
	ajax.addEventListener("abort", abortHandler2, false);
	ajax.open("POST", "upload2.php");
	
	ajax.send(formdata);
	
}function progressHandler2(event){
	
	
	//_("loaded_n_total").innerHTML = "Uploaded "+(event.loaded/1024)+" Kb of "+ event.total;
	if(event.loaded==event.total){
	//_("loaded_n_total").innerHTML = "Subiendo "+(event.loaded/1024)+" Kb ";
//
	}
	var percent = (event.loaded / event.total) * 100;
//	_("progressBar").value = Math.round(percent);
	_("status2").innerHTML ="Cargando "+ Math.round(percent)+"% ... Espere";
}
function completeHandler2(event){
	
	 var ruta = $("#rutax").val();
	_("status2").innerHTML = event.target.responseText;
	//_("progressBar").value = 0;
	//location.reload(true);
	 document.getElementById("upload_formx").reset();
	 $("#tabla_ajax").load(ruta); 
	//document.getElementById("upload_form").focus();
}
function errorHandler2(event){
	_("status2").innerHTML = "Falla en Envio";
}
function abortHandler2(event){
	_("status2").innerHTML = "Envio Abortado";
}';?>
</script>
       <form id="upload_formx" enctype="multipart/form-data" method="post"  >
         <input type="hidden" name="idsolicitud" value="<? echo $_POST['idsolicitud'];?>" />
         
  
  
            <div class="col-lg-3 col-xs-3 campos2" style=" padding: 0px 0px; border:solid 1px #AAAAAA; min-height: 80px;">
               <label>Equipo de medición:</label>
              <div class="campos2 div4">
                  <input class="form-control inputsf" id="equipom" name="equipom" placeholder=""type="text"  />
              </div>
            </div>
            <div class="col-lg-3 col-xs-3 campos2" style=" padding: 0px 0px; border:solid 1px #AAAAAA; min-height: 80px;">
               <label>Anexo1:</label>
              <label data-toggle="tooltip" data-placement="top" title="Anexe copia de los certificados de calibración externa de los equipos (laboratorio acreditado), vigente (12 meses)."><i class="material-icons">help_outline</i> </label>
              <div class="campos2 div4">
              <input type="file" name="file3" id="file3"  class="" style="width:100%"  /> </div>
            </div>
            <div class="col-lg-3 col-xs-3 campos2" style=" padding: 0px 0px; border:solid 1px #AAAAAA; min-height: 80px;">
            <label>Anexo2:</label>
             <label data-toggle="tooltip" data-placement="top" title="Anexe copia de los registros de las verificaciones internas que realizan a los equipos de medición donde se utilizó un patrón de referencia con calibración externa."><i class="material-icons">help_outline</i> </label>
             <div class="campos2 div4">
             <input type="file" name="file4" id="file4"  class="" style="width:100%"  /> </div> </div>
            
           
           
            
           
            
            <div class="col-lg-3 col-xs-3 campos2" style=" padding: 0px 0px; border:solid 1px #AAAAAA; min-height: 80px; ">
                
       
         <? $n1=1;
		 $n2=2;?>
 
  <input type="button" value="Subir" onClick="uploadFile3(<?php echo '\''.$_POST['idsolicitud'].'\',\''.$n1.'\',\''.$n2.'\'' ?> )  ; ">
  
  <h3 id="status2"></h3>
 <? /// <p id="loaded_n_total"></p>?>
</form>
                
                
          
               </form>
                </div>
            </div>
<div class="col-lg-12 col-xs-12" style="background-color: #ecfbe7; border: solid 1px #AAAAAA; border-bottom-width:2px;" id="tabla_ajax" >

          <?php

           include('tabla3.php');?>
          </div>

    </div><!-- tabla -->
   </div>
  </div>
  
  
 
  <div id="eval" class="col-lg-12 col-xs-12 campos2">
            
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
			 <input placeholder="" class="form-control inputsf"   id="documento"  name="documento" type="text" 			title="Nombre " value="<?php echo $row_mcs_p2['documento'];?>" style="margin-top:4em;"  />
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

          <div class="col-lg-5 col-xs-4 " >
            <label> Anexe copia de la especificación del muestreo.</label>  </div>
             
            <div class="col-lg-7 col-xs-8 ">
            <script>
<? echo '
  var valorname;
function _(el){
	return document.getElementById(el);
}
function uploadFile2(al){
	var file = _("file2").files[0];
	//alert(file.name+" | "+file.size+" | "+file.type);
	//var b=11;
	var formdata = new FormData();
	formdata.append("file2", file);
	formdata.append("idsolicitud", al);
	//formdata.append("n",id);
	var ajax = new XMLHttpRequest();
	ajax.upload.addEventListener("progress", progressHandler4, false);
	ajax.addEventListener("load", completeHandler4, false);
	ajax.addEventListener("error", errorHandler4, false);
	ajax.addEventListener("abort", abortHandler4, false);
	ajax.open("POST", "upload3.php");
	
	ajax.send(formdata);
	
}
function progressHandler4(event){
	
	//_("loaded_n_total").innerHTML = "Uploaded "+(event.loaded/1024)+" Kb of "+ event.total;
	if(event.loaded==event.total){
	//_("loaded_n_total").innerHTML = "Subiendo "+(event.loaded/1024)+" Kb ";
//
	}
	var percent = (event.loaded / event.total) * 100;
	_("progressBar4").value = Math.round(percent);
	_("status4").innerHTML ="Cargando "+ Math.round(percent)+"% ... Espere";
}
function completeHandler4(event){
	 var ruta = $("#rutay").val();
	_("status4").innerHTML = event.target.responseText;
	_("progressBar4").value = 0;
	//location.reload(true);
	 location.href=""+ruta+""; 
	//document.getElementById("upload_form").focus();
}
function errorHandler4(event){
	_("status4").innerHTML = "Falla en Envio";
}
function abortHandler4(event){
	_("status4").innerHTML = "Envio Abortado";
}';?>
</script>
<? if($row_mcs_p2['anexo']==NULL){
	?>  <form id="upload_form" enctype="multipart/form-data" method="post"  action="#den" >
         <input type="hidden" name="idsolicitud" value="<? echo $_POST['idsolicitud'];?>" />
         
  <input type="file" name="file2" id="file2" style="width:100%"><br>
  
  <input type="button" value="Subir" onClick="<? echo 'uploadFile2('.$_POST['idsolicitud'].')';?>">
  <progress id="progressBar4" value="0" max="100" style="width:200px;"></progress>
  <h3 id="status4"></h3>
 <? /// <p id="loaded_n_total"></p>?>
</form> <? }else{?><form target="_blank" id="form4" name="form4" method="post" action="docs/<?php echo $row_mcs_p2['anexo'];?>">
<input type="submit" name="button3" id="button3" value="Consultar" title="Ver " />
</form> <? }?>  
             
            </div>
             
              </div>
              <br />
         <label style="margin-bottom:16px;" >Si su respuesta es NO, PAMFA le indicara el muestreo a efectuarse en la cotización de servicio.</label> 
                  </div>
        
      <div class="col-lg-12 col-xs-12 campos2">
      <div class="col-lg-12 col-xs-12 campos2" style="border: solid 1px #AAAAAA; min-height: 26px;">
              <b>Describa la trazabilidad del lote.</b>
              <textarea  class="form-control" id="trazabilidad" name="trazabilidad"><? echo $row_mcs_p2['trazabilidad'];?></textarea>
              </div>
      </div>     
  
</fieldset>
