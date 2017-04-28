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
<table border="0">
  <tr>
  <td width="100">
  <img src="../images/izquierdo2.png" width="100%"/>
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
        <td style="font-size:20px" align="left"><br><b>Versión: </b>'.$row_cert['version_coc'].'</br></td>
      </tr>
      <tr>
        <td style="font-size:20px" align="left"><b>Fecha de decision de certificación: </b>'.date('d/m/y',$row_inf['fecha_dictamen_coc']).'</td>
      </tr>
      <tr>
        <td style="font-size:20px" align="left"><br><b>Valido desde: </b>'.$row_cert['fecha_inicial_coc'].'<b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Hasta: </b>'.$row_cert['fecha_final_coc'].'</td>
		
      </tr>
	  <tr>
	  <td>
	  <table width="100%" cellpadding="5" cellspacing="1"><tr><td>
    Producto
    </td><td>
    Nombre Cientifico
    </td><td>
    Coc
    </td><td>
    Número PAMFA
    </td><td>
    Producción paralela
    </td></tr>');
	
	

	 while($row_cert_productos= mysql_fetch_assoc($cert_productos))
	{$mpdf->WriteHTML('
		 <tr>
       	<td>'.$row_cert_productos['producto'].'
       	</td>
		<td>'.$row_cert_productos['nombre_cientifico'].'
         </td>
         <td>'.$row_cert_productos['coc'].'
         </td>
         <td>'. $row_cert_productos['pamfa'].'
          </td>
        
          <td>'.$row_cert_productos['prod_paralela'].'
          </td>');
    
		
	}
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
	<td style="font-size:20px" align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Fecha de impresión</b></td>
	<td style="font-size:20px" align="left">&nbsp;&nbsp;<b>Acreditación</b></td>
	
	</tr>
	<tr>');
	
	$mpdf->WriteHTML('
	<td colspan="1" style="font-size:20px" align="left"><b>GERENTE GENERAL</b></td>
	<td colspan="1" style="font-size:20px" align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$row_cert['fecha_impresion_coc'].'</td>
	<td colspan="1" style="font-size:20px" align="left">&nbsp;&nbsp;&nbsp;'.$row_cert['acreditacion_coc'].'</td>
	
	</tr>
	</table>
	</td>
	</tr>
    </table>
	</td>
	</tr>  
</table>');
$mpdf->AddPage();
$mpdf->WriteHTML('<br><br><br><br><br>
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
	  <td></td>
	  <td>
	  <table width="100%" cellpadding="15" cellspacing="1" align="center"><tr><td>
    Producto
    </td><td>
   Destino
    </td></tr>');
	
	

	 while($row_cert_productos2= mysql_fetch_assoc($cert_productos2))
	{
		

	
		
		$mpdf->WriteHTML('
		 <tr>
       	<td>'.$row_cert_productos2['producto'].'
       	</td>
		
          <td>'.$row_cert_productos2['destino'].'
          </td>');
    
		
	}
	$mpdf->WriteHTML('</tr>
	
	
	  </table>
      
    </td>
	
  </tr>
  
    </table>
	</td>
	</tr>  
</table>');
$mpdf->Output();
exit();?>