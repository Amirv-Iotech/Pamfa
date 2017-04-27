<fieldset>
  <div class="row" id="seccion5" style="background-color: #ecfbe7; border:solid 2px #dbf573e6">
      <form method="post" action="">
        <div class="col-lg-12 col-xs-12">
            <div class="col-lg-12 col-xs-12" style="background-color: #dbf573e6; padding: 0px;">
            <h3>Datos de la auditoria</h3>
            </div>
            <div class="col-xs-12 col-lg-12" style="padding: 0px;">
                <div class="col-lg-6 col-xs-6" style="border:solid 2px #dbf573e6">
                    <div class="col-xs-12">
                      <label>Tipo de Auditoria</label>
                    </div>
                    <div class="col-xs-6">
                        <label><input type="checkbox" <? if ($row_plan_auditoria['tipo']==1){?> checked="checked"<? }?>  value="1" id="tipo1" name="tipo1">Certificación</label>
                    </div>
                    <div class="col-xs-6">
                        <label><input type="checkbox" <? if ($row_plan_auditoria['tipo']==2){?> checked="checked"<? }?>  value="1" id="tipo1" name="tipo2">Re-certificación</label>
                    </div>
                    <div class="col-xs-6">
                        <label><input type="checkbox" <? if ($row_plan_auditoria['tipo']==1){?> checked="checked"<? }?>  value="1" id="tipo1" name="tipo3">Vigilancia(No anunciada)</label>
                    </div>
                    <div class="col-xs-6">
                        <label><input type="checkbox" <? if ($row_plan_auditoria['tipo']==1){?> checked="checked"<? }?>  value="1" id="tipo1" name="tipo5">Extraordinaria</label>
                    </div>
                    <div class="col-xs-12">
                        <label>Evaluaciones de cambio de alcances</label>
                    </div>
                    <div class="col-xs-6">
                        <label><input type="checkbox" <? if ($row_plan_auditoria['tipo']==1){?> checked="checked"<? }?>  value="1"  id="tipo6" name="tipo6">Ampliacion</label>
                    </div>
                    <div class="col-xs-6">
                        <label><input type="checkbox" <? if ($row_plan_auditoria['tipo']==1){?> checked="checked"<? }?>  value="1"  id="tipo6" name="tipo6">Reducción</label>
                    </div>
                    <div class="col-lg-6 col-xs-6">
                        <label style="height: 38px;">Nombre del Rancho / Invernadero</label>
                          <input placeholder="escribe aquí"  class="plan_input" id="rancho_invernadero" onchange="this.form.submit()" name="rancho_invernadero" type="text"       title="Número " value="<? echo $row_plan_auditoria['rancho_invernadero'];?>"  />
                    </div>
                    <div class="col-lg-6 col-xs-6">
                        <label style="height: 38px;">Superficie</label>
                         <input placeholder="escribe aquí"  class="plan_input" onchange="this.form.submit()" id="superficie" name="superficie" type="number" step="any"       title="Número " value="<? echo $row_plan_auditoria['superficie'];?>"  />
                    </div>
                    <div class="col-lg-12 col-xs-6">
                      <label>Producto</label>
                      <input placeholder="escribe aquí"  class="plan_input" onchange="this.form.submit()" id="producto_proce" name="producto_proce" type="text"       title="Número " value="<? echo $row_plan_auditoria['producto_proce'];?>"  />
                    </div>
                    <div class="col-lg-12 col-xs-6">
                      <label> Nombre del centro de manipulación/cuarto frio/empacadora/procesadora</label>
                      <input placeholder="escribe aquí"  class="plan_input" onchange="this.form.submit()" id="manip" name="manip"       title="Número " value="<? echo $row_plan_auditoria['manip'];?>"  />
                    </div>

                </div>

                    <div class="col-lg-6 col-xs-6" style="border:solid 0px #dbf573e6">
                      <div class="col-xs-12">
                        <label>Esquema de Certificación</label>
                      </div>
                      <div class="col-xs-6">
                        <label><input onchange="this.form.submit()"  type="checkbox" <? if ($row_solicitud_esq['esq_tipo1_op1']!=NULL){?> checked="checked"<? }?>  value="1" id="esq1" name="esq1">GLOBALG A.P. IFA</label>
                      </div>
                      <div class="col-xs-6">
                           <label><input onchange="this.form.submit()"  type="checkbox" <? if ($row_solicitud_esq['esq_tipo2_op1']!=NULL){?> checked="checked"<? }?>  value="1" id="esq1" name="esq1">GLOBALG A.P. Cadena de Custodia</label>
                      </div>
                      <div class="col-xs-6">
                          <label><input onchange="this.form.submit()"  type="checkbox" <? if ($row_solicitud['idprimus']!=NULL){?> checked="checked"<? }?>  value="1" id="esq1" name="esq1">PrimusGFS</label>
                      </div>
                      <div class="col-xs-6">
                          <label><input onchange="this.form.submit()"  type="checkbox" <? if ($row_solicitud['idmex_pliego']!=NULL){?> checked="checked"<? }?>  value="1" id="esq1" name="esq1">Pliego de condiciones México Calidad Suprema</label>
                      </div>
                      <div class="col-xs-12">
                          <label><input onchange="this.form.submit()"  type="checkbox" <? if ($row_solicitud['idsrrc']!=NULL){?> checked="checked"<? }?>  value="1" id="esq1" name="esq1">Sistema  Reduccion de Riesgos de contaminación</label>
                      </div>
                        <hr class="col-lg-12">
                    <div class="col-lg-6 col-xs-6">
                        <label>Número PGFS</label>
                      <input placeholder="escribe aquí"  class="plan_input" onchange="this.form.submit()" id="num_pgfs" name="num_pgfs" type="text"       title="Número " value="<? echo $row_plan_auditoria['num_pgfs'];?>"  />
                    </div>
                    <div class="col-lg-6 col-xs-6">
                        <label>  N°. PAMFA(PC.MC/MEXICO G.A.P/SRRC)</label>
                          <input placeholder="escribe aquí"  class="plan_input" onchange="this.form.submit()" id="num_pamfa" name="num_pamfa" type="text"      title="Número " value="<? echo $row_plan_auditoria['num_pamfa'];?>"  />
                    </div>
                    <div class="col-lg-6 col-xs-6">
                    <label>  Número GlobalGG. A.P.</label>
                      <input placeholder="escribe aquí"  class="plan_input" onchange="this.form.submit()" id="num_globalgg" name="num_globalgg" type="text"       title="Número " value="<? echo $row_plan_auditoria['num_globalgg'];?>"  />
                    </div>
                    <div class="col-lg-6 col-xs-6">
                      <label>Número CoC</label>
                      <input placeholder="escribe aquí"  class="plan_input" onchange="this.form.submit()" id="num_coc" name="num_coc" type="text"      title="Número " value="<? echo $row_plan_auditoria['num_coc'];?>"  />
                    </div>
                  </div>
                  <div class="col-lg-12 col-xs-12 " style="border:solid 2px #dbf573e6">
                    <div class="col-lg-6 col-xs-6">
                      <label>Producto(s):</label>
                       <input placeholder="escribe aquí"  class="plan_input" id="produtos" name="produtos" title="productos " value=""/>
                    </div>
                    <div class="col-lg-6 col-xs-6">
                      <label>Otro (Especifique)</label>
                       <input placeholder="escribe aquí"  class="plan_input" onchange="this.form.submit()" id="otro" name="otro"        title="Otro " value="<? echo $row_plan_auditoria['otro'];?>"  />
                    </div>
                    <div class="col-lg-6 col-xs-6">
                      <label>Objetivo</label>
                       <input placeholder="escribe aquí"  class="plan_input" onchange="this.form.submit()" id="objetivo" name="objetivo"        title="Objetivo " value="<? echo $row_plan_auditoria['objetivo'];?>"  />
                    </div>
                    <div class="col-lg-6 col-xs-6">
                      <label>Alcance</label>
                       <input placeholder="escribe aquí"  class="plan_input" onchange="this.form.submit()" id="alcance" name="alcance"       title="Alcance " value="<? echo $row_alcance['descripcion'];?>"  />
                    </div>
                    <div class="col-lg-6 col-xs-6">
                        <label>Criterios de Evaluación </label>
                         <input placeholder="escribe aquí"  class="plan_input" onchange="this.form.submit()" id="criterio" name="criterio"        title="Evaluación " value="<? echo $row_plan_auditoria['criterio'];?>"  />
                    </div>
                    <div class="col-lg-6 col-xs-6">
                        <label class="col-lg-12 col-xs-12">Idioma en que se realizará la auditoria y a utilizar para el informe:</label>
                        <div class="col-lg-6 col-xs-6">
                         <input placeholder="Auditoria"  class="plan_input" onchange="this.form.submit()" id="idioma_aud" name="idioma_aud"  type="text" title="Idioma " value="<? echo $row_solicitud['idioma_aud'];?>"  />
                        </div>
                        <div class="col-lg-6 col-xs-6">
                         <input placeholder="informe"  class="plan_input" onchange="this.form.submit()" id="idioma_inf" name="idioma_inf" type="text" title="Idioma " value="<? echo $row_solicitud['idioma_inf'];?>"  />
                        </div>
                        <input type="hidden" name="idsolicitud" id="idsolicitud" value="<? echo $row_solicitud['idsolicitud']; ?>" />
                        <input type="hidden" name="idsolicitud_esquema" id="idsolicitud_esquema" value="<? echo $row_solicitud_esq['idsolicitud_esquema']; ?>" />
                        <input type="hidden" name="seccion" id="seccion" value="5" />
                    </div>
                  </div>
            </div>
        </div>

      </form>
  </div>
</fieldset>
<!--  
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
 <input placeholder="escribe aquí"  class="form-control" onchange="this.form.submit()" name="idioma_inf" type="text"        title="Idioma " value="<? echo $row_solicitud['idioma_inf'];?>"  />
   </tr></tbody></table>
   </div> 
   
 
 <input type="hidden" name="idsolicitud" value="<? echo $row_solicitud['idsolicitud']; ?>" />
 <input type="hidden" name="idsolicitud_esquema" value="<? echo $row_solicitud_esq['idsolicitud_esquema']; ?>" />

  <input type="hidden" name="seccion" value="5" />
      </form>
    
    </fieldset>
   
	-->