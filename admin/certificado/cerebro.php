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



 
if($_POST['insertar'])
{
	
	$query_certificado= sprintf("select *from certificado where idinforme=%s ", GetSQLValueString($_POST["idinforme"], "int"),GetSQLValueString($_POST["idcertificado"], "int"));
$certificado = mysql_query($query_certificado, $inforgan_pamfa) or die(mysql_error());
$total_certificado = mysql_num_rows($certificado);

if($total_certificado<1)
{
	
  $insertSQL = sprintf("INSERT INTO certificado(idinforme,certificado_tipo1,version_ifa,fecha_inicial_ifa,fecha_final_ifa,fecha_impresion_ifa,acreditacion_ifa) VALUES (%s,%s, %s,  %s,%s,%s, %s)",
  GetSQLValueString($_POST['idinforme'], "text"),
            
             GetSQLValueString(1, "text"),
			 GetSQLValueString($_POST['version'], "text"),
			 GetSQLValueString($_POST['fecha_inicial'], "text"),
             GetSQLValueString($_POST['fecha_final'], "text"),
			 GetSQLValueString($_POST['fecha_impresion'], "text"),
			 GetSQLValueString($_POST['acreditacion'], "text"));
}
else{
	$insertSQL = sprintf("update certificado set version_ifa=%s,fecha_inicial_ifa=%s,fecha_final_ifa=%s,fecha_impresion_ifa=%s,acreditacion_ifa=%s WHERE idinforme=%s ",
 
            
			 GetSQLValueString($_POST['version'], "text"),
			 GetSQLValueString($_POST['fecha_inicial'], "text"),
             GetSQLValueString($_POST['fecha_final'], "text"),
			 GetSQLValueString($_POST['fecha_impresion'], "text"),
			 GetSQLValueString($_POST['acreditacion'], "text"),
			  GetSQLValueString($_POST['idinforme'], "text"));
}
 $Result1 = mysql_query($insertSQL, $inforgan_pamfa) or die(mysql_error());
}

if($_POST['eliminar']){
	
	$insertSQL = sprintf("delete from informe_hallazgos where idinforme_hallazgo=%s  ",
 GetSQLValueString($_POST['idinforme_hallazgo'], "text"));
  $Result1 = mysql_query($insertSQL, $inforgan_pamfa) or die(mysql_error());
}




if($_POST['insertar_prod'] && $_POST['insertar_prod'] == 1)
{
	
	$query_certificado= sprintf("select idcert_producto from cert_producto where idcert_producto=%s ", GetSQLValueString($_POST["idcert_producto"], "int"));
$certificado = mysql_query($query_certificado, $inforgan_pamfa) or die(mysql_error());
$total_certificado = mysql_num_rows($certificado);

?><br><?
echo $_POST['idcertificado'].
			 $_POST['producto'].
			$_POST['nombre_cientifico'].
            $_POST['ggn'].
			 $_POST['pamfa'].
			$_POST['centro_manipulacion'].
			$_POST['cosecha_excluida'].
			$_POST['emplazamientos'].
			$_POST['prod_paralela'];
if($total_certificado<1)
{
	
  $insertSQL = sprintf("INSERT INTO cert_producto(idcertificado,idcultivo,producto,nombre_cientifico,ggn,pamfa,centro_manipulacion,cosecha_excluida,emplazamientos,prod_paralela) VALUES (%s,%s,%s,%s,%s,%s,%s,%s,%s,%s)",
             GetSQLValueString($_POST['idcertificado'], "int"),
			  GetSQLValueString($_POST['idcultivo'], "int"),
			 GetSQLValueString($_POST['producto'], "text"),
			 GetSQLValueString($_POST['nombre_cientifico'], "text"),
             GetSQLValueString($_POST['ggn'], "text"),
			 GetSQLValueString($_POST['pamfa'], "text"),
			 GetSQLValueString($_POST['centro_manipulacion'], "text"),
			 GetSQLValueString($_POST['cosecha_excluida'], "text"),
			 GetSQLValueString($_POST['emplazamientos'], "text"),
			 GetSQLValueString($_POST['prod_paralela'], "text"));
			 
}
else{
	$insertSQL = sprintf("update cert_producto set producto=%s,nombre_cientifico=%s,ggn=%s,pamfa=%s,centro_manipulacion=%s,cosecha_excluida=%s,emplazamientos=%s,prod_paralela=%s WHERE idcert_producto=%s",
 
            
			  GetSQLValueString($_POST['producto'], "text"),
			 GetSQLValueString($_POST['nombre_cientifico'], "text"),
             GetSQLValueString($_POST['ggn'], "text"),
			 GetSQLValueString($_POST['pamfa'], "text"),
			 GetSQLValueString($_POST['centro_manipulacion'], "text"),
			 GetSQLValueString($_POST['cosecha_excluida'], "text"),
			 GetSQLValueString($_POST['emplazamientos'], "text"),
			 GetSQLValueString($_POST['prod_paralela'], "text"),
             GetSQLValueString($_POST['idcert_producto'], "text"));
}
 
 $Result1 = mysql_query($insertSQL, $inforgan_pamfa) or die(mysql_error());
}


