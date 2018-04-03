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
            <form action="../informe/informes.php" method="post" target="_parent">
      
<button  type="submit" value="Regresar" class="btn btn-success"><i class="fa fa-caret-square-o-left" aria-hidden="true"></i>
 Regresar </button> 
 <input type="hidden" name="idsolicitud" value="<?php echo $_POST['idsolicitud']; ?>" />

            
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
                            
	                                <table class="table">
                                    
	                                    <thead >
                                        <tr>
	                                    	<th rowspan="3">Id</th>
	                                    	<th rowspan="3">Cliente</th>
	                                    	
                                            <th colspan="3" rowspan="1" >INFORMES</th></tr>
                                            <tr><th rowspan="2">Aguacate</th><th rowspan="2">Mango</th><th rowspan="2">Limón Mexicano</th><th rowspan="2">Limón Persa</th> <th rowspan="2">Global IFA opc. 1</th><th rowspan="2">Global IFA opc. 2</th><th rowspan="2">Global CoC</th></tr>
                                           
											
	                                    </thead>
	                                    <tbody>
                                        <? $row_plan_auditoria= mysql_fetch_assoc($plan_auditoria);
										$query_solicitud = "SELECT idoperador,idsolicitud FROM solicitud where idsolicitud='".$row_plan_auditoria['idsolicitud']."' ";
$solicitud = mysql_query($query_solicitud, $inforgan_pamfa) or die(mysql_error());
$row_solicitud= mysql_fetch_assoc($solicitud);

$query_solicitud_m = "SELECT * FROM solicitud_mexcalsup where idsolicitud='".$row_plan_auditoria['idsolicitud']."' ";
$solicitud_m = mysql_query($query_solicitud_m, $inforgan_pamfa) or die(mysql_error());
$agua=0;
$mango=0;
$lm=0;
$lp=0;

while($row_solicitud_m= mysql_fetch_assoc($solicitud_m))
{
	if($row_solicitud_m['idmex_pliego']==4)
	{
		$agua++;
	}
	if($row_solicitud_m['idmex_pliego']==5)
	{
		$mango++;
	}
	if($row_solicitud_m['idmex_pliego']==7)
	{
		$lm++;
	}
	if($row_solicitud_m['idmex_pliego']==6)
	{
		$lp++;
	}
}




