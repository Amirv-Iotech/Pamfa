<?php
if(isset($_GET['c']))
{
header("Location: ../clientes/login.php");	
}
else{
  	header("Location: ../admin/login.php");
}
   	session_start();
 	session_destroy();
?>