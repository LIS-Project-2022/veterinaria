<?php
    require_once('../../app/views/template/page.class.php');
    Page::templateHeader('Agregar Registro de Animal');
    require_once('../../app/controllers/animales/create_controller.php');
    Page::templateFooter();
?>