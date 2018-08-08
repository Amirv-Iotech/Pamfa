<?php require_once('../../Connections/inforgan_pamfa.php');

/////UPLOAD ARCHIVOS
function normaliza ($cadena){
    $originales = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞ
ßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿŔŕ';
    $modificadas = 'aaaaaaaceeeeiiiidnoooooouuuuy
bsaaaaaaaceeeeiiiidnoooooouuuyybyRr';
    $cadena = utf8_decode($cadena);
    $cadena = strtr($cadena, utf8_decode($originales), $modificadas);
    $cadena = strtolower($cadena);
    return utf8_encode($cadena);
}
//if($_POST['a']>0){


$fecha=time();
$uploaddir = "".$fecha;
//$uploadfile = $uploaddir . basename($_FILES['archivo']['name']);
$band1=0;
$band2=0;
$dos=0;
if($_FILES["file3"]["tmp_name"]!=NULL){
$name=basename($_FILES["file3"]["name"]);

$fileName = $uploaddir.normaliza($name); // The file name
$fileTmpLoc = $_FILES["file3"]["tmp_name"]; // File in the PHP tmp folder
$fileType = $_FILES["file3"]["type"]; // The type of file it is
$fileSize = $_FILES["file3"]["size"]; // File size in bytes
$fileErrorMsg = $_FILES["file3"]["error"]; // 0 for false... and 1 for true
$band1=1;
$dos++;
}
if( $_FILES["file4"]["tmp_name"]!=NULL){
$name=basename($_FILES["file4"]["name"]);

$fileName = $uploaddir.normaliza($name); // The file name
$fileTmpLoc = $_FILES["file4"]["tmp_name"]; // File in the PHP tmp folder
$fileType = $_FILES["file4"]["type"]; // The type of file it is
$fileSize = $_FILES["file4"]["size"]; // File size in bytes
$fileErrorMsg = $_FILES["file4"]["error"]; // 0 for false... and 1 for true
$band2=1;
$dos++;
$_POST['n']=$_POST['n2'];
}
if($dos==1){
if (!$fileTmpLoc) { // if file not chosen
    echo "ERROR: Por favor seleccione un archivo.";
    exit();
}
if(move_uploaded_file($fileTmpLoc, "docs/$fileName")){
   
	mysql_select_db($database_pamfa, $inforgan_pamfa);

	
	
	
	$insertSQL6 = "insert into medicion_mexcalsup (idsolicitud,producto,anexo".$_POST['n'].") VALUES ('".$_POST['idsolicitud']."','".$_POST['e']."','".$fileName."')";
					  
$Result1 = mysql_query($insertSQL6, $inforgan_pamfa) or die(mysql_error());
	
	

	
	echo " Enviado";
	
} else {
    echo "move_uploaded_file Error";
}

}
if($dos==2){
	
	if($_FILES["file3"]["tmp_name"]!=NULL){
$name3=basename($_FILES["file3"]["name"]);

$fileName3 = $uploaddir.normaliza($name3); // The file name
$fileTmpLoc3 = $_FILES["file3"]["tmp_name"]; // File in the PHP tmp folder
$fileType3 = $_FILES["file3"]["type"]; // The type of file it is
$fileSize3 = $_FILES["file3"]["size"]; // File size in bytes
$fileErrorMsg3 = $_FILES["file3"]["error"]; // 0 for false... and 1 for true

}
if( $_FILES["file4"]["tmp_name"]!=NULL){
$name4=basename($_FILES["file4"]["name"]);

$fileName4 = $uploaddir.normaliza($name4); // The file name
$fileTmpLoc4 = $_FILES["file4"]["tmp_name"]; // File in the PHP tmp folder
$fileType4 = $_FILES["file4"]["type"]; // The type of file it is
$fileSize4 = $_FILES["file4"]["size"]; // File size in bytes
$fileErrorMsg4 = $_FILES["file4"]["error"]; // 0 for false... and 1 for true

}
	
if(move_uploaded_file($fileTmpLoc3, "docs/$fileName3")&& move_uploaded_file($fileTmpLoc4, "docs/$fileName4") ){
   
	mysql_select_db($database_pamfa, $inforgan_pamfa);

	
	
	
	$insertSQL6 = "insert into medicion_mexcalsup (idsolicitud,producto,anexo1,anexo2) VALUES ('".$_POST['idsolicitud']."','".$_POST['e']."','".$fileName3."','".$fileName4."')";
					  
$Result1 = mysql_query($insertSQL6, $inforgan_pamfa) or die(mysql_error());
	
	
	
	

	
	echo " Enviado";
	
} 

else {
    echo "move_uploaded_file Error";
}

}

?>