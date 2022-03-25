<?php
    require_once('../../app/views/template/page.class.php');
    Page::templateHeader('Modificar Registro de Animal');
    require_once('../../app/controllers/animales/update_controller.php');
    Page::templateFooter();
?>