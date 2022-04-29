<?php
    require_once('../../app/models/consulta.class.php');
    try
    {
        $consulta = new Consulta;

        if(!isset($_GET['id']))
        {
            Page::showMessage(3, 'Seleccione una consulta para modificarla', 'index.php');
        }
        if(!$consulta->setIdConsulta($_GET['id']))
        {
            Page::showMessage(3, 'El id de la consulta es invalido', 'index.php');
        }
        if(!$consulta->getConsultaForId())
        {
            Page::showMessage(3, 'No existe consulta con ese id', 'index.php');
        }
        else
        {
            $pacientes = $consulta->getPacientes();
            require_once('../../app/views/consultas/delete.php');
        }

        if(isset($_POST['eliminar']))
        {
            if($consulta->delete())
            {
                Page::showMessage(1, 'La consulta fue eliminada', 'index.php');
            }
            else
            {
                throw new Exception(Database::getException());
            }
        }
    }
    catch(Exception $error)
    {
        Page::showMessage(3, $error->getMessage(), '');
    }
?>