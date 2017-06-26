<fieldset>
</br>

  <div class="row" id="observaciones" style="display:none" >
  <div class="col-lg-12 col-xs-12">
    <div class="col-lg-12 col-xs-12 campos2" style="background-color: #ecfbe7; border: solid 1px #AAAAAA; border-bottom-width:2px;">
      <div class="col-lg-12 col-xs-12 campos2" style="text-align: center;background-color: #dbf573e6; border: solid 1px #AAAAAA; margin-right: 0px; margin-left: 0px;">
          <h3><b>Observaciones para esta solicitud</b></h3>
      </div>
    
      <div class="col-lg-12 col-xs-12 campos2">
       
        <div class="col-lg-12 col-xs-12 campos2 ">
        
         
            <div class="col-lg-4 col-xs-4 campos2" style=" padding: 0px 0px; border:solid 1px #AAAAAA; min-height: 124px;">
              <label>Observación:<? echo $_SESSION["idusuario"]; ?>"</label>
              <div class="campos2 div4">
              <input  class="form-control inputsf" id="observacion" name="observacion" placeholder="" type="text"  />
              </div>
            </div>
            <div class="col-lg-4 col-xs-4 campos2" style=" padding: 0px 0px; border:solid 1px #AAAAAA; min-height: 124px;">
             <label>Seccion de la solicitud:</label>
             <div class="campos2 div4">
               <select class="form-control"  id="seccion_sol" name="seccion_sol"  >
                <option value="-">Seleciona</option>
                <option value="1" >Seccion 1</option>
                <option value="2"  >Seccion 2</option>
                <option value="3" >Seccion 3</option>
                <option value="4"  >Seccion 4</option>
                <option value="5" >Seccion 5</option>
                <option value="6"  >Seccion 6</option>
                <option value="7"  >Seccion 7</option>
                <option value="8"  >Seccion 8</option>
                <option value="9" >Seccion 9</option>
                <option value="10"  >Seccion 10</option>
                <option value="11" >Seccion 11</option>
                <option value="12" >Seccion 12</option>
                <option value="13" >Seccion 13</option>
                  <option value="14" >Seccion 14</option>
                <option value="15" >Seccion 15</option>
                
                </select> </div>
            </div>
            </div>
             <div class="col-lg-12 col-xs-12 campos2">
            <div class="col-lg-4 col-xs-4 campos2" style=" padding: 0px 0px; border:solid 1px #AAAAAA; min-height: 124px;">
               <label>Fecha:</label>
              <div class="campos2 div4">
              <input  class="form-control inputsf" id="fecha_obs" name="fecha_obs"  type="date"  />
              </div>
            </div>
            <div cla
            <div class="col-lg-4 col-xs-4 campos2" style=" padding: 0px 0px; border:solid 1px #AAAAAA; min-height: 124px;">
              <label>Estado:</label>
              <div class="campos2 div4">
              <select class="form-control"  id="estado" name="estado"  >
                <option value="-">Seleciona</option>
                <option value="1" >Pendiente</option>
                <option value="2"  >Atendida</option>
                
                
                </select> </div>
            </div>
        
            <div class="col-lg-4 col-xs-4 campos2" style=" padding: 0px 0px; border:solid 1px #AAAAAA; min-height: 124px; ">
                <input type="hidden" id="idsolicitud" name="idsolicitud" value="<? echo $row_solicitud['idsolicitud']; ?>" />
                 <input type="hidden" id="idusuario" name="idusuario" value="<? echo $_SESSION["idusuario"];?>" />
                <input type="hidden"  id="insertar_solicitud_obs" name="insertar_solicitud_obs" value="1" />
                <input type="hidden" id="seccion" name="seccion" value="1" />
               
                <input type="hidden" id="idoperador" name="idoperador" value="<? echo $row_operador['idoperador']; ?>" />
                <div class=" col-xs-12 campos2" style="position: absolute; bottom: 35%; text-align: center;">
                <input type="button" value="agregar" name="agregar" id="agregar3" 
                                </div>
            </div>
        </div>
      </div>
    
    </div>
 

<!-- TABLA ======= TABLA=====-->
<div class="col-lg-12 col-xs-12" style="background-color: #ecfbe7; border: solid 1px #AAAAAA; border-bottom-width:2px;" id="tabla_ajax4" >

          <?php

           include('tabla_observaciones.php');?>
          </div>

    </div><!-- tabla -->
          
  </div><!--row-->
</fieldset>