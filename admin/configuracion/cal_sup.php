<div class="row" id="cal_sup">
  <div class="col-lg-12 col-xs-12" style="padding:0px;">
    <div class="col-lg-12 col-xs-12">
        <div class="col-lg-4 col-xs-12" style="background-color: #def2f5; padding:0px; border:solid 1px white;">
        <div class="col-lg-12 col-xs-12" style="text-align: center; background-color: #07889B; color:white;">
          <p><b>INGRESE LA SIGUIENTE INFORMACIÓN</b></p>
        </div>
          <form action="" method="post"   >
            <? 
             if(isset($_POST['update']))
             {
              $query_u= "SELECT  * FROM mex_cal_sup where idmex_cal_sup='".$_POST['idmex']."'";
            $u = mysql_query($query_u, $inforgan_pamfa) or die(mysql_error());
            $row_u = mysql_fetch_assoc($u);    
             }
            ?>
            <div class="col-lg-12 col-xs-12">
                Descripción:
              <input class="form-control"  type="text" name="descripcion" value="<? if(isset($_POST['update'])){ echo $row_u['descripcion'];}?>"  size="32" style=" background-color:#e7fbfe; padding-top:10px;  background-image: none; border-radius: 10px; height: 45px;"/>
            </div>
            <div class="col-lg-12 col-xs-12">
                Tipo:
              <select class="form-control"  type="text" name="tipo" style=" background-color:#e7fbfe; padding-top:10px;  background-image: none; border-radius: 10px; height: 45px;" />
              <option value="1" <? if(isset($_POST['update'])){if($row_u['alcance']==1){?> selected="selected"<? }}?> )>Alcance</option>
              <option value="2" <? if(isset($_POST['update'])){if($row_u['pliego']==1){?> selected="selected"<? }}?>>Pliego</option>
            </div>
            <div class="col-lg-12 col-xs-12">
                <? if(isset($_POST['update'])){?>              
                  <input class="btn btn-info col-xs-12" type="submit" value="Actualizar datos" />
                  <input type="hidden" name="update2" value="2" />
                  <input type="hidden" name="idmex" value="<?php echo $row_u['idmex_cal_sup'];?>" />  
                <? }else{?>
                  <input class="btn btn-info col-xs-12" type="submit" value="Guardar datos" />
                  <input type="hidden" name="guardar2" value="2" /><? }?>
                  <input type="hidden" name="op" value="2" />
            </div>
            </form>
        </div>


        <div class="col-lg-8 col-xs-8" style="background-color: #def2f5; padding:0px; border:solid 1px white;">
            <table class="table table-bordered">
                <thead style="text-align: center; background-color: #07889B; color:white;">
                    <th> <p><b>Descripción</b></p></th>  
                    <th><p><b>Alcance</b></p> </th>
                    <th><p><b>Pliego</b></p> </th>
                    <th><p><b>Editar</b></p> </th>
                    <th><p><b>Eliminar</b></p> </th>
                </thead>
                <tbody>
                      <?
                         $query_u= "SELECT  * FROM mex_cal_sup order by idmex_cal_sup asc ";
                        $u = mysql_query($query_u, $inforgan_pamfa) or die(mysql_error());
                        while($row_u = mysql_fetch_assoc($u)){ 
                        ?>
                        <tr>
                            <td><label><? echo $row_u['descripcion'];?></label></td>
                            <td><label><? echo $row_u['alcance'];?></label></td>
                            <td><label><? echo $row_u['pliego'];?></label></td>
                            <td> <form   method="post" action="">
                                    <input type="hidden" name="idmex" value="<?php echo $row_u['idmex_cal_sup'];?>" />
                                    <input type="hidden" name="update" value="2" />
                                    <input type="hidden" name="op" value="2" />
                                    <input type="image" name="imageField2" id="imageField2" src="../images/editar.png" width="20" height="20" title="Editar" />
                                  
                                </form>
                            </td>
                            <td>
                              <form  method="post" action="">
                                  <input type="hidden" name="idmex" value="<?php echo $row_u['idmex_cal_sup'];?>" />
                                  <input type="hidden" name="eliminar2" value="2" />
                                  <input type="hidden" name="op" value="2" />
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