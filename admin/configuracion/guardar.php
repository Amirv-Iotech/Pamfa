<? 
if(!empty($_POST['guardar1'])){
	$insertSQL = sprintf("INSERT INTO operador (nombre_legal,nombre_representante,direccion,colonia,estado,pais,coordenadas,email,telefono,fax,rfc,dir_rfc,nombre_factura,email_factura,tel_factura,forma_pago,banco,digitos_tarjeta) VALUES ( %s, %s, %s, %s,%s, %s, %s, %s,%s, %s, %s, %s,%s, %s, %s, %s,%s,%s)",
 GetSQLValueString($_POST['nombre_legal'], "text"),
 GetSQLValueString($_POST['nombre_representante'], "text"),
 GetSQLValueString($_POST['direccion'], "text"),
 GetSQLValueString($_POST['colonia'], "text"),
  GetSQLValueString($_POST['estado'], "text"),
 GetSQLValueString($_POST['pais'], "text"),
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
if(!empty($_POST['update1'])){
		$insertSQL = sprintf("Update operador SET nombre_legal=%s,nombre_representante=%s,direccion=%s,colonia=%s,estado=%s,pais=%s,coordenadas=%s,email=%s,telefono=%s,fax=%s,rfc=%s,dir_rfc=%s,nombre_factura=%s,email_factura=%s,tel_factura=%s,forma_pago=%s,banco=%s,digitos_tarjeta=%s WHERE idoperador=%s",
 GetSQLValueString($_POST['nombre_legal'], "text"),
 GetSQLValueString($_POST['nombre_representante'], "text"),
 GetSQLValueString($_POST['direccion'], "text"),
 GetSQLValueString($_POST['colonia'], "text"),
  GetSQLValueString($_POST['estado'], "text"),
 GetSQLValueString($_POST['pais'], "text"),
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
 GetSQLValueString($_POST['digitos_tarjeta'], "text"),
  GetSQLValueString($_POST['idoperador'], "text"));




  $Result1= mysql_query($insertSQL ,$inforgan_pamfa) or die(mysql_error());
}
if(!empty($_POST['eliminar1'])){
	
$insertSQL = "DELETE FROM operador WHERE idoperador=".$_POST['idoperador']."";
  $Result1 = mysql_query($insertSQL, $inforgan_pamfa) or die(mysql_error());
	
}

if(!empty($_POST['guardar2'])){
	$t_aux="";
	if($_POST['tipo']==1){$t_aux="alcance";}
	if($_POST['tipo']==2){$t_aux="pliego";}
	

$insertSQL = sprintf("INSERT INTO mex_cal_sup (descripcion, ".$t_aux.") VALUES ( %s, %s)",
 GetSQLValueString($_POST['descripcion'], "text"),

 
 
 GetSQLValueString(1, "text"));

  $Result1 = mysql_query($insertSQL,$inforgan_pamfa) or die(mysql_error());
	
}
if(!empty($_POST['update2'])){
	
	$insertSQL = "DELETE FROM mex_cal_sup WHERE idmex_cal_sup='".$_POST['idmex']."'";
  $Result1 = mysql_query($insertSQL, $inforgan_pamfa) or die(mysql_error());
  
 if($_POST['tipo']==1){$t_aux="alcance";}
	if($_POST['tipo']==2){$t_aux="pliego";}
	

$insertSQL = sprintf("INSERT INTO mex_cal_sup (descripcion, ".$t_aux.") VALUES ( %s, %s)",
 GetSQLValueString($_POST['descripcion'], "text"),

 
 
 GetSQLValueString(1, "text"));

  $Result1 = mysql_query($insertSQL,$inforgan_pamfa) or die(mysql_error());
}
if(!empty($_POST['eliminar2'])){
	
$insertSQL = "DELETE FROM mex_cal_sup WHERE idmex_cal_sup=".$_POST['idmex']."";
  $Result1 = mysql_query($insertSQL, $inforgan_pamfa) or die(mysql_error());
	
}




if(!empty($_POST['guardar3'])){

$insertSQL = sprintf("INSERT INTO esquemas (esquema,tipo,opcion) VALUES ( %s,%s,%s)",
 
 GetSQLValueString($_POST['esquema'], "text"),
 GetSQLValueString($_POST['tipo'], "text"),
 GetSQLValueString($_POST['opcion'], "text"));

  $Result1 = mysql_query($insertSQL, $inforgan_pamfa) or die(mysql_error());
	
}

if(!empty($_POST['update3'])){
	
	

$insertSQL = sprintf("UPDATE  esquemas SET esquema=%s,tipo=%s,opcion=%s where idesquema=%s",

 
 GetSQLValueString($_POST['esquema'], "text"),
 GetSQLValueString($_POST['tipo'], "text"),
  GetSQLValueString($_POST['opcion'], "text"),
 GetSQLValueString($_POST['idesquema'], "text"));

  $Result1 = mysql_query($insertSQL,$inforgan_pamfa) or die(mysql_error());
}
if(!empty($_POST['eliminar3'])){
	
$insertSQL = "DELETE FROM esquemas WHERE idesquema=".$_POST['idesquema']."";
  $Result1 = mysql_query($insertSQL, $inforgan_pamfa) or die(mysql_error());
	
}



if(!empty($_POST['guardar4'])){

$insertSQL = sprintf("INSERT INTO primusgfs(primus) VALUES ( %s)",
 
 
 GetSQLValueString($_POST['primus'], "text"));

  $Result1 = mysql_query($insertSQL, $inforgan_pamfa) or die(mysql_error());
	
}


if(!empty($_POST['update4'])){	

$insertSQL = sprintf("UPDATE  primusgfs SET primus=%s where idprimus=%s",

 
GetSQLValueString($_POST['primus'], "text"),
 GetSQLValueString($_POST['idprimus'], "text"));

  $Result1 = mysql_query($insertSQL, $inforgan_pamfa) or die(mysql_error());
}
if(!empty($_POST['eliminar4'])){
	
$insertSQL = "DELETE FROM primusgfs WHERE idprimus=".$_POST['idprimus']."";
  $Result1 = mysql_query($insertSQL,$inforgan_pamfa) or die(mysql_error());
	
}


if(!empty($_POST['guardar5'])){

$insertSQL = sprintf("INSERT INTO srrc(seccion) VALUES ( %s)",
 
 
 GetSQLValueString($_POST['seccion'], "text"));

  $Result1 = mysql_query($insertSQL, $inforgan_pamfa) or die(mysql_error());
	
}


if(!empty($_POST['update5'])){	

$insertSQL = sprintf("UPDATE  srrc SET seccion=%s where idsrrc=%s",

 
GetSQLValueString($_POST['seccion'], "text"),
 GetSQLValueString($_POST['idsrrc'], "text"));

  $Result1 = mysql_query($insertSQL, $inforgan_pamfa) or die(mysql_error());
}
if(!empty($_POST['eliminar5'])){
	
$insertSQL = "DELETE FROM srrc WHERE idsrrc=".$_POST['idsrrc']."";
  $Result1 = mysql_query($insertSQL,$inforgan_pamfa) or die(mysql_error());
	
}




/*
if(!empty($_POST['guardar2'])){


$insertSQL = sprintf("INSERT INTO producto (idgrupo_empresas_certificadoras,idclave_grupo,folio,producto_empresas_certificadoras,variedad_empresas_certificadoras,nombre_producto_siap,clave_producto,nombre_variedad_siap,clave_variedad,nombre_clave_subsistema,clave_subsistema) VALUES ( %s, %s, %s, %s,%s, %s, %s, %s,%s, %s, %s)",
 GetSQLValueString($_POST['idgrupo_empresas_certificadoras'], "text"),
 GetSQLValueString($_POST['idclave_grupo'], "text"),
 GetSQLValueString($_POST['folio'], "text"),
  GetSQLValueString($_POST['producto_empresas_certificadoras'], "text"),
 GetSQLValueString($_POST['variedad_empresas_certificadoras'], "text"),
 GetSQLValueString($_POST['nombre_producto_siap'], "text"),
  GetSQLValueString($_POST['clave_producto'], "text"),
 GetSQLValueString($_POST['nombre_variedad_siap'], "text"),
 GetSQLValueString($_POST['clave_variedad'], "text"), GetSQLValueString($_POST['nombre_clave_subsistema'], "text"),
 GetSQLValueString($_POST['clave_subsistema'], "text"));

  $Result1 = mysql_query($insertSQL, $con_1) or die(mysql_error());
	
}
if(!empty($_POST['update2'])){	

$insertSQL = sprintf("UPDATE  producto SET idgrupo_empresas_certificadoras=%s,idclave_grupo=%s,folio=%s,producto_empresas_certificadoras=%s,variedad_empresas_certificadoras=%s,nombre_producto_siap=%s,clave_producto=%s,nombre_variedad_siap=%s,clave_variedad=%s,nombre_clave_subsistema=%s,clave_subsistema=%s where idproducto=%s",

 
 GetSQLValueString($_POST['idgrupo_empresas_certificadoras'], "text"),
 GetSQLValueString($_POST['idclave_grupo'], "text"),
 GetSQLValueString($_POST['folio'], "text"),
  GetSQLValueString($_POST['producto_empresas_certificadoras'], "text"),
 GetSQLValueString($_POST['variedad_empresas_certificadoras'], "text"),
 GetSQLValueString($_POST['nombre_producto_siap'], "text"),
  GetSQLValueString($_POST['clave_producto'], "text"),
 GetSQLValueString($_POST['nombre_variedad_siap'], "text"),
 GetSQLValueString($_POST['clave_variedad'], "text"), GetSQLValueString($_POST['nombre_clave_subsistema'], "text"),
 GetSQLValueString($_POST['clave_subsistema'], "text"),
 GetSQLValueString($_POST['idprod'], "text"));

  $Result1 = mysql_query($insertSQL, $con_1) or die(mysql_error());
}
if(!empty($_POST['eliminar2'])){
	
$insertSQL = "DELETE FROM producto WHERE idproducto=".$_POST['idprod']."";
  $Result1 = mysql_query($insertSQL, $con_1) or die(mysql_error());
	
}


if(!empty($_POST['guardar5'])){

$insertSQL = sprintf("INSERT INTO alcance (alcance,descripcion) VALUES ( %s,%s)",
 
 GetSQLValueString($_POST['alcance'], "text"),
 GetSQLValueString($_POST['descripcion'], "text"));

  $Result1 = mysql_query($insertSQL, $con_1) or die(mysql_error());
	
}

if(!empty($_POST['update5'])){
	
	

$insertSQL = sprintf("UPDATE  alcance SET alcance=%s,descripcion=%s where idalcance=%s",

 
GetSQLValueString($_POST['alcance'], "text"),
 GetSQLValueString($_POST['descripcion'], "text"),
  GetSQLValueString($_POST['idalcance'], "text"));

  $Result1 = mysql_query($insertSQL, $con_1) or die(mysql_error());
}
if(!empty($_POST['eliminar5'])){
	
$insertSQL = "DELETE FROM alcance WHERE idalcance=".$_POST['idalcance']."";
  $Result1 = mysql_query($insertSQL, $con_1) or die(mysql_error());
	
}

if(!empty($_POST['guardar6'])){

$insertSQL = sprintf("INSERT INTO arancel (arancel,descripcion1,descripcion2) VALUES ( %s,%s,%s)",
 
 GetSQLValueString($_POST['arancel'], "text"),
 GetSQLValueString($_POST['descripcion1'], "text"),
 GetSQLValueString($_POST['descripcion2'], "text"));

  $Result1 = mysql_query($insertSQL, $con_1) or die(mysql_error());
	
}

if(!empty($_POST['update6'])){
	
$insertSQL = sprintf("UPDATE  arancel SET arancel=%s,descripcion1=%s,descripcion2=%s where idarancel=%s",

GetSQLValueString($_POST['arancel'], "text"),
 GetSQLValueString($_POST['descripcion1'], "text"), 
 GetSQLValueString($_POST['descripcion2'], "text"),
  GetSQLValueString($_POST['idarancel'], "text"));

  $Result1 = mysql_query($insertSQL, $con_1) or die(mysql_error());
}
if(!empty($_POST['eliminar6'])){
	
$insertSQL = "DELETE FROM arancel WHERE idarancel=".$_POST['idarancel']."";
  $Result1 = mysql_query($insertSQL, $con_1) or die(mysql_error());
	
}

if(!empty($_POST['guardar7'])){

$insertSQL = sprintf("INSERT INTO tipo_ciclo (tipo_ciclo) VALUES ( %s)",
 
 GetSQLValueString($_POST['tipo_ciclo'], "text"));

  $Result1 = mysql_query($insertSQL, $con_1) or die(mysql_error());
	
}

if(!empty($_POST['update7'])){
	
$insertSQL = sprintf("UPDATE tipo_ciclo SET tipo_ciclo=%s where idtipo_ciclo=%s",

GetSQLValueString($_POST['tipo_ciclo'], "text"),
GetSQLValueString($_POST['idtipo_ciclo'], "text"));

  $Result1 = mysql_query($insertSQL, $con_1) or die(mysql_error());
}
if(!empty($_POST['eliminar7'])){
	
$insertSQL = "DELETE FROM tipo_ciclo WHERE idtipo_ciclo=".$_POST['idtipo_ciclo']."";
  $Result1 = mysql_query($insertSQL, $con_1) or die(mysql_error());
	
}

if(!empty($_POST['guardar8'])){


$insertSQL = sprintf("INSERT INTO subproducto (idproducto,idalcance,idtipo_ciclo,idunidad_medida,idarancel,nombre,nombre_ingles,nombre_aleman) VALUES ( %s, %s, %s, %s,%s, %s, %s, %s)",

GetSQLValueString($_POST['idproducto'], "int"),
 GetSQLValueString($_POST['idalcance'], "int"),
 GetSQLValueString($_POST['idtipo_ciclo'], "int"),
  GetSQLValueString($_POST['idunidad_medida'], "int"),
 GetSQLValueString($_POST['idarancel'], "int"),
 GetSQLValueString($_POST['nombre'], "text"),
 GetSQLValueString($_POST['nombre_ingles'], "text"),
  GetSQLValueString($_POST['nombre_aleman'], "text"));

  $Result1 = mysql_query($insertSQL, $con_1) or die(mysql_error());
	
}
if(!empty($_POST['update8'])){	

$insertSQL = sprintf("UPDATE  subproducto SET idproducto=%s,idalcance=%s,idtipo_ciclo=%s,idunidad_medida=%s,idarancel=%s,nombre=%s,nombre_ingles=%s,nombre_aleman=%s where idsubproducto=%s",

 
 GetSQLValueString($_POST['idproducto'], "text"),
 GetSQLValueString($_POST['idalcance'], "text"),
 GetSQLValueString($_POST['idtipo_ciclo'], "text"),
  GetSQLValueString($_POST['idunidad_medida'], "text"),
 GetSQLValueString($_POST['idarancel'], "text"),
 GetSQLValueString($_POST['nombre'], "text"),
 GetSQLValueString($_POST['nombre_ingles'], "text"),
  GetSQLValueString($_POST['nombre_aleman'], "text"),
 GetSQLValueString($_POST['idsubprod'], "text"));

  $Result1 = mysql_query($insertSQL, $con_1) or die(mysql_error());
}
if(!empty($_POST['eliminar8'])){
	
$insertSQL = "DELETE FROM subproducto WHERE idsubproducto=".$_POST['idsubprod']."";
  $Result1 = mysql_query($insertSQL, $con_1) or die(mysql_error());
	
}



*/
?>