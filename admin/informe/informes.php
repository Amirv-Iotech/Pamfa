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

if (isset($_POST['aprobar'])) {
		
$f=date('d/m/y',time());
	$insertSQL = sprintf("update informe set aprobado=%s,idaprobado=%s,fecha_aprobado=%s WHERE idplan_auditoria=%s",

             GetSQLValueString(1, "text"),
			 GetSQLValueString($_SESSION["idusuario"], "text"),
			 GetSQLValueString($f, "text"),
	GetSQLValueString($_POST['idplan_auditoria'], "int"));

  $Result1 = mysql_query($insertSQL, $inforgan_pamfa) or die(mysql_error());
  
 
}
if (isset($_POST['desautorizar'])) {
	
	
$f=date('d/m/y',time());
	$insertSQL = sprintf("update solicitud set autorizada=NULL,nombre_autorizo=NULL,fecha_autorizo=NULL WHERE idsolicitud=%s",

            
	
	GetSQLValueString($_POST['idsolicitud'], "int"));

  $Result1 = mysql_query($insertSQL, $inforgan_pamfa) or die(mysql_error());
}
///////fin

$query_informe = "SELECT * FROM informe  ORDER BY idinforme DESC";
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
											
											$query_solicitud = "SELECT * FROM solicitud where idsolicitud=(select idsolicitud from plan_auditoria where idplan_auditoria=(select idplan_auditoria from informe where idinforme='".$row_informe['idinforme']."')) ";
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
                                                 <button type="submit" name="Ver"  value="1"class="btn btn-success">Ver</button>
                                                 <input type="hidden" name="idsolicitud" value="<? echo $row_solicitud['idsolicitud']; ?>" />
                                                   <input type="hidden" name="idinforme" value="<? echo $row_informe['idinforme']; ?>" />
</form></td>
<? if($row_informe['firma_auditor']==NULL || $row_informe['firma_cliente']==NULL)
{?>
 <td>
                                                <form action="" method="post">
                                                 <button type="submit" name="firma" disabled  value="1"class="btn btn-danger">Por firmar</button>
                                                 <input type="hidden" name="idinforme" value="<? echo $row_informe['idinforme'];  ?>" />
                                                 
</form></td><? }?>

 <td>
                                                
                                                 <button type="button" name="firmada" disabled  value="1"class="btn btn-info">Firmada</button>
                                                 
</form></td>

 <td>
 <table>
 <tr>
 <td>
 <label>GLOBALG.A.P IFA</label>
 </td>
 <td>
 <button type="button" name="aprobar"  value="1"<? if($row_informe['dictamen_ifa']=='rechazo'){?>class="btn btn-danger"<? }else {?> class="btn btn-info" <? }?>><? echo ucwords( $row_informe['dictamen_ifa']);?></button>
                                </td>
                                 <? if($row_informe['dictamen_ifa']=="aprobado")
	  {?>
                                 <td>
 <form action="../certificado/formulario_ifa.php" method="post">
                                                 <button type="submit" name="Config"  value="1"class="btn btn-success">Config</button>
                                                 <input type="hidden" name="idsolicitud" value="<? echo $row_solicitud['idsolicitud']; ?>" />
                                                   <input type="hidden" name="idinforme" value="<? echo $row_informe['idinforme']; ?>" />
</form>
                                </td>
                                 <td>
                                 <form action="../../docs/certificado_ifa.php" method="post" target="_blank" >
      
      <input type="submit" value="Ver certificado"  />
            <input type="hidden" name="idsolicitud" value="<? echo $row_solicitud['idsolicitud']; ?>" />
          
            <input type="hidden" name="idcertificado" value="<? echo $row_cert['idcertificado']; ?>" />
            </form> 
                                </td><? }?>
</tr>
<tr>
<td>
 <label>GLOBALG.A.P CoC</label>
 </td>
 <td>
 <button type="button" name="aprobar"  value="1"<? if($row_informe['dictamen_coc']=='rechazo'){?>class="btn btn-danger"<? }else {?> class="btn btn-info" <? }?>><? echo ucwords( $row_informe['dictamen_coc']);?></button>
                                </td>
                                 <? if($row_informe['dictamen_coc']=="aprobado")
	  {?>
                                 <td>
 <form action="../certificado/formulario_coc.php" method="post">
                                                 <button type="submit" name="Config"  value="1"class="btn btn-success">Config</button>
                                                 <input type="hidden" name="idsolicitud" value="<? echo $row_solicitud['idsolicitud']; ?>" />
                                                   <input type="hidden" name="idinforme" value="<? echo $row_informe['idinforme']; ?>" />
</form>
                                </td>
                                <td>
                                 <form action="../../docs/certificado_coc.php" method="post" target="_blank" >
      
      <input type="submit" value="Ver certificado"  />
            <input type="hidden" name="idsolicitud" value="<? echo $row_solicitud['idsolicitud']; ?>" />
          
            <input type="hidden" name="idcertificado" value="<? echo $row_cert['idcertificado']; ?>" />
            </form> 
                                </td><? }?>
</tr>
<tr>
<td>
 <label>México Calidad Suprema</label>
 </td>
 <td>
 <button type="button" name="aprobar"  value="1"<? if($row_informe['dictamen_mexcalsup']=='rechazo'){?>class="btn btn-danger"<? }else {?> class="btn btn-info" <? }?>><? echo ucwords( $row_informe['dictamen_mexcalsup']);?></button>
                                </td>
                                   <? if($row_informe['dictamen_mexcalsup']=="aprobado")
	  {?>
                                 <td>
 <form action="../certificado/formulario_mexcalsup.php" method="post">
                                                 <button type="submit" name="Config"  value="1"class="btn btn-success">Config</button>
                                                 <input type="hidden" name="idsolicitud" value="<? echo $row_solicitud['idsolicitud']; ?>" />
                                                   <input type="hidden" name="idinforme" value="<? echo $row_informe['idinforme']; ?>" />
</form>
                                </td>
                                 <td>
                                 <form action="../../docs/certificado_mexcalsup.php" method="post" target="_blank" >
      
      <input type="submit" value="Ver certificado"  />
            <input type="hidden" name="idsolicitud" value="<? echo $row_solicitud['idsolicitud']; ?>" />
          
            <input type="hidden" name="idcertificado" value="<? echo $row_cert['idcertificado']; ?>" />
            </form> 
                                </td><? }?>
</tr>

</table></td>
	
												
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
