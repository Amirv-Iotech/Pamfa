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

	$query_sol_esq = "SELECT * FROM solicitud_esquema where idsolicitud='".$_POST['idsolicitud']."'";
$sol_esq = mysql_query($query_sol_esq, $inforgan_pamfa) or die(mysql_error());
$row_sol_esq= mysql_fetch_assoc($sol_esq);

$query_cultivos = "SELECT * FROM cultivos where idsolicitud='".$_POST['idsolicitud']."'";
$cultivos = mysql_query($query_cultivos, $inforgan_pamfa) or die(mysql_error());

	
	


$query_solicitud_esq = sprintf("select *from esquemas where idesquema=(SELECT esq_tipo1_op1 FROM solicitud_esquema WHERE idsolicitud=%s order by idsolicitud_esquema asc limit 1)", GetSQLValueString($row_solicitud["idsolicitud"], "int"));
$solicitud_esq = mysql_query($query_solicitud_esq, $inforgan_pamfa) or die(mysql_error());
$row_solicitud_esq= mysql_fetch_assoc($solicitud_esq);




$query_procesadora = sprintf("SELECT * FROM procesadora WHERE idsolicitud=%s ", GetSQLValueString( $_POST['idsolicitud'], "int"));
$procesadora = mysql_query($query_procesadora, $inforgan_pamfa) or die(mysql_error());
$row_procesadora= mysql_fetch_assoc($procesadora);



$query_alcance = sprintf("SELECT descripcion FROM mex_cal_sup WHERE idmex_cal_sup=%s ", GetSQLValueString( $row_solicitud["idmex_alcance"], "int"));
$alcance = mysql_query($query_alcance, $inforgan_pamfa) or die(mysql_error());
$row_alcance= mysql_fetch_assoc($alcance);

$query_inf = sprintf("SELECT * FROM informe WHERE idinforme=%s ", GetSQLValueString( $_POST["idinforme"], "int"));
$inf= mysql_query($query_inf, $inforgan_pamfa) or die(mysql_error());
$row_inf= mysql_fetch_assoc($inf);

$query_plan_auditoria = sprintf("SELECT * FROM plan_auditoria WHERE idsolicitud=%s ", GetSQLValueString( $_POST['idsolicitud'], "int"));
$plan_auditoria = mysql_query($query_plan_auditoria, $inforgan_pamfa) or die(mysql_error());
$row_plan_aud= mysql_fetch_assoc($plan_auditoria);


$query_cert = sprintf("SELECT * FROM certificado WHERE certificado_tipo3=1 and idinforme=%s ",GetSQLValueString( $_POST['idinforme'], "int"));
$cert= mysql_query($query_cert, $inforgan_pamfa) or die(mysql_error());
$row_cert= mysql_fetch_assoc($cert);
////////
?>
 
<div class="content">
<div class="container-fluid" style="text-align: center; background-color: #ecfbe7;">
  <div class="row" id="form_ifa">

  <div class="col-lg-12 col-xs-12" style="background-color: #ecfbe7; padding: 0px;">
  <form action="" method="post">
  <div class="col-lg-12" style="background-color: #dbf573e6; padding: 0px">
  <br/><br/><br/><br/><br/>
  </div>
  <div class="col-lg-4">
    <h3>Razón social:</h3>
  </div>
  <div class="col-lg-8">
    <label><h3><? echo $row_operador['nombre_legal'];?></h3> </label>
  </div>
  <div class="col-lg-4">
        <h3>Dirección:</h3>
  </div>
  <div class="col-lg-8">
    <label><h3><? echo $row_operador['direccion'].",".$row_operador['colonia'].",".$row_operador['municipio'].",".$row_operador['estado'];?></h3>  </label>
  </div>
  <div class="col-lg-4">
      <h3>Valido desde:</h3>
  </div>
  <div class="col-lg-8">
    <input    class="plan_input"  id="fecha_inicial"  name="fecha_inicial"        title="desde " type="date" value="<? echo $row_cert['fecha_inicial_mexcalsup']; ?>"  />
  </div>
  <div class="col-lg-4">
      <h3>Hasta:</h3>
  </div>
  <div class="col-lg-8">
    <input    class="plan_input"  id="fecha_final"  name="fecha_final"       title="Hasta " type="date" value="<? echo $row_cert['fecha_final_mexcalsup']; ?>"  />
  </div>
  <div class="col-lg-4">
    <h3>Fecha de impresión:</h3>
  </div>
  <div class="col-lg-8">
    <input    class="plan_input"  id="fecha_impresion" name="fecha_impresion"   placeholder="escribe aquí"  onchange= title="impresion " type="date" value="<? echo $row_cert['fecha_impresion_mexcalsup']; ?>"  />
  </div>
  <div class="col-lg-4">
            <h3>Acreditación ema:</h3>
  </div>
  <div class="col-lg-8">
      <input    class="plan_input"  id="acreditacion" name="acreditacion"    placeholder="escribe aquí"  onchange=title="acreditacion " type="text" value="<? echo $row_cert['acreditacion_mexcalsup']; ?>"  />
  </div>
    <input type="hidden" name="idsolicitud" value="<? echo $row_solicitud['idsolicitud']; ?>" />
    <input type="hidden" name="insertar_mex" value="1" />
    <input type="hidden" id="idinforme" name="idinforme" value="<? echo $row_inf['idinforme']; ?>" />
    <input type="hidden"  id="idcertificado" name="idcertificado" value="<? echo $row_cert['idcertificado']; ?>" />
  </form>
  <div class="col-lg-12">
  <div class="table-responsive">
  <table class="table table-bordered">
    <thead>
      <th>Alcance</th>
      <th>Pliego</th>
    </thead>
    <tbody>
      <? $query_mex = sprintf("SELECT descripcion FROM mex_cal_sup WHERE idmex_cal_sup=%s  ", GetSQLValueString( $row_solicitud['idmex_alcance'], "int"));
