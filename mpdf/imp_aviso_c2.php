<?php require_once('sici.php'); ?>
<?php
if (!isset($_SESSION)) {
  session_start();
}
$MM_authorizedUsers = "ADMINISTRADOR";
$MM_donotCheckaccess = "false";

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
    if (($strUsers == "") && false) { 
      $isValid = true; 
    } 
  } 
  return $isValid; 
}

$MM_restrictGoTo = "../admin/menu_principal.php";
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

$colname_certificado = "-1";
if (isset($_POST['idsolicitud'])) {
  $colname_certificado = $_POST['idsolicitud'];
}
mysql_select_db($database_sici, $sici);
$query_certificado = sprintf("SELECT * FROM certificado WHERE idsolicitud = %s", GetSQLValueString($colname_certificado, "int"));
$certificado = mysql_query($query_certificado, $sici) or die(mysql_error());
$row_certificado = mysql_fetch_assoc($certificado);
$totalRows_certificado = mysql_num_rows($certificado);

$colname_informe = "-1";
if (isset($_POST['idsolicitud'])) {
  $colname_informe = $_POST['idsolicitud'];
}
mysql_select_db($database_sici, $sici);
$query_informe = sprintf("SELECT * FROM informe WHERE idsolicitud = %s", GetSQLValueString($colname_informe, "int"));
$informe = mysql_query($query_informe, $sici) or die(mysql_error());
$row_informe = mysql_fetch_assoc($informe);
$totalRows_informe = mysql_num_rows($informe);

if(strtoupper($row_informe['procesadora_calidad'])=='ORGÁNICO' || strtoupper($row_informe['procesadora_calidad'])=='ORGÁNICA')
{$aux_org1="100% ORGÁNICO";}else{$aux_org1=$row_informe['procesadora_calidad'];}

if(strtoupper($row_informe['comercializadora_calidad'])=='ORGÁNICO' || strtoupper($row_informe['comercializadora_calidad'])=='ORGÁNICA')
{$aux_org2="100% ORGÁNICO";}else{$aux_org2=$row_informe['comercializadora_calidad'];}

$colname_encargo = "-1";
if (isset($_POST['idsolicitud'])) {
  $colname_encargo = $_POST['idsolicitud'];
}
mysql_select_db($database_sici, $sici);
$query_encargo = sprintf("SELECT * FROM encargo WHERE idsolicitud = %s", GetSQLValueString($colname_encargo, "int"));
$encargo = mysql_query($query_encargo, $sici) or die(mysql_error());
$row_encargo = mysql_fetch_assoc($encargo);
$totalRows_encargo = mysql_num_rows($encargo);
//inspector:
mysql_select_db($database_sici, $sici);
$query_lista_inspectores = sprintf("SELECT * from inspector where idinspector in(select idinspector FROM inspeccion WHERE idsolicitud = %s)", GetSQLValueString($_POST['idsolicitud'], "int"));
$lista_inspectores = mysql_query($query_lista_inspectores, $sici) or die(mysql_error());
//$row_lista_inspectores = mysql_fetch_assoc($lista_inspectores);
$cadena_inspector="";
$cont=0;
while($row_inspector = mysql_fetch_assoc($lista_inspectores))
{
	$cont++;
	if($cont==1){
$cadena_inspector=$cadena_inspector.$row_inspector['nombre'].' '.$row_inspector['appaterno'].' '.$row_inspector['apmaterno'];}
else{$cadena_inspector=$cadena_inspector.', '.$row_inspector['nombre'].' '.$row_inspector['appaterno'].' '.$row_inspector['apmaterno'];}
}
//producto
$colname_producto = "-1";
if (isset($_POST['idsolicitud'])) {
  $colname_producto = $_POST['idsolicitud'];
}
mysql_select_db($database_sici, $sici);
$query_producto = sprintf("SELECT * FROM productos where idsolicitud=%s order by idproductos asc", GetSQLValueString($colname_producto, "int"));
$producto = mysql_query($query_producto, $sici) or die(mysql_error());

$totalRows_producto = mysql_num_rows($producto);

