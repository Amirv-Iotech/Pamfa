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
}?>
<!doctype html>
<html lang="en">
<head>

	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png" />
	<link rel="icon" type="image/png" href="../assets/img/favicon.png" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>PAMFA A.C.</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <!-- Bootstrap core CSS     -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>


    <!--  Material Dashboard CSS    -->
    <link href="../assets/css/material-dashboard.css" rel="stylesheet"/>

    <!-- Malpika css -->
    <link href="../assets/css/style_operador.css" rel="stylesheet"/>

    <!--  CSS for Demo Purpose, don't include it in your project     -->
   

    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>
  
	<link href="../assets/css/solicitud.css" rel="stylesheet"/>
     <link rel="stylesheet"  href="../assets/datatables/dataTables.bootstrap.css">
      <link rel="stylesheet"  href="https://cdn.datatables.net/buttons/1.4.0/css/buttons.dataTables.min.css"  >
      
      
 
</head>

<body>
<?
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
<form action="../solicitud/solicitudes.php" method="post" target="_top" >
      
<button  type="submit" value="Regresar" class="btn btn-success"><i class="fa fa-caret-square-o-left" aria-hidden="true"></i>
 Regresar</button>            
            </form>
</body>


	<!--   Core JS Files   -->
	<script src="../assets/js/jquery-3.1.0.min.js" type="text/javascript"></script>
	<script src="../assets/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="../assets/js/material.min.js" type="text/javascript"></script>

	<!--  Charts Plugin -->
	<script src="../assets/js/chartist.min.js"></script>

	<!--  Notifications Plugin    -->
	<script src="../assets/js/bootstrap-notify.js"></script>

	

	<!-- Material Dashboard javascript methods -->
	<script src="../assets/js/material-dashboard.js"></script>

	<!-- Material Dashboard DEMO methods, don't include it in your project! -->
	<!-- DataTables -->
<script src="../assets/datatables/jquery.dataTables.min.js"></script>
<script src="../assets/datatables/dataTables.bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"  ></script>
<script src="https://cdn.datatables.net/buttons/1.4.0/js/dataTables.buttons.min.js"  ></script>
<script src="https://cdn.datatables.net/buttons/1.4.0/js/buttons.flash.min.js" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"  ></script>
<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/pdfmake.min.js"></script>
<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/vfs_fonts.js"  ></script>
<script src="https://cdn.datatables.net/buttons/1.4.0/js/buttons.html5.min.js"  ></script>
<script src="https://cdn.datatables.net/buttons/1.4.0/js/buttons.print.min.js"  ></script>
  


	<script type="text/javascript">
    	$(document).ready(function(){

			// Javascript method's body can be found in assets/js/demos.js
        	demo.initDashboardPageCharts();

    	});
	</script>