///////fin
//////////////////////////inicio coc
if($_POST['insertar_coc'])
{
	$query_certificado= sprintf("select *from certificado where idinforme=%s ", GetSQLValueString($_POST["idinforme"], "int"),GetSQLValueString($_POST["idcertificado"], "int"));
$certificado = mysql_query($query_certificado, $inforgan_pamfa) or die(mysql_error());
$total_certificado = mysql_num_rows($certificado);
if($total_certificado<1)
{
	
  $insertSQL = sprintf("INSERT INTO certificado(idinforme,certificado_tipo2,version_coc,fecha_inicial_coc,fecha_final_coc,fecha_impresion_coc,acreditacion_coc) VALUES (%s,%s, %s,  %s,%s,%s, %s)",
  GetSQLValueString($_POST['idinforme'], "text"),
            
             GetSQLValueString(1, "text"),
			 GetSQLValueString($_POST['version'], "text"),
			 GetSQLValueString($_POST['fecha_inicial'], "text"),
             GetSQLValueString($_POST['fecha_final'], "text"),
			 GetSQLValueString($_POST['fecha_impresion'], "text"),
			 GetSQLValueString($_POST['acreditacion'], "text"));
}
else{
	$insertSQL = sprintf("update certificado set version_coc=%s,fecha_inicial_coc=%s,fecha_final_coc=%s,fecha_impresion_coc=%s,acreditacion_coc=%s WHERE idinforme=%s",
 
            
			 GetSQLValueString($_POST['version'], "text"),
			 GetSQLValueString($_POST['fecha_inicial'], "text"),
             GetSQLValueString($_POST['fecha_final'], "text"),
			 GetSQLValueString($_POST['fecha_impresion'], "text"),
			 GetSQLValueString($_POST['acreditacion'], "text"),
			  GetSQLValueString($_POST['idinforme'], "text"));
}
 $Result1 = mysql_query($insertSQL, $inforgan_pamfa) or die(mysql_error());
}

if($_POST['eliminar']){
	
	$insertSQL = sprintf("delete from informe_hallazgos where idinforme_hallazgo=%s  ",
 GetSQLValueString($_POST['idinforme_hallazgo'], "text"));
  $Result1 = mysql_query($insertSQL, $inforgan_pamfa) or die(mysql_error());
}




