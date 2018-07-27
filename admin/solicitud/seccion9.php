<fieldset>
</br>
<?
$sel1=0;
$query_solp1 = sprintf("SELECT * FROM solicitud_primus where idsolicitud='".$row_solicitud['idsolicitud']."'");
                $solp1 = mysql_query($query_solp1, $inforgan_pamfa) or die(mysql_error());
				 while($row_solp1= mysql_fetch_assoc($solp1))
                {
					if($row_solp1['idprimus']==3|| $row_solp1['idprimus']==4){
					$sel1=$sel1+1;
					}
						
				}
				
$query_solp1 = sprintf("SELECT * FROM solicitud_mexcalsup where idsolicitud='".$row_solicitud['idsolicitud']."'");
                $solp1 = mysql_query($query_solp1, $inforgan_pamfa) or die(mysql_error());
				 while($row_solp1= mysql_fetch_assoc($solp1))
                {
					if($row_solp1['idmex_alcance']==3){
					$sel1=$sel1+1;
					}
					
						
				}
				$query_solp1 = sprintf("SELECT * FROM solicitud_srrc where idsolicitud='".$row_solicitud['idsolicitud']."'");
                $solp1 = mysql_query($query_solp1, $inforgan_pamfa) or die(mysql_error());
				 while($row_solp1= mysql_fetch_assoc($solp1))
                {
					if($row_solp1['idsrrc']!=NULL && $row_solp1['idsrrc']!=3){
					$sel1=$sel1+1;
					}
						
				}
				
