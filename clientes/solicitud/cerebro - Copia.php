<?php require_once('sici.php'); ?>
<?php
error_reporting(0);
mysql_select_db($database_sici, $sici);

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

//comprobar si solicitud cumple con requisitos minimos
$completo=1;
//alcance
$query_dato_agregado = sprintf("SELECT count(*) as total FROM alcance where idalcance in(select idalcance from solicitud_alcance WHERE idsolicitud = %s)",
GetSQLValueString($_POST['idsolicitud'], "int"));
$dato_agregado = mysql_query($query_dato_agregado, $sici) or die(mysql_error());
$row_dato_agregado = mysql_fetch_assoc($dato_agregado);
if($row_dato_agregado['total']==0){$completo=0;}

//unidad productiva
$query_dato_agregado = sprintf("SELECT count(*) as total FROM solicitud_unidad_productiva WHERE idsolicitud = %s", GetSQLValueString($_POST['idsolicitud'], "int"));
$dato_agregado = mysql_query($query_dato_agregado, $sici) or die(mysql_error());
$row_dato_agregado = mysql_fetch_assoc($dato_agregado);
if($row_dato_agregado['total']==0){$completo=0;}

//productos
$query_dato_agregado = sprintf("SELECT count(*) as total FROM productos WHERE idsolicitud = %s order by idproductos asc", GetSQLValueString($_POST['idsolicitud'], "int"));
$dato_agregado = mysql_query($query_dato_agregado, $sici) or die(mysql_error());
$row_dato_agregado = mysql_fetch_assoc($dato_agregado);
if($row_dato_agregado['total']==0){$completo=0;}

//normas
$query_dato_agregado = sprintf("SELECT count(*) as total FROM normas_certimex where adicional is null and idnorma_certimex in(select idnormas_certimex FROM solicitud_norma WHERE idsolicitud = %s)", GetSQLValueString($_POST['idsolicitud'], "int")); 
$dato_agregado = mysql_query($query_dato_agregado, $sici) or die(mysql_error());
$row_dato_agregado = mysql_fetch_assoc($dato_agregado);
if($row_dato_agregado['total']==0){$completo=0;}

if($completo==1){$_POST['captura_completa']="SI";}else{$_POST['captura_completa']="NO";}
//fin requisitos minimos



if(isset($_POST['notificar']))
{
//organizacion
$query_organizacion = sprintf("SELECT * FROM organizacion WHERE idclientes in(select idclientes from solicitud where idsolicitud=%s)", GetSQLValueString($_POST['idsolicitud'], "int"));
$organizacion = mysql_query($query_organizacion, $sici) or die(mysql_error());
$row_organizacion = mysql_fetch_assoc($organizacion);
$totalRows_organizacion = mysql_num_rows($organizacion);
//consultar respuestas con observaciones
$query_obs = sprintf("SELECT count(*) as total FROM solicitud_observacion WHERE idsolicitud=%s", GetSQLValueString($_POST['idsolicitud'], "int"));
$obs = mysql_query($query_obs, $sici) or die(mysql_error());
$row_obs = mysql_fetch_assoc($obs);
$totalRows_obs = $row_obs['total'];
//notificacion email
$remitente = "Plataforma e-CERTIMEX<donotreply@certimexsc.com>";
$asunto= "Solicitud revisada";
$mensaje='
<table width="99%" border="0" align="center">
  <tr>
    <td bgcolor="#99CC33" style="font-family: Arial, Helvetica, sans-serif; font-weight: bold; color: #FFF; font-size: 18px; text-align: center;">CERTIMEX, Notificación automatica</td>
  </tr>
  <tr>
    <td height="200" bgcolor="#CCFF66" style="font-family: Arial, Helvetica, sans-serif; font-size: 18px; color: #9C3; font-weight: bold; text-align: center;">
	<br>
	Tu solicitud de inspección ha sido revisada, tienes '.$totalRows_obs.' observaciones, por favor, ingresa a tu cuenta de eCertimex en la siguiente dirección:<br><br><center>
http://www.certimexsc.com/ecertimex/</center>
    </td>
  </tr>
  <tr>
    <td align="center" bgcolor="#99CC33"><span style="font-family: Arial, Helvetica, sans-serif; font-weight: bold; color: #CF6;">CERTIMEX SC</span><br />
      <span style="font-family: Arial, Helvetica, sans-serif; font-size: 12px; color: #FFF; font-weight: bold;">Calle 16 de septiembre N° 204, Ejido Guadalupe Victoria, Oaxaca, Oaxaca, MEXICO, C.P. 68026 <br />
      Tels: 01 951 520 2687 / 01 951 520 0617<br />
      certimex@certimexsc.com<br />www.certimexsc.com</span><br />
      <span style="font-family: Arial, Helvetica, sans-serif; color: #CF6; font-weight: bold; font-size: 12px;">© 2013 CERTIMEX S.C, Derechos Reservados</span>
</td>
  </tr>
</table>
';
$encabezados = "From: $remitente\nReply-To: $remitente\nContent-Type: text/html; charset=iso-8859-1";
$destino1=$row_organizacion['email'];
mail($destino1, $asunto, $mensaje, $encabezados) or die ("Su mensaje no se envio.");
mail("ar", $asunto, $mensaje, $encabezados) or die ("Su mensaje no se envio.");
//mail("isc.jesusmartinez@gmail.com", $asunto, $mensaje, $encabezados) or die ("Su mensaje no se envio.");
$mensaje="Notificación enviada";
}


