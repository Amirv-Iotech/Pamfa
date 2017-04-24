<?
 if(isset($_POST['update']))
 {
	$query_u= "SELECT  * FROM esquemas where idesquema=".$_POST['idesquema']."";
$u = mysql_query($query_u, $inforgan_pamfa) or die(mysql_error());
$row_u = mysql_fetch_assoc($u);  
	 
 }
?>
<div class="row" id="esquemas">
  <div class="col-lg-12 col-xs-12" style="padding:0px;">
    <div class="col-lg-12 col-xs-12">
        <div class="col-lg-4 col-xs-12" style="background-color: #def2f5; padding:0px; border:solid 1px white;">
        <div class="col-lg-12 col-xs-12" style="text-align: center; background-color: #07889B; color:white;">
          <p><b>INGRESE LA SIGUIENTE INFORMACIÓN</b></p>
        </div>
          <form action="" method="post"   >
            <div class="col-lg-12 col-xs-12">
                Esquema:
                <input class="form-control"  type="text" name="esquema"   size="32"  value="<? if(isset($_POST['update'])){ echo $row_u['esquema'];}?>" size="32" style=" background-color:#e7fbfe; padding-top:10px;  background-image: none; border-radius: 10px; height: 45px;"/>
            </div>
            <div class="col-lg-12 col-xs-12">
                Tipo:
              <select class="form-control"  type="text" name="tipo" style=" background-color:#e7fbfe; padding-top:10px;  background-image: none; border-radius: 10px; height: 45px;">
                <option value="1" <? if(isset($_POST['update'])){if($row_u['tipo']==1){?> selected="selected"<? }}?> )>GLOBALG.A.P, IFA V5.0</option>
                <option value="2" <? if(isset($_POST['update'])){if($row_u['tipo']==2){?> selected="selected"<? }}?>>GLOBALG A.P CADENA DE CUSTODIA (CoC)</option>
                </select>
            </div>
            <div class="col-lg-12 col-xs-12">
                Opción:
              <select class="form-control"  type="text" name="opcion" style=" background-color:#e7fbfe; padding-top:10px;  background-image: none; border-radius: 10px; height: 45px;">
               <option value="1" <? if(isset($_POST['update'])){if($row_u['opcion']==1){?> selected="selected"<? }}?>>1</option>
                <option value="2" <? if(isset($_POST['update'])){if($row_u['opcion']==2){?> selected="selected"<? }}?>>2</option>
              </select>
            </div>
            <div class="col-lg-12 col-xs-12">
                <? if(isset($_POST['update'])){?>                  
                    <input class="btn btn-info col-xs-12" type="submit" value="Actualizar datos" />
                    <input type="hidden" name="update3" value="3" />
                    <input type="hidden" name="idesquema" value="<?php echo $row_u['idesquema'];?>" />
                    <? }else{?>
                    <input class="btn btn-info col-xs-12" type="submit" value="Guardar datos" />
                    <input type="hidden" name="guardar3" value="1" /><? }?>
                    <input type="hidden" name="op" value="3" />
            </div>
            </form>
        </div>


        <div class="col-lg-8 col-xs-8" style="background-color: #def2f5; padding:0px; border:solid 1px white;">
            <table class="table table-bordered">
                <thead style="text-align: center; background-color: #07889B; color:white;">
                  <tr><th colspan="5" style="text-align: center;"><p><b>ESQUEMAS REGISTRADOS</b></p></th></tr>
                  <tr>
                    <th><p><b>Esquema</b></p></th>  
                    <th><p><b>GLOBALG.A.P, IFA V5.0:</b></p> </th>
                    <th><p><b>GLOBALG A.P CADENA DE CUSTODIA (CoC):</b></p> </th>
                    <th><p><b>Editar</b></p> </th>
                    <th><p><b>Eliminar</b></p> </th>
                  </tr>
                </thead>
                <tbody>
                  <?
                     $query_p= "SELECT  * FROM esquemas order by idesquema asc ";
                    $p = mysql_query($query_p, $inforgan_pamfa) or die(mysql_error());
                    while($row_p = mysql_fetch_assoc($p)){ 
                  ?>
                    <tr><td><? echo $row_p['esquema'];?></td>
                    <td><? if( $row_p['tipo']==1){ echo "1";}?></td>
                    <td><?  if($row_p['tipo']==2){ echo "1";}?></td>
                    <td> 
                      <form   method="post" action="">
                              <input type="hidden" name="idesquema" value="<?php echo $row_p['idesquema'];?>" />
                              <input type="hidden" name="update" value="3" />
                              <input type="hidden" name="op" value="3" />
                              <input type="image" name="imageField2" id="imageField2" src="../images/editar.png" width="20" height="20" title="Editar" />                            
                      </form>
                    </td>
                    <td>
                      <form   method="post" action="">
                              <input type="hidden" name="idesquema" value="<?php echo $row_p['idesquema'];?>" />
                              <input type="hidden" name="eliminar3" value="1" />
                               <input type="hidden" name="op" value="3" />
                              <input type="image" name="imageField2" id="imageField2" src="../images/delete.png" width="20" height="20" title="Eliminar" />                            
                      </form>
                    </td>
                    </tr>
                    <? }?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- Tabla registros-========= -->
  </div>
</div>