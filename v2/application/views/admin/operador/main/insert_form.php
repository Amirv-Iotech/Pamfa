<div class="col-lg-10">

<?php if($mensaje==1){?>
<div class="alert alert-success" role="alert">
  <strong>Correcto!</strong> Los datos han sido registrados.
</div>
<?php }else if($mensaje==2){?>
<div class="alert alert-danger" role="alert">
  <strong>Error!</strong> No se han registrado tus datos.
</div>
<?php }?>
<form method="POST" name="form1" action="<?php echo site_url('operadores/registrar/'.$categoria);?>">
<input type="hidden" name="categoria" value="<?php echo $categoria;?>">
<hr />
<h4>Agregar registro, <?php echo $string_categoria;?></h4>
          <table class="table table-condensed" align="center">
            <!--<tr><td colspan="2"><p>Insertar</p></td></tr>04/03/16-->
            <tr valign="baseline">
              <td nowrap align="right"><p>Nombre de la empresa:</p></td>
              <td><input type="text" class="form-control" name="operador" value="" size="32" required autofocus></td>
              <td nowrap align="right"><p>Nombre del representante legal:</p></td>
              <td><input type="text" class="form-control" name="representante_legal" value="" size="32" ></td>
            </tr>
            <tr valign="baseline">
              <td nowrap align="right"><p>Codigo_operador:</p></td>
              <td><input type="text" class="form-control" name="codigo_operador" value="" size="32" ></td>
              <td nowrap align="right"><p>Tipo_persona:</p></td>
              <td><input type="text" class="form-control" name="tipo_persona" value="PERSONA MORAL" size="32" ></td>
            </tr>
            <tr valign="baseline">
            	<td nowrap align="right"><p><strong>Producto:</strong></p></td>
              <td><textarea class="form-control" name="producto"></textarea></td>
              <td nowrap align="right"><p>RFC:</p></td>
              <td><input type="text" class="form-control" name="rfc" value="" size="32" ></td>
            </tr>
            <tr valign="baseline">
              <td nowrap align="right"><p>Calle:</p></td>
              <td><input type="text" class="form-control" name="calle" value="" size="32" ></td>
              <td nowrap align="right"><p>Numero_interior:</p></td>
              <td><input type="text" class="form-control" name="numero_interior" value="" size="32" ></td>
            </tr>
            <tr valign="baseline">
              <td nowrap align="right"><p>Numero_exterior:</p></td>
              <td><input type="text" class="form-control" name="numero_exterior" value="" size="32" ></td>
              <td nowrap align="right"><p>Colonia:</p></td>
              <td><input type="text" class="form-control" name="colonia" value="" size="32" ></td>
            </tr>
            <tr valign="baseline">
              <td nowrap align="right"><p>Municipio:</p></td>
              <td><input type="text" class="form-control" name="municipio" value="" size="32" ></td>
              <td nowrap align="right"><p>Localidad:</p></td>
              <td><input type="text" class="form-control" name="localidad" value="" size="32" ></td>
            </tr>
            <tr valign="baseline">
              <td nowrap align="right"><p>Entidad_federativa:</p></td>
              <td>
                <select name="entidad_federativa" class="form-control" id="">
                  <option value="">Seleccionar un estado</option>
                                      <option value="Aguascalientes">Aguascalientes</option>
                                      <option value="Baja California">Baja California</option>
                                      <option value="Baja California Sur">Baja California Sur</option>
                                      <option value="Campeche">Campeche</option>
                                      <option value="Chiapas">Chiapas</option>
                                      <option value="Chihuahua">Chihuahua</option>
                                      <option value="Coahuila">Coahuila</option>
                                      <option value="Colima">Colima</option>
                                      <option value="Distrito Federal">Distrito Federal</option>
                                      <option value="Durango">Durango</option>
                                      <option value="Estado de México">Estado de México</option>
                                      <option value="Guanajuato">Guanajuato</option>
                                      <option value="Guerrero">Guerrero</option>
                                      <option value="Hidalgo">Hidalgo</option>
                                      <option value="Jalisco">Jalisco</option>
                                      <option value="Michoacán">Michoacán</option>
                                      <option value="Morelos">Morelos</option>
                                      <option value="Nayarit">Nayarit</option>
                                      <option value="Nuevo León">Nuevo León</option>
                                      <option value="Oaxaca">Oaxaca</option>
                                      <option value="Puebla">Puebla</option>
                                      <option value="Querétaro">Querétaro</option>
                                      <option value="Quintana Roo">Quintana Roo</option>
                                      <option value="San Luis Potosí">San Luis Potosí</option>
                                      <option value="Sinaloa">Sinaloa</option>
                                      <option value="Sonora">Sonora</option>
                                      <option value="Tabasco">Tabasco</option>
                                      <option value="Tamaulipas">Tamaulipas</option>
                                      <option value="Tlaxcala">Tlaxcala</option>
                                      <option value="Veracruz">Veracruz</option>
                                      <option value="Yucatán">Yucatán</option>
                                      <option value="Zacatecas">Zacatecas</option>
                                  </select>
              </td>
              <td nowrap align="right"><p>Pais:</p></td>
              <td>
                <input type="text" class="form-control" name="pais" value="MÉXICO" readonly>
              </td>
            </tr>
            <tr valign="baseline">
              <td nowrap align="right"><p>Codigo_postal:</p></td>
              <td><input type="text" class="form-control" name="codigo_postal" value="" size="32" ></td>
              <td nowrap align="right"><p>Sitio WEB:</p></td>
              <td><input type="text" class="form-control" name="web" value="" size="32" ></td>
            </tr>
             <tr>
            	<td colspan="2" align="center"><h5>Datos de contacto principales</h5></td>
              <td nowrap align="right"><p>Teléfono:</p></td>
              <td><input type="text" class="form-control" name="telefono" value="" size="32" ></td>
            </tr>
            <tr valign="baseline">
              <td nowrap align="right"><p>Celular:</p></td>
              <td><input type="text" class="form-control" name="celular" value="" size="32" ></td>
              <td nowrap align="right"><p>Email:</p></td>
              <td><input type="email" class="form-control" name="email" value="" size="32" ></td>
            </tr>

            <tr valign="baseline">
              <td nowrap align="right">&nbsp;</td>
              <td><input class="btn btn-primary" type="submit" value="Registrar"></td>
            </tr>
          </table>
          <input type="hidden" name="guardar" value="1">
        </form>
        
        </div>