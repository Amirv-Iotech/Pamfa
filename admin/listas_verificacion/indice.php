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

$query_notas = sprintf("SELECT * FROM lista_notas WHERE idplan_auditoria=%s ", GetSQLValueString( $row_plan_auditoria['idplan_auditoria'], "int"));
$notas = mysql_query($query_notas, $inforgan_pamfa) or die(mysql_error());
$row_notas= mysql_fetch_assoc($notas);

$id="";
if($row_notas['idplan_auditoria']==NULL)
{
	$insertSQL= sprintf("INSERT INTO lista_notas (idplan_auditoria ) VALUES(%s)",
		GetSQLValueString($_POST['idplan_auditoria'], "text"));
  $Result1 = mysql_query($insertSQL, $inforgan_pamfa) or die(mysql_error());
	}
	
////////
 if($_POST['idformato']==1 || $_POST['idformato']==2){?>
<div class="content" >
 
    <div class="row" id="form_plan_aud" style="background-color: #ecfbe7; padding: 0px;">
        <div class="col-lg-12 col-xs-12" style="padding: 0px;">
         <div class="col-lg-1 col-xs-1 ">
         </div>
<form id="myform" action="#seccion1" method="post" class="form-horizontal" enctype="multipart/form-data">
               <div class="col-xs-10 col-lg-10" style="background-color: #dbf573e6; padding: 0px;" >
                  <h3 ><strong>INDICACIONES PARA LAS INSPECCIONES 																												
 </strong> (para toda inspección externa e interna):																														
</h3>
                </div>
                 <div class="col-lg-1 col-xs-11 ">
                 </div>
                  <div class="col-lg-12 col-xs-12 ">
                    <label ><br />1.  SE DEBEN INSPECCIONAR TODOS LOS PUNTOS DE CONTROL. POR DEFECTO TODOS SON APLICABLES SALVO QUE SE DECLARE LO CONTRARIO.<br />																																																			
2.   LOS PUNTOS DE CONTROL DEBERÁN JUSTIFICARSE PARA  ASEGURAR EL SEGUIMIENTO DE LOS PASOS DE LA AUDITORÍA.<br />																																																		
3.  SIN EMBARGO, LA LISTA DE VERIFICACIÓN DE LA AUTOEVALUACIÓN (OPCIÓN 1) DEBERÁ CONTENER COMENTARIOS SOBRE LAS EVIDENCIAS OBSERVADAS CORRESPONDIENTES A TODOS LOS PUNTOS DE CONTROL NO CUMPLIDOS Y NO APLICABLES. <br />																																																			
4.  PARA LAS INSPECCIONES INTERNAS (OPCIÓN 1 PRODUCTOR MULTISITIO Y OPCIÓN 2) Y LAS INSPECCIONES EXTERNAS, SE DEBERÁN APORTAR COMENTARIOS SOBRE TODAS LAS OBLIGACIONES MAYORES, TODOS LOS PUNTOS INCUMPLIDOS Y TODAS LAS OBLIGACIONES MENORES NO APLICABLES, SALVO QUE SE INDIQUE LO CONTRARIO EN LA GUIA DE METODOLOGÍA DE INSPECCIÓN (CUANDO ESTÉ DISPONIBLE). LOS ORGANISMOS DE CERTIFICACIÓN DEBERÁN DOCUMENTAR LOS HALLAZGOS POSITIVOS CORRESPONDIENTES A LAS OBLIGACIONES MAYORES Y MENORES CUMPLIDAS, PARA PERMITIR EL SEGUIMIENTO DE LOS PASOS DE LA AUDITORÍA DESPUÉS DEL EVENTO.																																																			
	<br /><br />																																																		
																																																			
Se han agregado los criterios de cumplimiento a la Lista de Verificación para  tener la información completa y a modo de guía.	<br /><br />																																																		
																										
</label>
                    </div>
                
                <div class="col-lg-12 col-xs-12 ">
                    <label class="col-lg-2 col-xs-2">OPCIÓN 1
</label>
                    <div class="col-lg-1 col-xs-1" >
                     <input   type="checkbox" <? if ($row_notas['r1']==1){?> checked="checked"<? }?>  value="1" id="r1"  name="r1" onchange="guarda3()"/></div>
              
                    <label class="col-lg-2 col-xs-2">OPCIÓN 1 PRODUCTOR MULTISITIO SIN SGC

</label>
                    <div class="col-lg-1 col-xs-1" >
                     <input   type="checkbox" <? if ($row_notas['r1']==2){?> checked="checked"<? }?>  value="2" id="r1"  name="r1" onchange="guarda3()"/></div>
               
                    <label class="col-lg-2 col-xs-2">OPCIÓN 1 PRODUCTOR MULTISITIO CON SGC

</label>
                    <div class="col-lg-1 col-xs-1" >
                     <input   type="checkbox" <? if ($row_notas['r1']==3){?> checked="checked"<? }?>  value="3" id="r1"  name="r1" onchange="guarda3()"/></div>
                
                    <label class="col-lg-2 col-xs-2">OPCIÓN 2

</label>
                    <div class="col-lg-1 col-xs-1" >
                     <input   type="checkbox" <? if ($row_notas['r1']==4){?> checked="checked"<? }?>  value="4" id="r1"  name="r1" onchange="guarda3()"/></div>
                </div>
                 <div class="col-lg-12 col-xs-12 ">
                    <label class="col-lg-3 col-xs-3">TIPO DE INSPECCIÓN: 

</label>
                    <label class="col-lg-2 col-xs-2">ANUNCIADA

</label>
                    <div class="col-lg-1 col-xs-1" >
                     <input   type="checkbox" <? if ($row_notas['r2']==1){?> checked="checked"<? }?>  value="1" id="r2"  name="r2" onchange="guarda3()"/></div>
                     <label class="col-lg-2 col-xs-2">NO ANUNCIADA

</label>
                    <div class="col-lg-1 col-xs-1" >
                     <input   type="checkbox" <? if ($row_notas['r2']==2){?> checked="checked"<? }?>  value="2" id="r2"  name="r2" onchange="guarda3()"/></div>
                      <label class="col-lg-2 col-xs-2">OTRO

</label>
                    <div class="col-lg-1 col-xs-1" >
                     <input   type="checkbox" <? if ($row_notas['r2']==3){?> checked="checked"<? }?>  value="3" id="r2"  name="r2" onchange="guarda3()"/></div>
                </div>
                <div class="col-lg-12 col-xs-12 ">
                    <label  class="col-lg-7 col-xs-7">¿PARTICIPA EL PRODUCTOR EN EL PROGRAMA DE RECOMPENSAS NO-ANUNCIADAS? 
</label>
  <label class="col-lg-2 col-xs-2">SI


                    
                     <input   type="checkbox" <? if ($row_notas['r3']==1){?> checked="checked"<? }?>  value="1" id="r3"  name="r3" onchange="guarda3()"/></label>
                     <label class="col-lg-2 col-xs-2">NO


                   
                     <input   type="checkbox" <? if ($row_notas['r3']==2){?> checked="checked"<? }?>  value="2" id="r3"  name="r3" onchange="guarda3()"/></label>
                     <label class="col-lg-1 col-xs-1">NA

        
                     <input   type="checkbox" <? if ($row_notas['r3']==3){?> checked="checked"<? }?>  value="3" id="r3"  name="r3" onchange="guarda3()"/></label>
           
                  
                </div>
                
                  <div class="col-lg-12 col-xs-12 ">
                    <label class="col-lg-6 col-xs-6">¿RECURRE EL PRODUCTOR A UN ASESOR? 
</label>
                    <label class="col-lg-2 col-xs-2">SI

</label>
                    <div class="col-lg-1 col-xs-1" >
                     <input   type="checkbox" <? if ($row_notas['r4']==1){?> checked="checked"<? }?>  value="1" id="r4"  name="r4" onchange="guarda3()" /></div>
                     <label class="col-lg-2 col-xs-2">NO

</label>
                    <div class="col-lg-1 col-xs-1" >
                     <input   type="checkbox" <? if ($row_notas['r4']==2){?> checked="checked"<? }?>  value="2" id="r4"  name="r4" onchange="guarda3()"/></div>
                
            
                  
                </div>
                 <div class="col-lg-12 col-xs-12 ">
                    <label class="col-lg-6 col-xs-6">SI LA RESPUESTA ES SÍ, ¿ES EL ASESOR UN GLOBALG.A.P. LICENSED FARM ASSURER? 

</label>
                    <label class="col-lg-2 col-xs-2">SI

</label>
                    <div class="col-lg-1 col-xs-1" >
                     <input   type="checkbox" <? if ($row_notas['r5']==1){?> checked="checked"<? }?>  value="1" id="r5"  name="r5" onchange="guarda3()"/></div>
                     <label class="col-lg-2 col-xs-2">NO

</label>
                    <div class="col-lg-1 col-xs-1" >
                     <input   type="checkbox" <? if ($row_notas['r5']==2){?> checked="checked"<? }?>  value="2" id="r5"  name="r5" onchange="guarda3()"/></div>
                        
                </div>
              <div class="col-lg-12 col-xs-12 ">
                    <label class="col-lg-6 col-xs-6">SI LA RESPUESTA ES SÍ, ¿CUÁL ES EL NOMBRE DEL FARM ASSURER? 
</label>
                    
                    <div class="col-lg-6 col-xs-6" >
                    <input class="plan_input" type="text" name="nombre_asesor" id="nombre_asesor" value="<?php echo $row_notas['"nombre_asesor"']; ?>" placeholder="Nombre completo" onchange="guarda3()" /></div>
                   
                </div>
             
                  <div class="col-lg-12 col-xs-12 ">
                    <label  class="col-lg-6 col-xs-6">¿ESTÁ EL PRODUCTOR REGISTRADO PARA LA PRODUCCIÓN PARALELA? 

</label>
  <label class="col-lg-1 col-xs-1">SI


                    
                     <input   type="checkbox" <? if ($row_notas['r6']==1){?> checked="checked"<? }?>  value="1" id="r6"  name="r6" onchange="guarda3()"/></label>
                     <label class="col-lg-1 col-xs-1">NO


                   
                     <input   type="checkbox" <? if ($row_notas['r6']==2){?> checked="checked"<? }?>  value="2" id="r6"  name="r6" onchange="guarda3()"/></label>
                     
           
                  
                
                 <label  class="col-lg-2 col-xs-2">¿PARA LA PROPIEDAD PARALELA? 
 

</label>
  <label class="col-lg-1 col-xs-1">SI


                    
                     <input   type="checkbox" <? if ($row_notas['r7']==1){?> checked="checked"<? }?>  value="1" id="r7"  name="r7" onchange="guarda3()"/></label>
                     <label class="col-lg-1 col-xs-1">NO


                   
                     <input   type="checkbox" <? if ($row_notas['r7']==2){?> checked="checked"<? }?>  value="2" id="r7"  name="r7" onchange="guarda3()"/></label>
                     
           
                  
                </div> 
                <div class="col-lg-12 col-xs-12 ">
                    <label class="col-lg-6 col-xs-6">SI LA RESPUESTA ES SÍ, ¿PARA QUÉ PRODUCTOS?



</label>
                    
                    <div class="col-lg-6 col-xs-6" >
                    <input class="plan_input" type="text" name="productos1" id="productos1" value="<?php echo $row_notas['productos1']; ?>" placeholder="Productos" onchange="guarda3()" /></div>
                   
                </div>
               <div class="col-lg-12 col-xs-12 ">
                    <label class="col-lg-6 col-xs-6">¿EL PRODUCTOR COMPRA PRODUCTOS CERTIFICADOS DE FUENTES EXTERNAS?
</label>
                    <label class="col-lg-2 col-xs-2">SI
</label>
                    <div class="col-lg-1 col-xs-1" >
                     <input   type="checkbox" <? if ($row_notas['r8']==1){?> checked="checked"<? }?>  value="1" id="r8"  name="r8" onchange="guarda3()"/></div>
                     <label class="col-lg-2 col-xs-2">NO
</label>
                    <div class="col-lg-1 col-xs-1" >
                     <input   type="checkbox" <? if ($row_notas['r8']==2){?> checked="checked"<? }?>  value="2" id="r8"  name="r8" onchange="guarda3()"/></div> 
                </div>
                  <div class="col-lg-12 col-xs-12 ">
                    <label class="col-lg-6 col-xs-6">SI LA RESPUESTA ES SÍ, ¿PARA QUÉ PRODUCTOS?
</label>                   <div class="col-lg-6 col-xs-6" >
                    <input class="plan_input" type="text"  name="productos2" id="productos2" value="<?php echo $row_notas['productos2']; ?>" placeholder="Productos" onchange="guarda3()" /></div>
                   
                </div>
                 <div class="col-lg-12 col-xs-12 ">
                    <label class="col-lg-6 col-xs-6">¿SE REALIZA LA INSPECCIÓN EN COMBINACIÓN CON ALGUNA OTRA NORMA O ADD-ON? 

</label>
                    <label class="col-lg-2 col-xs-2">SI
</label>
                    <div class="col-lg-1 col-xs-1" >
                     <input   type="checkbox" <? if ($row_notas['r9']==1){?> checked="checked"<? }?>  value="1" id="r9"  name="r9" onchange="guarda3()"/></div>
                     <label class="col-lg-2 col-xs-2">NO
</label>
                    <div class="col-lg-1 col-xs-1" >
                     <input   type="checkbox" <? if ($row_notas['r9']==2){?> checked="checked"<? }?>  value="2" id="r9"  name="r9" onchange="guarda3()"/></div> 
                </div>
                  <div class="col-lg-12 col-xs-12 ">
                    <label class="col-lg-6 col-xs-6">SI LA RESPUESTA ES SÍ, ¿PARA QUÉ PRODUCTOS?
</label>                   <div class="col-lg-6 col-xs-6" >
                    <input class="plan_input" type="text"  name="productos3" id="productos3" value="<?php echo $row_notas['productos3']; ?>" placeholder="Productos"  onchange="guarda3()" /></div>
                   
                </div>
                 <div class="col-lg-12 col-xs-12 ">
                    <label class="col-lg-6 col-xs-6">¿SE OBSERVÓ LA COSECHA DEL PRODUCTO DURANTE LA INSPECCIÓN? 

</label>
                    <label class="col-lg-2 col-xs-2">SI
</label>
                    <div class="col-lg-1 col-xs-1" >
                     <input   type="checkbox" <? if ($row_notas['r10']==1){?> checked="checked"<? }?>  value="1" id="r10"  name="r10" onchange="guarda3()"/></div>
                     <label class="col-lg-2 col-xs-2">NO
</label>
                    <div class="col-lg-1 col-xs-1" >
                     <input   type="checkbox" <? if ($row_notas['r10']==2){?> checked="checked"<? }?>  value="2" id="r10"  name="r10" onchange="guarda3()"/></div> 
                </div>
                  <div class="col-lg-12 col-xs-12 ">
                    <label class="col-lg-6 col-xs-6">SI LA RESPUESTA ES SÍ, ¿PARA QUÉ PRODUCTOS?
</label>                   <div class="col-lg-6 col-xs-6" >
                    <input class="plan_input" type="text" name="productos4" id="productos4" value="<?php echo $row_notas['productos4']; ?>" placeholder="Productos" onchange="guarda3()"  /></div>
                   
                </div>
                 <div class="col-lg-12 col-xs-12 ">
                    <label class="col-lg-6 col-xs-6">¿SE OBSERVÓ LA MANIPULACIÓN DEL PRODUCTO DURANTE LA INSPECCIÓN? 

</label>
                    <label class="col-lg-2 col-xs-2">SI
</label>
                    <div class="col-lg-1 col-xs-1" >
                     <input   type="checkbox" <? if ($row_notas['r11']==1){?> checked="checked"<? }?>  value="1" id="r11"  name="r11" onchange="guarda3()"/></div>
                     <label class="col-lg-2 col-xs-2">NO
</label>
                    <div class="col-lg-1 col-xs-1" >
                     <input   type="checkbox" <? if ($row_notas['r11']==2){?> checked="checked"<? }?>  value="2" id="r11"  name="r11" onchange="guarda3()"/></div> 
                </div>
                  <div class="col-lg-12 col-xs-12 ">
                    <label class="col-lg-6 col-xs-6">SI LA RESPUESTA ES SÍ, ¿PARA QUÉ PRODUCTOS?
</label>                   <div class="col-lg-6 col-xs-6" >
                    <input class="plan_input" type="text" name="productos5" id="productos5" value="<?php echo $row_notas['productos5']; ?>" placeholder="Productos"  onchange="guarda3()" /></div>
                   
                </div>
                 <div class="col-lg-12 col-xs-12 ">
                    <label class="col-lg-6 col-xs-6">LISTA DE TODOS LOS PRODUCTOS PRESENTADOS DURANTE LA INSPECCIÓN: 

</label>                   <div class="col-lg-6 col-xs-6" >
                      <input class="plan_input" type="text" name="productos6" id="productos6" value="<?php echo $row_notas['productos6']; ?>" placeholder="Productos"  onchange="guarda3()" /></div>
                   
                </div>
                 <div class="col-lg-12 col-xs-12 ">
                    <label class="col-lg-6 col-xs-6">LUGAR(ES) VISITADOS: 

</label>                   <div class="col-lg-6 col-xs-6" >
                       <input class="plan_input" type="text" name="lugar" id="lugar" value="<?php echo $row_notas['lugar']; ?>" placeholder="Lugar"  onchange="guarda3()" /></div>
                   
                </div>
                 <div class="col-lg-12 col-xs-12 ">
                    <label class="col-lg-6 col-xs-6">DURACIÓN DE LA INSPECCIÓN: 

</label>                   <div class="col-lg-6 col-xs-6" >
                       <input class="plan_input" type="text" name="duracion" id="duracion" value="<?php echo $row_notas['duracion']; ?>" placeholder="Duración"  onchange="guarda3()" /></div>
                   
                </div>
                 <div class="col-lg-12 col-xs-12 ">
                    <label class="col-lg-6 col-xs-6">CÁLCULO DEL 95% DE CUMPLIMIENTO DE LAS OBLIGACIONES MENORES: 

</label>                   <div class="col-lg-6 col-xs-6" >
                       <input class="plan_input" type="text" name="calculo" id="calculo" value="<?php echo $row_notas['calculo']; ?>"   onchange="guarda3()" /></div>
                   
                </div>
              
                    
                
                <div class="col-lg-12 col-xs-12 ">
                    <label  class="col-lg-3 col-xs-3"><strong>NOMBRE DEL PRODUCTOR:     
</strong></label>
                    <div class="col-xs-9 col-lg-9">
                    <input  disabled="disabled"   class=" plan_input" id="direccion" name="direccion" value="<? echo $row_operador['nombre_legal'];?>"  onchange="guarda3()" /></div>
                </div>
                  <div class="col-lg-12 col-xs-12 ">
                    <label class="col-lg-3 col-xs-3">Firma:</label>
                    <div class="col-lg-3 col-xs-3" >
                    <input      class=" plan_input" id="firma_op" name="firma_op" type="text" value="<? echo $row_notas['firma_op'];?>" onchange="guarda3()"/></div>
                
            
                    <label class="col-lg-1 col-xs-1">Fecha:</label>
                    <div class="col-xs-5 col-lg-5">
                    <input    class=" plan_input" id="fecha_firma_op" name="fecha_firma_op" value="<? echo $row_notas['fecha_firma_op'];?>"  onchange="guarda3()"  /></div>
                </div>
                 <div class="col-lg-12 col-xs-12 ">
                    <label  class="col-lg-3 col-xs-3"><strong>NOMBRE DEL INSPECTOR/AUDITOR:  </strong></label>
                    <div class="col-xs-9 col-lg-9">
                    <input  disabled="disabled"   class=" plan_input" id="nombre_auditor" name="nombre_auditor" value="<? echo $row_operador['nombre_auditor'];?>"  title="Dirección"  /></div>
                </div>
                  <div class="col-lg-12 col-xs-12 ">
                    <label class="col-lg-3 col-xs-3">Firma:</label>
                    <div class="col-lg-3 col-xs-3" >
                    <input      class=" plan_input" id="firma_au" name="firma_au" type="text" value="<? echo $row_notas['firma_au'];?>" onchange="guarda3()"/></div>
                
            
                    <label class="col-lg-1 col-xs-1">Fecha:</label>
                    <div class="col-xs-5 col-lg-5">
                    <input    class=" plan_input" id="fecha_firma_au" name="fecha_firma_au" value="<? echo $row_notas['fecha_firma_au'];?>"  onchange="guarda3()"  /></div>
                </div>
            </form>
           <input id="idlista_politicas" type="hidden" name="idlista_politicas" value="<? echo $row_notas['idlista_politicas']; ?>" /> 
            <input id="idplan_auditoria" type="hidden" name="idplan_auditoria" value="<? echo $row_notas['idplan_auditoria']; ?>" onchange="guarda3()"/> 
        

                    </div>
                     </div>
                      </div>
<? } else {?>

<div class="content" >
 
    <div class="row" id="form_plan_aud" style="background-color: #ecfbe7; padding: 0px;">
        <div class="col-lg-12 col-xs-12" style="padding: 0px;">
         <div class="col-lg-1 col-xs-1 ">
         </div>
<form id="myform" action="#seccion1" method="post" class="form-horizontal" enctype="multipart/form-data">
               <div class="col-xs-10 col-lg-10" style="background-color: #dbf573e6; padding: 0px;" >
                  <h3 ><strong>INDICACIONES PARA LAS INSPECCIONES 																											
 </strong> (para toda inspección externa e interna):																														
</h3>
                </div>
                 <div class="col-lg-1 col-xs-11 ">
                 </div>
                  <div class="col-lg-12 col-xs-12 ">
                    <label ><br />1.  SE DEBEN INSPECCIONAR TODOS LOS PUNTOS DE CONTROL. POR DEFECTO TODOS SON APLICABLES SALVO QUE SE DECLARE LO CONTRARIO.<br />																																																			
2.   LOS PUNTOS DE CONTROL DEBERÁN JUSTIFICARSE PARA  ASEGURAR EL SEGUIMIENTO DE LOS PASOS DE LA AUDITORÍA.<br />																																																		
3.  SIN EMBARGO, LA LISTA DE VERIFICACIÓN DE LA AUTOEVALUACIÓN (OPCIÓN 1) DEBERÁ CONTENER COMENTARIOS SOBRE LAS EVIDENCIAS OBSERVADAS CORRESPONDIENTES A TODOS LOS PUNTOS DE CONTROL NO CUMPLIDOS Y NO APLICABLES. <br />																																																			
4.  SI LA RESPUESTA ES "NA", DEBE DARSE UNA JUSTIFICACIÓN.																																																			
	<br /><br />																																																		
																																																			
Se han agregado los criterios de cumplimiento a la Lista de Verificación para  tener la información completa y a modo de guía.	<br /><br />																																																		
																										
</label>
                    </div>
                
                
                 <div class="col-lg-12 col-xs-12 ">
                    <label class="col-lg-3 col-xs-3">TIPO DE INSPECCIÓN: 

</label>
                    <label class="col-lg-2 col-xs-2">ANUNCIADA

</label>
                    <div class="col-lg-1 col-xs-1" >
                     <input   type="checkbox" <? if ($row_notas['rc1']==1){?> checked="checked"<? }?>  value="1" id="rc1"  name="rc1" onchange="guarda4()"/></div>
                     <label class="col-lg-2 col-xs-2">NO ANUNCIADA

</label>
                    <div class="col-lg-1 col-xs-1" >
                     <input   type="checkbox" <? if ($row_notas['rc1']==2){?> checked="checked"<? }?>  value="2" id="rc1"  name="rc1" onchange="guarda4()"/></div>
                      <label class="col-lg-2 col-xs-2">OTRO

</label>
                    <div class="col-lg-1 col-xs-1" >
                     <input   type="checkbox" <? if ($row_notas['rc1']==3){?> checked="checked"<? }?>  value="3" id="rc1"  name="rc1" onchange="guarda4()"/></div>
                     
                        <label class="col-lg-2 col-xs-5">OPCIÓN 1

</label>
                    <div class="col-lg-1 col-xs-1" >
                     <input   type="checkbox" <? if ($row_notas['rc1']==4){?> checked="checked"<? }?>  value="4" id="rc1"  name="rc1" onchange="guarda4()"/></div>
                      <label class="col-lg-2 col-xs-5">OPCIÓN 1 con EXPLOTACIÓN MULTIPLE

</label>
                    <div class="col-lg-1 col-xs-1" >
                     <input   type="checkbox" <? if ($row_notas['rc1']==5){?> checked="checked"<? }?>  value="5" id="rc1"  name="rc1" onchange="guarda4()"/></div>
                </div>
               
                
                 
                  
                
                  
             
             
                  <div class="col-lg-12 col-xs-12 ">
                    <label  class="col-lg-6 col-xs-6">¿SE REALIZA ETIQUETADO O REETIQUETADO? 

</label>
  <label class="col-lg-1 col-xs-1">SI


                    
                     <input   type="checkbox" <? if ($row_notas['rc2']==1){?> checked="checked"<? }?>  value="1" id="rc2"  name="rc2" onchange="guarda4()"/></label>
                     <label class="col-lg-1 col-xs-1">NO


                   
                     <input   type="checkbox" <? if ($row_notas['rc2']==2){?> checked="checked"<? }?>  value="2" id="rc2"  name="rc2" onchange="guarda4()"/></label>
                     
  
                  
                </div> 
                
               <div class="col-lg-12 col-xs-12 ">
                    <label class="col-lg-6 col-xs-6">¿EN EL MOMENTO DE LA INSPECCIÓN CUENTA CON CERTIFICADO RECONOCIDO POR GFSI (PARA ETAPA POSTERIOR A LA EXPLOTACIÓN)?
</label>
                    <label class="col-lg-2 col-xs-2">SI
</label>
                    <div class="col-lg-1 col-xs-1" >
                     <input   type="checkbox" <? if ($row_notas['rc3']==1){?> checked="checked"<? }?>  value="1" id="rc3"  name="rc3" onchange="guarda4()"/></div>
                     <label class="col-lg-2 col-xs-2">NO
</label>
                    <div class="col-lg-1 col-xs-1" >
                     <input   type="checkbox" <? if ($row_notas['rc3']==2){?> checked="checked"<? }?>  value="2" id="rc3"  name="rc3" onchange="guarda4()"/></div> 
                </div>
                  
                 <div class="col-lg-12 col-xs-12 ">
                    <label class="col-lg-6 col-xs-6">LISTA DE TODOS LOS PRODUCTOS PRESENTADOS DURANTE LA INSPECCIÓN: 

</label>                   <div class="col-lg-6 col-xs-6" >
                      <input class="plan_input" type="text" name="coc_productos" id="coc_productos" value="<?php echo $row_notas['coc_productos']; ?>" placeholder="Productos"  onchange="guarda4()" /></div>
                   
                </div>
                 <div class="col-lg-12 col-xs-12 ">
                    <label class="col-lg-6 col-xs-6">LUGAR(ES) VISITADOS: 

</label>                   <div class="col-lg-6 col-xs-6" >
                       <input class="plan_input" type="text" name="coc_lugares" id="coc_lugares" value="<?php echo $row_notas['coc_lugares']; ?>" placeholder="Lugar"  onchange="guarda4()" /></div>
                   
                </div>
                 <div class="col-lg-12 col-xs-12 ">
                    <label class="col-lg-6 col-xs-6">DURACIÓN DE LA INSPECCIÓN: 

</label>                   <div class="col-lg-6 col-xs-6" >
                       <input class="plan_input" type="text" name="coc_duracion" id="coc_duracion" value="<?php echo $row_notas['coc_duracion']; ?>" placeholder="Duración"  onchange="guarda4()" /></div>
                   
                </div>
                 
              
                    
                
                <div class="col-lg-12 col-xs-12 ">
                    <label  class="col-lg-3 col-xs-3"><strong>NOMBRE DEL PRODUCTOR:     
</strong></label>
                    <div class="col-xs-9 col-lg-9">
                    <input  disabled="disabled"   class=" plan_input" id="direccion" name="direccion" value="<? echo $row_operador['nombre_legal'];?>"  onchange="guarda3()" /></div>
                </div>
                  <div class="col-lg-12 col-xs-12 ">
                    <label class="col-lg-3 col-xs-3">Firma:</label>
                    <div class="col-lg-3 col-xs-3" >
                    <input      class=" plan_input" id="coc_firma_op" name="coc_firma_op" type="text" value="<? echo $row_notas['coc_firma_op'];?>" onchange="guarda4()"/></div>
                
            
                    <label class="col-lg-1 col-xs-1">Fecha:</label>
                    <div class="col-xs-5 col-lg-5">
                    <input    class=" plan_input" id="coc_fecha_firma_op" name="coc_fecha_firma_op" value="<? echo $row_notas['coc_fecha_firma_op'];?>"  onchange="guarda4()"  /></div>
                </div>
                 <div class="col-lg-12 col-xs-12 ">
                    <label  class="col-lg-3 col-xs-3"><strong>NOMBRE DEL INSPECTOR/AUDITOR:  </strong></label>
                    <div class="col-xs-9 col-lg-9">
                    <input  disabled="disabled"   class=" plan_input" id="nombre_auditor" name="nombre_auditor" value="<? echo $row_operador['nombre_auditor'];?>"  title="Dirección"  /></div>
                </div>
                  <div class="col-lg-12 col-xs-12 ">
                    <label class="col-lg-3 col-xs-3">Firma:</label>
                    <div class="col-lg-3 col-xs-3" >
                    <input      class=" plan_input" id="coc_firma_au" name="coc_firma_au" type="text" value="<? echo $row_notas['coc_firma_au'];?>" onchange="guarda4()"/></div>
                
            
                    <label class="col-lg-1 col-xs-1">Fecha:</label>
                    <div class="col-xs-5 col-lg-5">
                    <input    class=" plan_input" id="coc_fecha_firma_au" name="coc_fecha_firma_au" value="<? echo $row_notas['coc_fecha_firma_au'];?>"  onchange="guarda4()"  /></div>
                </div>
            </form>
           <input id="idlista_politicas" type="hidden" name="idlista_politicas" value="<? echo $row_notas['idlista_politicas']; ?>" /> 
            <input id="idplan_auditoria" type="hidden" name="idplan_auditoria" value="<? echo $row_notas['idplan_auditoria']; ?>" onchange="guarda3()"/> 
        

                    </div>
                     </div>
                      </div>
<? }?>
<?php include("includes/footer.php");?>


