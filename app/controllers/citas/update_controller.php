<?php
    require_once('../../app/models/cita.class.php');
    require_once('../../app/middleware/auth.class.php');

    try
    {
        //Verifica si es administrador
        Auth::checkAdmin();

        $citas = new Cita;
        if(!isset($_GET['id']))
        {
            Page::showMessage(2, 'Seleccione la cita', 'index.php');
        }
        else if(!$citas->setIdCita($_GET['id']))
        {
            Page::showMessage(2, 'El id de la cita no es valido', 'index.php');
        }
        else if(!$citas->getIdCita())
        {
            Page::showMessage(2, 'La cita no exite', 'index.php');
        }
        else
        {
            $animalNombre = $citas->getIdregistroAnimal();
            $tipoCita = $citas->getIdTipoCita();
            require_once('../../app/views/citas/update.php');
            if(isset($_POST['modificar']))
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
                    if($citas->update())
                    {
                        Page::showMessage(1, "Cita modificada.", "index.php");
                    }
                    else
                    {
                        throw new Exception('Ocurrio un problema al momento de modificar la cita');
                    }
                }
            }
        }
    }
    catch (Exception $error)
    {
        Page::showMessage(3, $error->getMessage(), '');
    }

    
?>