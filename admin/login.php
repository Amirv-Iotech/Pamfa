
<!DOCTYPE html>
<html lang="es">

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

    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/demo.css" rel="stylesheet" />

    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>
</head>

 <body>
</header>
  <section class="service" id="sesion"> <!-- SECCIÓN LOGIN.PHP  -->
      <div class="container">
          <div class="row">
              <div class="col-md-12 text-center">
                  <div class="about_title">
                      <h2>INICIA SESIÓN</h2>
                      
                  </div>
              </div>
          </div>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-lg-4">
            <div class="row">
              <div align="center" class="col-md-12">
               
			<img style="width:300px;" src="../images/pamfa.png" alt="">
               
              </div>
              
              
             

            </div>
          </div>
          <div class="col-lg-6">
              <form id="frm_administrador"  action="Connections/autentificar.php" method="POST" >

                <div class="col-md-12">
                  <h3 class="text-center"> Administrador</h3>
                  
                  <label for="usuario">Usuario</label>
                  <input type="text" class="form-control" id="username" name="username" placeholder="Ingresa tu Usuario" autofocus required width="16">
                </div>
                <div class="col-md-12">
                  <label for="password">Contraseña</label>
                  <input type="password" class="form-control" id="password" name="password" width="16" placeholder="Ingresa tu Contraseña" required>
                 
                </div>
                  <input type="hidden"  class="form-control" name="clase_usuario" value="administrador" >

                <div class="col-md-12 text-right">
                  <button type="submit" class="btn| btn-primary cs-btn">Ingresar</button>  
                </div>
                    
              </form>
             

          </div>

        </div>
      </div>
  </section>




<!-- Footer Area End -->

<!-- =========================
     SCRIPTS 
============================== -->


   




</body>

</html>