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

$query_cert_productos = sprintf("SELECT * FROM cert_producto WHERE idcertificado=%s  ", GetSQLValueString( $row_cert['idcertificado'], "int"));
$cert_productos= mysql_query($query_cert_productos, $inforgan_pamfa) or die(mysql_error());

$query_cert_productos2 = sprintf("SELECT * FROM cert_producto WHERE idcertificado=(select idcertificado from certificado where idcertificado=%s and certificado_tipo2=1 and coc is not null ) ", GetSQLValueString( $row_cert['idcertificado'], "int"));
$cert_productos2= mysql_query($query_cert_productos2, $inforgan_pamfa) or die(mysql_error());

$query_inf = sprintf("SELECT * FROM informe WHERE idinforme=(select idinforme from certificado where idcertificado=%s )", GetSQLValueString( $row_cert['idcertificado'], "int"));
$inf= mysql_query($query_inf, $inforgan_pamfa) or die(mysql_error());
$row_inf= mysql_fetch_assoc($inf);
  }
else{

$query_operador = sprintf("SELECT * FROM operador WHERE idoperador=(select idoperador from solicitud where idsolicitud=(select idsolicitud from plan_auditoria where idplan_auditoria=(select idplan_auditoria from informe where idinforme=(select idinforme from certificado where idcertificado=%s ))))", GetSQLValueString( $_POST["idcertificado"], "int"));
$operador = mysql_query($query_operador, $inforgan_pamfa) or die(mysql_error());
$row_operador= mysql_fetch_assoc($operador);
$query_cert = sprintf("SELECT * FROM certificado WHERE idcertificado =%s ",GetSQLValueString( $_POST["idcertificado"], "int"));
$cert= mysql_query($query_cert, $inforgan_pamfa) or die(mysql_error());
$row_cert= mysql_fetch_assoc($cert);
$query_cert_productos = sprintf("SELECT * FROM cert_producto WHERE idcertificado=%s  ", GetSQLValueString( $_POST['idcertificado'], "int"));
$cert_productos= mysql_query($query_cert_productos, $inforgan_pamfa) or die(mysql_error());

$query_cert_productos2 = sprintf("SELECT * FROM cert_producto WHERE idcertificado=(select idcertificado from certificado where idcertificado=%s and certificado_tipo2=1 and coc is not null ) ", GetSQLValueString( $_POST['idcertificado'], "int"));
$cert_productos2= mysql_query($query_cert_productos2, $inforgan_pamfa) or die(mysql_error());

$query_inf = sprintf("SELECT * FROM informe WHERE idinforme=(select idinforme from certificado where idcertificado=%s )", GetSQLValueString( $_POST["idcertificado"], "int"));
$inf= mysql_query($query_inf, $inforgan_pamfa) or die(mysql_error());
$row_inf= mysql_fetch_assoc($inf);
}


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
    <td rowspan="2">
      <img src="../images/izquierdo2.png" width="100%"/>
    </td>
    <td valign="top">
      <table>
        <tr>
        <br>
           <td colspan="2" style="font-size:28px" align="left"><b>USUARIO: </b><span style="font-size:28px; color:gray;">'.$row_operador['nombre_legal'].'</span></td>  
            <td rowspan="2" align="right"> <img src="../images/Globalgap.jpg"/ width="150px" height="150px"></td>   
        </tr>
        <tr>
           <td colspan="3" style="font-size:20px" align="left" vertical-align:top;><b>Dirección: </b><span style="color:gray;">'.$row_operador['direccion'].' '.$row_operador['colonia'].' '.$row_operador['municipio'].' '.$row_operador['estado'].' '.'</span></td>

        </tr>
            <tr> 
              <td colspan="3" style="font-size:20px" align="left"><b>Versión: </b><span style="font-size:20px; color:gray;">'.$row_cert['version_coc'].'</span></td>
            </tr>
            <tr>
              <td colspan="3" style="font-size:20px" align="left"><b>Fecha de decision de certificación: </b><span style="font-size:20px; color:gray;">'.date('d/m/y',$row_inf['fecha_dictamen_coc']).'</span></td>
            </tr>
            <tr>
              <td  colspan="3" style="font-size:20px" align="left"><br><b>Valido desde: </b>'.$row_cert['fecha_inicial_coc'].'<b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Hasta: </b>'.$row_cert['fecha_final_coc'].'</td>
            </tr>
        <tr>
        <td height="50px" colspan="4">
        </td>
        </tr>
            <tr>
              <td colspan="3">
              <table width="100%" cellspacing="1">
              <tr style="background-color:#3aa749;">
              <td style="text-align:center;" width="150px">
              <b>Producto</b>
              </td><td style="text-align:center;" width="150px">
              <b>Nombre Cientifico</b>
              </td><td style="text-align:center;" width="150px">
              <b>Coc</b>
              </td><td style="text-align:center;" width="150px">
              <b>Número PAMFA</b>
              </td>
              <td style="text-align:center;"width="150px">
              <b>Producción paralela</b>
              </td></tr>');

            while($row_cert_productos= mysql_fetch_assoc($cert_productos))
            {$mpdf->WriteHTML('
              <tr style="background-color:#b4db9b">
              <td>'.$row_cert_productos['producto'].'
              </td>
              <td>'.$row_cert_productos['nombre_cientifico'].'
              </td>
              <td>'.$row_cert_productos['coc'].'
              </td>
              <td>'. $row_cert_productos['pamfa'].'
              </td>              
              <td>'.$row_cert_productos['prod_paralela'].'
              </td></tr>');
    
    
            } $mpdf->WriteHTML('
              </table>
              </td>
              </tr>

            <tr>
              <td  colspan="3" align="right">
              <img src="../images/logo_ema.jpg" width="90px" height="90px">            
              </td>
            </tr>

            <tr>
                <td colspan="3" style="font-size:20px" align="left"><b>_______________________________</b></td>
            </tr>
            <tr>
                <td style="font-size:20px;" align="left"><b>Ing.Marisela Fárias López</b></td>
                <td style="font-size:20px;" align="center"><b>Fecha de impresión</b></td>
                <td style="font-size:20px;" align="center"><b>Acreditación</b></td>
            </tr>
            <tr>
                <td style="font-size:20px;" align="center"><b>GERENTE GENERAL</b></td>
                <td style="font-size:20px; color:gray" align="center">'.$row_cert['fecha_impresion_coc'].'</td>
                <td style="font-size:20px; color:gray" align="center">'.$row_cert['acreditacion_coc'].'</td>
            </tr>
            <tr>
              <td height="40px">
              </td>
            </tr>
            <tr>
              <td colspan="3">
                    <span> VERIFICACIÓN Y CERTIFICACIÓN PAMFA A.C </span><BR><span style="font-size:12px"> Calle José Zamora #48 Col. Emiliano Zapata, Uruapam, Michoacán. Tel. 452 502 0849 Cel. 452 128 51 46 / certificacion@pamfa.com.mx</span>
              </td>
            </tr>
            </table>
            </td>
            </tr>
</table>');
                    //Anexo
$mpdf->AddPage();
$mpdf->WriteHTML('<br>
<table border="0" >
  <tr>
  <td width="100">
  <img src="../images/izquierdo.png" width="100%"/>
  </td>
    <td valign="top">
      <table border="0"  >
      <tr>
        <td style="font-size:24px" align="left"><br><br></td>
      </tr>
      <tr>
        <td style="font-size:20px" align="left"></td>
      </tr>
      <tr>
        <td style="font-size:20px" align="left"><br></td>
      </tr>
      <tr> 
        <td style="font-size:20px" align="left"></td>
      </tr>
      <tr>
        <td style="font-size:20px" align="left"></td>
      </tr>
      <tr>
        <td style="font-size:20px" align="left"><br><b>Anexo: </b></td>
    
      </tr>
    <tr>
      <td>&nbsp; &nbsp;</td>
      <td align="center">
      <table width="100%" cellpadding="15" cellspacing="2" align="center">
      <tr style="background-color:#3aa749">
      <td style="text-align:center" width="350px" colspan="3">
      <b style="font-size:18px">Producto</b>
      </td><td style="text-align:center" width="350px" colspan="3">
       <b style="font-size:18px"> Pais Destino</b>
      </tr>');

  
  
while($row_cert_productos2= mysql_fetch_assoc($cert_productos2))
  { 
    $mpdf->WriteHTML('
     <tr style="background-color:#b4db9b">
        <td style="text-align:center; font-size:16px" colspan="3">1'.$row_cert_productos2['producto'].'
        </td>
    
          <td style="text-align:center; font-size:16px" colspan="3">2'.$row_cert_productos2['destino'].'
          </td></tr>');
    
    
  }
  $mpdf->WriteHTML('
    
  
    </table>
      
    </td>
  
  </tr>
  
    </table>
  </td>
  </tr>
</table>');
$mpdf->Output();
exit();?>            