<?php
// *** Validate request to login to this site.
	require_once("../Connections/sesion.php");
  require_once("../Connections/inforgan_pamfa.php");

include('includes/header.php');    
?>


			<div class="content">
				<div class="container-fluid">
					<div class="row col-lg-12 col-md-12 col-sm-12">
						<div class="col-lg-3 col-md-3 col-sm-3">
							<div class="card card-stats">
								<div class="card-header" data-background-color="green">
									
                                   <a href="../clientes/solicitud/menu_solicitud.php"> <i class="fa fa-file-text-o" aria-hidden="true"></i></a>
								</div>
                               
								<div class="card-content">
									<p class="category"><a href="../clientes/solicitud/menu_solicitud.php" style="color:#000">Nueva</a></p>
									<h3 class="title"><a href="../clientes/solicitud/menu_solicitud.php" style="color:#000">Solicitud</a></h3>
								</div>
								<? /*<div class="card-footer">
									<div class="stats">
										<i class="material-icons">date_range</i> Last 24 Hours
									</div>
								</div>*/ ?>
							</div>
						</div>
                        
                      
                        <div class="col-lg-3 col-md-3 col-sm-3">
							<div class="card card-stats">
								<div class="card-header" data-background-color="orange">
								<a href="../clientes/solicitud/solicitudes.php">	<i class="material-icons">content_copy</i></a>
								</div>
								<div class="card-content">
									<p class="category"><a href="../clientes/solicitud/solicitudes.php" style="color:#000">Ver</a></p>
									<h3 class="title"><a href="../clientes/solicitud/solicitudes.php" style="color:#000">Solicitudes</a></h3>
								</div>
								<? /*<div class="card-footer">
									<div class="stats">
										<i class="material-icons text-danger">warning</i> <a href="#pablo">Get More Space...</a>
									</div>
								</div>*/?>
							</div>
						</div>
                        
                        <div class="col-lg-3 col-md-3 col-sm-3">
                        <style>.card .card-header {
    background-color: #f5ec2c;
}</style>
							<div class="card card-stats">
								<div class="card-header" data-background-color="#ffdd00">
								<a href="../clientes/informe/informes.php">	<i class="material-icons">content_paste</i></a>
								</div>
								<div class="card-content">
									<p class="category"><a href="../clientes/informe/informes.php" style="color:#000">Ver</a></p>
									<h3 class="title"><a href="../clientes/informe/informes.php" style="color:#000">Informes</a></h3>
								</div>
								</div>
						</div>
						

						
						
								

						</div>
					</div>
                    
<? include('includes/footer.php');?>
</html>
