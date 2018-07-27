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
                               
	                                <table class="table" id="example1">
                                    
	                                    <thead >
	                                    	<th>Id</th>
	                                    	<th>Cliente</th>
	                                    	<th>Fecha solcitud</th>
                                            <th>Solicitud</th>
                                            
                                             <th>Observaciones</th>
                                              <th> Revision y decisión</th>
                                            <th>Estado</th>
                                            <th colspan="3">Contrato</th>
                                            
											
	                                    </thead>
	                                    <tbody>
                                        <? while( $row_solicitud= mysql_fetch_assoc($solicitud))
										{
											////////////
											
											 
 
$query_obs = sprintf("SELECT * FROM solicitud_obs WHERE idsolicitud=%s and estado=1 ", GetSQLValueString(  $row_solicitud["idsolicitud"], "int"));
$obs = mysql_query($query_obs, $inforgan_pamfa) or die(mysql_error());


$total = mysql_num_rows($obs)	;
	


											///////////
											
											
											
											
											
											$query_cliente = "SELECT nombre_legal FROM operador where idoperador='".$row_solicitud['idoperador']."'";
$cliente = mysql_query($query_cliente, $inforgan_pamfa) or die(mysql_error());
$row_cliente= mysql_fetch_assoc($cliente);
											?>
	                                        <tr>
	                                        	<td><? echo $row_solicitud['idsolicitud'];?></td>
	                                        	<td><? echo $row_cliente['nombre_legal'];?></td>
	                                        	<td><? echo date('d/m/y',$row_solicitud['fecha']);?></td> 
                                                  <td>
                                                <form action="formulario.php" method="post">
                                                 <button data-toggle="tooltip" title="Ver" type="submit" name="Ver"  value="1" class="btn btn-success"><i class="fa fa-eye" aria-hidden="true"></i></button>
                                                 <input type="hidden" name="idsolicitud" value="<? echo $row_solicitud['idsolicitud']; ?>" />
                                                 
</form></td>


<td>
                                          <button type="button" <? if ($total==0){?> class="btn btn-info btn-lg" <? }else {?>class="btn btn-warning btn-lg" <? }?> onclick="abrir(<? echo $row_solicitud['idsolicitud'];?>);" ><? if ($total==0){?><i class="material-icons">done_all</i><? }else {echo $total;}?></button>



<div id="modal<? echo $row_solicitud['idsolicitud'];?>" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">OBSERVACIONES </h4>
      </div>
      <div class="modal-body">
        <p><? echo  obser($row_solicitud['idsolicitud']);?></p>
      </div>
      <div class="modal-footer">
        
       
        <form action="formulario.php" method="post"> <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-success" >Ver solicitud</button>
      <input type="hidden" name="idsolicitud" value="<? echo $row_solicitud['idsolicitud']; ?>" />
        </form>
      </div>
    </div>

  </div>
</div>
</td>
 <td>
                                                <form action="rev.php" method="post">
                                                 <button data-toggle="tooltip" title="Ver" type="submit" name="Ver"  value="1" class="btn btn-success"><i class="fa fa-eye" aria-hidden="true"></i></button>
                                                 <input type="hidden" name="idsolicitud" value="<? echo $row_solicitud['idsolicitud']; ?>" />
                                                 
</form></td>
<? if($row_solicitud['autorizada']!=1)
{?>
 <td>
                                                <form action="" method="post">
                                                 <button data-toggle="tooltip" title="Autorizar" <? if ($total>0){?> disabled="disabled" <? }?>type="submit" name="autorizar"  value="1"class="btn btn-danger"><i class="fa fa-check-circle-o" aria-hidden="true"></i></button>
                                                 <input type="hidden" name="idsolicitud" value="<? echo $row_solicitud['idsolicitud']; ?>" />
                                                 
</form></td><? } else {?>

 <td>
                                                
                                                 <button type="button" data-toggle="tooltip" title="Autorizado" name="desautorizar"  value="1"class="btn btn-info"><i class="fa fa-check-square-o" aria-hidden="true"></i>
</button>
                                                 
</form></td><? }?>
                                                
                                                
                                                
                                                <td bgcolor="#CCFF66">
                                                <form action="../../docs/contrato.php" method="post" target="_blank">
                                                 <button data-toggle="tooltip" title="Ver" type="submit" name="Ver"  value="1" class="btn btn-success"><i class="fa fa-eye" aria-hidden="true"></i></button>
                                                 <input type="hidden" name="idsolicitud" value="<? echo $row_solicitud['idsolicitud']; ?>" />
                                                 
</form></td>
 <td bgcolor="#CCFF66">
                                                <form action="presupuesto.php" method="post">
                                                 <button data-toggle="tooltip" title="Presupuesto" type="submit" name="Ver"  value="1" class="btn btn-success"><i class="fa fa-dollar " aria-hidden="true"></i></button>
                                                 <input type="hidden" name="idsolicitud" value="<? echo $row_solicitud['idsolicitud']; ?>" />
                                                 
</form></td>
 <td bgcolor="#CCFF66">
                                                <form action="contrato_firma.php" method="post">
                                                 <button data-toggle="tooltip" title="firmar" type="submit" name="Ver"  value="1" class="btn btn-success"><i class="fa fa-pencil " aria-hidden="true"></i></button>
                                                 <input type="hidden" name="idsolicitud" value="<? echo $row_solicitud['idsolicitud']; ?>" />
                                                 
</form></td>
                                              

 

												
	                                        </tr>
                                          
										<? }?>
	                                        
	                                       
	                                    </tbody>
	                                </table>
