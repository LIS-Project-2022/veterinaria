<?php
    require_once('../../app/models/cita.class.php');
    require_once('../../app/middleware/auth.class.php');

    try
    {

        $citas = new Cita;
        if(!isset($_GET['id']))
        {
            Page::showMessage(2, 'Seleccione una cita', 'index.php');
        }
        else if(!$citas->setIdCita($_GET['id']))
        {
            Page::showMessage(2, 'El id de la cita no es valido', 'index.php');
        }
        else if(!$citas->getCitabyID())
        {
            Page::showMessage(2, 'La cita no exite', 'index.php');
        }
        else
        {
            require_once('../../app/views/citas/delete.php');
            if(isset($_POST['eliminar']))
            {
                if($citas->delete())
                {
                    Page::showMessage(1, 'La cita fue Eliminada', 'index.php');
                }
                else
                {
                    throw new Exception('Ocurrios un problema al momento de eliminar la cita');
                }
            }
        }
    }
    catch(Exception $error)
    {
        Page::showMessage(3, $error->getMessage(), '');
    }
?>