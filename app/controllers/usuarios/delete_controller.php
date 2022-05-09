<?php
    require_once('../../app/models/usuario.class.php');
    require_once('../../app/middleware/auth.class.php');

    try
    {
        //Verifica si es administrador
        Auth::checkAdmin();
        
        $usuario = new Usuario;
        if(!isset($_GET['id']))
        {
            Page::showMessage(2, 'Seleccione un usuario', 'index.php');
        }
        if($_GET['id'] == $_SESSION['auth']['id_usuario'])
        {
            Page::showMessage(2, 'El id de usuario no es valido', 'index.php');
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