<script type="text/javascript">
  function guarda3() 
  {         
            var seccion =10;
			 var idlista_politicas =  $('#idlista_politicas').val();
			  var productos1 =  $('#productos1').val();
			   var productos2 =  $('#productos2').val();
			    var productos3 =  $('#productos3').val();
				 var productos4 =  $('#productos4').val();
				  var productos5 =  $('#productos5').val();
				   var productos6 =  $('#productos6').val();
				  var lugar =  $('#lugar').val();
				 var duracion =  $('#duracion').val();
				  var calculo =  $('#calculo').val();
				  
				 
			
           var r1="";
            var porNombre1=document.getElementsByName("r1");
            for(var i=0;i<porNombre1.length;i++)
              {
                if(porNombre1[i].checked){
                r1=porNombre1[i].value;
				
				}
				
              }
			   var r2="";
            var porNombre2=document.getElementsByName("r2");
            for(var i=0;i<porNombre2.length;i++)
              {
                if(porNombre2[i].checked){
                r2=porNombre2[i].value;
				
				}
				
              }
			   var r3="";
            var porNombre3=document.getElementsByName("r3");
            for(var i=0;i<porNombre3.length;i++)
              {
                if(porNombre3[i].checked){
                r3=porNombre3[i].value;
				
				}
				
              }
			   var r4="";
            var porNombre4=document.getElementsByName("r4");
            for(var i=0;i<porNombre4.length;i++)
              {
                if(porNombre4[i].checked){
                r4=porNombre4[i].value;
				
				}
				
              }
			   var r5="";
            var porNombre5=document.getElementsByName("r5");
            for(var i=0;i<porNombre5.length;i++)
              {
                if(porNombre5[i].checked){
                r5=porNombre5[i].value;
				
				}
				
              }
			   var r6="";
            var porNombre6=document.getElementsByName("r6");
            for(var i=0;i<porNombre6.length;i++)
              {
                if(porNombre6[i].checked){
                r6=porNombre6[i].value;
				
				}
				
              }
			   var r7="";
            var porNombre7=document.getElementsByName("r7");
            for(var i=0;i<porNombre7.length;i++)
              {
                if(porNombre7[i].checked){
                r7=porNombre7[i].value;
				
				}
				
              }
			   var r8="";
            var porNombre8=document.getElementsByName("r8");
            for(var i=0;i<porNombre8.length;i++)
              {
                if(porNombre8[i].checked){
                r8=porNombre8[i].value;
				
				}
				
              }
			   var r9="";
            var porNombre9=document.getElementsByName("r9");
            for(var i=0;i<porNombre9.length;i++)
              {
                if(porNombre9[i].checked){
                r9=porNombre9[i].value;
				
				}
				
              }
			   var r10="";
            var porNombre10=document.getElementsByName("r10");
            for(var i=0;i<porNombre10.length;i++)
              {
                if(porNombre10[i].checked){
                r10=porNombre10[i].value;
				
				}
				
              }
			   var r11="";
            var porNombre11=document.getElementsByName("r11");
            for(var i=0;i<porNombre11.length;i++)
              {
                if(porNombre11[i].checked){
                r11=porNombre11[i].value;
				
				}
				
              }
			  
				
          
            var idplan_auditoria =$('#idplan_auditoria').val();
			
         
                    $.ajax({
                        url:"cerebro.php",
                        method:"POST",
                        data:{seccion:seccion,productos1:productos1,productos2:productos2,productos3:productos3,productos4:productos4,productos5:productos5,productos6:productos6,r1:r1,r2:r2,r3:r3,r4:r4,r5:r5,r6:r6,r7:r7,r8:r8,r9:r9,r10:r10,r11:r11,lugar:lugar,duracion:duracion,calculo:calculo,idplan_auditoria:idplan_auditoria},
                        success: function() {
                         // $('#tabla_ajax').load(ruta);
                          //$('#tabla_ajax2').load(ruta2);
                        }

                    });

  }
