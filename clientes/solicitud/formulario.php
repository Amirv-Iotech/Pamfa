<?php require_once('../../Connections/inforgan_pamfa.php');
if(!session_start())
{
	session_start();
}
?>
<?php 
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  } 
  return $theValue;
}
}




mysql_select_db($database_pamfa, $inforgan_pamfa);
 include("includes/header.php");
 ?><iframe width="1" height="1" src="" frameborder="0"></iframe><? 
if(isset($_POST['idsolicitud']))
{
	 $query_solicitud = sprintf("SELECT * FROM solicitud WHERE idsolicitud=%s order by idsolicitud asc limit 1", GetSQLValueString( $_POST['idsolicitud'], "int"));
$solicitud = mysql_query($query_solicitud, $inforgan_pamfa) or die(mysql_error());
$row_solicitud= mysql_fetch_assoc($solicitud);

}
else{

$query_solicitud2 = sprintf("SELECT * FROM solicitud WHERE idoperador=%s order by idsolicitud desc limit 1", GetSQLValueString( $_SESSION["idoperador"], "int"));
$solicitud2 = mysql_query($query_solicitud2, $inforgan_pamfa) or die(mysql_error());
$total_solicitud2 = mysql_num_rows($solicitud2);

if($total_solicitud2==0){

 $query_s = sprintf("SELECT Max(idsolicitud) as id FROM solicitud  WHERE idoperador=%s",GetSQLValueString($_SESSION["idoperador"], "text"));
  $s  = mysql_query($query_s , $inforgan_pamfa) or die(mysql_error());
$row_s = mysql_fetch_assoc($s);  
$sol = $row_s['id'];


}
 else {
	 $query_s = sprintf("SELECT Max(idsolicitud) as id FROM solicitud  WHERE idoperador=%s",GetSQLValueString($_SESSION["idoperador"], "text"));
  $s  = mysql_query($query_s , $inforgan_pamfa) or die(mysql_error());
$row_s = mysql_fetch_assoc($s);  

$query_sa = sprintf("SELECT terminada FROM solicitud  WHERE idsolicitud=%s ",GetSQLValueString($row_s['id'], "text"));
  $sa  = mysql_query($query_sa , $inforgan_pamfa) or die(mysql_error());
$row_sa = mysql_fetch_assoc($sa); 

if($row_sa['terminada']==1  ){
  $sol=NULL;
}else{
  $sol="1";
}
}

$sola="";
 if($sol==NULL){
  include("cerebro2.php");
 }
 if($sola!=NULL){
  $query_solicitud = sprintf("SELECT * FROM solicitud WHERE idsolicitud=%s order by idsolicitud asc limit 1", GetSQLValueString( $sola, "int"));
$solicitud = mysql_query($query_solicitud, $inforgan_pamfa) or die(mysql_error());
$row_solicitud= mysql_fetch_assoc($solicitud);

 }
 else {
  $query_solicitud = sprintf("SELECT * FROM solicitud WHERE idoperador=%s and terminada is NULL order by idsolicitud asc limit 1", GetSQLValueString( $_SESSION["idoperador"], "int"));
$solicitud = mysql_query($query_solicitud, $inforgan_pamfa) or die(mysql_error());
$row_solicitud= mysql_fetch_assoc($solicitud);

 }
 
}
$query_operador = sprintf("SELECT * FROM operador WHERE idoperador=%s", GetSQLValueString( $_SESSION["idoperador"], "int"));
$operador = mysql_query($query_operador, $inforgan_pamfa) or die(mysql_error());
$row_operador= mysql_fetch_assoc($operador);

$query_cert_anterior = sprintf("SELECT * FROM cert_anterior WHERE idsolicitud=%s order by idcert_anterior asc limit 1", GetSQLValueString( $row_solicitud["idsolicitud"], "int"));
$cert_anterior = mysql_query($query_cert_anterior, $inforgan_pamfa) or die(mysql_error());
$row_cert_anterior= mysql_fetch_assoc($cert_anterior);

$query_solicitud_esq = sprintf("SELECT * FROM solicitud_esquema WHERE idsolicitud=%s order by idsolicitud_esquema asc limit 1", GetSQLValueString($row_solicitud["idsolicitud"], "int"));
$solicitud_esq = mysql_query($query_solicitud_esq, $inforgan_pamfa) or die(mysql_error());
$row_solicitud_esq= mysql_fetch_assoc($solicitud_esq);

$query_procesadora = sprintf("SELECT * FROM procesadora WHERE idsolicitud=%s order by idprocesadora asc limit 1", GetSQLValueString( $row_solicitud["idsolicitud"], "int"));
$procesadora = mysql_query($query_procesadora, $inforgan_pamfa) or die(mysql_error());
$row_procesadora= mysql_fetch_assoc($procesadora);
 
 function obser($x,$y)
 {
	 $p=1;
	 $pl="";
	 $lista="<table class='table' border='1' cellpadding='1' cellspacing='5' ><tr><td><strong>N°</strong></td><td><strong>Observaciones</strong></td><td><strong>Fecha</strong></td><td><strong>Estado</strong></td></tr>";
	 $query_obs = sprintf("SELECT * FROM solicitud_obs WHERE idsolicitud=%s and seccion_sol=%s ", GetSQLValueString(  $x, "int"),
	 GetSQLValueString(  $y, "int"));
$obs = mysql_query($query_obs, $GLOBALS['inforgan_pamfa']) or die(mysql_error());

while($row_obs= mysql_fetch_assoc($obs))
{
	//$pl=$p.".-".$row_obs['observacion']."";
	//$lista=$lista.$pl."<br>";
	$e="";
	if($row_obs['estado']==1){$e="Pendiente";}else{$e="Atendida";}
	$pl="<tr><td>".$p."</td><td>".$row_obs['observacion']."</td><td>".$row_obs['fecha_obs']."</td><td>".$e."</td></tr>";
	$lista=$lista.$pl;
	$p++;
}
$lista=$lista."</table>";
return $lista;
 }
 
$query_obs = sprintf("SELECT * FROM solicitud_obs WHERE idsolicitud=%s ", GetSQLValueString(  $row_solicitud["idsolicitud"], "int"));
$obs = mysql_query($query_obs, $inforgan_pamfa) or die(mysql_error());

$seccion_obs="";
$array = array();
$c=0;
//$ob[15][1]= array();

while($row_obs= mysql_fetch_assoc($obs))
{
	$seccion_obs=$row_obs['seccion_sol'].",".$seccion_obs;
	$array[$c]=$row_obs['seccion_sol'];
	//$ob[$c]=$row_obs['observacion'];
	$c++;
	
}
$a0="";
$ex=0;
$c10=0;$c11=0;$cl2=0;$c13=0;$c14=0;$c15=0;$cl6=0;$c17=0;$c18=0;$c19=0;$c111=0;$c112=0;$c113=0;$c114=0;$c115=0;
$st0=0;$st1=0;$st2=0;$st3=0;$st4=0;$st5=0;$st6=0;$st7=0;$st8=0;$st9=0;$st10=0;$st11=0;$st12=0;$st13=0;$st14=0;$st15=0;

