<div class="row" id="operador">
 <input type="button" name="a" value="Nuevo" id="insertar" />
 <input type="button" name="b" value="Ver todos" id="todos" />
  <input type="button" name="c" value="En espera" id="late" />
<div class="col-lg-12 col-xs-12">

  <div class="col-lg-12 col-xs-12" id="insert"  style="display:none;background-color: #def2f5" >
  
    <form action="" method="post">
             <? 
              if(isset($_POST['update']))
              {
                $query_u= "SELECT  * FROM operador where idoperador=".$_POST['idoperador']."";
                $u = mysql_query($query_u, $inforgan_pamfa) or die(mysql_error());
                $row_u = mysql_fetch_assoc($u);              
              }
            ?>
        <div class="col-lg-12 col-xs-12" style="text-align: center; background-color: #07889B">
            <h5><b style="color:white">INGRESE LA SIGUIENTE INFORMACIÓN</b></h5>
        </div>

        <div class="col-lg-12 col-xs-12" id="formulario" >
            <div class="col-lg-3 col-xs-6">
              <label>Nombre de la entidad legal:</label>
              <input class="form-control" required type="text" name="nombre_legal" value="<? if(isset($_POST['update'])){ echo $row_u['nombre_legal'];}?>"  size="32" />
            </div>
            <div class="col-lg-3 col-xs-6">
               <label> Nombre del representante legal:</label>
                <input class="form-control" required type="text" name="nombre_representante" value="<? if(isset($_POST['update'])){ echo $row_u['nombre_representante'];}?>"  size="32" />
            </div>
            <div class="col-lg-3 col-xs-6">
               <label>Direccion:</label>
              <input class="form-control" type="text" name="direccion" value="<?  if(isset($_POST['update'])){echo $row_u['direccion'];}?>"  size="32" />
            </div>
            <div class="col-lg-3 col-xs-6">
                <label>Colonia:</label>
                <input class="form-control"  type="text" name="colonia" value="<? if(isset($_POST['update'])){ echo $row_u['colonia'];}?>"  size="32" />
            </div>
        </div>

        <div class="col-lg-12 col-xs-12">
            <div class="col-lg-3 col-xs-6">
               <label>Municipio:</label>
              <input class="form-control"  type="text" name="municipio" value="<?  if(isset($_POST['update'])){echo $row_u['municipio'];}?>"  size="32" />
            </div>
            <div class="col-lg-3 col-xs-6">
                <label>Estado:</label>
                <input class="form-control"  type="text" name="estado" value="<? if(isset($_POST['update'])){ echo $row_u['estado'];}?>"  size="32" />
            </div>
            <div class="col-lg-3 col-xs-6">
              <label>Pais:</label>
              <input class="form-control" type="text" name="pais" value="<?  if(isset($_POST['update'])){echo $row_u['pais'];}?>"  size="32" />
            </div>
            <div class="col-lg-3 col-xs-6">
              <label>C.P.:</label>
              <input class="form-control" type="text" name="cp" value="<?  if(isset($_POST['update'])){echo $row_u['pais'];}?>"  size="32" />
            </div>
            <div class="col-lg-3 col-xs-6">
                <label>Coordenadas:</label>
                <input class="form-control"  type="text" name="coordenadas" value="<? if(isset($_POST['update'])){ echo $row_u['coordenadas'];}?>"  size="32" />
            </div>
        </div>

        <div class="col-lg-12 col-xs-12">
            <div class="col-lg-3 col-xs-6">
                <label>Email:</label>
                <input class="form-control"  type="text" name="email" value="<?  if(isset($_POST['update'])){echo $row_u['email'];}?>"  size="32" />
            </div>
            <div class="col-lg-3 col-xs-6">
                <label>Teléfono:</label>
                <input class="form-control"  type="text" name="telefono" value="<? if(isset($_POST['update'])){ echo $row_u['telefono'];}?>"  size="32" />
            </div>
            <div class="col-lg-3 col-xs-6">
                <label>Fax:</label>
                <input class="form-control"  type="text" name="fax" value="<?  if(isset($_POST['update'])){echo $row_u['fax'];}?>"  size="32" />
            </div>
            <div class="col-lg-3 col-xs-6">
                <label>R.F.C.:</label>
                <input class="form-control"  type="text" name="rfc" value="<? if(isset($_POST['update'])){ echo $row_u['rfc'];}?>"  size="32" />
            </div>
        </div>

        <div class="col-lg-12 col-xs-12">
            <div class="col-lg-3 col-xs-6">
                <label>Direcion en el R.F.C.: </label>
                <input class="form-control"  type="text" name="dir_rfc" value="<?  if(isset($_POST['update'])){echo $row_u['dir_rfc'];}?>"  size="32" />
            </div>
            <div class="col-lg-3 col-xs-6">
                <label>Nombre de contacto factura:</label>
                <input class="form-control"  type="text" name="nombre_factura" value="<? if(isset($_POST['update'])){ echo $row_u['nombre_factura'];}?>"  size="32" />
            </div>
            <div class="col-lg-3 col-xs-6">
               <label> Email de factura:</label>
                <input class="form-control"  type="text" name="email_factura" value="<?  if(isset($_POST['update'])){echo $row_u['email_factura'];}?>"  size="32" />
            </div>
            <div class="col-lg-3 col-xs-6">
                <label>Teléfono de contacto factura:</label>
                <input class="form-control"  type="text" name="tel_factura" value="<? if(isset($_POST['update'])){ echo $row_u['tel_factura'];}?>"  size="32" />
            </div>
        </div>

        <div class="col-lg-12 col-xs-12">
            <div class="col-lg-3 col-xs-6">
                <label>Forma de pago:</label>
                <input class="form-control"  type="text" name="forma_pago" value="<?  if(isset($_POST['update'])){echo $row_u['forma_pago'];}?>"  size="32" />
            </div>
            <div class="col-lg-3 col-xs-6">
                <label>Banco:</label>
                <input class="form-control"  type="text" name="banco" value="<? if(isset($_POST['update'])){ echo $row_u['banco'];}?>"  size="32" />
            </div>
            <div class="col-lg-3 col-xs-6">
                <label>4 ultimos digitos de tarjeta:</label>
                <input class="form-control"  type="text" name="digitos_tarjeta" value="<?  if(isset($_POST['update'])){echo $row_u['digitos_tarjeta'];}?>"  size="32" />
            </div>
            <div class="col-lg-3 col-xs-6" style="top:26px;">
                <? if(isset($_POST['update'])){?>
                <input class="form-control" type="submit" value="Actualizar datos" />
                <input type="hidden" name="update1" value="1" />
                <input type="hidden" name="idoperador" value="<?php echo $row_u['idoperador'];?>" />
                <? }else{?>
                  <input  class="form-control" type="submit" value="Guardar datos" />
                  <input type="hidden" name="guardar1" value="1" /><? }?>
                  <input type="hidden" name="op" value="1" />

            </div>
        </div>

    </form>
  </div>
  <!-- TABLA 2 =====================================  -->
 
  <div class="col-lg-12 col-xs-12" >
  <br/></div>

