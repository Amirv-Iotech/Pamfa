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
	$insertSQL = sprintf("Update operador SET username=%s,password=%s,email=%s WHERE idoperador=%s",
 GetSQLValueString($_POST['username'], "text"),
 GetSQLValueString($_POST['password'], "text"),
 GetSQLValueString($_POST['email'], "text"),
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
	           
	                    <div class="col-md-8">
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
													<label class="control-label">Usuario</label>
													<input name="username" type="text" class="form-control" value="<? echo $row_usuario['username'];?>" >
												</div>
	                                        </div>
                                             <div class="col-md-3">
												<div class="form-group label-floating">
                                                <label class="control-label">Contraseña</label>
												  <input name="password" type="text" class="form-control" value="<? echo $row_usuario['password'];?>" >
												</div>
	                                        </div>
	                                        <div class="col-md-3">
												<div class="form-group label-floating">
													<label class="control-label">Email </label>
													<input name="email" type="email" class="form-control" value="<? echo $row_usuario['email'];?>">
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
	                                    <button type="submit" class="btn btn-primary pull-right" name="update">Update Profile</button>
                                        <input type="hidden" name="idoperador" value="<? echo $_SESSION['idusuario']; ?>" />
	                                    <div class="clearfix"></div>
	                                </form>
	                           
	                        </div>
	                    </div>
			<? include('includes/footer.php');?>			
	       
</html>
