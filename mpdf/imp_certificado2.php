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
$mpdf->setAutoBottomMargin="0";
$mpdf->WriteHTML('
<table border="0">
  <tr>
  <td width="20">
  <img src="../utilerias/imagenes/img_certificado_lateral_2.fw.png" width="150"/>
  </td>
    <td valign="top">
      <table border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td style="font-size:26px" align="center">
				<br><br><br><br><br><br><br><br><br>
				<b>'.$row_certificado['organizacion'].'</b></td>
      </tr>
      <tr>
        <td style="font-size:18px" align="center">'.$row_certificado['direccion'].'</td>
      </tr>
      <tr>
        <td style="font-size:18px" align="center">Tel: '.$row_certificado['telefonos'].'</td>
      </tr>
      <tr>
        <td style="font-size:18px" align="center">Email: '.$row_certificado['email'].'</td>
      </tr>
      <tr>
        <td style="font-size:20px" align="center"><strong>
          <p>'.$row_certificado['reporte2'].'</p>
        </strong></td>
      </tr>
      <tr>
        <td style="font-size:20px" align="center"><strong>'.$row_certificado['alcance'].'</strong></td>
      </tr>
      <tr>
        <td style="font-size:20px" align="center"><strong>'.$row_certificado['alcance_ingles'].'</strong><br><br><br></td>
      </tr>
      <tr>
        <td style="font-size:19px" align="justify">Tomando como base la última inspección realizada y los contratos existentes, CERTIMEX, Certificadora Mexicana de Productos y Procesos Ecológicos S. C., certifica que '.$row_certificado['txtaux'].' <strong>'.$row_certificado['alcance_cuerpo'].'</strong> de <strong>'.$row_certificado['productos'].'</strong> '.$texto_c.' realizados por el operador arriba mencionado, cumplen con el National Organic Program NOP administrado por USDA.</td>
      </tr>
      <tr>
        <td style="font-size:17px" align="justify"><br>Based on the last inspection and the existing contracts “CERTIMEX, Certificadora Mexicana de Productos y Procesos Ecológicos S.C “certifies the <strong>'.$row_certificado['alcance_cuerpo_ingles'].'</strong> of <strong>'.$row_certificado['productos_ingles'].'</strong> '.$texto_c.' carried out by the above mentioned operator, fulfills the  National Organic Program (NOP) administred by USDA.</td>
      </tr>
      <tr>
        <td style="font-size:20px" align="justify"><br />
          Para cada transacción comercial de producto <strong>100% ORGÁNICO</strong> que ampara este certificado, CERTIMEX emite un certificado de transaccion en el que se especifica la cantidad de producto a comercializar.</td>
      </tr>
      <tr>
        <td style="font-size:17px" align="justify"><br>CERTIMEX issues, for each commercial transaction of 100% ORGANIC product, a transaction certificate. The certificate specifies the quantity of the product that will be commercialized.</td>
      </tr>
      <tr>
        <td style="font-size:18px" align="justify"><table width="100%" border="0">
          <tr>
            <td style="font-size:19px" align="justify">Fecha efectiva de la primera certificación</td>
            <td></td>
          </tr>
          <tr>
            <td style="font-size:18px">Effective date of first certification</td>
            <td style="font-size:18px" align="right">'.$row_certificado['fecha1'].'</td>
          </tr>
          <tr>
            <td width="84%" style="font-size:18px"><br><br><br>Inspección</td>
            <td width="16%" style="font-size:18px" align="right"><br><br>Actualización</td>
          </tr>
          <tr>
            <td style="font-size:18px">Inspection: <span style="font-size:17px">'.$row_certificado['fecha2'].'</span></td>
            <td style="font-size:18px" align="right">Update: <span style="font-size:17px">'.$row_certificado['fecha3'].'</span></td>
          </tr>
          <tr>
            <td></td>
            <td></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td style="font-size:18px" align="left" valign="bottom">
				<br />
          <br />
          <br />
				<br />
		  <br />
          <br /><br /><p>
		  <br /><br><br></p>
          <table><tr height="70"><td width="100"></td><td valign="bottom"><span style="font-size:21px">Taurino Reyes Santiago</span><br />
          <span style="font-size:18px">Executive Director</span></td></tr></table></td>
      </tr>
    </table></td>
	<td width="10">
	</td>
  </tr>
</table>');
$mpdf->Output();
exit();
mysql_free_result($solicitud);
mysql_free_result($certificado);
?>
