<?php
    require_once('../../app/models/registro_animal.class.php');
    try
    {
        $animal = new RegistroAnimal;
        if(!isset($_GET['id']))
        {
            Page::showMessage(3, 'Seleccione un animal', 'index.php');
        }
        else if(!$animal->setIdRegistroAnimal($_GET['id']))
        {
            Page::showMessage(3, 'El id del animal no es valido', 'index.php');
        }
        else if(!$animal->getAnimal())
        {
            Page::showMessage(3, 'El animal no existe', 'index.php');
        }
        else
        {
            require_once('../../app/views/animales/delete.php');
            if(isset($_POST['eliminar']))
            {
                if($animal->delete())
                {
                    Page::showMessage(1, 'El registro del animal se ha eliminado', 'index.php');
                }
                else
                {
                    Page::showMessage(2, Database::getException(), '');
                }
            }
        }
    }
    catch(Exception $error)
    {
        Page::showMessage(3, $error->getMessage(), '');
    }
?>