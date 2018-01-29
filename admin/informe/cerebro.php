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

  $insertSQL = sprintf("INSERT INTO informe_hallazgos(idinforme,num_incumplimiento_ifa,requisito_ifa,hallazgo_ifa,num_incumplimiento_coc,requisito_coc,hallazgo_coc,num_incumplimiento_mexcalsup,requisito_mexcalsup,hallazgo_mexcalsup) VALUES (%s,%s, %s,  %s,%s,%s, %s,%s,%s, %s)",
  GetSQLValueString($_POST['idinforme'], "text"),
             GetSQLValueString($_POST['num_incumplimiento_ifa'], "text"),
             GetSQLValueString($_POST['requisito_ifa'], "text"),
			 GetSQLValueString($_POST['hallazgo_ifa'], "text"),
			 GetSQLValueString($_POST['num_incumplimiento_coc'], "text"),
             GetSQLValueString($_POST['requisito_coc'], "text"),
			 GetSQLValueString($_POST['hallazgo_coc'], "text"),
			 GetSQLValueString($_POST['num_incumplimiento_mexcalsup'], "text"),
             GetSQLValueString($_POST['requisito_mexcalsup'], "text"),
			 GetSQLValueString($_POST['hallazgo_mexcalsup'], "text"));
						 
}
else if($_POST['eliminar']){
	
	$insertSQL = sprintf("delete from informe_hallazgos where idinforme_hallazgo=%s  ",
 GetSQLValueString($_POST['idinforme_hallazgo'], "text"));
}
  $Result1 = mysql_query($insertSQL, $inforgan_pamfa) or die(mysql_error());




}
///////fin
if($_POST['insertar2'])
{
$f=time();
  $insertSQL = sprintf("Update informe set observacion_ifa=%s,dictamen_ifa=%s,fecha_dictamen_ifa=%s,nombre_dictamen_ifa=%s where idinforme=%s",
 
             GetSQLValueString($_POST['observacion_ifa'], "text"),
             GetSQLValueString($_POST['dictamen_ifa'], "text"),
			 GetSQLValueString($f, "text"),
			 GetSQLValueString($_SESSION['idusuario'], "text"),
			  GetSQLValueString($_POST['idinforme'], "text"));
			 
			   $Result1 = mysql_query($insertSQL, $inforgan_pamfa) or die(mysql_error());
if($_POST['dictamen_ifa']=="aprobado")
{
	$query_certificado= sprintf("select *from certificado where idinforme=%s ", GetSQLValueString($_POST["idinforme"], "int"));
$certificado = mysql_query($query_certificado, $inforgan_pamfa) or die(mysql_error());
$total_certificado = mysql_num_rows($certificado);
if($total_certificado<1)
{

				$insertSQL = sprintf("INSERT INTO certificado(idinforme,certificado_tipo1) VALUES (%s,%s)",
  GetSQLValueString($_POST['idinforme'], "text"),
  GetSQLValueString(1, "text"));	
			  $Result1 = mysql_query($insertSQL, $inforgan_pamfa) or die(mysql_error());
}
else
{
	 $insertSQL = sprintf("Update certificado set certificado_tipo1=%s where idinforme=%s",
 
            GetSQLValueString(1, "int"),
			  GetSQLValueString($_POST['idinforme'], "text"));
			 
			   $Result1 = mysql_query($insertSQL, $inforgan_pamfa) or die(mysql_error());
}

}
}
if($_POST['insertar3'])
{
$f=time();
  $insertSQL = sprintf("Update informe set observacion_coc=%s,dictamen_coc=%s,fecha_dictamen_coc=%s,nombre_dictamen_coc=%s where idinforme=%s",
 
             GetSQLValueString($_POST['observacion_coc'], "text"),
             GetSQLValueString($_POST['dictamen_coc'], "text"),
			 GetSQLValueString($f, "text"),
			 GetSQLValueString($_SESSION['idusuario'], "text"),
			  GetSQLValueString($_POST['idinforme'], "text"));
			   $Result1 = mysql_query($insertSQL, $inforgan_pamfa) or die(mysql_error());
			  if($_POST['dictamen_coc']=="aprobado")
{
	$query_certificado= sprintf("select *from certificado where idinforme=%s ", GetSQLValueString($_POST["idinforme"], "int"));
$certificado = mysql_query($query_certificado, $inforgan_pamfa) or die(mysql_error());
$total_certificado = mysql_num_rows($certificado);
if($total_certificado<1)
{

				$insertSQL = sprintf("INSERT INTO certificado(idinforme,certificado_tipo2) VALUES (%s,%s)",
  GetSQLValueString($_POST['idinforme'], "text"),
  GetSQLValueString(1, "text"));	
			  $Result1 = mysql_query($insertSQL, $inforgan_pamfa) or die(mysql_error());
}
else
{
	 $insertSQL = sprintf("Update certificado set certificado_tipo2=%s where idinforme=%s",
 
             GetSQLValueString(1, "int"),
			  GetSQLValueString($_POST['idinforme'], "text"));
			 
			   $Result1 = mysql_query($insertSQL, $inforgan_pamfa) or die(mysql_error());
}

}
						 
}
if($_POST['insertar4'])
{
$f=time();
  $insertSQL = sprintf("Update informe set observacion_mexcalsup=%s,dictamen_mexcalsup=%s,fecha_dictamen_mexcalsup=%s,nombre_dictamen_mexcalsup=%s where idinforme=%s",
 
             GetSQLValueString($_POST['observacion_mexcalsup'], "text"),
             GetSQLValueString($_POST['dictamen_mexcalsup'], "text"),
			 GetSQLValueString($f, "text"),
			 GetSQLValueString($_SESSION['idusuario'], "text"),
			  GetSQLValueString($_POST['idinforme'], "text"));
			   $Result1 = mysql_query($insertSQL, $inforgan_pamfa) or die(mysql_error());
if($_POST['dictamen_mexcalsup']=="aprobado")
{
	$query_certificado= sprintf("select *from certificado where idinforme=%s ", GetSQLValueString($_POST["idinforme"], "int"));
$certificado = mysql_query($query_certificado, $inforgan_pamfa) or die(mysql_error());
$total_certificado = mysql_num_rows($certificado);
if($total_certificado<1)
{

				$insertSQL = sprintf("INSERT INTO certificado(idinforme,certificado_tipo3) VALUES (%s,%s)",
  GetSQLValueString($_POST['idinforme'], "text"),
  GetSQLValueString(1, "text"));	
			  $Result1 = mysql_query($insertSQL, $inforgan_pamfa) or die(mysql_error());
}
else
{
	 $insertSQL = sprintf("Update certificado set certificado_tipo3=%s where idinforme=%s",
 
             GetSQLValueString(1, "int"),
			  GetSQLValueString($_POST['idinforme'], "text"));
			 
			   $Result1 = mysql_query($insertSQL, $inforgan_pamfa) or die(mysql_error());
}

}
			
						 
}

