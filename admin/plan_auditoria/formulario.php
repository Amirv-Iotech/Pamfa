<!DOCTYPE html>
<html>
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

<div class="content">
<div class="container-fluid">
    <div class="row" id="form_plan_aud" style="background-color: #ecfbe7;">
        <div class="col-lg-12 col-xs-12" style="padding: 0px;">
            <form id="myform" action="#seccion1" method="post" class="form-horizontal" enctype="multipart/form-data">
               <div class="col-xs-12 col-lg-12" style="background-color: #dbf573e6; padding: 0px;">
                  <h3 align="center">Plan de auditoria de certificación</h3>
                </div>
                <div class="col-xs-12 col-lg-12" style="text-align: center;">
                    <p><b>DATOS DEL CLIENTE</b></p>
                </div>
                <div class="col-lg-12 col-xs-12 datos">
                    <label class="col-lg-3 col-xs-3">Razón social:</label>
                    <div class="col-lg-9 col-xs-9">
                    <input placeholder=""   class="plan_input" id="nombre_legal" name="nombre_legal" type="text" title="Nombre completo" value="<? echo $row_operador['nombre_legal'];?>" /></div>
                </div>
                <div class="col-lg-12 col-xs-12 datos">
                    <label class="col-lg-3 col-xs-3">Dirección de la entidad legal: calle y número:</label>
                    <div class="col-xs-9 col-lg-9">
                    <input placeholder="" class=" plan_input" id="direccion" name="direccion" value="<? echo $row_operador['direccion'];?>"  title="Dirección"  /></div>
                </div>
                <div class="col-lg-12 col-xs-12 datos">
                    <label class="col-lg-3 col-xs-3">Colonia:</label>
                    <div class="col-lg-9 col-xs-9">
                    <input placeholder="" class="plan_input" id="colonia" name="colonia" value="<? echo $row_operador['colonia'];?>"  title="Colonia " />
                    </div>
                </div>
                <div class="col-lg-12 col-xs-12 datos">
                    <label class="col-lg-3 col-xs-3">C.P.:</label>
                    <div class="col-lg-9 col-xs-9">
                    <input placeholder="" class="plan_input" id="cp" name="cp" type="text" title="Codigo postal " value="<? echo $row_operador['cp'];?>"  />
                    </div>
                </div>
                <div class="col-lg-12 col-xs-12 datos">
                     <label class="col-lg-3 col-xs-3">Municipio:</label>
                     <div class="col-lg-9 col-xs-9">
                      <input placeholder="" class="plan_input" id="municipio" name="municipio" type="text" title="Estado " value="<? echo $row_operador['municipio'];?>" />
                      </div>
                </div>
                <div class="col-lg-12 col-xs-12 datos">
                      <label class="col-lg-3 col-xs-3">Estado:</label>
                      <div class="col-lg-9 col-xs-9">
                      <input placeholder="" class="plan_input" id="estado" name="estado" type="text" title="Estado " value="<? echo $row_operador['estado'];?>" />
                      </div>
                </div>
                <div class="col-lg-12 col-xs-12 datos">
                    <label class="col-lg-3 col-xs-3">Teléfono:</label>
                    <div class="col-lg-9 col-xs-9">
                    <input placeholder="" class="plan_input" id="telefono" name="telefono" type="text" title="Telefono " value="<? echo $row_operador['telefono'];?>"  />
                    </div>
                </div>
                <div class="col-lg-12 col-xs-12 datos">
                    <label class="col-lg-3 col-xs-3">Correo Electrónico:</label>
                    <div class="col-lg-9 col-xs-9">
                    <input placeholder="" class="plan_input" id="email" name="email" type="text" value="<? echo $row_operador['email'];?>" id="email" title="Email " />
                    </div>
                </div>
                <div class="col-lg-12 col-xs-12 datos">
                    <label class="col-lg-3 col-xs-3">Nombre del representante legal:</label>
                    <div class="col-lg-9 col-xs-9">
                    <input placeholder="" class="plan_input" id="nombre_representante" name="nombre_representante" type="text" value="<? echo $row_operador['nombre_representante'];?>"  title="Nombre " />
                    </div>
                </div>
                <div class="col-lg-12 col-xs-12 datos">
                    <input type="hidden" name="idoperador" value="<? echo $row_operador['idoperador']; ?>" />
                    <input type="hidden" name="idsolicitud" value="<? echo $_POST['idsolicitud']; ?>" />
                    <input type="hidden" name="seccion" value="1" />
                    <input type="hidden" name="fecha" value="<? echo time();?>" />
                </div>
                <div class="col-lg-12 col-xs-12 datos">                                
                    <label class="col-lg-3 col-xs-3">Centro de manipulación:</label>  
                    <div class="col-lg-9 col-xs-9">  
                    <input placeholder="" class="plan_input" id="procesadora" name="procesadora" type="text" title="Estado " value="<? echo $row_procesadora['empresa'];?>" />
                    </div>
                </div>
                <div class="col-lg-12 col-xs-12 datos">
                    <label class="col-lg-3 col-xs-3">Producto:</label>
                    <?  $query_prod = sprintf("SELECT * FROM cultivos WHERE idsolicitud=%s order by idcultivos", GetSQLValueString( $_POST["idsolicitud"], "int"));
                      $prod = mysql_query($query_prod, $inforgan_pamfa) or die(mysql_error());
                      while($row_prod= mysql_fetch_assoc($prod))
                      {
                        $productos=$row_prod['producto'].",".$productos;
                      }?>
                      <div class="col-lg-9 col-xs-9">
                      <input placeholder="" class="plan_input" id="productos" name="productos" type="text" title="Telefono " value="<? echo $productos;?>"  />
                      </div>
                </div>
                <div class="col-lg-12 col-xs-12 datos">
                    <label class="col-lg-3 col-xs-3">Fecha_emision:</label>
                    <div class="col-lg-9 col-xs-9">
                    <input placeholder="" class="plan_input" id="fecha_emision" name="fecha_emision" type="date" value="<? echo $row_plan_auditoria['fecha_emision'];?>" id="email" title="Email " />
                    </div>
                </div>
                <div class="col-lg-12 col-xs-12 datos">
                    <label class="col-lg-3 col-xs-3">Fecha_auditoria:</label>
                    <div class="col-lg-9 col-xs-9">
                    <input type="date" placeholder="" class="plan_input" id="fecha_auditoria" name="fecha_auditoria" value="<? echo $row_plan_auditoria['fecha_auditoria'];?>"  title="Nombre " />
                    </div>
                </div>
                <div class="col-lg-12 col-xs-12 datos" >
                    <input type="hidden" name="idsolicitud" value="<? echo $_POST['idsolicitud']; ?>" />
                    <input type="hidden" name="seccion" value="2" />
                </div>
                <div class="col-lg-12 col-xs-12">
                </div>
                <div class="col-lg-12 col-xs-12">
                </div>
            </form>
        </div>
    </div>
