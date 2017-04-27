
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

include("includes/header.php");
include("cerebro.php");?>
<?


$query_cliente = "SELECT idoperador FROM solicitud where idsolicitud='".$_POST['idsolicitud']."'";
$cliente = mysql_query($query_cliente, $inforgan_pamfa) or die(mysql_error());
$row_cliente= mysql_fetch_assoc($cliente);

$query_operador = sprintf("SELECT * FROM operador WHERE idoperador=%s", GetSQLValueString( $row_cliente["idoperador"], "int"));
$operador = mysql_query($query_operador, $inforgan_pamfa) or die(mysql_error());
$row_operador= mysql_fetch_assoc($operador);


	$query_solicitud = "SELECT * FROM solicitud where idsolicitud='".$_POST['idsolicitud']."'";
$solicitud = mysql_query($query_solicitud, $inforgan_pamfa) or die(mysql_error());
$row_solicitud= mysql_fetch_assoc($solicitud);
	
	

$query_cert_anterior = sprintf("SELECT * FROM cert_anterior WHERE idsolicitud=%s order by idcert_anterior asc limit 1", GetSQLValueString( $row_solicitud["idsolicitud"], "int"));
$cert_anterior = mysql_query($query_cert_anterior, $inforgan_pamfa) or die(mysql_error());
$row_cert_anterior= mysql_fetch_assoc($cert_anterior);

$query_solicitud_esq = sprintf("SELECT * FROM solicitud_esquema WHERE idsolicitud=%s order by idsolicitud_esquema asc limit 1", GetSQLValueString($row_solicitud["idsolicitud"], "int"));
$solicitud_esq = mysql_query($query_solicitud_esq, $inforgan_pamfa) or die(mysql_error());
$row_solicitud_esq= mysql_fetch_assoc($solicitud_esq);

$query_procesadora = sprintf("SELECT * FROM procesadora WHERE idsolicitud=%s ", GetSQLValueString( $_POST['idsolicitud'], "int"));
$procesadora = mysql_query($query_procesadora, $inforgan_pamfa) or die(mysql_error());
$row_procesadora= mysql_fetch_assoc($procesadora);

$query_plan_auditoria = sprintf("SELECT * FROM plan_auditoria WHERE idsolicitud=%s ", GetSQLValueString( $_POST['idsolicitud'], "int"));
$plan_auditoria = mysql_query($query_plan_auditoria, $inforgan_pamfa) or die(mysql_error());
$row_plan_auditoria= mysql_fetch_assoc($plan_auditoria);

$query_alcance = sprintf("SELECT descripcion FROM mex_cal_sup WHERE idmex_cal_sup=%s ", GetSQLValueString( $row_solicitud["idmex_alcance"], "int"));
$alcance = mysql_query($query_alcance, $inforgan_pamfa) or die(mysql_error());
$row_alcance= mysql_fetch_assoc($alcance);

$query_inf = sprintf("SELECT * FROM informe WHERE idinforme=%s ", GetSQLValueString( $_POST["idinforme"], "int"));
$inf= mysql_query($query_inf, $inforgan_pamfa) or die(mysql_error());
$row_inf= mysql_fetch_assoc($inf);
?>
<div class="content">
    <div class="container-fluid">
        <div class="row" id="informe" style="background-color: #ecfbe7;">
          <div class="col-lg-12 col-xs-12" style="background-color: ;">
          <!--<form method="post" action=""> -->
              <div class="col-lg-12 col-xs-12">                  
                <h3>Fecha de la auditoria: <? echo $row_plan_auditoria['fecha_auditoria'];?></h3>
              </div>
              <div class="col-lg-12 col-xs-12">              
              <div class="col-lg-6 col-xs-6">
                    <p>Razón social:</p>
              </div>               
              <div class="col-lg-6 col-xs-6">
                    <label><? echo $row_operador['nombre_legal'];?></label>
              </div>   
              </div>
              <div class="col-lg-12 col-xs-12">
              <div class="col-lg-6 col-xs-6">
                  <p>Núm. PAMFA:</p>
              </div>
              <div class="col-lg-6 col-xs-6">
                  <label><? echo $row_plan_auditoria['num_pamfa'];?></label>    
              </div>   
              </div>
              <div class="col-lg-12 col-xs-12">
              <div class="col-lg-6 col-xs-6">
                  <p>Núm. GGN/Coc/PGFS:</p>
              </div>
              <div class="col-lg-6 col-xs-6">
                  <label><? echo $row_plan_auditoria['num_pgfs'];?></label>
              </div>  
              </div>
              <div class="col-lg-12 col-xs-12">
              <div class="col-lg-6 col-xs-6">
                  <p>CRITERIO DE AUDITORIA:</p>
                </div>
                <div class="col-lg-6 col-xs-6">
                  <label><? echo $row_plan_auditoria['criterio'];?>"</label>
                </div>
              </div>
               <!-- <input type="hidden" name="idsolicitud" value="<? echo $_POST['idsolicitud']; ?>" />
                <input type="hidden" name="seccion" value="2" />
            </form> -->
          </div>
        </div>

        <?php  include("seccion7.php");?>

        <?php include("includes/footer.php");?>

    </div>
</div>



<!--

<div class="content">
				<div class="container-fluid">
					<div class="row">
			   	  <div class="col-md-12">
              <div class="panel panel-white">
                <div class="panel-heading clearfix"><br>
	               <h3>Fecha de la auditoria <? /* echo $row_plan_auditoria['fecha_auditoria'];?></h3>
    <br><br>
	               <fieldset>
	                 
		<table align="center" width="100%"  ><tr><td colspan="4" >
		
    	<h3>Razón social:</h3>
        
    	</td>
        <td colspan="10">
    	<label><h3><? echo $row_operador['nombre_legal'];?></h3>"  </label>
	    
</td>
</tr>
<tr>
<td colspan="2" >
		
    	<h3>Núm. PAMFA:</h3>
        
    	</td>
        <td colspan="2">
    	<label><h3><? echo $row_plan_auditoria['num_pamfa'];?></h3> " </label>
	    
</td>
<td colspan="2" >
		
    	<h3>Núm. GGN/Coc/PGFS:</h3>
        
    	</td>
        <td colspan="8">
    	<label><h3> <? echo $row_plan_auditoria['num_pgfs'];?>  </h3></label>
	    
</td>
</tr>
<tr>
<td colspan="4" >
		
    	<h3>CRITERIO DE AUDITORIA:</h3>
        
    	</td>
        <td colspan="10">
    	<label><h3><? echo $row_plan_auditoria['criterio'];?>" </h3></label>
	    
</td>
</tr></table>
		
		
        

		
    </fieldset>	



    </fieldset>	
    

 
<input type="hidden" name="idsolicitud" value="<? echo $_POST['idsolicitud']; ?>" />
  <input type="hidden" name="seccion" value="2" />
 
</form>


<?php  include("seccion7.php");?>






</div>
</div>
</div>
</div>
</div>
</div>
 


<?php include("includes/footer.php"); */?>
-->