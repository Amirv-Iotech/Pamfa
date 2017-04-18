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

/////////////////inser seccion1

if ($_POST['seccion']==1) {
	
	$query_solicitud = sprintf("SELECT * FROM solicitud where idsolicitud=%s ",GetSQLValueString($_POST['idsolicitud'], "text"));
$solicitud  = mysql_query($query_solicitud , $inforgan_pamfa) or die(mysql_error());
$row_solicitud = mysql_fetch_assoc($solicitud );
$total_solicitud = mysql_num_rows($solicitud);


if($total_solicitud<1)
{

  $insertSQL = sprintf("INSERT INTO solicitud (fecha, persona, idoperador) VALUES (%s, %s,  %s)",
             GetSQLValueString($_POST['fecha'], "text"),
             GetSQLValueString($_POST['persona'], "text"),
						 GetSQLValueString($_POST['idoperador'], "text"));
}
else{
	$insertSQL = sprintf("update solicitud set fecha=%s, persona=%s, idoperador=%s WHERE idsolicitud=%s",
 GetSQLValueString($_POST['fecha'], "text"),
             GetSQLValueString($_POST['persona'], "text"),
						 GetSQLValueString($_POST['idoperador'], "text"),
						 
	GetSQLValueString($_POST['idsolicitud'], "int"));
}
  $Result1 = mysql_query($insertSQL, $inforgan_pamfa) or die(mysql_error());
}
///////fin

///eliminar prod
if (isset($_POST["eliminar_prod"])) {
  $deleteSQL = sprintf("DELETE FROM productos WHERE idproductos=%s",
             GetSQLValueString($_POST['idproductos'], "int"));
  $Result1 = mysql_query($deleteSQL, $sici) or die(mysql_error());
	
}


/////////////////inser seccion2

if ($_POST['seccion']==2) {
 $query_solicitud = sprintf("SELECT * FROM solicitud where idsolicitud=%s ",GetSQLValueString($_POST['idsolicitud'], "text"));
$solicitud  = mysql_query($query_solicitud , $inforgan_pamfa) or die(mysql_error());
$row_solicitud = mysql_fetch_assoc($solicitud );
$total_solicitud = mysql_num_rows($solicitud);


if($total_solicitud<1)
{

  $insertSQL = sprintf("INSERT INTO solicitud (ggn,gln,coc,mex_cal_sup,primus,senasica,responsable,personal) VALUES (%s, %s,  %s, %s, %s, %s, %s, %s)",
             GetSQLValueString($_POST['ggn'], "text"),
             GetSQLValueString($_POST['gln'], "text"),
			 GetSQLValueString($_POST['coc'], "text"),
             GetSQLValueString($_POST['mex_cal_sup'], "text"),
			 GetSQLValueString($_POST['primus'], "text"),
             GetSQLValueString($_POST['senasica'], "text"),
			 GetSQLValueString($_POST['nombre'], "text"),
			 GetSQLValueString($_POST['personal'], "text"));
						 
}
else{
	
	$insertSQL = sprintf("update solicitud set num_ggn=%s,num_gln=%s,num_coc=%s,num_mex_cal_sup=%s,num_primus=%s,num_senasica=%s,responsable=%s,personal=%s WHERE idsolicitud=%s",
 GetSQLValueString($_POST['num_ggn'], "text"),
             GetSQLValueString($_POST['num_gln'], "text"),
			 GetSQLValueString($_POST['num_coc'], "text"),
             GetSQLValueString($_POST['num_mex_cal_sup'], "text"),
			 GetSQLValueString($_POST['num_primus'], "text"),
             GetSQLValueString($_POST['num_senasica'], "text"),
	
	 GetSQLValueString($_POST['responsable'], "text"),
			 GetSQLValueString($_POST['personal'], "text"),
			 GetSQLValueString($_POST['idsolicitud'], "int"));
}

  $Result1 = mysql_query($insertSQL, $inforgan_pamfa) or die(mysql_error());

}
///////fin