/////////////////inser prod

if (isset($_POST["insertar_prod"])) {
  $insertSQL = sprintf("INSERT INTO productos (idsolicitud, nombre, descripcion, multiingrediente) VALUES (%s, %s, %s, %s)",
             GetSQLValueString($_POST['idsolicitud'], "int"),
             GetSQLValueString($_POST['nombre'], "text"),
						 GetSQLValueString($_POST['descripcion'], "text"),
					   GetSQLValueString($_POST['MI'], "text"));
  $Result1 = mysql_query($insertSQL, $sici) or die(mysql_error());
}
///////fin
///////mod prod
if (isset($_POST["modificar_prod"])) {
  $deleteSQL = sprintf("update productos set nombre=%s, descripcion=%s,contenido_organico=10000 WHERE idproductos=%s",
  GetSQLValueString($_POST['nombre'], "text"),
	GetSQLValueString($_POST['descripcion'], "text"),
	
	GetSQLValueString($_POST['idproductos'], "int"));
  $Result1 = mysql_query($deleteSQL, $sici) or die(mysql_error());
}
/////fin
///eliminar prod
if (isset($_POST["eliminar_prod"])) {
  $deleteSQL = sprintf("DELETE FROM productos WHERE idproductos=%s",
             GetSQLValueString($_POST['idproductos'], "int"));
  $Result1 = mysql_query($deleteSQL, $sici) or die(mysql_error());
	
}

///////fin 
//////////unid_prod
if(isset($_POST["insertar_unid_prod"])) {
  $insertSQL = sprintf("INSERT INTO solicitud_unidad_productiva (idsolicitud, idunidad_productiva, up_cantidad, personal_cantidad) VALUES (%s, %s, %s, %s)",
                       GetSQLValueString($_POST['idsolicitud'], "int"),
                       GetSQLValueString($_POST['idunidad_productiva'], "int"),
                       GetSQLValueString($_POST['up_cantidad'], "text"),
                       GetSQLValueString($_POST['personal_cantidad'], "int"));

  $Result1 = mysql_query($insertSQL, $sici) or die(mysql_error());
}
////////////fin iser unid_prod

/////////eliminar unid prod

if (isset($_POST['eliminar_unid_prod'])) {
  $deleteSQL = sprintf("DELETE FROM solicitud_unidad_productiva WHERE idsup=%s",
                       GetSQLValueString($_POST['idsup'], "int"));
  $Result1 = mysql_query($deleteSQL, $sici) or die(mysql_error());
}
//////fin
/////////////agregar alcance
if (isset($_POST['alcance_add'])) {


$query_existe = sprintf("SELECT idv17_alcance  FROM v17_solicitud_alcance  where idsolicitud=%s and idnorma_certimex=%s and idv17_alcance IS NOT NULL",
 GetSQLValueString($_POST['idsolicitud'], "int"),
 GetSQLValueString($_POST['norma'], "int")  );
$existe = mysql_query($query_existe, $sici) or die(mysql_error());
$row_existe = mysql_fetch_assoc($existe);
$totalRows_existe = mysql_num_rows($existe);


if($row_existe['idv17_alcance']!=NULL)
{
	$insertSQL = sprintf("INSERT INTO v17_solicitud_alcance (idsolicitud, idnorma_certimex, idv17_alcance) VALUES (%s, %s, %s)",
                      GetSQLValueString($_POST['idsolicitud'], "int"),
                       GetSQLValueString($_POST['norma'], "int") ,
                      GetSQLValueString($_POST['idalcance'], "int"));



	


}
else
{
 
 $insertSQL = sprintf("update v17_solicitud_alcance  set idv17_alcance=%s  where idsolicitud=%s and idnorma_certimex=%s",

  GetSQLValueString($_POST['idalcance'], "int"),
   GetSQLValueString($_POST['idsolicitud'], "int"),
                       GetSQLValueString($_POST['norma'], "int") );
}
  $Result1 = mysql_query($insertSQL, $sici) or die(mysql_error());	
   $mensaje="Alcance Agregado correctamente";
}


