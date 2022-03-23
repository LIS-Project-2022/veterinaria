<?php
    require_once('../../app/models/registro_animal.class.php');
    try
    {
        $animal = new RegistroAnimal;
        $animales = $animal->getAnimales();
    }
    catch (Exception $error)
    {
        Page::showMessage(2, $error->getMessage(), '');
    }

    require_once('../../app/views/animales/index.php');
?>