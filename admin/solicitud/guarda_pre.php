
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
/////////////////inser seccion1
 echo"jkjdbkjgkj";
 echo "total " .$_POST['insertar_pre'];
if($_POST['insertar_pre']==1)
{
$query_pre = sprintf("SELECT * FROM presupuesto where idsolicitud=%s ",GetSQLValueString($_POST['idsolicitud'], "text"));
$pre  = mysql_query($query_pre , $inforgan_pamfa) or die(mysql_error());

$total_pre = mysql_num_rows($pre);

echo "total " .$total_pre;
if($total_pre<1){
$f=date('d/m/y',time());
$tot1=$_POST['ev_cuo']+$_POST['ev_in']+$_POST['ev_ev']+$_POST['ev_seg'];
$tot2=$_POST['au_cuo']+$_POST['au_in']+$_POST['au_ev']+$_POST['au_seg'];
$tot3=$_POST['auex_cuo']+$_POST['auex_in']+$_POST['auex_ev']+$_POST['auex_seg'];
$tot4=$_POST['auam_cuo']+$_POST['auam_in']+$_POST['auam_ev']+$_POST['auam_seg'];
$insertSQL6 = sprintf("insert into presupuesto (idsolicitud, ev_ev,ev_in,ev_seg,ev_cuo,ev_tot,au_ev,au_in,au_seg,au_cuo,au_tot,auex_ev,auex_in,auex_seg,auex_cuo,auex_tot,auam_ev,auam_in,auam_seg,auam_cuo,auam_tot,fecha,idusuario) VALUES (%s, %s,%s, %s,%s,%s,%s, %s,%s, %s,%s,%s,%s, %s,%s, %s,%s,%s,%s, %s,%s, %s,%s)",
             GetSQLValueString($_POST['idsolicitud'], "int"),
			 GetSQLValueString($_POST['ev_ev'], "text"),
             GetSQLValueString($_POST['ev_in'], "text"),
			 GetSQLValueString($_POST['ev_seg'], "text"),
             GetSQLValueString($_POST['ev_cuo'], "text"),
			  GetSQLValueString($tot1, "text"),
			 GetSQLValueString($_POST['au_ev'], "text"),
             GetSQLValueString($_POST['au_in'], "text"),
			 GetSQLValueString($_POST['au_seg'], "text"),
             GetSQLValueString($_POST['au_cuo'], "text"),
			GetSQLValueString($tot2, "text"),
			 GetSQLValueString($_POST['auex_ev'], "text"),
             GetSQLValueString($_POST['auex_in'], "text"),
			 GetSQLValueString($_POST['auex_seg'], "text"),
             GetSQLValueString($_POST['auex_cuo'], "text"),
			GetSQLValueString($tot3, "text"),
			 GetSQLValueString($_POST['auam_ev'], "text"),
             GetSQLValueString($_POST['auam_in'], "text"),
			 GetSQLValueString($_POST['auam_seg'], "text"),
             GetSQLValueString($_POST['auam_cuo'], "text"),
			GetSQLValueString($tot4, "text"),
			GetSQLValueString($f, "text"),
			GetSQLValueString($_POST["idusuario"],"int"));
			
			echo	$insertSQL6;		  
$Result1 = mysql_query($insertSQL6, $inforgan_pamfa) or die(mysql_error());

}
else
{
	
		$insertSQL = sprintf("delete from presupuesto where idsolicitud=%s  ",
 GetSQLValueString($_POST['idsolicitud'], "text"));

  $Result1 = mysql_query($insertSQL, $inforgan_pamfa) or die(mysql_error());
  $f=date('d/m/y',time());
$tot1=$_POST['ev_cuo']+$_POST['ev_in']+$_POST['ev_ev']+$_POST['ev_seg'];
$tot2=$_POST['au_cuo']+$_POST['au_in']+$_POST['au_ev']+$_POST['au_seg'];
$tot3=$_POST['auex_cuo']+$_POST['auex_in']+$_POST['auex_ev']+$_POST['auex_seg'];
$tot4=$_POST['auam_cuo']+$_POST['auam_in']+$_POST['auam_ev']+$_POST['auam_seg'];
$insertSQL6 = sprintf("insert into presupuesto (idsolicitud, ev_ev,ev_in,ev_seg,ev_cuo,ev_tot,au_ev,au_in,au_seg,au_cuo,au_tot,auex_ev,auex_in,auex_seg,auex_cuo,auex_tot,auam_ev,auam_in,auam_seg,auam_cuo,auam_tot,fecha,idusuario) VALUES (%s, %s,%s, %s,%s,%s,%s, %s,%s, %s,%s,%s,%s, %s,%s, %s,%s,%s,%s, %s,%s, %s,%s)",
             GetSQLValueString($_POST['idsolicitud'], "int"),
			 GetSQLValueString($_POST['ev_ev'], "text"),
             GetSQLValueString($_POST['ev_in'], "text"),
			 GetSQLValueString($_POST['ev_seg'], "text"),
             GetSQLValueString($_POST['ev_cuo'], "text"),
			  GetSQLValueString($tot1, "text"),
			 GetSQLValueString($_POST['au_ev'], "text"),
             GetSQLValueString($_POST['au_in'], "text"),
			 GetSQLValueString($_POST['au_seg'], "text"),
             GetSQLValueString($_POST['au_cuo'], "text"),
			GetSQLValueString($tot2, "text"),
			 GetSQLValueString($_POST['auex_ev'], "text"),
             GetSQLValueString($_POST['auex_in'], "text"),
			 GetSQLValueString($_POST['auex_seg'], "text"),
             GetSQLValueString($_POST['auex_cuo'], "text"),
			GetSQLValueString($tot3, "text"),
			 GetSQLValueString($_POST['auam_ev'], "text"),
             GetSQLValueString($_POST['auam_in'], "text"),
			 GetSQLValueString($_POST['auam_seg'], "text"),
             GetSQLValueString($_POST['auam_cuo'], "text"),
			GetSQLValueString($tot4, "text"),
			GetSQLValueString($f, "text"),
			GetSQLValueString($_POST["idusuario"],"int"));
			
			echo	$insertSQL6;		  
$Result1 = mysql_query($insertSQL6, $inforgan_pamfa) or die(mysql_error());

	/*$f=date('d/m/y',time());
$tot1=$_POST['ev_cuo']+$_POST['ev_in']+$_POST['ev_ev']+$_POST['ev_seg'];
$tot2=$_POST['au_cuo']+$_POST['au_in']+$_POST['au_ev']+$_POST['au_seg'];
$tot3=$_POST['auex_cuo']+$_POST['auex_in']+$_POST['auex_ev']+$_POST['auex_seg'];
$tot4=$_POST['auam_cuo']+$_POST['auam_in']+$_POST['auam_ev']+$_POST['auam_seg'];
	$insertSQL = sprintf("UPDATE presupuesto SET ev_ev=%s,ev_in=%s,ev_seg=%s,ev_cuo=%s,ev_tot=%s,au_ev=%s,au_in=%s,au_seg=%s,au_cuo=%s,au_tot=%s,auex_ev=%s,auex_in=%s,auex_seg=%s,auex_cuo=%s,auex_tot=%s,auam_ev=%s,auam_in=%s,auam_seg=%s,auam_cuo=%s,auam_tot=%s,fecha=%s WHERE idsolicitud=%s",
            			
			 GetSQLValueString($_POST['ev_ev'], "text"),
             GetSQLValueString($_POST['ev_in'], "text"),
			 GetSQLValueString($_POST['ev_seg'], "text"),
             GetSQLValueString($_POST['ev_cuo'], "text"),
			  GetSQLValueString($tot1, "text"),
			 GetSQLValueString($_POST['au_ev'], "text"),
             GetSQLValueString($_POST['au_in'], "text"),
			 GetSQLValueString($_POST['au_seg'], "text"),
             GetSQLValueString($_POST['au_cuo'], "text"),
			GetSQLValueString($tot2, "text"),
			 GetSQLValueString($_POST['auex_ev'], "text"),
             GetSQLValueString($_POST['auex_in'], "text"),
			 GetSQLValueString($_POST['auex_seg'], "text"),
             GetSQLValueString($_POST['auex_cuo'], "text"),
			GetSQLValueString($tot3, "text"),
			 GetSQLValueString($_POST['auam_ev'], "text"),
             GetSQLValueString($_POST['auam_in'], "text"),
			 GetSQLValueString($_POST['auam_seg'], "text"),
             GetSQLValueString($_POST['auam_cuo'], "text"),
			GetSQLValueString($tot4, "text"),
			GetSQLValueString($f, "text"),
			
			GetSQLValueString($_POST['idsolicitud'], "int"));
		echo	$insertSQL6;
			
  $Result1 = mysql_query($insertSQL, $inforgan_pamfa) or die(mysql_error());*/
	}
}

 if($_POST['idsolicitud_obs']){
	 
	
	$insertSQL = sprintf("delete from solicitud_obs where idsolicitud_obs=%s  ",
 GetSQLValueString($_POST['idsolicitud_obs'], "text"));

  $Result1 = mysql_query($insertSQL, $inforgan_pamfa) or die(mysql_error());
 
}

if($_POST['actualiza_solicitud_obs']){
	
	
	 
}
	
