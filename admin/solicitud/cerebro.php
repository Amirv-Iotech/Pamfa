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
if ($_POST['persona']!=NULL) {
	

	
if ($_POST['seccion']==1) {
	

 $query_solicitud = sprintf("SELECT * FROM solicitud where idsolicitud=%s ",GetSQLValueString($_POST['idsolicitud'], "text"));
$solicitud  = mysql_query($query_solicitud , $inforgan_pamfa) or die(mysql_error());
$row_solicitud = mysql_fetch_assoc($solicitud );
$total_solicitud = mysql_num_rows($solicitud);


if($total_solicitud<1)
{
	$f=time();
  $insertSQL = sprintf("INSERT INTO solicitud (fecha, persona, idoperador,num_ggn,num_gln,num_coc,num_mex_cal_sup,num_primus,num_senasica,responsable,personal,idprimus,idmex_alcance,idmex_pliego,idsrrc,srrc_preg1,srrc_preg2,inf_comercializacion,idioma_aud,idioma_inf,respuesta4,respuesta5,terminada) VALUES (%s, %s,  %s,%s, %s,  %s,%s, %s,%s,%s, %s,%s,%s, %s,%s,%s,%s,%s,%s,%s,%s,%s,%s)",
             GetSQLValueString($f, "text"),
             GetSQLValueString($_POST['persona'], "text"),
			GetSQLValueString($_POST['idoperador'], "text"),
			 GetSQLValueString($_POST['num_ggn'], "text"),
             GetSQLValueString($_POST['num_gln'], "text"),
			 GetSQLValueString($_POST['num_coc'], "text"),
             GetSQLValueString($_POST['num_mex_cal_sup'], "text"),
			 GetSQLValueString($_POST['num_primus'], "text"),
             GetSQLValueString($_POST['num_senasica'], "text"),	
	 GetSQLValueString($_POST['responsable'], "text"),
			 GetSQLValueString($_POST['personal'], "text"),
			 GetSQLValueString($_POST['primus'], "text"),
			  GetSQLValueString($_POST['idmex_alcance'], "text"),
			 GetSQLValueString($_POST['idmex_pliego'], "text"),
			  GetSQLValueString($_POST['idsrrc'], "text"),
			 GetSQLValueString($_POST['srrc_preg1'], "text"),
			 GetSQLValueString($_POST['srrc_preg2'], "text"),
			  GetSQLValueString($_POST['inf_comercializacion'], "text"),
			   GetSQLValueString($_POST['idioma_aud'], "text"),
			  GetSQLValueString($_POST['idioma_inf'], "text"),
			    GetSQLValueString($_POST['respuesta4'], "text"),
			  GetSQLValueString($_POST['respuesta5'], "text"),
			  GetSQLValueString($_POST['terminada'], "text"));
			
	 $Result1 = mysql_query($insertSQL, $inforgan_pamfa) or die(mysql_error()); 
 
}
else{
	$insertSQL = sprintf("update solicitud set fecha=%s, persona=%s, idoperador=%s WHERE idsolicitud=%s",
 GetSQLValueString($_POST['fecha'], "text"),
             GetSQLValueString($_POST['persona'], "text"),
						 GetSQLValueString($_POST['idoperador'], "text"),
	GetSQLValueString($_POST['idsolicitud'], "int"));
	
	 $Result1 = mysql_query($insertSQL, $inforgan_pamfa) or die(mysql_error());

//seccion2
	$insertSQL2 = sprintf("update solicitud set num_ggn=%s,num_gln=%s,num_coc=%s,num_mex_cal_sup=%s,num_primus=%s,num_senasica=%s,responsable=%s,personal=%s WHERE idsolicitud=%s",
 GetSQLValueString($_POST['num_ggn'], "text"),
             GetSQLValueString($_POST['num_gln'], "text"),
			 GetSQLValueString($_POST['num_coc'], "text"),
             GetSQLValueString($_POST['num_mex_cal_sup'], "text"),
			 GetSQLValueString($_POST['num_primus'], "text"),
             GetSQLValueString($_POST['num_senasica'], "text"),
	
	 GetSQLValueString($_POST['responsable'], "text"),
			 GetSQLValueString($_POST['personal'], "text"),
			 GetSQLValueString($_POST['idsolicitud'], "int"));

 $Result2 = mysql_query($insertSQL2, $inforgan_pamfa) or die(mysql_error());
 

	//SECCION 6
	$insertSQL6 = sprintf("update solicitud set idprimus=%s WHERE idsolicitud=%s",
             GetSQLValueString($_POST['primus'], "text"),				
	GetSQLValueString($_POST['idsolicitud'], "int"));
	 $Result6 = mysql_query($insertSQL6, $inforgan_pamfa) or die(mysql_error());
  
	//SECCION 7
	$insertSQL7 = sprintf("update solicitud set idmex_alcance=%s,idmex_pliego=%s WHERE idsolicitud=%s",
             GetSQLValueString($_POST['idmex_alcance'], "text"),
			 GetSQLValueString($_POST['idmex_pliego'], "text"),						
	GetSQLValueString($_POST['idsolicitud'], "int"));
	$Result7 = mysql_query($insertSQL7, $inforgan_pamfa) or die(mysql_error());
 
	//SECCION 8
	$insertSQL8 = sprintf("update solicitud set idsrrc=%s,srrc_preg1=%s,srrc_preg2=%s WHERE idsolicitud=%s",
             GetSQLValueString($_POST['idsrrc'], "text"),
			 GetSQLValueString($_POST['srrc_preg1'], "text"),
			 GetSQLValueString($_POST['srrc_preg2'], "text"),
	GetSQLValueString($_POST['idsolicitud'], "int"));
	 $Result8 = mysql_query($insertSQL8, $inforgan_pamfa) or die(mysql_error());
  
 

	//SECCION 11
	$insertSQL11 = sprintf("update solicitud set inf_comercializacion=%s WHERE idsolicitud=%s",
             GetSQLValueString($_POST['inf_comercializacion'], "text"),								
	GetSQLValueString($_POST['idsolicitud'], "int"));
	 $Result11 = mysql_query($insertSQL11, $inforgan_pamfa) or die(mysql_error());
 
		//SECCION 12
	$insertSQL12 = sprintf("update solicitud set idioma_aud=%s,idioma_inf=%s WHERE idsolicitud=%s",
             GetSQLValueString($_POST['idioma_aud'], "text"),
			  GetSQLValueString($_POST['idioma_inf'], "text"),								
	GetSQLValueString($_POST['idsolicitud'], "int")); 
	 $Result12 = mysql_query($insertSQL12, $inforgan_pamfa) or die(mysql_error());
 
	//SECCION 13
	$insertSQL13 = sprintf("update solicitud set respuesta4=%s,respuesta5=%s,terminada=%s WHERE idsolicitud=%s",
            GetSQLValueString($_POST['respuesta4'], "text"),
			  GetSQLValueString($_POST['respuesta5'], "text"),
			  GetSQLValueString($_POST['terminada'], "text"),									
	GetSQLValueString($_POST['idsolicitud'], "int")); 
	   $Result13 = mysql_query($insertSQL13, $inforgan_pamfa) or die(mysql_error());

	
}
//SECCION3
$query_cert = sprintf("SELECT * FROM cert_anterior where idsolicitud=%s ",GetSQLValueString($_POST['idsolicitud'], "text"));
$cert  = mysql_query($query_cert , $inforgan_pamfa) or die(mysql_error());
$row_cert= mysql_fetch_assoc($cert );
$total_cert = mysql_num_rows($cert);


if($total_cert<1)
{
  $insertSQL3 = sprintf("INSERT INTO cert_anterior (idsolicitud,organismo,fecha_inicio,fecha_fin) VALUES (%s, %s,  %s, %s)",
  GetSQLValueString($_POST['idsolicitud'], "text"),
             GetSQLValueString($_POST['organismo'], "text"),
			 
             GetSQLValueString($_POST['fecha_inicio'], "text"),
			 GetSQLValueString($_POST['fecha_fin'], "text"));
						 
}
else{
	$insertSQL3 = sprintf("update cert_anterior set organismo=%s,fecha_inicio=%s,fecha_fin=%s WHERE idsolicitud=%s and idcert_anterior=%s",
  GetSQLValueString($_POST['organismo'], "text"),
 
             GetSQLValueString($_POST['fecha_inicio'], "text"),
			 GetSQLValueString($_POST['fecha_fin'], "text"),
			 
			  GetSQLValueString($_POST['idsolicitud'], "int"),
			  GetSQLValueString($_POST['idcert_anterior'], "int"));
}

//SECCION 5
$query_solicitud_e = sprintf("SELECT * FROM solicitud_esquema where idsolicitud=%s ",GetSQLValueString($_POST['idsolicitud'], "text"));
$solicitud  = mysql_query($query_solicitud_e , $inforgan_pamfa) or die(mysql_error());
$row_solicitud = mysql_fetch_assoc($solicitud );
$total_solicitud = mysql_num_rows($solicitud);


if($total_solicitud<1)
{

  $insertSQL5 = sprintf("INSERT INTO solicitud_esquema(idsolicitud,esq_tipo1_op1,preg1_op2,preg2_op2,preg3_op2,preg1_tipo2,preg2_tipo2,esq_tipo2_op1,preg3_tipo2,preg4_tipo2,preg5_tipo2,preg6,preg7,preg8,preg9) VALUES (%s, %s,  %s, %s, %s, %s,%s, %s,  %s, %s, %s, %s,%s, %s,%s)",
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
	
	$insertSQL5 = sprintf("update solicitud_esquema set esq_tipo1_op1=%s,preg1_op2=%s,preg2_op2=%s,preg3_op2=%s,preg1_tipo2=%s,preg2_tipo2=%s,preg3_tipo2=%s,esq_tipo2_op1=%s,preg4_tipo2=%s,preg5_tipo2=%s,preg6=%s,preg7=%s,preg8=%s,preg9=%s WHERE idsolicitud=%s and idsolicitud_esquema=%s",
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
//SECCION 10

$query_solicitud10 = sprintf("SELECT * FROM procesadora where idsolicitud=%s ",GetSQLValueString($_POST['idsolicitud'], "text"));
$solicitud10  = mysql_query($query_solicitud10 , $inforgan_pamfa) or die(mysql_error());
$row_solicitud10 = mysql_fetch_assoc($solicitud10 );
$total_solicitud10 = mysql_num_rows($solicitud10);


if($total_solicitud10<1)
{

  $insertSQL10 = sprintf("INSERT INTO procesadora(empresa,rfc,direccion,direccion2,cp,tel,idsolicitud) VALUES (%s, %s,  %s, %s, %s, %s, %s)",
             GetSQLValueString($_POST['empresa'], "text"),
			 GetSQLValueString($_POST['rfc'], "text"),
             GetSQLValueString($_POST['direccion'], "text"),
			 GetSQLValueString($_POST['direccion2'], "text"),
             GetSQLValueString($_POST['cp'], "text"),
			 GetSQLValueString($_POST['tel'], "text"),
			 GetSQLValueString($_POST['idsolicitud'], "int"));
						 
}
else{
	
	$insertSQL10 = sprintf("UPDATE procesadora SET empresa=%s,rfc=%s,direccion=%s,direccion2=%s,cp=%s,tel=%s WHERE idsolicitud=%s AND idprocesadora=%s",
 GetSQLValueString($_POST['empresa'], "text"),
			 GetSQLValueString($_POST['rfc'], "text"),
             GetSQLValueString($_POST['direccion'], "text"),
			 GetSQLValueString($_POST['direccion2'], "text"),
             GetSQLValueString($_POST['cp'], "text"),
			 GetSQLValueString($_POST['tel'], "text"),
			 GetSQLValueString($_POST['idsolicitud'], "int"),
			 GetSQLValueString($_POST['idprocesadora'], "int"));
}


//
 

 $Result3 = mysql_query($insertSQL3, $inforgan_pamfa) or die(mysql_error());
  $Result5 = mysql_query($insertSQL5, $inforgan_pamfa) or die(mysql_error());
  $Result10 = mysql_query($insertSQL10, $inforgan_pamfa) or die(mysql_error());
}

}

 
if($_POST['insertar_prod'])
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
			 echo $insertSQL;
  $Result1 = mysql_query($insertSQL, $inforgan_pamfa) or die(mysql_error());
						 
}


 if($_POST['eliminar']){
	
	$insertSQL = sprintf("delete from cultivos where idcultivos=%s and idsolicitud=%s ",
 GetSQLValueString($_POST['idcultivos'], "text"),
            
			 GetSQLValueString($_POST['idsolicitud'], "int"));


  $Result1 = mysql_query($insertSQL, $inforgan_pamfa) or die(mysql_error());

}

///////fin