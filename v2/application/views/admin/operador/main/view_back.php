<div class="col-xs-10">
<table class="table table-sm table-striped table-hover">
  <thead>
  <tr class="table-primary">
  	<th>#</th>
    <th>Código</th>
    <th>Operador</th>
    <th>Representante</th>
    <th>Municipio</th>
    <th>Estado</th>
    <th>Teléfono</th>
    <th>Email</th>
    <th></th>
  </tr>
  </thead>
  <?php 
	$cont = 0;
	foreach ($operadores as $operador){
	$cont++;
	?>
  <tr>
  	<td><?php echo $cont;?></td>
    <td>
    	<?php echo $operador->codigo_operador;?>
    </td>
    <td>
    	<?php echo $operador->operador;?>
    </td>
    <td>
    	<?php echo $operador->representante_legal;?>
    </td>
    <td>
    	<?php echo $operador->municipio;?>
    </td>
    <td>
    	<?php echo utf8_decode($operador->entidad_federativa);?>
    </td>
    <td>
    	<?php echo $operador->telefono;?>
    </td>
    <td>
    	<?php echo $operador->email;?>
    </td>
    <td class="text-center" width="1">
      <form method="post" action="<?php echo site_url('/operadores/detalle/'.$categoria.'/'.$operador->idoperador);?>">
      <button style="cursor:pointer" class="btn btn-warning" type="submit" data-toggle="tooltip" data-placement="top" title="Actualizar" name="update" class="btn btn-danger"><i class="fa fa-wrench fa-fw"></i></button>
      <input type="hidden" name="idoperador" value="<?php echo $operador->idoperador;?>" />
      </form>
    </td>
  </tr>
  <?php }?>
</table>
</div>