if ($_POST['seccion']==3) {
 $query_cert = sprintf("SELECT * FROM cert_anterior where idsolicitud=%s ",GetSQLValueString($_POST['idsolicitud'], "text"));
$cert  = mysql_query($query_cert , $inforgan_pamfa) or die(mysql_error());
$row_cert= mysql_fetch_assoc($cert );
$total_cert = mysql_num_rows($cert);


if($total_cert<1)
{

  $insertSQL = sprintf("INSERT INTO cert_anterior (idsolicitud,organismo,fecha_inicio,fecha_fin) VALUES (%s, %s,  %s, %s)",
  GetSQLValueString($_POST['idsolicitud'], "text"),
             GetSQLValueString($_POST['organismo'], "text"),
			 
             GetSQLValueString($_POST['fecha_inicio'], "text"),
			 GetSQLValueString($_POST['fecha_fin'], "text"));
						 
}
else{
	
	$insertSQL = sprintf("update cert_anterior set organismo=%s,fecha_inicio=%s,fecha_fin=%s WHERE idsolicitud=%s and idcert_anterior=%s",
  GetSQLValueString($_POST['organismo'], "text"),
 
             GetSQLValueString($_POST['fecha_inicio'], "text"),
			 GetSQLValueString($_POST['fecha_fin'], "text"),
			 
			  GetSQLValueString($_POST['idsolicitud'], "int"),
			  GetSQLValueString($_POST['idcert_anterior'], "int"));
}

  $Result1 = mysql_query($insertSQL, $inforgan_pamfa) or die(mysql_error());

}
///////fin
if ($_POST['seccion']==5) {
 $query_solicitud = sprintf("SELECT * FROM solicitud_esquema where idsolicitud=%s ",GetSQLValueString($_POST['idsolicitud'], "text"));
$solicitud  = mysql_query($query_solicitud , $inforgan_pamfa) or die(mysql_error());
$row_solicitud = mysql_fetch_assoc($solicitud );
$total_solicitud = mysql_num_rows($solicitud);


if($total_solicitud<1)
{

  $insertSQL = sprintf("INSERT INTO solicitud_esquema(idsolicitud,esq_tipo1_op1,preg1_op2,preg2_op2,preg3_op2,preg1_tipo2,preg2_tipo2,esq_tipo2_op1,preg3_tipo2,preg4_tipo2,preg5_tipo2,preg6,preg7,preg8,preg9) VALUES (%s, %s,  %s, %s, %s, %s,%s, %s,  %s, %s, %s, %s,%s, %s,%s)",
             GetSQLValueString($_POST['idsolicitud'], "text"),
			 GetSQLValueString($_POST['esq_tipo1_op1'], "text"),
             GetSQLValueString($_POST['preg1_op2'], "text"),
			 GetSQLValueString($_POST['preg2_op2'], "text"),
             GetSQLValueString($_POST['preg3_op2'], "text"),
			 GetSQLValueString($_POST['preg1_tipo2'], "text"),
             GetSQLValueString($_POST['preg2_tipo2'], "text"),
			 
			 GetSQLValueString($_POST['esq_tipo2_op1'], "text"),
			 GetSQLValueString($_POST['preg3_tipo2'], "text"),
			 GetSQLValueString($_POST['preg4_tipo2'], "text"),
             GetSQLValueString($_POST['preg5_tipo2'], "text"),
			 GetSQLValueString($_POST['preg6'], "text"),
             GetSQLValueString($_POST['preg7'], "text"),
			 GetSQLValueString($_POST['preg8'], "text"),
             GetSQLValueString($_POST['preg9'], "text"));
						 
}
else{
	
	$insertSQL = sprintf("update solicitud_esquema set esq_tipo1_op1=%s,preg1_op2=%s,preg2_op2=%s,preg3_op2=%s,preg1_tipo2=%s,preg2_tipo2=%s,preg3_tipo2=%s,esq_tipo2_op1=%s,preg4_tipo2=%s,preg5_tipo2=%s,preg6=%s,preg7=%s,preg8=%s,preg9=%s WHERE idsolicitud=%s and idsolicitud_esquema=%s",
GetSQLValueString($_POST['esq_tipo1_op1'], "text"),
             GetSQLValueString($_POST['preg1_op2'], "text"),
			 GetSQLValueString($_POST['preg2_op2'], "text"),
             GetSQLValueString($_POST['preg3_op2'], "text"),
			 GetSQLValueString($_POST['preg1_tipo2'], "text"),
             GetSQLValueString($_POST['preg2_tipo2'], "text"),
			 
			 
			 GetSQLValueString($_POST['preg3_tipo2'], "text"),
			 GetSQLValueString($_POST['esq_tipo2_op1'], "text"),
			 GetSQLValueString($_POST['preg4_tipo2'], "text"),
			 
             GetSQLValueString($_POST['preg5_tipo2'], "text"),
			 GetSQLValueString($_POST['preg6'], "text"),
             GetSQLValueString($_POST['preg7'], "text"),
			 GetSQLValueString($_POST['preg8'], "text"),
             GetSQLValueString($_POST['preg9'], "text"),
			 GetSQLValueString($_POST['idsolicitud'], "int"),
			 GetSQLValueString($_POST['idsolicitud_esquema'], "int"));
}

  $Result1 = mysql_query($insertSQL, $inforgan_pamfa) or die(mysql_error());

}
///////fin

