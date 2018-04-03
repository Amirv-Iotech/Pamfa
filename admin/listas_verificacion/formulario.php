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
 include("cerebro.php");
 include("includes/header.php");
 ?><br /><br /><br /><br />
 
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

if($_POST['idformato']==3 || $_POST['idformato']==4||$_POST['idformato']==5	||$_POST['idformato']==6){
$query_solicitud_mex = "SELECT * FROM solicitud_mexcalsup where idsolicitud='".$_POST['idsolicitud']."'";
$solicitud_mex = mysql_query($query_solicitud_mex, $inforgan_pamfa) or die(mysql_error());


$mex_alcance="";
$mex_pliego="";
	while($row_solicitud_mex= mysql_fetch_assoc($solicitud_mex)){
		
		$query_mex = "SELECT * FROM mex_cal_sup where idmex_cal_sup='".$row_solicitud_mex['idmex_alcance']."'";
$mex = mysql_query($query_mex, $inforgan_pamfa) or die(mysql_error());
$row_mex= mysql_fetch_assoc($mex);

if($row_mex['alcance']!=NULL)
{
	$mex_alcance=$row_mex['descripcion'].",".$mex_alcance;	
}
	$query_mex = "SELECT * FROM mex_cal_sup where  idmex_cal_sup='".$row_solicitud_mex['idmex_pliego']."'";
$mex = mysql_query($query_mex, $inforgan_pamfa) or die(mysql_error());
$row_mex= mysql_fetch_assoc($mex);
if($row_mex['pliego']!=NULL)
{

	$mex_pliego=$row_mex['descripcion'].",".$mex_pliego;
}
		
	}
	
}
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


////////
?>
 <form action="../listas_verificacion/listas_verif_menu.php" method="post" target="_parent">
      
<button  type="submit" value="Regresar" class="btn btn-success"><i class="fa fa-caret-square-o-left" aria-hidden="true"></i>
 Regresar </button> 
 <input type="hidden" name="idsolicitud" value="<?php echo $_POST['idsolicitud']; ?>" />
 <input type="hidden" name="idformato" value="<?php echo $_POST['idformato']; ?>" />
            
            </form> 
    <div class="row" id="form_plan_aud" style="background-color: #ecfbe7; padding: 0px;">
       
    </div>




<?php  include("seccion5.php");?>

<?php include("includes/footer.php");?>



<script type="text/javascript">
  function guardarTabla(ele) 
  {         
            var seccion =6;
            var idusuario =  $('#idusuario').val();
          
            var idplan_auditoria =$('#idplan_auditoria').val();
            var rol = $('#rol').val();
			
            var ruta = $('#ruta').val();
            var ruta2= $('#ruta2').val();
                    $.ajax({
                        url:"cerebro.php",
                        method:"POST",
                        data:{seccion:seccion, idusuario:idusuario, rol:rol, idplan_auditoria:idplan_auditoria},
                        success: function() {
                          $('#tabla_ajax').load(ruta);
                          $('#tabla_ajax2').load(ruta2);
                        }

                    });

  }
</script>
<script type="text/javascript">
/*

  $("#agregar").click(function() {
    var fecha =$('#fecha').val();
    var horario =$('#horario').val();
    var actividad =$('#actividad').val();
    var responsable =$('#responsable').val();
    var auditor="";
	 var valor="";
	 var porNombre13=document.getElementById("auditor2");
            for(var i=0;i<porNombre13.length;i++)
              {
                if(porNombre13[i].selected){
               valor=porNombre13[i].value+', '+valor;}
              }
	 auditor=valor;
  
    var idplan_auditoria =$('#idplan_auditoria').val();
    var seccion=7;
    var idsolicitud =$('#idsolicitud').val();
    var insertar =$('#insertar').val();
    var ruta2 = $('#ruta2').val();
    alert(fecha);
                $.ajax({  
                     url:"cerebro.php",  
                     method:"POST",
                    data:{seccion:seccion, idplan_auditoria:idplan_auditoria, idsolicitud:idsolicitud, insertar:insertar, fecha:fecha, horario:horario, actividad:actividad, responsable:responsable, auditor:auditor},
                  success: function() { 
                            $('#tabla_ajax2').load(ruta2); //Recargamos la Tabla(Para que se muestren los Nuevos Resultados)
        }
    });
  });*/

</script>


<script>

var count = 0;
$( "body" ).on( "click", "#agregar", function() {
var fecha =$('#fecha').val();
    var horario =$('#horario').val();
    var actividad =$('#actividad').val();
    var responsable =$('#responsable').val();
    var auditor="";
	 var valor="";
	 var porNombre13=document.getElementById("auditor2");
            for(var i=0;i<porNombre13.length;i++)
              {
                if(porNombre13[i].selected){
               valor=porNombre13[i].value+', '+valor;
			  }
              }
			  var tam=valor.length-2;
			  
			  var valr=valor.substr(0,tam)
	 auditor=valr;
    var idplan_auditoria =$('#idplan_auditoria').val();
    var seccion=7;
    var idsolicitud =$('#idsolicitud').val();
    var insertar =$('#insertar').val();
    var ruta2 = $('#ruta2').val();
                $.ajax({  
                     url:"cerebro.php",  
                     method:"POST",
                    data:{seccion:seccion, idplan_auditoria:idplan_auditoria, idsolicitud:idsolicitud, insertar:insertar, fecha:fecha, horario:horario, actividad:actividad, responsable:responsable, auditor:auditor},
                  success: function() { 
                            $('#tabla_ajax2').load(ruta2); //Recargamos la Tabla(Para que se muestren los Nuevos Resultados)
        }
    });

});
</script>

