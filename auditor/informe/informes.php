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

if (isset($_POST['firma'])) {
		
$f=date('d/m/y',time());
	$insertSQL = sprintf("update informe_firma set firma=%s,fecha_firma=%s WHERE idinforme=%s and idauditor=%s",

             GetSQLValueString(1, "text"),
			  GetSQLValueString($f, "text"),
			 
			
	GetSQLValueString($_POST['idinforme'], "int"),
	GetSQLValueString($_SESSION["idusuario"], "text"));

  $Result1 = mysql_query($insertSQL, $inforgan_pamfa) or die(mysql_error());
  
   $query_informe = "SELECT * FROM informe_firma where idinforme='".$_POST['idinforme']."'";
$informe  = mysql_query($query_informe , $inforgan_pamfa) or die(mysql_error());
$total_informe = mysql_num_rows($informe);
  
 $query_informe_firma = "SELECT * FROM informe_firma where idinforme='".$_POST['idinforme']."' and firma=1";
$informe_firma  = mysql_query($query_informe_firma , $inforgan_pamfa) or die(mysql_error());
$total_informe_firma = mysql_num_rows($informe_firma);
  if($total_informe== $total_informe_firma)
  {
 
 $insertSQL = sprintf("update informe set firma_auditor=%s,fecha_firma_auditor=%s WHERE idinforme=%s ",

             GetSQLValueString(1, "text"),
			  GetSQLValueString($f, "text"),
			 
			
	GetSQLValueString($_POST['idinforme'], "int"));

  $Result1 = mysql_query($insertSQL, $inforgan_pamfa) or die(mysql_error());
			
  }
}
if (isset($_POST['desautorizar'])) {
	
	
$f=date('d/m/y',time());
	$insertSQL = sprintf("update solicitud set autorizada=NULL,nombre_autorizo=NULL,fecha_autorizo=NULL WHERE idsolicitud=%s",

            
	
	GetSQLValueString($_POST['idsolicitud'], "int"));

  $Result1 = mysql_query($insertSQL, $inforgan_pamfa) or die(mysql_error());
}
///////fin



$query_informe = "SELECT * FROM informe_firma where idinforme in(SELECT idinforme FROM informe) and idauditor='".$_SESSION['idusuario']."' ORDER BY idinforme DESC";
$informe  = mysql_query($query_informe , $inforgan_pamfa) or die(mysql_error());


 include("includes/header.php");
 
 ?>

	        <div class="content">
	            <div class="container-fluid">
	                <div class="row">
	                    <div class="col-md-12">
	                        <div class="card">
	                            <div class="card-header" data-background-color="green">
	                                <h4 class="title">Informes</h4>
	                                <p class="category">Bitacora</p>
	                            </div>
	                            <div class="card-content table-responsive">
                               
	                                <table class="table">
                                    
	                                    <thead >
	                                    	<th>Id</th>
	                                    	<th>Cliente</th>
	                                    	
                                            <th></th>
                                            <th>Estado</th>
											
	                                    </thead>
	                                    <tbody>
                                        <? while( $row_informe= mysql_fetch_assoc($informe))
										{
																		
											
											$query_solicitud = "SELECT idoperador,idsolicitud FROM solicitud where idsolicitud=(select idsolicitud from plan_auditoria where idplan_auditoria=(select idplan_auditoria from informe where idinforme='".$row_informe['idinforme']."')) ";
$solicitud = mysql_query($query_solicitud, $inforgan_pamfa) or die(mysql_error());
$row_solicitud= mysql_fetch_assoc($solicitud);

											
											$query_cliente = "SELECT nombre_legal FROM operador where idoperador='".$row_solicitud['idoperador']."' ";
$cliente = mysql_query($query_cliente, $inforgan_pamfa) or die(mysql_error());
$row_cliente= mysql_fetch_assoc($cliente);
											?>
	                                        <tr>
	                                        	<td><? echo $row_solicitud['idsolicitud'];?></td>
	                                        	<td><? echo $row_cliente['nombre_legal'];?></td>
	                                        	
                                                
                                                 <td>
                                                <form action="formulario.php" method="post">
                                                 <button data-toggle="tooltip" title="Ver" type="submit" name="Ver"  value="1"class="btn btn-success"><i class="fa fa-eye" aria-hidden="true"></i></button>
                                                 <input type="hidden" name="idsolicitud" value="<? echo $row_solicitud['idsolicitud']; ?>" />
                                                   <input type="hidden" name="idinforme" value="<? echo $row_informe['idinforme']; ?>" />
</form></td>
<? if($row_informe['firma']!=1)

{?>
 <td>
                                                <form action="" method="post">
                                                 <button data-toggle="tooltip" title="Por Firmar" type="submit" name="firma" disabled  value="1"class="btn btn-danger"><i class="fa fa-clock-o" aria-hidden="true"></i>
</button>
                                                 <input type="hidden" name="idinforme" value="<? echo $row_informe['idinforme']; ?>" />
                                                 
</form></td><? }else {?>

 <td>
                                                
                                                 <button data-toggle="tooltip" title="Firmada" type="button" name="firmada" disabled  value="1"class="btn btn-info"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
</button> 
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

	<? include("includes/footer.php");?>      

</html>
