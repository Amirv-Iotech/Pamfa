<div class="row" id="operador">
<div class="col-lg-12 col-xs-12">
  <div class="col-lg-12 col-xs-12" style="background-color: #def2f5">
    <form action="" method="post">
             <? 
              if(isset($_POST['update']))
              {
                $query_u= "SELECT  * FROM usuario where idusuario=".$_POST['idusuario']."";
                $u = mysql_query($query_u, $inforgan_pamfa) or die(mysql_error());
                $row_u = mysql_fetch_assoc($u);              
              }
            ?>
        <div class="col-lg-12 col-xs-12" style="text-align: center; background-color: #07889B">
            <h5><b style="color:white">INGRESE LA SIGUIENTE INFORMACIÓN</b></h5>
        </div>

        <div class="col-lg-12 col-xs-12" id="formulario">
            <div class="col-lg-3 col-xs-6">
              <label>Usuario:</label>
              <input class="form-control" required type="text" name="username" value="<? if(isset($_POST['update'])){ echo $row_u['username'];}?>"  size="32" />
            </div>
            <div class="col-lg-3 col-xs-6">
               <label> Contraseña:</label>
                <input class="form-control" required type="text" name="password" value="<? if(isset($_POST['update'])){ echo $row_u['password'];}?>"  size="32" />
            </div>
            <div class="col-lg-3 col-xs-6">
               <label>Nombre:</label>
              <input class="form-control" type="text" name="nombre" value="<?  if(isset($_POST['update'])){echo $row_u['nombre'];}?>"  size="32" />
            </div>
            <div class="col-lg-3 col-xs-6">
                <label>Apellidos:</label>
                <input class="form-control"  type="text" name="apellidos" value="<? if(isset($_POST['update'])){ echo $row_u['apellidos'];}?>"  size="32" />
            </div>
        </div>

        <div class="col-lg-12 col-xs-12">
            <div class="col-lg-3 col-xs-6">
               <label>Email:</label>
              <input class="form-control"  type="text" name="email" value="<?  if(isset($_POST['update'])){echo $row_u['email'];}?>"  size="32" />
            </div>
            <div class="col-lg-3 col-xs-6">
                <label>Teléfono:</label>
                <input class="form-control"  type="text" name="tel" value="<? if(isset($_POST['update'])){ echo $row_u['tel'];}?>"  size="32" />
            </div>
           <div class="col-lg-3 col-xs-6">
              <label>Tipo:</label>
              <select class="form-control"  name="tipo" >
              <option value="1"  >Administrador</option>
              <option value="2"  >Auditor</option>
              <option value="3"  >Inspector</option>
              </select>
            </div>
     
         <div class="col-lg-3 col-xs-6" >
                <? if(isset($_POST['update'])){?>
                <input class="form-control" type="submit" value="Actualizar datos" />
                <input type="hidden" name="update6" value="1" />
                <input type="hidden" name="idusuario" value="<?php echo $row_u['idusuario'];?>" />
                <? }else{?>
                  <input  class="form-control" type="submit" value="Guardar datos" />
                  <input type="hidden" name="guardar6" value="6" /><? }?>
                  <input type="hidden" name="op" value="6" />

            </div>
        
            
            
           
        </div>

    </form>
  </div>
  <!-- TABLA 2 =====================================  -->
  <div class="col-lg-12 col-xs-12">
  <br/></div>

