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


$query_cert = sprintf("SELECT * FROM certificado WHERE certificado_tipo2=1 and idinforme=%s ",GetSQLValueString( $_POST['idinforme'], "int"));
$cert= mysql_query($query_cert, $inforgan_pamfa) or die(mysql_error());
$row_cert= mysql_fetch_assoc($cert);



////////
?>
 <div class="content">
<div class="container-fluid">
  <div class="row" id="form_ifa" style="background-color: #ecfbe7;">

  <div class="col-lg-12 col-xs-12" style="background-color: #ecfbe7; padding: 0px;">
  <form action="" method="post">
  <div class="col-lg-12" style="background-color: #dbf573e6; padding: 0px">
  <br/><br/><br/><br/><br/>
  </div>
  <div class="col-lg-4 ">
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
      <h3>Número CoC:</h3>
  </div>
  <div class="col-lg-8">
      <label><h3><? if($row_solicitud_esq['esquema']!=NULL){ echo "1 ". $row_solicitud_esq['esquema'];}else { echo "2 Grupo de productores";}?></h3 ></label>
  </div>
  <div class="col-lg-4">
      <h3>Registro:</h3>
  </div>
  <div class="col-lg-8">
       <input placeholder="escribe aquí"  class="form-control"  name="version"      onchange="this.form.submit()" title="version " type="text" value="<? echo $row_cert['version_coc']; ?>"  />
  </div>
  <div class="col-lg-4">
      <h3>Fecha de la emisión:</h3>
  </div>
  <div class="col-lg-8">
      <label><h3><? echo date('d/m/y',$row_inf['fecha_dictamen_coc']);?></h3>  </label>
  </div>
  <div class="col-lg-12">
  <div class="col-lg-4 col-xs-4" style="padding:0px">
    <h3>Valido a partir de:</h3>
  </div>
  <div class="col-lg-8 col-xs-8" style="padding:0px">
      <input   class="form-control"  name="fecha_inicial"  onchange="this.form.submit()"      title="desde " type="date" value="<? echo $row_cert['fecha_inicial_coc']; ?>"  />
  </div>
  </div>
  <div class="col-lg-4">
    <h3>Hasta:</h3>
  </div>
  <div class="col-lg-8">
      <input   class="form-control"  name="fecha_final"  onchange="this.form.submit()"      title="Hasta " type="date" value="<? echo $row_cert['fecha_final_coc']; ?>"  />
  </div>
  <div class="col-lg-4">
    <h3>Anexo para número CoC:</h3>
  </div>
  <div class="col-lg-8">
      <input   class="form-control"  name="fecha_impresion"   placeholder="escribe aquí"  onchange="this.form.submit()" title="impresion " type="date" value="<? echo $row_cert['fecha_impresion_coc']; ?>"  />
  </div>
 
  <div class="col-lg-8">
      <input type="hidden" name="idsolicitud" value="<? echo $row_solicitud['idsolicitud']; ?>" />
      <input type="hidden" name="insertar_coc" value="1" />
      <input type="hidden" name="idinforme" value="<? echo $row_inf['idinforme']; ?>" />
      <input type="hidden" name="idcertificado" value="<? echo $row_cert['idcertificado']; ?>" />
  </form> 

  </div>
  </form>
  <div class="col-lg-12">
    <div class="table-responsive">
    <table class="table table-bordered">
    <thead style="background-color: #dbf573e6">    
      <th>Producto</th>
      <th>Nombre Científico</th>
      <th>CoC</th>
      <th>Número PAMFA</th>
      <th>Producción paralela</th>
      <th></th>
    </thead>
    <tbody>
     <? $cont=1;
     while($row_cultivos= mysql_fetch_assoc($cultivos))
  {
    $query_cert_productos = sprintf("SELECT * FROM cert_producto WHERE idcultivo=%s  ", GetSQLValueString( $row_cultivos['idcultivos'], "int"));
$cert_productos= mysql_query($query_cert_productos, $inforgan_pamfa) or die(mysql_error());
$row_cert_productos= mysql_fetch_assoc($cert_productos);
$total_cert_productos = mysql_num_rows($cert_productos);    
echo $row_cultivos['idcultivos'];   
   if($total_cert_productos>0){?>
   
   
    <form action="" method="post" > 
     <tr>
        <td>
          <input class="form-control" name="producto" type="text" value="<? echo $row_cert_productos['producto'];?>"  />
        </td>
    <td>
          <input class="form-control"  name="nombre_cientifico" placeholder="escribe aquí" type="text" value="<? echo $row_cert_productos['nombre_cientifico'];?>"  />
         </td>
         <td>
          <input class="form-control" name="coc" type="text" value="<? if($row_plan_aud['num_coc']!=NULL){echo $row_plan_aud['num_coc'];} else { echo $row_cert_productos['coc'];}?>"  />
         </td>
         <td>
          <input class="form-control" name="pamfa" type="text" value="<? echo $row_cert_productos['pamfa'];?>"  />
          </td>
         
         
          <td>
            <input class="form-control" name="prod_paralela" type="text" value="<? echo $row_cert_productos['prod_paralela'];?>"  />
          </td>
          
          
          <td>
            <input  type="submit" value="Agregar"  />
            <input type="hidden" name="idsolicitud" value="<? echo $row_solicitud['idsolicitud']; ?>" />
            <input type="hidden" name="insertar_prod_coc" value="1" />
            <input type="hidden" name="idinforme" value="<? echo $row_inf['idinforme']; ?>" />
            <input type="hidden" name="idcultivo" value="<? echo $row_cultivos['idcultivos']; ?>" />
            <input type="hidden" name="idcertificado" value="<? echo $row_cert['idcertificado']; ?>" />
             <input type="hidden" name="idcert_producto" value="<? echo $row_cert_productos['idcert_producto']; ?>" />
            
          </td>
     </tr>
  </form>

    <? } else {?>
  <form action="" method="post" > 
     <tr>
        <td>
          <input class="form-control" name="producto" type="text" value="<? echo $row_cultivos['producto'];?>"  />
        </td>
    <td>
          <input class="form-control" name="nombre_cientifico" placeholder="escribe aquí" type="text" value="<? echo $row_cert_productos['nombre_cientifico'];?>"  />
         </td>
         <td>
          <input class="form-control" name="coc" type="text" value="<? echo $row_plan_aud['num_coc'];?>"  />
         </td>
         <td>
          <input class="form-control" name="pamfa" type="text" value="<? echo $row_plan_aud['num_pamfa'];?>"  />
          </td>
          
         
          <td>
            <input class="form-control" name="prod_paralela" type="text" value="<? if ($row_sol_esq['preg7']=="Si"){ echo "Si";}else {echo "No";}?>"  />
          </td>
          <td>
            <input  class="form-control" type="submit" value="Agregar"  />
            <input type="hidden" name="idsolicitud" value="<? echo $row_solicitud['idsolicitud']; ?>" />
            <input type="hidden" name="insertar_prod_coc" value="1" />
            <input type="hidden" name="idinforme" value="<? echo $row_inf['idinforme']; ?>" />
            <input type="hidden" name="idcultivo" value="<? echo $row_cultivos['idcultivos']; ?>" />
            <input type="hidden" name="idcertificado" value="<? echo $row_cert['idcertificado']; ?>" />
            
          </td>
     </tr>
  </form>
  <? }?>
  <? $cont ++; }?>
    </tbody>
  </table>
