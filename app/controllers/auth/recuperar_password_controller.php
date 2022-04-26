<?php
    require_once('../../app/models/usuario.class.php');
    require_once('../../app/helpers/phpmailer/mail.class.php');
    try
    {
        $usuario = new Usuario;
        $mail = new Mail;
        if(isset($_POST['recuperar']))
        {
            $_POST = $usuario->validateForm($_POST);
            if(!$usuario->setUsuario($_POST['usuario']))
            {
                throw new Exception('Ingrese su usuario');
            }
            if(!$usuario->setCorreo($_POST['correo']))
            {
                throw new Exception('Ingrese su correo electrónico');
            }
            if(!$usuario->checkData())
            {
                throw new Exception('El usuario o el correo electrónico son incorrectos');
            }
            if(!$usuario->createToken())
            {
                throw new Exception('Ocurrio un problema al crear el token');
            }

            if(!$mail->sendEmail( $usuario->getCorreo(), $usuario->getToken() ))
            {
                throw new Exception('Ocurrio un problema al enviar el correo');
            }
            else
            {
                Page::showMessage(1, 'El correo te fue enviado, revisa tu bandeja de entrada', 'index.php');
            }
        }
        
        if(isset($_GET['token']))
        {
            if(!$usuario->setToken($_GET['token']))
            {
                Page::showMessage(3, 'El token es invalido', 'recuperar.php');
            }
            if(!$usuario->checkToken())
            {
                Page::showMessage(3, 'El token no existe', 'recuperar.php');
            }

            if(isset($_POST['change']))
            {
                $_POST = $usuario->validateForm($_POST);
                if(!$usuario->setPassword($_POST['password']))
                {
                    throw new Exception('Ingrese la contraseña');
                }
                if($_POST['password_confirm'] === '')
                {
                    throw new Exception('Confirme su contraseña');
                }
                if($_POST['password'] !== $_POST['password_confirm'])
                {
                    throw new Exception('Las contraseñas no son coinciden');
                }

                if($usuario->changePass())
                {
                    Page::showMessage(1, 'Inicia sesion con tú nueva contraseña', 'index.php');
                }
                else
                {
                    Page::showMessage(2, Database::getException(), '');
                }
                
            }
        }
        
    }
    catch (Exception $error)
    {
        Page::showMessage(3, $error->getMessage(), '');
    }
    require_once('../../app/views/public/recuperar.php');
?>