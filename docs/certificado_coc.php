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


  $query_sol_esq = "SELECT * FROM solicitud_esquema where idsolicitud='".$_POST['idsolicitud']."'";
$sol_esq = mysql_query($query_sol_esq, $inforgan_pamfa) or die(mysql_error());
$row_sol_esq= mysql_fetch_assoc($sol_esq);

$query_cultivos = "SELECT * FROM cultivos where idsolicitud='".$_POST['idsolicitud']."'";
$cultivos = mysql_query($query_cultivos, $inforgan_pamfa) or die(mysql_error());

  
  


$query_solicitud_esq = sprintf("select *from esquemas where idesquema=(SELECT esq_tipo1_op1 FROM solicitud_esquema WHERE idsolicitud=%s order by idsolicitud_esquema asc limit 1)", GetSQLValueString($row_solicitud["idsolicitud"], "int"));
$solicitud_esq = mysql_query($query_solicitud_esq, $inforgan_pamfa) or die(mysql_error());
$row_solicitud_esq= mysql_fetch_assoc($solicitud_esq);




$query_procesadora = sprintf("SELECT * FROM procesadora WHERE idsolicitud=%s ", GetSQLValueString( $_POST['idsolicitud'], "int"));
$procesadora = mysql_query($query_procesadora, $inforgan_pamfa) or die(mysql_error());
$row_procesadora= mysql_fetch_assoc($procesadora);



$query_alcance = sprintf("SELECT descripcion FROM mex_cal_sup WHERE idmex_cal_sup=%s ", GetSQLValueString( $row_solicitud["idmex_alcance"], "int"));
$alcance = mysql_query($query_alcance, $inforgan_pamfa) or die(mysql_error());
$row_alcance= mysql_fetch_assoc($alcance);

$query_inf = sprintf("SELECT * FROM informe WHERE idinforme=%s ", GetSQLValueString( $_POST["idinforme"], "int"));
$inf= mysql_query($query_inf, $inforgan_pamfa) or die(mysql_error());
$row_inf= mysql_fetch_assoc($inf);

$query_plan_auditoria = sprintf("SELECT * FROM plan_auditoria WHERE idsolicitud=%s ", GetSQLValueString( $_POST['idsolicitud'], "int"));
$plan_auditoria = mysql_query($query_plan_auditoria, $inforgan_pamfa) or die(mysql_error());
$row_plan_aud= mysql_fetch_assoc($plan_auditoria);


$query_cert = sprintf("SELECT * FROM certificado WHERE certificado_tipo2=1 and idinforme=%s ",GetSQLValueString( $_POST['idinforme'], "int"));
$cert= mysql_query($query_cert, $inforgan_pamfa) or die(mysql_error());
$row_cert= mysql_fetch_assoc($cert);
include('mpdf.php');

