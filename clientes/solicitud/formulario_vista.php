<?php require_once('../../Connections/inforgan_pamfa.php');
if(!session_start())
{
	session_start();
}
?>
<?php 
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  } 
  return $theValue;
}
}



 $dac = basename($_SERVER['PHP_SELF']);
mysql_select_db($database_pamfa, $inforgan_pamfa);
 include("includes/header.php");
 

	 $query_solicitud = sprintf("SELECT * FROM solicitud WHERE idsolicitud=%s order by idsolicitud asc limit 1", GetSQLValueString( $_POST['idsolicitud'], "int"));
$solicitud = mysql_query($query_solicitud, $inforgan_pamfa) or die(mysql_error());
$row_solicitud= mysql_fetch_assoc($solicitud);



$query_operador = sprintf("SELECT * FROM operador WHERE idoperador=%s", GetSQLValueString( $_SESSION["idoperador"], "int"));
$operador = mysql_query($query_operador, $inforgan_pamfa) or die(mysql_error());
$row_operador= mysql_fetch_assoc($operador);

$query_cert_anterior = sprintf("SELECT * FROM cert_anterior WHERE idsolicitud=%s order by idcert_anterior asc limit 1", GetSQLValueString( $row_solicitud["idsolicitud"], "int"));
$cert_anterior = mysql_query($query_cert_anterior, $inforgan_pamfa) or die(mysql_error());
$row_cert_anterior= mysql_fetch_assoc($cert_anterior);

$query_solicitud_esq = sprintf("SELECT * FROM solicitud_esquema WHERE idsolicitud=%s order by idsolicitud_esquema asc limit 1", GetSQLValueString($row_solicitud["idsolicitud"], "int"));
$solicitud_esq = mysql_query($query_solicitud_esq, $inforgan_pamfa) or die(mysql_error());
$row_solicitud_esq= mysql_fetch_assoc($solicitud_esq);

$query_procesadora = sprintf("SELECT * FROM procesadora WHERE idsolicitud=%s order by idprocesadora asc limit 1", GetSQLValueString( $row_solicitud["idsolicitud"], "int"));
$procesadora = mysql_query($query_procesadora, $inforgan_pamfa) or die(mysql_error());
$row_procesadora= mysql_fetch_assoc($procesadora);
 
 


////////
?> 
<div class="content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-12">
                      
                        
<div class="panel panel-white">
<div class="panel-heading clearfix" style="background-color: #ecfbe7;><br>

