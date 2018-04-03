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
	$f1=0;$f2=0;$f3=0;$f4=0;$f5=0;$f6=0;$f7=0;
$query_plan_auditoria = "SELECT idsolicitud,idplan_auditoria,firma,aprobado FROM plan_auditoria where idsolicitud='".$_POST['idsolicitud']."'  ORDER BY idsolicitud DESC";
$plan_auditoria  = mysql_query($query_plan_auditoria , $inforgan_pamfa) or die(mysql_error());

 include("includes/header.php");
 
 ?>

	        <div class="content">
            <form action="../listas_verificacion/listas_verif_pmenu.php" method="post" target="_top" >
      
<button  type="submit" value="Regresar" class="btn btn-success"><i class="fa fa-caret-square-o-left" aria-hidden="true"></i>
 Regresar</button>            
            </form>
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
                                            <tr><th rowspan="2">Portada</th><th rowspan="2">Especificaciones</th><th rowspan="2">Declaración de políticas</th><th rowspan="2">Notas de inspección</th> <th rowspan="2">AF-CB-FV</th></tr>
                                           
											
	                                    </thead>
	                                    <tbody>
                                        <? 
										$row_plan_auditoria= mysql_fetch_assoc($plan_auditoria);
											
											
	

$query_t = "SELECT COUNT(formatos.idformato) AS total, formatos.idformato FROM preguntas_catalogos inner join formatos on preguntas_catalogos.idformato = formatos.idformato GROUP BY formatos.idformato";
$t = mysql_query($query_t, $inforgan_pamfa) or die(mysql_error());

$array = array();
$c=0;

while($row_t= mysql_fetch_assoc($t))
{
	
	$array[$c]=$row_t['total'];
	$c++;
}

									

											$query_r = "SELECT COUNT(catalogos_respuestas.idpregunta) AS total, preguntas_catalogos.idformato FROM preguntas_catalogos inner join catalogos_respuestas on preguntas_catalogos.idpregunta = catalogos_respuestas.idpregunta WHERE catalogos_respuestas.idplan_auditoria=".$row_plan_auditoria['idplan_auditoria']." GROUP BY preguntas_catalogos.idformato";
$r = mysql_query($query_r, $inforgan_pamfa) or die(mysql_error());




while($row_r= mysql_fetch_assoc($r))
{
	if($row_r['idformato']==1){
	$f1=$row_r['total'];
	}
	if($row_r['idformato']==2){
	$f2=$row_r['total'];
	}
	if($row_r['idformato']==3){
	$f3=$row_r['total'];
	}
	if($row_r['idformato']==4){
	$f4=$row_r['total'];
	}if($row_r['idformato']==5){
	$f5=$row_r['total'];
	}if($row_r['idformato']==6){
	$f6=$row_r['total'];
	}
	if($row_r['idformato']==7){
	$f7=$row_r['total'];
	}
}
$f1=$array[0]-$f1;
$f2=$array[1]-$f2;
$f3=$array[2]-$f3;
$f4=$array[3]-$f4;
$f5=$array[4]-$f5;
$f6=$array[5]-$f6;
$f7=$array[6]-$f7;


											
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
                                                  <?  if($f1==$array[0]){?> <button data-toggle="tooltip" title="<? echo $array[0]." No respondidas";?>" type="submit" name="Ver"  value="1"class="btn btn-danger"><i class="fa fa-eye" aria-hidden="true"></i></button><? }
												 
												 else if($f1<$array[0]){?> <button data-toggle="tooltip" title="<? echo $f1." No respondidas";?>" type="submit" name="Ver"  value="1"class="btn btn-warning"><i class="fa fa-eye" aria-hidden="true"></i></button><? }else {?>
                                                 <button data-toggle="tooltip" title="Ver" type="submit" name="Ver"  value="1"class="btn btn-success"><i class="fa fa-eye" aria-hidden="true"></i></button><? }?>
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
                                     <?  $row_plan_auditoria= mysql_fetch_assoc($plan_auditoria);
											
											
	

