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
								<div class="card-header" data-background-color="blue">
								<a href="../auditor/plan_auditoria/plan_auditoria.php">	<i class="material-icons">book</i></a>
								</div>
								<div class="card-content">
									<a href="../auditor/plan_auditoria/plan_auditoria.php"><p class="category">Ver</p></a>
									<h3 class="title"><a href="../auditor/plan_auditoria/plan_auditoria.php">Plan Auditoria</a></h3>
								</div>
								
							</div>
						</div>
                      
                      <div class="col-lg-3 col-md-6 col-sm-6">
							<div class="card card-stats">
								<div class="card-header" data-background-color="green">
									<a href="listas_verificacion/listas_verif_pmenu.php"><i class="material-icons">list</i></a>
								</div>
								<div class="card-content">
								<a href="listas_verificacion/listas_verif_pmenu.php">	<p class="category">Ver</p></a>
								<h3 class="title"><a href="listas_verificacion/listas_verif_pmenu.php">Listas de verificación</a></h3>
								</div>
								
							</div>
						</div>
                        
                      
                        <div class="col-lg-3 col-md-6 col-sm-6">
                        <style>.card .card-header {
    background-color: #f5ec2c;
}</style>
							<div class="card card-stats">
								<div class="card-header" data-background-color="#ffdd00">
									<a href="../auditor/informe/informes.php"><i class="material-icons">content_paste</i></a>
								</div>
								<div class="card-content">
									<a href="../auditor/informe/informes.php"><p class="category">Ver</p></a>
									<h3 class="title"><a href="../auditor/informe/informes.php">Informes</a></h3>
								</div>
								
							</div>
						</div>
						
						</div>
<? include('includes/footer.php');?>
</html>