<div class="col-lg-12 col-xs-12" id="tabla2" style="display:none;background-color: #def2f5">
  <div class="table-responsive">
    <table class="table table-bordered">
        <thead style="background-color: #07889B; color:white; " >
         <th> Usuario:</th>
          <th>Contraseña:</th>
          <th> Nombre de la entidad legal:</th>
          <th>Nombre del representante legal:</th>
          <th>Dirección:</th>
          <th>Colonia:</th>
          <th>Municipio:</th>
          <th>Estado:</th>
          <th>Pais:</th>
          <th>C.P.:</th>
          <th>Coordenadas:</th>
          <th>Email:</th>
          <th>Teléfono:</th>
          <th>Fax:</th>
          <th>R.F.C:</th>
          <th>Dirección R.F.C:</th>
          <th>Nombre contacto:</th>
          <th>Email factura:</th>
          <th>Teléfono factura:</th>
          <th>Forma de pago:</th>
          <th>Banco:</th>
    
          <th>4 digitos tarjeta:</th>
          <th>Editar</th>
          <th>Eliminar</th>
        </thead>

        <tbody>
          <?
           $query_u= "SELECT  * FROM operador where password is not null order by nombre_legal asc ";
          $u = mysql_query($query_u,$inforgan_pamfa) or die(mysql_error());
          while($row_u = mysql_fetch_assoc($u)){ 
         
		  ?>
          
          <tr>
          <td><label><? echo $row_u['username'];?></label></td>
            <td><label><? echo $row_u['password'];?></label></td>
            <td><label><? echo $row_u['nombre_legal'];?></label></td>
            <td><label><? echo $row_u['nombre_representante'];?></label></td>
            <td><label><? echo $row_u['direccion'];?></label></td>
            <td><label><? echo $row_u['colonia'];?></label></td>
             <td><label><? echo $row_u['municipio'];?></label></td>
            <td><label><? echo $row_u['estado'];?></label></td>
            <td><label><? echo $row_u['pais'];?></label></td>
            <td><label><? echo $row_u['cp'];?></label></td>
            <td><label><? echo $row_u['coordenadas'];?></label></td>
            <td><label><? echo $row_u['email'];?></label></td>
            <td><label><? echo $row_u['telefono'];?></label></td>
            <td><label><? echo $row_u['fax'];?></label></td>
            <td><label><? echo $row_u['rfc'];?></label></td>
            <td><label><? echo $row_u['dir_rfc'];?></label></td>
            <td><label><? echo $row_u['nombre_factura'];?></label></td>
            <td><label><? echo $row_u['email_factura'];?></label></td>
            <td><label><? echo $row_u['tel_factura'];?></label></td>
            <td><label><? echo $row_u['forma_pago'];?></label></td>
            <td><label><? echo $row_u['banco'];?></label></td>
            <td><label><? echo $row_u['digitos_tarjeta'];?></label></td>
            <td>      
               
                  <input type="hidden" name="idoperador" value="<?php echo $row_u['idoperador'];?>" />
                  <input type="hidden" name="update" value="1" />
                  <input type="hidden" name="op" value="1" />
                  <input type="image" name="imageField2" id="imageField2" src="../images/editar.png" title="Editar"  style="padding-top: 0px; border-radius: 0px; width: 25px; height: 25px;" onclick="abrir(<? echo $row_u['idoperador'];?>);" />
               
                  <div id="modal<? echo $row_u['idoperador'];?>" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
       <div class="col-lg-12 col-xs-12" style="text-align: center; background-color: #07889B">
            <h5><b style="color:white">ACTUALIZAR INFORMACIÓN</b></h5>
        </div>
      </div>
      <div class="modal-body">
       <form action="" method="post">
             <? 
            
                $query_t= "SELECT  * FROM operador where idoperador=".$row_u['idoperador']."";
                $t = mysql_query($query_t, $inforgan_pamfa) or die(mysql_error());
                $row_t = mysql_fetch_assoc($t);  
			         
              
            ?>
        
		<div class="row">
        <div class="col-lg-12 col-xs-12" id="formulario" >
            <div class="col-lg-4 col-xs-6">
              <label>Nombre de la entidad legal:</label>
              <input class="form-control" required type="text" name="nombre_legal" value="<? echo $row_t['nombre_legal'];?>"  size="32" />
            </div>
            <div class="col-lg-4 col-xs-6">
               <label> Nombre del representante legal:</label>
                <input class="form-control" required type="text" name="nombre_representante" value="<?  echo $row_t['nombre_representante'];?>"  size="32" />
            </div>
            <div class="col-lg-4 col-xs-6">
               <label>Direccion:</label>
              <input class="form-control" type="text" name="direccion" value="<? echo $row_t['direccion'];?>"  size="32" />
            </div>
            </div>
          
        </div>
        <div class="row">

        <div class="col-lg-12 col-xs-12">
          <div class="col-lg-4 col-xs-6">
                <label>Colonia:</label>
                <input class="form-control"  type="text" name="colonia" value="<? echo $row_t['colonia'];?>"  size="32" />
            </div>
            <div class="col-lg-4 col-xs-6">
               <label>Municipio:</label>
              <input class="form-control"  type="text" name="municipio" value="<? echo $row_t['municipio'];?>"  size="32" />
            </div>
            <div class="col-lg-4 col-xs-6">
                <label>Estado:</label>
                <input class="form-control"  type="text" name="estado" value="<? echo $row_t['estado'];?>"  size="32" />
            </div>
           
           
        </div>
 </div>
        <div class="row">
        <div class="col-lg-12 col-xs-12">
         <div class="col-lg-3 col-xs-6">
              <label>Pais:</label>
              <input class="form-control" type="text" name="pais" value="<? echo $row_t['pais'];?>"  size="32" />
            </div>
         <div class="col-lg-4 col-xs-6">
              <label>C.P.:</label>
              <input class="form-control" type="text" name="cp" value="<? echo $row_t['pais'];?>"  size="32" />
            </div>
            <div class="col-lg-4 col-xs-6">
                <label>Coordenadas:</label>
                <input class="form-control"  type="text" name="coordenadas" value="<? echo $row_t['coordenadas'];?>"  size="32" />
            </div>
           
        </div>
 </div>
        <div class="row">
        <div class="col-lg-12 col-xs-12">
                    <div class="col-lg-3 col-xs-6">
                <label>Email:</label>
                <input class="form-control"  type="text" name="email" value="<? echo $row_t['email'];?>"  size="32" />
            </div>

         <div class="col-lg-3 col-xs-6">
                <label>Teléfono:</label>
                <input class="form-control"  type="text" name="telefono" value="<? echo $row_t['telefono'];?>"  size="32" />
            </div>
            <div class="col-lg-3 col-xs-6">
                <label>Fax:</label>
                <input class="form-control"  type="text" name="fax" value="<? echo $row_t['fax'];?>"  size="32" />
            </div>
           <div class="col-lg-3 col-xs-6">
                <label>R.F.C.:</label>
                <input class="form-control"  type="text" name="rfc" value="<? echo $row_t['rfc'];?>"  size="32" />
            </div>
           
        </div>
 </div>
        <div class="row">
        <div class="col-lg-12 col-xs-12">
         
         <div class="col-lg-6 col-xs-6">
                <label>Direcion en el R.F.C.: </label>
                <input class="form-control"  type="text" name="dir_rfc" value="<? echo $row_t['dir_rfc'];?>"  size="32" />
            </div>
            <div class="col-lg-6 col-xs-6">
                <label>Nombre de contacto factura:</label>
                <input class="form-control"  type="text" name="nombre_factura" value="<? echo $row_t['nombre_factura'];?>"  size="32" />
            </div>
           
            </div>
             </div>
        <div class="row">
             <div class="col-lg-12 col-xs-12">
              <div class="col-lg-6 col-xs-6">
               <label> Email de factura:</label>
                <input class="form-control"  type="text" name="email_factura" value="<? echo $row_t['email_factura'];?>"  size="32" />
            </div>
            <div class="col-lg-6 col-xs-6">
                <label>Teléfono de contacto factura:</label>
                <input class="form-control"  type="text" name="tel_factura" value="<? echo $row_t['tel_factura'];?>"  size="32" />
            </div>
           
            </div>
             </div>
        <div class="row">
             <div class="col-lg-12 col-xs-12">
              <div class="col-lg-4 col-xs-6">
                <label>Forma de pago:</label>
                <input class="form-control"  type="text" name="forma_pago" value="<? echo $row_t['forma_pago'];?>"  size="32" />
            </div>
            <div class="col-lg-3 col-xs-6">
                <label>Banco:</label>
                <input class="form-control"  type="text" name="banco" value="<? echo $row_t['banco'];?>"  size="32" />
            </div>
            <div class="col-lg-5 col-xs-6">
                <label>4 ultimos digitos de tarjeta:</label>
                <input class="form-control"  type="text" name="digitos_tarjeta" value="<? echo $row_t['digitos_tarjeta'];?>"  size="32" />
            </div>
           
        </div>
 </div>
       
   

      </div>
      <div class="modal-footer">
       
       
        <input type="hidden" name="update1" value="1" />
                <input type="hidden" name="idoperador" value="<?php echo $row_u['idoperador'];?>" />
                
                  <input type="hidden" name="op" value="1" />
        <div class="col-lg-12 col-xs-12">
          <div class="col-lg-9 col-xs-6 text-right">
         <input type="button" class="btn btn-danger" data-dismiss="modal" value="X"/>  
         </div>
              <div class="col-lg-3 col-xs-6 text-right"  >
          <input  class="btn btn-success" type="submit" value="Actualizar" />
          </div>
          
            
         </div>
        </form>
        
      </div>
    </div>
            </td>
            <td>
         
                <form   method="post" action="" id="borra<?php echo $row_u['idoperador'];?>" > 
                  <input type="hidden" name="idoperador" value="<?php echo $row_u['idoperador'];?>" />
                  <input type="hidden" name="eliminar1" value="1" />
                   <input type="hidden" name="op" value="1" />
                  <input type="image" name="imageField2" id="imageField2" src="../images/delete.png" title="Eliminar" style="padding-top: 0px; border-radius: 0px; width: 25px; height: 25px;" />
                </form>
             <script>
    document.querySelector('#borra<?php echo $row_u['idoperador'];?>').addEventListener('submit', function(e) {
      var form = this;
      
      e.preventDefault();
      
     swal({
   title: "Esta seguro?",
          text: "El operador se eliminará!",
          icon: "warning",
  buttons: [
            'Cancelar',
            'Eliminar'
          ],
          dangerMode: true,
})
.then(function(isConfirm)  {
  if (isConfirm) {
 
   
    form.submit();
     
  }
});

    });
	
  </script> 
            </td>
          </tr>
        

        <? }
		?>    </tbody>
    </table>
  </div>
  </div>
  
  
   <div class="col-lg-12 col-xs-12" >
  <br/></div>