$mex= mysql_query($query_mex, $inforgan_pamfa) or die(mysql_error());
$row_mex= mysql_fetch_assoc($mex);

$query_mexp = sprintf("SELECT descripcion FROM mex_cal_sup WHERE idmex_cal_sup=%s  ", GetSQLValueString( $row_solicitud['idmex_pliego'], "int"));
$mexp= mysql_query($query_mexp, $inforgan_pamfa) or die(mysql_error());
$row_mexp= mysql_fetch_assoc($mexp);
    
?>
   
   
    <form action="" method="post" > 
     <tr>
        <td>
          <input  name="producto" type="text" value="<? echo $row_mex['descripcion'];?>"  />
        </td>
    <td>
          <input  name="nombre_cientifico" placeholder="escribe aquí" type="text" value="<? echo $row_mexp['descripcion'];?>"  />
         </td>
              </tr>
  </form>
 
    </tbody>
  </table>
  </div>
  </div>
  
  </div>
  </div>

  <div id="boton" class="col-lg-12" style="text-align: center; background-color: #ecfbe7; padding: 0px;">
      <form action="../../docs/certificado_mexcalsup.php" method="post" target="_blank" >      
        <input class="btn btn-success" type="submit" value="Ver certificado"  />
        <input type="hidden" name="idsolicitud" value="<? echo $row_solicitud['idsolicitud']; ?>" />
        <input type="hidden" name="idcertificado" value="<? echo $row_cert['idcertificado']; ?>" />
      </form> 
      <input type="hidden" id="insertar_mex" name="insertar_mex" value="1" />
    <input type="hidden" id="idinforme" name="idinforme" value="<? echo $row_inf['idinforme']; ?>" />
    <input type="hidden"  id="idcertificado" name="idcertificado" value="<? echo $row_cert['idcertificado']; ?>" />
  </div>
</div>
</div>

<script>
window.addEventListener("beforeunload", function(event) {    

var fecha_inicial =$('#fecha_inicial').val();
var fecha_final =$('#fecha_final').val();
var fecha_impresion =$('#fecha_impresion').val();
var acreditacion =$('#acreditacion').val();
var insertar_mex =$('#insertar_mex').val();
var idcertificado =$('#idcertificado').val();
var idinforme =$('#idinforme').val();


  {  
                $.ajax({  
                     url:"cerebro.php",  
                     method:"POST",
                    data:{fecha_inicial:fecha_inicial,fecha_final:fecha_final,fecha_impresion:fecha_impresion,acreditacion:acreditacion,insertar_mex:insertar_mex,idcertificado:idcertificado,idinforme:idinforme},
                     dataType:"text",  
                      success:function(data)  
                     {  
                          event.returnValue = "AnthonySS";
                  

   }  
                });  
           }

 
});
</script>



<?php include("includes/footer.php");?>
</html>