$query_t = "SELECT COUNT(formatos.idformato) AS total, formatos.idformato FROM preguntas_catalogos inner join formatos on preguntas_catalogos.idformato = formatos.idformato GROUP BY formatos.idformato";
$t = mysql_query($query_t, $inforgan_pamfa) or die(mysql_error());

$array = array();
$c=0;

while($row_t= mysql_fetch_assoc($t))
{
	
	$array[$c]=$row_t['total'];
	$c++;
}

									

											$query_r = "SELECT COUNT(catalogos_respuestas.idpregunta) AS total, preguntas_catalogos.idformato FROM preguntas_catalogos inner join catalogos_respuestas on preguntas_catalogos.idpregunta = catalogos_respuestas.idpregunta WHERE catalogos_respuestas.idplan_auditoria=".$row_plan_auditoria['idplan_auditoria']." GROUP BY preguntas_catalogos.idformato";
$r = mysql_query($query_r, $inforgan_pamfa) or die(mysql_error());




while($row_r= mysql_fetch_assoc($r))
{
	if($row_r['idformato']==1){
	$f1=$row_r['total'];
	}
	if($row_r['idformato']==2){
	$f2=$row_r['total'];
	}
	if($row_r['idformato']==3){
	$f3=$row_r['total'];
	}
	if($row_r['idformato']==4){
	$f4=$row_r['total'];
	}if($row_r['idformato']==5){
	$f5=$row_r['total'];
	}if($row_r['idformato']==6){
	$f6=$row_r['total'];
	}
	if($row_r['idformato']==7){
	$f7=$row_r['total'];
	}
}
$f1=$array[0]-$f1;
$f2=$array[1]-$f2;
$f3=$array[2]-$f3;
$f4=$array[3]-$f4;
$f5=$array[4]-$f5;
$f6=$array[5]-$f6;
$f7=$array[6]-$f7;


											
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
                                                                                                <?  if($f2==$array[1]){?> <button data-toggle="tooltip" title="<? echo $array[1]." No respondidas";?>" type="submit" name="Ver"  value="1"class="btn btn-danger"><i class="fa fa-eye" aria-hidden="true"></i></button><? }
												 
												 else  if($f2<$array[1]){?> <button data-toggle="tooltip" title="<? echo $f2." No respondidas";?>" type="submit" name="Ver"  value="1"class="btn btn-warning"><i class="fa fa-eye" aria-hidden="true"></i></button><? }else {?>

                                                 <button data-toggle="tooltip" title="Ver" type="submit" name="Ver"  value="1"class="btn btn-success"><i class="fa fa-eye" aria-hidden="true"></i></button><? }?>
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
											
											
	

$query_t = "SELECT COUNT(formatos.idformato) AS total, formatos.idformato FROM preguntas_catalogos inner join formatos on preguntas_catalogos.idformato = formatos.idformato GROUP BY formatos.idformato";
$t = mysql_query($query_t, $inforgan_pamfa) or die(mysql_error());

$array = array();
$c=0;

while($row_t= mysql_fetch_assoc($t))
{
	
	$array[$c]=$row_t['total'];
	$c++;
}

									

											$query_r = "SELECT COUNT(catalogos_respuestas.idpregunta) AS total, preguntas_catalogos.idformato FROM preguntas_catalogos inner join catalogos_respuestas on preguntas_catalogos.idpregunta = catalogos_respuestas.idpregunta WHERE catalogos_respuestas.idplan_auditoria=".$row_plan_auditoria['idplan_auditoria']." GROUP BY preguntas_catalogos.idformato";
$r = mysql_query($query_r, $inforgan_pamfa) or die(mysql_error());




