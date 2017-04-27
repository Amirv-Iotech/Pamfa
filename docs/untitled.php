<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<table>
	<tr>
		<td rowspan="2">
		  <img src="../images/izquierdo.png" width="100%"/>
		</td>

		<td valign="top">
			<table>
				<tr>
			     <td style="font-size:28px" align="left"><b>USUARIO: </b><span style="font-size:28px; color:gray;">'.$row_operador['nombre_legal'].'</span></td>	
			      <td rowspan="2"> <img src="../images/Globalgap.jpg"/ width="90px" height="90px"></td>		
				</tr>
				<tr>
				   <td style="font-size:20px" align="left" vertical-align:top;><b>Dirección: </b><span style="color:gray;">'.$row_operador['direccion'].' '.$row_operador['colonia'].' '.$row_operador['municipio'].' '.$row_operador['estado'].' '.'</span></td>

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
  <img src="../images/logo_ema.jpg">
  </tr>

			</table>



		</td>
	</tr>

</table>
</body>
</html>