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
$query_operador = sprintf("SELECT * FROM operador WHERE idoperador=%s", GetSQLValueString( $_SESSION["idoperador"], "int"));
$operador = mysql_query($query_operador, $inforgan_pamfa) or die(mysql_error());
$row_operador= mysql_fetch_assoc($operador);

////////
?>


<?php include("includes/header.php");?>

<div class="content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-12">
                        
<div class="panel panel-white">
<div class="panel-heading clearfix"><br>


	<form id="myform" action="#seccion1" method="post" class="form-horizontal" enctype="multipart/form-data">
	<h3 align="center">Solicitud de certificación de producto</h3>
    <br><br>
    <table >
    <tr>
    <td width="20%">
    <h3>Fecha de solicitud </h3></td><td width="10%"> <h3><? echo date('d/m/y',time());?> </h3></td><td width="40%">  <h3>   Nombre de la persona que llena la solicitud: </h3></td><td width="30%"><h3><input onchange="this.form.submit()" name="persona" type="text" placeholder="escriba aquí"  title="Nombre " value="" class="form-control" /></h3></td></tr><tr><td colspan="4">
    
    <h3>Estimado cliente, favor de llenar los datos en los espacios requeridos, esta información es necesaria para completar el proceso de certificación de acuerdi al esquema de certificación que usted solicita.</h3>
    </td></tr></table>
	<fieldset>
    <a name="seccion1">
    
    
	<legend><table width="100%" class="table-condensed"><tr><td width="100%" bgcolor="#00CC33">INFORMACIÓN DEL CLIENTEe (Entidad legal y persona de contacto)</td></tr></table></legend>
		
		<div class="form-group col-lg-6 col-md-6">
    	<label for="nombre" class="form-label col-lg-4">Nombre de la entidad legal (empresa o persona):</label>
    	<div class="col-lg-8">
    	<input  class="form-control" onchange="this.form.submit()" name="nombre" type="text" 			title="Nombre completo " value="<? echo $row_operador['nombre'];?>" class="form-control" />
	    </div>
		</div>

		<div class="form-group col-lg-6 col-md-6">
    	<label for="nombre_legal" class="form-label col-lg-4">Nombre del representante legal:</label>
    	<div class="col-lg-8">
    	<input class="form-control"  onchange="this.form.submit()" name="nombre_legal" value="<? echo $row_operador['nombre_legal'];?>"  title="Nombre " class="form-control" />
    	</div>
		</div>
		<div class="form-group col-lg-12 col-md-12">
    	<label for="direccion" class="form-label col-lg-2">Dirección de la entidad legal: calle y número:</label>
    	<div class="col-lg-10">
    	<input class="form-control" onchange="this.form.submit()" name="direccion" value="<? echo $row_operador['direccion'];?>"  title="Dirección"  class="form-control"/>
    	</div>
    	</div>
        <div class="form-group col-lg-12 col-md-12">
    	<label for="coordenadas" class="form-label col-lg-2">Coordenadas de la entidad legal</label>
    	<div class="col-lg-10">
    	<input class="form-control" onchange="this.form.submit()" name="coordenadas" value="<? echo $row_operador['coordenadas'];?>"  title="Coordenadas"  class="form-control"/>
    	</div>
    	</div>
        
        <div class="form-group col-lg-2 col-md-2">
    	<label for="cp" class="form-label col-lg-4">C.P.:</label>
    	<div class="col-lg-8">
    	<input class="form-control" onchange="this.form.submit()" name="cp" type="text"  			title="Codigo postal " value="<? echo $row_operador['cp'];?>" class="form-control" />
	    </div>
		</div>

		<div class="form-group col-lg-4 col-md-4">
    	<label for="colonia" class="form-label col-lg-4">Colonia:</label>
    	<div class="col-lg-8">
    	<input class="form-control"  onchange="this.form.submit()" name="colonia" value="<? echo $row_operador['colonia'];?>"  title="Colonia " class="form-control" />
    	</div>
		</div>
        <div class="form-group col-lg-3 col-md-3">
    	<label for="estado" class="form-label col-lg-4">Estado:</label>
    	<div class="col-lg-8">
    	<input class="form-control" onchange="this.form.submit()" name="estado" type="text"  			title="Estado " value="<? echo $row_operador['estado'];?>" class="form-control" />
	    </div>
		</div>

		<div class="form-group col-lg-2 col-md-2">
    	<label for="pais" class="form-label col-lg-4">Pais:</label>
    	<div class="col-lg-8">
    	<input class="form-control" onchange="this.form.submit()" name="pais" value="<? echo $row_operador['pais'];?>" id="email" title="Pais " class="form-control" />
    	</div>
		</div>
        
		<div class="form-group col-lg-4 col-md-4">
    	<label for="email" class="form-label col-lg-4">Correo Electrónico:</label>
    	<div class="col-lg-8">
    	<input  class="form-control" onchange="this.form.submit()" name="email" value="<? echo $row_operador['email'];?>" id="email" title="Email " class="form-control" />
    	</div>
		</div>
        <div class="form-group col-lg-5 col-md-5">
    	<label for="telefono" class="form-label col-lg-8">Número de telefono(oficina o personal):</label>
    	<div class="col-lg-4">
    	<input class="form-control" onchange="this.form.submit()" name="telefono" type="text" 			title="Telefono " value="<? echo $row_operador['telefono'];?>" class="form-control" />
	    </div>
		</div>

		<div class="form-group col-lg-3 col-md-3">
    	<label for="fax" class="form-label col-lg-4">Fax:</label>
    	<div class="col-lg-8">
    	<input class="form-control"  onchange="this.form.submit()" name="fax" value="<? echo $row_operador['fax'];?>" title="Fax " class="form-control" />
    	</div>
		</div>
    </fieldset>	

