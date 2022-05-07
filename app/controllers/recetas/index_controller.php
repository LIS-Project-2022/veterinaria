<?php
    require_once('../../app/models/recetas.class.php');
    try{
        $receta = new Receta;
        $recetas = $receta->readRecetas();
    }
    catch (Exception $error){
        Page::showMessage(2, $error->getMessage(), '');
    }
    require_once('../../app/views/recetas/index.php');

?>