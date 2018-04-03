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


	
$query_plan_auditoria = sprintf("SELECT * FROM plan_auditoria WHERE idsolicitud=%s ", GetSQLValueString( $_POST['idsolicitud'], "int"));
$plan_auditoria = mysql_query($query_plan_auditoria, $inforgan_pamfa) or die(mysql_error());
$row_plan_auditoria= mysql_fetch_assoc($plan_auditoria);

$query_pol = sprintf("SELECT * FROM lista_politicas WHERE idplan_auditoria=%s ", GetSQLValueString( $row_plan_auditoria['idplan_auditoria'], "int"));
$pol = mysql_query($query_pol, $inforgan_pamfa) or die(mysql_error());
$row_pol= mysql_fetch_assoc($pol);

$id="";
if($row_pol['idplan_auditoria']==NULL)
{
	$insertSQL= sprintf("INSERT INTO lista_politicas (idplan_auditoria ) VALUES(%s)",
		GetSQLValueString($_POST['idplan_auditoria'], "text"));
  $Result1 = mysql_query($insertSQL, $inforgan_pamfa) or die(mysql_error());
	}
	
////////
?>
<div class="content" >
 
    <div class="row" id="form_plan_aud" style="background-color: #ecfbe7; padding: 0px;">
        <div class="col-lg-12 col-xs-12" style="padding: 0px;">
         <div class="col-lg-1 col-xs-1 datos">
         </div>
<form id="myform" action="#seccion1" method="post" class="form-horizontal" enctype="multipart/form-data">
               <div class="col-xs-10 col-lg-10" style="background-color: #dbf573e6; padding: 0px;" >
                  <h3 ><strong>DECLARACIÓN SOBRE POLÍTICAS DE INOCUIDAD ALIMENTARIA </strong> Un productor podrá usar esta plantilla o cualquier otro formato para cumplir con AF 15.1																													
</h3>
                </div>
                 <div class="col-lg-1 col-xs-11 datos">
                 </div>
                
                <div class="col-lg-12 col-xs-12 datos">
                    <label class="col-lg-3 col-xs-3">Nombre de la empresa:</label>
                    <div class="col-lg-9 col-xs-9" >
                    <input disabled="disabled"     class=" plan_input" id="nombre_legal" name="nombre_legal" type="text" title="Nombre completo" value="<? echo $row_operador['nombre_legal'];?>" /></div>
                </div>
                
                <div class="col-lg-12 col-xs-12 datos">
                    <label  class="col-lg-3 col-xs-5">Nombre del administrador o dueño:</label>
                    <div class="col-xs-7 col-lg-9">
                    <input  disabled="disabled"   class=" plan_input" id="direccion" name="direccion" value="<? echo $row_operador['nombre_representante'];?>"  title="Dirección"  /></div>
                </div>
                  <div class="col-lg-12 col-xs-12 datos">
                    <label class="col-lg-3 col-xs-3">Firma:</label>
                    <div class="col-lg-3 col-xs-3" >
                    <input      class=" plan_input" id="firma" name="firma" type="text" value="<? echo $row_pol['firma'];?>" /></div>
                
            
                    <label class="col-lg-1 col-xs-1">Fecha:</label>
                    <div class="col-xs-5 col-lg-5">
                    <input    class=" plan_input" id="fecha" name="fecha" value="<? echo $row_pol['fecha'];?>"  title="Dirección"  /></div>
                </div>
               <div class="col-lg-12 col-xs-12 ">
                    <label >Nos comprometemos a asegurar la implementación y el mantenimiento de  la inocuidad alimentaria en todos nuestros procesos de producción: desde antes de plantar hasta el momento en que se despacha el producto. <br />																													
Esto se logra de la siguiente manera: 	<br />																												
1. CUMPLIMIENTO E IMPLEMENTACIÓN DE LA LEGISLACIÓN RELEVANTE<br />																													
2. IMPLEMENTACIÓN DE LAS BUENAS PRÁCTICAS AGRÍCOLAS Y CERTIFICACIÓN BAJO LA NORMA GLOBALG.A.P. PARA ASEGURAMIENTO INTEGRADO DE FINCAS V5.0	<br />																												
																													
