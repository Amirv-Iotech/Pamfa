<?php
require_once('inforgan_pamfa.php');

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
}?>
<!doctype html>
<html lang="en">
<head>

	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="../../assets/img/apple-icon.png" />
	<link rel="icon" type="image/png" href="../../assets/img/favicon.png" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>PAMFA A.C.</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
<script src="../../assets/js/jquery-3.1.0.min.js" type="text/javascript"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  	


<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="../../assets/css/demo.css" rel="stylesheet" />

    <!-- Bootstrap core CSS     -->
    <link href="../../assets/css/bootstrap.min.css" rel="stylesheet" />

    <!--  Material Dashboard CSS    -->
    <link href="../../assets/css/material-dashboard.css" rel="stylesheet"/>


    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>
    
     <link rel="stylesheet"  href="../../assets/datatables/dataTables.bootstrap.css">
   
    <style> .a {
  color: #333;
}
</style>
</head>

<body>
<?
if(isset($_POST['username'])){
  // LOGIN ADMINISTRADOR
  if($_POST['clase_usuario'] == "administrador"){
    $loginUsername=$_POST['username'];
    $password=$_POST['password'];
    $MM_fldUserAuthorization = "clase";
    $MM_redirectLoginSuccess = "../admin/app/secciones/index.php";
    $MM_redirectLoginFailed = "../admin/login.php?error=si";
    $MM_redirecttoReferrer = false;

    $loginUsername = $_POST['username'];
    $password = $_POST['password'];


      $LoginRS__query=sprintf("SELECT * FROM usuario WHERE username=BINARY %s AND password=BINARY %s",
      GetSQLValueString($loginUsername, "text"), 
      GetSQLValueString($password, "text")); 
	
       
      $LoginRS = mysql_query($LoginRS__query, $inforgan_pamfa) or die(mysql_error());
      $loginFoundUser = mysql_num_rows($LoginRS);

      if ($loginFoundUser) {
        
        $loginStrGroup  = mysql_fetch_assoc($LoginRS);
        
      if (PHP_VERSION >= 5.1) {session_regenerate_id(true);} else {session_regenerate_id();}
     
      session_start();
	   $_SESSION["autentificado"] = false;
        $_SESSION["idusuario"] = $loginStrGroup['idusuario'];
        $_SESSION["clase"] = $loginStrGroup['clase'];
        $_SESSION['username'] = $loginUsername;     
        $_SESSION["autentificado"] = true;
        $_SESSION["nombre"] = $loginStrGroup['nombre'];
        $_SESSION["clase_usuario"] = $_POST['clase_usuario'];
		 $_SESSION["tipo"] = 'admin';
        //$_SESSION["email"] = $loginStrGroup['email'];

        if (isset($_SESSION['PrevUrl']) && false) {
          $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];  
        }
        header("Location: " . $MM_redirectLoginSuccess );
      }
      else {
        $_SESSION["autentificado"] = false;
		
      header("Location: ". $MM_redirectLoginFailed );
	 
      }

  }
  else if($_POST['clase_usuario'] == "auditor"){
    $loginUsername=$_POST['username'];
    $password=$_POST['password'];
    $MM_fldUserAuthorization = "clase";
    $MM_redirectLoginSuccess = "../auditor/index.php";
    $MM_redirectLoginFailed = "../auditor/login.php?error=si";
    $MM_redirecttoReferrer = false;

    $loginUsername = $_POST['username'];
    $password = $_POST['password'];


      $LoginRS__query=sprintf("SELECT * FROM usuario WHERE username=BINARY %s AND password= BINARY %s and ( tipo=2 or tipo=3)",
      GetSQLValueString($loginUsername, "text"), 
      GetSQLValueString($password, "text")); 
	
       
      $LoginRS = mysql_query($LoginRS__query, $inforgan_pamfa) or die(mysql_error());
      $loginFoundUser = mysql_num_rows($LoginRS);

      if ($loginFoundUser) {
        
        $loginStrGroup  = mysql_fetch_assoc($LoginRS);
        
      if (PHP_VERSION >= 5.1) {session_regenerate_id(true);} else {session_regenerate_id();}
     
      session_start();
	   $_SESSION["autentificado"] = false;
        $_SESSION["idusuario"] = $loginStrGroup['idusuario'];
        $_SESSION["clase"] = $loginStrGroup['clase'];
        $_SESSION['username'] = $loginUsername;     
        $_SESSION["autentificado"] = true;
        $_SESSION["nombre"] = $loginStrGroup['nombre'];
        $_SESSION["clase_usuario"] = $_POST['clase_usuario'];
		 $_SESSION["tipo"] = 'auditor';
        //$_SESSION["email"] = $loginStrGroup['email'];

        if (isset($_SESSION['PrevUrl']) && false) {
          $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];  
        }
        header("Location: " . $MM_redirectLoginSuccess );
      }
      else {
        $_SESSION["autentificado"] = false;
        header("Location: ". $MM_redirectLoginFailed );
      }

  }
  //TERMINA LOGIN ADMINISTRADOR



  // LOGIN cliente
  if($_POST['clase_usuario'] == "cliente"){
    $loginUsername=$_POST['username'];
    $password=$_POST['password'];
    $MM_fldUserAuthorization = "clase";
    $MM_redirectLoginSuccess = "../clientes/index.php";
    $MM_redirectLoginFailed = "../clientes/login.php?error=si";
    $MM_redirecttoReferrer = false;

    $loginUsername = $_POST['username'];
    $password = $_POST['password'];


      $LoginRS__query=sprintf("SELECT * FROM operador WHERE username=BINARY %s AND password=BINARY %s",
      GetSQLValueString($loginUsername, "text"), 
      GetSQLValueString($password, "text")); 
	
       
      $LoginRS = mysql_query($LoginRS__query, $inforgan_pamfa) or die(mysql_error());
      $loginFoundUser = mysql_num_rows($LoginRS);

      if ($loginFoundUser) {
        
        $loginStrGroup  = mysql_fetch_assoc($LoginRS);
        
      if (PHP_VERSION >= 5.1) {session_regenerate_id(true);} else {session_regenerate_id();}
     
      session_start();
	   $_SESSION["autentificado"] = false;
        $_SESSION["idoperador"] = $loginStrGroup['idoperador'];
        $_SESSION["idusuario"] = $loginStrGroup['idoperador'];
        $_SESSION['username'] = $loginUsername;     
        $_SESSION["autentificado"] = true;
        $_SESSION["nombre"] = $loginStrGroup['nombre'];
        $_SESSION["mun"] = $loginStrGroup['municipio'];
		 $_SESSION["tipo"] = 'clientes';
        //$_SESSION["email"] = $loginStrGroup['email'];

        if (isset($_SESSION['PrevUrl']) && false) {
          $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];  
        }
        header("Location: " . $MM_redirectLoginSuccess );
      }
      else {
        $_SESSION["autentificado"] = false;
        header("Location: ". $MM_redirectLoginFailed );
      }

  }
  //TERMINA LOGIN clientes

}
?>
</div>
	</div>

</body>

	<!--   Core JS Files   -->
		<script src="../../assets/js/material.min.js" type="text/javascript"></script>

	<!--  Charts Plugin -->
	<script src="../../assets/js/chartist.min.js"></script>

	<!--  Notifications Plugin    -->
	<script src="../../assets/js/bootstrap-notify.js"></script>

	<!--  Google Maps Plugin    -->
	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>

	<!-- Material Dashboard javascript methods -->
	<script src="../../assets/js/material-dashboard.js"></script>

	<!-- Material Dashboard DEMO methods, don't include it in your project! -->
	<script src="../../assets/js/demo.js"></script>
<!-- DataTables -->
<script src="../../assets/datatables/jquery.dataTables.min.js"></script>
<script src="../../assets/datatables/dataTables.bootstrap.min.js"></script> 
	<script type="text/javascript">
    	$(document).ready(function(){

			// Javascript method's body can be found in assets/js/demos.js
        	demo.initDashboardPageCharts();

    	});
	</script>
    </html>
