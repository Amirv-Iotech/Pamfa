<?php require_once('../../Connections/inforgan_pamfa.php'); ?>
<?php
error_reporting(0);
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


if ($_POST['seccion']==7) {
 
if($_POST['insertar'])
{

  $insertSQL = sprintf("INSERT INTO informe_hallazgos(idinforme,num_incumplimiento,requisito,hallazgo) VALUES (%s,%s, %s,  %s)",
             
			 GetSQLValueString($_POST['idinforme'], "text"),
			 GetSQLValueString($_POST['num_incumplimiento'], "text"),
             GetSQLValueString($_POST['requisito'], "text"),
			 GetSQLValueString($_POST['hallazgo'], "text")
			 );
						 
}
else if($_POST['eliminar']){
	
	$insertSQL = sprintf("delete from informe_hallazgos where idinforme=%s and idplan_auditoria=%s ",
 GetSQLValueString($_POST['idinforme'], "text"),
            
			 GetSQLValueString($_POST['idplan_auditoria'], "int"));
}
echo $insertSQL;
  $Result1 = mysql_query($insertSQL, $inforgan_pamfa) or die(mysql_error());

}
///////fin



///////fin
