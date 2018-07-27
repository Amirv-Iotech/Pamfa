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


	$query_solicitud_rev = "SELECT * FROM solicitud_rev where idsolicitud='".$_POST['idsolicitud']."'";
$solicitud_rev = mysql_query($query_solicitud_rev, $inforgan_pamfa) or die(mysql_error());
$row_solicitud_rev= mysql_fetch_assoc($solicitud_rev);
	

////////
?>
<div class="content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-12">
<div class="panel panel-white" style="background-color: #ecfbe7;">
<div class="panel-heading clearfix" style="background-color: #ecfbe7; ">

<input type="hidden" id="ruta" name="ruta" value="<? echo "tabla.php?idplan_auditoria=". $row_plan_auditoria['idplan_auditoria']."";?>" />
<input type="hidden" name="ruta2" id="ruta2" value="<? echo "tabla2.php?idplan_auditoria=". $row_plan_auditoria['idplan_auditoria']."";?>">
 <input id="idsolicitud" type="hidden" name="idsolicitud" value="<? echo $_POST['idsolicitud']; ?>" /> 

            <form id="myform" action="#seccion1" method="post" class="form-horizontal" enctype="multipart/form-data">
               <div class="col-xs-12 col-lg-12" style="background-color: #dbf573e6; padding: 0px;">
                  <h3 align="center">Revisión de documentos y desición</h3>
                </div>
               
                <div class="col-lg-12 col-xs-12 datos">
                    <label class="col-lg-3 col-xs-3">Fecha:</label>
                    <div class="col-lg-9 col-xs-9" >
                    <input  disabled   class="form-control inputsf"  id="fecha" name="fecha" type="text" title="fecha" value="<? echo date('d/m/y',time());?>" /></div>
                </div>
                <div class="col-lg-12 col-xs-12 datos">
                    <label class="col-lg-3 col-xs-3">Cliente:</label>
                    <div class="col-lg-9 col-xs-9" >
                    <input  disabled   class="form-control inputsf"  id="nombre_legal" name="nombre_legal" type="text" title="Nombre completo" value="<? echo $row_operador['nombre_legal'];?>" /></div>
                </div>
                <div class="col-lg-12 col-xs-12 datos">
                    <label class="col-lg-3 col-xs-3">GGN/CoC/NúmeroPGFS/Número PAMFA:</label>
                    <div class="col-lg-9 col-xs-9" >
                    <input  disabled   class="form-control inputsf"  id="numeros" name="numeros" type="text" title="numeros" value="<? echo $row_cliente['num_ggn']."/". $row_cliente['num_coc']."/". $row_cliente['num_primus']."/". $row_cliente['num_gln'];?>" /></div>
                </div>
               
               <div class="col-xs-12 col-lg-12" style="background-color: #dbf573e6; padding: 0px;">
                  <h3 align="center">Verificación de los datos proporcionados por el cliente</h3>
                </div>
               <div class="row">
                <div class="col-lg-12 col-xs-12 datos">
                <br />
                    <table class="table" border="1" cellpadding="1" cellspacing="5">
                    <tr><td>Item
                    </td><td>Cumple
                    </td><td>No cumple
                    </td><td>Observación
                    </td></tr>
                    <tr><td>Datos fiscales 
                    </td>
                    <td> <input   type="checkbox" <? if ($row_solicitud_rev['p1']==1){?> checked="checked"<? }?>  value="1" id="pr1"  name="p1"/>
                    </td>
                     <td> <input   type="checkbox" <? if ($row_solicitud_rev['p1']==2){?> checked="checked"<? }?>  value="2" id="pr1"  name="p1"/>
                    </td>
                    <td><textarea name="obs1" id="obs1" ><? echo $row_solicitud_rev['obs1'];?> </textarea> 
                    </td></tr><tr><td>Esquema de certificación
                    
                    </td>
                     <td> <input   type="checkbox" <? if ($row_solicitud_rev['p2']==1){?> checked="checked"<? }?>  value="1" id="p2"  name="p2"/>
                    </td>
                     <td> <input   type="checkbox" <? if ($row_solicitud_rev['p2']==2){?> checked="checked"<? }?>  value="2" id="p2"  name="p2"/>
                    </td>
                    <td><textarea name="obs2" id="obs2" ><? echo $row_solicitud_rev['obs2'];?> </textarea> 
                    </td></tr><tr><td>Datos de emplazamientos
                    </td>
                     <td> <input   type="checkbox" <? if ($row_solicitud_rev['p3']==1){?> checked="checked"<? }?>  value="1" id="p3"  name="p3"/>
                    </td>
                     <td> <input   type="checkbox" <? if ($row_solicitud_rev['p3']==2){?> checked="checked"<? }?>  value="2" id="p3"  name="p3"/>
                    </td>
                    <td><textarea name="obs3" id="obs3" ><? echo $row_solicitud_rev['obs3'];?> </textarea> 
                    </td></tr><tr><td>Datos de centros de manipulación
                    </td>  <td> <input   type="checkbox" <? if ($row_solicitud_rev['p4']==1){?> checked="checked"<? }?>  value="1" id="p4"  name="p4"/>
                    </td>
                     <td> <input   type="checkbox" <? if ($row_solicitud_rev['p4']==2){?> checked="checked"<? }?>  value="2" id="p4"  name="p4"/>
                    </td><td><textarea name="obs4" id="obs4" ><? echo $row_solicitud_rev['obs4'];?> </textarea> 
                    </td></tr>
                    <tr><td>Superficie
                    </td>  <td> <input   type="checkbox" <? if ($row_solicitud_rev['p5']==1){?> checked="checked"<? }?>  value="1" id="p5"  name="p5"/>
                    </td>
                     <td> <input   type="checkbox" <? if ($row_solicitud_rev['p5']==2){?> checked="checked"<? }?>  value="2" id="p5"  name="p5"/>
                    </td><td><textarea name="obs5" id="obs5" ><? echo $row_solicitud_rev['obs5'];?> </textarea> 
                    </td></tr>
                    <tr><td>Periodo de cosecha
                    </td>  <td> <input   type="checkbox" <? if ($row_solicitud_rev['p6']==1){?> checked="checked"<? }?>  value="1" id="p6"  name="p6"/>
                    </td>
                     <td> <input   type="checkbox" <? if ($row_solicitud_rev['p6']==2){?> checked="checked"<? }?>  value="2" id="p6"  name="p6"/>
                    </td><td><textarea name="obs6" id="obs6" ><? echo $row_solicitud_rev['obs6'];?> </textarea> 
                    </td></tr>
                    <tr><td>Compromisos con otros Organismo de Certificación. 
                    </td>  <td> <input   type="checkbox" <? if ($row_solicitud_rev['p7']==1){?> checked="checked"<? }?>  value="1" id="p7"  name="p7"/>
                    </td>
                     <td> <input   type="checkbox" <? if ($row_solicitud_rev['p7']==2){?> checked="checked"<? }?>  value="2" id="p7"  name="p7"/>
                    </td><td><textarea name="obs7" id="obs7" ><? echo $row_solicitud_rev['obs7'];?> </textarea> 
                    </td></tr>
                    <tr><td>Firmado por el representante autorizado.
                    </td>  <td> <input   type="checkbox" <? if ($row_solicitud_rev['p8']==1){?> checked="checked"<? }?>  value="1" id="p8"  name="p8"/>
                    </td>
                     <td> <input   type="checkbox" <? if ($row_solicitud_rev['p8']==2){?> checked="checked"<? }?>  value="2" id="p8"  name="p8"/>
                    </td><td><textarea name="obs8" id="obs8" ><? echo $row_solicitud_rev['obs8'];?> </textarea> 
                    </td></tr></table>
                </div>
               </div>
               <div class="col-xs-12 col-lg-12" style="background-color: #dbf573e6; padding: 0px;">
                  <h3 align="center">Una vez verificados los puntos anteriores, PAMFA deberá verificar las siguientes condiciones internas:</h3>
                </div>
               <div class="row">
                <div class="col-lg-12 col-xs-12 datos">
                <br />
                    <table class="table" border="1" cellpadding="1" cellspacing="5">
                    <tr><td>N°
                    </td><td>Reactivo
                    </td><td>Si
                    </td><td>No
                    </td></tr>
                    <tr><td>1 
                    </td>
                    <td>¿Con la información proporcionada acerca del cliente y el producto es suficiente realizar el proceso de certificación?
