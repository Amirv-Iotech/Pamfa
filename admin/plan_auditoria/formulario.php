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
	
	$query_srrc = "SELECT * FROM solicitud_srrc where idsolicitud='".$_POST['idsolicitud']."'";
$srrc = mysql_query($query_srrc, $inforgan_pamfa) or die(mysql_error());
$row_srrc= mysql_fetch_assoc($srrc);
	
	
	$query_solicitud_mexcalsup = "SELECT * FROM solicitud_mexcalsup where idsolicitud='".$_POST['idsolicitud']."'";
$solicitud_mexcalsup= mysql_query($query_solicitud_mexcalsup, $inforgan_pamfa) or die(mysql_error());
$mcs=0;
while($row_solicitud_mexcalsup= mysql_fetch_assoc($solicitud_mexcalsup))
{
	if ($row_solicitud_mexcalsup['idmex_alcance']!=NULL  || $row_solicitud_mexcalsup['idmex_pliego']!=NULL)
	{
		$mcs=1;
	}
}
	
	

$query_cert_anterior = sprintf("SELECT * FROM cert_anterior WHERE idsolicitud=%s order by idcert_anterior asc limit 1", GetSQLValueString( $row_solicitud["idsolicitud"], "int"));
$cert_anterior = mysql_query($query_cert_anterior, $inforgan_pamfa) or die(mysql_error());
$row_cert_anterior= mysql_fetch_assoc($cert_anterior);

