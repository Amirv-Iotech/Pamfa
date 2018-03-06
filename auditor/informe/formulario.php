<? require_once('../../Connections/inforgan_pamfa.php');
if(!session_start())
{
	session_start();
}
?>

<? 
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



mysql_select_db($database_pamfa, $inforgan_pamfa);

 include("includes/header.php");
  include("cerebro.php");?>
<?

if(isset($_GET['idinforme'])){ $_POST['idinforme']=$_GET['idinforme'];
}
$query_cliente = "SELECT idoperador FROM solicitud where idsolicitud='".$_POST['idsolicitud']."'";
$cliente = mysql_query($query_cliente, $inforgan_pamfa) or die(mysql_error());
$row_cliente= mysql_fetch_assoc($cliente);

$query_operador = sprintf("SELECT * FROM operador WHERE idoperador=%s", GetSQLValueString( $row_cliente["idoperador"], "int"));
$operador = mysql_query($query_operador, $inforgan_pamfa) or die(mysql_error());
$row_operador= mysql_fetch_assoc($operador);


	$query_solicitud = "SELECT * FROM solicitud where idsolicitud='".$_POST['idsolicitud']."'";
$solicitud = mysql_query($query_solicitud, $inforgan_pamfa) or die(mysql_error());
$row_solicitud= mysql_fetch_assoc($solicitud);

$query_plan_auditoria = sprintf("SELECT * FROM plan_auditoria WHERE idsolicitud=%s ", GetSQLValueString( $_POST['idsolicitud'], "int"));
$plan_auditoria = mysql_query($query_plan_auditoria, $inforgan_pamfa) or die(mysql_error());
$row_plan_auditoria= mysql_fetch_assoc($plan_auditoria);

$query_inf = sprintf("SELECT * FROM informe WHERE idinforme=%s ", GetSQLValueString( $_POST["idinforme"], "int"));
$inf= mysql_query($query_inf, $inforgan_pamfa) or die(mysql_error());
$row_inf= mysql_fetch_assoc($inf);
/// totales

$tot_nc=0;
$tot_ncm=0;
$tot_nco=0;
$total=0;
if($_POST['idformato']==1)
{
$query_preg = "SELECT idpregunta FROM preguntas_catalogos WHERE idformato=1 and nivel='mayor'" ;
$preg= mysql_query($query_preg, $inforgan_pamfa) or die(mysql_error());
//$row_preg= mysql_fetch_assoc($preg);
$nm = mysql_num_rows($preg);

 while($row_preg= mysql_fetch_assoc($preg)){
	 
	 $query_r = "SELECT respuesta FROM catalogos_respuestas WHERE idpregunta='".$row_preg['idpregunta']."'" ;
$r= mysql_query($query_r, $inforgan_pamfa) or die(mysql_error());
$row_r= mysql_fetch_assoc($r);
if($row_r['respuesta']=='NO CUMPLE'){$tot_nc++;}
 }

$query_preg2 = "SELECT idpregunta FROM preguntas_catalogos WHERE idformato=1 and nivel='menor'" ;
$preg2= mysql_query($query_preg2, $inforgan_pamfa) or die(mysql_error());
//$row_preg2= mysql_fetch_assoc($preg2);
$nme = mysql_num_rows($preg2);

 while($row_preg2= mysql_fetch_assoc($preg2)){
	 
	 $query_r = "SELECT respuesta FROM catalogos_respuestas WHERE idpregunta='".$row_preg2['idpregunta']."'" ;
$r= mysql_query($query_r, $inforgan_pamfa) or die(mysql_error());
$row_r= mysql_fetch_assoc($r);
if($row_r['respuesta']=='NO CUMPLE'){$tot_ncm++;}
 }

$query_preg3 = "SELECT idpregunta FROM preguntas_catalogos WHERE idformato=1 and nivel='recom'" ;
$preg3= mysql_query($query_preg3, $inforgan_pamfa) or die(mysql_error());
//$row_preg3= mysql_fetch_assoc($preg3);
$nco = mysql_num_rows($preg3);

 while($row_preg3= mysql_fetch_assoc($preg3)){
	 
	 $query_r = "SELECT respuesta FROM catalogos_respuestas WHERE idpregunta='".$row_preg3['idpregunta']."'" ;
$r= mysql_query($query_r, $inforgan_pamfa) or die(mysql_error());
$row_r= mysql_fetch_assoc($r);
if($row_r['respuesta']=='NO CUMPLE'){$tot_nco++;}
 }
/// respuesta

$total=$tot_nc+$tot_ncm+$tot_nco;
}

