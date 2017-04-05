
  
    <fieldset>
    <legend></legend>
     <a name="seccion5">
     <table width="100%"><tbody><tr><th  bgcolor="#00CC33">
    <h3>Datos de la auditoria:</h3>
    
   </th></tr></tbody></table>
   <br /><br />
      
     <form method="post" action="#seccion5">
      <div class=" col-lg-12 col-md-12">
    <div class=" col-lg-6 col-md-6">
    	 <table width="100%"><tbody><tr><th  bgcolor="#00CC33">
   Tipo de auditoria:
    
   </th></tr></tbody></table>
        </div>
         <div class=" col-lg-6 col-md-6">
    	 <table width="100%"><tbody><tr><th  bgcolor="#00CC33">
 Esquema de certifcación:
    
   </th></tr></tbody></table>
         
         
         </div>
         </div>
          
          <div class="col-lg-6 col-md-6">
    	<table width="100%"><tbody><tr><th colspan="1" >
  <label><input onchange="this.form.submit()"  type="checkbox" <? if ($row_plan_auditoria['tipo']==1){?> checked="checked"<? }?>  value="1" name="tipo1">Certificación</label>

   </th>
   <th colspan="2">
  <label><input onchange="this.form.submit()"  type="checkbox" <? if ($row_plan_auditoria['tipo']==2){?> checked="checked"<? }?>  value="1" name="tipo2">Re-certificación</label>

   </th></tr>
   <tr>
   <th colspan="1" >
  <label><input onchange="this.form.submit()"  type="checkbox" <? if ($row_plan_auditoria['tipo']==1){?> checked="checked"<? }?>  value="1" name="tipo3">Vigilancia(No anunciada)</label>

   </th>
   <th colspan="2" >
  <label>Evaluaciones de cambio de alcances</label>

   </th>
   </tr>
   <tr>
   <th colspan="1">
  <label><input onchange="this.form.submit()"  type="checkbox" <? if ($row_plan_auditoria['tipo']==1){?> checked="checked"<? }?>  value="1" name="tipo5">Extraordinaria</label>

   </th>
   <th colspan="1" >
  <label><input onchange="this.form.submit()"  type="checkbox" <? if ($row_plan_auditoria['tipo']==1){?> checked="checked"<? }?>  value="1" name="tipo6">Ampliacion</label>

   </th>
   <th colspan="1" >
  <label><input onchange="this.form.submit()"  type="checkbox" <? if ($row_plan_auditoria['tipo']==1){?> checked="checked"<? }?>  value="1" name="tipo6">Reducción</label>

   </th>
   </tr>
   <tr>
   <th colspan="1" >
  Nombre del rancho/ invernadero
   </th>
   <th colspan="2" >
 Superficie
   </th>
   
   </tr>
   <tr>
   <th colspan="1" >
  <input placeholder="escribe aquí"  class="form-control" onchange="this.form.submit()" name="rancho_invernadero" type="text" 			title="Número " value="<? echo $row_plan_auditoria['rancho_invernadero'];?>"  />
   </th>
   <th colspan="2" >
 <input placeholder="escribe aquí"  class="form-control" onchange="this.form.submit()" name="superficie" type="number" step="any" 			title="Número " value="<? echo $row_plan_auditoria['superficie'];?>"  />
   </th>
   </tr>
   <tr>
   <th colspan="2" >
 Producto
   </th>
  
   </tr>
   <tr>
   <th colspan="2" >
  <input placeholder="escribe aquí"  class="form-control" onchange="this.form.submit()" name="producto_proce" type="text" 			title="Número " value="<? echo $row_plan_auditoria['producto_proce'];?>"  />
   </th>
   </tr>
   <tr>
   <th colspan="2" >
 Nombre del centro de manipulación/cuarto frio/empacadora/procesadora
   </th>
   </tr>
   <tr>
   <th colspan="2" >
 <input placeholder="escribe aquí"  class="form-control" onchange="this.form.submit()" name="manip"  			title="Número " value="<? echo $row_plan_auditoria['manip'];?>"  />
   </th>
   </tr>
   <tr>
   <th colspan="2" >
 Otro (especifique)
   </th>
   
   <th colspan="2" >
 <input placeholder="escribe aquí"  class="form-control" onchange="this.form.submit()" name="otro"  			title="Otro " value="<? echo $row_plan_auditoria['otro'];?>"  />
   </th>
   </tr>
   
   </tbody></table>
   </div>
      
       <div class="col-lg-6 col-md-6">
    	<table width="100%"><tbody><tr><th colspan="1" >
  <label><input onchange="this.form.submit()"  type="checkbox" <? if ($row_solicitud_esq['esq_tipo1_op1']!=NULL){?> checked="checked"<? }?>  value="1" name="tipo1">GLOBALG A.P. IFA</label>

   </th>
   <th colspan="2">
   <label><input onchange="this.form.submit()"  type="checkbox" <? if ($row_solicitud_esq['esq_tipo2_op1']!=NULL){?> checked="checked"<? }?>  value="1" name="tipo1">GLOBALG A.P. Cadena de Custodia</label>


   </th></tr>
   <tr>
   <th colspan="1" >
  <label><input onchange="this.form.submit()"  type="checkbox" <? if ($row_solicitud_esq['esq_tipo2_op1']!=NULL){?> checked="checked"<? }?>  value="1" name="tipo1">GLOBALG A.P. Cadena de Custodia</label>

   </th>
   
   <th colspan="1">
 <label><input onchange="this.form.submit()"  type="checkbox" <? if ($row_solicitud['idprimus']!=NULL){?> checked="checked"<? }?>  value="1" name="tipo1">PrimusGFS</label>

   </th>
   </tr>
   <tr>
   <th colspan="1" >
  <label><input onchange="this.form.submit()"  type="checkbox" <? if ($row_solicitud['idmex_pliego']!=NULL){?> checked="checked"<? }?>  value="1" name="tipo1">Pliego de condiciones México Calidad Suprema</label>

   </th>
   <th colspan="1" >
  <label><input onchange="this.form.submit()"  type="checkbox" <? if ($row_solicitud['idsrrc']!=NULL){?> checked="checked"<? }?>  value="1" name="tipo1">Sistema  Reduccion de Riesgos de contaminación</label>


   </th>
   </tr>
   <tr>
   <th colspan="1" >
  Numero PGFS

   </th>
   <th colspan="1" >
  N°. PAMFA(PC.MC/MEXICO G.A.P/SRRC)

   </th>
   </tr>
   <tr>
   <th colspan="1" >
  <input placeholder="escribe aquí"  class="form-control" onchange="this.form.submit()" name="num_pgfs" type="text" 			title="Número " value="<? echo $row_plan_auditoria['num_pgfs'];?>"  />


   </th>
    <th colspan="1" >
  <input placeholder="escribe aquí"  class="form-control" onchange="this.form.submit()" name="num_pamfa" type="text" 			title="Número " value="<? echo $row_plan_auditoria['num_pamfa'];?>"  />


   </th>
   
   </tr>
   <tr>
   <th colspan="1" >
  Número GlobalGG. A.P.

   </th>
   <th colspan="1" >
  Número CoC

   </th>
   </tr>
   <tr>
   <th colspan="1" >
  <input placeholder="escribe aquí"  class="form-control" onchange="this.form.submit()" name="num_globalgg" type="text" 			title="Número " value="<? echo $row_plan_auditoria['num_globalgg'];?>"  />


   </th>
    <th colspan="1" >
  <input placeholder="escribe aquí"  class="form-control" onchange="this.form.submit()" name="num_coc" type="text" 			title="Número " value="<? echo $row_plan_auditoria['num_coc'];?>"  />


   </th>
   
   </tr></tbody></table>
   </div>
   <br />
   <div class="col-lg-12 col-md-12">
    	<table width="100%"><tbody>
   <tr>
    <th colspan="2" >
 Objetivo:
   </th>
   
   <th colspan="2" >
 <input placeholder="escribe aquí"  class="form-control" onchange="this.form.submit()" name="objetivo"  			title="Objetivo " value="<? echo $row_plan_auditoria['objetivo'];?>"  />
   </th>
   
    </tr>
    <tr>
    <th colspan="2" >
 Alcance:
   </th>
   <? ?>
   <th colspan="2" >
 <input placeholder="escribe aquí"  class="form-control" onchange="this.form.submit()" name="alcance"  			title="Alcance " value="<? echo $row_alcance['descripcion'];?>"  />
   </th>
   </tr>
   <tr>
    <th colspan="2" >
 Criterios de evaluación:
   </th>
   <? ?>
   <th colspan="2" >
 <input placeholder="escribe aquí"  class="form-control" onchange="this.form.submit()" name="criterio"  			title="Evaluación " value="<? echo $row_plan_auditoria['criterio'];?>"  />
   </th>
   </tr>
   <th colspan="2" >
 Idioma en que se realizará la auditoria y a utilizar para el informe:
   </th>
   <? ?>
   <th colspan="1" >
 <input placeholder="escribe aquí"  class="form-control" onchange="this.form.submit()" name="idioma_aud"  type="text" 			title="Idioma " value="<? echo $row_solicitud['idioma_aud'];?>"  />
   </th>
   <th colspan="1" >
 <input placeholder="escribe aquí"  class="form-control" onchange="this.form.submit()" name="idioma_inf" type="text"  			title="Idioma " value="<? echo $row_solicitud['idioma_inf'];?>"  />
   </th>
   </tr></tbody></table>
   </div> 
   
 
 <input type="hidden" name="idsolicitud" value="<? echo $row_solicitud['idsolicitud']; ?>" />
 <input type="hidden" name="idsolicitud_esquema" value="<? echo $row_solicitud_esq['idsolicitud_esquema']; ?>" />

  <input type="hidden" name="seccion" value="5" />
      </form>
    
    </fieldset>
   
	