</div><!-- container fluid-->
</div>

<?php  include("seccion5.php");?>
<?php  include("seccion6.php");?>
<?php  include("seccion7.php");?>

<?php include("includes/footer.php");?>
</html>
<!--
<div class="content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-12">
                        
<div class="panel panel-white">
<div class="panel-heading clearfix"><br>


	<form id="myform" action="#seccion1" method="post" class="form-horizontal" enctype="multipart/form-data">
	<h3 align="center">Plan de auditoria de certificación</h3>
    <br><br>
    <table >
    <tr>
    </tr><tr><td colspan="4">
    
   
    </td></tr></table>
	<fieldset>
    <a name="seccion1"></a>
    
    
	<legend><table width="100%" ><tr><td width="100%" bgcolor="#00CC33">DATOS DEL CLIENTE </td></tr></table></legend>
		
		<div class="form-group col-lg-12 col-md-12">
    	<label for="nombre_legal" class="form-label col-lg-1">Razón social:</label>
        
    	<div class="form-group col-lg-11">
    	<input placeholder="escribe aquí"   class="form-control" onchange="this.form.submit()" name="nombre_legal" type="text" 			title="Nombre completo " value="<? /*echo $row_operador['nombre_legal'];?>"  />
	    </div>
		</div>

		
		<div class="form-group col-lg-6 col-md-6">
    	<label for="direccion" class="form-label col-lg-5">Dirección de la entidad legal: calle y número:</label>
    	<div class="col-lg-7">
    	<input placeholder="escribe aquí" class="form-control" onchange="this.form.submit()" name="direccion" value="<? echo $row_operador['direccion'];?>"  title="Dirección"  />
    	</div>
    	</div>  

		<div class="form-group col-lg-3 col-md-3">
    	<label for="colonia" class="form-label col-lg-4">Colonia:</label>
    	<div class="col-lg-8">
    	<input placeholder="escribe aquí" class="form-control"  onchange="this.form.submit()" name="colonia" value="<? echo $row_operador['colonia'];?>"  title="Colonia " />
    	</div>
		</div>
         <div class=" form-group col-lg-3 col-md-3">
    	<label for="cp" class="form-label col-lg-4">C.P.:</label>
    	<div class="col-lg-8">
    	<input placeholder="escribe aquí" class="form-control" onchange="this.form.submit()" name="cp" type="text"  			title="Codigo postal " value="<? echo $row_operador['cp'];?>"  />
	    </div>
		</div>
        <div class="form-group col-lg-6 col-md-6">
    	<label for="municipio" class="form-label col-lg-2">Municipio:</label>
    	<div class="col-lg-10">
    	<input placeholder="escribe aquí" class="form-control" onchange="this.form.submit()" name="municipio" type="text"  			title="Estado " value="<? echo $row_operador['municipio'];?>" />
	    </div>
		</div>
        <div class="form-group col-lg-6 col-md-6">
    	<label for="estado" class="form-label col-lg-2">Estado:</label>
    	<div class="col-lg-10">
    	<input placeholder="escribe aquí" class="form-control" onchange="this.form.submit()" name="estado" type="text"  			title="Estado " value="<? echo $row_operador['estado'];?>" />
	    </div>
		</div>
      <div class="form-group col-lg-6 col-md-6">
    	<label for="telefono" class="form-label col-lg-2">Teléfono:</label>
    	<div class="col-lg-8">
    	<input placeholder="escribe aquí" class="form-control" onchange="this.form.submit()" name="telefono" type="text" 			title="Telefono " value="<? echo $row_operador['telefono'];?>"  />
	    </div>
		</div>
		<div class=" form-group col-lg-6 col-md-6">
    	<label for="email" class="form-label col-lg-2">Correo Electrónico:</label>
    	<div class="col-lg-10">
    	<input placeholder="escribe aquí" class="form-control" onchange="this.form.submit()" name="email" type="text" value="<? echo $row_operador['email'];?>" id="email" title="Email " />
    	</div>
		</div>
        <div class="form-group col-lg-6 col-md-6">
    	<label for="nombre_representante" class="form-label col-lg-4">Nombre del representante legal:</label>
    	<div class="col-lg-8">
    	<input placeholder="escribe aquí" class="form-control"  onchange="this.form.submit()" name="nombre_representante" type="text" value="<? echo $row_operador['nombre_representante'];?>"  title="Nombre " />
    	</div>
		</div>
        

		
    </fieldset>	
