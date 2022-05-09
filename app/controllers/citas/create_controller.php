<?php
    require_once('../../app/models/cita.class.php');
    require_once('../../app/middleware/auth.class.php');
    try
    {
        //Verifica si es administrador
        Auth::checkAdmin();

        $citas = new Cita;
        
        $animalNombre = $citas->getIdregistroAnimal();
        $tipoCita = $citas->getIdTipoCita();
        
        if(isset($_POST['agregar']))
        {
            $_POST = $citas->validateForm($_POST);

            if(!isset($_POST['animal_nombre']) || !$citas->setIdRegistroAnimal($_POST['animal_nombre']))
            {
                $_POST['animal_nombre'] = '';
                throw new Exception('Seleccione su mascota.');
            }
            else if(!$citas->setFecha($_POST['fecha']))
            {
                throw new Exception('Ingrese una fecha.');
            }
            else if(!$citas->setHora($_POST['hora']))
            {
                throw new Exception('Ingrese una hora.');
            }
            else if(!isset($_POST['tipo_cita']) || !$citas->setIdTipoCita($_POST['tipo_cita']))
            {
                $_POST['tipo_cita'] = '';
                throw new Exception('Seleccione el tipo de cita.');
            }
            else
            {
                if($citas->create())
                {
                    Page::showMessage(1, "Cita creada.", "index.php");
                }
                else
                {
                    throw new Exception('Ocurrio un problema al momento de crear la cita');
                }
            }
            
            
        }
    }
    catch (Exception $error) {
        Page::showMessage(3, $error->getMessage(), '');
    }
    require_once('../../app/views/citas/create.php');
?>