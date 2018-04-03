<?php
session_start();
include ("../Connections/inforgan_pamfa.php");
mysql_select_db($database_pamfa, $inforgan_pamfa);

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
if(isset($_POST['update']))
{
	$insertSQL = sprintf("Update operador SET username=%s,password=%s,nombre_legal=%s,nombre_representante=%s,direccion=%s,colonia=%s,municipio=%s,estado=%s,pais=%s,cp=%s,coordenadas=%s,email=%s,telefono=%s,fax=%s,rfc=%s,dir_rfc=%s,nombre_factura=%s,email_factura=%s,tel_factura=%s,forma_pago=%s,banco=%s,digitos_tarjeta=%s WHERE idoperador=%s",
	 GetSQLValueString($_POST['username'], "text"),
 GetSQLValueString($_POST['password'], "text"),
 GetSQLValueString($_POST['nombre_legal'], "text"),
 GetSQLValueString($_POST['nombre_representante'], "text"),
 GetSQLValueString($_POST['direccion'], "text"),
 GetSQLValueString($_POST['colonia'], "text"),
 GetSQLValueString($_POST['municipio'], "text"),
  GetSQLValueString($_POST['estado'], "text"),
 GetSQLValueString($_POST['pais'], "text"),
 GetSQLValueString($_POST['cp'], "text"),
 GetSQLValueString($_POST['coordenadas'], "text"),
  GetSQLValueString($_POST['email'], "text"),
 GetSQLValueString($_POST['telefono'], "text"),
 GetSQLValueString($_POST['fax'], "text"), 
 GetSQLValueString($_POST['rfc'], "text"),
 GetSQLValueString($_POST['dir_rfc'], "text"),
 GetSQLValueString($_POST['nombre_factura'], "text"),
  GetSQLValueString($_POST['email_factura'], "text"),
 GetSQLValueString($_POST['tel_factura'], "text"),
 GetSQLValueString($_POST['forma_pago'], "text"), 
 GetSQLValueString($_POST['banco'], "text"),
 GetSQLValueString($_POST['digitos_tarjeta'], "text"),
  GetSQLValueString($_POST['idoperador'], "text"));




  $Result1= mysql_query($insertSQL ,$inforgan_pamfa) or die(mysql_error());
}
 $query_usuario=sprintf("SELECT * FROM operador WHERE idoperador=%s",
      GetSQLValueString($_SESSION["idusuario"], "text")); 
	
       
      $usuario = mysql_query($query_usuario, $inforgan_pamfa) or die(mysql_error());
     $row_usuario  = mysql_fetch_assoc($usuario);
?>