/////mover
if ($_POST['seccion']==12) {
	
	$query_pre= sprintf("select *from informe_nc where idinforme=%s and idpregunta=%s ", GetSQLValueString($_POST["idinforme"], "int")
	, GetSQLValueString($_POST["idpregunta"], "int"));
$pre = mysql_query($query_pre, $inforgan_pamfa) or die(mysql_error());
$total_pre = mysql_num_rows($pre);
if($total_pre<1)
{
	$insertSQL = sprintf("INSERT INTO informe_nc(referencia,punto_control,nivel,nc,evidencia,idpregunta,idinforme) VALUES (%s,%s,%s, %s,  %s, %s, %s)",
            
			
			   GetSQLValueString($_POST['p5'], "text"),
			 
			
			  GetSQLValueString($_POST['idpregunta'], "text"),
			    GetSQLValueString($_POST['idinforme'], "text"));
			 
			 
			 
}
else{
	 $insertSQL = sprintf("Update informe_nc set nc=%s,evidencia=%s where idinforme=%s and idpregunta=%s",
 
             GetSQLValueString($_POST['p4'], "text"),
			   GetSQLValueString($_POST['p5'], "text"),
			 
			
			
			    GetSQLValueString($_POST['idinforme'], "text"),  
				GetSQLValueString($_POST['idpregunta'], "text"));
	}
  $Result1 = mysql_query($insertSQL, $inforgan_pamfa) or die(mysql_error());
}

///////
if ($_POST['seccion']==88) {
	
$insertSQL = sprintf("Update informe set max_nc_men=%s,aspectos=%s,mejora=%s where idinforme=%s",
 
             GetSQLValueString($_POST['max_nc_men'], "text"),
             GetSQLValueString($_POST['aspectos'], "text"),
			 GetSQLValueString($_POST['mejora'], "text"),
			 
			  GetSQLValueString($_POST['idinforme'], "text"));
			 
			   $Result1 = mysql_query($insertSQL, $inforgan_pamfa) or die(mysql_error());
}