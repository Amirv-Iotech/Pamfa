<? include ("Connections/inforgan_pamfa.php");

  

mysql_select_db($database_pamfa, $inforgan_pamfa);

 

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

 
if(!empty($_POST['guardar1'])){
	$t=time();
	$insertSQL = sprintf("INSERT INTO operador (username,pass_tem,nombre_legal,nombre_representante,direccion,colonia,municipio,estado,pais,cp,coordenadas,email,telefono,fax,rfc,dir_rfc,nombre_factura,email_factura,tel_factura,forma_pago,banco,digitos_tarjeta) VALUES ( %s, %s,%s, %s, %s, %s,%s, %s, %s, %s,%s, %s, %s, %s,%s, %s, %s, %s,%s,%s,%s,%s)",
	
	GetSQLValueString($_POST['username'], "text"),
	GetSQLValueString($_POST['pass_tem'], "text"),
 GetSQLValueString($_POST['nombre_legal'], "text"),
 GetSQLValueString($_POST['nombre_representante'], "text"),
 GetSQLValueString($_POST['direccion'], "text"),
 GetSQLValueString($_POST['colonia'], "text"),
  GetSQLValueString($_POST['municipio'], "text"),
  GetSQLValueString($_POST['estado'], "text"),
 GetSQLValueString($_POST['pais'], "text"),
  GetSQLValueString($_POST['cp'], "text"),
 GetSQLValueString($_POST['coordenadas'], "text"),
  GetSQLValueString($_POST['email'], "text"),
 GetSQLValueString($_POST['telefono'], "text"),
 GetSQLValueString($_POST['fax'], "text"), 
 GetSQLValueString($_POST['rfc'], "text"),
 GetSQLValueString($_POST['dir_rfc'], "text"),
 GetSQLValueString($_POST['nombre_factura'], "text"),
  GetSQLValueString($_POST['email_factura'], "text"),
 GetSQLValueString($_POST['tel_factura'], "text"),
 GetSQLValueString($_POST['forma_pago'], "text"), 
 GetSQLValueString($_POST['banco'], "text"),
 GetSQLValueString($_POST['digitos_tarjeta'], "text"));




  $Result1 = mysql_query($insertSQL,$inforgan_pamfa) or die(mysql_error());
}
?>