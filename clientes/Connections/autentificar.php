<?php
require_once('../../Connection/inforgan_pamfa.php');

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
  


  // LOGIN cliente
  if($_POST['clase_usuario'] == "cliente"){
    $loginUsername=$_POST['username'];
    $password=$_POST['password'];
    $MM_fldUserAuthorization = "clase";
    $MM_redirectLoginSuccess = "../index.php";
    $MM_redirectLoginFailed = "../login.php?error=si";
    $MM_redirecttoReferrer = false;

    $loginUsername = $_POST['username'];
    $password = $_POST['password'];


      $LoginRS__query=sprintf("SELECT * FROM operador WHERE username=%s AND password=%s",
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