$mpdf=new mPDF('','Letter', 0, '', 0, 0, 0,0, 0, 0);
if(isset($_POST['cliente']))
{
$mpdf->SetWatermarkImage('../images/borrador.png');

$mpdf->showWatermarkImage = true;
}
$mpdf->WriteHTML('
<table  width="100%" height="1000px" >
  <tr  >
    <td width="29%" height="1053"  style="background: #FFF url(../images/izquierdo_coc.png) no-repeat left top" >
        &nbsp;
    </td>
    <td valign="top">
      <table >
        <tr >
          <td colspan="2" width="1100" height="200" style="background: #FFF url(../images/top_coc.png) no-repeat left top">
          
          </td>
		  
		  
          
        </tr>
        <tr  >
		
		
		
		<td colspan="2" ><table ><tr>
		<td align="right" width="670" ></td>
		<td align="CENTER" width="180" style="border: 5px; border: solid; border-color:#64ad43;" bgcolor="#64ad43" ><font color="White" face="Comic Sans MS,arial"><h2 align="center">Número CoC</h2></font></td>
		<td align="CENTER" width="230"  style="border-width: 5px;border: solid; border-color: #64ad43;" bgcolor="white"><font color="red" face="Comic Sans MS,arial"><h2 align="center">'. $row_plan_aud['num_coc'].'</h2></font></td>
		<td width="12" style="border-width: 5px;border: solid  #64ad43" bgcolor="#64ad43"></td>
		</tr>
		</table></td></tr>
		
		
		<tr><td height="10" colspan="2"></td></tr>
		<tr  >
		
		
		
		<td colspan="2" ><table ><tr>
		<td align="right" width="793" ></td>
		<td align="CENTER" width="120" style="border: 5px; border: solid; border-color:#64ad43;" bgcolor="#64ad43" ><font color="White" face="Comic Sans MS,arial"><h2 align="center">Registro</h2></font></td>
		<td align="CENTER" width="170"  style="border-width: 5px;border: solid; border-color: #64ad43;" bgcolor="white"><font color="red" face="Comic Sans MS,arial"><h2 align="center">'.$row_cert['registro_coc'].'</h2></font></td>
		<td width="12" style="border-width: 5px;border: solid  #64ad43" bgcolor="#64ad43"></td>
		</tr>
		</table></td></tr>
		
		<tr><td height="15" colspan="2"></td></tr>
		<tr>
		<td align="right" colspan="1" ></td>

          <td align="right" width="600"  style="border-bottom:5px solid #458d3b">
            <b style="font-size:24px "><font color="#458d3b">Emitido a favor de: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b> </font>
          </td>
		  
		  </tr>
		  <tr><td height="20" colspan="2"></td></tr>
		  <tr>
		  <td align="right" colspan="1" ></td>
          <td align="center" colspan="1" style=" font-size:24px; color:gray;"> '.$row_operador['nombre_legal'].'</td>
        </tr>
		
		<tr><td height="25" colspan="2"></td></tr>
		<tr>
		<td align="right" colspan="1" ></td>
          <td align="right" colspan="1" style="border-bottom:5px solid #458d3b">
            <b style="font-size:24px"> <font color="#458d3b">Localización &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></font> 
          </td>
		  
		  </tr>
		  <tr><td height="15" colspan="2"></td></tr>
		  <tr>
		  <td align="right" colspan="1" ></td>
          <td align="center" colspan="1" style=" font-size:24px; color:gray;"> '.$row_operador['direccion'].' '.$row_operador['colonia'].' '.$row_operador['municipio'].' '.$row_operador['estado'].' '.'</td>
        </tr>
        <tr>
		<td height="40" colspan="2"></td></tr><tr >
		
		
		<td colspan="2" ><table ><tr>
		<td align="right" width="560" ></td>
		<td align="CENTER" width="300"  style="border-width: 5px;border: solid; border-color: #64ad43;" bgcolor="#64ad43"><font color="white" face="Comic Sans MS,arial"><h2 align="center">Fecha de Emisión</h2></font></td>
		<td align="CENTER" width="200" style="border: 5px; border: solid; border-color: #64ad43;" bgcolor="#FFFFFF" ><font c face="Comic Sans MS,arial"><h2 align="center">'.$fi3.'</h2></font></td>
		<td width="35" style="border-width: 5px;border: solid #64ad43" bgcolor="#64ad43"></td>
		</tr>
		</table></td></tr>
		
		<tr>
		<td height="10" colspan="2"></td></tr><tr >
		
		
		<td colspan="2" ><table ><tr>
		<td align="right" width="330" ></td>
		<td align="CENTER" width="200"  style="border-width: 5px;border: solid; border-color: #64ad43;" bgcolor="#64ad43"><font color="white" face="Comic Sans MS,arial"><h2 align="center">Valido a partir de:</h2></font></td>
		<td align="CENTER" width="200" style="border: 5px; border: solid; border-color: #64ad43;" bgcolor="#FFFFFF" ><font c face="Comic Sans MS,arial"><h2 align="center">'.$fi.'</h2></font></td>
		
		<td align="CENTER" width="120"  style="border-width: 5px;border: solid; border-color: #64ad43;" bgcolor="#64ad43"><font color="white" face="Comic Sans MS,arial"><h2 align="center">Hasta </h2></font></td>
		<td align="CENTER" width="200" style="border: 5px; border: solid; border-color: #64ad43RED;" bgcolor="#FFFFFF" ><font  face="Comic Sans MS,arial"><h2 align="center">'.$fi2.'</h2></font></td>
		
		<td width="30" style="border-width: 5px;border: solid  #64ad43" bgcolor="#64ad43"></td>
		</tr>
		</table></td></tr>
		
        <tr><td height="20" colspan="2"></td></tr>
		<tr><td colspan="2"><table><tr>
		<td  align="right" width="80" ></td>
          <td  width="600"  align="justify">
            <font color="#458d3b" face="Comic Sans MS,arial" size="6" >El anexo contiene detalles de la manipulación del producto o de la gestión de las unidades incluidos en el ámbito del certificado. <br><br>El organismo de certificación PAMFA A.C. declara que la empresa cumple la norma.<br><br>Global G.A.P. para cadena de custodia - Puntos de Control y Criterios de Cumplimiento <br>Versión 5.0 -2 julio 2016</font> 
          </td>
		  <td  align="right" width="30" ></td>
		  </tr></table>
		</td></tr>
		<tr>
		<td height="10" colspan="2"></td></tr><tr >
		
		
		<td colspan="2" ><table ><tr>
		<td align="CENTER" width="110"  style="border-width: 5px;border: solid; border-color: #64ad43;" bgcolor="#64ad43"><font color="white" face="Comic Sans MS,arial"><h3 align="center">Ámbito:Cultivos</h3></font></td>
		<td align="CENTER" width="200"  style="border-width: 5px;border: solid; border-color: #64ad43;" bgcolor="#64ad43"><font color="white" face="Comic Sans MS,arial"><h3 align="center">¿Etiquetado del producto?</h3></font></td>
		
				<td align="CENTER" width="200"  style="border-width: 5px;border: solid; border-color: #64ad43;" bgcolor="#64ad43"><font color="white" face="Comic Sans MS,arial"><h4 align="center">¿En el momento de la inspección cuenta con un certificado reconocido por GFSI?</h4></font></td>
				
		<td align="CENTER" width="320"  style="border-width: 5px;border: solid; border-color: #64ad43;" bgcolor="#64ad43"><font color="white" face="Comic Sans MS,arial"><h3 align="center">DESCRIPCIÓN DEL PROCESO</h3></font></td>
		
		
		'); $cont=0; 
		while($row_cultivos= mysql_fetch_assoc($cultivos))
  {
	  $cont++;
    $query_cert_productos = sprintf("SELECT * FROM cert_producto WHERE idcultivo=%s  ", GetSQLValueString( $row_cultivos['idcultivos'], "int"));
$cert_productos= mysql_query($query_cert_productos, $inforgan_pamfa) or die(mysql_error());
$row_cert_productos= mysql_fetch_assoc($cert_productos);
$total_cert_productos = mysql_num_rows($cert_productos);


 $mpdf->WriteHTML('
 
		</tr>
		<tr><td align="center" colspan="1" style="border-right:5px solid #64ad43"><font face="Comic Sans MS,arial">'.$row_cert_productos['producto'].'</font></td>
		<td  align="center" colspan="1" style="border-right:5px solid #64ad43"><font face="Comic Sans MS,arial">'.$row_cert_productos['etiqueta'].'</font></td>
		<td  align="center" colspan="1" style="border-right:5px solid #64ad43"><font face="Comic Sans MS,arial">'.$row_cert_productos['gfsi'].'</font></td>
		<td  align="center" colspan="1" ><font face="Comic Sans MS,arial">'.$row_cert_productos['proceso'].'</font></td>
		</tr>');
		}
		while($cont<38){
 $mpdf->WriteHTML('
 
		<tr><td align="center" colspan="1" style="border-right:5px solid #64ad43"></td><td align="center" colspan="1" style="border-right:5px solid #64ad43"></td><td align="center" colspan="1" style="border-right:5px solid #64ad43"></td><td></td></tr>');
		$cont++;
		}
		$mpdf->WriteHTML('
		
		</table></td></tr>

		  <tr><td height="20" colspan="2"></td></tr>
		 
        
        
        
		 
        <tr style="">
		 <td  width="265"  height="150" rowspan="5" style="background: #FFF url(../images/logo.png) no-repeat left top"></td>
         <td><table><tr>
 <td  width="305"  height="30"></td>
  		
          <td align="right" width="530" style="border-bottom:5px solid #64ad43">
           
          </td>
          
        </tr>
        <tr style="">
		<td  width="300"></td>
         <td align="center" width="520"  >
         <font  face="Comic Sans MS,arial" size="+6"  color=#458d3b><strong> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ing. Marisela Farías López </strong></font>
          </td>
          
        </tr>
        <tr style="">
         <td  width="300"></td>
         <td align="right" width="520"  >
         <font  face="Comic Sans MS,arial" size="+6"  color=#458d3b><strong> Gerente General &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></font>
          </td>
          
        </tr>
		</table>
		</td></tr>
		

		  <tr><td height="20" colspan="2"></td></tr>
        <tr>
		<td colspan="2"><table><tr>
        <td align="right" width="200" ></td>
         <td align="center" width="140"  ><font  face="Comic Sans MS,arial" size="+6" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Verificación y certificación PAMFA A.C</strong> </font></td></tr>
		 </table>
		 </td></tr>
		 <tr><td colspan="2"><table>
		 <tr><td align="right" width="305" ></td>
        <td align="right" width="150"   ><font  face="Comic Sans MS,arial"  color=#458d3b size="+4"><strong>José Zamora #48 Col. Emiliano Zapata, Uruapan, Michoacán. </strong></font></td></tr></table></td></tr>
		 <tr><td colspan="2"><table>
		
		
		
		 <tr><td align="right" width="80" ></td> 
		 <td align="right" width="300"   ><font  face="Comic Sans MS,arial"  color=#458d3b size="+4"><strong>Tel. (452) 182 12 91 Cel. 452 128 51 46 / certificacion@pamfa.com.mx  www.pamfa.com.mx</strong></font>
        </td>
        </tr>
		<tr><td height="10"></td></tr>
		<tr>
		 <td align="left" width="100" colspan="2"><font  face="Comic Sans MS,arial"  color=#458d3b size="+3"><strong>El estado actual de este certificado siempre figura en www.globalgap.org/search</strong></font>
        </td>
        </tr></table></td></tr>
      </table>
    </td>
  </tr>
</table>
<pagebreak>




<table  width="100%" height="1000px" >
  <tr  >
    <td width="29%" height="1053"  style="background: #FFF url(../images/izquierdo_coc.png) no-repeat left top" >
        &nbsp;
    </td>
    <td valign="top">
      <table >
        <tr >
          <td colspan="2" width="1100" height="200" style="background: #FFF url(../images/top_coc_anexo.png) no-repeat left top">
          
          </td>
		  
		  
          
        </tr>
        <tr  >
		
		
		
		<td colspan="2" ><table ><tr>
		
		<td align="CENTER" width="180" style="border: 5px; border: solid; border-color:#64ad43;" bgcolor="#64ad43" ><font color="White" face="Comic Sans MS,arial"><h2 align="center">Anexo para número CoC</h2></font></td>
		<td align="CENTER" width="230"  style="border-width: 5px;border: solid; border-color: #64ad43;" bgcolor="white"><font color="red" face="Comic Sans MS,arial"><h2 align="center">'.$row_cert['anexo_coc'].'</h2></font></td>
		<td width="12" style="border-width: 5px;border: solid  #64ad43" bgcolor="#64ad43"></td>
		</tr>
		</table></td></tr>
		
		
		<tr><td height="10" colspan="2"></td></tr>
		
		
        <tr><td height="20" colspan="2"></td></tr>
		<tr><td colspan="2"><table><tr>
		<td  align="right" width="20" ></td>
          <td  width="600"  align="justify">
            <font color="#458d3b" face="Comic Sans MS,arial" size="6" >Explotacion y/o unidades de explotación multiple</font> 
          </td>
		  <td  align="right" width="30" ></td>
		  </tr></table>
		</td></tr>
		<tr>
		<td height="10" colspan="2"></td></tr><tr >
		
		
		<td colspan="2" ><table ><tr>
		<td align="CENTER" width="800"  style="border-width: 5px;border: solid; border-color: #64ad43;" bgcolor="#64ad43"><font color="white" face="Comic Sans MS,arial"><h3 align="center">Nombre y dirección de la explotación</h3></font></td>
		
		
				
				
		<td align="CENTER" width="320"  style="border-width: 5px;border: solid; border-color: #64ad43;" bgcolor="#64ad43"><font color="white" face="Comic Sans MS,arial"><h3 align="center">¿Etiquetado del producto?</h3></font></td>
		
		
		');for($i=0;$i<45;$i++){$mpdf->WriteHTML('
		</tr>
		<tr><td align="right" colspan="1" style="border-right:5px solid #64ad43">
				<td align="right" colspan="1" >
		<tr>');}
		$mpdf->WriteHTML('
		
		</table></td></tr>

		  <tr><td height="20" colspan="2"></td></tr>
		 
        
        
        
		 
        
      </table>
    </td>
  </tr>
</table>');

$mpdf->Output();
exit();?>