///////////////fin 
/////////////////borrar alcance
if(isset($_POST['alcance_delete']))
{
		
	
	
	
$deleteSQL = sprintf("DELETE FROM v17_solicitud_alcance WHERE (idsolicitud=%s AND idv17_alcance=%s)",
GetSQLValueString($_POST['idsolicitud'], "int"),
GetSQLValueString($_POST['idv17_alcance'], "int"));
$Result1 = mysql_query($deleteSQL, $sici) or die(mysql_error());
  $mensaje="Alcance removido correctamente";

}
///////fin
////////insertar norma
if (isset($_POST["insertar_norma"]) ){
	
	
  $insertSQL = sprintf("INSERT INTO v17_solicitud_alcance (idsolicitud,idnorma_certimex) VALUES (%s, %s)",
                       GetSQLValueString($_POST['idsolicitud'], "int"),
                       GetSQLValueString($_POST['idnorma_certimex'], "int"));
  $Result1 = mysql_query($insertSQL, $sici) or die(mysql_error());
}
/////////////fin
///////eliminar norma
if (isset($_POST['eliminar_norma'])) {
  $deleteSQL = sprintf("DELETE FROM v17_solicitud_alcance WHERE idnorma_certimex=%s AND idsolicitud=%s",
                       GetSQLValueString($_POST['idnorma_certimex'], "int"),
					   GetSQLValueString($_POST['idsolicitud'], "int"));
					   
					   
  $Result1 = mysql_query($deleteSQL, $sici) or die(mysql_error());
}

//////////fin
//////////////seccion 6
if($_POST['seccion6'])
{
	
	
$query_sol_pcion = sprintf("SELECT * FROM produccion where idsolicitud=%s",
	GetSQLValueString($_POST['idsolicitud'], "int"));
$sol_pcion  = mysql_query($query_sol_pcion, $sici) or die(mysql_error());
$row_sol_pcion = mysql_fetch_assoc($sol_pcion);
$totalsol_pcion = mysql_num_rows($sol_pcion);


if($totalsol_pcion>0)
{
 $insertSQL = sprintf("update produccion set area_cultivo=%s where idsolicitud=%s",

GetSQLValueString($_POST['area_cultivo'], "text"),

GetSQLValueString($_POST['idsolicitud'], "int"));	
}
else{
$insertSQL = sprintf("INSERT INTO produccion (idsolicitud, area_cultivo) VALUES (%s, %s)",
 GetSQLValueString($_POST['idsolicitud'], "int"),
 GetSQLValueString($_POST['area_cultivo'], "text"));
 
 
  
}
 
  $Result1 = mysql_query($insertSQL, $sici) or die(mysql_error());
  
  $insertSQL = sprintf("update solicitud set num_integrantes=%s where idsolicitud=%s",

GetSQLValueString($_POST['num_integrantes'], "int"),

GetSQLValueString($_POST['idsolicitud'], "int"));

  $Result1 = mysql_query($insertSQL, $sici) or die(mysql_error());
	$mensaje="Información guardada";
	
	
	
	
	////////////////num parcelas
if($_POST['save_parc']){
	echo "entras en save";

	$insertSQL = sprintf("UPDATE  solicitud SET num_parcelas=%s WHERE idsolicitud=%s",
                      
                      
                       
						 GetSQLValueString($_POST['parcelas'], "int"),
						 GetSQLValueString($_POST['idsolicitud'],"int"));
						 echo $insertSQL;

  $Result1 = mysql_query($insertSQL, $sici) or die(mysql_error());					
 
 
 
	}
////////////fin 

}
///////////fin


