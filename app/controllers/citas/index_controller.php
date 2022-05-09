<?php
    require_once('../../app/models/cita.class.php');
    require_once('../../app/middleware/auth.class.php');

    try
    {
        //Verifica si es administrador
        Auth::checkAdmin();

        $citas = new Cita;

        $citas = $citas->getIdCita();
        require_once('../../app/views/citas/index.php');
    }
    catch(Exception $error)
    {
        Page::showMessage(2, $error->getMessage(), "");
    }
    
?>