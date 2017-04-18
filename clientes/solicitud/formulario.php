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




mysql_select_db($database_pamfa, $inforgan_pamfa);
 include("includes/header.php");
 include("cerebro.php");?>
<?php

$query_operador = sprintf("SELECT * FROM operador WHERE idoperador=%s", GetSQLValueString( $_SESSION["idoperador"], "int"));
$operador = mysql_query($query_operador, $inforgan_pamfa) or die(mysql_error());
$row_operador= mysql_fetch_assoc($operador);


	
$query_solicitud = sprintf("SELECT * FROM solicitud WHERE idoperador=%s and terminada is NULL order by idsolicitud asc limit 1", GetSQLValueString( $_SESSION["idoperador"], "int"));
$solicitud = mysql_query($query_solicitud, $inforgan_pamfa) or die(mysql_error());
$row_solicitud= mysql_fetch_assoc($solicitud);

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
<div class="panel-heading clearfix"><br>


<form id="myform" action="#seccion1" method="post" class="form-horizontal" enctype="multipart/form-data">
	<div class="row">
		<div class="col-lg-12">
			<p style="font-size:25px; text-align:center;">Solicitud de certificación de producto</p>
			</br>
      </br>
		</div>
		<div class="col-lg-2 col-md-2 col-xs-6 fechas">
			<p class="solicitud">Fecha de solicitud </p>
		</div>
		<div class="col-lg-2 col-md-2 col-xs-6 fechas" style="border-bottom:solid 1px #AAAAAA;">
			<p class="solicitud"><? if(isset($row_solicitud['fecha'])){ echo date('d/m/y',$row_solicitud['fecha']);}else{ echo date('d/m/y',time());}?> </p>
		</div>

		<div class="col-lg-5 col-md-5 col-xs-6 fechas">
			<p class="solicitud">   Nombre de la persona que llena la solicitud: </p>
		</div>
		<div class="col-lg-3 col-md-3 col-xs-6 fechas">
			<p class="solicitud"> <input id="persona" onchange="loadLog()" name="persona" type="text" placeholder=""  class="form-control" title="Nombre " value="<? echo $row_solicitud['persona'];?>" class="form-control"  style="font-size: 18px; text-align:center;"/></p>
		</div>
		<div class="col-lg-12 col-xs-12">
    </br>
			<p class="solicitud" >Estimado cliente, favor de llenar los datos en los espacios requeridos, esta información es necesaria para completar el proceso de certificación de acuerdo al esquema de certificación que usted solicita.</p>
		</div>
	</div>
	<!--
    <table >
    <tr>
    <td width="20%">
    <h3>Fecha de solicitud </h3></td><td width="10%"> <h3><?php if(isset($row_solicitud['fecha'])){ echo date('d/m/y',$row_solicitud['fecha']);}else{ echo date('d/m/y',time());}?> </h3></td><td width="40%">  <h3>   Nombre de la persona que llena la solicitud: </h3></td><td width="30%"><h3><input onchange="this.form.submit()" name="persona" type="text" placeholder=""  class="form-control" title="Nombre " value="<?php echo $row_solicitud['persona'];?>" class="form-control" /></h3></td></tr><tr><td colspan="4">
    
    <h3>Estimado cliente, favor de llenar los datos en los espacios requeridos, esta información es necesaria para completar el proceso de certificación de acuerdo al esquema de certificación que usted solicita.</h3>
    </td></tr></table> -->
	<fieldset>
    <a name="seccion1"></a>
    
    <div id="seccion1" class="row" style="border: solid 1px #AAAAAA; background-color: #ecfbe7">
        <div class="col-md-12" style="text-align: center; background-color:#dbf573e6">
          <label class="solicitud">INFORMACIÓN DEL CLIENTE (Entidad legal y persona de contacto)</label>
        </div>
    		<div class="col-lg-12 col-ms-12 campos" style="border-top: solid 1px #AAAAAA; border-bottom: solid 1px #AAAAAA;">
      		<div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-6 campos" style="border-right: solid 1px #AAAAAA; margin-right: 0px; margin-left: 0px;">
            <label for="nombre_legal" class="form-label col-lg-12 col-md-12 col-sm-12 col-xs-12">Nombre de la entidad legal (empresa o persona):</label>
  			  <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12 campos">
          	<input placeholder=""   class="inputsf form-control" onchange="this.form.submit()" name="nombre_legal" type="text" 	title="Nombre completo " value="<? echo $row_operador['nombre_legal'];?>"  />
      	   </div>
  			 </div>

      	 <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-6 campos" style="margin-right: 0px; margin-left: 0px;">
          	<label for="nombre_representante" class="form-label col-lg-12 col-md-12 col-sm-12 col-xs-12">Nombre del representante legal:</label>
          	<div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12 campos">
          	<input  placeholder="" class="inputsf form-control"  onchange="this.form.submit()" name="nombre_representante" value="<? echo $row_operador['nombre_representante'];?>"  title="Nombre " />
        	</div>
    		  </div>
        </div>

    		<div class="form-group col-lg-12 col-md-12 campos" style="border-bottom: solid 1px #AAAAAA; margin-right: 0px; margin-left: 0px;">
          <div class="col-lg-4 col-sm-4">
        	  <label for="direccion" class="form-label" style="padding-top:5px;">Dirección de la entidad legal: calle y número:</label>
          </div>
        	<div class=" form-group col-lg-8 campos">
        	<input placeholder="" class="form-control inputsf" onchange="this.form.submit()" name="direccion" value="<? echo $row_operador['direccion'];?>"  title="Dirección"  />
        	</div>
        </div>
            <div class="form-group col-lg-12 col-md-12 campos" style="border-bottom: solid 1px #AAAAAA; margin-right: 0px; margin-left: 0px;">
            <div class="col-lg-4 col-sm-4">
        	   <label for="coordenadas" class="form-label">Coordenadas de la entidad legal</label>
            </div>
        	<div class="col-lg-8 campos">
        	<input placeholder="" class="form-control inputsf" onchange="this.form.submit()" name="coordenadas" value="<? echo $row_operador['coordenadas'];?>"  title="Coordenadas"  />
        	</div>
        	</div>

          <div class="col-lg-12 col-sm-12 campos" style="border-bottom: solid 1px #AAAAAA; margin-right: 0px; margin-left: 0px;">
            <div class=" form-group col-lg-2 col-md-2 campos" style="border-right: solid 1px #AAAAAA;margin-right: 0px; margin-left: 0px;" >
            	<label for="cp" class="form-label col-lg-4 col-sm-4">C.P.:</label>
            	<div class="col-lg-8 col-sm-8">
            	<input placeholder="" class="form-control inputsf" onchange="this.form.submit()" name="cp" type="text" title="Codigo postal " value="<?php echo $row_operador['cp'];?>"  />
      	     </div>
    		  </div>
    		<div class="form-group col-lg-4 col-md-4 col-sm-4 campos" style="border-right: solid 1px #AAAAAA; margin-right: 0px; margin-left: 0px;" >
        	<label for="colonia" class="form-label col-lg-4 col-sm-4">Colonia:</label>
        	<div class="col-lg-8 col-sm-4">
        	<input placeholder="" class="form-control inputsf"  onchange="this.form.submit()" name="colonia" value="<?php echo $row_operador['colonia'];?>"  title="Colonia " />
        	</div>
    		</div>
            <div class="form-group col-lg-3 col-md-3 col-sm-3 campos" style="border-right: solid 1px #AAAAAA; margin-right: 0px; margin-left: 0px;">
        	<label for="estado" class="form-label col-lg-4">Estado:</label>
        	<div class="col-lg-8 col-sm-8">
        	<input placeholder="" class="form-control inputsf" onchange="this.form.submit()" name="estado" type="text"  			title="Estado " value="<? echo $row_operador['estado'];?>" />
    	    </div>
    		</div>

    		<div class="form-group col-lg-3 col-md-3 col-sm-3 campos" style="border-right: solid 0px #AAAAAA; margin-right: 0px; margin-left: 0px;">
        	<label for="pais" class="form-label col-lg-4 col-sm-4">Pais:</label>
        	<div class="col-lg-8 col-sm-8">
        	<input placeholder="" class="form-control inputsf" onchange="this.form.submit()" name="pais" value="<? echo  $row_operador['pais'];?>" id="email" title="Pais "  />
        	</div>
    		</div>
      </div>

      <div class="col-lg-12 col-sm-12 campos" style="margin-right: 0px; margin-left: 0px; margin-right: 0px; margin-left: 0px;">
    		<div class=" form-group col-lg-4 col-md-4 col-sm-4 campos" style="border-right: solid 1px #AAAAAA; margin-right: 0px; margin-left: 0px;">
        	<label for="email" class="form-label col-lg-4 col-sm-4">Correo Electrónico:</label>
        	<div class="col-lg-8">
        	<input placeholder="" class="form-control inputsf" onchange="this.form.submit()" name="email" value="<? echo  $row_operador['email'];?>" id="email" title="Email " />
        	</div>
    		</div>

        <div class="form-group col-lg-5 col-md-5 col-sm-5 campos" style="border-right: solid 1px #AAAAAA; margin-right: 0px; margin-left: 0px;">
        	<label for="telefono" class="form-label col-lg-8 col-sm-8">Número de telefono(oficina o personal):</label>
        	<div class="col-lg-4 col-sm-4">
        	<input placeholder="" class="form-control inputsf" onchange="this.form.submit()" name="telefono" type="text" 			title="Telefono " value="<? echo  $row_operador['telefono'];?>"  />
    	    </div>
    		</div>

        <div class="form-group col-lg-3 col-md-3 col-sm-3 campos" style="border-right: solid 0px #AAAAAA; margin-right: 0px; margin-left: 0px;">
        <div class="col-lg-4 col-sm-4 campos">
        	<label for="fax" class="form-label">Fax:</label></div>
        	<div class="col-lg-8 col-sm-8 campos">
        	<input placeholder="" class="form-control inputsf"  onchange="this.form.submit()" name="fax" value="<? echo  $row_operador['fax'];?>" title="Fax "  />
        	</div>
    		</div>
        </div>
      </div> <!-- /ROW-->
    </fieldset>	

	<input type="hidden" id="idoperador" name="idoperador" value="<? echo  $row_operador['idoperador']; ?>" />
	<input type="hidden" id="idsolicitud" name="idsolicitud" value="<? echo  $row_solicitud['idsolicitud']; ?>" />
	<input type="hidden" id="seccion" name="seccion" value="1" />
	<input type="hidden" id="fecha" name="fecha" value="<? echo time();?>" />
