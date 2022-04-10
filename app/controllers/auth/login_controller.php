<?php
    require_once('../../app/models/usuario.class.php');
    try
    {
        if(isset($_POST['acceder']))
        {
            $usuario = new Usuario;

            $_POST = $usuario->validateForm($_POST);

            if(!$usuario->setCorreo($_POST['correo']))
            {
                throw new Exception('Ingrese su correo electronico');
            }
            if(!$usuario->setPassword($_POST['password']))
            {
                throw new Exception('Ingrese su contraseña');
            }

            if($usuario->checkPassword())
            {
                $infoAuth = $usuario->getInfoSession();
                if($infoAuth['estado'] == 1)
                {
                    $_SESSION['auth'] = $infoAuth;
                    header('Location: ../../dashboard/home');
                }
                else
                {
                    throw new Exception('Su usuario esta desactivado, por favor contactar con el administrador');
                }
            }
            else
            {
                throw new Exception('El correo o la contraseña son incorrectas');
            }
        }
    }
    catch(Exception $error)
    {
        Page::showMessage(3, $error->getMessage(), '');
    }
    require_once('../../app/views/public/login.php');
?>