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
									<i class="material-icons">book</i>
								</div>
								<div class="card-content">
									<p class="category">Ver</p>
									<h3 class="title"><a href="../auditor/plan_auditoria/plan_auditoria.php">Plan Auditoria</a></h3>
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
									<i class="material-icons">content_paste</i>
								</div>
								<div class="card-content">
									<p class="category">Ver</p>
									<h3 class="title"><a href="../auditor/informe/informes.php">Informes</a></h3>
								</div>
								<? /*<div class="card-footer">
									<div class="stats">
										<i class="material-icons">date_range</i> Last 24 Hours
									</div>
								</div>*/ ?>
							</div>
						</div>
						
						</div>
<? include('includes/footer.php');?>
</html>
