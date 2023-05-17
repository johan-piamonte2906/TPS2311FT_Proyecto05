<?php

use PHPMailer\PHPMailer\{PHPMailer, SMTP, Exception};

require '../../phpmailer/src/PHPMailer.php';
require '../../phpmailer/src/SMTP.php';
require '../../phpmailer/src/Exception.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'projectbaitw.05@gmail.com';                     //SMTP username
    $mail->Password   = '3227238532Mp.';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('detallespagos@bicycleassociationindustryaroundtheworld.com', 'Bikers Association Industry Around the World');
    $mail->addAddress('soporte@bicycleassociationindustryaroundtheworld.com', 'Soporte Bikers Association Industry Around the World');     //Add a recipient
    
    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Detalles de la Compra';
    $cuerpo = '<h3>Gracias Por Tu compra</h3>';
    $cuerpo .= '<p>El ID De Su Compra Es <b>'. $id_transaccion . '</b></p>' ;
    $mail->Body    = utf8_decode($cuerpo);
    $mail->AltBody = 'Envio Detalles De Compra';
    $mail->setLanguage('es', '../../phpmailer/language/phpmailer.lang-es.php' );

    $mail->send();
} catch (Exception $e) {
    echo "error al enviar el email: {$mail->ErrorInfo}";
}