<?php
    require_once('../../app/models/usuario.class.php');

    try
    {
        $usuario = new Usuario;

        $usuarios = $usuario->getUsuarios();
        require_once('../../app/views/usuarios/index.php');
    }
    catch(Exception $error)
    {
        Page::showMessage(2, $error->getMessage(), "");
    }
    
?>