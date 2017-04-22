
  
    <fieldset>
    <legend>Sección 5</legend>
     <a name="seccion5">
     <table width="100%"><tbody><tr><th  bgcolor="#00CC33">
    <h3>Favor de seleccionar el esquema de certificación que usted esta solicitando:</h3>
    
   </th></tr></tbody></table>
   <br /><br />
      <div class="  col-lg-12 col-md-12">
      <div class=" col-lg-4 col-md-4">
      </div>
       <div class=" col-lg-4 col-md-4">
       <table width="100%"><tbody><tr><th  bgcolor="#00CC33">
 <strong>GLOBALG.A.P. IFA V5.0:</strong>
    
   </th></tr></tbody></table>
      </div>
       <div class=" col-lg-4 col-md-4">
      </div>
     <form method="post" action="#seccion5">
      <div class=" col-lg-12 col-md-12">
    <div class=" col-lg-6 col-md-6">
       <table width="100%"><tbody><tr><th  bgcolor="#00CC33">
   Opcion 1- Productor:
    
   </th></tr></tbody></table>
        </div>
         <div class=" col-lg-6 col-md-6">
       <table width="100%"><tbody><tr><th  bgcolor="#00CC33">
 Opcion 2- Grupo de Productores:
    
   </th></tr></tbody></table>
         
         
         </div>
         </div>
          
          <? $query_esquema = sprintf("SELECT * FROM esquemas where tipo=1 order by tipo,opcion asc");
$esquema = mysql_query($query_esquema, $inforgan_pamfa) or die(mysql_error());
while($row_esquema= mysql_fetch_assoc($esquema))
{?><div class="form-group col-lg-2 col-md-2"><?
  if($row_esquema['opcion']==1)
  {?>

<<<<<<< HEAD:clientes/solicitud/seccion5.php
      </div>        
=======
    
      
  <label><input onchange="this.form.submit()"  type="radio" <? if ($row_solicitud_esq['esq_tipo1_op1']==$row_esquema['idesquema']){?> checked="checked"<? }?>  value="<? echo $row_esquema['idesquema'];?>" name="esq_tipo1_op1"><? echo $row_esquema['esquema'];?></label>
>>>>>>> parent of fb2e8ed... Cambios del malpika:clientes/solicitud/seccion52.php

  
    <? }?></div><?
    }?>
      
     <div class="form-group col-lg-2 col-md-2">
      <label for="preg1_op2" class="form-label col-lg-8">Número de productores a certificar:</label>
      <div class="col-lg-4">
    <input placeholder="escribe aquí" class="form-control" onchange="this.form.submit()" name="preg1_op2" type="text"       title="Número " value="<? echo $row_solicitud_esq['preg1_op2'];?>" />
     </div></div>
      <div class=" form-group col-lg-2 col-md-2">
      <label  for="preg2_op2" class="form-label col-lg-8">Número de unidades de producción a certifcar:</label>
      <div class="col-lg-4">
    <input placeholder="escribe aquí"  class="form-control" onchange="this.form.submit()" name="preg2_op2" type="text"      title="Número " value="<? echo $row_solicitud_esq['preg2_op2'];?>"  />
     </div></div>
      <div class="form-group col-lg-2 col-md-2">
      <label for="preg3_op2" class="form-label col-lg-8">Número de unidades de maniupalación de productos a certificar:</label>
      <div class="col-lg-4">
    <input placeholder="escribe aquí" class="form-control" onchange="this.form.submit()" name="preg3_op2" type="text"       title="Número " value="<? echo $row_solicitud_esq['preg3_op2'];?>"  />
     </div></div>
       <div class="form-group col-lg-12 col-md-12">
     <div class="col-lg-6 col-md-6">
     <table><tbody><tr><th>
      <label for="preg1_tipo2" >Número total de unidades de produccion: Ranchos, huertos o invernaderos</label>
      </th>
        <th>
        </th>
        <th>
        
        <label for="preg2_tipo2" >Número de unidades de producción a certifcar:</label>
        </th></tr><tr><th>
    <input placeholder="escribe aquí" class="form-control" onchange="this.form.submit()" name="preg1_tipo2" type="text"       title="Número " value="<? echo $row_solicitud_esq['preg1_tipo2'];?>" />
     </th>
     <th>
     </th>
     <th>
     
      
      
    <input placeholder="escribe aquí"  class="form-control" onchange="this.form.submit()" name="preg2_tipo2" type="text"      title="Número " value="<? echo $row_solicitud_esq['preg2_tipo2'];?>"  />
    </th>
    </tr></tbody></table>
    </div>

      <div class="form-group col-lg-6 col-md-6">
       <? $query_esquema = sprintf("SELECT * FROM esquemas where tipo =2 order by tipo,opcion asc");
