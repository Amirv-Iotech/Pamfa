<div class="col-lg-10">

<?php if($mensaje==1){?>
<div class="alert alert-success" role="alert">
  <strong>Correcto!</strong> Datos han sido actualizados correctamente.
</div>
<?php }else if($mensaje==2){?>
<div class="alert alert-danger" role="alert">
  <strong>Error!</strong> No se han actualizado tus datos.
</div>
<?php }?>
<?php if(!$categoria){$categoria='main';}?>
<form method="POST" name="form1" action="<?php echo site_url('operadores/detalle/'.$categoria.'/'.$operador->idoperador);?>">
<input type="hidden" name="categoria" value="<?php echo $categoria;?>">
<h4>Actualización de registro, <?php echo $string_categoria;?></h4>
          <table class="table table-condensed" align="center">
            <!--<tr><td colspan="2"><p>Insertar</p></td></tr>04/03/16-->
            <tr valign="baseline">
              <td nowrap align="right"><p>Operador:</p></td>
              <td><input type="text" class="form-control" name="operador" value="<?php echo $operador->operador;?>" size="32" required autofocus></td>
              <td nowrap align="right"><p>Representante legal:</p></td>
              <td><input type="text" class="form-control" name="representante_legal" value="<?php echo $operador->representante_legal;?>" size="32" ></td>
            </tr>
            <tr valign="baseline">
              <td nowrap align="right"><p>Codigo_operador:</p></td>
              <td><input type="text" class="form-control" name="codigo_operador" value="<?php echo $operador->codigo_operador;?>" size="32" required></td>
              <td nowrap align="right"><p>Tipo_persona:</p></td>
              <td><input type="text" class="form-control" name="tipo_persona" value="<?php echo $operador->tipo_persona;?>" size="32" ></td>
            </tr>
            <tr valign="baseline">
              <td nowrap align="right"><p>Categoria:</p></td>
              <td>
              <select required class="form-control" name="categoria" id="categoria">
                <option value="" <?php if (!(strcmp("", $operador->categoria))) {echo "selected=\"selected\"";} ?>>SIN CATEGORIA !</option>
                <option value="agricola" <?php if (!(strcmp("agricola", $operador->categoria))) {echo "selected=\"selected\"";} ?>>Agricola</option>
                <option value="ganaderia" <?php if (!(strcmp("ganaderia", $operador->categoria))) {echo "selected=\"selected\"";} ?>>Ganaderia</option>
                <option value="procesador" <?php if (!(strcmp("procesador", $operador->categoria))) {echo "selected=\"selected\"";} ?>>Procesador</option>
                <option value="comercializador" <?php if (!(strcmp("comercializador", $operador->categoria))) {echo "selected=\"selected\"";} ?>>Comercializador</option>
              </select>
              </td>
            </tr>
            
            <tr valign="baseline">
              <td nowrap="nowrap" align="right"><p><strong>Producto:</strong></p></td>
              <td><textarea class="form-control" name="producto"><?php echo $operador->producto;?></textarea></td>
              <td nowrap="nowrap" align="right"><p>RFC:</p></td>
              <td><input type="text" class="form-control" name="rfc" value="<?php echo $operador->rfc;?>" size="32" /></td>
            </tr>
            <tr valign="baseline">
              <td nowrap align="right"><p>Calle:</p></td>
              <td><input type="text" class="form-control" name="calle" value="<?php echo $operador->calle;?>" size="32" ></td>
              <td nowrap align="right"><p>Numero_interior:</p></td>
              <td><input type="text" class="form-control" name="numero_interior" value="<?php echo $operador->numero_interior;?>" size="32" ></td>
            </tr>
            <tr valign="baseline">
              <td nowrap align="right"><p>Numero_exterior:</p></td>
              <td><input type="text" class="form-control" name="numero_exterior" value="<?php echo $operador->numero_exterior;?>" size="32" ></td>
              <td nowrap align="right"><p>Colonia:</p></td>
              <td><input type="text" class="form-control" name="colonia" value="<?php echo $operador->colonia;?>" size="32" ></td>
            </tr>
            <tr valign="baseline">
              <td nowrap align="right"><p>Municipio:</p></td>
              <td><input type="text" class="form-control" name="municipio" value="<?php echo $operador->municipio;?>" size="32" ></td>
              <td nowrap align="right"><p>Localidad:</p></td>
              <td><input type="text" class="form-control" name="localidad" value="<?php echo $operador->localidad;?>" size="32" ></td>
            </tr>
            <tr valign="baseline">
              <td nowrap align="right"><p>Entidad_federativa:</p></td>
              <td>
                <select name="entidad_federativa" class="form-control" id="">
                  <option value="" <?php if (!(strcmp("", $operador->entidad_federativa))) {echo "selected=\"selected\"";} ?>>Seleccionar un estado</option>
                  <option value="Aguascalientes" <?php if (!(strcmp("Aguascalientes", $operador->entidad_federativa))) {echo "selected=\"selected\"";} ?>>Aguascalientes</option>
                  <option value="Baja California" <?php if (!(strcmp("Baja California", $operador->entidad_federativa))) {echo "selected=\"selected\"";} ?>>Baja California</option>
                  <option value="Baja California Sur" <?php if (!(strcmp("Baja California Sur", $operador->entidad_federativa))) {echo "selected=\"selected\"";} ?>>Baja California Sur</option>
                  <option value="Campeche" <?php if (!(strcmp("Campeche", $operador->entidad_federativa))) {echo "selected=\"selected\"";} ?>>Campeche</option>
                  <option value="Chiapas" <?php if (!(strcmp("Chiapas", $operador->entidad_federativa))) {echo "selected=\"selected\"";} ?>>Chiapas</option>
                  <option value="Chihuahua" <?php if (!(strcmp("Chihuahua", $operador->entidad_federativa))) {echo "selected=\"selected\"";} ?>>Chihuahua</option>
                  <option value="Coahuila" <?php if (!(strcmp("Coahuila", $operador->entidad_federativa))) {echo "selected=\"selected\"";} ?>>Coahuila</option>
                  <option value="Colima" <?php if (!(strcmp("Colima", $operador->entidad_federativa))) {echo "selected=\"selected\"";} ?>>Colima</option>
                  <option value="Distrito Federal" <?php if (!(strcmp("Distrito Federal", $operador->entidad_federativa))) {echo "selected=\"selected\"";} ?>>Distrito Federal</option>
                  <option value="Durango" <?php if (!(strcmp("Durango", $operador->entidad_federativa))) {echo "selected=\"selected\"";} ?>>Durango</option>
                  <option value="Estado de México" <?php if (!(strcmp("Estado de México", $operador->entidad_federativa))) {echo "selected=\"selected\"";} ?>>Estado de México</option>
                  <option value="Guanajuato" <?php if (!(strcmp("Guanajuato", $operador->entidad_federativa))) {echo "selected=\"selected\"";} ?>>Guanajuato</option>
                  <option value="Guerrero" <?php if (!(strcmp("Guerrero", $operador->entidad_federativa))) {echo "selected=\"selected\"";} ?>>Guerrero</option>
                  <option value="Hidalgo" <?php if (!(strcmp("Hidalgo", $operador->entidad_federativa))) {echo "selected=\"selected\"";} ?>>Hidalgo</option>
                  <option value="Jalisco" <?php if (!(strcmp("Jalisco", $operador->entidad_federativa))) {echo "selected=\"selected\"";} ?>>Jalisco</option>
                  <option value="Michoacán" <?php if (!(strcmp("Michoacán", $operador->entidad_federativa))) {echo "selected=\"selected\"";} ?>>Michoacán</option>
                  <option value="Morelos" <?php if (!(strcmp("Morelos", $operador->entidad_federativa))) {echo "selected=\"selected\"";} ?>>Morelos</option>
                  <option value="Nayarit" <?php if (!(strcmp("Nayarit", $operador->entidad_federativa))) {echo "selected=\"selected\"";} ?>>Nayarit</option>
                  <option value="Nuevo León" <?php if (!(strcmp("Nuevo León", $operador->entidad_federativa))) {echo "selected=\"selected\"";} ?>>Nuevo León</option>
                  <option value="Oaxaca" <?php if (!(strcmp("Oaxaca", $operador->entidad_federativa))) {echo "selected=\"selected\"";} ?>>Oaxaca</option>
                  <option value="Puebla" <?php if (!(strcmp("Puebla", $operador->entidad_federativa))) {echo "selected=\"selected\"";} ?>>Puebla</option>
                  <option value="Querétaro" <?php if (!(strcmp("Querétaro", $operador->entidad_federativa))) {echo "selected=\"selected\"";} ?>>Querétaro</option>
                  <option value="Quintana Roo" <?php if (!(strcmp("Quintana Roo", $operador->entidad_federativa))) {echo "selected=\"selected\"";} ?>>Quintana Roo</option>
                  <option value="San Luis Potosí" <?php if (!(strcmp("San Luis Potosí", $operador->entidad_federativa))) {echo "selected=\"selected\"";} ?>>San Luis Potosí</option>
                  <option value="Sinaloa" <?php if (!(strcmp("Sinaloa", $operador->entidad_federativa))) {echo "selected=\"selected\"";} ?>>Sinaloa</option>
                  <option value="Sonora" <?php if (!(strcmp("Sonora", $operador->entidad_federativa))) {echo "selected=\"selected\"";} ?>>Sonora</option>
                  <option value="Tabasco" <?php if (!(strcmp("Tabasco", $operador->entidad_federativa))) {echo "selected=\"selected\"";} ?>>Tabasco</option>
                  <option value="Tamaulipas" <?php if (!(strcmp("Tamaulipas", $operador->entidad_federativa))) {echo "selected=\"selected\"";} ?>>Tamaulipas</option>
                  <option value="Tlaxcala" <?php if (!(strcmp("Tlaxcala", $operador->entidad_federativa))) {echo "selected=\"selected\"";} ?>>Tlaxcala</option>
                  <option value="Veracruz" <?php if (!(strcmp("Veracruz", $operador->entidad_federativa))) {echo "selected=\"selected\"";} ?>>Veracruz</option>
                  <option value="Yucatán" <?php if (!(strcmp("Yucatán", $operador->entidad_federativa))) {echo "selected=\"selected\"";} ?>>Yucatán</option>
                  <option value="Zacatecas" <?php if (!(strcmp("Zacatecas", $operador->entidad_federativa))) {echo "selected=\"selected\"";} ?>>Zacatecas</option>
              </select>
              </td>
              <td nowrap align="right"><p>Pais:</p></td>
              <td>
                <input type="text" class="form-control" name="pais" value="<?php echo $operador->pais;?>" readonly>
              </td>
            </tr>
            <tr valign="baseline">
              <td nowrap align="right"><p>Codigo_postal:</p></td>
              <td><input type="text" class="form-control" name="codigo_postal" value="<?php echo $operador->codigo_postal;?>" size="32" ></td>
              <td nowrap align="right"><p>Sitio WEB:</p></td>
              <td><input type="text" class="form-control" name="telefono" value="<?php echo $operador->web;?>" size="32" ></td>
            </tr>
            <tr>
            	<td colspan="2" align="center"><h5>Datos de contacto principales</h5></td>
              <td nowrap align="right"><p>Teléfono:</p></td>
              <td><input type="text" class="form-control" name="telefono" value="<?php echo $operador->telefono;?>" size="32" ></td>
            </tr>
            <tr valign="baseline">
              <td nowrap align="right"><p>Celular:</p></td>
              <td><input type="text" class="form-control" name="celular" value="<?php echo $operador->celular;?>" size="32" ></td>
              <td nowrap align="right"><p>Email:</p></td>
              <td><input type="email" class="form-control" name="email" value="<?php echo $operador->email;?>" size="32" ></td>
            </tr>
            <tr valign="baseline">
              <td nowrap="nowrap" align="right">&nbsp;</td>
              <td><input class="btn btn-primary" type="submit" value="Actualizar" /></td>
            </tr>
          </table>
          <input type="hidden" name="actualizar" value="1">
        </form>
        
        </div>