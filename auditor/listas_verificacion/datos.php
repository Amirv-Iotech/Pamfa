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


$query_cliente = "SELECT idoperador FROM solicitud where idsolicitud='".$_POST['idsolicitud']."'";
$cliente = mysql_query($query_cliente, $inforgan_pamfa) or die(mysql_error());
$row_cliente= mysql_fetch_assoc($cliente);

$query_operador = sprintf("SELECT * FROM operador WHERE idoperador=%s", GetSQLValueString( $row_cliente["idoperador"], "int"));
$operador = mysql_query($query_operador, $inforgan_pamfa) or die(mysql_error());
$row_operador= mysql_fetch_assoc($operador);


	$query_solicitud = "SELECT * FROM solicitud where idsolicitud='".$_POST['idsolicitud']."'";
$solicitud = mysql_query($query_solicitud, $inforgan_pamfa) or die(mysql_error());
$row_solicitud= mysql_fetch_assoc($solicitud);

$query_proc = "SELECT * FROM procesadora where idsolicitud='".$_POST['idsolicitud']."'";
$proc = mysql_query($query_proc, $inforgan_pamfa) or die(mysql_error());
$row_proc= mysql_fetch_assoc($proc);

if($_POST['idformato']==3 || $_POST['idformato']==4||$_POST['idformato']==5	||$_POST['idformato']==6){
$query_solicitud_mex = "SELECT * FROM solicitud_mexcalsup where idsolicitud='".$_POST['idsolicitud']."'";
$solicitud_mex = mysql_query($query_solicitud_mex, $inforgan_pamfa) or die(mysql_error());


$mex_alcance="";
$mex_pliego="";
	while($row_solicitud_mex= mysql_fetch_assoc($solicitud_mex)){
		
		$query_mex = "SELECT * FROM mex_cal_sup where idmex_cal_sup='".$row_solicitud_mex['idmex_alcance']."'";
$mex = mysql_query($query_mex, $inforgan_pamfa) or die(mysql_error());
$row_mex= mysql_fetch_assoc($mex);

if($row_mex['alcance']!=NULL)
{
	$mex_alcance=$row_mex['descripcion'].",".$mex_alcance;	
}
	$query_mex = "SELECT * FROM mex_cal_sup where  idmex_cal_sup='".$row_solicitud_mex['idmex_pliego']."'";
$mex = mysql_query($query_mex, $inforgan_pamfa) or die(mysql_error());
$row_mex= mysql_fetch_assoc($mex);
if($row_mex['pliego']!=NULL)
{

	$mex_pliego=$row_mex['descripcion'].",".$mex_pliego;
}
		
	}
	
}else{
	
	
	$query_solicitud_esq = sprintf("SELECT * FROM solicitud_esquema WHERE idsolicitud=%s order by idsolicitud_esquema asc limit 1", GetSQLValueString($row_solicitud["idsolicitud"], "int"));
$solicitud_esq = mysql_query($query_solicitud_esq, $inforgan_pamfa) or die(mysql_error());
$row_solicitud_esq= mysql_fetch_assoc($solicitud_esq);
	
	$query_gap = "SELECT * FROM esquemas where  idesquema='".$row_solicitud_esq['esq_tipo1_op1']."' limit 1";
$gap = mysql_query($query_gap, $inforgan_pamfa) or die(mysql_error());
$row_gap= mysql_fetch_assoc($gap);


	$gap_esquema=$row_gap['esquema'].",".$mex_pliego;

		
	}


$query_procesadora = sprintf("SELECT * FROM procesadora WHERE idsolicitud=%s ", GetSQLValueString( $_POST['idsolicitud'], "int"));
$procesadora = mysql_query($query_procesadora, $inforgan_pamfa) or die(mysql_error());
$row_procesadora= mysql_fetch_assoc($procesadora);

$query_plan_auditoria = sprintf("SELECT * FROM plan_auditoria WHERE idsolicitud=%s ", GetSQLValueString( $_POST['idsolicitud'], "int"));
$plan_auditoria = mysql_query($query_plan_auditoria, $inforgan_pamfa) or die(mysql_error());
$row_plan_auditoria= mysql_fetch_assoc($plan_auditoria);