$esquema = mysql_query($query_esquema, $inforgan_pamfa) or die(mysql_error());
?>
      <table>
      <tr><td><label for="num_unid_prod2" >GLOBALG.A.P. CADENA DE CUSTODIA (CoC):</label></td>
      <tr>
      <?
      while($row_esquema= mysql_fetch_assoc($esquema))
{
  ?>
   
      <td>
      <?
  if($row_esquema['opcion']==1)
  {?>

<<<<<<< HEAD:clientes/solicitud/seccion5.php
            <div class="form-group col-lg-6 col-xs-6 campos2" style="border: solid 1px #AAAAAA; min-height: 102px;">
              <label>Cantidad estimada de producto certificado (Voluntario) en toneladas anual.</label>
              <div class="div4">
                  <input placeholder=""  class="form-control inputsf"  id="preg4_tipo2" name="preg4_tipo2" type="text"       title="Cantidad " value="<? echo $row_solicitud_esq['preg4_tipo2'];?>" />    
              </div>
            </div>
      </div>

    </div><!-- /div unid 2-->
    
    <div class="col-lg-12 col-xs-12 campos2">
      <div class="col-lg-10 col-xs-10 campos2" style="border: solid 1px #AAAAAA; min-height: 26px;">
        <b>Declaración de producción paralela (PP) y propiedad paralela (PO)</b>
      </div>
      <div class="col-lg-1 col-xs-1 campos2" style="border: solid 1px #AAAAAA; height: 26px;">
        <b>Si</b>
      </div>
      <div class="col-lg-1 col-xs-1 campos2" style="border: solid 1px #AAAAAA; height:26px;">
        <b>No</b>
      </div>
    </div>
    <div class="col-lg-12 col-xs-12 campos2">
      <div class="col-lg-10 col-xs-10 campos2" style="border: solid 1px #AAAAAA;min-height: 26px;">
          <label for="preg6" >¿El producto se vende antes de la cosecha?</label>
      </div> 
      <div class="col-lg-1 col-xs-1 campos2" style="border: solid 1px #AAAAAA; height: 26px;">
        <input   <? if ($row_solicitud_esq['preg6']=="Si"){?> checked="checked"<? }?> type="radio" value="Si" id="preg6" name="preg6">
      </div> 
      <div class="col-lg-1 col-xs-1 campos2" style="border: solid 1px #AAAAAA; height: 26px;">
       <input   <? if ($row_solicitud_esq['preg6']=="No"){?> checked="checked"<? }?> type="radio" value="No" id="preg6" name="preg6">
      </div>
    </div>
    <div class="col-lg-12 col-xs-12 campos2">
      <div class="col-lg-10 col-xs-10 campos2" style="border: solid 1px #AAAAAA; min-height: 26px;">
         <label for="preg7" >¿La entidad legal realiza la producción  de ´producto certificado y no certificado, es decir produccion paralela?</label>
      </div> 
      <div class="col-lg-1 col-xs-1 campos2" style="border: solid 1px #AAAAAA; height: 26px;">
        <input   <? if ($row_solicitud_esq['preg7']=="Si"){?> checked="checked"<? }?> type="radio" value="Si" id="preg7" name="preg7">
      </div> 
      <div class="col-lg-1 col-xs-1 campos2" style="border: solid 1px #AAAAAA; height:26px;">
         <input   <? if ($row_solicitud_esq['preg7']=="No"){?> checked="checked"<? }?> type="radio" value="No" id="preg7" name="preg7">
      </div>
    </div>
    <div class="col-lg-12 col-xs-12 campos2">
      <div class="col-lg-10 col-xs-10 campos2" style="border: solid 1px #AAAAAA; min-height:26px;">
        <label for="preg8" >¿La entidad legal que produce el producto, compra el mismo producto a otros proveedores, es decir, propiedad paralela?</label>
      </div> 
      <div class="col-lg-1 col-xs-1 campos2" style="border: solid 1px #AAAAAA; height: 26px;">
         <input   <? if ($row_solicitud_esq['preg8']=="Si"){?> checked="checked"<? }?> type="radio" value="Si" id="preg8" name="preg8">
      </div> 
      <div class="col-lg-1 col-xs-1 campos2" style="border: solid 1px #AAAAAA; height: 26px;">
         <input   <? if ($row_solicitud_esq['preg8']=="No"){?> checked="checked"<? }?> type="radio" value="No" id="preg8" name="preg8">
      </div>
    </div>

      <input type="hidden" id="idsolicitud5" name="idsolicitud" value="<? echo $row_solicitud['idsolicitud']; ?>" />
      <input type="hidden" id="idsolicitud_esquema" name="idsolicitud_esquema" value="<? echo $row_solicitud_esq['idsolicitud_esquema']; ?>" />
      <input type="hidden" id="seccion5" name="seccion5" value="5" />
    </form>
  </div><!-- /row-============  /ROW ====-->
  </fieldset>