<?php
    require_once('../../app/views/template/page.class.php');
    Page::templateHeader('Agregar Registro de Receta');
    require_once('../../app/controllers/recetas/create_controller.php');
    Page::templateFooter();
?>