<? require_once('../../Connection/inforgan_pamfa.php');

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

if (isset($_POST['aprobar'])) {
		
$f=date('d/m/y',time());
			 $insertSQL = sprintf("update plan_auditoria set aprobado=%s,idaprobado=%s,fecha_aprobado=%s WHERE idplan_auditoria=%s",

             GetSQLValueString(1, "text"),
			 GetSQLValueString($_SESSION["idusuario"], "text"),
			 GetSQLValueString($f, "text"),
	GetSQLValueString($_POST['idplan_auditoria'], "int"));

  $Result1 = mysql_query($insertSQL, $inforgan_pamfa) or die(mysql_error());
  
  $insertSQL = sprintf("INSERT INTO informe (idplan_auditoria) VALUES (%s)",
             GetSQLValueString($_POST['idplan_auditoria'], "text"));
			 $Result1 = mysql_query($insertSQL, $inforgan_pamfa) or die(mysql_error());
			 
	
	$query_pa = "SELECT * FROM plan_auditoria where idplan_auditoria='".$_POST['idplan_auditoria']."' ";
$pa = mysql_query($query_pa, $inforgan_pamfa) or die(mysql_error());
$row_pa= mysql_fetch_assoc($pa);
		 	
			
			if($row_pa['firma']==1)
			{
	$query_informe = "SELECT * FROM informe where idplan_auditoria='".$_POST['idplan_auditoria']."' ";
$informe = mysql_query($query_informe, $inforgan_pamfa) or die(mysql_error());
$row_informe= mysql_fetch_assoc($informe);
	
$query_equipo = "SELECT idauditor FROM plan_auditoria_equipo where  idplan_auditoria='".$_POST['idplan_auditoria']."' ";
$equipo = mysql_query($query_equipo, $inforgan_pamfa) or die(mysql_error());
while($row_equipo= mysql_fetch_assoc($equipo))
{


$insertSQL = sprintf("INSERT INTO informe_firma (idinforme,idauditor) VALUES (%s,%s)",
             GetSQLValueString($row_informe['idinforme'], "text"),
			 GetSQLValueString($row_equipo['idauditor'], "text"));
			 $Result1 = mysql_query($insertSQL, $inforgan_pamfa) or die(mysql_error());	
}
			}
}
if (isset($_POST['desautorizar'])) {
	
	
$f=date('d/m/y',time());
	$insertSQL = sprintf("update solicitud set autorizada=NULL,nombre_autorizo=NULL,fecha_autorizo=NULL WHERE idsolicitud=%s",

            
	
	GetSQLValueString($_POST['idsolicitud'], "int"));

  $Result1 = mysql_query($insertSQL, $inforgan_pamfa) or die(mysql_error());
}
///////fin

$query_plan_auditoria = "SELECT idsolicitud,idplan_auditoria,firma,aprobado FROM plan_auditoria  ORDER BY idsolicitud DESC";
$plan_auditoria  = mysql_query($query_plan_auditoria , $inforgan_pamfa) or die(mysql_error());




 include("includes/header.php");
 
 ?>

	        <div class="content">
	            <div class="container-fluid">
	                <div class="row">
	                    <div class="col-md-12">
	                        <div class="card">
	                            <div class="card-header" data-background-color="green">
	                                <h4 class="title">Planes de auditoria</h4>
	                                <p class="category">Bitacora de tus planes de auditoria</p>
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
                                        <? while( $row_plan_auditoria= mysql_fetch_assoc($plan_auditoria))
										{
											
											$query_solicitud = "SELECT idoperador,idsolicitud FROM solicitud where idsolicitud='".$row_plan_auditoria['idsolicitud']."' ";
$solicitud = mysql_query($query_solicitud, $inforgan_pamfa) or die(mysql_error());
$row_solicitud= mysql_fetch_assoc($solicitud);

											
											$query_cliente = "SELECT nombre_legal FROM operador where idoperador='".$row_solicitud['idoperador']."' ";
$cliente = mysql_query($query_cliente, $inforgan_pamfa) or die(mysql_error());
$row_cliente= mysql_fetch_assoc($cliente);
											?>
	                                        <tr>
	                                        	<td><? echo $row_plan_auditoria['idsolicitud'];?></td>
	                                        	<td><? echo $row_cliente['nombre_legal'];?></td>
	                                        	
                                                <td>
                                                <form action="formulario.php" method="post">
                                                 <button type="submit" name="Ver"  value="1"class="btn btn-success">Ver</button>
                                                 <input type="hidden" name="idsolicitud" value="<? echo $row_solicitud['idsolicitud']; ?>" />
                                                   <input type="hidden" name="idplan_auditoria" value="<? echo $row_plan_auditoria['idplan_auditoria']; ?>" />
</form></td>
<? if($row_plan_auditoria['firma']!=1)
{?>
 <td>
                                                <form action="" method="post">
                                                 <button type="buttom" name="firma"  disabled value="1"class="btn btn-danger">Por firmar</button>
                                                 <input type="hidden" name="idplan_auditoria" value="<? echo $row_plan_auditoria['idplan_auditoria']; ?>" />
                                                 
</form></td><? } else {?>

 <td>
                                                
                                                 <button type="button" name="firmada"  value="1"class="btn btn-info">Firmada</button>
                                                 
</form></td>

<? if($row_plan_auditoria['aprobado']!=1)
{?>
 <td>
                                  <form action="" method="post">              
                                                 <button type="submit" name="aprobar"  value="1"class="btn btn-danger">Aprobar</button>
                                                 <input type="hidden" name="idplan_auditoria" value="<? echo $row_plan_auditoria['idplan_auditoria']; ?>" />
                                                 
</form></td>
<? }else {?>
	<td>
	 <button type="button" name="aprobar"  value="1"class="btn btn-info">Aprobada</button>
	</td>
	<? }}?>
												
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
