
<fieldset>

<? if($_POST['idformato']==3){$query__pregunta = "SELECT  * FROM preguntas_catalogos where idformato=3 order by numero asc, inciso asc,subinciso asc";}
if($_POST['idformato']==1){$query__pregunta = "SELECT  * FROM preguntas_catalogos where idformato=1 order by numero asc, inciso asc,subinciso asc";}
$pregunta = mysql_query($query__pregunta, $inforgan_pamfa) or die(mysql_error());

//$totalRows_inspeccion_reporte_pregunta = mysql_num_rows($inspeccion_reporte_pregunta);
?><br />
  <div class="row" id="seccion5" style="background-color: #ecfbe7; border:solid 2px #dbf573e6">
   <div class="col-lg-12 col-xs-12"><br />
   <iframe width="1" height="1"  name="destino"  frameborder="0"></iframe>
       <table class="table table-condensed table-bordered table-hover" width="100%">
       <tr><td colspan="3">LISTA DE VERIFICACIÓN</td></tr><tr></tr>
       <tr><? if($_POST['idformato']==1){?> <td colspan="2">Punto de control</td>  <td colspan="1">Criterio de cumplimiento</td> <td colspan="1">Nivel</td> <td colspan="1">Respuesta</td></tr><? }?>
       
<?php while ($row_pregunta = mysql_fetch_assoc($pregunta)) { 
		////////////////////
//consultas en la parte de abajo

//mysql_select_db($database_emetro, $emetro);
$query_resp = "SELECT * FROM catalogos_respuestas WHERE idplan_auditoria='".$_POST['idplan_auditoria']."'&& idpregunta='".$row_pregunta['idpregunta']."'";
$resp = mysql_query($query_resp, $inforgan_pamfa) or die(mysql_error());
$row_resp = mysql_fetch_assoc($resp); 
$totalRows_resp = mysql_num_rows($resp);
////////////

		?>

<?php  if($_POST['idformato']==3){ if($row_pregunta['tipo']==1){ ?> 

<tr class="success">
<td colspan="2" align="center">
<h4><?php echo $row_pregunta['texto'];?></h4>
</td>	 
</tr>

<?php } else if($row_pregunta['tipo']==2){  ?> 

<tr >
<td colspan="1"><?php echo $row_pregunta['texto'];?></td>	 
<form target="destino"  action="guardar_pregunta2.php" name="<?php echo $row_pregunta['idpregunta'];?>" method="post" id="<?php echo $row_pregunta['idpregunta'];?>">
<td rowspan="2" class="warning">
<select   onchange="this.form.submit()" class="plan_input" name="respuesta">
<option  value="" >Selecciona</option>
<option value="CUMPLE" <?php if (!(strcmp("CUMPLE", htmlentities($row_resp['respuesta'], ENT_COMPAT, '')))) {echo "SELECTED";} ?>>CUMPLE</option>
<option value="NO CUMPLE" <?php if (!(strcmp("NO CUMPLE", htmlentities($row_resp['respuesta'], ENT_COMPAT, '')))) {echo "SELECTED";} ?>>NO CUMPLE</option>
<option value="NO APLICA" <?php if (!(strcmp("NO APLICA", htmlentities($row_resp['respuesta'], ENT_COMPAT, '')))) {echo "SELECTED";} ?>>NO APLICA</option>
</select>
</td>
<tr>
<td colspan="1" class="warning"> 
<input class="plan_input" type="text" name="observacion" value="<?php echo $row_resp['observacion']; ?>" placeholder="Observacion" onchange="this.form.submit()" />
<input type="hidden" name="idplan_auditoria" value="<?php echo $row_plan_auditoria['idplan_auditoria']; ?>" />
<input type="hidden" name="idpregunta" value="<?php echo $row_pregunta['idpregunta']; ?>" />
<input type="hidden" name="MM_insert" value="form1" />
</td>  
</form>
</tr>
     

<?php  } else if($row_pregunta['tipo']==3){  ?> 

<tr class="info">
<td colspan="1"><?php echo $row_pregunta['texto'];?></td>	 
<form target="destino"  action="guardar_pregunta2.php" name="<?php echo $row_pregunta['idpregunta'];?>" method="post" id="<?php echo $row_pregunta['idpregunta'];?>"> 
<td  rowspan="2"class="warning">
<select  onchange="this.form.submit()" class="plan_input" name="respuesta">
<option value="" >Selecciona</option>
<option value="CUMPLE" <?php if (!(strcmp("CUMPLE", htmlentities($row_resp['respuesta'], ENT_COMPAT, '')))) {echo "SELECTED";} ?>>CUMPLE</option>
<option value="NO CUMPLE" <?php if (!(strcmp("NO CUMPLE", htmlentities($row_resp['respuesta'], ENT_COMPAT, '')))) {echo "SELECTED";} ?>>NO CUMPLE</option>
<option value="NO APLICA" <?php if (!(strcmp("NO APLICA", htmlentities($row_resp['respuesta'], ENT_COMPAT, '')))) {echo "SELECTED";} ?>>NO APLICA</option>
</select>
</td>
<tr class="info">
<td colspan="1"> 


<strong>Escribe tus observaciones aquí:</strong>
<input class="plan_input" type="text" name="observacion" value="<?php echo $row_resp['observacion']; ?>" placeholder="Observación" onchange="this.form.submit()" />
<input type="hidden" name="idplan_auditoria" value="<?php echo $row_plan_auditoria['idplan_auditoria']; ?>" />
<input type="hidden" name="idpregunta" value="<?php echo $row_pregunta['idpregunta']; ?>" />
<input type="hidden" name="MM_insert" value="form1" />
</td> 
</form> 
</tr>
         
<?php }}
 if($_POST['idformato']==1){ if($row_pregunta['tipo']==1){ ?> 

<tr class="success">
<td colspan="5" align="rigth">
<h4><strong><?php echo $row_pregunta['texto'];?></strong></h4>
</td>	 
</tr>

<?php } else if($row_pregunta['tipo']==2 ){  ?> 

<tr >
<td colspan="5"><strong><?php echo $row_pregunta['texto'];?></strong></td>	 
<form target="destino"  action="guardar_pregunta2.php" name="<?php echo $row_pregunta['idpregunta'];?>" method="post" id="<?php echo $row_pregunta['idpregunta'];?>">

<tr>
<td colspan="2" class="warning"> 
<input class="plan_input" type="text" name="observacion" value="<?php echo $row_resp['observacion']; ?>" placeholder="Observacion" onchange="this.form.submit()" />
<input type="hidden" name="idplan_auditoria" value="<?php echo $row_plan_auditoria['idplan_auditoria']; ?>" />
<input type="hidden" name="idpregunta" value="<?php echo $row_pregunta['idpregunta']; ?>" />
<input type="hidden" name="MM_insert" value="form1" />
</td>  
</form>
</tr>
     <?php  } else if($row_pregunta['tipo']==3 && $row_pregunta['criterio']==NULL ){  ?> 

<tr class="info">
<td colspan="3"><?php echo $row_pregunta['texto'];?></td>	
<td colspan="1" rowspan="2"><?php echo $row_pregunta['nivel'];?></td>  
<form target="destino"  action="guardar_pregunta2.php" name="<?php echo $row_pregunta['idpregunta'];?>" method="post" id="<?php echo $row_pregunta['idpregunta'];?>"> 
<td  rowspan="2" colspan="1" class="warning">
<select  onchange="this.form.submit()" class="plan_input" name="respuesta">
<option value="" >Selecciona</option>
<option value="CUMPLE" <?php if (!(strcmp("CUMPLE", htmlentities($row_resp['respuesta'], ENT_COMPAT, '')))) {echo "SELECTED";} ?>>CUMPLE</option>
<option value="NO CUMPLE" <?php if (!(strcmp("NO CUMPLE", htmlentities($row_resp['respuesta'], ENT_COMPAT, '')))) {echo "SELECTED";} ?>>NO CUMPLE</option>
<option value="NO APLICA" <?php if (!(strcmp("NO APLICA", htmlentities($row_resp['respuesta'], ENT_COMPAT, '')))) {echo "SELECTED";} ?>>NO APLICA</option>
</select>
</td>
<tr class="info">
<td colspan="3" > 


<strong>Escribe tu justificación aquí:</strong>
<input class="plan_input" type="text" name="observacion" value="<?php echo $row_resp['observacion']; ?>" placeholder="Observación" onchange="this.form.submit()" />
<input type="hidden" name="idplan_auditoria" value="<?php echo $row_plan_auditoria['idplan_auditoria']; ?>" />
<input type="hidden" name="idpregunta" value="<?php echo $row_pregunta['idpregunta']; ?>" />
<input type="hidden" name="MM_insert" value="form1" />
</td> 
</form> 
</tr>
         
<?php  } else if($row_pregunta['tipo']==3 && $row_pregunta['criterio']!=NULL ){  ?> 

<tr class="info">
<td colspan="2"><?php echo $row_pregunta['texto'];?></td>	
<td colspan="1" rowspan="2"><?php echo $row_pregunta['criterio'];?></td> 
<td colspan="1" rowspan="2"><?php echo $row_pregunta['nivel'];?></td> 
<form target="destino"  action="guardar_pregunta2.php" name="<?php echo $row_pregunta['idpregunta'];?>" method="post" id="<?php echo $row_pregunta['idpregunta'];?>"> 
	 
<form target="destino"  action="guardar_pregunta2.php" name="<?php echo $row_pregunta['idpregunta'];?>" method="post" id="<?php echo $row_pregunta['idpregunta'];?>"> 
<td  rowspan="2"class="warning">
<select  onchange="this.form.submit()" class="plan_input" name="respuesta">
<option value="" >Selecciona</option>
<option value="CUMPLE" <?php if (!(strcmp("CUMPLE", htmlentities($row_resp['respuesta'], ENT_COMPAT, '')))) {echo "SELECTED";} ?>>CUMPLE</option>
<option value="NO CUMPLE" <?php if (!(strcmp("NO CUMPLE", htmlentities($row_resp['respuesta'], ENT_COMPAT, '')))) {echo "SELECTED";} ?>>NO CUMPLE</option>
<option value="NO APLICA" <?php if (!(strcmp("NO APLICA", htmlentities($row_resp['respuesta'], ENT_COMPAT, '')))) {echo "SELECTED";} ?>>NO APLICA</option>
</select>
</td>
<tr class="info">
<td colspan="1"> 


<strong>Escribe tu justificación aquí:</strong>
<input class="plan_input" type="text" name="observacion" value="<?php echo $row_resp['observacion']; ?>" placeholder="Observación" onchange="this.form.submit()" />
<input type="hidden" name="idplan_auditoria" value="<?php echo $row_plan_auditoria['idplan_auditoria']; ?>" />
<input type="hidden" name="idpregunta" value="<?php echo $row_pregunta['idpregunta']; ?>" />
<input type="hidden" name="MM_insert" value="form1" />
</td> 
</form> 
</tr>

         
<?php }}}
 ?>
</table>
  </div>
  </div>
</fieldset>
