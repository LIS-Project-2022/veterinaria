<?php
    require_once('../../app/views/template/page.class.php');
    Page::templateHeader('Registro de Animales');
    require_once('../../app/controllers/animales/index_controller.php');
    Page::templateFooter();
?>