////////

if($_POST['idformato']==2)
{
$query_preg = "SELECT idpregunta FROM preguntas_catalogos WHERE idformato=2 and nivel='mayor'" ;
$preg= mysql_query($query_preg, $inforgan_pamfa) or die(mysql_error());
//$row_preg= mysql_fetch_assoc($preg);
$nm = mysql_num_rows($preg);

 while($row_preg= mysql_fetch_assoc($preg)){
	 
	 $query_r = "SELECT respuesta FROM catalogos_respuestas WHERE idpregunta='".$row_preg['idpregunta']."'" ;
$r= mysql_query($query_r, $inforgan_pamfa) or die(mysql_error());
$row_r= mysql_fetch_assoc($r);
if($row_r['respuesta']=='NO CUMPLE'){$tot_nc++;}
 }

$query_preg2 = "SELECT idpregunta FROM preguntas_catalogos WHERE idformato=2 and nivel='menor'" ;
$preg2= mysql_query($query_preg2, $inforgan_pamfa) or die(mysql_error());
//$row_preg2= mysql_fetch_assoc($preg2);
$nme = mysql_num_rows($preg2);

 while($row_preg2= mysql_fetch_assoc($preg2)){
	 
	 $query_r = "SELECT respuesta FROM catalogos_respuestas WHERE idpregunta='".$row_preg2['idpregunta']."'" ;
$r= mysql_query($query_r, $inforgan_pamfa) or die(mysql_error());
$row_r= mysql_fetch_assoc($r);
if($row_r['respuesta']=='NO CUMPLE'){$tot_ncm++;}
 }

$query_preg3 = "SELECT idpregunta FROM preguntas_catalogos WHERE idformato=2 and nivel='recom'" ;
$preg3= mysql_query($query_preg3, $inforgan_pamfa) or die(mysql_error());
//$row_preg3= mysql_fetch_assoc($preg3);
$nco = mysql_num_rows($preg3);

 while($row_preg3= mysql_fetch_assoc($preg3)){
	 
	 $query_r = "SELECT respuesta FROM catalogos_respuestas WHERE idpregunta='".$row_preg3['idpregunta']."'" ;
$r= mysql_query($query_r, $inforgan_pamfa) or die(mysql_error());
$row_r= mysql_fetch_assoc($r);
if($row_r['respuesta']=='NO CUMPLE'){$tot_nco++;}
 }
/// respuesta

$total=$tot_nc+$tot_ncm+$tot_nco;
}


?>
<div class="content">
    <div class="row" id="form_plan_aud" style="background-color: #ecfbe7; padding: 0px;">
        <div class="col-lg-12 col-xs-12" style="padding: 0px;">