Todo nuestro personal recibió formación en temas de inocuidad alimentaria e higiene (véase Capítulo AF.3).  El personal es controlado estrictamente para asegurar de que se implementen las prácticas.	<br />																												
La(s) siguiente(s) persona(s) son responsables por la inocuidad alimentaria		<br />																											
</label>
                    </div>
                    <div class="col-lg-12 col-xs-12 ">
                  
                    </div> <div class="col-lg-12 col-xs-12 ">
                  
                    </div> <div class="col-lg-12 col-xs-12 ">
                  
                    </div>
                 <div class="col-lg-12 col-xs-12 ">
                    <label ><strong>DURANTE LA PRODUCCIÓN: 	</strong>							
																												
</label>
                    </div>
                    <div class="col-lg-12 col-xs-12 datos">
                    <label class="col-lg-3 col-xs-3">Nombre:</label>
                    <div class="col-lg-9 col-xs-9" >
                    <input      class=" plan_input" id="nombre_prod" name="nombre_prod" type="text" title="Nombre completo" value="<? echo $row_pol['nombre_prod'];?>" onchange="guarda3()" /></div>
                </div>
                
                <div class="col-lg-12 col-xs-12 datos">
                    <label class="col-lg-3 col-xs-3">Designación :</label>
                    <div class="col-xs-9 col-lg-9">
                    <input    class=" plan_input" id="desig_prod" name="desig_prod" value="<? echo  $row_pol['desig_prod'];?>" onchange="guarda3()" /></div>
                </div>
                <div class="col-lg-12 col-xs-12 datos">
                    <label class="col-lg-3 col-xs-3">Remplazo:</label>
                    <div class="col-lg-9 col-xs-9" >
                    <input      class=" plan_input" id="remp_prod" name="remp_prod" type="text" t value="<? echo $row_pol['remp_prod'];?>" onchange="guarda3()"/></div>
                </div>
                
                <div class="col-lg-12 col-xs-12 ">
                  
                    </div> <div class="col-lg-12 col-xs-12 ">
                  
                    </div> <div class="col-lg-12 col-xs-12 ">
                  
                    </div>
                 <div class="col-lg-12 col-xs-12 ">
                    <label ><strong>En caso de ser otra la persona responsable DURANTE LA COSECHA (CULTIVOS) PARA ASEGURAR QUE SÓLO SE COSECHEN PRODUCTOS INOCUOS DE ACUERDO A LA NORMA:																													
 	</strong>							
																												
</label>
                    </div>
                    <div class="col-lg-12 col-xs-12 datos">
                    <label class="col-lg-3 col-xs-3">Nombre:</label>
                    <div class="col-lg-9 col-xs-9" >
                    <input      class=" plan_input" id="nombre_cosecha" name="nombre_cosecha" type="text" value="<? echo $row_pol['nombre_cosecha'];?>" onchange="guarda3()"/></div>
                </div>
                
                <div class="col-lg-12 col-xs-12 datos">
                    <label class="col-lg-3 col-xs-3">Designación :</label>
                    <div class="col-xs-9 col-lg-9">
                    <input    class=" plan_input" id="desig_cosecha" name="desig_cosecha" value="<? echo $row_pol['desig_cosecha'];?>" onchange="guarda3()"   /></div>
                </div>
                <div class="col-lg-12 col-xs-12 datos">
                    <label class="col-lg-3 col-xs-3">Remplazo:</label>
                    <div class="col-lg-9 col-xs-9" >
                    <input      class=" plan_input" id="remp_cosecha" name="remp_cosecha" type="text"  value="<? echo $row_pol['remp_cosecha'];?>" onchange="guarda3()" /></div>
                </div>
                 <div class="col-lg-12 col-xs-12 ">
                  
                    </div> <div class="col-lg-12 col-xs-12 ">
                  
                    </div> <div class="col-lg-12 col-xs-12 ">
                  
                    </div>
                 <div class="col-lg-12 col-xs-12 ">
                    <label ><strong>En caso de ser otra la persona responsable DURANTE LA MANIPULACIÓN DEL PRODUCTO PARA ASEGURAR  QUE SE CUMPLEN LOS PROCEDIMIENTOS DE DESPACHO DE ACUERDO A LA NORMA: 																													
	</strong>							
																												
