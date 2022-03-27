<?php
    require_once('../../app/views/template/page.class.php');
    Page::templateHeader('Agregar Registro de Tipos de usuario');
    require_once('../../app/controllers/tipo_usuario/create_controller.php');
    Page::templateFooter();
?>