$query_solicitud_esq = sprintf("SELECT * FROM solicitud_esquema WHERE idsolicitud=%s order by idsolicitud_esquema asc limit 1", GetSQLValueString($row_solicitud["idsolicitud"], "int"));
$solicitud_esq = mysql_query($query_solicitud_esq, $inforgan_pamfa) or die(mysql_error());
$row_solicitud_esq= mysql_fetch_assoc($solicitud_esq);

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
                  <h3 align="center">Plan de auditoria de certificación</h3>
                </div>
                <div class="col-xs-12 col-lg-12" style="text-align: center;">
                    <p><b>DATOS DEL CLIENTE</b></p>
                </div>
                <div class="col-lg-12 col-xs-12 datos">
                    <label class="col-lg-2 col-xs-3">Razón social:</label>
                    <div class="col-lg-10 col-xs-9" >
                    <input  disabled   class=" plan_input" id="nombre_legal" name="nombre_legal" type="text" title="Nombre completo" value="<? echo $row_operador['nombre_legal'];?>" /></div>
                </div>
                <div class="col-lg-12 col-xs-12 datos">
                    <label class="col-lg-2 col-xs-5">Dirección,calle y número:</label>
                    <div class="col-xs-4 col-lg-4">
                    <input disabled  class=" plan_input" id="direccion" name="direccion" value="<? echo $row_operador['direccion'];?>"  title="Dirección"  /></div>
                    <label class="col-lg-1 col-xs-3">Colonia:</label>
                    <div class="col-lg-2 col-xs-9">
                    <input disabled class="plan_input" id="colonia" name="colonia" value="<? echo $row_operador['colonia'];?>"  title="Colonia " />
                    </div>
                     <label class="col-lg-1 col-xs-3">C.P.:</label>
                    <div class="col-lg-2 col-xs-9">
                    <input  disabled class="plan_input" id="cp" name="cp" type="text" title="Codigo postal " value="<? echo $row_operador['cp'];?>"  />
                    </div>
                </div>
               
                
                <div class="col-lg-12 col-xs-12 datos">
                     <label class="col-lg-2 col-xs-3">Municipio:</label>
                     <div class="col-lg-4 col-xs-9">
                      <input disabled class="plan_input" id="municipio" name="municipio" type="text" title="Estado " value="<? echo $row_operador['municipio'];?>" />
                      </div>
                      <label class="col-lg-2 col-xs-3">Estado:</label>
                      <div class="col-lg-4 col-xs-9">
                      <input disabled class="plan_input" id="estado" name="estado" type="text" title="Estado " value="<? echo $row_operador['estado'];?>" />
                      </div>
                </div>
               
                <div class="col-lg-12 col-xs-12 datos">
                    <label class="col-lg-2 col-xs-3">Teléfono/Fax:</label>
                    <div class="col-lg-4 col-xs-9">
                    <input disabled class="plan_input" id="telefono" name="telefono" type="text" title="Telefono " value="<? echo $row_operador['telefono'];?>"  />
                    </div>
                    <label class="col-lg-2 col-xs-3">Email:</label>
                    <div class="col-lg-4 col-xs-9">
                   
                    
                     <input disabled class="plan_input" id="nombre_representante" name="nombre_representante" type="text" value="<? echo $row_operador['email'];?>"  title="Email" />
                    </div>
                </div>
                
                <div class="col-lg-12 col-xs-12 datos">
                    <label class="col-lg-3 col-xs-3">Nombre del representante autorizado de la empresa:</label>
                    <div class="col-lg-9 col-xs-9">
                    <input disabled class="plan_input" id="email" name="email" type="text" value="<? echo $row_operador['nombre_representante'];?>"  title="Nombre " />
                    </div>
                </div>
               
                <div class="col-lg-12 col-xs-12 datos">                                
                    <label class="col-lg-2 col-xs-3">Centro de manipulación:</label>  
                    <div class="col-lg-4 col-xs-9">  
                    <input disabled class="plan_input" id="procesadora" name="procesadora" type="text" title="Estado " value="<? echo $row_procesadora['empresa'];?>" />
                    </div>
                    <label class="col-lg-2 col-xs-3">Producto:</label>
                    <?  $query_prod = sprintf("SELECT * FROM cultivos WHERE idsolicitud=%s order by idcultivos", GetSQLValueString( $_POST["idsolicitud"], "int"));
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
					 
					  }?>
                      <div class="col-lg-4 col-xs-9">
                      <input disabled class="plan_input" id="producto" name="producto" type="text" title="Telefono " value="<? echo $productos;?>"  />
                      </div>
                </div>
               
                <div class="col-lg-12 col-xs-12 datos">
                    <label class="col-lg-2 col-xs-3">Fecha_emision:</label>
                     <div class="col-lg-4 col-xs-9">
                     <input class="plan_input" id="fecha_emision" name="fecha_emision" type="date" value="<? echo $row_plan_auditoria['fecha_emision'];?>"  title="Nombre " />
                    </div>
                    <label class="col-lg-2 col-xs-3">Fecha_auditoria:</label>
                    <div class="col-lg-4 col-xs-9">
                    <input type="date" placeholder="" class="plan_input" id="fecha_auditoria" name="fecha_auditoria" value="<? echo $row_plan_auditoria['fecha_auditoria'];?>"  title="Nombre " />
                    </div>
                </div>
               
                <div class="col-lg-12 col-xs-12 datos" >
                    <input id="idsolicitud" type="hidden" name="idsolicitud" value="<? echo $_POST['idsolicitud']; ?>" /><input type="hidden" name="idoperador" value="<? echo $row_operador['idoperador']; ?>" />
                  
                    <input type="hidden" name="seccion" value="5" />
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
<?php  include("seccion5.php");?>
<?php  include("seccion6.php");?>
<input class="btn btn-info" type="button" name="anexo" value="Mas información..." id="anexo" />
<?php  include("seccion7.php");?>

<?php include("includes/footer.php");?>

<script type="text/javascript"> 

 <? echo '

$(document).ready(function(){  
    $("#anexo").click(function() { '; echo '
 if (!$("#mas").is(":visible"))
   $("#mas").show();
else   
   $("#mas").hide();';
	echo ' 
    });    
});';?>
			</script>
