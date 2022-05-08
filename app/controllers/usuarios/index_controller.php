<?php
    require_once('../../app/models/usuario.class.php');
    require_once('../../app/middleware/auth.class.php');

    try
    {
        //Verifica si es administrador
        Auth::checkAdmin();

        $usuario = new Usuario;

        $usuarios = $usuario->getUsuarios();
        require_once('../../app/views/usuarios/index.php');
    }
    catch(Exception $error)
    {
        Page::showMessage(2, $error->getMessage(), "");
    }
    
?>