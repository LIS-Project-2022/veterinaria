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
            Page::showMessage(2, 'Seleccione un tipo de usuario', 'index.php');
        }
        else if(!$tipo_usuario->setIdTipoUsuario($_GET['id']))
        {
            Page::showMessage(2, 'El id del tipo usuario no es valido', 'index.php');
        }
        else if(!$tipo_usuario->getIdTipoUsuario())
        {
            Page::showMessage(2, 'El tipo usuario no existe', 'index.php');
        }
        else
        {
            require_once('../../app/views/usuarios/delete.php');
            if(isset($_POST['eliminar']))
            {
                if($tipo_usuario->delete())
                {
                    Page::showMessage(1, 'Tipo de Usuario Eliminado', 'index.php');
                }
                else
                {
                    throw new Exception('Ocurrios un problema al momento de eliminar al tipo de usuario');
                }
            }
        }
    }
    catch(Exception $error)
    {
        Page::showMessage(3, $error->getMessage(), '');
    }
?>