<input type="hidden" id="ruta" name="ruta" value="<? echo "tabla.php?idplan_auditoria=". $row_plan_auditoria['idplan_auditoria']."";?>" />
<input type="hidden" name="ruta2" id="ruta2" value="<? echo "tabla2.php?idplan_auditoria=". $row_plan_auditoria['idplan_auditoria']."";?>">
<input type="hidden" id="ruta3" name="ruta3" value="<? echo "tabla_anexo_alm.php?idinforme=".$row_inf["idinforme"]."";?>">

            <form id="myform" action="#seccion1" method="post" class="form-horizontal" enctype="multipart/form-data">
               <div class="col-xs-12 col-lg-12" style="background-color: #dbf573e6; padding: 0px;">
                  <h3 align="center">DATOS DEL CLIENTE</h3>
                  
                </div>
               
                <div class="col-lg-12 col-xs-12 datos">
                    <label class="col-lg-3 col-xs-3">Expediente:</label>
                    <div class="col-lg-9 col-xs-9" >
                    <input  disabled   class=" plan_input" id="nombre_legal" name="nombre_legal" type="text"  value="<? echo $_POST['idsolicitud'];?>" /></div>
                </div>
                <div class="col-lg-12 col-xs-12 datos">
                    <label class="col-lg-3 col-xs-3">Duración:</label>
                    <div class="col-xs-9 col-lg-9">
                    <input disabled  class=" plan_input" id="direccion" name="direccion" value="<? echo $row_inf['duracion']."Horas";?>"   /></div>
                </div>
               
               
             
                <div class="col-lg-12 col-xs-12 datos">                                
                    <label class="col-lg-3 col-xs-3">Tipo de auditoria:</label>  
                    <div class="col-lg-9 col-xs-9">  
                    
                    <input disabled class="plan_input" id="procesadora" name="procesadora" type="text" value="<? if ($row_plan_auditoria['tipo']==1){echo "Certificación"; }else if ($row_plan_auditoria['tipo']==2){echo "Re-certificación"; }else if ($row_plan_auditoria['tipo']==3){echo "Vigilancia(No anunciada)";}else if ($row_plan_auditoria['tipo']==4){echo "Extraordinaria";}else if ($row_plan_auditoria['tipo']==5){echo "Ampliación";}else if ($row_plan_auditoria['tipo']==6){echo "Reducción";}?>" />
                    </div>
                </div>   <?  $query_prod = sprintf("SELECT * FROM cultivos WHERE idsolicitud=%s order by idcultivos", GetSQLValueString( $_POST["idsolicitud"], "int"));
                      $prod = mysql_query($query_prod, $inforgan_pamfa) or die(mysql_error());
					  
					 
$array = array();
$array2 = array();
$c=0;
 $productos="";
 
 $empaque=0;
 
 $cosecha=0;
while($row_prod= mysql_fetch_assoc($prod))
{
	
	$array[$c]=$row_prod['producto'];
	$array2[$c]=$row_prod['ubicacion_unidad'];
	if($row_prod['cosecha_recoleccion']==1){$cosecha=1;}
	if($row_prod['empaque']==1){$empaque=1;}
	$c++;
}
$a1="";$a2="";
$productos=$array[0].",";
$pmu=$array2[0].",";
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
					  $pmu=$pmu.$array2[$rr].",";
					  
					  }?>
                
                <div class="col-lg-12 col-xs-12 datos">
                    <label class="col-lg-3 col-xs-3">Producto(s) presentes en la inspección</label>
                   
                      <div class="col-lg-9 col-xs-9">
                      <input disabled class="plan_input" id="producto" name="producto" type="text" value="<? echo $productos;?>"  />
                      </div>
                </div>
                
                  <div class="col-lg-12 col-xs-12 datos">
                    <label class="col-lg-3 col-xs-3">Rancho/PMU</label>
                   
                      <div class="col-lg-9 col-xs-9">
                      <input disabled class="plan_input" id="pmu" name="pmu" type="text" value="<? echo $productos;?>"  />
                      </div>
                </div>
                <input id="idsolicitud" type="hidden" name="idsolicitud" value="<? echo $_POST['idsolicitud']; ?>" /> 
                
            </form>
          
        
    </div>
     


<?php  include("seccion6.php");?>


 <div class="col-xs-12 col-lg-12" style="background-color: #dbf573e6; padding: 0px;">
                  <h3 align="center">  El objetivo de la presente auditoría es verificar la conformidad del productor respecto al Reglamento General y los Puntos de Control y Criterios de Cumplimiento de la versión 4.0</h3>
                					

                </div>
    <div class="row" id="form_plan_aud" style="background-color: #ecfbe7; padding: 0px;">
        <div class="col-lg-12 col-xs-12" style="padding: 0px;">