/////////////////inser seccion6

if ($_POST['seccion']==6) {
	
	$query_solicitud = sprintf("SELECT * FROM solicitud where idsolicitud=%s ",GetSQLValueString($_POST['idsolicitud'], "text"));
$solicitud  = mysql_query($query_solicitud , $inforgan_pamfa) or die(mysql_error());
$row_solicitud = mysql_fetch_assoc($solicitud );
$total_solicitud = mysql_num_rows($solicitud);


if($total_solicitud<1)
{

  $insertSQL = sprintf("INSERT INTO solicitud (idprimus) VALUES (%s)",
             GetSQLValueString($_POST['primus'], "text"));
}
else{
	$insertSQL = sprintf("update solicitud set idprimus=%s WHERE idsolicitud=%s",
 
             GetSQLValueString($_POST['primus'], "text"),
						
	
	GetSQLValueString($_POST['idsolicitud'], "int"));
}
  $Result1 = mysql_query($insertSQL, $inforgan_pamfa) or die(mysql_error());
}
///////fin
/////////////////inser seccion7

if ($_POST['seccion']==7) {
	
	$query_solicitud = sprintf("SELECT * FROM solicitud where idsolicitud=%s ",GetSQLValueString($_POST['idsolicitud'], "text"));
$solicitud  = mysql_query($query_solicitud , $inforgan_pamfa) or die(mysql_error());
$row_solicitud = mysql_fetch_assoc($solicitud );
$total_solicitud = mysql_num_rows($solicitud);


if($total_solicitud<1)
{

  $insertSQL = sprintf("INSERT INTO solicitud (idmex_alcance,idmex_pliego) VALUES (%s,%s)",
             GetSQLValueString($_POST['idmex_alcance'], "text"),
			  GetSQLValueString($_POST['idmex_pliego'], "text"));
}
else{
	$insertSQL = sprintf("update solicitud set idmex_alcance=%s,idmex_pliego=%s WHERE idsolicitud=%s",
 
             GetSQLValueString($_POST['idmex_alcance'], "text"),
			 GetSQLValueString($_POST['idmex_pliego'], "text"),
						
	
	GetSQLValueString($_POST['idsolicitud'], "int"));
}
  $Result1 = mysql_query($insertSQL, $inforgan_pamfa) or die(mysql_error());
}
///////fin
/////////////////inser seccion8