while($row_r= mysql_fetch_assoc($r))
{
	if($row_r['idformato']==1){
	$f1=$row_r['total'];
	}
	if($row_r['idformato']==2){
	$f2=$row_r['total'];
	}
	if($row_r['idformato']==3){
	$f3=$row_r['total'];
	}
	if($row_r['idformato']==4){
	$f4=$row_r['total'];
	}if($row_r['idformato']==5){
	$f5=$row_r['total'];
	}if($row_r['idformato']==6){
	$f6=$row_r['total'];
	}
	if($row_r['idformato']==7){
	$f7=$row_r['total'];
	}
}
$f1=$array[0]-$f1;
$f2=$array[1]-$f2;
$f3=$array[2]-$f3;
$f4=$array[3]-$f4;
$f5=$array[4]-$f5;
$f6=$array[5]-$f6;
$f7=$array[6]-$f7;


											
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
                                                    <?  if($f7==$array[6]){?> <button data-toggle="tooltip" title="<? echo $array[6]." No respondidas";?>" type="submit" name="Ver"  value="1"class="btn btn-danger"><i class="fa fa-eye" aria-hidden="true"></i></button><? }
												 
												 else  if($f7<$array[6]){?> <button data-toggle="tooltip" title="<? echo $f7." No respondidas";?>" type="submit" name="Ver"  value="1"class="btn btn-warning"><i class="fa fa-eye" aria-hidden="true"></i></button><? }else {?>
                                                 <button data-toggle="tooltip" title="Ver" type="submit" name="Ver"  value="1"class="btn btn-success"><i class="fa fa-eye" aria-hidden="true"></i></button><? }?>
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
                                            <tr><th rowspan="2">Datos</th><th rowspan="2">Lista de verificación</th></tr>
                                           
											
	                                    </thead>
	                                    <tbody>
                                        <? $row_plan_auditoria= mysql_fetch_assoc($plan_auditoria);
											
											
	

$query_t = "SELECT COUNT(formatos.idformato) AS total, formatos.idformato FROM preguntas_catalogos inner join formatos on preguntas_catalogos.idformato = formatos.idformato GROUP BY formatos.idformato";
$t = mysql_query($query_t, $inforgan_pamfa) or die(mysql_error());

$array = array();
$c=0;

while($row_t= mysql_fetch_assoc($t))
{
	
	$array[$c]=$row_t['total'];
	$c++;
}

									

											$query_r = "SELECT COUNT(catalogos_respuestas.idpregunta) AS total, preguntas_catalogos.idformato FROM preguntas_catalogos inner join catalogos_respuestas on preguntas_catalogos.idpregunta = catalogos_respuestas.idpregunta WHERE catalogos_respuestas.idplan_auditoria=".$row_plan_auditoria['idplan_auditoria']." GROUP BY preguntas_catalogos.idformato";
$r = mysql_query($query_r, $inforgan_pamfa) or die(mysql_error());




while($row_r= mysql_fetch_assoc($r))
{
	if($row_r['idformato']==1){
	$f1=$row_r['total'];
	}
	if($row_r['idformato']==2){
	$f2=$row_r['total'];
	}
	if($row_r['idformato']==3){
	$f3=$row_r['total'];
	}
	if($row_r['idformato']==4){
	$f4=$row_r['total'];
	}if($row_r['idformato']==5){
	$f5=$row_r['total'];
	}if($row_r['idformato']==6){
	$f6=$row_r['total'];
	}
	if($row_r['idformato']==7){
	$f7=$row_r['total'];
	}
}
$f1=$array[0]-$f1;
$f2=$array[1]-$f2;
$f3=$array[2]-$f3;
$f4=$array[3]-$f4;
$f5=$array[4]-$f5;
$f6=$array[5]-$f6;
$f7=$array[6]-$f7;


											
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
                                                
                                                 <?  if($f3==$array[2]){?> <button data-toggle="tooltip" title="<? echo $array[2]." No respondidas";?>" type="submit" name="Ver"  value="1"class="btn btn-danger"><i class="fa fa-eye" aria-hidden="true"></i></button><? }
												 
												 else  if($f3<$array[2]){?> <button data-toggle="tooltip" title="<? echo $f3." No respondidas";?>" type="submit" name="Ver"  value="1"class="btn btn-warning"><i class="fa fa-eye" aria-hidden="true"></i></button><? }else {?>
                                                 <button data-toggle="tooltip" title="Ver" type="submit" name="Ver"  value="1"class="btn btn-success"><i class="fa fa-eye" aria-hidden="true"></i></button><? } ?>
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
                                            <tr><th rowspan="2">Datos</th><th rowspan="2">Lista de verificación</th></tr>
                                           
											
	                                    </thead>
	                                    <tbody>
                                        <? $row_plan_auditoria= mysql_fetch_assoc($plan_auditoria);
											
											
	

