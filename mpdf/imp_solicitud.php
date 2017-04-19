<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_sici = "localhost";
$database_sici = "k8w45fac_sici";
$username_sici = "k8w45fac_sici";
$password_sici = "Qwerty123";
$sici = mysql_connect($hostname_sici, $username_sici, $password_sici) or trigger_error(mysql_error(),E_USER_ERROR); 

if (!isset($_SESSION)) {
  session_start();
}
$MM_authorizedUsers = "";
$MM_donotCheckaccess = "true";

// *** Restrict Access To Page: Grant or deny access to this page
function isAuthorized($strUsers, $strGroups, $UserName, $UserGroup) { 
  // For security, start by assuming the visitor is NOT authorized. 
  $isValid = False; 

  // When a visitor has logged into this site, the Session variable MM_Username set equal to their username. 
  // Therefore, we know that a user is NOT logged in if that Session variable is blank. 
  if (!empty($UserName)) { 
    // Besides being logged in, you may restrict access to only certain users based on an ID established when they login. 
    // Parse the strings into arrays. 
    $arrUsers = Explode(",", $strUsers); 
    $arrGroups = Explode(",", $strGroups); 
    if (in_array($UserName, $arrUsers)) { 
      $isValid = true; 
    } 
    // Or, you may restrict access to only certain users based on their username. 
    if (in_array($UserGroup, $arrGroups)) { 
      $isValid = true; 
    } 
    if (($strUsers == "") && true) { 
      $isValid = true; 
    } 
  } 
  return $isValid; 
}

$MM_restrictGoTo = "../clientes/login.php";
if (!((isset($_SESSION['MM_Username'])) && (isAuthorized("",$MM_authorizedUsers, $_SESSION['MM_Username'], $_SESSION['MM_UserGroup'])))) {   
  $MM_qsChar = "?";
  $MM_referrer = $_SERVER['PHP_SELF'];
  if (strpos($MM_restrictGoTo, "?")) $MM_qsChar = "&";
  if (isset($_SERVER['QUERY_STRING']) && strlen($_SERVER['QUERY_STRING']) > 0) 
  $MM_referrer .= "?" . $_SERVER['QUERY_STRING'];
  $MM_restrictGoTo = $MM_restrictGoTo. $MM_qsChar . "accesscheck=" . urlencode($MM_referrer);
  header("Location: ". $MM_restrictGoTo); 
  exit;
}
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
$colname_solicitud = "-1";
if (isset($_POST['idsolicitud'])) {
  $colname_solicitud = $_POST['idsolicitud'];
}
mysql_select_db($database_sici, $sici);
$query_solicitud = sprintf("SELECT * FROM solicitud WHERE idsolicitud = %s", GetSQLValueString($colname_solicitud, "int"));
$solicitud = mysql_query($query_solicitud, $sici) or die(mysql_error());
$row_solicitud = mysql_fetch_assoc($solicitud);
$totalRows_solicitud = mysql_num_rows($solicitud);

if (isset($_POST['idsolicitud'])) {
  $colname_solicitud = $_POST['idsolicitud'];
}
mysql_select_db($database_sici, $sici);
$query_organizacion = sprintf("SELECT * FROM organizacion where idclientes in(select idclientes from solicitud where idsolicitud='$colname_solicitud')");
$organizacion = mysql_query($query_organizacion, $sici) or die(mysql_error());
$row_organizacion = mysql_fetch_assoc($organizacion);
?>
<?php
mysql_select_db($database_sici, $sici);
$query_tipo_organizacion = "SELECT * FROM tipo_organizacion where idtipo_organizacion in(select idtipo_organizacion from organizacion_tipo_organizacion where idclientes in(select idclientes from organizacion where idclientes in(select idclientes from solicitud where idsolicitud='$colname_solicitud')))";
$tipo_organizacion = mysql_query($query_tipo_organizacion, $sici) or die(mysql_error());
$row_tipo_organizacion = mysql_fetch_assoc($tipo_organizacion);
$totalRows_tipo_organizacion = mysql_num_rows($tipo_organizacion);

$colname_produccion = "-1";
if (isset($_POST['idsolicitud'])) {
  $colname_produccion = $_POST['idsolicitud'];
}
mysql_select_db($database_sici, $sici);
$query_produccion = sprintf("SELECT * FROM produccion WHERE idsolicitud = %s", GetSQLValueString($colname_produccion, "int"));
$produccion = mysql_query($query_produccion, $sici) or die(mysql_error());
$row_produccion = mysql_fetch_assoc($produccion);
$totalRows_produccion = mysql_num_rows($produccion);

