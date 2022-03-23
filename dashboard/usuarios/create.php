<?php
    require_once('../../app/views/template/page.class.php');
    Page::templateHeader('Agregar Usuario');
    require_once('../../app/controllers/usuarios/create_controller.php');
    Page::templateFooter();
?>