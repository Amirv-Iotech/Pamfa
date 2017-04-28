<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<table>
	<tr>
		<td>
			  <img src="../images/izquierdo2.png" width="100%"/>
		</td>
		<td valign="top">
			<table>
				<tr style="background-color: red">
					<td>
					red
					</td>
					<td> red2
					</td>
				</tr>
				<tr style="background-color: red">
					<td>
						<b>Usuario:</b> '.$row_operador['nombre_legal'].'
					</td>
					<td rowspan="3"> <img src="../images/mexico_calidadsuprema.png" width="110px" height="110px"/>
					</td>
				</tr>
				<tr style="background-color: red">
					<td>
					<b>Dirección:</b>'.$row_operador['direccion'].' '.$row_operador['colonia'].' '.$row_operador['municipio'].' '.$row_operador['estado'].' '.'
					</td>
				</tr>
				<tr style="background-color: red">
					<td>
					<b>Valido desde:</b>'.$row_cert['fecha_inicial_mexcalsup'].'
					</td>
				</tr>
				<tr style="background-color: red">
					<td>
					<b>Valido Hasta: </b>'.$row_cert['fecha_final_mexcalsup'].'
					</td>
					<td> red2
					</td>
				</tr>
				<tr style="background-color: red">
					<td>
					<b>Fecha de impresión:</b>'.$row_cert['fecha_impresion_mexcalsup'].'
					</td>
					<td> red2
					</td>
				</tr>
				<tr style="background-color: red">
					<td>
					Pliego de condiciones:
					</td>
					<td> red2
					</td>
				</tr>
				<tr>
				<td>
					<span>Alcance:</span>
				</td>
				<td></td>
				</tr>	
				<tr>
					<td>
					<span>Pliego:</span>	
					</td>
					<td rowspan="2">	
					  <img src="../images/logo_ema.jpg" width="90px" height="90px">            
					</td>
				</tr>
				<tr style="background-color: red">
					<td valign="bottom">
					______________________________
					</td>
				</tr>
				<tr style="background-color: red">
					<td>
					Ing. Marisela Farías López
					</td>
					<td> 
					Acreditación:
					</td>
				</tr>
				<tr style="background-color: red">
					<td>
					Gerente General
					</td>
					<td> red2
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>
</body>
</html>