<input type="hidden" id="ruta" name="ruta" value="<? echo "tabla.php?idsolicitud=".$row_solicitud['idsolicitud']."&seccion=1&idoperador=".$row_operador['idoperador']."";?>" />
<input type="hidden" id="ruta2" name="ruta2" value="<? echo "tabla_anexo.php?idsolicitud=".$row_solicitud['idsolicitud']."&seccion=1&idoperador=".$row_operador['idoperador']."";?>" />
<input type="hidden" id="ruta3" name="ruta3" value="<? echo "tabla_anexo_alm.php?idsolicitud=".$row_solicitud['idsolicitud']."&seccion=1&idoperador=".$row_operador['idoperador']."";?>" />

	 <div id="seccion1"   class="row" style="background-color: #ecfbe7;>
		<div class="col-lg-12">
			<p style="font-size:25px; text-align:center;">Solicitud de certificación de producto</p>
			<br/>
      <br/>
		</div>
		<div class="col-lg-2 col-md-2 col-xs-6 fechas">
			<p class="solicitud">Fecha de solicitud </p>
		</div>
		<div class="col-lg-4 col-md-2 col-xs-6 fechas" style="border-bottom:solid 1px #AAAAAA;">
			
			<input  id="fecha1" name="fecha1"  disabled="disabled" type="text" placeholder=""  <? if(isset($row_solicitud['fecha'])){?>value="<? echo date('d/m/y',$row_solicitud['fecha']);?>"<? }else{ ?> value="<? echo date('d/m/y',time());?>"<? }?>  style="font-size: 18px; text-align:center; width:100%"/>
			
		<?	$f="";
		if(isset($row_solicitud['fecha']))
		{  $f=$row_solicitud['fecha'];}
		else{ $f= time(); }?>
        
        <input type="hidden" name="fecha" id="fecha" value="<? echo $f?>"/>
		</div>

		<div class="col-lg-3 col-md-2 col-xs-12 fechas">
			<p class="solicitud">   Nombre de la persona que llena la solicitud: </p>
		</div>
		<div class="col-lg-3 col-md-2 col-xs-12 fechas">
			<p class="solicitud"> <input id="persona" name="persona" type="text" placeholder=""  title="Nombre " value="<? echo $row_solicitud['persona'];?>" style="font-size: 18px; text-align:center; width:100%"/></p>
		</div>
		<div class="col-lg-12 col-xs-12">
                    <div class="form-group">  
                     <div id="autoSave"></div>  
                </div>
      <br/>
			<p class="solicitud" >Estimado cliente, favor de llenar los datos en los espacios requeridos, esta información es necesaria para completar el proceso de certificación de acuerdo al esquema de certificación que usted solicita.</p>
		</div>
	</div>
    
  <input type="hidden" id="fecha1" name="fecha1" value="<? echo time();?>" />
  
	<fieldset> 
    <div id="seccion2" class="row" style="background-color: #ecfbe7;">
        <div class="col-md-12" style="text-align: center; background-color:#dbf573e6">
          <label class="solicitud">INFORMACIÓN DEL CLIENTE (Entidad legal y persona de contacto)</label>
        </div>
    		<div class="col-lg-12 col-ms-12 campos" style="border-top: solid 1px #AAAAAA; border-bottom: solid 1px #AAAAAA;">
      		<div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-6 campos" style="border-right: solid 1px #AAAAAA; margin-right: 0px; margin-left: 0px;">
            <label for="nombre_legal" class="form-label col-lg-12 col-md-12 col-sm-12 col-xs-12">Nombre de la entidad legal (empresa o persona):</label>
  			  <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12 campos">
          	<input disabled="disabled" class="inputsf form-control" name="nombre_legal" type="text" 	title="Nombre completo " value="<? echo $row_operador['nombre_legal'];?>"  />
      	   </div>
  			 </div>

      	 <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-6 campos" style="margin-right: 0px; margin-left: 0px;">
          	<label for="nombre_representante" class="form-label col-lg-12 col-md-12 col-sm-12 col-xs-12">Nombre del representante legal:</label>
          	<div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12 campos">
          	<input  disabled="disabled" class="inputsf form-control" name="nombre_representante" value="<? echo $row_operador['nombre_representante'];?>"  title="Nombre " />
        	</div>
    		  </div>
        </div>

    		<div class="form-group col-lg-12 col-md-12 campos" style="border-bottom: solid 1px #AAAAAA; margin-right: 0px; margin-left: 0px;">
          <div class="col-lg-4 col-sm-4">
        	  <label for="direccion" class="form-label" style="padding-top:5px;">Dirección de la entidad legal: calle y número:</label>
          </div>
        	<div class=" form-group col-lg-8 campos">
        	<input disabled="disabled" class="form-control inputsf" name="direccion" value="<? echo $row_operador['direccion'];?>"  title="Dirección"  />
        	</div>
        </div>
            <div class="form-group col-lg-12 col-md-12 campos" style="border-bottom: solid 1px #AAAAAA; margin-right: 0px; margin-left: 0px;">
            <div class="col-lg-4 col-sm-4">
        	   <label for="coordenadas" class="form-label">Coordenadas de la entidad legal</label>
            </div>
        	<div class="col-lg-8 campos">
        	<input disabled="disabled" class="form-control inputsf" name="coordenadas" value="<? echo $row_operador['coordenadas'];?>"  title="Coordenadas"  />
        	</div>
        	</div>

          <div class="col-lg-12 col-sm-12 campos" style="border-bottom: solid 1px #AAAAAA; margin-right: 0px; margin-left: 0px;">
            <div class=" form-group col-lg-2 col-md-2 campos" style="border-right: solid 1px #AAAAAA;margin-right: 0px; margin-left: 0px;" >
            	<label for="cp" class="form-label col-lg-4 col-sm-4">C.P.:</label>
            	<div class="col-lg-8 col-sm-8">
            	<input disabled="disabled" class="form-control inputsf" name="cp" type="text" title="Codigo postal " value="<?php echo $row_operador['cp'];?>"  />
      	     </div>
   		    </div>
    		<div class="form-group col-lg-4 col-md-4 col-sm-4 campos" style="border-right: solid 1px #AAAAAA; margin-right: 0px; margin-left: 0px;" >
        	<label for="colonia" class="form-label col-lg-4 col-sm-4">Colonia:</label>
        	<div class="col-lg-8 col-sm-4">
        	<input disabled="disabled" class="form-control inputsf" name="colonia" value="<?php echo $row_operador['colonia'];?>"  title="Colonia " />
        	</div>
    		</div>
            <div class="form-group col-lg-3 col-md-3 col-sm-3 campos" style="border-right: solid 1px #AAAAAA; margin-right: 0px; margin-left: 0px;">
        	<label for="estado" class="form-label col-lg-4">Estado:</label>
        	<div class="col-lg-8 col-sm-8">
        	<input disabled="disabled" class="form-control inputsf" name="estado" type="text"  			title="Estado " value="<? echo $row_operador['estado'];?>" />
    	    </div>
    		</div>

    		<div class="form-group col-lg-3 col-md-3 col-sm-3 campos" style="border-right: solid 0px #AAAAAA; margin-right: 0px; margin-left: 0px;">
        	<label for="pais" class="form-label col-lg-4 col-sm-4">Pais:</label>
        	<div class="col-lg-8 col-sm-8">
        	<input disabled="disabled" class="form-control inputsf" name="pais" value="<? echo  $row_operador['pais'];?>" id="email" title="Pais "  />
        	</div>
    		</div>
      </div>

      <div class="col-lg-12 col-sm-12 campos" style="margin-right: 0px; margin-left: 0px; margin-right: 0px; margin-left: 0px;">
    		<div class=" form-group col-lg-4 col-md-4 col-sm-4 campos" style="border-right: solid 1px #AAAAAA; margin-right: 0px; margin-left: 0px;">
        	<label for="email" class="form-label col-lg-4 col-sm-4">Correo Electrónico:</label>
        	<div class="col-lg-8">
        	<input disabled="disabled" class="form-control inputsf" name="email" value="<? echo  $row_operador['email'];?>" id="email" title="Email " />
        	</div>
    		</div>

        <div class="form-group col-lg-5 col-md-5 col-sm-5 campos" style="border-right: solid 1px #AAAAAA; margin-right: 0px; margin-left: 0px;">
        	<label for="telefono" class="form-label col-lg-8 col-sm-8">Número de telefono(oficina o personal):</label>
        	<div class="col-lg-4 col-sm-4">
        	<input disabled="disabled" class="form-control inputsf" name="telefono" type="text" 			title="Telefono " value="<? echo  $row_operador['telefono'];?>"  />
    	    </div>
   		</div>

        <div class="form-group col-lg-3 col-md-3 col-sm-3 campos" style="border-right: solid 0px #AAAAAA; margin-right: 0px; margin-left: 0px;">
        <div class="col-lg-4 col-sm-4 campos">
        	<label for="fax" class="form-label">Fax:</label></div>
        	<div class="col-lg-8 col-sm-8 campos">
        	<input disabled="disabled" class="form-control inputsf" name="fax" value="<? echo  $row_operador['fax'];?>" title="Fax "  />
        	</div>
   		</div>
      </div>
      </div> <!-- /ROW-->
    </fieldset>	