</form>

<form id="myform" action="#seccion2" method="post" class="form-horizontal" enctype="multipart/form-data">
<fieldset>
    <a name="seccion2"></a>
	<legend></legend>

	<div id="seccion2" class="row" style="background-color: #ecfbe7; border: solid 1px #AAAAAA;">
	<div class=" form-group col-md-12 campos2" style="margin:0px;">
		<div class="col-md-3 col-sm-6" style="padding: 0px 0px; border: solid 1px #AAAAAA;">
		  <div class="col-md-12" style="background-color:#dbf573e6; height:120px; overflow: hidden; text-overflow:ellipsis;">
			  <b>GGN </b><span style="text-align:justify; height:100%;" >GLOBALG.A.P NUMBER, obligatorio si estuvieron certificados anteriormente con GLOBALG.A.P):</span>
		  </div>
		  <div class="col-md-12 campos" style="height:20%;">
				<input placeholder="" class="form-control inputsf" onchange="this.form.submit()" name="num_ggn" type="text" title="Número" value="<? echo $row_solicitud['num_ggn'];?>" />
		  </div>
		</div>
		<div class="col-md-3 col-sm-6" style="padding: 0px 0px; border:solid 1px #AAAAAA;">
		  <div class="col-md-12" style="background-color:#dbf573e6; height:120px; overflow: hidden; text-overflow:ellipsis;">
		  <b>GLN</b> (Global Localization Number, obligatorio si fue solicitado a GS1):
		  </div>
		  <div class="col-md-12 campos">
		   <input placeholder="" class="form-control inputsf"  onchange="this.form.submit()" name="num_gln" value="<? echo $row_solicitud['num_gln'];?>"  title="Número "  />
		  </div>
		</div>

		<div class="col-md-3 col-sm-6" style="height:100%; padding: 0px 0px; border:solid 1px #AAAAAA;">
		  <div class="col-md-12" style="background-color:#dbf573e6; height:120px;overflow: hidden; text-overflow:ellipsis;">
			  <b>CoC</b> número (CoC NUMBER, obligatorio si estuvieron certificados anteriormente con GLOBALG.A.P):
		  </div>
		  <div class="col-md-12 campos">
				  <input placeholder="" class="form-control inputsf" onchange="this.form.submit()" name="num_coc" value="<? echo $row_solicitud['num_coc'];?>"  title="Número"  />
		  </div>
		</div>

		<div class="col-md-3 col-sm-6" style="height:100%; padding: 0px 0px; border:solid 1px #AAAAAA;">
		  <div class="col-md-12" style="background-color:#dbf573e6; height:120px; overflow: hidden; text-overflow:ellipsis;">
		  <b>Número de registro México Calidad Suprema</b> (obligatorio si ya esta registrado):
		  </div>
		  <div class="col-md-12 campos">
				  <input placeholder="" class="form-control inputsf" onchange="this.form.submit()" name="num_mex_cal_sup" value="<? echo $row_solicitud['num_mex_cal_sup'];?>"  title="Número"  />
		  </div>
		</div>
	</div>
  
  
	<div class=" form-group col-md-12 campos2" style="margin:0px;">
		<div class="col-md-6 col-sm-6" style="padding: 0px 0px; border: solid 1px #AAAAAA;">
		  <div class="col-md-12" style="background-color:#dbf573e6; height:70px; overflow: hidden; text-overflow:ellipsis;">
			  <b>Número PrimusGFS:</b><span style="text-align:justify; height:100%;" >obligatorio si estuvieron certificados anteriormente en el esquema PrimusGFS:</span>
		  </div>
		  <div class="col-md-12 campos" style="height:20%;">
			  <input placeholder="" class="form-control inputsf" onchange="this.form.submit()" name="num_primus" type="text" title="Número " value="<? echo $row_solicitud['num_primus'];?>"  />
		  </div>
		</div>
		<div class="col-md-6 col-sm-6" style="padding: 0px 0px; border:solid 1px #AAAAAA;">
		  <div class="col-md-12" style="background-color:#dbf573e6; height:70px; overflow: hidden; text-overflow:ellipsis;">
		  <b>Número de  registro de SENASICA:</b> <span>obligatorio si se registró con SENASICA:</span>
		  </div>
		  <div class="col-md-12 campos">
			  <input placeholder="" class="form-control inputsf" onchange="this.form.submit()" name="num_senasica" type="text"        title="Número " value="<? echo $row_solicitud['num_senasica'];?>"  />
		  </div>
		</div>
	</div>
      <!-- <div class="col-lg-12 col-md-12">
       // <div class=" col-lg-6 col-md-6">
    	// <input placeholder="" class="form-control" onchange="this.form.submit()" name="num_primus" type="text"  			title="Número " value="<?php echo $row_solicitud['num_primus'];?>"  />
        // </div>
        // <div class="col-lg-1">
        // </div>
    	// <div class="col-lg-5">
    	// <input placeholder="" class="form-control" onchange="this.form.submit()" name="num_senasica" type="text"  			title="Número " value="<?php echo $row_solicitud['num_senasica'];?>"  />
	    // </div>
    // </div>-->
	  <div class="col-lg-12 col-md-12 campos2" style="margin:0px;">
		<div class="col-lg-6 col-md-6" style= "padding: 0px 0px;border:solid 1px #AAAAAA;">
			<div class="col-lg-12 col-md-12 campos">
				<label  class="form-label" for="reponsable" >Nombre del responsable de la aplicación de la norma en la entidad legal:</label>
			</div>
			<div class="col-lg-12 col-md-12 campos">
				<input placeholder="" class="form-control inputsf"  onchange="this.form.submit()" name="responsable" value="<? echo $row_solicitud['responsable'];?>"  title="Responsable "  />
			</div>
        </div>
		<div class="col-lg-6 col-md-6" style="padding: 0px 0px; border:solid 1px #AAAAAA;">
			<div class=" col-lg-12 col-md-12 campos">
				<label  class="form-label"  for="personal" >Nombre del personal que realizó la autoevaluación/auditoria interna en la entidad legal:</label>
			</div>
			<div class="col-lg-12 col-md-12 campos">
				<input placeholder="" class="form-control inputsf"  onchange="this.form.submit()" name="personal" value="<? echo $row_solicitud['personal'];?>"  title="Personal "/>
			</div>
        </div>
      </div>

