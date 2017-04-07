<? require_once('../../Connections/inforgan_pamfa.php');

	session_start();

?>

<? 
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



mysql_select_db($database_pamfa, $inforgan_pamfa);

if (isset($_POST['autorizar'])) {
	
	
$f=date('d/m/y',time());
	$insertSQL = sprintf("update solicitud set autorizada=%s,nombre_autorizo=%s,fecha_autorizo=%s WHERE idsolicitud=%s",

             GetSQLValueString(1, "text"),
			 GetSQLValueString($_SESSION["idusuario"], "text"),
			 GetSQLValueString($f, "text"),
						
	
	GetSQLValueString($_POST['idsolicitud'], "int"));

  $Result1 = mysql_query($insertSQL, $inforgan_pamfa) or die(mysql_error());
  
  $insertSQL = sprintf("INSERT INTO plan_auditoria (idsolicitud) VALUES (%s)",
             GetSQLValueString($_POST['idsolicitud'], "text"));
			 $Result1 = mysql_query($insertSQL, $inforgan_pamfa) or die(mysql_error());
}
if (isset($_POST['desautorizar'])) {
	
	
$f=date('d/m/y',time());
	$insertSQL = sprintf("update solicitud set autorizada=NULL,nombre_autorizo=NULL,fecha_autorizo=NULL WHERE idsolicitud=%s",

            
	
	GetSQLValueString($_POST['idsolicitud'], "int"));

  $Result1 = mysql_query($insertSQL, $inforgan_pamfa) or die(mysql_error());
}
///////fin

$query_solicitud = "SELECT * FROM solicitud where terminada=1 ORDER BY idsolicitud DESC";
$solicitud = mysql_query($query_solicitud, $inforgan_pamfa) or die(mysql_error());




 include("includes/header.php");
 
 ?>

	        <div class="content">
	            <div class="container-fluid">
	                <div class="row">
	                    <div class="col-md-12">
	                        <div class="card">
	                            <div class="card-header" data-background-color="green">
	                                <h4 class="title">Solicitudes anteriores</h4>
	                                <p class="category">Bitacora de tus solicitudes</p>
	                            </div>
	                            <div class="card-content table-responsive">
                               
	                                <table class="table">
                                    
	                                    <thead >
	                                    	<th>Id</th>
	                                    	<th>Cliente</th>
	                                    	<th>Fecha</th>
                                            <th></th>
                                            <th>Estado</th>
											
	                                    </thead>
	                                    <tbody>
                                        <? while( $row_solicitud= mysql_fetch_assoc($solicitud))
										{
											$query_cliente = "SELECT nombre_legal FROM operador where idoperador=".$row_solicitud['idoperador']."";
$cliente = mysql_query($query_cliente, $inforgan_pamfa) or die(mysql_error());
$row_cliente= mysql_fetch_assoc($cliente);
											?>
	                                        <tr>
	                                        	<td><? echo $row_solicitud['idsolicitud'];?></td>
	                                        	<td><? echo $row_cliente['nombre_legal'];?></td>
	                                        	<td><? echo date('d/m/y',$row_solicitud['fecha']);?></td>
                                                <td>
                                                <form action="formulario.php" method="post">
                                                 <button type="submit" name="Ver"  value="1"class="btn btn-success">Ver</button>
                                                 <input type="hidden" name="idsolicitud" value="<? echo $row_solicitud['idsolicitud']; ?>" />
                                                 
</form></td>
<? if($row_solicitud['autorizada']!=1)
{?>
 <td>
                                                <form action="" method="post">
                                                 <button type="submit" name="autorizar"  value="1"class="btn btn-danger">Autorizar</button>
                                                 <input type="hidden" name="idsolicitud" value="<? echo $row_solicitud['idsolicitud']; ?>" />
                                                 
</form></td><? } else {?>

 <td>
                                                
                                                 <button type="button" name="desautorizar"  value="1"class="btn btn-info">Autorizado</button>
                                                 
</form></td><? }?>
												
	                                        </tr>
										<? }?>
	                                        
	                                       
	                                    </tbody>
	                                </table>

	                            </div>
	                        </div>
	                    </div>

	                    
	                            </div>
	                        </div>
	                    </div>
	                </div>
	            </div>
	        </div>

	<? include("includes/header.php");?>      

</html>
