<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class Mailer{

    function enviarEmail($email, $asunto, $cuerpo) {
        require_once '../Conexiones/config.php';
        require '../../phpmailer/src/PHPMailer.php';
        require '../../phpmailer/src/SMTP.php';
        require '../../phpmailer/src/Exception.php';

        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_OFF;                //Enable verbose debug output
            $mail->isSMTP();                                   //Send using SMTP
            $mail->Host       = MAIL_HOST;                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                          //Enable SMTP authentication
            $mail->Username   = MAIL_USER;                     //SMTP username
            $mail->Password   = MAIL_PASS;                     //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;   //Enable implicit TLS encryption
            $mail->Port       = MAIL_PORT;                     //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Correo Emisor y Nombre
            $mail->setFrom( MAIL_USER , 'Bikers Association Industry Around the World');
            //Correo Receptor y Nombre
            $mail->addAddress( $email );

            //Content
            $mail->isHTML(true);
            $mail->Subject = $asunto;

            $mail->Body    = utf8_decode($cuerpo);

            $mail->setLanguage('es', '../../phpmailer/language/phpmailer.lang-es.php' );

            if($mail->send()){
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            echo "Error Al Enviar El Correo: {$mail->ErrorInfo}";
            return false;
        }
    }


}