</div>
<div class="col-lg-12">
<div class="table-responsive">
  <table class="table table-bordered">
    <thead>
      <th>Producto</th>
      <th>Destino</th>
    </thead>
    <tbody>    
    <? $cont=1;     
    $query_cert_productos = sprintf("SELECT * FROM cert_producto WHERE idcertificado=%s and coc is not null  ", GetSQLValueString( $row_cert['idcertificado'], "int"));
      $cert_productos= mysql_query($query_cert_productos, $inforgan_pamfa) or die(mysql_error());
    
      while($row_cert_productos= mysql_fetch_assoc($cert_productos))
      {?>   
        <form action="" method="post" > 
          <tr>
            <td>
              <input  class="form-control" name="producto" type="text" value="<? echo $row_cert_productos['producto'];?>"  />
            </td>
            <td>
              <input class="form-control" name="destino" placeholder="escribe aquí" type="text" value="<? echo $row_cert_productos['destino'];?>"  />
              
            </td>                
            <td>
              <input class="form-control" type="submit" value="Agregar"  />
              <input type="hidden" name="idsolicitud" value="<? echo $row_solicitud['idsolicitud']; ?>" />
              <input type="hidden" name="insertar_destino_coc" value="1" />
              <input type="hidden" name="idinforme" value="<? echo $row_inf['idinforme']; ?>" />              
              <input type="hidden" name="idcertificado" value="<? echo $row_cert['idcertificado']; ?>" />
               <input type="hidden" name="idcert_producto" value="<? echo $row_cert_productos['idcert_producto']; ?>" />                        
            </td>       
           </tr>
           </form>
            <? }?>  
    </tbody>
  </table>
</div>
</div>

</div>
  </div>
  </div>
  <div class="col-lg-12" style="text-align: center;">
      <form action="../../docs/certificado_coc.php" method="post" target="_blank" >      
      <input class="btn btn-success" type="submit" value="Ver certificado"  />
      <input type="hidden" name="idsolicitud" value="<? echo $row_solicitud['idsolicitud']; ?>" />          
      <input type="hidden" name="idcertificado" value="<? echo $row_cert['idcertificado']; ?>" />
      </form> 
</div>
  </div>
</div>
<?php include("includes/footer.php");?>
</html>