if ($_POST['seccion']==8) {
	
	$query_solicitud = sprintf("SELECT * FROM solicitud where idsolicitud=%s ",GetSQLValueString($_POST['idsolicitud'], "text"));
$solicitud  = mysql_query($query_solicitud , $inforgan_pamfa) or die(mysql_error());
$row_solicitud = mysql_fetch_assoc($solicitud );
$total_solicitud = mysql_num_rows($solicitud);


if($total_solicitud<1)
{

  $insertSQL = sprintf("INSERT INTO solicitud (idsrrc,srrc_preg1,srrc_preg2) VALUES (%s,%s,%s)",
             GetSQLValueString($_POST['idsrrc'], "text"),
			 GetSQLValueString($_POST['srrc_preg1'], "text"),
			 GetSQLValueString($_POST['srrc_preg2'], "text"));
}
else{
	$insertSQL = sprintf("update solicitud set idsrrc=%s,srrc_preg1=%s,srrc_preg2=%s WHERE idsolicitud=%s",
 
             GetSQLValueString($_POST['idsrrc'], "text"),
			 GetSQLValueString($_POST['srrc_preg1'], "text"),
			 GetSQLValueString($_POST['srrc_preg2'], "text"),
						
	
	GetSQLValueString($_POST['idsolicitud'], "int"));
}

  $Result1 = mysql_query($insertSQL, $inforgan_pamfa) or die(mysql_error());
}
///////fin

////seccion10

if ($_POST['seccion']==10) {
 $query_solicitud = sprintf("SELECT * FROM procesadora where idsolicitud=%s ",GetSQLValueString($_POST['idsolicitud'], "text"));
$solicitud  = mysql_query($query_solicitud , $inforgan_pamfa) or die(mysql_error());
$row_solicitud = mysql_fetch_assoc($solicitud );
$total_solicitud = mysql_num_rows($solicitud);


if($total_solicitud<1)
{

  $insertSQL = sprintf("INSERT INTO procesadora(empresa,rfc,direccion,direccion2,cp,tel,idsolicitud) VALUES (%s, %s,  %s, %s, %s, %s, %s)",
             GetSQLValueString($_POST['empresa'], "text"),
			 GetSQLValueString($_POST['rfc'], "text"),
             GetSQLValueString($_POST['direccion'], "text"),
			 GetSQLValueString($_POST['direccion2'], "text"),
             GetSQLValueString($_POST['cp'], "text"),
			 GetSQLValueString($_POST['tel'], "text"),
			 GetSQLValueString($_POST['idsolicitud'], "int"));
						 
}
else{
	
	$insertSQL = sprintf("update procesadora set empresa=%s,rfc=%s,direccion=%s,direccion2=%s,cp=%s,tel=%s WHERE idsolicitud=%s and idprocesadora=%s",
 GetSQLValueString($_POST['empresa'], "text"),
			 GetSQLValueString($_POST['rfc'], "text"),
             GetSQLValueString($_POST['direccion'], "text"),
			 GetSQLValueString($_POST['direccion2'], "text"),
             GetSQLValueString($_POST['cp'], "text"),
			 GetSQLValueString($_POST['tel'], "text"),
			 GetSQLValueString($_POST['idsolicitud'], "int"),
			 GetSQLValueString($_POST['idprocesadora'], "int"));
}

  $Result1 = mysql_query($insertSQL, $inforgan_pamfa) or die(mysql_error());

}
///////fin

/////////////////inser seccion11

if ($_POST['seccion']==11) {
	
	$query_solicitud = sprintf("SELECT * FROM solicitud where idsolicitud=%s ",GetSQLValueString($_POST['idsolicitud'], "text"));
$solicitud  = mysql_query($query_solicitud , $inforgan_pamfa) or die(mysql_error());
$row_solicitud = mysql_fetch_assoc($solicitud );
$total_solicitud = mysql_num_rows($solicitud);


if($total_solicitud<1)
{

  $insertSQL = sprintf("INSERT INTO solicitud (inf_comercializacion) VALUES (%s)",
             GetSQLValueString($_POST['inf_comercializacion'], "text"));
}
else{
	$insertSQL = sprintf("update solicitud set inf_comercializacion=%s WHERE idsolicitud=%s",
 
             GetSQLValueString($_POST['inf_comercializacion'], "text"),
									
	
	GetSQLValueString($_POST['idsolicitud'], "int"));
}

  $Result1 = mysql_query($insertSQL, $inforgan_pamfa) or die(mysql_error());
}
///////fin

