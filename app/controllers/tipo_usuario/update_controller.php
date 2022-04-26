<?php
    require_once('../../app/models/tipo_usuario.class.php');
    require_once('../../app/middleware/auth.class.php');

    try
    {
        //Verifica si es administrador
        Auth::checkAdmin();

        $tipo_usuario = new TipoUsuario;
        if(!isset($_GET['id']))
        {
            Page::showMessage(2, 'Seleccione un usuario', 'index.php');
        }
        else if(!$tipo_usuario->setIdTipoUsuario($_GET['id']))
        {
            Page::showMessage(2, 'El id de usuario no es valido', 'index.php');
        }
        else if(!$tipo_usuario->getIdTipoUsuario())
        {
            Page::showMessage(2, 'El usuario no existe', 'index.php');
        }
        else
        {
            $tipo = $tipo_usuario->getTipoUsuarioForId();
            require_once('../../app/views/tipo_usuario/update.php');
            if(isset($_POST['modificar']))
            {
                $_POST = $tipo_usuario->validateForm($_POST);

                if(!$tipo_usuario->setTipoUsuario($_POST['tipo_usuario']))
                {
                    throw new Exception('Ingrese el tipo de usuario solo con letras');
                }
                else
                {
                    if($tipo_usuario->update())
                    {
                        Page::showMessage(1, "Tipo de Usuario modificado", "index.php");
                    }
                    else
                    {
                        throw new Exception('Ocurrio un problema al momento de modificar al usuario');
                    }
                }
            }
        }
    }
    catch (Exception $error)
    {
        Page::showMessage(3, $error->getMessage(), '');
    }

    
?>