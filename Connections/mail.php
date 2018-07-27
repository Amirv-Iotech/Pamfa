<?php 

$dac = basename($_SERVER['PHP_SELF']);
echo $dac;
if($dac=='rev.php'){
include_once("../../PHPMailer/class.phpmailer.php");
include_once("../../PHPMailer/class.smtp.php");
}
if($dac=='config.php'){
include_once("../PHPMailer/class.phpmailer.php");
include_once("../PHPMailer/class.smtp.php");
}

$mail = new PHPMailer();
$mail->IsSMTP();
//$mail->SMTPSecure = "ssl";
$mail->SMTPDebug = 0;  // debugging: 1 = errors and messages, 2 = messages only
	$mail->SMTPAuth = true;  // authentication enabled
	$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for GMail
 $mail->Host = 'smtp.mailtrap.io';
 $mail->SMTPAuth = true;

//$mail->Port = 25;
$mail->Port = 465;
 $mail->Username = 'cf83702fd87684';
  $mail->Password = 'f1d7231c8fe3c7s';
//$mail->SMTPDebug = 1;
$mail->From = "soporte@pamfa.org";
$mail->FromName = utf8_decode("prueba-pamfa");
$mail->AddBCC("amirv90@gmail.com", "correo Oculto");

?>