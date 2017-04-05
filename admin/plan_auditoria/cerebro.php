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


/////////////////inser seccion1

if ($_POST['seccion']==2) {
 

  	
	$insertSQL = sprintf("update plan_auditoria set procesadora=%s,productos=%s,fecha_emision=%s,fecha_auditoria=%s WHERE idsolicitud=%s",
 GetSQLValueString($_POST['procesadora'], "text"),
             GetSQLValueString($_POST['productos'], "text"),
			 GetSQLValueString($_POST['fecha_emision'], "text"),
             GetSQLValueString($_POST['fecha_auditoria'], "text"),
			 GetSQLValueString($_POST['idsolicitud'], "int"));

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
 

  	
	$insertSQL = sprintf("update plan_auditoria set rancho_invernadero=%s,superficie=%s,num_pgfs=%s,num_pamfa=%s,producto_proce=%s,manip=%s,num_globalgg=%s,num_coc=%s,otro=%s,objetivo=%s,criterio=%s WHERE idsolicitud=%s",
 GetSQLValueString($_POST['rancho_invernadero'], "text"),
             GetSQLValueString($_POST['superficie'], "text"),
			 GetSQLValueString($_POST['num_pgfs'], "text"),
             GetSQLValueString($_POST['num_pamfa'], "text"),
			 GetSQLValueString($_POST['producto_proce'], "text"),
			 GetSQLValueString($_POST['manip'], "text"),
             GetSQLValueString($_POST['num_globalgg'], "text"),
			 GetSQLValueString($_POST['num_coc'], "text"),
			 GetSQLValueString($_POST['otro'], "text"),
             GetSQLValueString($_POST['objetivo'], "text"),
			 GetSQLValueString($_POST['criterio'], "text"),
			 GetSQLValueString($_POST['idsolicitud'], "int"));

  $Result1 = mysql_query($insertSQL, $inforgan_pamfa) or die(mysql_error());

}

///////fin

/////////////////inser seccion6

if ($_POST['seccion']==6) {
	
	

if($_POST['auditor'])
{
	$cad=$_POST['auditor'];
	$p=2;
}
if($_POST['inspector'])
{
	$cad=$_POST['inspector'];
	$p=3;
}
$query_user = sprintf("SELECT * FROM usuario where idusuario=%s ",GetSQLValueString($cad, "text"));
$user  = mysql_query($query_user , $inforgan_pamfa) or die(mysql_error());
$row_user= mysql_fetch_assoc($user );




  $insertSQL = sprintf("INSERT INTO plan_auditoria_equipo (nombre,puesto,email,tel,idplan_auditoria) VALUES (%s,%s,%s,%s,%s)",
             GetSQLValueString($row_user['nombre']." ".$row_user['apellidos'], "text"),
			 GetSQLValueString($p, "text"),
			 GetSQLValueString($row_user['email'], "text"),
			 GetSQLValueString($row_user['tel'], "text"),
			 GetSQLValueString($_POST['idplan_auditoria'], "text"));


  $Result1 = mysql_query($insertSQL, $inforgan_pamfa) or die(mysql_error());
}
///////fin
/////////////////inser seccion7


if ($_POST['seccion']==7) {
 
if($_POST['insertar'])
{

  $insertSQL = sprintf("INSERT INTO agenda(fecha,horario,actividad,responsable,auditor,idplan_auditoria) VALUES (%s,%s, %s,  %s, %s,%s)",
             GetSQLValueString($_POST['fecha'], "text"),
             GetSQLValueString($_POST['horario'], "text"),
			 GetSQLValueString($_POST['actividad'], "text"),
             GetSQLValueString($_POST['responsable'], "text"),
			 GetSQLValueString($_POST['auditor'], "text"),
			 GetSQLValueString($_POST['idplan_auditoria'], "text"));
						 
}
else if($_POST['eliminar']){
	
	$insertSQL = sprintf("delete from agenda where idagenda=%s and idplan_auditoria=%s ",
 GetSQLValueString($_POST['idagenda'], "text"),
            
			 GetSQLValueString($_POST['idplan_auditoria'], "int"));
}
echo $insertSQL;
  $Result1 = mysql_query($insertSQL, $inforgan_pamfa) or die(mysql_error());

}
///////fin



///////fin
