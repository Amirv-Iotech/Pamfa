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
	$insertSQL = sprintf("update informe set firma_cliente=%s,fecha_firma_cliente=%s WHERE idinforme=%s",

             GetSQLValueString(1, "text"),
			 GetSQLValueString($f, "text"),
	GetSQLValueString($_POST['idinforme'], "int"));

  $Result1 = mysql_query($insertSQL, $inforgan_pamfa) or die(mysql_error());
  
 
}
if (isset($_POST['desautorizar'])) {
	
	
$f=date('d/m/y',time());
	$insertSQL = sprintf("update  set autorizada=NULL,nombre_autorizo=NULL,fecha_autorizo=NULL WHERE idsolicitud=%s",

            
	
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
                                                <form action="pmenu.php" method="post">
                                                 <button data-toggle="tooltip" title="Ver" type="submit" name="Ver"  value="1"class="btn btn-success"><i class="fa fa-eye" aria-hidden="true"></i></button>
                                                 <input type="hidden" name="idsolicitud" value="<? echo $row_solicitud['idsolicitud']; ?>" />
                                                   <input type="hidden" name="idinforme" value="<? echo $row_informe['idinforme']; ?>" />
                                                   
<input type="hidden" name="idformato1" value="3" />
<input type="hidden" name="idformato2" value="2" />
<input type="hidden" name="idformato3" value="3" />
</form></td>
<? if($row_informe['firma_auditor']==NULL || $row_informe['firma_cliente']==NULL)
{?>
 <td>
                                              <form action="" method="post">
                                                 <button data-toggle="tooltip" title="Por Firmar" type="submit" name="firma"   value="1" class="btn btn-danger"><i class="fa fa-clock-o" aria-hidden="true"></i>
</button>
                                                 <input type="hidden" name="idinforme" value="<? echo $row_informe['idinforme'];  ?>" />
                                                 
</form></td><? } else { ?>

  

 <td>
                                                
                                                 <button data-toggle="tooltip" title="Firmada" type="button" name="firmada" disabled  value="1"class="btn btn-info"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
</button> 
</form></td>
<? }?>
 <td>
 <table>
 <tr>
 <td>
 <label>GLOBALG.A.P IFA</label>
 </td>
 <td>
 <button type="button" name="aprobar"  value="1" <? if($row_informe['dictamen_ifa']!='aprobado'){?> class="btn btn-danger" data-toggle="tooltip" title="Rechazado" <? }else {?> class="btn btn-info" data-toggle="tooltip" title="Aprobado" <? }?>><? 
                                            if($row_informe['dictamen_ifa']=='aprobado'){
                                            echo '<i class="fa fa-check-square-o fa-4x" aria-hidden="true"></i>';}
                                          else {echo '<i class="fa fa-window-close-o fa-4x" aria-hidden="true"></i>';}
 ?></button>
                                </td>
            
                                 <? if($row_informe['dictamen_ifa']=="aprobado")
	  {?>
                                
                                 <td>
                                 <form action="../../docs/certificado_ifa.php" method="post" target="_blank" >
      
     <button class="btn btn-warning" type="submit" data-toggle="tooltip" title="Ver Certificado" ><i class="fa fa-file-pdf-o" aria-hidden="true"></i>
 </button>
            <input type="hidden" name="idsolicitud" value="<? echo $row_solicitud['idsolicitud']; ?>" />
          
            <input type="hidden" name="idcertificado" value="<? echo $row_cert['idcertificado']; ?>" />
             <input type="hidden" name="cliente" value="1" />
            </form> 
                                </td><? }?>
</tr>
<tr>
<td>
 <label>GLOBALG.A.P CoC</label>
 </td>
 <td>
 <button type="button" name="aprobar"  value="1" <? if($row_informe['dictamen_coc']!='aprobado'){?> class="btn btn-danger" data-toggle="tooltip" title="Rechazado" <? }else {?> class="btn btn-info" data-toggle="tooltip" title="Aprobado" <? }?>> <?
                                            if($row_informe['dictamen_coc']=='aprobado'){
                                            echo '<i class="fa fa-check-square-o fa-4x" aria-hidden="true"></i>';}
                                          else  { echo '<i class="fa fa-window-close-o fa-4x" aria-hidden="true"></i>';}

 ?>
 </button>
                                </td>
                                 <? if($row_informe['dictamen_coc']=="aprobado")
	  {?>
                               
                                <td>
                                 <form action="../../docs/certificado_coc.php" method="post" target="_blank" >
      
 <button class="btn btn-warning" type="submit" data-toggle="tooltip" title="Ver Certificado" ><i class="fa fa-file-pdf-o" aria-hidden="true"></i>
 </button>
             <input type="hidden" name="idsolicitud" value="<? echo $row_solicitud['idsolicitud']; ?>" />
          
            <input type="hidden" name="idcertificado" value="<? echo $row_cert['idcertificado']; ?>" />
            
             <input type="hidden" name="cliente" value="1" />
            </form> 
                                </td><? }?>
</tr>
<tr>
<td>
 <label>México Calidad Suprema</label>
 </td>
<td>
 <button type="button" name="aprobar"  value="1" <? if($row_informe['dictamen_mexcalsup']!='aprobado'){ ?> class="btn btn-danger" data-toggle="tooltip" title="Rechazado" <? }else {?> class="btn btn-info" data-toggle="tooltip" title="Aprobado" <? }?> > <? 
                                          if($row_informe['dictamen_mexcalsup']=='aprobado'){
                                            echo '<i class="fa fa-check-square-o" aria-hidden="true"></i>';}
                                          else {echo '<i class="fa fa-window-close-o" aria-hidden="true"></i>';}
                                      ?> </button>
                                </td>
                                   <? if($row_informe['dictamen_mexcalsup']=="aprobado")
	  {?>
                                
                                 <td>
                                 <form action="../../docs/certificado_mexcalsup.php" method="post" target="_blank" >
      
 <button class="btn btn-warning" type="submit" data-toggle="tooltip" title="Ver Certificado" ><i class="fa fa-file-pdf-o" aria-hidden="true"></i>
 </button>
             <input type="hidden" name="idsolicitud" value="<? echo $row_solicitud['idsolicitud']; ?>" />
          
            <input type="hidden" name="idcertificado" value="<? echo $row_cert['idcertificado']; ?>" />
             <input type="hidden" name="cliente" value="1" />
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
