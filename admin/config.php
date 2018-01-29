<? include ("../Connections/inforgan_pamfa.php");

  

mysql_select_db($database_pamfa, $inforgan_pamfa);

 $dac = basename($_SERVER['PHP_SELF']);

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

 ?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png" />
	<link rel="icon" type="image/png" href="assets/img/favicon.png" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>PAMFA A.C.</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

    <!--  Material Dashboard CSS    -->
    <link href="assets/css/material-dashboard.css" rel="stylesheet"/>

   
    <!-- CSS Malpika. -->
    <link href="assets/css/style_operador.css" rel="stylesheet" />

    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>
    <link rel="stylesheet"  href="assets/datatables/dataTables.bootstrap.css">
   
</head>

<body>

	
	    <div class="sidebar" data-color="green"  data-image="assets/img/sidebar-1.jpg">
			<!--
		        Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

		        Tip 2: you can also add an image using data-image tag
		    -->

			<div class="logo">
				<a href="" class="simple-text">
			<img style="width:100px;" src="../images/pamfa.png" alt="">

				</a>
			</div>

	    	<div class="sidebar-wrapper">
	            <ul class="nav">
                <li class="active">
	                
	                    <a href="app/secciones/index.php">
	                        <i class="material-icons">dashboard</i>
	                        <p>Inicio </p>
	                    </a>
	                </li>
	               <?  if($dac=='user.php'){?><li class="active"><? }else{ ?> <li> <? }?>
	                    <a href="app/secciones/user.php">
	                        <i class="material-icons">person</i>
	                        <p>Usuario</p>
	                    </a>
	                </li>
	               
	                
	               
					<li>
	                    <a href="../Connections/salir.php">
	                        <i class="material-icons">power_settings_new</i>
	                        <p>Salir</p>
	                    </a>
	                </li>
	            </ul>
	    	</div>
	    </div>

	    <div class="main-panel">
			<nav class="navbar navbar-transparent navbar-absolute">
				<div class="container-fluid">
					<div class="navbar-header">
						
						<a class="navbar-brand" href="#">PAMFA A.C. </a>
                        <? if($dac=='formulario.php')
						{?>
                        <form action="../solicitud/solicitudes.php" method="post" >
      
      <input type="submit" value="Regresar"  />
            
            </form> <? }?>
					</div>
					
				</div>
			</nav>

     <?       include("configuracion/guardar.php");?>
<div class="row">
</div>
			<div class="content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-12">
                        
<div class="panel panel-white ">
<div class="panel-heading clearfix"><br>
	<h4 class="panel-title">Configuración General</h4>
</div>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
     
    </div>
    <ul class="nav navbar-nav">
       <form action="" method="post">
    <input class="btn btn-warning navbar-btn" type="submit" value="Operadores"/>
    <input type="hidden" name="op" value="1"/>
    </form>
    </ul>
     <ul class="nav navbar-nav">
       <form action="" method="post">
    <input class="btn btn-warning navbar-btn" type="submit" value="Usuarios"/>
    <input type="hidden" name="op" value="6"/>
    </form>
    </ul>
   <? /* <ul class="nav navbar-nav">
       <form action="" method="post">
    <input class="btn btn-warning navbar-btn" type="submit" value="México Calidad Suprema"/>
    <input type="hidden" name="op" value="2"/>
    </form>
    </ul>
     <ul class="nav navbar-nav">
       <form action="" method="post">
    <input class="btn btn-warning navbar-btn" type="submit" value="Esquemas"/>
    <input type="hidden" name="op" value="3"/>
    </form>
    </ul>
    <ul class="nav navbar-nav">
       <form action="" method="post">
    <input class="btn btn-warning navbar-btn" type="submit" value="PrimusGFS"/>
    <input type="hidden" name="op" value="4"/>
    </form>
    </ul>
    <ul class="nav navbar-nav">
       <form action="" method="post">
    <input class="btn btn-warning navbar-btn" type="submit" value="SRRC"/>
    <input type="hidden" name="op" value="5"/>
    </form>
    </ul>*/?>
    <ul class="nav navbar-nav">
       <form action="" method="post">
    <input class="btn btn-warning navbar-btn" type="submit" value="CATALOGOS"/>
    <input type="hidden" name="op" value="7"/>
    </form>
    </ul>
   
   
    
  </div>
</nav>
<div class="panel-body">

<div class="container-fluid">

 <? if(!empty($_POST['op'])&&$_POST['op']==1){include('configuracion/operador.php');}
else if(!empty($_POST['op'])&&$_POST['op']==2){include('configuracion/cal_sup.php');}
else if(!empty($_POST['op'])&&$_POST['op']==3){include('configuracion/esquemas.php');}
else if(!empty($_POST['op'])&&$_POST['op']==4){include('configuracion/primus.php');}
else if(!empty($_POST['op'])&&$_POST['op']==5){include('configuracion/srrc.php');}
else if(!empty($_POST['op'])&&$_POST['op']==6){include('configuracion/usuarios.php');}
else if(!empty($_POST['op'])&&$_POST['op']==7){include('configuracion/catalogos.php');}?>


</div>
</div>
</div>
</div>




						
							</div>
						</div>

						
			
			<footer class="footer">
				<div class="container-fluid">
					<nav class="pull-left">
						<ul>
							<li>
								<a href="#">
									Home
								</a>
							</li>
							<li>
								<a href="#">
									Company
								</a>
							</li>
							<li>
								<a href="#">
									Portfolio
								</a>
							</li>
							<li>
								<a href="#">
								   Blog
								</a>
							</li>
						</ul>
					</nav>
					
				</div>
			</footer>
		</div>
	</div>

</body>

	<!--   Core JS Files   -->
	<script src="assets/js/jquery-3.1.0.min.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="assets/js/material.min.js" type="text/javascript"></script>

	<!--  Charts Plugin -->
	<script src="assets/js/chartist.min.js"></script>

	<!--  Notifications Plugin    -->
	<script src="assets/js/bootstrap-notify.js"></script>

	

	<!-- Material Dashboard javascript methods -->
	<script src="assets/js/material-dashboard.js"></script>

	<!-- DataTables -->
<script src="assets/datatables/jquery.dataTables.min.js"></script>
<script src="assets/datatables/dataTables.bootstrap.min.js"></script>


<script>
  $(function () {
    $('#example1').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": false,
      "info": false,
      "autoWidth": true,
	   "iDisplayLength": 20,
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
  });
</script>	
<script type="text/javascript"> 

 <? echo '

$(document).ready(function(){  
    $("#todos").click(function() { '; echo '
 if (!$("#tabla2").is(":visible"))
   $("#tabla2").show();
else   
   $("#tabla2").hide();';
	echo ' 
    });    
});';?>
			</script>
            <script type="text/javascript"> 

 <? echo '

$(document).ready(function(){  
    $("#insertar").click(function() { '; echo '
 if (!$("#insert").is(":visible"))
   $("#insert").show();
else   
   $("#insert").hide();';
	echo ' 
    });    
});';?>
			</script>
            <script type="text/javascript"> 

 <? echo '

$(document).ready(function(){  
    $("#late").click(function() { '; echo '
 if (!$("#espera").is(":visible"))
   $("#espera").show();
else   
   $("#espera").hide();';
	echo ' 
    });    
});';?>
			</script>
</html>
