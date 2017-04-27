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

$query_cert_productos2 = sprintf("SELECT * FROM cert_producto WHERE idcertificado=(select idcertificado from certificado where idcertificado=%s and certificado_tipo1=1  ) ", GetSQLValueString( $row_cert['idcertificado'], "int"));
$cert_productos2= mysql_query($query_cert_productos2, $inforgan_pamfa) or die(mysql_error());

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

$query_cert_productos = sprintf("SELECT * FROM cert_producto WHERE idcertificado=%s  ", GetSQLValueString( $_POST['idcertificado'], "int"));
$cert_productos= mysql_query($query_cert_productos, $inforgan_pamfa) or die(mysql_error());

$query_cert_productos2 = sprintf("SELECT * FROM cert_producto WHERE idcertificado=(select idcertificado from certificado where idcertificado=%s and certificado_tipo2=1 and coc is not null ) ", GetSQLValueString( $_POST['idcertificado'], "int"));
$cert_productos2= mysql_query($query_cert_productos2, $inforgan_pamfa) or die(mysql_error());

$query_inf = sprintf("SELECT * FROM informe WHERE idinforme=(select idinforme from certificado where idcertificado=%s )", GetSQLValueString( $_POST["idcertificado"], "int"));
$inf= mysql_query($query_inf, $inforgan_pamfa) or die(mysql_error());
$row_inf= mysql_fetch_assoc($inf);
}


$query_solicitud_esq = sprintf("select *from esquemas where idesquema=(SELECT esq_tipo1_op1 FROM solicitud_esquema WHERE idsolicitud=%s order by idsolicitud_esquema asc limit 1)", GetSQLValueString($_POST["idsolicitud"], "int"));
$solicitud_esq = mysql_query($query_solicitud_esq, $inforgan_pamfa) or die(mysql_error());
$row_solicitud_esq= mysql_fetch_assoc($solicitud_esq);

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
  <img src="../images/izquierdo.png" width="100%"/>
  </td>
    <td valign="top">
      <table border="0" align="center" >
      <tr>
        <td style="font-size:28px" align="left"><br><b></b><br></td>
      </tr>

      <tr>
        
        <td style="font-size:28px" align="left"><br><b>USUARIO: </b><span style="font-size:28px; color:gray;">'.$row_operador['nombre_legal'].'</span></td>
                <td rowspan="2"> <img src="../images/Globalgap.jpg" width="15%"/></td>
      </tr>
      <tr>
        <td style="font-size:20px" align="left" vertical-align:top;><b>Dirección: </b><span style="color:gray;">'.$row_operador['direccion'].' '.$row_operador['colonia'].' '.$row_operador['municipio'].' '.$row_operador['estado'].' '.'</span></td>
        <td></td>
      </tr>
      <tr>
        <td style="font-size:20px" align="left"><br><b>Opción: </b>');
	  if($row_solicitud_esq['esquema']!=NULL){ 
	  
	   $mpdf->WriteHTML('<span style="font-size:20px; color:gray;">1  '. $row_solicitud_esq['esquema'].'</span>'); }else {  $mpdf->WriteHTML('<span style="font-size:20px; color:gray;">2 Grupo de productores</span>');}
	   $mpdf->WriteHTML('</td>
      </tr>
      <tr> 
        <td style="font-size:20px" align="left"><b>Versión: </b><span style="font-size:20px; color:gray;">'.$row_cert['version_ifa'].'</span></td>
      </tr>
      <tr>
        <td style="font-size:20px" align="left"><b>Fecha de decision de certificación: </b><span style="font-size:20px; color:gray;">'.date('d/m/y',$row_inf['fecha_dictamen_ifa']).'</span></td>
      </tr>
      <tr>
        <td style="font-size:20px" align="left"><br><b>Valido desde: </b>'.$row_cert['fecha_inicial_ifa'].'<b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Hasta: </b>'.$row_cert['fecha_final_ifa'].'</td>
      </tr>
      <tr>
        <td>
          <br><br/>
        </td>
      </tr>
	  <tr>
	  <td colspan="2">
	  <table width="100%" cellpadding="5" cellspacing="1">
    <tr style="background-color:#3aa749;"><td style="text-align:center;">
    Producto
    </td><td>
    Nombre Cientifico
    </td><td>
    GGN
    </td><td>
    Número PAMFA
    </td><td>
    Centro de manipulación
    </td><td>
    Cosecha excluida
    </td><td>
    Numero de emplazamientos
    </td><td>
    Producción paralela
    </td></tr>');
	
	

	 while($row_cert_productos= mysql_fetch_assoc($cert_productos))
	{$mpdf->WriteHTML('
		 <tr style="background-color:#73bb44;">
       	<td>'.$row_cert_productos['producto'].'
       	</td>
		<td>'.$row_cert_productos['nombre_cientifico'].'
         </td>
         <td>'.$row_cert_productos['ggn'].'
         </td>
         <td>'. $row_cert_productos['pamfa'].'
          </td>
          <td>'.$row_cert_productos['centro_manipulacion'].'
          </td>
          <td>'.$row_cert_productos['cosecha_excluida'].'
          </td>
          <td>'.$row_cert_productos['emplazamientos'].'
          </td>
          <td>'.$row_cert_productos['prod_paralela'].'
          </td>');
	}
	$mpdf->WriteHTML('</tr>
	
	
	  </table>
      
    </td>
  </tr>


  <tr>
  
	
	<td>
    	<table>
    	<tr>
    	<td style="font-size:20px" align="left"><b>_______________________________</b>
    	</td>
      <td align="right">uno</td>
      <td align="right">dos</td>
      <td colspan="2" align="right"> tres </td>
    	</tr>
    	<tr>
    	   <td style="font-size:20px" align="left"><b>Ing.Marisela Fárias López</b></td>
    	   <td style="font-size:20px" align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Fecha de impresión</b></td>
    	   <td style="font-size:20px" align="left">&nbsp;&nbsp;<b>Acreditación</b></td>
    	</tr>
    	<tr>');
    	
    	$mpdf->WriteHTML('
    	<td style="font-size:20px" align="left"><b>GERENTE GENERAL</b></td>
    	<td style="font-size:20px" align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$row_cert['fecha_impresion_ifa'].'</td>
    	<td style="font-size:20px" align="left">&nbsp;&nbsp;&nbsp;'.$row_cert['acreditacion_ifa'].'</td>
    	
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
    Emplazamientos
    </td><td>
    Superficie
    </td>
	<td>
    Ubicación
    </td></tr>');
	
	

	 while($row_cert_productos2= mysql_fetch_assoc($cert_productos2))
	{
		$query_cultivos = sprintf("SELECT superficie,ubicacion_unidad FROM cultivos WHERE idcultivos=%s limit 1 ", GetSQLValueString( $row_cert_productos2['idcultivo'], "int"));
$cultivos= mysql_query($query_cultivos, $inforgan_pamfa) or die(mysql_error());
$row_cultivos= mysql_fetch_assoc($cultivos);

	
		
		$mpdf->WriteHTML('
		 <tr>
       	<td>'.$row_cert_productos2['producto'].'
       	</td>
		
          <td>'.$row_cert_productos2['emplazamientos'].'
          </td>
         
		  <td>'.$row_cultivos['superficie'].'
          </td>
		  <td>'.$row_cultivos['ubicacion_unidad'].'
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