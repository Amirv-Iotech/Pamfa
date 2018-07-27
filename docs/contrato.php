<?php require_once('../Connections/inforgan_pamfa.php'); ?>
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

 if(isset($_GET['idsolicitud'])){$_POST['idsolicitud']=$_GET['idsolicitud'];}



  $query_operador = sprintf("SELECT * FROM operador WHERE idoperador=(select idoperador from solicitud where idsolicitud=%s)", GetSQLValueString( $_POST["idsolicitud"], "int"));
$operador = mysql_query($query_operador, $inforgan_pamfa) or die(mysql_error());
$row_operador= mysql_fetch_assoc($operador);



$query_cert_productos = sprintf("SELECT * FROM cert_producto WHERE idcertificado=%s  ", GetSQLValueString( $row_cert['idcertificado'], "int"));
$cert_productos= mysql_query($query_cert_productos, $inforgan_pamfa) or die(mysql_error());

 $query_prod = sprintf("SELECT * FROM cultivos WHERE idsolicitud=%s order by idcultivos", GetSQLValueString( $_POST["idsolicitud"], "int"));
                      $prod = mysql_query($query_prod, $inforgan_pamfa) or die(mysql_error());
					  
					 
$array = array();
$c=0;
 $productos="";
while($row_prod= mysql_fetch_assoc($prod))
{
	
	$array[$c]=$row_prod['producto'];
	$c++;
}
$a1="";$a2="";
$productos=$array[0].",";
 for($rr=0;$rr<$c;$rr++)
                      {
						                       
                     for($r=0;$r<$c;$r++)
                      {
						  $a1=$array[$rr];$a2=$array[$r];
						
						  if($a1!=$a2)
						  {
							  

if (stripos( $productos,$a1) === false) {
    $productos=$a1.",".$productos;
} 
                       
						  }
                      }
					 
					  }
$tam=strlen($productos);
$prod=substr($productos,0,($tam)-1);

$query_sol_esquema = sprintf("SELECT * FROM solicitud_esquema WHERE idsolicitud=%s", GetSQLValueString(  $_POST["idsolicitud"], "int"));
$sol_esquema= mysql_query($query_sol_esquema, $inforgan_pamfa) or die(mysql_error());
$row_sol_esquema= mysql_fetch_assoc($sol_esquema);
$query_sol_mexcalsup = sprintf("SELECT * FROM solicitud_mexcalsup WHERE idsolicitud=%s", GetSQLValueString(  $_POST["idsolicitud"], "int"));
$sol_mexcalsup= mysql_query($query_sol_mexcalsup, $inforgan_pamfa) or die(mysql_error());
//$row_sol_mexcalsup= mysql_fetch_assoc($sol_mexcalsup);
$row_total_sol_mexcalsup=mysql_num_rows($sol_mexcalsup);

$query_sol_srrc = sprintf("SELECT * FROM solicitud_srrc WHERE idsolicitud=%s", GetSQLValueString(  $_POST["idsolicitud"], "int"));
$sol_srrc= mysql_query($query_sol_srrc, $inforgan_pamfa) or die(mysql_error());
//$row_sol_srrc= mysql_fetch_assoc($sol_srrc);
$row_total_sol_srrc=mysql_num_rows($sol_srrc);

$query_sol_primus = sprintf("SELECT * FROM solicitud_primus WHERE idsolicitud=%s", GetSQLValueString(  $_POST["idsolicitud"], "int"));
$sol_primus= mysql_query($query_sol_primus, $inforgan_pamfa) or die(mysql_error());
//$row_sol_primus= mysql_fetch_assoc($sol_primus);
$row_total_sol_primus=mysql_num_rows($sol_primus);

$query_emp = sprintf("SELECT * FROM anexo_e WHERE idsolicitud=%s", GetSQLValueString(  $_POST["idsolicitud"], "int"));
$emp= mysql_query($query_emp, $inforgan_pamfa) or die(mysql_error());

$query_pro = sprintf("SELECT * FROM anexo_p WHERE idsolicitud=%s", GetSQLValueString(  $_POST["idsolicitud"], "int"));
$pro= mysql_query($query_pro, $inforgan_pamfa) or die(mysql_error());


//$row_total_sol_primus=mysql_num_rows($sol_primus);
  $query_sol = sprintf("SELECT * FROM solicitud WHERE idsolicitud=%s", GetSQLValueString(  $_POST["idsolicitud"], "int"));
$sol= mysql_query($query_sol, $inforgan_pamfa) or die(mysql_error());
$row_sol= mysql_fetch_assoc($sol);

$query_pres = sprintf("SELECT * FROM presupuesto where idsolicitud=%s ",GetSQLValueString($_POST['idsolicitud'], "text"));
$pres = mysql_query($query_pres , $inforgan_pamfa) or die(mysql_error());
$row_pres = mysql_fetch_assoc($pres );

$query_cont = sprintf("SELECT * FROM contrato WHERE idsolicitud=%s", GetSQLValueString($_POST['idsolicitud'], "text"));
$cont = mysql_query($query_cont,$inforgan_pamfa) or die(mysql_error());
$row_cont = mysql_fetch_assoc($cont);
$dia=substr($row_cont['fecha_firma_admin'],0,2);
$n=substr($row_cont['fecha_firma_admin'],3,3);
$n=$n+0;
$mes="";
if($n==1){$mes="Enero";}if($n==2){$mes="Febrero";}if($n==3){$mes="Marzo";}if($n==4){$mes="Abril";}if($n==5){$mes="Mayo";}if($n==6){$mes="Junio";}if($n==7){$mes="Julio";}if($n==8){$mes="Agosto";}if($n==9){$mes="Septiembre";}if($n==10){$mes="Octubre";}if($n==11){$mes="Noviembre";}if($n==12){$mes="Diciembre";}
$an=substr($row_cont['fecha_firma_admin'],6,7);

