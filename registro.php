<? include ("Connections/inforgan_pamfa.php");

  

mysql_select_db($database_pamfa, $inforgan_pamfa);

 

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

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png" />
	<link rel="icon" type="image/png" href="assets/img/favicon.png" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>PAMFA A.C.</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="admin/assets/css/bootstrap.min.css" rel="stylesheet" />

    <!--  Material Dashboard CSS    -->
    <link href="admin/assets/css/material-dashboard.css" rel="stylesheet"/>

    

    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>
   <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    </head>

<body>

 <br /><br />
 
  <div class="col-lg-3 col-xs-3">
  </div>
   <div class="content" >
	            <div class="container-fluid" >
	                <div class="row" align="center">
	                    <div class="col-md-6">
	                        <div class="card">
	                            <div class="card-header" data-background-color="green">
	                                <h4 class="title">NUEVO CLIENTE</h4>
	                                <p class="category">INGRESE LA SIGUIENTE INFORMACIÓN DE FACTURACIÓN/DIRECCIÓN LEGAL </p>
	                            </div>
	                            <div class="card-content table-responsive">
                                 <form action="" method="post"   name="elformulario">
 <table align="center"   >
 <tr>
   
       <script language="JavaScript">
function ver_password() {
    document.elformulario.pass_tem.setAttribute("type",
        document.elformulario.input_ver.checked ? "text" : "password"
    );
}

</script>    
<? if(!empty($_POST['guardar1'])){
	$t="pamfa".time();
	$insertSQL = sprintf("INSERT INTO operador (username,pass_tem,nombre_legal,nombre_representante,direccion,colonia,municipio,estado,pais,cp,coordenadas,email,telefono,fax,rfc,dir_rfc,nombre_factura,email_factura,tel_factura,forma_pago,banco,digitos_tarjeta) VALUES ( %s, %s,%s, %s, %s, %s,%s, %s, %s, %s,%s, %s, %s, %s,%s, %s, %s, %s,%s,%s,%s,%s)",
	
	GetSQLValueString($_POST['username'], "text"),
	GetSQLValueString($_POST['pass_tem'], "text"),
 GetSQLValueString($_POST['nombre_legal'], "text"),
 GetSQLValueString($_POST['nombre_representante'], "text"),
 GetSQLValueString($_POST['direccion'], "text"),
 GetSQLValueString($_POST['colonia'], "text"),
  GetSQLValueString($_POST['municipio'], "text"),
  GetSQLValueString($_POST['estado'], "text"),
 GetSQLValueString($_POST['pais'], "text"),
  GetSQLValueString($_POST['cp'], "text"),
 GetSQLValueString($_POST['coordenadas'], "text"),
  GetSQLValueString($_POST['email'], "text"),
 GetSQLValueString($_POST['telefono'], "text"),
 GetSQLValueString($_POST['fax'], "text"), 
 GetSQLValueString($_POST['rfc'], "text"),
 GetSQLValueString($_POST['dir_rfc'], "text"),
 GetSQLValueString($_POST['nombre_factura'], "text"),
  GetSQLValueString($_POST['email_factura'], "text"),
 GetSQLValueString($_POST['tel_factura'], "text"),
 GetSQLValueString($_POST['forma_pago'], "text"), 
 GetSQLValueString($_POST['banco'], "text"),
 GetSQLValueString($_POST['digitos_tarjeta'], "text"));




  $Result1 = mysql_query($insertSQL,$inforgan_pamfa) or die(mysql_error());
  ?> 
<script>
swal({
  title: "Registro completo!",
  text: "Recibiras un correo con la confirmacion de tu registro en unas horas... ",
  icon: "success",
  buttons: {
    
    catch: {
      text: "Aceptar",
      value: "catch",
    },
    
  },
})
.then(function(value)  {
  switch (value) {
 
    case "catch":
     window.location.replace("index.php");
      break;
  }
});
</script>

<?
}?>     
              <td><label >Usuario:</label> <input class="form-control" required type="text" name="username" value="" /></td>
          
              <td> <label> Contraseña:</label><input class="form-control" required type="password" name="pass_tem" id="pass_tem" value="" /></td>
              <td>
            
<label for="input_ver">Ver</label>&nbsp;&nbsp;<input type="checkbox" name="input_ver" value="ver" onclick="ver_password();">

