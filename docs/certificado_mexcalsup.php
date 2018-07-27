<?php require_once('../Connections/inforgan_pamfa.php'); ?>
<?php

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

 $query_m = sprintf("SELECT idmex_alcance FROM solicitud_mexcalsup WHERE idsolicitud=%s and idmex_alcance is not null ", GetSQLValueString( $row_solicitud['idsolicitud'], "int"));
            $m= mysql_query($query_m, $inforgan_pamfa) or die(mysql_error());
            $row_m= mysql_fetch_assoc($m);

 $query_m2 = sprintf("SELECT idmex_pliego FROM solicitud_mexcalsup WHERE idsolicitud=%s  and idmex_pliego is not null ", GetSQLValueString( $row_solicitud['idsolicitud'], "int"));
            $m2= mysql_query($query_m2, $inforgan_pamfa) or die(mysql_error());
            $row_m2= mysql_fetch_assoc($m2);
			
			
			  $query_mex = sprintf("SELECT descripcion FROM mex_cal_sup WHERE idmex_cal_sup=%s  ", GetSQLValueString( $row_m['idmex_alcance'], "int"));
            $mex= mysql_query($query_mex, $inforgan_pamfa) or die(mysql_error());
            $row_mex= mysql_fetch_assoc($mex);
            $query_mexp = sprintf("SELECT descripcion FROM mex_cal_sup WHERE idmex_cal_sup=%s  ", GetSQLValueString( $row_m2['idmex_pliego'], "int"));
            $mexp= mysql_query($query_mexp, $inforgan_pamfa) or die(mysql_error());
            $row_mexp= mysql_fetch_assoc($mexp);
			

$objeto_DateTime = date_create_from_format('Y-m-d',$row_cert['fecha_inicial_mexcalsup']);
$fi = date_format($objeto_DateTime, "d/m/Y");

$objeto_DateTime = date_create_from_format('Y-m-d',$row_cert['fecha_final_mexcalsup']);
$fi2 = date_format($objeto_DateTime, "d/m/Y");

$objeto_DateTime = date_create_from_format('Y-m-d',$row_cert['fecha_impresion_mexcalsup']);
$fi3 = date_format($objeto_DateTime, "d/m/Y");
include('mpdf.php');