</td>
                    <td> <input   type="checkbox" <? if ($row_solicitud_rev['p9']==1){?> checked="checked"<? }?>  value="1" id="p9"  name="p9"/>
                    </td>
                     <td> <input   type="checkbox" <? if ($row_solicitud_rev['p9']==2){?> checked="checked"<? }?>  value="2" id="p9"  name="p9"/>
                    </td>
                   </tr><tr><td>2
                    
                    </td>
                    <td>
¿Están resuelto cualquier diferencia de entendimiento conocida entre PAMFA y el cliente, incluyendo el acuerdo con respecto a las normas u otros documentos normativos?</td>
                     <td> <input   type="checkbox" <? if ($row_solicitud_rev['p10']==1){?> checked="checked"<? }?>  value="1" id="p10"  name="p10"/>
                    </td>
                     <td> <input   type="checkbox" <? if ($row_solicitud_rev['p10']==2){?> checked="checked"<? }?>  value="2" id="p10"  name="p10"/>
                    </td>
                    
                    </td></tr><tr><td>3
                    </td><td>
¿Se define claramente el alcance de la certificación solicitada?</td>
                      <td> <input   type="checkbox" <? if ($row_solicitud_rev['p11']==1){?> checked="checked"<? }?>  value="1" id="p11"  name="p11"/>
                    </td>
                     <td> <input   type="checkbox" <? if ($row_solicitud_rev['p11']==2){?> checked="checked"<? }?>  value="2" id="p11"  name="p11"/>
                    </td></tr><tr><td>4
                    </td><td>
