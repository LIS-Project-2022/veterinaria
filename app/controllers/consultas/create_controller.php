<?php
    require_once('../../app/models/consulta.class.php');
    try
    {
        $consulta = new Consulta;
        $pacientes = $consulta->getPacientes();
        if(isset($_POST['agregar']))
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

            if($consulta->create())
            {
                Page::showMessage(1, 'Consulta creada', 'index.php');
            }
            else
            {
                throw new Exception(Database::getException());
            }
        }
    }
    catch (Exception $error) {
        Page::showMessage(3, $error->getMessage(), '');
    }
    require_once('../../app/views/consultas/create.php');
?>