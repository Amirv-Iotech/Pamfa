<?php
ob_start(); 
	session_start();
	#evaluo que la sesion continue verificando una de las variables creadas en control.php, cuando esta ya no coincida con el valor incial se redirige al archivo de salir.php
	 $dac = $_SERVER['PHP_SELF'];
	 
$findme   = $_SESSION["tipo"];
$pos = strpos($dac, $findme);

$a='admin';
$c='clientes';
$au='auditor';
$adm = strpos($dac, $a);
$cl = strpos($dac, $c);
$aud = strpos($dac, $au);

	 if($_SESSION["tipo"]=='auditor')
	 {
	if(($_SESSION["autentificado"]==false)|| ($pos==false)){
		if($a==true){
		header("Location: ../../../auditor/login.php");
		}
		if($cl==true){
		header("Location: ../auditor/login.php");
		}
		
	}
	 }
	 
	 if($_SESSION["tipo"]=='clientes')
	 {
	if(($_SESSION["autentificado"]==false)|| ($pos==false)){
		
		if($a==true){
		header("Location: ../clientes/login.php");
		}
		if($adm==true){
		header("Location: ../../../clientes/login.php");
		}
		
	}
	 }
	 if($_SESSION["tipo"]=='admin')
	 {
	if(($_SESSION["autentificado"]==false)|| ($pos==false)){
		header("Location: login.php");
	}
	 }
	
ob_end_flush();	
 ?>