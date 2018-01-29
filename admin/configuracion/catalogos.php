

<?  $query_formatos= "SELECT  * FROM formatos ";
            $formatos = mysql_query($query_formatos, $inforgan_pamfa) or die(mysql_error());
			$query_formatos2= "SELECT  * FROM formatos ";
            $formatos2 = mysql_query($query_formatos2, $inforgan_pamfa) or die(mysql_error());
           ?>

<div class="row" id="preguntas">
 
    <div class="col-lg-12 col-xs-12">
      <div class="col-lg-3 col-xs-3" style="background-color: #def2f5; padding:0px; border:solid 1px white;">
       <? /* <div class="col-lg-12 col-xs-12" style="text-align: center; background-color: #07889B; color:white;">
          <p><b>INGRESE LAS PREGUNTAS MCS</b></p>
        </div>
          <form action="" method="post"   >
            <? 
			
             if(isset($_POST['update']) && $_POST['update']==7)
             {
              $query_u= "SELECT  * FROM preguntas_catalogos where idpregunta='".$_POST['idpregunta']."'";
            $u = mysql_query($query_u, $inforgan_pamfa) or die(mysql_error());
            $row_u = mysql_fetch_assoc($u);    
             }
            ?>
            <div class="col-lg-4 col-xs-4">
                Número:
              <input class="form-control"  type="text" name="numero" value="<? if(isset($_POST['update'])){ echo  substr($row_u['numero'],1);}?>"  size="32" style=" background-color:#e7fbfe; padding-top:10px;  background-image: none; border-radius: 10px; height: 45px;"/>
            </div>
            <div class="col-lg-4 col-xs-4">
                Inciso:
               <input class="form-control"  type="text" name="inciso" value="<? if(isset($_POST['update'])){ echo $row_u['inciso'];}?>"  size="32" style=" background-color:#e7fbfe; padding-top:10px;  background-image: none; border-radius: 10px; height: 45px;"/>
            </div>
            <div class="col-lg-4 col-xs-4">
                Subinciso:
               <input class="form-control"  type="text" name="subinciso" value="<? if(isset($_POST['update'])){ echo $row_u['subinciso'];}?>"  size="32" style=" background-color:#e7fbfe; padding-top:10px;  background-image: none; border-radius: 10px; height: 45px;"/>
            </div>
            <div class="col-lg-12 col-xs-12">
                Texto:
               <textarea class="form-control" rows="5"   name="texto"   style=" background-color:#e7fbfe; padding-top:10px;  background-image: none; border-radius: 10px; height: 45px;"/><? if(isset($_POST['update'])){ echo $row_u['texto'];}?></textarea>
            </div>
             <div class="col-lg-12 col-xs-12">
                Tipo:
              <select class="form-control"  type="text" name="tipo" style=" background-color:#e7fbfe; padding-top:10px;  background-image: none; border-radius: 10px; height: 45px;" />
             
              <option value="1" >Título</option>
              <option value="2" >Subtítulo</option>
              <option value="3>" >Pregunta</option>
            
              </select>
            </div>
            
             <div class="col-lg-12 col-xs-12">
                Formato:
              <select class="form-control"  type="text" name="idformato" style=" background-color:#e7fbfe; padding-top:10px;  background-image: none; border-radius: 10px; height: 45px;" />
              <? while( $row_formatos = mysql_fetch_assoc($formatos)){
				  if($row_formatos['idformato']==1 || $row_formatos['idformato']==2){}else{
				  ?>
              
              <option value=" <? echo $row_formatos['idformato'];?>" ><? echo $row_formatos['formato'];?></option>
             <? } }?>
              </select>
            </div>
            <div class="col-lg-12 col-xs-12">
                <? if(isset($_POST['update']) || isset($_POST['updatex'])){?>              
                  <input class="btn btn-info col-xs-12" type="submit" value="Actualizar datos" />
                  <input type="hidden" name="update7" value="7" />
                  <input type="hidden" name="idpregunta" value="<?php echo $row_u['idpregunta'];?>" />  
                <? }else{?>
                  <input class="btn btn-info col-xs-12" type="submit" value="Guardar datos" />
                  <input type="hidden" name="guardar7" value="7" /><? }?>
                  <input type="hidden" name="op" value="7" />
                  <input type="hidden" name="criterio" value="" />
                  <input type="hidden" name="nivel" value="" />
            </div>
        </form>
        */ ?>
         <p><b>INGRESE LAS PREGUNTAS GLOBALG.A.P.</b></p>
        
          <form action="" method="post"   >
            
			 <? 
             if( isset($_POST['updatex']) && $_POST['updatex']==1)
             {
              $query_u= "SELECT  * FROM preguntas_catalogos where idpregunta='".$_POST['idpregunta']."'";
            $u = mysql_query($query_u, $inforgan_pamfa) or die(mysql_error());
            $row_u = mysql_fetch_assoc($u);    
             }
            
            
            ?>
            <div class="col-lg-4 col-xs-4">
                Número:
              <input class="form-control"  type="text" name="numero" value="<? if(isset($_POST['updatex'])){ echo $row_u['numero'];}?>"  size="32" style=" background-color:#e7fbfe; padding-top:10px;  background-image: none; border-radius: 10px; height: 45px;"/>
            </div>
            <div class="col-lg-4 col-xs-4">
                Prefijo
              <select class="form-control"  type="text" name="prefijo" style=" background-color:#e7fbfe; padding-top:10px;  background-image: none; border-radius: 10px; height: 45px;" />
              
              <option value="AF" >AF</option>
               <option value="CB" >CB</option>
                <option value="FV" >FV</option>
                 <option value="QM" >QM</option>
                  <option value="QMA" >QMA</option>
                   <option value="CoC" >CoC</option>
            
              </select>
            </div>
           <div class="col-lg-4 col-xs-4">
                	Nivel:
             <input class="form-control"  type="text"  name="nivel"  value="<? if(isset($_POST['updatex'])){ echo $row_u['nivel'];}?>" style=" background-color:#e7fbfe; padding-top:10px;  background-image: none; border-radius: 10px; height: 45px;"/>
            </div>
            
            <div class="col-lg-12 col-xs-12">
                	Punto de control:
               <textarea class="form-control" rows="5"   name="texto"   style=" background-color:#e7fbfe; padding-top:10px;  background-image: none; border-radius: 10px; height: 45px;"/><? if(isset($_POST['updatex'])){ if($row_u['ban']==NULL){ echo utf8_encode( $row_u['texto']);} else {  echo $row_u['texto'];} }?></textarea>
            </div>
             <div class="col-lg-12 col-xs-12">
                	Criterio:
               <textarea class="form-control" rows="5"   name="criterio"   style=" background-color:#e7fbfe; padding-top:10px;  background-image: none; border-radius: 10px; height: 45px;"/><? if(isset($_POST['updatex'])){ if($row_u['ban']==NULL){ echo utf8_encode($row_u['criterio']);} else { echo $row_u['criterio'];}}?></textarea>
            </div>
            
             <div class="col-lg-8 col-xs-8">
                Tipo:
              <select class="form-control"  type="text" name="tipo" style=" background-color:#e7fbfe; padding-top:10px;  background-image: none; border-radius: 10px; height: 45px;" />
             
              <option value="1" >Título</option>
              <option value="2" >Subtítulo</option>
              <option value="3" >Pregunta</option>
              
            
              </select>
            </div>
              <div class="col-lg-4 col-xs-4">
                NA:
              <input class="form-control" type="checkbox" value="1" name="na">
            </div>
             <div class="col-lg-12 col-xs-12">
                Formato:
              <select class="form-control"  type="text" name="idformato" style=" background-color:#e7fbfe; padding-top:10px;  background-image: none; border-radius: 10px; height: 45px;" />
              <? while( $row_formatos2 = mysql_fetch_assoc($formatos2)){
				    if($row_formatos2['idformato']>2 && $row_formatos2['idformato']<7 ){}else{
				  ?>
              <option value=" <? echo $row_formatos2['idformato'];?>" ><? echo $row_formatos2['formato'];?></option>
             <? } }?>
              </select>
            </div>
           
            <div class="col-lg-12 col-xs-12">
                <? if(isset($_POST['update'])|| isset($_POST['updatex'])){?>              
                  <input class="btn btn-info col-xs-12" type="submit" value="Actualizar datos" />
                  <input type="hidden" name="update7" value="7" />
                    
                  <input type="hidden" name="idpregunta" value="<?php echo $row_u['idpregunta'];?>" />  
                <? }else{?>
                  <input class="btn btn-info col-xs-12" type="submit" value="Guardar datos" />
                  <input type="hidden" name="guardar7" value="7" /><? }?>
                  <input type="hidden" name="op" value="7" />
                   <input type="hidden" name="subinciso" value="" />
                      <input type="hidden" name="inciso" value="" />
            </div>
        </form>
        </div>
        
        
        
