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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form2")) {
  $updateSQL = sprintf("UPDATE certificado SET organizacion=%s, direccion=%s, telefonos=%s, email=%s, reporte=%s, alcance=%s, alcance_ingles=%s, productos=%s, productos_ingles=%s, fecha1=%s, fecha2=%s, fecha3=%s WHERE idsolicitud=%s",
                       GetSQLValueString($_POST['organizacion'], "text"),
                       GetSQLValueString($_POST['direccion'], "text"),
                       GetSQLValueString($_POST['telefonos'], "text"),
                       GetSQLValueString($_POST['email'], "text"),
                       GetSQLValueString($_POST['reporte'], "text"),
                       GetSQLValueString($_POST['alcance'], "text"),
                       GetSQLValueString($_POST['alcance_ingles'], "text"),
                       GetSQLValueString($_POST['productos'], "text"),
                       GetSQLValueString($_POST['productos_ingles'], "text"),
                       GetSQLValueString($_POST['fecha1'], "text"),
                       GetSQLValueString($_POST['fecha2'], "text"),
					   GetSQLValueString($_POST['fecha3'], "text"),
                       GetSQLValueString($_POST['idsolicitud'], "int"));

  mysql_select_db($database_sici, $sici);
  $Result1 = mysql_query($updateSQL, $sici) or die(mysql_error());
}

$colname_solicitud = "-1";
if (isset($_POST['idsolicitud'])) {
  $colname_solicitud = $_POST['idsolicitud'];
}
//CONSULTA TABLA SOLICITUD
$colname_solicitud = "-1";
if (isset($_POST['idsolicitud'])) {
  $colname_solicitud = $_POST['idsolicitud'];
}
mysql_select_db($database_sici, $sici);
$query_solicitud = sprintf("SELECT * FROM solicitud WHERE idsolicitud = %s", GetSQLValueString($colname_solicitud, "int"));
$solicitud = mysql_query($query_solicitud, $sici) or die(mysql_error());
$row_solicitud = mysql_fetch_assoc($solicitud);
$totalRows_solicitud = mysql_num_rows($solicitud);

$colname_certificado = "-1";
if (isset($_POST['idsolicitud'])) {
  $colname_certificado = $_POST['idsolicitud'];
}
mysql_select_db($database_sici, $sici);
$query_certificado = sprintf("SELECT * FROM certificado WHERE idsolicitud = %s", GetSQLValueString($colname_certificado, "int"));
$certificado = mysql_query($query_certificado, $sici) or die(mysql_error());
$row_certificado = mysql_fetch_assoc($certificado);
$totalRows_certificado = mysql_num_rows($certificado);
//fin consulta

//CONSULTA TABLA ORGANIZACION
mysql_select_db($database_sici, $sici);
$query_organizacion = sprintf("SELECT * FROM organizacion WHERE idclientes = %s", GetSQLValueString($row_solicitud['idclientes'], "int"));
$organizacion = mysql_query($query_organizacion, $sici) or die(mysql_error());
$row_organizacion = mysql_fetch_assoc($organizacion);
//fin consulta

if(strlen($row_certificado['productos_cientifico'])<3){
$texto_c=', ';
}else{
$texto_c='(<em>'.$row_certificado['productos_cientifico'].'</em>)';
}