<div class="col-lg-12 col-xs-12" id="tabla2" style="background-color: #def2f5">
  <div class="table-responsive">
    <table class="table table-bordered">
        <thead style="background-color: #07889B; color:white; " >
          <th> Usuario:</th>
          <th>Contraseña:</th>
          <th>Nombre:</th>
          <th>Apellidos:</th>
          <th>Email:</th>
          <th>Telefono:</th>
           <th>Tipo:</th>
          
          <th>Editar</th>
          <th>Eliminar</th>
        </thead>

        <tbody>
          <?
           $query_u= "SELECT  * FROM usuario order by idusuario asc ";
          $u = mysql_query($query_u,$inforgan_pamfa) or die(mysql_error());
          while($row_u = mysql_fetch_assoc($u)){ 
		   if($row_u['idusuario']>0 && $row_u['idusuario']<4  )
		  {
		  }
		  else{
          ?>
          <tr>
            <td><label><? echo $row_u['username'];?></label></td>
            <td><label><? echo $row_u['password'];?></label></td>
            <td><label><? echo $row_u['nombre'];?></label></td>
            <td><label><? echo $row_u['apellidos'];?></label></td>
            <td><label><? echo $row_u['email'];?></label></td>
            <td><label><? echo $row_u['tel'];?></label></td>
            <td><label><? echo $row_u['tipo'];?></label></td>
           
            <td>      
                
                  <input type="hidden" name="idusuario" value="<?php echo $row_u['idusuario'];?>" />
                  <input type="hidden" name="update" value="1" />
                  <input type="hidden" name="op" value="6" />
                  <input type="image" name="imageField2" id="imageField2" src="../images/editar.png" title="Editar"  style="padding-top: 0px; border-radius: 0px; width: 25px; height: 25px;" onclick="abrir(<? echo $row_u['idusuario'];?>);" />
                
  
            </td>
            
            <td>
                <form   method="post" action="" id="borra<?php echo $row_u['idusuario'];?>">
                  <input type="hidden" name="idusuario" value="<?php echo $row_u['idusuario'];?>" />
                  <input type="hidden" name="eliminar6" value="1" />
                   <input type="hidden" name="op" value="6" />
                  <input type="image" name="imageField2" id="imageField2" src="../images/delete.png" title="Eliminar" style="padding-top: 0px; border-radius: 0px; width: 25px; height: 25px;" />
                </form>
                  <script>
    document.querySelector('#borra<?php echo $row_u['idusuario'];?>').addEventListener('submit', function(e) {
      var form = this;
      
      e.preventDefault();
      
     swal({
   title: "Esta seguro?",
          text: "El usuario se eliminará!",
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
                                     <div id="modal<? echo $row_u['idusuario'];?>" class="modal fade" role="dialog">
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
             
                $query_r= "SELECT  * FROM usuario where idusuario=".$row_u['idusuario']."";
                $r = mysql_query($query_r, $inforgan_pamfa) or die(mysql_error());
                $row_r = mysql_fetch_assoc($r);              
             
            ?>
       
        <div class="col-lg-12 col-xs-12" id="formulario">
            <div class="col-lg-3 col-xs-6">
              <label>Usuario:</label>
              <input class="form-control" required type="text" name="username" value="<? echo $row_r['username'];?>"  size="32" />
            </div>
            <div class="col-lg-3 col-xs-6">
               <label> Contraseña:</label>
                <input class="form-control" required type="text" name="password" value="<? echo $row_r['password'];?>"  size="32" />
            </div>
            <div class="col-lg-3 col-xs-6">
               <label>Nombre:</label>
              <input class="form-control" type="text" name="nombre" value="<? echo $row_r['nombre'];?>"  size="32" />
            </div>
            <div class="col-lg-3 col-xs-6">
                <label>Apellidos:</label>
                <input class="form-control"  type="text" name="apellidos" value="<? echo $row_r['apellidos'];?>"  size="32" />
            </div>
        </div>

        <div class="col-lg-12 col-xs-12">
            <div class="col-lg-3 col-xs-6">
               <label>Email:</label>
              <input class="form-control"  type="text" name="email" value="<? echo $row_r['email'];?>"  size="32" />
            </div>
            <div class="col-lg-3 col-xs-6">
                <label>Teléfono:</label>
                <input class="form-control"  type="text" name="tel" value="<? echo $row_r['tel'];?>"  size="32" />
            </div>
           <div class="col-lg-6 col-xs-6">
              <label>Tipo:</label>
              <select class="form-control"  name="tipo" >
              <option value="1"  >Administrador</option>
              <option value="2"  >Auditor</option>
              <option value="3"  >Inspector</option>
              </select>
            </div>
     
        
                
               
        
      </div>
      <div class="modal-footer">
 <div class="col-lg-12 col-xs-12">
            <div class="col-lg-8 col-xs-6">
                            <input type="hidden" name="update6" value="1" />
                <input type="hidden" name="idusuario" value="<?php echo $row_u['idusuario'];?>" />
               
                  <input type="hidden" name="op" value="6" />

       
         <input type="button" class="btn btn-danger" data-dismiss="modal" value="X"/>
         </div>
        
            <div class="col-lg-3 col-xs-6">
          <input  class="btn btn-success" type="submit" value="Actualizar" />
       </div>
        </form>
      </div>
    </div>              
 
            </td>
          </tr>
        
        <? } }?>
        </tbody>
    </table>
  </div>
  </div>
</div>
</div> 




