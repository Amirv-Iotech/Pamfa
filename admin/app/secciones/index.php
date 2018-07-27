<?php
// *** Validate request to login to this site.
	require_once("../../../Connections/sesion.php");
  require_once("../../../Connections/inforgan_pamfa.php");

include('../../includes/header.php');    
?>



			<div class="content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-3 col-md-6 col-sm-6">
							<div class="card card-stats">
								<div class="card-header" data-background-color="orange">
<a href="../../config.php"><i class="fa fa-cogs" aria-hidden="true"></i></a>
								</div>
								<div class="card-content">
								<a href="../../config.php">	<p class="category">Menù</p></a>
									<h3 class="title"><a href="../../config.php">Configuración</a></h3>
								</div>
								<? /*<div class="card-footer">
									<div class="stats">
										<i class="material-icons text-danger">warning</i> <a href="#pablo">Get More Space...</a>
									</div>
								</div>*/?>
							</div>
						</div>
						<div class="col-lg-3 col-md-6 col-sm-6">
							<div class="card card-stats">
								<div class="card-header" data-background-color="green">
         							<a href="../../solicitud/solicitudes.php"><i class="material-icons">content_copy</i></a>
								</div>
								<div class="card-content">
									<a href="../../solicitud/solicitudes.php"><p class="category">Ver</p></a>
									<h3 class="title"><a href="../../solicitud/solicitudes.php">Solicitudes</a></h3>
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
								<div class="card-header" data-background-color="blue">
									<a href="../../plan_auditoria/plan_auditoria.php"><i class="material-icons">book</i></a>
								</div>
								<div class="card-content">
									<a href="../../plan_auditoria/plan_auditoria.php"><p class="category">Ver</p></a>
									<h3 class="title"><a href="../../plan_auditoria/plan_auditoria.php">Plan Auditoria</a></h3>
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
								<div class="card-header" data-background-color="red">
									<a href="../../listas_verificacion/listas_verif_pmenu.php"><i class="material-icons">assignment</i></a>
								</div>
								<div class="card-content">
								<a href="../../listas_verificacion/listas_verif_pmenu.php"><p class="category">Ver</p></a>
									<h3 class="title"><a href="../../listas_verificacion/listas_verif_pmenu.php">Listas de verificación</a></h3>
								</div>
								<? /*<div class="card-footer">
									<div class="stats">
										<i class="material-icons">date_range</i> Last 24 Hours
									</div>
								</div>*/ ?>
							</div>
						</div>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                        <style>.card .card-header {
    background-color: #f5ec2c;
}</style>
							<div class="card card-stats">
								<div class="card-header" data-background-color="#ffdd00">
									<a href="../../informe/informes.php"><i class="material-icons">content_paste</i></a>
								</div>
								<div class="card-content">
								<a href="../../informe/informes.php">	<p class="category">Ver</p></a>
									<h3 class="title"><a href="../../informe/informes.php">Informes</a></h3>
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

					
<? include('../../includes/footer.php');?>
</html>
