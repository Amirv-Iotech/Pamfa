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


///////fin

if(isset($_GET['idsolicitud'])){$_POST['idsolicitud']=$_GET['idsolicitud'];}




 include("includes/header.php");
 
 ?>

	        <div class="content"   >
            <form action="../solicitud/solicitudes.php" method="post" target="_top" >
      
<button  type="submit" value="Regresar" class="btn btn-success"><i class="fa fa-caret-square-o-left" aria-hidden="true"></i>
 Regresar</button>            
            </form>
	            <div class="container-fluid">
	                <div class="row">
	                    <div class="col-md-12">
	                        <div class="card">
	                            <div class="card-header" data-background-color="green">
	                                <h4 class="title">Propuesta económica</h4>
	                                <? //<p class="category">Bitacora de tus solicitudes</p>?>
	                            </div>
	                           
                                <div id="tabla_ajax8" >

          <?php

           include('tabla_pre.php');?>
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