¿PAMFA tiene la capacidad, competencia y los medios para realizar todas las actividades del proceso de certificación con respecto al alcance definido en la solicitud de servicio?</td> 
 <td> <input   type="checkbox" <? if ($row_solicitud_rev['p12']==1){?> checked="checked"<? }?>  value="1" id="p12"  name="p12"/>
                    </td>
                     <td> <input   type="checkbox" <? if ($row_solicitud_rev['p12']==2){?> checked="checked"<? }?>  value="2" id="p12"  name="p12"/>
                    </td></tr></table>
                </div>
               </div>
                <div class="col-xs-12 col-lg-12" style="background-color: #dbf573e6; padding: 0px;">
                  <h3 align="center">Una vez verificados los puntos anteriores, PAMFA deberá verificar las siguientes condiciones internas:</h3>
                </div>
               <div class="row">
                <div class="col-lg-12 col-xs-12 datos">
               
                <div class="col-lg-6 col-xs-6 datos">
                <button type="button" <? if ($total==0){?> class="btn btn-info btn-lg" <? }else {?>class="btn btn-warning btn-lg" <? }?> onclick="abrir(2);" >Se puede otorgar el  servicio  <label data-toggle="tooltip" data-placement="top" title="De otorgarse el servicio se procede a enviar cotización al cliente. "><i class="material-icons">help_outline</i> </label></button>
                </div>
                 <div class="col-lg-6 col-xs-6 datos">
                <button type="button" <? if ($total==0){?> class="btn btn-info btn-lg" <? }else {?>class="btn btn-warning btn-lg" <? }?> onclick="abrir(1);" >No se puede otorgar el  servicio <label data-toggle="tooltip" data-placement="top" title="De no poder otorgarse el servicio se deberá de enviar la hoja 2 de este documento al cliente. "><i class="material-icons">help_outline</i> </label></button>
                
                
                <div id="modalsi" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Hoja 2 </h4>
      </div>
      <div class="modal-body">
        <p><? echo  "
       <strong> Estimado usuario.</strong> 