</label>
                    </div>
                    <div class="col-lg-12 col-xs-12 datos">
                    <label class="col-lg-3 col-xs-3">Nombre:</label>
                    <div class="col-lg-9 col-xs-9" >
                    <input      class=" plan_input" id="nombre_manip" name="nombre_manip" type="text" title="Nombre completo" value="<? echo$row_pol['nombre_manip'];?>" onchange="guarda3()"/></div>
                </div>
                
                <div class="col-lg-12 col-xs-12 datos">
                    <label class="col-lg-3 col-xs-3">Designación :</label>
                    <div class="col-xs-9 col-lg-9">
                    <input    class=" plan_input" id="desig_manip" name="desig_manip" value="<? echo $row_pol['desig_manip'];?>"   onchange="guarda3()"/></div>
                </div>
                <div class="col-lg-12 col-xs-12 datos">
                    <label class="col-lg-3 col-xs-3">Remplazo:</label>
                    <div class="col-lg-9 col-xs-9" >
                    <input      class=" plan_input" id="remp_manip" name="remp_manip" type="text"  value="<? echo $row_pol['remp_manip'];?>" onchange="guarda3()"/></div>
                </div>
                 <div class="col-lg-12 col-xs-12 ">
                    <label ><strong>LA INFORMACIÓN DE CONTACTO LAS 24 HORAS EN EL EVENTO DE UNA EMERGENCIA CON RESPECTO A LA INOCUIDAD ALIMENTARIA ES LA SIGUIENTE: 																													
																													
	</strong>							
																												
</label>
                    </div>
                    <div class="col-lg-12 col-xs-12 datos">
                    <label class="col-lg-3 col-xs-3">Teléfono:</label>
                    <div class="col-lg-9 col-xs-9" >
                    <input      class=" plan_input" id="tel" name="tel" type="text" title="Teléfono" value="<? echo $row_pol['tel'];?>" onchange="guarda3()"/></div>
                </div>
                <div class="col-lg-12 col-xs-12 ">
                  
                    </div> <div class="col-lg-12 col-xs-12 ">
                  
                    </div> <div class="col-lg-12 col-xs-12 ">
                  
                    </div>
                 <div class="col-lg-12 col-xs-12 ">
                    <label >La implementación de GLOBALG.A.P. se basa en la identificación de los riesgos y peligros.  Se revisarán anualmente las actividades de mitigación de estos riesgos para asegurar que las mismas continúan siendo apropiadas, adecuadas y eficaces.																													
																													
							
																												
</label>
                    </div>
              
            </form>
           <input id="idlista_politicas" type="hidden" name="idlista_politicas" value="<? echo $row_pol['idlista_politicas']; ?>" /> 
            <input id="idplan_auditoria" type="hidden" name="idplan_auditoria" value="<? echo $row_pol['idplan_auditoria']; ?>" /> 
        

                    </div>
                     </div>
                      </div>

<?php include("includes/footer.php");?>


<script type="text/javascript">
  function guarda3() 
  {         
            var seccion =9;
			 var idlista_politicas =  $('#idlista_politicas').val();
			
            var nombre_prod =  $('#nombre_prod').val();
			var desig_prod =  $('#desig_prod').val();
			var remp_prod =  $('#remp_prod').val();
			
			  var nombre_cosecha =  $('#nombre_cosecha').val();
			var desig_cosecha =  $('#desig_cosecha').val();
			var remp_cosecha=  $('#remp_cosecha').val();
			
			  var nombre_manip =  $('#nombre_manip').val();
			var desig_manip =  $('#desig_manip').val();
			var remp_manip =  $('#remp_manip').val();
			var tel =  $('#tel').val();
          
            var idplan_auditoria =$('#idplan_auditoria').val();
         
                    $.ajax({
                        url:"cerebro.php",
                        method:"POST",
                        data:{seccion:seccion,idlista_politicas:idlista_politicas,nombre_prod:nombre_prod,desig_prod:desig_prod,remp_prod:remp_prod,nombre_cosecha:nombre_cosecha,desig_cosecha:desig_cosecha,remp_cosecha:remp_cosecha,nombre_manip:nombre_manip,desig_manip:desig_manip,remp_manip:remp_manip,tel:tel,idplan_auditoria:idplan_auditoria},
                        success: function() {
                         // $('#tabla_ajax').load(ruta);
                          //$('#tabla_ajax2').load(ruta2);
                        }

                    });

  }
</script>