//////////////seccion 6.1
if($_POST['seccion6_1'])
{
	$query_pcio_ci = sprintf("SELECT * FROM produccion_ci where idsolicitud=%s",
	GetSQLValueString($_POST['idsolicitud'], "int"));
$pcio_ci  = mysql_query($query_pcio_ci, $sici) or die(mysql_error());
$row_pcio_ci = mysql_fetch_assoc($pcio_ci);
$totalpcio_ci = mysql_num_rows($pcio_ci);


if($totalpcio_ci>0)
{
 $insertSQL = sprintf("update produccion_ci set solicitud_periodo_conversion_pi=%s where idsolicitud=%s",

 GetSQLValueString($_POST['solicitud_periodo_conversion_pi'], "text"),
GetSQLValueString($_POST['idsolicitud'], "int"));


}
else
{
 $insertSQL = sprintf("INSERT INTO produccion_ci (idsolicitud,solicitud_periodo_conversion_pi) VALUES (%s,%s)",
 GetSQLValueString($_POST['idsolicitud'], "int"),
 GetSQLValueString($_POST['solicitud_periodo_conversion_pi'], "text"));
 
}

 $Result1 = mysql_query($insertSQL, $sici) or die(mysql_error());
 
$query_doc_ci = sprintf("SELECT * FROM produccion_ci_documentacion where idsolicitud=%s",
	GetSQLValueString($_POST['idsolicitud'], "int"));
$doc_ci  = mysql_query($query_doc_ci, $sici) or die(mysql_error());
$row_doc_ci = mysql_fetch_assoc($doc_ci);
$totaldoc_ci = mysql_num_rows($doc_ci);


if($totaldoc_ci>0)
{
 $insertSQL = sprintf("update produccion_ci_documentacion set historial_manejo=%s, registro_manejo=%s, aval_no_quimicos=%s, analisis_no_agroquimicos=%s where idsolicitud=%s",

 GetSQLValueString($_POST['historial_manejo'], "text"),
 GetSQLValueString($_POST['registro_manejo'], "text"),
 GetSQLValueString($_POST['aval_no_quimicos'], "text"),
 GetSQLValueString($_POST['analisis_no_agroquimicos'], "text"),
GetSQLValueString($_POST['idsolicitud'], "int"));
}
else
{


   $insertSQL = sprintf("INSERT INTO produccion_ci_documentacion (idsolicitud, historial_manejo, registro_manejo, aval_no_quimicos, analisis_no_agroquimicos) VALUES (%s, %s, %s, %s, %s)",
 GetSQLValueString($_POST['idsolicitud'], "int"),
 GetSQLValueString($_POST['historial_manejo'], "text"),
 GetSQLValueString($_POST['registro_manejo'], "text"),
 GetSQLValueString($_POST['aval_no_quimicos'], "text"),
 GetSQLValueString($_POST['analisis_no_agroquimicos'], "text"));
}
  $Result1 = mysql_query($insertSQL, $sici) or die(mysql_error());

}
///////////fin


//////////////seccion 7
if($_POST['seccion7'])
{
	$query_ci = sprintf("SELECT * FROM produccion where idsolicitud=%s",
	GetSQLValueString($_POST['idsolicitud'], "int"));
$ci  = mysql_query($query_ci, $sici) or die(mysql_error());
$row_ci = mysql_fetch_assoc($ci);
$totalci = mysql_num_rows($ci);
 

if($totalci>0)
{
 $insertSQL = sprintf("update produccion set control_interno=%s where idsolicitud=%s",

GetSQLValueString($_POST['control_interno'], "text"),

GetSQLValueString($_POST['idsolicitud'], "int"));	
}
else{
$insertSQL = sprintf("INSERT INTO produccion (idsolicitud, control_interno) VALUES (%s, %s)",
 GetSQLValueString($_POST['idsolicitud'], "int"),
 GetSQLValueString($_POST['control_interno'], "text"));
 
 
  
}
$Result1 = mysql_query($insertSQL, $sici) or die(mysql_error());
$query_pcio_ci2 = sprintf("SELECT * FROM produccion_ci where idsolicitud=%s",
	GetSQLValueString($_POST['idsolicitud'], "int"));
$pcio_ci2  = mysql_query($query_pcio_ci2, $sici) or die(mysql_error());
$row_pcio_ci2 = mysql_fetch_assoc($pcio_ci2);
$totalpcio_ci2 = mysql_num_rows($pcio_ci2);


if($totalpcio_ci2>0)
{
 $insertSQL = sprintf("update produccion_ci set solicitud_periodo_conversion=%s, porcentaje_personal=%s, porcentaje_up=%s where idsolicitud=%s",

  GetSQLValueString($_POST['solicitud_periodo_conversion'], "text"),
 GetSQLValueString($_POST['porcentaje_personal'], "int"),
 GetSQLValueString($_POST['porcentaje_up'], "int"),
GetSQLValueString($_POST['idsolicitud'], "int"));


}
else
{
$insertSQL = sprintf("INSERT INTO produccion_ci (idsolicitud, solicitud_periodo_conversion, porcentaje_personal, porcentaje_up) VALUES (%s,%s, %s, %s, %s)",
 GetSQLValueString($_POST['idsolicitud'], "int"),
 GetSQLValueString($_POST['solicitud_periodo_conversion'], "text"),
 GetSQLValueString($_POST['porcentaje_personal'], "int"),
 GetSQLValueString($_POST['porcentaje_up'], "int"));
 
}
  $Result1 = mysql_query($insertSQL, $sici) or die(mysql_error());

$query_doc_ci2 = sprintf("SELECT * FROM produccion_ci_documentacion where idsolicitud=%s",
	GetSQLValueString($_POST['idsolicitud'], "int"));
$doc_ci2  = mysql_query($query_doc_ci2, $sici) or die(mysql_error());
$row_doc_ci2 = mysql_fetch_assoc($doc_ci2);
$totaldoc_ci2 = mysql_num_rows($doc_ci2);


if($totaldoc_ci2>0)
{
 $insertSQL = sprintf("update produccion_ci_documentacion set historial_manejo=%s, registro_manejo=%s, aval_no_quimicos=%s, analisis_no_agroquimicos=%s where idsolicitud=%s",

 GetSQLValueString($_POST['historial_manejo'], "text"),
 GetSQLValueString($_POST['registro_manejo'], "text"),
 GetSQLValueString($_POST['aval_no_quimicos'], "text"),
 GetSQLValueString($_POST['analisis_no_agroquimicos'], "text"),
GetSQLValueString($_POST['idsolicitud'], "int"));
}
else
{


   $insertSQL = sprintf("INSERT INTO produccion_ci_documentacion (idsolicitud, historial_manejo, registro_manejo, aval_no_quimicos, analisis_no_agroquimicos) VALUES (%s, %s, %s, %s, %s)",
 GetSQLValueString($_POST['idsolicitud'], "int"),
 GetSQLValueString($_POST['historial_manejo'], "text"),
 GetSQLValueString($_POST['registro_manejo'], "text"),
 GetSQLValueString($_POST['aval_no_quimicos'], "text"),
 GetSQLValueString($_POST['analisis_no_agroquimicos'], "text"));
}
  $Result1 = mysql_query($insertSQL, $sici) or die(mysql_error());


}
///////////fin


