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
}

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

