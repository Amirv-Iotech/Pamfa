<fieldset>
</br>
   <div  id="den" class="col-lg-12 col-xs-12 campos2" style="text-align: center;background-color: #dbf573e6; border: solid 1px #AAAAAA; margin-right: 0px; margin-left: 0px;">
        <h4><b>Denominación de origen</b></h4>
      </div>
        
      <div class="col-lg-12 col-xs-12 campos2">
      <div class="col-lg-12 col-xs-12 campos2" style="border: solid 1px #AAAAAA; min-height: 26px;">
              <b>Productos:</b>
              <?  $query_den = sprintf("SELECT * FROM den_origen order by idden_origen asc");
             // $mcs = mysql_query($query_mcs, $inforgan_pamfa) or die(mysql_error());
              $den = mysql_query($query_den, $inforgan_pamfa) or die(mysql_error());?>
            
              </div><?
               while($row_den= mysql_fetch_assoc($den))
            {
              ?><div class="col-lg-3 col-xs-6 campos2" style=" padding: 0px 0px; border:solid 1px #AAAAAA;">
               
              <label><input   type="radio" <? if ($row_sol_origen['idden_origen']==$row_den['idden_origen']){?> checked="checked"<? }?>  value="<? echo $row_den['idden_origen'];?>" id="den_or"  name="den_or"/><? echo $row_den['descripcion'];?></label></div>
              <?
           $mcont++; }?>
          </div>
               <div class="col-lg-12 col-xs-12 campos2" style="border: solid 1px #AAAAAA; min-height: 26px;">
              <b>Descripción del producto que ostentará el logotipo y, en su caso la forma en que los insumos o partes mexicanas se utilizan en el proceso productivo</b>
              <div class="col-lg-8 col-xs-8 " >
            <label> Anexos: 
<br />Constancia expedida por órgano competente que acredite que el establecimiento donde se realiza la actividad del solicitante, se encuentra dentro del territorio señalado en la declaración correspondiente (original o copia certificada).
</label>  </div>
             
            <div class="col-lg-4 col-xs-4 ">
            <script>
<? echo '
  var valorname;
function _(el){
	return document.getElementById(el);
}
function uploadFile(al,id){
	var file = _("file1").files[0];
	//alert(file.name+" | "+file.size+" | "+file.type);
	//var b=11;
	var formdata = new FormData();
	formdata.append("file1", file);
	formdata.append("idsolicitud", al);
	//formdata.append("n",id);
	var ajax = new XMLHttpRequest();
	ajax.upload.addEventListener("progress", progressHandler, false);
	ajax.addEventListener("load", completeHandler, false);
	ajax.addEventListener("error", errorHandler, false);
	ajax.addEventListener("abort", abortHandler, false);
	ajax.open("POST", "upload4.php");
	
	ajax.send(formdata);
	
}
function progressHandler(event){
	
	//_("loaded_n_total").innerHTML = "Uploaded "+(event.loaded/1024)+" Kb of "+ event.total;
	if(event.loaded==event.total){
	//_("loaded_n_total").innerHTML = "Subiendo "+(event.loaded/1024)+" Kb ";
//
	}
	var percent = (event.loaded / event.total) * 100;
	_("progressBar").value = Math.round(percent);
	_("status3").innerHTML ="Cargando "+ Math.round(percent)+"% ... Espere";
}
function completeHandler(event){
	 var ruta = $("#rutaz").val();
	_("status3").innerHTML = event.target.responseText;
	_("progressBar").value = 0;
	//location.reload(true);
	 location.href=""+ruta+""; 
	//document.getElementById("upload_form").focus();
}
function errorHandler(event){
	_("status3").innerHTML = "Falla en Envio";
}
function abortHandler(event){
	_("status3").innerHTML = "Envio Abortado";
}';?>
</script>
<? if($row_sol_origen['anexo']==NULL){
	?>  <form id="upload_form" enctype="multipart/form-data" method="post"  action="#den" >
         <input type="hidden" name="idsolicitud" value="<? echo $_POST['idsolicitud'];?>" />
         
  <input type="file" name="file1" id="file1"><br>
  
  <input type="button" value="Subir" onClick="<? echo 'uploadFile('.$_POST['idsolicitud'].')';?>">
  <progress id="progressBar" value="0" max="100" style="width:300px;"></progress>
  <h3 id="status3"></h3>
 <? /// <p id="loaded_n_total"></p>?>
</form> <? }else{?><form target="_blank" id="form4" name="form4" method="post" action="docs/<?php echo $row_sol_origen['anexo'];?>">
<input type="submit" name="button3" id="button3" value="Consultar" title="Ver " />
</form> <? }?>
           
             
            </div>
              </div>
              
      </div>     
  
</fieldset>