if($_POST['insertar_prod_coc'] && $_POST['insertar_prod_coc'] == 1)
{
	
	$query_certificado= sprintf("select idcert_producto from cert_producto where idcert_producto=%s ", GetSQLValueString($_POST["idcert_producto"], "int"));
$certificado = mysql_query($query_certificado, $inforgan_pamfa) or die(mysql_error());
$total_certificado = mysql_num_rows($certificado);


?><br><?

if($total_certificado<1)
{
	
  $insertSQL = sprintf("INSERT INTO cert_producto(idcertificado,idcultivo,producto,nombre_cientifico,coc,pamfa,prod_paralela) VALUES (%s,%s,%s,%s,%s,%s,%s)",
             GetSQLValueString($_POST['idcertificado'], "int"),
			  GetSQLValueString($_POST['idcultivo'], "int"),
			 GetSQLValueString($_POST['producto'], "text"),
			 GetSQLValueString($_POST['nombre_cientifico'], "text"),
             GetSQLValueString($_POST['coc'], "text"),
			 GetSQLValueString($_POST['pamfa'], "text"),
			 GetSQLValueString($_POST['prod_paralela'], "text"));

			 
}
else{
	$insertSQL = sprintf("update cert_producto set producto=%s,nombre_cientifico=%s,coc=%s,pamfa=%s,prod_paralela=%s WHERE idcert_producto=%s",
 
            
			  GetSQLValueString($_POST['producto'], "text"),
			 GetSQLValueString($_POST['nombre_cientifico'], "text"),
             GetSQLValueString($_POST['coc'], "text"),
			 GetSQLValueString($_POST['pamfa'], "text"),
			 GetSQLValueString($_POST['prod_paralela'], "text"),
             GetSQLValueString($_POST['idcert_producto'], "text"));
}
 
 $Result1 = mysql_query($insertSQL, $inforgan_pamfa) or die(mysql_error());
}

if($_POST['insertar_destino_coc'] && $_POST['insertar_destino_coc'] == 1)
{

	$insertSQL = sprintf("update cert_producto set destino=%s WHERE idcert_producto=%s",
 
            
			  GetSQLValueString($_POST['destino'], "text"),
             GetSQLValueString($_POST['idcert_producto'], "text"));

 $Result1 = mysql_query($insertSQL, $inforgan_pamfa) or die(mysql_error());
}


///////fin
////////////////////////inicio mexcalsup
if($_POST['insertar_mex'])
{
	
	$query_certificado= sprintf("select *from certificado where idinforme=%s ", GetSQLValueString($_POST["idinforme"], "int"),GetSQLValueString($_POST["idcertificado"], "int"));
$certificado = mysql_query($query_certificado, $inforgan_pamfa) or die(mysql_error());
$total_certificado = mysql_num_rows($certificado);

if($total_certificado<1)
{
	
  $insertSQL = sprintf("INSERT INTO certificado(idinforme,certificado_tipo3,fecha_inicial_mexcalsup,fecha_final_mexcalsup,fecha_impresion_mexcalsup,acreditacion_mexcalsup) VALUES (%s,%s, %s,  %s,%s,%s)",
  GetSQLValueString($_POST['idinforme'], "text"),
            
             GetSQLValueString(1, "text"),
			
			 GetSQLValueString($_POST['fecha_inicial'], "text"),
             GetSQLValueString($_POST['fecha_final'], "text"),
			 GetSQLValueString($_POST['fecha_impresion'], "text"),
			 GetSQLValueString($_POST['acreditacion'], "text"));
}
else{
	$insertSQL = sprintf("update certificado set fecha_inicial_mexcalsup=%s,fecha_final_mexcalsup=%s,fecha_impresion_mexcalsup=%s,acreditacion_mexcalsup=%s WHERE idinforme=%s ",
 
			 GetSQLValueString($_POST['fecha_inicial'], "text"),
             GetSQLValueString($_POST['fecha_final'], "text"),
			 GetSQLValueString($_POST['fecha_impresion'], "text"),
			 GetSQLValueString($_POST['acreditacion'], "text"),
			  GetSQLValueString($_POST['idinforme'], "text"));
}
 $Result1 = mysql_query($insertSQL, $inforgan_pamfa) or die(mysql_error());
}

if($_POST['eliminar']){
	
	$insertSQL = sprintf("delete from informe_hallazgos where idinforme_hallazgo=%s  ",
 GetSQLValueString($_POST['idinforme_hallazgo'], "text"));
  $Result1 = mysql_query($insertSQL, $inforgan_pamfa) or die(mysql_error());
}


///////fin