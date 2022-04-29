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
            require_once('../../app/views/consultas/update.php');
        }

        if(isset($_POST['modificar']))
        {
            if(!isset($_POST['paciente']) || !$consulta->setIdRegistroAnimal($_POST['paciente']))
            {
                throw new Exception('Ingrese el paciente');
            }

            if(!$consulta->setPeso($_POST['peso']))
            {
                throw new Exception('Ingrese el peso del paciente'); 
            }

            if(!$consulta->setDiagnostico($_POST['diagnostico']))
            {
                throw new Exception('Ingrese el diagnostico del paciente');
            }

            if($consulta->update())
            {
                Page::showMessage(1, 'Consulta modificada', 'index.php');
            }
            else
            {
                throw new Exception(Database::getException());
            }
        }
        
    }
    catch(Exception $error) {
        Page::showMessage(3, $error->getMessage(), '');
    }
?>