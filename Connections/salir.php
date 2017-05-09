<?php
if(isset($_GET['c']))
{
header("Location: ../index.php");	
}
else if(isset($_GET['a']))
{
header("Location: ../index.php");	
}
else{
  	header("Location: ../index.php");
}
   	session_start();
 	session_destroy();
?>