<?php
session_start();
include ("../Connection/inforgan_pamfa.php");
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

 $query_usuario=sprintf("SELECT * FROM usuario WHERE idusuario=%s",
      GetSQLValueString($_SESSION["idusuario"], "text")); 
	
       
      $usuario = mysql_query($query_usuario, $inforgan_pamfa) or die(mysql_error());
     $row_usuario  = mysql_fetch_assoc($usuario);
?>

<? include('../../includes/header.php');?>
	        <div class="content">
	           
	                    <div class="col-md-8">
	                        <div class="card">
	                            <div class="card-header" data-background-color="green">
	                                <h4 class="title">Edit Profile</h4>
									<p class="category">Complete your profile  </p>
	                            </div>
	                            <div class="card-content">
                                
	                                <form>
	                                    <div class="row">
	                                        
	                                        <div class="col-md-3">
												<div class="form-group label-floating">
													<label class="control-label">Username</label>
													<input type="text" class="form-control" value="<? echo $row_usuario['username'];?>" >
												</div>
	                                        </div>
                                             <div class="col-md-3">
												<div class="form-group label-floating">
													<label class="control-label">Username</label>
													<input type="text" class="form-control" value="<? echo $row_usuario['password'];?>" >
												</div>
	                                        </div>
	                                        <div class="col-md-4">
												<div class="form-group label-floating">
													<label class="control-label">Email address</label>
													<input type="email" class="form-control" value="<? echo $row_usuario['email'];?>">
												</div>
	                                        </div>
	                                    </div>

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

	                                    <button type="submit" class="btn btn-primary pull-right">Update Profile</button>
	                                    <div class="clearfix"></div>
	                                </form>
	                           
	                        </div>
	                    </div>
			<? include('../../includes/footer.php');?>			
	       
</html>
