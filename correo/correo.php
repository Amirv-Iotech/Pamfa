<?
include_once("../Connections/mail.php");
 
 echo __FILE__;
//dirección del correo

        $mail->AddAddress($_POST['correo']);

        $mail->Subject = utf8_decode($_POST['asunto']);
        $mail->Body = utf8_decode($_POST['cuerpo']);
        $mail->MsgHTML(utf8_decode($_POST['cuerpo']));
        // para enviar el correo
        $mail->Send();
        // limpiar la lista de correos que se van guardando
        $mail->ClearAddresses();
		echo("fin");
		
		?>