$query_t = "SELECT COUNT(formatos.idformato) AS total, formatos.idformato FROM preguntas_catalogos inner join formatos on preguntas_catalogos.idformato = formatos.idformato GROUP BY formatos.idformato";
$t = mysql_query($query_t, $inforgan_pamfa) or die(mysql_error());

$array = array();
$c=0;

while($row_t= mysql_fetch_assoc($t))
{
	
	$array[$c]=$row_t['total'];
	$c++;
}

									

											$query_r = "SELECT COUNT(catalogos_respuestas.idpregunta) AS total, preguntas_catalogos.idformato FROM preguntas_catalogos inner join catalogos_respuestas on preguntas_catalogos.idpregunta = catalogos_respuestas.idpregunta WHERE catalogos_respuestas.idplan_auditoria=".$row_plan_auditoria['idplan_auditoria']." GROUP BY preguntas_catalogos.idformato";
$r = mysql_query($query_r, $inforgan_pamfa) or die(mysql_error());




while($row_r= mysql_fetch_assoc($r))
{
	if($row_r['idformato']==1){
	$f1=$row_r['total'];
	}
	if($row_r['idformato']==2){
	$f2=$row_r['total'];
	}
	if($row_r['idformato']==3){
	$f3=$row_r['total'];
	}
	if($row_r['idformato']==4){
	$f4=$row_r['total'];
	}if($row_r['idformato']==5){
	$f5=$row_r['total'];
	}if($row_r['idformato']==6){
	$f6=$row_r['total'];
	}
	if($row_r['idformato']==7){
	$f7=$row_r['total'];
	}
}
$f1=$array[0]-$f1;
$f2=$array[1]-$f2;
$f3=$array[2]-$f3;
$f4=$array[3]-$f4;
$f5=$array[4]-$f5;
$f6=$array[5]-$f6;
$f7=$array[6]-$f7;


											
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
                                                <? if($f6==$array[5]){?> <button data-toggle="tooltip" title="<? echo $array[5]." No respondidas";?>" type="submit" name="Ver"  value="1"class="btn btn-danger"><i class="fa fa-eye" aria-hidden="true"></i></button><? }
												 
												 else if($f6<$array[5]){?> <button data-toggle="tooltip" title="<? echo $f6." No respondidas";?>" type="submit" name="Ver"  value="1"class="btn btn-warning"><i class="fa fa-eye" aria-hidden="true"></i></button><? }else {?>  
                                                 <button data-toggle="tooltip" title="Ver" type="submit" name="Ver"  value="1"class="btn btn-success"><i class="fa fa-eye" aria-hidden="true"></i></button><? }?>
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
											
											
	

$query_t = "SELECT COUNT(formatos.idformato) AS total, formatos.idformato FROM preguntas_catalogos inner join formatos on preguntas_catalogos.idformato = formatos.idformato GROUP BY formatos.idformato";
$t = mysql_query($query_t, $inforgan_pamfa) or die(mysql_error());
;
$array = array();
$c=0;

while($row_t= mysql_fetch_assoc($t))
{
	
	$array[$c]=$row_t['total'];
	$c++;
}

									

											$query_r = "SELECT COUNT(catalogos_respuestas.idpregunta) AS total, preguntas_catalogos.idformato FROM preguntas_catalogos inner join catalogos_respuestas on preguntas_catalogos.idpregunta = catalogos_respuestas.idpregunta WHERE catalogos_respuestas.idplan_auditoria=".$row_plan_auditoria['idplan_auditoria']." GROUP BY preguntas_catalogos.idformato";
$r = mysql_query($query_r, $inforgan_pamfa) or die(mysql_error());