<fieldset>

	<div id="seccion2" class="row" style="background-color: #ecfbe7;" >
  
	<div class=" form-group col-md-12 campos2" style="margin:0px;">
		<div class="col-md-3 col-sm-6" style="padding: 0px 0px; border: solid 1px #AAAAAA;">
		  <div class="col-md-12" style="background-color:#dbf573e6; height:120px; overflow: hidden; text-overflow:ellipsis;">
			  <b>GGN </b><span style="text-align:justify; height:100%;" >GLOBALG.A.P NUMBER, obligatorio si estuvieron certificados anteriormente con GLOBALG.A.P):</span>
		  </div>
		  <div class="col-md-12 campos" style="height:20%;">
				<input placeholder="" class="form-control inputsf" id="num_ggn" onchange="loadLog2()" name="num_ggn" type="text" title="Número" value="<? echo $row_solicitud['num_ggn'];?>" />
		  </div>
		</div>
		<div class="col-md-3 col-sm-6" style="padding: 0px 0px; border:solid 1px #AAAAAA;">
		  <div class="col-md-12" style="background-color:#dbf573e6; height:120px; overflow: hidden; text-overflow:ellipsis;">
		  <b>GLN</b> (Global Localization Number, obligatorio si fue solicitado a GS1):
		  </div>
		  <div class="col-md-12 campos">
		   <input placeholder="" class="form-control inputsf"  id="num_gln" onchange="loadLog2()" name="num_gln" value="<? echo $row_solicitud['num_gln'];?>"  title="Número "  />
		  </div>
		</div>

		<div class="col-md-3 col-sm-6" style="height:100%; padding: 0px 0px; border:solid 1px #AAAAAA;">
		  <div class="col-md-12" style="background-color:#dbf573e6; height:120px;overflow: hidden; text-overflow:ellipsis;">
			  <b>CoC</b> número (CoC NUMBER, obligatorio si estuvieron certificados anteriormente con GLOBALG.A.P):
		  </div>
		  <div class="col-md-12 campos">
				  <input placeholder="" class="form-control inputsf"  id="num_coc" onchange="loadLog2()" name="num_coc" value="<? echo $row_solicitud['num_coc'];?>"  title="Número"  />
		  </div>
		</div>

		<div class="col-md-3 col-sm-6" style="height:100%; padding: 0px 0px; border:solid 1px #AAAAAA;">
		  <div class="col-md-12" style="background-color:#dbf573e6; height:120px; overflow: hidden; text-overflow:ellipsis;">
		  <b>Número de registro México Calidad Suprema</b> (obligatorio si ya esta registrado):
		  </div>
		  <div class="col-md-12 campos">
				  <input placeholder="" class="form-control inputsf" id="num_mex_cal_sup" onchange="loadLog2()" name="num_mex_cal_sup" value="<? echo $row_solicitud['num_mex_cal_sup'];?>"  title="Número"  />
		  </div>
		</div>
	</div>
  
  
	<div class=" form-group col-md-12 campos2" style="margin:0px;">
		<div class="col-md-6 col-sm-6" style="padding: 0px 0px; border: solid 1px #AAAAAA;">
		  <div class="col-md-12" style="background-color:#dbf573e6; height:70px; overflow: hidden; text-overflow:ellipsis;">
			  <b>Número PrimusGFS:</b><span style="text-align:justify; height:100%;" >obligatorio si estuvieron certificados anteriormente en el esquema PrimusGFS:</span>
		  </div>
		  <div class="col-md-12 campos" style="height:20%;">
			  <input placeholder="" class="form-control inputsf"  id="num_primus" onchange="loadLog2()" name="num_primus" type="text" title="Número " value="<? echo $row_solicitud['num_primus'];?>"  />
		  </div>
		</div>
		<div class="col-md-6 col-sm-6" style="padding: 0px 0px; border:solid 1px #AAAAAA;">
		  <div class="col-md-12" style="background-color:#dbf573e6; height:70px; overflow: hidden; text-overflow:ellipsis;">
		  <b>Número de  registro de SENASICA:</b> <span>obligatorio si se registró con SENASICA:</span>
		  </div>
		  <div class="col-md-12 campos">
			  <input placeholder="" class="form-control inputsf" id="num_senasica" onchange="loadLog2()" name="num_senasica" type="text"        title="Número " value="<? echo $row_solicitud['num_senasica'];?>"  />
		  </div>
		</div>
	</div>
	  <div class="col-lg-12 col-md-12 campos2" style="margin:0px;">
		<div class="col-lg-6 col-md-6" style= "padding: 0px 0px;border:solid 1px #AAAAAA;">
			<div class="col-lg-12 col-md-12 campos">
				<label  class="form-label" for="reponsable" >Nombre del responsable de la aplicación de la norma en la entidad legal:</label>
			</div>
			<div class="col-lg-12 col-md-12 campos">
				<input placeholder="" class="form-control inputsf"  id="responsable" onchange="loadLog2()" name="responsable" value="<? echo $row_solicitud['responsable'];?>"  title="Responsable "  />
			</div>
        </div>
		<div class="col-lg-6 col-md-6" style="padding: 0px 0px; border:solid 1px #AAAAAA;">
			<div class=" col-lg-12 col-md-12 campos">
				<label  class="form-label"  for="personal" >Nombre del personal que realizó la autoevaluación/auditoria interna en la entidad legal:</label>
			</div>
			<div class="col-lg-12 col-md-12 campos">
				<input placeholder="" class="form-control inputsf"  id="personal" onchange="loadLog2()" name="personal" value="<? echo $row_solicitud['personal'];?>"  title="Personal "/>
			</div>
        </div>
      </div>

      
      
     