<div class="col-lg-12 col-xs-12" id="espera" style="display:none;background-color: #def2f5">
  <div class="table-responsive">
    <table class="table table-bordered">
        <thead style="background-color: #07889B; color:white; " >
         <th> Usuario:</th>
          <th>Contraseña:</th>
          <th> Nombre de la entidad legal:</th>
          <th>Nombre del representante legal:</th>
          <th>Dirección:</th>
          <th>Colonia:</th>
          <th>Municipio:</th>
          <th>Estado:</th>
          <th>Pais:</th>
          <th>C.P.:</th>
          <th>Coordenadas:</th>
          <th>Email:</th>
          <th>Teléfono:</th>
          <th>Fax:</th>
          <th>R.F.C:</th>
          <th>Dirección R.F.C:</th>
          <th>Nombre contacto:</th>
          <th>Email factura:</th>
          <th>Teléfono factura:</th>
          <th>Forma de pago:</th>
          <th>Banco:</th>
          <th>4 digitos tarjeta:</th>
          <th>Aceptar</th>
          <th>Eliminar</th>
        </thead>

        <tbody>
          <?
           $query_u= "SELECT  * FROM operador where password is null order by nombre_legal asc";
          $u = mysql_query($query_u,$inforgan_pamfa) or die(mysql_error());
          while($row_u = mysql_fetch_assoc($u)){ 
         
		  ?>
          
          <tr>
            <td><label><? echo $row_u['username'];?></label></td>
            <td><label><? echo $row_u['password'];?></label></td>
            <td><label><? echo $row_u['nombre_legal'];?></label></td>
            <td><label><? echo $row_u['nombre_representante'];?></label></td>
            <td><label><? echo $row_u['direccion'];?></label></td>
            <td><label><? echo $row_u['colonia'];?></label></td>
             <td><label><? echo $row_u['municipio'];?></label></td>
            <td><label><? echo $row_u['estado'];?></label></td>
            <td><label><? echo $row_u['pais'];?></label></td>
            <td><label><? echo $row_u['cp'];?></label></td>
            <td><label><? echo $row_u['coordenadas'];?></label></td>
            <td><label><? echo $row_u['email'];?></label></td>
            <td><label><? echo $row_u['telefono'];?></label></td>
            <td><label><? echo $row_u['fax'];?></label></td>
            <td><label><? echo $row_u['rfc'];?></label></td>
            <td><label><? echo $row_u['dir_rfc'];?></label></td>
            <td><label><? echo $row_u['nombre_factura'];?></label></td>
            <td><label><? echo $row_u['email_factura'];?></label></td>
            <td><label><? echo $row_u['tel_factura'];?></label></td>
            <td><label><? echo $row_u['forma_pago'];?></label></td>
            <td><label><? echo $row_u['banco'];?></label></td>
            <td><label><? echo $row_u['digitos_tarjeta'];?></label></td>
           <? /* <td>      
                <form method="post" action="">
                  <input type="hidden" name="idoperador" value="<?php echo $row_u['idoperador'];?>" />
                  <input type="hidden" name="update" value="1" />
                  <input type="hidden" name="op" value="1" />
                  <input type="image" name="imageField2" id="imageField2" src="../images/editar.png" title="Editar"  style="padding-top: 0px; border-radius: 0px; width: 25px; height: 25px;"/>
                </form>
            </td>
            <td>
                <form   method="post" action="">
                  <input type="hidden" name="idoperador" value="<?php echo $row_u['idoperador'];?>" />
                  <input type="hidden" name="eliminar1" value="1" />
                   <input type="hidden" name="op" value="1" />
                  <input type="image" name="imageField2" id="imageField2" src="../images/delete.png" title="Eliminar" style="padding-top: 0px; border-radius: 0px; width: 25px; height: 25px;" />
                </form>
            </td>*/?>
             <td>      
                <form method="post" action="">
                  <input type="hidden" name="idoperador" value="<?php echo $row_u['idoperador'];?>" />
                  <input type="hidden" name="pass_tem" value="<?php echo $row_u['pass_tem'];?>" />
                  <input type="hidden" name="update_au" value="1" />
                  <input type="hidden" name="op" value="1" />
                <input type="submit" value="Aceptar"/>
                
                 <input type="hidden" name="correo" value="<?php echo $row_u['email'];?>" />
                  <input type="hidden" name="usuario" value="<?php echo $row_u['username'];?>" />
                 
                
                </form>
            </td>
            <td>
                <form   method="post" action="">
                  <input type="hidden" name="idoperador" value="<?php echo $row_u['idoperador'];?>" />
                  <input type="hidden" name="eliminar1" value="1" />
                   <input type="hidden" name="op" value="1" />
                  <input type="image" name="imageField2" id="imageField2" src="../images/delete.png" title="Eliminar" style="padding-top: 0px; border-radius: 0px; width: 25px; height: 25px;" />
                </form>
            </td>
          </tr>
          
        <? }?>
        </tbody>
    </table>
  </div>
  </div>
  
</div>
</div> 
 