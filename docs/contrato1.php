<?php require_once('sici.php'); ?>
<?php

mysql_select_db($database_sici, $sici);

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

$MM_restrictGoTo = "../../menu_principal.php";
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

if(isset($_POST['det_condicion'])){

	$query_cnd = sprintf("update condicion_informe set correccion=%s,evidencia=%s,evaluacion=%s where idcondicion=%s", GetSQLValueString($_POST['correccion'], "text"),
	GetSQLValueString($_POST['evidencia'], "text"),
	GetSQLValueString($_POST['evaluacion'], "text"),
	GetSQLValueString($_POST['idcondicion'], "int"));
$cnd = mysql_query($query_cnd, $sici) or die(mysql_error());
}

if(isset($_POST['fecha_reporte'])){

	$query_fr = sprintf("update informe set fecha_reporte=%s where idsolicitud=%s", GetSQLValueString($_POST['fecha_reporte'], "text"),
	GetSQLValueString($_POST['idsolicitud'], "int"));
$cnd = mysql_query($query_fr, $sici) or die(mysql_error());
}

$colname_organizacion = "-1";
if (isset($_POST['idsolicitud'])) {
  $colname_organizacion = $_POST['idsolicitud'];
}

$query_organizacion = sprintf("SELECT * FROM organizacion WHERE idclientes in(select idclientes from solicitud where idsolicitud=%s)", GetSQLValueString($colname_organizacion, "int"));
$organizacion = mysql_query($query_organizacion, $sici) or die(mysql_error());
$row_organizacion = mysql_fetch_assoc($organizacion);
$totalRows_organizacion = mysql_num_rows($organizacion);

$colname_encargo = "-1";
if (isset($_POST['idsolicitud'])) {
  $colname_encargo = $_POST['idsolicitud'];
}

$query_encargo = sprintf("SELECT * FROM encargo WHERE idsolicitud = %s", GetSQLValueString($colname_encargo, "int"));
$encargo = mysql_query($query_encargo, $sici) or die(mysql_error());
$row_encargo = mysql_fetch_assoc($encargo);
$totalRows_encargo = mysql_num_rows($encargo);


$query_inspector = sprintf("SELECT * FROM inspector where idinspector in(select idinspector from inspeccion where idsolicitud=%s)", GetSQLValueString($row_encargo['idsolicitud'], "int"));
$inspector = mysql_query($query_inspector, $sici) or die(mysql_error());
//$row_inspector = mysql_fetch_assoc($inspector);
$totalRows_inspector = mysql_num_rows($inspector);

$colname_informe = "-1";
if (isset($_POST['idsolicitud'])) {
  $colname_informe = $_POST['idsolicitud'];
}

$query_informe = sprintf("SELECT * FROM informe WHERE idsolicitud = %s", GetSQLValueString($colname_informe, "int"));
$informe = mysql_query($query_informe, $sici) or die(mysql_error());
$row_informe = mysql_fetch_assoc($informe);
$totalRows_informe = mysql_num_rows($informe);

$colname_salida = "-1";
if (isset($_POST['idsolicitud'])) {
  $colname_salida = $_POST['idsolicitud'];
}
$query_salida = sprintf("SELECT * FROM salida_informe WHERE idsolicitud = %s", GetSQLValueString($colname_salida, "int"));
$salida = mysql_query($query_salida, $sici) or die(mysql_error());
$totalRows_salida = mysql_num_rows($salida);

include('mpdf.php');
//$mpdf=new mPDF();
//$mpdf=new mPDF();
$mpdf = new mPDF('',    // mode - default ''
 '',    // format - A4, for example, default ''
 0,     // font size - default 0
 '',    // default font family
 4,    // margin_left
 4,    // margin right
 4,     // margin top
 4,    // margin bottom
 0,     // margin header
 5,     // margin footer
 'L');  // L - landscape, P - portrait
$mpdf->WriteHTML('
<html>
<head>
<style type="text/css">
body,td,th {
	font-family: Arial, Helvetica, sans-serif;
}
</style>
</head>
<body>
<table  width="100%" border="1" cellspacing="0" cellpadding="0">
      <tr>
        <td align="center" style="color: #CCC">CERTIMEX</td>
        <td align="center" style="color: #CCC">Manual de cuestionarios y formatos</td>
        <td align="center" style="color: #CCC">Capitulo<br />3.18.B</td>
        <td align="center" style="color: #CCC">P&aacute;gina<br />1 de 1</td>
      </tr>
      <tr>
        <td align="center" style="color: #CCC">
				
				<table  border="0" cellspacing="0">
          <tr>
            <td align="center">Sistema de calidad</td>
          </tr>
          <tr>
            <td align="center">Elabor&oacute;: JFOV</td>
          </tr>
          <tr>
            <td align="center">Revis&oacute;: TRS</td>
          </tr>
        </table>
				
				</td>
        <td align="center" ><strong>Formato de Entrevista de salida</strong></td>
        <td align="center" >Revisi&oacute;n<br />
          0</td>
        <td align="center" >Fecha<br />05/2016</td>
      </tr>
    </table>
		<br>
      Nombre del operador: 
    <b>'.$row_organizacion['organizacion'].'</b><br><br>
    <table align="center" border="1" cellspacing="0">
      <tr>
        <td align="center" ><strong>Apartado del reglamento NOP</strong></td>
        <td align="center" ><strong>Observaciones</strong></td>
        
      </tr>');
      while($row_salida = mysql_fetch_assoc($salida)){
	$mpdf->WriteHTML('
      <tr>
        <td>'.$row_salida['apartado_nop'].'</td>
        <td align="justify">'.$row_salida['observacion'].'</td>
       
      </tr>');
	  }$mpdf->WriteHTML('
    </table>
    <br /><br /><br><br><br><br><br>
    <table align="center"  border="0">
      <tr>');
			while($row_inspector = mysql_fetch_assoc($inspector)){
			$mpdf->WriteHTML('
			<td  align="center">________________________<br />
			'.$row_inspector['nombre']." ".$row_inspector['appaterno']." ".$row_inspector['apmaterno'].'<br /></td><td width="50">&nbsp;</td>');
			}
					$mpdf->WriteHTML('
        
        <td align="center"></td>
      </tr>
      <tr>
        <td align="center">&nbsp;</td>
        <td>&nbsp;</td>
        <td align="center">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="3">Lugar y fecha:<br>'.utf8_encode($row_informe['fecha_reporte']).'</td>        
       
      </tr>
    </table>
</body>
</html>
');
$mpdf->Output();
exit();
mysql_free_result($organizacion);

mysql_free_result($encargo);

mysql_free_result($inspector);

mysql_free_result($informe);

mysql_free_result($salida);
?>