while($row_r= mysql_fetch_assoc($r))
{
	if($row_r['idformato']==1){
	$f1=$row_r['total'];
	}
	if($row_r['idformato']==2){
	$f2=$row_r['total'];
	}
	if($row_r['idformato']==3){
	$f3=$row_r['total'];
	}
	if($row_r['idformato']==4){
	$f4=$row_r['total'];
	}if($row_r['idformato']==5){
	$f5=$row_r['total'];
	}if($row_r['idformato']==6){
	$f6=$row_r['total'];
	}
	if($row_r['idformato']==7){
	$f7=$row_r['total'];
	}
}
$f1=$array[0]-$f1;
$f2=$array[1]-$f2;
$f3=$array[2]-$f3;
$f4=$array[3]-$f4;
$f5=$array[4]-$f5;
$f6=$array[5]-$f6;
$f7=$array[6]-$f7;


											
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
                                                <?  if($f4==$array[3]){?> <button data-toggle="tooltip" title="<? echo $array[3]." No respondidas";?>" type="submit" name="Ver"  value="1"class="btn btn-danger"><i class="fa fa-eye" aria-hidden="true"></i></button><? }
												 
												 else if($f4<$array[3]){?> <button data-toggle="tooltip" title="<? echo $f4." No respondidas";?>" type="submit" name="Ver"  value="1"class="btn btn-warning"><i class="fa fa-eye" aria-hidden="true"></i></button><? }else {?>
                                                 <button data-toggle="tooltip" title="Ver" type="submit" name="Ver"  value="1"class="btn btn-success"><i class="fa fa-eye" aria-hidden="true"></i></button><? }?>
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
                                            <tr><th rowspan="2">Datos</th><th rowspan="2">Lista de verificación</th></tr>
                                           
											
	                                    </thead>
	                                    <tbody>
                                        <? $row_plan_auditoria= mysql_fetch_assoc($plan_auditoria);
											
											
	

$query_t = "SELECT COUNT(formatos.idformato) AS total, formatos.idformato FROM preguntas_catalogos inner join formatos on preguntas_catalogos.idformato = formatos.idformato GROUP BY formatos.idformato";
$t = mysql_query($query_t, $inforgan_pamfa) or die(mysql_error());

$array = array();
$c=0;

while($row_t= mysql_fetch_assoc($t))
{
	
	$array[$c]=$row_t['total'];
	$c++;
}

									

											$query_r = "SELECT COUNT(catalogos_respuestas.idpregunta) AS total, preguntas_catalogos.idformato FROM preguntas_catalogos inner join catalogos_respuestas on preguntas_catalogos.idpregunta = catalogos_respuestas.idpregunta WHERE catalogos_respuestas.idplan_auditoria=".$row_plan_auditoria['idplan_auditoria']." GROUP BY preguntas_catalogos.idformato";
$r = mysql_query($query_r, $inforgan_pamfa) or die(mysql_error());




while($row_r= mysql_fetch_assoc($r))
{
	if($row_r['idformato']==1){
	$f1=$row_r['total'];
	}
	if($row_r['idformato']==2){
	$f2=$row_r['total'];
	}
	if($row_r['idformato']==3){
	$f3=$row_r['total'];
	}
	if($row_r['idformato']==4){
	$f4=$row_r['total'];
	}if($row_r['idformato']==5){
	$f5=$row_r['total'];
	}if($row_r['idformato']==6){
	$f6=$row_r['total'];
	}
	if($row_r['idformato']==7){
	$f7=$row_r['total'];
	}
}
$f1=$array[0]-$f1;
$f2=$array[1]-$f2;
$f3=$array[2]-$f3;
$f4=$array[3]-$f4;
$f5=$array[4]-$f5;
$f6=$array[5]-$f6;
$f7=$array[6]-$f7;


											
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
                                                 <?  if($f5==$array[4]){?> <button data-toggle="tooltip" title="<? echo $array[4]." No respondidas";?>" type="submit" name="Ver"  value="1"class="btn btn-danger"><i class="fa fa-eye" aria-hidden="true"></i></button><? }
												 
												 else  if($f5<$array[4]){?> <button data-toggle="tooltip" title="<? echo $f5." No respondidas";?>" type="submit" name="Ver"  value="1"class="btn btn-warning"><i class="fa fa-eye" aria-hidden="true"></i></button><? }else {?>
                                                 <button data-toggle="tooltip" title="Ver" type="submit" name="Ver"  value="1"class="btn btn-success"><i class="fa fa-eye" aria-hidden="true"></i></button><? }?>
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