</div>
</fieldset>	
 
<?
 include("seccion3.php");?>
<?php include("seccion4.php");?>
<?php include("seccion5.php");
for($d=0;$d<3;$d++){
?>
 <script type="text/javascript"> 

 <? echo '

$(document).ready(function(){  
        $("#esq_tipo1_op1'.$d.'").click(function() {  
		
			 if(($("#esq_tipo1_op10").is(":checked"))|| ($("#esq_tipo1_op11").is(":checked"))|| ($("#esq_tipo1_op12").is(":checked")) || ($("#esq_tipo2_op10").is(":checked"))|| ($("#esq_tipo2_op11").is(":checked"))) {  ';
  echo "document.getElementById('preg61').disabled = false;
  document.getElementById('preg62').disabled = false;
    
              
			 
			document.getElementById('preg71').disabled = false; 
			document.getElementById('preg72').disabled = false; 
			document.getElementById('preg81').disabled = false; 
			document.getElementById('preg82').disabled = false; ";
echo'
    } else {  ';			echo "  document.getElementById('preg61').disabled = true;
	 document.getElementById('preg62').disabled = true;
    
        document.getElementById('preg71').disabled = true; 
		 document.getElementById('preg72').disabled = true; 
			document.getElementById('preg81').disabled = true; 
			document.getElementById('preg82').disabled = true; ";echo ' 
	        } 
		
	});
	if('.$d.'<2){
	 $("#esq_tipo2_op1'.$d.'").click(function() {  
		
			 if(($("#esq_tipo1_op10").is(":checked"))|| ($("#esq_tipo1_op11").is(":checked"))|| ($("#esq_tipo1_op12").is(":checked")) || ($("#esq_tipo2_op10").is(":checked"))|| ($("#esq_tipo2_op11").is(":checked"))) {  ';
  echo "document.getElementById('preg61').disabled = false;
  document.getElementById('preg62').disabled = false;
    
              
			 
			document.getElementById('preg71').disabled = false; 
			document.getElementById('preg72').disabled = false; 
			document.getElementById('preg81').disabled = false; 
			document.getElementById('preg82').disabled = false; ";
echo'
    } else {  ';			echo "  document.getElementById('preg61').disabled = true;
	 document.getElementById('preg62').disabled = true;
    
        document.getElementById('preg71').disabled = true; 
		 document.getElementById('preg72').disabled = true; 
			document.getElementById('preg81').disabled = true; 
			document.getElementById('preg82').disabled = true; ";echo ' 
	        } 
		
	});}
	 });  ';?>
			</script><? 
}
?>
<?php  include("seccion6.php");?>
<?php include("seccion7.php");?>

