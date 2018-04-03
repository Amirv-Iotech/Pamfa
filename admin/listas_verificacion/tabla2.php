<?php require_once('../../Connections/inforgan_pamfa.php');
 include("cerebro.php");
 $sol="";
  if($_GET["idplan_auditoria"])
  {$sol=$_GET["idplan_auditoria"];
  
  }
  if($_POST["idplan_auditoria"])
  {$sol=$_POST["idplan_auditoria"];
 
    }
  if($row_solicitud['idplan_auditoria'])
  {
    $sol=$row_solicitud['idplan_auditoria'];
   
  } 
  function RestarHoras($horaini,$horafin)
{
	
	$horai=substr($horaini,0,2);
	$mini=substr($horaini,3,2);
	$segi=substr($horaini,6,2);
 
	$horaf=substr($horafin,0,2);
	$minf=substr($horafin,3,2);
	$segf=substr($horafin,6,2);
 
	$ini=((($horai*60)*60)+($mini*60)+$segi);
	$fin=((($horaf*60)*60)+($minf*60)+$segf);
 
	$dif=$fin-$ini;
 
	$difh=floor($dif/3600);
	$difm=floor(($dif-($difh*3600))/60);
	$difs=$dif-($difm*60)-($difh*3600);
	
	return date("H-i-s",mktime($difh,$difm,$difs));
}
$diftotal="";
 $h=0;
			  $mi=0;
			  $horas=0;
			  $mins=0;
 ?>
 
      <div class="col-xs-12 col-lg-12">
      <div class="table-responsive">
      
            <? 
			
            $query_agenda = sprintf("SELECT MAX(fecha),MIN(fecha) FROM `agenda` WHERE `idplan_auditoria`='".$sol."'");
                $agenda = mysql_query($query_agenda, $inforgan_pamfa) or die(mysql_error());
               $row_agenda= mysql_fetch_assoc($agenda);
				
				$y1=substr($row_agenda['MIN(fecha)'],0,4);
	$m1=substr($row_agenda['MIN(fecha)'],4,5);
	$m11=substr($m1,1,2);
	$d1=substr($row_agenda['MIN(fecha)'],8,9);
	
	$fi=mktime(0, 0, 0, date($m11)  , date($d1), date($y1));
	
	$y2=substr($row_agenda['MAX(fecha)'],0,4);
	$m2=substr($row_agenda['MAX(fecha)'],4,5);
	$m22=substr($m2,1,2);
	$d2=substr($row_agenda['MAX(fecha)'],8,9);
	
	$ff=mktime(0, 0, 0, date($m22)  , date($d2), date($y2));
	
		$dif=$ff-$fi;
		$dif=round(($dif/86400),2);		
              $cont=1;
			  $f=date('d/m/Y',$fi);
			  $query_dia= sprintf("SELECT * FROM lista_portada where idplan_auditoria=%s ",GetSQLValueString($sol, "text"));
$dia  = mysql_query($query_dia , $inforgan_pamfa) or die(mysql_error());

$total_dia = mysql_num_rows($dia);
if($total_dia<$dif+1){
            while($cont<=$dif+1)
             {
                $f=date('d/m/Y',$fi); 
				
$insertSQL6 = sprintf("insert into lista_portada (idplan_auditoria,dia,h_inicio,h_fin) VALUES (%s,%s,%s, %s)",
             GetSQLValueString($sol, "int"),
			 GetSQLValueString($f, "text"),				
	GetSQLValueString($_POST['h_inicio'], "text"),
	GetSQLValueString($_POST['h_fin'], "text"));
	
	
	 $Result6 = mysql_query($insertSQL6, $inforgan_pamfa) or die(mysql_error());
	 $fi=$fi+86400;
	   $cont++;
			 }
 }
 ?> <table class="table table-hover">
          <thead>
           
          </thead>

          <tbody><?
 $query_tab = sprintf("SELECT * FROM lista_portada where idplan_auditoria=%s ",GetSQLValueString($sol, "text"));
$tab = mysql_query($query_tab , $inforgan_pamfa) or die(mysql_error());
$cont=1;
while($row_tab = mysql_fetch_assoc($tab)){
            ?>
            <tr>
              <td><? echo "Fecha de auditoría (día ".$cont.")		
";?></td>
              <td><? echo $row_tab['dia'];?></td>
              
              <td>De:</td>
              <td><? /*<input type="text" name="<? echo "h_inicio".$row_tab['idlista_portada'].""?>" id="<? echo "h_inicio".$row_tab['idlista_portada'].""?>" value="<? echo $row_tab['h_inicio'];?>"  onchange="<? echo "guardarTabla2(".$row_tab['idlista_portada'].")"?>" />*/?>

   <input type="time" name="<? echo "h_inicio".$row_tab['idlista_portada'].""?>" id="<? echo "h_inicio".$row_tab['idlista_portada'].""?>" value="<? echo $row_tab['h_inicio'];?>"  onchange="<? echo "guardarTabla2(".$row_tab['idlista_portada'].")"?>"   step="1"/>
    

              </td>
              <td>a:
             
                  </td>
                  <td><input type="time" name="<? echo "h_fin".$row_tab['idlista_portada'].""?>" id="<? echo "h_fin".$row_tab['idlista_portada'].""?>" value="<? echo $row_tab['h_fin'];?>" onchange="<? echo "guardarTabla2(".$row_tab['idlista_portada'].")"?>" /></td>
               
             <? 
			 
			 //$diftotal=$diftotal+RestarHoras($row_tab['h_inicio'],$row_tab['h_fin']); 
			  $h=substr(RestarHoras($row_tab['h_inicio'],$row_tab['h_fin']),0,2);
			  $mi=substr(RestarHoras($row_tab['h_inicio'],$row_tab['h_fin']),3,2);
			  $horas=$horas+$h;
			  $mins=$mins+$mi;
			  if($mins>59){$horas=$horas+($mins/60) ; $mins=$mins%60;}
			  
			 ?>
                  </td>
            </tr>
           

<?

 
 


        $cont++;    }
		$tot=round($horas,0).":".$mins;
		?>
    
   <input id="duracion" type="hidden" name="duracion" value="<? echo $tot;?>"/>
          </tbody>
      </table>
      </div>
</div>

<script>
 $('#auditor2').selectpicker('refresh');
</script>