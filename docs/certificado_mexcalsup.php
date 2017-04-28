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
if(isset($_POST['cliente']))
{
$mpdf->SetWatermarkImage('../images/borrador.png');

$mpdf->showWatermarkImage = true;
}
$mpdf->WriteHTML('
<table>
  <tr>
    <td>
        <img src="../images/izquierdo.png" width="100%"/>
    </td>
    <td valign="top">
      <table>
        <tr style="">
          <td height="80px">
          
          </td>
          <td> 
          </td>
        </tr>
        <tr style="">
          <td width="640px">
            <b style="font-size:24px">Usuario:</b> <span style=" font-size:24px; color:gray;"> '.$row_operador['nombre_legal'].'</span>
          </td>
          <td rowspan="3" width="140px" align="center" valign="top"> <img src="../images/mexico_calidadsuprema.png" width="150px" height="150px"/>
        </tr>
        <tr style="">
          <td  height="80px" valign="top">
          <b style="font-size:24px;">Dirección:</b><span style=" font-size:24px; color:gray;">'.$row_operador['direccion'].' '.$row_operador['colonia'].' '.$row_operador['municipio'].' '.$row_operador['estado'].' '.'</span>
          </td>
          </td>
        </tr>
        <tr style="">
          <td height="60px">
          <b style="font-size:20px">Valido desde:</b>'.$row_cert['fecha_inicial_mexcalsup'].'
          </td>
        </tr>
        <tr style="">
          <td height="60px">
          <b style="font-size:20px">Valido Hasta: </b>'.$row_cert['fecha_final_mexcalsup'].'
          </td>
          <td>
          </td>
        </tr>
        <tr style="">
          <td height="60px">
          <b style="font-size:20px">Fecha de impresión:</b>'.$row_cert['fecha_impresion_mexcalsup'].'
          </td>
          <td> 
          </td>
        </tr>
        <tr style="">
          <td height="40px" align="center">
          <b style="font-size:20px">Pliego de condiciones:
          </td>
          <td> 
          </td>
        </tr>
        <tr>
        <td align="center" height="80px" valign="top">
          <span style="font-size:20px" valign="top">Alcance:</span>');  
            $query_mex = sprintf("SELECT descripcion FROM mex_cal_sup WHERE idmex_cal_sup=%s  ", GetSQLValueString( $row_solicitud['idmex_alcance'], "int"));
            $mex= mysql_query($query_mex, $inforgan_pamfa) or die(mysql_error());
            $row_mex= mysql_fetch_assoc($mex);
            $query_mexp = sprintf("SELECT descripcion FROM mex_cal_sup WHERE idmex_cal_sup=%s  ", GetSQLValueString( $row_solicitud['idmex_pliego'], "int"));
            $mexp= mysql_query($query_mexp, $inforgan_pamfa) or die(mysql_error());
            $row_mexp= mysql_fetch_assoc($mexp);
$mpdf->WriteHTML('
              <span style="font-size:18px; color:gray">'.$row_mex['descripcion'].'</span>
        </td>
        <td></td>
        </tr> 
        <tr>
          <td align="center" height="80px" valign="top">
          <span style="font-size:20px">Pliego:</span><span style="font-size:18px; color:gray">'.$row_mexp['descripcion'].'</span>  
          </td>
          <td rowspan="2">  
            <img src="../images/logo_ema.jpg" width="150px" height="150px">            
          </td>
        </tr>
        <tr style="">
          <td valign="bottom">
          <b style="font-size:20px">__________________________________________________________</b>
          </td>
        </tr>
        <tr style="">
          <td>
          <b style="font-size:24px"> Ing. Marisela Farías López</b>
          </td>
          <td> 
          <b style="font-size:24px">Acreditación:</b>
          </td>
        </tr>
        <tr style="">
          <td>
          <b style="font-size:24px">Gerente General</b>
          </td>
          <td> 
          </td>
        </tr>
        <tr>
        <td colspan="2">
                    <span> VERIFICACIÓN Y CERTIFICACIÓN PAMFA A.C </span><BR><span style="font-size:12px"> Calle José Zamora #48 Col. Emiliano Zapata, Uruapam, Michoacán. Tel. 452 502 0849 Cel. 452 128 51 46 / certificacion@pamfa.com.mx</span>
        </td>
        </tr>
      </table>
    </td>
  </tr>
</table>
');
$mpdf->Output();
exit();?>