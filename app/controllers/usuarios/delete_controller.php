<?php
    require_once('../../app/models/usuario.class.php');

    try
    {
        $usuario = new Usuario;
        if(!isset($_GET['id']))
        {
            Page::showMessage(2, 'Seleccione un usuario', 'index.php');
        }
        else if(!$usuario->setIdUsuario($_GET['id']))
        {
            Page::showMessage(2, 'El id de usuario no es valido', 'index.php');
        }
        else if(!$usuario->getUsuarioForId())
        {
            Page::showMessage(2, 'El usuario no existe', 'index.php');
        }
        else
        {
            require_once('../../app/views/usuarios/delete.php');
            if(isset($_POST['eliminar']))
            {
                if($usuario->delete())
                {
                    Page::showMessage(1, 'Usuario Eliminado', 'index.php');
                }
                else
                {
                    throw new Exception('Ocurrios un problema al momento de eliminar al usuario');
                }
            }
        }
    }
    catch(Exception $error)
    {
        Page::showMessage(3, $error->getMessage(), '');
    }
?>