<? function obser($x)
 {
	 $p=1;
	 $pl="";
	 $lista="<table class='table' border='1' cellpadding='1' cellspacing='5' ><tr><td><strong>N°</strong></td><td><strong>Observaciones</strong></td><td><strong>Fecha</strong></td><td><strong>Estado</strong></td></tr>";
	 
	 for($a=0;$a<16;$a++){
	 
	 $query_obs = sprintf("SELECT * FROM solicitud_obs WHERE idsolicitud=%s and seccion_sol=%s ", GetSQLValueString(  $x, "int"),
	 GetSQLValueString(  $a, "int"));
$obs = mysql_query($query_obs, $GLOBALS['inforgan_pamfa']) or die(mysql_error());

while($row_obs= mysql_fetch_assoc($obs))
{
	//$pl=$p.".-".$row_obs['observacion']."";
	//$lista=$lista.$pl."<br>";
	$e="";
	if($row_obs['estado']==1){$e="<strong><font color='red'>Pendiente</font></strong>";}else{$e="<font color='green'>Atendida</font>";}
	$pl="<tr><td>".$p."</td><td>".$row_obs['observacion']."</td><td>".$row_obs['fecha_obs']."</td><td>".$e."</td></tr>";
	$lista=$lista.$pl;
	$p++;
}

	 }///for
$lista=$lista."</table>";
return $lista;
 }?>
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
<script type="text/javascript">
function abrir(x)
{
	$('#modal'+x).appendTo("body").modal('show');
 
}</script>

<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});
</script>
<script>
$(document).ready(function() {
   
} );
</script>
<script>
  $(function () {
    $('#example1').DataTable({
		
		
        //"dom": 'Bfrtip',
       
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": false,
      "info": false,
      "autoWidth": true,
	   //"scrollY": "700px",
          oLanguage: {
            "sProcessing":     "Procesando...",
            "sLengthMenu":     "Mostrar MENU registros",
            "sZeroRecords":    "No se encontraron resultados",
            "sEmptyTable":     "Ningún dato disponible en esta tabla",
            "sInfo":           "Mostrando registros del START al END de un total de TOTAL registros",
            "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
            "sInfoFiltered":   "(filtrado de un total de MAX registros)",
            "sInfoPostFix":    "",
            "sSearch":         "Buscar:",
            "sUrl":            "",
            "sInfoThousands":  ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
            "sFirst":    "Primero",
            "sLast":     "Último",
            "sNext":     "Siguiente",
            "sPrevious": "Anterior"
            }}
			 
    });
	// buttons: [
      //      'copy', 'csv', 'excel', 'pdf', 'print'
        //]
	 	
  });
</script>

</html>