$an=$an+2000;
if($an==2000){$an="";}
////temporal en espera de firmas digitales
$firmado="";
if($row_cont['fecha_firma_admin']){
$firmado="firmado";
}
$firmado2="";
if($row_cont['fecha_firma_cliente']){
$firmado2="firmado";
}
include('mpdf.php');
$mpdf=new mPDF();
$mpdf->pagenumPrefix = 'Página ';
$mpdf->pagenumSuffix = ' de ';
//$mpdf->setFooter('  {PAGENO}{nb}');
$mpdf->setHeader(' {PAGENO}{nb}');
  
$footer = "<table >
<tr>
 <td style='font-size: 18px; padding-bottom: 20px;' align=\"left\">{PAGENO}{nb}</td>
</tr>
</table>";
function encabezado(){$GLOBALS['mpdf']->WriteHTML('
	<table  width="100%" border="1" cellspacing="0" cellpadding="0">
      <tr>
        <td colspan="3"  align="center" style="color: #CCC"><img style="width:75px;" src="../images/pamfa.png" alt=""></td>
        <td colspan="3" align="center">Acuerdo de servicio de certificación de producto </td>
        <td align="center" style="color: #CCC"> <table width="100%"  border="1" cellspacing="0" >
          <tr>
            <td align="center">Clave: CER.RG.04</td>
          </tr>
          <tr>
            <td align="center">Versión: 05</td>
          </tr>
          <tr>');
		
$GLOBALS['mpdf']->WriteHTML('
            <td align="center">Fecha de emisión: '. $GLOBALS['row_sol']['fecha_autorizo'].'</td>
          </tr>
		  
        </table></td>
       
      </tr>
      
        </table>
		');
}

$mpdf->WriteHTML('
<html>
<head>
<style type="text/css">
body,td,th {
	font-family: Arial, Helvetica, sans-serif;
}
</style>
</head>
<body>');encabezado();
$mpdf->WriteHTML('<br>
		 <table width="100%"  cellspacing="5" >
          <tr>
            <td align="left">Fecha:  '.$row_sol['fecha_autorizo'].'</td>
          </tr>
          <tr>
            <td align="left">Datos de cliente</td>
          </tr>
          <tr>
            <td align="justify">Contrato de prestación de servicios de certificación de producto que en los términos establecidos por la ley, celebran por una parte VERIFICACIÓN Y CERTIFICACIÓN PAMFA A.C.  representada por la Ing. Marisela Farías López que en lo sucesivo se denominará para efectos de este contrato “El organismo de certificación” y por otra parte el cliente <u>'.$row_operador['nombre_legal'].'</u> representada en este acto por <u>'.$row_operador['nombre_representante'].'</u> a quien en lo sucesivo se denominará “el cliente”. 

</td>
          </tr>
        </table>
		
		 <table width="100%"  cellspacing="5" >
          <tr>
            <td align="left">DECLARACIONES</td>
          </tr>
          <tr>
            <td align="justify">I.	“El organismo de certificación” declara que VERIFICACIÓN Y CERTIFICACIÓN PAMFA A.C. es una empresa constituida legalmente el día 20 del mes de enero de 2015 según consta en la escritura pública número 12548 volumen CCCLVI otorgada ante el notario público Moisés Espinosa Ruiz, número 50 de la ciudad de Uruapan Michoacán. . Con registro Federal de Contribuyentes Numero VCP150120PT3, Con domicilio ubicado en la calle José Zamora, Numero 48, Colonia Emiliano Zapata de esta Ciudad.</td>
          </tr>
          <tr>
            <td align="justify">II.	Que cuenta con las facultades suficientes y necesarias para celebrar este contrato, de conformidad al poder, que le fue conferido mediante escritura pública numero 12548 12548 volumen CCCLVI otorgada ante el notario público Moisés Espinosa Ruiz, número 50 de la ciudad de Uruapan Michoacán. 
</td></tr>
<tr>
<td align="justify">III.	Que conforme a su objeto social se encuentra dedicada entre otras cosas a:<u> “PRESTAR LOS SERVICIOS RELACIONADOS CON LOS DIFERENTES SISTEMAS PRODUCTO EN ASPECTOS DE LA EVALUACION DE LA CONFORMIDAD DE NORMAS OFICIALES MEXICANAS Y NORMAS MEXICANAS, VERIFICACIÓN Y CERTIFICACIÓN Y TRATAMIENTOS FITOSANITARIOS, INOCUIDAD Y BUENAS PRÁCTICAS AGRÍCOLAS Y DE MANEJO, CONFORME A LO ESTABLECIDO EN LA NORMATIVIDAD VIGENTE DEL SECTOR AGROPECUARIO.”.</u> 
</td>
 
          </tr>
        </table>
		
		 <table width="100%"  cellspacing="5" >
        
          <tr>
		    <td width="2%"  align="left" rowspan="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
            <td align="justify">a)	Que es su deseo celebrar este Contrato con EL CONTRATANTE DEL SERVICIO en virtud de la capacidad técnica, profesional y económica, así como los conocimientos, la experiencia, el personal y los elementos materiales necesarios, por parte de esta última, para prestar a favor de <u>'.$row_operador['nombre_legal'].'</u> los servicios objeto de este instrumento.</td>
          </tr>
          <tr>
            <td align="justify">b)	Declaran ambas partes, a través de sus representantes, que se reconocen mutuamente lo manifestado en las declaraciones precedentes y que es su voluntad celebrar el presente contrato remitiéndose al efecto a lo dispuesto en las siguientes:
</td></tr>

        </table>
		 <table width="100%"  cellspacing="5" >
          
          <tr>
            <td align="justify">IV.	“El organismo de certificación” declara que el objeto de este contrato es evaluar y certificar el producto bajo el esquema </td>
          </tr>
		   <tr>
          
      
        </table>
		 <table width="100%" border="1"  >
          
          <tr>
            <td align="center">');
			$normas="";
			
			 if($row_sol_esquema['esq_tipo1_op1']!=NULL||$row_sol_esquema['esq_tipo2_op1']!=NULL){$mpdf->WriteHTML('X'); $normas="GLOBALG.A.P. IFA V5.0,"; }else{$mpdf->WriteHTML('');} $mpdf->WriteHTML(' </td>
			  <td align="center"> '); if($row_total_sol_mexcalsup>0){$mpdf->WriteHTML('X'); $normas=$normas." MEXICO CALIDAD SUPREMA,"; }else{$mpdf->WriteHTML('');} $mpdf->WriteHTML('</td>
			    <td align="center">'); if($row_total_sol_srrc>0){$mpdf->WriteHTML('X'); $normas=$normas." SISTEMA DE REDUCCIÓN DE CONTAMINACIÓN,"; }else{$mpdf->WriteHTML('');} $mpdf->WriteHTML('</td>
				  <td align="center">'); if($row_total_sol_primus>0){$mpdf->WriteHTML('X'); $normas=$normas." PrimusGFS,"; }else{$mpdf->WriteHTML('');} $mpdf->WriteHTML(' </td>
				   <td align="center">'); if($row_total_sol_srrc>0){$mpdf->WriteHTML('X'); $normas=$normas." SISTEMA DE REDUCCIÓN DE CONTAMINACIÓN,"; }else{$mpdf->WriteHTML('');} $mpdf->WriteHTML('</td>
				  <td align="center">'); if($row_total_sol_primus>0){$mpdf->WriteHTML('X'); $normas=$normas." PrimusGFS,"; }else{$mpdf->WriteHTML('');} $mpdf->WriteHTML(' </td>
          </tr>
		   <tr>
            <td align="justify"> ( ');if($row_sol_esquema['esq_tipo1_op1']!=NULL){$mpdf->WriteHTML('X'); }$mpdf->WriteHTML('      ) GlobalG.A.P. IFA <br> ('); if($row_sol_esquema['esq_tipo2_op1']!=NULL){$mpdf->WriteHTML('X');} $mpdf->WriteHTML('      ) GlobalG.A.P. Cadena de Custodia.</td>
			  <td align="center"> Pliegos de condiciones
“México Calidad Suprema”
</td>
			    <td align="center"> SRRC/SENASICA</td>
				  <td align="center"> PrimusGFS</td>
				  <td align="center"> Hecho en México</td>
				  <td align="center"> Denominación de origen</td>
          </tr>
		
      
        </table>');
		$alcances="";
		$cont=0;
		
			$query_es = sprintf("SELECT * FROM esquemas WHERE idesquema=%s or idesquema=%s", GetSQLValueString(  $row_sol_esquema['esq_tipo1_op1'], "int"), GetSQLValueString(  $row_sol_esquema['esq_tipo2_op1'], "int"));
$sol_es= mysql_query($query_es, $inforgan_pamfa) or die(mysql_error());

	while($row_sol_es= mysql_fetch_assoc($sol_es))
		{
			$alcances=$row_sol_es['esquema'].", ".$alcances."; ";
			$cont++;
		}
		
		$row_sol_mexcalsup= mysql_fetch_assoc($sol_mexcalsup);
		
			$query_mex = sprintf("SELECT * FROM mex_cal_sup WHERE idmex_cal_sup=%s",  GetSQLValueString(  $row_sol_mexcalsup['idmex_alcance'], "int"));
$sol_mex= mysql_query($query_mex, $inforgan_pamfa) or die(mysql_error());

	$row_sol_mex= mysql_fetch_assoc($sol_mex);
			$alcances=$row_sol_mex['descripcion'].", ".$alcances."; ";
			$cont++;	
		while($row_sol_srrc= mysql_fetch_assoc($sol_srrc))
		{
			$query_srrc = sprintf("SELECT * FROM srrc WHERE idsrrc=%s ", GetSQLValueString(  $row_sol_srrc['idsrrc'], "int"));
$srrc= mysql_query($query_srrc, $inforgan_pamfa) or die(mysql_error());

	while($row_srrc= mysql_fetch_assoc($srrc))
		{
			$alcances=$row_srrc['seccion'].", ".$alcances."; ";
			$cont++;
		}
		}
		
		while($row_sol_primus= mysql_fetch_assoc($sol_primus))
		{
			$query_primus = sprintf("SELECT * FROM primusgfs WHERE idprimus=%s ", GetSQLValueString(  $row_sol_primus['idprimus'], "int"));
$primus= mysql_query($query_primus, $inforgan_pamfa) or die(mysql_error());

	while($row_primus= mysql_fetch_assoc($primus))
		{
			$alcances=$row_primus['primus'].", ".$alcances."; ";
			$cont++;
		}
		}
		$tam=strlen($alcances);
		$alcances=substr($alcances,0,($tam-(($cont*2)+2)));
		$mpdf->WriteHTML('
		<table width="100%"  cellspacing="5" >
          <tr>
            <td align="left">Específicamente en el siguiente alcance: <u>'.$alcances.' </u>.</td>
          </tr></table>
		  <br>VERIFICACIÓN Y CERTIFICACIÓN PAMFA A.C.<br>
ORGANISMO DE CERTIFICACIÓN DE PRODUCTO
		');
		$mpdf->AddPage();
		encabezado();
		
		$mpdf->WriteHTML('

		 <table width="100%"  cellspacing="5" >
          
        
          <tr>
            <td align="justify">V.	“El Cliente” declara ser una persona moral o física con los siguientes datos: <u>'.$row_operador['nombre_legal'].', RFC: '.$row_operador['rfc'].', '.$row_operador['direccion'].', '.$row_operador['colonia'].', '.$row_operador['municipio'].', '.$row_operador['estado'].', CP: '.$row_operador['cp'].'</u> y que su representante autorizado tiene la capacidad para obligarla en los términos de este instrumento. 

</td>
          </tr>
        </table>
		
		 <table width="100%"  cellspacing="5" >
          
          <tr>
            <td align="justify">VI.	“El cliente” declara que solicitó los servicios de certificación de producto y acepta los términos en los que presta los servicios “El organismo de certificación”. </td>
          </tr>
          <tr>
            <td align="justify">VII.	“El organismo de certificación” se obliga brindar los SERVICIOS con la calidad y el esmero y a cumplir con las Normas aplicables.
</td></tr>
<tr>
<td align="justify">VIII.	Las partes convienen en que “El organismo de certificación”  se obliga a pagar al auditor/inspector como contraprestación los honorarios estipulados en relación a los servicios prestados.
</td>
 
          </tr>
		  <tr>
            <td align="justify">IX.	  Ambas partes declaran que para el caso de controversia o interpretación de este contrato, se someterán al fuero del Estado de Michoacán, México, renunciando desde ahora al fuero que en razón de sus domicilios presentes o futuros pudieran tener. 
</td></tr>
<tr>
<td align="justify">X.	  Ambas partes declaran que en el presente contrato no existe dolo o mala intención.
</td>
 
          </tr>
        </table>
		
		 <table width="100%"  cellspacing="5" >
          <tr>
            <td align="left">DECLARACIONES</td>
          </tr>
          <tr>
            <td align="justify">I.	El objeto del presente contrato es la evaluación de la conformidad del producto (s) <u>'.$prod.' </u>. de la empresa denominada:  <u>'.$row_operador['nombre_legal'].'</u> bajo los lineamientos de la normatividad <u>'.$normas.'</u> , que “El organismo de certificación” se compromete a prestarle a “el cliente”.  Las cláusulas de este contrato afectan a su vez a las evaluaciones no anunciadas y especiales (tanto extraordinarias como de modificación del alcance) en el presente ciclo de certificación. </td>
          </tr>
          <tr>
            <td align="justify">II.	Las partes convienen que <u>'.$row_operador['nombre_legal'].'</u> se obliga a pagar a “el organismo de certificación” la contraprestación estipulada en la cláusula tercera. 
</td></tr>
<tr>
<td align="justify">III.	Por su parte, “el organismo de certificación” se obliga a expedir al cliente la factura correspondiente que contenga los requisitos fiscales exigidos por la legislación aplicable, como requisito previo al pago de la contraprestación.
</td>
 
          </tr>
		   <tr>
            <td align="justify">IV.	La cantidad que de común acuerdo pactan las partes a favor de “El organismo de certificación” y a cargo de “el cliente” por sus servicios de certificación de producto, de conformidad con el presupuesto de servicios.<br>Anexo CER.RG.03


</td></tr>

        </table>
		 <table width="100%"  cellspacing="5" >
        
          <tr>
		   
		   <td align="left">Notas: Para GLOBALG.A.P..</td>
		   </tr><tr>
		    
            <td align="justify">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1.	La cuota anual cubre los gastos para el registro en la base de datos GlobalG.A.P.  En caso de existir un GGN o número CoC, el no comunicarlo a VERIFICACION Y CERTIFICACION PAMFA A.C., el reglamento general de GLOBALG.A.P. establece una sanción de 100 €(EUROS) para un auditor individual bajo la opción 1; y de 500€ (EUROS) para un grupo de productores bajo la opción 2, sobre la tarifa de registro.  </td>
          </tr>
          <tr>
            <td align="justify">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2.	La auditoría no anunciada se realizará bajo la Opción 1 al 10% del número total de productores certificados. En caso de ser necesaria esta auditoria se avisará con un plazo máximo de 48 horas de anticipación. 
</td></tr><tr>
            <td align="justify">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;3.	En caso de que PAMFA determine necesaria otra visita a sitio para comprobar la resolución de no conformidades, se originará un cargo extra. 
</td></tr></table>
		 
	<br>VERIFICACIÓN Y CERTIFICACIÓN PAMFA A.C.<br>
ORGANISMO DE CERTIFICACIÓN DE PRODUCTO

		');
		$mpdf->AddPage();
		encabezado();
		$mpdf->WriteHTML('
		 
		
		
		
		 <table width="100%"  cellspacing="5" >
           <tr>
		    
            <td align="justify">información proporcionada por el representante autorizado es la declarada en la Solicitud de certificación de producto (CER.RG.01) y Anexo CER.RG.01   </td>
          </tr>
		   <tr>
            <td align="justify">V.	La duración del contrato será una mínima de un año para todos los esquemas de certificación excepto para SRRC (cultivos perennes e instalaciones, la cual es de 2 años) y máxima de 4 años para los esquemas de certificación GlobalG.A.P., PrimusGFS, México Calidad Suprema y SRRC/SENASICA, transcurrido ese tiempo se renovará el contrato.  De acuerdo a lo convenido entre ambas partes. 
</td></tr>

        </table>
		 <table width="100%"  cellspacing="5" >
         <tr>
            <td align="justify">VI.	La disolución del contrato podrá hacerse si existe previo acuerdo por escrito de “el cliente” y aceptado por “El organismo de certificación”. Los daños y prejuicios que pudieran causar las partes, serán a cargo de quien inicie la rescisión.  </td>
          </tr>
          <tr>
            <td align="justify">VII.	“El cliente” acepta recibir auditorias no anunciadas (ó de vigilancia) cuando así lo indique el esquema de certificación, si sale sorteado. De negarse por más de dos veces “El organismo de certificación” puede suspender el certificado del cliente.  
</td></tr>
<tr>
<td align="justify">VIII.	En caso de cancelación o suspensión del servicio, “el cliente” se obliga a cumplir lo establecido en las regulaciones aplicadas a cada uno de los esquemas de certificación.
</td>
 
          </tr>
		   <tr>
            <td align="justify">IX.	Ante una cancelación o suspensión “el cliente” de cambiar de organismo de certificación se obliga a informar al nuevo organismo de certificación de su estatus. El Organismo de Certificación que elija “el cliente” podrá pedir informes a “El organismo de certificación”  de la situación en la que se encuentra la no conformidad motivo de la suspensión o cancelación de la certificación.  
</td></tr>
 <tr>
            <td align="justify">X.	“El cliente “se obliga a no ceder los derechos y obligaciones a terceras personas.  </td>
          </tr>
          <tr>
            <td align="justify">XI.	“El cliente” se obliga a cumplir con los requisitos de los documentos normativos y Acuerdo de sublicencia y certificación de los esquemas de certificación: GlobalG.A.P., México Calidad Suprema, PrimusGFS y Sistema de Reducción de Riesgos de Contaminación según aplique, en la versión vigente. 
</td></tr>
<tr>
<td align="justify">XII.	 “El organismo de certificación” declara que cuando reciba un informe, ya sea de mal uso de la marca de conformidad o de un riesgo de peligro involucrado con el producto que ostentan la marca de conformidad y la validez del informe debe investigarse. Cuando se haya establecido que ocurrió un mal uso “El organismo de certificación” determinará el alcance del mal uso del producto y “el cliente” se obliga a implementar las acciones correctivas que “El organismo de certificación” le solicite.
</td>
 
          </tr>
		  
<tr>
            <td align="justify"><br>XIII.	“El organismo de certificación” declara que podrá ejercer las acciones legales necesarias cuando se haga mal uso de marca y/o comercializar un producto certificado peligroso.  </td>
          </tr>
          <tr>
            <td align="justify">XIV.	“El cliente” se obliga a recibir auditorías extraordinarias en el caso de que se requiera por cierre de no conformidades o por auditorias no anunciadas cuando el esquema de certificación lo especifique.
</td></tr>
<tr>
<td align="justify">XV.	“El cliente” se obliga a informar a “El organismo de certificación” si se encuentra involucrado en una alerta sanitaria (producto peligroso) y/o alguna modificación al producto certificado. 
</td>
 
          </tr>
		   <tr>
            <td align="justify">XVI.	Las quejas o apelaciones que “el cliente” haga deben ser relacionadas al alcance de la certificación. 
</td></tr><tr>
            <td align="justify">XVII.	Como parte de sus actividades “El organismo de certificación” mantiene actualizado en su página electrónica la base de datos de sus productos certificados. Si “el cliente” no estuviera de acuerdo en que “El organismo de certificación” publique sus datos, “el cliente” debe informar por escrito libre para que no se tengan en su base de datos.  </td>
          </tr>
          </table>
		
		
		 
		
		VERIFICACIÓN Y CERTIFICACIÓN PAMFA A.C.<br>
ORGANISMO DE CERTIFICACIÓN DE PRODUCTO');

$mpdf->AddPage();
		encabezado();
		$mpdf->WriteHTML('
		 <table width="100%"  cellspacing="5" >
		
         
 <tr>
            <td align="justify">XVIII.	Durante una testificación al personal del Organismo de Certificación por la entidad de acreditación o por los dueños del esquema, “El cliente” tendrá durante la inspección al personal de la entidad de acreditación o de los dueños del esquema, sin que éstos (la entidad de acreditación o dueños del esquema) influyan sobre los resultados de la inspección. 
</td></tr>
<tr>
<td align="justify">XIX.	Las partes en este acto convienen en que EL PRESTADOR DEL SERVICIO no puede ceder o transferir, total o parcialmente, a terceros, las obligaciones o derechos que adquiere por virtud de este. Contrato, sin el consentimiento previo y por escrito del “cliente”.
</td>
 
          </tr>
		   <tr>
            <td align="justify">XX.	Para el caso específico de los SRRC/SENASICA, el Representante Legal es la única persona que podrá firmar el dictamen de verificación o en su defecto otra persona con poder notariado. </td>
          </tr>
          <tr>
            <td align="justify">XXI.	CONFIDENCIALIDAD.
</td></tr>
		  
        </table>
		<table width="100%"  cellspacing="5" >
        
         <tr>
		    <td width="10%"  align="left" rowspan="5"></td>
            <td align="justify">a)	Cada parte conviene en observar y mantener de manera confidencial toda la información, obtenida por cualquier medio o fuente derivada del presente contrato y que estuviere relacionada con el objeto social y actividades de las otras partes, sus clientes, proveedores y cualquier otra persona física o moral con la que las otras partes tuviere relaciones comerciales (a la que en lo sucesivo se le denominará la INFORMACION CONFIDENCIAL). </td>
          </tr>
		  <tr>
		   
            <td align="justify">b)	Por lo anterior, cualquiera de las partes que sea la receptora de la INFORMACION CONFIDENCIAL se obliga a darle el mismo tratamiento y nivel de confidencialidad con que maneja su propia información confidencial.</td>
          </tr>
		  <tr>
		    
            <td align="justify">c)	Asimismo, la parte receptora de la INFORMACION CONFIDENCIAL conviene en Limitar el acceso a la misma a sus empleados o representantes que en forma razonable tuvieren conocimiento de la INFORMACION CONFIDENCIAL, haciéndoles partícipes y obligados solidarios con aquella, respecto de sus obligaciones de conservar la confidencialidad aquí contraídas. </td>
          </tr>
		  <tr>
		   
            <td align="justify">d)	Además de lo anterior, las partes convienen en que cualquier persona que tuviere acceso a la INFORMACION CONFIDENCIAL a través de la receptora de la misma, deberá ser advertido por esta última de lo estipulado en este contrato, comprometiéndose la parte receptora a realizar esfuerzos razonables para que dichas personas observen y cumplan lo estipulado en esta cláusula. Ninguna información que fuere  otorgada  por escrito por una de las partes a la otra, podrá ser copiada o reproducida en forma alguna a no ser que existiera autorización previa y por escrito concedida por la parte otorgante, lo anterior con excepción de aquellas copias que la parte receptora pudiere requerir para cumplir con sus obligaciones  estipuladas en este instrumento. </td>
          </tr>
		  <tr>
		   
            <td align="justify">e)	Con independencia de lo anteriormente estipulado, la siguiente información no será considerada como confidencial para los efectos de lo estipulado en esta cláusula: </td>
          </tr>
         
        </table>
		 <table width="100%"  cellspacing="5" >
        
         <tr>
		    <td width="15%"   align="right" rowspan="6"></td>
            <td align="justify">1.	Cualquier información que hubiere sido legítimamente conocida y obtenida por la parte receptora así como documentación que de la misma manera formara parte de sus archivos con anterioridad a la liberación de dicha información con motivo de la firma de este instrumento.</td>
          </tr>
          <tr>
            <td align="justify">2.	Cualquier información que regularmente fuere del conocimiento público.
</td></tr>
<tr>
            <td align="justify">3.	Cualquier información que eventualmente fuere del dominio público y que hubiere sido legítimamente revelada , no derivado de alguna violación o incumplimiento de la parte receptora respecto de sus obligaciones adquiridas en este Contrato. 
</td></tr>
 </table>
 VERIFICACIÓN Y CERTIFICACIÓN PAMFA A.C.<br>
ORGANISMO DE CERTIFICACIÓN DE PRODUCTO');
		
		
$mpdf->AddPage();
		encabezado();
		$mpdf->WriteHTML('
		 <table width="100%"  cellspacing="5" >
        
         <tr>
		    <td width="15%"   align="right" rowspan="6"></td>
		
		   
            <td align="justify">4.	Asimismo, las partes convienen en este acto en que mantendrán la obligación de confidencialidad estipulada en esta cláusula en todo momento, durante y posterior a la vigencia de este contrato, a menos que reciba la autorización previa y por escrito de la parte respectiva.</td>
          </tr>
		  <tr>
		   
             <td align="justify">5.	Las partes convienen que en caso de violación o incumplimiento a las obligaciones estipuladas en esta cláusula, la parte que incumpla se obliga a pagar a la parte afectada los daños y perjuicios que llegare a ocasionarle, sin perjuicio de la responsabilidad penal en la que también pudiere incurrir.


</td>
          </tr>
		</table>
		<table width="100%"  cellspacing="5" >
         
         
          <tr>
            <td align="justify">XXII.	“El cliente” se obliga a tomar  todas las medidas necesarias para:
</td></tr>

        </table>
		 <table width="100%"  cellspacing="5" >
        
         <tr>
		    <td width="10%"  align="left" rowspan="5"></td>
            <td align="justify">a.	Realizar la auditoria y la vigilancia (si se requiere), incluyendo las disposiciones para examinar la documentación y los registros, y tener acceso al equipo, las ubicaciones, las áreas, el personal y los subcontratistas del cliente que sean pertinentes;  </td>
          </tr>
		  <tr>
		   
            <td align="justify">b.	investigar las quejas;</td>
          </tr>
		  <tr>
		    
            <td align="justify">c.	la participación de observadores, si es aplicable; </td>
          </tr>
		 
        </table>
		<table width="100%"  cellspacing="5" >
         
         
          <tr>
            <td align="justify">XXIII.	“El cliente” se obliga a no utilizar su certificación de producto de manera que ocasione mala reputación para “El organismo de certificación” y no hará ninguna declaración relacionada con su certificado de producto que “El organismo de certificación” pueda considerar engañosa o no autorizada. 
</td></tr>
<tr>
            <td align="justify">XXIV.	inmediatamente después de suspender, retirar o finalizar la certificación, “el cliente” se obliga a dejar de utilizarla en todo el material publicitario que contenga alguna referencia a ella, y deberá emprender las acciones exigidas por el esquema de certificación (por ejemplo, la devolución de los documentos de la certificación y cualquier otra medida que se requiera.
</td></tr>
<tr>
            <td align="justify">XXV.	Si “el cliente” suministra copias de los documentos de certificación a otros, se obliga a realizar la reproducción total de los documentos o según lo especifique el esquema de certificación de acuerdo a su alcance.  
</td></tr>
<tr>
            <td align="justify">XXVI.	“El cliente” al hacer referencia a su certificación de productos en medios de comunicación tales como documentos, folletos o publicidad, “el cliente” se obliga a cumplir con los requisitos de “El organismo de certificación” y los especificados por el esquema de certificación de acuerdo a su alcance. 
</td></tr>
<tr>
            <td align="justify">XXVII.	“El cliente” se obliga a cumplir con todos los requisitos que estipule el esquema de certificación con relación al uso de las marcas de conformidad y a la información relacionada con el producto.
</td></tr>
<tr>
            <td align="justify">XXVIII.	“El cliente” se obliga a conservar registro de todas las quejas conocidas con respecto al cumplimiento de los requisitos del alcance de su certificación y a poner tales registros a disposición de “El organismo de certificación” cuando se le solicite. Y:  
</td></tr>

        </table>
		 <table width="100%"  cellspacing="5" >
        
         <tr>
		    <td width="10%"  align="left" rowspan="5"></td>
            <td align="justify">a.	tomar las acciones adecuadas con respecto a tales quejas y a las deficiencias que se encuentren en los productos que afectan a la conformidad con los requisitos de la certificación. </td>
          </tr>
		  <tr>
		   
            <td align="justify">b.	Documentar las acciones realizadas. </td>
          </tr>
		  
		 
        </table>
		
		<br>VERIFICACIÓN Y CERTIFICACIÓN PAMFA A.C.<br>
ORGANISMO DE CERTIFICACIÓN DE PRODUCTO');

$mpdf->AddPage();
		encabezado();
		$mpdf->WriteHTML('
		
		 
		  
		
		 <table width="100%"  cellspacing="5" >
         
         
          <tr>
            <td align="justify">XXIX.	 “El cliente” se obliga a informar a “el organismo de certificación, sin retraso, acerca de los cambios que puedan afectar a su capacidad para cumplir con los requisitos del alcance de su certificación. 
</td></tr>

         

        </table>
		 <table width="100%"  cellspacing="5" >
        
         <tr>
		    <td width="10%"  align="left" rowspan="5"></td>
            <td align="justify">Los ejemplos de cambios pueden incluir:</td>
          </tr>
        </table>
		 <table width="100%"  cellspacing="5" >
         <tr>
		    <td width="15%"   align="right" rowspan="6"></td>
             <td align="justify">-	La condición legal, comercial, de organización o de propiedad;</td>
          </tr>
		    <tr>
             <td align="justify">-	organización y gestión (por ejemplo, directivos clave, personal que toma decisiones o personal técnico);
</td>
          </tr>
		    <tr>
             <td align="justify">-	modificaciones en el producto o en el método de producción;</td>
          </tr>
		    <tr>
             <td align="justify">-	direcciones de contacto y sitios de producción;
</td>
          </tr>
		  <tr>
             <td align="justify">-	cambios importantes en el sistema de gestión de la calidad.
</td>
          </tr>
         
        

        </table>
		 <table width="100%"  cellspacing="5" >
         
         
          <tr>
            <td align="justify">XXX.	 DOMICILIO PARA NOTIFICACIONES Y AVISOS.
</td></tr>
 <tr>
            <td align="justify">Las notificaciones y avisos que las partes deban darse con relación a este contrato, se harán por escrito y deberán ser enviadas por correo certificado con acuse de recibo, o por cualquier otro medio que asegure que el destinatario la reciba.
</td></tr>
  <tr>
            <td align="justify">                      Para tales efectos, las partes señalan como sus domicilios los siguientes:</td></tr>
 <tr>

        </table> 
		 <table width="100%"  cellspacing="5" >
        
         <tr>
		    <td width="10%"  align="left" rowspan="5"></td>
            <td align="justify">DEL CLIENTE: </td>
          </tr>
		  <tr>
		   
            <td align="justify">DEL ORGANISMO DE CERTIFICACIÓN:

</td>
          </tr>
		  
		 
        </table>
		<br><br>
		 <table width="100%"  cellspacing="5" >
        
         <tr>
		    <td width="5%"  align="left" ></td>
            <td align="justify">Leído y enterado de las partes del contrato se firma por duplicado a los <u>'.$dia.'</u>  del mes de  <u>'.$mes.'</u> del año <u>'.$an.'</u> en Uruapan, Michoacán, México.  </td>
          
		   
          <td width="5%"  align="left" ></td>


          </tr>
		  
		 
        </table>
		<br><br><br>
		 <table width="100%"  cellspacing="5" >
         
         
          <tr>
            <td align="justify" colspan="2"><u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$firmado.'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </u>
</td><td align="justify" colspan="2"><u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$firmado2.'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </u>
</td></tr>
 <tr>
            <td align="center" colspan="2">GERENTE GENERAL/ REPRESENTANTE LEGAL.
VERIFICACION Y CERTIFICACION PAMFA A.C.

</td>
 <td align="center" colspan="2">Por el cliente
Representante autorizado


</td></tr>
        </table>
		<br>VERIFICACIÓN Y CERTIFICACIÓN PAMFA A.C.<br>
ORGANISMO DE CERTIFICACIÓN DE PRODUCTO');

$mpdf->AddPage();
		encabezado();
		$mpdf->WriteHTML('<br><br><strong> 	Anexo Cotización de servicio (CER.RG.03)	</strong><br>
		
		 <table width="100%"   class="table" border="1" >
		 <tr><td colspan="2">
        Uruapan,Michoacán a:</td>
		</tr>
		<tr>
		<td  colspan="2">
        <h4><b>Datos del cliente</b></h4>
      </td>
     <tr><td>
       Nombre de la empresa </td><td>
       
      </td>
      </tr>
      <tr >
       <td >
       Dirección operativa </td>
        <td>
      </td>
      </tr>
      <tr >
       <td >
       Producto y variedad </td>
        <td>
      </td>
      </tr>
	  <tr>
       <td>
        persona de contacto </td>
		<td>
      </td>
      </tr>
	  <tr>
       <td>
        Telefono y/o celular </td>
        <td>
      </td>
      </tr><tr >
       <td >
        Email</td>
        <td>
      </td>
      </tr>
	  </table>
	  <br>
        <p>
       <strong> El siguiente presupuesto tiene una vigencia de 30 días naturales posteriores a la fecha de emisión.</strong> 
</p><br>
<table class="table table-hover" border="1" width="100%"  cellspacing="5">
          <tr>
            <td>Cantidad
            </td>
            <td>Concepto
            </td>
            <td>Esquema
            </td>
            <td>Costo unitario
            </td>
           
          </tr>

       
            ');
           /* $query_agenda = sprintf("SELECT * FROM agenda where idplan_auditoria='".$sol."'");
                $agenda = mysql_query($query_agenda, $inforgan_pamfa) or die(mysql_error());
                $total_agenda = mysql_num_rows($agenda);
              $cont=0;
              while($row_agenda= mysql_fetch_assoc($agenda))*/
                {
                
            $mpdf->WriteHTML('
            <tr>
              <td>'.$row_agenda['fecha'].'</td>
              <td>'.$row_agenda['horario'].'</td>
              <td>'. $row_agenda['actividad'].'</td>
              <td>'.$row_agenda['responsable'].'</td>
             
              
            </tr>
			');}$mpdf->WriteHTML('
          
      </table>
	  <br>
				   Especificaciones:<br>

•	La cotización incluye auditoria anunciada y no anunciada en caso que así lo requiera el esquema de certificación.<br>
•	Para orgánico incluye revisión de plan orgánico.<br>
•	No incluye viáticos de auditor.<br>
•	En caso de requerir factura se agregara el IVA (16%)<br>
•	Las condiciones de pago serán 100% al momento de aceptar la cotización.<br>
•	Esta cotización está sujeta a cambios si el alcance cambia al momento de realizar la auditoria.<br>
•	La cancelación del servicio programado tendrá una penalización de 20% del costo total.<br>
•	Esta cotización está realizada en MXN pero, los costos posteriores a 30 días pueden variar en realización a la fluctuación del dólar y/o euro de acuerdo al esquema.<br><br>
<br>VERIFICACIÓN Y CERTIFICACIÓN PAMFA A.C.<br>
ORGANISMO DE CERTIFICACIÓN DE PRODUCTO');

$mpdf->AddPage();
		encabezado();
		$mpdf->WriteHTML('
Nota:<br>
1.	La cuota anual cubre los gastos para el registro en la base de datos GlobalG.A.P.  El cliente debe informar a VERIFICACION Y CERTIFICACION PAMFA  sobre cualquier GGN, LGN o Numero CoC existente o caducado, y sobre cualquier actividad previa de verificación/inspección/auditoria o certificación/aprobación en su organización, incluyendo resultados. Su no comunicación redundará un costo extra  de 100 € (Euros), para un productor individual bajo la opción 1; y de 500 € (Euros), para un grupo de productores bajo la opción 2, sobre la tarifa de registro.";
<br>
2.	"No tiene un costo adicional la emisión del certificado" y se emitirá cuando se haya dado cumplimiento con los requisitos de la certificación.<br>

3.	SRRC - VERIFICACION Y CERTIFICACION PAMFA A.C. emitirá el dictamen de verificación e informe de evaluación de la conformidad, la dependencia  en este momento es quien decide sobre la certificación.


<br><br>
DATOS BANCARIOS:<br>
VERIFICACION Y CERTIFICACION PAMFA A.C.<br>
BANCO: BANBAJIO<br>
CUENTA: 19005552<br>
CLABE: 03 05 28 90 00 1114 8626<br>
REFERENCIA: ORGANISMO DE CERTIFICACIÓN.<br><br>
 <table width="100%"  cellspacing="5" >
 <tr><td width="33%"></td><td width="33%" align="center">_________________________________<br>VERIFICACIÓN Y CERTIFICACIÓN <br>
PAMFA A.C
</td><td width="33%"></td></tr>
 </table>
Estimado cliente, una vez aceptada la propuesta por favor envíe el comprobante del depósito o transferencia a los siguientes correos coordinacion@pamfa.com.mx y contapamfa@outlook.com<br><br>


Aceptación del servicio<br><br>


Nombre y firma: _____________________<br><br>


Fecha: _______________<br><br>

		<br>VERIFICACIÓN Y CERTIFICACIÓN PAMFA A.C.<br>
ORGANISMO DE CERTIFICACIÓN DE PRODUCTO');
$mpdf->Output('contrato.pdf','I');
exit();?>            