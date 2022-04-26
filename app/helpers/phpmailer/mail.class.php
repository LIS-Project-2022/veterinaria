<?php

header('Access-Control-Allow-Origin: *');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once('PHPMailer.php');
require_once('SMTP.php');
require_once('Exception.php');

class Mail{
    private $mail;

    function __construct()
    {
        $this->mail = new PHPMailer(true);
    }

    public function sendEmail($correo, $token)
    {
        try
        {
            //Server settings
            // $this->mail->SMTPDebug = SMTP::DEBUG_SERVER;
            $this->mail->isSMTP();
            $this->mail->SMTPDebug = 0;
            $this->mail->Host         = "smtp.gmail.com";
            $this->mail->SMTPAuth     = true;
            $this->mail->Username     = "xavierportafolio@gmail.com";
            $this->mail->Password     = "Canjura.2k";
            $this->mail->SMTPSecure   = "ssl";
            // $this->mail->SMTPSecure   = PHPMailer::ENCRYPTION_SMTPS;
            $this->mail->Port         = 465;

            //Recipients
            $this->mail->setFrom($correo);
            $this->mail->addAddress($correo);

            //Content
            $this->mail->isHTML(true);                                  
            $this->mail->Subject = "Recuperacion de contraseña Veterinaria PET ZONA";
            $this->mail->Body    = "<h2>RECUPERA TU CONTRASEÑA</h2> <br/> <p>Ingresa al siguiente enlace para cambiar tu contraseña: <a href='http://localhost/veterinaria/public/login/recuperar.php?token=$token'>recuperar contraseña</a></p>";
            // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            if($this->mail->send())
            {
                return true;
            }
            else
            {
                return false;
            }
        }
        catch(Exception $error)
        {
            echo $error->getMessage();
            return false;
        }
    }
}

// $nombre = $_POST['nombre'];
// $correo = $_POST['correo'];
// $mensaje = $_POST['mensaje'];
// $recultado = array('enviado'=>false );

?>