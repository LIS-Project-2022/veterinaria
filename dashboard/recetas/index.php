<?php
    require_once('../../app/views/template/page.class.php');
    Page::templateHeader('Registro de recetas');
    require_once('../../app/controllers/recetas/index_controller.php');
    Page::templateFooter();
?>