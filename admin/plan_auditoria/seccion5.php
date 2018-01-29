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
                        <label><input type="radio" <? if ($row_plan_auditoria['tipo']==1){?> checked="checked"<? }?>  value="1" id="tipo1" name="tipo1">Certificación</label>
                    </div>
                    <div class="col-xs-6">
                        <label><input type="radio" <? if ($row_plan_auditoria['tipo']==2){?> checked="checked"<? }?>  value="2" id="tipo1" name="tipo1">Re-certificación</label>
                    </div>
                    <div class="col-xs-6">
                        <label><input type="radio" <? if ($row_plan_auditoria['tipo']==3){?> checked="checked"<? }?>  value="3" id="tipo1" name="tipo1">Vigilancia(No anunciada)</label>
                    </div>
                    <div class="col-xs-6">
                        <label><input type="radio" <? if ($row_plan_auditoria['tipo']==4){?> checked="checked"<? }?>  value="4" id="tipo1" name="tipo1">Extraordinaria</label>
                    </div>
                    <div class="col-xs-12">
                        <label>Evaluaciones de cambio de alcances</label>
                    </div>
                    <div class="col-xs-6">
                        <label><input type="radio" <? if ($row_plan_auditoria['tipo']==5){?> checked="checked"<? }?>  value="6"  id="tipo1" name="tipo1">Ampliacion</label>
                    </div>
                    <div class="col-xs-6">
                        <label><input type="radio" <? if ($row_plan_auditoria['tipo']==6){?> checked="checked"<? }?>  value="6"  id="tipo1" name="tipo1">Reducción</label>
                    </div>
                    <div class="col-lg-6 col-xs-6">
                        <label style="height: 38px;">Nombre del Rancho / Invernadero</label>
                          <input placeholder="escribe aquí"  class="plan_input" id="rancho_invernadero"  name="rancho_invernadero" type="text"       title="Número " value="<? echo $row_plan_auditoria['rancho_invernadero'];?>"  />
                    </div>
                    <div class="col-lg-6 col-xs-6">
                        <label style="height: 38px;">Superficie</label>
                         <input placeholder="escribe aquí"  class="plan_input"  id="superficie" name="superficie" type="number" step="any"       title="Número " value="<? echo $row_plan_auditoria['superficie'];?>"  />
                    </div>
                    <div class="col-lg-12 col-xs-6">
                      <label>Producto</label>
                      <input placeholder="escribe aquí"  class="plan_input"  id="producto_proce" name="producto_proce" type="text"       title="Número " value="<? echo $row_plan_auditoria['producto_proce'];?>"  />
                    </div>
                    <div class="col-lg-12 col-xs-6">
                      <label> Nombre del centro de manipulación/cuarto frio/empacadora/procesadora</label>
                      <input placeholder="escribe aquí"  class="plan_input"  id="manip" name="manip"       title="Número " value="<? echo $row_plan_auditoria['manip'];?>"  />
                    </div>

                </div>

                    <div class="col-lg-6 col-xs-6" style="border:solid 0px #dbf573e6">
                      <div class="col-xs-12">
                        <label>Esquema de Certificación</label>
                      </div>
                      <div class="col-xs-6">
                        <label><input disabled   type="checkbox" <? if ($row_solicitud_esq['esq_tipo1_op1']!=NULL){?> checked="checked"<? }?>  value="1" id="esq1" name="esq1">GLOBALG A.P. IFA</label>
                      </div>
                      <div class="col-xs-6">
                           <label><input disabled  type="checkbox" <? if ($row_solicitud_esq['esq_tipo2_op1']!=NULL){?> checked="checked"<? }?>  value="1" id="esq1" name="esq1">GLOBALG A.P. Cadena de Custodia</label>
                      </div>
                      <div class="col-xs-6">
                          <label><input disabled  type="checkbox" <? if ($row_solicitud['idprimus']!=NULL){?> checked="checked"<? }?>  value="1" id="esq1" name="esq1">PrimusGFS</label>
                      </div>
                      <div class="col-xs-6">
                          <label><input  disabled type="checkbox" <? if ($row_solicitud['idmex_pliego']!=NULL){?> checked="checked"<? }?>  value="1" id="esq1" name="esq1">Pliego de condiciones México Calidad Suprema</label>
                      </div>
                      <div class="col-xs-12">
                          <label><input  disabled type="checkbox" <? if ($row_solicitud['idsrrc']!=NULL){?> checked="checked"<? }?>  value="1" id="esq1" name="esq1">Sistema  Reduccion de Riesgos de contaminación</label>
                      </div>
                        <hr class="col-lg-12">
                    <div class="col-lg-6 col-xs-6">
                        <label>Número PGFS</label>
                      <input placeholder="escribe aquí"  class="plan_input"  id="num_pgfs" name="num_pgfs" type="text"       title="Número " value="<? echo $row_plan_auditoria['num_pgfs'];?>"  />
                    </div>
                    <div class="col-lg-6 col-xs-6">
                        <label>  N°. PAMFA(PC.MC/MEXICO G.A.P/SRRC)</label>
                          <input placeholder="escribe aquí"  class="plan_input"  id="num_pamfa" name="num_pamfa" type="text"      title="Número " value="<? echo $row_plan_auditoria['num_pamfa'];?>"  />
                    </div>
                    <div class="col-lg-6 col-xs-6">
                    <label>  Número GlobalGG. A.P.</label>
                      <input placeholder="escribe aquí"  class="plan_input"  id="num_globalgg" name="num_globalgg" type="text"       title="Número " value="<? echo $row_plan_auditoria['num_globalgg'];?>"  />
                    </div>
                    <div class="col-lg-6 col-xs-6">
                      <label>Número CoC</label>
                      <input placeholder="escribe aquí"  class="plan_input"  id="num_coc" name="num_coc" type="text"      title="Número " value="<? echo $row_plan_auditoria['num_coc'];?>"  />
                    </div>
                  </div>
                  <div class="col-lg-12 col-xs-12 " style="border:solid 2px #dbf573e6">
                    <div class="col-lg-6 col-xs-6">
                      <label>Producto(s):</label>
                       
                       
                        <input placeholder="escribe aquí"  class="plan_input" id="prod" name="prod" title="productos " value="<? echo $row_plan_auditoria['productos'];?>"  />
                    </div>
                    <div class="col-lg-6 col-xs-6">
                      <label>Otro (Especifique)</label>
                       <input placeholder="escribe aquí"  class="plan_input"  id="otro" name="otro"        title="Otro " value="<? echo $row_plan_auditoria['otro'];?>"  />
                    </div>
                    <div class="col-lg-6 col-xs-6">
                      <label>Objetivo</label>
                       <input placeholder="escribe aquí"  class="plan_input"  id="objetivo" name="objetivo"        title="Objetivo " value="<? echo $row_plan_auditoria['objetivo'];?>"  />
                    </div>
                    <div class="col-lg-6 col-xs-6">
                      <label>Alcance</label>
                       <input   class="plan_input"  id="alcance" name="alcance"       title="Alcance " value="<? echo$row_plan_auditoria['alcance'];?>"  />
                    </div>
                    <div class="col-lg-6 col-xs-6">
                        <label>Criterios de Evaluación </label>
                         <input placeholder="escribe aquí"  class="plan_input"  id="criterio" name="criterio"     title="Evaluación " value="<? echo $row_plan_auditoria['criterio'];?>"  />
                    </div>
                    <div class="col-lg-6 col-xs-6">
                        <label class="col-lg-12 col-xs-12">Idioma en que se realizará la auditoria y a utilizar para el informe:</label>
                        <div class="col-lg-6 col-xs-6">
                         <input disabled  class="plan_input"  id="idioma_aud" name="idioma_aud"  type="text" title="Idioma " value="<? echo $row_solicitud['idioma_aud'];?>"  />
                        </div>
                        <div class="col-lg-6 col-xs-6">
                         <input disabled class="plan_input"  id="idioma_inf" name="idioma_inf" type="text" title="Idioma " value="<? echo $row_solicitud['idioma_inf'];?>"  />
                        </div>
                       
                        <input type="hidden" name="idsolicitud_esquema" id="idsolicitud_esquema" value="<? echo $row_solicitud_esq['idsolicitud_esquema']; ?>" />
                        <input type="hidden" name="seccion" id="seccion" value="5" />
                    </div>
                  </div>
            </div>
        </div>
 <input id="idsolicitud" type="hidden" name="idsolicitud" value="<? echo $_POST['idsolicitud']; ?>" /> 
      </form>
      <input type="hidden" name="idplan_auditoria" id="idplan_auditoria" value="<? echo $row_plan_auditoria['idplan_auditoria']; ?>" />
  </div>
</fieldset>
