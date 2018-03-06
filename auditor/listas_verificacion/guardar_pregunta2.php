<? require_once('../../Connections/inforgan_pamfa.php');
if(!session_start())
{
	session_start();
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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if (isset($_POST['idpregunta'])) {
$query_resp="select count(*) as total from catalogos_respuestas where idplan_auditoria='".$_POST['idplan_auditoria']."' and idpregunta='".$_POST['idpregunta']."'";
$resp=mysql_query($query_resp, $inforgan_pamfa) or die(mysql_error());
$row_resp=mysql_fetch_assoc($resp);
$valor="";
if($row_resp['total']==0){
if($_POST['respuesta']=="CUMPLE"){$valor=0;}
if($_POST['respuesta']=="NO CUMPLE"){$valor=1;}
if($_POST['respuesta']=="NO APLICA"){$valor=1;}
	$insertSQL = sprintf("INSERT INTO catalogos_respuestas (idplan_auditoria,idpregunta,respuesta,observacion,valor) VALUES (%s,%s,%s,%s,%s)",
	GetSQLValueString($_POST['idplan_auditoria'], "int"),
	GetSQLValueString($_POST['idpregunta'], "int"),
	GetSQLValueString($_POST['respuesta'], "text"),
	GetSQLValueString($_POST['observacion'], "text"),
	GetSQLValueString($valor, "text"));
	
	$Result1 = mysql_query($insertSQL, $inforgan_pamfa) or die(mysql_error());
}else{
	
	if($_POST['respuesta']=="CUMPLE"){$valor=0;}
if($_POST['respuesta']=="NO CUMPLE"){$valor=1;}
if($_POST['respuesta']=="NO APLICA"){$valor=1;}
	$updateSQL = sprintf("UPDATE catalogos_respuestas SET 
	respuesta=%s,observacion=%s,valor=%s WHERE idpregunta='".$_POST["idpregunta"]."'&& idplan_auditoria='".$_POST['idplan_auditoria']."'",
	
	GetSQLValueString($_POST['respuesta'], "text"),
	GetSQLValueString($_POST['observacion'], "text"),
	GetSQLValueString($valor, "text"),
	
	GetSQLValueString($_POST['idpregunta'], "int"),
	GetSQLValueString($_POST['idplan_auditoria'], "int"));
	$Result1 = mysql_query($updateSQL, $inforgan_pamfa) or die(mysql_error());
}
}


?>