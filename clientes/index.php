<?php
// *** Validate request to login to this site.
	require_once("../Connections/sesion.php");
  require_once("../Connections/inforgan_pamfa.php");

include('includes/header.php');    
?>



			<div class="content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-3 col-md-6 col-sm-6">
							<div class="card card-stats">
								<div class="card-header" data-background-color="green">
									<i class="material-icons">store</i>
								</div>
								<div class="card-content">
									<p class="category">Nueva</p>
									<h3 class="title"><a href="../clientes/solicitud/formulario.php">Solicitud</a></h3>
								</div>
								<? /*<div class="card-footer">
									<div class="stats">
										<i class="material-icons">date_range</i> Last 24 Hours
									</div>
								</div>*/ ?>
							</div>
						</div>
                        <div class="col-lg-3 col-md-6 col-sm-6">
							<div class="card card-stats">
								<div class="card-header" data-background-color="orange">
									<i class="material-icons">content_copy</i>
								</div>
								<div class="card-content">
									<p class="category">Ver</p>
									<h3 class="title"><a href="../clientes/solicitud/solicitudes.php">Solicitudes</a></h3>
								</div>
								<? /*<div class="card-footer">
									<div class="stats">
										<i class="material-icons text-danger">warning</i> <a href="#pablo">Get More Space...</a>
									</div>
								</div>*/?>
							</div>
						</div>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                        <style>.card .card-header {
    background-color: #f5ec2c;
}</style>
							<div class="card card-stats">
								<div class="card-header" data-background-color="#ffdd00">
									<i class="material-icons">content_paste</i>
								</div>
								<div class="card-content">
									<p class="category">Ver</p>
									<h3 class="title"><a href="../clientes/informe/informes.php">Informes</a></h3>
								</div>
								<? /*<div class="card-footer">
									<div class="stats">
										<i class="material-icons">date_range</i> Last 24 Hours
									</div>
								</div>*/ ?>
							</div>
						</div>
						

						
						
								

						</div>
					</div>
<? include('includes/footer.php');?>
</html>
