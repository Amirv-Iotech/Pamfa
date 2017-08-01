<?php
if (!isset($_SESSION)) {
  session_start();
}


date_default_timezone_set('America/Mexico_City'); 


?>
<?php
 require_once('../../Connections/inforgan_pamfa.php');
mysql_select_db($database_pamfa, $inforgan_pamfa);
?>




<?php
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

if(isset($_GET['idsolicitud'])){$_POST['idsolicitud']=$_GET['idsolicitud'];}

//consultar usuario actual

$query_usuario = sprintf("SELECT * FROM operador WHERE idoperador =(select idoperador from solicitud where idsolicitud=%s)", GetSQLValueString($_POST['idsolicitud'], "text"));
$usuario = mysql_query($query_usuario,$inforgan_pamfa) or die(mysql_error());
$row_usuario = mysql_fetch_assoc($usuario);
//fin consulta usuario




$ban=0;
//FIRMA QR
if(isset($_POST['firmar']))
{	

$_POST['cl']="12345";

	if( strcmp($_POST['nombre_autorizado'],$_POST['nombre_autorizado'])==0){
		if( strcmp($_POST['ife_autorizado'],$_POST['cl'])==0){
			
			$f=date('d/m/y',time());
$insertSQL6 = sprintf("update  contrato set firma_cliente=%s,fecha_firma_cliente=%s where idsolicitud=%s",
            
			 GetSQLValueString($_SESSION['idoperador'], "text"),
             GetSQLValueString($f, "text"), GetSQLValueString($_POST['idsolicitud'], "int"));
			
					  
$Result1 = mysql_query($insertSQL6, $inforgan_pamfa) or die(mysql_error());
$ban=1;
		}
		
	}
 
}

$query_cont = sprintf("SELECT * FROM contrato WHERE idsolicitud=%s", GetSQLValueString($_POST['idsolicitud'], "text"));
$cont = mysql_query($query_cont,$inforgan_pamfa) or die(mysql_error());
$row_cont = mysql_fetch_assoc($cont);

if($row_cont['fecha_firma_cliente']!=	NULL){echo "FIRMADO";}else{?>
Firmar contrato
<? if($ban==0){?>
<form id="form1" name="form1" method="post" action="">
  <table border="0">
    <tr>
      <td><input type="hidden" name="nombre_autorizado" value="<?php echo $row_usuario['nombre_representante'];?>" />
     </td>
      <td>Clave:
        <label>
          <input placeholder="Clave autorización" type="text" name="ife_autorizado" id="ife" value=""  onChange="this.form.submit()"/>
        </label>
     </td>
      <td><label>
      <input type="hidden" name="firmar" id="hiddenField" value="1" />
      <input type="hidden" name="cl"  value="<?php echo $row_usuario['cl'];?>" />
    </td>
    </tr>
  </table>
</form>
<? }
else{ echo "Usuario no autorizado";} }?>
<?
