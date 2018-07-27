<?
 $dac = basename($_SERVER['PHP_SELF']);
?>
<!doctype html>
<html lang="en">
<head>

	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png" />
	<link rel="icon" type="image/png" href="../assets/img/favicon.png" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>PAMFA A.C.</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


   
    <!-- Bootstrap core CSS     -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 <script src="../assets/js/jquery-3.1.0.min.js" type="text/javascript"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  

    <!--  Material Dashboard CSS    -->
    <link href="../assets/css/material-dashboard.css" rel="stylesheet"/>

    <!-- Malpika css -->
    <link href="../assets/css/style_operador.css" rel="stylesheet"/>

    

    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>
  
	<link href="../assets/css/solicitud.css" rel="stylesheet"/>
     <link href="../assets/css/bootstrap-select.css" rel="stylesheet"/>
    <link href="../assets/css/bootstrap-select.min.css" rel="stylesheet"/>
      <link rel="stylesheet"  href="../assets/datatables/dataTables.bootstrap.css">
</head>

<body>

	<div class="wrapper">

	    <div class="sidebar" data-color="green" data-image="../assets/img/sidebar-1.jpg">
			<!--
		        Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

		        Tip 2: you can also add an image using data-image tag
		    -->

			<div class="logo">
				<a href="" class="simple-text">
			<img style="width:200px;" src="../../images/pamfa.png" alt="">

				</a>
			</div>

	    	<div class="sidebar-wrapper">
	            <ul class="nav">
                <li class="active">
	                
	                    <a href="../app/secciones/index.php">
	                        <i class="material-icons">dashboard</i>
	                        <p>Inicio </p>
	                    </a>
	                </li>
	               <?  if($dac=='user.php'){?><li class="active"><? }else{ ?> <li> <? }?>
	                    <a href="../app/secciones/user.php">
	                        <i class="material-icons">person</i>
	                        <p>Usuario</p>
	                    </a>
	                </li>
	               
	                
	               
					<li>
	                   <a href="../../Connections/salir.php">
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
						
						<button type="button" class="navbar-toggle" data-toggle="collapse">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
                        
						<a class="navbar-brand" href="#">PAMFA A.C.</a>
					 <? if($dac=='datos.php' ||$dac=='indice.php' || $dac=='notas.php'|| $dac=='politicas.php' || $dac=='portada.php')
						{?>
                        <form action="../listas_verificacion/listas_verif_menu.php" method="post" >
      
    <button  type="submit" value="Regresar" class="btn btn-success"><i class="fa fa-caret-square-o-left" aria-hidden="true"></i>
 Regresar</button>
             <input type="hidden" name="idsolicitud" value="<?php echo $_POST['idsolicitud']; ?>" />
 <input type="hidden" name="idformato" value="<?php echo $_POST['idformato']; ?>" />
 
            </form> <? }?>
					</div>
					
				</div>
			</nav>
