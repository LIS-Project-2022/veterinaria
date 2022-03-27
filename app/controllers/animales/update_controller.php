<?php
    require_once('../../app/models/registro_animal.class.php');
    require_once('../../app/models/propietario.class.php');

    try
    {
        $propietario = new Propietario;
        $animal = new RegistroAnimal;

        if(!isset($_GET['id']))
        {
            Page::showMessage(2, 'Seleccione un animal', 'index.php');
        }
        else if(!$animal->setIdRegistroAnimal($_GET['id']))
        {
            Page::showMessage(2, 'El id del animal no es valido', 'index.php');
        }
        else if(!$animal->getAnimal())
        {
            Page::showMessage(2, 'El animal no existe', 'index.php');
        }
        else
        {
            $propietario->setIdPropietario( $animal->getIdPropietario() );
            $propietario->getPropietario();
            require_once('../../app/views/animales/update.php');
            if(isset($_POST['modificar']))
            {
                if(!$propietario->setNombres($_POST['nombres_p']))
                {
                    throw new Exception('Ingrese los nombres del propietario');
                }
                else if(!$propietario->setApellidos($_POST['apellidos_p']))
                {
                    throw new Exception('Ingrese los apellidos del propietario');
                }
                else if(!$propietario->setTelefono($_POST['telefono_p']))
                {
                    throw new Exception('Ingrese el numero de telefono del propietario');
                }
                else if(!$animal->setNombre($_POST['nombre_a']))
                {
                    throw new Exception('Ingrese el nombre del animal');
                }
                else if(!$animal->setSexo($_POST['sexo']))
                {
                    throw new Exception('Ingrese el sexo del animal');
                }
                else if(!$animal->setEspecie($_POST['especie']))
                {
                    throw new Exception('Ingrese la especie del animal');
                }
                else if(!$animal->setRaza($_POST['raza']))
                {
                    throw new Exception('Ingrese la raza del animal');
                }
                else if(!$animal->setColor($_POST['color']))
                {
                    throw new Exception('Ingrese el color del animal');
                }
                else if(!$animal->setFechaNaci($_POST['fecha_naci']))
                {
                    throw new Exception('Ingrese la fecha de nacimiento del animal');
                }
                else
                {
                    if($propietario->update())
                    {
                        if($animal->update())
                        {
                            Page::showMessage(1, 'El registro del animal se modificó', 'index.php');
                        }
                        else
                        {
                            Page::showMessage(2, Database::getException(), '');
                        }
                    }
                    else
                    {
                        Page::showMessage(2, Database::getException(), '');
                    }
                }
            }
        }
    }
    catch(Exception $error)
    {
        Page::showMessage(3, $error->getMessage(), '');
    }

?>