<?php include("seccion8.php");
		/*		
for($d=0;$d<$total_primus;$d++){
?>
 <script type="text/javascript"> 

 <? echo '

$(document).ready(function(){  
    $("#primus'.$d.'").click(function() {  
       if(($("#primus2").is(":checked"))|| ($("#primus3").is(":checked"))|| ($("#primus4").is(":checked"))|| ($("#primus5").is(":checked")) || ($("#primus6").is(":checked")) ||($("#idmex_alcance0").is(":checked"))||($("#idsrrc1").is(":checked"))) {  ';
  echo "document.getElementById('seccion10').style.display = 'block';";
echo'
    } else {  ';			echo "document.getElementById('seccion10').style.display = 'none';";echo ' 
	        } 
		if(($("#primus0").is(":checked"))|| ($("#primus1").is(":checked")) ||($("#idmex_alcance1").is(":checked"))|| ($("#idsrrc0").is(":checked"))|| ($("#idsrrc2").is(":checked")) ||($("#idsrrc3").is(":checked"))|| ($("#idsrrc4").is(":checked"))) {  ';
  echo "document.getElementById('seccion9').style.display = 'block';";
echo'
    } else {  ';			echo "document.getElementById('seccion9').style.display = 'none';";echo '
        }  
    });    
});';?>
			</script><? 
}
*/?><?
//////////////////
for($d=0;$d<2;$d++){
?>
<script type="text/javascript"> 

 <? echo '

$(document).ready(function(){  
    $("#idmex_alcance'.$d.'").click(function() {  
       if(($("#idmex_alcance1").is(":checked"))) {  ';
  echo "document.getElementById('seccion9').style.display = 'block';";
echo'
    } else  if(($("#primus0").is(":checked"))|| ($("#primus1").is(":checked"))|| ($("#idsrrc0").is(":checked"))|| ($("#idsrrc2").is(":checked")) ||($("#idsrrc3").is(":checked"))|| ($("#idsrrc4").is(":checked"))){  ';			echo "document.getElementById('seccion9').style.display = 'block';";echo ' 
	        } else { ';			echo "document.getElementById('seccion9').style.display = 'none';";echo ' }
			
			
	 if(($("#idmex_alcance0").is(":checked"))) {  ';
  echo "document.getElementById('seccion10').style.display = 'block';";
echo'
    } else  if(($("#primus2").is(":checked"))|| ($("#primus3").is(":checked"))|| ($("#primus4").is(":checked"))|| ($("#primus5").is(":checked")) || ($("#primus6").is(":checked"))||($("#idsrrc1").is(":checked"))){  ';			echo "document.getElementById('seccion10').style.display = 'block';";echo ' 
	        } else { ';			echo "document.getElementById('seccion10').style.display = 'none';";echo ' }
    });    
});';?>
			</script><? 
}
//////////////////
for($d=0;$d<6;$d++){
?>
<script type="text/javascript"> 

 <? echo '

$(document).ready(function(){  
    $("#idsrrc'.$d.'").click(function() {  
       if(($("#primus0").is(":checked"))|| ($("#primus1").is(":checked"))||($("#idmex_alcance1").is(":checked"))|| ($("#idsrrc0").is(":checked"))|| ($("#idsrrc2").is(":checked")) ||($("#idsrrc3").is(":checked"))|| ($("#idsrrc4").is(":checked"))) {  ';
  echo "document.getElementById('seccion9').style.display = 'block';";
echo'
    } else  if(($("#idsrrc1").is(":checked"))){  ';			echo "document.getElementById('seccion9').style.display = 'none';";echo ' 
	        } else { ';			echo "document.getElementById('seccion9').style.display = 'none';";echo ' }
			
			
	 if(($("#idsrrc1").is(":checked"))) {  ';
  echo "document.getElementById('seccion10').style.display = 'block';";
echo'
    } else  if(($("#primus2").is(":checked"))|| ($("#primus3").is(":checked"))|| ($("#primus4").is(":checked"))|| ($("#primus5").is(":checked")) || ($("#primus6").is(":checked"))||($("#idmex_alcance0").is(":checked"))){  ';			echo "document.getElementById('seccion10').style.display = 'block';";echo ' 
	        } else { ';			echo "document.getElementById('seccion10').style.display = 'none';";echo ' }
    });    
});';?>
			</script><? 
}




include("seccion9.php");
?>

<?php include("seccion10.php");?>
<?php include("seccion11.php");?>
<?php include("seccion12.php");?>

<?php include("anexo_producto.php");?>
<script type="text/javascript"> 

 <? echo '

$(document).ready(function(){  
    $("#anexo").click(function() { '; echo '
 if (!$("#anexo_producto").is(":visible"))
   $("#anexo_producto").show();
  
else   
   $("#anexo_producto").hide();';
	echo ' 
    });    
});';?>
			</script>
            
            
            <?php include("anexo_alm.php");?>
<script type="text/javascript"> 

 <? echo '

$(document).ready(function(){  
    $("#anexo2").click(function() { '; echo '
 if (!$("#anexo_alm").is(":visible"))
   $("#anexo_alm").show();
   
else   
   $("#anexo_alm").hide();';
	echo ' 
    });    
});';?>
			</script>

<?php include("seccion13.php");
?>



</div>
</div>
</div>
</div>
</div>
</div>



<?php include("includes/footer.php");?>
</html>