?>
  <div class="row" id="seccion9" <? if ($sel1<1){?> style="display:none" <? }else {?> style="display:block"<? } ?>>
  <div class="col-lg-12 col-xs-12">
    <div class="col-lg-12 col-xs-12 campos2" style="background-color: #ecfbe7; border: solid 1px #AAAAAA; border-bottom-width:2px;">
      <div class="col-lg-12 col-xs-12 campos2" style="text-align: center;background-color: #dbf573e6; border: solid 1px #AAAAAA; margin-right: 0px; margin-left: 0px;">
          <h3><b>Información de los cultivos</b></h3>
      </div>
     
      <div class="col-lg-12 col-xs-12 campos2">
        <div class="col-lg-12 col-xs-12 campos2">
            <div class="col-lg-2 col-xs-2 campos2" style=" padding: 0px 0px; border:solid 1px #AAAAAA; min-height: 124px;">
               <label>Producto y variedad:</label>
              <div class="campos2 div4">
                  <input class="form-control inputsf" id="producto" name="producto" placeholder=""type="text"  />
              </div>
            </div>
            <div class="col-lg-2 col-xs-2 campos2" style=" padding: 0px 0px; border:solid 1px #AAAAAA; min-height: 124px;">
              <label>N° de productores:</label>
              <div class="campos2 div4">
              <input  class="form-control inputsf" id="num_productores" name="num_productores" placeholder="" type="number"  />
              </div>
            </div>
            <div class="col-lg-2 col-xs-2 campos2" style=" padding: 0px 0px; border:solid 1px #AAAAAA; min-height: 124px;">
             <label>N° de fincas/PMUs:</label>
             <div class="campos2 div4">
              <input class="form-control inputsf"  id="num_fincas" name="num_fincas" type="number"  placeholder=""/>
              </div>
            </div>
            <div class="col-lg-2 col-xs-2 campos2" style=" padding: 0px 0px; border:solid 1px #AAAAAA; min-height: 124px;">
              <label>Ubucación de cultivos:</label>
              <div class=" campos2 div4">
              <input  class="form-control inputsf" id="ubicacion_unidad" name="ubicacion_unidad" placeholder="" type="text"  />
              </div>
            </div>
            <div class="col-lg-2 col-xs-2 campos2" style=" padding: 0px 0px; border:solid 1px #AAAAAA; min-height: 124px;">
              <label>Coodernadas de las unidades:</label>
              <div class="campos2 div4">
              <input  class="form-control inputsf" id="coordenadas" name="coordenadas" placeholder="" type="text"  />
              </div>
            </div>
            <div class="col-lg-2 col-xs-2 campos2" style=" padding: 0px 0px; border:solid 1px #AAAAAA; min-height: 124px;">
              <label>Periodo de cosecha:</label>
              <div class="campos2 div4">
              <input  class="form-control inputsf" id="periodo_cosecha" name="periodo_cosecha" placeholder="" type="text"  />
              </div>
            </div>
        </div>
        <div class="col-lg-12 col-xs-12 campos2">
            <div class="col-lg-2 col-xs-2 campos2" style=" padding: 0px 0px; border:solid 1px #AAAAAA; min-height: 124px;">
               <label> Superficie (Has):</label>
               <div class="campos2 div4">
                <input  class="form-control inputsf" id="superficie" name="superficie" placeholder="" type="number" step="any" />
                </div>
            </div>
            <div class="col-lg-2 col-xs-2 campos2" style=" padding: 0px 0px; border:solid 1px #AAAAAA; min-height: 124px;">
                <label>Aire libre- cubierto:</label>
                <div class="campos2 div4">
                <select class="form-control" id="libre_cubierto"  name="libre_cubierto" title="Selecciona">
                 
                  <option value="1">Aire libre</option>
                  <option value="2">Cubierto</option>
                </select>
                </div>
            </div>
            <div class="col-lg-2 col-xs-2 campos2" style=" padding: 0px 0px; border:solid 1px #AAAAAA; min-height: 124px;">
                <label>Cosecha/ Recolección :</label>
                <div class="campos2 div4">
                <select class="form-control"  id="cosecha_recoleccion"name="cosecha_recoleccion" title="Selecciona" >
               
                <option value="1">Si</option>
                <option value="2">No</option>
                </select>
                </div>
            </div>
            <div class="col-lg-2 col-xs-2 campos2" style=" padding: 0px 0px; border:solid 1px #AAAAAA; min-height: 124px;">
                <label>Empaque/ Manipulación :</label>
                <div class="campos2 div4">
                <select class="form-control"  id="empaque" name="empaque" title="Selecciona">
              
                <option value="1">Si</option>
                <option value="2">No</option>
                </select>
                </div>
            </div>
            <div class="col-lg-2 col-xs-2 campos2" style=" padding: 0px 0px; border:solid 1px #AAAAAA; min-height: 124px;">
                <label>Numero de trabajadores:</label>
                <div class="campos2 div4">
                <input class="form-control"  id="num_trabajadores" name="num_trabajadores" type="number"  placeholder=""/>
                </div>
            </div>
            <div class="col-lg-2 col-xs-2 campos2" style=" padding: 0px 0px; border:solid 1px #AAAAAA; min-height: 124px; ">
                <input type="hidden" id="idsolicitud" name="idsolicitud" value="<? echo $row_solicitud['idsolicitud']; ?>" />
                <input type="hidden"  id="insertar_prod" name="insertar_prod" value="1" />
                <input type="hidden" id="seccion" name="seccion" value="1" />
                 
               
                <input type="hidden" id="idoperador" name="idoperador" value="<? echo $row_operador['idoperador']; ?>" />
                <div class=" col-xs-12 campos2" style="position: absolute; bottom: 35%; text-align: center;">
                <input type="button" value="agregar" name="agregar20" id="agregar20"  />
                </div>
            </div>
        </div>
      </div>
    
    </div>


<!-- TABLA ======= TABLA=====-->
<div class="col-lg-12 col-xs-12" style="background-color: #ecfbe7; border: solid 1px #AAAAAA; border-bottom-width:2px;" id="tabla_ajax" >

          <?php

           include('tabla.php');?>
          </div>

    </div><!-- tabla -->
          
  </div><!--row-->
</fieldset>