<? include('includes/header.php');?>
	        <div class="content">
	           
	                    <div class="col-md-12">
	                        <div class="card">
	                            <div class="card-header" data-background-color="green">
	                                <h4 class="title">Editar perfil</h4>
									<p class="category">Modifica tus datos  </p>
	                            </div>
	                            <div class="card-content">
                                
	                                <form method="post" action="">
	                                    <div class="row">
	                                        
	                                        <div class="col-md-3">
												<div class="form-group label-floating">
													<label class="control-label">Usuario:</label>
													<input name="username" type="text" class="form-control" value="<? echo $row_usuario['username'];?>" >
												</div>
	                                        </div>
                                             <div class="col-md-3">
												<div class="form-group label-floating">
                                                <label class="control-label">Contraseña:</label>
												  <input name="password" type="text" class="form-control" value="<? echo $row_usuario['password'];?>" >
												</div>
	                                        </div>
	                                        <div class="col-md-3">
												<div class="form-group label-floating">
													<label class="control-label">Nombre de la entidad legal: </label>
													<input name="nombre_legal" type="text" class="form-control" value="<? echo $row_usuario['nombre_legal'];?>">
												</div>
	                                        </div>
                                            
                                            <div class="col-md-3">
												<div class="form-group label-floating">
													<label class="control-label">Nombre del representante legal: </label>
													<input name="nombre_representante" type="text" class="form-control" value="<? echo $row_usuario['nombre_representante'];?>">
												</div>
	                                        </div>
                                            <div class="col-md-3">
												<div class="form-group label-floating">
													<label class="control-label">Dirección </label>
													<input name="direccion" type="text" class="form-control" value="<? echo $row_usuario['direccion'];?>">
 

 
												</div>
	                                        </div>
                                            <div class="col-md-3">
												<div class="form-group label-floating">
													<label class="control-label">Colonia </label>
													<input name="colonia" type="text" class="form-control" value="<? echo $row_usuario['colonia'];?>">
												</div>
	                                        </div>
                                            <div class="col-md-3">
												<div class="form-group label-floating">
													<label class="control-label">Municipio </label>
													<input name="municipio" type="text" class="form-control" value="<? echo $row_usuario['municipio'];?>">
												</div>
	                                        </div>
                                            <div class="col-md-3">
												<div class="form-group label-floating">
													<label class="control-label">Estado</label>
													<input name="estado" type="text" class="form-control" value="<? echo $row_usuario['estado'];?>">
												</div>
	                                        </div>
                                            <div class="col-md-3">
												<div class="form-group label-floating">
													<label class="control-label">País</label>
													<input name="pais" type="text" class="form-control" value="<? echo $row_usuario['pais'];?>">
												</div>
	                                        </div>
                                            <div class="col-md-3">
												<div class="form-group label-floating">
													<label class="control-label">C.P. </label>
													<input name="cp" type="text" class="form-control" value="<? echo $row_usuario['cp'];?>">
												</div>
	                                        </div>
                                            <div class="col-md-3">
												<div class="form-group label-floating">
													<label class="control-label">Coordenadas </label>
													<input name="coordenadas" type="text" class="form-control" value="<? echo $row_usuario['coordenadas'];?>">
												</div>
	                                        </div>
                                            <div class="col-md-3">
												<div class="form-group label-floating">
													<label class="control-label">Email </label>
													<input name="email" type="email" class="form-control" value="<? echo $row_usuario['email'];?>">
												</div>
	                                        </div>
   
                                            <div class="col-md-3">
												<div class="form-group label-floating">
													<label class="control-label">Teléfono </label>
													<input name="telefono" type="text" class="form-control" value="<? echo $row_usuario['telefono'];?>">
												</div>
	                                        </div>
                                            <div class="col-md-3">
												<div class="form-group label-floating">
													<label class="control-label">Fax </label>
													<input name="fax" type="text" class="form-control" value="<? echo $row_usuario['fax'];?>">
												</div>
	                                        </div>
                                            <div class="col-md-3">
												<div class="form-group label-floating">
													<label class="control-label">R.F.C. </label>
													<input name="rfc" type="text" class="form-control" value="<? echo $row_usuario['rfc'];?>">
												</div>
	                                        </div>
                                            <div class="col-md-3">
												<div class="form-group label-floating">
													<label class="control-label">Dirección de R.F.C </label>
													<input name="dir_rfc" type="text" class="form-control" value="<? echo $row_usuario['dir_rfc'];?>">
												</div>
	                                        </div>
                                            <div class="col-md-3">
 
												<div class="form-group label-floating">
													<label class="control-label">Nombre contacto: </label>
													<input name="nombre_factura" type="text" class="form-control" value="<? echo $row_usuario['nombre_factura'];?>">
												</div>
	                                        </div>
                                            <div class="col-md-3">
												<div class="form-group label-floating">
													<label class="control-label">Email factura: </label>
													<input name="email_factura" type="email" class="form-control" value="<? echo $row_usuario['email_factura'];?>">
												</div>
	                                        </div>
                                            <div class="col-md-3">
												<div class="form-group label-floating">
													<label class="control-label">Teléfono factura: </label>
													<input name="tel_factura" type="text" class="form-control" value="<? echo $row_usuario['tel_factura'];?>">
												</div>
	                                        </div>
                                            <div class="col-md-3">
												<div class="form-group label-floating">
													<label class="control-label">Forma de pago: </label>
													<input name="forma_pago" type="text" class="form-control" value="<? echo $row_usuario['forma_pago'];?>">
												</div>
	                                        </div>
                                            <div class="col-md-3">
												<div class="form-group label-floating">
													<label class="control-label">Banco: </label>
													<input name="banco" type="text" class="form-control" value="<? echo $row_usuario['banco'];?>">
												</div>
	                                        </div>
                                             <div class="col-md-3">
												<div class="form-group label-floating">
													<label class="control-label">Últimos 4 digitos tarjeta: </label>
													<input name="digitos_tarjeta" type="text" class="form-control" value="<? echo $row_usuario['digitos_tarjeta'];?>" maxlength="4">
												</div>
	                                        </div>
	                                    </div>
<? /*
	                                    <div class="row">
	                                        <div class="col-md-6">
												<div class="form-group label-floating">
													<label class="control-label">Fist Name</label>
													<input type="text" class="form-control" value="<? echo $row_usuario['nombre'];?>">
												</div>
	                                        </div>
	                                        <div class="col-md-6">
												<div class="form-group label-floating">
													<label class="control-label">Last Name</label>
													<input type="text" class="form-control" value="<? echo $row_usuario['apellidos'];?>">
												</div>
	                                        </div>
	                                    </div>
*/?>
	                                    <button type="submit" class="btn btn-success pull-right" name="update">Actualizar</button>
                                        <input type="hidden" name="idoperador" value="<? echo $_SESSION['idusuario']; ?>" />
	                                    <div class="clearfix"></div>
	                                </form>
	                           
	                        </div>
	                    </div>
			<? include('includes/footer.php');?>			
	       
</html>
