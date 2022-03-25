<?php
    require_once('../../app/models/registro_animal.class.php');
    require_once('../../app/models/propietario.class.php');

    try
    {
        $animal = new RegistroAnimal;
        $propietario = new Propietario;
        if(isset($_POST['agregar']))
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
                if($propietario->create())
                {
                    $animal->setIdPropietario($propietario->getIdPropietario());
                    if($animal->create())
                    {
                        Page::showMessage(1, 'El animal fue creado', 'index.php');
                    }
                    else
                    {
                        $propietario->deleteProp();
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
    catch (Exception $error)
    {
        Page::showMessage(3, $error->getMessage(), '');
    }

    require_once('../../app/views/animales/create.php');
?>