</script>

<script type="text/javascript">
  function guarda4() 
  {         
            var seccion =102;
			 var idlista_politicas =  $('#idlista_politicas').val();
			 
				   var coc_productos =  $('#coc_productos').val();
				  var coc_lugares =  $('#coc_lugar').val();
				 var coc_duracion =  $('#coc_duracion').val();
				  
				  
				 
			
           var rc1="";
            var porNombre1=document.getElementsByName("rc1");
            for(var i=0;i<porNombre1.length;i++)
              {
                if(porNombre1[i].checked){
                rc1=porNombre1[i].value;
				
				}
				
              }
			   var rc2="";
            var porNombre2=document.getElementsByName("rc2");
            for(var i=0;i<porNombre2.length;i++)
              {
                if(porNombre2[i].checked){
                rc2=porNombre2[i].value;
				
				}
				
              }
			   var rc3="";
            var porNombre3=document.getElementsByName("rc3");
            for(var i=0;i<porNombre3.length;i++)
              {
                if(porNombre3[i].checked){
                rc3=porNombre3[i].value;
				
				}
				
              }
			  
          
            var idplan_auditoria =$('#idplan_auditoria').val();
			
         
                    $.ajax({
                        url:"cerebro.php",
                        method:"POST",
                        data:{seccion:seccion,coc_productos:coc_productos,rc1:rc1,rc2:rc2,rc3:rc3,coc_lugares:coc_lugares,coc_duracion:coc_duracion,idplan_auditoria:idplan_auditoria},
                        success: function() {
                         // $('#tabla_ajax').load(ruta);
                          //$('#tabla_ajax2').load(ruta2);
                        }

                    });

  }
</script>
