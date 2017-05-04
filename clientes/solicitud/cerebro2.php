<?php require_once('../../Connections/inforgan_pamfa.php'); ?>
<?php
error_reporting(0);
mysql_select_db($database_pamfa, $nforgan_pamfa);

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



  $f=time();
$insertSQL = sprintf("INSERT INTO solicitud (fecha, idoperador) VALUES (%s, %s)",
             GetSQLValueString($f, "text"), GetSQLValueString($_SESSION["idoperador"],int));
   $Result1 = mysql_query($insertSQL, $inforgan_pamfa) or die(mysql_error()); 

 $query_a = sprintf("SELECT Max(idsolicitud) as id FROM solicitud  WHERE idoperador=%s",GetSQLValueString($_SESSION["idoperador"], "text"));
  $a  = mysql_query($query_a , $inforgan_pamfa) or die(mysql_error());
$row_a = mysql_fetch_assoc($a);  
$sola = $row_a['id'];