<fieldset>
    <a name="seccion2">
    
    
	<legend>Sección 2</legend>
		
		<div class="form-group col-lg-3 col-md-3">
    	<label for="num_ggn" class="form-label col-lg-8"><strong>GGN</strong> (GLOBALG.A.P NUMBER, obligatorio si estuvieron certificados anteriormente con GLOBALG.A.P):</label>
    	<div class="col-lg-4">
    	<input  class="form-control" onchange="this.form.submit()" name="num_ggn" type="text" 			title="Número " value="<? echo $row_operador['num_ggn'];?>" class="form-control" />
	    </div>
		</div>

		<div class="form-group col-lg-3 col-md-3">
    	<label for="num-gln" class="form-label col-lg-8"><strong>GLN</strong> (Global Localization Number, obligatorio si fue solicitado a GS1):</label>
    	<div class="col-lg-4">
    	<input class="form-control"  onchange="this.form.submit()" name="num_gln" value="<? echo $row_operador['num_gln'];?>"  title="Número " class="form-control" />
    	</div>
		</div>
		<div class="form-group col-lg-3 col-md-3">
    	<label for="num_coc" class="form-label col-lg-8"><strong>CoC número</strong> (CoC NUMBER, obligatorio si estuvieron certificados anteriormente con GLOBALG.A.P):</label>
    	<div class="col-lg-4">
    	<input class="form-control" onchange="this.form.submit()" name="num_coc" value="<? echo $row_operador['num_coc'];?>"  title="Número"  class="form-control"/>
    	</div>
    	</div>
        <div class="form-group col-lg-3 col-md-3">
    	<label for="num_mex_cal_sup" class="form-label col-lg-8"><strong>Número de registro México Calidad Suprema</strong> (, obligatorio si ya esta registrado):</label>
    	<div class="col-lg-4">
    	<input class="form-control" onchange="this.form.submit()" name="num_mex_cal_sup" value="<? echo $row_operador['num_mex_cal_sup'];?>"  title="Número"  class="form-control"/>
    	</div>
    	</div>
        
        <div class="form-group col-lg-6 col-md-6">
    	<label for="num_primus" class="form-label col-lg-4"><strong>Número PrimusGFS:</strong> , obligatorio si estuvieron certificados anteriormente en el esquema PrimusGFS:</label>
    	<div class="col-lg-8">
    	<input class="form-control" onchange="this.form.submit()" name="num_primus" type="text"  			title="Número " value="<? echo $row_operador['num_primus'];?>" class="form-control" />
	    </div>
		</div>
<div class="form-group col-lg-5 col-md-5">
    	<label for="num_senasica" class="form-label col-lg-4"><strong>Número de  registro de SENASICA:</strong> , obligatorio si se registró con SENASICA:</label>
    	<div class="col-lg-8">
    	<input class="form-control" onchange="this.form.submit()" name="num_senasica" type="text"  			title="Número " value="<? echo $row_operador['num_senasica'];?>" class="form-control" />
	    </div>
		</div>
		<div class="form-group col-lg-6 col-md-6">
    	<label for="reponsable" class="form-label col-lg-4">Nombre del responsable de la aplicación de la norma en la entidad legal:</label>
    	<div class="col-lg-8">
    	<input class="form-control"  onchange="this.form.submit()" name="responsable" value="<? echo $row_operador['responsable'];?>"  title="Responsable " class="form-control" />
    	</div>
		</div>
        <div class="form-group col-lg-6 col-md-6">
    	<label for="personal" class="form-label col-lg-4">Nombre del personal que realizó la autoevaluación/auditoria interna en la entidad legal:</label>
    	<div class="col-lg-8">
    	<input class="form-control"  onchange="this.form.submit()" name="personal" value="<? echo $row_operador['personal'];?>"  title="Personal " class="form-control" />
    	</div>
		</div>
        
    </fieldset>	
    

  <input type="hidden" name="idoperador" value="<? echo $_POST['idoperador']; ?>" />
  <input type="hidden" name="MM_insert" value="form1" />
</form>
<?php include("seccion3.php");?>
<?php include("seccion4.php");?>
<?php include("seccion5.php");?>
<?php /* include("normas_alc.php");?>
 
   
<?php include("unid_produccion.php");?>
<?php include("productos_sol.php");?>
<?php include("produccion.php");?>
<?php include("control_interno.php");?>
<?php include("procesamiento.php");?>

<?php include("inf_comple.php");*/?>



</div>
</div>
</div>
</div>
</div>
</div>
  
 

<?php include("includes/footer.php");?>
</html>