//////////////seccion 8
if($_POST['seccion8'])
{
	$query_proc = sprintf("SELECT * FROM procesado  where idsolicitud=%s",
	GetSQLValueString($_POST['idsolicitud'], "int"));
$proc  = mysql_query($query_proc, $sici) or die(mysql_error());
$row_proc = mysql_fetch_assoc($proc);
$totalproc = mysql_num_rows($proc);


if($totalproc>0)
{
 
$insertSQL = sprintf("update procesado set  procesado=%s where idsolicitud=%s",

 GetSQLValueString($_POST['procesado'], "text"),
GetSQLValueString($_POST['idsolicitud'], "int"));

}
else
{
$insertSQL = sprintf("INSERT INTO procesado (idsolicitud, procesado) VALUES (%s, %s)",
	GetSQLValueString($_POST['idsolicitud'], "int"),
	GetSQLValueString($_POST['procesado'], "text"));
	$Result1 = mysql_query($insertSQL, $sici) or die(mysql_error());
}

 $Result1 = mysql_query($insertSQL, $sici) or die(mysql_error());
 
$query_prod_proc = sprintf("SELECT * FROM producto_procesado where idsolicitud=%s",
	GetSQLValueString($_POST['idsolicitud'], "int"));
$prod_proc  = mysql_query($query_prod_proc, $sici) or die(mysql_error());
$row_prod_proc = mysql_fetch_assoc($prod_proc);
$totalprod_proc = mysql_num_rows($prod_proc);


if($totalprod_proc>0)
{
$insertSQL = sprintf("update  producto_procesado set  tipo_procesamiento=%s, planta_procesamiento_interna=%s, periodo_procesamiento=%s where idsolicitud=%s",

GetSQLValueString($_POST['tipo_procesamiento'], "text"),
GetSQLValueString($_POST['planta_procesamiento_interna'], "text"),
GetSQLValueString($_POST['periodo_procesamiento'], "text"),
GetSQLValueString($_POST['idsolicitud'], "int"));
}
else
{
$insertSQL = sprintf("INSERT INTO producto_procesado (idsolicitud, tipo_procesamiento, planta_procesamiento_interna, periodo_procesamiento) VALUES (%s, %s, %s, %s)",
GetSQLValueString($_POST['idsolicitud'], "int"),
GetSQLValueString($_POST['tipo_procesamiento'], "text"),
GetSQLValueString($_POST['planta_procesamiento_interna'], "text"),
GetSQLValueString($_POST['periodo_procesamiento'], "text"));

  
}
  $Result1 = mysql_query($insertSQL, $sici) or die(mysql_error());


$query_pta_proc = sprintf("SELECT * FROM planta_procesamiento where idsolicitud=%s",
	GetSQLValueString($_POST['idsolicitud'], "int"));
$pta_proc  = mysql_query($query_pta_proc, $sici) or die(mysql_error());
$row_pta_proc = mysql_fetch_assoc($pta_proc);
$totalpta_proc = mysql_num_rows($pta_proc);


if($totalpta_proc>0)
{
$insertSQL = sprintf("update  planta_procesamiento set  nombre=%s, ubicacion=%s, certificada=%s where idsolicitud=%s",

GetSQLValueString($_POST['nombre_procesamiento'], "text"),
 GetSQLValueString($_POST['ubicacion'], "text"),
 GetSQLValueString($_POST['certificada'], "text"),
GetSQLValueString($_POST['idsolicitud'], "int"));
}
else
{
 $insertSQL = sprintf("INSERT INTO planta_procesamiento (idsolicitud, nombre, ubicacion, certificada) VALUES (%s, %s, %s, %s)",
 GetSQLValueString($_POST['idsolicitud'], "int"),
 GetSQLValueString($_POST['nombre_procesamiento'], "text"),
 GetSQLValueString($_POST['ubicacion'], "text"),
 GetSQLValueString($_POST['certificada'], "text"));

  
}

  $Result1 = mysql_query($insertSQL, $sici) or die(mysql_error());


$query_cert_proc = sprintf("SELECT * FROM certificadora_procesamiento where idsolicitud=%s",
	GetSQLValueString($_POST['idsolicitud'], "int"));
$cert_proc  = mysql_query($query_cert_proc, $sici) or die(mysql_error());
$row_cert_proc= mysql_fetch_assoc($cert_proc);
$totalcert_proc = mysql_num_rows($cert_proc);


if($totalcert_proc>0)
{
$insertSQL = sprintf("update  certificadora_procesamiento set  nombre=%s, norma=%s where idsolicitud=%s",

GetSQLValueString($_POST['nombre'], "text"),
GetSQLValueString($_POST['norma'], "text"),
GetSQLValueString($_POST['idsolicitud'], "int"));
}
else
{
$insertSQL = sprintf("INSERT INTO certificadora_procesamiento (idsolicitud, nombre, norma) VALUES (%s, %s, %s)",
GetSQLValueString($_POST['idsolicitud'], "int"),
GetSQLValueString($_POST['nombre'], "text"),
GetSQLValueString($_POST['norma'], "text"));
  $Result1 = mysql_query($insertSQL, $sici) or die(mysql_error());

  
}

  $Result1 = mysql_query($insertSQL, $sici) or die(mysql_error());

}
///////////fin