<br><br>

Por este medio hacemos de su conocimiento que por políticas de VERIFICACIÓN Y CERTIFICACIÓN PAMFA A.C., y en estricto apego a lo señalado en el esquema de certificación: ______________________ no podemos otorgar el servicio de certificación que nos ha solicitado. <br><br>

A continuación se indica la razón: <br>
 <table class='table' border='1' cellpadding='1' cellspacing='5'>
                    <tr>
                    <td>Falta información del solicitante. 
</td>
                    <td> <input   type='checkbox' value=' ' id=''  name=''/>
                    </td>
					</tr><tr>
					 <td>Compromisos con otro Organismo de Certificación
</td>
                   <td> <input   type='checkbox' value=' ' id=''  name=''/>
                    </td>
                   </tr>
				    <tr>
                    <td>Falsedad de información. 
</td>
                    <td> <input   type='checkbox' value=' ' id=''  name=''/>
                    </td>
					</tr><tr>
					 <td>No existe respuesta del representante autorizado. 
</td>
                   <td> <input   type='checkbox' value=' ' id=''  name=''/>
                    </td>
                   </tr>
				    <tr>
                    <td>No tenemos el alcance para otorgar el servicio. 
</td>
                    <td> <input   type='checkbox' value=' ' id=''  name=''/>
                    </td>
					</tr><tr>
					 <td>Otro, indique:
</td>
                   <td> <textarea name='otro' id='otro'></textarea>
                    </td>
                   </tr></table>
				   <br>
				   Si está interesado en los servicios de certificación que ofrece VERIFICACIÓN Y CERTIFICACIÓN PAMFA A.C., contacte nuevamente a nuestro personal. ";?>
</p>
      </div>
      <div class="modal-footer">
        
       
        <form action="formulario.php" method="post"> <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-success" >Enviar</button>
      <input type="hidden" name="idsolicitud" value="<? echo $row_solicitud['idsolicitud']; ?>" />
        </form>
      </div>
    </div>

  </div>
</div>

<? ///////////?>
<div id="modalno" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Cotización </h4>
      </div>
      <div class="modal-body">
      
       <div class="col-lg-12 col-xs-12 campos2" >
       <div class="col-lg-6 col-xs-6" >
        Uruapan,Michoacán a;</div>
        <div class="col-lg-6 col-xs-6" ><label ><? echo date('d/m/y',time());?></label>
      </div>
      </div>
      <div class="col-lg-12 col-xs-12 campos2" style="text-align: center;background-color: #dbf573e6; border: solid 1px #AAAAAA; margin-right: 0px; margin-left: 0px;">
        <h4><b>Datos del cliente</b></h4>
      </div>
      <div class="col-lg-12 col-xs-12 campos2" >
       <div class="col-lg-6 col-xs-6" >
       Nombre de la empresa </div>
        <div class="col-lg-6 col-xs-6" ><input class="form-control inputsf" id="nombre" name="nombre" type="text" value="<? echo $row_operador['nombre_legal'];?>"  />
      </div>
      </div>
      <div class="col-lg-12 col-xs-12 campos2" >
       <div class="col-lg-6 col-xs-6" >
       Dirección operativa </div>
        <div class="col-lg-6 col-xs-6" ><input class="form-control inputsf" id="dir" name="dir" value="<? echo $row_operador['direccion'];?>" type="text"  />
      </div>
      </div>
      <div class="col-lg-12 col-xs-12 campos2" >
       <div class="col-lg-6 col-xs-6" >
       Producto y variedad </div>
        <div class="col-lg-6 col-xs-6" ><input class="form-control inputsf" id="equipo" name="equipo" placeholder=""type="text"  />
      </div>
      </div><div class="col-lg-12 col-xs-12 campos2" >
       <div class="col-lg-6 col-xs-6" >
        persona de contacto </div>
        <div class="col-lg-6 col-xs-6" ><input class="form-control inputsf" id="persona" name="persona" value="<? echo $row_operador['nombre_representante'];?>" type="text"  />
      </div>
      </div><div class="col-lg-12 col-xs-12 campos2" >
       <div class="col-lg-6 col-xs-6" >
        Telefono y/o celular </div>
        <div class="col-lg-6 col-xs-6" ><input class="form-control inputsf" id="tel" name="tel" value="<? echo $row_operador['telefono'];?>" type="text"  />
      </div>
      </div><div class="col-lg-12 col-xs-12 campos2" >
       <div class="col-lg-6 col-xs-6" >
        Email</div>
        <div class="col-lg-6 col-xs-6" ><input class="form-control inputsf" id="mail" name="mail" value="<? echo $row_operador['email'];?>" type="text"  />
      </div>
      </div>
        <p><? echo  "
       <strong> El siguiente presupuesto tiene una vigencia de 30 días naturales posteriores a la fecha de emisión.</strong> 
