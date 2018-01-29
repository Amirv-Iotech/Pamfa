<div class="col-xs-10">
EXPORT
<table id="example1" class="table table-sm table-striped table-hover table-bordered">
  <thead>
  <tr class="table-primary">
  <th> Nombre de la entidad legal:</th>
          <th>Nombre del representante legal:</th>
          <th>Dirección:</th>
          <th>Colonia:</th>
          <th>Estado:</th>
          <th>Pais:</th>
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
  </tr>
  </thead>
  <?php 
	$cont = 0;
	if($main_active==2){
	foreach ($operadores as $operador){
		
		
				$categoria = 'GENERAL';
			
	
	?>
  <tr>
  	<td></td>
    <td>
    	<?php echo $operador->codigo_operador;?>
    </td>
    <td>
    	<?php echo $operador->operador;?>
    </td>
    <td><?php echo $operador->representante_legal;?></td>
    <td>
    	<?php echo $operador->nombre_huerta;?>
    </td>
    <td>
    	<?php echo $categoria;?>
    </td>
    <td>
    	<?php echo strtoupper($operador->producto);?>
    </td>
    <td>
    	<?php echo $operador->telefono;?>
    </td>
    <td>
    	<?php echo $operador->celular;?>
    </td>
    <td>
    	<?php echo $operador->email;?>
    </td>
    <td class="text-center" width="1">
    <?php if(!$categoria){$categoria='main';}?>
      <form method="post" action="<?php echo site_url('/operadores/detalle/'.$categoria.'/'.$operador->idoperador);?>">
      <button style="cursor:pointer" class="btn btn-warning" type="submit" data-toggle="tooltip" data-placement="top" title="Actualizar" name="update" class="btn btn-danger"><i class="fa fa-wrench fa-fw"></i></button>
      <input type="hidden" name="idoperador" value="<?php echo $operador->idoperador;?>" />
      </form>
    </td>
    <td class="text-center" width="1">
    <?php if(!$categoria){$categoria='main';}?>
      <form method="post" action="<?php echo site_url('/operadores/consultar/'.$categoria);?>">
      <button style="cursor:pointer" class="btn btn-danger" type="submit" data-toggle="tooltip" data-placement="top" title="Eliminar" name="update" class="btn btn-danger"><i class="fa fa-remove fa-fw"></i></button>
      <input type="hidden" name="idoperador" value="<?php echo $operador->idoperador;?>" />
      <input type="hidden" name="eliminarOperador" value="true" />
      </form>
    </td>
  </tr>
  <?php }}?>
</table>
</div>
