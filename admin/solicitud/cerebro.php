
<?php 
$dac = basename($_SERVER['PHP_SELF']);
if($dac=='rev.php'){
	include_once('../../Connections/mail.php');
}

 require_once('../../Connections/inforgan_pamfa.php');?>

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
/////////////////inser seccion1

$sol=0;


$id=0;
if($_GET['persona'])
{
	$_POST['persona']=$_GET['persona'];

	$_POST['seccion']=$_GET['persona'];
	$_POST['idoperador']=$_GET['idoperador'];
	
	
	

}
 

if ($_POST['seccion']==1) {
	
	
	//seccion 15

if($_POST['prod_hm']!=NULL)
	{
	
	$query_hm = sprintf("SELECT * FROM solicitud_hm where idsolicitud=%s ",GetSQLValueString($_POST['idsolicitud'], "text"));
$hm = mysql_query($query_hm , $inforgan_pamfa) or die(mysql_error());

$total_hm = mysql_num_rows($hm);


if($total_hm>0){

$insertSQL6 = sprintf("update solicitud_hm set productos=%s,descripcion=%s WHERE  idsolicitud=%s",
			GetSQLValueString($_POST['prod_hm'], "text"),
             GetSQLValueString($_POST['desc_hm'], "text"),
			
            
			 GetSQLValueString($_POST['idsolicitud'], "int"));


}

else{
	
	$insertSQL6 = sprintf("insert into solicitud_hm (idsolicitud,productos,descripcion) VALUES (%s,%s, %s)",
            
             GetSQLValueString($_POST['idsolicitud'], "text"),
			 GetSQLValueString($_POST['prod_hm'], "text"),
			GetSQLValueString($_POST["desc_hm"], "text"));
}
						  
$Result1 = mysql_query($insertSQL6, $inforgan_pamfa) or die(mysql_error());
	
	
}
	
	/////denomiaciopn de origen
	if($_POST['den_or']!=NULL)
	{
	
	$query_origen = sprintf("SELECT * FROM solicitud_origen where idsolicitud=%s ",GetSQLValueString($_POST['idsolicitud'], "text"));
$origen = mysql_query($query_origen , $inforgan_pamfa) or die(mysql_error());

$total_origen = mysql_num_rows($origen);


if($total_origen>0){

$insertSQL6 = sprintf("update solicitud_origen set idden_origen=%s WHERE  idsolicitud=%s",
			GetSQLValueString($_POST['den_or'], "text"),
           //  GetSQLValueString($_POST['anexo'], "text"),
			
            
			 GetSQLValueString($_POST['idsolicitud'], "int"));


}

else{
	
	$insertSQL6 = sprintf("insert into solicitud_origen (idsolicitud,idden_origen) VALUES (%s,%s)",
            
             GetSQLValueString($_POST['idsolicitud'], "text"),
			 GetSQLValueString($_POST['den_or'], "text"));
}
						  
$Result1 = mysql_query($insertSQL6, $inforgan_pamfa) or die(mysql_error());
	
	
}
	
	////////////
if($_GET['band'])
{
$query_s = sprintf("SELECT Max(idsolicitud) as id FROM solicitud  WHERE idoperador=%s",GetSQLValueString($_POST['idoperador'], "text"));
	$s  = mysql_query($query_s , $inforgan_pamfa) or die(mysql_error());
$row_s = mysql_fetch_assoc($s);
	
	
	
//$sol = $row_s['id'];
$_POST['idsolicitud']=$row_s['id'];
}

 $query_solicitud = sprintf("SELECT * FROM solicitud where idsolicitud=%s ",GetSQLValueString($_POST['idsolicitud'], "text"));
$solicitud  = mysql_query($query_solicitud , $inforgan_pamfa) or die(mysql_error());
$row_solicitud = mysql_fetch_assoc($solicitud );
$total_solicitud = mysql_num_rows($solicitud);


if($total_solicitud==1){
	$insertSQL = sprintf("update solicitud set fecha=%s, persona=%s, idoperador=%s WHERE idsolicitud=%s",
 GetSQLValueString($_POST['fecha'], "text"),
             GetSQLValueString($_POST['persona'], "text"),
						 GetSQLValueString($_POST['idoperador'], "text"),
	GetSQLValueString($_POST['idsolicitud'], "int"));
	
	 $Result1 = mysql_query($insertSQL, $inforgan_pamfa) or die(mysql_error());

//seccion2
	$insertSQL2 = sprintf("update solicitud set producto=%s,cdfi=%s,num_ggn=%s,num_gln=%s,num_coc=%s,num_mex_cal_sup=%s,num_primus=%s,num_senasica=%s,responsable=%s,personal=%s WHERE idsolicitud=%s",
	 GetSQLValueString($_POST['prod'], "text"),
	  GetSQLValueString($_POST['cdfi'], "text"),
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
	
	$insertSQL6 = sprintf(" delete from solicitud_primus where idsolicitud=%s",
            				
	GetSQLValueString($_POST['idsolicitud'], "int"));
	 $Result6 = mysql_query($insertSQL6, $inforgan_pamfa) or die(mysql_error());
	 
	
	 
	 for($x=0;$x<7;$x++)
{
	if($_POST['primus'.$x])
	{
		$insertSQL6 = sprintf("insert into solicitud_primus (idprimus, idsolicitud) VALUES (%s, %s)",
             GetSQLValueString($_POST['primus'.$x], "int"),				
	GetSQLValueString($_POST['idsolicitud'], "int"));
	
	
	 $Result6 = mysql_query($insertSQL6, $inforgan_pamfa) or die(mysql_error());
	}
	}
	
	/*$insertSQL6 = sprintf("update solicitud set idprimus=%s WHERE idsolicitud=%s",
             GetSQLValueString($_POST['primus'], "text"),				
	GetSQLValueString($_POST['idsolicitud'], "int"));*/
	
	
	// $Result6 = mysql_query($insertSQL6, $inforgan_pamfa) or die(mysql_error());
  
	//SECCION 7
	
	$insertSQL7 = sprintf(" delete from solicitud_mexcalsup where idsolicitud=%s",
                                
     GetSQLValueString($_POST['idsolicitud'], "int"));
     $Result7 = mysql_query($insertSQL7, $inforgan_pamfa) or die(mysql_error());
	
	  for($x=0;$x<2 ;$x++)
{
     if($_POST['idmex_alcance'.$x])
     {
          $insertSQL7 = sprintf("insert into solicitud_mexcalsup (idmex_alcance, idsolicitud) VALUES (%s, %s)",
             GetSQLValueString($_POST['idmex_alcance'.$x], "int"),                    
     GetSQLValueString($_POST['idsolicitud'], "int"));
     
     
     $Result7 = mysql_query($insertSQL7, $inforgan_pamfa) or die(mysql_error());
     }
	 //////////complemento mcs
	 if($_POST['idmex_alcance'.$x])
     {
		 $query_mcs = sprintf("SELECT * FROM solicitud_mcs where idsolicitud=%s ",GetSQLValueString($_POST['idsolicitud'], "text"));
$mcs  = mysql_query($query_mcs , $inforgan_pamfa) or die(mysql_error());

$total_mcs = mysql_num_rows($mcs);
if($total_mcs>0)
{ $insertSQL7 = sprintf("update solicitud_mcs set evaluacion=%s,documento=%s,muestreo=%s,trazabilidad=%s WHERE idsolicitud=%s",
 
	 GetSQLValueString($_POST['evaluacion'], "text"),                    
     GetSQLValueString($_POST['documento'], "text"),
	  GetSQLValueString($_POST['muestreo'], "text"),                    
     GetSQLValueString($_POST['trazabilidad'], "text"),
	  GetSQLValueString($_POST['idsolicitud'], "int"));
	}else {
          $insertSQL7 = sprintf("insert into solicitud_mcs (idsolicitud,evaluacion,documento,muestreo,trazabilidad) VALUES (%s,%s, %s,%s, %s)",
                             
     GetSQLValueString($_POST['idsolicitud'], "int"), 
	 GetSQLValueString($_POST['evaluacion'], "text"),                    
     GetSQLValueString($_POST['documento'], "text"),
	  GetSQLValueString($_POST['muestreo'], "text"),                    
     GetSQLValueString($_POST['trazabilidad'], "text"));
      
}
     $Result7 = mysql_query($insertSQL7, $inforgan_pamfa) or die(mysql_error());
     }
	 /////
     }
     
     for($x=0;$x<6;$x++)
{
     if($_POST['idmex_pliego'.$x])
     {
          $insertSQL7 = sprintf("insert into solicitud_mexcalsup (idmex_pliego, idsolicitud) VALUES (%s, %s)",
             GetSQLValueString($_POST['idmex_pliego'.$x], "int"),                    
     GetSQLValueString($_POST['idsolicitud'], "int"));
     
     
     $Result7 = mysql_query($insertSQL7, $inforgan_pamfa) or die(mysql_error());
     }
     }
     
     
	
	/*$insertSQL7 = sprintf("update solicitud set idmex_alcance=%s,idmex_pliego=%s WHERE idsolicitud=%s",
             GetSQLValueString($_POST['idmex_alcance'], "text"),
			 GetSQLValueString($_POST['idmex_pliego'], "text"),						
	GetSQLValueString($_POST['idsolicitud'], "int"));*/
	
	
	//SECCION 8
	/*$insertSQL8 = sprintf("update solicitud set idsrrc=%s,srrc_preg1=%s,srrc_preg2=%s WHERE idsolicitud=%s",
             GetSQLValueString($_POST['idsrrc'], "text"),
			 GetSQLValueString($_POST['srrc_preg1'], "text"),
			 GetSQLValueString($_POST['srrc_preg2'], "text"),
	GetSQLValueString($_POST['idsolicitud'], "int"));
	*/
	$insertSQL8 = sprintf(" delete from solicitud_srrc where idsolicitud=%s",
            				
	GetSQLValueString($_POST['idsolicitud'], "int"));
	 $Result8 = mysql_query($insertSQL8, $inforgan_pamfa) or die(mysql_error());
	 
	
	 
	 for($x=0;$x<5;$x++)
{
	if($_POST['idsrrc'.$x])
	{
		$insertSQL8 = sprintf("insert into solicitud_srrc (idsrrc, idsolicitud) VALUES (%s, %s)",
             GetSQLValueString($_POST['idsrrc'.$x], "int"),				
	GetSQLValueString($_POST['idsolicitud'], "int"));
	
	
	 $Result8 = mysql_query($insertSQL8, $inforgan_pamfa) or die(mysql_error());
	  $insertSQL8 = sprintf("update solicitud set srrc_preg1=%s,srrc_preg2=%s WHERE idsolicitud=%s",
            
			 GetSQLValueString($_POST['srrc_preg1'], "text"),
			 GetSQLValueString($_POST['srrc_preg2'], "text"),
	GetSQLValueString($_POST['idsolicitud'], "int"));
	 $Result8 = mysql_query($insertSQL8, $inforgan_pamfa) or die(mysql_error());
	}
	}
	
	
	
  
 

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
		$query_obs = sprintf("SELECT * FROM solicitud_obs where idsolicitud=%s and estado=1",GetSQLValueString($_POST['idsolicitud'], "text"));
$obs  = mysql_query($query_obs , $inforgan_pamfa) or die(mysql_error());

$total_obs = mysql_num_rows($obs);
if($total_obs>0)
{
	$_POST['terminada']=2;
}
else{ $_POST['terminada']=1;
}

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
	  $e="";
if($_POST['esq_tipo1_op1']!=NULL)
	{	 
$e=	$_POST['esq_tipo1_op1'];
	}
$e2="";

	if($_POST['esq_tipo2_op1']!=NULL)
	{
	$e2=	$_POST['esq_tipo2_op1'];
}
$p1="";
if($_POST['preg61']!=NULL)
	{
	$p1=$_POST['preg61'];
	}
	
	$p2="";
if($_POST['preg71']!=NULL)
	{
	$p2=$_POST['preg71'];
	}

	$p3="";
if($_POST['preg81']!=NULL)
	{
	$p3=$_POST['preg81'];
	}
  $insertSQL5 = sprintf("INSERT INTO solicitud_esquema(idsolicitud,esq_tipo1_op1,preg1_op2,preg2_op2,preg3_op2,preg1_tipo2,preg2_tipo2,esq_tipo2_op1,preg3_tipo2,preg4_tipo2,preg5_tipo2,preg6,preg7,preg8,preg9) VALUES (%s, %s,  %s, %s, %s, %s,%s, %s,  %s, %s, %s, %s,%s, %s,%s)",
             GetSQLValueString($_POST['idsolicitud'], "text"),
			 GetSQLValueString($e, "text"),
             GetSQLValueString($_POST['preg1_op2'], "text"),
			 GetSQLValueString($_POST['preg2_op2'], "text"),
             GetSQLValueString($_POST['preg3_op2'], "text"),
			 GetSQLValueString($_POST['preg1_tipo2'], "text"),
             GetSQLValueString($_POST['preg2_tipo2'], "text"),
			 
			 GetSQLValueString($e2, "text"),
			 GetSQLValueString($_POST['preg3_tipo2'], "text"),
			 GetSQLValueString($_POST['preg4_tipo2'], "text"),
             GetSQLValueString($_POST['preg5_tipo2'], "text"),
			 GetSQLValueString($p1, "text"),
             GetSQLValueString($p2, "text"),
			 GetSQLValueString($p3, "text"),
             GetSQLValueString($_POST['preg9'], "text"));
						 
}
else{
	$e="";
		if($_POST['esq_tipo1_op1']!=NULL)
	$e=	$_POST['esq_tipo1_op1'];
	
$e2="";
 
	if($_POST['esq_tipo2_op1']!=NULL)
	{
	$e2=	$_POST['esq_tipo2_op1'];
	}

$p1="";
if($_POST['preg61']!=NULL)
	{
	$p1=$_POST['preg61'];
	}
	
	$p2="";
if($_POST['preg71']!=NULL)
	{
	$p2=$_POST['preg71'];
	}

	$p3="";
if($_POST['preg81']!=NULL)
	{
	$p3=$_POST['preg81'];
	}
	
	$insertSQL5 = sprintf("update solicitud_esquema set esq_tipo1_op1=%s,preg1_op2=%s,preg2_op2=%s,preg3_op2=%s,preg1_tipo2=%s,preg2_tipo2=%s,preg3_tipo2=%s,esq_tipo2_op1=%s,preg4_tipo2=%s,preg5_tipo2=%s,preg6=%s,preg7=%s,preg8=%s,preg9=%s WHERE idsolicitud=%s and idsolicitud_esquema=%s",
			GetSQLValueString($e, "text"),
             GetSQLValueString($_POST['preg1_op2'], "text"),
			 GetSQLValueString($_POST['preg2_op2'], "text"),
             GetSQLValueString($_POST['preg3_op2'], "text"),
			 GetSQLValueString($_POST['preg1_tipo2'], "text"),
             GetSQLValueString($_POST['preg2_tipo2'], "text"),
			 
			 
			 GetSQLValueString($_POST['preg3_tipo2'], "text"),
			 GetSQLValueString($e2, "text"),
			 GetSQLValueString($_POST['preg4_tipo2'], "text"),
			 
             GetSQLValueString($_POST['preg5_tipo2'], "text"),
			 GetSQLValueString($p1, "text"),
             GetSQLValueString($p2, "text"),
			 GetSQLValueString($p3, "text"),
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

  $insertSQL10 = sprintf("INSERT INTO procesadora(empresa,rfc2,direccion,direccion2,cp,tel,idsolicitud) VALUES (%s, %s,  %s, %s, %s, %s, %s)",
             GetSQLValueString($_POST['empresa'], "text"),
			 GetSQLValueString($_POST['rfc2'], "text"),
             GetSQLValueString($_POST['direccion'], "text"),
			 GetSQLValueString($_POST['direccion2'], "text"),
             GetSQLValueString($_POST['cp'], "text"),
			 GetSQLValueString($_POST['tel'], "text"),
			 GetSQLValueString($_POST['idsolicitud'], "int"));
						 
}
else{
	
	$insertSQL10 = sprintf("UPDATE procesadora SET empresa=%s,rfc2=%s,direccion=%s,direccion2=%s,cp=%s,tel=%s WHERE idsolicitud=%s AND idprocesadora=%s",
 GetSQLValueString($_POST['empresa'], "text"),
			 GetSQLValueString($_POST['rfc2'], "text"),
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



if($_POST['insertar_prod'])
{
			

	$sol=0;
	
	if(isset($_POST['idsolicitud']))
	{
		$sol = $_POST['idsolicitud'];
	}
	else{
	$query_s = sprintf("SELECT Max(idsolicitud) as id FROM solicitud  WHERE idoperador=%s",GetSQLValueString($_POST['idoperador'], "text"));
	$s  = mysql_query($query_s , $inforgan_pamfa) or die(mysql_error());
$row_s = mysql_fetch_assoc($s);
	
	
	
$sol = $row_s['id'];
	}
 
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
             GetSQLValueString($sol, "int"));
			
  $Result1 = mysql_query($insertSQL, $inforgan_pamfa) or die(mysql_error());
	
	$query_c = sprintf("SELECT Max(idcultivos) as id FROM cultivos  WHERE idsolicitud=%s",GetSQLValueString($sol, "text"));
	$c  = mysql_query($query_c , $inforgan_pamfa) or die(mysql_error());
$row_c = mysql_fetch_assoc($c);
	
	$query_nom = sprintf("SELECT nombre_legal FROM operador where idoperador=%s ",GetSQLValueString($_POST['idoperador'], "text"));
$nom = mysql_query($query_nom , $inforgan_pamfa) or die(mysql_error());
$row_nom = mysql_fetch_assoc($nom );
	
$idcultivo = $row_c['id'];
 if($_POST['empaque']==2){
	$insertSQL = sprintf("INSERT INTO anexo_p(p1,p2,p3,p4,p5,p6,p7,p8,p9,p10,p11,p12,p13,p14,p15,p16,p17,p18,p19,idsolicitud,idcultivo) VALUES (%s,%s, %s,  %s, %s, %s, %s, %s, %s,%s, %s,  %s,  %s,  %s,  %s,  %s,  %s,  %s,  %s,  %s,  %s)",
             GetSQLValueString($row_nom['nombre_legal'], "text"),
			 GetSQLValueString($_POST['p2'], "text"),
			 GetSQLValueString($_POST['p3'], "text"),
			 GetSQLValueString($_POST['p4'], "text"),
			 GetSQLValueString($_POST['ubicacion_unidad'], "text"),
			 GetSQLValueString($_POST['p6'], "text"),
			 GetSQLValueString($_POST['p7'], "text"),
			 GetSQLValueString($_POST['num_trabajadores'], "text"),
			 GetSQLValueString($_POST['producto'], "text"),
			 GetSQLValueString($_POST['p10'], "text"),
			 GetSQLValueString($_POST['libre_cubierto'], "text"),
			 GetSQLValueString($_POST['superficie'], "text"),
			 GetSQLValueString($_POST['p13'], "text"),
			 GetSQLValueString($_POST['p14'], "text"),
			 GetSQLValueString($_POST['p15'], "text"),
			 GetSQLValueString($_POST['p16'], "text"),
			 GetSQLValueString($_POST['p17'], "text"),
			 GetSQLValueString($_POST['p18'], "text"),
			 GetSQLValueString($_POST['coordenadas'], "text"),
            
             GetSQLValueString($sol, "int"),
			  GetSQLValueString($idcultivo, "int"));
			
  $Result1 = mysql_query($insertSQL, $inforgan_pamfa) or die(mysql_error());
}
 else{
	  
  $query_e = sprintf("SELECT * FROM procesadora where idsolicitud=%s ",GetSQLValueString($_POST['idsolicitud'], "text"));
$e = mysql_query($query_e , $inforgan_pamfa) or die(mysql_error());
$row_e = mysql_fetch_assoc($e );

 $query_nom = sprintf("SELECT nombre_legal FROM operador where idoperador=%s ",GetSQLValueString($_POST['idoperador'], "text"));
$nom = mysql_query($query_nom , $inforgan_pamfa) or die(mysql_error());
$row_nom = mysql_fetch_assoc($nom );

  
	$insertSQL = sprintf("INSERT INTO anexo_e(p1,p2,p3,p4,p5,p6,p7,p8,p9,p10,p11,p12,p13,p14,p15,p16,p17,p18,p19,idsolicitud,idcultivo) VALUES (%s,%s, %s,  %s, %s, %s, %s, %s, %s,%s, %s,  %s,  %s,  %s,  %s,  %s,  %s,  %s,  %s,  %s,  %s)",
             GetSQLValueString($row_nom['nombre_legal'], "text"),
			  GetSQLValueString($row_e ['empresa'].",".$row_e ['direccion'].",".$row_e ['direccion2'], "text"),
			 GetSQLValueString($_POST['p3'], "text"),
			 GetSQLValueString($_POST['p4'], "text"),
			 GetSQLValueString($row_e ['tel'], "text"),
			 GetSQLValueString($_POST['num_trabajadores'], "text"),
			 GetSQLValueString($_POST['rfc'], "text"),
			 GetSQLValueString($_POST['producto'], "text"),
			 GetSQLValueString($_POST['p9'], "text"),
			 
			
			 GetSQLValueString($_POST['p10'], "text"),
			  GetSQLValueString($_POST['p11'], "text"),
			   GetSQLValueString($_POST['p12'], "text"),
			 
			 GetSQLValueString($_POST['p13'], "text"),
			 GetSQLValueString($_POST['p14'], "text"),
			 GetSQLValueString($_POST['p15'], "text"),
			 GetSQLValueString($_POST['p16'], "text"),
			 GetSQLValueString($_POST['p17'], "text"),
			 GetSQLValueString($_POST['p18'], "text"),
			 GetSQLValueString($_POST['coordenadas'], "text"),
            
             GetSQLValueString($sol, "int"),
			  GetSQLValueString($idcultivo, "int"));
			 
			 
			 
			
  $Result1 = mysql_query($insertSQL, $inforgan_pamfa) or die(mysql_error());
  }
}


 if($_POST['idcultivos']){
	 
	
	$insertSQL = sprintf("delete from cultivos where idcultivos=%s  ",
 GetSQLValueString($_POST['idcultivos'], "text"));

  $Result1 = mysql_query($insertSQL, $inforgan_pamfa) or die(mysql_error());
  
  $insertSQL = sprintf("delete from anexo_p where idcultivo=%s  ",
 GetSQLValueString($_POST['idcultivos'], "int"));

  $Result1 = mysql_query($insertSQL, $inforgan_pamfa) or die(mysql_error());
   $insertSQL = sprintf("delete from anexo_e where idcultivo=%s  ",
 GetSQLValueString($_POST['idcultivos'], "int"));

  $Result1 = mysql_query($insertSQL, $inforgan_pamfa) or die(mysql_error());
}

///////fin
/*
if($_POST['insertar_anexo_p'])
{
			

	$sol=0;
	echo "insss---".$_GET['persona'];
	
	$query_s = sprintf("SELECT Max(idsolicitud) as id FROM solicitud  WHERE idoperador=%s",GetSQLValueString($_POST['idoperador'], "text"));
	$s  = mysql_query($query_s , $inforgan_pamfa) or die(mysql_error());
$row_s = mysql_fetch_assoc($s);
	
	
	
$sol = $row_s['id'];

 
  $insertSQL = sprintf("INSERT INTO anexo_p(p1,p2,p3,p4,p5,p6,p7,p8,p9,p10,p11,p12,p13,p14,p15,p16,p17,p18,p19,idsolicitud) VALUES (%s,%s, %s,  %s, %s, %s, %s, %s, %s,%s, %s,  %s,  %s,  %s,  %s,  %s,  %s,  %s,  %s,  %s)",
             GetSQLValueString($_POST['p1'], "text"),
			 GetSQLValueString($_POST['p2'], "text"),
			 GetSQLValueString($_POST['p3'], "text"),
			 GetSQLValueString($_POST['p4'], "text"),
			 GetSQLValueString($_POST['p5'], "text"),
			 GetSQLValueString($_POST['p6'], "text"),
			 GetSQLValueString($_POST['p7'], "text"),
			 GetSQLValueString($_POST['p8'], "text"),
			 GetSQLValueString($_POST['p9'], "text"),
			 GetSQLValueString($_POST['p10'], "text"),
			 GetSQLValueString($_POST['p11'], "text"),
			 GetSQLValueString($_POST['p12'], "text"),
			 GetSQLValueString($_POST['p13'], "text"),
			 GetSQLValueString($_POST['p14'], "text"),
			 GetSQLValueString($_POST['p15'], "text"),
			 GetSQLValueString($_POST['p16'], "text"),
			 GetSQLValueString($_POST['p17'], "text"),
			 GetSQLValueString($_POST['p18'], "text"),
			 GetSQLValueString($_POST['p19'], "text"),
            
             GetSQLValueString($sol, "int"));
			
  $Result1 = mysql_query($insertSQL, $inforgan_pamfa) or die(mysql_error());
						 
}
*/

/////////////////
if($_POST['idanexo_p']){
	
	
	 $insertSQL = sprintf("UPDATE anexo_p SET p1=%s,p2=%s,p3=%s,p4=%s,p5=%s,p6=%s,p7=%s,p8=%s,p9=%s,p10=%s,p11=%s,p12=%s,p13=%s,p14=%s,p15=%s,p16=%s,p17=%s,p18=%s,p19=%s WHERE idanexo_p=%s",
             GetSQLValueString($_POST['p1'], "text"),
			 GetSQLValueString($_POST['p2'],"text"),
			 GetSQLValueString($_POST['p3'], "text"),
			 GetSQLValueString($_POST['p4'], "text"),
			 GetSQLValueString($_POST['p5'], "text"),
			 GetSQLValueString($_POST['p6'], "text"),
			 GetSQLValueString($_POST['p7'], "text"),
			 GetSQLValueString($_POST['p8'], "text"),
			 GetSQLValueString($_POST['p9'], "text"),
			 GetSQLValueString($_POST['p10'], "text"),
			 GetSQLValueString($_POST['p11'], "text"),
			 GetSQLValueString($_POST['p12'], "text"),
			 GetSQLValueString($_POST['p13'], "text"),
			 GetSQLValueString($_POST['p14'], "text"),
			 GetSQLValueString($_POST['p15'], "text"),
			 GetSQLValueString($_POST['p16'], "text"),
			 GetSQLValueString($_POST['p17'], "text"),
			 GetSQLValueString($_POST['p18'], "text"),
			 GetSQLValueString($_POST['p19'], "text"),
            
             GetSQLValueString($_POST['idanexo_p'], "int"));
			print_r ( $insertSQL);
  $Result1 = mysql_query($insertSQL, $inforgan_pamfa) or die(mysql_error());
}
if($_POST['idanexo_e']){
	
	
	 $insertSQL = sprintf("UPDATE anexo_e SET p1=%s,p2=%s,p3=%s,p4=%s,p5=%s,p6=%s,p7=%s,p8=%s,p9=%s,p10=%s,p11=%s,p12=%s,p13=%s,p14=%s,p15=%s,p16=%s,p17=%s,p18=%s,p19=%s WHERE idanexo_e=%s",
             GetSQLValueString($_POST['p1'], "text"),
			 GetSQLValueString($_POST['p2'],"text"),
			 GetSQLValueString($_POST['p3'], "text"),
			 GetSQLValueString($_POST['p4'], "text"),
			 GetSQLValueString($_POST['p5'], "text"),
			 GetSQLValueString($_POST['p6'], "text"),
			 GetSQLValueString($_POST['p7'], "text"),
			 GetSQLValueString($_POST['p8'], "text"),
			 GetSQLValueString($_POST['p9'], "text"),
			 GetSQLValueString($_POST['p10'], "text"),
			 GetSQLValueString($_POST['p11'], "text"),
			 GetSQLValueString($_POST['p12'], "text"),
			 GetSQLValueString($_POST['p13'], "text"),
			 GetSQLValueString($_POST['p14'], "text"),
			 GetSQLValueString($_POST['p15'], "text"),
			 GetSQLValueString($_POST['p16'], "text"),
			 GetSQLValueString($_POST['p17'], "text"),
			 GetSQLValueString($_POST['p18'], "text"),
			 GetSQLValueString($_POST['p19'], "text"),
            
             GetSQLValueString($_POST['idanexo_e'], "int"));
			
  $Result1 = mysql_query($insertSQL, $inforgan_pamfa) or die(mysql_error());
}
if($_POST['insertar_solicitud_obs']==1)
{
$query_obs = sprintf("SELECT * FROM solicitud_obs where idsolicitud=%s ",GetSQLValueString($_POST['idsolicitud'], "text"));
$obs  = mysql_query($query_obs , $inforgan_pamfa) or die(mysql_error());

$total_obs = mysql_num_rows($obs);




$insertSQL6 = sprintf("insert into solicitud_obs (idsolicitud, observacion,seccion_sol,fecha_obs,estado,idusuario) VALUES (%s, %s,%s, %s,%s,%s)",
             GetSQLValueString($_POST['idsolicitud'], "int"),
			 GetSQLValueString($_POST['observacion'], "text"),
             GetSQLValueString($_POST['seccion_sol'], "text"),
			 GetSQLValueString($_POST['fecha_obs'], "text"),
             GetSQLValueString($_POST['estado'], "text"),
			GetSQLValueString($_POST["idusuario"], "text"));
			
						  
$Result1 = mysql_query($insertSQL6, $inforgan_pamfa) or die(mysql_error());

$query_obs = sprintf("SELECT * FROM solicitud_obs where idsolicitud=%s and estado=1",GetSQLValueString($_POST['idsolicitud'], "text"));
$obs  = mysql_query($query_obs , $inforgan_pamfa) or die(mysql_error());

$total_obs = mysql_num_rows($obs);
if($total_obs>0)
{
	$_POST['terminada']=2;
}
else{ $_POST['terminada']=1;
}

	$insertSQL13 = sprintf("update solicitud set terminada=%s WHERE idsolicitud=%s",
           
			  GetSQLValueString($_POST['terminada'], "text"),									
	GetSQLValueString($_POST['idsolicitud'], "int")); 
	   $Result13 = mysql_query($insertSQL13, $inforgan_pamfa) or die(mysql_error());

	

}

 if($_POST['idsolicitud_obs']){
	 
	
	$insertSQL = sprintf("delete from solicitud_obs where idsolicitud_obs=%s  ",
 GetSQLValueString($_POST['idsolicitud_obs'], "text"));

  $Result1 = mysql_query($insertSQL, $inforgan_pamfa) or die(mysql_error());
 
}

if($_POST['actualiza_solicitud_obs']){
	
	
	 $insertSQL = sprintf("UPDATE solicitud_obs SET observacion=%s,seccion_sol=%s,fecha_obs=%s,estado=%s WHERE idsolicitud_obs=%s",
            
			 GetSQLValueString($_POST['observacion'], "text"),
             GetSQLValueString($_POST['seccion_sol'], "text"),
			 GetSQLValueString($_POST['fecha_obs'], "text"),
             GetSQLValueString($_POST['estado'], "text"),
			GetSQLValueString($_POST["idsolicitud_obs_a"], "text"));
		
		echo $insertSQL;	
  $Result1 = mysql_query($insertSQL, $inforgan_pamfa) or die(mysql_error());
 
	$query_obs = sprintf("SELECT * FROM solicitud_obs where idsolicitud=%s and estado=1",GetSQLValueString($_POST['idsolicitud'], "text"));
$obs  = mysql_query($query_obs , $inforgan_pamfa) or die(mysql_error());

$total_obs = mysql_num_rows($obs);
if($total_obs>0)
{
	$_POST['terminada']=2;
}
else{ $_POST['terminada']=1;
}

	$insertSQL13 = sprintf("update solicitud set terminada=%s WHERE idsolicitud=%s",
           
			  GetSQLValueString($_POST['terminada'], "text"),									
	GetSQLValueString($_POST['idsolicitud'], "int")); 
	   $Result13 = mysql_query($insertSQL13, $inforgan_pamfa) or die(mysql_error());

	


}
 if($_POST['insertar']){
	 
	$query_o = sprintf("SELECT * FROM operador where idoperador=%s",GetSQLValueString($_POST['idoperador'], "text"));
$o  = mysql_query($query_o , $inforgan_pamfa) or die(mysql_error());
$row_o = mysql_fetch_assoc($o);

	$insertSQL = sprintf("insert into anexo_p (idsolicitud,p1) values(%s,%s) ",

 GetSQLValueString($_POST['idsolicitud'], "text"),
  GetSQLValueString($row_o['nombre_legal'], "text"));

  $Result1 = mysql_query($insertSQL, $inforgan_pamfa) or die(mysql_error());
 
}
if(!empty($_POST['mail'])){
		$insertSQL = sprintf("Update operador SET password=%s WHERE idoperador=%s",
 GetSQLValueString($_POST['pass_tem'], "text"),
  GetSQLValueString($_POST['idoperador'], "text"));


  $Result1= mysql_query($insertSQL ,$inforgan_pamfa) or die(mysql_error());
  
  $cuerpo="<table class='table' border='1' cellpadding='5' cellspacing='1'>
  <tr>
    <th colspan='3' >Bienvenido</th>
  </tr>
  <tr>
    <td rowspan='2'><img style='width:150px;' src='http://pamfa.net/images/pamfa.png'  alt=''></td>
    <td colspan='2'><strong>Usuario:</strong> ".$_POST['usuario']."</td></tr>
	<tr><td colspan='2'><strong>Contraseña<strong>: ".$_POST['pass_tem']."</td>
  </tr>
  <tr><td colspan='3'>Apartir de ahora puedes tener acceso a la plataforma dando click en este enlace <a href='http://pamfa.net/'>PAMFA</a></td></tr>
  <tr><td colspan='3'><img style='width:400px;' src='http://pamfa.net/images/slogan.png'  alt=''></td></tr>
</table>";
   
  $mail->AddAddress($_POST['correo']);

        $mail->Subject = utf8_decode("acdo");
        $mail->Body = utf8_decode($cuerpo);
        $mail->MsgHTML(utf8_decode($cuerpo));
        // para enviar el correo 
		$url = '../../docs/docs_enviados/apelaciones.pdf';
$mail->addAttachment($url,'solicitud.pdf');
        
        $mail->Send();
        // limpiar la lista de correos que se van guardando
        $mail->ClearAddresses();
}

if($_POST['idanexo_p']){
	
	
	 $insertSQL = sprintf("UPDATE anexo_p SET p1=%s,p2=%s,p3=%s,p4=%s,p5=%s,p6=%s,p7=%s,p8=%s,p9=%s,p10=%s,p11=%s,p12=%s,p13=%s,p14=%s,p15=%s,p16=%s,p17=%s,p18=%s,p19=%s WHERE idanexo_p=%s",
             GetSQLValueString($_POST['p1'], "text"),
			 GetSQLValueString($_POST['p2'],"text"),
			 GetSQLValueString($_POST['p3'], "text"),
			 GetSQLValueString($_POST['p4'], "text"),
			 GetSQLValueString($_POST['p5'], "text"),
			 GetSQLValueString($_POST['p6'], "text"),
			 GetSQLValueString($_POST['p7'], "text"),
			 GetSQLValueString($_POST['p8'], "text"),
			 GetSQLValueString($_POST['p9'], "text"),
			 GetSQLValueString($_POST['p10'], "text"),
			 GetSQLValueString($_POST['p11'], "text"),
			 GetSQLValueString($_POST['p12'], "text"),
			 GetSQLValueString($_POST['p13'], "text"),
			 GetSQLValueString($_POST['p14'], "text"),
			 GetSQLValueString($_POST['p15'], "text"),
			 GetSQLValueString($_POST['p16'], "text"),
			 GetSQLValueString($_POST['p17'], "text"),
			 GetSQLValueString($_POST['p18'], "text"),
			 GetSQLValueString($_POST['p19'], "text"),
            
             GetSQLValueString($_POST['idanexo_p'], "int"));
			print_r ( $insertSQL);
  $Result1 = mysql_query($insertSQL, $inforgan_pamfa) or die(mysql_error());
}
if($_POST['seccion']==100){
	
		$query_rev = sprintf("SELECT * FROM solicitud_rev where idsolicitud=%s ",GetSQLValueString($_POST['idsolicitud'], "text"));
$rev  = mysql_query($query_rev , $inforgan_pamfa) or die(mysql_error());

$total_rev = mysql_num_rows($rev);
if($total_rev>0)
{
	$insertSQL = sprintf("UPDATE solicitud_rev SET p1=%s,obs1=%s,p2=%s,obs2=%s,p3=%s,obs3=%s,p4=%s,obs4=%s,p5=%s,obs5=%s,p6=%s,obs6=%s,p7=%s,obs7=%s,p8=%s,obs8=%s,p9=%s,p10=%s,p11=%s,p12=%s WHERE idsolicitud=%s",
             GetSQLValueString($_POST['p1'], "text"),
			 GetSQLValueString($_POST['obs1'], "text"),
			 GetSQLValueString($_POST['p2'], "text"),
			 GetSQLValueString($_POST['obs2'], "text"),
			 GetSQLValueString($_POST['p3'], "text"),
			 GetSQLValueString($_POST['obs3'], "text"),
			 GetSQLValueString($_POST['p4'], "text"),
			 GetSQLValueString($_POST['obs4'], "text"),
			 GetSQLValueString($_POST['p5'], "text"),
			 GetSQLValueString($_POST['obs5'], "text"),
			 GetSQLValueString($_POST['p6'], "text"),
			 GetSQLValueString($_POST['obs6'], "text"),
			 GetSQLValueString($_POST['p7'], "text"),
			 GetSQLValueString($_POST['obs7'], "text"),
			 GetSQLValueString($_POST['p8'], "text"),
			 
			 GetSQLValueString($_POST['obs8'], "text"),
			  GetSQLValueString($_POST['p9'], "text"),
			   GetSQLValueString($_POST['p10'], "text"),
			    GetSQLValueString($_POST['p11'], "text"),
				 GetSQLValueString($_POST['p12'], "text"),
				 
			 GetSQLValueString($_POST['idsolicitud'], "int"));
			
}
else{ 
$insertSQL = sprintf("INSERT INTO solicitud_rev(p1,obs1,p2,obs2,p3,obs3,p4,obs4,p5,obs5,p6,obs6,p7,obs7,p8,obs8,p9,p10,p11,p12,idsolicitud) VALUES (%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s)",
            GetSQLValueString($_POST['p1'], "text"),
			 GetSQLValueString($_POST['obs1'], "text"),
			 GetSQLValueString($_POST['p2'], "text"),
			 GetSQLValueString($_POST['obs2'], "text"),
			 GetSQLValueString($_POST['p3'], "text"),
			 GetSQLValueString($_POST['obs3'], "text"),
			 GetSQLValueString($_POST['p4'], "text"),
			 GetSQLValueString($_POST['obs4'], "text"),
			 GetSQLValueString($_POST['p5'], "text"),
			 GetSQLValueString($_POST['obs5'], "text"),
			 GetSQLValueString($_POST['p6'], "text"),
			 GetSQLValueString($_POST['obs6'], "text"),
			 GetSQLValueString($_POST['p7'], "text"),
			 GetSQLValueString($_POST['obs7'], "text"),
			 GetSQLValueString($_POST['p8'], "text"),
			 GetSQLValueString($_POST['obs8'], "text"),
			 GetSQLValueString($_POST['p9'], "text"),
			 GetSQLValueString($_POST['p10'], "text"),
			 GetSQLValueString($_POST['p11'], "text"),
			 GetSQLValueString($_POST['p12'], "text"),
			
            
             GetSQLValueString($_POST['idsolicitud'], "int"));
}

	
			
  $Result1 = mysql_query($insertSQL, $inforgan_pamfa) or die(mysql_error());
}

  if($_POST['idanexo_mcs']){
	 
	
	$insertSQL = sprintf("delete from medicion_mexcalsup where idmedicion=%s ",
 GetSQLValueString($_POST['idanexo_mcs'], "text"));
echo $insertSQL ;
  $Result1 = mysql_query($insertSQL, $inforgan_pamfa) or die(mysql_error());
  
  
}