$colname_produccion_ci = "-1";
if (isset($_POST['idsolicitud'])) {
  $colname_produccion_ci = $_POST['idsolicitud'];
}
mysql_select_db($database_sici, $sici);
$query_produccion_ci = sprintf("SELECT * FROM produccion_ci WHERE idsolicitud = %s", GetSQLValueString($colname_produccion_ci, "int"));
$produccion_ci = mysql_query($query_produccion_ci, $sici) or die(mysql_error());
$row_produccion_ci = mysql_fetch_assoc($produccion_ci);
$totalRows_produccion_ci = mysql_num_rows($produccion_ci);

$colname_produccion_ci_documentacion = "-1";
if (isset($_POST['idsolicitud'])) {
  $colname_produccion_ci_documentacion = $_POST['idsolicitud'];
}
mysql_select_db($database_sici, $sici);
$query_produccion_ci_documentacion = sprintf("SELECT * FROM produccion_ci_documentacion WHERE idsolicitud = %s", GetSQLValueString($colname_produccion_ci_documentacion, "int"));
$produccion_ci_documentacion = mysql_query($query_produccion_ci_documentacion, $sici) or die(mysql_error());
$row_produccion_ci_documentacion = mysql_fetch_assoc($produccion_ci_documentacion);
$totalRows_produccion_ci_documentacion = mysql_num_rows($produccion_ci_documentacion);

$colname_procesado = "-1";
if (isset($_POST['idsolicitud'])) {
  $colname_procesado = $_POST['idsolicitud'];
}
mysql_select_db($database_sici, $sici);
$query_procesado = sprintf("SELECT * FROM procesado WHERE idsolicitud = %s order by idprocesado desc", GetSQLValueString($_POST['idsolicitud'], "int"));
$procesado = mysql_query($query_procesado, $sici) or die(mysql_error());
$row_procesado = mysql_fetch_assoc($procesado);
$totalRows_procesado = mysql_num_rows($procesado);

$colname_producto_procesado = "-1";
if (isset($_POST['idsolicitud'])) {
  $colname_producto_procesado = $_POST['idsolicitud'];
}
mysql_select_db($database_sici, $sici);
$query_producto_procesado = sprintf("SELECT * FROM producto_procesado WHERE idsolicitud = %s", GetSQLValueString($colname_producto_procesado, "int"));
$producto_procesado = mysql_query($query_producto_procesado, $sici) or die(mysql_error());
$row_producto_procesado = mysql_fetch_assoc($producto_procesado);
$totalRows_producto_procesado = mysql_num_rows($producto_procesado);

$colname_planta_procesamiento = "-1";
if (isset($_POST['idsolicitud'])) {
  $colname_planta_procesamiento = $_POST['idsolicitud'];
}
mysql_select_db($database_sici, $sici);
$query_planta_procesamiento = sprintf("SELECT * FROM planta_procesamiento WHERE idsolicitud = %s", GetSQLValueString($colname_planta_procesamiento, "int"));
$planta_procesamiento = mysql_query($query_planta_procesamiento, $sici) or die(mysql_error());
$row_planta_procesamiento = mysql_fetch_assoc($planta_procesamiento);
$totalRows_planta_procesamiento = mysql_num_rows($planta_procesamiento);

$colname_certificadora_procesamiento = "-1";
if (isset($_POST['idsolicitud'])) {
  $colname_certificadora_procesamiento = $_POST['idsolicitud'];
}
mysql_select_db($database_sici, $sici);
$query_certificadora_procesamiento = sprintf("SELECT * FROM certificadora_procesamiento WHERE idsolicitud = %s", GetSQLValueString($colname_certificadora_procesamiento, "int"));
$certificadora_procesamiento = mysql_query($query_certificadora_procesamiento, $sici) or die(mysql_error());
$row_certificadora_procesamiento = mysql_fetch_assoc($certificadora_procesamiento);
$totalRows_certificadora_procesamiento = mysql_num_rows($certificadora_procesamiento);