$query_alcance = sprintf("SELECT descripcion FROM mex_cal_sup WHERE idmex_cal_sup=%s ", GetSQLValueString( $row_solicitud["idmex_alcance"], "int"));
$alcance = mysql_query($query_alcance, $inforgan_pamfa) or die(mysql_error());
$row_alcance= mysql_fetch_assoc($alcance);




////////
?>
<div class="content" >
    <div class="row" id="form_plan_aud" style="background-color: #ecfbe7; padding: 0px;">
        <div class="col-lg-12 col-xs-12" style="padding: 0px;">

<input type="hidden" id="ruta" name="ruta" value="<? echo "tabla.php?idplan_auditoria=". $row_plan_auditoria['idplan_auditoria']."";?>" />
<input type="hidden" name="ruta2" id="ruta2" value="<? echo "tabla2.php?idplan_auditoria=". $row_plan_auditoria['idplan_auditoria']."";?>">

            <form id="myform" action="#seccion1" method="post" class="form-horizontal" enctype="multipart/form-data">
               <div class="col-xs-12 col-lg-12" style="background-color: #dbf573e6; padding: 0px;">
                  <h3 align="center">Lista de verificación</h3>
                </div>
                <div class="col-xs-12 col-lg-12" style="text-align: center;">
                    <p><b>DATOS DEL CLIENTE</b></p>
                </div>
                <div class="col-lg-12 col-xs-12 datos">
                    <label class="col-lg-3 col-xs-3">Razón social:</label>
                    <div class="col-lg-9 col-xs-9" >
                    <input  disabled   class=" plan_input" id="nombre_legal" name="nombre_legal" type="text" title="Nombre completo" value="<? echo $row_operador['nombre_legal'];?>" /></div>
                </div>
                <div class="col-lg-12 col-xs-12 datos">
                    <label class="col-lg-3 col-xs-3">Dirección de la entidad legal: calle y número:</label>
                    <div class="col-xs-9 col-lg-9">
                    <input disabled  class=" plan_input" id="direccion" name="direccion" value="<? echo $row_operador['direccion'].",".$row_operador['colonia'].",".$row_operador['cp'].",".$row_operador['municipio'].",".$row_operador['estado'];?>"  title="Dirección"  /></div>
                </div>
               
                <div class="col-lg-12 col-xs-12 datos">
                    <label class="col-lg-3 col-xs-3">Nombre del representante legal:</label>
                    <div class="col-lg-9 col-xs-9">
                    <input disabled class="plan_input" id="email" name="email" type="text" value="<? echo $row_operador['nombre_representante'];?>"  title="Nombre " />
                    </div>
                </div>
                 <div class="col-lg-12 col-xs-12 datos">
                    <label class="col-lg-3 col-xs-3">Nombre de la persona responsable de implementar la norma:</label>
                    <div class="col-lg-9 col-xs-9">
                    <input class="plan_input" id="port_tecnico" name="port_tecnico" type="text" value="<? echo $row_plan_auditoria['port_tecnico'];?>"  title="Nombre " onchange="guarda3()" />
                    </div>
                </div>
                <div class="col-lg-12 col-xs-12 datos">
                    <label class="col-lg-3 col-xs-3">Correo Electrónico:</label>
                    <div class="col-lg-9 col-xs-9">
                   
                    
                     <input disabled class="plan_input" id="email" name="email" type="text" value="<? echo $row_operador['email'];?>"  title="Email" />
                    </div>
                </div>
                <div class="col-lg-12 col-xs-12 datos">
                    <label class="col-lg-3 col-xs-3">Teléfono:</label>
                    <div class="col-lg-9 col-xs-9">
                    <input disabled class="plan_input" id="telefono" name="telefono" type="text" title="Telefono " value="<? echo $row_operador['telefono'];?>"  />
                    </div>
                </div>
                
               
                <div class="col-lg-12 col-xs-12 datos">
                    
                   
                   
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
                 <div class="col-lg-12 col-xs-12 ">                                
                    <label class="col-lg-3 col-xs-3">Opción y producto(s) del alcance:</label>  
                    <div class="col-lg-4 col-xs-4">  
                   <textarea disabled class="plan_input" id="alcance" name="alcance" ><? echo $gap_esquema;?></textarea>
                    </div>
                 
                     <div class="col-lg-5 col-xs-5">  
                    <input disabled class="plan_input" id="pliego" name="pliego" type="text"  value="<? echo $row_plan_auditoria['alcance']; ;?>" />
                    </div>
                </div>
                
                <div class="col-lg-12 col-xs-12 datos">
                    <label class="col-lg-3 col-xs-3">Producto(s) presentes en la inspección</label>
                   
                      <div class="col-lg-9 col-xs-9">
                      <input disabled class="plan_input" id="producto" name="producto" type="text" value="<? echo $productos;?>"  />
                      </div>
                </div>
               
                <div class="col-lg-12 col-xs-12">
                </div>
                <div class="col-lg-12 col-xs-12">
                </div>
            </form>
           <input id="idsolicitud" type="hidden" name="idsolicitud" value="<? echo $_POST['idsolicitud']; ?>" /> 
           
        </div>
    </div>
