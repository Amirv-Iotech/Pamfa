<?php require_once('../Connections/inforgan_pamfa.php'); ?>
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

if($_POST['idsolicitud']){
	$query_operador = sprintf("SELECT * FROM operador WHERE idoperador=(select idoperador from solicitud where idsolicitud=%s)", GetSQLValueString( $_POST["idsolicitud"], "int"));
$operador = mysql_query($query_operador, $inforgan_pamfa) or die(mysql_error());
$row_operador= mysql_fetch_assoc($operador);


$query_cert = sprintf("SELECT * FROM certificado WHERE idinforme =(select idinforme from informe where idplan_auditoria=(select idplan_auditoria from plan_auditoria where idsolicitud=%s)) ",GetSQLValueString( $_POST["idsolicitud"], "int"));
$cert= mysql_query($query_cert, $inforgan_pamfa) or die(mysql_error());
$row_cert= mysql_fetch_assoc($cert);

$query_inf = sprintf("SELECT * FROM informe WHERE idinforme=(select idinforme from certificado where idcertificado=%s )", GetSQLValueString( $row_cert['idcertificado'], "int"));
$inf= mysql_query($query_inf, $inforgan_pamfa) or die(mysql_error());
$row_inf= mysql_fetch_assoc($inf);
	}
else {


$query_operador = sprintf("SELECT * FROM operador WHERE idoperador=(select idoperador from solicitud where idsolicitud=(select idsolicitud from plan_auditoria where idplan_auditoria=(select idplan_auditoria from informe where idinforme=(select idinforme from certificado where idcertificado=%s ))))", GetSQLValueString( $_POST["idcertificado"], "int"));
$operador = mysql_query($query_operador, $inforgan_pamfa) or die(mysql_error());
$row_operador= mysql_fetch_assoc($operador);

$query_cert = sprintf("SELECT * FROM certificado WHERE idcertificado =%s ",GetSQLValueString( $_POST["idcertificado"], "int"));
$cert= mysql_query($query_cert, $inforgan_pamfa) or die(mysql_error());
$row_cert= mysql_fetch_assoc($cert);



$query_inf = sprintf("SELECT * FROM informe WHERE idinforme=(select idinforme from certificado where idcertificado=%s )", GetSQLValueString( $_POST["idcertificado"], "int"));
$inf= mysql_query($query_inf, $inforgan_pamfa) or die(mysql_error());
$row_inf= mysql_fetch_assoc($inf);
}
$query_solicitud = sprintf("select *from solicitud where idsolicitud=%s  limit 1", GetSQLValueString($_POST["idsolicitud"], "int"));
$solicitud = mysql_query($query_solicitud, $inforgan_pamfa) or die(mysql_error());
$row_solicitud= mysql_fetch_assoc($solicitud);
?>

<? include('mpdf.php');
$mpdf=new mPDF('','Letter-L', 0, '', 2, 0, 0,0, 0, 0);

$mpdf->WriteHTML('
<table border="0">
  <tr>
  <td width="100">
  <img src="../images/izquierdo.png" width="100%"/>
  </td>
    <td valign="top">
      <table border="0" align="center" >
      <tr>
        <td style="font-size:24px" align="left"><br><b>USUARIO: </b>'.$row_operador['nombre_legal'].'<br></td>
      </tr>
      <tr>
        <td style="font-size:20px" align="left"><b>Dirección: </b>'.$row_operador['direccion'].' '.$row_operador['colonia'].' '.$row_operador['municipio'].' '.$row_operador['estado'].' '.'</td>
      </tr>
      
     
     
      <tr>
        <td style="font-size:20px" align="left"><br><b>Valido desde: </b>'.$row_cert['fecha_inicial_mexcalsup'].'<b>
		 </tr>
		<tr>
		<td style="font-size:20px" align="left"><b>Hasta: </b>'.$row_cert['fecha_final_mexcalsup'].'</td>
		
      </tr>
	  <tr>
		<td style="font-size:20px" align="left"><b>Fecha de impresion: </b>'.$row_cert['fecha_impresion_mexcalsup'].'</td>
		
      </tr>
	  <tr>
	  <td>
	  <table width="100%" cellpadding="5" cellspacing="1"><tr><td colspan="2">
    Pliego de condiciones
    </td></tr><tr><td>
    Alcance
    </td><td>
    Pliego
    </td></tr>');
	
	$query_mex = sprintf("SELECT descripcion FROM mex_cal_sup WHERE idmex_cal_sup=%s  ", GetSQLValueString( $row_solicitud['idmex_alcance'], "int"));
$mex= mysql_query($query_mex, $inforgan_pamfa) or die(mysql_error());
$row_mex= mysql_fetch_assoc($mex);

$query_mexp = sprintf("SELECT descripcion FROM mex_cal_sup WHERE idmex_cal_sup=%s  ", GetSQLValueString( $row_solicitud['idmex_pliego'], "int"));
$mexp= mysql_query($query_mexp, $inforgan_pamfa) or die(mysql_error());
$row_mexp= mysql_fetch_assoc($mexp);
	$mpdf->WriteHTML('
		 <tr>
       	<td>'.$row_mex['descripcion'].'
       	</td>
		<td>'.$row_mexp['descripcion'].'
         </td>');
   	$mpdf->WriteHTML('</tr>
	
	
	  </table>
      
    </td>
	
  </tr>
  <br><br><br>
  <tr>
  
	
	<td>
	<table>
	<tr>
	<td style="font-size:20px" align="left"><b>_______________________________</b>
	</td>
	</tr>
	<tr>
	
	<td style="font-size:20px" align="left"><b>Ing.Marisela Fárias López</b></td>
	<td style="font-size:20px" align="left" width="150" ></td>
	<td style="font-size:20px" align="left">&nbsp;&nbsp;<b>Acreditación</b></td>
	
	</tr>
	<tr>');
	
	$mpdf->WriteHTML('
	<td  style="font-size:20px" align="left"><b>GERENTE GENERAL</b></td>
	<td  style="font-size:20px" align="left" width="150"></td>
	<td  style="font-size:20px" align="left">&nbsp;&nbsp;&nbsp;'.$row_cert['acreditacion_mexcalsup'].'</td>
	
	</tr>
	</table>
	</td>
	</tr>
    </table>
	</td>
	</tr>  
</table>');

$mpdf->Output();
exit();?>