if ($_POST['seccion']==12) {
	
	$query_solicitud = sprintf("SELECT * FROM solicitud where idsolicitud=%s ",GetSQLValueString($_POST['idsolicitud'], "text"));
$solicitud  = mysql_query($query_solicitud , $inforgan_pamfa) or die(mysql_error());
$row_solicitud = mysql_fetch_assoc($solicitud );
$total_solicitud = mysql_num_rows($solicitud);


if($total_solicitud<1)
{

  $insertSQL = sprintf("INSERT INTO solicitud (idioma_aud,idioma_inf) VALUES (%s,%s)",
             GetSQLValueString($_POST['idioma_aud'], "text"),
			  GetSQLValueString($_POST['idioma_inf'], "text"));
}
else{
	$insertSQL = sprintf("update solicitud set idioma_aud=%s,idioma_inf=%s WHERE idsolicitud=%s",
 
             GetSQLValueString($_POST['idioma_aud'], "text"),
			  GetSQLValueString($_POST['idioma_inf'], "text"),
									
	
	GetSQLValueString($_POST['idsolicitud'], "int")); 
	
}

  $Result1 = mysql_query($insertSQL, $inforgan_pamfa) or die(mysql_error());
}
///////fin
if ($_POST['seccion']==13) {
	
	$query_solicitud = sprintf("SELECT * FROM solicitud where idsolicitud=%s ",GetSQLValueString($_POST['idsolicitud'], "text"));
$solicitud  = mysql_query($query_solicitud , $inforgan_pamfa) or die(mysql_error());
$row_solicitud = mysql_fetch_assoc($solicitud );
$total_solicitud = mysql_num_rows($solicitud);


if($total_solicitud<1)
{

  $insertSQL = sprintf("INSERT INTO solicitud (respuesta4,respuesta5,terminada) VALUES (%s,%s,%s)",
             GetSQLValueString($_POST['respuesta4'], "text"),
			  GetSQLValueString($_POST['respuesta5'], "text"),
			  GetSQLValueString($_POST['terminada'], "text"));
}
else{
	$insertSQL = sprintf("update solicitud set respuesta4=%s,respuesta5=%s,terminada=%s WHERE idsolicitud=%s",
 
            GetSQLValueString($_POST['respuesta4'], "text"),
			  GetSQLValueString($_POST['respuesta5'], "text"),
			  GetSQLValueString($_POST['terminada'], "text"),
									
	
	GetSQLValueString($_POST['idsolicitud'], "int")); 
	
}

  $Result1 = mysql_query($insertSQL, $inforgan_pamfa) or die(mysql_error());
}
///////fin
if ($_POST['seccion']==9) {
 
if($_POST['insertar'])
{

  $insertSQL = sprintf("INSERT INTO cultivos(producto,num_productores,num_fincas,ubicacion_unidad,coordenadas,periodo_cosecha,superficie,libre_cubierto,cosecha_recoleccion,empaque,num_trabajadores,idsolicitud) VALUES (%s,%s, %s,  %s, %s, %s, %s, %s, %s,%s, %s,  %s)",
             GetSQLValueString($_POST['producto'], "text"),
             GetSQLValueString($_POST['num_productores'], "text"),
			 GetSQLValueString($_POST['num_fincas'], "text"),
             GetSQLValueString($_POST['ubicacion_unidad'], "text"),
			 GetSQLValueString($_POST['coordenadas'], "text"),
             GetSQLValueString($_POST['periodo_cosecha'], "text"),
			 GetSQLValueString($_POST['superficie'], "text"),
			 GetSQLValueString($_POST['libre_cubierto'], "text"),
			 GetSQLValueString($_POST['cosecha_recoleccion'], "text"),
             GetSQLValueString($_POST['empaque'], "text"),
			 GetSQLValueString($_POST['num_trabajadores'], "text"),
             GetSQLValueString($_POST['idsolicitud'], "text"));
						 
}
else if($_POST['eliminar']){
	
	$insertSQL = sprintf("delete from cultivos where idcultivos=%s and idsolicitud=%s ",
 GetSQLValueString($_POST['idcultivos'], "text"),
            
			 GetSQLValueString($_POST['idsolicitud'], "int"));
}

  $Result1 = mysql_query($insertSQL, $inforgan_pamfa) or die(mysql_error());

}
///////fin