$mpdf=new mPDF('','Letter', 0, '', 0, 0, 0,0, 0, 0);
if(isset($_POST['cliente']))
{
$mpdf->SetWatermarkImage('../images/borrador.png');

$mpdf->showWatermarkImage = true;
}
$mpdf->WriteHTML('
<table  width="100%" height="1000px">
  <tr  >
    <td width="70%" height="1053"  style="background: #FFF url(../images/izquierdo.png) no-repeat left top" >
        &nbsp;
    </td>
    <td valign="top">
      <table >
        <tr >
          <td colspan="2"  height="110" style="background: #FFF url(../images/top.png) no-repeat left top">
          
          </td>
          
        </tr>
        <tr  >
		<td height="50" colspan="2"></td></tr><tr >
		
		
		<td colspan="2" ><table ><tr>
		<td align="right" width="500" ></td>
		<td align="CENTER" width="180" style="border: 5px; border: solid; border-color: RED;" bgcolor="#FFFFFF" ><font color="RED" face="Comic Sans MS,arial"><h2 align="center">num</h2></font></td>
		<td align="CENTER" width="230"  style="border-width: 5px;border: solid; border-color: RED;" bgcolor="RED"><font color="white" face="Comic Sans MS,arial"><h2 align="center">Folio</h2></font></td></tr>
		</table></td></tr>
		<tr><td height="45" colspan="2"></td></tr>
		<tr>
          <td align="right" colspan="2" style="border-bottom:5px solid red">
            <b style="font-size:24px">Usuario &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b> 
          </td>
		  
		  </tr>
		  <tr><td height="20" colspan="2"></td></tr>
		  <tr>
          <td align="center" colspan="2" style=" font-size:24px; color:gray;"> '.$row_operador['nombre_legal'].'</td>
        </tr>
		
		<tr><td height="50" colspan="2"></td></tr>
		<tr>
          <td align="right" colspan="2" style="border-bottom:5px solid red">
            <b style="font-size:24px">Dirección &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b> 
          </td>
		  
		  </tr>
		  <tr><td height="15" colspan="2"></td></tr>
		  <tr>
          <td align="center" colspan="2" style=" font-size:24px; color:gray;"> '.$row_operador['direccion'].' '.$row_operador['colonia'].' '.$row_operador['municipio'].' '.$row_operador['estado'].' '.'</td>
        </tr>
        <tr>
		<td height="50" colspan="2"></td></tr><tr >
		
		
		<td colspan="2" ><table ><tr>
		<td align="right" width="375" ></td>
		<td align="CENTER" width="300"  style="border-width: 5px;border: solid; border-color: RED;" bgcolor="RED"><font color="white" face="Comic Sans MS,arial"><h2 align="center">Fecha de impresión</h2></font></td>
		<td align="CENTER" width="200" style="border: 5px; border: solid; border-color: RED;" bgcolor="#FFFFFF" ><font  face="Comic Sans MS,arial"><h2 align="center">'.$fi3.'</h2></font></td>
		<td width="35" style="border-width: 5px;border: solid  red" bgcolor="RED"></td>
		</tr>
		</table></td></tr>
		
		<tr>
		<td height="50" colspan="2"></td></tr><tr >
		
		
		<td colspan="2" ><table ><tr>
		<td align="right" width="190" ></td>
		<td align="CENTER" width="170"  style="border-width: 5px;border: solid; border-color: RED;" bgcolor="RED"><font color="white" face="Comic Sans MS,arial"><h2 align="center">Valido desde</h2></font></td>
		<td align="CENTER" width="200" style="border: 5px; border: solid; border-color: RED;" bgcolor="#FFFFFF" ><font face="Comic Sans MS,arial"><h2 align="center">'.$fi.'</h2></font></td>
		
		<td align="CENTER" width="120"  style="border-width: 5px;border: solid; border-color: RED;" bgcolor="RED"><font color="white" face="Comic Sans MS,arial"><h2 align="center">Hasta </h2></font></td>
		<td align="CENTER" width="200" style="border: 5px; border: solid; border-color: RED;" bgcolor="#FFFFFF" ><font  face="Comic Sans MS,arial"><h2 align="center">'.$fi2.'</h2></font></td>
		
		<td width="30" style="border-width: 5px;border: solid  red" bgcolor="RED"></td>
		</tr>
		</table></td></tr>
		
        <tr><td height="45" colspan="2"></td></tr>
		<tr>
          <td align="right" colspan="2" style="border-bottom:5px solid red">
            <b style="font-size:24px">Pliego de condiciones &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b> 
          </td>
		  
		  </tr>
		  <tr><td height="20" colspan="2"></td></tr>
		 
        
        <tr>
        <td  align="center" ><font  face="Comic Sans MS,arial"><h2 align="center">Alcance:</h2></font></td>
		<td ><font  face="Comic Sans MS,arial"><h2 align="center" color=gray>
              '.$row_mex['descripcion'].'</h2></font>
        </td>
       
        </tr> 
        <tr>
          <td  align="center" ><font  face="Comic Sans MS,arial"><h2 align="center">
          Pliego:</h2></font></td><td><font  face="Comic Sans MS,arial"><h2 align="center" color=gray>'.$row_mexp['descripcion'].' 
         </h2></font></td>
         
        </tr>
		 <tr>
		 <td  height="200" colspan="2"></td></tr>
        <tr style="">
		 <td align="right" width="200" ></td>
         <td align="right" width="130"  style="border-bottom:5px solid red">
          </td>
        </tr>
        <tr style="">
		<td align="right" width="200" ></td>
         <td align="center" width="130"  >
         <font  face="Comic Sans MS,arial" size="+6"  color=#088A4B><strong> Ing. Marisela Farías López </strong></font>
          </td>
          
        </tr>
        <tr style="">
          <td align="right" width="200" ></td>
         <td align="right" width="50"  >
         <font  face="Comic Sans MS,arial" size="+6"  color=#088A4B><strong> Gerente General </strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</font>
          </td>
          
        </tr>
		
		<tr>
		 <td  height="70" colspan="2"></td></tr>
        <tr>
		<td colspan="2"><table><tr>
        <td align="right" width="320" ></td>
         <td align="center" width="140"  ><font  face="Comic Sans MS,arial" size="+6" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Verificación y certificación PAMFA A.C</strong> </font></td></tr>
		 </table>
		 </td></tr>
		 <tr><td colspan="2"><table>
		 <tr><td align="right" width="350" ></td>
        <td align="right" width="150"   ><font  face="Comic Sans MS,arial"  color=#088A4B size="+5"><strong>José Zamora #48 Col. Emiliano Zapata, Uruapan, Michoacán. </strong></font></td></tr></table></td></tr>
		 <tr><td colspan="2"><table>
		
		
		
		 <tr><td align="right" width="75" ></td> 
		 <td align="right" width="300"   ><font  face="Comic Sans MS,arial"  color=#088A4B size="+5"><strong>Tel. (452) 182 12 91 Cel. 452 128 51 46 / certificacion@pamfa.com.mx  www.pamfa.com.mx</strong></font>
        </td>
        </tr></table></td></tr>
      </table>
    </td>
  </tr>
</table>
');
$mpdf->Output();
exit();?>