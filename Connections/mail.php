<?php 
include_once("../PHPMailer/class.phpmailer.php");
include_once("../PHPMailer/class.smtp.php");
$mail = new PHPMailer();
$mail->IsSMTP();
//$mail->SMTPSecure = "ssl";
 $mail->Host = 'smtp.mailtrap.io';
//$mail->Port = 25;
$mail->Port = 25;
$mail->SMTPAuth = true;
 $mail->Username = 'cf83702fd87684';
  $mail->Password = 'f1d7231c8fe3c7';
//$mail->SMTPDebug = 1;
$mail->From = "soporte@pamfa.org";
$mail->FromName = utf8_decode("prueba-pamfa");
$mail->AddBCC("amirv90@gmail.com", "correo Oculto");

?>