//////////////seccion 9
if($_POST['seccion9'])
{
	$query_proc_com = sprintf("SELECT * FROM procesamiento_comercializacion where idsolicitud=%s",
	GetSQLValueString($_POST['idsolicitud'], "int"));
$proc_com  = mysql_query($query_proc_com, $sici) or die(mysql_error());
$row_proc_com = mysql_fetch_assoc($proc_com);
$totalproc_com = mysql_num_rows($proc_com);


if($totalproc_com>0)
{
 $insertSQL = sprintf("update procesamiento_comercializacion set  nombre_agencia=%s, nombre_planta_procesamiento=%s, direccion_planta_procesamiento=%s, materia_prima_certificada=%s, mercado_interno=%s, nombre_cert=%s,norma_cert=%s,periodo=%s where idsolicitud=%s",

 GetSQLValueString($_POST['nombre_agencia'], "text"),
 GetSQLValueString($_POST['nombre_planta_procesamiento'], "text"),
 GetSQLValueString($_POST['direccion_planta_procesamiento'], "text"),
 GetSQLValueString($_POST['materia_prima_certificada'], "text"),
 GetSQLValueString($_POST['mercado_interno'], "text"),
 GetSQLValueString($_POST['nombre_cert'], "text"),
 GetSQLValueString($_POST['norma_cert'], "text"),
 GetSQLValueString($_POST['periodo'], "text"),
GetSQLValueString($_POST['idsolicitud'], "int"));
}
else
{
 $insertSQL = sprintf("INSERT INTO procesamiento_comercializacion (idsolicitud, nombre_agencia, nombre_planta_procesamiento, direccion_planta_procesamiento, materia_prima_certificada, mercado_interno, nombre_cert,norma_cert,periodo) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s)",
 GetSQLValueString($_POST['idsolicitud'], "int"),
 GetSQLValueString($_POST['nombre_agencia'], "text"),
 GetSQLValueString($_POST['nombre_planta_procesamiento'], "text"),
 GetSQLValueString($_POST['direccion_planta_procesamiento'], "text"),
 GetSQLValueString($_POST['materia_prima_certificada'], "text"),
 GetSQLValueString($_POST['mercado_interno'], "text"),
 GetSQLValueString($_POST['nombre_cert'], "text"),
 GetSQLValueString($_POST['norma_cert'], "text"),
 GetSQLValueString($_POST['periodo'], "text"));
}

 $Result1 = mysql_query($insertSQL, $sici) or die(mysql_error());
 
 $query_mer_ext = sprintf("SELECT * FROM mercado_externo where idsolicitud=%s",
	GetSQLValueString($_POST['idsolicitud'], "int"));
$mer_ext = mysql_query($query_mer_ext, $sici) or die(mysql_error());
$row_mer_ext = mysql_fetch_assoc($mer_ext);
$totalmer_ext = mysql_num_rows($mer_ext);


if($totalmer_ext>0)
{
$insertSQL = sprintf("update  mercado_externo set   pais=%s where idsolicitud=%s",

GetSQLValueString($_POST['pais'], "text"),
GetSQLValueString($_POST['idsolicitud'], "int"));
}
else
{
 $insertSQL = sprintf("INSERT INTO mercado_externo (idsolicitud, pais) VALUES (%s, %s)",
GetSQLValueString($_POST['idsolicitud'], "int"),
GetSQLValueString($_POST['pais'], "text"));
}

 $Result1 = mysql_query($insertSQL, $sici) or die(mysql_error());
 
}
///////////fin
//////////////seccion extra
if($_POST['seccion_extra'])
{


	
$insertSQL = sprintf("update solicitud set general=%s, quejas=%s, captura_completa=%s where idsolicitud=%s",
GetSQLValueString($_POST['general'], "text"),
GetSQLValueString($_POST['quejas'], "text"),
GetSQLValueString($_POST['captura_completa'], "text"),
GetSQLValueString($_POST['idsolicitud'], "int"));
  $Result1 = mysql_query($insertSQL, $sici) or die(mysql_error());
	$mensaje="Información guardada";
	

}
///////////fin
//////////////seccion extra_1
if($_POST['seccion_extra_1'])
{
     $insertSQL = sprintf("UPDATE  solicitud SET cert_new_resp=%s WHERE idsolicitud=%s",
                      
                      
                       
                              GetSQLValueString($_POST['cert_new_resp'], "text"),
                              GetSQLValueString($_POST['idsolicitud'],"int"));

  $Result1 = mysql_query($insertSQL, $sici) or die(mysql_error());                         

	

}
///////////fin
//////////////seccion extra_2
if($_POST['seccion_extra_2'])
{
    $query_cambio_cert = sprintf("SELECT * FROM cambio_certificadora WHERE idsolicitud = %s", GetSQLValueString($_POST['idsolicitud'], "int"));
$cambio_cert = mysql_query($query_cambio_cert, $sici) or die(mysql_error());
$row_cambio_cert = mysql_fetch_assoc($cambio_cert);
$total_cambio_cert = mysql_num_rows($cambio_cert);
//$row_up_add = mysql_fetch_assoc($up_add);
          
     if($row_cambio_cert['idsolicitud']!=$_POST['idsolicitud'])
     { 
     $insertSQL = sprintf("INSERT INTO cambio_certificadora (idsolicitud) VALUES (%s)",
                       GetSQLValueString($_POST['idsolicitud'], "int"));

  $Result1 = mysql_query($insertSQL, $sici) or die(mysql_error());
     
     $insertSQL = $insertSQL = sprintf("UPDATE  cambio_certificadora SET norma_cert_new=%s,nombre_cert_new=%s,cambio_cert_new=%s,nc_cert_new=%s,periodo_cert_new=%s WHERE idsolicitud=%s",
                      
                       GetSQLValueString($_POST['norma_cert_new'], "text"),
                       GetSQLValueString($_POST['nombre_cert_new'], "text"),
                       GetSQLValueString($_POST['cambio_cert_new'], "text"),
                             GetSQLValueString($_POST['nc_cert_new'], "text"),
                              GetSQLValueString($_POST['periodo_cert_new'], "text"),
                              GetSQLValueString($_POST['idsolicitud'], "text"));
                              
                              
     }
     
     else{
     
     $insertSQL = $insertSQL = sprintf("UPDATE  cambio_certificadora SET norma_cert_new=%s,nombre_cert_new=%s,cambio_cert_new=%s,nc_cert_new=%s,periodo_cert_new=%s WHERE idsolicitud=%s",
                      
                       GetSQLValueString($_POST['norma_cert_new'], "text"),
                       GetSQLValueString($_POST['nombre_cert_new'], "text"),
                       GetSQLValueString($_POST['cambio_cert_new'], "text"),
                             GetSQLValueString($_POST['nc_cert_new'], "text"),
                              GetSQLValueString($_POST['periodo_cert_new'], "text"),
                              GetSQLValueString($_POST['idsolicitud'], "text"));
                              
                                
     
     }
  $Result1 = mysql_query($insertSQL, $sici) or die(mysql_error());

}


