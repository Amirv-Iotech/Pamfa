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


	
///////fin

$query_plan_auditoria = "SELECT idsolicitud,idplan_auditoria,firma,aprobado FROM plan_auditoria where idsolicitud='".$_POST['idsolicitud']."'  ORDER BY idsolicitud DESC";
$plan_auditoria  = mysql_query($query_plan_auditoria , $inforgan_pamfa) or die(mysql_error());




 include("includes/header.php");
 
 ?>

	        <div class="content">
	            <div class="container-fluid">
	                <div class="row">
	                    <div class="col-md-12">
	                        <div class="card">
	                            <div class="card-header" data-background-color="green">
	                                <h4 class="title">Lista de verificación</h4>
	                                <p class="category">&nbsp;</p>
	                            </div>
	                            <div class="card-content table-responsive">
                               <? if($_POST['idformato']==1){?>
	                                <table class="table">
                                    
	                                    <thead >
                                        <tr>
	                                    	<th rowspan="3">Id</th>
	                                    	<th rowspan="3">Cliente</th>
	                                    	
                                            <th colspan="3" rowspan="1" >GLOBALG.A.P IFA Opción 1</th></tr>
                                            <tr><th rowspan="2">Portada</th><th rowspan="2">Especificaciones</th><th rowspan="2">Declaración de políticas</th><th rowspan="2">Notas de inspección</th> <th rowspan="2">AF-CB-FV</th><th rowspan="2">Resultados</th></tr>
                                           
											
	                                    </thead>
	                                    <tbody>
                                        <? $row_plan_auditoria= mysql_fetch_assoc($plan_auditoria);
											
											$query_solicitud = "SELECT idoperador,idsolicitud FROM solicitud where idsolicitud='".$row_plan_auditoria['idsolicitud']."' ";
$solicitud = mysql_query($query_solicitud, $inforgan_pamfa) or die(mysql_error());
$row_solicitud= mysql_fetch_assoc($solicitud);

									$query_cliente = "SELECT nombre_legal FROM operador where idoperador='".$row_solicitud['idoperador']."' ";
$cliente = mysql_query($query_cliente, $inforgan_pamfa) or die(mysql_error());
$row_cliente= mysql_fetch_assoc($cliente);
											?>
	                                        <tr>
	                                        	<td><? echo $row_plan_auditoria['idsolicitud'];?></td>
	                                        	<td><? echo $row_cliente['nombre_legal'];?></td> <td>
                                                <form action="portada.php" method="post">
                                                 <button data-toggle="tooltip" title="Ver" type="submit" name="Ver"  value="1"class="btn btn-success"><i class="fa fa-eye" aria-hidden="true"></i></button>
                                                 <input type="hidden" name="idsolicitud" value="<? echo $row_solicitud['idsolicitud']; ?>" />
                                                   <input type="hidden" name="idformato" value="1" />
                                                   <input type="hidden" name="idplan_auditoria" value="<? echo $row_plan_auditoria['idplan_auditoria']; ?>" />
</form></td><td></td> <td>
                                                <form action="politicas.php" method="post">
                                                 <button data-toggle="tooltip" title="Ver" type="submit" name="Ver"  value="1"class="btn btn-success"><i class="fa fa-eye" aria-hidden="true"></i></button>
                                                 <input type="hidden" name="idsolicitud" value="<? echo $row_solicitud['idsolicitud']; ?>" />
                                                   <input type="hidden" name="idformato" value="1" />
                                                   <input type="hidden" name="idplan_auditoria" value="<? echo $row_plan_auditoria['idplan_auditoria']; ?>" />
</form></td><td>
                                                <form action="notas.php" method="post">
                                                 <button data-toggle="tooltip" title="Ver" type="submit" name="Ver"  value="1"class="btn btn-success"><i class="fa fa-eye" aria-hidden="true"></i></button>
                                                 <input type="hidden" name="idsolicitud" value="<? echo $row_solicitud['idsolicitud']; ?>" />
                                                   <input type="hidden" name="idformato" value="1" />
                                                   <input type="hidden" name="idplan_auditoria" value="<? echo $row_plan_auditoria['idplan_auditoria']; ?>" />
</form></td>
	                                        <td>
                                                <form action="formulario.php" method="post">
                                                 <button data-toggle="tooltip" title="Ver" type="submit" name="Ver"  value="1"class="btn btn-success"><i class="fa fa-eye" aria-hidden="true"></i></button>
                                                 <input type="hidden" name="idsolicitud" value="<? echo $row_solicitud['idsolicitud']; ?>" />
                                                   <input type="hidden" name="idformato" value="1" />
                                                   <input type="hidden" name="idplan_auditoria" value="<? echo $row_plan_auditoria['idplan_auditoria']; ?>" />
</form></td>
	
	 </tr>
	                                        
	                                  
	                                    </tbody>
	                                </table>
<? } else  if($_POST['idformato']==2){?>
	                                <table class="table">
                                    
	                                    <thead >
                                        <tr>
	                                    	<th rowspan="3">Id</th>
	                                    	<th rowspan="3">Cliente</th>
	                                    	
                                            <th colspan="3" rowspan="1" >GLOBALG.A.P  Opción 2</th></tr>
                                            <tr><th rowspan="2">Portada</th><th rowspan="2">Índice</th><th rowspan="2">Declaración de políticas</th> <th rowspan="2">AF-CB-FV</th></tr>
                                           
											
	                                    </thead>
	                                    <tbody>
                                        <? $row_plan_auditoria= mysql_fetch_assoc($plan_auditoria);
											
											$query_solicitud = "SELECT idoperador,idsolicitud FROM solicitud where idsolicitud='".$row_plan_auditoria['idsolicitud']."' ";
$solicitud = mysql_query($query_solicitud, $inforgan_pamfa) or die(mysql_error());
$row_solicitud= mysql_fetch_assoc($solicitud);

									$query_cliente = "SELECT nombre_legal FROM operador where idoperador='".$row_solicitud['idoperador']."' ";
$cliente = mysql_query($query_cliente, $inforgan_pamfa) or die(mysql_error());
$row_cliente= mysql_fetch_assoc($cliente);
											?>
	                                        <tr>
	                                        	<td><? echo $row_plan_auditoria['idsolicitud'];?></td>
	                                        	<td><? echo $row_cliente['nombre_legal'];?></td> <td>
                                                <form action="portada.php" method="post">
                                                 <button data-toggle="tooltip" title="Ver" type="submit" name="Ver"  value="1"class="btn btn-success"><i class="fa fa-eye" aria-hidden="true"></i></button>
                                                 <input type="hidden" name="idsolicitud" value="<? echo $row_solicitud['idsolicitud']; ?>" />
                                                   <input type="hidden" name="idformato" value="2" />
                                                   <input type="hidden" name="idplan_auditoria" value="<? echo $row_plan_auditoria['idplan_auditoria']; ?>" />
                                                   
</form></td><td>
                                                <form action="indice.php" method="post">
                                                 <button data-toggle="tooltip" title="Ver" type="submit" name="Ver"  value="1"class="btn btn-success"><i class="fa fa-eye" aria-hidden="true"></i></button>
                                                 <input type="hidden" name="idsolicitud" value="<? echo $row_solicitud['idsolicitud']; ?>" />
                                                   <input type="hidden" name="idformato" value="2" />
                                                   <input type="hidden" name="idplan_auditoria" value="<? echo $row_plan_auditoria['idplan_auditoria']; ?>" />
                                                   
</form></td> <td>
                                                <form action="politicas.php" method="post">
                                                 <button data-toggle="tooltip" title="Ver" type="submit" name="Ver"  value="1"class="btn btn-success"><i class="fa fa-eye" aria-hidden="true"></i></button>
                                                 <input type="hidden" name="idsolicitud" value="<? echo $row_solicitud['idsolicitud']; ?>" />
                                                   <input type="hidden" name="idformato" value="2" />
                                                   <input type="hidden" name="idplan_auditoria" value="<? echo $row_plan_auditoria['idplan_auditoria']; ?>" />
</form></td>
	                                        <td>
                                                <form action="formulario.php" method="post">
                                                 <button data-toggle="tooltip" title="Ver" type="submit" name="Ver"  value="1"class="btn btn-success"><i class="fa fa-eye" aria-hidden="true"></i></button>
                                                 <input type="hidden" name="idsolicitud" value="<? echo $row_solicitud['idsolicitud']; ?>" />
                                                   <input type="hidden" name="idformato" value="2" />
                                                   <input type="hidden" name="idplan_auditoria" value="<? echo $row_plan_auditoria['idplan_auditoria']; ?>" />
</form></td>
	
	 </tr>
	                                        
	                                  
	                                    </tbody>
	                                </table>
                                    <? }