</td>

            
          
              </tr>
                
 <tr>
   
          
     
              <td><label >Nombre de la entidad legal:</label></td>
              
             <td> <input class="form-control" required type="text" name="nombre_legal" value=""  size="32" /></td>
           </tr>
           <tr>
              <td> <label> Nombre del representante legal:</label></td>
                <td><input class="form-control" required type="text" name="nombre_representante" value=""  size="32" /></td></tr>
                <tr>
           
               <td> <label>Direccion:</label><input class="form-control"  required="required" type="text" name="direccion" value=""  size="32" /></td>
                 <td><label>Colonia:</label><input class="form-control"  type="text" name="colonia" value=""  size="32" /></td></tr>
           <tr>
               <td> <label>Municipio:</label><input class="form-control"  required="required" type="text" name="municipio" value=""  size="32" /></td>
           
                <td> <label>Estado:</label> <input class="form-control"  required="required" type="text" name="estado" value=""  size="32" /></td></tr>
          <tr>
              <td> <label>Pais:</label> <input class="form-control" required="required" type="text" name="pais" value=""  size="32" /></td>       
                <td> <label>C.P:</label> <input class="form-control"  required="required" type="text" name="cp" value=""  size="32" /></td></tr>
           
                <td> <label>Coordenadas:</label><input class="form-control"  type="text" name="coordenadas" value=""  size="32" /></td>
          
                 <td><label>Email:</label><input class="form-control"  required="required" type="text" id='id_mail' name="email" value=""  size='30' maxlength='100' title='direccion de correo'  onchange="javascript:validateMail('id_mail')" />
                 </td></tr>
           <tr>
                <td> <label>Teléfono:</label> <input class="form-control"  required="required" type="text" name="telefono" value=""  size="32" /></td>
                <td> <label>Fax:</label> <input class="form-control"  type="text" name="fax" value=""  size="32" /></td></tr>
           <tr>
               <td>  <label>R.F.C.:</label><input class="form-control"  type="text" name="rfc" value=""  size="32" /></td>         <td> <label>Direcion en el R.F.C.: </label> <input class="form-control"  type="text" name="dir_rfc" value=""  size="32" /></td></tr>
           <tr>
                <td> <label>Nombre de contacto factura:</label> <input class="form-control"  type="text" name="nombre_factura" value=""  size="32" /></td>
               <td> <label> Email de factura:</label><input class="form-control"  type="text" name="email_factura" value=""  size="32" /></td></tr>
           <tr>
                <td> <label>Teléfono de contacto factura:</label><input class="form-control"  type="text" name="tel_factura" value=""  size="32" /></td>
                <td> <label>Forma de pago:</label> <input class="form-control"  type="text" name="forma_pago" value=""  size="32" /></td></tr>
           <tr>
                <td> <label>Banco:</label> <input class="form-control"  type="text" name="banco" value=""  size="32" /></td>
                <td> <label>4 ultimos digitos de tarjeta:</label><input class="form-control"  type="text" name="digitos_tarjeta" value=""  size="4" maxlength="4"/></td></tr>
           <tr><td colspan="1">
                  <input  class="btn btn-info" type="submit" value="Guardar datos" />
                  <input type="hidden" name="guardar1" value="1" />
                 </td>
                  </form>
               
  <td colspan="1">
                 <form action="index.php">
                  <input  class="btn btn-warning"  type="submit" value="Regresar" />
                  </form>
                 </td>
         
         </tr></table>

  
  



     </div>
	                        </div>
	                    </div>

	                    
	                            </div>
	                        </div>
	                    </div>
	                </div>
	            </div>
	        </div>

</body>

<script type="text/javascript">
<!--
/*
 * Función para validar una dirección de correo
 * Tiene que recibir el identificador del formulario
 */
function validateMail(idMail)
{
	//Creamos un objeto 
	object=document.getElementById(idMail);
	valueForm=object.value;
 
	// Patron para el correo
	var patron=/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;
	if(valueForm.search(patron)==0)
	{
		//Mail correcto
		object.style.color="#000";
		
		return;
	}
	//Mail incorrecto
	object.style.color="#f00";
	alert("Email invalido");
}
//-->
</script>
</html>