///////////fin


if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {

//INICIO BITACORA	
//consulta usuario
if (isset($_SESSION['MM_Username'])){$colname_usuario = $_SESSION['MM_Username'];}
$query_usuario ="SELECT idusuarios,nombre,appaterno,apmaterno,v FROM usuarios WHERE username = '".$colname_usuario."'";
$usuario = mysql_query($query_usuario, $sici) or die(mysql_error());
$row_usuario = mysql_fetch_assoc($usuario);
//
$query_bit=sprintf("
insert into bitacora_sesion(usuario,fecha,mensaje,idusuarios,idsolicitud,idclientes) values(%s,%s,%s,%s,%s,%s)", 
GetSQLValueString($row_usuario['nombre']." ".$row_usuario['appaterno'], "text"),
GetSQLValueString(time(), "text"),
GetSQLValueString("Solicitud modificada, datos base", "text"),
GetSQLValueString($row_usuario['idusuarios'], "int"),
GetSQLValueString($_POST['idsolicitud'], "int"),
GetSQLValueString($row_organizacion['idclientes'], "int")); 
//echo $query_bit;
$ejecutar = mysql_query($query_bit, $sici) or die(mysql_error());
//FIN BITACORA

	
$insertSQL = sprintf("update solicitud set lugar=%s, responsable_seguimiento=%s, rs_telefono=%s, rs_email=%s,  general=%s, quejas=%s, captura_completa=%s where idsolicitud=%s",
GetSQLValueString($_POST['lugar'], "text"),
GetSQLValueString($_POST['responsable_seguimiento'], "text"),
GetSQLValueString($_POST['rs_telefono'], "text"),
GetSQLValueString($_POST['rs_email'], "text"),

GetSQLValueString($_POST['general'], "text"),
GetSQLValueString($_POST['quejas'], "text"),
GetSQLValueString($_POST['captura_completa'], "text"),
GetSQLValueString($_POST['idsolicitud'], "int"));
  $Result1 = mysql_query($insertSQL, $sici) or die(mysql_error());
	$mensaje="Información guardada";
	
  

//////////fin
}
///////////////////insert parcelas
if(isset($_POST["insertar_parc"])) {
	
	
	
	
	
$fecha=time();
$uploaddir = "".$fecha;
$uploadfile = $uploaddir . basename($_FILES['archivo']['name']);
$uploaddir2 = "../uploads_parcelas/".$fecha;
$uploadfile2 = $uploaddir2 . basename($_FILES['archivo']['name']);
$tipo_archivo = $_FILES['archivo']['type']; 
$error = $_FILES['archivo']['error'];
$subido = false;
$mensaje="";

if($error==UPLOAD_ERR_OK)
{
	$subido = copy($_FILES['archivo']['tmp_name'], $uploadfile2);
	
}
if($subido)
{
	
	$rty=time();
	 $insertSQL = sprintf("INSERT INTO parcela (idsolicitud,municipio,localidad,nombre_parcela,superficie,gps,url_croquis) VALUES (%s, %s, %s, %s,%s, %s, %s)",
                       GetSQLValueString($_POST['idsolicitud'], "int"),
                       GetSQLValueString($_POST['municipio'], "text"),
                       GetSQLValueString($_POST['localidad'], "text"),
                       GetSQLValueString($_POST['nombre_parcela'], "text"),
					    GetSQLValueString($_POST['superficie'], "text"),
                       GetSQLValueString($_POST['gps'], "text"),
                      
                       GetSQLValueString($uploadfile2, "text"));

  $Result1 = mysql_query($insertSQL, $sici) or die(mysql_error());



						
 
 
	}

else
{
	echo "error;";
	 $insertSQL = sprintf("INSERT INTO parcela (idsolicitud,municipio,localidad,nombre_parcela,superficie,gps,url_croquis) VALUES (%s, %s, %s, %s,%s, %s, %s)",
                       GetSQLValueString($_POST['idsolicitud'], "int"),
                       GetSQLValueString($_POST['municipio'], "text"),
                       GetSQLValueString($_POST['localidad'], "text"),
                       GetSQLValueString($_POST['nombre_parcela'], "text"),
					    GetSQLValueString($_POST['superficie'], "text"),
                       GetSQLValueString($_POST['gps'], "text"),
                       GetSQLValueString($_POST['url_croquis'], "text"));

  $Result1 = mysql_query($insertSQL, $sici) or die(mysql_error());

}

  
  
}

/////////////////fin
///////////////eliminar parc


 if (isset($_POST['eliminar_parc'])) {
  $deleteSQL = sprintf("DELETE FROM parcela WHERE idparcela=%s",
                       GetSQLValueString($_POST['idparcela'], "int"));
  $Result1 = mysql_query($deleteSQL, $sici) or die(mysql_error());
	
 }
//////////////fin 



