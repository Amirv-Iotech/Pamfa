<fieldset>
<div class="row" style="background-color: #ecfbe7">
  <div class="col-lg-12" style="background-color: #dbf573e6;">
      <h3>Hallazgos IFA:</h3>
  </div>
    


<div class="col-md-12">
  <form method="post" action="">
        <? $query_informe = sprintf("SELECT * FROM informe_hallazgos where idinforme='".$_POST['idinforme']."' and num_incumplimiento_ifa is not null order by idinforme_hallazgo");
          $informe = mysql_query($query_informe, $inforgan_pamfa) or die(mysql_error());
        ?>
     <div class="col-md-12">
        <div class="table responsive">
            <table class="table table-hover">
              <thead>
                <th>N° de incumplimiento</th>
                <th>Requisito</th>
                <th>Hallazgo</th>
              </thead>
              <tbody>                            
                  <?
                  while($row_informe= mysql_fetch_assoc($informe))
                  { ?>
                  <tr>
                    <td>
                      <? echo $row_informe['num_incumplimiento_ifa'];?>
                    </td>
                    <td>
                      <? echo $row_informe['requisito_ifa'];?>
                    </td>
                    <td>
                      <? echo $row_informe['hallazgo_ifa'];?>
                    </td>
                    <td>
                      <form id="form3" name="form3" method="post" action="">
                        <input type="hidden" name="eliminar" value="1" />               
                        <input type="hidden" name="idinforme_hallazgo" value="<? echo $row_informe['idinforme_hallazgo']; ?>" /> 
                        <input type="hidden" name="idinforme" value="<? echo $row_informe['idinforme']; ?>" />
                        <input type="hidden" name="seccion" value="7" />
                         
                      </form>
                    </td>
                </tr>
                  <? } ?>
              </tbody>
            </table>
        </div>
     </div>
  </form>
</div>
<!-- /Parte 1 -->


   

<div class="col-md-12" style="padding: 0px;">
  
    <div class="col-md-12" style="background-color: #dbf573e6;">
      <h3>Hallazgos CoC:</h3>
    </div>
    
  <div class="col-lg-12">  
      <form method="post" action="#seccion7">  
       <? $query_informe = sprintf("SELECT * FROM informe_hallazgos where idinforme='".$_POST['idinforme']."' and num_incumplimiento_coc is not null order by idinforme_hallazgo ");
        $informe = mysql_query($query_informe, $inforgan_pamfa) or die(mysql_error());
      ?>
      <div class="table responsive">
          <table class="table table-hover">
          <thead>
            <th>Nº de incumplimiento</th>
            <th>Requisito</th>
            <th>Hallazgo</th>
          </thead>
          <tbody>
              <?
                while($row_informe= mysql_fetch_assoc($informe))
                {?>
                <tr>
                  <td>
                    <? echo $row_informe['num_incumplimiento_coc'];?>
                  </td>
                  <td>
                    <? echo $row_informe['requisito_coc'];?>
                  </td>
                  <td>
                    <? echo $row_informe['hallazgo_coc'];?>
                  </td>
                  <td>
                    <form id="form3" name="form3" method="post" action="">
                      <input type="hidden" name="eliminar" value="1" /> 
                      <input type="hidden" name="idinforme_hallazgo" value="<? echo $row_informe['idinforme_hallazgo']; ?>" /> 
                      <input type="hidden" name="idinforme" value="<? echo $row_informe['idinforme']; ?>" />
                      <input type="hidden" name="seccion" value="7" />
                     
                    </form>
                  </td>
                </tr>
                <? }?> 
          </tbody>
          </table>
      </div>
    </form>
  </div>


  <div class="col-lg-12" style="padding: 0px;">
   
      <div class="col-lg-12" style="background-color: #dbf573e6;">
        <h3>Hallazgos México Calidad Suprema:</h3>
      </div>
     
    <div class="col-lg-12">   
       <form method="post" action="#seccion7">  
       <? $query_informe = sprintf("SELECT * FROM informe_hallazgos where idinforme='".$_POST['idinforme']."' and num_incumplimiento_mexcalsup is not null order by idinforme_hallazgo ");
          $informe = mysql_query($query_informe, $inforgan_pamfa) or die(mysql_error());
?>
      <div class="table responsive">
        <table class="table table-hover">
          <thead>
            <th>Nº de incumplimiento</th>
            <th>Requisitos</th>
            <th>Hallazgo</th>
          </thead>
          <tbody>
              <?
              while($row_informe= mysql_fetch_assoc($informe))
              {?>
            <tr>
              <td>
                <? echo $row_informe['num_incumplimiento_mexcalsup'];?>
              </td>
              <td>
                <? echo $row_informe['requisito_mexcalsup'];?>
              </td>
              <td>
                <? echo $row_informe['hallazgo_mexcalsup'];?>
              </td>
              <td>
                  <form id="form3" name="form3" method="post" action="">
                  <input type="hidden" name="eliminar" value="1" />                
                  <input type="hidden" name="idinforme_hallazgo" value="<? echo $row_informe['idinforme_hallazgo']; ?>" /> 
                  <input type="hidden" name="idinforme" value="<? echo $row_informe['idinforme']; ?>" />
                  <input type="hidden" name="seccion" value="7" />
               
                 
                  </form>
              </td>
            </tr>
          <? }?>
   
          </tbody>
        </table>
      </div>
      </form>
    </div>
   
  </div>
</div>
</div>
</fieldset>