<br><br></p>";?>
<div class="row" id="tabla_ajax2" style="background-color: #ecfbe7;">
  <div class="col-lg-12 col-xs-12">
    <?
      include('tabla4.php');
    ?>

  </div>
</div>
 <input type="button" name="anexo" value="Ver especificaciones" id="anexo" class="btn btn-info"  />
<div id="esp" style="display:none"><? echo"


 
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
Nota:<br>
1.	La cuota anual cubre los gastos para el registro en la base de datos GlobalG.A.P.  El cliente debe informar a VERIFICACION Y CERTIFICACION PAMFA  sobre cualquier GGN, LGN o Numero CoC existente o caducado, y sobre cualquier actividad previa de verificación/inspección/auditoria o certificación/aprobación en su organización, incluyendo resultados. Su no comunicación redundará un costo extra  de 100 € (Euros), para un productor individual bajo la opción 1; y de 500 € (Euros), para un grupo de productores bajo la opción 2, sobre la tarifa de registro.";
echo '<br>
2.	"No tiene un costo adicional la emisión del certificado" y se emitirá cuando se haya dado cumplimiento con los requisitos de la certificación.<br>

3.	SRRC - VERIFICACION Y CERTIFICACION PAMFA A.C. emitirá el dictamen de verificación e informe de evaluación de la conformidad, la dependencia  en este momento es quien decide sobre la certificación.


<br><br>
DATOS BANCARIOS:<br>
VERIFICACION Y CERTIFICACION PAMFA A.C.<br>
BANCO: BANBAJIO<br>
CUENTA: 19005552<br>
CLABE: 03 05 28 90 00 1114 8626<br>
REFERENCIA: ORGANISMO DE CERTIFICACIÓN.<br>

 ';?>
</div>
      </div>
      <div class="modal-footer">
        
        <form method="post" action="">
         <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                  <input type="hidden" name="idoperador" value="<?php echo $row_u['idoperador'];?>" />
                
                  <input type="hidden" name="mail" value="1" />
                  
                <input type="submit" value="Enviar" />
                
                 <input type="hidden" name="correo" value="holfffa@gmail.com" />
                  <input type="hidden" name="usuario" value="<?php echo $row_u['username'];?>" />
                 
           
        </form>
      </div>
    </div>

  </div>
</div>
<? //////////////?>
                </div>
                </div>
               </div>
            </form>
           <input id="idsolicitud" type="hidden" name="idsolicitud" value="<? echo $_POST['idsolicitud']; ?>" /> 
       
        </div>
    </div>
</div>

</div>
</div>
</div>
<?php include("includes/footer.php");?>
<script type="text/javascript"> 

 <? echo '

$(document).ready(function(){  
    $("#anexo").click(function() { '; echo '
 if (!$("#esp").is(":visible"))
   $("#esp").show();
else   
   $("#esp").hide();';
	echo ' 
    });    
});';?>
			</script>
