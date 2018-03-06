
<?php require_once('../../Connections/inforgan_pamfa.php');
 include("cerebro.php");
  
 	//consulta todas las nc
	

 /*$query_pr = "SELECT ban,idpregunta,idformato,numero,texto,nivel from preguntas_catalogos where idpregunta in(select idpregunta from catalogos_respuestas where respuesta='no cumple' AND idpregunta in(SELECT idpregunta FROM preguntas_catalogos WHERE idformato='".$_POST['idformato']."' and nivel='mayor' or nivel='menor' or nivel='recom'))";
*/ 
$query_pr = " SELECT * FROM catalogos_respuestas
INNER JOIN preguntas_catalogos 
ON (catalogos_respuestas.idpregunta=preguntas_catalogos.idpregunta)
WHERE catalogos_respuestas.respuesta='no cumple' and preguntas_catalogos.idformato='".$_POST['idformato']."' and (preguntas_catalogos.nivel='mayor' or preguntas_catalogos.nivel='menor' or  preguntas_catalogos.nivel='recom')";
 

?>
<div class="table-responsive">
<table class="table table-hover">
<thead>
  <th >
                    <label><strong>Requisito:</strong></label>
                  

  </th>
  <th>
                  <label><strong>Punto de control</strong></label>

  </th>
  <th>
                  <label><strong>Nivel de nc</strong></label>

  </th>
  <th>
                  <label><strong>Incumplimiento</strong></label>

  </th>
  <th>
                  <label><strong>Evidencia/s Valoracion AACC, Fecha e cierre</strong></label>

  </th>
  <th>
                  <label><strong>NOTAS</strong></label>

  </th>
  <th>
                  <label><strong>Anexo</strong></label>

  </th>
 
  <th><strong>Guardar</strong></th>
</thead>
<tbody>
<?
                    $pr = mysql_query($query_pr,  $inforgan_pamfa) or die(mysql_error());
					$cont=0;
                    while ($row_pr = mysql_fetch_assoc($pr)) {
                   $query_res = "SELECT * from informe_nc where idinforme='".$_POST['idinforme']."' and idpregunta='".$row_pr['idpregunta']."'";
				   
				    $res = mysql_query($query_res,  $inforgan_pamfa) or die(mysql_error());
 $row_res = mysql_fetch_assoc($res);
 
                            ?>
                           
                            <tr>
                              <td> 
            <? echo $row_pr['numero']; ?>
            
                              </td>

                           <td> 
                                <? if($row_pr['ban']==NULL){ echo utf8_encode( $row_pr['texto']);} else {  echo $row_pr['texto'];} ?>
                              </td>

<td> 
                                   <? echo $row_pr['nivel']; ?>
                              </td>
<td> 
                                   <textarea  disabled="disabled"class="form-control inputsf" id="<? echo "pp4".$cont ?>" name="p4" > <? echo $row_res['nc']; ?> </textarea>                             </td>
<td> 
                                   <textarea disabled="disabled" class="form-control inputsf" id="<? echo "pp5".$cont ?>" name="p5" > <? echo $row_res['evidencia']; ?> </textarea> 
                                  </td>
                                  <td> 
                                    <textarea  class="form-control inputsf" id="<? echo "notas".$cont ?>" name="notas" > <? echo $row_res['notas']; ?> </textarea>  
                              </td>
                                <td> 
                                    <textarea  class="form-control inputsf" id="<? echo "anexo".$cont ?>" name="anexo" > <? echo $row_res['anexo']; ?> </textarea>  
                              </td>

                               <td>
                         
                         
                         
						  <? if(isset($_GET['idinforme'])){ ?><input type="hidden" id="idinforme" name="idinforme" value="<? echo $_GET['idinforme']; ?>" /> <? }else{?> <input type="hidden" id="idinforme" name="idinforme" value="<? echo $row_inf['idinforme']; ?>" /> <? }?>
                                
                          <button type="button"   name="act1" id="<?php echo 'act1'.$cont; ?>" value="<?php echo $row_anexo_e['idanexo_e']; ?>" onclick="<?php echo 'el4'.$cont.'('.$row_pr['idpregunta'].')'?>" >Agregar</button>
                        
                         
                              </td>
                            </tr>                                               
<? 
 
?>
<script type="text/javascript"> 
	<?php echo 'function el4'.$cont.'(ele){
	
	var seccion=12;
	var idpregunta=ele;

	var idinforme = $("#idinforme").val();
	 
	 var p1 = $("#pp1'.$cont.'").val();
				
				var notas = $("#notas'.$cont.'").val();
			    var anexo = $("#anexo'.$cont.'").val();
    		 
	 
	 $.ajax({
		 url:"cerebro.php",
		 method:"POST",
		 data:{seccion:seccion,idinforme:idinforme,idpregunta:idpregunta,notas:notas,anexo,anexo},
		 success: function() {
			
			 }
			 });
	}
	
	';
	?>
	   //Recargamos la Tabla(Para que se muestren los Nuevos Resultados)

</script>
<script type="text/javascript"> 

 <? echo '

$(document).ready(function(){  
   $("#act1'.$cont.'").click(function() { '; echo '
    var idanexo_e = $("#act1'.$cont.'").val();
    });    
});';?>
			</script>
 
<?
$cont++;} ?>
</tbody>
</table>
</div>
 