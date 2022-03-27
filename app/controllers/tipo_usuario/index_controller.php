<?php
    require_once('../../app/models/tipo_usuario.class.php');

    try
    {
        $tipo_usuario = new TipoUsuario;

        $tipo_usuario = $tipo_usuario->getTipoUsuarios();
        require_once('../../app/views/tipo_usuario/index.php');
    }
    catch(Exception $error)
    {
        Page::showMessage(2, $error->getMessage(), "");
    }
    
?>