<input type="hidden" name="idoperador" value="<?/* echo $row_operador['idoperador']; ?>" />
<input type="hidden" name="idsolicitud" value="<? echo $_POST['idsolicitud']; ?>" />
  <input type="hidden" name="seccion" value="1" />
  <input type="hidden" name="fecha" value="<? echo time();?>" />

</form>
<form id="myform" action="#seccion2" method="post" class="form-horizontal" enctype="multipart/form-data">
<fieldset>
    <a name="seccion2">
    
    
	<legend></legend>
		
         <div class="form-group col-lg-6 col-md-6">
    	<label for="empresa" class="form-label col-lg-2">Centro de manipulación:</label>
    	<div class="col-lg-10">
    	<input placeholder="escribe aquí" class="form-control" onchange="this.form.submit()" name="procesadora" type="text"  			title="Estado " value="<? /*echo $row_procesadora['empresa'];?>" />
	    </div>
		</div>
      <div class="form-group col-lg-6 col-md-6">
    	<label for="productos" class="form-label col-lg-2">Producto:</label>
    	<div class="col-lg-8">
        <? /* $query_prod = sprintf("SELECT * FROM cultivos WHERE idsolicitud=%s order by idcultivos", GetSQLValueString( $_POST["idsolicitud"], "int"));
$prod = mysql_query($query_prod, $inforgan_pamfa) or die(mysql_error());
while($row_prod= mysql_fetch_assoc($prod))
{
$productos=$row_prod['producto'].",".$productos;
}?>
    	<input placeholder="escribe aquí" class="form-control" onchange="this.form.submit()" name="productos" type="text" 			title="Telefono " value="<? //echo $productos;?>"  />
	    </div>
		</div>
		<div class=" form-group col-lg-6 col-md-6">
    	<label for="fecha_emision" class="form-label col-lg-2">Fecha_emision:</label>
    	<div class="col-lg-10">
    	<input placeholder="escribe aquí" class="form-control" onchange="this.form.submit()" name="fecha_emision" type="date" value="<? ////echo $row_plan_auditoria['fecha_emision'];?>" id="email" title="Email " />
    	</div>
		</div>
        <div class="form-group col-lg-6 col-md-6">
    	<label for="fecha_auditoria" class="form-label col-lg-4">Fecha_auditoria:</label>
    	<div class="col-lg-8">
    	<input type="date" placeholder="escribe aquí" class="form-control"  onchange="this.form.submit()" name="fecha_auditoria" value="<? //echo $row_plan_auditoria['fecha_auditoria'];?>"  title="Nombre " />
    	</div>
		</div>
    </fieldset>	
    

 
<input type="hidden" name="idsolicitud" value="<? //echo $_POST['idsolicitud']; ?>" />
  <input type="hidden" name="seccion" value="2" />
 
</form>

<?php  //include("seccion5.php");?>
<?php //include("seccion6.php");?>
<?php // include("seccion7.php");?>






</div>
</div>
</div>
</div>
</div>
</div>
 


<?php //include("includes/footer.php");?>
</html>-->*/