else  if($_POST['idformato']==7){?>
	                                <table class="table">
                                    
	                                    <thead >
                                        <tr>
	                                    	<th rowspan="3">Id</th>
	                                    	<th rowspan="3">Cliente</th>
	                                    	
                                            <th colspan="3" rowspan="1" >GLOBALG.A.P  CoC</th></tr>
                                            <tr><th rowspan="2">Índice</th><th rowspan="2">CoC</th></tr>
                                           
											
	                                    </thead>
	                                    <tbody>
                                        <? $row_plan_auditoria= mysql_fetch_assoc($plan_auditoria);
											
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
                                                <form action="indice.php" method="post">
                                                 <button data-toggle="tooltip" title="Ver" type="submit" name="Ver"  value="1"class="btn btn-success"><i class="fa fa-eye" aria-hidden="true"></i></button>
                                                 <input type="hidden" name="idsolicitud" value="<? echo $row_solicitud['idsolicitud']; ?>" />
                                                   <input type="hidden" name="idformato" value="7" />
                                                   <input type="hidden" name="idplan_auditoria" value="<? echo $row_plan_auditoria['idplan_auditoria']; ?>" />
</form></td>
	                                        <td>
                                                <form action="formulario.php" method="post">
                                                 <button data-toggle="tooltip" title="Ver" type="submit" name="Ver"  value="1"class="btn btn-success"><i class="fa fa-eye" aria-hidden="true"></i></button>
                                                 <input type="hidden" name="idsolicitud" value="<? echo $row_solicitud['idsolicitud']; ?>" />
                                                   <input type="hidden" name="idformato" value="7" />
                                                   <input type="hidden" name="idplan_auditoria" value="<? echo $row_plan_auditoria['idplan_auditoria']; ?>" />
</form></td>
	
	 </tr>
	                                        
	                                  
	                                    </tbody>
	                                </table>
                                    <? }
									
