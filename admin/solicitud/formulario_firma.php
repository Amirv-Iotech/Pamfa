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
$colname_usuario = "-1";
if (isset($_SESSION['idusuario'])) {
  $colname_usuario = $_SESSION['idusuario'];
}
$query_usuario = sprintf("SELECT * FROM usuario WHERE idusuario = %s and tipo=1", GetSQLValueString($colname_usuario, "text"));
$usuario = mysql_query($query_usuario,$inforgan_pamfa) or die(mysql_error());
$row_usuario = mysql_fetch_assoc($usuario);
//fin consulta usuario




$ban=0;
//FIRMA QR
if(isset($_POST['firmar']))
{	


	if( strcmp($_POST['nombre_autorizado'],"jesus mhz")==0){
		if( strcmp($_POST['ife_autorizado'],"12345")==0){
			
			$f=date('d/m/y',time());
$insertSQL6 = sprintf("insert into contrato (idsolicitud,firma_admin,fecha_firma_admin) VALUES (%s, %s,%s)",
             GetSQLValueString($_POST['idsolicitud'], "int"),
			 GetSQLValueString($_SESSION['idusuario'], "text"),
             GetSQLValueString($f, "text"));
			
					  
$Result1 = mysql_query($insertSQL6, $inforgan_pamfa) or die(mysql_error());
		}
		
	}
 
}

$query_cont = sprintf("SELECT * FROM contrato WHERE idsolicitud=%s", GetSQLValueString($_POST['idsolicitud'], "text"));
$cont = mysql_query($query_cont,$inforgan_pamfa) or die(mysql_error());
$row_cont = mysql_fetch_assoc($cont);

if($row_cont['fecha_firma_admin']!=	NULL){echo "FIRMADO";}else{?>
Firmar contrato
<? if($row_usuario['tipo']==1){?>
<form id="form1" name="form1" method="post" action="">
  <table border="0">
    <tr>
      <td><input type="hidden" name="nombre_autorizado" value="<?php echo $row_usuario['nombre']." ".$row_usuario['apellidos'];?>" />
     </td>
      <td>Clave:
        <label>
          <input placeholder="Clave autorización" type="text" name="ife_autorizado" id="ife" value=""  onChange="this.form.submit()"/>
        </label>
     </td>
      <td><label>
      <input type="hidden" name="firmar" id="hiddenField" value="1" />
    </td>
    </tr>
  </table>
</form>
<? }
else{ echo "Usuario no autorizado";} }?>
<?