<div class="col-lg-12 col-xs-12 "><br />
<label> Al último día de la auditoría el productor ha obtenido los siguientes resultados:					
</label><br />
                    <label class="col-lg-3 col-xs-3">Incumplimientos MAYORES	
: </label>
                    <div class="col-lg-2 col-xs-2">
                    <input  class="plan_input" id="nc_plazo" name="nc_plazo" type="text" value="<? echo $tot_nc;?>" />
                    </div>
                     <label class="col-lg-2 col-xs-2">MAYORES	
: </label>
                    <div class="col-lg-2 col-xs-2">
                    <input  class="plan_input" id="nc_plazo" name="nc_plazo" type="text" value="<? echo $nm;?>"  />
                    </div>
                    <label class="col-lg-1 col-xs-1">de:	
: </label>
                    <div class="col-lg-1 col-xs-1">
                    <input  class="plan_input" id="nc_plazo" name="nc_plazo" type="text" value="<? echo $nm;?>" />
                    </div>
                    </div>
                    <div class="col-lg-12 col-xs-12 ">

                    <label class="col-lg-3 col-xs-3">Incumplimientos menores	
: </label>
                    <div class="col-lg-2 col-xs-2">
                    <input  class="plan_input" id="nc_plazo" name="nc_plazo" type="text" value="<? echo  $tot_ncm;?>" />
                    </div>
                     <label class="col-lg-2 col-xs-2">menores	
: </label>
                    <div class="col-lg-2 col-xs-2">
                    <input  class="plan_input" id="nc_plazo" name="nc_plazo" type="text" value="<? echo  $nme; ?>" />
                    </div>
                    </div>
                     <div class="col-lg-12 col-xs-12 ">

                    <label class="col-lg-3 col-xs-3">Incumplimientos recomendaciones	
: </label>
                    <div class="col-lg-2 col-xs-2">
                    <input  class="plan_input" id="nc_plazo" name="nc_plazo" type="text" value="<? echo  $tot_nco;?>" />
                    </div>
                    <label class="col-lg-2 col-xs-2">Recomendaciones	
: </label>
                    <div class="col-lg-2 col-xs-2">
                    <input  class="plan_input" id="nc_plazo" name="nc_plazo" type="text" value="<? echo $nco;?>"  />
                    </div>
                    </div>
                   <div class="col-lg-12 col-xs-12 "> &nbsp;</div>
                    <div class="col-lg-12 col-xs-12 ">

                    <label class="col-lg-3 col-xs-3">Num. máx de NC menores abiertas: </label>
                    <div class="col-lg-3 col-xs-3">
                    <input   class="plan_input" id="max_nc_men" name="max_nc_men" type="text" value="<? echo $row_inf['max_nc_men'];?>" onchange="<?php echo 'ginf('.$row_inf['idinforme'].')'?>" />
                    </div>
                    
                    </div>
                    
                     <div class="col-lg-12 col-xs-12 "> &nbsp;</div>
                    <div class="col-lg-12 col-xs-12 ">

                    <label class="col-lg-3 col-xs-3">Aspectos destacables: </label>
                    <div class="col-lg-9 col-xs-9">
                    <textarea   class="plan_input" id="aspectos" name="aspectos" onchange="<?php echo 'ginf('.$row_inf['idinforme'].')'?>"><? echo $row_inf['aspectos'];?></textarea>
                    </div>
                    
                    </div>
                     <div class="col-lg-12 col-xs-12 "> &nbsp;</div>
                    <div class="col-lg-12 col-xs-12 ">

                    <label class="col-lg-3 col-xs-3">Oportunidades de mejora: </label>
                    <div class="col-lg-9 col-xs-9">
                    <textarea  class="plan_input" id="mejora" name="mejora" onchange="<?php echo 'ginf('.$row_inf['idinforme'].')'?>"><? echo $row_inf['mejora'];?> </textarea>
                    </div>
                    
                    </div>
                    </div>
                     
                     </div>
                     <?php include("seccion7.php");?>
                     </div>

<?php include("includes/footer.php");?>