<script type="text/javascript">
function abrir(x)
{
	if(x==1){
	$('#modalsi').appendTo("body").modal('show');
	
	}
	else{$('#modalno').appendTo("body").modal('show');}
}</script>

<script>
window.addEventListener("beforeunload", function(event) {    


 var p1="";
            var porNombre=document.getElementsByName("p1");
            for(var i=0;i<porNombre.length;i++)
              {
                if(porNombre[i].checked){
                p1=porNombre[i].value;}
              }
			  var p2="";
            var porNombre2=document.getElementsByName("p2");
            for(var i=0;i<porNombre2.length;i++)
              {
                if(porNombre2[i].checked){
                p2=porNombre2[i].value;}
              }var p3="";
            var porNombre3=document.getElementsByName("p3");
            for(var i=0;i<porNombre3.length;i++)
              {
                if(porNombre3[i].checked){
                p3=porNombre3[i].value;}
              }var p4="";
            var porNombre4=document.getElementsByName("p4");
            for(var i=0;i<porNombre4.length;i++)
              {
                if(porNombre4[i].checked){
                p4=porNombre4[i].value;}
              }var p5="";
            var porNombre5=document.getElementsByName("p5");
            for(var i=0;i<porNombre5.length;i++)
              {
                if(porNombre5[i].checked){
                p5=porNombre5[i].value;}
              }var p6="";
            var porNombre6=document.getElementsByName("p6");
            for(var i=0;i<porNombre6.length;i++)
              {
                if(porNombre6[i].checked){
                p6=porNombre6[i].value;}
              }var p7="";
            var porNombre7=document.getElementsByName("p7");
            for(var i=0;i<porNombre7.length;i++)
              {
                if(porNombre7[i].checked){
                p7=porNombre7[i].value;}
              }var p8="";
            var porNombre8=document.getElementsByName("p8");
            for(var i=0;i<porNombre8.length;i++)
              {
                if(porNombre8[i].checked){
                p8=porNombre8[i].value;}
              }
			  var p9="";
            var porNombre9=document.getElementsByName("p9");
            for(var i=0;i<porNombre9.length;i++)
              {
                if(porNombre9[i].checked){
                p9=porNombre9[i].value;}
              }
			  var p10="";
            var porNombre10=document.getElementsByName("p10");
            for(var i=0;i<porNombre10.length;i++)
              {
                if(porNombre10[i].checked){
                p10=porNombre10[i].value;}
              }
			  var p11="";
            var porNombre11=document.getElementsByName("p11");
            for(var i=0;i<porNombre11.length;i++)
              {
                if(porNombre11[i].checked){
                p11=porNombre11[i].value;}
              }
			  var p12="";
            var porNombre12=document.getElementsByName("p12");
            for(var i=0;i<porNombre12.length;i++)
              {
                if(porNombre12[i].checked){
                p12=porNombre12[i].value;}
              }

var obs1 =$('#obs1').val();
var obs2 =$('#obs2').val();
var obs3 =$('#obs3').val();
var obs4 =$('#obs4').val();
var obs5 =$('#obs5').val();
var obs6 =$('#obs6').val();
var obs7 =$('#obs7').val();
var obs8 =$('#obs8').val();
var idsolicitud =$('#idsolicitud').val();
var seccion =100;
            
            {  
                $.ajax({  
                     url:"cerebro.php",  
                     method:"POST",
                    data:{p1:p1,obs1:obs1,p2:p2,obs2:obs2,p3:p3,obs3:obs3,p4:p4,obs4:obs4,p5:p5,obs5:obs5,p6:p6,obs6:obs6,p7:p7,obs7:obs7,p8:p8,obs8:obs8,p9:p9,p10:p10,p11:p11,p12:p12, idsolicitud:idsolicitud, seccion:100},
                     dataType:"text",  
                      success:function(data)  
                     {  
					 alert(data);
                          event.returnValue = "AnthonySS";
                  

   }  
                });  
           }

 
});
</script>