<script>
window.addEventListener("beforeunload", function(event) {    
var procesadora =$('#procesadora').val();
var producto =$('#producto').val();
var fecha_emision =$('#fecha_emision').val();
var fecha_auditoria =$('#fecha_auditoria').val();

 var tipo1="";
            var porNombre=document.getElementsByName("tipo1");
            for(var i=0;i<porNombre.length;i++)
              {
                if(porNombre[i].checked){
                tipo1=porNombre[i].value;}
              }

var rancho_invernadero =$('#rancho_invernadero').val();
var superficie =$('#superficie').val();
var producto_proce =$('#producto_proce').val();
var manip =$('#manip').val();
var esq1 =$('#esq1').val();
var num_pgfs =$('#num_pgfs').val();
var num_pamfa =$('#num_pamfa').val();
var num_globalgg =$('#num_globalgg').val();
var num_coc =$('#num_coc').val();
var prod =$('#prod').val()
var otro =$('#otro').val();
var objetivo =$('#objetivo').val();
var alcance =$('#alcance').val();
var criterio =$('#criterio').val();
var idioma_aud =$('#idioma_aud').val();
var idioma_inf =$('#idioma_inf').val();
var idsolicitud =$('#idsolicitud').val();
var idplan_auditoria =$('#idplan_auditoria').val();

var idsolicitud_esquema =$('#idsolicitud_esquema').val();
var seccion =5;
            
            {  
                $.ajax({  
                     url:"cerebro.php",  
                     method:"POST",
                    data:{procesadora:procesadora, producto:producto, fecha_emision:fecha_emision, fecha_auditoria:fecha_auditoria, tipo1:tipo1, rancho_invernadero:rancho_invernadero, superficie:superficie, producto_proce:producto_proce, manip:manip, esq1:esq1, num_pgfs:num_pgfs, num_pamfa:num_pamfa, num_globalgg:num_globalgg, num_coc:num_coc, prod:prod, otro:otro, objetivo:objetivo, alcance:alcance, criterio:criterio, idioma_aud:idioma_aud, idioma_inf:idioma_inf, idsolicitud:idsolicitud,idplan_auditoria:idplan_auditoria, idsolicitud_esquema:idsolicitud_esquema, seccion:5},
                     dataType:"text",  
                      success:function(data)  
                     {  
                          event.returnValue = "AnthonySS";
                  

   }  
                });  
           }

 
});
</script>

<script type="text/javascript">
  function guardarTabla(ele) 
  {         
            var seccion =6;
            var idusuario = ele.options[ele.selectedIndex].value;
            var usuario = ele.name;
            var idplan_auditoria =$('#idplan_auditoria').val();
            var idsolicitud = $('#idsolicitud').val();
            var ruta = $('#ruta').val();
            var ruta2= $('#ruta2').val();
                    $.ajax({
                        url:"cerebro.php",
                        method:"POST",
                        data:{seccion:seccion, idusuario:idusuario, usuario:usuario, idplan_auditoria:idplan_auditoria, idsolicitud:idsolicitud},
                        success: function() {
                          $('#tabla_ajax').load(ruta);
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


<script>

var count = 0;
$( "body" ).on( "click", "#agregar", function() {
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
               valor=porNombre13[i].value+', '+valor;
			  }
              }
			  var tam=valor.length-2;
			  
			  var valr=valor.substr(0,tam)
	 auditor=valr;
    var idplan_auditoria =$('#idplan_auditoria').val();
    var seccion=7;
    var idsolicitud =$('#idsolicitud').val();
    var insertar =$('#insertar').val();
    var ruta2 = $('#ruta2').val();
                $.ajax({  
                     url:"cerebro.php",  
                     method:"POST",
                    data:{seccion:seccion, idplan_auditoria:idplan_auditoria, idsolicitud:idsolicitud, insertar:insertar, fecha:fecha, horario:horario, actividad:actividad, responsable:responsable, auditor:auditor},
                  success: function() { 
                            $('#tabla_ajax2').load(ruta2); //Recargamos la Tabla(Para que se muestren los Nuevos Resultados)
        }
    });

});
</script>

