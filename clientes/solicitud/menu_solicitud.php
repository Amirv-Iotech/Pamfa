<? require_once('../../Connections/inforgan_pamfa.php');
if(!session_start())
{
	session_start();
}
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

$query_cliente = "SELECT * FROM operador where idoperador=".$_SESSION['idoperador']."";
$cliente = mysql_query($query_cliente, $inforgan_pamfa) or die(mysql_error());
$row_cliente= mysql_fetch_assoc($cliente);

$query_solicitud = "SELECT idsolicitud,fecha FROM solicitud where idoperador='".$row_cliente['idoperador']."' and terminada=2 ORDER BY idsolicitud DESC";
$solicitud = mysql_query($query_solicitud, $inforgan_pamfa) or die(mysql_error());




 include("includes/header.php");
 
 ?>

	        <div class="content">
	            <div class="container-fluid">
                <? 
                $query_solicitud2 = sprintf("SELECT * FROM solicitud WHERE idoperador=%s and autorizada is  null and terminada is not null order by idsolicitud desc limit 1", GetSQLValueString( $_SESSION["idoperador"], "int"));
$solicitud2 = mysql_query($query_solicitud2, $inforgan_pamfa) or die(mysql_error());
$total_solicitud2 = mysql_num_rows($solicitud2);




 ?> <br /><br /><br />
                 <form action="formulario.php" method="post">
                                                 <button data-toggle="tooltip"  type="submit" name="Ver" <? if($total_solicitud2==1){?> class="btn btn-default" disabled="disabled" title="Tiene una solicitud en progreso" <?  }else {?> title="Ver" <?  }?> value="1"class="btn btn-success"><i class="fa fa-plus-circle fa-4x" aria-hidden="true"> </i>NUEVA</button>
                                                 
</form>


	                <div class="row">
	                    <div class="col-md-12">
	                        <div class="card">
	                            <div class="card-header" data-background-color="red">
	                                <h4 class="title">Solicitudes Con observaciones </h4>
	                                <p class="category">Por favor atienda las observaciones destectadas en estas solicitudes </p>
                                       
	                            </div>
	                            <div class="card-content table-responsive">
                               
	                                <table class="table">
                                    
	                                    <thead >
	                                    	<th>Id</th>
	                                    	<th>Cliente</th>
	                                    	<th>Fecha</th>
                                            <th></th>
											
	                                    </thead>
	                                    <tbody>
                                        <? while( $row_solicitud= mysql_fetch_assoc($solicitud))
										{
											
											?>
	                                        <tr>
	                                        	<td><? echo $row_solicitud['idsolicitud'];?></td>
	                                        	<td><? echo $row_cliente['nombre_legal'];?></td>
	                                        	<td><? echo date('d/m/y',$row_solicitud['fecha']);?></td>
                                                <td>
                                                <form action="formulario.php" method="post">
                                                 <button data-toggle="tooltip" title="Ver" type="submit" name="Ver"  value="1"class="btn btn-success"><i class="fa fa-eye" aria-hidden="true"></i></button>
                                                 <input type="hidden" name="idsolicitud" value="<?  echo $row_solicitud['idsolicitud'];?>" />
</form></td>
												
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

	<? include("includes/footer.php");?>      

</html>