else  if($_POST['idformato']==3){?>
	                                <table class="table">
                                    
	                                    <thead >
                                        <tr>
	                                    	<th rowspan="3">Id</th>
	                                    	<th rowspan="3">Cliente</th>
	                                    	
                                            <th colspan="3" rowspan="1" >MCS Aguacate</th></tr>
                                            <tr><th rowspan="2">Datos</th><th rowspan="2">Lista de verificación</th><th rowspan="2">Informe</th></tr>
                                           
											
	                                    </thead>
	                                    <tbody>
                                        <? $row_plan_auditoria= mysql_fetch_assoc($plan_auditoria);
											
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
                                                <form action="datos.php" method="post">
                                                 <button data-toggle="tooltip" title="Ver" type="submit" name="Ver"  value="1"class="btn btn-success"><i class="fa fa-eye" aria-hidden="true"></i></button>
                                                 <input type="hidden" name="idsolicitud" value="<? echo $row_solicitud['idsolicitud']; ?>" />
                                                   <input type="hidden" name="idformato" value="3" />
                                                   <input type="hidden" name="idplan_auditoria" value="<? echo $row_plan_auditoria['idplan_auditoria']; ?>" />
</form></td>
	                                        <td>
                                                <form action="formulario.php" method="post">
                                                 <button data-toggle="tooltip" title="Ver" type="submit" name="Ver"  value="1"class="btn btn-success"><i class="fa fa-eye" aria-hidden="true"></i></button>
                                                 <input type="hidden" name="idsolicitud" value="<? echo $row_solicitud['idsolicitud']; ?>" />
                                                   <input type="hidden" name="idformato" value="3" />
                                                   <input type="hidden" name="idplan_auditoria" value="<? echo $row_plan_auditoria['idplan_auditoria']; ?>" />
</form></td>
	
     <td>
                                                <form action="informe.php" method="post">
                                                 <button data-toggle="tooltip" title="Ver" type="submit" name="Ver"  value="1"class="btn btn-success"><i class="fa fa-eye" aria-hidden="true"></i></button>
                                                 <input type="hidden" name="idsolicitud" value="<? echo $row_solicitud['idsolicitud']; ?>" />
                                                   <input type="hidden" name="idformato" value="3" />
                                                   <input type="hidden" name="idplan_auditoria" value="<? echo $row_plan_auditoria['idplan_auditoria']; ?>" />
</form></td>
	
	 </tr>
	                                        
	                                  
	                                    </tbody>
	                                </table>
                                    <? }
 else  if($_POST['idformato']==6){?>
	                                <table class="table">
                                    
	                                    <thead >
                                        <tr>
	                                    	<th rowspan="3">Id</th>
	                                    	<th rowspan="3">Cliente</th>
	                                    	
                                            <th colspan="3" rowspan="1" >MCS Mango</th></tr>
                                            <tr><th rowspan="2">Datos</th><th rowspan="2">Lista de verificación</th><th rowspan="2">Informe</th></tr>
                                           
											
	                                    </thead>
	                                    <tbody>
                                        <? $row_plan_auditoria= mysql_fetch_assoc($plan_auditoria);
											
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
                                                <form action="datos.php" method="post">
                                                 <button data-toggle="tooltip" title="Ver" type="submit" name="Ver"  value="1"class="btn btn-success"><i class="fa fa-eye" aria-hidden="true"></i></button>
                                                 <input type="hidden" name="idsolicitud" value="<? echo $row_solicitud['idsolicitud']; ?>" />
                                                   <input type="hidden" name="idformato" value="6" />
                                                   <input type="hidden" name="idplan_auditoria" value="<? echo $row_plan_auditoria['idplan_auditoria']; ?>" />
</form></td>
	                                        <td>
                                                <form action="formulario.php" method="post">
                                                 <button data-toggle="tooltip" title="Ver" type="submit" name="Ver"  value="1"class="btn btn-success"><i class="fa fa-eye" aria-hidden="true"></i></button>
                                                 <input type="hidden" name="idsolicitud" value="<? echo $row_solicitud['idsolicitud']; ?>" />
                                                   <input type="hidden" name="idformato" value="6" />
                                                   <input type="hidden" name="idplan_auditoria" value="<? echo $row_plan_auditoria['idplan_auditoria']; ?>" />
</form></td>
	
     <td>
                                                <form action="informe.php" method="post">
                                                 <button data-toggle="tooltip" title="Ver" type="submit" name="Ver"  value="1"class="btn btn-success"><i class="fa fa-eye" aria-hidden="true"></i></button>
                                                 <input type="hidden" name="idsolicitud" value="<? echo $row_solicitud['idsolicitud']; ?>" />
                                                   <input type="hidden" name="idformato" value="6" />
                                                   <input type="hidden" name="idplan_auditoria" value="<? echo $row_plan_auditoria['idplan_auditoria']; ?>" />
</form></td>
	
	 </tr>
	                                        
	                                  
	                                    </tbody>
	                                </table>
                                    <? }
 else  if($_POST['idformato']==4){?>
	                                <table class="table">
                                    
	                                    <thead >
                                        <tr>
	                                    	<th rowspan="3">Id</th>
	                                    	<th rowspan="3">Cliente</th>
	                                    	
                                            <th colspan="3" rowspan="1" >MCS Limón Mexicano</th></tr>
                                            <tr><th rowspan="2">Datos</th><th rowspan="2">Lista de verificación</th><th rowspan="2">Informe</th></tr>
                                           
											
	                                    </thead>
	                                    <tbody>
                                        <? $row_plan_auditoria= mysql_fetch_assoc($plan_auditoria);
											
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
                                                <form action="datos.php" method="post">
                                                 <button data-toggle="tooltip" title="Ver" type="submit" name="Ver"  value="1"class="btn btn-success"><i class="fa fa-eye" aria-hidden="true"></i></button>
                                                 <input type="hidden" name="idsolicitud" value="<? echo $row_solicitud['idsolicitud']; ?>" />
                                                   <input type="hidden" name="idformato" value="4" />
                                                   <input type="hidden" name="idplan_auditoria" value="<? echo $row_plan_auditoria['idplan_auditoria']; ?>" />
</form></td>
	                                        <td>
                                                <form action="formulario.php" method="post">
                                                 <button data-toggle="tooltip" title="Ver" type="submit" name="Ver"  value="1"class="btn btn-success"><i class="fa fa-eye" aria-hidden="true"></i></button>
                                                 <input type="hidden" name="idsolicitud" value="<? echo $row_solicitud['idsolicitud']; ?>" />
                                                   <input type="hidden" name="idformato" value="4" />
                                                   <input type="hidden" name="idplan_auditoria" value="<? echo $row_plan_auditoria['idplan_auditoria']; ?>" />
</form></td>
	
     <td>
                                                <form action="informe.php" method="post">
                                                 <button data-toggle="tooltip" title="Ver" type="submit" name="Ver"  value="1"class="btn btn-success"><i class="fa fa-eye" aria-hidden="true"></i></button>
                                                 <input type="hidden" name="idsolicitud" value="<? echo $row_solicitud['idsolicitud']; ?>" />
                                                   <input type="hidden" name="idformato" value="4" />
                                                   <input type="hidden" name="idplan_auditoria" value="<? echo $row_plan_auditoria['idplan_auditoria']; ?>" />
</form></td>
	
	 </tr>
	                                        
	                                  
	                                    </tbody>
	                                </table>
                                    <? }
 else  if($_POST['idformato']==5){?>
	                                <table class="table">
                                    
	                                    <thead >
                                        <tr>
	                                    	<th rowspan="3">Id</th>
	                                    	<th rowspan="3">Cliente</th>
	                                    	
                                            <th colspan="3" rowspan="1" >MCS Limón Persa</th></tr>
                                            <tr><th rowspan="2">Datos</th><th rowspan="2">Lista de verificación</th><th rowspan="2">Informe</th></tr>
                                           
											
	                                    </thead>
	                                    <tbody>
                                        <? $row_plan_auditoria= mysql_fetch_assoc($plan_auditoria);
											
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
                                                <form action="datos.php" method="post">
                                                 <button data-toggle="tooltip" title="Ver" type="submit" name="Ver"  value="1"class="btn btn-success"><i class="fa fa-eye" aria-hidden="true"></i></button>
                                                 <input type="hidden" name="idsolicitud" value="<? echo $row_solicitud['idsolicitud']; ?>" />
                                                   <input type="hidden" name="idformato" value="5" />
                                                   <input type="hidden" name="idplan_auditoria" value="<? echo $row_plan_auditoria['idplan_auditoria']; ?>" />
</form></td>
	                                        <td>
                                                <form action="formulario.php" method="post">
                                                 <button data-toggle="tooltip" title="Ver" type="submit" name="Ver"  value="1"class="btn btn-success"><i class="fa fa-eye" aria-hidden="true"></i></button>
                                                 <input type="hidden" name="idsolicitud" value="<? echo $row_solicitud['idsolicitud']; ?>" />
                                                   <input type="hidden" name="idformato" value="5" />
                                                   <input type="hidden" name="idplan_auditoria" value="<? echo $row_plan_auditoria['idplan_auditoria']; ?>" />
</form></td>
	
     <td>
                                                <form action="informe.php" method="post">
                                                 <button data-toggle="tooltip" title="Ver" type="submit" name="Ver"  value="1"class="btn btn-success"><i class="fa fa-eye" aria-hidden="true"></i></button>
                                                 <input type="hidden" name="idsolicitud" value="<? echo $row_solicitud['idsolicitud']; ?>" />
                                                   <input type="hidden" name="idformato" value="5" />
                                                   <input type="hidden" name="idplan_auditoria" value="<? echo $row_plan_auditoria['idplan_auditoria']; ?>" />
</form></td>
	
	 </tr>
	                                        
	                                  
	                                    </tbody>
	                                </table>
                                    <? }?>



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

<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});
</script>

</html>