include('mpdf.php');
$mpdf=new mPDF();
$mpdf->WriteHTML('<img src="imagenes/img_certificado_superior2.fw.png" width="100%" height="135px"/>');
$mpdf->WriteHTML('
<table border="0" width="1000px" align="center">
  <tr><td width="45"></td>
    <td valign="top">
      <table border="0" align="center" width="100%">
      <tr>
        <td style="font-size:28px" align="center"><b><br><br>'.$row_certificado['organizacion'].'</b></td>
      </tr>
      <tr>
        <td style="font-size:16px" align="center">'.$row_certificado['direccion'].'</td>
      </tr>
      <tr>
        <td style="font-size:16px" align="center">Tel: '.$row_certificado['telefonos'].'</td>
      </tr>
      <tr>
        <td style="font-size:16px" align="center">Email: '.$row_certificado['email'].'</td>
      </tr>
      <tr>
        <td style="font-size:18px" align="center"><strong>
          <p>'.$row_certificado['reporte1'].'</p>
        </strong></td>
      </tr>
      <tr>
        <td style="font-size:18px" align="center"><strong>'.$row_certificado['alcance'].'</strong></td>
      </tr>
      <tr>
        <td style="font-size:18px" align="center"><strong>'.$row_certificado['alcance_ingles'].'</strong><br /><br>
          <br /></td>
      </tr>
      <tr>
    <td style="font-size:17px" align="justify">Tomando como base la última inspección realizada y los contratos existentes, CERTIMEX, Certificadora Mexicana de Productos y Procesos Ecológicos S. C., certifica que '.$row_certificado['txtaux'].' <strong>'.$row_certificado['alcance_cuerpo'].'</strong> de <strong>'.$row_certificado['productos'].'</strong> '.$texto_c.' realizados por el operador arriba mencionado, en la cosecha <strong>'.$row_certificado['cosecha'].'</strong> cumple con las Normas CERTIMEX para Productos Ecológicos; equivalentes a los Reglamentos (CE) Nº 834/2007 y (CE) Nº 889/2008; así también con los procedimientos de inspección y certificación de productos ecológicos de CERTIMEX.<br><br><br></td>
  </tr>
  <tr>
    <td style="font-size:16px" align="justify">
    Based on the last inspection and the existing contracts CERTIMEX, Certificadora Mexicana de Productos y Procesos Ecológicos S.C., certifies the <strong>'.$row_certificado['alcance_cuerpo_ingles'].'</strong> of <strong>'.$row_certificado['productos_ingles'].'</strong> '.$texto_c.' carried out by the above mentioned operator, in the crop <strong>'.$row_certificado['cosecha'].'</strong> fulfills the CERTIMEX standards for ecological products equivalents to regulations (CE) Nº 834/2007 and (CE) Nº 889/2008. It also fulfills the inspection and certification procedures for ecological products of CERTIMEX.<br><br><br></td>
  </tr><tr>
    <td style="font-size:19px" align="justify">Para cada transacción comercial de producto ORGÁNICO que ampara este certificado, CERTIMEX emite un certificado de control conforme al Reglamento (CE) Nº 1235/2008, en el cual se especifica la cantidad de producto a comercializar.
	<br><br><br></td>
  </tr>
  <tr>
    <td style="font-size:14px" align="justify">CERTIMEX issues for each commercial transaction of ORGANIC product a certificate of control according to regulation (CE) Nº 1235/2008 .  The certificate specifies the quantity of the product that will be commercialized.</td>
  </tr>  
  <tr>
    <td style="font-size:17px" align="justify">
    <table width="1000" border="0">
    <tr>
    <td style="font-size:17px" align="justify" colspan="2"><br />El presente certificado tiene validez de un año a partir de su emisión.<br />
      <em>This certificate is valid for one year from the date of emission</em>.<br /><br><br /></td>
  </tr>
    <tr>
    <td style="font-size:18px">Fecha de control: '.$row_certificado['fecha_control'].'</td>    
    <td align="right" style="font-size:18px">Vigencia: '.$row_certificado['fecha_vigencia'].'</td>
    </tr>
      <tr>
        <td colspan="2" align="center" style="font-size:18px"><br><br>Oaxaca, México; '.$row_certificado['fecha_emision'].'</td>
        </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        </tr>
    </table></td>
  </tr>
      <tr>
        <td style="font-size:17px" align="left"><br />
          <br />
          <br />
		  <br><p>
          Taurino Reyes Santiago<br />
          Director Ejecutivo</p>
		  </td>
      </tr>
    </table></td><td width="1"></td>
  </tr>
</table>');
$mpdf->Output();
exit();
mysql_free_result($solicitud);
mysql_free_result($certificado);
?>