$op1=0;
$op2=0;
$coc=0;
$query_solicitud_esq = sprintf("SELECT * FROM solicitud_esquema WHERE idsolicitud=%s ", GetSQLValueString($row_plan_auditoria['idsolicitud'], "int"));
$solicitud_esq = mysql_query($query_solicitud_esq, $inforgan_pamfa) or die(mysql_error());
$row_solicitud_esq= mysql_fetch_assoc($solicitud_esq);
if($row_solicitud_esq['esq_tipo1_op1']!=NULL)
	{
		$op1++;
	}
	
	if($row_solicitud_esq['preg1_op2']!=NULL)
	{
		$op2++;
	}
	if($row_solicitud_esq['esq_tipo2_op1']!=NULL)
	{
		$coc++;
	}
	
											
											
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
	                                       
                                                  <? if($agua>0){?>
                                            <td>
                                                <form action="formulario.php" method="post">
                                                 <button data-toggle="tooltip" title="Ver" type="submit" name="Ver"  value="1"class="btn btn-success"><i class="fa fa-eye" aria-hidden="true"></i></button>
                                                 <input type="hidden" name="idsolicitud" value="<? echo $row_solicitud['idsolicitud']; ?>" />
                                                   <input type="hidden" name="idformato" value="3" />
                                                    <input type="hidden" name="idinforme" value="<? echo $_POST['idinforme']; ?>" />
                                                   <input type="hidden" name="idplan_auditoria" value="<? echo $row_plan_auditoria['idplan_auditoria']; ?>" />
</form></td></td><? } else{?><td>NA</td> <? }?>
<? if($mango>0){?>
 <td>
                                                <form action="formulario.php" method="post">
                                                 <button data-toggle="tooltip" title="Ver" type="submit" name="Ver"  value="1"class="btn btn-success"><i class="fa fa-eye" aria-hidden="true"></i></button>
                                                 <input type="hidden" name="idsolicitud" value="<? echo $row_solicitud['idsolicitud']; ?>" />
                                                   <input type="hidden" name="idformato" value="6" />
                                                    <input type="hidden" name="idinforme" value="<? echo $_POST['idinforme']; ?>" />
                                                   <input type="hidden" name="idplan_auditoria" value="<? echo $row_plan_auditoria['idplan_auditoria']; ?>" />
</form></td><? } else{?><td>NA</td> <? }?>
 <? if($lm>0){?>
 <td>
                                                <form action="formulario.php" method="post">
                                                 <button data-toggle="tooltip" title="Ver" type="submit" name="Ver"  value="1"class="btn btn-success"><i class="fa fa-eye" aria-hidden="true"></i></button>
                                                 <input type="hidden" name="idsolicitud" value="<? echo $row_solicitud['idsolicitud']; ?>" />
                                                   <input type="hidden" name="idformato" value="4" />
                                                    <input type="hidden" name="idinforme" value="<? echo $_POST['idinforme']; ?>" />
                                                   <input type="hidden" name="idplan_auditoria" value="<? echo $row_plan_auditoria['idplan_auditoria']; ?>" />
</form></td><? } else{?><td>NA</td> <? }?>
	
	 <? if($lp>0){?>
 <td>
                                                <form action="formulario.php" method="post">
                                                 <button data-toggle="tooltip" title="Ver" type="submit" name="Ver"  value="1"class="btn btn-success"><i class="fa fa-eye" aria-hidden="true"></i></button>
                                                 <input type="hidden" name="idsolicitud" value="<? echo $row_solicitud['idsolicitud']; ?>" />
                                                   <input type="hidden" name="idformato" value="3" />
                                                    <input type="hidden" name="idinforme" value="<? echo $_POST['idinforme']; ?>" />
                                                   <input type="hidden" name="idplan_auditoria" value="<? echo $row_plan_auditoria['idplan_auditoria']; ?>" />
</form></td><? } else{?><td>NA</td> <? }?>

 <? if($op1>0){?>
 <td>
                                                <form action="formulario.php" method="post">
                                                 <button data-toggle="tooltip" title="Ver" type="submit" name="Ver"  value="1"class="btn btn-success"><i class="fa fa-eye" aria-hidden="true"></i></button>
                                                 <input type="hidden" name="idsolicitud" value="<? echo $row_solicitud['idsolicitud']; ?>" />
                                                   <input type="hidden" name="idformato" value="1" />
                                                    <input type="hidden" name="idinforme" value="<? echo $_POST['idinforme']; ?>" />
                                                   <input type="hidden" name="idplan_auditoria" value="<? echo $row_plan_auditoria['idplan_auditoria']; ?>" />
</form></td><? } else{?><td>NA</td> <? }?>

 <? if($op2>0){?>
 <td>
                                                <form action="formulario.php" method="post">
                                                 <button data-toggle="tooltip" title="Ver" type="submit" name="Ver"  value="1"class="btn btn-success"><i class="fa fa-eye" aria-hidden="true"></i></button>
                                                 <input type="hidden" name="idsolicitud" value="<? echo $row_solicitud['idsolicitud']; ?>" />
                                                   <input type="hidden" name="idformato" value="2" />
                                                    <input type="hidden" name="idinforme" value="<? echo $_POST['idinforme']; ?>" />
                                                   <input type="hidden" name="idplan_auditoria" value="<? echo $row_plan_auditoria['idplan_auditoria']; ?>" />
</form></td><? } else{?><td>NA</td> <? }?>

							 <? if($coc>0){?>

 <td>
                                                <form action="formulario.php" method="post">
                                                 <button data-toggle="tooltip" title="Ver" type="submit" name="Ver"  value="1"class="btn btn-success"><i class="fa fa-eye" aria-hidden="true"></i></button>
                                                 <input type="hidden" name="idsolicitud" value="<? echo $row_solicitud['idsolicitud']; ?>" />
                                                   <input type="hidden" name="idformato" value="7" />
                                                    <input type="hidden" name="idinforme" value="<? echo $_POST['idinforme']; ?>" />
                                                   <input type="hidden" name="idplan_auditoria" value="<? echo $row_plan_auditoria['idplan_auditoria']; ?>" />
</form></td><? } else{?><td>NA</td> <? }?>	
	
	 </tr>
	                                        
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

<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});
</script>

</html>
