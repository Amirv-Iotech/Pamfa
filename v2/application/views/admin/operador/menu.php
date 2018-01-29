

<div class="container-fluid col-lg-12" >

<div class="btn-group">
<a class="btn btn-success" href="<?php echo site_url('/operadores/consultar/');?>"><i class="fa fa-list fa-fw"></i> Ver todo</a>
</div>

<div class="btn-group">
<a class="btn btn-info" href="<?php echo site_url('/operadores/registrar/agricola');?>"><i class="fa fa-list fa-fw"></i> Producción vegetal</a>
<a class="btn btn-primary" href="<?php echo site_url('/operadores/registrar/agricola');?>" title="Registrar operador"><i class="fa fa-pencil fa-fw"></i></a>
</div>

<div class="btn-group">
<a class="btn btn-info" href="<?php echo site_url('/operadores/registrar/ganaderia');?>"><i class="fa fa-list fa-fw"></i> Producción animal</a>
<a class="btn btn-primary" href="<?php echo site_url('/operadores/registrar/ganaderia');?>" title="Registrar operador"><i class="fa fa-pencil fa-fw"></i></a>
</div>

<div class="btn-group">
<a class="btn btn-info" href="<?php echo site_url('/operadores/registrar/procesador');?>"><i class="fa fa-list fa-fw"></i> Procesamiento</a>
<a class="btn btn-primary" href="<?php echo site_url('/operadores/registrar/procesador');?>" title="Registrar operador"><i class="fa fa-pencil fa-fw"></i></a>
</div>

<div class="btn-group">
<a class="btn btn-info" href="<?php echo site_url('/operadores/registrar/comercializador');?>"><i class="fa fa-list fa-fw"></i> Comercialización</a>
<a class="btn btn-primary" href="<?php echo site_url('/operadores/registrar/comercializador');?>" title="Registrar operador"><i class="fa fa-pencil fa-fw"></i></a>
</div>

<div class="btn-group">
<a class="btn btn-warning" href="<?php echo site_url('/operadores/consultar/export/');?>"><i class="fa fa-list fa-fw"></i> Lista general</a>
</div>

  <form action="<?php echo site_url('/operadores/consultar/'.$categoria);?>" method="post">
  <div class="col-lg-3">
  <input class="form-control" type="text" name="buscar" placeholder="Escribe aquí" />
  </div>
  <div class="col-lg-3">
  <input class="btn btn-primary" type="submit" name="busqueda" value="Buscar" />
  </div>
  </form>

</div>
