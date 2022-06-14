<?php
function validar($dato)
{
    trim($dato);
    stripslashes($dato);
    htmlspecialchars($dato);

    return $dato;
}
function filtrarEmail($emailTemp)
{
    $emailTemp = filter_var($emailTemp, FILTER_VALIDATE_EMAIL);
    $emailTemp = filter_var($emailTemp, FILTER_SANITIZE_EMAIL);
    return $emailTemp;
};

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["email"]) && isset($_POST["nombre"]) && isset($_POST["asunto"]) && isset($_POST["textoCorreo"])) {
        $email = $_POST["email"];
        $nombre = $_POST["nombre"];
        $asunto = $_POST["asunto"];
        $textoCorreo = $_POST["textoCorreo"];

        $email = validar($email);
        $email = filtrarEmail($email);
        $nombre = validar($nombre);
        $asunto = validar($asunto);
        $textoCorreo = validar($textoCorreo);
    } else {
        echo "ERROR 1";
    }
} else {
    echo "ERROR 0";
}
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
//Load Composer's autoloader
require './vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //API ec61b36f321f2b1cfb864b4b50eba798
    //CLAVE 087d8ac9bfa991d3f648b44d0a3e17a9

    $mail->isSMTP();
    $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        )
    );

    $mail->Host = 'in-v3.mailjet.com'; // host
    $mail->SMTPAuth = true;
    $mail->Username = '9bed9d1cbf9d68507840fb48bcad8c2c'; //API_KEY username
    $mail->Password = '539e227ae490f3006a0d69940494045e'; //SECRET_KEY password
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587; //smtp port

    //$mail->setFrom('SENDER_EMAIL_ADDRESS', 'SENDER_NAME');
    $mail->setFrom('jcocunero@gmail.com', "RapperBuy");
    //$mail->addAddress('RECIPIENT_EMAIL_ADDRESS', 'RECIPIENT_NAME');
    $mail->addAddress('jcocunero@gmail.com', "$nombre");

    $mail->isHTML(true);
    $mail->Subject = "$asunto";
    $mail->Body    = "La persona con nombre: $nombre <br/> Con e-mail: $email<br/> Ha escrito el siguiente mensaje: <br/><br/> $textoCorreo";

    if (!$mail->send()) {
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {

        $_SESSION["Enviado"] = true;
        header('Location: ../contacto.php');
    }
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