$colname_procesamiento_comercializacion = "-1";
if (isset($_POST['idsolicitud'])) {
  $colname_procesamiento_comercializacion = $_POST['idsolicitud'];
}
mysql_select_db($database_sici, $sici);
$query_procesamiento_comercializacion = sprintf("SELECT * FROM procesamiento_comercializacion WHERE idsolicitud = %s", GetSQLValueString($colname_procesamiento_comercializacion, "int"));
$procesamiento_comercializacion = mysql_query($query_procesamiento_comercializacion, $sici) or die(mysql_error());
$row_procesamiento_comercializacion = mysql_fetch_assoc($procesamiento_comercializacion);
$totalRows_procesamiento_comercializacion = mysql_num_rows($procesamiento_comercializacion);

$colname_mercado_externo = "-1";
if (isset($_POST['idsolicitud'])) {
  $colname_mercado_externo = $_POST['idsolicitud'];
}
mysql_select_db($database_sici, $sici);
$query_mercado_externo = sprintf("SELECT * FROM mercado_externo WHERE idsolicitud = %s", GetSQLValueString($colname_mercado_externo, "int"));
$mercado_externo = mysql_query($query_mercado_externo, $sici) or die(mysql_error());
$row_mercado_externo = mysql_fetch_assoc($mercado_externo);
$totalRows_mercado_externo = mysql_num_rows($mercado_externo);

$colname_up_solicitud = "-1";
if (isset($_POST['idsolicitud'])) {
  $colname_up_solicitud = $_POST['idsolicitud'];
}
mysql_select_db($database_sici, $sici);
$query_up_solicitud = sprintf("SELECT * FROM solicitud_unidad_productiva WHERE idsolicitud = %s", GetSQLValueString($colname_up_solicitud, "int"));
$up_solicitud = mysql_query($query_up_solicitud, $sici) or die(mysql_error());
$row_up_solicitud = mysql_fetch_assoc($up_solicitud);
$totalRows_up_solicitud = mysql_num_rows($up_solicitud);

$colname_normas = "-1";
if (isset($_POST['idsolicitud'])) {
  $colname_normas = $_POST['idsolicitud'];
}
mysql_select_db($database_sici, $sici);
$query_normas = sprintf("SELECT * FROM normas_certimex where idnorma_certimex in(select idnormas_certimex from solicitud_norma WHERE idsolicitud = %s)", GetSQLValueString($colname_normas, "int"));
$normas = mysql_query($query_normas, $sici) or die(mysql_error());

$colname_productos = "-1";
if (isset($_POST['idsolicitud'])) {
  $colname_productos = $_POST['idsolicitud'];
}
mysql_select_db($database_sici, $sici);
$query_productos = sprintf("SELECT * FROM productos WHERE idsolicitud = %s", GetSQLValueString($colname_productos, "int"));
$productos = mysql_query($query_productos, $sici) or die(mysql_error());

/*
$colname_up = "-1";
if (isset($_POST['idsolicitud'])) {
  $colname_up = $_POST['idsolicitud'];
}
mysql_select_db($database_sici, $sici);
$query_up = sprintf("SELECT * FROM unidad_productiva where idunidad_productiva in
(select idunidad_productiva from solicitud_unidad_productiva WHERE idsolicitud = %s)", GetSQLValueString($colname_up, "int"));
$up = mysql_query($query_up, $sici) or die(mysql_error());
*/

$colname_alcance = "-1";
if (isset($_POST['idsolicitud'])) {
  $colname_alcance = $_POST['idsolicitud'];
}
mysql_select_db($database_sici, $sici);
$query_alcance = sprintf("SELECT * FROM alcance where idalcance in(select idalcance from solicitud_alcance WHERE idsolicitud = %s) order by alcance desc", GetSQLValueString($colname_alcance, "int"));
$alcance = mysql_query($query_alcance, $sici) or die(mysql_error());

//auxiliar
$query_alcancex = sprintf("SELECT * FROM alcance where idalcance in(select idalcance from solicitud_alcance WHERE idsolicitud = %s) order by alcance desc", GetSQLValueString($colname_alcance, "int"));
$alcancex = mysql_query($query_alcancex, $sici) or die(mysql_error());
$banx=0;
while($row_alcancex = mysql_fetch_assoc($alcancex)){
	if($row_alcancex['alcance']=="PROCESAMIENTO"||$row_alcancex['alcance']=="COMERCIALIZACION"){
	$banx=1;
	}
}

