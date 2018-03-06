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




/////////////////inser seccion6

if ($_POST['seccion']==6) {
	



$insertSQL= sprintf("update plan_auditoria_equipo set rol=%s WHERE idplan_auditoria = %s and idauditor=%s",
                GetSQLValueString($_POST['rol'], "text"),
				GetSQLValueString($_POST['idplan_auditoria'], "text"),       
                GetSQLValueString($_POST['idauditor'], "text"));
  $Result1 = mysql_query($insertSQL, $inforgan_pamfa) or die(mysql_error());
}

if ($_POST['seccion']==7) {
	



$insertSQL= sprintf("update lista_portada set h_inicio=%s,h_fin=%s WHERE idlista_portada = %s ",
                GetSQLValueString($_POST['h_inicio'], "text"),
				 GetSQLValueString($_POST['h_fin'], "text"),
				  
				GetSQLValueString($_POST['idlista_portada'], "text"));
  $Result1 = mysql_query($insertSQL, $inforgan_pamfa) or die(mysql_error());
  
  
}
if ($_POST['seccion2']==77) {
	

  
  
  $act= sprintf("update informe set duracion=%s WHERE idplan_auditoria = %s ",
               
				 GetSQLValueString($_POST['duracion'], "text"),
				  
				GetSQLValueString($_POST['idp'], "text"));
  $Res = mysql_query($act, $inforgan_pamfa) or die(mysql_error());
}

if ($_POST['seccion']==8) {
	



$insertSQL= sprintf("update plan_auditoria set port_tecnico=%s,nc_plazo=%s WHERE idplan_auditoria = %s ",
                GetSQLValueString($_POST['port_tecnico'], "text"),
				 GetSQLValueString($_POST['nc_plazo'], "text"),
				GetSQLValueString($_POST['idplan_auditoria'], "text"));
  $Result1 = mysql_query($insertSQL, $inforgan_pamfa) or die(mysql_error());
  
  $act= sprintf("update informe set duracion=%s WHERE idplan_auditoria = %s ",
               
				 GetSQLValueString($_POST['duracion'], "text"),
				  
				GetSQLValueString($_POST['idp'], "text"));
  $Res = mysql_query($act, $inforgan_pamfa) or die(mysql_error());
}

if ($_POST['seccion']==9) {
	
$insertSQL= sprintf("update lista_politicas set nombre_prod=%s,desig_prod=%s,remp_prod=%s,nombre_cosecha=%s,desig_cosecha=%s,remp_cosecha=%s,nombre_manip=%s,desig_manip=%s,remp_manip=%s ,tel=%s WHERE idplan_auditoria = %s ",
                GetSQLValueString($_POST['nombre_prod'], "text"),
				 GetSQLValueString($_POST['desig_prod'], "text"),
				 GetSQLValueString($_POST['remp_prod'], "text"),
				 GetSQLValueString($_POST['nombre_cosecha'], "text"),
				 GetSQLValueString($_POST['desig_cosecha'], "text"),
				 GetSQLValueString($_POST['remp_cosecha'], "text"),
				 GetSQLValueString($_POST['nombre_manip'], "text"),
				 GetSQLValueString($_POST['desig_manip'], "text"),
				 GetSQLValueString($_POST['remp_manip'], "text"),
				  GetSQLValueString($_POST['tel'], "text"),
				GetSQLValueString($_POST['idplan_auditoria'], "text"));
  $Result1 = mysql_query($insertSQL, $inforgan_pamfa) or die(mysql_error());


}
if ($_POST['seccion']==10) {
	
$insertSQL= sprintf("update lista_notas set r1=%s,r2=%s,r3=%s,r4=%s,r5=%s,r6=%s,r7=%s,r8=%s,r9=%s,r10=%s,r11=%s, productos1=%s,productos2=%s,productos3=%s,productos4=%s,productos5=%s,productos6=%s,lugar=%s,duracion=%s,calculo=%s WHERE idplan_auditoria = %s ",
                GetSQLValueString($_POST['r1'], "text"),
				GetSQLValueString($_POST['r2'], "text"),
				GetSQLValueString($_POST['r3'], "text"),
				GetSQLValueString($_POST['r4'], "text"),
				GetSQLValueString($_POST['r5'], "text"),
				GetSQLValueString($_POST['r6'], "text"),
				GetSQLValueString($_POST['r7'], "text"),
				GetSQLValueString($_POST['r8'], "text"),
				GetSQLValueString($_POST['r9'], "text"),
				GetSQLValueString($_POST['r10'], "text"),
				GetSQLValueString($_POST['r11'], "text"),
				GetSQLValueString($_POST['productos1'], "text"),
				GetSQLValueString($_POST['productos2'], "text"),
				GetSQLValueString($_POST['productos3'], "text"),
				GetSQLValueString($_POST['productos4'], "text"),
				GetSQLValueString($_POST['productos5'], "text"),
				GetSQLValueString($_POST['productos6'], "text"),
				GetSQLValueString($_POST['lugar'], "text"),
				GetSQLValueString($_POST['duracion'], "text"),
				GetSQLValueString($_POST['calculo'], "text"),
				GetSQLValueString($_POST['idplan_auditoria'], "text"));
  $Result1 = mysql_query($insertSQL, $inforgan_pamfa) or die(mysql_error());


}
if ($_POST['seccion']==102) {
	
$insertSQL= sprintf("update lista_notas set rc1=%s,rc2=%s,rc3=%s,coc_productos=%s,coc_lugares=%s,coc_duracion=%s WHERE idplan_auditoria = %s ",
                GetSQLValueString($_POST['rc1'], "text"),
				GetSQLValueString($_POST['rc2'], "text"),
				GetSQLValueString($_POST['rc3'], "text"),
				
				GetSQLValueString($_POST['coc_productos'], "text"),
				GetSQLValueString($_POST['coc_lugares'], "text"),
				GetSQLValueString($_POST['coc_duracion'], "text"),
				GetSQLValueString($_POST['idplan_auditoria'], "text"));
  $Result1 = mysql_query($insertSQL, $inforgan_pamfa) or die(mysql_error());


}
///////fin
/////////////////inser seccion7