<? /*

        <div class="col-lg-9 col-xs-9" style="background-color: #def2f5; padding:0px; border:solid 1px white;">
           
             <table id="example1" class="table table-hover" > 


                <thead style="text-align: center; background-color: #07889B; color:white;">
                    <th> Número</th>  
                    <th>Inciso </th>
                    <th>Subinciso </th>
                     <th>Punto de control</th>
                     <th>Criterio de cummplimiento </th>
                     <th>Formato </th>
                    <th>Editar /Eliminar</th>
                   
                </thead>
                <tbody>
                      <?
                         $query_u= "SELECT  * FROM preguntas_catalogos order by idformato asc,prefijo asc,numero asc, inciso asc,subinciso asc ";
                        $u = mysql_query($query_u, $inforgan_pamfa) or die(mysql_error());
                        while($row_u = mysql_fetch_assoc($u)){ 
                        ?>
                        <tr>
                            <td><label><? if($row_u['numero']<10 && $row_u['idformato']==3 ){echo $row_u['prefijo'].substr($row_u['numero'],1);} else if($row_u['idformato']==1){ echo $row_u['prefijo'].substr($row_u['numero'],1); }else {echo $row_u['prefijo'].$row_u['numero'];}?></label></td>
                            <td><label><? echo $row_u['inciso'];?></label></td>
                            <td><label><? echo $row_u['subinciso'];?></label></td>
                            <td><label><? if($row_u['ban']==NULL){ echo utf8_encode($row_u['texto']);} else { echo $row_u['texto'];}
;?></label></td>
                            <td><label><? if($row_u['ban']==NULL){ echo utf8_encode($row_u['criterio']);} else { echo $row_u['criterio'];} ?></label></td>
                              <td><label><? echo $row_u['idformato'];?></label></td>
                            <td> <form   method="post" action="" name="act2">
                                    <input type="hidden" name="idpregunta" value="<?php echo $row_u['idpregunta'];?>" />
                                    <? if($row_u['idformato']==1|| $row_u['idformato']==2){?>
                                    <input type="hidden" name="updatex" value="1" />
                                     
                                    <? }else {?>
                                     <input type="hidden" name="update" value="7" />
                                    <? }?>
                                    <input type="hidden" name="op" value="7" />
                                    <input type="image" name="imageField2" id="imageField2" src="../images/editar.png" width="20" height="20" title="Editar" />
                                  
                                </form>
                                 <form  method="post" action="">
                                  <input type="hidden" name="idpregunta" value="<?php echo $row_u['idpregunta'];?>" />
                                  <input type="hidden" name="eliminar7" value="7" />
                                  <input type="hidden" name="op" value="7" />
                                  <input type="image" name="imageField2" id="imageField2" src="../images/delete.png" width="20" height="20" title="Eliminar" />                                  
                              </form>
                            </td>
                           
                       
                        <? }?>
                         </tr>
                </tbody>
            </table>
        </div>
       
    </div>
    <!-- Tabla registros-========= -->
    
   */?>
</div>