?>
<?php
include('mpdf.php');
$mpdf=new mPDF();
$mpdf->pagenumPrefix = 'Página ';
$mpdf->pagenumSuffix = ' de ';
$mpdf->setFooter('{PAGENO}{nb}');
$mpdf->setHeader('Código de verificación: 2-'.$row_solicitud['idsolicitud'].'');
if($row_solicitud['revisado']=='S')
{}else
{
	$mpdf->SetWatermarkText('NO REVISADO');
	$mpdf->showWatermarkText = true;
	$mpdf->watermarkTextAlpha = 0.2;
	$mpdf->watermark_font = 'Arial';
}


$mpdf->WriteHTML('<img src="../utilerias/imagenes/img_solicitud_superior.jpg"/>');
$mpdf->WriteHTML('Lugar: <b>'.$row_solicitud['lugar'].'</b>');
$mpdf->WriteHTML('Fecha: <b>'.$row_solicitud['fecha'].'</b>');
$mpdf->WriteHTML('
<br>
C. Taurino Reyes Santiago<br>
CERTIMEX, Certificadora Mexicana de Productos y Procesos Ecológicos S.C.
Calle 16 de Septiembre No. 204, Ejido Guadalupe Victoria. C.P. 68026.
Oaxaca, Oax. México. Tel. ++ 951 52 00617, Fax ++951 5202687
E-mail: archivosyregistros@certimexsc.com
<br><br>
El que suscribe: <b>'.$row_organizacion['representante_legal'].'</b><br>
Representante legal del operador: <b>'.$row_organizacion['organizacion'].'</b>
<br>
Dirección: <b>'.$row_organizacion['domicilio'].','.$row_organizacion['colonia'].','.$row_organizacion['municipio'].'</b>
C.P: <b>'.$row_organizacion['cp'].'</b>');
$mpdf->WriteHTML('Teléfono: <b>'.$row_organizacion['telefono'].'</b>, Email: <b>'.$row_organizacion['email'].'</b>');
$mpdf->WriteHTML('<br>Me dirijo a esa agencia muy atentamente, para solicitar de manera formal la inspección y certificación para la actividad que realiza el operador arriba mencionado, de acuerdo con los datos que a continuación se indican:');
$mpdf->WriteHTML('<br>
<table width="100%"><tr><td bgcolor="#E7F0C3">I DATOS GENERALES</td></tr></table>
1. Persona responsable para dar seguimiento a la inspección y certificación:<br> <b>'.$row_solicitud['responsable_seguimiento'].'</b>
');
$mpdf->WriteHTML('Teléfono: <b>'.$row_solicitud['rs_telefono'].'</b>, Email: <b>'.$row_solicitud['rs_email'].'</b>
<br>
2.- Tipo de operador: <b>'.$row_tipo_organizacion['tipo'].'</b>('.$row_tipo_organizacion['descripcion'].')<br>
3.- Alcance de la inspección:');
do{
	$mpdf->WriteHTML('<b>'.$row_alcance['alcance'].'</b>');
}while($row_alcance = mysql_fetch_assoc($alcance));

$mpdf->WriteHTML('No. Hectáreas/ Colmenas/ Cabezas de ganado a certificar:<br>');

do{
	//$mpdf->WriteHTML('<b>'.$row_up_solicitud['up_cantidad'].'</b>');
	$aux_9=$row_up_solicitud['up_cantidad'];
	mysql_select_db($database_sici, $sici);
$query_alcance2 = "SELECT * FROM unidad_productiva WHERE idunidad_productiva = '".$row_up_solicitud['idunidad_productiva']."'";
	$alcance2 = mysql_query($query_alcance2, $sici) or die(mysql_error());
	$row_alcance2 = mysql_fetch_assoc($alcance2);
	$mpdf->WriteHTML('<b>'.$aux_9." ".$row_alcance2['nombre'].'</b>');
}while($row_up_solicitud = mysql_fetch_assoc($up_solicitud));


/*
do{
	mysql_select_db($database_sici, $sici);
$query_alcance2 = "SELECT * FROM unidad_productiva WHERE idunidad_productiva = '".$row_up['idunidad_productiva']."'";

	$alcance2 = mysql_query($query_alcance2, $sici) or die(mysql_error());
	
	$row_alcance2 = mysql_fetch_assoc($alcance2);
	
	$mpdf->WriteHTML('<b>'.$row_alcance2['up_cantidad'].' '.$row_up['nombre'].'</b>');
	
}while($row_up = mysql_fetch_assoc($up));
*/


$mpdf->WriteHTML('No. De Productores/Apicultores/Recolectores/ganaderos: <br><b>'.$row_solicitud['num_integrantes'].'</b><br>
Productos que desea certificar:<br>');
do{
	$mpdf->WriteHTML('<b>'.$row_productos['nombre'].'</b>');
}while($row_productos = mysql_fetch_assoc($productos));
$mpdf->WriteHTML('3.1. Programa o normas que desea certificar:');
do{
	$mpdf->WriteHTML('<b>'.$row_normas['norma'].'</b>');
}while($row_normas = mysql_fetch_assoc($normas));
$mpdf->WriteHTML('<table width="100%"><tr><td bgcolor="#E7F0C3">II. DATOS DE LA PRODUCCIÓN/RECOLECCIÓN:</td></tr></table>');
$mpdf->WriteHTML('1.- Mencione la zona, región, municipios y localidades donde se ubican las áreas de cultivos, de recolección, apiarios o potreros (anexar croquis de esta ubicación):');
$mpdf->WriteHTML('<b>'.$row_produccion['area_cultivo'].'</b>');
if($row_produccion['control_interno']=='S')
{
		$mpdf->WriteHTML('2.- Para el caso de GPP, GPA, GPG, GPR:<br>
		Porcentaje de productores controlados internamente: <b>'.$row_produccion_ci['porcentaje_personal'].'%</b>
		<br>
		Porcentaje de parcelas inspeccionadas: <b>'.$row_produccion_ci['porcentaje_up'].'%</b>');
		if($row_produccion_ci['solicitud_periodo_conversion']=='S')
		{
		$mpdf->WriteHTML('¿Tiene productores que solicitan reducción del periodo de conversión? <b>SI</b><br>Indicar si cuentan con los siguientes documentos:');
		
		if($row_produccion_ci_documentacion['historial_manejo']=='S')
		$mpdf->WriteHTML('Historial de manejo de las parcelas en los últimos 3 años: <b>SI</b>');
		else
		$mpdf->WriteHTML('Historial de manejo de las parcelas en los últimos 3 años: <b>NO</b>');
		
		if($row_produccion_ci_documentacion['registro_manejo']=='S')
		$mpdf->WriteHTML('Registros que comprueben el manejo orgánico del cultivo: <b>SI</b>');
		else
		$mpdf->WriteHTML('Registros que comprueben el manejo orgánico del cultivo: <b>NO</b>');
		
		if($row_produccion_ci_documentacion['aval_no_quimicos']=='S')
		$mpdf->WriteHTML('Carta aval de autoridad competente testificando el no uso de químicos en los últimos 3 años: <b>SI</b>');
		else
		$mpdf->WriteHTML('Carta aval de autoridad competente testificando el no uso de químicos en los últimos 3 años: <b>NO</b>');
		
		if($row_produccion_ci_documentacion['analisis_no_agroquimicos']=='S')
		$mpdf->WriteHTML('Análisis de laboratorio que comprueben el no uso de agroquímicos: <b>SI</b>');
		else
		$mpdf->WriteHTML('Análisis de laboratorio que comprueben el no uso de agroquímicos: <b>NO</b>');
		}
		else $mpdf->WriteHTML('¿Tiene productores que solicitan reducción del periodo de conversión? <b>NO</b>');
		
		
}
if($row_procesado['procesado']=='S'){
$mpdf->WriteHTML('
<table width="100%"><tr><td bgcolor="#E7F0C3">III. DATOS DE PROCESAMIENTO</td></tr></table>
¿Para que su producto vaya al mercado necesita de un procesamiento? <b>SI</b><br>
¿Período o época de procesamiento?<b>'.$row_producto_procesado['periodo_procesamiento'].'</b>
<br>
Por favor indique el tipo de procesamiento realizado: <b>'.$row_producto_procesado['tipo_procesamiento'].'</b>');
if($row_producto_procesado['planta_procesamiento_interna']=='S'){
	$mpdf->WriteHTML('¿La planta de procesamiento es propiedad de la misma organización? <b>SI</b>');
}
else{
		$mpdf->WriteHTML('¿La planta de procesamiento es propiedad de la misma organización? <b>NO</b><br>
		¿Nombre de la procesadora? <b>'.$row_planta_procesamiento['nombre'].'</b><br>
		¿Dirección de la procesadora? <b>'.$row_planta_procesamiento['ubicacion'].'</b>
		');
		if($row_planta_procesamiento['certificada']=='S'){
		$mpdf->WriteHTML('Esta planta de procesamiento ¿cuenta con certificación orgánica? <b>SI</b><br>
		¿Bajo que normas esta certificada? <b>'.$row_certificadora_procesamiento['norma'].'</b><br>
		Nombre de la certificadora: <b>'.$row_certificadora_procesamiento['nombre'].'</b><br>
		');
		
		}
	}
}
else
$mpdf->WriteHTML('¿Para que su producto vaya al mercado necesita de un procesamiento? <b>NO</b>'.$row_procesado['procesado']=='S'.$row_producto_procesado['tipo_procesamiento'].'');


if($banx>0){
$mpdf->WriteHTML('
<table width="100%"><tr><td bgcolor="#E7F0C3">IV. DATOS DE COMERCIALIZACIÓN</td></tr></table>');
$mpdf->WriteHTML('Nombre de agencia de certificación: <b>'.$row_procesamiento_comercializacion['nombre_cert'].'</b>');
$mpdf->WriteHTML('Normas de certificación: <b>'.$row_procesamiento_comercializacion['norma_cert'].'</b>');
$mpdf->WriteHTML('Período o época de comercialización: <b>'.$row_procesamiento_comercializacion['periodo'].'</b>');
$mpdf->WriteHTML('1. Nombre de la comercializadora: 
<b>'.$row_procesamiento_comercializacion['nombre_planta_procesamiento'].'</b>');
$mpdf->WriteHTML('2. Dirección de la comercializadora: 
<b>'.$row_procesamiento_comercializacion['direccion_planta_procesamiento'].'</b>');

if($row_procesamiento_comercializacion['materia_prima_certificada']=='S'){
$mpdf->WriteHTML('3. ¿La materia prima tiene certificación orgánica? <b>SI</b>');
}
else
$mpdf->WriteHTML('3. ¿La materia prima tiene certificación orgánica? <b>NO</b>');
}


if($row_procesamiento_comercializacion['mercado_interno']=='S'){
$mpdf->WriteHTML('¿Para que mercado están destinados sus productos?: <b>Nacional</b>');
}
else
$mpdf->WriteHTML('¿Para que mercado están destinados sus productos?: <b>'.$row_mercado_externo['pais'].'</b>');

$mpdf->WriteHTML('<br>GENERAL. Favor de indicar si en el último año hubo algún cambio importante en alguno de los procesos que maneja el operador, cambio tecnológico en campo, procesamiento, instalaciones, personal y otros relevantes: <b>'.$row_solicitud['general'].'</b>');
$mpdf->WriteHTML('<br>');
$mpdf->WriteHTML('
Declaración:
<br>
<br>
Yo: <b>'.$row_organizacion['representante_legal'].'</b><br>
DECLARO que toda la información aquí vertida es verdadera, que acepto visitas y otros métodos de verificación (incluyendo análisis de laboratorio y revisión de registros administrativos contables), así como facilitar la información necesaria para la evaluación de los procesos que solicito certificar. Nuestros métodos de trabajo cumplen con las Normas para La Producción, El Procesamiento y La Comercialización de Productos Ecológicos para las cuales solicitamos la certificación. Entiendo que el contestar este cuestionario no implica que dicha certificación sea otorgada.<br>
<br>
<b>
Atentamente</b><br><br>
<b>
'.$row_organizacion['representante_legal'].'</b><br>
Firma del Solicitante (Representante Legal)
<br>
<b>'.$row_solicitud['fd'].'</b><br>Código de validación electrónico.
');
$mpdf->Output();
exit();

mysql_free_result($solicitud);
mysql_free_result($organizacion);
?>
<?php
mysql_free_result($tipo_organizacion);

mysql_free_result($produccion);

mysql_free_result($produccion_ci);

mysql_free_result($produccion_ci_documentacion);

mysql_free_result($procesado);

mysql_free_result($producto_procesado);

mysql_free_result($planta_procesamiento);

mysql_free_result($certificadora_procesamiento);

mysql_free_result($procesamiento_comercializacion);

mysql_free_result($mercado_externo);

mysql_free_result($up_solicitud);

mysql_free_result($normas);

mysql_free_result($productos);

mysql_free_result($up);

mysql_free_result($alcance);
?>