</div>
    	
    </fieldset>	
    

 <input type="hidden" name="idoperador" value="<? echo $row_operador['idoperador']; ?>" />
<input type="hidden" name="idsolicitud" value="<? echo $row_solicitud['idsolicitud']; ?>" />
  <input type="hidden" name="seccion" value="2" />
 
</form>



<?php include("seccion3.php");?>
<?php include("seccion4.php");?>
<?php include("seccion5.php");?>
<?php include("seccion6.php");?>
<?php include("seccion7.php");?>
<?php include("seccion8.php");?>
<?php include("seccion9.php");?>
<?php include("seccion10.php");?>
<?php include("seccion11.php");?>
<?php include("seccion12.php");?>
<?php include("seccion13.php");?>




</div>
</div>
</div>
</div>
</div>
</div>
 
<script>
function loadLog() {
	var idoperador= document.getElementById('idoperador').value;
	var idsolicitud= document.getElementById('idsolicitud').value;
    var nombre= document.getElementById('persona').value;
	var fecha= document.getElementById('fecha').value;
	var seccion= document.getElementById('seccion').value;
  var xhttp = new XMLHttpRequest();
  xhttp.open("POST", "cerebro.php", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send("persona="+nombre+"&seccion="+seccion+"&idoperador="+idoperador+"&idsolicitud="+idsolicitud+"&fecha="+fecha+"");
}
</script>

<?php include("includes/footer.php");?>
</html>