$s0=0;$s1=0;$s2=0;$s3=0;$s4=0;$s5=0;$s6=0;$s7=0;$s8=0;$s9=0;$s10=0;$s11=0;$s12=0;$s13=0;$s14=0;$s15=0;
$ob0=0;$ob1=0;$ob2=0;$ob3=0;$ob4=0;$ob5=0;$ob6=0;$ob7=0;$ob8=0;$ob9=0;$ob10=0;$ob11=0;$ob12=0;$ob13=0;$ob14=0;$ob15=0;


for($x=0;$x<$c;$x++)
{
	
	if($array[$x]==0)
	{
			if($s0==0){$c10++;
			$ob0=obser($row_solicitud["idsolicitud"],0);
	
	}
		$st0=1;
	
	
	}
	
	if($array[$x]==1)
	{
			if($s1==0){$c11++;
	$ob1=obser($row_solicitud["idsolicitud"],1);
	}
		$st1=1;
	
	
	}
	if($array[$x]==2)
	{
		if($s2==0){$c12++;
	$ob2=obser($row_solicitud["idsolicitud"],2);
	}
		$st2=1;
	}
	if($array[$x]==3)
	{
		if($s3==0){$c13++;
	$ob3=obser($row_solicitud["idsolicitud"],3);
	}
		$st3=1;
	}
	if($array[$x]==4)
	{
		if($s4==0){$c14++;
	$ob4=obser($row_solicitud["idsolicitud"],4);
	}
		$st4=1;
	}
	if($array[$x]==5)
	{
		if($s5==0){$c15++;
	$ob5=obser($row_solicitud["idsolicitud"],5);
	}
		$st5=1;
	
	}
	if($array[$x]==6)
	{
		if($s6==0){$c16++;
	$ob6=obser($row_solicitud["idsolicitud"],6);
	}
		$st6=1;
	}
	if($array[$x]==7)
	{
		if($s7==0){$c17++;
	$ob7=obser($row_solicitud["idsolicitud"],7);
	}
		$st7=1;
	}
	if($array[$x]==8)
	{
		if($s8==0){$c18++;
	$ob8=obser($row_solicitud["idsolicitud"],8);
	}
		$st8=1;
	}
	if($array[$x]==9)
	{
		if($s9==0){$c19++;
	$ob9=obser($row_solicitud["idsolicitud"],9);
	}
		$st9=1;
	}
	if($array[$x]==10)
	{
		if($s10==0){$ex++;
	$ob10=obser($row_solicitud["idsolicitud"],10);
	}
		$st10=1;
			}
	if($array[$x]==11)
	{
		if($s11==0){$c111++;
	$ob11=obser($row_solicitud["idsolicitud"],11);
	}
		$st11=1;
	}
	if($array[$x]==12)
	{
		if($s12==0){$c112++;
	$ob12=obser($row_solicitud["idsolicitud"],12);
	}
		$st12=1;
	}
	if($array[$x]==13)
	{
		if($s13==0){$c113++;
	$ob13=obser($row_solicitud["idsolicitud"],13);
	}
		$st13=1;
	}
	if($array[$x]==14)
	{
		if($s14==0){$c114++;
	$ob14=obser($row_solicitud["idsolicitud"],14);
	}
		$st14=1;;
	}
	if($array[$x]==15)
	{
		if($s15==0){$c115++;
	$ob15=obser($row_solicitud["idsolicitud"],15);
	}
		$st15=1;
	}
	
}


////////
?> 
<div class="content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-12">
                        
<div class="panel panel-white"   >
<div class="panel-heading clearfix" style="background-color: #ecfbe7;" ><br>