$fecha1=$row_certificado['fecha2'];
include('mpdf.php');
$mpdf=new mPDF();
$mpdf->pagenumPrefix = 'Página ';
$mpdf->pagenumSuffix = ' de ';
$mpdf->setFooter(''.$row_certificado['fecha_notificacion'].', {PAGENO}{nb}');
$mpdf->WriteHTML('
<table width="1000">
<tr>
<td rowspan="2" width="50"><center><img src="../utilerias/imagenes/img_aviso_lateral.fw.png" width="100"/></td>
<td><center><img src="../utilerias/imagenes/img_aviso_superior.fw.png" width="400"/></center></td>
</tr>
<tr>
<td>
<table align="center">
<tr><td align="center">
<br>
<h4>
<b>'.$row_certificado['organizacion'].'</b>
</h4>
<br>
'.$row_certificado['direccion'].'
<br>
Tel: '.$row_certificado['telefonos'].'
<br>
Email: '.$row_certificado['email'].'
</td></tr>
</table>
</td>
</tr>
</table>
<table width="100%" border="0">
<tr><td><br><b>Notificación de Certificación<br>'.$row_certificado['reporte2'].'</b>
<br><br>Estimados señores:<br><br>
<table align="center"><tr><td align="justify">
Nos es grato comunicarles el resultado de la inspección realizada en '.$row_certificado['fecha22'].', en relación con el cumplimiento del National Organic Program (NOP) administrado por el USDA.:
</td></tr></table><br>
');
mysql_select_db($database_sici, $sici);
$query_al = sprintf("SELECT idalcance FROM solicitud_alcance where idsolicitud=%s", GetSQLValueString($_POST['idsolicitud'], "int"));
$al = mysql_query($query_al, $sici) or die(mysql_error());
$totalRows_al = mysql_num_rows($al);
$banx=0;
while($row_al = mysql_fetch_assoc($al))
{
	if($row_al['idalcance']==1)
	{
		$banx=1;
	}
}
if($banx==1){
$mpdf->WriteHTML('
<table width="1000" border="1" cellpadding="0" cellspacing="0">
<tr>
<td align="right"><b>Operador:</b></td><td><b>'.$row_certificado['organizacion'].'</b></td>
</tr>
<tr>
<td align="right"><b>Ciclo:</b></td><td><b>'.$row_informe['ciclo'].'</b></td>
</tr>
<tr>
<td align="right"><b>Periodo de cosecha:</b></td><td><b>'.$row_informe['periodo_cosecha'].'</b></td>
</tr>
</table>
<table width="1000" border="1" cellpadding="0" cellspacing="0" align="center">
<tr bgcolor="#CCCCCC">
<td>Producto</td><td colspan="2">Cantidad (Kg)</td><td>Superficie (ha)</td><td>Certificación</td><td>Productores</td>
</tr>
');
while($row_producto = mysql_fetch_assoc($producto))
{
	//producto detalle
mysql_select_db($database_sici, $sici);
$query_producto2 = sprintf("SELECT * FROM productos_informe where idproductos=%s", GetSQLValueString($row_producto['idproductos'], "int"));
$producto2 = mysql_query($query_producto2, $sici) or die(mysql_error());

$totalRows_producto2 = mysql_num_rows($producto2);
$cont=1;
while($row_producto2 = mysql_fetch_assoc($producto2))
{
	if($cont==1){
		     if($row_producto2['certificacion']=="ORGANICO"){$certificacion="100% Orgánico";}
		else if($row_producto2['certificacion']=="T0"){$certificacion="Transición";}
		else if($row_producto2['certificacion']=="T1"){$certificacion="Transición";}
		else if($row_producto2['certificacion']=="T2"){$certificacion="Transición";}
		else if($row_producto2['certificacion']=="T2"){$certificacion="Transición";}
		else if($row_producto2['certificacion']=="SANCIONADO"){$certificacion="Sancionados";}
		else if($row_producto2['certificacion']=="BAJAS"){$certificacion="Bajas";}
		else if(strlen($row_producto2['certificacion'])<1||$row_producto2['certificacion']==""){$certificacion="";}
		
$mpdf->WriteHTML('
<tr>
<td rowspan="'.$totalRows_producto2.'">'.$row_producto['nombre'].'</td>
<td>'.$row_producto2['tipo'].'</td>
<td align="right">'.number_format($row_producto2['cantidad'],2,'.',',').' '.$row_producto2['aux'].'</td>
<td align="right">'.$row_producto2['superficie'].'</td>
<td>'.$certificacion.'</td>
<td align="right">'.$row_producto2['productores'].'</td>
</tr>');
	}else
	{
		if($row_producto2['certificacion']=="ORGANICO"){$certificacion="100% Orgánico";}
		else if($row_producto2['certificacion']=="T0"){$certificacion="Transición";}
		else if($row_producto2['certificacion']=="T1"){$certificacion="Transición";}
		else if($row_producto2['certificacion']=="T2"){$certificacion="Transición";}
		else if($row_producto2['certificacion']=="T2"){$certificacion="Transición";}
		else if($row_producto2['certificacion']=="SANCIONADO"){$certificacion="Sancionados";}
		else if($row_producto2['certificacion']=="BAJAS"){$certificacion="Bajas";}
		else if(strlen($row_producto2['certificacion'])<1||$row_producto2['certificacion']==""){$certificacion="";}
$mpdf->WriteHTML('
<tr>
<td>'.$row_producto2['tipo'].'</td>
<td align="right">'.number_format($row_producto2['cantidad'],2,'.',',').' '.$row_producto2['aux'].'</td>
<td align="right">'.$row_producto2['superficie'].'</td>
<td>'.$certificacion.'</td>
<td align="right">'.$row_producto2['productores'].'</td>
</tr>');
	}
	$cont++;
}
}
$mpdf->WriteHTML('
</table>');
}
if(strlen($row_informe['procesadora_empresa'])>1||strlen($row_informe['comercializadora_empresa'])>1){
$mpdf->WriteHTML('
<table width="1000" border="1" cellpadding="0" cellspacing="0">
<tr>
<td align="right"><b>Operador:</b></td><td><b>'.$row_certificado['organizacion'].'</b></td>
</tr>
<tr>
<td align="right"><b>Ciclo:</b></td><td><b>'.$row_informe['ciclo'].'</b></td>
</tr>
<tr>
<td align="right"><b>Periodo de cosecha:</b></td><td><b>'.$row_informe['periodo_cosecha'].'</b></td>
</tr>
</table>
<table width="1000" border="1" cellpadding="0" cellspacing="0">
');
if(strlen($row_informe['procesadora_empresa'])>1||strlen($row_informe['comercializadora_empresa'])>1){
	$mpdf->WriteHTML('<tr bgcolor="#CCCCCC">
<td>Empresa</td><td>Actividad y tipo de producto</td><td>Producto</td><td>Procedencia</td><td>Calidad</td>
</tr>');
}
if(strlen($row_informe['procesadora_empresa'])>1){
$mpdf->WriteHTML('
<tr>
<td>'.$row_informe['procesadora_empresa'].'</td><td>'.$row_informe['procesadora_actividad'].'</td><td>'.$row_informe['procesadora_producto'].'</td><td>'.$row_informe['procesadora_procedencia'].'</td><td align="center">'.$aux_org1.'</td>
</tr>
');
}
if(strlen($row_informe['comercializadora_empresa'])>1){
$mpdf->WriteHTML('
<tr>
<td>'.$row_informe['comercializadora_empresa'].'</td><td>'.$row_informe['comercializadora_actividad'].'</td><td>'.$row_informe['comercializadora_producto'].'</td><td>'.$row_informe['comercializadora_procedencia'].'</td><td align="center">'.$aux_org2.'</td>
</tr>
');
}
$mpdf->WriteHTML('
</table>
');
}
$mpdf->WriteHTML('
</td></tr>
</table>
<pagebreak />
<table width="1000">
<tr>
<td rowspan="2" width="50"><img src="../utilerias/imagenes/img_aviso_lateral.fw.png" width="100"/></td>
<td><center><img src="../utilerias/imagenes/img_aviso_superior.fw.png" width="400"/></center></td>
</tr>
<tr>
<td><br><center><h4><b>'.$row_certificado['organizacion'].'</b></h4><br>'.$row_certificado['direccion'].'<br>Tel: '.$row_certificado['telefonos'].'<br>Email: '.$row_certificado['email'].'</center></td>
</tr>
</table>
<table width="100%" border="0">
<tr>
<td><br><br>
<br>
Procesador: '.$row_informe['procesador_nombre'].'
<br>
Comercializador autorizado: '.$row_informe['comercializador_nombre'].'
<br>
Inspector(es): '.$cadena_inspector.'
<br><br>
Después de revisar la presente notificación de certificación, por favor sírvase firmar la hoja de confirmación que se adjunta a esta notificación y devolverla a la oficina de CERTIMEX.	
<br><br><br>				
Muchos saludos y éxitos en el trabajo
<br><br><br>				
Atentamente	
<br><br><br><br><br><br><br>___________________________<br>				
Taurino Reyes Santiago
<br>
Director Ejecutivo
<br><br><br>
');
if(strlen($row_certificado['fecha_anexo'])>1)
{
	$mpdf->WriteHTML('Anexo: Listas autorizadas por CERTIMEX '.$row_certificado['fecha_anexo'].'');
}
else
{
	$mpdf->WriteHTML('Anexo: NO APLICA');
}
$mpdf->WriteHTML('</td>
</tr>
</table>
<pagebreak />
<table width="1000">
<tr>
<td rowspan="2" width="50"><img src="../utilerias/imagenes/img_aviso_lateral.fw.png" width="100"/></td>
<td><center><img src="../utilerias/imagenes/img_aviso_superior.fw.png" width="400"/></center></td>
</tr>
<tr>
<td><br><center><h4><b>'.$row_certificado['organizacion'].'</b></h4><br>'.$row_certificado['direccion'].'<br>Tel: '.$row_certificado['telefonos'].'<br>Email: '.$row_certificado['email'].'</center></td>
</tr>
</table>
<table width="100%" border="0">
<tr>
<td>
<br><br><center><b>Confirmación</b></center><br><br><br><b>
Por medio del presente, confirmamos haber recibido de CERTIMEX la notificación de certificación y el certificado general ecológico, correspondientes al ciclo '.$row_informe['ciclo'].'.</b>
<br><br><br><br><br><br><br><br><br><br><br><br>
<table width="1000"><tr><td><center>
______________________________________<br>		
Nombre y firma del representante</center></td><td><center>______________________________________<br>Lugar y fecha</center></td></tr></table>
</td>
</tr>
</table>
');
$mpdf->Output();
exit();

mysql_free_result($certificado);

mysql_free_result($informe);

mysql_free_result($encargo);
?>
