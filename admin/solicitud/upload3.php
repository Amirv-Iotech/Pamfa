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
$name=basename($_FILES["file2"]["name"]);

$fileName = $uploaddir.normaliza($name); // The file name
$fileTmpLoc = $_FILES["file2"]["tmp_name"]; // File in the PHP tmp folder
$fileType = $_FILES["file2"]["type"]; // The type of file it is
$fileSize = $_FILES["file2"]["size"]; // File size in bytes
$fileErrorMsg = $_FILES["file2"]["error"]; // 0 for false... and 1 for true
if (!$fileTmpLoc) { // if file not chosen
    echo "ERROR: Por favor seleccione un archivo.";
    exit();
}
if(move_uploaded_file($fileTmpLoc, "docs/$fileName")){
   
	mysql_select_db($database_pamfa, $inforgan_pamfa);

	
	$query_origen = "SELECT * FROM solicitud_mcs where idsolicitud='".$_POST['idsolicitud']."'";
$origen = mysql_query($query_origen , $inforgan_pamfa) or die(mysql_error());

$total_origen = mysql_num_rows($origen);


if($total_origen>0){

$insertSQL6 = "update solicitud_mcs set anexo='".$fileName."' WHERE  idsolicitud='".$_POST['idsolicitud']."'";


}

else{
	
	$insertSQL6 = "insert into solicitud_mcs (idsolicitud,anexo) VALUES ('".$_POST['idsolicitud']."','".$fileName."')";
}
						  
$Result1 = mysql_query($insertSQL6, $inforgan_pamfa) or die(mysql_error());
	
	

	
	echo " Enviado";
	
} else {
    echo "move_uploaded_file Error";
}



?>