<script type="text/javascript">
  function guarda3() 
  {         
            var seccion =8;
            var nc_plazo =  $('#nc_plazo').val();
			var port_tecnico =  $('#port_tecnico').val();
          
            var idplan_auditoria =$('#idplan_auditoria').val();
         
                    $.ajax({
                        url:"cerebro.php",
                        method:"POST",
                        data:{seccion:seccion, nc_plazo:nc_plazo, port_tecnico:port_tecnico ,idplan_auditoria:idplan_auditoria},
                        success: function() {
                         // $('#tabla_ajax').load(ruta);
                          //$('#tabla_ajax2').load(ruta2);
                        }

                    });

  }
</script>
<script type="text/javascript">
  function ginf(ele) 
  {         
            var seccion =88;
            var max_nc_men =  $('#max_nc_men').val();
			var aspectos =  $('#aspectos').val();
			var mejora =  $('#mejora').val();
          
            var idinforme =ele;
			
         alert(idinforme);
                    $.ajax({
                        url:"cerebro.php",
                        method:"POST",
                        data:{seccion:seccion,max_nc_men:max_nc_men,aspectos:aspectos,mejora:mejora,idinforme:idinforme},
                        success: function() {
                         // $('#tabla_ajax').load(ruta);
                          //$('#tabla_ajax2').load(ruta2);
                        }

                    });

  }
</script>
<script type="text/javascript">
  function guardarTabla(ele) 
  {         
            var seccion =6;
            var idauditor =  $('#idauditor'+ele).val();
          
            var idplan_auditoria =$('#idplan_auditoria').val();
            var rol = $('#rol'+ele).val();
			
            var ruta = $('#ruta').val();
            var ruta2= $('#ruta2').val();
                    $.ajax({
                        url:"cerebro.php",
                        method:"POST",
                        data:{seccion:seccion, idauditor:idauditor, rol:rol, idplan_auditoria:idplan_auditoria},
                        success: function() {
                          $('#tabla_ajax').load(ruta);
                          //$('#tabla_ajax2').load(ruta2);
                        }

                    });

  }
</script>
<script type="text/javascript">
  function guardarTabla2(ele) 
  {         
            var seccion =7;
           
          var h_inicio =  $('#h_inicio'+ele).val();
          
            var h_fin =$('#h_fin'+ele).val();
            var idlista_portada =ele;
           
            var ruta = $('#ruta').val();
            var ruta2= $('#ruta2').val();
                    $.ajax({
                        url:"cerebro.php",
                        method:"POST",
                        data:{seccion:seccion, idlista_portada:idlista_portada, h_inicio:h_inicio,h_fin:h_fin},
                        success: function() {
                          //$('#tabla_ajax').load(ruta);
                          $('#tabla_ajax2').load(ruta2);
                        }

                    });

  }
</script>
<script type="text/javascript">
/*

  $("#agregar").click(function() {
    var fecha =$('#fecha').val();
    var horario =$('#horario').val();
    var actividad =$('#actividad').val();
    var responsable =$('#responsable').val();
    var auditor="";
	 var valor="";
	 var porNombre13=document.getElementById("auditor2");
            for(var i=0;i<porNombre13.length;i++)
              {
                if(porNombre13[i].selected){
               valor=porNombre13[i].value+', '+valor;}
              }
	 auditor=valor;
  
    var idplan_auditoria =$('#idplan_auditoria').val();
    var seccion=7;
    var idsolicitud =$('#idsolicitud').val();
    var insertar =$('#insertar').val();
    var ruta2 = $('#ruta2').val();
    alert(fecha);
                $.ajax({  
                     url:"cerebro.php",  
                     method:"POST",
                    data:{seccion:seccion, idplan_auditoria:idplan_auditoria, idsolicitud:idsolicitud, insertar:insertar, fecha:fecha, horario:horario, actividad:actividad, responsable:responsable, auditor:auditor},
                  success: function() { 
                            $('#tabla_ajax2').load(ruta2); //Recargamos la Tabla(Para que se muestren los Nuevos Resultados)
        }
    });
  });*/

</script>