<input type="hidden" id="ruta" name="ruta" value="<? echo "tabla.php?idsolicitud=".$row_solicitud['idsolicitud']."&seccion=1&idoperador=".$row_operador['idoperador']."";?>" />
<input type="hidden" id="ruta2" name="ruta2" value="<? echo "tabla_anexo.php?idsolicitud=".$row_solicitud['idsolicitud']."&seccion=1&idoperador=".$row_operador['idoperador']."";?>" />
<input type="hidden" id="ruta3" name="ruta3" value="<? echo "tabla_anexo_alm.php?idsolicitud=".$row_solicitud['idsolicitud']."&seccion=1&idoperador=".$row_operador['idoperador']."";?>" />
 
 <? if($st0==1){?> <button type="button" class="btn btn-danger collapsed btn-lg btn-block" data-toggle="collapse" data-target="#demo" aria-expanded="false"><span  style="font-size:20px">  <? echo $c10."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;OBSERVACIONES&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";?><i class="material-icons" style="font-size: 25px;">arrow_downward</i></span></button>
 <div id="demo" class="collapse" style="background:#FFF">
<?  echo $ob0;
  ?>
</div>
<? } ?>
 

 <div id="seccion0"   class="row"  <? if($st0==1){?> style="border:3px solid #F00"<? } else{?>style="background-color: #ecfbe7; <? }?>">
	
		<div class="col-lg-12">
        <br />
			<p style="font-size:25px; text-align:center;">Solicitud de certificación de producto</p>
			<br/>
      <br/>
		</div>
		<div class="col-lg-2 col-md-2 col-xs-6 fechas">
			<p class="solicitud">Fecha de solicitud </p>
		</div>
		<div class="col-lg-2 col-md-2 col-xs-6 fechas" style="border-bottom:solid 1px #AAAAAA;">
			
			<input  id="fecha1" name="fecha1"  disabled="disabled" type="text" placeholder=""  <? if(isset($row_solicitud['fecha'])){?>value="<? echo date('d/m/y',$row_solicitud['fecha']);?>"<? }else{ ?> value="<? echo date('d/m/y',time());?>"<? }?>  style="font-size: 18px; text-align:center; width:100%"/>
			
		<?	$f="";
		if(isset($row_solicitud['fecha']))
		{  $f=$row_solicitud['fecha'];}
		else{ $f= time(); }?>
        
        <input type="hidden" name="fecha" id="fecha" value="<? echo $f?>"/>
		</div>

		<div class="col-lg-4 col-md-4 col-xs-6 fechas">
			<p class="solicitud">   Nombre de la persona que llena la solicitud: </p>
		</div>
		<div class="col-lg-3 col-md-6 col-xs-6 fechas">
			<p class="solicitud"> <input id="persona" name="persona" type="text" placeholder=""  title="Nombre " value="<? echo $row_solicitud['persona'];?>" style="font-size: 18px; text-align:center; width:100%"/></p>
		</div>
		<div class="col-lg-12 col-xs-12">
                    <div class="form-group">  
                     <div id="autoSave"></div>  
                </div>
      <br/>
			<p class="solicitud" >Estimado cliente, favor de llenar los datos en los espacios requeridos, esta información es necesaria para completar el proceso de certificación de acuerdo al esquema de certificación que usted solicita.</p>
		</div>
	</div>
    
  <input type="hidden" id="fecha1" name="fecha1" value="<? echo time();?>" />
  
	<fieldset> 
    <? if($st1==1){?> <button type="button" class="btn btn-danger collapsed btn-lg btn-block" data-toggle="collapse" data-target="#demo1" aria-expanded="false"><span  style="font-size:20px">  <? echo $c11."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;OBSERVACIONES&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";?><i class="material-icons" style="font-size: 25px;">arrow_downward</i></span></button>
<div id="demo1" class="collapse" style="background:#FFF">
<?  echo $ob1;  ?>
</div>
<? } ?>
    <div id="seccion1" class="row"   <? if($st1==1){?>  style="border:3px solid #F00" <? } else{?>style="background-color: #ecfbe7; <? }?>border: solid 1px #AAAAAA;">
        <div class="col-md-12" style="text-align: center; background-color:#dbf573e6">
          <label class="solicitud">INFORMACIÓN DEL CLIENTE (Entidad legal y persona de contacto)</label>
        </div>
    		<div class="col-lg-12 col-ms-12 campos" style="border-top: solid 1px #AAAAAA; border-bottom: solid 1px #AAAAAA;">
      		<div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-6 campos" style="border-right: solid 1px #AAAAAA; margin-right: 0px; margin-left: 0px;">
            <label for="nombre_legal" class="form-label col-lg-12 col-md-12 col-sm-12 col-xs-12">Nombre de la entidad legal (empresa o persona):</label>
  			  <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12 campos">
          	<input disabled="disabled" class="inputsf form-control" name="nombre_legal" type="text" 	title="Nombre completo " value="<? echo $row_operador['nombre_legal'];?>"  />
      	   </div>
  			 </div>

      	 <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-6 campos" style="margin-right: 0px; margin-left: 0px;">
          	<label for="nombre_representante" class="form-label col-lg-12 col-md-12 col-sm-12 col-xs-12">Nombre del representante legal:</label>
          	<div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12 campos">
          	<input  disabled="disabled" class="inputsf form-control" name="nombre_representante" value="<? echo $row_operador['nombre_representante'];?>"  title="Nombre " />
        	</div>
    		  </div>
        </div>

    		<div class="form-group col-lg-12 col-md-12 campos" style="border-bottom: solid 1px #AAAAAA; margin-right: 0px; margin-left: 0px;">
          <div class="col-lg-4 col-sm-4">
        	  <label for="direccion" class="form-label" style="padding-top:5px;">Dirección de la entidad legal: calle y número:</label>
          </div>
        	<div class=" form-group col-lg-8 campos">
        	<input disabled="disabled" class="form-control inputsf" name="direccion" value="<? echo $row_operador['direccion'];?>"  title="Dirección"  />
        	</div>
        </div>
            <div class="form-group col-lg-12 col-md-12 campos" style="border-bottom: solid 1px #AAAAAA; margin-right: 0px; margin-left: 0px;">
            <div class="col-lg-4 col-sm-4">
        	   <label for="coordenadas" class="form-label">Coordenadas de la entidad legal</label>
            </div>
        	<div class="col-lg-8 campos">
        	<input disabled="disabled" class="form-control inputsf" name="coordenadas" value="<? echo $row_operador['coordenadas'];?>"  title="Coordenadas"  />
        	</div>
        	</div>

          <div class="col-lg-12 col-sm-12 campos" style="border-bottom: solid 1px #AAAAAA; margin-right: 0px; margin-left: 0px;">
            <div class=" form-group col-lg-2 col-md-2 campos" style="border-right: solid 1px #AAAAAA;margin-right: 0px; margin-left: 0px;" >
            	<label for="cp" class="form-label col-lg-4 col-sm-4">C.P.:</label>
            	<div class="col-lg-8 col-sm-8">
            	<input disabled="disabled" class="form-control inputsf" name="cp" type="text" title="Codigo postal " value="<?php echo $row_operador['cp'];?>"  />
      	     </div>
   		    </div>
    		<div class="form-group col-lg-4 col-md-4 col-sm-4 campos" style="border-right: solid 1px #AAAAAA; margin-right: 0px; margin-left: 0px;" >
        	<label for="colonia" class="form-label col-lg-4 col-sm-4">Colonia:</label>
        	<div class="col-lg-8 col-sm-4">
        	<input disabled="disabled" class="form-control inputsf" name="colonia" value="<?php echo $row_operador['colonia'];?>"  title="Colonia " />
        	</div>
    		</div>
            <div class="form-group col-lg-3 col-md-3 col-sm-3 campos" style="border-right: solid 1px #AAAAAA; margin-right: 0px; margin-left: 0px;">
        	<label for="estado" class="form-label col-lg-4">Estado:</label>
        	<div class="col-lg-8 col-sm-8">
        	<input disabled="disabled" class="form-control inputsf" name="estado" type="text"  			title="Estado " value="<? echo $row_operador['estado'];?>" />
    	    </div>
    		</div>

    		<div class="form-group col-lg-3 col-md-3 col-sm-3 campos" style="border-right: solid 0px #AAAAAA; margin-right: 0px; margin-left: 0px;">
        	<label for="pais" class="form-label col-lg-4 col-sm-4">Pais:</label>
        	<div class="col-lg-8 col-sm-8">
        	<input disabled="disabled" class="form-control inputsf" name="pais" value="<? echo  $row_operador['pais'];?>" id="email" title="Pais "  />
        	</div>
    		</div>
      </div>

      <div class="col-lg-12 col-sm-12 campos" style="margin-right: 0px; margin-left: 0px; margin-right: 0px; margin-left: 0px;">
    		<div class=" form-group col-lg-4 col-md-4 col-sm-4 campos" style="border-right: solid 1px #AAAAAA; margin-right: 0px; margin-left: 0px;">
        	<label for="email" class="form-label col-lg-4 col-sm-4">Correo Electrónico:</label>
        	<div class="col-lg-8">
        	<input disabled="disabled" class="form-control inputsf" name="email" value="<? echo  $row_operador['email'];?>" id="email" title="Email " />
        	</div>
    		</div>

        <div class="form-group col-lg-5 col-md-5 col-sm-5 campos" style="border-right: solid 1px #AAAAAA; margin-right: 0px; margin-left: 0px;">
        	<label for="telefono" class="form-label col-lg-8 col-sm-8">Número de telefono(oficina o personal):</label>
        	<div class="col-lg-4 col-sm-4">
        	<input disabled="disabled" class="form-control inputsf" name="telefono" type="text" 			title="Telefono " value="<? echo  $row_operador['telefono'];?>"  />
    	    </div>
   		</div>

        <div class="form-group col-lg-3 col-md-3 col-sm-3 campos" style="border-right: solid 0px #AAAAAA; margin-right: 0px; margin-left: 0px;">
        <div class="col-lg-4 col-sm-4 campos">
        	<label for="fax" class="form-label">Fax:</label></div>
        	<div class="col-lg-8 col-sm-8 campos">
        	<input disabled="disabled" class="form-control inputsf" name="fax" value="<? echo  $row_operador['fax'];?>" title="Fax "  />
        	</div>
   		</div>
      </div>
      </div> <!-- /ROW-->
    </fieldset>	

<fieldset>
<? if($st2==1){?> <button type="button" class="btn btn-danger collapsed btn-lg btn-block" data-toggle="collapse" data-target="#demo2" aria-expanded="false"><span  style="font-size:20px">  <? echo $c12."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;OBSERVACIONES&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";?><i class="material-icons" style="font-size: 25px;">arrow_downward</i></span></button>
<div id="demo2" class="collapse" style="background:#FFF">
<?  echo $ob2;  ?>
</div>
<? } ?>
	<div id="seccion2" class="row"  <? if($st2==1){?> style="border:3px solid #F00"<? } else{?>style="background-color: #ecfbe7; <? }?>border: solid 1px #AAAAAA;">
  
	<div class=" form-group col-md-12 campos2" style="margin:0px;">
		<div class="col-md-3 col-sm-6" style="padding: 0px 0px; border: solid 1px #AAAAAA;">
		  <div class="col-md-12" style="background-color:#dbf573e6; height:120px; overflow: hidden; text-overflow:ellipsis;">
			  <b>GGN </b><span style="text-align:justify; height:100%;" >GLOBALG.A.P NUMBER, obligatorio si estuvieron certificados anteriormente con GLOBALG.A.P):</span>
		  </div>
		  <div class="col-md-12 campos" style="height:20%;">
				<input placeholder="" class="form-control inputsf" id="num_ggn" onchange="loadLog2()" name="num_ggn" type="text" title="Número" value="<? echo $row_solicitud['num_ggn'];?>" />
		  </div>
		</div>
		<div class="col-md-3 col-sm-6" style="padding: 0px 0px; border:solid 1px #AAAAAA;">
		  <div class="col-md-12" style="background-color:#dbf573e6; height:120px; overflow: hidden; text-overflow:ellipsis;">
		  <b>GLN</b> (Global Localization Number, obligatorio si fue solicitado a GS1):
		  </div>
		  <div class="col-md-12 campos">
		   <input placeholder="" class="form-control inputsf"  id="num_gln" onchange="loadLog2()" name="num_gln" value="<? echo $row_solicitud['num_gln'];?>"  title="Número "  />
		  </div>
		</div>

		<div class="col-md-3 col-sm-6" style="height:100%; padding: 0px 0px; border:solid 1px #AAAAAA;">
		  <div class="col-md-12" style="background-color:#dbf573e6; height:120px;overflow: hidden; text-overflow:ellipsis;">
			  <b>CoC</b> número (CoC NUMBER, obligatorio si estuvieron certificados anteriormente con GLOBALG.A.P):
		  </div>
		  <div class="col-md-12 campos">
				  <input placeholder="" class="form-control inputsf"  id="num_coc" onchange="loadLog2()" name="num_coc" value="<? echo $row_solicitud['num_coc'];?>"  title="Número"  />
		  </div>
		</div>

		<div class="col-md-3 col-sm-6" style="height:100%; padding: 0px 0px; border:solid 1px #AAAAAA;">
		  <div class="col-md-12" style="background-color:#dbf573e6; height:120px; overflow: hidden; text-overflow:ellipsis;">
		  <b>Número de registro México Calidad Suprema</b> (obligatorio si ya esta registrado):
		  </div>
		  <div class="col-md-12 campos">
				  <input placeholder="" class="form-control inputsf" id="num_mex_cal_sup" onchange="loadLog2()" name="num_mex_cal_sup" value="<? echo $row_solicitud['num_mex_cal_sup'];?>"  title="Número"  />
		  </div>
		</div>
	</div>
  
  
	<div class=" form-group col-md-12 campos2" style="margin:0px;">
		<div class="col-md-6 col-sm-6" style="padding: 0px 0px; border: solid 1px #AAAAAA;">
		  <div class="col-md-12" style="background-color:#dbf573e6; height:70px; overflow: hidden; text-overflow:ellipsis;">
			  <b>Número PrimusGFS:</b><span style="text-align:justify; height:100%;" >obligatorio si estuvieron certificados anteriormente en el esquema PrimusGFS:</span>
		  </div>
		  <div class="col-md-12 campos" style="height:20%;">
			  <input placeholder="" class="form-control inputsf"  id="num_primus" onchange="loadLog2()" name="num_primus" type="text" title="Número " value="<? echo $row_solicitud['num_primus'];?>"  />
		  </div>
		</div>
		<div class="col-md-6 col-sm-6" style="padding: 0px 0px; border:solid 1px #AAAAAA;">
		  <div class="col-md-12" style="background-color:#dbf573e6; height:70px; overflow: hidden; text-overflow:ellipsis;">
		  <b>Número de  registro de SENASICA:</b> <span>obligatorio si se registró con SENASICA:</span>
		  </div>
		  <div class="col-md-12 campos">
			  <input placeholder="" class="form-control inputsf" id="num_senasica" onchange="loadLog2()" name="num_senasica" type="text"        title="Número " value="<? echo $row_solicitud['num_senasica'];?>"  />
		  </div>
		</div>
	</div>
	  <div class="col-lg-12 col-md-12 campos2" style="margin:0px;">
		<div class="col-lg-6 col-md-6" style= "padding: 0px 0px;border:solid 1px #AAAAAA;">
			<div class="col-lg-12 col-md-12 campos">
				<label  class="form-label" for="reponsable" >Nombre del responsable de la aplicación de la norma en la entidad legal:</label>
			</div>
			<div class="col-lg-12 col-md-12 campos">
				<input placeholder="" class="form-control inputsf"  id="responsable" onchange="loadLog2()" name="responsable" value="<? echo $row_solicitud['responsable'];?>"  title="Responsable "  />
			</div>
        </div>
		<div class="col-lg-6 col-md-6" style="padding: 0px 0px; border:solid 1px #AAAAAA;">
			<div class=" col-lg-12 col-md-12 campos">
				<label  class="form-label"  for="personal" >Nombre del personal que realizó la autoevaluación/auditoria interna en la entidad legal:</label>
			</div>
			<div class="col-lg-12 col-md-12 campos">
				<input placeholder="" class="form-control inputsf"  id="personal" onchange="loadLog2()" name="personal" value="<? echo $row_solicitud['personal'];?>"  title="Personal "/>
			</div>
        </div>
      </div>

      
      
     
</div>
</fieldset>	
 
<?
 include("seccion3.php");?>
<?php include("seccion4.php");?>
<?php include("seccion5.php");
for($d=0;$d<3;$d++){
?>
 <script type="text/javascript"> 

 <? echo '

$(document).ready(function(){  
        $("#esq_tipo1_op1'.$d.'").click(function() {  
		
			 if(($("#esq_tipo1_op10").is(":checked"))|| ($("#esq_tipo1_op11").is(":checked"))|| ($("#esq_tipo1_op12").is(":checked")) || ($("#esq_tipo2_op10").is(":checked"))|| ($("#esq_tipo2_op11").is(":checked"))) {  ';
  echo "document.getElementById('preg61').disabled = false;
  document.getElementById('preg62').disabled = false;
    
              
			 
			document.getElementById('preg71').disabled = false; 
			document.getElementById('preg72').disabled = false; 
			document.getElementById('preg81').disabled = false; 
			document.getElementById('preg82').disabled = false; ";
echo'
    } else {  ';			echo "  document.getElementById('preg61').disabled = true;
	 document.getElementById('preg62').disabled = true;
    
        document.getElementById('preg71').disabled = true; 
		 document.getElementById('preg72').disabled = true; 
			document.getElementById('preg81').disabled = true; 
			document.getElementById('preg82').disabled = true; ";echo ' 
	        } 
		
	});
	if('.$d.'<2){
	 $("#esq_tipo2_op1'.$d.'").click(function() {  
		
			 if(($("#esq_tipo1_op10").is(":checked"))|| ($("#esq_tipo1_op11").is(":checked"))|| ($("#esq_tipo1_op12").is(":checked")) || ($("#esq_tipo2_op10").is(":checked"))|| ($("#esq_tipo2_op11").is(":checked"))) {  ';
  echo "document.getElementById('preg61').disabled = false;
  document.getElementById('preg62').disabled = false;
    
              
			 
			document.getElementById('preg71').disabled = false; 
			document.getElementById('preg72').disabled = false; 
			document.getElementById('preg81').disabled = false; 
			document.getElementById('preg82').disabled = false; ";
echo'
    } else {  ';			echo "  document.getElementById('preg61').disabled = true;
	 document.getElementById('preg62').disabled = true;
    
        document.getElementById('preg71').disabled = true; 
		 document.getElementById('preg72').disabled = true; 
			document.getElementById('preg81').disabled = true; 
			document.getElementById('preg82').disabled = true; ";echo ' 
	        } 
		
	});}
	 });  ';?>
			</script><? 
}
?>
<?php  include("seccion6.php");?>
<?php include("seccion7.php");?>

<?php include("seccion8.php");
		/*		
for($d=0;$d<$total_primus;$d++){
?>
 <script type="text/javascript"> 

 <? echo '

$(document).ready(function(){  
    $("#primus'.$d.'").click(function() {  
       if(($("#primus2").is(":checked"))|| ($("#primus3").is(":checked"))|| ($("#primus4").is(":checked"))|| ($("#primus5").is(":checked")) || ($("#primus6").is(":checked")) ||($("#idmex_alcance0").is(":checked"))||($("#idsrrc1").is(":checked"))) {  ';
  echo "document.getElementById('seccion10').style.display = 'block';";
echo'
    } else {  ';			echo "document.getElementById('seccion10').style.display = 'none';";echo ' 
	        } 
		if(($("#primus0").is(":checked"))|| ($("#primus1").is(":checked")) ||($("#idmex_alcance1").is(":checked"))|| ($("#idsrrc0").is(":checked"))|| ($("#idsrrc2").is(":checked")) ||($("#idsrrc3").is(":checked"))|| ($("#idsrrc4").is(":checked"))) {  ';
  echo "document.getElementById('seccion9').style.display = 'block';";
echo'
    } else {  ';			echo "document.getElementById('seccion9').style.display = 'none';";echo '
        }  
    });    
});';?>
			</script><? 
}
*/?><?
//////////////////
for($d=0;$d<2;$d++){
?>
<script type="text/javascript"> 

 <? echo '

$(document).ready(function(){  
    $("#idmex_alcance'.$d.'").click(function() {  
       if(($("#idmex_alcance1").is(":checked"))) {  ';
  echo "document.getElementById('seccion9').style.display = 'block';";
echo'
    } else  if(($("#primus0").is(":checked"))|| ($("#primus1").is(":checked"))|| ($("#idsrrc0").is(":checked"))|| ($("#idsrrc2").is(":checked")) ||($("#idsrrc3").is(":checked"))|| ($("#idsrrc4").is(":checked"))){  ';			echo "document.getElementById('seccion9').style.display = 'block';";echo ' 
	        } else { ';			echo "document.getElementById('seccion9').style.display = 'none';";echo ' }
			
			
	 if(($("#idmex_alcance0").is(":checked"))) {  ';
  echo "document.getElementById('seccion10').style.display = 'block';";
echo'
    } else  if(($("#primus2").is(":checked"))|| ($("#primus3").is(":checked"))|| ($("#primus4").is(":checked"))|| ($("#primus5").is(":checked")) || ($("#primus6").is(":checked"))||($("#idsrrc1").is(":checked"))){  ';			echo "document.getElementById('seccion10').style.display = 'block';";echo ' 
	        } else { ';			echo "document.getElementById('seccion10').style.display = 'none';";echo ' }
    });    
});';?>
			</script><? 
}
//////////////////
for($d=0;$d<6;$d++){
?>
<script type="text/javascript"> 

 <? echo '

$(document).ready(function(){  
    $("#idsrrc'.$d.'").click(function() {  
       if(($("#primus0").is(":checked"))|| ($("#primus1").is(":checked"))||($("#idmex_alcance1").is(":checked"))|| ($("#idsrrc0").is(":checked"))|| ($("#idsrrc2").is(":checked")) ||($("#idsrrc3").is(":checked"))|| ($("#idsrrc4").is(":checked"))) {  ';
  echo "document.getElementById('seccion9').style.display = 'block';";
echo'
    } else  if(($("#idsrrc1").is(":checked"))){  ';			echo "document.getElementById('seccion9').style.display = 'none';";echo ' 
	        } else { ';			echo "document.getElementById('seccion9').style.display = 'none';";echo ' }
			
			
	 if(($("#idsrrc1").is(":checked"))) {  ';
  echo "document.getElementById('seccion10').style.display = 'block';";
echo'
    } else  if(($("#primus2").is(":checked"))|| ($("#primus3").is(":checked"))|| ($("#primus4").is(":checked"))|| ($("#primus5").is(":checked")) || ($("#primus6").is(":checked"))||($("#idmex_alcance0").is(":checked"))){  ';			echo "document.getElementById('seccion10').style.display = 'block';";echo ' 
	        } else { ';			echo "document.getElementById('seccion10').style.display = 'none';";echo ' }
    });    
});';?>
			</script><? 
}




include("seccion9.php");
?>

<?php include("seccion10.php");?>
<?php include("seccion11.php");?>
<?php include("seccion12.php");?>

<?php include("anexo_producto.php");?>
<script type="text/javascript"> 

 <? echo '

$(document).ready(function(){  
    $("#anexo").click(function() { '; echo '
 if (!$("#anexo_producto").is(":visible"))
   $("#anexo_producto").show();
else   
   $("#anexo_producto").hide();';
	echo ' 
    });    
});';?>
			</script>
            
            
            <?php include("anexo_alm.php");?>
<script type="text/javascript"> 

 <? echo '

$(document).ready(function(){  
    $("#anexo2").click(function() { '; echo '
 if (!$("#anexo_alm").is(":visible"))
   $("#anexo_alm").show();
else   
   $("#anexo_alm").hide();';
	echo ' 
    });    
});';?>
			</script>
            
<?php include("seccion13.php");?>
</div>
</div>
</div>
</div>
</div>
</div>

<script>
window.addEventListener("beforeunload", function(event) {    

          var tp = $('#pr').val();
			
		    var post_idoperador = $('#idoperador').val();  
            var post_idsolicitud = $('#idsolicitud').val();
            var post_persona = $('#persona').val();
            var post_fecha = $('#fecha').val();
            var seccion=1;           
            //Seccion2
            var post_personal = $('#personal').val();
            var post_num_ggn = $('#num_ggn').val();
            var post_num_gln = $('#num_gln').val();
            var post_num_coc = $('#num_coc').val();
            var post_num_mex_cal_sup = $('#num_mex_cal_sup').val();
            var post_num_primus = $('#num_primus').val();
            var post_num_senasica = $('#num_senasica').val();
            var post_responsable = $('#responsable').val();
            //seccion 3
            var post_organismo = $('#organismo').val();
            var post_fecha_inicio = $('#fecha_inicio').val();
            var post_fecha_fin = $('#fecha_fin').val();
            var post_idcert_anterior = $('#idcert_anterior').val();

                  //Seccion 5
           var esq_tipo1_op1="";
            var porNombre=document.getElementsByName("esq_tipo1_op1");
            for(var i=0;i<porNombre.length;i++)
              {
                if(porNombre[i].checked){
                esq_tipo1_op1=porNombre[i].value;}
              }
			 


            //var esq_tipo1_op1 = $('#esq_tipo1_op1').val();
            var preg1_op2 = $('#preg1_op2').val();
            var preg2_op2 = $('#preg2_op2').val();
            var preg3_op2 = $('#preg3_op2').val();
            var preg1_tipo2 = $('#preg1_tipo2').val();
            var preg2_tipo2 = $('#preg2_tipo2').val();
			
		 var esq_tipo2_op1="";
            var porNombre2=document.getElementsByName("esq_tipo2_op1");
            for(var i=0;i<porNombre2.length;i++)
              {
                if(porNombre2[i].checked){
                esq_tipo2_op1=porNombre2[i].value;}
              }
			  

			
            //var esq_tipo2_op1 = $('#esq_tipo2_op1').val();
			
			 var preg3_tipo2="";
            var porNombre3=document.getElementById("preg3_tipo2");
            
                if(porNombre3.checked){
                preg3_tipo2=porNombre3.value;}
				
              var preg5_tipo2="";
            var porNombre4=document.getElementById("preg5_tipo2");
            
                if(porNombre4.checked){
                preg5_tipo2=porNombre4.value;}
             

            //var preg3_tipo2 = $('#preg3_tipo2').val();
            //var preg5_tipo2 = $('#preg5_tipo2').val();
            var preg4_tipo2 = $('#preg4_tipo2').val();
			
			 var preg61="";
            var porNombre5=document.getElementsByName("preg61");
            for(var i=0;i<porNombre5.length;i++)
              {
                if(porNombre5[i].checked){
                preg61=porNombre5[i].value;}
              }

			var preg62="";
            var porNombre5=document.getElementsByName("preg62");
            for(var i=0;i<porNombre5.length;i++)
              {
                if(porNombre5[i].checked){
                preg62=porNombre5[i].value;}
              }

 var preg71="";
            var porNombre6=document.getElementsByName("preg71");
            for(var i=0;i<porNombre6.length;i++)
              {
                if(porNombre6[i].checked){
                preg71=porNombre6[i].value;}
              }
			   var preg72="";
            var porNombre6=document.getElementsByName("preg72");
            for(var i=0;i<porNombre6.length;i++)
              {
                if(porNombre6[i].checked){
                preg72=porNombre6[i].value;}
              }

			 var preg81="";
            var porNombre7=document.getElementsByName("preg81");
            for(var i=0;i<porNombre7.length;i++)
              {
                if(porNombre7[i].checked){
                preg81=porNombre7[i].value;}
              }
			   var preg82="";
            var porNombre7=document.getElementsByName("preg82");
            for(var i=0;i<porNombre7.length;i++)
              {
                if(porNombre7[i].checked){
                preg82=porNombre7[i].value;}
              }


            var idsolicitud_esquema = $('#idsolicitud_esquema').val();
			/*
			for(var t=0;t<tp;t++)
			{
				
				
				
            var porNombrex=document.getElementById("primus".t);
			if(porNombrex.checked){
				eval("var primus" + t + " = 'porNombrex.value'"); 
                }
			}*/
            //Seccion 6
			var primus0="";
            var porNombrex=document.getElementById("primus0");
			if(porNombrex.checked){
                primus0=porNombrex.value;}
				
				
				
               
			   var primus1="";
            var porNombrex1=document.getElementById("primus1");
			if(porNombrex1.checked){
                primus1=porNombrex1.value;}
              
			   var primus2="";
            var porNombrex2=document.getElementById("primus2");
			if(porNombrex2.checked){
                primus2=porNombrex2.value;}
     
				
			   var primus3="";
            var porNombrex3=document.getElementById("primus3");
			if(porNombrex3.checked){
                primus3=porNombrex3.value;}
              
			   var primus4="";
            var porNombrex4=document.getElementById("primus4");
			if(porNombrex4.checked){
                primus4=porNombrex4.value;}
              
			   var primus5="";
            var porNombrex5=document.getElementById("primus5");
			if(porNombrex5.checked){
                primus5=porNombrex5.value;}
              
			   var primus6="";
            var porNombrex6=document.getElementById("primus6");
			if(porNombrex6.checked){
                primus6=porNombrex6.value;}
				
              
			
			  
			/* var primus="";
            var porNombre8=document.getElementsByName("primus");
            for(var i=0;i<porNombre8.length;i++)
              {
                if(porNombre8[i].checked){
                primus=porNombre8[i].value;}
              }
*/
            //var primus = $('#primus').val();
            //Seccion 7
			
			  var idmex_alcance0="";
            var porNombrex7=document.getElementById("idmex_alcance0");
			if(porNombrex7.checked){
                idmex_alcance0=porNombrex7.value;}
				 
				 var idmex_alcance1="";
            var porNombrex8=document.getElementById("idmex_alcance1");
			if(porNombrex8.checked){
                idmex_alcance1=porNombrex8.value;}
				
				 var idmex_pliego0="";
            var porNombrex9=document.getElementById("idmex_pliego0");
			if(porNombrex9.checked){
                idmex_pliego0=porNombrex9.value;}
				 
				 var idmex_pliego1="";
            var porNombrex10=document.getElementById("idmex_pliego1");
			if(porNombrex10.checked){
                idmex_pliego1=porNombrex10.value;}
				 var idmex_pliego2="";
            var porNombrex11=document.getElementById("idmex_pliego2");
			if(porNombrex11.checked){
                idmex_pliego2=porNombrex11.value;}
				 
				 var idmex_pliego3="";
            var porNombrex12=document.getElementById("idmex_pliego3");
			if(porNombrex12.checked){
                idmex_pliego3=porNombrex12.value;}
				
			/*
			 var idmex_pliego="";
            var porNombre9=document.getElementsByName("idmex_pliego");
            for(var i=0;i<porNombre9.length;i++)
              {
                if(porNombre9[i].checked){
                idmex_pliego=porNombre9[i].value;}
              }
			  */
			  
			  /* var idmex_alcance="";
            var porNombre10=document.getElementsByName("idmex_alcance");
            for(var i=0;i<porNombre10.length;i++)
              {
                if(porNombre10[i].checked){
                idmex_alcance=porNombre10[i].value;}
              }
			*/
            //var idmex_pliego = $('#idmex_pliego').val();
            //var idmex_alcance = $('#idmex_alcance').val();
            //Seccion 8
			
			 var idsrrc0="";
            var porNombrex13=document.getElementById("idsrrc0");
			if(porNombrex13.checked){
                idsrrc0=porNombrex13.value;}
				 
				 var idsrrc1="";
            var porNombrex14=document.getElementById("idsrrc1");
			if(porNombrex14.checked){
                idsrrc1=porNombrex14.value;}
				 var idsrrc2="";
            var porNombrex15=document.getElementById("idsrrc2");
			if(porNombrex15.checked){
                idsrrc2=porNombrex15.value;}
				 
				 var idsrrc3="";
            var porNombrex16=document.getElementById("idsrrc3");
			if(porNombrex16.checked){
                idsrrc3=porNombrex16.value;}
				 var idsrrc4="";
            var porNombrex17=document.getElementById("idsrrc4");
			if(porNombrex17.checked){
                idsrrc4=porNombrex17.value;}
			/* var idsrrc="";
            var porNombre11=document.getElementsByName("idsrrc");
            for(var i=0;i<porNombre11.length;i++)
              {
                if(porNombre11[i].checked){
                idsrrc=porNombre11[i].value;}
              }
			  */
           // var idsrrc = $('#idsrrc').val();
            var srrc_preg1 = $('#srrc_preg1').val();
            var srrc_preg2 = $('#srrc_preg2').val();

            //seccion 10
            var empresa = $('#empresa').val();
            var rfc2 = $('#rfc2').val();
            var direccion = $('#direccion').val();
            var direccion2 = $('#direccion2').val();
            var cp = $('#cp').val();
            var tel = $('#tel').val();
            var idprocesadora = $('#idprocesadora').val();

            //Seccion 11
            var inf_comercializacion = $('#inf_comercializacion').val();

            //Seccion 12
            var idioma_aud = $('#idioma_aud').val();
            var idioma_inf = $('#idioma_inf').val();
            //seccion 13
			 var respuesta4="";
            var porNombre12=document.getElementsByName("respuesta4");
            for(var i=0;i<porNombre12.length;i++)
              {
                if(porNombre12[i].checked){
                respuesta4=porNombre12[i].value;}
              }
			   var respuesta5="";
            var porNombre13=document.getElementsByName("respuesta5");
            for(var i=0;i<porNombre13.length;i++)
              {
                if(porNombre13[i].checked){
                respuesta5=porNombre13[i].value;}
              }
            //var respuesta4 = $('#respuesta4').val();
            //var respuesta5 = $('#respuesta5').val();
            var terminada = $('#terminada').val();
            {  
                $.ajax({  
                     url:"cerebro.php",  
                     method:"POST",
                   data:{persona:post_persona, seccion:seccion, idoperador:post_idoperador, idsolicitud:post_idsolicitud, fecha:post_fecha, personal:post_personal, num_ggn:post_num_ggn, num_gln:post_num_gln, num_coc:post_num_coc, num_mex_cal_sup:post_num_mex_cal_sup, num_primus:post_num_primus, num_senasica:post_num_senasica, responsable:post_responsable,organismo:post_organismo, fecha_inicio:post_fecha_inicio, fecha_fin:post_fecha_fin, idcert_anterior:post_idcert_anterior, esq_tipo1_op1: esq_tipo1_op1, preg1_op2:preg1_op2, preg2_op2:preg2_op2, preg3_op2:preg3_op2,  preg1_tipo2:preg1_tipo2, preg2_tipo2:preg2_tipo2, preg3_tipo2:preg3_tipo2, esq_tipo2_op1:esq_tipo2_op1, preg4_tipo2:preg4_tipo2, preg5_tipo2:preg5_tipo2, preg61:preg61,preg62:preg62, preg71:preg71, preg72:preg72, preg81:preg81,preg82:preg82, idsolicitud_esquema:idsolicitud_esquema,primus0:primus0,primus1:primus1,primus2:primus2,primus3:primus3,primus4:primus4,primus5:primus5,primus6:primus6, idmex_pliego0:idmex_pliego0,idmex_pliego1:idmex_pliego1,idmex_pliego2:idmex_pliego2,idmex_pliego3:idmex_pliego3, idmex_alcance0:idmex_alcance0,idmex_alcance1:idmex_alcance1, idsrrc0:idsrrc0,idsrrc1:idsrrc1,idsrrc2:idsrrc2,idsrrc3:idsrrc3,idsrrc4:idsrrc4, srrc_preg1:srrc_preg1, srrc_preg2:srrc_preg2, empresa:empresa, rfc2:rfc2, direccion:direccion, direccion2:direccion2, cp:cp, tel:tel, idprocesadora:idprocesadora, inf_comercializacion:inf_comercializacion, idioma_aud:idioma_aud, idioma_inf:idioma_inf, respuesta4:respuesta4, respuesta5:respuesta5, terminada:terminada},
                     dataType:"text",  
                     success:function(data)  
                     {   
                          event.returnValue = "AnthonySS";
   }  
                });  
           }

});
</script>
<script type="text/javascript">
$(document).ready(function(){  
  var inc=0;
  var inc2=0;
  
    $("#terminada").click(function() {  
	
		 var respuesta4="";
            var porNombre12=document.getElementsByName("respuesta4");
            for(var i=0;i<porNombre12.length;i++)
              {
                if(porNombre12[i].checked){
                respuesta4=porNombre12[i].value;
				inc=1;}
              } 
		if(inc==1 || inc2==1){
		
  var b=document.getElementById("terminada");
  b.value=1;
  location.href='../index.php';
	
		}
		else{swal({
  title: "Terminos de uso",
  text: "Responda esta sección",
  icon: "warning",
 
  dangerMode: true,
})}
    });  
  
 
});  
              
	

</script>
<script>
 function cambioSeccion(nId){

 }
 </script>
<script type="text/javascript">

$(document).ready(function() {

$('.error').hide();

	$("#agregar").click(function() {
	
		        var producto = $('#producto').val();
            var num_productores = $('#num_productores').val();
            var num_fincas= $('#num_fincas').val();
            //seccion 3
            var ubicacion_unidad= $('#ubicacion_unidad').val();
            var coordenadas = $('#coordenadas').val();
            var periodo_cosecha = $('#periodo_cosecha').val();
            var superficie = $('#superficie').val();
			      var libre_cubierto= $('#libre_cubierto').val();
            var cosecha_recoleccion = $('#cosecha_recoleccion').val();
            var empaque = $('#empaque').val();
            var num_trabajadores = $('#num_trabajadores').val();
            var idsolicitud = $('#idsolicitud').val();
            var insertar_prod = $('#insertar_prod').val();
			var ruta = $('#ruta').val();
			var ruta2 = $('#ruta2').val();
			var ruta3 = $('#ruta3').val();
			 var idoperador = $('#idoperador').val();
			
	  
                $.ajax({  
                     url:"cerebro.php",  
                     method:"POST",
                    data:{producto:producto,num_productores:num_productores,num_fincas:num_fincas,ubicacion_unidad:ubicacion_unidad,coordenadas:coordenadas,periodo_cosecha:periodo_cosecha,superficie:superficie,libre_cubierto:libre_cubierto,cosecha_recoleccion:cosecha_recoleccion,empaque:empaque,num_trabajadores:num_trabajadores,idsolicitud:idsolicitud,insertar_prod:insertar_prod,idoperador:idoperador},
		            	success: function(data) { 
						alert(data);
		                        $('#tabla_ajax').load(ruta); //Recargamos la Tabla(Para que se muestren los Nuevos Resultados) 
								$('#tabla_ajax2').load(ruta2);
								$('#tabla_ajax3').load(ruta3); 
		    }
		});
		return false;
	});
});


</script>


<script type="text/javascript">

$(document).ready(function() {

$('.error').hide();

	$("#agregar2").click(function() {
	
		        var p1 = $('#p1').val();
				var p2 = $('#p2').val();
			    var p3 = $('#p3').val();
    		  var p4 = $('#p4').val();
			    var p5 = $('#p5').val();
			  var p6 = $('#p6').val();
			    var p7 = $('#p7').val();
			  var p8 = $('#p8').val();
			    var p9 = $('#p9').val();
			  var p10 = $('#p10').val();
		    var p11 = $('#p11').val();
			  var p12 = $('#p12').val();
		    var p13 = $('#p13').val();
			  var p14 = $('#p14').val();
			    var p15 = $('#p15').val();
			  var p16 = $('#p16').val();
		    var p17 = $('#p17').val();
			  var p18 = $('#p18').val();
			    var p19 = $('#p19').val();
         
            var idsolicitud = $('#idsolicitud').val();
            var insertar_anexo_p = $('#insertar_anexo_p').val();
			var ruta2 = $('#ruta2').val();
			 var idoperador = $('#idoperador').val();
			
	  
                $.ajax({  
                     url:"cerebro.php",  
                     method:"POST",
                    data:{p1:p1,p2:p2,p3:p3,p4:p4,p5:p5,p6:p6,p7:p7,p8:p8,p9:p9,p10:p10,p11:p11,p12:p12,p13:p13,p14:p14,p15:p15,p16:p16,p17:p17,p18:p18,p19:p19,idsolicitud:idsolicitud,insertar_anexo_p:insertar_anexo_p,idoperador:idoperador},
		            	success: function() { 
		                        $('#tabla_ajax2').load(ruta2); //Recargamos la Tabla(Para que se muestren los Nuevos Resultados)
		    }
		});
		return false;
	});
});


</script>

<script>
$(document).ready(function(){  
  
   var act1="";
            var porNombre=document.getElementsByName("esq_tipo1_op10");
			 var porNombre2=document.getElementsByName("esq_tipo1_op11");
			  var porNombre3=document.getElementsByName("esq_tipo1_op12");
			  var porNombre4=document.getElementsByName("esq_tipo2_op10");
			  var porNombre5=document.getElementsByName("esq_tipo2_op11");
            for(var i=0;i<porNombre.length;i++)
              {
                if(porNombre[i].checked){
                //esq_tipo1_op1=porNombre[i].value;}
				act1=1;
         
        } 
      }
	   for(var i=0;i<porNombre2.length;i++)
              {
                if(porNombre2[i].checked){
                //esq_tipo1_op1=porNombre[i].value;}
				act1=1;
         
        } 
      }
	   for(var i=0;i<porNombre3.length;i++)
              {
                if(porNombre3[i].checked){
                //esq_tipo1_op1=porNombre[i].value;}
				act1=1;
         
        } 
      }
	   for(var i=0;i<porNombre4.length;i++)
              {
                if(porNombre4[i].checked){
                //esq_tipo1_op1=porNombre[i].value;}
				act1=1;
         
        } 
      }
	   for(var i=0;i<porNombre5.length;i++)
              {
                if(porNombre5[i].checked){
                //esq_tipo1_op1=porNombre[i].value;}
				act1=1;
         
        } 
      }
	  if(act1==1)
	  {
  document.getElementById("preg61").disabled = false;
    document.getElementById("preg71").disabled = false; 
			document.getElementById("preg81").disabled = false;
			 document.getElementById("preg62").disabled = false;
    document.getElementById("preg72").disabled = false; 
			document.getElementById("preg82").disabled = false;
         
           
        } else {  
            
			document.getElementById("preg61").disabled = true;
    document.getElementById("preg71").disabled = true; 
			document.getElementById("preg81").disabled = true;
			document.getElementById("preg62").disabled = true;
    document.getElementById("preg72").disabled = true; 
			document.getElementById("preg82").disabled = true;
        }  
    
  
});  

</script>


<?php include("includes/footer.php");?>
</html>