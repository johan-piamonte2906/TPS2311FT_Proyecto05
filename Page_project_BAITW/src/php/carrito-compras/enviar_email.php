<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../Conexiones/config.php';
require '../../phpmailer/src/PHPMailer.php';
require '../../phpmailer/src/SMTP.php';
require '../../phpmailer/src/Exception.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_OFF;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = MAIL_HOST;                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = MAIL_USER;                     //SMTP username
    $mail->Password   = MAIL_PASS;                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = MAIL_PORT;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom( MAIL_USER , 'Bikers Association Industry Around the World');
    $mail->addAddress('johanm2004@gmail.com', 'Soporte Bikers Association Industry Around the World');
    
    //Content
    $mail->isHTML(true);
    $mail->Subject = 'Detalles de la Compra';
    $cuerpo = '<h3>Gracias Por Tu Compra</h3>';
    $cuerpo .= '<p>El ID De Su Compra Es <b>'. $id_transaccion . '</b></p>' ;
    $mail->Body    = utf8_decode($cuerpo);
    $mail->AltBody = 'Envio Detalles De Compra';
    $mail->setLanguage('es', '../../phpmailer/language/phpmailer.lang-es.php' );

    $mail->send();
} catch (Exception $e) {
    echo "Error Al Enviar El Correo: {$mail->ErrorInfo}";
}