</div>

<?php  include("seccion6.php");?>
<?php  include("seccion7.php");?>
 
  <input id="idp" type="hidden" name="idp" value="<? echo $row_plan_auditoria['idplan_auditoria'];?>"/>

    <div class="row" id="form_plan_aud" style="background-color: #ecfbe7; padding: 0px;">
        <div class="col-lg-12 col-xs-12" style="padding: 0px;">

<div class="col-lg-12 col-xs-12 datos">
                    <label class="col-lg-3 col-xs-3">PLAZO DE CIERRE DE NC
(indicar plazo de cierre): </label>
                    <div class="col-lg-9 col-xs-9">
                    <input  class="plan_input" id="nc_plazo" name="nc_plazo" type="text" value="<? echo $row_plan_auditoria['nc_plazo'];?>"  placeholder="RESUMEN DE NO CONFORMIDADES: El plazo de envío y cierre de las no conformidades es de ____ días.				
"  onchange="guarda3()" />
                    </div>
                    </div>
                    </div>

<?php include("includes/footer.php");?>



<script type="text/javascript">
  function guarda3() 
  {         
            var seccion =8;
			var seccion2 =77;
            var nc_plazo =  $('#nc_plazo').val();
			var port_tecnico =  $('#port_tecnico').val();
          var duracion=$('#duracion').val();
			var idp=$('#idp').val();
            var idplan_auditoria =$('#idplan_auditoria').val();
         
                    $.ajax({
                        url:"cerebro.php",
                        method:"POST",
                        data:{seccion:seccion, nc_plazo:nc_plazo, port_tecnico:port_tecnico ,idplan_auditoria:idplan_auditoria,duracion:duracion,idp:idp},
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
			 var seccion2 =77;
           
          var h_inicio =  $('#h_inicio'+ele).val();
          
            var h_fin =$('#h_fin'+ele).val();
            var idlista_portada =ele;
			 var idlista_portada2 =ele;
			var duracion=$('#duracion').val();
			var idp=$('#idp').val();
           
            var ruta = $('#ruta').val();
            var ruta2= $('#ruta2').val();
                    $.ajax({
                        url:"cerebro.php",
                        method:"POST",
                        data:{seccion:seccion,seccion2:seccion2, idlista_portada:idlista_portada,idlista_portada2:idlista_portada2, h_inicio:h_inicio,h_fin:h_fin,duracion:duracion,idp:idp},
                        success: function() {
                          //$('#tabla_ajax').load(ruta);
                          $('#tabla_ajax2').load(ruta2);
						  //alert(duracion);
                        }

                    });

  }
</script>
<script type="text/javascript">
  function guardarTabla4(ele) 
  {         
           
			 var seccion2 =77;
           
         
          
			 var idp =ele;
			var duracion=$('#duracion').val();
			
                    $.ajax({
                        url:"cerebro.php",
                        method:"POST",
                        data:{seccion2:seccion2, duracion:duracion,idp:idp},
                        success: function() {
                          //$('#tabla_ajax').load(ruta);
                         
                        }

                    });

  }
</script>

<script>
window.addEventListener("beforeunload", function(event) { 

 var seccion2 =77;
           
         alert("hola");
          
			 var idp =ele;
			var duracion=$('#duracion').val();
			
                    $.ajax({
                        url:"cerebro.php",
                        method:"POST",
                        data:{seccion2:seccion2, duracion:duracion,idp:idp},
                        success: function() {
                          //$('#tabla_ajax').load(ruta);
                         
                        }

                    });


});
</script>


