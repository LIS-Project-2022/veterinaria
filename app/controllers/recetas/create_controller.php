<?php
    require_once('../../app/models/recetas.class.php');
    $receta = new Receta;
    $registros = $receta->readRegistro();
    require_once('../../app/views/recetas/create.php');


?>