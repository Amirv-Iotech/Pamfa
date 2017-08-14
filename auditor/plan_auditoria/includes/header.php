
<? $dac = basename($_SERVER['PHP_SELF']);
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
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>


    <!--  Material Dashboard CSS    -->
    <link href="../assets/css/material-dashboard.css" rel="stylesheet"/>

    <!-- Malpika css -->
    <link href="../assets/css/style_operador.css" rel="stylesheet"/>

    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="../assets/css/demo.css" rel="stylesheet" />

    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>
  
	  <link href="../assets/css/bootstrap-select.css" rel="stylesheet"/>
    <link href="../assets/css/bootstrap-select.min.css" rel="stylesheet"/>


    
    
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
			<img style="width:100px;" src="../../images/pamfa.png" alt="">

				</a>
			</div>

	    	<div class="sidebar-wrapper">
	            <ul class="nav">
                <li class="active">
	                
	                    <a href="../index.php">
	                        <i class="material-icons">dashboard</i>
	                        <p>Inicio </p>
	                    </a>
	                </li>
	               <?  if($dac=='user.php'){?><li class="active"><? }else{ ?> <li> <? }?>
	                    <a href="../user.php">
	                        <i class="material-icons">person</i>
	                        <p>Usuario</p>
	                    </a>
	                </li>
	               
	                
	               
					<li>
	                   <a href="../../Connections/salir.php?a">
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
                        <form action="../plan_auditoria/plan_auditoria.php" method="post" >
      
    <button  type="submit" value="Regresar" class="btn btn-secondary"><i class="fa fa-caret-square-o-left" aria-hidden="true"></i>
 Regresar</button>
            
            </form> <? }?>
					</div>
					
				</div>
			</nav>
